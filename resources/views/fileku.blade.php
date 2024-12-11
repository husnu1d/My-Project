<x-app-layout>
    <section class=" mt-10 rounded-lg shadow px-8 py-8 bg-white">
              <div class="flex  justify-between items-center gap-4 mb-8" >
                <label class=" p-2 md:px-4 bg-purple-600 text-white text-sm font-medium rounded-lg hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300 flex gap-4 items-center cursor-pointer">
                    <i class="fa-sharp fa-solid fa-plus"></i>
                    <span>Tambah Berkas</span>
                    <input id="fileInput" type="file" name="file" class="hidden" accept=".pdf" @change="showModal = true" />
                </label>
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
                <table class="min-w-full border-collapse bg-gray-50 text-sm text-left text-gray-700">
                  <thead class="bg-gradient-to-r from-purple-600 to-purple-800 text-white">
                      <tr>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Namafile</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Type file</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Size</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Author</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Action</th>
                      </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-300">
                    <tr class="hover:bg-purple-50">
                        <td class="px-6 py-4">document.pdf</td> 
                        <td class="px-6 py-4">PDF</td> 
                        <td class="px-6 py-4">2MB</td> 
                        <td class="px-6 py-4">John Doe</td> 
                        <td class="px-6 py-4 space-x-2">
                            <a href="#" class="text-gray-500 px-2 py-1 inline-block hover:scale-110 border border-gray-500 hover:border-gray-800 hover:bg-gray-100 rounded-xl duration-75 transition-all ease-in">
                                <i class="fa-sharp fa-solid fa-pen"></i> Rename
                            </a>
                            <a href="#" class="bg-red-500 text-white px-2 py-1 inline-block hover:scale-110 border border-red-800 hover:border-red-500 hover:bg-red-400 rounded-xl duration-75 transition-all ease-in">
                                <i class="fa-solid fa-delete-left"></i> Delete
                            </a>
                        </td> 
                    </tr>
                                   
                      
                      
                  </tbody>
                </table>
              
              </div>
    </section>
</x-app-layout>
