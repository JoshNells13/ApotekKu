@extends('layouts.Home')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Left Side - Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="w-full h-96 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                        <i class="fas fa-tablet text-9xl text-blue-300"></i>
                    </div>
                </div>

                <!-- Thumbnail Images -->
                {{-- <div class="grid grid-cols-4 gap-3">
                    <div class="bg-white rounded-lg shadow overflow-hidden cursor-pointer hover:shadow-lg transition border-2 border-blue-600">
                        <div class="w-full h-24 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                            <i class="fas fa-tablet text-3xl text-blue-300"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-tablet text-3xl text-gray-300"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-tablet text-3xl text-gray-300"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow overflow-hidden cursor-pointer hover:shadow-lg transition">
                        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-tablet text-3xl text-gray-300"></i>
                        </div>
                    </div>
                </div> --}}

                <!-- Product Features -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Keunggulan Produk</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Resmi BPOM</p>
                                <p class="text-gray-600 text-sm">Telah terdaftar dan tersertifikasi oleh Badan Pengawas Obat
                                    dan Makanan</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Kualitas Terjamin</p>
                                <p class="text-gray-600 text-sm">Produk original langsung dari produsen resmi</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Harga Terbaik</p>
                                <p class="text-gray-600 text-sm">Dijamin harga termurah di pasaran</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Product Details -->
            <div>
                <!-- Kategori Badge -->
                <div class="mb-4">
                    <span class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                        <i class="fas fa-tag mr-2"></i>{{ $Product->category->name }}
                    </span>
                </div>

                <!-- Nama Produk -->
                <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $Product->name }}</h1>

                <!-- Harga -->
                <div class="mb-6 pb-6 border-b">
                    <div class="flex items-baseline space-x-3 mb-2">
                        <p class="text-4xl font-bold text-blue-600">Rp {{ number_format($Product->price, 0, ',', '.') }}</p>
                    </div>
                    <p class="text-gray-600 text-sm">Harga sudah termasuk ongkos kirim ke seluruh Indonesia</p>
                </div>



                <form action="{{ route('cart.store',$Product->slug) }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $Product->id }}">
                    <input type="hidden" name="qty" value="1">

                    <button type="submit"
                        class="w-full px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700
               text-white font-bold rounded-lg hover:from-blue-700 hover:to-blue-800
               transition shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span>Tambah ke Keranjang</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tentang Produk</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {!! $Product->about !!}

            </div>
        </div>
        {{--
        <!-- Reviews Section -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ulasan Pelanggan</h2>

            <div class="space-y-6">
                <!-- Review 1 -->
                <div class="border-b pb-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                JS
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Joko Sutrisno</p>
                                <p class="text-gray-600 text-sm">Diverifikasi pembelian</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                    </div>
                    <p class="text-gray-800 font-semibold mb-2">Produk yang sangat berkualitas!</p>
                    <p class="text-gray-700 mb-3">Harga terjangkau dan produk asli. Pengiriman cepat, hanya 1 hari sudah sampai. Saya sangat puas dengan pembelian ini dan akan membeli lagi.</p>
                    <p class="text-gray-500 text-sm">3 hari yang lalu</p>
                </div>

                <!-- Review 2 -->
                <div class="border-b pb-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                                SN
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Siti Nurhaliza</p>
                                <p class="text-gray-600 text-sm">Diverifikasi pembelian</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                        </div>
                    </div>
                    <p class="text-gray-800 font-semibold mb-2">Efektif dan terpercaya</p>
                    <p class="text-gray-700 mb-3">Sudah sering beli di apotek fisik, kali ini coba di toko online ini. Kualitas sama, harganya lebih murah. Rekomendasi untuk yang cari obat berkualitas.</p>
                    <p class="text-gray-500 text-sm">1 minggu yang lalu</p>
                </div>

                <!-- Review 3 -->
                <div>
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                RD
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Rendra Dwiputra</p>
                                <p class="text-gray-600 text-sm">Diverifikasi pembelian</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-gray-300"></i>
                        </div>
                    </div>
                    <p class="text-gray-800 font-semibold mb-2">Bagus, tapi packaging bisa lebih baik</p>
                    <p class="text-gray-700 mb-3">Produknya original dan efektif, tapi packaging saat datang sudah agak rusak. Untung isinya masih aman. Semoga di pengiriman berikutnya lebih hati-hati.</p>
                    <p class="text-gray-500 text-sm">2 minggu yang lalu</p>
                </div>
            </div>

            <button class="w-full mt-6 px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition">
                Lihat Semua Ulasan
            </button>
        </div> --}}
    </div>
@endsection
