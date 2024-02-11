<x-app-layout>

    <x-slot name="slot">
        <div class="mt-6 container px-6">
            @foreach ($hors as $item)
                @foreach($item->drivert as $driver)
                    <div class="flex flex-cols-6 justify-between border-black-3 shadow px-6 py-1 mb-6">
                        <div class="w-full">
                            <h1 class="text-2xl font-bold">{{ $driver->description }}</h1>
                            <p>{{ $driver->matricule }}</p>
                            <h4 class="text-lg font-semibold">{{ $driver->number_seets }}</h4>
                        </div>
                        <div class="w-full">
                            <h1>{{ $driver->typ_veicl }}</h1>
                            <h1>{{ $driver->price }}</h1>
                        </div>
                        <div class="w-full">
                            <img src="{{ asset('storage/' . $driver->image) }}" width="100px" alt="Image Alt Text">
                        </div>
                        <div class="w-full">
                            <h1>{{ $item->created_at }}</h1> 
                            
                        </div>
                        <div class="w-full">
                            <a href="#">reserver</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </x-slot>

</x-app-layout>
