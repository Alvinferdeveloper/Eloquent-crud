@extends('plantilla')
@section('content')



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-200 text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Codigo
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Creditos
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
    
            </tr>
        </thead>
        <tbody>
            @foreach ($clases as $clase)
            <tr class="bg-gray-900 even:bg-gray-50 even:bg-gray-800 border-b border-gray-700  ">
                <th scope="row" class="px-6 py-4 font-xl whitespace-nowrap text-white">
                   {{$clase->codclase}}
                </th>
                <td class="px-6 py-4">
                    {{$clase->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$clase->credito}}
                </td>
                <td class="px-6 py-4">
                    <a href="/editarClase/{{$clase->codclase}}" class="mr-4 text-green-400 cursor-pointer">Editar</a>
                    <a href="/eliminarClase/{{$clase->codclase}}" class="text-red-400 cursor-pointer">Eliminar</a>
                </td>
                
            </tr>
            @endforeach
            <a href="/crearClase">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Nueva Clase
                    </span>
                </button>
            </a>
        </tbody>
    </table>
</div>

    
@endsection