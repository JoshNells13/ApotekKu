<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Breadcrumb --}}
        <div class="mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800">Produk</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-600">Tambah Produk</span>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tambah Produk</h2>
            <p class="text-gray-600">Isi data produk dengan lengkap dan benar</p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="font-semibold text-gray-700">Nama Produk</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        placeholder="Contoh: Paracetamol 500mg"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="font-semibold text-gray-700">Kategori</label>
                    <select
                        name="category_id"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga --}}
                <div>
                    <label class="font-semibold text-gray-700">Harga</label>
                    <input
                        type="number"
                        name="price"
                        value="{{ old('price') }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        placeholder="Contoh: 15000"
                        required
                    >
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- About / Deskripsi --}}
                <div>
                    <label class="font-semibold text-gray-700">Deskripsi Produk</label>
                    <textarea
                        name="about"
                        rows="4"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        placeholder="Deskripsi singkat produk..."
                        required
                    >{{ old('about') }}</textarea>
                    @error('about')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label class="font-semibold text-gray-700">Foto Produk</label>
                    <input
                        type="file"
                        name="photo"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        accept="image/*"
                        required
                    >
                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('admin.products.index') }}"
                       class="px-6 py-3 border-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg"
                    >
                        Simpan Produk
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
