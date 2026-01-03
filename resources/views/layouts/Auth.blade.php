<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ApotekKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-5xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-0">
            <!-- Left Side - Branding -->
            <div class="hidden md:flex bg-gradient-to-br from-blue-600 to-blue-800 rounded-l-2xl p-12 flex-col justify-between text-white">
                <div>
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="bg-white p-3 rounded-lg">
                            <i class="fas fa-pills text-blue-600 text-2xl"></i>
                        </div>
                        <span class="font-bold text-2xl">ApotekKu</span>
                    </div>
                    <h1 class="text-4xl font-bold mb-6"> @yield('title','Selamat Datang Kembali') !</h1>
                    <p class="text-blue-100 text-lg mb-8">Masuk untuk mengakses akun Anda dan nikmati kemudahan berbelanja produk kesehatan berkualitas.</p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-400 p-3 rounded-full flex-shrink-0">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Produk Berkualitas</h3>
                                <p class="text-blue-100">Semua produk terjamin keasliannya dan telah tersertifikasi</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-400 p-3 rounded-full flex-shrink-0">
                                <i class="fas fa-truck text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Pengiriman Cepat</h3>
                                <p class="text-blue-100">Terima pesanan Anda dalam waktu 24 jam ke seluruh Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-400 p-3 rounded-full flex-shrink-0">
                                <i class="fas fa-lock text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Aman & Terpercaya</h3>
                                <p class="text-blue-100">Data dan transaksi Anda dilindungi dengan enkripsi tingkat bank</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side - Login Form -->
           @yield('content')
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
