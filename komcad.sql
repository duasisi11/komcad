-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 08:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komcad`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pribadi`
--

CREATE TABLE `data_pribadi` (
  `no_registrasi` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nik` varchar(50) NOT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `suku` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelurahan_desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `domisili` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(30) DEFAULT NULL,
  `nomer_telepon` varchar(30) DEFAULT NULL,
  `jumlah_saudara_kandung` int(11) DEFAULT NULL,
  `anak_ke_berapa` int(11) DEFAULT NULL,
  `dari_jumlah_bersaudara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pribadi`
--

INSERT INTO `data_pribadi` (`no_registrasi`, `nama_lengkap`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `suku`, `kewarganegaraan`, `tinggi_badan`, `berat_badan`, `alamat`, `kelurahan_desa`, `kecamatan`, `kabupaten`, `provinsi`, `domisili`, `kode_pos`, `nomer_telepon`, `jumlah_saudara_kandung`, `anak_ke_berapa`, `dari_jumlah_bersaudara`) VALUES
('1234', 'Nur Iskandar', '193231', 'Boyolali', '1994-11-28', 'Pria', 'Islam', 'Jawa', 'Indonesia', 170, 60, 'Boyolali', 'Kendel', 'Kemusu', 'Boyolali', 'Jawa Tengah', 'Jakarta', '57382', '421344', 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `surat_keterangan_sehat` varchar(80) DEFAULT NULL,
  `ktp` varchar(80) DEFAULT NULL,
  `kk` varchar(80) DEFAULT NULL,
  `ijazah_transkrip_nilai` varchar(80) DEFAULT NULL,
  `skck` varchar(80) DEFAULT NULL,
  `foto` varchar(80) DEFAULT NULL,
  `no_registrasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon_ayah` varchar(20) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(30) DEFAULT NULL,
  `tempat_lahir_ibu` date DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `alamat_ibu` varchar(40) DEFAULT NULL,
  `no_telepon_ibu` varchar(50) DEFAULT NULL,
  `no_registrasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(80) DEFAULT NULL,
  `nama_perguruan_tinggi_sekolah` varchar(80) DEFAULT NULL,
  `status_perguruan_tinggi_sekolah` varchar(80) DEFAULT NULL,
  `program_studi_jurusan` varchar(80) DEFAULT NULL,
  `akreditasi` varchar(80) DEFAULT NULL,
  `ipk_nilai_un` int(11) DEFAULT NULL,
  `no_registrasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_matra`
--

CREATE TABLE `wilayah_matra` (
  `id_wilayah_matra` int(11) NOT NULL,
  `kodam` varchar(100) DEFAULT NULL,
  `kodim` varchar(100) DEFAULT NULL,
  `matra` enum('Darat','Laut','Udara') DEFAULT NULL,
  `no_registrasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- Indexes for table `wilayah_matra`
--
ALTER TABLE `wilayah_matra`
  ADD PRIMARY KEY (`id_wilayah_matra`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wilayah_matra`
--
ALTER TABLE `wilayah_matra`
  MODIFY `id_wilayah_matra` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `data_pribadi` (`no_registrasi`);

--
-- Constraints for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD CONSTRAINT `orangtua_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `data_pribadi` (`no_registrasi`);

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `data_pribadi` (`no_registrasi`);

--
-- Constraints for table `wilayah_matra`
--
ALTER TABLE `wilayah_matra`
  ADD CONSTRAINT `wilayah_matra_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `data_pribadi` (`no_registrasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
