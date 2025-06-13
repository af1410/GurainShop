@extends('owner.layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-card {
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        color: white;
        transition: all 0.3s ease-in-out;
        animation: fadeIn 0.6s ease;
        text-decoration: none;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        text-decoration: none;
    }

    .dashboard-icon {
        font-size: 2.5rem;
        opacity: 0.8;
    }

    .bg-gradient-blue {
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card-subtext {
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .card-link {
        color: white;
        font-size: 0.9rem;
        text-decoration: underline;
    }

    .card-link:hover {
        text-decoration: none;
        color: #f1f1f1;
    }
</style>

<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <h2 class="text-center mb-4"><strong>Dashboard</strong></h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="{{ route('owner.laporanjual.index') }}">
                    <div class="card dashboard-card bg-gradient-blue">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="card-title mb-1">Total Penjualan</h1>
                                <div class="h2 mb-2">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</div>
                            </div>
                            <i class="fas fa-cash-register dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('owner.laporanbeli.index') }}">
                    <div class="card dashboard-card bg-gradient-green">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="card-title mb-1">Total Pembelian</h1>    
                                <div class="h2 mb-2">Rp {{ number_format($totalPembelian, 0, ',', '.') }}</div>
                            </div>
                            <i class="fas fa-shopping-cart dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
