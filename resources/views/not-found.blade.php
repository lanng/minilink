<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('404 - NOT FOUND') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid justify-items-center">
                    <h1 class="font-bold text-red-600 block size-12"> URL INVÁLIDA! </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
