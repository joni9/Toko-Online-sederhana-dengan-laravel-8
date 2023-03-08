@extends('Admin.layouts.app')
@section('content')

   <h2 class="py-1 mb-6 text-3xl font-bold text-center bg-white border border-blue-600 rounded-lg shadow-lg ">Halaman <u class="text-blue-600">Dashboard</u></h2>
   <div class="flex flex-wrap">

    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/semua/user">
        <div class="p-5 border-b-4 border-pink-500 rounded-lg shadow-xl bg-gradient-to-b from-pink-200 to-pink-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-pink-600 rounded-full"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Semua Users</h2>
                    <p class="text-3xl font-bold">{{ $user }} <span class="text-pink-500"></p>
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>
    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/pesanan/masuk">
        <div class="p-5 border-b-4 border-yellow-600 rounded-lg shadow-xl bg-gradient-to-b from-yellow-200 to-yellow-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-yellow-600 rounded-full"><i class="fas fa-list fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Pesanan Masuk</h2>
                    <p class="text-3xl font-bold">{{ $pesanan_masuk }} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></p>
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>
    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/kategori">
        <div class="p-5 border-b-4 border-green-600 rounded-lg shadow-xl bg-gradient-to-b from-green-200 to-green-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-green-600 rounded-full"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Semua Pesanan</h2>
                   <p class="text-3xl font-bold">{{ $semua_pesanan }} <i class="fas fa-exchange-alt"></i></span></p>
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>
    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/semua/pesanan">
        <div class="p-5 border-b-4 border-indigo-500 rounded-lg shadow-xl bg-gradient-to-b from-indigo-200 to-indigo-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-indigo-600 rounded-full"><i class="fas fa-table fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Total Kategori</h2>
                    <p class="text-3xl font-bold">{{ $kategori }} </p>    
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>

    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/produk">
        <div class="p-5 border-b-4 border-blue-500 rounded-lg shadow-xl bg-gradient-to-b from-blue-200 to-blue-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-blue-600 rounded-full"><i class="fas fa-laptop fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Total Produk</h2>
                    <p class="text-3xl font-bold">{{ $produk }}</p>
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>
    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
        <!--Metric Card-->
        <a href="/admin/slidder">
        <div class="p-5 border-b-4 border-red-500 rounded-lg shadow-xl bg-gradient-to-b from-red-200 to-red-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="p-5 bg-red-600 rounded-full"><fa-2x class="fas fa-columns fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold text-gray-600 uppercase">Total Slidder</h2>
                    <p class="text-3xl font-bold">{{ $slidder }} </p>
                </div>
            </div>
        </div>
        </a>
        <!--/Metric Card-->
    </div>
</div>
@endsection
