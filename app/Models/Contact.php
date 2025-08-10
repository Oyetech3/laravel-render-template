<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'newsletter',
        'status',
        'admin_notes',
        'responded_at'
    ];

    protected $casts = [
        'newsletter' => 'boolean',
        'responded_at' => 'datetime',
    ];

    // Accessor for full name
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }

    // Accessor for formatted subject
    protected function subjectFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => match($this->subject) {
                'general_inquiry' => 'General Inquiry',
                'custom_order' => 'Custom Order',
                'repair_service' => 'Repair Service',
                'bulk_order' => 'Bulk Order',
                'workshop' => 'Workshop Inquiry',
                'wedding_collection' => 'Wedding Collection',
                'corporate_gifts' => 'Corporate Gifts',
                'support' => 'Customer Support',
                default => ucfirst(str_replace('_', ' ', $this->subject)),
            }
        );
    }

    // Accessor for status color (useful for admin interface)
    protected function statusColor(): Attribute
    {
        return Attribute::make(
            get: fn () => match($this->status) {
                'new' => 'blue',
                'in_progress' => 'yellow',
                'resolved' => 'green',
                'closed' => 'gray',
                default => 'blue',
            }
        );
    }

    // Scopes for filtering
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    public function scopeBySubject($query, $subject)
    {
        return $query->where('subject', $subject);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
