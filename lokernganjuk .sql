-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2020 pada 10.04
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokernganjuk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_lowongan`, `id_pelamar`, `status`) VALUES
(1, 6, 3001, 'Diterima'),
(2, 7, 3002, ''),
(3, 2, 3003, ''),
(4, 6, 3003, 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id`, `id_perusahaan`, `tanggal_berakhir`, `posisi`, `kategori`, `deskripsi`, `username`) VALUES
(2, 2, '2020-08-16', 'Sales Marketing Administration', 'Marketing', 'Manager di perusahaan PT.akunbaru', 'akunbaru'),
(4, 10, '2020-08-29', 'HRD', 'HRD', 'nah gini lho oke mantap jaya selalu', 'ptpt'),
(5, 10, '2020-08-24', 'Service', 'CS', 'kerja 8 jam', 'ptpt'),
(6, 10, '2020-09-29', 'CS', 'CS', 'ea eaaa', 'ptpt'),
(7, 2, '2020-09-20', 'UI/UX Designer', 'IT', 'UI/UX Website Designer uses creative ideas, typography and image editing skills to produce and web communication materials.\r\n<br>\r\n<h1> Cobacoba </h1>', 'akunbaru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `CV` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama`, `alamat`, `contact`, `email`, `NIK`, `ttl`, `status`, `pendidikan`, `CV`, `username`) VALUES
(3001, 'keysa', 'nganjuk, Jawa Timur', '0879999', 'kesya@gmail.com', '34789098786756', 'kediri, 8 juni 1998', 'Belum Kawin ', '', '', 'pelamar1'),
(3002, 'bagas', 'nganjuk, Jawa Timur', '08989899', 'bagagass@gmail.com', '34789098786778', 'Jember, 11 September 1995', 'Kawin', 'S1 Teknik Kimia', '', 'pelamar2'),
(3003, 'Felly', 'Kediri, Jawa Timur', '', '', '34789098786723', 'Surabaya, 10 Juli 2000', 'Belum Kawin', '', '', 'pelamar3'),
(3004, 'Kemal', 'nganjuk, Jawa Timur', '', '', '34789098786746', 'Lumajang, 23 April 1997', 'Kawin', '', '', 'pelamar4'),
(3007, 'Febri', 'nganjuk', '0879777676', 'febri@gmail.com', '1751502728276', '1995-02-13', 'Belum Kawin', 'SD', '', 'ababab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `username`, `nama`, `alamat`, `contact`, `email`, `deskripsi`, `logo`) VALUES
(2, 'akunbaru', 'PT Cahya Guna Jaya', 'Nganjuk Kab., Jawa Timur ', '0878657364760000000000', 'bahratadevelopment@gmail.com', 'Job information Administrasi Personal HRD Nganjuk from the Company Bahrata Development , this latest Administrasi Personal HRD Nganjuk job vacancy is located in the city Nganjuk located in the province Jawa-Timur . ', '3.jpg'),
(5, 'daeng', 'PT Cita Tama Jakarta', 'Nganjuk Kab., Jawa Timur ', '087865736498', 'ptcitatamajakarta@gmail.com', 'This latest job opening is open to job seekers who have the latest education / graduate . Job Vacancies in this Administrative field have been opened and published up to the specified time. ', '5.jpg'),
(7, 'tobatoba', 'PT OKE', 'Nganjuk Kab., Jawa Timur ', '123456', 'oke@gmail.com', 'This latest job opening is open to job seekers who have the latest education / graduate . Job Vacancies in this Administrative field have been opened and published up to the specified time. ', '6.jpg'),
(10, 'ptpt', 'PT Maju Terus Pantang Mundur', 'Nganjuk Kab., Jawa Timur ', '0987654321', 'maju@gmail.com', 'okokokokokok', '8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'administrator',
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `last_login`, `avatar`, `active`) VALUES
(1, 'administrator', '$2y$10$Y0QqffmHMF6iyCAA9rpG9efHcRFbp1JJ/a0PzbWrI4ThR4K55LNO6', 'Administrator', '2020-07-17 09:05:51', '1.jpg', '1'),
(3, 'daeng', '$2y$10$o5Hz66izDeWwwPUNfZn2yuFcAwm21LBOtVPO8ppi5BH1SvRvsA47e', 'Perusahaan', '2020-07-06 08:33:58', 'noavatar.png', '1'),
(5, 'akunbaru', '$2y$10$79TfhA1pLU5u7NWABBTQSO/040XnABP8khmUU7tFeDrEjZOsi/jva', 'Perusahaan', '2020-07-10 05:25:10', 'noavatar.png', '1'),
(6, 'ptpt', '$2y$10$yOJr6haz/NN9fAaMyZk19.qzBK7NhZJXkcoyEkOGMn76sIwonVxWq', 'Perusahaan', '2020-07-17 09:25:48', '6.jpg', '1'),
(8, 'tobatoba', '$2y$10$Fqs3sKEQzThEtPZUSoduluzsaFtry1crBrU2RnNBoV4qTeOq3sKk6', 'Perusahaan', '0000-00-00 00:00:00', 'noavatar.png', '1'),
(9, 'pelamar1', '$2y$10$4eiI7pOqlcqSdVBMc61bZOwSigr59K9zaV7TZwMq5OylbTy5yPfPa', 'Pelamar', '2020-07-17 06:23:21', 'pelamar1_20200706024812.jpg', '1'),
(10, 'pelamar2', '$2y$10$.qx/JlEyWFBMi8HDWjWGHepnuiWVs4nRnvm6M7tY/DbLA3tRPmEtu', 'Pelamar', '2020-07-17 04:34:01', 'noavatar.png', '1'),
(11, 'pelamar3', '$2y$10$Ez9yBptl84YNLnzucGWQ7egEembDWovI.fL21hEAyo89KE413tyGK', 'Pelamar', '2020-07-17 09:07:37', 'noavatar.png', '1'),
(12, 'pelamar4', '$2y$10$ahnuhFYuT2lakCzjThwr9OP1CjT06DvugddOl2rqyydNGWz8ejqi.', 'Pelamar', '0000-00-00 00:00:00', 'noavatar.png', '1'),
(14, 'ababab', '$2y$10$NbTChVyj9uNP16UQY1ZuX..gA6zpglzUX5W8x/sJtwIDaSPfxmk5.', 'pelamar', '0000-00-00 00:00:00', 'noavatar.png', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loker_ibfk_1` (`id_perusahaan`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3008;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
