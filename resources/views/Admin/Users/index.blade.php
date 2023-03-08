@extends('Admin.layouts.app')
@section('content')

   <div class="block max-w-full bg-white border border-blue-500 rounded-lg shadow-lg">
    <div class="px-6 py-3 mb-6 text-lg text-center text-white bg-blue-500 border-b border-gray-300 rounded-t-lg">
     <b>Semua User</b> 
    </div>
    <div class="mx-6">
<form action="/admin/semua/user" method="get">
  {{-- @csrf --}}
  <div class="flex justify-end">
    <div class="mb-3 xl:w-96">
      <div class="relative flex flex-wrap items-stretch w-full input-group">
        <input name="search"  value="{{ request('search') }}" type="search" class="border border-blue-600 form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <button type="submit" class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center" type="button" id="button-addon2">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</form>
<a href="{{ route('exportpelanggan') }}" type="button" class="mt-3 mb-3 inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Download Data Pelanggan</a>

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
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-2">
                Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-3">
                NO HP / WA
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-white col-sm-4">
                Alamat Lengkap
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b ">
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                      {{ $user->nohp }}
                  </td>
                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-3">
                    {{ $user->alamat }}
                    </td>
                    </td>
                </tr> 
                @endforeach
              
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
