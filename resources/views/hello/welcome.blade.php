<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
</head>
<body>
    <h1>Hello, I am the About Page!</h1>
    @verbatim
            <h2> Abraham , father of Isaac , said by {{$name}} {!! $surname  !!} at {{$year}}</h2>

    @endverbatim

    <h2>my name is @{{$name}} {!! $surname  !!}   , @@for the love of God </h2>

{{-- 
multi
line 
comments --
--}}
@foreach([1,2,3,4,5,6,7,8,0] as $n)
@continue($n ==2);
<p>{{$n}}</p>
@endforeach

@foreach($cars as $car)
{{ $car }}


@endforeach

<br>

{{ implode(', ', $cars) }}

    <h3 
    @class ([ "my-class" => $country=='Tz'])
    @style([
        "color:blue",
        "font-size:1rem"
    ])
    >Welcome to my first Laravel route example 🚀</h3>

@include("shared.button",["colour"=> "cyan","text"=>"submit"])

@foreach($cars as $car)
@include("shared.cars",["cars" => $car])
@endforeach

@include("alertChallenge.alert",["colour"=>"black","background_color"=>"purple","message"=>"hey, just havig fun with laravel"])
{{-- <x-card>
    <x-slot:val1>first section</x-slot:val1>
    corrected version for the laravel thing
    <x-slot:val2>second section</x-slot:val2>
</x-card> --}}

@php
    $color= 'Red';
    $bgColor='Purple';
@endphp
 
{{--<x-card color='{{$color}}' bgColor='{{$bgColor}}' > --}}
    <x-card :$color :$bgColor lan='en' test='test'  class='border-radius-7rem' 
    >
    <x-slot name='val1' class="card-header-blue">first section</x-slot:val1>
    corrected version for the laravel thing
    <x-slot name='val2'>second section</x-slot:val2>
</x-card>

<x-testing>this is a test string</x-testing>

<x-search_form />

<x-inline-thing-component>hello, here is my first inline component</x-inline-thing-component>

</body>
</html>
