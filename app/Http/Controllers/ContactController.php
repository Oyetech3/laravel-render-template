<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display the contact form
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new contact form submission
     */
    public function store(ContactRequest $request)
    {
        try {
            // Create the contact record
            $contact = Contact::create($request->validated());

            // Handle newsletter subscription if opted in
            if ($request->has('newsletter') && $request->newsletter) {
                $this->subscribeToNewsletter($request->email, 'contact_form');
            }

            // Send notification email to admin
            $this->sendAdminNotification($contact);

            // Send confirmation email to user
            $this->sendUserConfirmation($contact);

            return back()->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again or contact us directly.']);
        }
    }

    /**
     * Subscribe user to newsletter
     */
    private function subscribeToNewsletter($email, $source = 'contact_form')
    {
        try {
            NewsletterSubscriber::updateOrCreate(
                ['email' => $email],
                [
                    'source' => $source,
                    'is_active' => true,
                    'subscribed_at' => now(),
                    'unsubscribed_at' => null,
                ]
            );
        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed: ' . $e->getMessage());
            // Don't fail the entire contact form if newsletter subscription fails
        }
    }

    /**
     * Send notification to admin
     */
    private function sendAdminNotification($contact)
    {
        try {
            // You can customize this email address in your .env file
            $adminEmail = config('mail.admin_email', 'oye3tech@gmail.com');

            Mail::send('emails.contact.admin-notification', compact('contact'), function ($message) use ($adminEmail, $contact) {
                $message->to($adminEmail)
                        ->subject('New Contact Form Submission - ' . $contact->subject_formatted)
                        ->replyTo($contact->email, $contact->full_name);
            });
        } catch (\Exception $e) {
            Log::error('Admin notification email failed: ' . $e->getMessage());
        }
    }

    /**
     * Send confirmation email to user
     */
    private function sendUserConfirmation($contact)
    {
        try {
            Mail::send('emails.contact.user-confirmation', compact('contact'), function ($message) use ($contact) {
                $message->to($contact->email, $contact->full_name)
                        ->subject('Thank you for contacting MutmineBeads');
            });
        } catch (\Exception $e) {
            Log::error('User confirmation email failed: ' . $e->getMessage());
        }
    }

    /**
     * Admin method to view all contacts (you can create an admin interface)
     */
    public function adminIndex(Request $request)
    {
        $query = Contact::query();

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by subject
        if ($request->has('subject') && $request->subject !== '') {
            $query->where('subject', $request->subject);
        }

        // Search by name or email
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Admin method to view single contact
     */
    public function adminShow(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Admin method to update contact status
     */
    public function adminUpdate(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $contact->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'responded_at' => $request->status !== 'new' ? now() : $contact->responded_at,
        ]);

        return back()->with('success', 'Contact updated successfully.');
    }
}
