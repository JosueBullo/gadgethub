<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart; // Assuming you have a Cart model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('customer.cusproducts', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
    
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        if ($product) {
            $cart = Session::get('cart', []);
            $cart[$product->id] = [
                'id' => $product->id, // Include the product ID
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity ?? 1,
            ];
            Session::put('cart', $cart);
    
            return response()->json(['success' => 'Product added to cart']);
        }
    
        return response()->json(['error' => 'Product not found'], 404);
    }
    
}
