@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <form action="{{ route('tools.update', $tools->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/users" class="text-xl text-gray-500  font-semibold leading-tight">รายการ</a>
                    <h2 class="mx-1 text-gray-500 ">/</h2>
                    <h2 class="text-xl font-semibold text-gray-500 leading-tight">สร้าง</h2>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    บันทึก
                </button>
            </div>

            <hr class="my-4">

            <div class="bg-white p-6 shadow rounded-lg">
                <div class="w-full">
                    <label class="block text-gray-700 text-x font-bold mb-2">
                        ชื่อ
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        value="{{ $tools->title }}" type="text" name="title" placeholder="title" required>
                    @error('title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label class="block text-gray-700 text-x font-bold mb-2">
                        จำนวน
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        value="{{ $tools->qty }}" type="number" name="qty" placeholder="qty" required>
                    @error('qty')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label class="block text-gray-700 text-x font-bold mb-2">
                        สถานะ
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="status" id="status" required>
                            <option value="1" @if ($tools->status == 1) selected @endif>ใช้งาน</option>
                            <option value="0" @if ($tools->status == 0) selected @endif>ไม่ใช้งาน</option>
                        </select>
                    </div>


                    <div class="w-full mt-4">
                        <label class="block text-gray-700 text-x font-bold mb-2">
                            รูปภาพ
                        </label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            value="{{ $tools->image }}" type="file" id="image" name="image" placeholder="image"
                            onchange="uploadImage()" @if ($tools->image == null) required @endif>

                        <input value="{{ $tools->image }}" type="text" id="text_image" name="text_image" hidden>

                        @error('image')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        {{-- preview image --}}
                        <div class="w-1/4 relative preview-image hidden">
                            <button type="button"
                                class="absolute top-0 right-0 bg-red-500 hover:bg-red-700 text-white rounded-full w-8 h-8 bg-gray-800 font-bold py-1 px-2 rounded"
                                onclick="clearImage()">
                                x
                            </button>
                            <img id="previewImage" alt="" class="w-full">
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script>
        function uploadImage() {
            let file = document.getElementById("image").files[0];
            console.log(file);
            let reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById("previewImage").src = reader.result;
                document.querySelector('.preview-image').classList.remove('hidden')
            }
            reader.readAsDataURL(file);
        }

        function clearImage() {
            document.getElementById("previewImage").src = "";
            document.getElementById('image').value = ''
            document.getElementById('text_image').value = ''
            document.querySelector('.preview-image').classList.add('hidden')

        }

        // check image and set preview image
        let image = <?php echo json_encode(url('images/' . $tools->image)); ?>;
        if (image) {
            document.getElementById("previewImage").src = image;
            document.querySelector('.preview-image').classList.remove('hidden')
        }
    </script>
@endsection
