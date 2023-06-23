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

        .card-menu-mobile {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.64);
            -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.64);
            -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.64);
            position: relative;
            z-index: 9999;
        }
    </style>
    @vite('resources/js/app.js')

</head>


<body class="bg-white text-gray-600 leading-normal text-base tracking-normal">

    <!--List-->
    <div class="container mx-auto h-screen p-6 mb-6">
        <div class="text-2xl font-bold mb-3">แจ้งการสมัครสมาชิก</div>

        <p class="text-lg mb-3">
            คุณ {{ $user['first_name'] }} {{ $user['last_name'] }} ได้ทำการสมัครสมาชิกเข้ามาในระบบ
        </p>

        <p class="text-lg mb-3">
            กรุณาตรวจสอบข้อมูลและทำการอนุมัติการสมัครสมาชิก
        </p>

        <a href="{{ url('/admin/user-tools') }}" target="_blank">
            <button class="mt-4 rounded-lg border px-4 py-2">
                เข้าสู่เว็บไซต์
            </button>
        </a>
    </div>



    @include('partials.scripts')
</body>

</html>
