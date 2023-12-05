
Jika Anda ingin menginstal Laravel di folder yang sudah berisi repo GitHub di server, Anda dapat mengikuti langkah-langkah berikut:

Catatan: Pastikan server Anda memenuhi persyaratan Laravel sebelum memulai. Ini termasuk PHP, Composer, dan ekstensi yang diperlukan. Anda juga perlu mengatur akses ke database jika aplikasi Anda menggunakan database.
1. **Clone Repositori GitHub:**
   Clone repositori GitHub yang sudah ada ke folder yang diinginkan di server. Misalnya, jika Anda ingin menginstal Laravel di folder `BuahHatiku`, gunakan perintah berikut:
   ```bash
   git clone https://github.com/rumahpintarinovasi/BuahHatiku.git BuahHatiku
   ```

2. **Masuk ke Direktori:**
   Pindah ke direktori aplikasi Laravel yang baru dibuat:
   ```bash
   cd BuahHatiku
   ```

3. **Instal Dependensi dengan Composer:**
   Laravel menggunakan Composer untuk mengelola dependensi. Jalankan perintah Composer untuk menginstal paket-paket yang diperlukan:
   ```bash
   composer install
   ```

4. **Buat Salinan File Konfigurasi:**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```

5. **Konfigurasi .env:**
   Edit file `.env` sesuai dengan pengaturan database dan konfigurasi lainnya yang diperlukan:
   ```bash
   nano .env
   ```
   Simpan perubahan dan keluar dari editor.

6. **Generate Key Aplikasi:**
   Jalankan perintah Artisan untuk menghasilkan kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

7. **Migrasi Database:**
   Jalankan migrasi untuk membuat tabel-tabel database:
   ```bash
   php artisan migrate
   ```

8. **Buat Simlink untuk Storage:**
   Buat simlink dari direktori `storage` ke `public/storage` agar file-file yang diunggah dapat diakses secara publik:
   ```bash
   php artisan storage:link
   composer require guzzlehttp/guzzle
   ```

9. **Atur Permissions:**
   Pastikan server memiliki izin yang cukup untuk menulis ke direktori `bootstrap/cache` dan `storage`. Ini dapat memerlukan perubahan izin file dan direktori:
   ```bash
   chmod -R 775 bootstrap/cache
   chmod -R 775 storage
   ```

10. **Selesai:**
    Aplikasi Laravel sekarang seharusnya terinstal dan siap digunakan di folder yang sudah ada di server.

Pastikan untuk membaca dokumentasi Laravel dan menyesuaikan langkah-langkah ini sesuai kebutuhan aplikasi Anda. Jika Anda mengalami masalah atau perlu konfigurasi khusus, periksa dokumentasi resmi Laravel di [laravel.com](https://laravel.com/docs).