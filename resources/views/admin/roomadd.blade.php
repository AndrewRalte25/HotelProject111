<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

<div class="container">

    <form method="POST" action="/hotels/{{ $hotel->id }}/rooms/create/add">

        @csrf

        <div class="form-group">
            <label for="type">Room Type:</label>
            <select class="form-control" id="type" name="type">
                <option value="Standard">Single</option>
                <option value="Deluxe">Double</option>
                <option value="Suite">Suit</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" class="form-control" id="room_number" name="room_number">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</x-admin-layout>