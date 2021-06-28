<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['folder_id', 'image', 'image_name'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "http://placehold.it/750x320&text=No+Image";

        if ( ! is_null($this->image))
        {
            $directory = 'frontend/images/gallery';
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("$directory/" . $this->image);
        }

        return $imageUrl;
    }
}
