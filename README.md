# Aplikasi Manajemen Inventaris

Aplikasi Manajemen Inventaris merupakan aplikasi berbasis web yang dibuat menggunakan Laravel untuk memenuhi tugas Ujian Tengah Semester (UTS). Aplikasi ini digunakan untuk mengelola data kategori dan barang inventaris melalui halaman web.

## Fitur Aplikasi

- **Login dan Logout** untuk mengatur akses pengguna.
- **Manajemen Kategori** untuk menambah, melihat, mengubah, dan menghapus kategori barang.
- **Manajemen Barang** untuk menambah, melihat, mengubah, dan menghapus data barang inventaris.
- **Relasi Data** untuk menghubungkan barang dengan kategori yang sesuai.
- **Validasi Input** untuk membantu memastikan data yang dimasukkan sesuai dengan ketentuan aplikasi.
- **Autentikasi** untuk melindungi halaman inventaris dari akses pengguna yang belum login.

## Teknologi yang Digunakan

- Laravel
- PHP
- MySQL atau database yang dikonfigurasi pada file `.env`
- Composer
- HTML dan CSS
- Git dan GitHub

## Persyaratan

Pastikan perangkat sudah memiliki:

- PHP sesuai dengan versi Laravel yang digunakan.
- Composer.
- Database yang didukung oleh konfigurasi Laravel.
- Git.
- Web browser.

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/fadsan150806-alt/inventaris-app.git
```

### 2. Masuk ke Folder Proyek

```bash
cd inventaris-app
```

### 3. Instal Dependensi

```bash
composer install
```

### 4. Buat File Environment

Salin `.env.example` menjadi `.env`.

Pada Windows Command Prompt:

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buat database melalui aplikasi database yang digunakan, lalu sesuaikan pengaturan berikut pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_app
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database, username, password, dan jenis database dengan konfigurasi lokal.

### 7. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Perintah ini digunakan untuk membuat tabel dan mengisi data awal jika seeder proyek sudah disiapkan.

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Buka alamat berikut pada browser:

http://127.0.0.1:8000

## Struktur Data

Aplikasi ini menggunakan data kategori dan barang inventaris. Data barang dihubungkan dengan kategori melalui relasi database agar setiap barang dapat dikaitkan dengan kategori yang sesuai.

## Pengujian

Pengujian aplikasi dilakukan untuk memeriksa fungsi login dan logout, pengelolaan kategori, pengelolaan barang, validasi input, serta hubungan data barang dan kategori.

## Repository GitHub

Source code aplikasi dapat dilihat melalui tautan berikut:

https://github.com/fadsan150806-alt/inventaris-app

## Dokumentasi Proyek

Tautan video demonstrasi aplikasi:

[Masukkan tautan video screen recording di sini]

## Penutup

Aplikasi Manajemen Inventaris ini dibuat sebagai penerapan materi pengembangan aplikasi web menggunakan Laravel, meliputi autentikasi, pengelolaan data, validasi input, dan relasi database.
