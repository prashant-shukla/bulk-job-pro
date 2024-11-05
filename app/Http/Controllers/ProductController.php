<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SelectedProduct;

class ProductController extends Controller
{
    // Fetch products from Shopify
    public function index()
    {
        $shop = Auth::user();
        // $response = $shop->api()->rest('GET', '/admin/shop.json');

        $products = $shop->api()->graph('
                { products(first: 10) {
                    edges {
                        node {
                        id
                        title
                        handle
                        }
                        cursor
                    }
                    pageInfo {
                        hasNextPage
                    } 
                } } ');

        // dd($products);

        return view('admin.select-products', compact('products'));
    }

    // Save selected products
    public function saveSelection(Request $request)
    {
        $shopId = Auth::user()->id;
        $selectedProductIds = $request->input('selected_products', []);

        // Clear previous selections
        SelectedProduct::where('shop_id', $shopId)->delete();

        // Save new selections
        foreach ($selectedProductIds as $productId) {
            SelectedProduct::create([
                'shop_id' => $shopId,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Products selected successfully!');
    }
}
