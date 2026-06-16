@extends('layouts.layout')

@section('title', 'Portofolio ' . ($settings['hero_badge'] ?? 'Pranata Komputer - Dinas Kominfo'))

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="min-h-[calc(100vh-80px)] flex items-center pt-8 md:pt-0 max-w-7xl mx-auto px-6 relative">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center w-full z-10">
      
      <!-- Text Info (Left) -->
      <div class="lg:col-span-7 flex flex-col gap-6 text-center lg:text-left">
        <div class="inline-flex items-center justify-center lg:justify-start gap-2 self-center lg:self-start bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold px-4 py-1.5 rounded-full tracking-wide">
          <span class="w-2 h-2 rounded-full bg-indigo-400 animate-ping"></span>
          {{ $settings['hero_badge'] ?? 'Pranata Komputer @ Dinas Kominfo' }}
        </div>
        
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white leading-[1.1] md:leading-[1.15]">
          {!! $settings['hero_title'] ?? 'Membangun Layanan <br> <span class="text-gradient-primary">Teknologi & Program Digital</span>' !!}
        </h1>
        
        <p class="text-slate-400 text-base sm:text-lg max-w-xl leading-relaxed mx-auto lg:mx-0">
          {{ $settings['hero_description'] ?? 'Saya adalah seorang Pranata Komputer di Dinas Kominfo dengan latar belakang pelatihan pemrograman.' }}
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mt-2">
          <a href="#projects" class="w-full sm:w-auto text-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-full shadow-lg shadow-indigo-500/20 hover:shadow-indigo-600/30 transition-all flex items-center justify-center gap-2">
            <span>Lihat Proyek Saya</span>
            <i class="fa-solid fa-arrow-right text-xs"></i>
          </a>
          <a href="#contact" class="w-full sm:w-auto text-center glass-card hover:bg-white/5 text-white font-semibold px-8 py-4 rounded-full transition-all border border-white/10 hover:border-white/20">
            Hubungi Saya
          </a>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-3 gap-6 border-t border-white/5 pt-8 mt-4 max-w-md mx-auto lg:mx-0">
          <div>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-white">{{ $settings['stats_experience'] ?? '5+' }}</h3>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Pengalaman</p>
          </div>
          <div>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-white">{{ $settings['stats_projects'] ?? '40+' }}</h3>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Proyek Selesai</p>
          </div>
          <div>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-white">{{ $settings['stats_satisfaction'] ?? '100%' }}</h3>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kepuasan</p>
          </div>
        </div>
      </div>

      <!-- Profile Photo & Floating IDE Card (Right) -->
      <div class="lg:col-span-5 relative w-full max-w-md mx-auto lg:max-w-none">
        
        <!-- Decorative Glow Behind Image -->
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/15 to-purple-500/15 rounded-3xl blur-3xl z-0"></div>

        <!-- Main Photo Frame -->
        <div class="relative z-10 glass-card rounded-3xl p-3 border border-white/10 shadow-2xl overflow-hidden aspect-[4/5] md:aspect-square lg:aspect-[4/5] flex items-center justify-center">
          <img src="{{ $settings['profile_photo'] ?? asset('images/foto-profil.png') }}" alt="Foto Profil Pranata Komputer" class="w-full h-full object-cover rounded-2xl">
          
          <!-- Gradient overlay on image bottom -->
          <div class="absolute inset-x-3 bottom-3 h-24 bg-gradient-to-t from-obsidian-900 via-obsidian-900/60 to-transparent rounded-b-2xl p-4 flex flex-col justify-end">
            <h4 class="font-bold text-white text-sm">Pranata Komputer</h4>
            <p class="text-indigo-400 text-[10px] font-medium">Dinas Komunikasi & Informatika</p>
          </div>
        </div>

        <!-- Floating IDE Card Overlay -->
        <div class="absolute bottom-[-20px] right-[-10px] sm:right-[-20px] z-20 w-[240px] glass-card rounded-2xl border border-white/10 shadow-2xl flex flex-col font-mono text-[10px] animate-float select-none">
          <!-- Title bar -->
          <div class="bg-obsidian-800/80 px-3 py-1.5 border-b border-white/5 flex items-center justify-between rounded-t-2xl">
            <div class="flex items-center gap-1.5">
              <span class="w-2 h-2 rounded-full bg-red-500/70 inline-block"></span>
              <span class="w-2 h-2 rounded-full bg-yellow-500/70 inline-block"></span>
              <span class="w-2 h-2 rounded-full bg-green-500/70 inline-block"></span>
            </div>
            <span class="text-slate-500 text-[8px]">ClassInfo.php</span>
          </div>
          <!-- Code content -->
          <div class="p-3 bg-[#090d16]/95 text-slate-300 rounded-b-2xl">
            <span class="text-pink-400">class</span> <span class="text-yellow-400">Staff</span> {<br>
            &nbsp;&nbsp;<span class="text-pink-400">public</span> <span class="text-blue-400">$role</span> = <span class="text-green-300">"Pranata Komputer"</span>;<br>
            &nbsp;&nbsp;<span class="text-pink-400">public</span> <span class="text-blue-400">$training</span> = <span class="text-green-300">"Programmer"</span>;<br>
            &nbsp;&nbsp;<span class="text-pink-400">public</span> <span class="text-blue-400">$skills</span> = [<span class="text-green-300">"Laravel"</span>, <span class="text-green-300">"TI"</span>];<br>
            }
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-24 max-w-7xl mx-auto px-6 scroll-mt-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
      
      <!-- Bio Summary (Left) -->
      <div class="lg:col-span-5 flex flex-col gap-6">
        <div>
          <h4 class="text-indigo-400 text-sm font-semibold tracking-wider uppercase">Tentang Saya</h4>
          <h2 class="text-3xl sm:text-4xl font-bold text-white mt-1">Biografi Profesional</h2>
        </div>
        <p class="text-slate-400 leading-relaxed text-sm">
          {{ $settings['about_bio_1'] ?? 'Saya adalah seorang Pranata Komputer yang mengabdikan diri di Dinas Komunikasi dan Informatika (Kominfo).' }}
        </p>
        <p class="text-slate-400 leading-relaxed text-sm">
          {{ $settings['about_bio_2'] ?? 'Setelah menyelesaikan pelatihan pemrograman intensif, saya fokus membangun aplikasi web dinamis.' }}
        </p>

        <!-- Glassmorphism Bio Highlight -->
        <div class="glass-card p-5 rounded-2xl flex items-center gap-4 border border-white/5">
          <div class="bg-indigo-500/10 text-indigo-400 w-12 h-12 rounded-xl flex items-center justify-center text-lg">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <div>
            <h4 class="font-bold text-slate-100 text-sm">Pembelajaran Berkelanjutan</h4>
            <p class="text-slate-400 text-xs mt-0.5">Berkomitmen untuk mengadopsi standar dan framework terbaru di industri.</p>
          </div>
        </div>
      </div>

      <!-- Experience and Education Tabs (Right) -->
      <div class="lg:col-span-7" x-data="{ activeTab: 'experience' }">
        <!-- Tab Headers -->
        <div class="flex border-b border-white/5 gap-6 text-sm font-semibold text-slate-400">
          <button class="pb-4 border-b-2 transition-all duration-300 outline-none cursor-pointer" 
                  :class="activeTab === 'experience' ? 'border-indigo-400 text-white' : 'border-transparent hover:text-slate-200'"
                  @click="activeTab = 'experience'">
            Pengalaman Kerja
          </button>
          <button class="pb-4 border-b-2 transition-all duration-300 outline-none cursor-pointer" 
                  :class="activeTab === 'education' ? 'border-indigo-400 text-white' : 'border-transparent hover:text-slate-200'"
                  @click="activeTab = 'education'">
            Pendidikan
          </button>
          <button class="pb-4 border-b-2 transition-all duration-300 outline-none cursor-pointer" 
                  :class="activeTab === 'certifications' ? 'border-indigo-400 text-white' : 'border-transparent hover:text-slate-200'"
                  @click="activeTab = 'certifications'">
            Sertifikasi
          </button>
        </div>

        <!-- Tab Content: Experience -->
        <div class="mt-8 flex flex-col gap-6" x-show="activeTab === 'experience'" x-transition:enter="transition ease-out duration-300 opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
          @forelse($experiences as $exp)
            <div class="relative pl-8 border-l border-white/10 flex flex-col gap-1.5 group">
              <div class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-indigo-500 border border-obsidian-900 group-hover:bg-indigo-400 transition-colors"></div>
              <span class="text-xs text-indigo-400 font-semibold uppercase tracking-wider">{{ $exp->period }}</span>
              <h3 class="text-base font-bold text-white">{{ $exp->title }} <span class="text-slate-500 font-normal">at {{ $exp->company }}</span></h3>
              <p class="text-slate-400 text-xs leading-relaxed">
                {{ $exp->description }}
              </p>
            </div>
          @empty
            <p class="text-slate-500 text-xs italic">Belum ada riwayat kerja.</p>
          @endforelse
        </div>

        <!-- Tab Content: Education -->
        <div class="mt-8 flex flex-col gap-6" x-show="activeTab === 'education'" x-transition:enter="transition ease-out duration-300 opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
          @forelse($education as $edu)
            <div class="relative pl-8 border-l border-white/10 flex flex-col gap-1.5 group">
              <div class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-indigo-500 border border-obsidian-900"></div>
              <span class="text-xs text-indigo-400 font-semibold uppercase tracking-wider">{{ $edu->period }}</span>
              <h3 class="text-base font-bold text-white">{{ $edu->title }} <span class="text-slate-500 font-normal">at {{ $edu->company }}</span></h3>
              <p class="text-slate-400 text-xs leading-relaxed">
                {{ $edu->description }}
              </p>
            </div>
          @empty
            <p class="text-slate-500 text-xs italic">Belum ada riwayat pendidikan.</p>
          @endforelse
        </div>

        <!-- Tab Content: Certifications -->
        <div class="mt-8 flex flex-col gap-6" x-show="activeTab === 'certifications'" x-transition:enter="transition ease-out duration-300 opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse($certifications as $cert)
              <div class="glass-card p-4 rounded-xl border border-white/5 flex items-center gap-3">
                <i class="fa-solid fa-award text-indigo-400 text-xl"></i>
                <div>
                  <h4 class="font-bold text-xs text-slate-100">{{ $cert->title }}</h4>
                  <p class="text-slate-500 text-[10px] mt-0.5">{{ $cert->company }}</p>
                </div>
              </div>
            @empty
              <p class="text-slate-500 text-xs italic col-span-2">Belum ada riwayat sertifikasi.</p>
            @endforelse
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section id="skills" class="py-24 glass-card border-x-0 border-white/5 bg-obsidian-800/25 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-6">
      
      <!-- Section Header -->
      <div class="text-center max-w-xl mx-auto mb-16">
        <h4 class="text-indigo-400 text-sm font-semibold tracking-wider uppercase">Kemampuan</h4>
        <h2 class="text-3xl sm:text-4xl font-bold text-white mt-1">Teknologi yang Saya Kuasai</h2>
        <p class="text-slate-400 text-sm mt-3">Kombinasi framework modern, server-side logic, arsitektur database, dan alat DevOps.</p>
      </div>

      <!-- Skills Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Backend -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 flex flex-col gap-6">
          <div class="flex items-center gap-3.5">
            <div class="bg-indigo-500/10 text-indigo-400 w-11 h-11 rounded-xl flex items-center justify-center text-lg">
              <i class="fa-solid fa-server"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Backend Engineering</h3>
          </div>
          <div class="flex flex-col gap-4">
            @forelse($skills->where('category', 'backend') as $skill)
              <div>
                <div class="flex items-center justify-between text-xs font-semibold mb-1">
                  <span>{{ $skill->name }}</span>
                  <span class="text-indigo-400">{{ $skill->percentage }}%</span>
                </div>
                <div class="w-full bg-obsidian-900 rounded-full h-1.5">
                  <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-1.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                </div>
              </div>
            @empty
              <p class="text-slate-500 text-xs italic">Belum ada keahlian backend.</p>
            @endforelse
          </div>
        </div>

        <!-- Frontend -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 flex flex-col gap-6">
          <div class="flex items-center gap-3.5">
            <div class="bg-indigo-500/10 text-indigo-400 w-11 h-11 rounded-xl flex items-center justify-center text-lg">
              <i class="fa-solid fa-code"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Frontend Engineering</h3>
          </div>
          <div class="flex flex-col gap-4">
            @forelse($skills->where('category', 'frontend') as $skill)
              <div>
                <div class="flex items-center justify-between text-xs font-semibold mb-1">
                  <span>{{ $skill->name }}</span>
                  <span class="text-indigo-400">{{ $skill->percentage }}%</span>
                </div>
                <div class="w-full bg-obsidian-900 rounded-full h-1.5">
                  <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-1.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                </div>
              </div>
            @empty
              <p class="text-slate-500 text-xs italic">Belum ada keahlian frontend.</p>
            @endforelse
          </div>
        </div>

        <!-- Tools & DevOps -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 flex flex-col gap-6">
          <div class="flex items-center gap-3.5">
            <div class="bg-indigo-500/10 text-indigo-400 w-11 h-11 rounded-xl flex items-center justify-center text-lg">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <h3 class="text-lg font-bold text-white">DevOps & Tools</h3>
          </div>
          <div class="flex flex-col gap-4">
            @forelse($skills->where('category', 'devops') as $skill)
              <div>
                <div class="flex items-center justify-between text-xs font-semibold mb-1">
                  <span>{{ $skill->name }}</span>
                  <span class="text-indigo-400">{{ $skill->percentage }}%</span>
                </div>
                <div class="w-full bg-obsidian-900 rounded-full h-1.5">
                  <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-1.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                </div>
              </div>
            @empty
              <p class="text-slate-500 text-xs italic">Belum ada keahlian DevOps.</p>
            @endforelse
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="py-24 max-w-7xl mx-auto px-6 scroll-mt-20">
    
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
      <div>
        <h4 class="text-indigo-400 text-sm font-semibold tracking-wider uppercase">Galeri Karya</h4>
        <h2 class="text-3xl sm:text-4xl font-bold text-white mt-1">Proyek Pilihan Terbaru</h2>
      </div>
      <p class="text-slate-400 text-sm max-w-md">
        Kumpulan beberapa proyek aplikasi web yang dirancang khusus untuk memecahkan masalah bisnis dengan performa optimal.
      </p>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse($projects as $proj)
        <div class="glass-card rounded-2xl overflow-hidden border border-white/5 flex flex-col glass-card-hover group">
          
          <!-- Visual/Image Mockup -->
          <div class="h-48 bg-obsidian-900 relative overflow-hidden flex items-center justify-center">
            @if($proj->image_base64)
              <img src="{{ $proj->image_base64 }}" alt="{{ $proj->title }}" class="w-full h-full object-cover">
            @else
              <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900 to-purple-900 opacity-60"></div>
              <i class="fa-solid fa-code text-6xl text-white/10 group-hover:scale-110 group-hover:text-indigo-400/25 transition-all duration-300"></i>
            @endif
            
            <!-- Live / Github Links Overlays -->
            <div class="absolute inset-0 bg-obsidian-900/80 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
              @if($proj->github_url && $proj->github_url !== '#')
                <a href="{{ $proj->github_url }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-indigo-500 transition-colors"><i class="fa-brands fa-github"></i></a>
              @endif
              @if($proj->demo_url && $proj->demo_url !== '#')
                <a href="{{ $proj->demo_url }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-indigo-500 transition-colors"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              @endif
            </div>
          </div>
          
          <!-- Info Content -->
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $proj->tags) as $tag)
                  <span class="bg-indigo-500/10 text-indigo-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider">{{ trim($tag) }}</span>
                @endforeach
              </div>
              <h3 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors mt-3">{{ $proj->title }}</h3>
              <p class="text-slate-400 text-xs leading-relaxed mt-1.5">{{ $proj->description }}</p>
            </div>
          </div>
        </div>
      @empty
        <p class="text-slate-500 text-xs italic col-span-3 text-center py-12">Belum ada proyek portofolio.</p>
      @endforelse
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-24 max-w-4xl mx-auto px-6 scroll-mt-20">
    <div class="glass-card p-8 sm:p-12 rounded-3xl border border-white/5 relative overflow-hidden">
      
      <!-- Subtle internal glowing blob -->
      <div class="absolute bottom-[-50px] right-[-50px] bg-indigo-500/10 w-48 h-48 rounded-full filter blur-3xl pointer-events-none"></div>
      
      <!-- Content header -->
      <div class="text-center max-w-xl mx-auto mb-12">
        <h4 class="text-indigo-400 text-sm font-semibold tracking-wider uppercase">Kontak Saya</h4>
        <h2 class="text-3xl font-bold text-white mt-1">Mari Bekerja Sama</h2>
        <p class="text-slate-400 text-xs sm:text-sm mt-3">Silakan kirimkan pesan, pertanyaan, atau penawaran kerja sama Anda melalui formulir di bawah ini.</p>
      </div>

      <!-- Contact Form -->
      <form action="{{ route('contact.store') }}" method="POST" class="flex flex-col gap-6">
        @csrf
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Name Input -->
          <div class="flex flex-col gap-1.5">
            <label for="name" class="text-slate-300 text-xs font-semibold">Nama Lengkap</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   required 
                   placeholder="John Doe" 
                   class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3.5 text-sm outline-none transition-all placeholder:text-slate-600 text-white">
            @error('name')
              <span class="text-red-500 text-[10px] mt-0.5">{{ $message }}</span>
            @enderror
          </div>

          <!-- Email Input -->
          <div class="flex flex-col gap-1.5">
            <label for="email" class="text-slate-300 text-xs font-semibold">Alamat Email</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   required 
                   placeholder="john@example.com" 
                   class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3.5 text-sm outline-none transition-all placeholder:text-slate-600 text-white">
            @error('email')
              <span class="text-red-500 text-[10px] mt-0.5">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Subject Input -->
        <div class="flex flex-col gap-1.5">
          <label for="subject" class="text-slate-300 text-xs font-semibold">Subjek</label>
          <input type="text" 
                 name="subject" 
                 id="subject" 
                 placeholder="Tawaran Kerjasama / Konsultasi Proyek" 
                 class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3.5 text-sm outline-none transition-all placeholder:text-slate-600 text-white">
          @error('subject')
            <span class="text-red-500 text-[10px] mt-0.5">{{ $message }}</span>
          @enderror
        </div>

        <!-- Message Input -->
        <div class="flex flex-col gap-1.5">
          <label for="message" class="text-slate-300 text-xs font-semibold">Pesan Anda</label>
          <textarea name="message" 
                    id="message" 
                    rows="5" 
                    required 
                    placeholder="Tulis pesan lengkap Anda di sini..." 
                    class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-sm outline-none transition-all placeholder:text-slate-600 text-white resize-none"></textarea>
          @error('message')
            <span class="text-red-500 text-[10px] mt-0.5">{{ $message }}</span>
          @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="mt-2 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-4 rounded-xl shadow-lg shadow-indigo-500/20 hover:shadow-indigo-600/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
          <i class="fa-regular fa-paper-plane text-sm"></i>
          <span>Kirim Pesan</span>
        </button>
      </form>

    </div>
  </section>
@endsection
