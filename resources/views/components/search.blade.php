@props(['hores','rout'])

<div>
    <div class="flex justify-center">                    
        <h1 class="text-center font-bold text-3xl border-b mt-6 py-4 w-1/2">search results </h1>
     </div>
   <div>
    <form action="{{ route('filter.price') }}">
        <label for="price">filter by price</label>
        <input type="text" hidden name="route" value="{{ $rout }}">

        <input type="checkbox" id="price" name="price" onchange="this.form.submit()">

        <label for="rate">filter by rate</label>
        <input type="checkbox" id="rate" name="rate" onchange="this.form.submit()">
    </form>
    {{-- <form action="{{ route('filter.rate') }}">
        <label for="rate">filter by price</label>
        <input type="text" name="route" value="{{ $rout }}">
        <input type="checkbox" id="rate" name="rate" onchange="this.form.submit()">
    </form> --}}
   </div>
        <div class="mt-6 container px-6 flex flex-wrap">
            @forelse ($hores as $item)
            <div class="flex justify-center">
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-2 mb-4 rounded items-center">
                    <div class="border-black-3 shadow px-6 py-6 bg-gray-200 rounded">
                        <div class="mb-4">
                            <h1 class="text-2xl font-bold">driver: {{ $item->driver_taxi->user->name}}</h1>
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $item->driver_taxi->image) }}" width="100px" alt="Image Alt Text">
                            </div>
                            <p>matricule: {{ $item->driver_taxi->matricule }}</p>
                            <h4 class="text-lg font-semibold">seets: {{ $item->driver_taxi->number_seets }}</h4>
                        </div>
                        <div class="mb-4">
                            <h1>marc:  {{$item->driver_taxi->typ_veicl }}</h1>
                            <h1> price : {{ $item->price }}DH</h1>
                            <p class=" border border-gray-900 p-4 rounded my-4">{{$item->driver_taxi->description }}</p>

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
                
            <div class="bg-red-100 w-full border text-center border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <h1>there is no result with this search</h1>
            </div>
            @endforelse
        </div>
</div>