<!DOCTYPE html>
<html>
<head>
    <title>Shopify Products</title>
</head>
<body>
    
    
    <div id="app">
        <example-component :products='@json($products)'></example-component>
    </div>

    @vite('resources/js/app.js')

    
    <h1>Shopify Products</h1>
    <ul>
        @foreach($products as $product)
            <li>
                <h2>{{ $product['title'] }}</h2>
                <p>{{ $product['body_html'] }}</p>
                @if(isset($product['images'][0]))
                    <img src="{{ $product['images'][0]['src'] }}" width="200">
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>