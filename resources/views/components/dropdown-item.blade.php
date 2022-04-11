@props(['active' => false])

@php
$class= "block px-2 py-1 text-sm text-leading-1 hover:bg-blue-500 hover:text-white";
if($active){
$class .= " bg-blue-500 text-white";
}
@endphp

<a {{ $attributes(['class'=> $class ]) }} >{{ $slot }}</a>