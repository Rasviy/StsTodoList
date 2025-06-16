@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian ToDo</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
       
        body {
            padding-top: 25px; 
        }
    </style>

    {{-- <!-- script untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  --}}

</head>
<body>
    <div class="container-md">
        <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded text-center" style="width: 180px;">Beranda</a>
        <hr>
        <table border="1" class="table table-hover">
            <tr>
                <td colspan="2" align="center">Rincian Data ToDo</td>
            </tr>
            <tr>
                <td><a href="/admin/todo/berandaTodo/{{ $adminId }}" class="text-decoration-none">Ditugaskan</a></td>
                <td>
                    <span class="badge text-bg-secondary">
                        {{ count($ditugaskan) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td><a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="text-decoration-none">Diselesaikan</a></td>
                <td>
                    <span class="badge text-bg-success">
                        {{ count($diselesaikan) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td><a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="text-decoration-none">Ditolak</a></td>
                <td>
                    <span class="badge text-bg-warning">
                        {{ count($ditolak) }}
                    </span>
                </td>
            </tr>
        </table>
        <hr>
        <center>
            
        <div style="width: 600px; height: 400px;">
            <canvas id="todoChart" width="400" height="200"></canvas>
        </div>
            
            <script>
                const ctx = document.getElementById('todoChart').getContext('2d');
                const todoChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Ditugaskan', 'Diselesaikan', 'Ditolak'],
                        datasets: [{
                            label: 'Status ToDo',
                            data:   [
                                {{ $jumlahDitugaskan }}, 
                                {{ $jumlahDiselesaikan }}, 
                                {{ $jumlahDitolak }}
                            ], 
                            backgroundColor: [
                                'rgba(108, 117, 125, 0.7)',
                                'rgba(25, 135, 84, 0.7)',  
                                'rgba(255, 193, 7, 0.7)'    
                            ],
                            borderColor: [
                                'rgba(108, 117, 125, 1)',
                                'rgba(25, 135, 84, 1)',
                                'rgba(255, 193, 7, 1)'
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            </script>
        </center>

    </div>
</body>
</html>
@endsection