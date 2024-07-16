@extends('customer.customerindex')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Dark background */
        }
        .container {
            max-width: 800px; /* Slimmer container */
        }
        .cart-item {
            margin-bottom: 20px;
        }
        .card {
            height: 100%; /* Equal height for cards */
            background-color: #495057; /* Dark card background */
            color: white;
        }
        .card-img-top {
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Maintain aspect ratio */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Evenly space content */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-light text-center">Your Cart</h1>
    <div class="row">
        @php $cart = Session::get('cart', []); @endphp
        @if(empty($cart))
            <p class="text-light text-center">Your cart is empty!</p>
        @else
            @foreach($cart as $item)
                <div class="col-md-4 cart-item">
                    <div class="card">
                        <img src="{{ asset('storage/product_images/' . $item['image']) }}" class="card-img-top" alt="{{ $item['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <p class="card-text">₱{{ number_format($item['price'], 2) }}</p>
                            <p class="card-text">Quantity: {{ $item['quantity'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
</body>
</html>
