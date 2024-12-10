<li class='hover:scale-95 ease-in-out duration-75 flex items-center p-4  border-2  rounded-md overflow-hidden shadow {{"bg-". $color . "-50"}} {{"border-". $color . "-500"}} '>
    <div  class="flex items-center gap-8">
                    <div class="p-4 rounded-full  {{'bg-' . $color . '-800 '}} ">
                        <i :class="!isMobile ?'fa-2x':''" class="fa-light fa-messages-question text-white "></i>
                    </div>
                    <div class="flex py-4 flex-col {{'text-' . $color . '-800'}} ">
                        <h3 class="text-lg font-bold ">{{ $title }}</h3>
                        <small class=" font-thin mb-3">{{ $qty }}</small>
                       {{ $slot }}
                    </div>
    </div>
</li>