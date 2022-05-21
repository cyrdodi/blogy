<x-layout>
  <x-setting heading="Publish New Post">
    <form action="/admin/posts/create" method="post" enctype="multipart/form-data">
      @csrf
      <x-form.input name="title" />
      <x-form.input name="slug" />
      <x-form.input name="thumbnail" type="file" />
      <x-form.textarea name="excerpt" />
      <x-form.textarea name="body" />

      <x-form.section>
        <x-form.label name="category_id" />
        <select name="category_id"
          class="w-full p-2 border bg-white border-gray-400 rounded-lg @error('body') border-red-400 @enderror">
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
          @endforeach
        </select>
        <x-form.error name="category_id" />
      </x-form.section>
      <x-form.button>Save</x-form.button>
    </form>
  </x-setting>
</x-layout>