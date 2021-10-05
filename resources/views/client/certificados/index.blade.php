<x-app-layout>
    <x-slot name="header">
        <div>
            <h4 class="text-3xl font-semibold text-green-esquel text-center">Mis certificados</h4>
        </div>
    </x-slot>
    <x-slot name="content">
        <div>
            @auth
                <div class=" py-10 px-0 sm:px-10 lg:items-center">
                    @section('title', 'Certificados')
                    <div class="sm:flex block justify-end mb-5">
                        <h3 class="text-base text-green-esquel_hover font-sans antialiased leading-none mr-2">Nombre del usuario :</h3>
                        <p class="text-base text-green-esquel_hover leading-none">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="sm:flex block justify-end">
                        <h3 class="text-base text-green-esquel_hover font-sans antialiased leading-none mr-2">Número de Cedula :</h3>
                        <p class="text-base text-green-esquel_hover leading-none">{{ auth()->user()->cedula }}</p>
                    </div>
                </div>
                @if ($certificados[0] == '')
                <div class="w-56 p-2 m-auto text-center bg-yellow-500 rounded shadow-lg">
                    <strong >
                        Aún no tienes certificados
                    </strong>
                </div>
                @else
                <table class="w-full border border-grey-100">
                    <thead class="text-gray-700 border-collapse bg-grey-100 border border-grey-200">
                        <tr>
                        <th class="w-1/3">
                            <div class="flex justify-start">
                                <span class="px-6 text-base font-sans text-green-esquel_hover">
                                    No
                                </span>      
                            </div>
                            </th>
                            <th class="w-1/3">
                                <div
                                class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-6 ssm:grid-rows-1 overflow-hidden break-all"
                                >
                                    <img 
                                    class="m-auto w-6 ssm:w-5 flex justify-start"
                                    src="https://img.icons8.com/ios-glyphs/90/000000/course-assign.png"
                                    alt="icono del curso">
                                    <span class="my-auto text-left col-span-5 text-green-esquel_hover">
                                        Nombre
                                    </span>
                                </div>
                            </th>
                            <th class="w-1/3">
                                <div 
                                class="flex justify-start"
                                >
                                <div class="w-20">
                                    <img 
                                    class="m-auto"
                                    width="22px"
                                    src="https://img.icons8.com/material-outlined/24/000000/download-2.png"/>
                                </div>
                                    <span class="my-auto text-left col-span-5 text-green-esquel_hover">
                                        Descargar
                                    </span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-collapse border border-grey-100">
                        @foreach($certificados as $certificado)
                            <tr class="border-collapse border border-grey-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                                <td class="w-full ssm:w-1/4">
                                    <div 
                                    class="w-w1 m-auto ssm:w-auto flex ssm:grid ssm:justify-start ssm:grid-cols-4 ssm:grid-rows-1 overflow-hidden break-all"
                                    >
                                        <div class="flex justify-start">
                                            <img 
                                            class="m-auto w-6 ssm:w-5 flex justify-start"
                                            src="https://img.icons8.com/small/128/000000/filled-folder.png"/>
                                        </div>
                                        <span class="my-auto text-left col-span-3 text-green-esquel_hover">
                                            {{ ++$i }}
                                        </span>
                                    </div>
                                </td>
                                <td class="w-full ssm:w-1/3">
                                    <div class="flex flex-row justify-start">
                                        <strong class="ml-4 mr-1 visible block ssm:invisible ssm:hidden">
                                            Nombre: 
                                        </strong>
                                        <span class="w-20 my-auto text-left text-green-esquel_hover">
                                        {{$certificado->nombre}}
                                        </span>
                                    </div>
                                </td>
                                <td class="w-full ssm:w-1/3">
                                    <div class="w-auto flex justify-start">
                                        <a 
                                        class="flex flex-col ssm:grid ssm:grid-cols-2 ssm:grid-rows-1 ssm:py-1"
                                        href="{{ route('descargarCertificado', $certificado->id) }}"
                                        >
                                            <img
                                            alt="check de certiifcado" 
                                            class="mx-auto my-auto hidden invisible ssm:visible ssm:block"
                                            width="20px" 
                                            src="https://img.icons8.com/color/48/000000/tiktok-verified-account.png"/>
                                     
                                        <div class="w-full ssm:w-20 my-auto flex justify-center text-center">
                                            <img 
                                                class="w-full sm:w-auto sm:h-10"
                                                src="http://localhost/certificadosTest/public/{{$certificado->imagen}}" 
                                                alt="certificado"/>
                                        </div>
                                            <img
                                                alt="icono de descargas"
                                                class="w-14 m-auto visible block ssm:invisible ssm:hidden" 
                                                src="https://img.icons8.com/material-sharp/96/000000/download--v1.png"/>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            @endauth
        </div>
    </x-slot>
    <x-slot name="content_footer">
        <div class="py-5">
            {!! $certificados->links() !!}
        </div>
    </x-slot>
</x-app-layout>
