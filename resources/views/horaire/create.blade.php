
<x-chaufeur-layout>
    <x-slot name="additionalContent">
        <h1 class="text-center">add your horaire</h1>
<form action="{{ route('Horaire.store') }}" method="POST"  class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf    
    <div class="mb-4">
        <label for="route" class="block text-sm font-medium text-gray-600">route:</label>
        <select name="route" required class="mt-1 p-2 border rounded-md w-full">
         @foreach ($Routes as $item)
         <option value="{{ $item->id }}">{{$item->startcity->name  }}  to  {{ $item->endcity->name }}</option>
         @endforeach
         <input type="number" name="driver_id" hidden value="{{ $driver->id }}" required class="mt-1 p-2 border rounded-md w-full">

           
        </select>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
        <input type="number" name="price" required class="mt-1 p-2 border rounded-md w-full">
    </div>
    <div class="mb-4 flex justify-center">
        <x-primary-button class="ms-4">
            {{ __('add my horaire') }}
        </x-primary-button>    </div>

</form>
</x-slot>
</x-chaufeur-layout>