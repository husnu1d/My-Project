<x-app-layout>
    <section class="mt-10 rounded-lg shadow px-8 py-8 bg-white">
        <div class="container">
            @if ($folderName == 'root')
            <!-- Display list of subfolders within the uploadDate folder -->
            @foreach ($folders as $folder)
               <div class="mb-3 flex items-center cursor-pointer">
                 <svg class="w-5 h-5 text-gray-600 " fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7h18a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>
                    <path d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
                <h1 class="text-xl  ml-1 font-semibold cursor-pointer text-black hover:text-gray-700">
                <a href="{{ route('documents.Split')}}"> ... </a>
                </h1>
            </div>
            <div class="flex items-center cursor-pointer">
                <!-- Link to open the folder -->
                <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7h18a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>
                    <path d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
                <a href="{{ route('documents.show', ['uploadDate' => $uploadDate, 'folderName' => basename($folder)]) }}"
                    class="text-black hover:text-blue-500">
                    {{ basename($folder) }}
                </a>
            </div>
            @endforeach
            @else
            <!-- Display subfolders and files inside the subfolder -->
            <div>
                <!-- Subfolders -->
                @if (isset($subFolders) && count($subFolders) > 0)
                <h3 class="text-xl font-semibold">Subfolders:</h3>
                <ul class="pl-6">
                    @foreach ($subFolders as $subFolder)
                    <li class="mb-2">
                        <a href="{{ route('documents.show', ['uploadDate' => $uploadDate, 'folderName' => basename($subFolder)]) }}"
                            class="text-black hover:text-blue-500">
                            {{ basename($subFolder) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

                <!-- Files -->
                @if (isset($files) && count($files) > 0)
                <div class="mb-3 flex items-center cursor-pointer">
                    <svg class="w-5 h-5 text-gray-600 " fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 7h18a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>
                        <path d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    <h1 class="text-base  ml-1 font-semibold cursor-pointer text-black hover:text-gray-700">
                        <a href="{{ route('documents.show', ['uploadDate' => $uploadDate, 'folderName' => 'root']) }}"> .... </a>
                    </h1>
                </div>

                <ul>
                    @foreach ($files as $file)
                    <li class="mb-2">
                        <!-- Open the PDF directly in the browser -->
                        <a href="{{ asset('storage/Split/' . $uploadDate . '/' . $folderName . '/' . basename($file)) }}"
                            target="_blank" class="text-black hover:text-blue-500">
                            {{ basename($file) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endif
        </div>
    </section>
</x-app-layout>
