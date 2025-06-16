@extends('layouts.app')

@section('content')

 <div class="container mt-4">
    <div class="d-flex justify-content-start mb-3 gap-2">
        <a class="btn btn-outline-light" href="/todo/admin/{{ $adminId }}">Beranda</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanBaru/{{ $adminId }}">Penugasan Baru</a>
        
        <a class="btn btn-outline-light" href="/admin/todo/penugasanDitolak/{{ $adminId }}">Tugas Ditolak</a>
    </div>
            <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle bg-white shadow-sm">
                <thead class="table-success text-center">
            <tr>
                <td>No.</td>
                <td>Nama Tugas</td>
                <td>Waktu Penugasan</td>
                <td>Waktu Selesai</td>
                <td>Pemberi</td>
                <td>Pelaksana</td>
            </tr>
            </thead>
            @foreach ( $penugasanSelesai as $ps )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ps->tugas }}</td>
                <td>{{ $ps->waktu_mulai }}</td>
                <td>{{ $ps->waktu_selesai }}</td>
                <td>{{ $ps->nama_pemberi }}</td>
                <td>{{ $ps->nama_penerima }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
@endsection