-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2023 pada 03.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(12) NOT NULL,
  `id_pelayanan` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` int(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pelayanan`, `tanggal`, `no_antrian`, `status`, `update_date`) VALUES
(6, 1, '2023-03-31', 1, '0', NULL),
(7, 1, '2023-04-02', 1, '1', '2023-04-02 13:40:20'),
(8, 1, '2023-04-02', 2, '1', '2023-04-02 13:41:02'),
(9, 1, '2023-04-02', 3, '1', '2023-04-02 13:41:13'),
(10, 1, '2023-04-08', 1, '0', NULL),
(11, 1, '2023-04-08', 2, '0', NULL),
(12, 3, '2023-04-14', 1, '0', NULL),
(13, 1, '2023-04-14', 1, '1', '2023-04-14 17:16:19'),
(14, 1, '2023-04-14', 2, '0', NULL),
(15, 1, '2023-04-25', 1, '0', NULL),
(16, 1, '2023-04-25', 2, '0', NULL),
(17, 1, '2023-04-26', 1, '1', '2023-04-26 12:02:23'),
(18, 1, '2023-04-26', 2, '0', NULL),
(19, 1, '2023-04-26', 3, '0', NULL),
(20, 44, '2023-06-14', 1, '0', NULL),
(21, 1, '2023-06-14', 1, '0', NULL),
(22, 1, '2023-06-14', 2, '0', NULL),
(23, 1, '2023-06-14', 3, '0', NULL),
(24, 1, '2023-06-16', 1, '0', NULL),
(25, 1, '2023-06-16', 2, '0', NULL),
(26, 1, '2023-06-16', 3, '0', NULL),
(27, 1, '2023-06-16', 4, '0', NULL),
(28, 1, '2023-06-16', 5, '0', NULL),
(29, 1, '2023-06-16', 6, '0', NULL),
(30, 1, '2023-06-16', 7, '0', NULL),
(31, 1, '2023-06-16', 8, '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `id_profil` int(12) NOT NULL,
  `id_pelayanan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `pw`, `id_profil`, `id_pelayanan`) VALUES
(2, 'skck_polresBKL', 'skck123', 1, 1),
(4, 'admin', 'admin123', 1, 3),
(32, 'spkt123', 'spkt123', 1, 43),
(33, 'sim123', '123', 1, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(12) NOT NULL,
  `id_profil` int(12) NOT NULL,
  `nama_pelayanan` varchar(100) NOT NULL,
  `video_pelayanan` varchar(500) NOT NULL DEFAULT 'video_profile.mp4',
  `bg` varchar(100) NOT NULL DEFAULT 'bg.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `id_profil`, `nama_pelayanan`, `video_pelayanan`, `bg`) VALUES
(1, 1, 'SKCK', 'video_profile.mp4', 'bg.png'),
(3, 1, 'admin', '', 'bg.png'),
(43, 1, 'SPKT', 'video_profile.mp4', 'bg.png'),
(44, 1, 'SIM', 'video_profile.mp4', 'bg.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(12) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo1` varchar(100) NOT NULL,
  `logo2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_instansi`, `alamat`, `logo1`, `logo2`) VALUES
(1, 'POLRES BANGKALAN', 'Jl. Soekarno Hatta No.45, Wr 08, Mlajah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'logo2.png', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(12) NOT NULL,
  `id_pelayanan` int(12) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `tgl_rating` date NOT NULL,
  `ket` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_pelayanan`, `rating`, `tgl_rating`, `ket`) VALUES
(1, 1, 'PUAS', '2023-03-31', 'puas karena pelayanannya sangat ramah/berperilaku sopan'),
(2, 1, 'PUAS', '2023-04-02', 'puas karena pelayanannya  ramah/berperilaku sopan'),
(3, 1, 'PUAS', '2023-04-02', 'puas karena pelayanannya  ramah/berperilaku sopan'),
(4, 1, 'CUKUP PUAS', '2023-04-02', 'cukup puas karena pelayanannya cepat'),
(5, 1, 'PUAS', '2021-04-01', 'puas bgt'),
(8, 1, 'PUAS', '2023-04-14', 'puas karena pelayanannya cepat'),
(9, 1, 'SANGAT PUAS', '2023-04-14', 'sangat puas karena karyawannya memiliki penampilan yang sangat menyenangkan dan sangat rapi'),
(10, 1, 'PUAS', '2023-04-17', 'puas karena pelayanannya cepat'),
(12, 1, 'SANGAT PUAS', '2023-04-17', ''),
(13, 1, 'SANGAT PUAS', '2023-04-25', 'sangat puas karena pelayanannya sangat profesional'),
(14, 44, 'SANGAT PUAS', '2023-06-14', 'sangat puas karena pelayanannya sangat profesional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_antrian` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `jenis_keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_antrian`, `nama`, `alamat`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `golongan_darah`, `jenis_keperluan`) VALUES
(8, 30, 'Dwi Aqilah Pradita', 'Kamal Indonesia', '78764534254', 'bangkalan', '2002-06-27', 'Laki-laki', 'Islam', 'belum kawin', 'mahasiwa/pelajar', 'Indonesia', 'B', 'membuat skck');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_profil` (`id_profil`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_antrian` (`id_antrian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
