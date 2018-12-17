-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 09:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_trash`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE IF NOT EXISTS `alamat` (
  `kode_alamat` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_rumah` int(4) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `kelurahan` varchar(40) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` int(4) NOT NULL,
  `nik` bigint(18) NOT NULL,
  PRIMARY KEY (`kode_alamat`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`kode_alamat`, `alamat`, `no_rumah`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `nik`) VALUES
('ALM001', 'Jl. Mandor Samin', 58, 2, 6, 'Kalibaru', 'Cilodong', 'Depok', 16414, 123456789123456789),
('ALM002', 'Jl. Banjaran', 32, 5, 5, 'Cipmaen', 'Cimppaeun', 'Depok', 16123, 112233445566778899),
('ALM003', 'Cilodong', 43, 1, 3, 'Cilodong', 'Cilodong', 'Depok', 16414, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `kode_admin` varchar(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(4) NOT NULL,
  PRIMARY KEY (`kode_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
('ADM001', 'Sanin ', 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir`
--

CREATE TABLE IF NOT EXISTS `tb_kurir` (
  `kode_kurir` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `kode_alamat` varchar(11) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `status` enum('Libur','Diperjalanan','Menunggu Order') NOT NULL,
  PRIMARY KEY (`kode_kurir`),
  KEY `nip` (`kode_kurir`),
  KEY `kode_alamat` (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kurir`
--

INSERT INTO `tb_kurir` (`kode_kurir`, `password`, `nama_kurir`, `telepon`, `kode_alamat`, `gaji`, `status`) VALUES
('KRR001', '1234', 'Bayu Ruswandi', '089614324512', 'ALM003', 3000000, 'Diperjalanan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE IF NOT EXISTS `tb_laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_terima` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_sampah` varchar(5) NOT NULL,
  `total_uang` bigint(20) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `kode_terima` (`kode_terima`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `kode_terima`, `tanggal`, `total_sampah`, `total_uang`) VALUES
(4, 'TRM001', '2018-02-07', '4', 4000),
(5, 'TRM001', '2018-02-08', '4', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE IF NOT EXISTS `tb_pesan` (
  `kode_pesan` varchar(11) NOT NULL,
  `nik` bigint(18) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_pesan`),
  KEY `nik` (`nik`),
  KEY `nik_2` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`kode_pesan`, `nik`, `berat`, `time`) VALUES
('PSN001', 112233445566778899, '4', '2018-02-07 14:12:57'),
('PSN002', 112233445566778899, '4', '0000-00-00 00:00:00'),
('PSN003', 123456789123456789, '4', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_terima`
--

CREATE TABLE IF NOT EXISTS `tb_terima` (
  `kode_terima` varchar(11) NOT NULL,
  `nik` bigint(18) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `kode_kurir` varchar(11) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `status` enum('Menunggu','Diproses','Selesai') NOT NULL,
  `kode_pesan` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_terima`),
  KEY `nik` (`nik`),
  KEY `nip` (`kode_kurir`),
  KEY `nik_2` (`nik`),
  KEY `nip_2` (`kode_kurir`),
  KEY `nik_3` (`nik`),
  KEY `nip_3` (`kode_kurir`),
  KEY `status` (`status`),
  KEY `kode_pesan` (`kode_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_terima`
--

INSERT INTO `tb_terima` (`kode_terima`, `nik`, `tanggal_terima`, `kode_kurir`, `berat`, `harga`, `status`, `kode_pesan`) VALUES
('TRM001', 112233445566778899, '2018-02-07', 'KRR001', '4', 4000, 'Selesai', 'PSN001'),
('TRM002', 112233445566778899, '2018-02-07', 'KRR001', '4', 4000, 'Selesai', 'PSN002'),
('TRM003', 123456789123456789, '2018-02-08', 'KRR001', '4', 4000, 'Diproses', 'PSN003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warga`
--

CREATE TABLE IF NOT EXISTS `tb_warga` (
  `nik` bigint(18) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `kode_alamat` varchar(11) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `jumlah_pemesanan` int(4) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `nik` (`nik`),
  KEY `kode_alamat` (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_warga`
--

INSERT INTO `tb_warga` (`nik`, `password`, `kepala_keluarga`, `kode_alamat`, `telepon`, `lat`, `lng`, `jumlah_pemesanan`) VALUES
(112233445566778899, '1234', 'Panggih Jati', 'ALM002', '089632578612', 0, 0, 2),
(123456789123456789, '1234', 'Nicko', 'ALM001', '089639385406', 0, 0, 0);

--
-- Triggers `tb_warga`
--
DROP TRIGGER IF EXISTS `hapus_alamat`;
DELIMITER //
CREATE TRIGGER `hapus_alamat` AFTER DELETE ON `tb_warga`
 FOR EACH ROW begin
	delete from alamat where kode_alamat = old.kode_alamat;
    end
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD CONSTRAINT `tb_kurir_ibfk_1` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`kode_terima`) REFERENCES `tb_terima` (`kode_terima`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_terima`
--
ALTER TABLE `tb_terima`
  ADD CONSTRAINT `tb_terima_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_terima_ibfk_3` FOREIGN KEY (`kode_pesan`) REFERENCES `tb_pesan` (`kode_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
