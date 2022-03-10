-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2022 at 05:06 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `model_pj`
--

CREATE TABLE `model_pj` (
  `id_model_pj` int NOT NULL,
  `name_model_pj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_pj`
--

INSERT INTO `model_pj` (`id_model_pj`, `name_model_pj`) VALUES
(1, 'เว็ปไซต์'),
(2, 'เว็ปแอปพลิเคชัน'),
(3, 'แอปพลิเคชัน'),
(4, 'โปรแกรม');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_pj` int NOT NULL COMMENT 'ลำดับที่/รหัสโปเจค',
  `date_pj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่บันทึกข้อมูล',
  `model_pj` int NOT NULL COMMENT 'รูปแบบ',
  `title_pj` varchar(50) NOT NULL COMMENT 'ชื่อหัวข้อเรื่อง',
  `id_sa` int NOT NULL COMMENT 'ชื่อ-นามสกุลนักวิเคราะห์',
  `introduction_con` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'บทนำ',
  `description_con` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'คำอธิบาย',
  `need_con` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ความต้องการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `systemsanalyst`
--

CREATE TABLE `systemsanalyst` (
  `id_sa` int NOT NULL COMMENT 'รหัสนักวิเคราะห์',
  `username_sa` varchar(30) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password_sa` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `natitle_sa` text NOT NULL COMMENT 'คำนำหน้า',
  `name_sa` varchar(50) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `birthday_sa` date NOT NULL COMMENT 'วันเกิด',
  `email_sa` varchar(50) NOT NULL COMMENT 'อีเมล์',
  `addresr_sa` varchar(150) NOT NULL COMMENT 'ที่อยู่',
  `zipcode_sa` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phone_sa` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_pj`
--
ALTER TABLE `model_pj`
  ADD PRIMARY KEY (`id_model_pj`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `id_sa` (`id_sa`),
  ADD KEY `model_pj` (`model_pj`);

--
-- Indexes for table `systemsanalyst`
--
ALTER TABLE `systemsanalyst`
  ADD PRIMARY KEY (`id_sa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model_pj`
--
ALTER TABLE `model_pj`
  MODIFY `id_model_pj` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_pj` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่/รหัสโปเจค';

--
-- AUTO_INCREMENT for table `systemsanalyst`
--
ALTER TABLE `systemsanalyst`
  MODIFY `id_sa` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสนักวิเคราะห์';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `id_sa` FOREIGN KEY (`id_sa`) REFERENCES `systemsanalyst` (`id_sa`),
  ADD CONSTRAINT `model_pj` FOREIGN KEY (`model_pj`) REFERENCES `model_pj` (`id_model_pj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
