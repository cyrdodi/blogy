<x-layout>

  @include('_posts-header')
  <x-post-grid :posts="$posts" />

</x-layout>