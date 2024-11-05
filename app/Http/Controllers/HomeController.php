<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        $shop = Auth::user();
        $request = $shop->api()->rest('GET', '/admin/shop.json');
        // $request = $shop->api()->graph('{ shop { name } }');
        echo '<pre>';
        print_r($request);
        echo '</pre>';

        $totalProducts = 24;

        $shop = Auth::user(); // This assumes `name`, `email`, and other fields are present
        return view('welcome', [
            'shopDomain' => $shop->name,
            'shopEmail' => $shop->email,
            'totalProducts' => $totalProducts
        ]);
    }

}
