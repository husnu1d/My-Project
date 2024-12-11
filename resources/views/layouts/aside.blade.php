
<aside
        :class="isMobile ? 'absolute z-30 bottom-0 top-0 left-0' : ''"
        x-show="!isMobile || sidenavOpen"
        @click.outside="sidenavOpen = false"
        class="w-60 max-h-screen justify-between bg-gray-800 text-gray-200 flex flex-col flex-nowrap"
      >
        <div
          class="flex items-center justify-between px-6 py-8 border-b border-gray-500"
        >
        <a class="text-white text-3xl font-bold uppercase text-center"> SIARDIKU</a>
          <button
            x-show="isMobile"
            @click="sidenavOpen = false"
            class="text-gray-400 hover:text-gray-200"
          >
            <i class="fa-solid fa-times"></i>
          </button>
        </div>
        <nav class="flex-1 flex flex-col justify-around overflow-y-auto px-2 space-y-2 mt-10">
          <div>
            <p class="text-gray-400 text-xs uppercase font-bold pl-4">Fitur Utama</p>
            <ul class="space-y-2 mt-2">
              <li>
                <x-nav-link :href="route('dashboard')" :dashboard-active="request()->routeIs('dashboard')" >
                  <i class="fas fa-home mr-3" aria-hidden="true"></i
                  ><span>{{__('Dashboard')}}</span></a>
                </x-nav-link> 
              </li>
             
               <li>
                    <x-nav-link :href="route('documents.Split')" :dashboard-active="request()->routeIs('Split')">
                        <i class="fas fa-split mr-3" aria-hidden="true"></i><span>{{__('Split Dokumen ')}}</span></a>
                    </x-nav-link>
                </li>
               <li>
                    <x-nav-link :href="route('documents')" :dashboard-active="request()->routeIs('File')">
                        <i class="fas fa-file mr-3" aria-hidden="true"></i><span>{{__('File Dokumen')}}</span></a>
                    </x-nav-link>
                </li>
             
            </ul>
          </div>
          <div>
            <p class="text-gray-400 text-xs uppercase font-bold pl-4">User Info</p>
            <ul class="space-y-2 mt-2">
             
              <li>
                <x-nav-link :href="route('MyProfile')" :dashboard-active="request()->routeIs('MyProfile')" >
                  <i class="fas fa-user mr-3" aria-hidden="true"></i
                  ><span>{{__('My profile')}}</span></a
                ></x-nav-link>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                <x-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-nav-link>
                </form>
                
              </li>
            </ul>
          </div>
          <button class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700">
            <i class="fa-solid fa-square-question mr-3" aria-current="true"></i>
            <span>{{__('Help')}}</span></a>
          </button>
        </nav>
      </aside>