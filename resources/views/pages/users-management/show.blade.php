@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/admin/users" class="text-xl text-gray-500  font-semibold leading-tight">Users</a>
                <h2 class="mx-1 text-gray-500 ">/</h2>
                <h2 class="text-xl font-semibold text-gray-500 leading-tight">Detail</h2>
            </div>

            <div class="flex items-center justify-end">
                <a href="/users"
                    class="text-gray-500 hover:text-gray-700 font-semibold w-5 h-5 rounded rounded-full flex justify-center items-center">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>

        <hr class="my-4">

        <div class="flex flex-wrap mb-6">
            {{-- form detail --}}

            <div class="w-full px-3 mb-4">
                <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-first-name">
                    ชื่อ
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-200"
                    value="{{ $user->first_name }}" disabled>
            </div>

            <div class="w-full px-3 mb-4">
                <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-first-name">
                    นามสกุล
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-200"
                    value="{{ $user->last_name }}" disabled>
            </div>

            <div class="w-full px-3 mb-4">
                <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500"
                    value="{{ $user->email }}" disabled>
            </div>

            <div class="w-full px-3 mb-4">
                <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-last-name">
                    สถานะ
                </label>
                <div>
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->status == '1' ? 'bg-green-100 text-green-800' : ($user->status == '2' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                        {{ $user->status == 1 ? 'Active' : ($user->status == 2 ? 'Pending' : 'Inactive') }}
                    </span>
                </div>
            </div>


            <div class="w-full px-3 mb-4">
                <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-last-name">
                    วันที่สร้าง
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500"
                    value="{{ $user->created_at }}" disabled>
            </div>

        </div>
    @endsection
