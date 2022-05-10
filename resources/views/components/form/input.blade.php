<!-- if not defined the type by default is text -->
@props(['name'])

<x-form.section>
  <x-form.label :name="$name" />
  <input class="w-full p-2 border border-gray-400 rounded-lg @error($name) border-red-400 @enderror" name="{{ $name }}"
    id="{{ $name }}" value="{{ old($name) }}" {{ $attributes }}>
  <x-form.error :name="$name" />
</x-form.section>