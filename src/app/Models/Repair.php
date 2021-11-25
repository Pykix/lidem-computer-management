<?php

namespace App\Models;

use App\Presenter\RepairPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Repair extends Model
{
    use HasFactory, RepairPresenter;
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
        return  $this->belongsTo(Computer::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function breakdowns()
    {
        return $this->belongsToMany(Breakdown::class);
    }
}
