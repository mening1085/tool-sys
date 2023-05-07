@extends('layouts.master')

@section('content')
    <div class="mx-auto">
        <div class="flex items-center justify-between ">
            <div class="text-xl text-gray-500  font-semibold leading-tight">Users</div>
            <a href="{{ route('users.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Create
            </a>
        </div>

        {{-- @if (Session::has('success'))
            <div class="mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex justify-between items-center"
                id="alert">
                <span class="block sm:inline">{{ Session::get('success') }}</span>
                <button onclick="closeAlert()">X</button>
            </div>
        @endif --}}

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg relative overflow-x-auto">
                <table class="w-full leading-normal table-fixed">
                    <thead>
                        <tr>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created at
                            </th>
                            <th width="150px"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
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
                                                {{ $item->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->email }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->created_at }}
                                    </p>
                                </td>
                                <td class="py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex justify-center">
                                        <a href="{{ route('users.show', $item->id) }}"
                                            class="text-gray-500 hover:text-gray-700 text-xl m-1 font-semibold px-1 rounded">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $item->id) }}"
                                            class="text-blue-500 hover:text-blue-700 text-xl m-1 font-semibold px-1 rounded">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', $item->id) }}">
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
