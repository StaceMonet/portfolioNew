<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ShopifyController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => env('SHOPIFY_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get('https://' . env('SHOPIFY_STORE_URL') . '/admin/api/' . env('SHOPIFY_API_VERSION') . '/products.json');

        $products = $response->json()['products'];

        return view('shopify.products', compact('products'));
    }
}
