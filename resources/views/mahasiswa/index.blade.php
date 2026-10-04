@extends('layout')

@section('content')
<div class="card">
    <div class="header-actions">
        <h2>Data Mahasiswa</h2>
        <div>
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Data</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-left: 10px;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <div style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    @if(Auth::user()->role === 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswas as $index => $mhs)
                <tr>
                    <td>{{ $mahasiswas->firstItem() + $index }}</td>
                    <td>
                        @if($mhs->foto)
                            <img src="{{ Storage::url($mhs->foto) }}" alt="Foto {{ $mhs->nama }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        @else
                            <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 0.75rem;">
                                N/A
                            </div>
                        @endif
                    </td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->jenis_kelamin }}</td>
                    <td>{{ Str::limit($mhs->alamat, 50) }}</td>
                    <td>{{ $mhs->no_hp ?? '-' }}</td>
                    <td>{{ $mhs->email ?? '-' }}</td>
                    @if(Auth::user()->role === 'admin')
                    <td class="actions">
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-primary" style="background-color: #3b82f6;">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 1rem;">
        {{ $mahasiswas->links() }}
    </div>
</div>
@endsection
