@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Ditolak</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
      
        body {
            padding-top: 15px; 
        }
    </style>
</head>
<body>
    <div class="container-md">
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
        
        <table class="table table-bordered border-primary">
            <tr>
                <td>No.</td>
                <td>Nama Tugas</td>
                <td>Waktu Penugasan</td>
                <td>Waktu Akhir</td>
                <td>Pemberi</td>
                <td>Pelaksana</td>
            </tr>
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