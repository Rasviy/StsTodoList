@extends('layouts.app')

@section('content')
        <div class="container mt-4">
    <div class="d-flex justify-content-start mb-3 gap-2">
        <a class="btn btn-outline-light" href="/todo/admin/{{ $adminId }}">Beranda</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanBaru/{{ $adminId }}">Penugasan Baru</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanSelesai/{{ $adminId }}">Tugas Selesai</a>
    </div>
      
           <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle bg-white shadow-sm">
                <thead class="table-danger text-center">
            <tr>
                <td>No.</td>
                <td>Nama Tugas</td>
                <td>Waktu Penugasan</td>
                <td>Waktu Akhir</td>
                <td>Pemberi</td>
                <td>Pelaksana</td>        
            </tr>
            </thead>
            @foreach ( $penugasanDitolak as $pD )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pD->tugas }}</td>
                <td>{{ $pD->waktu_mulai }}</td>
                <td>{{ $pD->waktu_selesai }}</td>
                <td>{{ $pD->nama_pemberi }}</td>
                <td>{{ $pD->nama_penerima }}</td>
            </tr>   
            @endforeach
        </table>
        
    </div>

</body>
</html>
@endsection