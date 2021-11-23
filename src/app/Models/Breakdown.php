<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'type'
    ];

    public function repairs()
    {
        $this->belongsToMany(Repair::class);
    }
}
