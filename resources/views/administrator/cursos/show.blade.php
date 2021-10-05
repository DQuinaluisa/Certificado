<x-app-layout>
    <x-slot name="header">
        <div class="py-px">
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Curso de 
                @if (isset($curso_Nuevo))
                    {{ $curso_Nuevo->nombre }}
                @endif
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-4xl m-auto">
            @if (isset($curso_Nuevo))
                @section('title', "Detalles - {$curso_Nuevo->nombre}")
            @else
                @section('title', "Detalles")
            @endif
            <div class="flex justify-end">
                <a 
                href="{{ route('cursos.index') }}" 
                class="grid grid-cols-2 grid-rows-1 py-2 px-5 rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel  hover:bg-green-esquel_hover transition duration-500 ease-in-out hover:text-white text-gray-100 hover:no-underline focus:no-underline"
                >
                    <img width="20px" src="https://img.icons8.com/ios/100/000000/exit.png"/>
                    <span class="text-center">
                        Salir
                    </span>
                </a>
            </div>
            <div class="w-full p-0 py-10 my-10 ssm:p-10 m-auto border bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out">
                <div class="ml-3 py-4 grid grid-cols-1 grid-rows-3 gap-y-1">
                    <div class=" flex dark:text-gray-300">
                        <h3 class="pr-1 font-sans antialiased text-sm">Nombre del curso:</h3>
                        <div class="font-sans antialiased text-sm">
                            {{ $curso_Nuevo->nombre }}
                        </div>
                    </div>
                    <div class=" flex dark:text-gray-300">
                        <h3 class="pr-1 font-sans antialiased text-sm">Duración del curso:</h3>
                        <div class="font-sans antialiased text-sm">
                            {{ $curso_Nuevo->horas }}
                        </div>
                    </div>
                    <div class=" flex dark:text-gray-300">
                        <h3 class="pr-1 font-sans antialiased text-sm">Información del curso:</h3>
                        <div class="font-sans antialiased text-sm">
                            {{ $curso_Nuevo->información }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-app-layout>
