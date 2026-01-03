 @extends('layouts.Auth')

 @section('content')
 <div class="bg-white rounded-2xl md:rounded-r-2xl md:rounded-l-none p-8 md:p-12 shadow-2xl">
     <!-- Mobile Logo -->
     <div class="md:hidden flex items-center space-x-2 mb-8">
         <div class="bg-blue-600 p-2 rounded-lg">
             <i class="fas fa-pills text-white text-lg"></i>
         </div>
         <span class="font-bold text-xl text-gray-800">ApotekKu</span>
     </div>

     <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar</h2>
     <p class="text-gray-600 mb-8">Silakan Daftar akun Anda untuk melanjutkan</p>

     <form class="space-y-6">
         <!-- Email Input -->
         <div>
             <label class="block text-gray-700 font-semibold mb-2">Email</label>
             <div class="relative">
                 <input type="email" placeholder="nama@email.com"
                     class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition duration-200 pl-12"
                     required>
                 <i class="fas fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
             </div>
         </div>
         <div>
             <label class="block text-gray-700 font-semibold mb-2">Nama</label>
             <div class="relative">
                 <input type="email" placeholder="nama@email.com"
                     class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition duration-200 pl-12"
                     required>
                 <i class="fas fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
             </div>
         </div>

         <!-- Password Input -->
         <div>
             <label class="block text-gray-700 font-semibold mb-2">Password</label>
             <div class="relative">
                 <input type="password" placeholder="Masukkan password Anda"
                     class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition duration-200 pl-12"
                     id="password" required>
                 <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                 <button type="button" onclick="togglePassword()"
                     class="absolute right-4 top-3.5 text-gray-400 hover:text-gray-600">
                     <i class="fas fa-eye" id="eyeIcon"></i>
                 </button>
             </div>
         </div>

         <!-- Login Button -->
         <button type="submit"
             class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition duration-300 shadow-lg hover:shadow-xl">
             Daftar
         </button>

     </form>

     <!-- Sign Up Link -->
     <div class="mt-8 text-center">
         <p class="text-gray-700">
             Sudah memiliki akun?
             <a href="#" class="text-blue-600 font-bold hover:text-blue-800 transition">Masuk di sini</a>
         </p>
     </div>
 </div>
@endsection
