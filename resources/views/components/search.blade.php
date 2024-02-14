@props(['hores'])

<div>
   
        <div class="mt-6 container px-6 flex flex-wrap">
            @forelse ($hores as $item)
            <div class="flex justify-center">
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-2 mb-4 rounded items-center">
                    <div class="border-black-3 shadow px-6 py-1">
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
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $item->driver_taxi->image) }}" width="100px" alt="Image Alt Text">
                        </div>
                        <div class="mb-4">
                            <h1>{{ $item->created_at }}</h1> 
                        </div>
                        <div>
<form action="{{ route('Reservation.store') }}" method="POST">
    @csrf
    <input type="text" hidden name="horaire_id" value="{{ $item->id }}">
    <button class="btn bg-yellow-500 rounded p-1 text-white">reserver</button>
    </form>                        
</div>
                    </div>
                </div>
            </div>

            @empty
                
      fuuuuuuuck
            @endforelse
        </div>
</div>