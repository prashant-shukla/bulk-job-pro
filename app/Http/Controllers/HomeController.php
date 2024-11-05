<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Shopify\Clients\Rest;
use PHPShopify\ShopifySDK;

class HomeController extends Controller
{
    public function welcome()
    {
        $shop = Auth::user();
        $request = $shop->api()->rest('GET', '/admin/shop.json');
        // $request = $shop->api()->graph('{ shop { name } }');
        echo "HERE: <pre>";
        print_r($request);
        echo '</pre>';

        $shopify = ShopifySDK::config($this->getShopifyConfig());
        $products = $shopify->Product->get();
        $totalProducts = count($products);    

        $shop = Auth::user(); // This assumes `name`, `email`, and other fields are present
        return view('welcome', [
            'shopDomain' => $shop->name,
            'shopEmail' => $shop->email,
            'totalProducts' => $totalProducts
        ]);
    }

}
