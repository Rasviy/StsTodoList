@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Selesai</title>

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
                <td>Waktu Selesai</td>
                <td>Pemberi</td>
                <td>Pelaksana</td>
            </tr>
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