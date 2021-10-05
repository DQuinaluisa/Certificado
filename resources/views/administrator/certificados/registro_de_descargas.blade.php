<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="text-4xl font-bold text-green-esquel dark:text-green-esquel_active text-center">
                Registro de Descargas
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div>
            <table class=" py-16 px-4 sm:px-6 lg:items-center min-w-full divide-y divide-gray-200 border border-gray-400">
                <thead class="text-left text-gray-700 bg-transparent border-collapse border border-gray-400 dark:border-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased text-gray-700 dark:text-gray-300">CURSO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased text-gray-700 dark:text-gray-300">CERTIFICADOS</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased text-gray-700 dark:text-gray-300">FECHA DE INGRESO</th>
                        <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased text-gray-700 dark:text-gray-300">FECHA DE DESCARGA</th>
                    </tr>
                </thead>
                <tbody class="border-collapse border border-gray-800">
                    @foreach($detalles as $detalle)
                        <tr class="border-collapse border border-gray-800">
                            <td class="px-6 py-2 text-left m-auto">{{$detalle->nombre}}</td> 
                            <td class="px-6 py-2 text-left m-auto">{{$detalle->nombre_archivo}}</td>
                            <td class="px-6 py-2 text-left">{{$detalle->created_at}}</td>
                            <td class="px-6 py-2 text-left">{{$detalle->fecha_descarga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-app-layout>
