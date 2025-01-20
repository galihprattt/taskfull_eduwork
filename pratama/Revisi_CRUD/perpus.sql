-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2024 pada 12.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `sex` char(1) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(12) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `username`, `password`, `sex`, `telp`, `alamat`, `email`, `tgl_entry`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin', 'P', '0891281111', 'Bandung', 'admin@gmail.com', '2022-01-18 23:10:23', 'ADMIN'),
(2, 'Pelita', 'pelita', 'pelita', 'P', '087821505412', 'Gunung Batu, Bandung', 'pelita@gmail.com', '2022-01-18 23:10:23', 'USER'),
(3, 'Ayu', 'ayu', 'ayu', 'P', '08112121222', 'Sukawarna, Bandung', 'ayu@gmail.com', '2022-01-18 23:10:23', 'USER'),
(4, 'Fadhli', 'fadhli', 'fadhli', 'L', '08133613111', 'Cilandak, Jakarta', 'fadhli@gmail.com', '2022-01-18 23:10:23', 'USER'),
(5, 'Nur', 'nur', 'nur', 'P', '08212221311', 'Sunter, Jakarta', 'nur@gmail.com', '2022-01-18 23:10:23', 'USER'),
(6, 'Bagus', 'bagus', 'bagus', 'L', '0827379111', 'Sarijadi, Bandung', 'bagus@gmail.com\r\n', '2022-01-18 23:10:23', 'USER'),
(7, 'Mahendra', 'mahendra', 'mahendra', 'P', '08772191811', 'Sariwangi, Bandung', 'mahendra@gmail.com', '2022-01-18 23:10:23', 'USER'),
(8, 'Najmin', 'najmin', 'najmin', 'P', '08712911991', 'Sukaraja, Bandung', 'najmina@gmail.com', '2022-01-18 23:10:23', 'USER'),
(9, 'Putri', 'putri', 'putri', 'P', '0827191811', 'Cimahi', 'putri@gmail.com', '2022-01-18 23:10:23', 'USER'),
(10, 'Ridwan', 'ridwan', 'ridwan', 'L', '0898188191', 'Baros, Cimahi', 'ridwan@gmail.com', '2022-01-18 23:10:23', 'USER'),
(11, 'Feby', 'feby', 'feby', 'P', '08991717711', 'Sukajadi, Bandung', 'feby@gmail.com\r\n', '2022-01-18 23:10:23', 'USER'),
(12, 'Cindy', 'cindy', 'cindy', 'P', '08272772791', 'Sentral, Cimahi', 'cindy@gmail.com', '2022-01-18 23:10:23', 'USER'),
(13, 'Farid', 'farid', 'farid', 'P', '0876637911', 'Buah Batu, Bandung', 'farid@gmail.com', '2022-01-18 23:10:23', 'USER'),
(14, 'Bayu', 'bayu', 'bayu', 'L', '0887639199', 'Sunter, Jakarta', 'bayu@gmail.com', '2022-01-18 23:10:23', 'USER'),
(15, 'Deni', 'deni', 'deni', 'L', '0876619111', 'Cikutra, Subang', 'deni@gmail.com', '2022-01-18 23:10:23', 'USER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(25) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_penerbit` varchar(8) DEFAULT NULL,
  `id_pengarang` varchar(8) DEFAULT NULL,
  `id_katalog` varchar(3) DEFAULT NULL,
  `qty_stok` int(11) DEFAULT 0,
  `harga_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES
('002-291', 'Lancar Javascript', 2018, 'PN02', 'PG05', 'KG2', 8, 5000),
('777-380', 'Mongo DB Lanjut', 2020, 'PN01', 'PG03', 'KG2', 7, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_pinjam` int(11) NOT NULL DEFAULT 0,
  `isbn` varchar(25) NOT NULL DEFAULT '',
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_pinjam`, `isbn`, `qty`) VALUES
(1, '092-111', 1),
(1, '999-281', 1),
(2, '777-381', 1),
(3, '009-281', 1),
(3, '381-561', 1),
(3, '777-381', 2),
(3, '882-291', 1),
(4, '009-281', 1),
(4, '377-482', 1),
(5, '999-281', 2),
(6, '002-291', 1),
(6, '377-482', 2),
(6, '777-381', 1),
(6, '902-191', 1),
(7, '882-291', 1),
(8, '777-380', 2),
(8, '929-181', 1),
(9, '009-281', 1),
(9, '377-482', 1),
(9, '929-181', 1),
(10, '381-561', 1),
(10, '882-291', 1),
(10, '902-191', 1),
(10, '977-381', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` varchar(3) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES
('123', 'nurca'),
('KG2', 'Buku Belajar'),
('sad', 'dddd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 4, '2021-05-26', '2021-05-31'),
(2, 2, '2021-05-27', '2021-05-29'),
(3, 3, '2021-05-10', '2021-05-12'),
(4, 7, '2021-05-27', '2021-05-31'),
(5, 5, '2021-06-01', '2021-06-05'),
(6, 10, '2021-06-01', '2021-06-03'),
(7, 3, '2021-05-04', '2021-05-06'),
(8, 4, '2021-06-03', '2021-06-09'),
(9, 11, '2021-06-02', '2021-06-08'),
(10, 5, '2021-05-25', '2021-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES
('PN01', 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya'),
('PN02', 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung'),
('PN04', 'Penerbit 04', 'penerbit4@gmail.com', '08972017209', 'Jakarta Selatann'),
('PN05', 'Penerbit 05', 'penerbit5@gmail.com', '08972187209', 'Jakarta Selatan'),
('PN06', 'Penerbit 06', 'penerbit6@gmail.com', '08112187209', 'Jakarta Barat'),
('prat', 'prat', 'prat@gmail.com', '023993', 'fkasol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(8) NOT NULL,
  `nama_pengarang` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES
('', 'galih pratamaa', 'galih.0516@students.amikom.ac.id', '3412312', 'sfafaf'),
('121', 'pratama prat', 'pratama@gmail.com', '0829282992', 'jawa tengah'),
('123', 'PRATAMA GALIH PRAT', 'portgasarlando@gmail.com', '123131212', 'DDFAR'),
('2123', 'nurca', 'nurrca@gmail.com', '029421040', 'gandrung'),
('222411', 'vvvvv', 'vvvv@gmail.com', '0289738', 'awhjfkafasf'),
('aku gali', 'pratama galih lah ', 'gafakhfa@tgmail.com', '38471', 'fshkfdfs'),
('PG02', 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta'),
('PG03', 'Pengarang 03', 'pengarang3@perpus.co.id', '092921199', 'Banten'),
('PG05', 'Pengarang 05', 'pengarang5@perpus.co.id', '93938199', 'Cimahi'),
('PG06', 'Pengarang 06', 'pengarang6@perpus.co.id', '0818176111', 'Cimahi'),
('PG07', 'Pengarang 07', 'pengarang7@perpus.co.id', '08181762291', 'Semarang'),
('PG675bf9', 'pra', 'portgasarlando@gmail.com', '08877739393', 'jauh'),
('PG675c00', 'PRAT PRAT PRATAAMA', 'pratamAAa@gmail.com', '0280802', 'GANDUENG'),
('pratama', 'pratama galih ', 'pratama@gmail.com', '01820148', 'gandurng'),
('saiapa', 'Spaiaaai', 'gala@gmail.com', '0282972', 'asfsnasag'),
('SIAPA', 'SIAPA YAH ', 'SIAPA@GMAIL.COM', '08217217127', 'GADNDURNG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `penerbit` (`id_penerbit`),
  ADD KEY `pengarang` (`id_pengarang`),
  ADD KEY `katalog` (`id_katalog`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`,`isbn`),
  ADD KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `isbn` (`isbn`);

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `anggota` (`id_anggota`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `katalog` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`) ON DELETE CASCADE,
  ADD CONSTRAINT `penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengarang` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `id_pinjam` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
