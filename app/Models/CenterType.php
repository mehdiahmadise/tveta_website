<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'language'];

    public function institutes()
    {
        return $this->hasMany(Institute::class);
    }
}
