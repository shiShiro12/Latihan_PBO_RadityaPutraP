-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2026 at 09:09 AM
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
-- Database: `db_latihan_pbo_ti-1d_radityaputraperdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('reguler','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` char(2) DEFAULT NULL,
  `kacamata_3D_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3D_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Oppenheimer', '2026-06-13 14:00:00', 3, 45000.00, 'reguler', 'Sony Dynamic Digital Sound', 'D7', NULL, NULL, NULL, NULL),
(2, 'The Batman', '2026-06-14 16:00:00', 2, 45000.00, 'reguler', 'Dolby Atmos', 'F1', NULL, NULL, NULL, NULL),
(3, 'The Batman', '2026-06-13 11:00:00', 3, 45000.00, 'reguler', 'Dolby Atmos', 'D1', NULL, NULL, NULL, NULL),
(4, 'Interstellar', '2026-06-13 12:00:00', 2, 45000.00, 'reguler', 'DTS:X', 'D2', NULL, NULL, NULL, NULL),
(5, 'Oppenheimer', '2026-06-15 11:00:00', 1, 45000.00, 'reguler', 'Dolby Atmos', 'B1', NULL, NULL, NULL, NULL),
(6, 'Avatar: The Way of Water', '2026-06-15 13:00:00', 3, 45000.00, 'reguler', 'Dolby Atmos', 'F2', NULL, NULL, NULL, NULL),
(7, 'Oppenheimer', '2026-06-12 17:00:00', 5, 45000.00, 'reguler', 'Dolby Atmos', 'B7', NULL, NULL, NULL, NULL),
(8, 'Avatar: The Way of Water', '2026-06-12 20:00:00', 5, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'P7', '3D-IMX-6209', 'Standard Vibration', NULL, NULL),
(9, 'Inception', '2026-06-13 14:00:00', 2, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'M9', '3D-IMX-2741', NULL, NULL, NULL),
(10, 'Interstellar', '2026-06-15 11:00:00', 1, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'O1', '3D-IMX-8212', NULL, NULL, NULL),
(11, 'The Batman', '2026-06-15 19:00:00', 3, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'O1', '3D-IMX-3611', '4DX Motion Intense', NULL, NULL),
(12, 'Dune: Part Three', '2026-06-12 19:00:00', 5, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'O1', '3D-IMX-8702', 'Standard Vibration', NULL, NULL),
(13, 'Avengers: Secret Wars', '2026-06-15 13:00:00', 3, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'L1', '3D-IMX-6367', '4DX Motion Intense', NULL, NULL),
(14, 'Interstellar', '2026-06-15 17:00:00', 1, 75000.00, 'imax', 'IMAX 12-Channel Custom Sound', 'M1', '3D-IMX-5770', 'Standard Vibration', NULL, NULL),
(15, 'The Batman', '2026-06-12 15:00:00', 4, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Premium Silk Pack', 'Express Butler Service'),
(16, 'Interstellar', '2026-06-14 18:00:00', 1, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Standard Pillow-Blanket Pack', 'Full Service Food & Drinks'),
(17, 'Dune: Part Three', '2026-06-15 19:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Standard Pillow-Blanket Pack', 'Full Service Food & Drinks'),
(18, 'Interstellar', '2026-06-14 11:00:00', 1, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Standard Pillow-Blanket Pack', 'Full Service Food & Drinks'),
(19, 'The Batman', '2026-06-13 16:00:00', 1, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Standard Pillow-Blanket Pack', 'Welcome Drink Only'),
(20, 'Oppenheimer', '2026-06-15 12:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Premium Silk Pack', 'Full Service Food & Drinks'),
(21, 'Avengers: Secret Wars', '2026-06-12 15:00:00', 1, 150000.00, 'velvet', 'Dolby Atmos Premium', 'VI', NULL, NULL, 'Premium Silk Pack', 'Welcome Drink Only');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
