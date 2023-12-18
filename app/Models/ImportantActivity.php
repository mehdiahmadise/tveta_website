<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantActivity extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['language', 'category_id', 'image', 'title', 'description', 'meta_title', 'meta_description', 'is_approved', 'status', 'date_gregorian', 'date_ghamari', 'date_shamsi'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
