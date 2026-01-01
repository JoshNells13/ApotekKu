<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Breadcrumb --}}
        <div class="mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800">Produk</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-600">Edit Produk</span>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Edit Produk</h2>
            <p class="text-gray-600">Perbarui informasi produk dengan data terbaru</p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <form
                action="{{ route('admin.products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label class="font-semibold text-gray-700">Nama Produk</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
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
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                        value="{{ old('price', $product->price) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- About --}}
                <div>
                    <label class="font-semibold text-gray-700">Deskripsi Produk</label>
                    <textarea
                        name="about"
                        rows="4"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >{{ old('about', $product->about) }}</textarea>
                    @error('about')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label class="font-semibold text-gray-700">Foto Produk</label>

                    {{-- Preview Foto Lama --}}
                    @if ($product->photo)
                        <div class="mb-3">
                            <img
                                src="{{ asset('storage/' . $product->photo) }}"
                                class="w-24 h-24 rounded-lg object-cover border"
                                alt="{{ $product->name }}"
                            >
                            <p class="text-xs text-gray-500 mt-1">Foto saat ini</p>
                        </div>
                    @endif

                    <input
                        type="file"
                        name="photo"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        accept="image/*"
                    >
                    <p class="text-sm text-gray-500 mt-1">
                        Kosongkan jika tidak ingin mengganti foto
                    </p>

                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-4 pt-4">
                    <a
                        href="{{ route('admin.products.index') }}"
                        class="px-6 py-3 border-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg"
                    >
                        Update Produk
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
