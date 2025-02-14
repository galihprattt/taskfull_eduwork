@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ url('history') }}" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white shadow-sm rounded-3 p-3">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pesanan</a></li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Detail Pesanan</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="card-header bg-white border-0">
                    <h3 class="fw-bold text-dark">
                        <i class="fa-solid fa-circle-check text-success"></i> Berhasil Check Out
                    </h3>
                </div>
                <div class="card-body">
                    <p class="fs-5 text-muted">
                        Pesanan sukses di-checkout! Silakan transfer pembayaran ke:
                    </p>
                    <div class="bg-light p-3 rounded border-start border-4 border-success">
                        <h5 class="fw-bold mb-1">Bank BRI</h5>
                        <p class="fs-5 mb-1">
                            <strong>Nomor Rekening:</strong> 1494914914
                        </p>
                        <p class="fs-5 mb-0">
                            <strong>Total Bayar:</strong> Rp. <span class="text-success fw-bold">{{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card mt-4 shadow-lg border-0 rounded-4 p-4">
                <div class="card-body">
                    <h3 class="fw-bold">
                        <i class="fa-solid fa-cart-shopping text-primary"></i> Detail Pesanan
                    </h3>
                    @if(!empty($pesanan))
                        <p class="text-muted">Tanggal Pesan: <strong>{{ $pesanan->tanggal }}</strong></p>

                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan_details as $index => $pesanan_detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->image }}" width="70" class="rounded shadow-sm" alt="...">
                                        </td>
                                        <td class="fw-bold">{{ $pesanan_detail->barang->nama_barang }}</td>
                                        <td>{{ $pesanan_detail->jumlah }} pcs</td>
                                        <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                        <td class="fw-bold text-success">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    </tr>
                                @endforeach

                                <tr class="table-light">
                                    <td colspan="5" class="text-end fw-bold">Total Harga:</td>
                                    <td class="fw-bold">Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="5" class="text-end fw-bold">Kode Unik:</td>
                                    <td class="fw-bold">Rp. {{ number_format($pesanan->kode) }}</td>
                                </tr>
                                <tr class="table-warning">
                                    <td colspan="5" class="text-end fw-bold text-dark">Total Bayar:</td>
                                    <td class="fw-bold text-danger fs-5">Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <!-- Form Upload Bukti Transfer -->
            <div class="card mt-4 shadow-lg border-0 rounded-4 p-4">
                <div class="card-body">
                    <h3 class="fw-bold"><i class="fa-solid fa-file-invoice-dollar text-warning"></i> Upload Bukti Transfer</h3>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ url('upload-bukti-transfer/' . $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="bukti_transfer" class="form-label fw-bold">Unggah Bukti Transfer</label>
                            <input type="file" class="form-control @error('bukti_transfer') is-invalid @enderror" name="bukti_transfer" required>
                            @error('bukti_transfer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fa-solid fa-upload"></i> Upload Bukti
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Form Upload -->
        </div>
    </div>
</div>
@endsection
