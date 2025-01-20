<div>
    <div class="container my-4">
        <!-- Navigasi Pilihan Menu -->
        <div class="row mb-3">
            <div class="col-12 text-center">
                <button wire:click="pilihMenu('lihat')" 
                        class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }} me-2">
                    <i class="bi bi-list"></i> Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')" 
                        class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    <i class="bi bi-plus-circle"></i> Tambah Pengguna
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
                <!-- Daftar Semua Pengguna -->
                <div class="card shadow border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-people"></i> Semua Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaPengguna as $pengguna)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengguna->name }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>{{ ucfirst($pengguna->peran) }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $pengguna->id }})" 
                                                class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button wire:click="pilihHapus({{ $pengguna->id }})" 
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
                <!-- Form Tambah Pengguna -->
                <div class="card shadow border-success">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='simpan'>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" class="form-control" wire:model='nama' />
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" wire:model='email' />
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" wire:model='password' />
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="peran" class="form-label">Peran</label>
                                <select id="peran" class="form-select" wire:model='peran'>
                                    <option value="">--Pilih Peran--</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>

                @elseif($pilihanMenu == 'edit')
                <!-- Form Edit Pengguna -->
                <div class="card shadow border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='simpanEdit'>
                            <div class="mb-3">
                                <label for="namaEdit" class="form-label">Nama</label>
                                <input type="text" id="namaEdit" class="form-control" wire:model='nama' />
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emailEdit" class="form-label">Email</label>
                                <input type="email" id="emailEdit" class="form-control" wire:model='email' />
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="passwordEdit" class="form-label">Password</label>
                                <input type="password" id="passwordEdit" class="form-control" wire:model='password' />
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="peranEdit" class="form-label">Peran</label>
                                <select id="peranEdit" class="form-select" wire:model='peran'>
                                    <option value="">--Pilih Peran--</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</button>
                        </form>
                    </div>
                </div>

                @elseif($pilihanMenu == 'hapus')
                <!-- Konfirmasi Hapus Pengguna -->
                <div class="card shadow border-danger">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="bi bi-trash"></i> Hapus Pengguna</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                        <p><strong>Nama:</strong> {{ $penggunaTerpilih->name }}</p>
                        <button wire:click='hapus' class="btn btn-danger me-2"><i class="bi bi-check-circle"></i> Hapus</button>
                        <button wire:click='batal' class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
