-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 09:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ice0cjnea73dh`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsignature`
--

CREATE TABLE `addsignature` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `CarDiesel` varchar(100) NOT NULL,
  `DeliveryCharges` varchar(100) NOT NULL,
  `DeliveryOrder` varchar(100) NOT NULL,
  `ATM` varchar(100) NOT NULL,
  `Cash` varchar(100) NOT NULL,
  `Transfer` varchar(100) NOT NULL,
  `TotalExpemses` varchar(100) NOT NULL,
  `TotalDiscount` varchar(100) NOT NULL,
  `salesSystem` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branchesjhyt`
--

CREATE TABLE `branchesjhyt` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userId` varchar(200) NOT NULL,
  `staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branchesjhyt`
--

INSERT INTO `branchesjhyt` (`id`, `uniqKey`, `branchName`, `address`, `date`, `userId`, `staff`) VALUES
(1, 'jgyyghgfgfchi6546r7tiuh', 'hq hotoro', 'gjvbjkhjbkjbhgvhjjbkhghgjk', '2020-12-12 22:31:15', 'bnhjjgye4567rt6drythfy5dt', 34),
(2, 'MNHGFXGCHVJB56IGYTYCF', 'Tarauni H', 'HK KN. NG.', '2020-12-15 05:44:19', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `cashendoftheday`
--

CREATE TABLE `cashendoftheday` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items78fyu`
--

CREATE TABLE `items78fyu` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `itemsleft`
--

CREATE TABLE `itemsleft` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `itemsreturn`
--

CREATE TABLE `itemsreturn` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `difference` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logstable`
--

CREATE TABLE `logstable` (
  `id` int(11) NOT NULL,
  `userKey` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `ipAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logstable`
--

INSERT INTO `logstable` (`id`, `userKey`, `username`, `date`, `time`, `ipAddress`) VALUES
(9, 'gufjgd8673rytgh876q34567trfuoesddsz', 'admin1', '31/12/2020', '07:12:14 am', '127.0.0.1'),
(10, 'gufjgd8673rytgh876q34567trfuoesddsz', 'admin1', '31/12/2020', '09:12:57 am', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `mem74fi4rdh`
--

CREATE TABLE `mem74fi4rdh` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updatee` varchar(1) NOT NULL,
  `codeKey` varchar(100) NOT NULL,
  `branch` varchar(200) NOT NULL DEFAULT 'nill',
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mem74fi4rdh`
--

INSERT INTO `mem74fi4rdh` (`id`, `uniqKey`, `firstName`, `lastName`, `email`, `username`, `password`, `updatee`, `codeKey`, `branch`, `dateJoined`) VALUES
(1, 'gufjgd8673rytgh876q34567trfuoesddsz', 'admin', 'admin one', 'admin1@gmail.com', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '0', 'admin', 'nill', '2020-12-31 06:02:21'),
(2, 'fyguhjjh87654678g9ubyvu', 'branch', 'branch one', 'branch1@gmail.com', 'branch1', '202cb962ac59075b964b07152d234b70', '1', 'branch', 'Diplomatic Quarter', '2020-12-30 19:39:19'),
(3, 'hgjfrd543567890yuvghbih', 'kichen', 'kitvhen one', 'kitchen1@gmail.com', 'kitchen1', 'e10adc3949ba59abbe56e057f20f883e', '0', 'kitchen', 'nill', '2020-12-28 09:12:27'),
(4, '4160Etw%h(Ab4NC6S5d3VpXsrzkF84230', 'jkhjk', 'jk', 'jk2J@D.C', 'STF/KTC/891', '202cb962ac59075b964b07152d234b70', '', 'kitchen', 'nill', '2020-12-30 19:53:02'),
(5, '6389nW)oa(ksu0VQXcHFMEew1593%3710', 'dssds', 'fddvc', 'ds@f.comm', 'STF/DQ/491', 'e10adc3949ba59abbe56e057f20f883e', '1', 'branch', 'Diplomatic Quarter', '2020-12-31 06:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `requestitems`
--

CREATE TABLE `requestitems` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(200) NOT NULL,
  `items` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `staff` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salesreport78u`
--

CREATE TABLE `salesreport78u` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `diesel` varchar(100) NOT NULL,
  `carPetrol` varchar(100) NOT NULL,
  `otherExpensive` varchar(255) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `totalExpensive` varchar(100) NOT NULL,
  `totalCash` varchar(100) NOT NULL,
  `ATM` varchar(100) NOT NULL,
  `totalSales` varchar(100) NOT NULL,
  `salesInSystem` varchar(100) NOT NULL,
  `diffrences` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesreport78u`
--

INSERT INTO `salesreport78u` (`id`, `uniqKey`, `date`, `time`, `delivery`, `diesel`, `carPetrol`, `otherExpensive`, `discount`, `totalExpensive`, `totalCash`, `ATM`, `totalSales`, `salesInSystem`, `diffrences`, `signature`, `branch`, `dateReported`) VALUES
(1, '466%QLNt6%8ZH]l4IaVGdPe9SoFi717', '13/12/2020 Sunday', '12:12:09 pm', 'mklnmlk', 'lkln', 'nlknkl', 'kl', 'kl', 'kl', 'jkkj', 'lknklklkln', 'kknlklnnkl', 'joj', 'ojkkj', 'Branch A B', 'Tarauni H', '2020-12-15 07:42:09'),
(2, '578rc]kBsAu8mKia1PwQ7Sf9b6Lo848', '13/12/2020 Sunday', '12:12:26 pm', 'mklnmlk', 'lkln', 'nlknkl', 'kl', 'kl', 'kl', 'jkkj', 'lknklklkln', 'kknlklnnkl', 'joj', 'ojkkj', 'Branch A B', '', '2020-12-13 11:44:26'),
(3, '416Cm%oZQ]8lrbFq%DYGTEpIwc(9763', '13/12/2020 Sunday', '02:12:43 pm', 'njbnknkjb', 'jkjbkbjbjk', 'jkbjkbjk', 'jkbjkjbjkb', 'jkbjkbkjbjk', 'hjhjjh', 'jkbbkjjbkj', 'jbkbjkbjk', 'jkbjbk', 'nkn kn', 'jkkjkj', 'Branch A B', '', '2020-12-13 13:24:43'),
(4, '400S6nAWVy8XDsR5feNupt)LHTrq843', '13/12/2020 Sunday', '02:12:41 pm', 'njbnknkjb', 'jkjbkbjbjk', 'jkbjkbjk', 'jkbjkjbjkb', 'jkbjkbkjbjk', 'hjhjjh', 'jkbbkjjbkj', 'jbkbjkbjk', 'jkbjbk', 'nkn kn', 'jkkjkj', 'Branch A B', 'branch', '2020-12-13 13:25:41'),
(5, '516jyzV6ugGk]e9cQ7NaA%mL0q%1703', '13/12/2020 Sunday', '02:12:23 pm', 'njbnknkjb', 'jkjbkbjbjk', 'jkbjkbjk', 'jkbjkjbjkb', 'jkbjkbkjbjk', 'hjhjjh', 'jkbbkjjbkj', 'jbkbjkbjk', 'jkbjbk', 'nkn kn', 'jkkjkj', 'Branch A B', 'branch', '2020-12-13 13:28:23'),
(6, '530zCUyIqwt%kGlTHQ[phN]Ke7L3779', '13/12/2020 Sunday', '02:12:48 pm', 'njbnknkjb', 'jkjbkbjbjk', 'jkbjkbjk', 'jkbjkjbjkb', 'jkbjkbkjbjk', 'hjhjjh', 'jkbbkjjbkj', 'jbkbjkbjk', 'jkbjbk', 'nkn kn', 'jkkjkj', 'Branch A B', 'branch', '2020-12-13 13:28:48'),
(7, '549S%lgs3AuUp2c[DCiqLjYhtoIM710', '13/12/2020 Sunday', '02:12:40 pm', 'njbnknkjb', 'jkjbkbjbjk', 'jkbjkbjk', 'jkbjkjbjkb', 'jkbjkbkjbjk', 'hjhjjh', 'jkbbkjjbkj', 'jbkbjkbjk', 'jkbjbk', 'nkn kn', 'jkkjkj', 'Branch A B', 'branch', '2020-12-13 13:29:40'),
(8, '507dzFHxRqhop%1Gg6k%(l9SvZVK931', '13/12/2020 Sunday', '02:12:27 pm', 'mlknlkn', 'kln', 'nkl', 'l', 'n', 'n', 'nk', 'klnknk', 'klnnkllk', 'kllkkl', 'klnkllk', 'njkbb jkbjk', 'hq hotoro', '2020-12-13 13:31:27'),
(9, '546HPrXylpx)68%2f1jBEg(dF0G5698', '15/12/2020 Tuesday', '01:12:36 pm', '200', '200', '200', '200', '200', '200', '200', '200', '200', '200', '200', 'Branch A B', 'Tarauni H', '2020-12-15 12:07:36'),
(10, '502qw](0N4CcT8sAfVl9pdkIgP2n782', '17/12/2020 Thursday', '11:12:51 am', '56', '67567', '5676567', '5676', '6755675', '67567', '6567', '6767', '6576', '7676', '77667', 'Branch A B', 'Tarauni H', '2020-12-17 10:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE `sentitems` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(100) NOT NULL,
  `items` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentitems`
--

INSERT INTO `sentitems` (`id`, `uniqKey`, `items`, `quantity`, `branch`, `staff`, `date`, `time`, `dateAdded`) VALUES
(20, '4050rKClxFau7VXqiTZh[Nk%Hz0eR2933', 'cup', 'RW', 'Riyard Front', 'kitchen1', '27/12/2020', '06:12:19 am', '2020-12-28 05:12:45'),
(21, '5349s)Gt%0UwZjK%I4LP3eQy2qnap4630', 'cup', 'RW', 'Riyard Front', 'kitchen1', '28/12/2020', '06:12:19 am', '2020-12-28 05:12:19'),
(22, '4793vgZJI]%bTXwCNxs6[5yWq(1p85939', 'spoon', '34', 'Riyard Front', 'kitchen1', '28/12/2020', '06:12:19 am', '2020-12-28 05:12:19'),
(23, '4278d8n(QY6go7ArxTjHy0KhGvC9Z3814', 'Plate', '34', 'Riyard Front', 'kitchen1', '28/12/2020', '06:12:19 am', '2020-12-28 05:12:19'),
(24, '52987aOyUI1tVrJYQXoKn9qFhbs6%4927', 'milk', '342', 'Riyard Front', 'kitchen1', '28/12/2020', '06:12:19 am', '2020-12-28 05:12:19'),
(25, '4178AiqyefEXm3KFcB%wYZa[OkD2G3585', 'bournvita', '3', 'Riyard Front', 'kitchen1', '28/12/2020', '06:12:19 am', '2020-12-28 05:12:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsignature`
--
ALTER TABLE `addsignature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchesjhyt`
--
ALTER TABLE `branchesjhyt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashendoftheday`
--
ALTER TABLE `cashendoftheday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items78fyu`
--
ALTER TABLE `items78fyu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemsleft`
--
ALTER TABLE `itemsleft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemsreturn`
--
ALTER TABLE `itemsreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logstable`
--
ALTER TABLE `logstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem74fi4rdh`
--
ALTER TABLE `mem74fi4rdh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestitems`
--
ALTER TABLE `requestitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreport78u`
--
ALTER TABLE `salesreport78u`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addsignature`
--
ALTER TABLE `addsignature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branchesjhyt`
--
ALTER TABLE `branchesjhyt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashendoftheday`
--
ALTER TABLE `cashendoftheday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items78fyu`
--
ALTER TABLE `items78fyu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemsleft`
--
ALTER TABLE `itemsleft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemsreturn`
--
ALTER TABLE `itemsreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logstable`
--
ALTER TABLE `logstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mem74fi4rdh`
--
ALTER TABLE `mem74fi4rdh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requestitems`
--
ALTER TABLE `requestitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesreport78u`
--
ALTER TABLE `salesreport78u`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sentitems`
--
ALTER TABLE `sentitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
