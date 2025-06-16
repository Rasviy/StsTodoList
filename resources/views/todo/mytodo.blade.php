@extends('layouts.app')

@section('content')

    
    <nav aria-label="breadcrumb" class="mb-4">
    <div class="breadcrumb bg-dark px-4 py-3 rounded border-secondary">
        <li class="breadcrumb-item">
            <a href="/todo/user/login/{{ $idPengguna }}" class="text-light text-decoration-none">
                <p class="btn btn-outline-light">Beranda</p>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('todo.selesai', ['id' => $idPengguna]) }}" class="text-light text-decoration-none">
                <p class="btn btn-outline-light">Tugas Selesai</p> 
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('todo.ditolak', ['id' => $idPengguna]) }}" class="text-light text-decoration-none">
                <p class="btn btn-outline-light">Tugas Ditolak</p> 
            </a>
        </li>
    </div>
</nav>


    
    <div class="text-center text-white mt-4 mb-3">
        <h3><i class="bi bi-list-task"></i> Daftar Tugas Saya</h3>
    </div>

    
    <div class="card bg-dark text-white shadow-sm border-0">
        <div class="card-body p-0">
            @if (count($daftarTugas) > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead class="text-secondary">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Nama Tugas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarTugas as $tugas)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                <td>
                                    <a href="/todo/detailTugas/{{ $tugas->id }}/{{ $idPengguna }}" class="text-white text-decoration-none">
                                        {{ $tugas->tugas }}
                                    </a>
                                </td>
                                <td class="text-center">
                                   <form action="{{ route('todo.setSelesai', ['id' => $tugas->id, 'userId' => $idPengguna]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-check-circle"></i> Selesai
                                        </button>
                                    </form>

                                    <form action="{{ route('todo.setDitolak', ['id' => $tugas->id, 'userId' => $idPengguna]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-check-circle"></i> ditolak
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-secondary py-5">
                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                    <p class="mb-0">Tidak ada tugas baru.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
