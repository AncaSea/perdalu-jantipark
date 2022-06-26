-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2022 pada 14.47
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
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_acc`
--

INSERT INTO `admin_acc` (`nama_admin`, `username`, `password`, `role`) VALUES
('admin1', 'admin', 'admin1', 'admin'),
('Danang', 'D1', 'danang', 'boss');

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
(1, 'kb0015', 'sp0142', 'wakidi', 100, '2022-05-20\r\n'),
(2, 'kb0055', 'sp0001', 'mukidi', 10, '2022-05-26');

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
  `hrg_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brg_masuk`
--

INSERT INTO `brg_masuk` (`id`, `kode_brg`, `id_supp`, `tgl_masuk`, `nama_supp`, `nama_brg`, `jumlah`, `hrg_satuan`, `hrg_jual`, `total`) VALUES
(19, 'kb0055', 'sp0001', '2022-05-26', 'mukidi', 'celana pendek', 10, 10000, 0, 100000),
(26, 'sp4554', 'sp177', '2022-06-04', 'reka', 'arem2', 10, 2000, 0, 20000),
(27, 'sp9339', 'sp0005', '2022-06-04', 'andika', 'peyek', 10, 2000, 0, 20000),
(28, 'sp9339', 'sp0005', '2022-06-04', 'andika', 'peyek', 10, 2000, 0, 20000),
(29, 'sp6664', 'sp0005', '2022-06-04', 'andika', 'peyek', 20, 5000, 0, 100000),
(30, 'sp6191', 'sp0005', '2022-06-04', 'andika', 'peyek', 20, 5000, 0, 100000),
(31, 'kb0055', 'sp0001', '2022-06-04', 'mukidi', 'celana pendek', 50, 10000, 0, 500000),
(32, 'sp7521', 'sp0005', '2022-06-04', 'andika', 'peyek', 20, 5000, 0, 100000),
(34, 'sp8167', 'sp0001', '2022-06-04', 'mukidi', 'peyek', 10, 5000, 0, 50000),
(35, 'sp3845', 'sp0005', '2022-06-04', 'andika', 'peyek', 10, 5000, 0, 50000),
(37, 'sp9316', 'sp0005', '2022-06-04', 'andika', 'peyek', 10, 5000, 0, 50000),
(42, 'sp9316', 'sp0005', '2022-06-04', 'andika', 'peyek', 10, 6000, 0, 60000),
(44, 'sp3482', 'sp0009', '2022-06-12', 'reka', 'getuk', 1, 1000, 0, 1000),
(47, 'sp7761', 'sp0009', '2022-06-12', 'reka', 'arem arem1', 5, 1000, 0, 5000),
(53, 'sp2854', 'sp0005', '2022-06-12', 'andika', 'arem arem', 1, 5000, 0, 5000),
(54, 'sp2854', 'sp0005', '2022-06-12', 'andika', 'arem arem', 1, 6000, 0, 6000),
(55, 'sp2854', 'sp0005', '2022-06-12', 'andika', 'arem arem', 5, 6000, 0, 30000),
(56, 'sp2854', 'sp0005', '2022-06-12', 'andika', 'arem arem', 1, 6000, 7000, 6000),
(57, 'sp2854', 'sp0005', '2022-06-12', 'andika', 'arem arem', 1, 7000, 8000, 7000),
(58, 'kb0015', 'sp0142', '2022-06-13', 'wakidi', 'baju polo', 1, 20000, 25000, 20000),
(59, 'sp9316', 'sp0005', '2022-06-20', 'andika', 'peyek', 1, 5000, 10000, 5000),
(60, 'sp9316', 'sp0005', '2022-06-20', 'andika', 'peyek', 1, 5000, 6000, 5000),
(61, 'sp9316', 'sp0005', '2022-06-20', 'andika', 'peyek', 1, 6000, 7000, 6000),
(62, 'kb0015', 'sp0005', '2022-06-20', 'andika', 'baju polo', 1, 10000, 21000, 10000),
(63, 'sp3482', 'sp0005', '2022-06-20', 'andika', 'getuk', 1, 2000, 4000, 2000),
(64, 'sp3482', 'sp0005', '2022-06-20', 'andika', 'getuk', 1, 1000, 2000, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_acc`
--

CREATE TABLE `kasir_acc` (
  `nama_kasir` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir_acc`
--

INSERT INTO `kasir_acc` (`nama_kasir`, `username`, `password`, `role`) VALUES
('kasir1', 'kasir', 'kasir1', 'kasir luar'),
('kasir2', 'kasir2', 'kasir22', 'kasir dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `role`, `jenis`, `harga`) VALUES
(1, 'lele goreng', 1, 'lele', 6000),
(3, 'kakap goreng', 2, 'kakap', 5000),
(7, 'lele bakar', 1, 'lele', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id`, `nama`, `role`, `jenis`, `harga`) VALUES
(2, 'teh anget', 6, 'teh', 2500),
(4, 'es teh', 6, 'teh', 5000),
(5, 'lemon tea', 6, 'teh', 5000),
(6, 'tea jus', 6, 'teh', 2000),
(9, 'teh tawar', 6, 'teh', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `makanan` text NOT NULL,
  `minuman` text NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `makanan`, `minuman`, `Harga`) VALUES
(1, 'Paket 1', '[{\'Kakap Bakar\':1,\'Kakap Goreng\':2}]', '', 39900);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_barbar`
--

CREATE TABLE `paket_barbar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_barbar`
--

INSERT INTO `paket_barbar` (`id`, `nama`, `role`, `jenis`, `jumlah`, `harga`) VALUES
(1, 'paket lele goreng', 4, 'lele', 6, 20000),
(2, 'paket kakap goreng', 5, 'kakap', 4, 25000),
(3, 'paket lele bakar', 4, 'lele', 6, 22000),
(4, 'paket kakap bakar', 5, 'kakap', 4, 27000),
(7, 'paket ayam goreng', 50, 'ayam', 1, 15000);

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
(87, 457530, 'kasir', 'kasir1', '2022-05-17', 'kb0071', 'sweater', 5, 25000, 125000, 255000),
(88, 167436, 'kasir', 'kasir1', '2022-05-23', 'kb0055', 'celana pendek', 1, 15000, 15000, 35000),
(89, 167436, 'kasir', 'kasir1', '2022-05-23', 'kb0015', 'baju polo', 1, 20000, 20000, 35000),
(100, 560801, 'admin', 'admin1', '2022-06-20', 'kb0055', 'celana pendek', 1, 15000, 15000, 40000),
(101, 885626, 'admin', 'admin1', '2022-06-20', 'kb0015', 'baju polo', 1, 25000, 25000, 40000),
(102, 885626, 'admin', 'admin1', '2022-06-20', 'kb0055', 'celana pendek', 1, 15000, 15000, 40000),
(103, 377053, '', '', '2022-06-23', 'kb0015', 'baju polo', 1, 21000, 21000, 21000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_dalam`
--

CREATE TABLE `penjualan_dalam` (
  `id_nota` int(11) NOT NULL,
  `no_nota` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `tgl_penjualan` varchar(255) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_dalam`
--

INSERT INTO `penjualan_dalam` (`id_nota`, `no_nota`, `username`, `nama_kasir`, `tgl_penjualan`, `nama_pesanan`, `role`, `jenis`, `jumlah`, `total_pesan`, `hrg_jual`, `hrg`, `total`) VALUES
(1, 351341, 'admin', 'admin1', '2022-06-13', 'lele bakar', 1, 'lele', 1, 1, 6000, 6000, 6000),
(2, 478426, 'admin', 'admin1', '2022-06-14', 'lele goreng', 1, 'lele', 5, 5, 5000, 30000, 30000),
(3, 781931, 'admin', 'admin1', '2022-06-14', 'paket lele goreng', 4, 'lele', 2, 12, 20000, 40000, 40000),
(4, 592931, 'admin', 'admin1', '2022-06-14', 'kakap goreng', 2, 'kakap', 4, 4, 5000, 20000, 20000),
(5, 748253, 'admin', 'admin1', '2022-06-14', 'lele goreng', 1, 'lele', 6, 6, 5000, 30000, 30000),
(6, 849102, 'admin', 'admin1', '2022-06-14', 'paket lele bakar', 4, 'lele', 2, 12, 22000, 44000, 44000),
(59, 996792, 'admin', 'admin1', '2022-06-17', 'lele bakar', 1, 'lele', 1, 1, 6000, 6000, 9000),
(60, 996792, 'admin', 'admin1', '2022-06-17', 'es teh', 6, 'teh', 1, 1, 3000, 3000, 9000),
(61, 651993, 'admin', 'admin1', '2022-06-17', 'paket lele goreng', 4, 'lele', 1, 6, 20000, 20000, 26000),
(62, 651993, 'admin', 'admin1', '2022-06-17', 'lele bakar', 1, 'lele', 1, 1, 6000, 6000, 26000),
(63, 512226, 'admin', 'admin1', '2022-06-17', 'paket lele goreng', 4, 'lele', 2, 12, 20000, 40000, 115000),
(64, 512226, 'admin', 'admin1', '2022-06-17', 'paket kakap goreng', 5, 'kakap', 3, 12, 25000, 75000, 115000),
(65, 187809, 'admin', 'admin1', '2022-06-18', 'teh anget', 6, 'teh', 1, 1, 2500, 2500, 2500),
(67, 748776, 'admin', 'admin1', '2022-06-23', 'paket kakap kukus', 5, 'kakap', 1, 2, 10000, 10000, 10000),
(68, 921796, 'kasir2', 'kasir2', '2022-06-23', 'paket kakap goreng', 5, 'kakap', 1, 4, 25000, 25000, 25000),
(69, 380461, 'kasir2', 'kasir2', '2022-06-23', 'paket kakap bakar', 5, 'kakap', 1, 4, 27000, 27000, 27000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama`, `jenis`) VALUES
(1, 'lele', 'lele'),
(2, 'kakap', 'kakap'),
(3, 'ayam', 'ayam'),
(4, 'paket lele', 'lele'),
(5, 'paket kakap', 'kakap'),
(6, 'teh', 'teh'),
(50, 'paket ayam', 'ayam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_akun`
--

CREATE TABLE `role_akun` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_akun`
--

INSERT INTO `role_akun` (`id_role`, `role`) VALUES
(1, 'boss'),
(2, 'admin'),
(3, 'kasir luar'),
(4, 'kasir dalam');

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
('kb0015', 'wakidi', 'baju polo', 9978, 10000, 21000),
('kb0055', 'mukidi', 'celana pendek', 10032, 10000, 15000),
('kb0057', 'odin', 'kaos', 9992, 15000, 20000),
('kb0071', 'pudidi', 'sweater', 9977, 20000, 25000),
('kb0083', 'yudi', 'jeans', 9992, 30000, 35000),
('sp2854', 'andika', 'arem arem', 50, 7000, 8000),
('sp3482', 'reka', 'getuk', 2, 2000, 4000),
('sp7761', 'reka', 'arem arem1', 5, 1000, 2000),
('sp9316', 'andika', 'peyek', 23, 6000, 7000);

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
(2, 'sp0041', 'odin', 81345324562, 'janti'),
(3, 'sp0051', 'pudidi', 81532645424, 'delanggu\r\n'),
(4, 'sp0067', 'yudi', 85463642472, 'tulung\r\n'),
(5, 'sp0142', 'wakidi', 81351463153, 'cabeyan'),
(7, 'sp0009', 'reka', 746775735852, 'delanggu'),
(9, 'sp0005', 'andika', 36454677, 'kts');

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
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_barbar`
--
ALTER TABLE `paket_barbar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_kasir` (`username`);

--
-- Indeks untuk tabel `penjualan_dalam`
--
ALTER TABLE `penjualan_dalam`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `role_akun`
--
ALTER TABLE `role_akun`
  ADD PRIMARY KEY (`id_role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paket_barbar`
--
ALTER TABLE `paket_barbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `penjualan_dalam`
--
ALTER TABLE `penjualan_dalam`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `role_akun`
--
ALTER TABLE `role_akun`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
