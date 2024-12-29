-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 10.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 7.4.33

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
-- Struktur dari tabel `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id_foto` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto_kegiatan`
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
(19, 18, '10-01-2024-Abstract Hi-Tech Hexagons PowerPoint Templates.jpg'),
(20, 19, '10-01-2024-icecream.png'),
(21, 19, '10-01-2024-hexohm.jpg'),
(22, 20, '13-01-2024-'),
(23, 21, '13-01-2024-aa.png'),
(24, 22, '14-01-2024-'),
(25, 23, '14-01-2024-'),
(26, 24, '14-01-2024-'),
(27, 25, '14-01-2024-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id_jenis_laporan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id_jenis_laporan`, `judul`, `created_by`, `created_at`) VALUES
(6, 'penerimaan laporan', 'Ari Dwiantoro', '02-01-2024 09:51:41'),
(7, 'laporan temuan', 'Ari Dwiantoro', '02-01-2024 09:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan` int(11) NOT NULL,
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
  `status` varchar(20) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id_laporan`, `judul_laporan`, `identitas`, `jenis_kelamin`, `no_hp`, `pekerjaan`, `kewarganegaraan`, `email`, `lokasi`, `peristiwa`, `nama_terlapor`, `nohp_terlapor`, `alamat_t`, `tgl`, `isi`, `created_by`, `created_at`, `status`, `Keterangan`) VALUES
(15, 'budi', '7854224', 'laki-laki', 866201, 'nganggur', 'asing', NULL, 'tps 04 jl. seringgu', 'pencuri kertas', 'rian', 908665, '', '2024-01-09', 'jklmno', '15', '2024-01-09', 'DITERIMA', '-'),
(18, 'andi', '85598679', 'laki-laki', 866201, 'nganggur', 'asing', NULL, 'tps 04 jl. seringgu', 'pencuri kertas', 'rian', 978755861, '', '2024-01-10', 'uiioppp', '15', '2024-01-10', 'DITOLAK', 'fadsafsgdsa'),
(19, 'hjtytdyiful', '85598679', 'laki-laki', 866201, 'jccj', 'nmkjj', NULL, 'lhyidukddu6', 'pencuri kertas', 'rian', 978755861, '', '2024-01-10', '', '15', '2024-01-10', 'DITOLAK', 'fsaddsafasdg'),
(21, 'joko', '42352434', 'lakii', 143225, 'sdfsfd', 'fsdsfddfs', NULL, 'sdfdsdsf', 'sgddggfd', 'fdds', 3423523, '', '2024-01-13', 'fsdfsdgdds', 'Array', '2024-01-13', 'DITERIMA', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
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
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `nrp`, `nama`, `jenis_kelamin`, `pangkat`, `password`, `tipe`) VALUES
(13, '123456', 'Ari Dwiantoro', 'perempuan', 'kepala', '12345', 'admin'),
(15, '22019988', 'rizki ratih purwasih', 'perempuan', 'pengawas lapangan', '12345', 'admin'),
(16, '2345', 'Julian', 'laki-laki', 'saksi', '123456', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_kegiatan`
--

CREATE TABLE `video_kegiatan` (
  `id_video` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `video_kegiatan`
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
(15, 18, '10-01-2024-'),
(16, 20, '13-01-2024-'),
(17, 21, '13-01-2024-Method of installation.mp4'),
(18, 22, '14-01-2024-'),
(19, 23, '14-01-2024-'),
(20, 24, '14-01-2024-'),
(21, 25, '14-01-2024-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id_jenis_laporan`);

--
-- Indeks untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indeks untuk tabel `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id_jenis_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
