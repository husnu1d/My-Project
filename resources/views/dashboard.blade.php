<x-app-layout>
    <section class="my-8 h-full overflow-y-scroll">
        <ul class="grid grid-cols-3 gap-8 md:grid-cols-5 auto-rows-[8em]">
            @foreach ($foldersData as $folder)
                <li class="hover:scale-105 ease-in-out duration-75 flex items-center p-4 bg-blue-50 border border-blue-500 rounded-md overflow-hidden shadow">
                    <div class="flex items-center gap-4">
                        <div class="rounded-full p-4 bg-blue-800">
                            <i class="fa-light fa-messages-question text-white"></i>
                        </div>
                        <div class="flex flex-col text-blue-800">
                            <h3>{{ $folder['folder_name'] }}</h3>
                            <small class="text-sm font-thin mb-3">  {{ $folder['file_count'] }} Halaman</small>
                            <a href="{{ route('documents.show', ['uploadDate' => $folder['upload_date'], 'folderName' => $folder['folder_name']]) }}"
                               class="text-black hover:text-blue-500">
                                More Info
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-app-layout>
