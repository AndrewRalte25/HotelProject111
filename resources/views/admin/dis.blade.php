<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="/hotels" class="list-group-item list-group-item-action bg-light">Hotels</a>
            <a href="/items" class="list-group-item list-group-item-action bg-light">Items</a>
            <a href="/payment" class="list-group-item list-group-item-action bg-light">Payment</a>
            <a href="/profile" class="list-group-item list-group-item-action bg-light">Profile</a>
        </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
    <div id="page-content-wrapper">
        <a class=" mt-8 position-absolute end-0 btn btn-dark" href="/hoteladd" role="button">Add Hotel</a>
        <H2 class = 'px-5 mt-4'>HOTEL LIST</h2>
       
        <div class="container position-absolute top-50 start-50 translate-middle " style="display: flex; justify-content: center; align-items: center; height: 30vh">
            
        
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
                @foreach ($hotels as $Hot)

                    <tr>
                      <td>{{ $Hot->id }}</td>
                      <td>{{ $Hot->name }}</td>
                      <td>{{ $Hot->Location }}</td>
                      <td>{{ $Hot->Opening }}</td>
                      <td>{{ $Hot->ContactInfo }}</td>
                      <td>{{ $Hot->Image }}</td>
                      <td>
                        
    
                        <form action="{{ '/hotels/' . $Hot->id }}" method="post">
                            @csrf
                            @method('DELETE')
    
                            <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                        
                        <button>
                                 <a href="{{ '/hotels/' . $Hot->id .'/'.'edit'}}">EDIT</a>
                        </button>
                        
                       
                        <button>
                            <a href="{{ '/hotels/' . $Hot->id }}/addroom">VIEW ROOMS</a>
                        </button>
                        
                        
                      </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            
        </div>
    </div>
</div>
</x-admin-layout>
