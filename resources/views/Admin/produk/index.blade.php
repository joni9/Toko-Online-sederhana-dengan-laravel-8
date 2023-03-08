@extends('Admin.layouts.app')
@section('content')

  <h2 class="py-1 mb-6 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg ">Halaman <u class="text-blue-600">Produk</u></h2>
<a href="/admin/produk/create" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Tambah produk</a>
<form action="/admin/produk" method="get">
  {{-- @csrf --}}
  <div class="flex justify-end">
    <div class="mb-3 xl:w-96">
      <div class="relative flex flex-wrap items-stretch w-full input-group">
        <input name="search"  value="{{ request('search') }}" type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal border-blue-600 text-gray-700 bg-white bg-clip-padding border border-solid  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <button type="submit" class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center" type="button" id="button-addon2">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</form>
<div class="flex flex-col bg-white">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-center">
            <thead class="bg-blue-500 border-b">
              <tr>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-2">
                No
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-3">
                Nama produk
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-3">
                  Gambar produk
                  </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-4">
                Harga Produk
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-4">
                Stok Produk
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-4">
                Kategori Produk
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-3">
                 Action
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
                @foreach ($produks as $produk)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                        {{ $produk->nama }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 w-60 whitespace-nowrap">
                      <img src="{{ asset('storage/'.$produk->gambar_produk) }}" class="w-fit h-fit "> 
                  </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                        {{ $produk->harga }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                        {{ $produk->stok }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                        {{ $produk->kategori->nama }}
                    </td> 
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 justify-evenly whitespace-nowrap col-sm-3">
                      <a href="/admin/produk/{{ $produk->id }}/edit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                      class=" inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out">
                    <svg class="w-6 h-6 text-white-500"  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></>    
                    </a>
                        <form action="/admin/produk/{{ $produk->id }}" method="post" class="d-inline">
                       @method("DELETE")
                       @csrf
                       <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" onclick="return confirm('are you sure delete {{ $produk->nama }}???')"><svg class="w-6 h-6 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg></button>
                       
                       </form>
                  </td>
                </tr> 
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
