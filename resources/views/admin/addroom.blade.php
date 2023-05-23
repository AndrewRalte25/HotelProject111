<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Room') }}
        </h2>
    </x-slot>


    <div class="container">
        <h1>All Rooms for {{ $hotel->name }}</h1>
        
        
        <form method="POST" action="/hotels/{{ $hotel->id }}/rooms/create">
            @csrf
            <button type="submit">ADD ROOM</button>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room Number</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Staus</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->type }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->is_booked }}</td>
                        
                        <td>
                            <form action="{{ '/rooms/' . $room->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>


</x-admin-layout>
