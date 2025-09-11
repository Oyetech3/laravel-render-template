<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    protected $fillable = [
        'collection_name',
        'imageone',
        'imagetwo',
        'imagethree',
    ];

    /**
     * Get all image URLs as array
     */
    public function getImageoneUrlAttribute()
    {
        if (!$this->imageone) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_800,h_800,c_fill,q_auto,f_auto/{$this->imageone}";
    }

    /**
     * Get Cloudinary URL for imagetwo
     */
    public function getImagetwoUrlAttribute()
    {
        if (!$this->imagetwo) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_600,h_600,c_fill,q_auto,f_auto/{$this->imagetwo}";
    }

    /**
     * Get Cloudinary URL for imagethree
     */
    public function getImagethreeUrlAttribute()
    {
        if (!$this->imagethree) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_600,h_600,c_fill,q_auto,f_auto/{$this->imagethree}";
    }

    /**
     * Get Cloudinary URL for imagefour
     */
    public function getImagefourUrlAttribute()
    {
        if (!$this->imagefour) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_600,h_600,c_fill,q_auto,f_auto/{$this->imagefour}";
    }

    /**
     * Get Cloudinary URL for imagefive
     */
    public function getImagefiveUrlAttribute()
    {
        if (!$this->imagefive) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_600,h_600,c_fill,q_auto,f_auto/{$this->imagefive}";
    }

    /**
     * Get custom sized Cloudinary URL
     */
    public function getCloudinaryUrl($field, $width = 800, $height = 800, $crop = 'fill')
    {
        if (!$this->$field) {
            return asset('images/mut.png');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_{$width},h_{$height},c_{$crop},q_auto,f_auto/{$this->$field}";
    }

    /**
     * Delete images from Cloudinary when collection is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($collection) {
            $cloudinary = new \Cloudinary\Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key' => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ]
            ]);

            $imageFields = ['imageone', 'imagetwo', 'imagethree'];

            foreach ($imageFields as $field) {
                if ($collection->$field) {
                    try {
                        $cloudinary->uploadApi()->destroy($collection->$field);
                    } catch (Exception $e) {
                        logger('Failed to delete image from Cloudinary: ' . $e->getMessage());
                    }
                }
            }
        });
    }
}
