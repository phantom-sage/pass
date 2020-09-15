<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function comments()
   {
       return $this->morphMany(Comment::class, 'commentable');
   }

   public function likes()
  {
      return $this->morphMany(Like::class, 'likeable');
  }
}
