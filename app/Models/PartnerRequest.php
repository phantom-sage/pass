<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerRequest extends Model
{
   use HasFactory;
   protected $fillable = [
                         "full_name",
                         "organization",
                         "organization_area",
                         "email",
                         "proposal",
                         "partner_id"
                         ];

      public function partner()
      {
        return $this->belongsTo(Partner::class);
      }


}
