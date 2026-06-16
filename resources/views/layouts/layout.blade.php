<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>@yield('title', 'My Portfolio - Fullstack Developer & Designer')</title>
  <meta name="description" content="Portfolio premium yang menampilkan karya, keahlian, dan riwayat profesional saya. Dibuat menggunakan Laravel dan dideploy di Vercel.">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- AlpineJS for interactive actions (navbar/tabs) -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-obsidian-900 text-slate-100 bg-grid-pattern relative min-h-screen">

  <!-- Background Decorative Glowing Blobs -->
  <div class="glow-blob bg-indigo-600/15 w-[300px] h-[300px] md:w-[600px] md:h-[600px] top-[-100px] left-[-150px] animate-pulse-glow" style="animation-duration: 8s;"></div>
  <div class="glow-blob bg-teal-500/10 w-[250px] h-[250px] md:w-[500px] md:h-[500px] top-[40%] right-[-100px] animate-pulse-glow" style="animation-duration: 12s;"></div>
  <div class="glow-blob bg-purple-600/10 w-[300px] h-[300px] md:w-[600px] md:h-[600px] bottom-[-100px] left-[20%] animate-pulse-glow" style="animation-duration: 10s;"></div>

  <!-- Navigation -->
  <nav class="sticky top-0 z-50 w-full glass-card border-x-0 border-t-0 border-b border-white/5" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
      
      <!-- Logo -->
      <a href="#" class="flex items-center gap-2.5 font-bold text-2xl tracking-tight text-white group">
        <span class="bg-gradient-to-r from-indigo-400 to-purple-600 w-8 h-8 rounded-lg flex items-center justify-center text-sm shadow-md group-hover:scale-105 transition-transform">
          <i class="fa-solid fa-code text-white"></i>
        </span>
        <span>Portofolio<span class="text-indigo-400">Saya</span></span>
      </a>

      <!-- Desktop Navigation Links -->
      <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
        <a href="#hero" class="hover:text-white hover:underline decoration-indigo-400 decoration-2 underline-offset-4 transition-all">Beranda</a>
        <a href="#about" class="hover:text-white hover:underline decoration-indigo-400 decoration-2 underline-offset-4 transition-all">Tentang</a>
        <a href="#skills" class="hover:text-white hover:underline decoration-indigo-400 decoration-2 underline-offset-4 transition-all">Keahlian</a>
        <a href="#projects" class="hover:text-white hover:underline decoration-indigo-400 decoration-2 underline-offset-4 transition-all">Proyek</a>
        <a href="#contact" class="hover:text-white hover:underline decoration-indigo-400 decoration-2 underline-offset-4 transition-all">Kontak</a>
        
        <a href="#contact" class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-5 py-2.5 rounded-full shadow-lg shadow-indigo-500/20 hover:shadow-indigo-600/30 transition-all font-medium">
          Hubungi Saya
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <button class="md:hidden text-slate-300 hover:text-white focus:outline-none p-2" @click="mobileMenuOpen = !mobileMenuOpen">
        <i class="fa-solid text-xl" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
      </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="md:hidden glass-card border-x-0 border-b-0 border-t border-white/5 absolute left-0 right-0 py-6 px-6 flex flex-col gap-4 shadow-xl"
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-[-10px]"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-[-10px]">
      <a href="#hero" class="text-slate-300 hover:text-white font-medium py-1.5 transition-colors" @click="mobileMenuOpen = false">Beranda</a>
      <a href="#about" class="text-slate-300 hover:text-white font-medium py-1.5 transition-colors" @click="mobileMenuOpen = false">Tentang</a>
      <a href="#skills" class="text-slate-300 hover:text-white font-medium py-1.5 transition-colors" @click="mobileMenuOpen = false">Keahlian</a>
      <a href="#projects" class="text-slate-300 hover:text-white font-medium py-1.5 transition-colors" @click="mobileMenuOpen = false">Proyek</a>
      <a href="#contact" class="text-slate-300 hover:text-white font-medium py-1.5 transition-colors" @click="mobileMenuOpen = false">Kontak</a>
      
      <a href="#contact" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-center py-3 rounded-full mt-2" @click="mobileMenuOpen = false">
        Hubungi Saya
      </a>
    </div>
  </nav>

  <!-- Notification Toasts -->
  @if(session('success'))
    <div class="fixed bottom-6 right-6 z-50 max-w-md"
         x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4">
      <div class="glass-card border-emerald-500/20 bg-obsidian-800/90 text-white p-4 rounded-xl flex items-start gap-3.5 shadow-2xl relative overflow-hidden">
        <!-- Accent Glow Line -->
        <div class="absolute top-0 bottom-0 left-0 w-1.5 bg-gradient-to-b from-teal-400 to-emerald-500"></div>
        
        <div class="flex items-center justify-center bg-emerald-500/10 text-emerald-400 p-2 rounded-lg ml-1">
          <i class="fa-regular fa-circle-check text-lg"></i>
        </div>
        
        <div class="flex-1">
          <h4 class="font-bold text-slate-100 text-sm">Berhasil</h4>
          <p class="text-slate-400 text-xs mt-0.5 leading-relaxed">{{ session('success') }}</p>
        </div>
        
        <button class="text-slate-400 hover:text-white transition-colors" @click="show = false">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </div>
    </div>
  @endif

  <!-- Main Content -->
  <main class="relative z-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="relative z-10 glass-card border-x-0 border-b-0 border-t border-white/5 py-12 mt-24">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
      
      <!-- Copyright and Brand -->
      <div class="flex flex-col items-center md:items-start gap-1">
        <div class="flex items-center gap-2 font-bold text-lg text-white">
          <span class="bg-gradient-to-r from-indigo-400 to-purple-600 w-6 h-6 rounded flex items-center justify-center text-xs">
            <i class="fa-solid fa-code text-white"></i>
          </span>
          <span>Portofolio<span class="text-indigo-400">Saya</span></span>
        </div>
        <p class="text-slate-500 text-xs mt-1">&copy; {{ date('Y') }} PortofolioSaya. Seluruh Hak Cipta Dilindungi.</p>
      </div>

      <!-- Navigation Links -->
      <div class="flex items-center gap-6 text-sm text-slate-400">
        <a href="#hero" class="hover:text-white transition-colors">Beranda</a>
        <a href="#about" class="hover:text-white transition-colors">Tentang</a>
        <a href="#skills" class="hover:text-white transition-colors">Keahlian</a>
        <a href="#projects" class="hover:text-white transition-colors">Proyek</a>
      </div>

      <!-- Socials -->
      <div class="flex items-center gap-4 text-slate-400">
        <a href="#" class="hover:text-white text-lg bg-white/5 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-500/10 hover:border hover:border-indigo-500/20 transition-all"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="hover:text-white text-lg bg-white/5 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-500/10 hover:border hover:border-indigo-500/20 transition-all"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="#" class="hover:text-white text-lg bg-white/5 w-10 h-10 rounded-full flex items-center justify-center hover:bg-indigo-500/10 hover:border hover:border-indigo-500/20 transition-all"><i class="fa-brands fa-instagram"></i></a>
      </div>
      
    </div>
  </footer>

</body>
</html>
