<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function downloads()
    {
      return $this->hasMany(Downloade::class);
    }


    public function getLink($file)
    {

    return (json_decode($file->file))[0]->download_link;


    }
}
