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

        echo '<pre> HERE : <hr />';
        print_r(json_encode($response));
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
