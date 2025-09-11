<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    //
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/mut.png');
        }

        // Check if using Cloudinary
        if (config('services.cloudinary.cloud_name')) {
            $cloudName = config('services.cloudinary.cloud_name');
            // Use the full public_id (including folder structure)
            return "https://res.cloudinary.com/{$cloudName}/image/upload/w_800,h_800,c_fill,q_auto,f_auto/{$this->image}";
        }

        // Fallback to local storage
        return asset('storage/images/' . $this->image);
    }

    /**
     * Get optimized thumbnail URL
     */
    public function getThumbnailUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/mut.png');
        }

        // Check if using Cloudinary
        if (config('services.cloudinary.cloud_name')) {
            $cloudName = config('services.cloudinary.cloud_name');
            return "https://res.cloudinary.com/{$cloudName}/image/upload/w_300,h_300,c_fill,q_auto,f_auto/{$this->image}";
        }

        return $this->image_url;
    }
}
