@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/admin/users" class="text-xl text-gray-500  font-semibold leading-tight">Users</a>
                    <h2 class="mx-1 text-gray-500 ">/</h2>
                    <h2 class="text-xl font-semibold text-gray-500 leading-tight">Create</h2>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
            </div>

            <hr class="my-4">

            <!-- Way 1: Display All Error Messages -->
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="flex flex-wrap mb-6 -mx-3">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-first-name">
                        ชื่อ
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        value="{{ old('first_name') }}" id="grid-first-name" type="text" name="first_name"
                        placeholder="First Name" required>
                    <!-- Way 2: Display Error Message -->
                    @error('first_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-first-name">
                        นามสกุล
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        value="{{ old('last_name') }}" id="grid-first-name" type="text" name="last_name"
                        placeholder="Last Name" required>
                    <!-- Way 2: Display Error Message -->
                    @error('last_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-last-name">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        value="{{ old('email') }}" id="grid-last-name" type="email" name="email" placeholder="Email"
                        required>
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-gray-700 text-x font-bold mb-2" for="grid-password">
                        รหัสผ่าน
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="password" name="password" placeholder="******************" required>
                    <!-- Way 3: Display Error Message -->
                    @if ($errors->has('password'))
                        <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap  -mx-3 mb-6 px-3">
                {{-- <div class="w-full px-3"> --}}
                <div class="flex items-center mr-3">
                    <input id="status-1" type="radio" value="1" name="status"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Active
                    </label>
                </div>
                <div class="flex items-center">
                    <input checked id="status-2" type="radio" value="0" name="status"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Inactive
                    </label>
                </div>

                {{-- </div> --}}
            </div>
        </form>
    </div>
@endsection
