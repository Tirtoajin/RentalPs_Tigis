<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Website_Rental_PlayStation_0"></a>Website Rental PlayStation</h1>
<p class="has-line-data" data-line-start="1" data-line-end="2">Aplikasi web full-stack yang dirancang untuk menyediakan solusi manajemen lengkap bagi bisnis rental konsol. Proyek ini berfungsi sebagai demonstrasi penerapan alur kerja web modern dan implementasi fitur-fitur kompleks, mencakup sistem booking real-time, autentikasi pengguna berbasis peran (Admin &amp; Pelanggan), hingga integrasi payment gateway. Aplikasi ini dibangun untuk portofolio.</p>
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
<li class="has-line-data" data-line-start="22" data-line-end="23">PHP 8.2: Versi terbaru dari bahasa pemrograman PHP yang menjadi dasar dari Laravel.</li>
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
