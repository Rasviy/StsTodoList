@extends('layouts.app')

@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDo</title>
    
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <style>
        body {
            background: linear-gradient(to right, #323232, #000000);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(255, 255, 255, 0.37);
            color: #fff;
            width: 100%;
            max-width: 420px;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            color: #fff;
        }

        .card-text {
            color: #f0f0f0;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 10px;
            padding: 10px 25px;
            background-color: #c0bcbf;
            border: none;
        }

        .btn-primary:hover {
            background-color: #535558;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container-xxl">
        <div class="card mx-auto">
            <div class="card-body text-center">
                <h5 class="card-title">TODO LIST</h5>
                
                <hr style="border-color: rgba(255,255,255,0.3)">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif(session('kosong'))
                    <div class="alert alert-info">
                        {{ session('kosong') }}
                    </div>
                @endif

                <form action="{{ url('/auth/pegawai/prosesLogin') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="userName" class="form-control" placeholder="Email atau nama pengguna" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="kataSandi" class="form-control" placeholder="Kata Sandi" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-light " value="Masuk!">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection