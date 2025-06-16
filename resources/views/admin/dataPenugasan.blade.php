{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6LzKmYD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container-lg">
        <br>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/todo/admin/{{ $adminId }}">
                Beranda
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/admin/todo/penugasanBaru/{{ $adminId }}">
                Penugasan Baru
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/admin/todo/penugasanSelesai/{{ $adminId }}">
                Tugas Selesai
            </a> 
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/admin/todo/penugasanDitolak/{{ $adminId }}">
                Tugas Ditolak
            </a> 
        <hr>
        @if (count($dataTodo)<0)
            <center>
                Tidak ada todo!
            </center>
        @else
        <div class="table-responsive">
    <table class="table table-sm table-striped table-hover table-bordered align-middle shadow-sm rounded small">
        <thead class="table-primary">
            <tr class="text-nowrap">
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
            @foreach ( $dataTodo as $dt )
            <tr class="text-nowrap">
                <td align="center">{{ $loop->iteration }}</td>
                <td>
                    <a class="text-decoration-none" href="/admin/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}">
                        {{ $dt->tugas }}
                    </a>
                </td>
                <td>{{ $dt->waktu_mulai }}</td>
                <td>{{ $dt->waktu_selesai }}</td>
                <td>{{ $dt->nama_pemberi }}</td>
                <td>{{ $dt->nama_penerima }}</td>
                <td>
                    @if ($dt->keterangan == 'Selesai')
                        <span class="badge text-bg-success">Selesai</span>
                    @elseif ($dt->keterangan == 'Ditolak')
                        <span class="badge text-bg-warning">Ditolak</span>
                    @elseif ($dt->keterangan == 'Ditugaskan')
                        <span class="badge text-bg-info">Ditugaskan</span>
                    @endif
                </td>
                <td align="center">
                    <a class="text-decoration-none" href="/admin/todo/hapusPenugasan/{{ $dt->id }}">
                        <span class="badge text-bg-danger">Hapus</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        @endif
    </div>
</body>
</html>
@endsection --}} --}}