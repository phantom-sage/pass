<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function comments()
   {
       return $this->hasMany(Comment::class);
   }

   public function likes()
  {
      return $this->hasMany(Like::class);
  }
  public function shares()
  {
     return $this->hasMany(Share::class);
  }
}
