@extends('layouts.master')
<style>
    .modal_warpper {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100000;
    }

    .modal_warpper .modal {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
        pointer-events: none;
        transition: all .5s ease;
    }

    .modal_warpper .modal .modal_content {
        width: 800px;
        height: auto;
        background-color: #ffffff00;
        position: relative;
        padding: 20px;
        border-radius: 10px;
        pointer-events: auto;
    }
</style>
@section('content')
    <div class="mx-auto">
        <div class="flex items-center justify-between ">
            <div class="text-xl text-gray-500  font-semibold leading-tight">รายการยืมอุปกรณ์</div>
        </div>
        <div x-data="{ isOpenDetail: false }" class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg relative overflow-x-auto">
                <table class="w-full leading-normal table-fixed">
                    <thead>
                        <tr>
                            <th width="80px"
                                class="p-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                ลำดับ</th>
                            <th width="250px"
                                class="p-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                วันที่สร้าง</th>
                            <th width="250px"
                                class="p-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                สถานะ</th>
                            <th width="250px"
                                class="p-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase">
                                หมายเหตุ</th>
                            <th width="200px"
                                class="p-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                ตัวเลือก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $index => $item)
                                <tr data-id="{{ $item->id }}">
                                    <td class="border p-3 bg-gray-100">
                                        <div class="flex justify-center items-center">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>

                                    <td class="border p-3 bg-gray-100">
                                        <div class="text-center">
                                            {{ $item['created_at'] }}
                                        </div>
                                    </td>

                                    <td class="border p-3 bg-gray-100">
                                        <div class="flex justify-center items-center">
                                            <form class="mb-0" method="POST" action="{{ route('tools.update.status') }}">
                                                @csrf
                                                <select name="{{ 'status' }}" id="{{ 'status' . $index }}"
                                                    @change="submitStatus({{ $index }}, {{ $item->status }})"
                                                    class="block
                                            w-full px-2 py-1 border rounded-lg @if ($item->status == 1) border-green-500 @elseif($item->status == 2) border-red-500 @else @endif">
                                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>
                                                        รออนุมัติ
                                                    </option>
                                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>
                                                        อนุมัติ
                                                    </option>
                                                    <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>
                                                        ไม่อนุมัติ
                                                    </option>
                                                </select>
                                                <input type="text" id="{{ 'message' . $index }}" name="message" hidden>
                                                <input type="text" value="{{ $item->id }}" name="order_id" hidden>
                                                <input type="text" value="{{ $item->user_id }}" name="user_id" hidden>
                                                <button type="submit" id="{{ 'submitStatus' . $index }}" hidden></button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="border p-3 bg-gray-100">
                                        <div class="flex justify-center items-center">
                                            {{ $item['message'] }}
                                        </div>
                                    </td>

                                    <td class="border bg-gray-100">
                                        <div class="flex justify-around items-center">
                                            <div class="flex justify-center items-center">
                                                {{-- <button type="button" onclick="openDetail({{ $item }})"
                                                    class="text-blue-500 hover:text-blue-700 text-xl m-1 font-semibold px-1 rounded show-detail">
                                                    <i class="fas fa-eye"></i>
                                                </button> --}}

                                                <form method="POST" action="{{ route('orders.destroy', $item->id) }}"
                                                    class="mb-0 pb-0">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="text-red-500 hover:bg-red-100 text-xl m-1 font-semibold px-1 rounded show-alert-delete-box h-10 w-10 border border-red-500 rounded-full p-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th width="10%" class="p-3 bg-white"></th>
                                    <th width="25%" class="px-4 py-3 border text-start bg-white" colspan="2">
                                        รายการ</th>
                                    <th width="20%" class="px-4 py-3 border bg-white">รูป</th>
                                    <th width="25%" class="px-4 py-3 border bg-white">จำนวน</th>
                                </tr>
                                @foreach ($item->user_tools as $index => $user_tools)
                                    <tr>
                                        <td class="px-4 py-1 border-l bg-white"></td>
                                        <td class="px-4 py-1 border-l bg-white" colspan="2">
                                            <div class="line-clamp-2">
                                                <i class="fas fa-caret-right text-indigo-600"></i>
                                                {{ $user_tools->tool->title }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-1 border-l bg-white flex justify-center items-center">
                                            <img class="w-14 h-14 object-cover rounded-xl"
                                                src="{{ url('/images/' . $user_tools->tool->image) }}" alt="">
                                        </td>
                                        <td class="px-4 py-1 border-l bg-white text-center">
                                            <span>{{ $user_tools->qty }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center border p-5">
                                    <h1>ไม่พบรายการ</h1>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- make paginate --}}
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    {{ $data->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>

        {{-- modal dialog --}}
        <div id="detail" class="modal_warpper hidden">
            <div class="modal">
                <div class="modal_content">
                    <button onclick="closeDetail()"
                        class="h-8 w-8 bg-red-500 text-white rounded-full absolute top-8 right-3 hover:bg-red-600 hover:border-2">
                        <i class="fas fa-times close"></i>
                    </button>
                    <div id="modal_detail"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        @if (Session::has('success'))
            swal({
                title: "Success!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif

        @if (Session::has('error'))
            swal({
                title: "Error!",
                text: "{{ Session::get('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif

        function closeAlert() {
            document.getElementById("alert").style.display = "none";
        }

        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });

        // submit
        function submitStatus(index, val) {
            // get value
            var status = document.getElementById('status' + index).value;

            if (status != 0) {
                // ถ้าไม่ใช่ รออนุมัติ ให้เปิด swal ให้กรอกเหตุผล และ ส่งค่าไปที่ message
                if (status == 2) {
                    swal({
                            title: "กรุณากรอกเหตุผล",
                            content: "input",
                            button: {
                                text: "ส่ง",
                                closeModal: false,
                            },
                            closeOnClickOutside: false,
                        })
                        .then(message => {
                            swal({
                                title: "เปลี่ยนสถานะ",
                                text: "คุณต้องการเปลี่ยนสถานะใช่หรือไม่?",
                                icon: "warning",
                                buttons: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    document.getElementById("message" + index).value = message;
                                    document.getElementById("submitStatus" + index).click();
                                } else {
                                    document.getElementById("status" + index).value = val;
                                }
                            });
                        })
                } else {
                    swal({
                        title: "เปลี่ยนสถานะ",
                        text: "คุณต้องการเปลี่ยนสถานะใช่หรือไม่?",
                        icon: "warning",
                        buttons: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            document.getElementById("submitStatus" + index).click();
                        } else {
                            document.getElementById("status" + index).value = val;
                        }
                    });
                }
            } else {

                document.getElementById("status" + index).value = val;

                swal({
                    title: "ไม่สามารถเปลี่ยนสถานะนี้ได้",
                    icon: "warning",
                })
            }
        }

        function openDetail(item) {
            console.log(item);
            // slow show detail
            document.getElementById("detail").style.display = "flex";
            $("#modal_detail").html(
                '<div class="flex justify-center"><div class="w-full"><div class="bg-white shadow-md rounded my-6"><table class="text-left w-full border-collapse"><thead><tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"><th class="py-3 px-6 text-left">อุปกรณ์</th><th class="py-3 px-6 text-left">จำนวน</th></tr></thead><tbody id="modal_detail_td">'
            );

            // loop item
            for (let i = 0; i < item.length; i++) {
                let image = item[i].tool.image;
                let url = "{{ url('/images') }}" + "/" + image;
                $("#modal_detail_td").append(
                    '<tr class="hover:bg-gray-100 border-b border-gray-200 py-10"><td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><div class="flex items-center"><div class="ml-4"><div class="text-sm leading-5 font-medium text-gray-900 flex items-center">' +
                    item[i].tool.title +
                    '<img src="' + url + '" class="ml-4 w-20 rounded-xl h-20 object-cover" alt="">' +
                    '</div></div></div></td><td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><div class="text-sm leading-5 text-gray-900">' +
                    item[i].qty +
                    '</div></td></tr>'
                );
            }

            // close table
            $("#modal_detail").append(
                '</tbody></table></div></div></div>'
            );


        }

        function closeDetail() {
            console.log("close");
            document.getElementById("detail").style.display = "none";
        }
    </script>
@endsection
