<!DOCTYPE html>
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
    <div class="card-body text-center">
      <form action="{{route('payment')}}" method="POST" >
          @csrf 
          <script src="https://checkout.razorpay.com/v1/checkout.js"
                  data-key="{{ env('RAZOR_KEY') }}"
                  data-amount="500"
                  data-buttontext="Pay"
                  data-name="RiahRun" 
                  data-description="Razorpay payment"
                  data-image="/images/logo-icon.png"
                  data-prefill.name="ABC"
                  data-prefill.email="abc@gmail.com"
                  data-theme.color="#ff7529">
          </script>
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
      </form>
  </div>
  </div>
 @endforeach
 </html>
