<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Kategori Produk</h2>
                <p class="text-gray-600">Ringkasan kategori dan jumlah produk</p>
            </div>

            <a href="{{ route('admin.categories.create') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow">
                <i class="fas fa-plus mr-2"></i>Tambah Kategori
            </a>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left">Icon</th>
                        <th class="px-6 py-4 text-left">Nama Kategori</th>
                        <th class="px-6 py-4 text-center">Jumlah Produk</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50 transition">
                            {{-- Icon --}}
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                                    class="w-12 h-12 object-cover rounded-lg">
                            </td>

                            {{-- Name --}}
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $category->name }}
                            </td>

                            {{-- Count --}}
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold
                                    {{ $category->count_categories_by_product > 0 ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $category->count_categories_by_product }} Produk
                                </span>
                            </td>

                            {{-- Action --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="px-3 py-2 text-blue-600 hover:bg-blue-100 rounded-lg">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-2 text-red-600 hover:bg-red-100 rounded-lg">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">
                                Belum ada kategori
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
