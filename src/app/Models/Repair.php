<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    protected $fillable = [
        'computer_id',
        'provider_id',
        'supported_at',
        'returned_at',
        'is_broken',
        'closed_at',
    ];

    public function computer()
    {
        $this->belongsTo(Computer::class);
    }
    public function provider()
    {
        $this->belongsTo(Provider::class);
    }
    public function breakdowns()
    {
        $this->belongsToMany(Breakdown::class);
    }
}
