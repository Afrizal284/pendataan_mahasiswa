@extends('layout')

@section('content')
<div class="card" style="max-width: 400px; margin: 4rem auto;">
    <div class="header-actions" style="justify-content: center; margin-bottom: 2rem;">
        <h2>Login User</h2>
    </div>

    @if($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.user.post') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Masukkan Email Anda">
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan Password Anda">
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login sebagai User</button>
        </div>
        
        <div style="margin-top: 1rem; text-align: center; display: flex; flex-direction: column; gap: 0.5rem;">
            <a href="{{ route('login.admin') }}" style="color: var(--text-muted); text-decoration: none; margin-top: 1rem; font-size: 0.9rem;">Login sebagai Admin</a>
        </div>
    </form>
</div>
@endsection
