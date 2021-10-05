<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="text-4xl font-bold text-green-esquel text-center">Registro de Descargas
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div>
            <!-- CONTENIDO -->

            <table class=" py-16 px-4 sm:px-6 lg:items-center min-w-full divide-y divide-gray-200 border border-grey-100">
                <thead class="text-left text-gray-700 bg-grey-100 border-collapse border border-grey-200">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">CURSO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">CERTIFICADOS</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">NOMBRE USUARIO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">CEDULA USUARIO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">FECHA DE INGRESO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">FECHA DE DESCARGA</th>

                    </tr>
                </thead>
                <tbody class="border-collapse border border-grey-100">
                @foreach($detalles as $detalle)
                    <!-- Todos los certificados descargados -->
                    <tr class="border-collapse border border-grey-200">
                    <td class="px-6 py-2 text-left m-auto">{{$detalle->nombre}}</td>
                        <td class="px-6 py-2 text-left m-auto">{{$detalle->nombre_archivo}}</td>
                        <td class="px-6 py-2 text-left m-auto">{{$detalle->name}} {{$detalle->apellido}}</td>
                        <td class="px-6 py-2 text-left m-auto">{{$detalle->cedula}}</td>
                        <td class="px-6 py-2 text-left">{{$detalle->created_at}}</td>
                        <td class="px-6 py-2 text-left">{{$detalle->fecha_descarga}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-app-layout>
