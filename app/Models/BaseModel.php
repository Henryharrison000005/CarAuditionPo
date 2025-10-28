<?php

namespace App\Models;
use Database\Factories\BaseModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseModel extends EloquentModel
{
    //
    use HasFactory;
    
 protected $table = 'models';
//     protected $primaryKey = 'uuid'; // Custom primary key column
//     public $incrementing = false;   // If not using auto-increment
//     protected $keyType = 'string';  // For UUIDs

    public $timestamps = false ; 

     public $fillable = ['name','maker_id'];

         public function cars():HasMany{
        return $this->hasMany(Car::class);
    }
    
    public function maker():BelongsTo{
        return $this->belongsTo(Maker::class);
    }


    public static function newFactory(){
        return BaseModelFactory::new();
    }



}
