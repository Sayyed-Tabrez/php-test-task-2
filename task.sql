-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 08:11 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `DATE_TXT` text NOT NULL,
  `DATE_FORMAT` date NOT NULL,
  `EMP_ID` text NOT NULL,
  `NAME` text NOT NULL,
  `WORKING_TYPE` text NOT NULL,
  `START_TIME` text NOT NULL,
  `END_TIME` text NOT NULL,
  `STORE_ID` text NOT NULL,
  `STORE_NAME` text NOT NULL,
  `CREATED_DATE_TIME` datetime NOT NULL,
  `UPDATED_DATE_TIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `DATE_TXT`, `DATE_FORMAT`, `EMP_ID`, `NAME`, `WORKING_TYPE`, `START_TIME`, `END_TIME`, `STORE_ID`, `STORE_NAME`, `CREATED_DATE_TIME`, `UPDATED_DATE_TIME`) VALUES
(1, '2019-10-15', '2019-10-15', '1237780', 'kimmy ', 'working time', '8:00', '19:00', 'RAJD6000883', 'Junbo Store', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(2, '2019-10-15', '2019-10-15', '1237780', 'kimmy ', 'lunch', '12:00', '13:00', '', '', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(3, '2019-10-15', '2019-10-15', '1237780', 'kimmy ', 'break', '15:00', '15:30', '', '', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(4, '2019-10-15', '2019-10-15', '1237780', 'kimmy ', 'training', '16:00', '17:00', 'RAJD6000883', 'Multiplex samsung', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(5, '2019-10-15', '2019-10-15', '1237780', 'kimmy ', 'route', '18:00', '19:00', 'RAJD6000883', 'ABC Mart', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(6, '2019-10-16', '2019-10-16', '1237780', 'kimmy ', 'day off', '', '', '', '', '2021-02-06 20:48:24', '2021-02-06 20:48:24'),
(7, '2019-10-17', '2019-10-17', '1237780', 'kimmy ', 'leave', '', '', '', '', '2021-02-06 20:48:24', '2021-02-06 20:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `reimbursement`
--

CREATE TABLE `reimbursement` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `reimbur_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `purpose` text NOT NULL,
  `purpose_desc` text NOT NULL,
  `mode` text NOT NULL,
  `mode_desc` text NOT NULL,
  `km` int(11) NOT NULL,
  `invno` text NOT NULL,
  `amount` double NOT NULL,
  `attachment` text NOT NULL,
  `to_dis` text NOT NULL,
  `form_dis` text NOT NULL,
  `hotel_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reimbursement`
--

INSERT INTO `reimbursement` (`id`, `type`, `reimbur_date`, `from_date`, `to_date`, `purpose`, `purpose_desc`, `mode`, `mode_desc`, `km`, `invno`, `amount`, `attachment`, `to_dis`, `form_dis`, `hotel_name`) VALUES
(1, 'Conveyance', '2021-01-01', '0000-00-00', '0000-00-00', 'Training', '', 'Bike', '', 10, 'testing invoc', 100, 'attachments/2021_02_2021_00_01_21-templateShedule.xlsx', 'kurla', 'dadar', ''),
(2, 'Conveyance', '2021-01-01', '0000-00-00', '0000-00-00', 'Training', '', 'Bike', '', 10, 'testing invoc', 100, 'attachments/2021_02_2021_00_03_48-templateShedule.xlsx', 'kurla', 'dadar', ''),
(3, 'Conveyance', '2021-01-01', '0000-00-00', '0000-00-00', 'Training', '', 'Bike', '', 10, 'testing invoc', 100, 'attachments/2021_02_2021_00_04_27-templateShedule.xlsx', 'kurla', 'dadar', ''),
(4, 'Hotel', '2021-02-01', '2021-01-10', '2021-01-02', '', '', '', '', 0, 'testing invoc', 100, 'attachments/2021_02_2021_00_15_12-templateShedule.xlsx', '', '', 'Taj Mumbai'),
(5, 'Hotel', '2021-02-01', '2021-01-10', '2021-01-02', '', '', '', '', 0, 'testing invoc', 100, 'attachments/2021_02_2021_00_15_26-templateShedule.xlsx', '', '', 'Taj Mumbai'),
(6, 'Hotel', '2021-02-01', '2021-01-10', '2021-01-02', '', '', '', '', 0, 'testing invoc', 100, '', '', '', 'Taj Mumbai'),
(7, 'Food', '2021-02-01', '0000-00-00', '0000-00-00', '', '', '', '', 0, 'testing invoc', 100, '', '', '', ''),
(8, 'Food', '2021-02-01', '0000-00-00', '0000-00-00', '', '', '', '', 0, 'testing invoc', 100, '', '', '', ''),
(9, 'Mobile', '2021-03-01', '0000-00-00', '0000-00-00', '', '', '', '', 0, 'testing invoc', 100, '', '', '', ''),
(10, 'Internet', '2021-01-01', '0000-00-00', '0000-00-00', '', '', '', '', 0, 'testing invoc', 100, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reimbursement`
--
ALTER TABLE `reimbursement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reimbursement`
--
ALTER TABLE `reimbursement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
