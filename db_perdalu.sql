-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2022 pada 14.48
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perdalu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_acc`
--

CREATE TABLE `admin_acc` (
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_acc`
--

INSERT INTO `admin_acc` (`nama_admin`, `username`, `password`) VALUES
('admin1', 'admin', 'admin1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg_kembali`
--

CREATE TABLE `brg_kembali` (
  `id` int(11) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `id_supp` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `sisa_brg` int(11) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brg_kembali`
--

INSERT INTO `brg_kembali` (`id`, `kode_brg`, `id_supp`, `nama_supp`, `sisa_brg`, `tgl_kembali`) VALUES
(1, 'kb0015', 'sp0142', 'wakidi', 100, '2022-05-20\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id` int(11) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `id_supp` varchar(255) NOT NULL,
  `tgl_masuk` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brg_masuk`
--

INSERT INTO `brg_masuk` (`id`, `kode_brg`, `id_supp`, `tgl_masuk`, `nama_supp`, `nama_brg`, `jumlah`, `hrg_satuan`, `total`) VALUES
(1, 'kb0015', 'sp0142', '5-10-2022', 'wakidi', 'baju polo', 500, 15000, 1000000),
(2, 'kb0055', 'sp0001', '05-08-2022', 'mukidi', 'celana pendek', 500, 10000, 1500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_acc`
--

CREATE TABLE `kasir_acc` (
  `nama_kasir` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir_acc`
--

INSERT INTO `kasir_acc` (`nama_kasir`, `username`, `password`) VALUES
('kasir1', 'kasir', 'kasir1'),
('kasir2', 'kasirr', 'kasir2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_nota` int(11) NOT NULL,
  `no_nota` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `tgl_penjualan` varchar(255) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_nota`, `no_nota`, `username`, `nama_kasir`, `tgl_penjualan`, `kode_brg`, `nama_brg`, `jumlah`, `hrg_jual`, `hrg`, `total`) VALUES
(73, 496155, 'kasir', 'kasir1', '2022-05-17', 'kb0055', 'celana pendek', 4, 15000, 60000, 60000),
(74, 722470, 'kasir', 'kasir1', '2022-05-17', 'kb0015', 'baju polo', 4, 20000, 80000, 80000),
(75, 384795, 'kasir', 'kasir1', '2022-05-17', 'kb0083', 'jeans', 1, 35000, 35000, 35000),
(76, 532732, 'kasir', 'kasir1', '2022-05-17', 'kb0071', 'sweater', 1, 25000, 25000, 25000),
(77, 742015, 'kasir', 'kasir1', '2022-05-17', 'kb0057', 'kaos', 1, 20000, 20000, 20000),
(78, 604339, 'kasir', 'kasir1', '2022-05-17', 'kb0055', 'celana pendek', 1, 15000, 15000, 55000),
(79, 604339, 'kasir', 'kasir1', '2022-05-17', 'kb0015', 'baju polo', 2, 20000, 40000, 55000),
(80, 350827, 'kasir', 'kasir1', '2022-05-17', 'kb0055', 'celana pendek', 4, 15000, 60000, 60000),
(81, 832694, 'kasir', 'kasir1', '2022-05-17', 'kb0055', 'celana pendek', 4, 15000, 60000, 205000),
(82, 832694, 'kasir', 'kasir1', '2022-05-17', 'kb0071', 'sweater', 5, 25000, 125000, 205000),
(83, 832694, 'kasir', 'kasir1', '2022-05-17', 'kb0015', 'baju polo', 1, 20000, 20000, 205000),
(84, 457530, 'kasir', 'kasir1', '2022-05-17', 'kb0055', 'celana pendek', 5, 15000, 75000, 255000),
(85, 457530, 'kasir', 'kasir1', '2022-05-17', 'kb0015', 'baju polo', 1, 20000, 20000, 255000),
(86, 457530, 'kasir', 'kasir1', '2022-05-17', 'kb0083', 'jeans', 1, 35000, 35000, 255000),
(87, 457530, 'kasir', 'kasir1', '2022-05-17', 'kb0071', 'sweater', 5, 25000, 125000, 255000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_brg`
--

CREATE TABLE `stok_brg` (
  `kode_brg` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_brg`
--

INSERT INTO `stok_brg` (`kode_brg`, `nama_supp`, `nama_brg`, `jumlah`, `hrg_beli`, `hrg_jual`) VALUES
('kb0015', 'wakidi', 'baju polo', 99909, 15000, 20000),
('kb0055', 'mukidi', 'celana pendek', 99874, 10000, 15000),
('kb0057', 'odin', 'kaos', 9992, 15000, 20000),
('kb0071', 'pudidi', 'sweater', 9978, 20000, 25000),
('kb0083', 'yudi', 'jeans', 9992, 30000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `id_supp` varchar(255) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `id_supp`, `nama_supp`, `no_hp`, `alamat`) VALUES
(1, 'sp0001', 'mukidi', 81273154683, 'janti'),
(2, 'sp0041', 'odin', 81345324562, 'janti\r\n'),
(3, 'sp0051', 'pudidi', 81532645424, 'delanggu\r\n'),
(4, 'sp0067', 'yudi', 85463642472, 'tulung\r\n'),
(5, 'sp0142', 'wakidi', 81351463153, 'cabeyan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `brg_kembali`
--
ALTER TABLE `brg_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasir_acc`
--
ALTER TABLE `kasir_acc`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_kasir` (`username`);

--
-- Indeks untuk tabel `stok_brg`
--
ALTER TABLE `stok_brg`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brg_kembali`
--
ALTER TABLE `brg_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
