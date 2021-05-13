<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Payment</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    @php 

        $user_id=Session::get('user_id');
        $form=Session::get('form');
        $to=Session::get('to');
        $class=Session::get('class');
        $date=Session::get('date');
        $train_number=Session::get('train_number');
        $train_name=Session::get('train_name');
        $Total_Seat=Session::get('Total_Seat');
        $price=Session::get('price');
        $Seat[1]=Session::get('Seat[1]');
        $Seat[2]=Session::get('Seat[2]');
        $Seat[3]=Session::get('Seat[3]');
        $Seat[4]=Session::get('Seat[4]');


        $user=DB::table('users_tbl')
        ->where('id',$user_id)
        ->first();
        
        $i=$Total_Seat;


    @endphp


    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ $Total_Seat }}</span>
            </h4>
           
            <ul class="list-group mb-3">
            @while($i > 0 )
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $class }}</h6>
                        <small class="text-muted">Seat number - {{ $Seat[$i] }}</small>
                    </div>
                    <span class="text-muted">{{ $price }}</span>
                </li>
                @php
            $i--;

        @endphp
            @endwhile
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $Total_Seat*$price }}</strong>
                </li>
                
            </ul>
      
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Passenger Info</h4>
            <form method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="name" class="form-control" id="customer_name" placeholder=""
                               value="{{ $user->name }}" required readonly>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" name="contact" class="form-control" id="mobile" placeholder="Mobile"
                               value="{{ $user->contact }}" required readonly>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" name="email" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ $user->email }}" required readonly>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <h4 class="mb-3">Train Info</h4>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Train Number</label>
                        <input type="text" name="train_number" class="form-control" id="customer_name" placeholder=""
                               value="{{ $train_number }}" required readonly>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Train Name</label>
                        <input type="text" name="train_name" class="form-control" id="customer_name" placeholder=""
                               value="{{ $train_name }}" required readonly>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Form</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" name="form" class="form-control" id="mobile" placeholder="Mobile"
                               value="{{ $form }}" required readonly>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">To <span class="text-muted"></span></label>
                    <input type="email" name="to" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ $to }}" required readonly>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Date <span class="text-muted"></span></label>
                    <input type="date" name="date" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ $date }}" required readonly>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
               
               
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 Bangladesh Railway E-Ticket</p>
        <ul class="list-inline">
           
            <li class="list-inline-item"><a href="{{ Url('contact-us') }}">Contact us</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</html>
