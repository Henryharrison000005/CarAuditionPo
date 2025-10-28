<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  App\Models\Car;

class City extends Model
{
    //
     use HasFactory;
    public $timestamps = false ; 
     public $fillable = ['name','state_id'];

     
    public function cars():HasMany{
        return $this->hasMany(Car::class);
    }
}
