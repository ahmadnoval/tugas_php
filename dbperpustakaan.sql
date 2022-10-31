-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2022 pada 03.35
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
-- Database: `dbperpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, 'Ahmad Noval Fahmi', 'L', 'JL. Tegal Parang Utara 1 ', '085156534857'),
(2, 'Chika Aulia Zahwa', 'P', 'JL. Jakarta Utara', '081218946095');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_pengarang` int(11) NOT NULL,
  `kode_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `tahun_terbit`, `jumlah`, `isbn`, `id_penerbit`, `id_pengarang`, `kode_rak`) VALUES
(1, 'A MAN OF THE PEOPLE', 2010, 6, '0123450679', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`idpeminjaman`, `tgl_pinjam`, `tgl_kembali`, `petugas_id`, `anggota_id`) VALUES
(2, '2022-10-01', '2022-10-31', 1, 1),
(3, '2022-10-01', '2022-10-01', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `peminjaman_idpeminjaman` int(11) NOT NULL,
  `buku_idbuku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `idpenerbit` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`idpenerbit`, `nama`, `alamat`, `telp`) VALUES
(1, 'Muhammad Ismail', 'JL. Cibinong Selatan 1', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `idPengarang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`idPengarang`, `nama`, `alamat`, `telp`) VALUES
(1, 'Gunawan', 'JL. Bogor Timur 1', '11223344');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `idpengembalian` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian_detail`
--

CREATE TABLE `pengembalian_detail` (
  `pengembalian_idpengembalian` int(11) NOT NULL,
  `buku_idbuku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama`, `no_telp`, `alamat`) VALUES
(1, 'admin', 'admin', 'admin_perpustakaan', 851565348, 'JL. Bojong Utara 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `kode_rak` int(11) NOT NULL,
  `lokasi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`kode_rak`, `lokasi`) VALUES
(1, 'Dekat Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `fk_buku_penerbit` (`id_penerbit`),
  ADD KEY `fk_buku_Pengarang1` (`id_pengarang`),
  ADD KEY `fk_buku_rak1` (`kode_rak`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpeminjaman`),
  ADD KEY `fk_peminjaman_petugas1` (`petugas_id`),
  ADD KEY `fk_peminjaman_anggota1` (`anggota_id`);

--
-- Indeks untuk tabel `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`peminjaman_idpeminjaman`,`buku_idbuku`),
  ADD KEY `fk_peminjaman_has_buku_peminjaman1` (`peminjaman_idpeminjaman`),
  ADD KEY `fk_peminjaman_has_buku_buku1` (`buku_idbuku`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`idpenerbit`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`idPengarang`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`idpengembalian`),
  ADD KEY `fk_pengembalian_peminjaman1` (`peminjaman_id`),
  ADD KEY `fk_pengembalian_petugas1` (`petugas_id`),
  ADD KEY `fk_pengembalian_anggota1` (`anggota_id`);

--
-- Indeks untuk tabel `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD PRIMARY KEY (`pengembalian_idpengembalian`,`buku_idbuku`),
  ADD KEY `fk_pengembalian_has_buku_pengembalian1` (`pengembalian_idpengembalian`),
  ADD KEY `fk_pengembalian_has_buku_buku1` (`buku_idbuku`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`kode_rak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `idpenerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `idPengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `idpengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `kode_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_Pengarang1` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`idPengarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`idpenerbit`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku_rak1` FOREIGN KEY (`kode_rak`) REFERENCES `rak` (`kode_rak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD CONSTRAINT `fk_peminjaman_has_buku_buku1` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_has_buku_peminjaman1` FOREIGN KEY (`peminjaman_idpeminjaman`) REFERENCES `peminjaman` (`idpeminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_pengembalian_anggota1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_peminjaman1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`idpeminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengembalian_detail`
--
ALTER TABLE `pengembalian_detail`
  ADD CONSTRAINT `fk_pengembalian_has_buku_buku1` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_has_buku_pengembalian1` FOREIGN KEY (`pengembalian_idpengembalian`) REFERENCES `pengembalian` (`idpengembalian`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
