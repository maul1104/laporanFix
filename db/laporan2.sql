-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 03:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id_foto` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_kegiatan`
--

INSERT INTO `foto_kegiatan` (`id_foto`, `id_laporan`, `foto`) VALUES
(3, 2, '23-05-2022-gambar 2.jpg'),
(4, 2, '23-05-2022-gambar1.jpg'),
(5, 3, '23-05-2022-gambar1.jpg'),
(6, 3, '23-05-2022-gambar 2.jpg'),
(7, 4, '02-01-2024-hexohm.jpg'),
(9, 6, '08-01-2024-Abstract Hi-Tech Hexagons PowerPoint Templates.jpg'),
(10, 7, '08-01-2024-kisspng-computer-icons-architectural-engineering-helmet-pr-construccion-5b25d242ea5a99.3310599915292053149599.png'),
(11, 8, '08-01-2024-icecream.png'),
(12, 9, '08-01-2024-Ice cream buttercream is a buttery and smooth frosting.jpg'),
(13, 10, '08-01-2024-kisspng-computer-icons-architectural-engineering-helmet-pr-construccion-5b25d242ea5a99.3310599915292053149599.png'),
(14, 12, '08-01-2024-icecream.png'),
(15, 14, '08-01-2024-hexohm.jpg'),
(16, 15, '09-01-2024-hexohm.jpg'),
(17, 16, '10-01-2024-fresh-strawbery-white-background-red-91050816.jpg'),
(18, 17, '10-01-2024-es-krim-kopi-cone-61dbf6e21b796c0f80630ef2.jpg'),
(20, 19, '10-01-2024-icecream.png'),
(21, 19, '10-01-2024-hexohm.jpg'),
(22, 20, '13-01-2024-'),
(23, 21, '13-01-2024-aa.png'),
(24, 22, '14-01-2024-'),
(25, 23, '14-01-2024-'),
(26, 24, '14-01-2024-'),
(27, 25, '14-01-2024-'),
(28, 26, '14-01-2024-'),
(29, 27, '14-01-2024-'),
(30, 28, '14-01-2024-'),
(31, 29, '14-01-2024-'),
(32, 31, '17-01-2024-'),
(33, 31, '17-01-2024-'),
(34, 32, '18-01-2024-'),
(35, 33, '18-01-2024-'),
(36, 34, '22-01-2024-Real-Cycled4-1024x678.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id_jenis_laporan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id_jenis_laporan`, `judul`, `created_by`, `created_at`) VALUES
(4, 'Pelanggaran Hukum lainnya', 'Admin', '02-01-2024 09:51:41'),
(5, 'Pelanggaran Pidana', 'admin', '02-01-2024 09:51:41'),
(6, 'Pelanggaran Kode Etik', 'Admin', '02-01-2024 09:51:41'),
(7, 'Pelanggaran Administrasi', 'Admin', '02-01-2024 09:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan` int(11) NOT NULL,
  `jenis_laporan` varchar(255) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `identitas` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `peristiwa` varchar(255) DEFAULT NULL,
  `nama_terlapor` varchar(255) DEFAULT NULL,
  `nohp_terlapor` int(11) DEFAULT NULL,
  `alamat_t` varchar(255) NOT NULL,
  `tgl` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `nama_s1` varchar(255) DEFAULT '0',
  `alamat_s1` varchar(255) DEFAULT NULL,
  `nohp_s1` int(13) DEFAULT NULL,
  `nama_s2` varchar(255) DEFAULT '0',
  `alamat_s2` varchar(255) DEFAULT NULL,
  `nohp_s2` int(13) DEFAULT NULL,
  `nama_s3` varchar(255) DEFAULT '0',
  `alamat_s3` varchar(255) DEFAULT NULL,
  `nohp_s3` int(13) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id_laporan`, `jenis_laporan`, `judul_laporan`, `identitas`, `jenis_kelamin`, `no_hp`, `pekerjaan`, `kewarganegaraan`, `email`, `lokasi`, `peristiwa`, `nama_terlapor`, `nohp_terlapor`, `alamat_t`, `tgl`, `isi`, `created_by`, `created_at`, `nama_s1`, `alamat_s1`, `nohp_s1`, `nama_s2`, `alamat_s2`, `nohp_s2`, `nama_s3`, `alamat_s3`, `nohp_s3`, `status`, `Keterangan`) VALUES
(15, 'Pelanggaran Kode Etik', 'budi', '7854224', 'laki-laki', 866201, 'nganggur', 'asing', 'budi@gmail.com', 'tps 04 jl. seringgu', 'pencuri kertas', 'rian', 908665, 'jalan.mandala', '2024-01-09', 'jklmno', '15', '2024-01-09', 'Maul', '', 0, 'Paka', NULL, NULL, '0', NULL, NULL, 'DITERIMA', '-'),
(19, 'Pelanggaran Administrasi', 'hjtytdyifulw12', '85598679', 'laki-laki', 866201, 'jccj', 'nmkjj', '', 'lhyidukddu6', 'pencuri kertas', 'rian', 978755861, 'asd', '2024-01-10', 'sip oke', '15', '2024-01-10', 'sad', 'sad', 0, '', '', 0, '', '', 0, 'DITERIMA', '-'),
(29, 'Pelanggaran Hukum lainnya', 'daasfd', 'afsd', 'perempuan', 0, 'asfd', 'dsaf', 'sdfa', 'sdaf', 'dsfa', 'sfda', 0, 'sda', '2024-01-14', 'asfd', NULL, '2024-01-14', 'sdaf', 'safd', 0, 'fdsaa', 'sdfa', 0, 'sdaffdsa', 'asdf', 0, 'DITERIMA', '-'),
(30, 'Pelanggaran Pidana', 'fadsa', 'dassd', 'laki-laki', 0, 'dssa', 'sad', 'sda', 'das', 'sda', 'dsa', 0, 'sad', '2024-01-17', '', NULL, '2024-01-17', 'sad', 'das', 0, '', '', 0, '', '', 0, 'DITERIMA', NULL),
(31, '', 'sdf', 'sdaf', 'laki-laki', 0, 'dsfa', 'sdaf', 'dsfa', 'dsfa', 'dfsa', 'fsda', 0, 'sdfa', '2024-01-17', '', NULL, '2024-01-17', 'sadf', 'dsaf', 0, '', '', 0, '', '', 0, 'DITOLAK', 'jenis pelanggaran\r\n'),
(33, 'Pelanggaran Administrasi', 'ads', 'sad', 'laki-laki', 0, 'sad', 'sda', 'dass', 'ads', 'das', 'asd', 0, 'ads', '2024-01-18', '', NULL, '2024-01-18', 'sad', 'ads', 0, '', '', 0, '', '', 0, 'DITERIMA', '-'),
(34, 'Pelanggaran Administrasi', 'dilan 1990', '9101016678', 'laki-laki', 2147483647, 'guru', 'WNI', 'irianiannisa1@gmail.com', 'muli', 'hghjjjn', 'heli', 2147483647, 'mopah', '2024-01-22', 'fghvjhjnjkhj', NULL, '2024-01-22', 'hbhh', 'ggh', 8768990, 'dtyghfhjh', 'fv', 997878687, '', '', 0, 'DITOLAK', 'tidak memenuhi syarat formil');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nrp` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nrp`, `nama`, `jenis_kelamin`, `pangkat`, `password`, `tipe`) VALUES
(13, '123456', 'Ari Dwiantoro', 'perempuan', 'kepala', '12345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `video_kegiatan`
--

CREATE TABLE `video_kegiatan` (
  `id_video` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_kegiatan`
--

INSERT INTO `video_kegiatan` (`id_video`, `id_laporan`, `video`) VALUES
(2, 2, '23-05-2022-00064.mp4'),
(3, 3, '23-05-2022-00064.mp4'),
(5, 6, '08-01-2024-'),
(6, 7, '08-01-2024-'),
(7, 8, '08-01-2024-'),
(8, 9, '08-01-2024-'),
(9, 10, '08-01-2024-'),
(10, 12, '08-01-2024-'),
(11, 14, '08-01-2024-'),
(12, 15, '09-01-2024-'),
(13, 16, '10-01-2024-'),
(14, 17, '10-01-2024-'),
(16, 20, '13-01-2024-'),
(17, 21, '13-01-2024-Method of installation.mp4'),
(18, 22, '14-01-2024-'),
(19, 23, '14-01-2024-'),
(20, 24, '14-01-2024-'),
(21, 25, '14-01-2024-'),
(22, 26, '14-01-2024-'),
(23, 27, '14-01-2024-'),
(24, 28, '14-01-2024-'),
(25, 29, '14-01-2024-'),
(26, 31, '17-01-2024-'),
(27, 31, '17-01-2024-'),
(28, 32, '18-01-2024-'),
(29, 33, '18-01-2024-'),
(30, 34, '22-01-2024-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id_jenis_laporan`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id_jenis_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
