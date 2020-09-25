<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   use HasFactory;
   public function comments()
   {
     return $this->morphMany(Comment::class, 'commentable');
   }

   public function parentComments()
    {
        return $this->comments()->where('parent_id','=', 0);
    }

   public function likes()
   {
     return $this->morphMany(Like::class, 'likeable');
   }

    public function shares()
    {
       return $this->morphMany(Share::class, 'shareable');
    }

    public function views()
    {
         return $this->morphMany(PostView::class, 'viewable');
    }
}
