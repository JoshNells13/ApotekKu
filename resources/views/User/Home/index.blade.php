@extends('layouts.Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold mb-4">Kesehatan Anda Adalah Prioritas Kami</h1>
                    <p class="text-blue-100 text-lg mb-6">Dapatkan produk kesehatan berkualitas dengan harga terjangkau dan
                        layanan terpercaya</p>
                    <button
                        class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition">Belanja
                        Sekarang</button>
                </div>
                <div class="text-center">
                    <i class="fas fa-mortar-pestle text-9xl opacity-30"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white py-8 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <form action="{{ route('search') }}" method="GET">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1 relative">
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari produk..."
                                class="w-full px-4 py-3 border-2 border-blue-300 rounded-lg focus:outline-none focus:border-blue-600 transition">
                            <i class="fas fa-search absolute right-4 top-3.5 text-blue-400"></i>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Cari
                        </button>
                        <a href="{{ route('home') }}"
                            class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8">Kategori Produk</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">

                @if ($Category->isNotEmpty())
                    @foreach ($Category as $item)
                        <a href="{{ route('category.show', $item->slug) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition cursor-pointer p-6 text-center">
                            <div class="flex justify-center mb-4">
                                <div class="bg-blue-100 p-4 rounded-full">
                                    <i class="fas fa-capsules text-blue-600 text-2xl"></i>
                                </div>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm md:text-base">{{ $item->name }}</h3>
                        </a>
                    @endforeach
                @else
                    <h3 class="font-semibold text-gray-800 text-sm md:text-base">Tidak Ada Kategori Yang Tersedia</h3>
                @endif
                <!-- Category 1 -->

            </div>
        </div>
    </section>

    <!-- Latest Products Section -->
    <section class="py-12 md:py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Produk Terbaru</h2>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition">Lihat Semua →</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->

                @forelse ($LatestProduct as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden group">
                        <div class="relative overflow-hidden bg-gray-200 h-48 flex items-center justify-center">
                            <i class="fas fa-tablet text-6xl text-blue-300 group-hover:scale-110 transition"></i>
                            <span
                                class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-bold">Baru</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-xs mb-3">{{ $product->about }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-blue-600 font-bold text-lg">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.detail', $product->slug) }}"
                                    class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Produk Belum Tersedia</h2>
                @endforelse


            </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <i class="fas fa-shipping-fast text-blue-600 text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Kami mengirimkan pesanan Anda dalam waktu 24 jam</p>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <i class="fas fa-lock text-blue-600 text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Aman & Terpercaya</h3>
                    <p class="text-gray-600">Data pribadi Anda dilindungi dengan enkripsi tingkat bank</p>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <i class="fas fa-headset text-blue-600 text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dukungan 24/7</h3>
                    <p class="text-gray-600">Tim customer service kami siap membantu Anda kapan saja</p>
                </div>
            </div>
        </div>
    </section>
@endsection
