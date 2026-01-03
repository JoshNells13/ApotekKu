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

        {{-- <!-- Filter & Search Section -->
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
        </div> --}}

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-600">
                <p class="text-gray-600 text-sm">Total Transaksi Produk</p>
                <p class="text-2xl font-bold text-gray-800">{{ $TransactionCount }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-600">
                <p class="text-gray-600 text-sm">Total Transaksi Diterima</p>
                <p class="text-2xl font-bold text-gray-800">{{ $TransactionCountPayed }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-600">
                <p class="text-gray-600 text-sm">Total Transaksi Belum Diterima</p>
                <p class="text-2xl font-bold text-gray-800">{{ $TransactionCountUnPayed }}</p>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">ID</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Pembeli</th>
                            <th class="px-6 py-4 text-right font-semibold text-gray-800">Total</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Status</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Alamat</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Kota</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Kode Pos</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">No. HP</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-800">Catatan</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Bukti</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Tanggal</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-800">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($transactions as $trx)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    #{{ $trx->id }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $trx->user->name ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-right font-bold text-gray-800">
                                    Rp {{ number_format($trx->total_amount, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($trx->is_paid)
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                            Paid
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                            Unpaid
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $trx->address }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $trx->city }}
                                </td>

                                <td class="px-6 py-4 text-center text-gray-700">
                                    {{ $trx->post_code }}
                                </td>

                                <td class="px-6 py-4 text-center text-gray-700">
                                    {{ $trx->phone_number }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 text-xs">
                                    {{ $trx->notes ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($trx->proof)
                                        <a href="{{ asset('storage/' . $trx->proof) }}" target="_blank"
                                            class="text-blue-600 hover:underline font-semibold">
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center text-gray-600">
                                    {{ $trx->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('transactions.show', $trx->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('transactions.destroy', $trx->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="px-6 py-10 text-center text-gray-500">
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
