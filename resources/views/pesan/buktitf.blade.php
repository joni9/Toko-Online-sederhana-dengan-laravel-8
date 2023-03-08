@extends('layouts.app')
@section('content')
<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-10">
<div class="p-5 bg-white border-4 border-blue-500 rounded-lg ">
    <a href="/pesanan" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
  <div class="text-center">
    <h1 class="pb-6 text-3xl text-blue-500">Halaman Upload Bukti TF</h1>
  </div>

    <form action="/pesanan/buktitf/{{ $pesanan->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="flex justify-center mt-5">
        <div>
    
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
              >No Pesanan</label
            >
            <input
              disabled
              class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-gray-100 bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              "
              id="exampleFormControlInput3"
              placeholder="kode_pesanan pesanan"
              value="{{ old('kode_pesanan', $pesanan->kode_pesanan) }}" 
            />
          </div>
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
              >Total Harga</label
            >
            <input
              disabled
              class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-gray-100 bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              "
              id="exampleFormControlInput3"
              value="{{ old('total_harga', 'Rp. '.number_format($pesanan->total_harga)) }}" 
            />
          </div>
        

    
          <div class="mb-3 w-96">
            <label for="formFileSm" class="inline-block mb-2 text-gray-700 form-label">Bukti TF</label>
            @if (!empty($pesanan->buktitf))
            <input type="hidden" name="oldImage" value="{{ $pesanan->buktitf }}">   
            @endif
            
            @if ($pesanan->buktitf)
            <img src="{{ asset('storage/'.$pesanan->buktitf) }}" class="mb-3 img-fluid col-sm-5">
            @else
            <img class="mb-3 img-preview img-fluid col-sm-5">
            @endif
            <img class="mb-3 img-preview img-fluid col-sm-5">
            <input name="buktitf" id="buktitf" onchange="previewImage()" @error('buktitf') is-invalid @enderror class="block w-full px-2 py-1 m-0 text-sm font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file">
            @error('buktitf')
            <div class="text-base text-red-500">
              Harus diisi file harus gambar, max 1Mb!
            </div>
            @enderror
          </div>

   
          <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Konfrimasi</button>
    
        </div>
      </div>
    </form>

</div>

{{-- // --}}
</div>
<!-- Container for demo purpose -->  
<script>
    //fungsi penampil gambar
    function previewImage(){
      const image = document.querySelector('#buktitf');//mengambil selector id
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
