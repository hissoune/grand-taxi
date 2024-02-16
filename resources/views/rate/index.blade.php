<x-app-layout>
    <x-slot name="slot">
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
           <ul>
              
                   <li class="text-center">you can rate and comment for the driver by clicking on his name</li>
          
           </ul>
       </div>
                 @foreach ($rates as $item)
                 <div class="flex flex-cols-5 justify-center ">
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-2 mb-4  flex justify-center">
                        <div class="border-black-3 shadow px-6 bg-gray-200 rounded my-6 py-1 w-1/2">
                            <div class="my-4  flex  ">
                                {{-- <img src="storage/{{ $item->user->image}}" alt="user image"> --}}
                               {{-- {{ dd($item->user->image) }} --}}
                                <img src="storage/{{ $item->user->image}}" class="rounded-full border" width="100px" alt="user image">
                                <div class="flex flex-column items-center">
                                <h1 class="text-2xl mx-3 font-bold"> {{ $item->user->name}} </h1>
                            </div>
                                
                            </div>
                            
                            <div class="mb-4">
                                <h1>rates with :   {{$item->rate }}/10</h1>
                               
                            </div>
                           
                            <div class="mb-4 ">
                                <h1 class="border-b border-gray-900 mb-3 ">comment:</h1>
                                <h1 class="mx-5">    {{ $item->comment }}</h1> 
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                     
                 @endforeach
    </x-slot>
    
</x-app-layout>
