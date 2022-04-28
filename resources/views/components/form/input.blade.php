<!-- if not defined the type by default is text -->
@props(['name', 'type' => 'text'])

<x-form.section>
  <x-form.label :name="$name" />
  <input type="{{ $type }}" class="w-full p-2 border border-gray-400 rounded-lg @error($name) border-red-400 @enderror"
    name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}">
  <x-form.error :name="$name" />
</x-form.section>