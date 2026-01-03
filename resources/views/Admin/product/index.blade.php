<x-app-layout>


    <!-- Main Content -->
    <div class="p-6 md:p-8">
        <!-- Breadcrumb -->
        <div class="mb-6 flex items-center space-x-2 text-sm">
            <a href="#" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-600">Produk</span>
        </div>

        <!-- Header Section -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Produk</h2>
                <p class="text-gray-600">Kelola dan pantau semua produk apotek Anda</p>
            </div>
            <button
                class="mt-4 md:mt-0 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-lg hover:shadow-xl flex items-center space-x-2 w-full md:w-auto justify-center">
                <i class="fas fa-plus"></i>
                <a href="{{ route('admin.products.create') }}">Tambah Produk</a>
            </button>
        </div>

        <!-- Filter & Search Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Search -->
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Cari Produk</label>
                    <div class="relative">
                        <input type="text" placeholder="Cari nama ..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition text-sm">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                    </div>
                </div>

                <!-- Kategori Filter -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Kategori</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition text-sm">

                        @if ($Categories->isNotEmpty())
                        <option value="">Semua Kategori</option>
                            @foreach ($Categories as $Category)
                            <option value="{{ $Category->slug }}">{{ $Category->name }}</option>
                            @endforeach
                        @else
                        <option value="">Tidak Ada Kategori</option>
                        @endif
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end space-x-2">
                    <button
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-sm">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold text-sm">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-600">
                <p class="text-gray-600 text-sm">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800">{{ $CountProduct }}</p>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4">Photo</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">About</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4 text-right">Price</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <!-- Photo -->
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                                        class="w-12 h-12 object-cover rounded-lg">
                                </td>

                                <!-- Name -->
                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $product->name }}
                                </td>

                                <!-- About -->
                                <td class="px-6 py-4 text-gray-600 text-sm max-w-xs truncate">
                                    {{ $product->about }}
                                </td>

                                <!-- Category -->
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                        {{ $product->category->name ?? '-' }}
                                    </span>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4 text-right font-bold text-gray-800">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <!-- Action -->
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg">
                                            <p>Edit</p>
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg">
                                                <p>Hapus</p>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-500">
                                    Tidak ada produk
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
