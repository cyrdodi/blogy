@props(['trigger'])

<div x-data="{show:false}" class="relative w-full" @click.outside="show = false">
  {{-- Trigger --}}
  <div @click="show = ! show">
    {{ $trigger }}

  </div>

  {{-- Links --}}
  <div x-show="show" @click.outside="show = false"
    class="absolute z-50 w-full mt-2 overflow-y-auto text-left bg-gray-100 rounded-xl max-h-44" style="display:none">
    {{ $slot }}
  </div>
</div>