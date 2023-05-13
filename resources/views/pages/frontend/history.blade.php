@extends('layouts.default')

@section('content')
    <section class="container relative bg-white py-8">
        <div class="history px-6">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-bold mb-2">รายการยืม</h1>
                <button class="text-sm border rounded-xl hover:border-gray-500 hover:bg-gray-200 px-3 py-1 return-all">
                    <i class="fa-solid fa-rotate-left"></i> คืนทั้งหมด
                </button>
            </div>
            <table class="table-auto border w-full">
                <thead>
                    <tr>
                        <th width="10%" class="border p-4">ตัวเลือก</th>
                        <th width="50%" class="text-left border p-4">รายการ</th>
                        <th width="10%" class="border p-4">จำนวน</th>
                        <th width="10%" class="border p-4">วันที่สร้าง</th>
                        <th width="10%" class="border p-4">สถานะ</th>
                        <th width="10%" class="border p-4">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>

                    @php $total = 0 @endphp
                    @if (count($data) > 0)
                        @foreach ($data as $id => $item)
                            @php $total += $item['qty'] @endphp
                            <tr data-id="{{ $item->id }}">
                                <td class="border">
                                    <div class="flex justify-around items-center">
                                        {{-- <form action="{{ route('cart.return.tool', $item->id) }}" method="post">
                                            @csrf --}}
                                        <button
                                            class="hover:border-gray-500 hover:bg-gray-200  border rounded-xl flex justify-center items-center w-10 h-10 return-tool"
                                            id="return-tool" type="submit">
                                            <i class="fa-solid fa-rotate-left"></i>
                                        </button>
                                        {{-- </form> --}}
                                    </div>
                                </td>

                                <td class="border p-4">
                                    <div class="flex items-center">
                                        <img src="{{ url('/images/' . $item['tool']['image']) }}" width="100"
                                            height="100" class="object-cover rounded-xl" />
                                        <div class="line-clamp-1 pl-4">
                                            {{ $item['tool']['title'] }}
                                        </div>
                                    </div>

                                </td>
                                <td class="border">
                                    <div class="flex justify-center items-center">
                                        {{ $item['qty'] }}
                                    </div>
                                </td>
                                <td class="border">
                                    <div class="text-center">
                                        {{ $item['created_at'] }}
                                    </div>
                                </td>


                                <td class="border">
                                    <div class="flex justify-center items-center">
                                        @if ($item['status'] == 1)
                                            <i class="fa-solid fa-check text-green-500 mr-2"></i>
                                            <span>อนุมัติ</span>
                                        @elseif($item['status'] == 2)
                                            <i class="fa-solid fa-times text-red-500 mr-2"></i>
                                            <span>ไม่อนุมัติ</span>
                                        @else
                                            <i class="fa-solid fa-clock text-yellow-500 mr-2"></i>
                                            <span>รออนุมัติ</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border">
                                    <div class="flex justify-center items-center">
                                        {{ $item['message'] }}
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
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(".return-tool").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            let id = ele.parents("tr").attr("data-id")

            // swal confirm
            swal({
                title: "คืนอุปกรณ์",
                text: "คุณต้องการคืนอุปกรณ์นี้ใช่หรือไม่?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{ url('return-tool') }}' + "/" + id,
                        method: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                        },
                        success: function(response) {
                            console.log(response);
                            swal({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                                button: "OK",
                            }).then((value) => {
                                window.location.reload();
                            });
                        },
                        error: function(response) {
                            console.log(response);
                            swal({
                                title: "Failed!",
                                text: response.message,
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                }
            });
        });

        $(".return-all").click(function(e) {
            e.preventDefault();
            var ele = $(this);

            // swal confirm
            swal({
                title: "คืนอุปกรณ์",
                text: "คุณต้องการคืนอุปกรณ์ทั้งหมดใช่หรือไม่?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{ url('return-all') }}',
                        method: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            console.log(response);
                            swal({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                                button: "OK",
                            }).then((value) => {
                                window.location.reload();
                            });
                        },
                        error: function(response) {
                            console.log(response);
                            swal({
                                title: "Failed!",
                                text: response.message,
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
