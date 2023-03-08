<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    {{-- cdn tailwind --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
      }
    }
  }
</script>
    {{-- end cdn --}}

    {{-- trik editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
          display: none;
        }
      </style>  
    {{-- end trik editor --}}
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    {{-- datatable --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- end datatable --}}
</head>
<body class="flex bg-gray-100 font-family-karla">

    <aside class="relative hidden w-64 h-screen shadow-xl bg-sidebar sm:block">
        <div class="p-6">
            <a href="/admin" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="pt-3 text-base font-semibold text-white">
            <a href="/admin" class="flex items-center py-4 pl-6 text-white {{ Request::is('admin') ? 'active-nav-link' : '' }}  nav-item">
                <i class="mr-3 fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="/admin/kategori" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/kategori*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-table"></i>
                Kategori
            </a>
            <a href="/admin/produk" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/produk*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-laptop"></i>
                Produk
            </a>
            <a href="/admin/slidder" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/slidder*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-columns"></i>
                Slidder
            </a>
            <a href="/admin/pesanan/masuk" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/pesanan/masuk*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-list"></i>
                Pesanan Masuk
                <?php
                $pesanan_checkout = \App\Models\Pesanan::where('status', '1')->where('status_pesanan', 'belum lunas')->where('buktitf','!=', null )->count();
                ?>
                @if (!empty($pesanan_checkout))
                  <span class="ml-1 inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $pesanan_checkout }}</span>
                @endif 
            </a>
            <a href="/admin/semua/pesanan" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/semua/pesanan*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-tasks"></i>
                Semua Pesanan
            </a>
            <a href="/admin/semua/user" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/semua/user*') ? 'active-nav-link' : '' }} nav-item">
                <i class="mr-3 fas fa-users"></i>
                Semua User
            </a>
            <a href="/" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-sign-out-alt"></i>
                Exit
            </a>
        </nav>
    </aside>

    <div class="flex flex-col w-full h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="items-center hidden w-full px-6 py-2 bg-white sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative flex justify-end w-1/2">
                <button @click="isOpen = !isOpen" class="z-10 w-12 h-12 overflow-hidden border-4 border-gray-400 rounded-full realtive hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ url('images/instalasi.png') }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="fixed inset-0 w-full h-full cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 py-2 mt-16 bg-white rounded-lg shadow-lg">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="/admin" class="flex items-center py-4 pl-6 text-white {{ Request::is('admin') ? 'active-nav-link' : '' }}  nav-item">
                    <i class="mr-3 fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="/admin/kategori" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/kategori*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-table"></i>
                    Kategori
                </a>
                <a href="/admin/produk" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/produk*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-laptop"></i>
                    Produk
                </a>
                <a href="/admin/slidder" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/slidder*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-columns"></i>
                    Slidder
                </a>
                <a href="/admin/pesanan/masuk" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/pesanan/masuk*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-list"></i>
                    Pesanan Masuk
                    <?php
                    $pesanan_checkout = \App\Models\Pesanan::where('status', '1')->where('status_pesanan', 'belum lunas')->where('buktitf','!=', null )->count();
                    ?>
                    @if (!empty($pesanan_checkout))
                      <span class="ml-1 inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $pesanan_checkout }}</span>
                    @endif 
                </a>
                <a href="/admin/semua/pesanan" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/semua/pesanan*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-tasks"></i>
                    Semua Pesanan
                </a>
                <a href="/admin/semua/user" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 {{ Request::is('admin/semua/user*') ? 'active-nav-link' : '' }} nav-item">
                    <i class="mr-3 fas fa-users"></i>
                    Semua User
                </a>
                <a href="/" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-sign-out-alt"></i>
                    Exit
                </a> {{-- <i class="mr-3 fas fa-sign-out-alt"></i> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="text-white">
                            <p class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                                <i class="mr-3 fas fa-sign-out-alt"></i>
                                 Log Out 
                            </p>
                        </x-responsive-nav-link>
                    </form>
            </nav>
            <!-- <button class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                <i class="mr-3 fas fa-plus"></i> New Report
            </button> -->
        </header>
    
        <div class="flex flex-col w-full overflow-x-hidden bg-white border-t">
            <main class="flex-grow w-full p-6">
                {{-- <h1 class="pb-6 text-3xl text-black">Dashboard</h1> --}}
                @yield('content')
            </main>
    
        </div>
        
    </div>
    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script>
        
        $('.deleteproduk').click( function(){
            var id =$(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            swal({
                  title: "Yakin Mau Menghapus?",
                  text: "Apakah kamu ingin menghapus produk "+nama,
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location="/admin/produk/"+id+"/delete"
                    swal("Data berhsail dihapus!", {
                      icon: "success",
                    });
                  } else {
                    swal("Data tidak jadi dihapus!");
                  }
                });
        });
    </script> --}}
    @include('sweet::alert')
    {{-- // --}}
    {{-- cnd tailwind --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
@stack('scripts')
</body>
</html>
