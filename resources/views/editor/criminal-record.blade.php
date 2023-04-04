<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Внести судимость') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('api/editor/criminal-record') }}">
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

                        <div class="mt-4">
                            <x-input-label for="conviction_date" :value="__('Дата осуждения')" class="text-xl" />
                            <x-text-input id="l" class="block mt-1 w-full text-xl" type="date" name="conviction_date" required autofocus />
                            <x-input-error :messages="$errors->get('conviction_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="court_name" :value="__('Название суда')" class="text-xl" />
                            <x-text-input id="l" class="block mt-1 w-full text-xl" type="text" name="court_name" required autofocus />
                            <x-input-error :messages="$errors->get('court_name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="criminal_code" :value="__('Статья УК РФ')" class="text-xl" />
                            <x-text-input id="l" class="block mt-1 w-full text-xl" type="number" name="criminal_code" required autofocus />
                            <x-input-error :messages="$errors->get('criminal_code')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="bg-blue-700 hover:bg-blue-800 text-xl">
                                {{ __('Внести') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
