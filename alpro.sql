-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 05:54 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` varchar(256) NOT NULL,
  `nama_lengkap` varchar(256) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `activated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_siswa`, `id_kelas`, `nis`, `nama_lengkap`, `jk`, `email`, `activated`) VALUES
(1, 10, '0022773344', 'Muhammad Yulyanto Herdika', 'Laki-laki', '', 1),
(2, 5, '0021273859', 'Damayanti', 'Perempuan', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `seri_buku` varchar(256) NOT NULL,
  `judul_buku` varchar(256) NOT NULL,
  `penulis` varchar(512) NOT NULL,
  `penerbit` varchar(512) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_rak`, `seri_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah`, `dipinjam`) VALUES
(1, 37, '0192374', 'Kata Siapa Mudah?', 'Anonim', 'CV. Dunia Karya', 2019, 9, 6),
(2, 38, '928374', 'Pembuktian Teori Darwin', 'Paman Coki', 'CV. Majelis Lucu Indonesia', 2018, 24, 16),
(3, 37, '0192873', 'Tak Ada Masalah Yang Besar', 'Pukiman', 'CV. Pukimart', 2017, 17, 13),
(4, 39, '592782', 'Tuhan Tak Pernah Mempersulit', 'KH. Amiin', 'CV. Lentera Islami', 2019, 34, 11),
(5, 46, '937420', 'Jika Belanda Tak Pernah Menjajah Indonesia', 'Prof. Dr. Van Couver', 'CV. Gramedia', 2018, 32, 8);

-- --------------------------------------------------------

--
-- Table structure for table `chart_book`
--

CREATE TABLE `chart_book` (
  `id_chart` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `peminjam` varchar(256) NOT NULL,
  `invoice` varchar(256) NOT NULL,
  `barcode_buku` varchar(256) NOT NULL,
  `judul_buku` varchar(256) NOT NULL,
  `penulis` varchar(256) NOT NULL,
  `penerbit` varchar(256) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_default` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `count_kunjungan`
--

CREATE TABLE `count_kunjungan` (
  `id_count` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count_kunjungan`
--

INSERT INTO `count_kunjungan` (`id_count`, `tanggal`, `jumlah`) VALUES
(1, '2021-06-23', 103),
(2, '2021-06-24', 97),
(3, '2021-06-25', 91),
(4, '2021-06-26', 94),
(5, '2021-06-27', 89),
(6, '2021-06-28', 96),
(7, '2021-06-29', 90),
(8, '2021-06-30', 59),
(9, '2021-07-01', 71),
(10, '2021-07-02', 63),
(11, '2021-07-03', 61),
(12, '2021-07-04', 62),
(13, '2021-07-05', 51);

-- --------------------------------------------------------

--
-- Table structure for table `count_transaksi`
--

CREATE TABLE `count_transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count_transaksi`
--

INSERT INTO `count_transaksi` (`id`, `tanggal`, `jumlah`) VALUES
(1, '2021-06-23', 55),
(2, '2021-06-24', 41),
(3, '2021-06-25', 43),
(4, '2021-06-26', 49),
(5, '2021-06-27', 55),
(6, '2021-06-28', 51),
(7, '2021-06-29', 43),
(8, '2021-06-30', 47),
(9, '2021-07-01', 55),
(10, '2021-07-02', 59),
(11, '2021-07-03', 53),
(12, '2021-07-04', 59),
(13, '2021-07-05', 37);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X MIPA 1'),
(2, 'X MIPA 2'),
(3, 'X MIPA 3'),
(4, 'X MIPA 4'),
(5, 'X MIPA 5'),
(6, 'X MIPA 6'),
(7, 'X MIPA 7'),
(8, 'X MIPA 8'),
(9, 'X IPS 1'),
(10, 'X IPS 2'),
(11, 'X IPS 3'),
(12, 'X IPS 4'),
(13, 'XI MIPA 1'),
(14, 'XI MIPA 2'),
(15, 'XI MIPA 3'),
(16, 'XI MIPA 4'),
(17, 'XI MIPA 5'),
(18, 'XI MIPA 6'),
(19, 'XI MIPA 7'),
(20, 'XI MIPA 8'),
(21, 'XI IPS 1'),
(22, 'XI IPS 2'),
(23, 'XI IPS 3'),
(24, 'XI IPS 4'),
(25, 'XII MIPA 1'),
(26, 'XII MIPA 2'),
(27, 'XII MIPA 3'),
(28, 'XII MIPA 4'),
(29, 'XII MIPA 5'),
(30, 'XII MIPA 6'),
(31, 'XII MIPA 7'),
(32, 'XII MIPA 8'),
(33, 'XII IPS 1'),
(34, 'XII IPS 2'),
(35, 'XII IPS 3'),
(36, 'XII IPS 4');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `seri_rak` varchar(512) NOT NULL,
  `nama_rak` varchar(512) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `seri_rak`, `nama_rak`, `kapasitas`) VALUES
(37, '000', 'Rak Buku 1 (Karya umum)', 873),
(38, '100', 'Rak Buku 2 (Filsafat)', 935),
(39, '200', 'Rak Buku 3 (Agama)', 965),
(40, '300 ', 'Rak Buku 4 (Ilmu-ilmu Sosial)', 1500),
(41, '400', 'Rak Buku 5 (Bahasa)', 1500),
(42, '500', 'Rak Buku 6 (Ilmu-ilmu Murni)', 1000),
(43, '600', 'Rak Buku 7 (Ilmu-ilmu Terapan)', 1000),
(44, '700', 'Rak Buku 8 (Kesenian dan Olahraga)', 1500),
(45, '800', 'Rak Buku 9 (Kesusateraan)', 1500),
(46, '900', 'Rak Buku 10 (Sejarah dan Geografi)', 1468);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `email` varchar(512) NOT NULL,
  `nama_lengkap` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `level` varchar(512) NOT NULL,
  `sejak` date NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `email`, `nama_lengkap`, `password`, `level`, `sejak`, `id_level`) VALUES
(1, 'yulyantoherdika@gmail.com', 'Administrator', '$2y$10$YpSnT/4UP7A.Ly5EtTEecupZ5oj2sSW188RnBal6VP83.24BdSCJa', 'Administrator', '2021-03-24', 0),
(2, '0022773344', 'Muhammad Yulyanto Herdika', '$2y$10$.emTHJykvpPNxG9YMoqd/uRLj6X2iaFIqgWbe2XGz5X4xPcbHgVKO', 'Anggota', '2021-06-27', 1),
(3, '0021273859', 'Damayanti', '$2y$10$xMqCj.XJjlYrVYWvAXDPmeTSCb7ObzTbUyO78O4wqu8Teja0UBcDC', 'Anggota', '2021-07-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `dikembalikan` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `id_buku`, `qty`, `no_transaksi`, `tanggal_pinjam`, `tanggal_kembali`, `dikembalikan`, `denda`, `status`) VALUES
(5, 1, 1, 1, 'PJM-2106300001', '2021-06-30', '2021-07-07', '0000-00-00', 0, 'Dipinjam'),
(6, 1, 2, 1, 'PJM-2106300002', '2021-06-30', '2021-07-07', '0000-00-00', 0, 'Dipinjam'),
(7, 1, 4, 1, 'PJM-2106300002', '2021-06-30', '2021-07-07', '0000-00-00', 0, 'Dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `chart_book`
--
ALTER TABLE `chart_book`
  ADD PRIMARY KEY (`id_chart`);

--
-- Indexes for table `count_kunjungan`
--
ALTER TABLE `count_kunjungan`
  ADD PRIMARY KEY (`id_count`);

--
-- Indexes for table `count_transaksi`
--
ALTER TABLE `count_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chart_book`
--
ALTER TABLE `chart_book`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `count_kunjungan`
--
ALTER TABLE `count_kunjungan`
  MODIFY `id_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `count_transaksi`
--
ALTER TABLE `count_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`);

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_siswa`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_siswa`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
