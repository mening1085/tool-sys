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

        <div class="flex flex-wrap mb-6 -mx-3">
            {{-- form detail --}}
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Name
                </label>
                <input type="text" value="{{ $user->name }}" disabled
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
            </div>

            <div class="w-full px-3 mb-6 md:mb-0 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Email
                </label>
                <input type="text" value="{{ $user->email }}" disabled
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
            </div>

        </div>
    @endsection
