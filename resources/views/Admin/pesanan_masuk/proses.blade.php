@extends('Admin.layouts.app')
@section('content')
<div class="p-5 bg-white border-4 border-blue-500 ">
    <a href="/admin/pesanan/masuk" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
  <div class="text-center">
    <h1 class="pb-6 text-3xl text-black">Halaman Proses Pesanan</h1>
  </div>

    <form action="/admin/pesanan/masuk/proses/kofirmasi/{{ $pesanan->id }}" method="post">
        @method('put')
        @csrf
    <div class="flex justify-center mt-5">
        <div>
    
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
              > <b>No Pesanan</b> </label
            >
            <input
              type="text"
              name="kode_pesanan"
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
              > <b>Total Harga</b> </label
            >
            <input
              type="text"
              name="total_harga"
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
              placeholder="total_harga pesanan"
              value="{{ old('total_harga', 'Rp. '.number_format($pesanan->total_harga)) }}" 
            />
          </div>
          @if (!empty($pesanan->buktitf))
          <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          > <b>Bukti TF</b> </label>
        <img src="{{ asset('storage/'.$pesanan->buktitf) }}" class="mb-4 w-60 h-90">
        @else
        <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
          > <b>Bukti TF</b> </label><br>
          <div class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight shadow-md mb-3">
            Belum ada TF
          </div>
           
          @endif
          

          <div class="mb-3 xl:w-120">
            <label for="exampleFormControlInpu3" class="inline-block mb-2 text-gray-700 form-label"
              ><strong>Status Pesanan</strong> </label>
                  <select 
                  name="status_pesanan"
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
                      @if ($pesanan->status_pesanan=='belum lunas')
                      <option value="belum lunas" selected>belum lunas</option>
                      <option value="Lunas">Lunas</option>
                      <option value="Batal">Batal</option>
                      @endif
                  </select>
          </div>

    

   
          <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Konfrimasi</button>
    
        </div>
      </div>
    </form>

</div>

  
@endsection
