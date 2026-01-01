<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Breadcrumb --}}
        <div class="mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:text-blue-800">Kategori</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-600">Tambah Kategori</span>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tambah Kategori</h2>
            <p class="text-gray-600">Tambahkan kategori baru untuk produk</p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf

                {{-- Nama Kategori --}}
                <div>
                    <label class="font-semibold text-gray-700">Nama Kategori</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        placeholder="Contoh: Obat-obatan" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Icon--}}
                <div>
                    <label class="font-semibold text-gray-700">Icon Kategori</label>
                    <input type="file" name="icon"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600" accept="image/*"
                        required>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-6 py-3 border-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg">
                        Simpan Kategori
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
