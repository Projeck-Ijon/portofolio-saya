@extends('layouts.layout')

@section('title', 'Dashboard Admin CMS')

@section('content')
  <section class="py-12 max-w-7xl mx-auto px-6 min-h-screen" x-data="{ activeTab: 'general' }">
    
    <!-- Dashboard Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b border-white/5 pb-6 mb-8 gap-4">
      <div>
        <h1 class="text-3xl font-bold text-white tracking-tight">Dashboard CMS</h1>
        <p class="text-slate-400 text-xs sm:text-sm mt-1">Ubah kalimat, foto profil, keahlian, dan portofolio Anda secara real-time.</p>
      </div>
      <div class="flex items-center gap-3">
        <span class="text-xs text-slate-400">Login sebagai: <strong class="text-white">{{ Auth::user()->name }}</strong></span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 px-4 py-2 rounded-full text-xs font-semibold border border-red-500/10 transition-all cursor-pointer">
            Keluar <i class="fa-solid fa-arrow-right-from-bracket ml-1"></i>
          </button>
        </form>
      </div>
    </div>

    <!-- Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- Sidebar Navigation (3 cols) -->
      <div class="lg:col-span-3 flex flex-col gap-2 glass-card p-4 rounded-2xl border border-white/5">
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none"
                :class="activeTab === 'general' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5'"
                @click="activeTab = 'general'">
          <i class="fa-solid fa-sliders text-sm"></i> Pengaturan Umum
        </button>
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none"
                :class="activeTab === 'skills' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5'"
                @click="activeTab = 'skills'">
          <i class="fa-solid fa-screwdriver-wrench text-sm"></i> Kelola Keahlian
        </button>
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none"
                :class="activeTab === 'projects' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5'"
                @click="activeTab = 'projects'">
          <i class="fa-solid fa-laptop-code text-sm"></i> Kelola Proyek
        </button>
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none"
                :class="activeTab === 'experiences' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5'"
                @click="activeTab = 'experiences'">
          <i class="fa-solid fa-graduation-cap text-sm"></i> Kelola Riwayat
        </button>
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none"
                :class="activeTab === 'messages' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5'"
                @click="activeTab = 'messages'">
          <i class="fa-regular fa-envelope text-sm"></i> Inbox Pesan
          @if(count($messages) > 0)
            <span class="bg-red-500 text-white text-[9px] px-1.5 py-0.5 rounded-full ml-auto">{{ count($messages) }}</span>
          @endif
        </button>
        <div class="border-t border-white/5 my-2"></div>
        <button class="w-full text-left px-4 py-3 rounded-xl text-xs font-semibold flex items-center gap-3 transition-all outline-none text-slate-400 hover:text-white hover:bg-white/5"
                :class="activeTab === 'password' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : ''"
                @click="activeTab = 'password'">
          <i class="fa-solid fa-key text-sm"></i> Ganti Password
        </button>
      </div>

      <!-- Main Editor Panel (9 cols) -->
      <div class="lg:col-span-9 flex flex-col gap-6">

        <!-- 1. GENERAL SETTINGS PANEL -->
        <div x-show="activeTab === 'general'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-sliders text-indigo-400"></i> Pengaturan Umum Portofolio
          </h2>
          <form action="{{ route('admin.settings.post') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Hero Badge -->
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Hero Badge</label>
                <input type="text" name="hero_badge" value="{{ $settings['hero_badge'] ?? '' }}" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
              </div>
              
              <!-- Hero Title -->
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Hero Title</label>
                <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
              </div>
            </div>

            <!-- Hero Description -->
            <div class="flex flex-col gap-1.5">
              <label class="text-slate-300 text-xs font-semibold">Hero Description</label>
              <textarea name="hero_description" rows="3" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white resize-none">{{ $settings['hero_description'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- About Bio 1 -->
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">About Bio Paragraf 1</label>
                <textarea name="about_bio_1" rows="4" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white resize-none">{{ $settings['about_bio_1'] ?? '' }}</textarea>
              </div>

              <!-- About Bio 2 -->
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">About Bio Paragraf 2</label>
                <textarea name="about_bio_2" rows="4" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white resize-none">{{ $settings['about_bio_2'] ?? '' }}</textarea>
              </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Stat: Pengalaman</label>
                <input type="text" name="stats_experience" value="{{ $settings['stats_experience'] ?? '' }}" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
              </div>
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Stat: Proyek</label>
                <input type="text" name="stats_projects" value="{{ $settings['stats_projects'] ?? '' }}" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
              </div>
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Stat: Kepuasan</label>
                <input type="text" name="stats_satisfaction" value="{{ $settings['stats_satisfaction'] ?? '' }}" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
              </div>
            </div>

            <!-- Profile Photo Upload -->
            <div class="flex flex-col sm:flex-row items-center gap-6 border-t border-white/5 pt-6 mt-2">
              <div class="w-20 h-20 rounded-2xl overflow-hidden glass-card border border-white/10 flex items-center justify-center shrink-0">
                <img src="{{ $settings['profile_photo'] ?? asset('images/foto-profil.png') }}" class="w-full h-full object-cover">
              </div>
              <div class="flex-1 flex flex-col gap-1.5">
                <label class="text-slate-300 text-xs font-semibold">Ganti Foto Profil</label>
                <input type="file" name="profile_photo" accept="image/*" class="text-xs text-slate-400 file:bg-white/5 file:border-0 file:px-4 file:py-2 file:rounded-xl file:text-xs file:text-white file:font-semibold hover:file:bg-white/10 file:mr-4 file:cursor-pointer">
                <p class="text-[10px] text-slate-500 mt-1">Gunakan format PNG/JPG dengan resolusi persegi (Rasio 1:1) maks 2MB. Disimpan sebagai teks Base64 untuk kompatibilitas Vercel.</p>
              </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="self-end bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl text-xs transition-all shadow-lg shadow-indigo-600/20 cursor-pointer">
              Simpan Pengaturan
            </button>
          </form>
        </div>

        <!-- 2. SKILLS PANEL -->
        <div x-show="activeTab === 'skills'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-screwdriver-wrench text-indigo-400"></i> Kelola Keahlian (Skills)
          </h2>

          <!-- Add Skill Form -->
          <div class="bg-obsidian-900/40 p-5 rounded-2xl border border-white/5">
            <h3 class="text-xs font-bold text-white mb-4 uppercase tracking-wider">Tambah Keahlian Baru</h3>
            <form action="{{ route('admin.skill.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
              @csrf
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-400 text-[10px] font-semibold">Nama Keahlian</label>
                <input type="text" name="name" required placeholder="e.g. React.js" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
              </div>
              <div class="flex flex-col gap-1.5">
                <label class="text-slate-400 text-[10px] font-semibold">Kategori</label>
                <select name="category" required class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                  <option value="frontend">Frontend</option>
                  <option value="backend">Backend</option>
                  <option value="devops">DevOps & Tools</option>
                </select>
              </div>
              <div class="flex items-center gap-3">
                <div class="flex-1 flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Persentase (%)</label>
                  <input type="number" name="percentage" required min="0" max="100" placeholder="90" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-3 rounded-xl text-xs transition-all shadow-lg cursor-pointer h-[38px] flex items-center justify-center shrink-0">
                  Tambah
                </button>
              </div>
            </form>
          </div>

          <!-- Skills List -->
          <div class="flex flex-col gap-4 mt-2">
            <h3 class="text-xs font-bold text-white uppercase tracking-wider">Daftar Keahlian Saat Ini</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              @foreach($skills as $skill)
                <div class="glass-card p-4 rounded-xl border border-white/5 flex items-center justify-between">
                  <div class="flex-1">
                    <span class="text-slate-500 text-[9px] uppercase font-bold tracking-wider">{{ $skill->category }}</span>
                    <h4 class="font-bold text-slate-200 text-xs mt-0.5">{{ $skill->name }}</h4>
                    <div class="flex items-center gap-2 mt-1">
                      <div class="w-24 bg-obsidian-900 h-1.5 rounded-full">
                        <div class="bg-indigo-500 h-1.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                      </div>
                      <span class="text-[10px] text-slate-400 font-semibold">{{ $skill->percentage }}%</span>
                    </div>
                  </div>
                  <form action="{{ route('admin.skill.delete', $skill->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-slate-500 hover:text-red-400 transition-colors p-2 text-xs cursor-pointer"><i class="fa-regular fa-trash-can"></i></button>
                  </form>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- 3. PROJECTS PANEL -->
        <div x-show="activeTab === 'projects'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-laptop-code text-indigo-400"></i> Kelola Proyek Portofolio
          </h2>

          <!-- Add Project Box -->
          <div class="bg-obsidian-900/40 p-5 rounded-2xl border border-white/5">
            <h3 class="text-xs font-bold text-white mb-4 uppercase tracking-wider">Tambah Proyek Baru</h3>
            <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
              @csrf
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Judul Proyek</label>
                  <input type="text" name="title" required placeholder="e.g. Website Dinas Kominfo" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Tags (Pisahkan dengan koma)</label>
                  <input type="text" name="tags" required placeholder="Laravel 11, Tailwind, PostgreSQL" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
              </div>

              <div class="flex flex-col gap-1.5">
                <label class="text-slate-400 text-[10px] font-semibold">Deskripsi Proyek</label>
                <textarea name="description" rows="3" required placeholder="Jelaskan mengenai proyek ini..." class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white resize-none"></textarea>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">GitHub URL (Optional)</label>
                  <input type="text" name="github_url" placeholder="#" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Live Demo URL (Optional)</label>
                  <input type="text" name="demo_url" placeholder="#" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
              </div>

              <div class="flex flex-col gap-1.5">
                <label class="text-slate-400 text-[10px] font-semibold">Gambar Proyek</label>
                <input type="file" name="project_image" accept="image/*" class="text-xs text-slate-400 file:bg-white/5 file:border-0 file:px-4 file:py-2 file:rounded-xl file:text-xs file:text-white file:font-semibold hover:file:bg-white/10 file:mr-4 file:cursor-pointer">
              </div>

              <button type="submit" class="self-end bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2.5 rounded-xl text-xs transition-all shadow-lg cursor-pointer">
                Tambah Proyek
              </button>
            </form>
          </div>

          <!-- Project List -->
          <div class="flex flex-col gap-4 mt-2">
            <h3 class="text-xs font-bold text-white uppercase tracking-wider">Daftar Proyek Saat Ini</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              @foreach($projects as $proj)
                <div class="glass-card rounded-xl border border-white/5 overflow-hidden flex flex-col">
                  <!-- Thumbnail Base64 or Gradient fallback -->
                  <div class="h-32 bg-indigo-950 flex items-center justify-center relative overflow-hidden">
                    @if($proj->image_base64)
                      <img src="{{ $proj->image_base64 }}" class="w-full h-full object-cover">
                    @else
                      <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900 to-purple-900 opacity-60"></div>
                      <i class="fa-solid fa-image text-3xl text-white/20"></i>
                    @endif
                  </div>
                  <div class="p-4 flex-1 flex flex-col justify-between gap-3">
                    <div>
                      <h4 class="font-bold text-white text-xs leading-snug">{{ $proj->title }}</h4>
                      <p class="text-[10px] text-slate-400 line-clamp-2 mt-1 leading-relaxed">{{ $proj->description }}</p>
                      <div class="flex flex-wrap gap-1 mt-2">
                        @foreach(explode(',', $proj->tags) as $tag)
                          <span class="bg-white/5 text-slate-300 text-[8px] font-semibold px-2 py-0.5 rounded-full">{{ trim($tag) }}</span>
                        @endforeach
                      </div>
                    </div>
                    <form action="{{ route('admin.project.delete', $proj->id) }}" method="POST" class="self-end">
                      @csrf @method('DELETE')
                      <button type="submit" class="text-slate-500 hover:text-red-400 p-2 text-xs transition-colors cursor-pointer"><i class="fa-regular fa-trash-can"></i> Hapus</button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- 4. EXPERIENCES PANEL -->
        <div x-show="activeTab === 'experiences'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-graduation-cap text-indigo-400"></i> Kelola Riwayat Kerja & Pendidikan
          </h2>

          <!-- Add Experience -->
          <div class="bg-obsidian-900/40 p-5 rounded-2xl border border-white/5">
            <h3 class="text-xs font-bold text-white mb-4 uppercase tracking-wider">Tambah Riwayat Baru</h3>
            <form action="{{ route('admin.experience.store') }}" method="POST" class="flex flex-col gap-4">
              @csrf
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Tipe</label>
                  <select name="type" required class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                    <option value="work">Pengalaman Kerja</option>
                    <option value="education">Pendidikan</option>
                    <option value="certification">Sertifikasi</option>
                  </select>
                </div>
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Periode (e.g. 2021 - 2023)</label>
                  <input type="text" name="period" required placeholder="2021 - 2023" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Judul / Posisi</label>
                  <input type="text" name="title" required placeholder="e.g. Senior Web Developer" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Instansi / Perusahaan</label>
                  <input type="text" name="company" required placeholder="e.g. Tech Corp" class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
                <div class="flex flex-col gap-1.5">
                  <label class="text-slate-400 text-[10px] font-semibold">Deskripsi Singkat (Optional)</label>
                  <input type="text" name="description" placeholder="Jelaskan mengenai peran ini..." class="bg-obsidian-900 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-2.5 text-xs outline-none text-white">
                </div>
              </div>

              <button type="submit" class="self-end bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2.5 rounded-xl text-xs transition-all shadow-lg cursor-pointer">
                Tambah Riwayat
              </button>
            </form>
          </div>

          <!-- Experiences List -->
          <div class="flex flex-col gap-4 mt-2">
            <h3 class="text-xs font-bold text-white uppercase tracking-wider">Daftar Riwayat Saat Ini</h3>
            <div class="flex flex-col gap-3">
              @foreach($experiences as $exp)
                <div class="glass-card p-4 rounded-xl border border-white/5 flex items-center justify-between">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="text-[9px] uppercase font-bold px-2 py-0.5 rounded bg-white/5 text-slate-400">{{ $exp->type }}</span>
                      <span class="text-[10px] text-indigo-400 font-semibold">{{ $exp->period }}</span>
                    </div>
                    <h4 class="font-bold text-slate-200 text-xs mt-1">{{ $exp->title }} <span class="text-slate-500 font-normal">at {{ $exp->company }}</span></h4>
                    @if($exp->description)
                      <p class="text-[10px] text-slate-400 mt-1 leading-relaxed">{{ $exp->description }}</p>
                    @endif
                  </div>
                  <form action="{{ route('admin.experience.delete', $exp->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-slate-500 hover:text-red-400 p-2 text-xs transition-colors cursor-pointer"><i class="fa-regular fa-trash-can"></i></button>
                  </form>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- 5. INBOX MESSAGES PANEL -->
        <div x-show="activeTab === 'messages'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-regular fa-envelope text-indigo-400"></i> Inbox Pesan Masuk
          </h2>

          @if($messages->isEmpty())
            <div class="text-center py-12 flex flex-col items-center gap-3">
              <i class="fa-regular fa-envelope-open text-3xl text-slate-600"></i>
              <p class="text-xs text-slate-500 font-semibold">Belum ada pesan masuk.</p>
            </div>
          @else
            <div class="flex flex-col gap-4">
              @foreach($messages as $msg)
                <div class="glass-card p-5 rounded-xl border border-white/5 relative flex flex-col gap-3">
                  <div class="flex items-start justify-between gap-4">
                    <div>
                      <h4 class="font-bold text-slate-200 text-xs">{{ $msg->name }}</h4>
                      <span class="text-[10px] text-slate-500 font-medium">{{ $msg->email }}</span>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                      <span class="text-[9px] text-slate-500 font-semibold">{{ $msg->created_at->diffForHumans() }}</span>
                      <form action="{{ route('admin.message.delete', $msg->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-slate-500 hover:text-red-400 transition-colors p-1 text-xs cursor-pointer"><i class="fa-regular fa-trash-can"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="border-t border-white/5 pt-3">
                    <span class="text-[9px] text-slate-500 uppercase font-bold tracking-wider">Subjek: {{ $msg->subject ?? 'Tanpa Subjek' }}</span>
                    <p class="text-slate-300 text-xs whitespace-pre-wrap mt-1 leading-relaxed bg-obsidian-900/60 p-3 rounded-lg border border-white/5">{{ $msg->message }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>

        <!-- 6. PASSWORD UPDATE PANEL -->
        <div x-show="activeTab === 'password'" class="glass-card p-6 sm:p-8 rounded-3xl border border-white/5 flex flex-col gap-6">
          <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-key text-indigo-400"></i> Ganti Password Akun
          </h2>
          <form action="{{ route('admin.password.post') }}" method="POST" class="flex flex-col gap-4 max-w-md">
            @csrf
            
            <div class="flex flex-col gap-1.5">
              <label class="text-slate-300 text-xs font-semibold">Password Saat Ini</label>
              <input type="password" name="current_password" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
            </div>

            <div class="flex flex-col gap-1.5">
              <label class="text-slate-300 text-xs font-semibold">Password Baru (Min. 8 karakter)</label>
              <input type="password" name="password" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
            </div>

            <div class="flex flex-col gap-1.5">
              <label class="text-slate-300 text-xs font-semibold">Konfirmasi Password Baru</label>
              <input type="password" name="password_confirmation" required class="bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl px-4 py-3 text-xs outline-none text-white">
            </div>

            <button type="submit" class="self-start mt-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2.5 rounded-xl text-xs transition-all shadow-lg cursor-pointer">
              Ganti Password
            </button>
          </form>
        </div>

      </div>

    </div>
  </section>
@endsection
