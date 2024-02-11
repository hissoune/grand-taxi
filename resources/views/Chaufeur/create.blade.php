<x-chaufeur-layout>
    <x-slot name="additionalContent">
        <h1 class="text-center">add your taxi issues</h1>
<form action="{{ route('Chaufeur.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf
          <input type="number" name="user_id" hidden value="{{ Auth::id() }}">
    <div class="mb-4">
        <label for="number_seats" class="block text-sm font-medium text-gray-600">Number of Seats:</label>
        <input type="number" name="number_seats" required class="mt-1 p-2 border rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="typ_vehicle" class="block text-sm font-medium text-gray-600">Vehicle Type:</label>
        <input type="text" name="typ_vehicle" required class="mt-1 p-2 border rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="matricule" class="block text-sm font-medium text-gray-600">Matricule:</label>
        <input type="number" name="matricule" required class="mt-1 p-2 border rounded-md w-full">
    </div>
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-600">image:</label>
        <input type="file" name="image" required class="mt-1 p-2 border rounded-md w-full">
    </div>
    <div class="mb-4">
        <label for="route" class="block text-sm font-medium text-gray-600">route:</label>
        <select name="route" required class="mt-1 p-2 border rounded-md w-full">
         @foreach ($Routes as $item)
         <option value="{{ $item->id }}">{{$item->startcity->name  }}  to  {{ $item->endcity->name }}</option>
         @endforeach
            
           
        </select>
    </div>

    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
        <input type="number" name="price" required class="mt-1 p-2 border rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="method_payment" class="block text-sm font-medium text-gray-600">Payment Method:</label>
        <select name="method_payment" required class="mt-1 p-2 border rounded-md w-full">
            <option value="cart">Cart</option>
            <option value="espase">Espase</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
        <textarea name="description" rows="4" required class="mt-1 p-2 border rounded-md w-full"></textarea>
    </div>

    <div class="mb-4 flex justify-center">
        <x-primary-button class="ms-4">
            {{ __('add my taxi') }}
        </x-primary-button>    </div>

</form>
</x-slot>
</x-chaufeur-layout>