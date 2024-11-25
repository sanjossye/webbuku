-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 06:41 AM
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
-- Database: `administrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jualbuku`
--

CREATE TABLE `jualbuku` (
  `id_peserta` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jualbuku`
--

INSERT INTO `jualbuku` (`id_peserta`, `judul`, `penulis`, `genre`, `kondisi`, `deskripsi`, `foto`, `harga`, `sinopsis`, `tahun`) VALUES
(21, 'indonesia', 'koko\\', 'fiction', 'new', 'lskrjf', '673d33c2a786e9.36308951.jpeg', 0, '', 0),
(30, 'balaal', 'koko', 'bussiness', 'new', 'skjga', '673d5f5e2510d4.31097946.jpeg', 0, '', 0),
(31, 'kukuruyuk', 'zaky', 'technology', 'like-new', 'skaufg', '673d5f7b808f99.23429751.jpeg', 0, '', 0),
(32, 'skdg', 'kshfg', 'romantic', 'like-new', 'jhf', '673d5f9064ce90.00353493.jpeg', 0, '', 0),
(33, 'sjf', 'aw', 'adventure', 'good', 'WAG', '673d5fa670c356.74514399.jpeg', 0, '', 0),
(34, 'sjf', 'aw', 'adventure', 'good', 'WAG', '673d5fe2039282.37344016.jpeg', 0, '', 0),
(35, 'jossye', 'ubay', 'fiction', 'new', 'josdsdadoa', '673d7cebc6e2a6.52467127.jpeg', 0, '', 0),
(36, 'jossye', 'ubay', 'fiction', 'new', 'josdsdadoa', '673d7cfdd7e0f9.52381147.jpeg', 0, '', 0),
(40, 'jossssssss', 'aksjdas', 'fiction', 'new', 'aksfj', '6741bc20500e71.99790053.jpg', 0, '', 0),
(41, 'jossye ganteng sekali', 'jossye', 'fiction', 'new', 'ini sangat menarik', '6741d3974157e4.04782299.jpg', 20000, 'inii buku ojapdasdad', 0),
(42, 'jossye ganteng sekali', 'jossye', 'fiction', 'new', 'ini sangat menarik', '6741d495883e01.92543226.jpg', 20000, 'inii buku ojapdasdad', 0),
(43, 'jossye ganteng sekali', 'jossye', 'fiction', 'new', 'ini sangat menarik', '6741d4d79b7ed3.32971628.jpg', 20000, 'inii buku ojapdasdad', 0),
(44, 'jossye ganteng sekali', 'jossye', 'fiction', 'new', 'ini sangat menarik', '6741d523a2e1d0.02477815.jpg', 20000, 'inii buku ojapdasdad', 0),
(45, 'jossye', 'jossye ganteng', 'romance', 'like-new', 'ini buku yaa buku', '6741d566786f64.06283360.jpeg', 2000, 'ini buku bercerita tentang ai', 0),
(46, 'jossye', 'jossye ganteng', 'romance', 'like-new', 'ini buku yaa buku', '6741d5d3eda861.21405765.jpeg', 2000, 'ini buku bercerita tentang ai', 0),
(50, 'lsjhdasdlsaih', 'aisdhcfascc', 'non-fiction', 'like-new', 'iashcasc', '6741d70bed7518.65190171.jpg', 91832, 'icalsdaskdc', 0),
(51, 'ksajdhasldhal', 'liasdhlaisda', 'non-fiction', 'very-good', 'psaidhpsad', '6741d754539095.66240112.jpg', 142314, 'isohdasdA', 8621483);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jualbuku`
--
ALTER TABLE `jualbuku`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jualbuku`
--
ALTER TABLE `jualbuku`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
