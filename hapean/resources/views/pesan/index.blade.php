@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Tombol Kembali -->
        <div class="col-md-12 mb-3">
            <a href="{{ url('home') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>

        <!-- Breadcrumb -->
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light shadow-sm p-3 rounded">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                </ol>
            </nav>
        </div>

        <!-- Card utama -->
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255, 255, 255, 0.95);">
                <div class="row g-4 align-items-center">
                    <!-- Gambar -->
                    <div class="col-md-5">
                        <div class="image-container position-relative">
                            <img src="{{ asset('uploads/' . $barang->image) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $barang->nama_barang }}">
                            <span class="badge bg-primary position-absolute top-0 start-0 m-2 p-2">New Arrival</span>
                        </div>
                    </div>

                    <!-- Informasi Barang -->
                    <div class="col-md-7">
                        <h2 class="fw-bold text-dark">{{ $barang->nama_barang }}</h2>
                        <hr>

                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-dollar-sign text-success"></i> <strong>Harga</strong></td>
                                    <td>:</td>
                                    <td class="text-primary fw-bold">Rp. {{ number_format($barang->harga) }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box text-warning"></i> <strong>Stok</strong></td>
                                    <td>:</td>
                                    <td>{{ number_format($barang->stok) }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-info-circle text-secondary"></i> <strong>Keterangan</strong></td>
                                    <td>:</td>
                                    <td>{{ $barang->keterangan }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Form Pemesanan -->
                        <form method="POST" action="{{ url('pesan/' . $barang->id) }}" class="mt-3">
                            @csrf
                            <label for="jumlah_pesan" class="form-label fw-bold">🛒 Jumlah Pesan</label>
                            <input type="number" name="jumlah_pesan" id="jumlah_pesan" class="form-control mb-3" min="1" max="{{ $barang->stok }}" required>
                        
                            <button type="submit" class="btn btn-lg btn-success w-50 d-flex align-items-center justify-content-center">
                                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    body {
        background: linear-gradient(to right, #f8f9fa, #e3f2fd);
    }

    .breadcrumb {
        font-size: 14px;
    }

    .card {
        transition: all 0.3s ease-in-out;
        border-radius: 15px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    }

    .table-borderless td {
        padding: 10px;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .image-container img {
        transition: all 0.3s ease-in-out;
    }

    .image-container img:hover {
        transform: scale(1.02);
    }

    .badge {
        font-size: 12px;
    }
</style>
@endsection
