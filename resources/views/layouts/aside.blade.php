<aside
        :class="isMobile ? 'absolute z-30 bottom-0 top-0 left-0' : ''"
        x-show="!isMobile || sidenavOpen"
        @click.outside="sidenavOpen = false"
        class="w-60 bg-gray-800 text-gray-200 flex flex-col flex-nowrap"
      >
        <div
          class="flex items-center justify-between px-6 py-8 border-b border-gray-500"
        >
          <a class="text-2xl font-semibold" href="">E-arsip Dinsos </a>
          <button
            x-show="isMobile"
            @click="sidenavOpen = false"
            class="text-gray-400 hover:text-gray-200"
          >
            <i class="fa-solid fa-times"></i>
          </button>
        </div>
        <nav class="flex-1 overflow-y-auto px-2 space-y-2 mt-10">
          <div>
            <p class="text-gray-400 text-xs uppercase font-bold pl-4">Main</p>
            <ul class="space-y-2 mt-2">
              <li>
                <a
                  href="#"
                  class="flex items-center px-4 py-2 rounded-md bg-gray-700"
                  ><i class="fas fa-home mr-3" aria-hidden="true"></i
                  ><span>Dashboard</span></a
                >
              </li>
              <li x-data="{open:false}">
                <a
                  @click.prevent="open = !open"
                  href="#"
                  class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700"
                >
                  <i class="fas fa-file-pdf mr-3" aria-hidden="true"></i
                  ><span>Convert</span>
                </a>
                
              </li>
              <li x-data="{open:false}">
                <a
                  @click.prevent="open = !open"
                  href="#"
                  class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700"
                >
                  <i class="fas fa-folder mr-3" aria-hidden="true"></i
                  ><span>Arsip</span>
                </a>
                
              </li>
            </ul>
          </div>
          <div>
            <p class="text-gray-400 text-xs uppercase font-bold pl-4">Tools</p>
            <ul class="space-y-2 mt-2">
             
              <li>
                <a
                  href="#"
                  class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700"
                  ><i class="fas fa-trash-alt mr-3" aria-hidden="true"></i
                  ><span>Trash</span></a
                >
              </li>
            </ul>
          </div>
        </nav>
      </aside>