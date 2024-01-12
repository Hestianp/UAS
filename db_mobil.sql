-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 08:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int NOT NULL,
  `id_mobil` int NOT NULL,
  `nik` varchar(255) NOT NULL,
  `pemesan` varchar(255) NOT NULL,
  `tgl_pesan` varchar(255) NOT NULL,
  `tgl_pake` varchar(255) NOT NULL,
  `lama_pake` int NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jml_orang` int NOT NULL,
  `jml_barang` int NOT NULL,
  `total_harga` int UNSIGNED DEFAULT NULL,
  `go_time` time DEFAULT NULL,
  `status_booking` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `konfirmasi_booking` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int NOT NULL,
  `nama_rental` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`id`, `nama_rental`, `telp`, `alamat`, `email`, `updated_at`) VALUES
(1, 'Pemesanan Rental Mobil', '021 123456789', 'Jl. Raya Narogong, KM. 15', 'rental@mail.com', '2024-01-12 07:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'HRD', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status_mobil` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_plat`, `nama_mobil`, `merk`, `deskripsi`, `status_mobil`, `gambar`) VALUES
(12, 'F 1211 SGT', 'Avanza', 'Toyota', 'All New Avanza', 'Tersedia', '167644570916752390401-avanza-purplish-silver.png'),
(13, 'B 4564 RZK', 'Xenia', 'Daihatsu', 'All New Xenia', 'Tidak Tersedia', '16765109511643012563all-new-xenia-exterior-tampak-perspektif-depan---varian-1.5r-ads.jpg'),
(14, 'B 3219 RST', 'Grand Max', 'Daihatsu', 'All New Grand Max', 'Tersedia', '16765111965ef21fb658caf.jpg'),
(15, 'F 1211 BNG', 'Kijang Innova', 'Toyota', 'All New Kijang Innova', 'Tersedia', '1676511330k_inova.jpg'),
(16, 'F 6271 JBL', 'Expander', 'Mitsubishi', 'Mitsubishi Expander', 'Tersedia', '1676511429k_expander.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `infoweb`
--
ALTER TABLE `infoweb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
