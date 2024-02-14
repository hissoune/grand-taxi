<x-app-layout>
    <x-slot name="slot">
                 @foreach ($reservation as $item)
                 <div class="flex flex-cols-5 justify-center">
                    <div class="w-300 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-2 mb-4 rounded items-center">
                        <div class="border-black-3 shadow px-6 py-1">
                            <div class="mb-4">
                                <p>{{ $item->users->name }}</p>

                                <h1 class="text-2xl font-bold">{{ $item->horaires->routes->startcity->name}} to {{ $item->horaires->routes->endcity->name}} </h1>
                                <p>{{ $item->horaires->driver_taxi->matricule }}</p>
                            </div>
                            <div class="mb-4">
                                <h1>{{$item->horaires->driver_taxi->typ_veicl }}</h1>
                                <h1>{{ $item->horaires->price }}</h1>
                            </div>
                           
                            <div class="mb-4">
                                <h1>{{ $item->horaires->created_at }}</h1> 
                            </div>
                            @if (now()->isSameDay($item->created_at->addDay()))
                            <div>
                                <form action="{{ route('Reservation.update',$item) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn bg-red-500 rounded p-1 text-white">cancel</button>
                                    </form>                        
                                </div>
                        @endif
                            
                        </div>
                    </div>
                </div>
                
                     
                 @endforeach
    </x-slot>
</x-app-layout>
