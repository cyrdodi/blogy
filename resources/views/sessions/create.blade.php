<x-layout>
  <section class="max-w-lg mx-auto">
    <x-panel>
      <h1 class="mb-6 text-lg font-semibold text-center">Login</h1>
      <form action="/session" method="post">
        @csrf
        <x-form.input name="email" type="email" autocomplete="username" />
        <x-form.input name="password" type="password" autocomplete="current-password" />
        <x-form.button>Login</x-form.button>
      </form>
    </x-panel>
  </section>
</x-layout>