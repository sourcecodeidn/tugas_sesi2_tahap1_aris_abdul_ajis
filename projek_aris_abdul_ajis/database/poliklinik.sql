-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 12:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rp-inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `alamat_dokter` varchar(255) DEFAULT NULL,
  `telp_dokter` varchar(255) DEFAULT NULL,
  `bidang_keahlian` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat_dokter`, `telp_dokter`, `bidang_keahlian`, `aktif`, `created_at`) VALUES
(5, 'Dr. Aris Abdul Ajis', 'Banjarmasin', '08981189598', 'Dokter Umum', 'Y', '2022-02-06 23:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` bigint(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` bigint(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `indikasi` text NOT NULL,
  `dosis` varchar(30) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `letak_obat` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id_obat_keluar` bigint(11) NOT NULL,
  `kode_obat_keluar` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar_detail`
--

CREATE TABLE `obat_keluar_detail` (
  `id_obat_keluar_detail` bigint(20) NOT NULL,
  `id_obat_keluar` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kategori_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `satuan_obat` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id_obat_masuk` bigint(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `kode_obat_masuk` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk_detail`
--

CREATE TABLE `obat_masuk_detail` (
  `id_obat_masuk_detail` int(11) NOT NULL,
  `id_obat_masuk` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kategori_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `satuan_obat` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(6) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(225) DEFAULT '',
  `tlp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(2, 0, 'Rendy Satria', 'Tangerang', '1996-03-14', 'Kp. Daru Tegal RT 005/008', 'Laki-Laki', '0875-6789-8764'),
(4, 0, 'Rahmat', 'Tangerang', '1994-06-14', 'Kp. Selatan RT09/08', 'Laki-Laki', '0213-4234-5457'),
(5, 0, 'Nurhasanah', 'Pekalongan', '1991-08-17', 'Pesing Koneng RT008/005', 'Perempuan', '0857-1876-5889'),
(6, 0, 'Riadi', 'Bandung', '1990-01-30', 'Bandung Selatan No.6', 'Perempuan', '0878-7654-5867'),
(7, 0, 'Junaidi', 'Bogor', '1970-02-25', 'Bogor Kota', 'Laki-Laki', '0987-6655-5773'),
(8, 0, 'Sahir Saigh', 'Tangerang', '2010-06-13', 'Jalan Remaja IV', 'Laki-Laki', '0818-8219-8090');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `pimpinan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `logo` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `instansi`, `pimpinan`, `alamat`, `website`, `email`, `telepon`, `logo`, `tanggal_update`) VALUES
(1, 'POLIKLINIK', 'ARIS ABDUL AJIS', 'Jl. Sekumpu Gg. Purnaa No. 49, Sekumpul, Kec. Martapura, Kab. Banjar, kalimantan Selatan', 'https://poliklinik.com', 'contact@poliklinik.com', '027654673', 'logoatas.png', '2022-02-06 22:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan_penjamin`
--

CREATE TABLE `perusahaan_penjamin` (
  `id_perusahaan_penjamin` int(11) NOT NULL,
  `nama_perusahaan_penjamin` varchar(255) DEFAULT NULL,
  `alamat_perusahaan_penjamin` varchar(255) DEFAULT NULL,
  `telp_perusahaan_penjamin` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan_penjamin`
--

INSERT INTO `perusahaan_penjamin` (`id_perusahaan_penjamin`, `nama_perusahaan_penjamin`, `alamat_perusahaan_penjamin`, `telp_perusahaan_penjamin`, `aktif`, `created_at`) VALUES
(1, 'BPJS Kesehatan', 'Jakarta', '0865-7638-8375', 'Y', '2022-02-06 18:49:18'),
(2, 'Cash', '-', '', 'Y', '2022-02-07 10:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `reg_no` int(11) NOT NULL,
  `id_pasien` int(6) NOT NULL,
  `poli` varchar(255) DEFAULT NULL,
  `tgl_reg` date DEFAULT NULL,
  `id_perusahaan_penjamin` int(11) NOT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`reg_no`, `id_pasien`, `poli`, `tgl_reg`, `id_perusahaan_penjamin`, `diagnosa`, `created_at`) VALUES
(29, 7, 'Umum', '2017-02-03', 2, 'gghjhj', '2017-02-03 18:12:02'),
(30, 2, 'Gigi', '2022-02-06', 1, 'Nyeri Gusi', '2022-02-06 15:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `resep_id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `reg_no` int(11) DEFAULT NULL,
  `harga_obat` bigint(20) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `qty_resep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `resep`
--
DELIMITER $$
CREATE TRIGGER `triger_resep_jual1` AFTER UPDATE ON `resep` FOR EACH ROW BEGIN
UPDATE obat
SET 
qty_stok = qty_stok - NEW.qty_resep
WHERE
id_obat = NEW.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triger_resep_jual_copy` AFTER INSERT ON `resep` FOR EACH ROW BEGIN
UPDATE obat
SET qty_stok = qty_stok - NEW.qty_resep
WHERE
id_obat = NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rujuk`
--

CREATE TABLE `rujuk` (
  `rujuk_id` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `rujuk` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rujuklab`
--

CREATE TABLE `rujuklab` (
  `rujuklab_id` int(11) NOT NULL,
  `id_tindakan_lab` int(11) DEFAULT NULL,
  `reg_no` int(11) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` bigint(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tanggal_expired` date NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` bigint(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `telepon_supplier` varchar(15) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `telepon_supplier`, `alamat_supplier`, `keterangan`, `id_user`, `tanggal_update`) VALUES
(1, 'PT. INDOFARMA NASIONAL', '08981189598', 'Jl. Sekumpul', '-', 1, '2020-03-31 07:38:19'),
(2, 'PT. FARMA MARTAPURA', '08981189598', 'Jl. Pendidikan', 'Supplier obat dextro', 3, '2020-03-31 07:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_by` varchar(225) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_lab`
--

CREATE TABLE `tindakan_lab` (
  `id_tindakan_lab` int(11) NOT NULL,
  `tindakan_lab` varchar(255) DEFAULT NULL,
  `harga_tindakan_lab` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(225) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_poli`
--

CREATE TABLE `tindakan_poli` (
  `id_tindakan_poli` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `diagnosa_dokter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(14) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','manager','apotek','dokter','laboratorium') NOT NULL,
  `status` enum('1','0','','') NOT NULL DEFAULT '1',
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `telepon`, `jk`, `foto`, `alamat`, `level`, `status`, `tanggal_update`) VALUES
(1, 'Manager', 'manager', '$2y$10$kRLnQlA6YtE5Yy24gJ3WHOfbP0vSCvUXYm17sYn5g1dqppmLYlu0y', 'arisabdulajis026@gmail.com', '08981189598', 'Laki-Laki', 'avatar5.png', 'Jl. Sekumpul Gg. Purnama No. 49, Sekumpul, Kec. Martapura Kab. Banjar Kalimantan Selatan', 'manager', '1', '2020-04-13 15:14:38'),
(3, 'Administrator', 'admin', '$2y$10$ooai4XTCBSLtQ8G.EiwcVu6MI/nawobrRLFut3urJQh23d0M12BwW', 'suci@gmai', '08981189598', 'Perempuan', 'avatar.png', 'Sekumpul', 'admin', '1', '2020-04-13 15:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id_obat_keluar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `obat_keluar_detail`
--
ALTER TABLE `obat_keluar_detail`
  ADD PRIMARY KEY (`id_obat_keluar_detail`),
  ADD KEY `id_obat_keluar` (`id_obat_keluar`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id_obat_masuk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `obat_masuk_detail`
--
ALTER TABLE `obat_masuk_detail`
  ADD PRIMARY KEY (`id_obat_masuk_detail`),
  ADD KEY `id_obat_masuk` (`id_obat_masuk`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `perusahaan_penjamin`
--
ALTER TABLE `perusahaan_penjamin`
  ADD PRIMARY KEY (`id_perusahaan_penjamin`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`reg_no`),
  ADD KEY `mr` (`id_pasien`),
  ADD KEY `id_perusahaan_penjamin` (`id_perusahaan_penjamin`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`resep_id`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_obat_2` (`id_obat`);

--
-- Indexes for table `rujuk`
--
ALTER TABLE `rujuk`
  ADD PRIMARY KEY (`rujuk_id`);

--
-- Indexes for table `rujuklab`
--
ALTER TABLE `rujuklab`
  ADD PRIMARY KEY (`rujuklab_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `tindakan_lab`
--
ALTER TABLE `tindakan_lab`
  ADD PRIMARY KEY (`id_tindakan_lab`);

--
-- Indexes for table `tindakan_poli`
--
ALTER TABLE `tindakan_poli`
  ADD PRIMARY KEY (`id_tindakan_poli`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id_obat_keluar` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat_keluar_detail`
--
ALTER TABLE `obat_keluar_detail`
  MODIFY `id_obat_keluar_detail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id_obat_masuk` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat_masuk_detail`
--
ALTER TABLE `obat_masuk_detail`
  MODIFY `id_obat_masuk_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan_penjamin`
--
ALTER TABLE `perusahaan_penjamin`
  MODIFY `id_perusahaan_penjamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `resep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rujuk`
--
ALTER TABLE `rujuk`
  MODIFY `rujuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rujuklab`
--
ALTER TABLE `rujuklab`
  MODIFY `rujuklab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tindakan_lab`
--
ALTER TABLE `tindakan_lab`
  MODIFY `id_tindakan_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tindakan_poli`
--
ALTER TABLE `tindakan_poli`
  MODIFY `id_tindakan_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tindakan_poli`
--
ALTER TABLE `tindakan_poli`
  ADD CONSTRAINT `tindakan_poli_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `tindakan_poli_ibfk_3` FOREIGN KEY (`reg_no`) REFERENCES `reg` (`reg_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
