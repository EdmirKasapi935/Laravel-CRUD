<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

   protected $fillable = [ "make",
                           "model",
                           "seats",
                           "transmission",
                           "category",
                           "license_plate",
                          "imgsrc"];

   public function user(): BelongsTo
   {
     return $this->belongsTo(User::class);
   }                           
}
