-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 05:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tech_final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `allorders`
--

CREATE TABLE `allorders` (
  `orderid` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `fooditemid` int(11) DEFAULT NULL,
  `fooditemname` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `customername` varchar(30) DEFAULT NULL,
  `restaurantid` int(11) DEFAULT NULL,
  `restaurantname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allorders`
--

INSERT INTO `allorders` (`orderid`, `status`, `fooditemid`, `fooditemname`, `quantity`, `totalprice`, `customerid`, `customername`, `restaurantid`, `restaurantname`) VALUES
(1, 'pending', 1, 'Fried Rice', 3, 1299, 1, 'Zaman', 0, 'KFC'),
(2, 'pending', 2, 'Crispy Chicken', 2, 210, 1, 'Zaman', 1, 'CPFC'),
(3, 'pending', 2, 'Crispy Chicken', 4, 420, 1, 'Zaman', 1, 'CPFC'),
(4, 'pending', 2, 'Crispy Chicken', 1, 105, 1, 'Zaman', 1, 'CPFC'),
(5, 'pending', 2, 'Crispy Chicken', 1, 105, 1, 'Zaman', 1, 'CPFC'),
(6, 'pending', 2, 'Crispy Chicken', 400, 42000, 1, 'Zaman', 1, 'CPFC'),
(7, 'pending', 2, 'Crispy Chicken', 999, 104895, 1, 'Zaman', 1, 'CPFC');

-- --------------------------------------------------------

--
-- Table structure for table `allrestaurants`
--

CREATE TABLE `allrestaurants` (
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `review` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allrestaurants`
--

INSERT INTO `allrestaurants` (`name`, `id`, `address`, `ownerid`, `balance`, `review`) VALUES
('KFC', 0, 'Dhanmondi 9/B', 5, 1020000, 5),
('CPFC', 1, 'Asadgate, Mohammadpur', 17, 1100200, 5),
('Burger King', 2, 'Banani', 19, 1100000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `username` varchar(30) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `balance` int(8) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`username`, `userid`, `password`, `email`, `address`, `balance`, `usertype`) VALUES
('mr_admin', 0, 'mr_admin!', 'admin@gmail.com', 'Dhanmondi', 1200000, 'admin'),
('Zaman', 1, 'Zaman!!!', 'Z@Z.comxx', 'Nakhalpara', 230000, 'customer'),
('Mihad', 2, 'ffdertqw!@', 'mihad@gmail.com', 'New Market', 23100, 'customer'),
('Nousheen2', 3, 'nousheen!', 'nousheen@gmail.com', 'New Market', 23100, 'customer'),
('aaa', 4, '12345679!', 'shahriarzaman44@gmail.com', 'kuratoli', 20000, 'customer'),
('mr_restaurantowner', 5, 'mr_restaurantowner!', 'ro@gmail.comasdfg', 'Dhanmondi 9/B', 21000, 'restaurantOwner'),
('Afroja', 6, 'Afroja!!', 'afroja@gmail.com', 'dhaka', 20000, 'customer'),
('Peter Griffin', 7, 'dummy!!!', 'dummy@gmail.com', 'Dummylandsx', 20000, 'customer'),
('Super dummy23ddx', 10, 'dummy!!!', 'dummy@gmail.comsx2s', 'Dusmmylandsxs Land', 20000, 'customer'),
('new name', 11, '12345678!@', 'shahriarzaman44@gmail.com2', 'kuratoli', 2000034, 'customer'),
('Iliyas Rahman', 14, 'Iliyas Rahman!', 'ir@hotmail.com', 'kuratoli', 20000, 'customer'),
('Manager1', 15, 'Manager1!', 'Manager1@gmail.com', 'Bashundhara', 12300, 'restaurantManager'),
('Manager2', 16, 'Manager2!', 'Manager2@yahoo.com', 'Uttara', 3400, 'restaurantManager'),
('Chowdhury Ali2', 17, 'Chowdhury Ali!', 'CA@outlook.com', 'Asadgate, Mohammadpur', 21000, 'restaurantOwner'),
('ManagerCPFC1', 18, 'ManagerCPFC1!', 'ManagerCPFC1@gmail.com', 'Baily road', 1200, 'restaurantManager'),
('Ahsan Uddin', 19, 'qwerty!@', 'au@gmail.com', 'Banani', 21000, 'restaurantOwner');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantsandfooditems`
--

CREATE TABLE `restaurantsandfooditems` (
  `restaurantname` varchar(40) DEFAULT NULL,
  `restaurantid` int(11) DEFAULT NULL,
  `fooditemname` varchar(40) DEFAULT NULL,
  `fooditemid` int(11) NOT NULL,
  `fooditemprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurantsandfooditems`
--

INSERT INTO `restaurantsandfooditems` (`restaurantname`, `restaurantid`, `fooditemname`, `fooditemid`, `fooditemprice`) VALUES
('KFC', 0, 'Fried Rice', 1, 433),
('CPFC', 1, 'Crispy Chicken', 2, 105);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantsandmanagers`
--

CREATE TABLE `restaurantsandmanagers` (
  `restaurantname` varchar(30) DEFAULT NULL,
  `restaurantid` int(11) DEFAULT NULL,
  `managername` varchar(30) DEFAULT NULL,
  `managerid` int(11) DEFAULT NULL,
  `managersalary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurantsandmanagers`
--

INSERT INTO `restaurantsandmanagers` (`restaurantname`, `restaurantid`, `managername`, `managerid`, `managersalary`) VALUES
('KFC', 0, 'Manager1', 15, 5600),
('KFC', 0, 'Manager2', 16, 7100),
('CPFC', 1, 'ManagerCPFC1', 18, 4734);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allorders`
--
ALTER TABLE `allorders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `allrestaurants`
--
ALTER TABLE `allrestaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurantsandfooditems`
--
ALTER TABLE `restaurantsandfooditems`
  ADD PRIMARY KEY (`fooditemid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
