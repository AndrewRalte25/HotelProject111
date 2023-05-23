<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-light leading-tight">
         
          {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
          <nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
        </nav>
        
        
       
        </h2>
    </x-slot>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
    
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
    <div id="page-content-wrapper">
</x-admin-layout>
