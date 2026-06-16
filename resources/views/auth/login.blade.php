@extends('layouts.layout')

@section('title', 'Login Admin - Portofolio')

@section('content')
  <section class="min-h-[75vh] flex items-center justify-center max-w-7xl mx-auto px-6 relative py-12">
    
    <!-- Background Glow -->
    <div class="absolute bg-indigo-600/10 w-[300px] h-[300px] rounded-full filter blur-[100px] z-0"></div>

    <div class="glass-card p-8 sm:p-10 rounded-3xl border border-white/5 w-full max-w-md relative z-10 shadow-2xl flex flex-col gap-6">
      
      <!-- Brand & Header -->
      <div class="text-center flex flex-col items-center gap-2">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 w-12 h-12 rounded-xl flex items-center justify-center text-xl shadow-lg">
          <i class="fa-solid fa-lock text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-white mt-2">Login Admin</h2>
        <p class="text-slate-400 text-xs leading-relaxed">Masukkan kredensial Anda untuk masuk ke dashboard pengelolaan CMS.</p>
      </div>

      <!-- Errors -->
      @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl text-xs flex items-start gap-2.5">
          <i class="fa-solid fa-circle-exclamation text-sm mt-0.5"></i>
          <div>
            <ul class="list-disc pl-4 space-y-0.5">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif

      <!-- Form -->
      <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-5">
        @csrf
        
        <!-- Email -->
        <div class="flex flex-col gap-1.5">
          <label for="email" class="text-slate-300 text-xs font-semibold">Alamat Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500"><i class="fa-regular fa-envelope"></i></span>
            <input type="email" 
                   name="email" 
                   id="email" 
                   required 
                   placeholder="admin@mail.com" 
                   value="{{ old('email') }}"
                   class="w-full bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl pl-10 pr-4 py-3.5 text-sm outline-none transition-all placeholder:text-slate-600 text-white">
          </div>
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1.5">
          <label for="password" class="text-slate-300 text-xs font-semibold">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500"><i class="fa-solid fa-key"></i></span>
            <input type="password" 
                   name="password" 
                   id="password" 
                   required 
                   placeholder="••••••••" 
                   class="w-full bg-obsidian-900/70 border border-white/10 focus:border-indigo-500 rounded-xl pl-10 pr-4 py-3.5 text-sm outline-none transition-all placeholder:text-slate-600 text-white">
          </div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center gap-2">
          <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-white/10 bg-obsidian-900 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-obsidian-900">
          <label for="remember" class="text-slate-400 text-xs select-none">Ingat saya di perangkat ini</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full mt-2 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-3.5 rounded-xl shadow-lg shadow-indigo-500/20 hover:shadow-indigo-600/30 transition-all flex items-center justify-center gap-2 cursor-pointer text-sm">
          <span>Masuk Sekarang</span>
          <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </button>
      </form>

    </div>
  </section>
@endsection
