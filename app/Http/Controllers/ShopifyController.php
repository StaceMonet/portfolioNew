<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ShopifyController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => config('shopify.access_token'),
            'Content-Type' => 'application/json',
        ])->get('https://' . config('shopify.store_url') . '/admin/api/' . config('shopify.api_version')
 . '/products.json');

        $products = $response->json()['products'];

        return view('shopify.products', compact('products'));
    }
}
