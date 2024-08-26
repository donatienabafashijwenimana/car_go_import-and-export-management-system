-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 10:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_go`
--

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `funitureid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `exportid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `exportdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`funitureid`, `exportid`, `exportdate`, `qty`, `quantity`) VALUES
(003, 001, '2024-05-20', 0, 276),
(003, 003, '2024-05-21', 40, 276),
(003, 004, '2024-05-22', 86, 276),
(003, 005, '2024-05-27', 80, 276),
(003, 006, '2024-06-13', 70, 276);

-- --------------------------------------------------------

--
-- Table structure for table `funiture`
--

CREATE TABLE `funiture` (
  `furnitureid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `furniturename` varchar(255) NOT NULL,
  `furnitureownername` varchar(100) NOT NULL,
  `totalimport` int(10) NOT NULL,
  `totalexport` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funiture`
--

INSERT INTO `funiture` (`furnitureid`, `furniturename`, `furnitureownername`, `totalimport`, `totalexport`) VALUES
(003, 'bed', 'alex', 99, 104),
(006, 'chair', 'kanamu', 0, 0),
(007, 'table', 'chantal', 0, 0),
(008, 'patrick', 'kissy', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `funitureid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `importid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `importdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`funitureid`, `importid`, `importdate`, `qty`, `quantity`) VALUES
(003, 007, '2024-05-20', 23, 930),
(003, 009, '2024-06-21', 33, 930),
(006, 011, '2024-05-22', 20, 20),
(003, 012, '2024-05-22', 1030, 930),
(007, 013, '2024-06-13', 10, 10),
(003, 014, '2024-06-13', 100, 930);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
(002, 'alex', '12345'),
(003, 'ishfab', '12345'),
(004, 'gatore', '123456'),
(005, 'SHALOM', '12345678'),
(006, 'justin', '12345678'),
(007, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`exportid`),
  ADD KEY `funitureid` (`funitureid`);

--
-- Indexes for table `funiture`
--
ALTER TABLE `funiture`
  ADD PRIMARY KEY (`furnitureid`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`importid`),
  ADD KEY `funitureid` (`funitureid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `exportid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funiture`
--
ALTER TABLE `funiture`
  MODIFY `furnitureid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `importid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`funitureid`) REFERENCES `funiture` (`furnitureid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`funitureid`) REFERENCES `funiture` (`furnitureid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
