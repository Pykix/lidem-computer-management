<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'serial_number',
        'comment'
    ];

    public function computers()
    {
        return $this->belongsToMany(Computer::class);
    }
}
