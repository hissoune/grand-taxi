<x-app-layout>
    <x-slot name="slot">
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
           <ul>
              
                   <li class="text-center">you can rate and comment for the driver by clicking on his name</li>
          
           </ul>
       </div>
                 @foreach ($reservation as $item)
                 <div class="flex flex-cols-5 justify-center ">
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-2 mb-4  flex justify-center">
                        <div class="border-black-3 shadow px-6 bg-gray-200 rounded my-6 py-1 w-1/2">
                            <div class="mb-4">
                                <p> you : {{ $item->users->name }}</p>
                                 <h5>driver : <a href="{{ route('rate.addRate',$item->horaires->driver_taxi) }}">{{ $item->horaires->driver_taxi->user->name }}</a> </h5> 
                                <h1 class="text-2xl font-bold">route :  {{ $item->horaires->routes->startcity->name}} to {{ $item->horaires->routes->endcity->name}} </h1>
                                <p>{{ $item->horaires->driver_taxi->matricule }}</p>
                            </div>
                            <div class="mb-4">
                                <h1>{{$item->horaires->driver_taxi->typ_veicl }}</h1>
                                <h1>{{ $item->horaires->price }}</h1>
                            </div>
                           
                            <div class="mb-4">
                                <h1>{{ $item->horaires->created_at }}</h1> 
                            </div>
                            @if (now()<=($item->created_at->addDay()))
                            <div>
                                <form action="{{ route('Reservation.destroy',$item) }}" method="POST">
                                    @csrf
                                    @method('delete')
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
