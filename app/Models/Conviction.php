<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conviction extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizen_id',
        'conviction_date',
        'court_name',
        'criminal_code'
    ];

    public function citizen(): HasOne
    {
        return $this->hasOne(Citizen::class);
    }
}
