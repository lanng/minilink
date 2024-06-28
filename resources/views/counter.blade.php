<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contador de Clicks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid justify-items-center">
                    <h1 class="font-bold">Contador de clicks</h1>
                    <span>Coloque o sue mini link para saber quantos acessos ele já teve</span>
                    <form class="mt-6" action="{{route('counter')}}" method="POST">
                        <x-input-label for="url" value='URL grande'/>
                        <x-text-input id="url" class="block mt-1" type="text" name="url" :value="old('url')" required
                                      autofocus/>
                        <x-input-error :messages="$errors->get('url')" class="mt-2"/>

                        <x-primary-button class="mt-3">
                            {{ 'Enviar' }}
                        </x-primary-button>
                    </form>
{{--                    move to dashboard - testing --}}
                    @foreach($links as $link)
                        <p>{{ $link->title ?? '' }}</p>
                        <p>localhost/{{ $link->shortener_url ?? ''}}</p>
                    @endforeach
{{--                    dashboard--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
