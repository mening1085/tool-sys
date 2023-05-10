<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> --}}
    <script src="https://cdn.tailwindcss.com"></script>
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
                @if (Auth::user())
                    <span class="inline-block no-underline">
                        {{-- <i class="fa-solid fa-user text-2xl"></i> --}}
                        สวัสดีคุณ : {{ Auth::user()->name }}
                    </span>
                    <span class="mx-3">|</span>
                    <form method="GET" action="{{ route('auth.logout') }}">
                        @csrf
                        <a :href="route('logout')" class="inline-block no-underline hover:text-black cursor-pointer"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            ออกจากระบบ
                        </a>
                    </form>
                @else
                    <a class="inline-block no-underline hover:text-black mr-3" href="{{ route('auth.login') }}">
                        <i class="fas fa-sign-in-alt"></i>
                        เข้าสู่ระบบ
                    </a>
                @endif

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
