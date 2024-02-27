<x-Admin-layout>
    
    <x-slot name="slot">
        
<div class="relative overflow-x-auto my-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           
            <tr class="">
                <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">routes</h3>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    startcity name
                </th>
                <th scope="col" class="px-6 py-3">
                    endcity name
                </th>
                <th scope="col" class="px-6 py-3">
                   distance
                </th>
                <th scope="col" class="px-6 py-3">
                  duration
                </th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($routes as $item)
                
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                
                <td class="px-6 py-4">
                    {{ $item->startcity->name }}
                </td>
                <td class="px-6 py-4">
                 {{ $item->endcity->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->distance }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->duration }}
                </td>
               
               
            
            @empty
            <td colspan="12"><h1 class="text-center">no horairs</h1></td> 
        </tr>
            @endforelse
        </tbody>
    </table>
   <div class="flex justify-center">{{ $routes->links() }}</div> 
</div>


    </x-slot>
</x-Admin-layout>
