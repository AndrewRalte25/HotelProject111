<x-app-layout>
    <x-slot name="header" class="container position-absolute    ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome!!') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="/userhotels" class="list-group-item list-group-item-action bg-light">Hotels</a>
            <a href="/payment" class="list-group-item list-group-item-action bg-light">Payment</a>
            <a href="/profile" class="list-group-item list-group-item-action bg-light">Profile</a>
        </div>
        </div>
    </div>

    
</x-app-layout>