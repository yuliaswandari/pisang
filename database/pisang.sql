-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jan 2023 pada 16.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pisang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `message`, `timestamp`) VALUES
(2, 21, 'Untuk kondisi batang dan pelepah pohon pisang bisa disesuaikan dengan pertanyaan yang tersedia saat identifikasi pemilihan bibit.', '2023-01-15 16:04:44'),
(3, 22, 'ini adalah reply dari admin, semoga menjawab.', '2023-01-16 15:01:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identifikasi`
--

CREATE TABLE `identifikasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `fakta` varchar(150) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identifikasi`
--

INSERT INTO `identifikasi` (`id`, `kode`, `fakta`, `bobot`) VALUES
(5, 'C01', 'Tinggi 100 cm hingga 150 cm', 0.3),
(6, 'C02', 'Daun berwarna hijau segar', 0.3),
(7, 'C03', 'Daun berwarna kuning', 0),
(8, 'C04', 'Daun mempunyai garis coklat kekuningan', 0),
(9, 'C05', 'Pelepah berwarna kecoklatan', 0),
(10, 'C06', 'Pelepah berwarna hijau muda', 0.2),
(11, 'C07', 'Batang berwarna hijau muda dengan lapisan luar kecoklatan', 0.1),
(12, 'C08', 'Batang pelepah berwarna cokelat', 0),
(13, 'C09', 'Akar berwarna kehitam-hitaman', 0.1),
(14, 'C10', 'Akar membusuk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`id_question`, `id_user`, `subject`, `message`, `timestamp`) VALUES
(21, 2, 'Batang bibit pisang dimakan ayam', '<p>Saya mau bertanya, bagaimana jika bibit tanaman pisang saya pada bagian batang digigit oleh ayam sehingga terkoyak-koyak sedikit berwarna cokelat.&nbsp;</p><p>Terimakasih.</p>', '2023-01-15 14:52:04'),
(22, 3, 'Judul konsultasi', 'ini adalah pesan konsultasi kepada admin. semoga dapat segera dibalas. terima kasih', '2023-01-16 14:57:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bobot` double NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `result`
--

INSERT INTO `result` (`id`, `id_user`, `total_bobot`, `hasil`, `create_at`) VALUES
(85, 2, 1, 'Layak', '2023-01-15 14:44:00'),
(86, 2, 0.2, 'Cukup Layak', '2023-01-15 14:45:54'),
(87, 2, 0, 'Kurang Layak', '2023-01-15 14:46:14'),
(88, 3, 1, 'Layak', '2023-01-16 14:55:26'),
(89, 3, 0.3, 'Cukup Layak', '2023-01-16 14:56:07'),
(90, 3, 0, 'Kurang Layak', '2023-01-16 14:56:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `system`
--

CREATE TABLE `system` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `short_desc` varchar(50) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `developer` varchar(50) NOT NULL,
  `link_developer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `system`
--

INSERT INTO `system` (`first_name`, `last_name`, `short_desc`, `year`, `developer`, `link_developer`) VALUES
('IDENTIFIKASI PEMILIHAN', 'BIBIT PISANG', 'Identifikasi Pemilihan Bibit Pisang', 2023, 'RJ', 'rohmatj@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `id_role`, `last_login`) VALUES
(1, 'rohmatj@gmail.com', '$2y$05$VlETo1AUxdq5L0o7qzNXDu3uAgcAgGYWDYzHwHkSlY4uxQ4YXvHG.', 'Rohmat Junandar', 1, '2023-01-16 22:02:07'),
(2, 'yumarlin@gmail.com', '$2y$05$cCdOYjTl0sfhoJQe8WmMHu9O51KYFqpnw7n/k2CFV51y0WmUuu3vC', 'Yumarlin', 2, '2023-01-16 21:19:08'),
(3, 'tester@gmail.com', '$2y$05$8LRglD83XVKKoosdVVR9gei/KJzYfBj61So3VeGqggnbwZYj4g9/2', 'Akun Tester', 2, '2023-01-16 22:01:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indeks untuk tabel `identifikasi`
--
ALTER TABLE `identifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indeks untuk tabel `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `system`
--
ALTER TABLE `system`
  ADD UNIQUE KEY `first_name` (`first_name`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `identifikasi`
--
ALTER TABLE `identifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
