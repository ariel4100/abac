@include('layouts.partials.header')

    <style>
        .product-item .product-image {
            border-bottom: 1px solid #dddddd;
            position: relative;
        }
        .product-item .product-overlay {
            opacity: 0;
            transition-property: opacity;
            transition-duration: .5s;
            position: absolute;
            background-color: rgba(0,0,0,0.7);
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .product-item:hover .product-overlay {
            opacity: 1;
        }
        .product-item .product-overlay .icon {
            color: #fff;
            padding: 10px 10px 5px;
            border-radius: 50%;
        }
    </style>
<main id="app">
    @yield('content')
</main>

@include('layouts.partials.footer')
