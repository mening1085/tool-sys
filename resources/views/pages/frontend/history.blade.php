@extends('layouts.default')

@section('content')
    <section class="container relative bg-white py-8">
        <div class="history px-6">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-bold mb-2">รายการยืม</h1>
                <button class="text-sm border rounded-xl border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 return-all">
                    <i class="fa-solid fa-rotate-left"></i> คืนทั้งหมด
                </button>
            </div>
            <table class="table-auto border w-full">
                <thead>
                    <tr>
                        <th width="10%" class="border p-3">ลำดับ</th>
                        <th width="25%" class="border p-3">วันที่สร้าง</th>
                        <th width="20%" class="border p-3">สถานะ</th>
                        <th width="25%" class="border p-3">หมายเหตุ</th>
                        <th width="20%" class="border p-3">ตัวเลือก</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $id => $item)
                            <tr data-id="{{ $item->id }}">
                                <td class="border p-3">
                                    <div class="flex justify-center items-center">
                                        {{ $id + 1 }}
                                    </div>
                                </td>

                                <td class="border p-3">
                                    <div class="text-center">
                                        {{ $item['created_at'] }}
                                    </div>
                                </td>

                                <td class="border p-3">
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

                                <td class="border p-3">
                                    <div class="flex justify-center items-center">
                                        {{ $item['message'] }}
                                    </div>
                                </td>

                                <td class="border">
                                    <div class="flex justify-around items-center">
                                        <button
                                            class="border-red-500 text-red-500 hover:bg-red-100 border rounded-xl flex justify-center items-center w-16 h-10 return-tool"
                                            id="return-tool" type="submit">
                                            <i class="fa-solid fa-rotate-left mr-2"></i> คืน
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th width="10%" class="p-3"></th>
                                <th width="25%" class="px-4 py-3 border text-start" colspan="2">รายการ</th>
                                <th width="20%" class="px-4 py-3 border">รูป</th>
                                <th width="25%" class="px-4 py-3 border">จำนวน</th>
                            </tr>
                            @foreach ($item->user_tools as $index => $user_tools)
                                <tr>
                                    <td class="px-4 py-1 border-l"></td>
                                    <td class="px-4 py-1 border-l" colspan="2">
                                        <div class="line-clamp-2">
                                            <i class="fas fa-caret-right text-red-600"></i>
                                            {{ $user_tools->tool->title }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-1 border-l flex justify-center items-center">
                                        <img class="w-14 h-14 object-cover rounded-xl"
                                            src="{{ url('/images/' . $user_tools->tool->image) }}" alt="">
                                    </td>
                                    <td class="px-4 py-1 border-l text-center">
                                        <span class="font-bold">{{ $user_tools->qty }}</span>
                                    </td>
                                </tr>
                            @endforeach
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
                                text: response.responseJSON.message,
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
