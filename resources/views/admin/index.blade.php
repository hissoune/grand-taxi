<x-Admin-layout>
    
    <x-slot name="slot">
        
<div class="relative overflow-x-auto my-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           
            <tr class="">
                <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">drivers</h3>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    user name
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                   email verifide
                </th>
                <th scope="col" class="px-6 py-3">
                  rates
                </th>
                <th scope="col" class="px-6 py-3">
                    actions
                  </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drivers as $item)
                
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $item->user->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ ($item->user->email_verified_at)?'yes':'no' }}
                </td>
                <td class="px-6 py-4">
                    @foreach ($item->rate as $rate)
                        <p>{{ $rate->user->name }} : {{ $rate->rate }}/10</p>
                        
                    @endforeach
                    
                </td>
                <td class="px-6 py-4">
                  <form action="{{ route('admin.destroy',$item->user) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn bg-red-500 text-white rounded p-1">delet this driver</button>
                  </form>
                </td>
            
            @empty
            <td colspan="12"><h1 class="text-center">no drivers</h1></td> 
        </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="relative overflow-x-auto my-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           
            <tr class="">
                <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">passagers</h3>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    user name
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                   email verifide
                </th>
                <th scope="col" class="px-6 py-3">
                  reservations
                </th>
                <th scope="col" class="px-6 py-3">
                    actions
                  </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($passagers as $item)
                
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $item->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                    {{ ($item->email_verified_at)?'yes':'no' }}
                </td>
                <td class="px-6 py-4">
                    <p>{{ $item->reservation->count() }} reservations</p>
                    
                </td>
                <td class="px-6 py-4">
                  <form action="{{ route('admin.destroy',$item) }}" method="POST">
                     @csrf
                     @method('delete')
                    <button class="btn bg-red-500 text-white rounded p-1">delet this passager</button>
                  </form>
                </td>
            </tr>
            @empty
               <td colspan="12"><h1 class="text-center">no passagers</h1></td> 
        </tr>
            @endforelse
        </tbody>
    </table>
</div>


    </x-slot>
</x-Admin-layout>
