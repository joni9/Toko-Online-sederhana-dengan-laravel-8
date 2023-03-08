@extends('layouts.app')
@section('content')
<div class="container px-6 mx-auto mt-3">
    <!-- Section: kategori Block -->
    <section class="px-6 py-6 mt-5 text-center text-gray-800 rounded-lg shadow-lg bg-gradient-to-t from-blue-400 via-blue-700 to-blue-600">
  
      <h2 class="py-1 mb-6 text-3xl font-bold bg-white rounded-lg shadow-lg">Kategori <u class="text-blue-600">Produk</u></h2>
  
  
      <div class="grid gap-6 lg:grid-cols-4 xl:gap-x-12">
        @foreach($kategoris as $kategori)
        <div class="mb-6 lg:mb-0">
            <div class="relative block bg-white border border-blue-400 rounded-lg shadow-lg">
              <div class="flex">
                <div
                  class="relative mx-4 -mt-4 overflow-hidden bg-no-repeat bg-cover border border-blue-400 rounded-full shadow-lg"
                  data-mdb-ripple="true" data-mdb-ripple-color="light">
                  <img src="{{ asset('storage/'.$kategori->gambar_kategori) }}" class="w-full rounded-full" />
                  <a href="/produk?kategori={{$kategori->id}}">
                    <div
                      class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden transition duration-300 ease-in-out bg-fixed opacity-0 hover:opacity-100"
                      style="background-color: rgba(251, 251, 251, 0.15)"></div>
                  </a>
                </div>
              </div>
  
              <div class="p-6">
                <h5 class="mb-3 text-lg font-bold">{{ $kategori->nama }}</h5>
                <a href="/produk?kategori={{$kategori->id}}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <i class="fa-regular fa-eye"></i> Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  
    </section>
    <!-- end Section: Design Block -->
</div>



@endsection
