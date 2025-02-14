@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        
        <div class="col-md-12 mb-3">
            <a href="{{ url('home') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>

        
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light shadow-sm p-3 rounded">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>

        
        @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#28a745'
            });
        </script>
        @endif

        
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="card-header bg-white border-0">
                    <h3 class="fw-bold text-dark">
                        <i class="fa-solid fa-cart-shopping text-primary"></i> Checkout
                    </h3>
                    @if(!empty($pesanan))
                        <p class="text-muted">Tanggal Pesan: <strong>{{ $pesanan->tanggal }}</strong></p>
                    @endif
                </div>

                <div class="card-body">
                    @if(!empty($pesanan))
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->image }}" class="rounded shadow-sm img-thumbnail" width="100" alt="...">
                                    </td>
                                    <td>
                                        <strong>{{ $pesanan_detail->barang->nama_barang }}</strong>
                                    </td>
                                    <td>{{ $pesanan_detail->jumlah }} pcs</td>
                                    <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td><strong>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</strong></td>
                                    <td>
                                        <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Hapus barang ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="bg-light">
                                    <td colspan="5" class="text-end fw-bold">Total Harga:</td>
                                    <td><strong class="text-success">Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    <td>
                                        <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-primary shadow-sm d-flex align-items-center justify-content-center" onclick="return confirm('Check Out Sekarang ?')">
                                            <i class="fa-solid fa-check me-2"></i> Checkout
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="fa-solid fa-cart-arrow-down fa-2x"></i><br>
                            Keranjang Anda kosong. <a href="{{ url('home') }}" class="fw-bold">Belanja sekarang!</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    body {
        background: #f8f9fa;
    }

    .breadcrumb {
        font-size: 14px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background: rgba(0, 0, 0, 0.03);
        transition: 0.3s;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-primary {
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #007bff;
        box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.4);
    }

    .btn-danger {
        transition: all 0.3s ease-in-out;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        box-shadow: 0px 5px 15px rgba(220, 53, 69, 0.4);
    }

    img {
        transition: 0.3s ease-in-out;
    }

    img:hover {
        transform: scale(1.08);
    }

    .alert-warning {
        font-size: 18px;
    }
</style>
@endsection
