@extends('Admin.layouts.app')
@section('content')

   <h2 class="py-1 mb-6 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg ">Halaman <u class="text-blue-600">Slidder</u></h2>
<a href="/admin/slidder/create" type="button" class="inline-block mt-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Tambah slidder</a>
<div class="flex flex-col bg-white">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-center">
            <thead class="bg-blue-500 border-b">
              <tr>
                <th scope="col" class="w-20 h-10 px-6 py-4 text-sm font-medium text-white col-sm-2">
                  No
                </th>
                <th scope="col" class="h-10 px-6 py-4 text-sm font-medium text-white w-60 col-sm-4">
                  Gambar slidder
                </th>
                <th scope="col" class="w-40 h-10 px-6 py-4 text-sm font-medium text-white col-sm-3">
                 Action
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
                @foreach ($slidders as $slidder)
                <tr class="bg-white border-b">
                    <td class="w-20 h-40 px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap col-sm-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="h-40 px-6 py-4 text-sm font-light text-gray-900 w-60 whitespace-nowrap col-sm-4">
                        <img src="{{ asset('storage/'.$slidder->gambar_slidder) }}" class="mb-3 img-fluid col-sm-5"> 
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 justify-evenly whitespace-nowrap col-sm-3">
                      <a href="/admin/slidder/{{ $slidder->id }}/edit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                      class=" inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out">
                    <svg class="w-6 h-6 text-white-500"  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></>    
                    </a>
                        <form action="/admin/slidder/{{ $slidder->id }}" method="post" class="d-inline">
                       @method("DELETE")
                       @csrf
                       <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" onclick="return confirm('are you sure delete???')"><svg class="w-6 h-6 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg></button>
                       
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
