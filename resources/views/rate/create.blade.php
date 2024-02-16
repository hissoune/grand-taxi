<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto p-4">
            <form action="{{ route('createRate') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="mb-4">
                    <input name="user_id" id="user_id" hidden value="{{ $user->id }}" class="mt-1 p-2 border rounded w-full">
                      
                  
                </div>
        
                <div class="mb-4">
                    <input name="driver_taxi_id" hidden value="{{ $rate->id }}" id="driver_taxi_id" class="mt-1 p-2 border rounded w-full">
                      
                
                </div>
        
                <div class="mb-4">
                    <label for="rate" class="block text-sm font-medium text-gray-600">Rate</label>
                    <input type="number" name="rate" id="rate" placeholder="rate/10" class="mt-1 p-2 border rounded w-full">
                </div>
        
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-600">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="mt-1 p-2 border rounded w-full"></textarea>
                </div>
        
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                </div>
            </form>
        </div>
        
    </x-slot>


</x-app-layout>