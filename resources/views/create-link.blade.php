<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criador de MiniLink') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid justify-items-center">
                    <h1 class="font-bold">Criador de links</h1>
                    <form class="mt-6" method="POST" action="{{ route('url.store') }}">
                        @csrf
                        <x-input-label for="title" value='Título'/>
                        <x-text-input id="title" class="block mt-1" type="text" name="title" :value="old('title')"
                                      required autofocus/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>

                        <div class="mt-2">
                            <x-input-label for="url" value='URL grande'/>
                            <x-text-input id="url" class="block mt-1" type="text" name="url" :value="old('url')"
                                          required autofocus/>
                            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
                        </div>

                        <x-primary-button class="mt-3">
                            {{ 'Gerar mini link' }}
                        </x-primary-button>
                        <div class="mt-2 font-bold">
                            {{  $link ?? '' }}
                        </div>
                        <div class="mt-2 text-red-600 font-bold">
                            {{ $redirect_error ?? '' }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
