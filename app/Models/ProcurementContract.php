<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementContract extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['language', 'subject', 'content', 'file', 'status', 'image', 'date_gregorian', 'date_shamsi', 'date_ghamari'];

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
