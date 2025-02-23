@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container text-center">
    <h1>Selamat Datang di Toko Makanan</h1>
    <p>Jual berbagai makanan dan minuman dengan harga terbaik!</p>

    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Lihat Produk</a>
</div>
@endsection
