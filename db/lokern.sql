-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 05:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokern`
--

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `nama_perusahaan`, `contact`, `tanggal_berakhir`, `posisi`, `deskripsi`, `username`) VALUES
(1, 'PT Maju Terus Pantang Mundur', '08213123213', '2017-04-05', 'Freelancer', '<p>PT. Maju Terus Pantang Mundur adalah sebuah perusahaan yang bergerak di bidang datar yang lurus. Membutuhkan seorang pegawai yang berintegritas tinggi dan memahami rumus pythagoras secara menyeluruh.</p>\r\n<p>Kualifikasi:</p>\r\n<ol>\r\n<li>Bertubuh Gitar Spanyola</li>\r\n<li>Minimal berusia 35 Tahun</li>\r\n<li>Rajin pangkal pandai</li>\r\n</ol>\r\n<p>Jika anda memenuhi kualifikasi di atas, silahkan mengirimkan cv anda pada&nbsp;<a href=\"http://www.majumundur.com\">website kami</a>&nbsp;atau pada email kami di maju@terus.com</p>', 'administrator'),
(2, 'PT Cita Tama Jakarta', '087865736498', '2020-06-23', 'Administrasi Personal HRD', 'Ob information Administrasi Nganjuk from the Company PT Cita Tama Jakarta', 'daeng'),
(4, 'Bahrata Development', '086865736476', '2020-06-30', 'Data Analysis', 'Excellent interpersonal skill, high spirit, creative and self-motivated person', 'IT'),
(5, 'PT Cahya Guna Jaya', '086865736457', '2020-07-01', 'Administrasi Payroll', 'Ob information Administrasi Payroll Nganjuk from PT Cahya Guna Jaya', 'Administrasi'),
(6, 'PT Chevron Indonesia', '087865736434', '2020-07-02', 'Supervisor Accounting', 'Saat ini CPI sedang membutuhkan suumber daya manusia yang berkualitas, memeiliki keterampilan dan pengetahuan agar mampu memberikan kontribusi bagi kesuksesan perusahaan', 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'administrator',
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `telp`, `username`, `password`, `level`, `last_login`, `avatar`, `active`) VALUES
(1, 'BUCIN', 'Kediri 354', '080989999', 'administrator', '$2y$10$B2ztsNPm8JZyGR/E12rRU.itsFuvdnYCsDg/L4SZ.xCx7usFzvXUG', 'Admin PT', '2020-06-12 17:11:26', 'administrator_20200611042748.jpg', '1'),
(2, 'Brekele', '-', '-', 'brekele', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'administrator', '2017-04-14 17:04:39', 'noavatar.png', '1'),
(3, 'Daeng', '-', '-', 'daeng', '$2y$10$Uo/O3pE0REYbte04eN171.CrkKNrdwk8LXeedOEFmDZDGYFNfRzSG', 'Admin Sistem', '2020-06-12 16:27:57', 'noavatar.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
