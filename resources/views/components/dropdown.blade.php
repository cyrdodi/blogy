@props(['trigger'])

<div x-data="{open:false}" class="w-full" @click.outside="open = false">
  {{-- Trigger --}}
  <div @click="show = ! show">
    {{ $trigger }}

  </div>

  {{-- Links --}}
  <div x-show="open" @click.outside="open = false"
    class="absolute z-50 w-full mt-2 overflow-y-auto text-left bg-gray-100 rounded-xl max-h-44" style="display:none">
    {{ $slot }}
  </div>
</div>