@extends('layouts.app')

@section('content')
    <div class="container py-4">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="text-white mb-1">Selamat Datang, <strong>{{ $detailPegawai->nama }}</strong></h4>
                <small class="text-secondary">{{ ucfirst($detailPegawai->jabatan) }}</small>
            </div>
            <a href="/" class="btn btn-outline-light">Logout</a>
        </div>
    
        <div class="row g-4">
            
            <div class="text-center mb-4">
                <div class="card bg-dark text-white h-100 shadow-lg border-0 rounded-4 hover-shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title"><strong>Daftar Tugas</h5>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="btn btn-outline-light">Lihat Tugas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
