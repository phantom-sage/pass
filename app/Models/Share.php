<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->bslongsTo(Project::class);
    }
    public function news()
    {
        return $this->bslongsTo(News::class);
    }
    public function story()
    {
        return $this->bslongsTo(Story::class);
    }
}
