@extends('layouts.app')
@section('content')
<div class="container px-6 mx-auto mt-3">
    <!-- Section: produk Block -->
    <section class="px-6 py-6 mt-5 text-gray-800 rounded-lg shadow-lg bg-gradient-to-t from-blue-400 via-blue-700 to-blue-600">
      {{-- @if (request('kategori'))
      <input type="hidden" name="kategori" value="{{ request('kategori') }}">  
    @endif --}}

      <form action="/produk" method="get">
        {{-- @csrf --}}
        @if (request('kategori'))
        <input type="hidden" name="kategori" value="{{ request('kategori') }}">  
      @endif

        <div class="flex justify-end">
          <div class="mb-3 xl:w-96">
            <div class="relative flex flex-wrap items-stretch w-full mb-4 input-group">
              <input type="search" name="search" value="{{ request('search') }}" class="form-control  border-white relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid  rounded transition  m-0 focus:text-gray-700 focus:bg-white " placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
              <button type="submit" class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out  items-center border border-white" type="button" id="button-addon2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </form>
     

      <h2 class="py-1 mb-12 text-3xl font-bold text-center bg-white rounded-lg shadow-lg ">  Produk <u class="text-blue-600">Kami</u></h2>
  
  
      <div class="grid gap-6 lg:grid-cols-4 xl:gap-x-12">
        @foreach($produks as $produk)
        <div class="mb-6 lg:mb-0">
            <div class="relative block bg-white rounded-lg shadow-lg">
              <div class="flex">
                <div
                  class="relative mx-4 -mt-4 overflow-hidden bg-no-repeat bg-cover rounded-lg shadow-lg"
                  data-mdb-ripple="true" data-mdb-ripple-color="light">
                  <img src="{{ asset('storage/'.$produk->gambar_produk) }}" class="w-full" />
                  <a href="/produk/detail/{{ $produk->id }}">
                    <div
                      class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden transition duration-300 ease-in-out bg-fixed opacity-0 hover:opacity-100"
                      style="background-color: rgba(251, 251, 251, 0.15)"></div>
                  </a>
                </div>
              </div>
  
              <div class="p-6">
                <h3 class="mb-2 text-lg font-bold text-center">{{ $produk->nama }}</h3>
                  <table class="w-full py-1 mb-2 border border-y-blue-500 border-x-0">
                    <tr>
                      <td><strong>Kategori</strong></td>
                      <td>:</td>
                      <td><a href="/produk?kategori={{$produk->kategori->id}}" class="text-blue-600 ">
                        <h3><b>{{ $produk->kategori->nama }}</b> </h3></a></td>
                    </tr>
                    <tr>
                      <td><strong>Harga</strong></td>
                      <td>:</td>
                      <td>Rp. {{ number_format($produk->harga) }}</td>
                    </tr>
                    <tr>
                      <td><strong>Stok</strong></td>
                      <td>:</td>
                      <td>{{ $produk->stok }}</td>
                    </tr>
                  </table>
                <div class="text-center">
                  <a href="/produk/detail/{{ $produk->id }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                    class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                      <i class="fa-regular fa-eye"></i> Detail</a>
                </div>
                
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{ $produks->links() }}
    </section>
    <!-- end Section: Design Block -->
</div>



@endsection
