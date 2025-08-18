<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental PS & Cafe</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; }
        /* Animasi Fade In Up */
        @keyframes fadeInUp { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
        .animate-fade-in-up { opacity: 0; }
        .is-visible .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .is-visible .animate-delay-100 { animation-delay: .1s; }
        .is-visible .animate-delay-200 { animation-delay: .2s; }
        .is-visible .animate-delay-300 { animation-delay: .3s; }
        .is-visible .animate-delay-400 { animation-delay: .4s; }
        .is-visible .animate-delay-500 { animation-delay: .5s; }
    </style>
</head>
<body class="bg-slate-100 text-gray-800">

    <!-- Navbar (responsive + sticky top) -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg fixed top-0 inset-x-0 z-50 md:inset-x-auto md:left-1/2 md:-translate-x-1/2 md:w-[95%] md:max-w-7xl md:rounded-full transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Brand -->
                <a href="#" class="text-2xl font-bold text-blue-600">Tigis Rent</a>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="#fasilitas" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Fasilitas</a>
                    <a href="#status-unit" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Status Unit</a>
                    <a href="#menu" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Menu</a>
                    <a href="#konsol" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Konsol</a>
                    <a href="#lokasi" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Lokasi</a>
                </div>

                <!-- Desktop auth -->
                <div class="hidden md:flex items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-700 shadow-lg hover:shadow-blue-500/50 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 px-5 py-2.5 rounded-full text-sm font-medium">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-700 shadow-lg hover:shadow-blue-500/50 transition">Register</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile hamburger -->
                <button id="mobileMenuBtn" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-full hover:bg-slate-200" aria-controls="mobileMenu" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile panel -->
        <div id="mobileMenu" class="md:hidden hidden border-t border-slate-200">
            <div class="px-4 py-3 space-y-1 bg-white/95 backdrop-blur-md">
                <a href="#fasilitas" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Fasilitas</a>
                <a href="#status-unit" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Status Unit</a>
                <a href="#menu" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Menu</a>
                <a href="#konsol" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Konsol</a>
                <a href="#lokasi" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Lokasi</a>
                <div class="pt-2 border-t border-slate-200 mt-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-md text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 text-center">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-slate-100">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 text-center mt-1">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="animate-on-scroll is-visible">
        <div class="relative h-[80vh] bg-cover bg-center" style="background-image:url('/assets/fabian-albert-ePJUCF48vgo-unsplash.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white p-4">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in-up">Sewa Playstation & Cafe Terbaik</h1>
                <p class="text-lg md:text-xl mb-8 max-w-2xl animate-fade-in-up animate-delay-200">Nikmati pengalaman bermain game terbaik dengan konsol terbaru, fasilitas lengkap, dan menu spesial dari cafe kami.</p>
                <div class="flex space-x-4 animate-fade-in-up animate-delay-400">
                    <a href="#lokasi" class="bg-white text-blue-900 px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">Lihat Peta Lokasi</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">Booking / Login</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Fasilitas Section -->
        <section id="fasilitas" class="py-20 bg-white scroll-mt-24 md:scroll-mt-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-on-scroll">
                <div class="text-center animate-fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-900">Fasilitas & Kenyamanan</h2>
                    <p class="mt-4 text-lg text-gray-600">Kami menyediakan semua yang Anda butuhkan untuk sesi bermain yang tak terlupakan.</p>
                </div>
                <div class="mt-12 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-100"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><h3 class="mt-4 font-semibold">Harga Terjangkau</h3></div>
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-200"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg></div><h3 class="mt-4 font-semibold">Game Terbaru</h3></div>
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-300"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M12 21v-2.5M4 7l2 1M4 7l2-1M4 7v2.5M12 3v2.5"/></svg></div><h3 class="mt-4 font-semibold">9+ Konsol PS4</h3></div>
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-400"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><h3 class="mt-4 font-semibold">TV 32 - 50 Inch</h3></div>
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-500"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071a10 10 0 0114.142 0M1.414 8.464a15 15 0 0121.213 0"/></svg></div><h3 class="mt-4 font-semibold">Free WiFi</h3></div>
                    <div class="flex flex-col items-center animate-fade-in-up animate-delay-500"><div class="bg-blue-100 p-4 rounded-full"><svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 16l7-7 7 7"/></svg></div><h3 class="mt-4 font-semibold">Full AC</h3></div>
                </div>
            </div>
        </section>

        <!-- Status Unit Real-Time Section -->
        <section id="status-unit" class="py-20 bg-slate-100 scroll-mt-24 md:scroll-mt-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-on-scroll">
                <div class="text-center animate-fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-900">Status Unit Real-Time</h2>
                    <p class="mt-4 text-lg text-gray-600">Lihat unit mana yang sedang digunakan dan kapan akan tersedia.</p>
                </div>
                <div class="mt-12 space-y-8">
                    @forelse($consoles as $console)
                        <div class="flex flex-col items-center animate-fade-in-up">
                            <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $console->name }}</h3>
                            <div class="flex flex-wrap justify-center gap-4">
                                @for ($i = 1; $i <= $console->stock; $i++)
                                    @php
                                        $isBooked = isset($bookedUnitsMap[$console->id][$i]);
                                        $endTime = $isBooked ? $bookedUnitsMap[$console->id][$i] : null;
                                    @endphp
                                    <div @class([
                                        'w-32 p-4 rounded-lg text-center text-white font-bold shadow-lg flex flex-col justify-center items-center h-28 transition-all duration-300 transform hover:scale-105 hover:shadow-xl',
                                        'bg-red-500 hover:bg-red-600' => $isBooked,
                                        'bg-green-500 hover:bg-green-600' => !$isBooked,
                                    ])>
                                        <span class="text-2xl">Unit {{ $i }}</span>
                                        @if($isBooked)
                                            <span class="text-xs mt-1">Selesai dalam:</span>
                                            <span class="text-sm font-semibold countdown-timer" data-countdown="{{ \Carbon\Carbon::parse($endTime)->toIso8601String() }}">Menghitung...</span>
                                        @else
                                            <span class="text-sm mt-1">Tersedia</span>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 col-span-full">Tidak ada konsol yang terdaftar.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Menu Section -->
        <section id="menu" class="py-20 bg-blue-900 text-white scroll-mt-24 md:scroll-mt-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-on-scroll">
                <div class="text-center animate-fade-in-up">
                    <h2 class="text-3xl font-bold">Menu Makanan & Minuman</h2>
                    <p class="mt-4 text-lg text-blue-200">Temani sesi bermainmu dengan hidangan spesial dari kami.</p>
                </div>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-10">
                    <div class="space-y-2 animate-fade-in-up animate-delay-100"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Indomie Goreng Special</h3><p class="font-semibold text-lg text-yellow-300">Rp 15k</p></div><p class="text-blue-200">Indomie goreng dengan telur, sayuran, dan sosis.</p></div>
                    <div class="space-y-2 animate-fade-in-up animate-delay-200"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Kentang Goreng</h3><p class="font-semibold text-lg text-yellow-300">Rp 12k</p></div><p class="text-blue-200">Kentang goreng renyah dengan saus pilihan.</p></div>
                    <div class="space-y-2 animate-fade-in-up animate-delay-300"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Roti Bakar Coklat Keju</h3><p class="font-semibold text-lg text-yellow-300">Rp 10k</p></div><p class="text-blue-200">Roti bakar dengan topping coklat dan keju melimpah.</p></div>
                    <div class="space-y-2 animate-fade-in-up animate-delay-400"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Es Teh Manis</h3><p class="font-semibold text-lg text-yellow-300">Rp 5k</p></div><p class="text-blue-200">Teh manis dingin yang menyegarkan.</p></div>
                    <div class="space-y-2 animate-fade-in-up animate-delay-500"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Kopi Susu Gula Aren</h3><p class="font-semibold text-lg text-yellow-300">Rp 18k</p></div><p class="text-blue-200">Perpaduan kopi, susu, dan manisnya gula aren.</p></div>
                    <div class="space-y-2 animate-fade-in-up animate-delay-500"><div class="flex justify-between border-b border-dashed border-blue-700 pb-2"><h3 class="font-semibold text-lg">Aneka Jus Buah</h3><p class="font-semibold text-lg text-yellow-300">Rp 15k</p></div><p class="text-blue-200">Jus segar dari buah pilihan (mangga, alpukat, jeruk).</p></div>
                </div>
            </div>
        </section>

        <!-- Konsol Tersedia Section -->
        <section id="konsol" class="py-20 bg-white scroll-mt-24 md:scroll-mt-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-on-scroll">
                <div class="text-center animate-fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-900">Konsol yang Tersedia</h2>
                    <p class="mt-4 text-lg text-gray-600">Pilih konsol favoritmu dan mulai bermain.</p>
                </div>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($consoles as $console)
  <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/20 hover:-translate-y-2 animate-fade-in-up">

    {{-- PILIH GAMBAR: pakai $console->image kalau ada, else fallback berdasar nama konsol --}}
   @php
    // kunci fallback dari nama konsol: "PS 5" -> "ps5"
    $nameKey = \Illuminate\Support\Str::slug($console->name, '');

    // peta fallback lokal
    $fallbackMap = [
        'ps5' => asset('assets/cards/ps5.jpg'),
        'ps4' => asset('assets/cards/ps4.jpg'),
        'ps3' => asset('assets/cards/ps3.jpg'),
    ];
    $defaultImage = asset('assets/cards/default.jpg');

    // tentukan sumber gambar final
    $imgSrc = $console->image
        ? (\Illuminate\Support\Str::startsWith($console->image, ['http://','https://','/'])
            ? $console->image
            : asset('assets/cards/'.$console->image))
        : ($fallbackMap[$nameKey] ?? $defaultImage);
@endphp


    <img src="{{ $imgSrc }}" alt="{{ $console->name }}" class="w-full h-56 object-cover">
    <div class="p-6">
      <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $console->name }}</h3>
      <p class="text-gray-600 mb-4 h-24 overflow-hidden">{{ $console->description }}</p>
      <div class="flex justify-between items-center">
        <span class="text-lg font-bold text-blue-600">Rp {{ number_format($console->price_per_hour) }} / Jam</span>
        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition-all duration-300">Booking</a>
      </div>
    </div>
  </div>
@empty
  <p class="text-center text-gray-500 col-span-full">Saat ini belum ada konsol yang tersedia.</p>
@endforelse
                </div>
            </div>
        </section>

        <!-- Lokasi/Maps Section -->
        <section id="lokasi" class="py-20 bg-slate-100 scroll-mt-24 md:scroll-mt-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-on-scroll">
                <div class="text-center animate-fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-900">Temukan Kami</h2>
                    <p class="mt-4 text-lg text-gray-600">Kunjungi kami langsung di lokasi yang strategis dan mudah dijangkau.</p>
                </div>
                <div class="mt-12 rounded-lg shadow-lg overflow-hidden animate-fade-in-up animate-delay-200">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.471696952725!2d106.8245840153472!3d-6.20162099551061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fd540de55!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1662542512345!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-blue-200">© {{ date('Y') }} Rental PS. All Rights Reserved.</p>
        </div>
    </footer>

    {{-- SCRIPT UNTUK COUNTDOWN TIMER, ANIMASI, DAN NAV MOBILE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Countdown Timer
            const countdownTimers = document.querySelectorAll('.countdown-timer');
            function updateTimers() {
                document.querySelectorAll('.countdown-timer').forEach(timer => {
                    const endTime = new Date(timer.dataset.countdown).getTime();
                    const now = new Date().getTime();
                    const distance = endTime - now;
                    if (distance < 0) {
                        const unitNumberText = timer.parentElement.querySelector('span:first-child').innerText;
                        timer.parentElement.classList.remove('bg-red-500');
                        timer.parentElement.classList.add('bg-green-500');
                        timer.parentElement.innerHTML = `<span class="text-2xl">${unitNumberText}</span><span class="text-sm mt-1">Tersedia</span>`;
                        return;
                    }
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    let timeString = '';
                    if (hours > 0) timeString += hours.toString().padStart(2, '0') + ':';
                    timeString += minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
                    timer.innerHTML = timeString;
                });
            }
            if (countdownTimers.length > 0) {
                updateTimers();
                setInterval(updateTimers, 1000);
            }

            // Animation on Scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('is-visible'); });
            }, { threshold: 0.1 });
            document.querySelectorAll('.animate-on-scroll').forEach(section => observer.observe(section));

            // Mobile nav toggle
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    const expanded = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', String(!expanded));
                    menu.classList.toggle('hidden');
                });
                // Auto-close after clicking a link
                menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    btn.setAttribute('aria-expanded', 'false');
                }));
            }
        });
    </script>
</body>
</html>
