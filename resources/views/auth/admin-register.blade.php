@extends('layout')

@section('content')
<div class="card" style="max-width: 400px; margin: 4rem auto;">
    <div class="header-actions" style="justify-content: center; margin-bottom: 2rem;">
        <h2>Daftar Akun Admin</h2>
    </div>

    @if($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.admin.post') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Masukkan Nama Admin">
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Masukkan Email Admin">
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Buat Password Admin">
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Ketik Ulang Password">
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #1f2937;">Daftar sebagai Admin</button>
        </div>
        
        <div style="margin-top: 1rem; text-align: center;">
            <span style="color: var(--text-muted); font-size: 0.9rem;">Sudah punya akun?</span>
            <a href="{{ route('login.admin') }}" style="color: #1f2937; text-decoration: none; margin-left: 0.25rem;">Login Admin di sini</a>
        </div>
    </form>
</div>
@endsection
