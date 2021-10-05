<x-guest-layout>
    <x-slot name="header">
        <div class="py-px ">
            @section('title', 'Inicio')
            <h1
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Bienvenido
            </h1>
        </div>
    </x-slot>

   <x-slot name="content">



           <div>
               <h4 class="text-3xl font-semibold text-green-esquel text-center">Mis certificados</h4>
           </div>
           <br>
           <br>
           <div class="flex items-start flex-wrap">
               <div class=" flex-1 bg-white p-4 max-w-sm md:max-w-lg ml-auto md:ml-8 shadow-md rounded-lg border-green-esquel place-content-around mt-4 md:mx-4 sm:w-2/3 relative">
                   <form class="m-auto p-0 sm:px-20 lg:items-center">
                           <label> Numero de Cedula : </label>
                           <input  class="mt-3 my-8 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform" type="search" name="search" placeholder="1708965412" >
                           <label> Nombre y Apellido : </label>
                           <input  class="mt-3 my-8 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform" type="search" name="search2" placeholder="Nombre Completo" >
                           <label> Celular : </label>
                           <input  class="mt-3 my-8 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform" type="search" name="search3" placeholder="0987654321" >
                           <label> Correo Electronico : </label>
                           <input  class="mt-3 my-8 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform" type="search" name="search4" placeholder="example@gmail.com" >

                           <div class="m-auto md:ml-20 object-center">
                               <a href="">
                                   <input id="submit" type="submit" value="Buscar" class="py-2 w-w1_2 outline-none text-sm text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105 content-center">
                               </a>
                           </div>
                   </form>
           </div>

           <br>
           <br>

               <div  class="flex-1  bg-white px-4 py-8 m-2  shadow-lg rounded-lg border-green-esquel place-content-around mt-4 xl:mx-4 xl:w-2/4  relative" >

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
                                   <th class="w-2/3">
                                       <div
                                       class="flex justify-start"
                                       >
                                       <div class="w-50">
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
                               @if (($search2 or $search) or ($search3 or $search4))



                               @foreach($certificados as $certificado)
                                   <tr class="border-collapse border border-grey-200 hover:bg-gray-200">
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
                                                    {{ $certificado->id }}
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
                                                   {{$certificado->nombre_archivo}}
                                                   <img
                                                   alt="check de certiifcado"
                                                   class="mx-auto my-auto hidden invisible ssm:visible ssm:block"
                                                   width="20px"
                                                   src="https://img.icons8.com/color/48/000000/tiktok-verified-account.png"/>

                                               <div class="w-full ssm:w-20 my-auto flex justify-center text-center">
                                                   <img
                                                       class="w-full sm:w-auto sm:h-10"
                                                       src="http://localhost:8000{{$certificado->imagen}}"
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
                           @endif



                       </table>

                       <div class="py-5">
                           {!! $certificados->appends(['search' => $search,
                                                       'search2' => $search2,
                                                       'search3' => $search3,
                                                       'search4' => $search4])->links() !!}
                       </div>

               </div>

           </div>



       </x-slot>
       <x-slot name="content_footer">

       </x-slot>
   </x-guest-layout>
