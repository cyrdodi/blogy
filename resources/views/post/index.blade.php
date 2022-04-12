<x-layout>

  @include('post._header')

  <x-post-grid :posts="$posts" />

</x-layout>