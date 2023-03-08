@extends('layouts.app')
@section('content')
<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-3">

    @if(!empty($pesanan) && $pesanan->total_harga>1000)
    <form action="/keranjang/updatedata" method="post">
        {{-- @method('put') --}}
        @csrf
        <div class="block max-w-full mt-10 mb-10 bg-white border border-blue-500 rounded-lg shadow-lg">
            <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
                <svg class="w-6 h-6 mr-3 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
                <b>Data Kirim Barang</b>
            </div>
            <div class="grid gap-6 lg:grid-cols-1 xl:gap-x-12">
                <div class="mb-6 lg:mb-0">
                      <div class="p-6">
                          <table class="w-full py-1 mb-2 ">
                            <tr>
                              <td class="py-2"><strong>Nama Lengkap</strong></td>
                            </tr>
                            <tr></tr>
                            <tr>
                              <td class="py-2"> <input type="text" name="name" class="
                                @error('name') is-invalid @enderror
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
                              " id="exampleFormControlInput3" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" />
                                                        @error('name')
                                                        <div class="text-base text-red-500">
                                                            Harus diisi minimal 3 huruf!
                                                        </div>
                                                        @enderror
                                    </div>
                                </div>
                            </td>
                                
                            </tr>
                            <tr>
                              <td class="py-2"><strong>NO HP/WA</strong></td>
                            </tr>
                            <tr>
                                <td class="py-2"><input name="nohp" @error('nohp') is-invalid @enderror type="number"
                                    value="{{ old('nohp',$user->nohp) }}" class="
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
                      " id="exampleFormControlInput3" placeholder="contoh: 082133444915" />
                                @error('nohp')
                                <div class="text-base text-red-500">
                                    Harus diisi Gaes, Nomer Harus Valis!  
                                </div>
                                @enderror
                        </div>
                    </div></td>
                              </tr>
                            <tr class="mt-3">
                              <td class="py-2"><strong>Alamat</strong></td>
                            </tr>
                            <tr class="mt-3">
                                <td class="py-2"><textarea name="alamat" type="text" @error('alamat') is-invalid @enderror class="
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
                                  " id="exampleFormControlTextarea1" rows="3"
                        placeholder="Alamat Lengkap RT RW" />{{ old('alamat',$user->alamat) }}</textarea>
                    @error('alamat')
                    <div class="text-base text-red-500">
                        Harus diisi Gaes, Alamat Lengkap RT RW!
                    </div>
                    @enderror
            </div></td>
                              </tr>
                          </table>
                        
                      </div>
                    </div>
                  </div>
    
        <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                            class=" ml-5 mb-5 inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                            Simpan</button>
    
    </div>
    </form>
@endif





<div class="block max-w-full mb-10 bg-white border border-blue-500 rounded-lg shadow-lg">
    <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
        <svg class="w-6 h-6 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <b>Keranjang Belanjaan</b>
    </div>
    @if(!empty($pesanan) && $pesanan->total_harga>1000)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full table-auto">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Gambar Produk
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Harga Produk
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Jumlah Produk
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Jumlah Harga
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanandetails as $pesanandetail)
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 w-60 whitespace-nowrap">
                                        <img src="{{ asset('storage/'.$pesanandetail->produk->gambar_produk) }}" class="w-fit" />
                                    </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    {{ $pesanandetail->produk->nama }}
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Rp. {{ number_format($pesanandetail->produk->harga) }}
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    {{ $pesanandetail->jumlah_pesanan }}
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Rp. {{ number_format($pesanandetail->jumlah_harga) }}
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    <form action="/keranjang/{{ $pesanandetail->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-mdb-ripple="true" data-mdb-ripple-color="light"
                                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                            X</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Kode Unik
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Rp. {{ number_format($pesanan->kode_unik) }}
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">

                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Jumlah Total
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Rp. {{ number_format($pesanan->total_harga) }}
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    <a href="/keranjang/checkout" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                        class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                        CheckOut</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
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
