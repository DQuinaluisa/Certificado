<x-app-layout>
    <x-slot name="header">
        <div>
            <h4 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >Certificados</h4>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-4xl m-auto">

            @if (isset($curso_elegido))
                @section('title', "Cargando certificados de {$curso_elegido->nombre}")
            @else
                @section('title', 'Carga de certificados')
            @endif
            
            <div class="py-5 my-5 text-center border bg-green-200 dark:bg-green-esquel_active border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-900 rounded shadow-lg transition duration-300 ease-in-out">
                <p>* Formato del nombre del certificado: 
                    <span class="font-bold underline">cedula_codigoCurso</span>
                    <span class="font-bold underline">.jpg </span>
                    <span class="font-bold">.o</span>
                    <span class="font-bold underline"> .pdf</span>
                </p>
            </div>

            @if (session('alert'))
                <div class="mb-5 text-center">
                    <strong class="text-center leading-10 px-6 py-2 text-sm bg-red-600 w-full text-white border border-gray-300 dark:border-gray-600 shadow-xl transition duration-300 ease-in-out">
                        ¡ {{session('alert')}} !
                    </strong>
                </div>
            @endif

            <form 
            action="{{ route('certificados_store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="formUpload"
            >
                @csrf
                <div class="grid gap-y-6 gap-x-0 lg:gap-x-6 lg:grid-cols-2 transition duration-300 ease-in-out">
                    <div class="mx-auto my-auto w-full h-full p-6 border border-gray-400 dark:border-gray-600 shadow-md rounded-lg text-center transition duration-300 ease-in-out">
                        @if ($cursos != '[]')
                            <div class="flex justify-end">
                                <div 
                                class="grid grid-cols-4 grid-rows-1 py-1 w-52 m-auto mt-2 bg-gradient-to-r from-transparent to-green-esquel_button dark:to-green-esquel_active text-gray-100 text-center text-base rounded hover:no-underline focus:no-underline transition duration-300 ease-in-out"
                                >
                                    <img 
                                    class="m-auto right-14 bg-green-100 dark:bg-green-esquel_title_dark rounded-xl relative" 
                                    width="20px" 
                                    src="https://img.icons8.com/ios/250/000000/checked--v1.png"/>
                                    <select 
                                    name="nombre" 
                                    class="p-1 w-52 bg-transparent border-0 cursor-pointer text-white dark:text-gray-100 text-center" 
                                    require|>
                                        <option 
                                        class="bg-green-esquel"
                                        >
                                            Seleccione
                                        </option>
                                        @foreach($cursos as $curso)
                                            <option class="bg-gray-500 dark:bg-gray-700">
                                                <span>
                                                    {{$curso->nombre}}
                                                </span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <p 
                            class="w-auto m-auto my-10 py-2 rounded text-white bg-red-500"
                            >
                                <span 
                                class="p-1 text-white"
                                >!</span>
                                No hay cursos,
                                <a href="{{ route('cursos.index') }}"
                                class="underline"
                                >
                                crea al menos uno
                                </a>
                            </p>
                        @endif 
                    </div>
                    <div class="mx-auto w-full h-full my-auto py-6 border border-gray-400 dark:border-gray-600 shadow-md rounded-lg transition duration-300 ease-in-out">
                        <label class="font-san text-black dark:text-gray-300 text-sm text-right" for="imagen transition duration-300 ease-in-out">
                            <div class="w-full m-auto grid grid-cols-2 lg:grid-cols-3">
                                <div class=" flex justify-center">
                                    <div class="border-b-2 border-gray-600 animate-pulse transition duration-300 ease-in-out">
                                        <img 
                                            width="25px"
                                            class="p-1 animate-bounce rounded-xl bg-transparent dark:bg-green-esquel_button transition duration-300 ease-in-out"
                                            src="https://img.icons8.com/ios/100/000000/upload-to-cloud--v1.png"/>
                                    </div>
                                </div>    
                                <span class="text-left w-96">
                                    Seleccione máximo 20 certificados
                                </span>
                            </div>
                        </label>
                        <div class="w-full py-3 my-2 flex justify-center transition duration-300 ease-in-out">
                            <input 
                            class="py-4 px-8 cursor-pointer hover:bg-yellow-500 dark:text-gray-300 dark:hover:text-gray-700 transition duration-300 ease-in-out"
                            type="file"
                            id="certificados" 
                            name="certificados[]" 
                            multiple="">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center py-3">
                    <button 
                    type="submit" 
                    class="grid grid-cols-2 grid-rows-1 py-2 px-5 rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel  hover:bg-green-esquel_hover transition duration-500 ease-in-out hover:text-white text-gray-100 hover:no-underline focus:no-underline"
                    >
                        <img 
                        width="20px" 
                        src="https://img.icons8.com/ios/120/000000/save--v1.png"/>
                        <span class="text-center">
                            Guardar
                        </span>
                    </button>
                </div>
            </form>
            @if (session('filesUploaded'))
                <div class="mb-5 text-center">
                    <strong class="w-full p-2 mb-2 mr-2 flex justify-end bg-green-600 text-white text-center shadow-xl">
                        Archivos cargados  ({{ sizeof(session('filesUploaded')) }})
                    </strong>

                    <ul class="list-inside">
                     
                        @foreach (Session::get('filesUploaded') as $fileUploaded)
                            <li class="w-full my-1 bg-green-600 hover:bg-green-500 text-white text-left border rounded-md border-gray-300 dark:border-gray-600 shadow-xl transform hover:scale-105 transitiontransition duration-300 ease-in-out">
                                <span
                                class="px-2"
                                >
                                    {{ $fileUploaded }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('filesNotUploaded'))
                <div class="mb-5 text-center">
                    <strong class="w-full p-2 mb-2 mr-2 flex justify-end bg-red-600 text-white text-center shadow-xl">
                        No se pudo cargar ({{ sizeof(session('filesNotUploaded')) }}) archivos
                    </strong>

                    <ul class="list-inside">
                     
                        @foreach (Session::get('filesNotUploaded') as $fileNotUploaded)
                            <li class="w-full my-1 bg-red-600 hover:bg-red-500 text-white text-left border rounded-md border-gray-300 dark:border-gray-600 shadow-xl transform hover:scale-105 transition duration-300 ease-in-out">
                                <span
                                class="px-2"
                                >
                                    {{ $fileNotUploaded }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-app-layout>
