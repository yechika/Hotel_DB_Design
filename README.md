# Hotel DB Design

## 🌐 Live Demo
[Hotel DB Design](https://hotel-db-design.vercel.app/)

## 📌 Deskripsi
Hotel DB Design adalah sebuah sistem reservasi hotel berbasis web yang dibangun menggunakan **Laravel**, **Livewire**, dan **Jetstream**. Aplikasi ini memungkinkan pengguna untuk melakukan pemesanan kamar, melihat galeri hotel, serta mengelola data pengguna dan reservasi.

## ⚡ Fitur Utama
- 🔑 **Autentikasi & Manajemen Pengguna** (Login, Register, Logout)
- 🏨 **Reservasi Kamar** secara online
- 📸 **Galeri Hotel** untuk melihat fasilitas
- 📜 **Riwayat Pemesanan** untuk pengguna
- 🌐 **Dukungan HTTPS** untuk keamanan data
- 📱 **Responsif & Mobile-Friendly**

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 11 + Livewire + Jetstream
- **Database:** MySQL
- **Frontend:** TailwindCSS, Vite
- **Deployment:** Vercel

## 🚀 Cara Menjalankan di Lokal
1. **Clone repositori:**
   ```bash
   git clone https://github.com/your-repo/hotel-db-design.git
   cd hotel-db-design
   ```
2. **Install dependensi:**
   ```bash
   composer install
   npm install
   ```
3. **Konfigurasi environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Lalu, atur konfigurasi database di file `.env`
4. **Jalankan migrasi database:**
   ```bash
   php artisan migrate --seed
   ```
5. **Jalankan server lokal:**
   ```bash
   php artisan serve
   ```
   Akses di browser: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 📜 Lisensi
Proyek ini dikembangkan untuk keperluan akademik dan open-source.

## 📩 Kontribusi
Jika ingin berkontribusi atau menemukan bug, silakan buat issue atau pull request di repository ini.

---
