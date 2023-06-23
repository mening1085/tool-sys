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
            <form class="mb-4" action="/register" method="POST">
                @csrf
                {{-- First Name --}}
                <div class="mb-4 md:w-full">
                    <label for="first_name" class="block text-l mb-1">ชื่อ</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text"
                        value="{{ old('first_name') }}" name="first_name" id="first_name" placeholder="First Name" required>
                    @error('first_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Last Name --}}
                <div class="mb-4 md:w-full">
                    <label for="last_name" class="block text-l mb-1">นามสกุล</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text"
                        value="{{ old('last_name') }}" name="last_name" id="last_name" placeholder="Last Name" required>
                    @error('last_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 md:w-full">
                    <label for="email" class="block text-l mb-1">Email</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="email"
                        value="{{ old('email') }}" id="email" placeholder="Email" required>
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

                {{-- confirm password --}}
                <div class="mb-6 md:w-full">
                    <label for="password_confirmation" class="block text-l mb-1">ยืนยันรหัสผ่าน</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password"
                        name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- submit --}}
                <button
                    class="w-full bg-indigo-500 hover:bg-indigo-600 text-white uppercase text-sm font-semibold px-4 py-2 rounded block">สมัครสมาชิก</button>

                <div class="text-center my-4">
                    <hr>
                </div>

                <div class="text-center">
                    <a href="/login"
                        class="text-gray-600 hover:text-gray-900  uppercase text-sm font-semibold">เข้าสู่ระบบ</a>
                </div>
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
    </script>
@endsection
