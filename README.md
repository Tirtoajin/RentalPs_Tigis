<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Website_Rental_PlayStation_0"></a>Website Rental PlayStation</h1>
<p class="has-line-data" data-line-start="1" data-line-end="2">Website <b>Rental PlayStation</b> adalah aplikasi web <b>full-stack</b>yang dikembangkan sebagai proyek <b>portfolio Web Developer</b>. Aplikasi ini berfokus pada penerapan arsitektur <b>Laravel</b>, manajemen <b>booking real-time</b>, serta integrasi <b>sistem pembayaran</b> untuk kebutuhan bisnis rental konsol.

Proyek ini menekankan aspek teknis seperti pemisahan peran pengguna, sinkronisasi data ketersediaan unit secara real-time, komunikasi client–server yang efisien, serta pengelolaan transaksi dan notifikasi dalam satu sistem terintegrasi.</p>
<h1 class="code-line" data-line-start=3 data-line-end=4 ><a id="Fitur_Utama_3"></a>Fitur Utama</h1>
<ul>
<li class="has-line-data" data-line-start="4" data-line-end="5">Landing Page: Halaman depan dinamis yang menampilkan status unit secara real-time.</li>
<li class="has-line-data" data-line-start="5" data-line-end="6">Sistem Autentikasi: Perbedaan hak akses antara Admin dan Pelanggan.</li>
<li class="has-line-data" data-line-start="6" data-line-end="11">Dashboard Admin:<br>
– Statistik pendapatan dan aktivitas.<br>
– Manajemen data Konsol (CRUD).<br>
– Manajemen Booking (Konfirmasi, Selesaikan, Batalkan).<br>
– Manajemen Testimoni (Persetujuan/Hapus).</li>
<li class="has-line-data" data-line-start="11" data-line-end="19">Dashboard Pelanggan:<br>
– Denah unit rental statis.<br>
– Alur booking interaktif.<br>
– Integrasi pembayaran online dengan Midtrans.<br>
– Riwayat transaksi.<br>
– Sistem notifikasi.<br>
– Fitur rating dan ulasan</li>
</ul>
<h1 class="code-line" data-line-start=19 data-line-end=20 ><a id="Tech_19"></a>Tech</h1>
<p class="has-line-data" data-line-start="20" data-line-end="21">Pondasi dari aplikasi ini:</p>
<h5 class="code-line" data-line-start=21 data-line-end=22 ><a id="Backend_21"></a>Backend</h5>
<ul>
<li class="has-line-data" data-line-start="22" data-line-end="23">PHP 8.2.</li>
<li class="has-line-data" data-line-start="23" data-line-end="24">Laravel 12: Framework PHP modern yang kuat untuk membangun aplikasi web. Menangani semua logika bisnis, routing, dan interaksi database.</li>
<li class="has-line-data" data-line-start="24" data-line-end="25">MySQL: Sistem manajemen database untuk menyimpan semua data aplikasi, mulai dari data pengguna, konsol, booking, hingga testimoni.</li>
</ul>
<h5 class="code-line" data-line-start=25 data-line-end=26 ><a id="Frontend_25"></a>Frontend</h5>
<ul>
<li class="has-line-data" data-line-start="26" data-line-end="27">Tailwind CSS: Framework CSS utility-first yang digunakan untuk membangun desain antarmuka yang modern dan responsif dengan cepat.</li>
<li class="has-line-data" data-line-start="27" data-line-end="28">Alpine.js: Framework JavaScript minimalis yang digunakan untuk menambahkan interaktivitas pada beberapa elemen, seperti dropdown dan toggle pada menu.</li>
<li class="has-line-data" data-line-start="28" data-line-end="30">Vite: Alat build modern yang mengompilasi aset frontend (CSS &amp; JS) dengan sangat cepat.</li>
</ul>
<h5 class="code-line" data-line-start=30 data-line-end=31 ><a id="Fitur__Library_Tambahan_30"></a>Fitur &amp; Library Tambahan</h5>
<ul>
<li class="has-line-data" data-line-start="31" data-line-end="32">Laravel Breeze: Starter kit untuk sistem autentikasi (login, register) yang ringan dan mudah dikustomisasi.</li>
<li class="has-line-data" data-line-start="32" data-line-end="33">Livewire: Framework full-stack untuk Laravel yang memungkinkan pembuatan antarmuka dinamis dan reaktif menggunakan PHP, tanpa perlu menulis banyak JavaScript. Ini digunakan pada halaman booking visual.</li>
<li class="has-line-data" data-line-start="33" data-line-end="34">Midtrans (Sandbox): Payment gateway populer di Indonesia yang diintegrasikan untuk menangani alur pembayaran online. Mode Sandbox digunakan untuk simulasi transaksi.</li>
<li class="has-line-data" data-line-start="34" data-line-end="35">Ngrok: Layanan tunneling yang digunakan selama pengembangan untuk mengekspos server lokal ke internet, memungkinkan pengujian webhook dari Midtrans.</li>
</ul>

# ERD & Flowchart
![erd](https://github.com/user-attachments/assets/50cef545-8501-4fb1-89bf-3ab61c6f878b)

<img width="2505" height="1524" alt="diagram-export-1-17-2026-1_27_35-PM" src="https://github.com/user-attachments/assets/dbafe094-35c8-4b62-bafc-b61539d011aa" />




# Setup & Installation

Pastikan perangkat lunak berikut telah terinstal:

* XAMPP (Apache & MySQL)
* Composer
* Node.js & NPM
* Git

### 1. Clone Repository

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Salin file environment:

```bash
cp .env.example .env
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

Tambahkan konfigurasi **Midtrans Sandbox**:

```env
MIDTRANS_MERCHANT_ID=isi_merchant_id
MIDTRANS_CLIENT_KEY=isi_client_key
MIDTRANS_SERVER_KEY=isi_server_key
MIDTRANS_IS_PRODUCTION=false
```

### 4. Generate Key & Storage

```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrasi & Seeding Database

```bash
php artisan migrate --seed
```

### 6. Jalankan Aplikasi

Gunakan dua terminal:

**Terminal Laravel**

```bash
php artisan serve
```

**Terminal Vite**

```bash
npm run dev
```

Akses aplikasi melalui browser:

```
http://127.0.0.1:8000
```

---

##  Midtrans Webhook (Local Testing)

Untuk menerima callback pembayaran Midtrans di lingkungan lokal:

1. Jalankan **Ngrok**

```bash
ngrok http 8000
```

2. Salin URL HTTPS yang dihasilkan
3. Masuk ke **Dashboard Midtrans Sandbox**
4. Buka **Settings > Configuration**
5. Isi **Notification URL**:

```
https://xxxx.ngrok-free.app/api/midtrans-callback
```

6. Simpan konfigurasi

Status transaksi dan booking akan otomatis diperbarui setelah simulasi pembayaran berhasil.

---

## 📸 Dokumentasi Aplikasi

### Landing Page
Menampilkan status unit PlayStation secara real-time dan countdown waktu sewa.

![Landing Page](tigis%20rent/landing%20page.png)

---

### User Area

#### Dashboard User
Ringkasan untuk melihat denah konsol .

![Dashboard User](tigis%20rent/user/dashboard%20user.png)

#### Booking Baru
Halaman pemesanan unit dengan validasi real-time untuk mencegah double booking.

![Booking Baru](tigis%20rent/user/booking%20baru.png)

#### Riwayat Transaksi
Menampilkan histori pembayaran dan status booking.

![Riwayat Transaksi](tigis%20rent/user/riwayat%20transaksi.png)
![Riwayat Transaksi](tigis%20rent/user/transaksiuser.jpeg)
#### Profil User
Manajemen data akun pengguna.

![Profil User](tigis%20rent/user/profil%20user.png)

---
### Admin Area

#### Dashboard Admin
Monitoring ringkasan sistem, pendapatan, dan aktivitas booking.

![Dashboard Admin](tigis%20rent/admin/dasboard%20admin.png)


#### Manajemen Konsol
Daftar dan pengelolaan unit PlayStation.

![Manajemen Konsol](tigis%20rent/admin/manajemen%20konsol.png)

#### Tambah Konsol
Form penambahan unit konsol baru ke sistem.

![Tambah Konsol](tigis%20rent/admin/manajemen%20konsol%20-%20tambah%20konsol.png)

#### Manajemen Booking
Pengelolaan data booking user dan status transaksi.

![Manajemen Booking](tigis%20rent/admin/manajemen%20booking.png)

#### Manajemen Testimoni
Pengelolaan testimoni pelanggan.

![Manajemen Testimoni](tigis%20rent/admin/manajemen%20testimoni.png)

#### Profil Admin
Manajemen data akun admin.

![Profil Admin](tigis%20rent/admin/profile%20admin.png)


