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
        </div>
      </div>
    </div>
        @foreach ($Hotel as $Hot)
        
        <div class="container border border-dark pt-5 mt-5">
            <div class="row text-center">
              <div class="col-6 my-auto">
                    Name:
                    {{ $Hot->name }}</td><br>
                    Location:
                    {{ $Hot->Location }}</td><br>
                    Opening Hours:
                    {{ $Hot->Opening }}</td><br>
                    Contact Information:
                    {{ $Hot->ContactInfo }}</td>
              </div>
              <div class="col-6 justify-content-center">
                <img src="{{ $Hot->Image }}" class="img-fluid img-thumbnail mx-auto d-block" alt="mobile screen">
              </div>
            </div>
            <button>
              <a href="{{ '/display/' . $Hot->id }}">More Details</a>
            </button>

            {{-- <div class="card-body text-center">
              <form action="/razorpaypayment" method="POST" >
                  @csrf 
                  <script src="https://checkout.razorpay.com/v1/checkout.js"
                          data-key="{{ env('RAZOR_KEY') }}"
                          data-amount="500"
                          data-buttontext="Pay"
                          data-name="RiahRun" 
                          data-description="Razorpay payment"
                          data-image="/images/logo-icon.png"
                          data-prefill.name=""
                          data-prefill.email=""
                          data-theme.color="#ff7529">
                  </script>
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
              </form>
              </div> --}}
          </div>
         
        
          
        
        @endforeach


</x-app-layout>
