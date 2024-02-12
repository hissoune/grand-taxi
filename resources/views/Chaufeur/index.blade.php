<x-chaufeur-layout>
    @if(isset($driver) && !empty($driver))
        <!-- If $driver is set and not empty -->
        <x-slot name="additionalContent">
            <div class="container my-5">
            <div class="flex justify-around my-6 ">
            <div class="my-5 mx-4"><a href="{{ route('Horaire.create') }}" class="btn bg-blue-500 text-white p-2 rounded">add horaire</a></div>
           <div class="text-center mt-4 text-3xl"><h3>your horaires</h3></div>
            <div class="mb-4">
                <label for="route" class="block text-sm font-medium text-gray-600">votre status</label>
                <select name="status" required class="mt-1 p-2 border rounded-md w-50">
                    <option value="disponible">disponible</option>
                    <option value="in trip">in trip</option>
                    <option value="out of service">out of service</option>
                </select>
            </div>
        </div>
    </div>
            <div class="mt-6 container px-6">

                @forelse ($hor as $item)
                
                        <div class="flex flex-cols-6 justify-between border-black-3 shadow px-6 py-4 my-6 h-100 bg-white">
                            <div>
                                <h1 class="text-2xl font-bold">{{ $driver->description }}</h1>
                                <p>{{ $driver->matricule }}</p>
                                <h4 class="text-lg font-semibold">{{ $driver->number_seets }}</h4>
                            </div>
                            <div>
                                <h1>{{ $driver->typ_veicl }}</h1>
                                <h1>{{ $item->price }}</h1>
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $driver->image) }}" width="100px" alt="Image Alt Text">
                            </div>
                            <div>
                                <h1>{{ $item->created_at }}</h1> 
                            </div>
                            <div>
                                <div>
                                    <div class="my-3">
                                <form action="">
                                    <button class="btn bg-red-500 p-1 rounded ">pus flow</button>
                                </form>
                            </div>
                            <div>
                                <form action="">
                                    <button class="btn bg-green-500 p-1 px-1 rounded ">  run flow</button>
                                </form>
                            </div>
                            </div>
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
