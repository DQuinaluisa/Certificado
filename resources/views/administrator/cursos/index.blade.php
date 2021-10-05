<x-app-layout>
    <x-slot name="header">
        <div class="py-px">
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Cursos
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-4xl m-auto">
            @section('title', 'Cursos')
            @if (isset($alert))
            <div class=" bg-green-500 py-3 w-52 text-center m-auto">
                <p>{{ $alert }}</p>
            </div>
            @endif
            
            @if ($cursosNuevo[0] == '')
                <div class=" text-center">
                    <a 
                    href="{{ route('cursos.create') }}"
                    class="transition duration-500 ease-in-out break-all text-base bg-green-esquel_active shadow-md hover:bg-green-esquel_button py-2 px-5 text-gray-800 hover:text-gray-100 rounded hover:no-underline focus:no-underline" 
                    >
                    Crear primer curso</a>
                </div>
            @else

                <div class="flex justify-end overflow-hidden">
                    <a 
                    href="{{ route('cursos.create') }}" 
                    class="grid grid-cols-3 grid-rows-1 p-2 w-28 overflow-hidden rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel transition duration-500 ease-in-out hover:text-white text-gray-100 hover:no-underline focus:no-underline"
                    >
                        <img 
                        class="m-auto transform scale-125"
                        width="20px" 
                        src="https://img.icons8.com/windows/96/000000/create.png"/>
                        <span class="text-center w-10">
                            Crear
                        </span>
                    </a>
                    </div>
            @endif
            @if ($cursosNuevo[0] != '')
                <table class="w-full m-auto bg-transparent">
                    <thead class="border-collapse border border-grey-200 dark:border-gray-700">
                        <tr>
                            <th class="w-1/12 flex justify-start">
                                <span class="w-full px-6 text-base font-sans text-green-esquel_hover dark:text-gray-300">
                                    No
                                </span>
                            </th>
                            <th class="w-1/5">
                                <div
                                class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                >
                                    <img 
                                    class="m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                    src="https://img.icons8.com/ios-glyphs/90/000000/course-assign.png"
                                    alt="icono del curso">
                                    <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300">
                                    Nombre
                                    </span>
                                </div>
                            </th>
                            <th class="w-1/5">
                                <div 
                                class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                >
                                    <img 
                                    class="m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                    src="https://img.icons8.com/material-outlined/96/000000/time.png"/>
                                    <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300">
                                        Duración
                                    </span>
                                </div>
                            </th>
                            <th class="w-1/2">
                            <div 
                                class="w-w1 m-auto grid justify-start grid-cols-4 grid-rows-1 overflow-hidden break-all"
                                >
                                    <img 
                                    class="m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                    src="https://img.icons8.com/ios-glyphs/90/000000/wrench.png"/>
                                    <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300">
                                        Acciones
                                    </span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-collapse">
                        @foreach ($cursosNuevo as $curso_Nuevo => $cursos_Nuevo)
                            <tr class="border border-grey-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <td class="px-0 py-0 s0sm:py-2 ssm:px-6 break-all text-base text-left text-green-esquel_hover dark:text-gray-300">
                                    <div 
                                    class="m-auto ssm:w-12 sm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden text-center break-all"
                                    >
                                        <img 
                                        class="m-auto w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                        src="https://img.icons8.com/small/128/000000/filled-folder.png"/>
                                        <span class="my-auto text-center col-span-3 text-green-esquel_hover dark:text-gray-300">
                                        {{ ++$i }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-0 py-0 ssm:py-2 ssm:px-6 break-all text-base text-left text-green-esquel_hover dark:text-gray-300">
                                    <span class="visible ssm:invisible ssm:hidden break-all font-bold">Nombre: </span>
                                    {{ $cursos_Nuevo->nombre }}</td>
                                <td class="px-0 py-0 ssm:py-2 ssm:px-6 break-all text-base text-left text-green-esquel_hover dark:text-gray-300">
                                <span class="visible ssm:invisible ssm:hidden break-all font-bold">Horas: </span>
                                    {{ $cursos_Nuevo->horas }}</td>
                                <td class="m-auto grid gap-x-2 grid-cols-1 md:grid-cols-3 break-all text-base text-left text-green-esquel_hover dark:text-gray-300">
                                    <div class="flex justify-center">
                                        <a 
                                        href="{{ route('cursos.edit',$cursos_Nuevo->id) }}" 
                                        class="grid grid-cols-3 grid-rows-1 py-1 w-36 transition duration-500 ease-in-out bg-yellow-500 hover:bg-yellow-600 my-1 hover:text-white text-gray-100 text-center text-base rounded hover:no-underline focus:no-underline"
                                        >
                                            <img 
                                            class="m-auto"
                                            width="20px" 
                                            src="https://img.icons8.com/material-outlined/384/000000/edit--v4.png"/>                        
                                            <span class="text-center w-16">
                                                Editar
                                            </span>
                                        </a>
                                    </div>
                                    <div class="flex justify-center">
                                        <a 
                                        href="{{ route('cursos.show',$cursos_Nuevo->id) }}" 
                                        class="grid grid-cols-3 grid-rows-1 py-1 w-36 transition duration-500 ease-in-out bg-green-500 hover:bg-green-600 my-1 hover:text-white text-gray-100 text-center text-base rounded hover:no-underline focus:no-underline"
                                        >
                                            <img 
                                            class="m-auto"
                                            width="20px" 
                                            src="https://img.icons8.com/fluency-systems-regular/96/000000/details.png"/>                       
                                            <span class="text-center w-16">
                                            Detalles
                                            </span>
                                        </a>
                                    </div>
                                    <div class="flex justify-center">
                                        <a 
                                        href="{{ route('curso_destroy',$cursos_Nuevo->id) }}" 
                                        class="grid grid-cols-3 grid-rows-1 py-1 w-36 transition duration-500 ease-in-out bg-red-500 hover:bg-red-600 my-1 hover:text-white text-gray-100 text-center text-base rounded hover:no-underline focus:no-underline"
                                        >
                                            <img 
                                            class="m-auto"
                                            width="20px" 
                                            src="https://img.icons8.com/ios/250/000000/delete--v1.png"/>  
                                            <span class="text-center w-16">
                                            Eliminar
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </x-slot>
    <x-slot name="content_footer">
        <div class="max-w-3xl m-auto py-5">
            {!! $cursosNuevo->links() !!}
        </div>
    </x-slot>
</x-app-layout>
