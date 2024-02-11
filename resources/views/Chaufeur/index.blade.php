<x-chaufeur-layout>
    @if(isset($driver) && !empty($driver))
        <!-- If $driver is set and not empty -->
        <x-slot name="additionalContent">
            <div class="mt-6 container px-6">
                @foreach ($hor as $item)
                    @foreach($item->drivert as $driver)
                        <div class="flex flex-cols-6 justify-between border-black-3 shadow px-6 py-1 h-100">
                            <div>
                                <h1 class="text-2xl font-bold">{{ $driver->description }}</h1>
                                <p>{{ $driver->matricule }}</p>
                                <h4 class="text-lg font-semibold">{{ $driver->number_seets }}</h4>
                            </div>
                            <div>
                                <h1>{{ $driver->typ_veicl }}</h1>
                                <h1>{{ $driver->price }}</h1>
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $driver->image) }}" width="100px" alt="Image Alt Text">
                            </div>
                            <div>
                                <h1>{{ $item->created_at }}</h1> <!-- Assuming created_at is a property of $item, not $item->horairs -->
                            </div>
                            <div>
                                <form action="{{ route('Horaire.update', $item) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <label for="status">Disponible</label>
                                    <input type="checkbox" id="status" name="status"  {{ ($item->status == 'Disponible') ? 'checked' : '' }} >
                                </form>
                                
                                
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </x-slot>
    @else
        <!-- If $driver is empty or not set -->
        <x-slot name="additionalContent">
            <div class="flex flex-col items-center justify-center h-screen">
                <div class="flex flex-col items-center justify-center bg-yellow-500 text-white w-1/2 h-1/3 font-bold px-4 py-2 border rounded">
                    <div>
                        <h1>Your profile is not complete</h1>
                        <p>Please complete your profile</p>
                        <div class="mt-6">
                            <a href="{{ route('Chaufeur.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Complete Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    @endif
</x-chaufeur-layout>
