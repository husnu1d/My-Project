<x-app-layout>
    
    <section class=" my-8 h-full  overflow-hidden">
        <ul class="grid grid-cols-3 gap-8 md:grid-cols-5 auto-rows-[8em] ">
           <x-menu-link :color="'blue'" :title="'SSD'" :qty="'100 file'">
            <a href="" class="underline  text-sm font-bold">More Info</a>
           </x-menu-link>
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
