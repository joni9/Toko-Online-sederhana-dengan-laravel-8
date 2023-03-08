@extends('layouts.app')
@section('content')
<div class="container px-6 mx-auto mt-3">
{{-- slidder --}}
<div id="carouselExampleControls" class="relative carousel slide" data-bs-ride="carousel">
    <div class="relative w-full overflow-hidden carousel-inner">
      @if ($slidders->count())
      <div class="relative float-left w-full carousel-item active">
        <img
          src="{{ asset('storage/'.$slidders[0]->gambar_slidder) }}"
          class="block w-full"
        />
      </div>  
      @endif
      @foreach ($slidders->skip(1) as $slidder)
      <div class="relative float-left w-full carousel-item">
        <img
          src="{{ asset('storage/'.$slidder->gambar_slidder) }}"
          class="block w-full"
        />
      </div>  
      @endforeach

    </div>
    <button
      class="absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 carousel-control-prev hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
      type="button"
      data-bs-target="#carouselExampleControls"
      data-bs-slide="prev"
    >
      <span class="inline-block bg-no-repeat carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 carousel-control-next hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
      type="button"
      data-bs-target="#carouselExampleControls"
      data-bs-slide="next"
    >
      <span class="inline-block bg-no-repeat carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{{-- end slidder --}}


<!-- Container for kategori purpose -->
    <!-- Section: Design Block -->
    <section class="px-6 py-6 mt-10 text-center text-gray-800 rounded-lg shadow-lg bg-gradient-to-t from-blue-400 via-blue-700 to-blue-600">
      <h2 class="py-1 mb-6 text-3xl font-bold bg-white rounded-lg shadow-lg">Kategori <u class="text-blue-600">Produk</u></h2>
  
      <div class="grid mt-3 md:grid-cols-3 xl:grid-cols-4 gap-x-6 lg:gap-xl-12">
        @foreach($kategoris as $kategori)
        <div class="mb-6">
            
          <img src="{{ asset('storage/'.$kategori->gambar_kategori) }}" class="mx-auto mb-1 border-4 border-blue-400 rounded-full shadow-lg " alt=""
              style="max-width: 100px" />
            <p class="mb-3 font-bold text-white"><a href="/produk?kategori={{$kategori->id}}">{{ $kategori->nama }}</a></p>
            
          </div>
        @endforeach
        
      </div>
      <a href="/kategori">
        <h2 class="py-1 mt-3 mb-3 text-xl font-bold text-center text-blue-500 bg-white border border-white rounded-lg shadow-lg hover:bg-blue-700 hover:text-white hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg "><i class="fa-regular fa-eye"> </i> Detail All Katgori</h2>
      </a>
    </section>
    <!-- Section: Design Block -->
  <!-- Container for demo purpose -->
<!-- end Container for kategori purpose -->



    <!-- Section: produk Block -->
    <section class="px-6 py-6 mt-10 text-gray-800 rounded-lg shadow-lg bg-gradient-to-t from-blue-400 via-blue-700 to-blue-600">
  
        <h2 class="py-1 mb-12 text-3xl font-bold text-center bg-white rounded-lg shadow-lg ">  Produk <u class="text-blue-600">Kami</u></h2>
  
      <div class="grid gap-6 lg:grid-cols-3 xl:gap-x-12">
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
      <a href="/produk">
      <h2 class="py-1 mt-10 mb-3 text-xl font-bold text-center text-blue-500 bg-white border border-white rounded-lg shadow-lg hover:bg-blue-700 hover:text-white hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg "><i class="fa-regular fa-eye"> </i> Detail All Produk</h2>
    </a>
      
    </section>
    <!-- end Section: Design Block -->
  

{{-- layanan --}}
<!-- Container for demo purpose -->
    <section class="px-6 py-6 mt-10 text-center text-gray-800 rounded-lg shadow-lg bg-gradient-to-t from-blue-400 via-blue-700 to-blue-600">
  
        <h2 class="py-1 mb-12 text-3xl font-bold bg-white rounded-lg shadow-lg">Pelayanan <u class="text-blue-600">Kami</u></h2>
  
      <div class="grid md:grid-cols-3 gap-x-6 lg:gap-x-12">
        <div class="mb-12 md:mb-0">
          <div class="flex justify-center mb-6">
            <img src="{{ url('images/service.png') }}" class="w-32 border-4 border-blue-400 rounded-full shadow-lg" />
          </div>
          <h6 class="mb-4 font-medium text-white">Service Komputer</h6>
          <p class="mb-4 bg-white rounded-md shadow-md">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left"
              class="inline-block w-6 pr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor"
                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
              </path>
            </svg>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic
            tenetur quae quaerat ad velit ab hic tenetur.
          </p>
        </div>
        <div class="mb-12 md:mb-0">
          <div class="flex justify-center mb-6">
            <img src="{{ url('images/instalasi.png') }}" class="w-32 border-4 border-blue-400 rounded-full shadow-lg " />
          </div>
          <h6 class="mb-4 font-medium text-white">Instalasi Software</h6>
          <p class="mb-4 bg-white rounded-md shadow-md">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left"
              class="inline-block w-6 pr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor"
                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
              </path>
            </svg>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
            laboriosam, nisi ut aliquid commodi.
          </p>
        </div>
        <div class="mb-0">
          <div class="flex justify-center mb-6">
            <img src="{{ url('images/printer.png') }}" class="w-32 border-4 border-blue-400 rounded-full shadow-lg " />
          </div>
          <h6 class="mb-4 font-medium text-white">Service Printer</h6>
          <p class="mb-4 bg-white rounded-md shadow-md">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left"
              class="inline-block w-6 pr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor"
                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
              </path>
            </svg>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
            voluptatum deleniti atque corrupti.
          </p>
        </div>
      </div>
  
    </section>
  <!-- Container for demo purpose -->
{{-- end layanan --}}


</div>
@endsection
