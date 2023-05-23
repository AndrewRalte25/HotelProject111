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
                            <a class="nav-link text-white" href="/payment">Payment</a>
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
        <div class="my-3">
            <form method="POST" action="/payment/filter">
                @csrf
                <div class="form-group">
                    <label for="filter_name">Filter by Name:</label>
                    <select class="form-control" id="filter_name" name="filter_name">
                        <option value="">All</option>
                        @php
                            $uniqueNames = [];
                        @endphp
                        @foreach ($pays as $pay)
                            @if (!in_array($pay->name, $uniqueNames))
                                <option value="{{ $pay->name }}">{{ $pay->name }}</option>
                                @php
                                    $uniqueNames[] = $pay->name;
                                @endphp
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_email">Filter by Email:</label>
                    <select class="form-control" id="filter_email" name="filter_email">
                        <option value="">All</option>
                        @php
                            $uniqueEmails = [];
                        @endphp
                        @foreach ($pays as $pay)
                            @if (!in_array($pay->email, $uniqueEmails))
                                <option value="{{ $pay->email }}">{{ $pay->email }}</option>
                                @php
                                    $uniqueEmails[] = $pay->email;
                                @endphp
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_hotel_id">Filter by Hotel ID:</label>
                    <select class="form-control" id="filter_hotel_id" name="filter_hotel_id">
                        <option value="">All</option>
                        @php
                            $uniqueHotelIDs = [];
                        @endphp
                        @foreach ($pays as $pay)
                            @if (!in_array($pay->hotel_id, $uniqueHotelIDs))
                                <option value="{{ $pay->hotel_id }}">{{ $pay->hotel_id }}</option>
                                @php
                                    $uniqueHotelIDs[] = $pay->hotel_id;
                                @endphp
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_room_number">Filter by Room Number:</label>
                    <select class="form-control" id="filter_room_number" name="filter_room_number">
                        <option value="">All</option>
                        @php
                            $uniqueRoomNumbers = [];
                        @endphp
                        @foreach ($pays as $pay)
                            @if (!in_array($pay->room_number, $uniqueRoomNumbers))
                                <option value="{{ $pay->room_number }}">{{ $pay->room_number }}</option>
                                @php
                                    $uniqueRoomNumbers[] = $pay->room_number;
                                @endphp
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <h2 class="px-5 mt-4">PAYMENT LIST</h2>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>HOTEL ID</th>
                                <th>ROOM NO</th>
                                <th>PRICE</th>
                                <th>PAYMENT ID</th>
                            </tr>
                        </thead>    
                        <tbody>
                            @foreach ($pays as $pay)
                                <tr>
                                    <td>{{ $pay->id }}</td>
                                    <td>{{ $pay->name }}</td>
                                    <td>{{ $pay->email }}</td>
                                    <td>{{ $pay->hotel_id }}</td>
                                    <td>{{ $pay->room_number }}</td>
                                    <td>{{ $pay->amount }}</td>
                                    <td>{{ $pay->payment_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
