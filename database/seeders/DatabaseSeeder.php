<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\CarImage;
use App\Models\State;
use App\Models\City;
use App\Models\Maker;
use App\Models\Car;
use App\Models\BaseModel;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       CarType::factory()->sequence(
        ['name'=> 'Sedan'],
        ['name'=> 'Hatchback'],
        ['name'=>'SUV'],
        ['name'=>'Pickup Truck'],
        ['name'=>'Minivan'],
        ['name'=>'Jeep'],
        ['name'=>'Coupe'],
        ['name'=>'Crossover'],
        ['name'=>'SportCar']
       
       )->count(9)->create();

      FuelType::factory()->sequence(  
       ['name'=>'Gasoline'],
       ['name'=>'Diesel'],
       ['name'=>'Electric'],
       ['name'=>'Hybrid']
   )->count(4)->create();

   $states = [
    'California' => ['Los Angeles', 'San Diego', 'San Francisco', 'Sacramento', 'San Jose', 'Fresno', 'Oakland'],
    'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth', 'El Paso', 'Plano'],
    'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'Tallahassee', 'St. Petersburg'],
    'New York' => ['New York City', 'Buffalo', 'Rochester', 'Albany', 'Syracuse', 'Yonkers'],
    'Illinois' => ['Chicago', 'Springfield', 'Naperville', 'Peoria', 'Rockford', 'Joliet'],
    'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Harrisburg', 'Erie', 'Scranton'],
    'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron', 'Dayton'],
    'Georgia' => ['Atlanta', 'Augusta', 'Savannah', 'Macon', 'Athens', 'Columbus'],
    'North Carolina' => ['Charlotte', 'Raleigh', 'Durham', 'Greensboro', 'Winston-Salem', 'Fayetteville'],
    'Michigan' => ['Detroit', 'Grand Rapids', 'Ann Arbor', 'Lansing', 'Flint', 'Warren']
];
     

     foreach($states as $state=>$cities){
        State::factory()->state(['name'=>$state])->has(
            City::factory()->
            count(count($cities))->
            sequence(
                ...array_map(fn($city)=>['name'=>$city],$cities)))
                ->create();
     }


     $makers = [
    'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander', 'Prius', 'Yaris', 'Tacoma'],
    'Ford' => ['F-150', 'Mustang', 'Explorer', 'Fusion', 'Escape', 'Edge'],
    'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit', 'Odyssey', 'HR-V'],
    'Chevrolet' => ['Silverado', 'Malibu', 'Equinox', 'Tahoe', 'Camaro', 'Impala'],
    'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Pathfinder', 'Frontier', 'Versa'],
    'Lexus' => ['RX', 'ES', 'NX', 'IS', 'GX', 'UX']
];


     foreach($makers as $maker=>$models){
        Maker::factory()->state(['name'=>$maker])
        ->has(
            BaseModel::factory()
            ->count(count($models))
            ->sequence(
               ... array_map(fn($model)=>['name'=>$model],$models)
            )
        )->create();
     }
 
//create 3 users first,then create 2 more users and for each user(from the last 2) create 50 cars,with 2 images and features and add these cars to favourite cars of these 2 users 

    User::factory()->count(3)->create();

    User::factory()->count(2)->has(
        Car::factory()->count(50)->
        has(
        CarImage::factory(5)->sequence(
            fn(Sequence $sequence)=>['position'=>($sequence->index % 5) +1 ]),
            'images')
        ->hasFeatures()
   ,'favouriteCars' )->create();


    }
}
