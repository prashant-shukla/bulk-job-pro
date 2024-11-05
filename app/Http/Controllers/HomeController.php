<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        $shop = Auth::user();
        // $response = $shop->api()->rest('GET', '/admin/shop.json');
        $response = $shop->api()->graph('{ shop { name } }');

        $response_products = $shop->api()->graph('
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

        echo '<pre> HERE : <hr />';
        print_r(json_encode($response));
        echo '<hr /> # First 10 Products # </pre>';
        print_r(json_encode($response_products));
        echo '<hr />... We GO !!!</pre>';

        $totalProducts = 24;

        $shop = Auth::user(); // This assumes `name`, `email`, and other fields are present
        return view('welcome', [
            'shopDomain' => $shop->name,
            'shopEmail' => $shop->email,
            'totalProducts' => $totalProducts
        ]);
    }

}
