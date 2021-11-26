<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingLend extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'computer_id',
        'request_start_date',
        'request_end_date',
        'is_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
