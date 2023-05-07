@extends('layouts.master')
@section('content-login')
    <div class="flex items-center h-screen w-full">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
            <span class="block w-full text-gray-700 text-3xl text-center font-bold mb-4">ระบบยืมคืนอุปกรณ์</span>
            <form class="mb-4" action="/login" method="POST">
                @csrf
                <div class="mb-4 md:w-full">
                    <label for="email" class="block text-l mb-1">รหัสประจำตัว หรือ NUNET Account </label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="email"
                        id="email" placeholder="รหัสประจำตัว หรือ NUNET Account">
                </div>
                <div class="mb-6 md:w-full">
                    <label for="password" class="block text-l mb-1">รหัสผ่าน</label>
                    <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password"
                        name="password" id="password" placeholder="Password">
                </div>
                <button
                    class="w-full bg-indigo-500 hover:bg-indigo-600 text-white uppercase text-sm font-semibold px-4 py-2 rounded block">Login</button>
            </form>
        </div>
    </div>
@endsection
