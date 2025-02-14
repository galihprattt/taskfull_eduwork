@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Logo -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <img src="{{ asset('backend/assets/img/homee.jpg') }}" class="img-fluid rounded shadow" width="300" alt="">
        </div>
    </div>

    <!-- Daftar Barang -->
    <div class="row">
        @foreach ($barangs as $barang)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded">
                    <img src="{{ asset('uploads/' . $barang->image) }}" class="card-img-top img-fluid rounded-top" alt="{{ $barang->nama_barang }}">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">{{ $barang->nama_barang }}</h5>
                        <p class="card-text text-muted">
                            <strong>Harga :</strong> Rp. {{ number_format($barang->harga) }}<br>
                            <strong>Stok :</strong> {{ $barang->stok }} <br>
                        </p>
                        <hr>
                        <p class="card-text text-secondary">{{ $barang->keterangan }}</p>
                        <a href="{{ url('pesan/' . $barang->id) }}" class="btn btn-primary w-100"> 
                            <i class="fa-solid fa-cart-plus"></i> PESAN
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
