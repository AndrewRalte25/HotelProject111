<x-app-layout>
    <x-slot name="header" class="container position-absolute    ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome!!') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

<div class="container border border-dark pt-5 mt-5">
    <div class="row text-center">
        <div class="col-6 my-auto">
            <h2>{{ $Hot->name }}</h2>
            <p>Location: {{ $Hot->Location }}</p>
            <p>Opening Hours: {{ $Hot->Opening }}</p>
            <p>Contact Information: {{ $Hot->ContactInfo }}</p>
        </div>
        <div class="col-6 justify-content-center">
            <img src="{{ asset( $Hot->Image) }}" class="img-fluid img-thumbnail mx-auto d-block" alt="mobile screen">

        </div>
    </div>
    <div class="card-body text-center">
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
    </div>
</div>
</x-app-layout>
