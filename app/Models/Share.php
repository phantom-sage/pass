<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likeable()
    {
        return $this->morphTo();
    }
}
