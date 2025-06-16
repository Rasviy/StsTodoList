@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-start mb-3 gap-2">
        <a class="btn btn-outline-light" href="/todo/admin/{{ $adminId }}">Beranda</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanBaru/{{ $adminId }}">Penugasan Baru</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanSelesai/{{ $adminId }}">Tugas Selesai</a>
        <a class="btn btn-outline-light" href="/admin/todo/penugasanDitolak/{{ $adminId }}">Tugas Ditolak</a>
    </div>

    <div class="container-sm">
        <div class="card-body">
            <h4 class="mb-3">Buat Penugasan Baru</h4>

            <form action="/admin/todo/simpanPenugasanBaru" method="POST">
                @csrf
                <table>
                <div class="mb-3">
                    <label for="namaTodo" class="form-label">Nama Tugas</label>
                    <input type="text" id="namaTodo" name="namaTodo" class="form-control" placeholder="Nama Tugas" required>
                </div>

                <div class="mb-3">
                    <label for="tanggalMulai" class="form-label">Waktu Mulai</label>
                    <input type="date" id="tanggalMulai" name="tanggalMulai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggalSelesai" class="form-label">Waktu Selesai</label>
                    <input type="date" id="tanggalSelesai" name="tanggalSelesai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pemberiTugas" class="form-label">Delegator</label>
                    <select name="pemberiTugas" id="pemberiTugas" class="form-control" required>
                        <option value="">-- Pilih Delegator --</option>
                        @foreach ($namaDelegator as $nd)
                            <option value="{{ $nd->id }}">{{ $nd->nama }}</option>
                        @endforeach
                    </select>
                    </table>
                </div>

                <div class="mb-4">
                    <label for="namaPenugas" class="form-label">Pelaksana</label>
                    <select name="namaPenugas" id="namaPenugas" class="form-control" required>
                        <option value="">-- Pilih Pelaksana --</option>
                        @foreach ($namaPelaksana as $np)
                            <option value="{{ $np->id }}">{{ $np->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-light">Tugaskan!</button>
            </form>
        </div>
    </div>
</div>
@endsection
