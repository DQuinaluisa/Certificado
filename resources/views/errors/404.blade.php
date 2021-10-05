<x-guest-layout>
    <x-slot name="content">
        <div>
            @section('title', 'Error')
            <div class="bg-yellow-500 py-2 max-w-xl m-auto text-3xl text-red-700 text-center">
                Error
            </div>
            <h4 class="mx-auto py-3 text-lg text-center text-black">
                @auth
                {{ auth()->user()->name }} 
                @endauth
                no encontramos lo que buscas.
            </h4>
            <div class="text-center">
                <a 
                class="py-2 px-5 rounded-md text-white bg-green-esquel hover:bg-green-esquel_hover"
                href="{{ route('cursos.index') }}"
                >
                Inicio
                </a>
            </div>
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-guest-layout>
