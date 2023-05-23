<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-light leading-tight">
            {{ __('Welcome!!') }} {{ Auth::user()->name }}
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/userhotels">Hotels</a>
                            </li>
                            
                          
                          
                        </ul>
                    </div>
                </div>
            </nav>
            </h2>
    </x-slot>

    <div class="container">
        <h1>All ROOMS OF {{ $Hot->name }}</h1>
        <table class="table py-3">
            <thead>
                <tr>
                    
                    <th>ROOM NUMBER</th>
                      
                    <th>ROOM TYPE</th>
                    <th>PRICE</th>
                    <th>    ACTION</th>
                </tr>
            </thead>
            <tbody class="py-7">
                @foreach ($Rooms as $Room)
                <tr>
                    <td>{{ $Room->room_number }}</td>
                    <td>{{ $Room->type }}</td>
                    <td>{{ $Room->price }}</td>
                    

                    <td>             
                        <div class="card-body text-center">
                        <form action="/razorpaypayment" method="POST" >
                            @csrf 
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount="{{ $Room->price*100 }}"
                                    data-buttontext="BOOK"
                                    data-name="RiahRun" 
                                    data-description="Razorpay payment"
                                    data-image="/images/logo-icon.png"
                                    data-prefill.name=""
                                    data-prefill.email=""
                                    data-theme.color="#ff7529">
                            </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="price" value="{{ $Room->price*100 }}">
                        <input type="hidden" name="hotelid" value="{{ $Hot->id }}">
                        <input type="hidden" name="roomnumber" value="{{ $Room->room_number }}">
                        
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
