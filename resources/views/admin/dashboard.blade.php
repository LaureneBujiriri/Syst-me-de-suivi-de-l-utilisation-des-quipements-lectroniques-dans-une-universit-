<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Tableau de Bord Administrateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-primary">Utilisateurs</h3>
                    <p class="text-3xl font-bold mt-2">{{ $usersCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-primary">Équipements</h3>
                    <p class="text-3xl font-bold mt-2">{{ $equipmentsCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-primary">Réservations</h3>
                    <p class="text-3xl font-bold mt-2">{{ $bookingsCount }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-primary mb-6">Accès Rapide</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('equipment.index') }}" class="block bg-primary hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 text-center">
                            Gérer les Équipements
                        </a>
                        <a href="#" class="block bg-secondary hover:bg-green-700 text-white font-bold py-4 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 text-center">
                            Gérer les Réservations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
