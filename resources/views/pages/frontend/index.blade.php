@extends('layouts.default')

@section('content')
    <section class="container bg-white py-8">

        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
            <div class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                รายการอุปกรณ์
            </div>

            <form action="/" method="post">
                <div class="flex items-center gap-3">
                    <div class="w-full">
                        <input
                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="search" value="{{ old('search') }}" type="text" name="search" placeholder="ค้นหา">
                    </div>
                    <div class="w-full">
                        <select
                            class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state" name="category">
                            <option value="">เลือกประเภท</option>
                            <option value="">เลือกประเภท1</option>
                            <option value="">เลือกประเภท2</option>
                            <option value="">เลือกประเภท3</option>
                        </select>
                    </div>
                    <div class="shrink">
                        <button class="inline-block no-underline hover:text-black" href="#">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>





                </div>
            </form>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @for ($i = 0; $i < 5; $i++)
                <div class="p-6">
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg w-full"
                            src="https://images.unsplash.com/photo-1555982105-d25af4182e4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&h=400&q=80">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">Product Name</p>

                        </div>
                        <p class="pt-1 text-gray-900">£9.99</p>
                    </a>
                </div>
            @endfor
        </div>

    </section>
@endsection
