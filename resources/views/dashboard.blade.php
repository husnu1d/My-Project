<x-app-layout>
    <x-slot name="header">
                    {{ __('Dashboard') }}
    </x-slot>
    <section class=" my-8 h-full overflow-y-scroll">
        <ul class="grid grid-cols-3 gap-8 md:grid-cols-5 auto-rows-[8em]">
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-blue-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-blue-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-purple-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-purple-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-purple-800">
                        <h3 class="text-xl font-bold ">SPM</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-violet-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-violet-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-violet-800">
                        <h3 class="text-xl font-bold ">SPBy</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-orange-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-orange-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-orange-800">
                        <h3 class="text-xl font-bold ">SPP</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-cyan-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-cyan-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-cyan-800">
                        <h3 class="text-xl font-bold ">FORM PERMINTAAN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-blue-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-blue-800">
                        <h3 class="text-xl font-bold ">SPD & BUKTI VISUM</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-purple-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-purple-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-purple-800">
                        <h3 class="text-xl font-bold ">PRESENSI & UANG MAKAN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-violet-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-violet-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-violet-800">
                        <h3 class="text-xl font-bold ">LAPORAN PERJADIN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-orange-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-orange-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-orange-800">
                        <h3 class="text-xl font-bold ">DAFTAR RILL</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-cyan-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-cyan-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-cyan-800">
                        <h3 class="text-xl font-bold ">DAFTAR GAJI</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-blue-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-blue-800">
                        <h3 class="text-xl font-bold ">UNDANGAN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-purple-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-purple-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-purple-800">
                        <h3 class="text-xl font-bold ">KAK</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-violet-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-violet-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-violet-800">
                        <h3 class="text-xl font-bold ">BERITA ACARA</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-orange-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-orange-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-orange-800">
                        <h3 class="text-xl font-bold ">RINCIAN PERJADIN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-cyan-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-cyan-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-cyan-800">
                        <h3 class="text-xl font-bold ">SPJ</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-blue-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-blue-800">
                        <h3 class="text-xl font-bold ">BUKTI PEMBAYARAN</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-purple-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-purple-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-purple-800">
                        <h3 class="text-xl font-bold ">LAINNYA</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-violet-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-violet-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-violet-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-orange-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-orange-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-orange-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-cyan-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-cyan-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-cyan-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-blue-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-blue-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
            <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-purple-500 rounded-md overflow-hidden shadow">
                <div href="" class="flex items-center gap-4">
                    <div class="rounded-full p-4 bg-purple-800">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex flex-col text-purple-800">
                        <h3 class="text-xl font-bold ">SP2D</h3>
                        <small class="text-sm font-thin mb-3">100 FILES</small>
                        <a href="" class="underline  text-sm font-bold">More Info</a>
                    </div>
                    
                </div>
            </li>
        </ul>
    </section>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
