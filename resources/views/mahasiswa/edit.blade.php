@extends('layout')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="header-actions">
        <h2>Edit Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.index') }}" class="btn" style="background-color: var(--text-muted); color: white;">Kembali</a>
    </div>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="nim">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" rows="4" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="no_hp">No. HP (Opsional)</label>
            <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="foto">Foto Mahasiswa (Opsional)</label>
            @if($mahasiswa->foto)
                <div style="margin-bottom: 10px;">
                    <img src="{{ Storage::url($mahasiswa->foto) }}" alt="Foto {{ $mahasiswa->nama }}" style="max-width: 150px; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                </div>
            @endif
            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
            <small style="color: var(--text-muted); display: block; margin-top: 5px;">Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Perbarui Data</button>
        </div>
    </form>
</div>
@endsection
