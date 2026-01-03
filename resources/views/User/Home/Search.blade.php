@extends('layouts.Home')

@section('content')
    <!-- Search Header -->
    <section class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl md:text-4xl font-bold mb-2">
                Hasil Pencarian
            </h1>
            <p class="text-blue-100">
                Kata kunci: <span class="font-semibold">"{{ $keyword }}"</span>
            </p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="bg-white py-6 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
    </section>

    <!-- Search Result -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">
                    {{ $Products->total() }} Produk Ditemukan
                </h2>
            </div>

            @if ($Products->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($Products as $product)
                        <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden group">
                            <div class="relative bg-gray-200 h-48 flex items-center justify-center">
                                <i class="fas fa-tablet text-6xl text-blue-300 group-hover:scale-110 transition"></i>
                            </div>

                            <div class="p-4">
                                <span class="text-xs text-blue-500 font-semibold">
                                    {{ $product->category->name ?? '-' }}
                                </span>

                                <h3 class="font-semibold text-gray-800 mt-1 mb-2 text-sm">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-600 text-xs mb-3 line-clamp-2">
                                    {{ $product->about }}
                                </p>

                                <div class="flex justify-between items-center">
                                    <span class="text-blue-600 font-bold text-lg">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                    <a href="{{ route('product.detail', $product->slug) }}"
                                        class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $Products->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">
                        Produk tidak ditemukan
                    </h3>
                    <p class="text-gray-500">
                        Coba gunakan kata kunci lain atau lihat kategori produk
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
