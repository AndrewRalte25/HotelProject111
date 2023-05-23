<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="card border" style="background-color: #fbfcfd; color: rgb(15, 15, 15);">
        <div class="card-body mx-4">
            <div style="text-align: center;"> <!-- Added inline CSS -->
                {{-- <img src="{{ asset('/logo/riahrun.png') }}" width="150px" style="margin-top: 20px;"> --}}
                <p class="my-3 mx-5" style="font-size: 50px;">RiahRûn</p> <!-- Centered text -->
            </div>
            <p class="my-3 mx-5" style="font-size: 30px;">Thank you for Booking with us.</p>
            <div class="row">
                <ul class="list-unstyled">
                    <p class="my-3 mx-5" style="font-size: 20px;">Name: <span style="font-family: Candara">{{ Auth::user()->name }}</span></p>
                    <p class="my-3 mx-5" style="font-size: 20px;">Email: <span style="font-family: Candara">{{ Auth::user()->email }}</span></p>
                </ul>
                <hr>
                <p class="my-3 mx-5" style="font-size: 20px;">Hotel Name: <span style="font-family: Candara">{{ $hot->name }}</span></p>
                <p class="my-3 mx-5" style="font-size: 20px;">Event Price: Rs <span style="font-family: Candara">{{ $order->amount }}</span></p>
                <p class="my-3 mx-5" style="font-size: 20px;">Room Number: <span style="font-family: Candara">{{ $order->room_number }}</span></p>
                <p class="my-3 mx-5" style="font-size: 20px;">Payment Date: <span style="font-family: Candara">{{ $order->created_at }}</span></p>

                <div class="col-xl-2">
                    <p class="my-3 mx-5" style="font-size: 20px;">Payment ID</p>
                    <p class="float-end">{{ $order->payment_id }}</p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>
</html>
