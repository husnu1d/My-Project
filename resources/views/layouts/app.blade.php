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
    <body class="bg-gray-50 h-screen">
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
        class="flex w-full overflow-hidden h-full"
        x-data="{ isMobile: window.innerWidth <= 925, sidenavOpen: false}"
        x-init="() => window.addEventListener('resize', () => isMobile = window.innerWidth <= 925)"
      >
      @include('layouts.aside')
      <div class="flex w-full p-4 bg-gray-100 box-border shadow-lg rounded-lg">
        <!-- Header -->
        <div class="w-full flex-1 flex flex-col h-fit">
          <header class="flex flex-1 justify-between mb-6 relative">
            <nav class="flex-1 h-fit relative fixed px-4">
              <ul
                class="flex items-center justify-between"
                x-data="{openSettings:false}"
              >
                <li class="">
                  <button
                    x-show="isMobile && !sidenavOpen"
                    @click="sidenavOpen = true"
                    class="text-white bg-slate-700 hover:bg-slate ease-in-out duration-100 transition-all hover:scale-110 px-3 py-1 rounded-full shadow-lg"
                  >
                    <i class="fas fa-bars" aria-hidden="true"></i>
                    <span class="sr-only">Open Navigation</span>
                  </button>
                </li>
                <li class="basis-64 lg:basis-96">
                  <form
                    action=""
                    class="flex-1 flex max-sm:scale-95"
                    x-data="{isFocused:false}"
                  >

                      <input
                      type="search"
                      name="searching"
                      class="flex-1 border-none  outline-none flex items-center border px-4 rounded-xl focus-within:ring focus-within:border-purple-500 font-medium text-gray-200 text-purple-800 bg-opacity-0 "
                      placeholder="Nama folder,File,dan lain-lain ..."
                      @focus="isFocused = true"
                      @blur="isFocused = false"
                    />
                    <label class="basis-8" for="searching">
                        <i
                          :class="isFocused ? 'text-gray-500' : 'text-gray-300' "
                          class="fa-sharp fa-solid fa-magnifying-glass"
                          x-transition
                        ></i>
                      </label>
                   
                  </form>
                </li>
                <li class="relative">
                  <button
                    :class="!isMobile || sidenavOpen ? ' focus-within:text-gray-600' : ''"
                    class="text-gray-400 hover:text-gray-600 rounded-full"
                    x-transition
                    @click="openSettings = !openSettings"
                  >
                    <div class="flex items-center justify-center h-fit gap-8">
                      <i
                        :class="isMobile ? 'fa-solid fa-ellipsis-vertical' : 'fa-solid fa-user' "
                      ></i>
                      <span
                        :class="!isMobile && sidenavOpen ? '' : 'hidden'"
                        class="lg:block"
                        >Admin</span
                      >
                      <i
                        :class="!isMobile && sidenavOpen ? '' : 'hidden'"
                        class="lg:block fas fa-chevron-down"
                      ></i>
                    </div>
                  </button>
                  <div
                    x-show="openSettings"
                    @click.outside="openSettings = false"
                    class="absolute top-10 right-0 w-32 bg-white border border-gray-200 rounded-lg shadow-md z-20 text-sm"
                  >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100"
                      >Settings</a
                    >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100"
                      >Change Avatar</a
                    >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100"
                      >Logout</a
                    >
                  </div>
                </li>
              </ul>
            </nav>
          </header>

          <main class="w-full flex-1 px-6">
            <h1
              class="text-center md:text-left text-4xl font-semibold py-4 md:py-6 text-purple-900"
            >
              Halaman Dashboard
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
                    >Halaman Dashboard</span
                  >
                </li>
              </ol>
            </nav>
            <section class="mt-10 rounded-lg shadow px-8 py-8 bg-white">
              <div
                class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-4"
              >
                <form
                  enctype="multipart/form-data"
                  method="post"
                  @submit.prevent="validateFile"
                >
                  <label
                    class="p-2 md:px-4 bg-purple-600 text-white text-sm font-medium rounded-lg hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300 flex gap-4 items-center cursor-pointer"
                  >
                    <i class="fa-sharp fa-solid fa-plus"></i>
                    <span>Tambah Berkas</span>
                    <input
                      id="fileInput"
                      type="file"
                      name="file"
                      class="hidden"
                      @change="fileChosen"
                      accept=".pdf"
                    />
                  </label>
                </form>

                <!-- Filter Dropdown -->
                <div
                  id="date-range-picker"
                  date-rangepicker
                  class="flex items-center"
                >
                  <div class="relative">
                    <div
                      class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                    >
                      <svg
                        class="w-4 h-4 text-gray-500"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                      </svg>
                    </div>
                    <input
                      id="datepicker-range-start"
                      name="start"
                      type="text"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5"
                      placeholder="Select date start"
                    />
                  </div>
                  <span class="mx-4 text-gray-500">to</span>
                  <div class="relative">
                    <div
                      class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                    >
                      <svg
                        class="w-4 h-4 text-gray-500"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                      </svg>
                    </div>
                    <input
                      id="datepicker-range-end"
                      name="end"
                      type="text"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5"
                      placeholder="Select date end"
                    />
                  </div>
                </div>

                <!-- Search Bar -->
                <div class="relative w-full sm:w-auto">
                  <input
                    type="text"
                    placeholder="Cari..."
                    class="w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500"
                  />
                  <button
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-purple-600"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 16l2-2m2-2l2-2m-2-2a7 7 0 110 14 7 7 0 010-14z"
                      />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="overflow-x-auto shadow-md rounded-lg">
                <table
                  class="min-w-full border-collapse bg-gray-50 text-sm text-left text-gray-700"
                >
                  <thead
                    class="bg-gradient-to-r from-purple-600 to-purple-800 text-white"
                  >
                    <tr>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider flex items-center gap-2"
                      >
                        <input
                          type="checkbox"
                          id="pilihsemua"
                          class="form-checkbox h-4 w-4"
                        />
                        <label for="pilihsemua">Pilih Semua</label>
                      </th>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider"
                      >
                        Nama File
                      </th>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider"
                      >
                        Format File
                      </th>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider"
                      >
                        Author
                      </th>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider"
                      >
                        Tanggal Diupload
                      </th>
                      <th
                        class="px-6 py-3 text-xs font-semibold uppercase tracking-wider"
                      >
                        Alamat File
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-300">
                    <tr class="hover:bg-purple-50">
                      <td class="px-6 py-4">
                        <input type="checkbox" class="form-checkbox h-4 w-4" />
                      </td>
                      <td class="px-6 py-4">
                        <a href="#" class="text-purple-500">..</a>
                      </td>
                      <td class="px-6 py-4">Folder</td>
                      <td class="px-6 py-4">System</td>
                      <td class="px-6 py-4">Jan 9, 2024 07:34 AM</td>
                      <td class="px-6 py-4">/home/httpdocs</td>
                    </tr>
                    <tr class="bg-purple-50 hover:bg-purple-100">
                      <td class="px-6 py-4">
                        <input type="checkbox" class="form-checkbox h-4 w-4" />
                      </td>
                      <td class="px-6 py-4">
                        <a href="#" class="text-purple-500">index.html</a>
                      </td>
                      <td class="px-6 py-4">HTML</td>
                      <td class="px-6 py-4">Admin</td>
                      <td class="px-6 py-4">Jan 9, 2024 07:34 AM</td>
                      <td class="px-6 py-4">/home/httpdocs/index.html</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>
