-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 02:56 AM
-- Server version: 5.6.21
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
-- Table structure for table `tbl_btlr_stok`
--

CREATE TABLE IF NOT EXISTS `tbl_btlr_stok` (
`id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_btlr_stok`
--

INSERT INTO `tbl_btlr_stok` (`id`, `item`, `stok`, `tgl_update`) VALUES
(1, 'Ties', 11, '2021-05-18 21:10:27'),
(2, 'Barcode Kecil', 6, '2021-05-18 21:05:18'),
(3, 'Barcode Besar', 31, '2021-05-18 00:00:00'),
(4, 'Ribbon', 51, '2021-05-18 21:07:33'),
(5, 'Pita Print', 44, '2021-05-18 21:10:07'),
(6, 'Label', 70, '2021-05-18 00:00:00');

--
-- Triggers `tbl_btlr_stok`
--
DELIMITER //
CREATE TRIGGER `injectnol2` BEFORE INSERT ON `tbl_btlr_stok`
 FOR EACH ROW BEGIN



   -- Insert record into audit table

   INSERT INTO tbl_btlr

   ( item,

     qty
   )

   VALUES

   ( NEW.item,

     0
   );



END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_btlr_stok`
--
ALTER TABLE `tbl_btlr_stok`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_btlr_stok`
--
ALTER TABLE `tbl_btlr_stok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
