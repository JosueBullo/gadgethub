<!-- resources/views/customer/productdetails.blade.php -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Product Details</h2>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ₱{{ number_format($product->price, 2) }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
                    
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" />
                    @endif

                    <a href="{{ route('customer.cusproducts.index') }}" class="btn btn-primary">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
