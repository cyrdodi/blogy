<x-layout>
  <x-setting :heading="'Edit: '. $post->title">
    <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      {{-- old('title', $post->title) it will look into session first, then the parameter --}}
      <x-form.input name="title" :value="old('title', $post->title)" />
      <x-form.input name="slug" :value="old('slug', $post->slug)" />

      <div class="flex items-center">
        <div class="flex-1">
          <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
        </div>
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="ml-4 rounded-xl" width="130" />
      </div>

      <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
      <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>
      <x-form.section>
        <x-form.label name="category_id" />
        <select name="category_id"
          class="w-full p-2 border bg-white border-gray-400 rounded-lg @error('body') border-red-400 @enderror">
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id', $post->category_id)== $category->id ? 'selected' :
            ''}}>
            {{ ucwords($category->name) }}
          </option>
          @endforeach
        </select>
        <x-form.error name="category_id" />
      </x-form.section>
      <x-form.button>Save</x-form.button>
    </form>
  </x-setting>
</x-layout>