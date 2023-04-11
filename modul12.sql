-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 22.36
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` int(10) UNSIGNED NOT NULL,
  `jenis_kamar` varchar(20) DEFAULT NULL,
  `jumlah_kamar` int(10) UNSIGNED DEFAULT NULL,
  `harga_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `jenis_kamar`, `jumlah_kamar`, `harga_kamar`) VALUES
(1, 'Standart Room', 80, 1000000),
(2, 'Deluxe Room', 20, 750000),
(3, 'Suite Room', 50, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpgw` int(10) UNSIGNED NOT NULL,
  `namapgw` varchar(20) DEFAULT NULL,
  `alamatpgw` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpgw`, `namapgw`, `alamatpgw`, `username`, `password`) VALUES
(10001, 'Aulia Putri', 'Solo', 'aulia', '156');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `no_telp` int(11) NOT NULL,
  `masuk` varchar(20) NOT NULL,
  `keluar` date NOT NULL,
  `note` varchar(100) NOT NULL,
  `idkamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `nama`, `alamat`, `no_telp`, `masuk`, `keluar`, `note`, `idkamar`) VALUES
('HDL004', 'Indri Hapsari', 'Riau', 2147483647, '2021-01-07', '2021-01-15', 'mau handuk lebih', 1),
('HDL006', 'Demo berhasil', 'Surakarta', 8888888, '2021-01-06', '2021-01-07', 'minta handuk lebih', 1),
('HDL008', 'Aulia Rachmadani', 'Surakarta', 131312, '2021-01-07', '2021-01-08', 'Minta selimut lebih', 1),
('HDL009', 'Sari Dewi', 'Surakarta', 8888888, '2021-01-08', '2021-01-10', 'tambah handuk', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(10) NOT NULL,
  `idtamu` varchar(11) DEFAULT NULL,
  `idpgw` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` varchar(20) DEFAULT NULL,
  `total_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idtamu`, `idpgw`, `tgl_transaksi`, `total_bayar`) VALUES
('TRA001', 'HDL001', 10001, '2021-01-05', 'Rp. 4000000'),
('TRA002', 'HDL002', 10001, '2021-01-05', 'Rp. 2000000'),
('TRA003', 'HDL003', 10001, '2021-01-05', 'Rp. 6000000'),
('TRA004', 'HDL004', 10001, '2021-01-05', 'Rp. 6750000'),
('TRA005', 'HDL005', 10001, '2021-01-05', 'Rp. 2000000'),
('TRA006', 'HDL001', 10001, '2021-01-05', 'Rp. 4000000'),
('TRA007', 'HDL006', 10001, '2021-01-05', 'Rp. 3000000'),
('TRA008', 'HDL005', 10001, '2021-01-05', 'Rp. 7000000'),
('TRA009', 'HDL006', 10001, '2021-01-05', 'Rp. 1500000'),
('TRA010', 'HDL006', 10001, '2021-01-05', 'Rp. 2000000'),
('TRA011', 'HDL007', 10001, '2021-01-05', 'Rp. 2000000'),
('TRA012', 'HDL007', 10001, '2021-01-05', 'Rp. 2250000'),
('TRA013', 'HDL008', 10001, '2021-01-05', 'Rp. 1000000'),
('TRA014', 'HDL001', 10001, '2021-01-05', 'Rp. 2250000'),
('TRA015', 'HDL009', 10001, '2021-01-05', 'Rp. 1500000'),
('TRA016', 'HDL004', 10001, '2021-01-05', 'Rp. 9000000'),
('TRA017', 'HDL010', 10001, '2021-01-05', 'Rp. 1500000'),
('TRA018', 'HDL011', 10001, '2021-01-05', 'Rp. 3000000'),
('TRA019', 'HDL011', 10001, '2021-01-05', 'Rp. 4000000'),
('TRA020', 'HDL010', 10001, '2021-01-05', 'Rp. 2250000'),
('TRA021', 'HDL008', 10001, '2021-01-05', 'Rp. 2000000'),
('TRA022', 'HDL009', 10001, '2021-01-05', 'Rp. 6000000'),
('TRA023', 'HDL009', 10001, '2021-01-05', 'Rp. 2250000'),
('TRA024', 'HDL009', 10001, '2021-01-05', 'Rp. 3000000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpgw`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`),
  ADD KEY `kamar` (`idkamar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `transaksi_FKIndex1` (`idpgw`),
  ADD KEY `transaksi_FKIndex2` (`idtamu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idkamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpgw` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
