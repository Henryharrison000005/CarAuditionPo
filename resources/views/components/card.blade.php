@props(['color','bgColor'])
{{-- <div
{{ $attributes->class("card card-text-$color card-bg-$bgColor") }}
lan="ka" 
> --}}

<div
{{ $attributes->class(" card card-text-$color card-bg-$bgColor")->merge(["lan"=>"ka"] ) }}
>

    <div {{$val1->attributes->class("card-header")}}>
  {{ $val1 }} </div>
    @if ($slot->isEmpty())
    <p><big>nothing to display</big></p>
    @else   
    {{ $slot }}
        @endif
    <div >{{ $val2 }}</div>

    
</div>