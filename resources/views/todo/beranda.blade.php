@extends('layouts.app')

@section('content')
    <div class="container py-4">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="text-white mb-1">Selamat Datang, <strong>{{ $detailPegawai->nama }}</strong></h4>
                <small class="text-secondary">{{ ucfirst($detailPegawai->jabatan) }}</small>
            </div>
            <a href="/" class="btn btn-outline-light">Keluar</a>
        </div>

        
        <div class="row g-4">
            {{-- Daftar Tugas --}}
            <div class="text-center mb-4">
                <div class="card bg-dark text-white h-100 shadow-lg border-0 rounded-4 hover-shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Daftar Tugas</h5>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="btn btn-primary px-4">Lihat Tugas</a>
                    </div>
                </div>
            </div>

            {{-- Tugas Selesai --}}
            {{-- <div class="col-md-4">
                <div class="card bg-dark text-white h-100 shadow-lg border-0 rounded-4 hover-shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tugas Diselesaikan</h5>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="/todo/mytodo/todoSelesai/{{ $detailPegawai->id }}" class="btn btn-success px-4">Tugas Selesai</a>
                    </div>
                </div>
            </div> --}}

            {{-- Tugas Ditolak
            <div class="col-md-4">
                <div class="card bg-dark text-white h-100 shadow-lg border-0 rounded-4 hover-shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tugas Ditolak</h5>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="/todo/mytodo/todoDitolak/{{ $detailPegawai->id }}" class="btn btn-danger px-4">Tidak Diselesaikan</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
