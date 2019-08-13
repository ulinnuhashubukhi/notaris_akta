-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 08:19 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notaris_akta`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_menu`
--

CREATE TABLE `adm_menu` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `menu` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_menu`
--

INSERT INTO `adm_menu` (`id`, `judul`, `type`, `parent`, `icon`, `menu`) VALUES
(1, 'Akta', 'single', 0, 'fa-location-arrow', 'akta'),
(2, 'Verifikasi Akta', 'single', 0, 'fa-check-circle-o', 'verifikasi_akta'),
(3, 'Mencetak Akta', 'single', 0, 'fa-print', 'mencetak_akta'),
(4, 'Laporan Akta', 'single', 0, 'fa-check-circle-o', 'laporan'),
(5, 'Data Client', 'single', 0, 'fa-briefcase', 'data_client'),
(6, 'Pengaturan User', 'single', 0, 'fa-user ', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_menu`, `keterangan`) VALUES
(1, '1', 'staff'),
(2, '3', 'staff'),
(3, '5', 'staff'),
(4, '6', 'staff'),
(5, '2', 'notaris'),
(6, '3', 'notaris'),
(7, '5', ''),
(8, '6', 'notaris');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akta`
--

CREATE TABLE `tabel_akta` (
  `id_akta` int(11) NOT NULL,
  `tgl_surat_kuasa` date DEFAULT NULL,
  `tgl_surat_pernyataan` date DEFAULT NULL,
  `tgl_perjanjian_pembiayaan` date DEFAULT NULL,
  `nomor_perjanjian` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `author` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tabel_akta`
--

INSERT INTO `tabel_akta` (`id_akta`, `tgl_surat_kuasa`, `tgl_surat_pernyataan`, `tgl_perjanjian_pembiayaan`, `nomor_perjanjian`, `created`, `author`, `updated`, `updater`) VALUES
(1, '2017-06-02', '2017-06-02', '2017-06-02', '13131245', '2017-06-02 00:53:48', 'syarif', '0000-00-00 00:00:00', ''),
(2, '2017-06-03', '2017-06-03', '2017-06-03', '13134134', '2017-06-03 14:34:27', 'syarif', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_client`
--

CREATE TABLE `tabel_client` (
  `id_client` int(11) NOT NULL,
  `nama_client` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(25) NOT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_client`
--

INSERT INTO `tabel_client` (`id_client`, `nama_client`, `created`, `author`, `updated`, `updater`, `status`) VALUES
(3, 'Mitsui Central Park', '2017-05-19 19:52:54', 'syarif', '0000-00-00 00:00:00', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kuasa`
--

CREATE TABLE `tabel_kuasa` (
  `id_kuasa` int(11) NOT NULL,
  `title` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `gelar` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `no_ktp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `berkependudukan` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `bertempat_tinggal` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `rt` int(3) DEFAULT NULL,
  `rw` int(3) DEFAULT NULL,
  `kelurahan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `author` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tabel_kuasa`
--

INSERT INTO `tabel_kuasa` (`id_kuasa`, `title`, `gelar`, `no_ktp`, `nama`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `berkependudukan`, `bertempat_tinggal`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `created`, `author`, `updated`, `updater`) VALUES
(1, 'Tuan', 'S.Si', '1234545244', 'ULIN NUHA', 'Tulung Agung', '1994-04-30', 'Karyawan Swasta', 'Daerah Khusus Ibukota Jakarta', 'Jalan Masjid Baabul Minan', 7, 8, 'Joglo', 'Kembangan ', 'Jakarta Barat', '2017-06-02', 'syarif', '0000-00-00 00:00:00', ''),
(2, 'Tuan', '', '543454346', 'ERTARRERE', 'DGFDGFD', '2017-06-03', 'SDFSD', 'DADGD', 'DGADGD', 7, 8, 'Joglo', 'Kembangan ', 'Jakarta Barat', '2017-06-03', 'syarif', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_objek`
--

CREATE TABLE `tabel_objek` (
  `id_objek` int(11) NOT NULL,
  `hutang_pokok` int(11) DEFAULT NULL,
  `nilai_pinjaman` int(11) NOT NULL,
  `merk_type` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tahun` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `warna` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `nomor_rangka` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nomor_mesin` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_surat_perjanjian_bersama` date DEFAULT NULL,
  `nilai_objek` int(11) DEFAULT NULL,
  `nomor_bpkb` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `author` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tabel_objek`
--

INSERT INTO `tabel_objek` (`id_objek`, `hutang_pokok`, `nilai_pinjaman`, `merk_type`, `tahun`, `warna`, `nomor_rangka`, `nomor_mesin`, `tgl_surat_perjanjian_bersama`, `nilai_objek`, `nomor_bpkb`, `created`, `author`, `updated`, `updater`) VALUES
(1, 125000000, 150000000, 'Toyota Avanza G At Minibus', '2017', 'Silver Metalik', 'MHFGHBGDFGDFGDF', 'RTTRTGHGF', '2017-06-02', 150000000, 'L-3454254', '2017-06-02', 'syarif', '0000-00-00 00:00:00', ''),
(2, 350000000, 3200000, 'Toyota avanza', '2017', 'Biru', 'mgdfdfhf', 'gadfgdf', '2017-06-03', 3200000, 'L-3454254', '2017-06-03', 'syarif', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pasangan`
--

CREATE TABLE `tabel_pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `title` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `gelar` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `no_ktp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `berkependudukan` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `bertempat_tinggal` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `rt` int(3) DEFAULT NULL,
  `rw` int(3) DEFAULT NULL,
  `kelurahan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `author` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trs_akta`
--

CREATE TABLE `trs_akta` (
  `id_transaksi` int(11) NOT NULL,
  `no_akta` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_akta` datetime DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_akta` int(11) DEFAULT NULL,
  `id_objek` int(11) NOT NULL,
  `id_kuasa` int(11) DEFAULT NULL,
  `id_pasangan` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `author` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `updater` varchar(25) CHARACTER SET latin1 NOT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `trs_akta`
--

INSERT INTO `trs_akta` (`id_transaksi`, `no_akta`, `tgl_akta`, `id_client`, `id_akta`, `id_objek`, `id_kuasa`, `id_pasangan`, `created`, `author`, `updated`, `updater`, `tgl_verifikasi`, `status`) VALUES
(1, '02062017001', '2017-06-02 00:53:48', 3, 1, 1, 1, 0, '2017-06-02 00:53:48', 'syarif', '0000-00-00 00:00:00', '', '2017-06-02 00:54:33', 2),
(2, '03062017002', '2017-06-03 14:34:27', 3, 2, 2, 2, 0, '2017-06-03 14:34:27', 'syarif', '0000-00-00 00:00:00', '', '2017-06-03 14:36:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `tipe` text COLLATE latin1_general_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `tipe`, `last_login`, `created`) VALUES
(1, 'ulin', 'Ulin', 'e10adc3949ba59abbe56e057f20f883e', 'notaris', '2017-06-08 21:05:48', NULL),
(10, 'syarif', 'syarif', 'e10adc3949ba59abbe56e057f20f883e', 'staff', '2017-06-11 21:34:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_menu`
--
ALTER TABLE `adm_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_akta`
--
ALTER TABLE `tabel_akta`
  ADD PRIMARY KEY (`id_akta`);

--
-- Indexes for table `tabel_client`
--
ALTER TABLE `tabel_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tabel_kuasa`
--
ALTER TABLE `tabel_kuasa`
  ADD PRIMARY KEY (`id_kuasa`);

--
-- Indexes for table `tabel_objek`
--
ALTER TABLE `tabel_objek`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indexes for table `tabel_pasangan`
--
ALTER TABLE `tabel_pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indexes for table `trs_akta`
--
ALTER TABLE `trs_akta`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_menu`
--
ALTER TABLE `adm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tabel_akta`
--
ALTER TABLE `tabel_akta`
  MODIFY `id_akta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tabel_client`
--
ALTER TABLE `tabel_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_kuasa`
--
ALTER TABLE `tabel_kuasa`
  MODIFY `id_kuasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tabel_objek`
--
ALTER TABLE `tabel_objek`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tabel_pasangan`
--
ALTER TABLE `tabel_pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trs_akta`
--
ALTER TABLE `trs_akta`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
