@extends('layouts.app')
@section('content')

<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-3">
      <a href="/produk" class="mb-5 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"> <i class="fas fa-arrow-left"></i> Kembali</a>

    <!-- Section: Design Block -->
    <section class="mb-32">
      <style>
        @media (min-width: 992px) {
          #cta-img-nml-50 {
            margin-left: 50px;
          }
        }
      </style>
  
      <div class="flex flex-wrap">
        <div class="w-full mb-12 grow-0 shrink-0 basis-auto lg:w-5/12 lg:mb-0">
          <div class="flex lg:py-12">
            <img src="{{ asset('storage/'.$produk->gambar_produk) }}" class="w-full max-w-lg mx-auto transition duration-300 ease-in-out rounded-lg shadow-lg hover:scale-110"
              id="cta-img-nml-50" style="z-index: 10" alt="" />
          </div>
        </div>
  
        <div class="w-full grow-0 shrink-0 basis-auto lg:w-7/12">
          <div
            class="flex items-center h-full p-6 text-center text-white bg-blue-600 rounded-lg lg:pl-12 lg:text-left">
            <div class="lg:pl-12">
                <h2 class="mb-3 text-3xl font-bold">{{ $produk->nama }}</h2>
              <p class="pb-2 mb-3 lg:pb-0">
                <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="table-auto">
          <thead>
            <tr>
              <th scope="col" class="py-4 text-sm font-medium text-white ">
                Harga
              </th>
              <th scope="col" class="py-4 text-sm font-medium text-white ">
                :
              </th>
              <th scope="col" class="py-4 text-sm font-medium text-white ">
                Rp. {{ number_format($produk->harga) }}
              </th>
            </tr>
            <tr>
                <th scope="col" class="py-4 text-sm font-medium text-white ">
                    Stok
                </th>

                <th scope="col" class="py-4 text-sm font-medium text-white ">
                    :
                  </th>
                <th scope="col" class="py-4 text-sm font-medium text-white ">
                  {{ $produk->stok }}
                </th>
              </tr>
              <tr>
                <th scope="col" class="py-4 text-sm font-medium text-white ">
                    Keterangan
                </th>
                <th scope="col" class="py-4 text-sm font-medium text-white ">
                    :
                  </th>
                <th scope="col" class="py-4 text-sm font-medium text-white ">
                   {!! $produk->keterangan !!}
                </th>
              </tr>
              <form action="/pesan/{{ $produk->id }}" method="post">
                @csrf
                <tr>
                    <th scope="col" class="py-4 text-sm font-medium text-white ">
                        Jumlah Pesan
                    </th>
                    <th scope="col" class="py-4 text-sm font-medium text-white ">
                        :
                      </th>
                    <th scope="col" class="py-4 text-sm font-medium text-black ">
                        <input type="number" name="jumlah_pesanan" class="form-control">
                    </th>
                  </tr>
                 
          </thead>
        </table>
        <button type="submit" class="inline-block py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out border-2 border-white rounded-full px-7 hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0" data-mdb-ripple="true" data-mdb-ripple-color="light"><li class="fas fa-shopping-cart"></li> Pesan</button>
      </form>
      </div>
    </div>
  </div>
</div>
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  
  </div>
  <!-- Container for demo purpose -->

@endsection