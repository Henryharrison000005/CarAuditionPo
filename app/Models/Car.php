<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use App\Models\CarFeature;
use App\Models\CarImage;
use App\Models\User;
use App\Models\CarType;


class Car extends Model
{
  use HasFactory;
     protected $fillable = [
       'user_id',
       'car_type_id',
       'maker_id',
       'model_id',
       'fuel_type_id',
       'year',
       'mileage',
       'price',
       'vin',
       'city_id',
       'address',
       'phone',
       'description'
        ];

// protected $guarded = ['user_id'];   //fill all values except these(its more like a blacklist -> opposite to fillable)


    use HasFactory,SoftDeletes;

     public function CarType(): BelongsTo{
      return $this->belongsTo(CarType::class,'car_type_id');
    }

    public function fuelType(): BelongsTo{
      return $this->belongsTo(FuelType::class);
    }

        public function maker(): BelongsTo{
      return $this->belongsTo(Maker::class);
    }

        public function baseModels(): BelongsTo{
      return $this->belongsTo(BaseModel::class,'model_id');
    }

        public function owner(): BelongsTo{
      return $this->belongsTo(User::class,'user_id');
    }

        public function city(): BelongsTo{
      return $this->belongsTo(City::class);
    }


    public function features():HasOne{
      return $this->hasOne(CarFeature::class,'car_id');
    }

    public function primaryImage():HasOne{
      return $this->hasOne(CarFeature::class,'car_id')->OldestOfMany('car_id');
    }

    public function images():HasMany{
      return $this->hasMany(CarImage::class);
    }

    public function favouredUsers(): BelongsToMany{
      return $this->belongsToMany(User::class,'favourite_cars','car_id','user_id');
    }

    public function getCreateDate(): string
    {
      return (new Carbon($this->created_at))->format('Y-m-d');
    }


 

  }