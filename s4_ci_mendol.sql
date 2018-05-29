-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2018 pada 18.12
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s4_ci_mendol`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `judul_blog` varchar(200) NOT NULL,
  `tanggal_blog` date NOT NULL,
  `content` text NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Sumber` varchar(50) NOT NULL,
  `gambar_blog` varchar(100) NOT NULL,
  `fk_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `judul_blog`, `tanggal_blog`, `content`, `Email`, `Pengarang`, `Sumber`, `gambar_blog`, `fk_cat_id`) VALUES
(6, 'Berita 1', '2018-12-31', 'adawqwen nqwe njwqkn adawqwen nqwe njwqkn adawqwen nqwe njwqkn adawqwen nqwe njwqkn adawqwen nqwe njwqkn ', 'adawe@fa.sad', 'Iya', 'adaw', '11.jpg', 4),
(7, 'Berita 2', '2018-12-30', 'kjsdan ksandkjnsakdnskaj', 'eqw', 'sad', 'zxc', '51.jpg', 4),
(8, 'Berita 3', '2019-04-02', 'lkasjdla sldjasl jasldj saj dlkasjdla sldjasl jasldj saj dlkasjdla sldjasl jasldj saj dlkasjdla sldjasl jasldj saj dlkasjdla sldjasl jasldj saj d', 'asd', 'kczx', 'ldf', 'htc11.jpg', 5),
(9, 'Berita 4 ', '2017-10-29', 'adsn akj dnqw', 'das ', 'jhf', 'oidf', '41.jpg', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_description` varchar(300) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `date_created`) VALUES
(3, 'Bola', 'ini bola', '2018-05-21 19:29:22'),
(4, 'Hiburan', 'beqwwq', '2018-05-21 19:14:51'),
(5, 'Gila', 'ini gila', '2018-05-21 19:15:05'),
(6, 'qew', '', '2018-05-21 19:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `adaw` (`fk_cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `adaw` FOREIGN KEY (`fk_cat_id`) REFERENCES `categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
