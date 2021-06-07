-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 02:51 AM
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
,`waktu` datetime
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_btlr_stok`
--
CREATE TABLE IF NOT EXISTS `v_btlr_stok` (
`id` int(11)
,`item` varchar(50)
,`stok` int(11)
,`terpakai` decimal(32,0)
,`sisa` decimal(33,0)
);
-- --------------------------------------------------------

--
-- Structure for view `v_btlr`
--
DROP TABLE IF EXISTS `v_btlr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_btlr` AS select `tbl_btlr`.`id` AS `id`,`tbl_btlr`.`item` AS `item`,`tbl_btlr`.`qty` AS `qty`,`tbl_btlr`.`nik` AS `nik`,`tbl_btlr`.`nama` AS `nama`,`tbl_btlr`.`zona` AS `zona`,`tbl_btlr`.`waktu` AS `waktu` from `tbl_btlr` where (`tbl_btlr`.`qty` > 0);

-- --------------------------------------------------------

--
-- Structure for view `v_btlr_stok`
--
DROP TABLE IF EXISTS `v_btlr_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_btlr_stok` AS select `a`.`id` AS `id`,`a`.`item` AS `item`,`a`.`stok` AS `stok`,sum(`b`.`qty`) AS `terpakai`,(`a`.`stok` - sum(`b`.`qty`)) AS `sisa` from (`tbl_btlr_stok` `a` left join `tbl_btlr` `b` on((`a`.`item` = `b`.`item`))) group by `a`.`item`;

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
