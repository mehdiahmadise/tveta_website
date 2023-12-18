<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['language', 'title', 'slug', 'content', 'image','file', 'views', 'date_gregorian', 'date_ghamari', 'date_shamsi', 'status', 'province_id', 'district_id', 'center_type_id', 'category_id', 'author'];

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

    public function center_type()
    {
        return $this->belongsTo(CenterType::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
