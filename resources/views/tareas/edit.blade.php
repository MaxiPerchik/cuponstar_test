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
                    @if($errors -> any())
                        <div class="alert alert-danger">
                            <p>UPS! algo salio mal</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('tareas.update',$tarea)}}">
                        @csrf
                        @method('PUT')
                        <x-input-label for="titulo" :value="__('Titulo')"></x-input-label>
                        <x-text-input name="titulo" type="text" class="mt-1 block w-10" :value="old('titulo', $tarea->titulo)" required autofocus autocomplete="tarea"></x-text-input>
                        <x-input-error class="mt-2" :messages="$errors->get('titulo')"></x-input-error>
                        <br>
                        <x-input-label for="descripcion" :value="__('Descripcion')"></x-input-label>
                        <x-text-input name="descripcion" type="text" class="mt-1 block w-10" :value="old('descripcion', $tarea->descripcion)" required autofocus autocomplete="tarea"></x-text-input>
                        <x-input-error class="mt-2" :messages="$errors->get('descripcion')"></x-input-error>
                        <br>
                        <x-input-label for="estado_id" :value="__('Estado')"></x-input-label>
                        <select name="estado_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }} @selected($estado->id == $tarea->estad_id)">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('estado_id')"></x-input-error>
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
