@extends('templates.app', ['title' => 'Landing || Login'])

@section('content-dinamis')

@push('style')
<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container {
        max-width: 500px; /* Lebar diperbesar */
        margin: 50px auto;
        padding: 20px;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        border: none;
        background-color: #fff;
    }
    .card-header {
        background-color: transparent;
        border-bottom: none;
        padding-bottom: 10px;
    }
    .card-header h4 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }
    .card-body {
        padding: 30px 25px;
    }
    .form-control, .form-select {
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 12px 18px;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        border-color: #007bff;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 15px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .card-footer {
        background-color: transparent;
        border-top: none;
        font-size: 14px;
        color: #777;
        padding-top: 0;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #555;
    }
    .card-footer small {
        font-size: 13px;
        color: #aaa;
    }
</style>
@endpush

<div class="login-container">
    <div class="card">
        <div class="card-header text-center">
            <h4 class="mb-0">Login</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('login.add.proses') }}" method="POST">
                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}">
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <small>&copy; 2024 Apotek. All rights reserved.</small>
        </div>
    </div>
</div>

@endsection
