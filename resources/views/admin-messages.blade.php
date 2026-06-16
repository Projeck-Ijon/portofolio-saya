@extends('layouts.layout')

@section('title', 'Admin Dashboard - Pesan Masuk')

@section('content')
  <section class="py-16 max-w-7xl mx-auto px-6 min-h-[70vh]">
    <div class="flex items-center justify-between border-b border-white/5 pb-6 mb-8">
      <div>
        <h1 class="text-3xl font-bold text-white tracking-tight">Pesan Masuk</h1>
        <p class="text-slate-400 text-xs sm:text-sm mt-1">Daftar semua pesan yang dikirim dari form kontak portofolio Anda.</p>
      </div>
      <a href="{{ route('home') }}" class="glass-card px-4 py-2 rounded-full text-xs font-semibold hover:bg-white/5 border border-white/10 text-slate-300 hover:text-white transition-all flex items-center gap-1.5">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
      </a>
    </div>

    @if($messages->isEmpty())
      <div class="glass-card p-12 rounded-2xl text-center border border-white/5 max-w-md mx-auto mt-12 flex flex-col items-center gap-4">
        <div class="bg-indigo-500/10 text-indigo-400 w-16 h-16 rounded-full flex items-center justify-center text-2xl">
          <i class="fa-regular fa-envelope-open"></i>
        </div>
        <div>
          <h3 class="font-bold text-lg text-white">Belum Ada Pesan</h3>
          <p class="text-slate-400 text-xs mt-1">Pesan dari pengunjung portofolio Anda akan muncul di halaman ini.</p>
        </div>
      </div>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($messages as $msg)
          <div class="glass-card p-6 rounded-2xl border border-white/5 flex flex-col gap-4 relative overflow-hidden">
            <!-- Accent glow decoration -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-600"></div>

            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="font-bold text-slate-200 text-sm leading-snug">{{ $msg->name }}</h3>
                <a href="mailto:{{ $msg->email }}" class="text-xs text-indigo-400 hover:underline flex items-center gap-1 mt-0.5">
                  <i class="fa-regular fa-envelope text-[10px]"></i> {{ $msg->email }}
                </a>
              </div>
              <span class="text-[10px] text-slate-500 font-semibold uppercase shrink-0">
                {{ $msg->created_at->diffForHumans() }}
              </span>
            </div>

            <div class="border-t border-white/5 pt-3 flex-1 flex flex-col gap-2">
              <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Subjek:</span>
              <h4 class="font-bold text-white text-xs">{{ $msg->subject ?? 'Tanpa Subjek' }}</h4>
              
              <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mt-1">Pesan:</span>
              <p class="text-slate-300 text-xs leading-relaxed whitespace-pre-wrap font-sans bg-obsidian-900/50 p-3 rounded-lg border border-white/5">
                {{ $msg->message }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </section>
@endsection
