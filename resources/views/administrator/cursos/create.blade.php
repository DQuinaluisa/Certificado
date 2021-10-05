<x-app-layout>
    <x-slot name="header">
        <div class="py-px">
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Crear cursos
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="">
            @section('title', 'Crear curso')
            <div class="flex justify-end">
                <a 
                href="{{ route('cursos.index') }}" 
                class="grid grid-cols-2 grid-rows-1 py-2 px-5 rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel  hover:bg-green-esquel_hover transition duration-500 ease-in-out hover:text-white text-gray-100 break-all hover:no-underline focus:no-underline"
                >
                    <img width="20px" src="https://img.icons8.com/ios/100/000000/exit.png"/>
                    <span class="text-center">
                        Salir
                    </span>
                </a>
            </div>
            @if (isset($alert))
                <div class="py-3 w-64 text-center m-auto rounded shadow-md bg-red-500 text-white">
                    {{ $alert }}
                </div>
            @endif
            <form action="{{ route('cursos.store') }}" method="POST" class="max-w-4xl m-auto">
                @csrf
                <div class="grid grid-cols-1 ssm:grid-cols-3">
                    <div class="hidden invisible ssm:visible ssm:block">
                        <div class="grid gap-y-5 grid-cols-1 grid-rows-3 text-center">
                            <span class="mt-4 text-green-esquel dark:text-gray-300">Nombre del curso</span>
                            <span class="mt-4 text-green-esquel dark:text-gray-300">Duración del curso</span>
                            <span class="mt-4 text-green-esquel dark:text-gray-300">Información del curso</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-span-2">
                        <label 
                        for="nombre"
                        class="col-span-2 mt-4 ml-3 visible ssm:invisible ssm:hidden text-green-esquel dark:text-gray-300 break-all"
                        >Nombre del curso</label>
                        <input 
                        type="text" 
                        name="nombre" 
                        class="col-span-2 mt-3 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out">
                        <label 
                        for="horas"
                        class="col-span-2 mt-4 ml-3 visible ssm:invisible ssm:hidden text-green-esquel dark:text-gray-300 break-all"
                        >Duración del curso</label>
                        <input 
                        type="text" 
                        name="horas" 
                        class="col-span-2 mt-3 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out">
                        <label 
                        for="información"
                        class="col-span-2 mt-4 ml-3 visible ssm:invisible ssm:hidden text-green-esquel dark:text-gray-300 break-all"
                        >Información del curso</label>
                        <textarea 
                        name="información" 
                        class="col-span-2 mt-3 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button 
                    type="submit" 
                    class="grid grid-cols-3 grid-rows-1 py-2 my-3 w-36 rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel  hover:bg-green-esquel_hover transition duration-500 ease-in-out hover:text-white text-gray-100 break-all hover:no-underline focus:no-underline"
                    >
                        <img 
                        class="m-auto"
                        width="20px" 
                        src="https://img.icons8.com/ios/120/000000/save--v1.png"/>
                        <span class="text-center w-16">
                            Guardar
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-app-layout>
