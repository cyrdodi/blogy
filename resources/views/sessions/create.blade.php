<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg p-6 mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl">
      <h1 class="mb-6 text-lg font-semibold text-center">Login</h1>
      <form action="/session" method="post">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="email">email</label>
          <input type="email"
            class="w-full p-2 border border-gray-400 rounded-lg @error('email') border-red-400 @enderror" name="email"
            id="email" value="{{ old('email') }}">
          @error('email')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="password">password</label>
          <input type="password"
            class="w-full p-2 border border-gray-400 rounded-lg @error('password') border-red-400 @enderror"
            name="password" id="password">
          @error('password')
          <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="w-full px-4 py-2 text-white bg-blue-400 rounded hover:bg-blue-500">Log
            in</button>
        </div>
      </form>
    </main>
  </section>
</x-layout>