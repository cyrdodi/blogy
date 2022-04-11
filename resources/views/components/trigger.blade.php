<button @click="open=!open" class="w-full py-2 pl-3 text-sm font-semibold text-left pr-9">{{
  isset($currentCategory) ? $currentCategory->name : 'Category' }}</button>