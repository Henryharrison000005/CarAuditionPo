<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Car;

class CarImage extends Model
{
    //
     use HasFactory;
    public $timestamps = false ; 
    public $fillable = ['image_path','position'];

      public function car(): BelongsTo{
      return $this->belongsTo(Car::class);
    }


}
