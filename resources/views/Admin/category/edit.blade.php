<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Edit Kategori</h2>
            <p class="text-gray-600">Perbarui data kategori</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <form action="{{ route('admin.categories.update', $category->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label class="font-semibold text-gray-700">Nama Kategori</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                </div>

                {{-- Icon Lama --}}
                @if ($category->icon)
                    <div>
                        <p class="font-semibold text-gray-700 mb-2">Icon Saat Ini</p>
                        <img src="{{ asset('storage/' . $category->icon) }}"
                             class="w-16 h-16 object-cover rounded-lg border">
                    </div>
                @endif

                {{-- Icon Baru --}}
                <div>
                    <label class="font-semibold text-gray-700">
                        Ganti Icon (Opsional)
                    </label>
                    <input
                        type="file"
                        name="icon"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        accept="image/*"
                    >
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('admin.categories.index') }}"
                       class="px-6 py-3 border-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg">
                        Update Kategori
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
