<x-app-layout>
   
@role('Chaufeur')
fffffffffffffffffffffffff
@endrole
@role('passager')

<div></div>
<form action="{{ route('search') }}" method="GET">
    
    <label for="route">Route:</label>
    <select name="route" id="route">
        @foreach($route as $item)
        <option value="{{ $item->id }}">{{ $item->startcity->name }} to {{ $item->endcity->name }}</option>
        @endforeach
       
    </select>

    <label for="date">Date:</label>
    <input type="date" name="date" id="date" required>

    <button type="submit">Search</button>
</form>
@if(isset($hors))
    <x-search :hores='$hors' />
@endif


@endrole
   
</x-app-layout>
