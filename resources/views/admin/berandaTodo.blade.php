@extends('layouts.app')

@section('content')
    <div class="container py-4">
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="text-white mb-1">Selamat Datang, <strong>{{ $detailPegawai->nama }}</strong></h5>
                <small class="text-secondary">{{ $detailPegawai->jabatan }}</small>
            </div>
            <a href="/" class="btn btn-outline-primary">Keluar</a>
        </div>

        {{-- MENU ADMIN --}}
        <div class="card bg-dark text-white mb-4">
            <div class="card-header text-center fw-bold fs-5">
                Menu Admin
            </div>
            <div class="card-body text-center">
                <div class="btn-group" role="group">
                    <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-light">Beranda</a>
                    <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-light">Penugasan Baru</a>
                    <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-light">Tugas Selesai</a>
                    <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-light">Tugas Ditolak</a>
                </div>
            </div>
        </div>

        {{-- TABEL TODO --}}
        @if(count($dataTodo) < 1)
            <div class="alert alert-info text-center">Tidak ada todo!</div>
        @else
            <div class="table-responsive shadow-sm">
                <table class="table table-dark table-striped table-hover align-middle text-center">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>No.</th>
                            <th>Penugasan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Tugas Dari</th>
                            <th>Tugas Untuk</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataTodo as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="/admin/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="text-decoration-none text-info">
                                        {{ $dt->tugas }}
                                    </a>
                                </td>
                                <td>{{ $dt->waktu_mulai }}</td>
                                <td>{{ $dt->waktu_selesai }}</td>
                                <td>{{ $dt->nama_pemberi }}</td>
                                <td>{{ $dt->nama_penerima }}</td>
                                <td>
                                    @if($dt->keterangan == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($dt->keterangan == 'Ditolak')
                                        <span class="badge bg-warning text-dark">Ditolak</span>
                                    @else
                                        <span class="badge bg-info text-dark">Ditugaskan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/todo/hapusPenugasan/{{ $dt->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
