<x-layout>
  <x-slot name="content">
    <article>
      @foreach( $posts as $post)
      <h1>
        <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
        </a>
      </h1>
      <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
      <p>
        {{ $post->excerpt }}
      </p>
      @endforeach
    </article>
  </x-slot>
</x-layout>