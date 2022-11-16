<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('estados.create') }}">Agregar un nuevo estado</a>
                    <br><br>
                    <table>
                        <thead>
                        <tr>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estados as $estado)
                            <tr>
                                <td>{{ $estado->estado }}</td>
                                <td class="flex">
                                    <a class="inline-flex items-center ml-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                       href="{{ route('estados.edit', $estado) }}"> Edit</a>
                                    <form method="POST" action="{{ route('categories.destroy',$estado) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex items-center ml-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            type="submit" onclick="return confirm('Are you sure?')">Delete
                                        </button>
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
</x-app-layout>
