@extends('Admin.layouts.app')
@section('content')
<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-3">

    <a href="/admin/pesanan/masuk" class=" mb-5 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"> <i class="fas fa-arrow-left"></i> Kembali</a>
    <h2 class="py-1 mb-12 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg ">Pesanan <u class="text-blue-600">{{ $pesanan->kode_pesanan }}</u></h2>

    <div class="block max-w-full mt-10 mb-10 bg-white border border-blue-500 rounded-lg shadow-lg">
      <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
          <svg class="w-6 h-6 mr-3 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
          <b>Data Pelanggan</b>
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
                        <td class="py-2"> <input disabled type="text" name="name" class="
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
                        " id="exampleFormControlInput3" placeholder="Nama Lengkap" value="{{ old('name', $pesanan->user->name) }}" />
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
                          <td class="py-2"><input disabled name="nohp" @error('nohp') is-invalid @enderror type="number"
                              value="{{ old('nohp',$pesanan->user->nohp) }}" class="
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
                          <td class="py-2"><textarea disabled name="alamat" type="text" @error('alamat') is-invalid @enderror class="
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
                  placeholder="Alamat Lengkap RT RW" />{{ old('alamat',$pesanan->user->alamat) }}</textarea>
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

</div>
      


    <div class="block max-w-full mt-5 bg-white border border-blue-500 rounded-lg shadow-lg">
      <div class="flex px-6 py-3 text-lg text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
          <svg class="w-6 h-6 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <b>Keranjang Belanjaan</b>
      </div>
      <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                      <table class="min-w-full">
                          <thead class="bg-white border-b">
                              <tr>
                                  <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                      No
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
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($pesanandetails as $pesanandetail)
                              <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                  <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                      {{ $loop->iteration }}</td>
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
                                      Jumlah Total
                                  </th>
                                  <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                      Rp. {{ number_format($pesanan->total_harga) }}
                                  </th>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <div class="block max-w-full mt-5 mb-5 bg-white border border-blue-500 rounded-lg shadow-lg ">
    <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
      <svg class="w-6 h-6 mr-3 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />  <line x1="13" y1="8" x2="15" y2="8" />  <line x1="13" y1="12" x2="15" y2="12" /></svg>
      <b>Info Pesanan</b> 
    </div>
    <div class="p-6">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                  <tr>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                    Tanggal
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                    No Pesanan
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                    Status
                    </th>
                    @if ($pesanan->status_pesanan == 'Lunas')
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                    Nota Lunas
                    </th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                      {{ Carbon\carbon::parse($pesanan->tanggal)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                      {{ $pesanan->kode_pesanan }}
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
                    @if ($pesanan->status_pesanan == 'Lunas')
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        <a href="/pesanan/detail/nota/{{ $pesanan->id }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                          Download</a>
                      </td>
                    @endif
                  </tr>  

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>


    @if (!empty($pesanan->buktitf))
    <div class="block max-w-full mt-5 mb-5 bg-white border border-blue-500 rounded-lg shadow-lg">
        <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
          <svg class="w-6 h-6 mr-3 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 3v4a1 1 0 0 0 1 1h4" />  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />  <path d="M9 15l2 2l4 -4" /></svg>
          <b>Bukti TF</b> 
        </div>
        <div class="p-6">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr >
                      <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">
                        <img src="{{ asset('storage/'.$pesanan->buktitf) }}" class="w-60 h-90 ">
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
  
      </div>
      @endif

{{-- // --}}
</div>
<!-- Container for demo purpose -->
@endsection