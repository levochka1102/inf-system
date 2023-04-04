<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Справка об отсутствии судимости') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('api/certificates/criminal-record') }}">
                        @csrf

                        <!-- Serial -->
                        <div>
                            <x-input-label for="series" :value="__('Серия паспорта')" class="text-xl" />
                            <x-text-input id="l" class="block mt-1 w-full text-xl" type="number" name="series" required autofocus />
                            <x-input-error :messages="$errors->get('series')" class="mt-2" />
                        </div>

                        <!-- Number -->
                        <div class="mt-4">
                            <x-input-label for="number" :value="__('Номер паспорта')" class="text-xl" />
                            <x-text-input id="l" class="block mt-1 w-full text-xl" type="number" name="number" required autofocus />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="bg-blue-700 hover:bg-blue-800 text-xl">
                                {{ __('Сформировать') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
