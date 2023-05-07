<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    @include('partials.styles')

    <title>
        ระบบยืมคืนอุปกรณ์
    </title>
    @vite('resources/js/app.js')

</head>

<body class="flex bg-indigo-50">
    {{-- @include('loading') --}}

    @if (Route::has('login'))
        @auth
            @include('partials.aside')

            <div class="w-full flex flex-col h-screen overflow-y-hiddenn">

                @include('partials.header')

                <div class="w-full h-full overflow-x-hidden border-t flex flex-col">
                    <main class="w-full flex-grow p-6">
                        @yield('content')
                    </main>
                </div>

                @include('partials.footer')

            </div>
        @else
            @yield('content-login')
        @endauth
    @endif

    @include('partials.scripts')

</body>

</html>
