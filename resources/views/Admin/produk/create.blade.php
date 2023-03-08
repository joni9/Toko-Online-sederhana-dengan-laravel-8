@extends('Admin.layouts.app')
@section('content')
<div class="p-10 bg-white border-4 border-blue-500">
  <a href="/admin/produk" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
  <div class="flex justify-center">
    <h2 class="py-1 mb-12 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg w-80 ">Buat <u class="text-blue-600">Produk</u></h2>
  </div>
  
<form action="/admin/produk/" method="post" enctype="multipart/form-data">
  @csrf
  <div class="flex justify-center mt-5">
    <div>

      <div class="mb-3 xl:w-120">
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          >Nama Produk</label
        >
        <input
          name="nama"
          @error('nama') is-invalid @enderror
          type="text"
          value="{{ old('nama') }}"
          class="
            form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
          "
          id="exampleFormControlInput3"
          placeholder="Nama Produk"
        />
        @error('nama')
        <div class="text-base text-red-500">
          Harus diisi Gaes, Min 3 Huruf dan tidak boleh sama!
        </div>
        @enderror
      </div>

      <div class="mb-3 xl:w-120">
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          >Harga Produk</label
        >
        <input
          name="harga"
          @error('harga') is-invalid @enderror
          type="number"
          value="{{ old('harga') }}"
          class="
            form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
          "
          id="exampleFormControlInput3"
          placeholder="Harga Produk"
        />
        @error('harga')
        <div class="text-base text-red-500">
          Harus diisi Gaes!
        </div>
        @enderror
      </div>

      <div class="mb-3 xl:w-120">
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          >Jumlah Stok</label
        >
        <input
          name="stok"
          @error('stok') is-invalid @enderror
          type="number"
          value="{{ old('stok') }}"
          class="
            form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
          "
          id="exampleFormControlInput3"
          placeholder="Jumlah Stok"
        />
        @error('stok')
        <div class="text-base text-red-500">
          Harus diisi Gaes!
        </div>
        @enderror
      </div>

      <div class="mb-3 xl:w-120">
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          >Kategori</label>
              <select 
              name="kategori_id"
              class="form-select appearance-none
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                  @foreach ($kategoris as $kategori)
                  @if (old('kategori_id')==$kategori->id)
                  <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                  @else
                  <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                  @endif
                  @endforeach
              </select>
      </div>

      <div class="mb-3 xl:w-120">
        <label for="formFileSm" class="inline-block mb-2 text-gray-700 form-label">Gambar Produk</label>
        <img class="mb-3 img-preview img-fluid col-sm-5">
        <input name="gambar_produk" id="gambar_produk" onchange="previewImage()" @error('gambar_produk') is-invalid @enderror class="block w-full px-2 py-1 m-0 text-sm font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file">
        @error('gambar_produk')
        <div class="text-base text-red-500">
          Harus diisi file harus gambar, max 1Mb!
        </div>
        @enderror
      </div>

      <div class="mb-3 xl:w-120">
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          >Keterangan</label
        >
        <input id="x" type="hidden" name="keterangan" value="{{ old('keterangan') }}" @error('nama') is-invalid @enderror>
        <trix-editor input="x"></trix-editor>
        @error('keterangan')
        <div class="text-base text-red-500">
          Harus diisi Gaes!
        </div>
        @enderror

      </div>
  
      <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Tambah Produk</button>
    </div>
  </div>
</div>
</form>

<script>
  //trik editor 
   //code keamanan agar tidak bisa upload file di descripsi
   document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
//

  //fungsi penampil gambar
  function previewImage(){
    const image = document.querySelector('#gambar_produk');//mengambil selector id
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
