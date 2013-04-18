-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 09:18 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_bahan_baku`
--

CREATE TABLE IF NOT EXISTS `dlmbg_bahan_baku` (
  `kode_bahan_baku` int(5) NOT NULL AUTO_INCREMENT,
  `id_jenis_satuan` int(10) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  PRIMARY KEY (`kode_bahan_baku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_bahan_baku`
--

INSERT INTO `dlmbg_bahan_baku` (`kode_bahan_baku`, `id_jenis_satuan`, `nama_bahan`, `stok`) VALUES
(1, 1, 'Kertas A4', 821),
(3, 2, 'Kertas Manila', -7),
(4, 2, 'Serbuk Kayu', -4);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_daftar_cetak`
--

CREATE TABLE IF NOT EXISTS `dlmbg_daftar_cetak` (
  `id_daftar_cetak` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL,
  PRIMARY KEY (`id_daftar_cetak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jenis_cetakan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jenis_cetakan` (
  `kode_jenis_cetakan` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_cetakan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_jenis_cetakan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dlmbg_jenis_cetakan`
--

INSERT INTO `dlmbg_jenis_cetakan` (`kode_jenis_cetakan`, `jenis_cetakan`) VALUES
(2, 'Sablon'),
(3, 'Kartu Nama'),
(4, 'Spanduk'),
(5, 'Baliho');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jenis_satuan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jenis_satuan` (
  `id_jenis_satuan` int(10) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_satuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dlmbg_jenis_satuan`
--

INSERT INTO `dlmbg_jenis_satuan` (`id_jenis_satuan`, `satuan`) VALUES
(1, 'rim'),
(2, 'lembar');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_kwitansi`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kwitansi` (
  `kode_kwitansi` varchar(20) NOT NULL,
  `kode_nota` varchar(20) NOT NULL,
  `tgl_bayar` int(30) NOT NULL,
  PRIMARY KEY (`kode_kwitansi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pelanggan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `dlmbg_pelanggan`
--

INSERT INTO `dlmbg_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `jenis`) VALUES
(31, 'Gede Lumbung', 'Umum'),
(33, 'Dedek', 'Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pembayaran`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pembayaran` (
  `kode_pembayaran` varchar(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tgl_bayar` varchar(40) NOT NULL,
  `bayar` int(10) NOT NULL,
  PRIMARY KEY (`kode_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_pembayaran`
--

INSERT INTO `dlmbg_pembayaran` (`kode_pembayaran`, `kode_pemesanan`, `tgl_bayar`, `bayar`) VALUES
('PM00000001', 'PS00000001', '24 April 2013', 151500),
('PM00000002', 'PS00000002', '05 April 2013', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pemesanan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `kode_pelanggan` int(5) NOT NULL,
  `jumlah_harga` int(20) NOT NULL,
  `jenis_cetakan` varchar(100) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_pemesanan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_pemesanan`
--

INSERT INTO `dlmbg_pemesanan` (`kode_pemesanan`, `tgl_pesan`, `tgl_selesai`, `kode_pelanggan`, `jumlah_harga`, `jenis_cetakan`, `status_pembayaran`) VALUES
('PS00000001', '16 April 2013', '18 April 2013', 31, 150500, '5,', 'Lunas'),
('PS00000002', '01 March 2013', '02 April 2013', 33, 45900, '', 'Belum Bayar'),
('PS00000003', '06 April 2013', '09 April 2013', 33, 20000, '', 'Belum Bayar'),
('PS00000004', '16 April 2013', '20 April 2013', 33, 45900, '4,5,', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pemesanan_detail`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pemesanan_detail` (
  `id_pemesanan_detail` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(30) NOT NULL,
  `kode_bahan_baku` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id_pemesanan_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dlmbg_pemesanan_detail`
--

INSERT INTO `dlmbg_pemesanan_detail` (`id_pemesanan_detail`, `kode_pemesanan`, `kode_bahan_baku`, `jumlah`) VALUES
(7, 'PS00000002', 3, 1),
(8, 'PS00000002', 4, 2),
(16, 'PS00000003', 3, 1),
(29, 'PS00000004', 1, 3),
(31, 'PS00000001', 4, 2),
(32, 'PS00000001', 3, 1),
(33, 'PS00000001', 1, 5),
(34, 'PS00000001', 4, 2),
(35, 'PS00000001', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sessions`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_sessions`
--

INSERT INTO `dlmbg_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6778130362958e53aab02ef2fd1aabd7', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31 AlexaToolbar/alxg-', 1366139840, '');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Aplikasi Percetakan | DLMBG'),
(2, 'site_quotes', 'Quotes Situs', 'Okelah Kalo Begitu'),
(3, 'site_footer', 'Teks Footer', 'Gede Lumbung - 2013 <br>Aplikasi Percetakan | DLMBG'),
(4, 'key_login', 'Hash Key MD5', 'AppPercetakan32'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_user`
--

CREATE TABLE IF NOT EXISTS `dlmbg_user` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `nama_user`) VALUES
(1, 'admin', '4c47281cf940a96b55dc2323d237f190', 'Gede Lumbung');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
