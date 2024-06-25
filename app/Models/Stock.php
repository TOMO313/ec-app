<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('buy_count');
    }
}
