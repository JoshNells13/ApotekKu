<x-app-layout>
    <div class="p-6 md:p-8">

        {{-- Breadcrumb --}}
        <div class="mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <a href="{{ route('transactions.index') }}" class="text-blue-600 hover:text-blue-800">
                Transaksi
            </a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-600">Edit Transaksi</span>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Edit Transaksi</h2>
            <p class="text-gray-600">
                Perbarui status dan informasi pengiriman transaksi
            </p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <form
                action="{{ route('transactions.update', $transaction->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                {{-- Pembeli (readonly) --}}
                <div>
                    <label class="font-semibold text-gray-700">Pembeli</label>
                    <input
                        type="text"
                        value="{{ $transaction->user->name }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg bg-gray-100 text-gray-700"
                        readonly
                    >
                </div>

                {{-- Total --}}
                <div>
                    <label class="font-semibold text-gray-700">Total Pembayaran</label>
                    <input
                        type="number"
                        name="total_amount"
                        value="{{ old('total_amount', $transaction->total_amount) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                    @error('total_amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="font-semibold text-gray-700">Status Pembayaran</label>
                    <select
                        name="is_paid"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                    >
                        <option value="0" {{ !$transaction->is_paid ? 'selected' : '' }}>
                            Belum Dibayar
                        </option>
                        <option value="1" {{ $transaction->is_paid ? 'selected' : '' }}>
                            Sudah Dibayar
                        </option>
                    </select>
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="font-semibold text-gray-700">Alamat</label>
                    <input
                        type="text"
                        name="address"
                        value="{{ old('address', $transaction->address) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                </div>

                {{-- Kota & Kode Pos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="font-semibold text-gray-700">Kota</label>
                        <input
                            type="text"
                            name="city"
                            value="{{ old('city', $transaction->city) }}"
                            class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                            required
                        >
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700">Kode Pos</label>
                        <input
                            type="text"
                            name="post_code"
                            value="{{ old('post_code', $transaction->post_code) }}"
                            class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                            required
                        >
                    </div>
                </div>

                {{-- No HP --}}
                <div>
                    <label class="font-semibold text-gray-700">Nomor HP</label>
                    <input
                        type="text"
                        name="phone_number"
                        value="{{ old('phone_number', $transaction->phone_number) }}"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                        required
                    >
                </div>

                {{-- Catatan --}}
                <div>
                    <label class="font-semibold text-gray-700">Catatan</label>
                    <textarea
                        name="notes"
                        rows="3"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                    >{{ old('notes', $transaction->notes) }}</textarea>
                </div>

                {{-- Bukti Pembayaran --}}
                <div>
                    <label class="font-semibold text-gray-700">Bukti Pembayaran</label>

                    @if ($transaction->proof)
                        <div class="mb-3">
                            <a
                                href="{{ asset('storage/' . $transaction->proof) }}"
                                target="_blank"
                                class="text-blue-600 font-semibold hover:underline"
                            >
                                Lihat bukti saat ini
                            </a>
                        </div>
                    @endif

                    <input
                        type="file"
                        name="proof"
                        accept="image/*"
                        class="w-full mt-2 px-4 py-3 border-2 rounded-lg focus:border-blue-600"
                    >

                    <p class="text-sm text-gray-500 mt-1">
                        Kosongkan jika tidak ingin mengganti bukti
                    </p>
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-4 pt-4">
                    <a
                        href="{{ route('transactions.index') }}"
                        class="px-6 py-3 border-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg"
                    >
                        Update Transaksi
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
