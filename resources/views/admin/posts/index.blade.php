<x-layout>
  <x-setting heading="Manage The Post">
    <div class="w-full mb-3 overflow-hidden border border-gray-200 rounded-lg">
      <table class="w-full">
        <tbody class="divide-y">
          @foreach($posts as $post)
          <tr>
            <td class="px-3 py-2"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></td>
            <td class="px-3 py-2">
              <span class="px-4 py-1 text-sm text-green-500 bg-green-100 rounded-full">Published</span>
            </td>
            <td class="flex px-3 py-2 space-x-2">
              <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500">Edit</a>
              <form action="/admin/posts/{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $posts->links() }}


  </x-setting>
</x-layout>