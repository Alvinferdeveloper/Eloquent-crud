@extends('plantilla')
@section('content')



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-200 text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Migracion
                </th>
                <th scope="col" class="px-6 py-3">
                    Batch
                </th>
    
            </tr>
        </thead>
        <tbody>
            @foreach ($migraciones as $migracion)
            <tr class="bg-gray-900 even:bg-gray-50 even:bg-gray-800 border-b border-gray-700  ">
                <th scope="row" class="px-6 py-4 font-xl whitespace-nowrap text-white">
                   {{$migracion->id}}
                </th>
                <td class="px-6 py-4">
                    {{$migracion->migration}}
                </td>
                <td class="px-6 py-4">
                    {{$migracion->batch}}
                </td>
                
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

    
@endsection