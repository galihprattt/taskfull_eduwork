@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container">
    <h2 class="mb-4">Keranjang Belanja</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($cart) > 0)
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; @endphp
                    @php $total += $subtotal; @endphp
                    <tr>
                        <td>
                            @if ($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" width="80">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control d-inline w-50">
                                <button type="submit" class="btn btn-info btn-sm">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total Harga: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></h4>

        <a href="{{ route('cart.clear') }}" class="btn btn-warning">Kosongkan Keranjang</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>

    @else
        <p>Keranjang belanja kosong.</p>
    @endif
</div>
@endsection
