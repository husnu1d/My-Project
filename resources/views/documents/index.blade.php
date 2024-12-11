<x-app-layout>
    <section class=" mt-10 rounded-lg shadow px-8 py-8 bg-white">
              <div class="flex  justify-end items-center gap-4 mb-8" >
                <div id="date-range-picker" date-rangepicker class="flex items-center">
                  <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                         <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                  </div>
                  <span class="mx-4 text-gray-500">to</span>
                  <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                         <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5" placeholder="Select date end">
                  </div>
                </div>
                
              </div>

              <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full border-collapse bg-gray-50 text-sm text-left text-gray-700">
                  <thead class="bg-gradient-to-r from-purple-600 to-purple-800 text-white">
                      <tr>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Upload date</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Type file</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Jumlah</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Size</th>
                          <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Author</th>
                      </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-300">
                    <tr class="hover:bg-purple-50">
                      <td class="px-6 py-4">2024-01-09</td>
                      <td class="px-6 py-4">PDF</td>
                      <td class="px-6 py-4">10</td>
                      <td class="px-6 py-4">15MB</td>
                      <td class="px-6 py-4">John Doe</td>
                    </tr>
                  </tbody>
                </table>
              
              </div>
    </section>
</x-app-layout>
{{-- <div class="relative w-full sm:w-auto">
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
</div> --}}