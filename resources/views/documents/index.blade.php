<x-app-layout>
    <section class="mt-10 rounded-lg shadow px-8 py-8 bg-white">
      <script src="//unpkg.com/alpinejs" defer></script>

        <!-- Button to Open Modal -->
        <div class="flex justify-between mb-4">
            <button @click="openModal = true"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Upload File
            </button>

            <!-- Search Bar -->
            <div class="relative w-full sm:w-auto">
                <input type="text" placeholder="Cari..."
                    class="w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" />
                <button class="absolute inset-y-0 right-0 flex items-center pr-3 text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16l2-2m2-2l2-2m-2-2a7 7 0 110 14 7 7 0 010-14z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal for File Upload -->
        <div x-show="openModal" x-cloak class="fixed inset-0 bg-gray-600 bg-opacity-75 flex justify-center items-center">
            <div class="bg-white rounded-lg shadow-xl p-6 w-1/3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Upload File</h3>
                    <button @click="openModal = false" class="text-red-500">
                        &times;
                    </button>
                </div>

                <form action="{{ route('documents.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="document" class="block text-sm font-medium text-gray-700">Pilih File</label>
                        <input type="file" name="document" accept=".pdf" required class="mt-1 block w-full" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Upload
                        </button>
                        <button type="button" @click="openModal = false"
                            class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table for Documents -->
        <div class="overflow-x-auto shadow-md rounded-lg mt-4">
            <table class="min-w-full border-collapse bg-gray-50 text-sm text-left text-gray-700">
                <thead class="bg-gradient-to-r from-purple-600 to-purple-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">NAMA FILE</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">Size</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">TANGGAL UPLOAD</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">AUTHOR</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @forelse ($documents as $document)
                    <tr>
                        <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">
                            <a href="{{ $document['file_path'] }}" target="_blank"
                                class="text-blue-500 hover:underline">
                                {{ $document['original_name'] }}
                            </a>
                        </td>
                        <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">PDF</td>
                        <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">{{ $document['size'] }}</td>
                        <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">{{ $document['created_at'] }}</td>
                        <td class="px-6 py-3 text-xs font-semibold uppercase tracking-wider">{{ $document['author'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No documents available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('uploadModal', () => ({
                openModal: false,
            }))
        })
    </script>
</x-app-layout>
