@extends('layouts.app')
@section('content')
<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-6 bg-white">


    <div class="block max-w-full bg-white border border-blue-500 rounded-lg shadow-lg">
      <div class="px-6 py-3 text-lg text-center text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
       <b>Daftar Pesanan</b> 
      </div>
      @if ($pesanans->count()!=0)
      <div class="p-6">
        <h5 class="mb-2 text-xl font-medium text-gray-900">Pembayaran:</h5>
        <p class="mb-4 text-base text-gray-700">
          Bank BCA : 5533003
        </p>
        <p class="mb-4 text-base text-gray-700">
          Note: Upload Bukti TFnya, caranya klik Tombol detail di Pesanan
          Kemudian Cari Form Upload Bukti TF, dan upload disitu kemudian simpan
        </p>
        <form action="/pesanan" method="get">
          {{-- @csrf --}}
          <div class="flex justify-end">
            <div class="mb-3 xl:w-96">
              <div class="relative flex flex-wrap items-stretch w-full mb-4 input-group">
                <input type="search" name="search" value="{{ request('search') }}" class="form-control  border-blue-600 relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid  rounded transition  m-0 focus:text-gray-700 focus:bg-white " placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <button type="submit" class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out  items-center border border-blue-600" type="button" id="button-addon2">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </form>
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full mb-3">
                  <thead class="bg-white border-b">
                    <tr class="text-white bg-blue-500">
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      Tanggal
                      </th>
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      No Pesanan
                      </th>
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      Total Harga
                      </th>
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      Status
                      </th>
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      Bukti TF
                        </th>
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left ">
                      Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pesanans as $pesanan)
                    <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                      <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ Carbon\carbon::parse($pesanan->tanggal)->format('d-m-Y') }}</td>
                      <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                      {{ $pesanan->kode_pesanan }}
                      </td>
                      <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        Rp. {{ number_format($pesanan->total_harga) }}
                      </td>
                      <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        @if ($pesanan->status_pesanan=='Lunas')
                        <div class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                          {{ $pesanan->status_pesanan }}
                        </div>
                        @elseif($pesanan->status_pesanan=='Batal')
                        <div class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                          {{ $pesanan->status_pesanan }}
                        </div>
                        @else
                        <div class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                          {{ $pesanan->status_pesanan }}
                        </div>
                        @endif
                      </td>
                      <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        @if ($pesanan->status_pesanan=='belum lunas')
                        <a  href="/pesanan/buktitf/{{ $pesanan->id }}" disabled data-mdb-ripple="true" data-mdb-ripple-color="light"
                          class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out">
                            Upload</a>
                        @elseif($pesanan->status_pesanan=='Lunas')
                        <div class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                          Lunas
                        </div>
                        @else
                        <div class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                          Batal
                        </div>
                        @endif
                      </td>
                      <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        <a href="/pesanan/detail/{{ $pesanan->id }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                          class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fa-regular fa-eye"></i> Detail</a>
                      </td>
                    </tr>  
                    @endforeach

                  </tbody>
                </table>
                {{ $pesanans->links() }}
              </div>
            </div>
          </div>
        </div>

      </div> 
      @else
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    <img src="{{ url('images/notransaction.png') }}" />
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
      @endif
      
    </div>


{{-- // --}}
</div>
<!-- Container for demo purpose -->
@endsection