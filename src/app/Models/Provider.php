<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'country',
        'phone',
        'siret',
        'is_intern',
        'comment'
    ];

    public function repairs()
    {
        $this->hasMany(Repair::class);
    }
}
