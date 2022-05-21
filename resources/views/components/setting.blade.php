@props(['heading'])
<main class="max-w-4xl mx-auto mt-10 space-y-6 lg:mt-20">
  <h2 class="pb-2 text-lg font-semibold border-b">{{ $heading }}</h2>
  <div class="flex">
    <aside class="flex-shrink-0 w-48">
      <h4 class="mb-4 font-semibold">Links</h4>
      <ul>
        <li>
          <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-600' : '' }}">All Posts</a>
        </li>
        <li>
          <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-600' : '' }}">New
            Post</a>
        </li>
      </ul>
    </aside>
    {{-- flex-1 means take the remaining space --}}
    <x-panel class="flex-1">
      {{ $slot }}
    </x-panel>
  </div>
</main>