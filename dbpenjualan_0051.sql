-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan_0051`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`) VALUES
('P-005', 'POAK', 'Medono, Kota Pekalongan'),
('P-006', 'Fahmi Yusuf', 'Jl Urip Sumoharjo no 100');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `foto_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`foto_barang`, `kode_barang`, `nama_barang`, `harga`, `stok`, `deskripsi`) VALUES
('672aef9b7da98_sale_daster_vneck.jpg', 'A-002', 'DASTERR', 135000.00, 18, 'Daster nyaman dipakai'),
('6728a6a40d622_WhatsApp Image 2024-11-03 at 03.24.23_41bd66a2.jpg', 'A001', 'Batik V-Neck', 125000.00, 0, 'Lebar dada 70');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `id_pelanggan` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_barang`, `id_pelanggan`, `jumlah`, `total_harga`, `tanggal`) VALUES
(9, 'A001', 'P-005', 1, 125000.00, '2024-11-06 10:58:51'),
(10, 'A-002', 'P-006', 12, 1620000.00, '2024-11-06 11:25:53');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `stok_keluar` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk set stok = stok - NEW.jumlah
    WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    DECLARE harga DECIMAL(10, 2);
    SELECT p.harga
    INTO harga
    FROM produk p
    WHERE p.kode_barang = NEW.kode_barang;
    SET NEW.total_harga = harga * NEW.jumlah;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_detail_transaksi` (
`id_transaksi` int(11)
,`kode_barang` varchar(25)
,`nama_barang` varchar(100)
,`id_pelanggan` varchar(25)
,`nama_pelanggan` varchar(50)
,`jumlah` int(11)
,`total_harga` decimal(15,2)
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`tanggal` datetime
,`id_transaksi` int(11)
,`nama_barang` varchar(100)
,`nama_pelanggan` varchar(50)
,`jumlah` int(11)
,`total_harga` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail_transaksi`
--
DROP TABLE IF EXISTS `view_detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_transaksi`  AS SELECT `t`.`id_transaksi` AS `id_transaksi`, `t`.`kode_barang` AS `kode_barang`, `b`.`nama_barang` AS `nama_barang`, `t`.`id_pelanggan` AS `id_pelanggan`, `p`.`nama_pelanggan` AS `nama_pelanggan`, `t`.`jumlah` AS `jumlah`, `t`.`total_harga` AS `total_harga`, `t`.`tanggal` AS `tanggal` FROM ((`transaksi` `t` join `pelanggan` `p` on(`t`.`id_pelanggan` = `p`.`id_pelanggan`)) join `produk` `b` on(`t`.`kode_barang` = `b`.`kode_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `t`.`tanggal` AS `tanggal`, `t`.`id_transaksi` AS `id_transaksi`, `p`.`nama_barang` AS `nama_barang`, `pl`.`nama_pelanggan` AS `nama_pelanggan`, `t`.`jumlah` AS `jumlah`, `t`.`jumlah`* `p`.`harga` AS `total_harga` FROM ((`transaksi` `t` join `produk` `p` on(`t`.`kode_barang` = `p`.`kode_barang`)) join `pelanggan` `pl` on(`t`.`id_pelanggan` = `pl`.`id_pelanggan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `produk` (`kode_barang`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
