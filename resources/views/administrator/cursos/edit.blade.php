<x-app-layout>
    <x-slot name="header">
        <div class="py-px">
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Editar Curso
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-4xl m-auto">
            @if (isset($curso_Nuevo))
                @section('title', "Editar - {$curso_Nuevo->nombre}")
            @else
                @section('title', "Editar")
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
            @if ($errors->any())
                <div class=" bg-red-500">
                    <strong>¡Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form 
            action="{{ route('cursos.update',$curso_Nuevo->id) }}" 
            method="POST">
                @csrf
                @method('PUT')
                <div class="block lg:grid lg:grid-cols-2 lg:gap-x-10 w-full">
                    <div class=" w-full">
                        <label class="font-sans ml-2 tracking-wide text-green-esquel dark:text-gray-300 w-50 text-sm transition duration-300 ease-in-out transform">Nombre del curso:</label>
                        <input 
                        type="text" 
                        name="nombre" 
                        value="{{ $curso_Nuevo->nombre }}" 
                        class="mt-3 mb-4 block w-full bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out" 
                        placeholder="Nombre">
                    </div>
                
                    <div class=" w-full">
                        <label class="font-sans ml-2 tracking-wide text-green-esquel dark:text-gray-300 border-green-esquel w-50 text-sm transition duration-300 ease-in-out transform">Duración del curso:</label>
                        <input 
                        type="text" 
                        name="horas" 
                        value="{{ $curso_Nuevo->horas }}" 
                        class="mt-3 mb-4 block w-full bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out" 
                        placeholder="Duracion">
                    </div>
                </div>
                <div>
                    <label class="font-sans ml-2 tracking-wide text-green-esquel dark:text-gray-300 border-green-esquel w-50 text-sm transition duration-300 ease-in-out transform">Información del curso:</label>
                    <textarea class="mt-3 mb-4 block w-full bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out" 
                    name="información" 
                    placeholder="Información">{{ $curso_Nuevo->información }}</textarea>
                </div>
                <div class="flex justify-center">
                    <button 
                    type="submit" 
                    class="grid grid-cols-3 grid-rows-1 py-2 my-3 w-36 rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel  hover:bg-green-esquel_hover transition duration-500 ease-in-out hover:text-white text-gray-100 hover:no-underline focus:no-underline"
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
