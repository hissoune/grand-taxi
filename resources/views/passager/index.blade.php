<x-app-layout>

    <x-slot name="slot">
        <div class="mt-6 container px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 justify-center">
            @forelse ($hors as $item)
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 px-2 mb-4">
                    <div class="border border-black-3 shadow bg-gray-200 rounded my-6 py-1">
                        <!-- Your card content goes here -->
                        <div class="mb-4 ">
                            <h1 class="text-2xl font-bold">{{ $item->driver_taxi->user->name}}</h1>
                            <!-- Other card content -->
                        </div>
                        <div class="flex justify-around">
                           <div class="mb-4">
                            <img src="{{ asset('storage/' . $item->driver_taxi->image) }}" width="200px"  alt="Image Alt Text">
                        </div>
                        <div>
                            <div class="mb-4">
                                <h1 class="text-2xl font-bold">{{ $item->driver_taxi->user->name}}</h1>
                                <h1 class="text-2xl font-bold">{{$item->driver_taxi->description }}</h1>
                                <p>{{ $item->driver_taxi->matricule }}</p>
                                <h4 class="text-lg font-semibold">{{ $item->driver_taxi->number_seets }}</h4>
                            </div>
                            <div class="mb-4">
                                <h1>{{$item->driver_taxi->typ_veicl }}</h1>
                                <h1>{{ $item->price }}</h1>
                            </div>
                        </div>

                        </div>
                        
                        <div class="mb-4">
                            <h1>{{ $item->created_at }}</h1>
                        </div>
                        <div>
                            @if ($item->reservations->count() ==$item->driver_taxi->number_seets)
                               <h1 class="bg-yellow-700 p-3">this trip is full</h1>
                        
                            @else  
                            <form action="{{ route('Reservation.store') }}" method="POST">
                                @csrf
                                <input type="text" hidden name="horaire_id" value="{{ $item->id }}">
                                <button class="btn bg-yellow-500 rounded p-1 text-white">reserver</button>
                            </form>
                            @endif
                        </div>
                        <!-- End of card content -->
                    </div>
                </div>
                @empty
                <div class="bg-red-100 w-full flex justify-center border text-center border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <h1>there is no favorates fore you</h1>
                </div>
              
            @endforelse
        </div>
    </x-slot>

</x-app-layout>
