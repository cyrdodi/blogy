<x-dropdown>
  <x-slot name="trigger">
    <button @click="open=!open" class="flex w-full py-2 pl-3 text-sm font-semibold text-left lg:inline-flex pr-9">{{
      isset($currentCategory) ? $currentCategory->name : 'Category' }}
      <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
    </button>
  </x-slot>

  <x-dropdown-item href="/" :active="!request('category')">All</x-dropdown-item>
  @foreach($categories as $category)
  <x-dropdown-item href="/?category={{ $category->slug }}" :active="request('category') === ($category->slug)">
    {{ $category->name }}
  </x-dropdown-item>
  @endforeach
</x-dropdown>