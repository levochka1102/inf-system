<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Citizen extends Model
{
    use HasFactory;

    public function passport(): HasOne
    {
        return $this->hasOne(Passport::class);
    }

    public function convictions(): HasMany
    {
        return $this->hasMany(Conviction::class);
    }
}
