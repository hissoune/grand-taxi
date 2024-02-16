<x-chaufeur-layout>
    @if(isset($driver_taxi) && !empty($driver_taxi))
        <!-- If $driver is set and not empty -->
        <x-slot name="additionalContent">
            <div class="container my-5">
            <div class="flex justify-around my-6 ">
            <div class="my-5 mx-4"><a href="{{ route('Horaire.create') }}" class="btn bg-blue-500 text-white p-2 rounded">add horaire</a></div>
           <div class="text-center mt-4 text-3xl"><h3>your horaires</h3></div>
            <div class="mb-4">
                <form action="{{ route('Chaufeur.update',$driver_taxi) }}" method="POST">
                    @csrf
                    @method('PATCH')
                <label for="route" class="block text-sm font-medium text-gray-600">votre status</label>
                <select name="status" required class="mt-1 p-2 border rounded-md w-50" onchange="this.form.submit()">
                    <option value="disponible" {{ ($driver_taxi->status=='disponible')?'selected':''}} >disponible</option>
                    <option value="in trip" {{ ($driver_taxi->status=='in trip')?'selected':''}}>in trip</option>
                    <option value="out of service" {{ ($driver_taxi->status=='out of service')?'selected':''}}>out of service</option>
                </select>
            </form>
            </div>
        </div>
    </div>
            <div class="mt-6 container px-6">

                @forelse ($hor as $item)
                
                        <div class="flex flex-cols-6 justify-between border-black-3 shadow px-6 py-4 my-6 h-100 bg-white">
                            <div>
                                <h1 class="text-2xl font-bold">{{ $driver_taxi->description }}</h1>
                                <p>{{ $driver_taxi->matricule }}</p>
                                <h4 class="text-lg font-semibold">{{ $driver_taxi->number_seets }}</h4>
                            </div>
                            <div>
                                <h1>{{ $driver_taxi->typ_veicl }}</h1>
                                <h1>{{ $item->price }}</h1>
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $driver_taxi->image) }}" width="100px" alt="Image Alt Text">
                            </div>
                            <div  class=" flex-column items-center justify-between">
                                <div><h1>{{ $item->created_at }}</h1> </div>
                                <div>
                             <h1>reservations ({{ $item->reservations->count() }}/{{ $driver_taxi->number_seets }})</h1> 
                            </div>
                            <div>
                                @if ($item->reservations->count() == $driver_taxi->number_seets )
                                <h1 class="bg-yellow-700 p-3">this trip is full</h1>
                                @endif
                            </div>
                            </div>
                            <div class="flex flex-column items-center">
                               
                                    @if($item->disable==false)
                                     
                                   
                                    <div">
                                <form action="{{ route('Horaire.update',$item) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button class="btn bg-red-500 p-1 text-white rounded ">pus flow</button>
                                </form>
                            </div>
                            @else  
                            <div>
                                <form action="{{ route('Horaire.update',$item) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button class="btn bg-green-500 p-1 text-white px-1 rounded ">  run flow</button>
                                </form>
                            </div>
                            @endif
                         
                            </div>
                        </div>
                        @empty
                            
                    fuck you
                @endforelse
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
