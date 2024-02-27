<x-app-layout>
    @role('Admin')
        <x-slot name="slot">
   
<!---===================== FIRST ROW CONTAINING THE  STATS CARD STARTS HERE =============================-->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 bg-white py-10 px-14">

    <!-- First Stats Container -->
    <div class="container mx-auto mb-4">
        <div class="w-full bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-red-400 flex items-center justify-center">
                <p class="text-white text-lg">PASSAGERS</p>
            </div>
            <div class="flex justify-center pt-6 mb-2 text-sm text-gray-600">
                <!-- Your content for the first column goes here -->
            </div>
            <p class="py-4 text-3xl text-center">{{ $passagers->count() }}</p>
        </div>
    </div>

    <!-- Second Stats Container -->
    <div class="container mx-auto mb-4">
        <div class="w-full bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-blue-500 flex items-center justify-center">
                <p class="text-white text-lg">DRIVERS</p>
            </div>
            <div class="flex justify-center pt-6 mb-2 text-sm text-gray-600">
                <!-- Your content for the second column goes here -->
            </div>
            <p class="py-4 text-3xl text-center">{{ $drivers->count() }}</p>
        </div>
    </div>

    <!-- Third Stats Container -->
    <div class="container mx-auto mb-4">
        <div class="w-full bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-purple-400 flex items-center justify-center">
                <p class="text-white text-lg">ROUTES</p>
            </div>
            <div class="flex justify-center pt-6 mb-2 text-sm text-gray-600">
                <!-- Your content for the third column goes here -->
            </div>
            <p class="py-4 text-3xl text-center">{{ $routes->count() }}</p>
        </div>
    </div>

    <!-- Fourth Stats Container -->
    <div class="container mx-auto mb-4">
        <div class="w-full bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-purple-900 flex items-center justify-center">
                <p class="text-white text-lg">SCHEDULES</p>
            </div>
            <div class="flex justify-center pt-6 mb-2 text-sm text-gray-600">
                <!-- Your content for the fourth column goes here -->
            </div>
            <p class="py-4 text-3xl text-center">{{ $horrs->count() }}</p>
        </div>
    </div>

    <!-- Fifth Stats Container -->
    <div class="container mx-auto mb-4">
        <div class="w-full bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
            <div class="h-20 bg-purple-900 flex items-center justify-center">
                <p class="text-white text-lg">CITIES</p>
            </div>
            <div class="flex justify-center pt-6 mb-2 text-sm text-gray-600">
                <!-- Your content for the fifth column goes here -->
            </div>
            <p class="py-4 text-3xl text-center">{{ $citys->count() }}</p>
        </div>
    </div>

</div>

        </x-slot>
    @endrole
    @role('Chaufeur')
        <x-slot name="slot">
           
        </x-slot>
    @endrole

    @role('passager')
        <x-slot name="slot">
            <div class="h-full">
                <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center justify-center">
                    <!--Left Col-->
                    <div class="flex flex-col items-center justify-center w-full h-full">
                        <div class="flex justify-center">
                            <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
                                find
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
                                    your ROUTE
                                </span>
                                to travel!
                            </h1>
                        </div>
                        <div class="bg-gray-900 opacity-75 w-1/2 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
                            <form action="{{ route('search') }}" method="GET">
                                <label for="route">Route:</label>
                                <select name="route" id="route" onchange="this.form.submit()" class="w-full">
                                    <option value="" disabled selected>select your travel</option>
                                    @foreach($routes as $item)
                                        <option value="{{ $item->id }}">{{ $item->startcity->name }} to {{ $item->endcity->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>

                    <!--Right Col-->
                    <div class="w-full xl:w-3/5 p-12 overflow-hidden mb-6">
                        <h1 class="btn bg-blue-500 mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6 text-center text-white text-3xl p-3">your travels </h1>
                    </div>
                </div>

                <div>
                    <div class="flex justify-center">                    
                        <h1 class="text-center font-bold text-3xl border-b pb-4 w-1/2">your favorates </h1>
                     </div>
                     <div class="mt-6 container px-6 flex flex-wrap">
                        @forelse ($horrs as $item)
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
                            <h1>there is no favorates fore you</h1>
                        </div>
                        @endforelse
                    </div>

                </div>

                <div>
                    @if(isset($hors))
                        <x-search :hores='$hors' :rout="$rout" />
                    @endif
                </div>
            </div>
        </x-slot>
    @endrole
</x-app-layout>
