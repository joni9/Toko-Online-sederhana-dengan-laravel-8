<nav x-data="{ open: false }" class="py-2 bg-white border-blue-500 border-y-4">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('images/logo.png') }}" alt="" class="block w-auto h-10 text-gray-600 fill-current">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                    <x-nav-link :href="route('produk')" :active="request()->routeIs('produk', 'produk_detail')">
                        {{ __('Produk') }} 
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                    <x-nav-link :href="route('kategori')" :active="request()->routeIs('kategori')">
                        {{ __('Kategori') }} 
                    </x-nav-link>
                </div>
                @if (Auth::user())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                        <x-nav-link :href="route('pesanan')" :active="request()->routeIs('pesanan', 'pesanan_detail', 'pesanan_detail_tf')">
                            {{ __('Pesanan') }}
                            <?php
                              $pesanan_checkout = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', '1')->where('status_pesanan', 'belum lunas')->where('buktitf', null)->count();
                              ?>
                              @if (!empty($pesanan_checkout))
                                <span class="ml-1 inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $pesanan_checkout }}</span>
                              @endif 
                        </x-nav-link>
                    </div>
                
                    
                @endif
                
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex sm:items-center sm:ml-6">
                @if (Auth::user())
                    <div class="hidden mr-3 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('keranjang')" :active="request()->routeIs('keranjang')">  
                            <svg class="w-6 h-6 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                              </svg>
                              <?php
                              $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                              if(!empty($pesanan_utama)){
                                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                              }
                              ?>
                              @if (!empty($notif))
                                <span class="inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $notif }}</span>
                              @endif                          
                            
                        </x-nav-link>
                    </div>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                <div>{{ Auth::user()->name }}</div>
    
                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        
                                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('myprofil')" >
                                {{ __('My Profil') }}
                            </x-dropdown-link>
                            @can('admin')
                            <x-dropdown-link :href="route('admin')">
                                {{ __('Admin') }}
                            </x-dropdown-link>
                            @endcan
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                @else
                <div class="hidden mr-3 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/login">  
                        Login                       
                    </x-nav-link>
                </div>
                <div class="hidden mr-3 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/register" >  
                        Register                       
                    </x-nav-link>
                </div>   
                @endif
                
                
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-blue-600 transition duration-150 ease-in-out border border-blue-600 rounded-md hover:text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-600 focus:text-white">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('produk')" :active="request()->routeIs('produk', 'produk_detail')">
                {{ __('Produk') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kategori')" :active="request()->routeIs('kategori')">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            @if (Auth::user())
            <x-responsive-nav-link :href="route('pesanan')" :active="request()->routeIs('pesanan', 'pesanan_detail', 'pesanan_detail_tf')">
                {{ __('Pesanan') }}
                <?php
                $pesanan_checkout = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', '1')->where('status_pesanan', 'belum lunas')->where('buktitf', null)->count();
                ?>
                @if (!empty($pesanan_checkout))
                  <span class="ml-1 inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $pesanan_checkout }}</span>
                @endif 
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link href="/login" >
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/register">
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::user())
        <div class="pt-4 pb-1 border-t border-gray-200">
            <x-responsive-nav-link class="flex px-4 mt-3" :href="route('keranjang')" :active="request()->routeIs('keranjang')">
                <svg class="w-6 h-6 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg> 
                  <?php
                  $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                  if(!empty($pesanan_utama)){
                    $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                  }
                  ?>
                  @if (!empty($notif))
                    <span class="inline-block py-0.5 px-1 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ">{{ $notif }}</span>
                  @endif
            </x-responsive-nav-link>
            <x-responsive-nav-link class="flex px-4 mt-3" :href="route('myprofil')" :active="request()->routeIs('myprofil')">
                {{ __('My Profil') }}
            </x-responsive-nav-link>
            @can('admin')
            <x-responsive-nav-link class="px-4 mt-3" :href="route('admin')">
                {{ __('Admin') }}
            </x-responsive-nav-link>
            @endcan
            <div class="px-4 mt-3">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
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
        @endif
        
    </div>
</nav>
