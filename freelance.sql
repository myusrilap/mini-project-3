-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'yusril', 'arjulio'),
(2, 'mpaim', '123');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `range_gaji` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `judul`, `deskripsi`, `lokasi`, `kategori`, `range_gaji`) VALUES
(2, 'Joki Game', 'Joki ML dari Epic ke immortal', 'Remote', 'IT', '< Rp1.000.000'),
(3, 'Web Developer', 'Membangun aplikasi web menggunakan teknologi terkini', 'Remote', 'IT', 'Rp1.000.000 - Rp5.000.000'),
(4, 'Digital Marketing Specialist', 'Merancang dan melaksanakan strategi pemasaran digital', 'Hybrid', 'Pemasaran', 'Rp1.000.000 - Rp5.000.000'),
(5, 'Financial Analyst', 'Menganalisis laporan keuangan dan memberikan rekomendasi keuangan', 'Ditempat', 'Keuangan', '> Rp5.000.000'),
(6, 'Software Engineer', 'Sebagai seorang Software Engineer, Anda akan bertanggung jawab untuk mengembangkan dan memelihara perangkat lunak aplikasi perusahaan. Tugas Anda akan meliputi pemrograman, pengujian, debugging, dan dokumentasi kode. Anda akan bekerja sama dengan tim pengembang lainnya untuk memastikan produk perangkat lunak yang dihasilkan berkualitas tinggi dan sesuai dengan kebutuhan pengguna. Pengalaman dengan teknologi X dan Y akan dianggap sebagai nilai tambah.', 'Remote', 'IT', 'Rp1.000.000 - Rp5.000.000'),
(7, 'Accountant', 'Sebagai seorang Accountant, Anda akan bertanggung jawab untuk melakukan pencatatan keuangan harian, menyiapkan laporan keuangan bulanan dan tahunan, serta mengelola audit internal dan eksternal. Anda akan memastikan bahwa semua transaksi keuangan perusahaan direkam dengan akurat sesuai dengan standar akuntansi yang berlaku. Keterampilan analitis yang kuat dan keakuratan dalam pekerjaan adalah kunci keberhasilan dalam peran ini.', 'Ditempat', 'Keuangan', '> Rp5.000.000'),
(8, 'Marketing Specialist', 'Sebagai seorang Marketing Specialist, Anda akan merancang, melaksanakan, dan mengevaluasi strategi pemasaran untuk mempromosikan produk dan layanan perusahaan. Anda akan bekerja dengan tim pemasaran untuk mengembangkan kampanye iklan, materi promosi, dan kegiatan promosi lainnya. Keterampilan komunikasi yang kuat, kreativitas, dan pemahaman yang baik tentang pasar target akan membantu Anda dalam mencapai tujuan pemasaran perusahaan.', 'Hybrid', 'Pemasaran', 'Rp1.000.000 - Rp5.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `username`, `job_id`) VALUES
(1, 'yusril', 2),
(2, 'yusril', 2),
(3, 'yusril', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `nomor_telepon`, `alamat`, `pendidikan`, `gender`) VALUES
(1, 'adit', '123', 'Aditya', 'aditya@gmail.com', '0821746344638', 'jln. Perjuangan 6', 'Diploma', 'male'),
(3, 'yusril', '123', 'aditya', 'aditya@gmail.com', '08721562422', 'jln. perjuangan 6', 'Junior High School', 'male'),
(6, 'das', 'dsadas', 'das', 'dasdsf@gmail.com', '0192873489732', 'jhsfjkdfds', 'Junior High School', 'male'),
(10, 'yusri', 'ss', 'sasa', 'aditya@gmail.com', 'qww', 'wqr', 'Junior High School', 'male'),
(17, 'dsds', '1', '1', 'myusril785@gmail.com', '1', '1', 'Junior High School', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
