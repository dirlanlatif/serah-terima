-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mar 2023 pada 23.09
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_support`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_btlr`
--

CREATE TABLE IF NOT EXISTS `tbl_btlr` (
`id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `nik` varchar(13) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `zona` varchar(25) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1284 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_btlr`
--
CREATE TABLE IF NOT EXISTS `v_btlr` (
`id` int(11)
,`item` varchar(30)
,`qty` int(11)
,`nik` varchar(13)
,`nama` varchar(100)
,`zona` varchar(25)
,`keterangan` text
,`waktu` datetime
);
-- --------------------------------------------------------

--
-- Struktur untuk view `v_btlr`
--
DROP TABLE IF EXISTS `v_btlr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_btlr` AS select `tbl_btlr`.`id` AS `id`,`tbl_btlr`.`item` AS `item`,`tbl_btlr`.`qty` AS `qty`,`tbl_btlr`.`nik` AS `nik`,`tbl_btlr`.`nama` AS `nama`,`tbl_btlr`.`zona` AS `zona`,`tbl_btlr`.`keterangan` AS `keterangan`,`tbl_btlr`.`waktu` AS `waktu` from `tbl_btlr` where (`tbl_btlr`.`qty` > 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_btlr`
--
ALTER TABLE `tbl_btlr`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_btlr`
--
ALTER TABLE `tbl_btlr`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1284;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
