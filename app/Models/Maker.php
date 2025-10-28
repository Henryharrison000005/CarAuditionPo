<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Database\Factories\MakerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel ;

class Maker extends Model
{
    //
      use HasFactory;


    public $timestamps = false ; 


     public $fillable = ['name'];


     public function cars():HasMany{
        return $this->hasMany(Car::class);
    }

    
     public function baseModels():HasMany{
        return $this->hasMany(BaseModel::class);
    }


     //DEFINING MANUAL CONNECTION WITH FACTORY
    // protected static function newFactory(){
    //     return MakerFactory::new();
    // }


}
