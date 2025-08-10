<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'source',
        'is_active',
        'subscribed_at',
        'unsubscribed_at',
        'unsubscribe_token',
        'preferences'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'preferences' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscriber) {
            $subscriber->subscribed_at = now();
            $subscriber->unsubscribe_token = Str::random(32);
        });
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function scopeBySource($query, $source)
    {
        return $query->where('source', $source);
    }

    public function scopeRecentlySubscribed($query, $days = 7)
    {
        return $query->where('subscribed_at', '>=', now()->subDays($days));
    }

    // Methods
    public function unsubscribe()
    {
        $this->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
        ]);
    }

    public function resubscribe()
    {
        $this->update([
            'is_active' => true,
            'unsubscribed_at' => null,
            'subscribed_at' => now(),
            'unsubscribe_token' => Str::random(32),
        ]);
    }

    public function getUnsubscribeUrl()
    {
        return route('newsletter.unsubscribe', ['token' => $this->unsubscribe_token]);
    }
}
