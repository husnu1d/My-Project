<x-app-layout>
    <section class=" mt-10 rounded-lg shadow px-8 py-8 bg-white">
        <div class="flex flex-col h-fit">
            <form @submit.prevent="saveProfile">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" x-model="name" placeholder="Nama Lengkap" 
                           class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" x-model="email" placeholder="Email" 
                           class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input type="password" id="password" x-model="password" placeholder="Kata Sandi Baru" 
                           class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                </div>
                <!-- Tombol Simpan -->
                <button type="submit" 
                        class="w-fit bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-solid fa-floppy-disk"></i>                    
                    <span>Simpan</span>
                </button>
            </form>
        </div>
        
        
    </section>
</x-app-layout>
