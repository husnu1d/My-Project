<x-app-layout>
    <section class="mt-10 rounded-lg shadow px-8 py-8 bg-white">
        <div class="container">
            <h1 class="text-lg font-bold mb-4">Dokumen - {{ $document->original_name }}</h1>

            <!-- Tampilkan data dokumen berdasarkan ID -->
            <div>
                <h2 class="text-purple-600 font-semibold">File: {{ $document->original_name }}</h2>
                <p><strong>File Path:</strong> {{ $document->file_path }}</p>
                <p><strong>Upload Date:</strong> {{ $document->upload_date }}</p>
                <!-- Jika dokumen di-split, tampilkan file yang terpisah -->
                @if ($document->is_unmerged)
                    <h3 class="mt-4 text-gray-800">File Split:</h3>
                    @foreach (explode(',', $document->unmerged_file_path) as $filePath)
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $filePath) }}" class="text-blue-500 hover:underline" target="_blank">
                                {{ basename($filePath) }}
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
