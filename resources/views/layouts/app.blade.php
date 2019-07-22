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
        .product-image{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media only screen and (max-width: 1300px){
            .hide-menu {
                display: none !important;
            }

        }
        @media only screen and (min-width: 1299px){
            .hide-menu-mobile {
                display: none !important;
            }
        }
    </style>
<style>
    #buscador  {
        border-radius: 25%;

    }
    #buscador input[type=search] {

        color: transparent;
        background-color: #2b2b2b;
        margin: 5px;
        width: 100px;
        -webkit-transition: width .35s ease-in-out;
        transition: width .35s ease-in-out;

        -moz-transition: all .5s;



    }

    #buscador input[type=search]:focus {
        color: black;
        cursor: auto;
        width: 250px;
        border: 0px;
        background-color: white;

    }

    #buscador1 input[type=search] {

        color: #000000;
        background-color: #FFFFFF;
        margin: 5px;
        width: 100px;
        -webkit-transition: width .35s ease-in-out;
        transition: width .35s ease-in-out;

        -moz-transition: all .5s;
    }
    input[type=search]:not(.browser-default){
     height: 2rem;
    }

    #buscador1 input[type=search]:focus {
        color: black;
        cursor: auto;
        width: 250px;
        border: 0px;
        background-color: white;

    }
    #buscador1 ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #000000;
        opacity: 1; /* Firefox */
    }
    .sub-nav .nav-wrapper ul li > a{
        font-size: 12px !important;
    }
    nav ul a:hover {
        background-color: unset;
    }
    @media only screen and (max-width: 858px) {
        #buscador input[type=search] {

            color: #000000;
            background-color: #FFFFFF;
            margin: 5px;
            width: 100px;
            -webkit-transition: width .35s ease-in-out;
            transition: width .35s ease-in-out;

            -moz-transition: all .5s;
        }
        #buscador input[type=search]:focus {
            color: black;
            cursor: auto;
            width: 250px;
            border: 0px;
            background-color: white;

        }
        #buscador ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #000000;
            opacity: 1; /* Firefox */
        }
    }

</style>
<main id="app">
    @yield('content')
</main>

@include('layouts.partials.footer')
