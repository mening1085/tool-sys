<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <title>
        ระบบยืมคืนอุปกรณ์
    </title>
    @include('partials.styles')


    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }
    </style>
    @vite('resources/js/app.js')

</head>


<body class="bg-white text-gray-600 leading-normal text-base tracking-normal">

    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 py-1 bg-gray-200">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">


            <div class="order-1 md:order-2">
                <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                    href="/">
                    <i class="fas fa-toolbox text-gray-800 pr-3 text-4xl"></i>
                    ยืมคืนอุปกรณ์
                </a>
            </div>

            <div class="order-2 md:order-3 flex items-center" id="nav-content">

                <a class="inline-block no-underline hover:text-black" href="#">
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <circle fill="none" cx="12" cy="7" r="3" />
                        <path
                            d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                    </svg>
                </a>

                <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>

            </div>
        </div>
    </nav>

    <!--List-->
    <div class="container mx-auto h-screen">

        @yield('content')

        <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
            <div class="container text-center px-3 py-8 ">
                <h3 class="font-bold text-gray-900">This is Footer</h3>
                <p class="py-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus
                    commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                </p>
            </div>
        </footer>
    </div>


    @include('partials.scripts')
</body>

</html>
