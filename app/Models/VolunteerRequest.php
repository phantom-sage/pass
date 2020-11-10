<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerRequest extends Model
{
    use HasFactory;
    protected $fillable =  [
                        "full_name",
                        "work_place",
                        "email",
                        "phone",
                        "age",
                        "gender",
                        "qualification",
                        "volunteer_id",
                      
                       ];

    public function volunteer()
    {
      return $this->belongsTo(Volunteer::class);
    }

}
