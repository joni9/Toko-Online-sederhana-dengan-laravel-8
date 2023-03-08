@extends('Admin.layouts.app')
@section('content')
<div class="p-5 bg-white border-4 border-blue-500 ">
    <a href="/admin/slidder" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
    <div class="flex justify-center">
      <h2 class="py-1 mb-12 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg w-80 ">Edit <u class="text-blue-600">Slidder</u></h2>
    </div>

    <form action="/admin/slidder/{{ $slidder->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="flex justify-center mt-5">
        <div>
    

    
            <div class="mb-3 w-96">
              <label for="formFileSm" class="inline-block mb-2 text-gray-700 form-label">Gambar slidder</label>
              <input type="hidden" name="oldImage" value="{{ $slidder->gambar_slidder }}">
              @if ($slidder->gambar_slidder)
              <img src="{{ asset('storage/'.$slidder->gambar_slidder) }}" class="mb-3 img-fluid col-sm-5">
              @else
              <img class="mb-3 img-preview img-fluid col-sm-5">
              @endif
              <img class="mb-3 img-preview img-fluid col-sm-5">
              <input name="gambar_slidder" id="gambar_slidder" onchange="previewImage()" @error('gambar_slidder') is-invalid @enderror class="block w-full px-2 py-1 m-0 text-sm font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file">
              @error('gambar_slidder')
              <div class="text-base text-red-500">
                Harus diisi file harus gambar, max 1Mb!
              </div>
              @enderror
            </div>
   
          <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Update slidder</button>
    
        </div>
      </div>
    </form>

</div>
<script>
    //fungsi penampil gambar
    function previewImage(){
      const image = document.querySelector('#gambar_slidder');//mengambil selector id
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display='block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
  
@endsection
