@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h2 class="mb-4">Checkout</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="customer_phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="customer_address" class="form-control" required></textarea>
        </div>

        <h4>Ringkasan Pesanan</h4>
        <ul class="list-group mb-3">
            @php $total = 0; @endphp
            @foreach ($cart as $id => $item)
                @php $subtotal = $item['price'] * $item['quantity']; @endphp
                @php $total += $subtotal; @endphp
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                    <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                </li>
            @endforeach
        </ul>

        <h4>Total Harga: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></h4>

        <button type="submit" class="btn btn-primary">Proses Checkout</button>
    </form>
</div>
@endsection
