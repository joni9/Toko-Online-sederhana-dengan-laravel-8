@extends('layouts.app')
@section('content')
<!-- Container for demo purpose -->
<div class="container px-6 mx-auto mt-3">


    <form action="/myprofil/updatedata" method="post">
        {{-- @method('put') --}}
        @csrf
    <div class="block max-w-full mt-10 mb-10 bg-white border border-blue-500 rounded-lg shadow-lg">
        <div class="flex px-6 py-3 text-lg font-bold text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
            <svg class="w-6 h-6 mr-3 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
            <b>My Profil</b>
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
{{-- // --}}
</div>


  </div>
<!-- Container for demo purpose -->
@endsection


