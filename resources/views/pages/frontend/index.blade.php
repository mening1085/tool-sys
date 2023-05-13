@extends('layouts.default')

@section('content')
    <section class="container relative bg-white py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 xl:px-0 lg:px-4 md:px-5 px-4">

            {{-- List --}}
            <section class="list_items col-span-2">

                <div class="block lg:hidden">
                    <div class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                        รายการอุปกรณ์
                    </div>
                    <form action="{{ route('save.cart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table-auto border w-full my-5">
                            <thead>
                                <tr>
                                    <th width="50%" class="text-left border p-2">รายการ</th>
                                    <th width="25%" class="border p-2">จำนวน</th>
                                    <th width="25%" class="border p-2">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $item)
                                        @php $total += $item['qty'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="border p-2">
                                                <div class="flex items-center">
                                                    <img src="{{ url('/images/' . $item['image']) }}" width="50"
                                                        height="50" class="object-cover rounded-xl" />
                                                    <div class="line-clamp-1 pl-2 hidden lg:hidden xl:flex">
                                                        {{ $item['title'] }}
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="border">
                                                <div class="flex justify-center items-center">
                                                    <input id="{{ 'qtyInput' . $id }}"
                                                        class="border qty rounded w-14 text-center update-cart"
                                                        type="number" value="{{ $item['qty'] }}" name="qty" />

                                                </div>
                                            </td>
                                            <td class="border">
                                                <div class="flex justify-around items-center">
                                                    <button class="btn btn-danger btn-sm remove-from-cart">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center border p-5">
                                            <h1>ไม่พบรายการ</h1>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                        <button
                            class="mt-4 rounded w-full h-14 flex justify-center bg-gray-400 hover:bg-gray-600 text-white items-center">
                            <span>ยืนยัน</span>
                        </button>
                    </form>
                    <hr class="my-4">
                </div>


                {{-- Filter --}}
                <div
                    class="w-full container flex flex-wrap items-center justify-end lg:justify-between mt-0 px-0 py-3 sm:px-6">
                    <div
                        class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl hidden lg:block">
                        รายการอุปกรณ์
                    </div>

                    <form action="{{ url('/') }}" method="get">
                        <div class="w-full flex items-center gap-3 my-3 sm:my-0">
                            <div class="w-full">
                                <input
                                    class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="search" value="{{ request()->get('search') }}" type="text" name="search"
                                    placeholder="ค้นหา">
                            </div>
                            <div class="w-full">
                                <select
                                    class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="category">
                                    <option value="" @if (request()->get('category') == '') selected @endif>เลือกประเภท
                                    </option>

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

                {{-- Items --}}
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                    @foreach ($data as $key => $item)
                        <div class="border rounded-2xl overflow-hidden">
                            <img class="hover:grow hover:shadow-lg w-full h-60  object-cover"
                                src="{{ url('/images/' . $item->image) }}">

                            <div class="p-1 text-center break-normal hover:break-all line-clamp-1">
                                {{ $item->title }}
                            </div>

                            <hr>

                            <form action="{{ route('add.to.cart', $item->id) }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex justify-between items-center px-3 py-2">
                                    <div class="pt-1 text-gray-900 text-center text-sm">
                                        จำนวน <span class="font-bold">{{ $item->qty }}</span> ชิ้น
                                    </div>
                                    <div class="flex items-center">
                                        <div class="text-gray-900 text-center mr-2">
                                            <input type="number"
                                                class="w-14 h-8 text-center border rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-gray-200"
                                                value="1" min="1" max="{{ $item->qty }}" name="qty">
                                        </div>
                                        <div>
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <input type="hidden" value="{{ $item->title }}" name="title">
                                            <input type="hidden" value="{{ $item->image }}" name="image">

                                            <button type="submit" href="{{ route('add.to.cart', $item->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white w-8 h-8 rounded-full flex justify-center items-center cursor-pointer">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    @endforeach
                </div>


                {{-- Paginate --}}
                <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
                    {{ $data->links('vendor.pagination.custom') }}
                </div>
            </section>

            {{-- Cart --}}
            <div class="col-span-1 border-l-2 px-6 hidden md:hidden lg:block">
                <form action="{{ route('save.cart', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table-auto border w-full">
                        <thead>
                            <tr>
                                <th width="50%" class="text-left border p-2">รายการ</th>
                                <th width="25%" class="border p-2">จำนวน</th>
                                <th width="25%" class="border p-2">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $item)
                                    @php $total += $item['qty'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="border p-2">
                                            <div class="flex items-center">
                                                <img src="{{ url('/images/' . $item['image']) }}" width="50"
                                                    height="50" class="object-cover rounded-xl" />
                                                <div class="line-clamp-1 pl-2 hidden lg:hidden xl:flex">
                                                    {{ $item['title'] }}
                                                </div>
                                            </div>

                                        </td>
                                        <td class="border">
                                            <div class="flex justify-center items-center">
                                                <input id="{{ 'qtyInput' . $id }}"
                                                    class="border qty rounded w-14 text-center update-cart" type="number"
                                                    value="{{ $item['qty'] }}" name="qty" />

                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex justify-around items-center">
                                                <button class="btn btn-danger btn-sm remove-from-cart">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center border p-5">
                                        <h1>ไม่พบรายการ</h1>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <button
                        class="mt-4 rounded w-full h-14 flex justify-center bg-gray-400 hover:bg-gray-600 text-white items-center">
                        <span>ยืนยัน</span>
                    </button>
                </form>
            </div>

        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    qty: ele.parents("tr").find(".qty").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            // if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
            // }
        });

        @if (Session::has('save-success'))
            swal({
                title: "Success!",
                text: "{{ Session::get('save-success') }}",
                icon: "success",
                button: "OK",
            }).then((result) => {
                window.location.href = "{{ route('pages.history') }}";
            })
        @endif

        @if (Session::has('save-error'))
            swal({
                title: "Failed!",
                text: "{{ Session::get('save-error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
    </script>
@endsection
