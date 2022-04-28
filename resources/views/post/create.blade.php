<x-layout>
  <main class="max-w-2xl mx-auto mt-10 space-y-6 lg:mt-20">
    <h2 class="text-lg font-semibold">Create Posts</h2>
    <x-panel class="">
      <form action="/posts/admin/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="title">title</label>
          <input type="text"
            class="w-full p-2 border border-gray-400 rounded-lg @error('title') border-red-400 @enderror" name="title"
            id="title" value="{{ old('title') }}">
          @error('title')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="slug">slug</label>
          <input type="text"
            class="w-full p-2 border border-gray-400 rounded-lg @error('slug') border-red-400 @enderror" name="slug"
            id="slug" value="{{ old('slug') }}">
          @error('slug')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="thumbnail">thumbnail</label>
          <input type="file"
            class="w-full p-2 border border-gray-400 rounded-lg @error('thumbnail') border-red-400 @enderror"
            name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}">
          @error('thumbnail')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="excerpt">excerpt</label>
          <textarea class="w-full p-2 border border-gray-400 rounded-lg @error('excerpt') border-red-400 @enderror"
            name="excerpt" id="excerpt" value="{{ old('excerpt') }}"></textarea>
          @error('excerpt')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="body">body</label>
          <textarea class="w-full p-2 border border-gray-400 rounded-lg @error('body') border-red-400 @enderror"
            name="body" id="body" value="{{ old('body') }}"></textarea>
          @error('body')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="category_id">category_id</label>
          <select name="category_id"
            class="w-full p-2 border bg-white border-gray-400 rounded-lg @error('body') border-red-400 @enderror">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
            @endforeach
          </select>
          @error('category_id')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <x-primary-button>Save</x-primary-button>
      </form>
    </x-panel>
  </main>
</x-layout>