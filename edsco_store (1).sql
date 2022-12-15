-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221030.948a75724d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2022 pada 08.59
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edsco_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(0, 10, 'tas samping', 'Screenshot_20221201_1015452.png', '2022-12-07 17:00:37'),
(0, 10, 'tas belakang', 'Screenshot_20221201_10160911.png', '2022-12-11 07:00:55'),
(0, 22, 'Fullbody', 'ssss.jpg', '2022-12-13 15:13:59'),
(0, 5, 'macam dompet', '3.jpg', '2022-12-14 02:57:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(2555) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telpon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 1, 'Ijal Herdiana', 'herdianaijal@gmail.com', '085127754421', 'Pagerageung, Tasikmalaya, Jawa Barat', '13122022AJ97LQSM', '2022-12-13 00:00:00', 210000, 'konfirmasi', 210000, '4459888212', 'Ijal Herdiana', 'Screenshot_20221203_063207.png', 2, '13-12-2022', 'BANKSYARIAH INDONESIA', '2022-12-13 02:54:51', '2022-12-13 01:56:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero`
--

CREATE TABLE `hero` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hero`
--

INSERT INTO `hero` (`id_hero`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'PRODUK ORIGINAL', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime,</p>\r\n\r\n<p><strong>tenetur eaque aspernatur</strong> earum minima provident reprehenderit sequi ullam tempore porro similique quia sit odio ea.</p>\r\n\r\n<p>Nobis consequatur quaerat i', 'hero2.png'),
(2, 'ASLI INDONESIA', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime, tenetur eaque aspernatur earum minima</p>\r\n\r\n<p>provident reprehenderit sequi ullam tempore porro similique quia sit odio ea.</p>\r\n\r\n<p>Nobis consequatur quaerat illum?</p>\r\n', 'hero13.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'pria-dan-wanita', 'Pria dan Wanita', 1, '2022-12-08 01:25:31'),
(2, 'pakaian-wanita', 'Pakaian Wanita', 2, '2022-12-08 01:25:15'),
(3, 'pakaian-pria', 'Pakaian Pria', 3, '2022-12-08 01:25:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Edsco Store', 'Fashion Masa KIni', 'herdianaijal@gmail.com', 'http://edsco-store.com', 'kulit asli', '                        ok', '085223979487', '                        Pagerageung, Tasikmalaya, Jawa Barat', 'https://www.facebook.com/ijay.harentang', 'https://www.instagram.com/ijal_herdiana/', 'Fashion Kulit Masa KIni', 'eds.png', 'favicon2.png', '                        ok', '2022-12-08 02:23:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telpon` varchar(32) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telpon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'Ijal Herdiana', 'herdianaijal@gmail.com', '43808e7ef045e98e155363248afb5026a740a999', '085127754421', 'Pagerageung, Tasikmalaya, Jawa Barat', '2022-12-12 05:58:00', '2022-12-12 12:24:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 3, 1, 'DKP01', 'Dompet Kulit Panjang', 'dompet-kulit-panjang-dkp01', '<p>Terbuat dari 100% Kulit Asli</p>\r\n', '            Dompet Kulit', 30000, 100, '11.jpg', 100, '9X20', 'Publish', '2022-12-06 02:46:45', '2022-12-08 16:55:18'),
(4, 3, 1, 'TS01', 'Tas Selempang', 'tas-selempang-ts01', '<p>Terbuat dari 100% Kulit Asli</p>\r\n', '            Tas Selempang', 75000, 20, '61.jpg', 120, '20x10', 'Publish', '2022-12-07 05:54:20', '2022-12-08 16:55:08'),
(5, 3, 3, 'DP01', 'Dompet Kulit', 'dompet-kulit-dp01', '<p>Terbuat dari 100% Kulit Asli</p>\r\n', 'Dompet Kulit', 30000, 300, 'ec4f6532c78684eae15177b0486d15ec_tn.jpeg', 100, '10x10', 'Publish', '2022-12-07 05:56:09', '2022-12-08 01:34:41'),
(7, 3, 2, 'SP02', 'Sepatu kulit High hels', 'sepatu-kulit-high-hels-sp02', '<p>Terbuat dari 100% Kulit Asli</p>\r\n', '            sepatu kulit wanita', 150000, 30, 'hHDmYRjWe81.jpg', 300, '28', 'Publish', '2022-12-07 06:11:41', '2022-12-08 16:52:31'),
(8, 3, 3, 'SP01', 'Sepatu Pentopel ', 'sepatu-pentopel-sp01', '<p>sepatu kulit Asli</p>\r\n', '            sepatu kulit', 150000, 100, 'PIM-1562347870563-b32abe00-766b-4b3b-9e8c-d786cf6e14c4_v1-small1.jpg', 500, '28', 'Publish', '2022-12-07 06:13:55', '2022-12-08 16:54:55'),
(10, 3, 1, 'TLK01', 'Tas Laptop Kulit', 'tas-laptop-kulit-tlk01', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, unde quaerat. Necessitatibus libero</p>\r\n\r\n<p>veritatis fugiat aspernatur vero. Unde reprehenderit nisi cumque doloribus, deleniti, perferendis ipsa</p>\r\n\r\n<p>in ut id quaerat libero.</p>\r\n', '                        tas', 150000, 300, 'Screenshot_20221201_101636.png', 500, '40 x 60', 'Publish', '2022-12-07 06:30:28', '2022-12-11 07:15:33'),
(12, 3, 3, 'JKF01', 'Jaket Kulit Fashion Bikers', 'jaket-kulit-fashion-bikers-jkf01', '<p>Jaket Kulit Fashion Bikers&nbsp;</p>\r\n', '            Jaket Kulit Fashion Bikers', 300000, 80, '1828eb46a6e667c88aa50eae5edf4b19f3d2d2be_0.jpg', 800, 'M', 'Publish', '2022-12-08 02:21:41', '2022-12-08 01:25:50'),
(13, 3, 3, 'JKR01', 'Jaket Kulit Ramones', 'jaket-kulit-ramones-jkr01', '<p>Terbuat Dari 100% Kulit Asli</p>\r\n', '            Jaket Kulit', 150000, 30, 'WhatsApp_Image_2022-12-08_at_08_08_301.jpg', 500, 'M', 'Publish', '2022-12-08 02:40:57', '2022-12-08 16:52:17'),
(22, 3, 3, 'JS01', 'Jersey Singlet', 'jersey-singlet-js01', '<p>123213</p>\r\n', 'wqewqewe', 30000, 10, 'AAA.jpg', 1234, '10x10', 'Publish', '2022-12-11 08:00:18', '2022-12-11 07:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BRI CABANG TASIKMALAYA', '4459010199999', 'IJAL', '', '2022-12-12 14:11:22'),
(2, 'BANKSYARIAH INDONESIA', '111122223333', 'WINI', '', '2022-12-12 14:11:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 1, '13122022AJ97LQSM', 22, 30000, 2, 60000, '2022-12-13 00:00:00', '2022-12-13 01:54:51'),
(2, 0, 1, '13122022AJ97LQSM', 13, 150000, 1, 150000, '2022-12-13 00:00:00', '2022-12-13 01:54:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(3, 'ijal herdiana', 'herdianaijal@gmail.com', 'ijalher', '331f3c153c64be26e026397e185177e7cb91f647', 'Admin', '2022-12-03 09:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`) USING HASH;

--
-- Indeks untuk tabel `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hero`
--
ALTER TABLE `hero`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
