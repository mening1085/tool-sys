@extends('layouts.master')
<style>
    .bg_img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: -1;
        filter: blur(5px);
    }
</style>
@section('content-login')
    <div class="flex items-center h-screen w-full">
        <img class="bg_img" src="{{ asset('bg-login.webp') }}" alt="">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
            <span class="block w-full text-gray-700 text-3xl text-center font-bold mb-4">ระบบยืมคืนอุปกรณ์</span>
            <form class="mb-4" action="/login" method="POST">
                @csrf
                <div class="mb-4 md:w-full">
                    <label for="email" class="block text-l mb-1">Email</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="email"
                        id="email" placeholder="Email" required>
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6 md:w-full">
                    <label for="password" class="block text-l mb-1">รหัสผ่าน</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password"
                        name="password" id="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    class="w-full bg-indigo-500 hover:bg-indigo-600 text-white uppercase text-sm font-semibold px-4 py-2 rounded block">เข้าสู่ระบบ</button>

                <div class="text-center my-4">
                    <hr>
                </div>

                <div class="text-center">
                    <a href="/register"
                        class="text-gray-600 hover:text-gray-900  uppercase text-sm font-semibold">สมัครสมาชิก</a>
                </div>

                {{-- register --}}


            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        @if (Session::has('error'))
            swal({
                title: "Failed!",
                text: "{{ Session::get('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif

        @if (Session::has('success'))
            swal({
                title: "Success!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif
    </script>
@endsection
