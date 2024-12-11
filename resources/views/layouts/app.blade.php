<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://atugatran.github.io/FontAwesome6Pro/css/all.min.css"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 ">
        {{-- <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}
        
        <div
        class="flex w-full  h-screen overflow-hidden"
        x-data="{ isMobile: window.innerWidth <= 925, sidenavOpen: false, showModal: false}"
        x-init="() => window.addEventListener('resize', () => isMobile = window.innerWidth <= 925)"
      >
      
      @include('layouts.aside')
      <div class="flex w-full h-full overflow-y-auto p-4 bg-gray-100 box-border shadow-lg rounded-lg" >
        
        <div class=" flex-1 flex flex-col h-fit ">
          <header class="flex flex-1  relative">
            <nav class="flex-1 h-fit px-4">
              <ul
                class="flex items-center justify-between  text-center"
                x-data="{openSettings:false}"
              >
                <li>
                  <button
                    x-show="isMobile && !sidenavOpen"
                    @click="sidenavOpen = true"
                    class="text-white bg-slate-700 hover:bg-slate ease-in-out duration-100 transition-all hover:scale-110 px-3 py-1 rounded-full shadow-lg"
                  >
                    <i class="fas fa-bars" aria-hidden="true"></i>
                    <span class="sr-only">Open Navigation</span>
                  </button>
                </li>
                
                
              </ul>
            </nav>
          </header>

          <main class="  flex-1 px-6">
            <h1
              class="text-center md:text-left text-4xl font-semibold py-4 md:py-6 text-purple-900"
            >
              Halaman 
            </h1>
            <nav
              class="flex pl-2 scale-100 max-md:scale-75 justify-center md:justify-start flex-wrap"
              aria-label="Breadcrumb"
            >
              <ol
                class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
              >
                <li
                  class="flex items-center text-gray-500 font-light text-sm"
                  aria-current="page"
                >
                  <i class="fa-sharp fa-solid fa-house"></i>
                  <span class="ms-1 text-sm font-medium md:ms-2"
                    >Halaman  </span
                  >
                </li>
              </ol>
            </nav>
            {{$slot}}
          </main>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    </body>
</html>
