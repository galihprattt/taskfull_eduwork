<div>
    <div class="container my-4">
        <!-- Header -->
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                @if(!$transaksiAktif)
                <button class="btn btn-primary btn-lg" wire:click='transaksiBaru'>
                    <i class="bi bi-plus-circle"></i> Transaksi Baru
                </button>
                @else
                <button class="btn btn-danger btn-lg" wire:click='batalTransaksi'>
                    <i class="bi bi-x-circle"></i> Batalkan Transaksi
                </button>
                @endif
                <button class="btn btn-info" wire:loading>
                    <i class="bi bi-arrow-clockwise"></i> Loading...
                </button>
            </div>
        </div>

        <!-- Konten Transaksi Aktif -->
        @if($transaksiAktif)
        <div class="row gy-4">
            <!-- Kolom Kiri (Produk) -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-receipt"></i> No Invoice: {{ $transaksiAktif->kode }}
                        </h5>
                        <input type="text" class="form-control mb-3" placeholder="No Invoice" wire:model.live="kode">
                        <table class="table table-striped table-bordered">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaProduk as $key => $produk)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->produk->kode }}</td>
                                    <td>{{ $produk->produk->nama }}</td>
                                    <td>Rp. {{ number_format($produk->produk->harga, 2, '.', ',') }}</td>
                                    <td>{{ $produk->jumlah }}</td>
                                    <td>Rp. {{ number_format($produk->produk->harga * $produk->jumlah, 2, '.', ',') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" wire:click="hapusProduk({{ $produk->id }})">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($semuaProduk) === 0)
                        <div class="alert alert-warning text-center mt-3">
                            <i class="bi bi-exclamation-circle"></i> Belum ada produk dalam transaksi.
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan (Detail Pembayaran) -->
            <div class="col-lg-4">
                <!-- Total Biaya -->
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-cash-stack"></i> Total Biaya
                        </h5>
                        <div class="d-flex justify-content-between align-items-center fs-4">
                            <span>Rp.</span>
                            <span>{{ number_format($totalSemuaBelanja, 2, '.', ',') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Input Bayar -->
                <div class="card shadow-sm border-primary mt-3">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-wallet2"></i> Bayar
                        </h5>
                        <input type="number" class="form-control" placeholder="Jumlah Bayar" wire:model.live='bayar'>
                    </div>
                </div>

                <!-- Kembalian -->
                <div class="card shadow-sm border-primary mt-3">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-arrow-repeat"></i> Kembalian
                        </h5>
                        <div class="d-flex justify-content-between align-items-center fs-4">
                            <span>Rp.</span>
                            <span>{{ number_format($kembalian, 2, '.', ',') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Status dan Tombol -->
                @if ($bayar)
                <div class="mt-3">
                    @if($kembalian < 0)
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> Uang yang dibayar kurang!
                    </div>
                    @elseif($kembalian >= 0)
                    <button class="btn btn-success btn-lg w-100" wire:click='transaksiSelesai'>
                        <i class="bi bi-check-circle"></i> Selesaikan Transaksi
                    </button>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
