<x-layout>



  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <x-post-feature-card />

    <div class="lg:grid lg:grid-cols-2">
      <x-post-card />
      <x-post-card />
    </div>

    <div class="lg:grid lg:grid-cols-3">
      <x-post-card />
      <x-post-card />
      <x-post-card />

    </div>
  </main>

  {{-- <article>
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
  </article> --}}
</x-layout>