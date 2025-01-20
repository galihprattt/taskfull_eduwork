<div>
    <div class="container my-4">
        <!-- Header Laporan -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold text-primary"><i class="bi bi-file-earmark-bar-graph"></i> Laporan Transaksi</h4>
                    <a href="{{ url('/cetak') }}" target="_blank" class="btn btn-success btn-sm">
                        <i class="bi bi-printer"></i> Cetak
                    </a>
                </div>
                <hr class="border-2 border-primary">
            </div>
        </div>

        <!-- Tabel Transaksi -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 25%;">Tanggal</th>
                                    <th style="width: 20%;">No Inv.</th>
                                    <th style="width: 30%;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaTransaksi as $transaksi)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->created_at }}</td>
                                    <td>{{ $transaksi->kode }}</td>
                                    <td class="text-end">Rp. {{ number_format($transaksi->total, 2, '.', ',') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($semuaTransaksi) === 0)
                        <div class="alert alert-warning text-center mt-3">
                            <i class="bi bi-exclamation-circle"></i> Belum ada data transaksi.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
