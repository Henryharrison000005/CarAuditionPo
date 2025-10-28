<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\View;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Maker;
use App\Models\FuelType;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\User;
use App\Models\Model;
class HomeController extends Controller
{
    public function index(){
        if(View::exists("home")){
            dump("no such a page");
        };
        //select al cars
       // $cars = Car::get();
        

        //select published cars
        //$cars = Car::where('published_at','!=',null)->get();
       // dump($cars);


    //    select first published  car
    //    $cars = Car::where('published_at','!=',null)->first();
    //    dump($cars);

    //easy selection syntax by Id
    // $cars = Car::find(4);
    // dump($cars);

    //combined properties selection
    // $cars = Car::where('published_at','!=', null)->orderBy('published_at','desc')->where('user_id',1)->limit(2)->get();

    //$cars = Car::whereNotNull('published_at')->where('user_id', 1)->orderBy('published_at', 'desc')->limit(2)->get();
   // dump($cars);

   //INSERTING DATA INTO THE DATABASE
   // approach 00
//    $car = new Car();
//     $car->user_id = 1;
//     $car->car_type_id = 1;
//     $car->maker_id = 1;
//     $car->model_id = 1;
//     $car->fuel_type_id = 1;
//     $car->year = 2020;
//     $car->mileage = 15000;
//     $car->price = 30000;
//     $car->vin = "1HGCM82633A123456";
//     $car->city_id = 1;
//     $car->address = "123 Main St, City";
//     $car->phone = "123-456-7890";
//     $car->description = "A well-maintained car in excellent condition.";
//     $car->published_at = now();
//     $car->save();

  
   $carData = [
    'user_id'=>1,
    'car_type_id' => 1,
   'maker_id'=> 1,
   'model_id' => 1,
   'fuel_type_id' =>1,
   'year' => 2020,
   'mileage' => 15000,
   'price' => 30000,
   'vin' => "0987654321",
   'city_id' => 1,
   'address' => "123 ain St, City",
   'phone' => "123-45-7890",
   'description' => "A well-maintained car in excellent condition."
   ];


    $carNewData =new CarFeature([
          'abs'=>1,
            'air_conditioning'=>1,
            'power_windows'=>1,
            'power_door_locks'=>1,
            'cruise_control'=>1,
            'bluetooth_connectivity'=>1,
            'remote_start'=>1,
            'gps_navigation'=>1,
            'heated_seats'=>1,
            'climate_control'=>1,
            'rear_parking_sensors'=>1,
            'leather_seats'=>1
   ]);



    //Approach 01
//    $car = new Car($carData);
//    $car->save();

//Approach 02
    //    $car = new Car();
    //    $car->fill($carData);
    //    $car->save();


    //Approach 03
    //$car = Car::create($carData);

    //single Object Update 00
    // $car =Car::find(1);
    // $car->price = 1000;
    // $car->save();



    //single Object updates
    // $car = Car::UpdateOrCreate(['vin'=>1111],$carData);
    // dump($car);


    //multiple object updates
    //Car::where("published_at", null)->update(['published_at'=>now()]);


    //deleting with delete() deletes object from db , only applies softDeletes if it has the attribute specified in migration and model
    // $car = Car::find(3);
    // $car->delete();

    //mass deleting
    // Car::destroy([25,26]); //arguments are the Ids
    //Car::where('creaated_at',null)->delete();

    //drop whole table,DOES NOT SOFT DELETE NO MATTER THE SOFTDELETE FLAG
    // Car::truncate();






    //challenges
    // $car = Car::where('price','>=','20000')->get();
    // dump($car);

    // $maker = Maker::where('name','=','Toyota')->first();
    // dump($maker);

    // $fueltype = new FuelType();    // FuelType::create(['name' =>'Electric']);
    // $fueltype->name = 'Electric';
    // $fueltype->save();


    // Car::where('id','=',27)->update(['price'=> 15000]);

    // Car::where('year','<=','2005')->delete();


  // $car = Car::find(12);
    //dump($car->features,$car->primaryImage);

    //it is possible to update using ORM relationships
  //  $car->features->air_conditioning=1;
    //$car->features->save();


    //alternative
    // $car->features->update(['power_windows'=>1]);
    //$car->primaryImage->delete();


    //it is also possible to create a new features table row using ORM relationship using its Car instance
    // $newCar = Car::find(27);
    // $newCar->features()->save( $carNewData);


    //$image = new  CarImage(['image_path'=>'testing1','position'=>2]);
 


    //ONE TO MANY RELATIONSHIPS
   
    // $car->images()->saveMany([
    //     new CarImage(['image_path'=>'testing2','position'=>2]),
    //     new CarImage(['image_path'=>'testing3','position'=>3])
    // ]
    // );

    // $car->images()->createMany([
    //     ['image_path'=>'testing4','position'=>4],
    //     ['image_path'=>'testing5','position'=>5]
    // ]);

    // dump($car->CarType);

    // $carType = CarType::where('name','=','Hatchback')->first();

    // dump($carType->cars);

    // $cars=Car::whereBelongsTo($carType)->get();
    // dump($cars);

    // $car->car_type_id = $carType->id;  // similar to the below relationship using associate function
    // $car->save();  

    // $car->CarType()->associate($carType);
    // $car->save();



    //MNAY TO MANY RELATIONSHIP
   // $car = Car::find(12);
//    $user = User::find(18);
//     dump($user->favouriteCars);





    //FACTORY

// $user = User::factory()->count(4)->create();    // make() only create instances without adding them to the db unlike to create() which adds them to db 
// dump($user);

// $maker = Maker::factory()->count(4)->create(['name'=>'INEOS']);  //state() could be used also in this case
// dump($maker);


// $user = User::factory()->count(16)->sequence(
//    [ 'name' =>'Calvin'],
//    ['name'=>'Frankestein']
// )->create();


// $user = User::factory()->count(16)->sequence(
//    fn ( Sequence $sequence)=>['name' => 'Name'.$sequence->index]
//  )->create();


// // we can have callback  functionsfor voth create and make , as below
// $user = User::factory()->afterMaking(   //runs when you call make() (model exists in memory, not saved).
//     fn (User $user) => $user->nickname = strtoupper($user->name)
// )->afterCreating(   //runs when you call create() (model is saved in the DB).
//     fn (User $user) =>$user->email_verified_at ??=now() 
// )->count(10)->create();  // but in case both them CBs re used , then finally if you use With create(), you get both runnig . With make(), you run only AfterMaking


   // Maker::factory()->count(5)->hasModels(5,['name'=>'Test'])->create();  // can also accept function as below
   //Maker::factory()->count(1)->hasModels(1,fn (array $attributes)=>['name'=>'Test'])->create();


//OTHER USE can be as below
// ->hasCars(1,fn(array $attributes, User $user){
// return ['phone'=>$user->phone];
// })

//also there exist a magic function
//->has(Model::factory()->count(3),'models')->create();



// factories for belongsTo relationships 


//Model::factory()->count(5)->forMaker(['name'=>'Lexus'])->create();
// Model::factory()->count(2)->for(
//     // we can also pass an obj instead of the definition below , $maker   //($maker = Maker::factory->create()
//     Maker::factory()->state(['name'=>"Lambo"]),'maker')->create();


// MANY TO MANY RELATIONSHIP FACTORY
//Car::factory()->count(1)->has(User::factory()->count(3),'favouredusers')->create();

//Incase we have to pass data on  additional column in the pivot table we use below relationship
//Car::factory()->count(1)->hasAttached(User::factory()->count(3),[additional columns passed as associative array],'favouredusers')->create();

// $carss=Car::with(['baseModels','primaryImage','city','maker','fuelType','carType'])->limit(30);
// $cars=$carss->where('published_at','<',now())->orderBy('published_at','desc')->get();
 $cars = Car::where('published_at','<',now())->with(['baseModels','primaryImage','city','maker','fuelType','carType'])->orderBy('published_at','desc')->limit(30)->get();
// $cars = Car::where('published_at','<',now())->orderBy('published_at','desc')->limit(30)->get();
dump($cars);
dump(Car::find(12)->baseModels->name);

        return view ( 'layouts.index',["cars"=>$cars]);
    }


   

    public function indexing(){
        return view("about" , [
            "name" => "Henry",
            "surname" => "Kileo"
        ]);
    }

}
