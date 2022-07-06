-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2022 pada 11.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webriko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(4) NOT NULL,
  `nama` varchar(22) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `telepon`) VALUES
(1, 'Herman,S.pd', '081258768749'),
(2, 'Joni,S.pd', '089818284758'),
(3, 'Alex,M.pd', '081285867849'),
(4, 'Doni,M.Kom', '089529319064');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'Sastra Indonesia'),
(2, 'Sastra Inggris'),
(3, 'Akuntansi'),
(4, 'Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(12) NOT NULL,
  `nama` varchar(22) NOT NULL,
  `id_jurusan` int(3) NOT NULL,
  `alamat` varchar(22) NOT NULL,
  `telepon` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `id_jurusan`, `alamat`, `telepon`) VALUES
('201943501284', 'Nando', 1, 'Bekasi', '089542885694'),
('201943501657', 'Riko', 4, 'Jakarta', '0881289058486'),
('201943502384', 'Stephen', 3, 'Bekasi', '087729475739'),
('201943503845', 'Dani', 2, 'Jakarta', '085723938572');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(4) NOT NULL,
  `id_dosen` int(4) NOT NULL,
  `nama` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_dosen`, `nama`) VALUES
(1, 3, 'Sejarah'),
(2, 1, 'Pronounce'),
(3, 2, 'Manajemen Keuangan'),
(4, 4, 'Pemograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(4) NOT NULL,
  `nim` char(12) NOT NULL,
  `id_dosen` int(4) NOT NULL,
  `id_matkul` int(4) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `id_dosen`, `id_matkul`, `nilai`) VALUES
(79, '201943503845', 3, 1, 90),
(80, '201943503845', 1, 2, 90),
(81, '201943501284', 4, 4, 100),
(82, '201943501657', 2, 3, 30);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail_nilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_detail_nilai` (
`nim` char(12)
,`nama_mhs` varchar(22)
,`nama_jurusan` varchar(50)
,`nama_dosen` varchar(22)
,`id_matkul` int(4)
,`nama_matkul` varchar(22)
,`nilai` int(3)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_detail_nilai`
--
DROP TABLE IF EXISTS `v_detail_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_nilai`  AS SELECT `nilai`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama_mhs`, `jurusan`.`nama` AS `nama_jurusan`, `dosen`.`nama` AS `nama_dosen`, `nilai`.`id_matkul` AS `id_matkul`, `matkul`.`nama` AS `nama_matkul`, `nilai`.`nilai` AS `nilai` FROM ((((`nilai` join `mahasiswa` on(`nilai`.`nim` = `mahasiswa`.`nim`)) join `jurusan` on(`mahasiswa`.`id_jurusan` = `jurusan`.`id_jurusan`)) join `dosen` on(`nilai`.`id_dosen` = `dosen`.`id_dosen`)) join `matkul` on(`nilai`.`id_matkul` = `matkul`.`id_matkul`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_jurusan_2` (`id_jurusan`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
