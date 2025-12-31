<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Online - Kesehatan Anda Adalah Prioritas Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="sticky top-0 z-40 bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-pills text-2xl"></i>
                    <span class="font-bold text-xl">ApotekKu</span>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-blue-200 transition">Beranda</a>
                    <a href="#" class="hover:text-blue-200 transition">Produk</a>
                    <a href="#" class="hover:text-blue-200 transition">Tentang</a>
                    <a href="#" class="hover:text-blue-200 transition">Kontak</a>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-shopping-cart text-xl cursor-pointer hover:text-blue-200 transition"></i>
                    <i class="md:hidden fas fa-bars text-xl cursor-pointer"></i>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h4 class="font-bold text-lg mb-4">Apotek Sehat</h4>
                    <p class="text-blue-100">Solusi kesehatan terpercaya untuk keluarga Indonesia</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Produk</h4>
                    <ul class="space-y-2 text-blue-100">
                        <li><a href="#" class="hover:text-white transition">Obat-obatan</a></li>
                        <li><a href="#" class="hover:text-white transition">Vitamin</a></li>
                        <li><a href="#" class="hover:text-white transition">Skincare</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-blue-100">
                        <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2 text-blue-100">
                        <li><i class="fas fa-phone"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-envelope"></i> info@apoteksehat.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blue-400 pt-8 text-center text-blue-100">
                <p>&copy; 2026 ApotekKu. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
