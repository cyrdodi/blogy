@props(['name'])

<x-form.section>
  <x-form.label :name="$name" />
  <textarea class="w-full p-2 border border-gray-400 rounded-lg @error($name) border-red-400 @enderror"
    name="{{ $name }}" id="{{ $name }}">{{ $slot ?? old($name) }}</textarea>
  <x-form.error :name="$name" />
</x-form.section>