@extends('layout')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="header-actions">
        <h2>Tambah Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.index') }}" class="btn" style="background-color: var(--text-muted); color: white;">Kembali</a>
    </div>

    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="nim">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" value="{{ old('nim') }}" required placeholder="Masukkan NIM">
        </div>

        <div class="form-group">
            <label class="form-label" for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Masukkan Nama Lengkap">
        </div>

        <div class="form-group">
            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" rows="4" required placeholder="Masukkan Alamat Lengkap">{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="no_hp">No. HP (Opsional)</label>
            <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="Masukkan Nomor HP">
        </div>

        <div class="form-group">
            <label class="form-label" for="foto">Foto Mahasiswa (Opsional)</label>
            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
        </div>

        <hr style="margin: 2rem 0; border: none; border-top: 1px solid #e5e7eb;">
        <h3 style="margin-bottom: 1rem; color: #1f2937;">Akses Login User</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1rem;">Buatkan akses akun login untuk Mahasiswa ini.</p>

        <div class="form-group">
            <label class="form-label" for="email">Email Login</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Masukkan Email Login">
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password Login</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan Password (min. 8 karakter)">
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Data & Buat Akun</button>
        </div>
    </form>
</div>
@endsection
