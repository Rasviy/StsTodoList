@extends('layouts.app')

@section('content')
<div class="container py-4">

    
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-dark px-4 py-3 rounded shadow-sm border border-secondary">
            <li class="breadcrumb-item">
                <a href="/todo/user/login/{{ $idPengguna }}" class="text-light text-decoration-none">Beranda</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/todo/mytodo/{{ $idPengguna }}" class="text-light text-decoration-none">Daftar Penugasan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tugas Ditolak</li>
        </ol>
    </nav>

    
    <div class="text-center mb-4">
        <h4 class="fw-bold text-danger">❌ Tugas Tidak Dikerjakan</h4>
    </div>

    
    @if (count($todoDitolak) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle bg-white shadow-sm">
                <thead class="table-danger text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Tugas</th>
                        <th>Tugas Dimulai</th>
                        <th>Selesai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todoDitolak as $ts)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $ts->tugas }}</td>
                        <td>{{ $ts->waktu_mulai }}</td>
                        <td>{{ $ts->waktu_selesai }}</td>
                        <td class="text-danger fw-bold text-center">{{ $ts->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-secondary text-center">
            📭 Tidak ditemukan data tugas yang ditolak.
        </div>
    @endif

</div>
@endsection
