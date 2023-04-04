<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главная') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-3">
                    <x-responsive-nav-link class="cursor-pointer text-xl" :href="route('criminal-record')">
                        <span>
                            Формирование справки об отсутствии судимости
                        </span>
                    </x-responsive-nav-link>

                    @if (Auth::user()->slugs()->find(1))
                        <x-responsive-nav-link class="cursor-pointer text-xl" :href="route('editor/criminal-record')">
                        <span>
                            Внести судимость
                        </span>
                        </x-responsive-nav-link>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
