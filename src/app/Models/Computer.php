<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'slug',
        'comment',
        'is_avaible',
        'brand_id',
        'picture'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
}
