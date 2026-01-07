-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 10:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cust` varchar(10) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cust`, `nama_cust`, `alamat`, `no_telp`) VALUES
('C01', 'nurul azizah rosiade', 'jakarta selatan', '08987763489'),
('C02', 'julia as jule', 'bekasi', '085899810023'),
('C03', 'inara rusli', 'depok', '089977564431'),
('C04', 'keluarga agra vampirr', 'jl. sondol makmur', '089123667800'),
('C05', 'pak sidiq', 'jl. uhuy', '082133899008'),
('C06', 'karina', 'jl. hanila', '08989970875');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KT1', 'skincare'),
('KT2', 'makeup'),
('KT3', 'haircare'),
('KT4', 'bodycare'),
('KT5', 'parfum');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `role`) VALUES
('LG1', 'admin', 'pass1', 'admin'),
('LG2', 'customer', 'pass2', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `id_kategori`, `id_supplier`, `foto`) VALUES
('P1', 'sunscreen', 43000, 123, 'KT1', 'S001', 'ss.jpeg'),
('P2', 'moisturizer', 100000, 104, 'KT2', 'S002', 'moist.jpeg'),
('P3', 'make up', 1000000, 187, 'KT3', 'S003', 'makeup.jpeg'),
('P4', 'hair care', 800000, 196, 'KT4', 'S004', 'haircare.jpeg'),
('P5', 'body care', 500000, 48, 'KT5', 'S005', 'bodycare.jpeg'),
('P6', 'maskara', 66000, 60, 'KT6', 'S006', 'maskara.jpeg'),
('P7', 'parfum', 77000, 12, 'KT7', 'S007', 'parfum.jpeg'),
('P8', 'toner', 42000, 13, 'KT8', 'S008', 'toner.jpeg'),
('P9', 'serum', 29000, 100, 'KT9', 'S009', 'ori.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kontak`) VALUES
('S001', 'PT. Cantika Sejahtera', '081111222233'),
('S002', 'PT. GloWhite', '082133456669'),
('S003', 'PT. Cantik Alami Nusantara', '081234567890'),
('S004', 'PT. Aura Kosmetik Sejahtera', '082167894321'),
('S005', 'PT. Elegant Beauty Indonesia', '081744556677');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `id_cust` varchar(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `id_cust`, `total`) VALUES
('T10', '2025-12-29 16:34:08', 'C01', 0),
('T11', '2026-01-05 00:00:00', 'C04', 462000),
('T12', '2026-01-05 00:00:00', 'C05', 1000000),
('T13', '2026-01-06 00:00:00', 'C02', 125000),
('T14', '2025-12-31 00:00:00', 'C03', 264000),
('T15', '2025-07-16 00:00:00', 'C06', 77000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_customer`
--

CREATE TABLE `transaksi_customer` (
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_customer`
--

INSERT INTO `transaksi_customer` (`id_transaksi`, `nama`, `id_produk`, `qty`, `total`, `tanggal_pemesanan`, `status`, `created_at`) VALUES
(1, 'customer', 'P1', 1, 43000.00, '2026-01-05', 'pending', '2026-01-05 08:40:50'),
(2, 'customer', 'P4', 1, 800000.00, '2026-01-05', 'pending', '2026-01-05 09:07:54'),
(3, 'customer', 'P3', 1, 1000000.00, '2026-01-05', 'pending', '2026-01-05 09:22:22'),
(4, 'customer', 'P3', 1, 1000000.00, '2026-01-05', 'pending', '2026-01-05 09:22:35'),
(5, 'customer', 'P1', 1, 43000.00, '2026-01-05', 'pending', '2026-01-05 09:24:50'),
(6, 'customer', 'P6', 2, 132000.00, '2026-01-05', 'pending', '2026-01-05 10:12:17'),
(7, 'customer', 'P2', 10, 1000000.00, '2026-01-05', 'pending', '2026-01-05 10:12:41'),
(8, 'customer', 'P9', 5, 125000.00, '2026-01-06', 'pending', '2026-01-06 00:26:14'),
(9, 'customer', 'P6', 2, 132000.00, '2026-01-06', 'pending', '2026-01-06 05:22:20'),
(11, 'customer', 'P5', 2, 1000000.00, '2026-01-06', 'pending', '2026-01-06 06:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` varchar(10) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_produk`, `jumlah`, `subtotal`, `harga`) VALUES
('D00', 'T10', 'P1', 2, 86000, ''),
('D01', 'T11', 'P7', 6, 462000, ''),
('D02', 'T12', 'P3', 1, 1000000, ''),
('D03', 'T13', 'P9', 5, 125000, ''),
('D04', 'T14', 'P6', 4, 264000, ''),
('D05', 'T15', 'P7', 1, 77000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`,`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_customer` (`id_cust`);

--
-- Indexes for table `transaksi_customer`
--
ALTER TABLE `transaksi_customer`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `idx_nama` (`nama`),
  ADD KEY `idx_tanggal` (`tanggal_pemesanan`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`,`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_customer`
--
ALTER TABLE `transaksi_customer`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
