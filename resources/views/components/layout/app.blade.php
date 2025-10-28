{{-- @extends('layouts.base')
@section("title","Home Page")
@section("childContent")
@include('layouts.partials.header')
    @yield('content')

  <footer>
    @section('footerLinks')
    <a href="#">link1</a>
    <a href="#">link2</a>
    @show
  </footer>

@endsection   --}}

@props(['title'=>'', 'cssClass'=>'','bodyClass'=>null])
<x-base-layout :$title :$cssClass :$bodyClass >
   {{-- @include('components.layout.header') --}}
 <x-layout.partials.header />
  {{$slot}}



   {{-- <footer>
     <a href="#">link1</a>
    <a href="#">link2</a>
      @if(!$footer->isEmpty()) 
      {{ $footer }}
@endif
    {{-- @section('footerLinks')
    <a href="#">link1</a>
    <a href="#">link2</a>
    @show --}}
  </footer> --}}
</x-base-layout>