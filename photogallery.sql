-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2021 pada 14.41
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photogallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'iamadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pics`
--

CREATE TABLE `pics` (
  `pid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `picname` varchar(50) NOT NULL,
  `approved` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pics`
--

INSERT INTO `pics` (`pid`, `username`, `picname`, `approved`) VALUES
(32, 'john', '1.jpg', 1),
(33, 'john', '2.jpg', 1),
(34, 'christina', '3.jpg', 1),
(35, 'christina', '4.jpg', 1),
(36, 'christina', '5.jpg', 1),
(37, 'prince', '6.jpg', 1),
(38, 'prince', '7.jpg', 1),
(39, 'prince', '8.jpg', 1),
(40, 'prince', '9.jpg', 1),
(41, 'monica', '15.png', 1),
(42, 'monica', '14.png', 1),
(43, 'monica', '13.png', 1),
(44, 'monica', '12.png', 1),
(45, 'monica', '11.png', 1),
(46, 'monica', '10.png', 1),
(47, 'christina', 'project-1.jpg', 1),
(48, 'christina', 'project-2.jpg', 1),
(49, 'christina', 'project-3.jpg', 1),
(50, 'christina', 'project-4.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `bio` varchar(300) NOT NULL,
  `uploads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `username`, `email`, `password`, `bio`, `uploads`) VALUES
(1, 'John', 'Doe', 'john', 'john@gmail.com', '527bd5b5d689e2c32ae974c6229ff785', '', 2),
(5, 'Christina', 'Doe', 'christina', 'christina@gmail.com', 'e311dd5fd4cdbba780ea0d0062df7788', '', 7),
(7, 'Monica', 'Doe', 'monica', 'monica@gmail.com', 'ff0d813dd5d2f64dd372c6c4b6aed086', '', 6),
(8, 'Prince', 'Doe', 'prince', 'prince@gmail.com', '2077e4a6bafa9b4e7b55e1fff16818af', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`pid`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pics`
--
ALTER TABLE `pics`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
