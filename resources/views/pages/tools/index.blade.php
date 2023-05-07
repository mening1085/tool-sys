@extends('layouts.master')

@section('content')
    <div class="mx-auto">
        <div class="flex items-center justify-between ">
            <div class="text-xl text-gray-500  font-semibold leading-tight">จัดการเครื่องมือ</div>
            <a href="{{ route('tools.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Create
            </a>
        </div>

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg relative overflow-x-auto">
                <table class="w-full leading-normal table-fixed">
                    <thead>
                        <tr>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase w-28">
                                ชื่อ
                            </th>
                            <th width="100px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase  text-center">
                                จำนวน
                            </th>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase  text-center">
                                รูปภาพ
                            </th>
                            <th width="100px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase text-center">
                                สถานะ
                            </th>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase ">
                                วันที่สร้าง
                            </th>
                            <th width="100px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $item->title }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900 whitespace-no-wrap text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white flex justify-center">
                                    <img class="rounded-lg object-cover w-20 h-20" src="{{ url('images/' . $item->image) }}"
                                        alt="">
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p
                                        class="text-gray-900 whitespace-no-wrap text-center rounded py-1 @if ($item->status == 1) bg-green-200 @else bg-red-200 @endif">
                                        {{ $item->status == 1 ? 'ใช้งาน' : 'ไม่ใช้งาน' }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->created_at }}
                                    </p>
                                </td>
                                <td class="py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex justify-center">
                                        {{-- <a href="{{ route('tools.show', $item->id) }}"
                                            class="text-gray-500 hover:text-gray-700 text-xl m-1 font-semibold px-1 rounded">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ route('tools.edit', $item->id) }}"
                                            class="text-blue-500 hover:text-blue-700 text-xl m-1 font-semibold px-1 rounded">
                                            <i class="fas fa-edit"></i>
                                        </a>
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
    </script>
@endsection
