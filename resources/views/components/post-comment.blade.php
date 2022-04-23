@props(['comment'=> $comment])
<section class="col-span-8 col-start-5 mt-8">
  <article class="flex p-6 space-x-4 bg-gray-100 border border-gray-200 rounded-xl">
    <div class="flex-shrink-0">
      <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" class="rounded-xl">
    </div>

    <div>
      <header class="mb-4">
        <h3 class="font-bold">{{ $comment->author->username }}</h3>
        <p class="text-xs">
          Posted <time>{{ $comment->created_at }}</time>
        </p>
      </header>
      <p>
        {{ $comment->body }}
      </p>
    </div>
  </article>
</section>