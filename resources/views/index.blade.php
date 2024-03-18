<x-layout>
    <x-slot:title>
        Welcome
    </x-slot>

    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Lorem ipsum dolor sit amet
        </h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Aenean varius dui ac nibh porta elementum. Nunc ut
            gravida odio, a efficitur lectus. Donec tempus accumsan consequat.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('register') }}"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register
                Now</a>
        </div>
    </div>
</x-layout>
