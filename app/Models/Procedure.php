<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['language', 'subject', 'slug', 'content', 'image','file', 'views', 'date_gregorian', 'date_ghamari', 'date_shamsi', 'status'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array    
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }
}
