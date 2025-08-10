<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'source' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $source = $request->source ?? 'newsletter_form';

            // Check if already subscribed
            $existingSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

            if ($existingSubscriber) {
                if ($existingSubscriber->is_active) {
                    return back()->with('info', 'You are already subscribed to our newsletter.');
                } else {
                    // Resubscribe if previously unsubscribed
                    $existingSubscriber->resubscribe();
                    $this->sendWelcomeEmail($existingSubscriber);
                    return back()->with('success', 'Welcome back! You have been resubscribed to our newsletter.');
                }
            }

            // Create new subscription
            $subscriber = NewsletterSubscriber::create([
                'email' => $request->email,
                'source' => $source,
                'is_active' => true,
            ]);

            // Send welcome email
            $this->sendWelcomeEmail($subscriber);

            return back()->with('success', 'Thank you for subscribing to our newsletter!');

        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    /**
     * Unsubscribe from newsletter
     */
    public function unsubscribe($token)
    {
        $subscriber = NewsletterSubscriber::where('unsubscribe_token', $token)
                                         ->where('is_active', true)
                                         ->first();

        if (!$subscriber) {
            return view('newsletter.unsubscribe-error');
        }

        return view('newsletter.unsubscribe-confirm', compact('subscriber'));
    }

    /**
     * Process unsubscribe
     */
    public function processUnsubscribe(Request $request, $token)
    {
        $subscriber = NewsletterSubscriber::where('unsubscribe_token', $token)
                                         ->where('is_active', true)
                                         ->first();

        if (!$subscriber) {
            return view('newsletter.unsubscribe-error');
        }

        $subscriber->unsubscribe();

        return view('newsletter.unsubscribed', compact('subscriber'));
    }

    /**
     * Send welcome email to new subscriber
     */
    private function sendWelcomeEmail($subscriber)
    {
        try {
            Mail::send('emails.newsletter.welcome', compact('subscriber'), function ($message) use ($subscriber) {
                $message->to($subscriber->email)
                        ->subject('Welcome to MutmineBeads Newsletter!');
            });
        } catch (\Exception $e) {
            Log::error('Welcome email failed: ' . $e->getMessage());
        }
    }

    /**
     * Admin method to view all subscribers
     */
    public function adminIndex(Request $request)
    {
        $query = NewsletterSubscriber::query();

        // Filter by status
        if ($request->has('status')) {
            if ($request->status === 'active') {
                $query->active();
            } elseif ($request->status === 'inactive') {
                $query->inactive();
            }
        }

        // Filter by source
        if ($request->has('source') && $request->source !== '') {
            $query->bySource($request->source);
        }

        // Search by email
        if ($request->has('search') && $request->search !== '') {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $subscribers = $query->orderBy('subscribed_at', 'desc')->paginate(50);

        // Get statistics
        $stats = [
            'total' => NewsletterSubscriber::count(),
            'active' => NewsletterSubscriber::active()->count(),
            'inactive' => NewsletterSubscriber::inactive()->count(),
            'recent' => NewsletterSubscriber::recentlySubscribed(7)->count(),
        ];

        return view('admin.newsletter.index', compact('subscribers', 'stats'));
    }

    /**
     * Admin method to export subscribers
     */
    public function export(Request $request)
    {
        $query = NewsletterSubscriber::active();

        if ($request->has('source') && $request->source !== '') {
            $query->bySource($request->source);
        }

        $subscribers = $query->select('email', 'subscribed_at', 'source')->get();

        $filename = 'newsletter-subscribers-' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($subscribers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Email', 'Subscribed At', 'Source']);

            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->email,
                    $subscriber->subscribed_at->format('Y-m-d H:i:s'),
                    $subscriber->source,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Admin method to send newsletter
     */
    public function adminSend(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'template' => 'nullable|string',
        ]);

        $subscribers = NewsletterSubscriber::active()->get();

        try {
            foreach ($subscribers as $subscriber) {
                Mail::send('emails.newsletter.custom', [
                    'content' => $request->content,
                    'subscriber' => $subscriber
                ], function ($message) use ($request, $subscriber) {
                    $message->to($subscriber->email)
                            ->subject($request->subject);
                });
            }

            return back()->with('success', 'Newsletter sent to ' . $subscribers->count() . ' subscribers.');

        } catch (\Exception $e) {
            Log::error('Newsletter sending failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to send newsletter. Please try again.']);
        }
    }
}
