<x-guest-layout>
    <x-slot name="header">
        @section('title', 'Más cursos')
        <div class="py-px">
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
            Más cursos para mi
        </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div>
            <div class="rounded bg-white dark:bg-transparent transition duration-300 ease-in-out">
                <table class=" py-16 px-4 sm:px-6 lg:items-center min-w-full rounded-md">
                    <thead class="text-left text-gray-700 bg-grey-100 border-collapse border border-gray-300 dark:border-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-base font-sans text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">No</th>
                            <th class="px-6 py-3 text-left text-base font-sans text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">Nombre</th>
                            <th class="px-6 py-3 text-left text-base font-sans text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">Fecha de inicio</th>
                            <th class="px-6 py-3 text-left text-base font-sans text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">Información</th>
                        </tr>
                    </thead>
                    <tbody class="border-collapse">
                        @foreach($cursosNuevo as $nuevo)
                            <tr class="border-collapse border border-gray-300 dark:border-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-300 ease-in-out">
                                <td class="w-full ssm:w-1/4">
                                    <div 
                                    class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                    >
                                        <div class="flex justify-start overflow-hidden relative">
                                            <img 
                                            class="mr-3 ssm:m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                            src="https://img.icons8.com/small/128/000000/filled-folder.png"/>
                                        </div>
                                        <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">
                                            {{ ++$i }}
                                        </span>
                                    </div>
                                </td>
                                <td class="w-full ssm:w-1/4">
                                    <div
                                    class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                    >
                                    <div class="flex justify-start overflow-hidden relative">
                                        <img 
                                        class="mr-3 ssm:m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                        src="https://img.icons8.com/ios-glyphs/90/000000/course-assign.png"
                                        alt="icono del curso">
                                    </div>
                                        <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">
                                            {{$nuevo->nombre}}
                                        </span>
                                    </div>
                                </td>
                                <td class="w-full ssm:w-1/4">
                                    <div 
                                    class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                    >
                                        <div class="flex justify-start overflow-hidden relative">
                                            <img 
                                            class="mr-3 ssm:m-auto w-6 ssm:w-5 flex justify-start rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                                            src="https://img.icons8.com/material-outlined/96/000000/time.png"/>
                                        </div>
                                        <span class="my-auto text-left col-span-3 text-green-esquel_hover dark:text-gray-300 transition duration-300 ease-in-out">
                                            {{$nuevo->horas}}
                                        </span>
                                    </div>
                                </td>
                                <td class="w-full ssm:w-1/4">
                                    <div class="m-auto flex justify-start">
                                        <a href="#" 
                                        class="grid grid-cols-3 grid-rows-1 py-1 w-36 m-auto transition duration-500 ease-in-out bg-gradient-to-r from-green-esquel_active to-green-esquel my-1 hover:text-white text-gray-100 text-center text-base rounded hover:no-underline focus:no-underline"
                                        >
                                            <img 
                                            class="m-auto"
                                            width="20px" 
                                            src="https://img.icons8.com/plasticine/100/000000/todo-list.png"
                                            />                       
                                            <span class="text-left  w-16 text-white ">
                                            Detalles
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
    <x-slot name="content_footer">
        <div class="py-5 bg-white dark:bg-transparent">
            {!! $cursosNuevo->links() !!}
        </div>
    </x-slot>
</x-guest-layout>
