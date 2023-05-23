<x-admin-layout>
    <x-slot name="header">
        <div class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/hotels">Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/userslist">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/payment">Payments</a>
                        </li>
                    </ul>
                </div>
            </div>
           
        </div>
        <h2 class="font-semibold text-xl text-light leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="d-flex" id="wrapper">
            <a class="mt-8 position-absolute end-0 btn btn-dark" href="/hoteladd" role="button">Add Hotel</a>
            <div class="my-3">
                <form method="POST" action="/hotels/filter">
                    @csrf
                    <div class="form-group">
                        <label for="filter_location">Filter by Location:</label>
                        <select class="form-control" id="filter_location" name="filter_location">
                            <option value="">All</option>
                            @php
                                $uniqueLocations = [];
                            @endphp
                            @foreach ($hotels as $hotel)
                                @if (!in_array($hotel->Location, $uniqueLocations))
                                    <option value="{{ $hotel->Location }}">{{ $hotel->Location }}</option>
                                    @php
                                        $uniqueLocations[] = $hotel->Location;
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filter_opening">Filter by Opening Hours:</label>
                        <select class="form-control" id="filter_opening" name="filter_opening">
                            <option value="">All</option>
                            @php
                                $uniqueOpeningHours = [];
                            @endphp
                            @foreach ($hotels as $hotel)
                                @if (!in_array($hotel->Opening, $uniqueOpeningHours))
                                    <option value="{{ $hotel->Opening }}">{{ $hotel->Opening }}</option>
                                    @php
                                        $uniqueOpeningHours[] = $hotel->Opening;
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>


            <div id="page-content-wrapper">
                <div class="container">
                    <h2 class="px-5 mt-4">HOTEL LIST</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>LOCATION</th>
                            <th>OPENING HOURS</th>
                            <th>CONTACT</th>
                            <th>IMAGE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ $hotel->id }}</td>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->Location }}</td>
                                <td>{{ $hotel->Opening }}</td>
                                <td>{{ $hotel->ContactInfo }}</td>
                                <td>{{ $hotel->Image }}</td>
                                <td>
                                    <form action="{{ '/hotels/' . $hotel->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                    <button>
                                        <a href="{{ '/hotels/' . $hotel->id . '/edit' }}">EDIT</a>
                                    </button>
                                    <button>
                                        <a href="{{ '/hotels/' . $hotel->id }}/addroom">VIEW ROOMS</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
