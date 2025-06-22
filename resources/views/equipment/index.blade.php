<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Gestion des équipements') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Liste des équipements</h2>
                        <a href="{{ route('equipment.create') }}" class="bg-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Ajouter un équipement
                        </a>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="bg-secondary text-white p-4 rounded-lg mb-4 shadow-lg">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Statut</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($equipments as $equipment)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $equipment->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $equipment->status == 'available' ? 'bg-secondary text-white' : 'bg-gray-400 text-white' }}">
                                                {{ $equipment->status == 'available' ? 'Disponible' : 'Indisponible' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('equipment.show', $equipment) }}" class="text-primary hover:text-blue-800 font-bold">Voir</a>
                                            <a href="{{ route('equipment.edit', $equipment) }}" class="text-secondary hover:text-green-700 ml-4 font-bold">Modifier</a>
                                            <form action="{{ route('equipment.destroy', $equipment) }}" method="POST" class="inline ml-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?')">Supprimer</button>
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
