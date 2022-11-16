<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tareas.update',$tarea)}}">
                        @csrf
                        @method('PUT')
                        Titulo:
                        <br>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titulo" value="{{ $tarea->titulo }}">
                        <br><br>
                        Descrpcion:
                        <br>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="descripcion" value="{{$tarea->descripcion}}">
                        <br><br>
                        Estado:
                        <br>
                        <select name="estado_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }} @selected($estado->id == $tarea->estad_id)">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            type="submit">Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
