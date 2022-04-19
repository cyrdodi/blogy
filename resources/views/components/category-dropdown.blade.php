<x-dropdown>
  <x-slot name="trigger">
    <button @click="open=!open" class="flex w-full py-2 pl-3 text-sm font-semibold text-left lg:inline-flex pr-9">{{
      isset($currentCategory) ? $currentCategory->name : 'Category' }}
      <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
    </button>
  </x-slot>

  <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
    :active="!request('category')">
    All</x-dropdown-item>
  @foreach($categories as $category)
  {{--
  kita menggambil query dari search tapi menghilangkan category dari query sebelumnya agar tidak double dengan cara
  request()->except('category')
  pada method diatas akan menghasilkan array, maka kita harus convert dari array menjadi string yang berupa query
  dengan menggunakan method php http_build_query()
  --}}
  <x-dropdown-item href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category', 'page'))}}"
    :active="request('category') === ($category->slug)">
    {{ $category->name }}
  </x-dropdown-item>
  @endforeach
</x-dropdown>