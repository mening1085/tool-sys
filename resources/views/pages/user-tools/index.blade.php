@extends('layouts.master')

@section('content')
    <div class="mx-auto">
        <div class="flex items-center justify-between ">
            <div class="text-xl text-gray-500  font-semibold leading-tight">จัดการเครื่องมือ</div>
        </div>

        <div x-data="{ isOpenModal: false }" class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg relative overflow-x-auto">
                <table class="w-full leading-normal">
                    <thead>
                        <tr>
                            <th width="15%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase ">
                                ชื่อผู้ยืม
                            </th>
                            <th width="20%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase  text-center">
                                รายการ
                            </th>
                            <th width="10%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase  text-center">
                                จำนวน
                            </th>
                            <th width="15%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase  text-center">
                                รูปภาพ
                            </th>
                            <th width="10%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                สถานะ
                            </th>
                            <th width="15%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase ">
                                วันที่สร้าง
                            </th>
                            <th width="10%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase ">
                                หมายเหตุ
                            </th>
                            <th width="5%"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $item->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900 whitespace-no-wrap text-center">
                                    {{ $item->tool->title }}
                                </td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900 whitespace-no-wrap text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white flex justify-center">
                                    <img class="rounded-lg object-cover w-20 h-20"
                                        src="{{ url('images/' . $item->tool->image) }}" alt="">
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <form method="POST" action="{{ route('tools.update.status', $item->id) }}">
                                        @csrf
                                        <select name="{{ 'status' }}" id="{{ 'status' . $index }}"
                                            @change="submitStatus({{ $index }}, {{ $item->status }})"
                                            class="block
                                            w-full mt-1 px-2 py-1 border rounded-lg @if ($item->status == 1) border-green-500 @elseif($item->status == 2) border-red-500 @else @endif">
                                            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>รออนุมัติ
                                            </option>
                                            <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>อนุมัติ
                                            </option>
                                            <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>ไม่อนุมัติ
                                            </option>
                                        </select>
                                        <input type="text" id="{{ 'message' . $index }}" name="message" hidden>
                                        <button type="submit" id="{{ 'submitStatus' . $index }}" hidden></button>
                                    </form>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->created_at }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->message }}
                                    </p>
                                </td>
                                <td class="py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex justify-center">
                                        <form method="POST" action="{{ route('tools.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 text-xl m-1 font-semibold px-1 rounded show-alert-delete-box">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- make paginate --}}
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    {{ $data->links('vendor.pagination.custom') }}
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
            console.log(index);
            var status = document.getElementById('status' + index).value;
            console.log(status);

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
        }
    </script>
@endsection
