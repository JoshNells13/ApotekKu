@extends('layouts.Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        Status Transaksi Saya
    </h1>

    <div class="space-y-6">
        @forelse ($transactions as $trx)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    {{-- Info --}}
                    <div>
                        <p class="text-sm text-gray-500">
                            ID Transaksi
                        </p>
                        <p class="font-bold text-gray-800">
                            #TRX-{{ $trx->id }}
                        </p>

                        <p class="mt-2 text-sm text-gray-500">
                            Tanggal
                        </p>
                        <p class="font-semibold">
                            {{ $trx->created_at->format('d M Y') }}
                        </p>
                    </div>

                    {{-- Total --}}
                    <div>
                        <p class="text-sm text-gray-500">
                            Total Pembayaran
                        </p>
                        <p class="text-xl font-bold text-blue-600">
                            Rp {{ number_format($trx->total_amount) }}
                        </p>
                    </div>

                    {{-- Status --}}
                    <div>
                        @if ($trx->is_paid)
                            <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold text-sm">
                                 Sudah Dibayar
                            </span>
                        @else
                            <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-sm">
                                 Menunggu Verifikasi
                            </span>
                        @endif
                    </div>

                    {{-- Proof --}}
                    <div>
                        @if ($trx->proof)
                            <a
                                href="{{ asset('storage/' . $trx->proof) }}"
                                target="_blank"
                                class="text-blue-600 font-semibold hover:underline"
                            >
                                Lihat Bukti
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">
                                Belum upload
                            </span>
                        @endif
                    </div>

                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                Belum ada transaksi 🛒
            </div>
        @endforelse
    </div>
</div>
@endsection
