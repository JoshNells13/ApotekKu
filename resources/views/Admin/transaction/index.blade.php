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
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Transaksi Produk</h2>
                <p class="text-gray-600">Kelola dan pantau semua produk apotek Anda</p>
            </div>
            <button
                class="mt-4 md:mt-0 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-lg hover:shadow-xl flex items-center space-x-2 w-full md:w-auto justify-center">
                <i class="fas fa-plus"></i>
                <span>Tambah Produk</span>
            </button>
        </div>

        <!-- Filter & Search Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Search -->
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Cari Produk</label>
                    <div class="relative">
                        <input type="text" placeholder="Cari nama atau SKU..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition text-sm">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                    </div>
                </div>

                <!-- Kategori Filter -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Kategori</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition text-sm">
                        <option value="">Semua Kategori</option>
                        <option value="obat">Obat-obatan</option>
                        <option value="vitamin">Vitamin & Suplemen</option>
                        <option value="perawatan">Perawatan Luka</option>
                        <option value="skincare">Skincare</option>
                        <option value="gigi">Kesehatan Gigi</option>
                        <option value="bayi">Perawatan Bayi</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Status</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition text-sm">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                        <option value="stok-habis">Stok Habis</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end space-x-2">
                    <button
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-sm">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    <button
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold text-sm">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-600">
                <p class="text-gray-600 text-sm">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800">124</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-600">
                <p class="text-gray-600 text-sm">Produk Aktif</p>
                <p class="text-2xl font-bold text-gray-800">118</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-600">
                <p class="text-gray-600 text-sm">Stok Rendah</p>
                <p class="text-2xl font-bold text-gray-800">12</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-600">
                <p class="text-gray-600 text-sm">Stok Habis</p>
                <p class="text-2xl font-bold text-gray-800">6</p>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Table Header with Actions -->
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                        <span class="text-sm text-gray-700">Pilih Semua</span>
                    </label>
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-semibold">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                    <button
                        class="px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition text-sm font-semibold">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800 w-10">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Produk</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">SKU</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Kategori</th>
                            <th class="px-6 py-4 text-right font-semibold text-gray-800">Harga</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Stok</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Status</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tablet text-gray-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Paracetamol 500mg</p>
                                        <p class="text-gray-500 text-xs">PT Kimia Farma</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">PARA-500-001</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Obat-obatan</span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-800">Rp 8.500</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">250</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-capsules text-gray-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Vitamin C 1000mg</p>
                                        <p class="text-gray-500 text-xs">PT Soho</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">VIT-C-1000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold">Vitamin</span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-800">Rp 25.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-bold">45</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Stok
                                    Rendah</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-hand-sparkles text-gray-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Hand Sanitizer 500ml</p>
                                        <p class="text-gray-500 text-xs">PT Mitra Sehat</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">HND-SAN-500</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Perawatan</span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-800">Rp 15.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded text-xs font-bold">0</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Habis</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-face-smile text-gray-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Masker Wajah KN95</p>
                                        <p class="text-gray-500 text-xs">PT Indo Mask</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">MSK-KN95-001</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-semibold">Perawatan</span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-800">Rp 35.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">500</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 5 -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-bandage text-gray-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Plester Hansaplast</p>
                                        <p class="text-gray-500 text-xs">Beiersdorf</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">PLS-HANS-001</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">Perawatan</span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-800">Rp 12.500</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">180</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between">
                <p class="text-gray-600 text-sm mb-4 md:mb-0">Menampilkan 5 dari 124 produk</p>
                <div class="flex items-center space-x-2">
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm text-gray-700 font-semibold">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold">1</button>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm text-gray-700 font-semibold">2</button>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm text-gray-700 font-semibold">3</button>
                    <span class="text-gray-600 text-sm">...</span>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm text-gray-700 font-semibold">25</button>
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm text-gray-700 font-semibold">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
