-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 05:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangkelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role_id` int(10) NOT NULL,
  `date_created` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`USERNAME`, `PASSWORD`, `user_id`, `EMAIL`, `FOTO`, `role_id`, `date_created`) VALUES
('ahmad.faaiz', '$2y$10$9vh4eggEVWR.3', '140810180009', 'ah.faaiz@gmail.com', 'default.png', 0, '1570938371'),
('ahmadf20', '$2y$10$iC5ethdmvNpqr', '140810180023', 'Ahmad_f20@yahoo.com', 'default.png', 0, '1570935470');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `student_id` varchar(12) NOT NULL,
  `task_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `student_id` varchar(12) NOT NULL,
  `subject_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `student` (
  `student_id` varchar(12) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `USERNAME` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `KD_MATKUL` varchar(15) NOT NULL,
  `NAMA_MATKUL` varchar(20) NOT NULL,
  `KD_DOSEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `KD_MATERI` varchar(15) NOT NULL,
  `KD_MATKUL` varchar(15) NOT NULL,
  `FILE_MATERI` varchar(200) NOT NULL,
  `DESC_MATERI` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `KD_TUGAS` varchar(12) NOT NULL,
  `FILE_TUGAS` varchar(200) NOT NULL,
  `DESC_TUGAS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD KEY `NPM` (`NPM`),
  ADD KEY `KD_TUGAS` (`KD_TUGAS`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`KD_DOSEN`),
  ADD KEY `FK_KODEUSER_DOSEN` (`USERNAME`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD KEY `NPM` (`NPM`),
  ADD KEY `KD_MATKUL` (`KD_MATKUL`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`),
  ADD KEY `FK_KODEUSER_MAHASISWA` (`USERNAME`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`KD_MATKUL`),
  ADD KEY `KD_DOSEN` (`KD_DOSEN`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`KD_MATERI`),
  ADD KEY `KD_MATKUL` (`KD_MATKUL`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`KD_TUGAS`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`NPM`) REFERENCES `mahasiswa` (`NPM`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`KD_TUGAS`) REFERENCES `tugas` (`KD_TUGAS`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `FK_KODEUSER_DOSEN` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`USERNAME`),
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `dosen` (`KD_DOSEN`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`NPM`) REFERENCES `mahasiswa` (`NPM`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`KD_MATKUL`) REFERENCES `matakuliah` (`KD_MATKUL`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_KODEUSER_MAHASISWA` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`USERNAME`),
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `mahasiswa` (`NPM`);

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`KD_DOSEN`) REFERENCES `dosen` (`KD_DOSEN`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`KD_MATKUL`) REFERENCES `matakuliah` (`KD_MATKUL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
