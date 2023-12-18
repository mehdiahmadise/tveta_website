<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Institute extends Model
{
    use HasFactory;
    use sluggable;

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

    protected $fillable = ['language', 'name', 'slug', 'content','address', 'image', 'views', 'date_gregorian', 'date_ghamari', 'date_shamsi', 'status', 'province_id','code' ,'district_id', 'center_type_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function center_type()
    {
        return $this->belongsTo(CenterType::class);
    }
}
