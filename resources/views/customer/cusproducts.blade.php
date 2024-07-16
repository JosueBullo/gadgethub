@extends('customer.customerindex')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .product-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .product-card .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
            color: #ff9900;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-add-to-cart {
            background-color: #28a745;
            border: none;
            color: white;
        }
        .btn-add-to-cart:hover {
            background-color: #218838;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            color: #333;
        }
        .text-warning {
            font-weight: bold;
            color: #ff9900;
        }
        .modal-body h5, .modal-body p {
            color: #333;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            opacity: 0.9;
        }
        .modal-img {
            height: 200px; /* Fixed height for modal images */
            width: 100%; /* Ensure full width */
            object-fit: cover; /* Maintain aspect ratio */
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 style="margin-bottom:100px; text-align:center;">Products</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card text-white bg-dark border-light shadow-sm">
                    <img src="{{ asset('storage/product_images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₱{{ number_format($product->price, 2) }}</p>
                        <button class="btn btn-primary" onclick="viewDetails({{ $product->id }})">View Details</button>
                        <button style = "background-color:red" class="btn btn-add-to-cart mt-2" onclick="addToCart({{ $product->id }})">Add to Cart</button>
                        <button style = "background-color:green" class="btn btn-danger btn-add-to-cart mt-2">Buy Now</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Product Details Modal -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="modalProductImage" class="modal-img" />
                    </div>
                    <div class="col-md-6">
                        <h5 id="modalProductName" class="font-weight-bold"></h5>
                        <p class="text-warning" id="modalProductPrice" style="font-size: 1.5rem;"></p>
                        <p id="modalProductCategory" class="text-muted"></p>
                        <p id="modalProductDescription" class="mt-3"></p>
                        <button class="btn btn-primary btn-lg mt-2" onclick="addToCart(currentProductId)">Add to Cart</button>
                        <button class="btn btn-danger btn-lg mt-2">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    let currentProductId;

    function viewDetails(productId) {
        currentProductId = productId;
        $.ajax({
            url: `/customer/products/${productId}`,
            method: 'GET',
            success: function (product) {
                $('#modalProductName').text(product.name);
                $('#modalProductDescription').text(product.description);
                $('#modalProductPrice').text(`₱${parseFloat(product.price).toFixed(2)}`);
                $('#modalProductCategory').text(product.category);
                $('#modalProductImage').attr('src', `{{ asset('storage/product_images/') }}/${product.image}`);
                $('#productDetailsModal').modal('show');
            },
            error: function () {
                alert('Product not found');
            }
        });
    }

    function addToCart(productId) {
        $.ajax({
            url: '/customer/add-to-cart',
            method: 'POST',
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                alert(response.success);
            },
            error: function (response) {
                alert('Error adding product to cart');
            }
        });
    }
</script>

</body>
</html>
