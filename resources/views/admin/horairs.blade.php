<x-Admin-layout>
    
    <x-slot name="slot">
        
<div class="relative overflow-x-auto my-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           
            <tr class="">
                <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">horairs</h3>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    driver name
                </th>
                <th scope="col" class="px-6 py-3">
                    route
                </th>
                <th scope="col" class="px-6 py-3">
                   count of reservations
                </th>
                <th scope="col" class="px-6 py-3">
                  status
                </th>
                <th scope="col" class="px-6 py-3">
                    actions
                  </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($horairs as $item)
                
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $item->driver_taxi->user->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->routes->startcity->name }} TO  {{ $item->routes->endcity->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->reservations->count() }}
                </td>
                <td class="px-6 py-4">
                    {{ ($item->disable)?'not working':'working' }}
                </td>
               
                <td class="px-6 py-4">
                  <form action="{{ route('admin.delethor',$item) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn bg-red-500 text-white rounded p-1">delet this horair</button>
                  </form>
                </td>
            
            @empty
            <td colspan="12"><h1 class="text-center">no horairs</h1></td> 
        </tr>
            @endforelse
        </tbody>
    </table>
</div>


    </x-slot>
</x-Admin-layout>
