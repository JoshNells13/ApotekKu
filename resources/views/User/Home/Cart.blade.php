@extends('layouts.Home')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Keranjang Belanja</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT : CART --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6 border-b bg-gray-50 flex justify-between">
                        <h2 class="text-xl font-bold">
                            Produk dalam Keranjang ({{ $carts->count() }})
                        </h2>
                    </div>

                    <div class="divide-y">
                        @forelse ($carts as $cart)
                            <div class="p-6 flex gap-4">
                                <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-3xl text-gray-300"></i>
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-bold">
                                        {{ optional($cart->product)->name ?? 'Produk tidak tersedia' }}
                                    </h3>
                                    <p class="text-blue-600 font-bold">
                                        Rp {{ number_format(optional($cart->product)->price ?? 0) }}
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Qty: {{ $cart->quantity }}</p>
                                    <p class="font-bold">
                                        Rp {{ number_format((optional($cart->product)->price ?? 0) * $cart->quantity) }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-500">
                                Keranjang masih kosong
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- RIGHT : CHECKOUT --}}
            <div>
                <form action="{{ route('cart.transaction') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Ringkasan --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>

                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Pengiriman</span>
                                <span>Rp {{ number_format($shipping) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Pajak (10%)</span>
                                <span>Rp {{ number_format($tax) }}</span>
                            </div>

                            <hr>

                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="text-blue-600">
                                    Rp {{ number_format($total) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Metode Pembayaran</h2>

                        <label class="flex items-center p-3 border rounded-lg mb-3 cursor-pointer">
                            <input type="radio" name="payment_method" value="manual" checked>
                            <span class="ml-3 font-semibold">Transfer Manual</span>
                        </label>

                        <label class="flex items-center p-3 border rounded-lg cursor-pointer">
                            <input type="radio" name="payment_method" value="credit">
                            <span class="ml-3 font-semibold">Kartu Kredit</span>
                        </label>
                    </div>

                    {{-- Data Pengiriman --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <h2 class="font-bold text-lg mb-4">Data Pengiriman</h2>

                        <div class="mb-3">
                            <label class="block text-sm font-semibold mb-1">Alamat Lengkap</label>
                            <input type="text" name="address" required class="input" placeholder="Jl. Contoh No. 123">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-semibold mb-1">Kota</label>
                            <input type="text" name="city" required class="input" placeholder="Palangka Raya">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-semibold mb-1">Kode Pos</label>
                            <input type="text" name="post_code" required class="input" placeholder="73111">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-semibold mb-1">Nomor HP</label>
                            <input type="text" name="phone_number" required class="input" placeholder="08xxxxxxxxxx">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-semibold mb-1">Catatan (Opsional)</label>
                            <textarea name="notes" class="input" placeholder="Contoh: Tolong dikirim sore hari"></textarea>
                        </div>
                    </div>

                    {{-- Bukti Pembayaran --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <h2 class="font-bold text-lg mb-2">Bukti Pembayaran</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            Unggah bukti transfer untuk mempercepat proses verifikasi pesanan.
                        </p>

                        <div class="mb-2">
                            <label class="block text-sm font-semibold mb-1">Upload Foto Bukti Pembayaran</label>
                            <input type="file" name="photo" accept="image/*" required
                                class="w-full px-4 py-3 border-2 rounded-lg focus:border-blue-600">
                        </div>

                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 text-xs text-blue-800 mt-3">
                            <i class="fas fa-info-circle mr-1"></i>
                            Format yang didukung: JPG, PNG. Ukuran maksimal 2MB.
                        </div>
                    </div>

                    <input type="hidden" name="total_amount" value="{{ $total }}">

                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold">
                        Konfirmasi Pesanan
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
