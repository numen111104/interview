<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" width="100" alt="Tailwind CSS Logo"></a>
    <a href="https://laravel-livewire.com" target="_blank"><img src="https://laravel-livewire.com/img/logo.png" width="100" alt="Livewire Logo"></a>
    <a href="https://alpinejs.dev" target="_blank"><img src="https://alpinejs.dev/alpine_long.svg" width="200" alt="Alpine.js Logo"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>
</p>

## Form Pendaftaran Santri Baru IDN Boarding School

### Deskripsi
Repository ini berisi implementasi dari fitur "Form Pendaftaran Santri Baru IDN Boarding School" menggunakan Laravel 10 atau 11, Livewire 3, AlpineJS, dan Bootstrap.

### Fitur
1. **Form Pendaftaran Santri Baru**:
    - Field yang harus diisi:
        - Username (Email)
        - Password
        - Nama Santri
        - Jenis Kelamin
        - Cabang IDN
        - Program IDN (berkaitan dengan Cabang IDN)
        - Bukti Transfer (File)
    - Validasi termasuk ketersediaan kuota, email yang sudah terdaftar, format file, dan ukuran file.
    - Proses validasi dan submit dilakukan tanpa refresh page.

2. **Integrasi Template**:
    - Menggunakan template Admin LTE atau template Bootstrap lainnya.

3. **Tampilan Status Sisa Kuota**:
    - Menampilkan status sisa kuota dari setiap cabang IDN.
    - Memungkinkan pengguna untuk melihat kuota di setiap cabang IDN tanpa refresh page.

### Referensi Database
- Data kuota cabang IDN dan program tersedia di dalamnya.

### Point Tambahan
- Layout rapih dan terstruktur.
- Penggunaan Blade Component untuk UI.
- Penggunaan Livewire Nested Component untuk interaksi dinamis.

### Informasi & Pengumpulan Tugas
Untuk informasi lebih lanjut atau pengumpulan tugas, silakan kirim link repository ke alendia.setiawan@gmail.com atau WhatsApp ke 085775745484.
