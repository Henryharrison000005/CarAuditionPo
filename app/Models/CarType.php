<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Car;

class CarType extends Model
{
    //
     use HasFactory;
    public $timestamps = false ; 
    public $fillable = ['name'];

    public function cars():HasMany{
        return $this->hasMany(Car::class);
    }
}
