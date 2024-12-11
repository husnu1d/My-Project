<x-app-layout>
    <section class="mt-10 rounded-lg shadow px-8 py-8 bg-white">
        <div class="container">
            <h1 class="text-lg font-bold mb-4">File Explorer - Semua Folder Split</h1>

            @if (empty($folders))
                <p class="text-gray-600">Tidak ada folder split yang ditemukan.</p>
            @else
                <ul class="list-none pl-0">
                    @foreach ($folders as $folderName => $files)
                        <li class="mb-4">
                            <div class="flex items-center cursor-pointer">
                                <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 7h18a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>
                                    <path d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                <h2 class="text-purple-600 font-semibold">
                                    <a href="{{ route('documents.show', ['id' => $folderName]) }}">
                                        {{ $folderName }}
                                    </a>
                                </h2>
                            </div>

                            <!-- Tampilkan file di dalam folder -->
                            <ul id="{{ $folderName }}" class="hidden pl-6">
                                @foreach ($files as $file)
                                    <li class="mb-1">
                                        <a href="{{ route('documents.show', ['id' => $folderName]) }}"
                                           class="text-blue-500 hover:underline">
                                           {{ basename($file) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
</x-app-layout>
