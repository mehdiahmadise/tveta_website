<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialTeaching extends Model
{
    use HasFactory;

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = ['language', 'name', 'slug', 'content','address', 'image', 'views', 'date_gregorian', 'date_ghamari', 'date_shamsi', 'status', 'province_id', 'district_id', 'center_type_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function center_type()
    {
        return $this->belongsTo(CenterType::class);
    }
}
