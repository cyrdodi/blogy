<x-layout>
  <main class="max-w-6xl mx-auto mt-10 space-y-6 lg:mt-20">
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
      <div class="col-span-4 mb-10 lg:text-center lg:pt-14">
        <img src="/images/illustration-1.png" alt="" class="rounded-xl">

        <p class="block mt-4 text-xs text-gray-400">
          Published <time>{{ $post->created_at->diffForHumans() }}</time>
        </p>

        <a href="/?author={{ $post->author->username }}">
          <div class="flex items-center mt-4 text-sm lg:justify-center">
            <img src="/images/lary-avatar.svg" alt="Lary avatar">
            <div class="ml-3 text-left">
              <h5 class="font-bold">{{ $post->author->name }}</h5>
            </div>
          </div>
        </a>
      </div>

      <div class="col-span-8">
        <div class="justify-between hidden mb-6 lg:flex">
          <a href="/"
            class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
              <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
              </g>
            </svg>

            Back to Posts
          </a>

          <div class="space-x-2">

            <x-category-button :category="$post->category" />

          </div>
        </div>

        <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
          {{ $post->title }}
        </h1>

        <div class="space-y-4 leading-loose lg:text-lg">
          {!! $post->body !!}
        </div>
      </div>
      <section class="col-span-8 col-start-5 mt-8 space-y-4">
        @auth
        <x-panel>
          <form action="/posts/{{ $post->slug }}/comment" method="post">
            @csrf
            <div class="flex items-center">
              <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" class="rounded-xl">
              <h3 class="ml-4 text-lg font-semibold">What do you think?</h3>
            </div>

            <div class="mt-4">
              <textarea name="body" id="body" rows="6" class="flex w-full p-4 focus:ring-2 rounded-xl"
                placeholder="Express your thought"></textarea>
            </div>
            <div class="flex justify-end pt-4 mt-4 border-t border-gray-300">
              <button type="submit"
                class="px-10 py-3 font-semibold text-white bg-blue-500 bg-blue- rounded-2xl">Post</button>
            </div>
          </form>
        </x-panel>
        @else
        <x-panel>
          <a href="/register" class="font-semibold text-blue-500 hover:underline">Register</a> or <a href="/login"
            class="font-semibold text-blue-500 hover:underline">Login</a> to participate in
          comments.
        </x-panel>

        @endauth
        @foreach($post->comment as $comment)
        <x-post-comment :comment="$comment" />
        @endforeach
      </section>
    </article>

  </main>

</x-layout>