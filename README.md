# 📦 Sistem Inventaris

Aplikasi manajemen inventaris berbasis web yang dibangun dengan Laravel 13.

## 🎯 Fitur

- ✅ Dashboard dengan statistik real-time
- ✅ CRUD Barang, Kategori, Supplier
- ✅ Transaksi stok masuk/keluar otomatis update stok
- ✅ Alert stok menipis
- ✅ Autentikasi (login/register/logout)
- ✅ Validasi form & error handling

## 🛠️ Tech Stack

- **Backend:** Laravel 13, PHP 8.3
- **Database:** MySQL 8.4
- **Frontend:** Blade, Bootstrap 5, Vite
- **Auth:** Laravel Breeze

## 🚀 Cara Menjalankan

```bash
# Clone repository
git clone https://github.com/MuzakkiAley/inventaris.git
cd inventaris

# Install dependency
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database (buat database db_inventaris di MySQL)
php artisan migrate

# Jalankan server
php artisan server

Buka http://localhost:8000, register akun (admin@example, password123), dan mulai gunakan.

📸 Screenshot
<img width="1920" height="905" alt="Screenshot (73)" src="https://github.com/user-attachments/assets/a3cc7166-a5ab-4c64-8281-2e4e9874e85d" />

👤 Author
Muzakki Aley
