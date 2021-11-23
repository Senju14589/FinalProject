-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `position` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`position`, `id`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `postingdate`) VALUES
('นักร้อง', 12, 'นาย พุฒิพงศ์ ', 'สักแสน', 'Puttipong1458998@gmail.com', '064-3469907', '17/4 บ้านโคโนฮะ 46220', '2021-04-19 17:22:27'),
('ประธานบริษัท', 17, 'นายเอื้ออังกูร ', 'สร้อยอุดม', 'qeec@kkumail.com', '069-7998899', 'หอมณียา หนองคาย 43000', '2021-11-22 23:44:45'),
('แม้บ้าน', 18, 'นายภาณุพงษ์', 'สุขส่ง', 'okopjk@kkumail.com', '098-7221134', 'หอมนียาตะวันออก หนองคาย 43000', '2021-11-22 23:46:53'),
('รองประทานบริษัท', 19, 'นายปัญจพล', 'อ่อนโคทา', 'pokop@kkumail.com', '066-4564646', 'หอมณียาตะวันตก หนองคาย 43000', '2021-11-22 23:48:15'),
('หัวหน้า รปภ.', 20, 'นายธนากร', 'ภิรมย์ไชย', 'hjdqew@kkumail.com', '087-4221345', 'หอชาย3  หนองคาย 43000', '2021-11-23 00:06:05'),
('พนักงานขาย', 21, 'นายณัฐดนัย', 'วินทะไชย', 'oskvosk@kkumail.com', '093-2241567', 'หอ209 หนองคาย 43000', '2021-11-23 00:11:05'),
('ออกแบบ', 22, 'นายเจษฎาพร', 'แสงสีงาม', 'xvcvdhsk@kkumail.com', '081-3458998', 'หอมณียาตอนเหนือ  หนองคาย 43000', '2021-11-23 01:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(7, 'DEKSEVENG', '$2y$10$35Y1PhglYqMZA2dx1VmfVeW2OGZ31sgGCgYecgoj.owEmUSa9aFVa', '2021-11-23 05:28:29'),
(8, 'puttipong', '$2y$10$aMmy9V9eCXFq3.ps6AMF2OHNOE79nwk8gmLqarRVHD.sW/ns5Tnd.', '2021-11-23 09:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
