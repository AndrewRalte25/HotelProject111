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
        <form method="POST" action="/users/filter">
            @csrf
            <div class="form-group">
                <label for="filter_location">Filter by Location:</label>
                <select class="form-control" id="filter_location" name="filter_location">
                    <option value="">All</option>
                    @php
                        $uniquename = [];
                    @endphp
                    @foreach ($users as $user)
                        @if (!in_array($user->name, $uniquename))
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @php
                                $uniquename[] = $user->name;
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
                        $uniqueemail = [];
                    @endphp
                    @foreach ($users as $user)
                        @if (!in_array($user->Opening, $uniqueemail))
                            <option value="{{ $user->email }}">{{ $user->email }}</option>
                            @php
                                $uniqueemail[] = $user->email;
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
            <h2 class="px-5 mt-4">USER LIST</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ '/userlist/' . $user->id }}" method="post">
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
        </div>
    </div>
</x-admin-layout>
