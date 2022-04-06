<x-layout>
  <x-slot name="content">
    <article>
      @foreach( $posts as $post)
      <h1>
        <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
        </a>
      </h1>
      <div>
        Posted by <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> on <a
          href="/categories/{{ $post->category->slug }}">{{
          $post->category->name
          }}</a>
      </div>
      <p>
        {{ $post->excerpt }}
      </p>
      @endforeach
    </article>
  </x-slot>
</x-layout>