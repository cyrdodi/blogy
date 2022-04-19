@if(session()->has('success'))
<div x-data="{ show: true}" x-init="setTimeout(() => { show = false }, 3000)" x-show="show">
  <p class="bg-blue-500 text-sm text-white fixed bottom-3.5 right-3 rounded-lg px-2 py-1 animate-pulse">{{
    session('success') }}</p>
</div>
@endif