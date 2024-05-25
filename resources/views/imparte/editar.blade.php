@extends('plantilla')
@section('content')



<form class="max-w-md mx-auto" action="/actualizarImparticion" method="POST">
    {{ csrf_field() }}
    <input type="text" value="{{$imparteActual->profesor->id}}" hidden name="p_idprofesor">
    <input type="text" value="{{$imparteActual->aula->id}}" hidden name="a_idaula">
    <input type="text" value="{{$imparteActual->clase->codclase}}" hidden name="c_codclase">
    <label for="titulos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una profesor</label>
  <select id="titulos" name="profesor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Profesor</option>
    @foreach ($info['profesores'] as $profesor)
    <option value="{{$profesor->id}}" @if ($profesor->id == $imparteActual->p_idprofesor)
        selected
    @endif>{{$profesor->nombre}}</option>
    @endforeach
  </select>
  <label for="titulos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una aula</label>
  <select id="titulos" name="aula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Aula</option>
    @foreach ($info['aulas'] as $aula)
    <option value="{{$aula->id}}" @if ($aula->id == $imparteActual->a_idaula)
        selected
    @endif>{{$aula->nombre}}</option>
    @endforeach
  </select>
  <label for="titulos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una clase</label>
  <select id="titulos" name="clase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Clase</option>
    @foreach ($info['clases'] as $clase)
    <option value="{{$clase->codclase}}" @if ($clase->codclase == $imparteActual->c_codclase)
        selected
    @endif>{{$clase->nombre}}</option>
    @endforeach
  </select>
    <button type="submit" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
  </form>
  

@endsection