@auth
<x-panel>
  <form action="/posts/{{ $post->slug }}/comment" method="post">
    @csrf
    <div class="flex items-center">
      <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" class="rounded-xl">
      <h3 class="ml-4 text-lg font-semibold">What do you think?</h3>
    </div>

    <div class="mt-4">
      <textarea name="body" id="body" rows="6"
        class="flex w-full p-4 focus:ring-2 rounded-xl @error('body') border border-red-500 @enderror"
        placeholder="Express your thought"></textarea>
    </div>
    @error('body')
    <div class="mt-2 text-xs text-red-500">{{ $message }}</div>
    @enderror
    <div class="flex justify-end pt-4 mt-4 border-t border-gray-300">
      <x-primary-button>Submit</x-primary-button>
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