<x-app-layout>
    <x-slot name="slot">
                 @foreach ($reservation as $item)

                 {{-- <h1>{{ $item->horaires->routes->startcity->name }}</h1> --}}
                <h1>{{ $item->users->name }}</h1>
                 {{-- <h1>{{ $item->horaire_id }}</h1>
                 <h1>{{ $item->horaire_id }}</h1>
                 <h1>{{ $item->horaire_id }}</h1> --}}
                     
                 @endforeach
    </x-slot>
</x-app-layout>
