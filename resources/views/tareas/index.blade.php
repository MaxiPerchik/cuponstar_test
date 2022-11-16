<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-flex items-center ml-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('tareas.create') }}">Agregar una Tarea Nueva</a>
                    <br><br>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400 r">
                            <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Tareas
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Descripci&oacute;n
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Estado
                                </th>
                                <th scope="col" class="py-3 px-6"></th>
                                <th scope="col" class="py-3 px-6"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tareas as $tarea)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $tarea->titulo }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $tarea->descripcion }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $tarea->estado->estado }}
                                    </td>

                                    <td class="py-4 px-6">
                                        <a class="inline-flex items-center ml-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            href="{{ route('tareas.edit', $tarea) }}"> Editar</a></td>

                                    <td class="py-4 px-6">
                                        <form method="POST" action="{{ route('tareas.destroy',$tarea) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button
                                                class="inline-flex items-center ml-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                type="submit" onclick="return confirm('Estas seguro?')">Eliminar
                                            </x-danger-button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


</x-app-layout>
