<div>
    <div class="container my-4">
        <!-- Navigasi Pilihan Menu -->
        <div class="row mb-3">
            <div class="col-12 text-center">
                <button wire:click="pilihMenu('lihat')" 
                        class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }} me-2">
                    <i class="bi bi-list"></i> Semua Produk
                </button>
                <button wire:click="pilihMenu('tambah')" 
                        class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    <i class="bi bi-plus-circle"></i> Tambah Produk
                </button>
                <button wire:loading class="btn btn-info ms-3">
                    <i class="bi bi-arrow-clockwise"></i> Loading...
                </button>
            </div>
        </div>

        <!-- Konten Menu -->
        <div class="row">
            <div class="col-12">
                @if($pilihanMenu == 'lihat')
                <!-- Daftar Semua Produk -->
                <div class="card shadow border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-box-seam"></i> Semua Produk</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaProduk as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->kode }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $produk->id }})" 
                                                class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button wire:click="pilihHapus({{ $produk->id }})" 
                                                class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @elseif($pilihanMenu == 'tambah')
                <!-- Form Tambah Produk -->
                <div class="card shadow border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Produk</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="simpan">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" wire:model="nama">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode / Barcode</label>
                                <input type="text" class="form-control" wire:model="kode">
                                @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" wire:model="harga">
                                @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" wire:model="stok">
                                @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
                @elseif($pilihanMenu == 'edit')
                <!-- Form Edit Produk -->
                <div class="card shadow border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Produk</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="simpanEdit">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" wire:model="nama">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode / Barcode</label>
                                <input type="text" class="form-control" wire:model="kode">
                                @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" wire:model="harga">
                                @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" wire:model="stok">
                                @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
                @elseif($pilihanMenu == 'hapus')
                <!-- Konfirmasi Hapus Produk -->
                <div class="card shadow border-danger">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="bi bi-trash"></i> Hapus Produk</h5>
                    </div>
                    <div class="card-body">
                        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                        <p><strong>Kode:</strong> {{ $produkTerpilih->kode }}</p>
                        <p><strong>Nama:</strong> {{ $produkTerpilih->nama }}</p>
                        <button wire:click="hapus" class="btn btn-danger">HAPUS</button>
                        <button wire:click="batal" class="btn btn-secondary">BATAL</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
