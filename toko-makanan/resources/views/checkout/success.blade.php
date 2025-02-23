@extends('layouts.app')

@section('title', 'Checkout Berhasil')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Checkout Berhasil!</h2>
    <p>Terima kasih telah berbelanja di toko kami. Pesanan Anda sedang diproses.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection
