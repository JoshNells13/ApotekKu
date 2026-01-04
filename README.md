# 💊 ApotekKu

**ApotekKu** adalah aplikasi **E-Commerce Apotek berbasis Laravel** yang memungkinkan pengguna membeli produk apotek secara online dengan sistem **keranjang belanja dan transaksi**, serta dashboard admin untuk pengelolaan produk dan pesanan.

Aplikasi ini dibangun menggunakan **Laravel Breeze** untuk autentikasi dan **Spatie Laravel Permission** untuk manajemen role, sehingga akses fitur aman, terstruktur, dan scalable.

---

## 🚀 Fitur Utama

### 👤 Autentikasi (Laravel Breeze)
- Register & Login
- Session-based authentication
- Proteksi route berbasis middleware

### 🧑‍⚕️ Role Management (Spatie Laravel Permission)

#### 👨‍💻 Buyer
- Melihat daftar produk apotek
- Melihat detail produk
- Menambahkan produk ke keranjang
- Checkout & membuat transaksi
- Upload bukti pembayaran
- Melihat status transaksi 

#### 🧑‍💼 Owner (Admin)
- Dashboard admin
- CRUD Produk
- CRUD Kategori
- Melihat & mengelola transaksi
- Update status pembayaran

---

## 🛒 Sistem Keranjang & Transaksi
- Keranjang belanja per user
- Perhitungan otomatis:
  - Subtotal
  - Pajak (10%)
  - Ongkos kirim
  - Total pembayaran
- Upload bukti pembayaran
- Status transaksi (Belum Dibayar / Sudah Dibayar)

---

## 🛠️ Tech Stack

- **Framework**: Laravel
- **Authentication**: Laravel Breeze
- **Role & Permission**: Spatie Laravel Permission
- **Database**: MySQL
- **Frontend**: Blade + Tailwind CSS
- **Storage**: Laravel Filesystem

📚 Dokumentasi Resmi:
- Laravel: https://laravel.com/docs  
- Laravel Breeze: https://laravel.com/docs/starter-kits#laravel-breeze  
- Spatie Permission: https://spatie.be/docs/laravel-permission  

---

## 📂 Struktur Role & Akses

| Role  | Akses |
|------|------|
| Buyer | Home, Detail Produk, Cart, Checkout |
| Owner | Dashboard, Produk, Kategori, Transaksi |

---

## 🧭 Alur Aplikasi

1. User melakukan registrasi / login
2. User dengan role **buyer** dapat:
   - Menambahkan produk ke keranjang
   - Melakukan checkout
   - Upload bukti pembayaran
3. Admin (**owner**) memverifikasi transaksi
4. Status transaksi diperbarui

---

## 🔐 Middleware & Keamanan
- `auth` → Proteksi user login
- `role:buyer` → Akses khusus pembeli
- `role:owner` → Akses khusus admin
- Validasi form & upload file
- Database transaction untuk checkout

---

## ⚙️ Instalasi

```bash
git clone https://github.com/username/apotekku.git
cd apotekku

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate

php artisan migrate --seed
php artisan storage:link

php artisan serve
