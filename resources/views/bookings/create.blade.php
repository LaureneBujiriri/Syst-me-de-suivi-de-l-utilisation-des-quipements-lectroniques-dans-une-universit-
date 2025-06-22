<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvelle Réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-primary mb-6">Créer une nouvelle réservation</h3>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-input-error :messages="$errors->all()" class="mb-4" />

                    <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6">
                        @csrf

                        <!-- Equipment Selection -->
                        <div>
                            <x-input-label for="equipment_id" :value="__('Équipement')" />
                            <select id="equipment_id" name="equipment_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Sélectionnez un équipement</option>
                                {{-- @foreach ($equipments as $equipment) --}}
                                    {{-- <option value="{{ $equipment->id }}" {{ old('equipment_id') == $equipment->id ? 'selected' : '' }}>{{ $equipment->name }}</option> --}}
                                    <option value="1">Exemple: Ordinateur Portable Dell</option>
                                    <option value="2">Exemple: Vidéoprojecteur Epson</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <x-input-label for="start_date" :value="__('Date de début')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                        </div>

                        <!-- End Date -->
                        <div>
                            <x-input-label for="end_date" :value="__('Date de fin')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('bookings.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Annuler
                            </a>

                            <x-primary-button>
                                {{ __('Réserver') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
