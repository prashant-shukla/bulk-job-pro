<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Shopify\Clients\Rest;

class HomeController extends Controller
{
    public function welcome()
    {
        $shop = Auth::user(); // This assumes `name`, `email`, and other fields are present
        return view('welcome', [
            'shopDomain' => $shop->name,
            'shopEmail' => $shop->email,
        ]);
    }

}
