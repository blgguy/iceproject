-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 05:52 PM
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

--
-- Dumping data for table `cashendoftheday`
--

INSERT INTO `cashendoftheday` (`id`, `uniqKey`, `name`, `quantity`, `branch`, `staff`, `date`, `time`) VALUES
(1, '499)jru7dR%mDWJ[9Kly1z(0]Iit8099', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '1', '0'),
(2, '481tfbRKAd7G)WQy3OwlC]1Ssjmo8852', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '7', '4'),
(3, '424YGl%WSy9sw]gFe%6hP3NXx%jC7133', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '/', ':'),
(4, '564G]r1j0Bvg%XY2KxfM[ZakWUPR6782', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '1', '1'),
(5, '460tIDfiwq[TpcAB5hE)CuL3SbKm8539', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '1', '0'),
(6, '418Qngwvj)koL5zOMeD(rsFhWTK[8215', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '7', '4'),
(7, '472cdjKQlb%2E3xmf(7wOz4GvDVe7169', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '/', ':'),
(8, '476%vesq4Th67%zpgZJ[S5MFC81m7303', 'Total Expenses', 'gyhg', 'Diplomatic Quarter', 'branchA Bn branch', '1', '1');

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

--
-- Dumping data for table `items78fyu`
--

INSERT INTO `items78fyu` (`id`, `uniqKey`, `title`, `date`) VALUES
(2, '64780WZJBma%XcFQqywlonfzk2ARU5554', 'cup', '2020-12-13 06:25:23'),
(3, '4393QdIB5kqTV%p%RPnGNHmaW1eEj6247', 'spoon', '2020-12-13 06:25:55'),
(4, '5814%OVyr%iLphcaI%dkJK8g[Mv)w2520', 'Plate', '2020-12-13 10:50:01'),
(5, '5955woG%lxm61ObjTIueZ4zPF0MY93348', 'milk', '2020-12-17 12:32:36'),
(6, '40037i9SrdY0QwkJ5g%mIbNj1Eezf4403', 'kjbhcxkj', '2020-12-17 16:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `itemsleft`
--

CREATE TABLE `itemsleft` (
  `id` int(11) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `reasons` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemsleft`
--

INSERT INTO `itemsleft` (`id`, `uniqKey`, `branch`, `reasons`, `date`, `item`, `quantity`) VALUES
(1, 'cfghjkrd657fg', 'Tarauni H', 'ghjbnbkh jhk kjb hkj jk', 'jk/hk/jk90', 'cup', '56'),
(2, 'xdgfchvjkl46d57yi', 'Tarauni H', 'no resons', '4/9/689', 'spoon', '67'),
(3, 'hjghbnjhgtr657', 'hq hotoro', 'bhjhjbjh', '3/3/3', 'ddhgsj', '5678');

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

--
-- Dumping data for table `itemsreturn`
--

INSERT INTO `itemsreturn` (`id`, `uniqKey`, `items`, `quantity`, `staff`, `branch`, `reason`, `difference`, `date`, `time`, `timestamp`) VALUES
(1, '4032xde3bRMUZSmz%iaBXrw)If0cH6377', 'milk', '65', 'branchA Bn branch', 'Diplomatic Quarter', 'ghhg', 'guhg', '17/12/2020', '04:12:50 pm', '2020-12-17 15:41:50'),
(2, '4590BMhAP9wjqunyU0kdKlZQV%XmJ3185', 'milk', '65', 'branchA Bn branch', 'Diplomatic Quarter', 'ghhg', 'guhg', '17/12/2020', '04:12:50 pm', '2020-12-17 15:41:50'),
(3, '4891rSiHK1OcyDkaFv[fbXW(YgECj4299', 'milk', '65', 'branchA Bn branch', 'Diplomatic Quarter', 'ghhg', 'guhg', '17/12/2020', '04:12:50 pm', '2020-12-17 15:41:50'),
(4, '5585yhApv%DJS3(qr58QUzRx1swXt3401', 'cup', '', 'hjbhbj njkj', '<br><b>Notice</b>:  Undefined variable: branch in <b>C:xampphtdocsSHAMROCKiceranch2.php</b> on line <b>318</b><br>', '', '', '17/12/2020', '05:12:18 pm', '2020-12-17 16:22:18'),
(5, '5249TWR0%O3jBoMD51wbJ6P[zmLQA3992', 'cup', '', 'hjbhbj njkj', '<br><b>Notice</b>:  Undefined variable: branch in <b>C:xampphtdocsSHAMROCKiceranch2.php</b> on line <b>318</b><br>', '', '', '17/12/2020', '05:12:18 pm', '2020-12-17 16:22:18'),
(6, '6378jPJ%tTDWxQR[LMF40EN)K3Ien6082', 'cup', 't678', 'hjbhbj njkj', '<br><b>Notice</b>:  Undefined variable: branch in <b>C:xampphtdocsSHAMROCKiceranch2.php</b> on line <b>318</b><br>', 'gjjvgh', 'huy', '17/12/2020', '05:12:19 pm', '2020-12-17 16:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `logstable`
--

CREATE TABLE `logstable` (
  `id` int(11) NOT NULL,
  `userKey` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `ipAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logstable`
--

INSERT INTO `logstable` (`id`, `userKey`, `date`, `time`, `ipAddress`) VALUES
(1, 'mbdhcbvsdfgtwrwkdb4i4y', '12/Dec/2020 Saturday', '11:12:46 pm', '1235.9768.90.8'),
(2, 'mbdhcbvsdfgtwrwkdb4i4y', 'Saturday 12/Dec/2020', '11:12:19 pm', '::1'),
(3, 'y5e6rtugvhvsr45r6ytfdryg', 'Sunday 13/Dec/2020', '06:12:54 am', '::1'),
(4, 'y5e6rtugvhvsr45r6ytfdryg', 'Sunday 13/Dec/2020', '06:12:47 am', '::1'),
(5, 'y5e6rtugvhvsr45r6ytfdryg', 'Sunday 13/Dec/2020', '10:12:49 am', '::1'),
(6, 'bnhjjgye4567rt6drythfy5dt', 'Sunday 13/Dec/2020', '10:12:55 am', '::1'),
(7, 'y5e6rtugvhvsr45r6ytfdryg', 'Sunday 13/Dec/2020', '10:12:07 am', '::1'),
(8, 'bnhjjgye4567rt6drythfy5dt', 'Sunday 13/Dec/2020', '10:12:09 am', '::1'),
(9, 'jbhvgfhdy6rtrxdytu678h', 'Sunday 13/Dec/2020', '11:12:17 am', '::1'),
(10, 'jbhvgfhdy6rtrxdytu678h', 'Sunday 13/Dec/2020', '11:12:13 am', '::1'),
(11, '4212L)5BrhlF1ZcsUoyaxbJMQ7gwH6254', 'Sunday 13/Dec/2020', '11:12:46 am', '::1'),
(12, '4212L)5BrhlF1ZcsUoyaxbJMQ7gwH6254', 'Sunday 13/Dec/2020', '11:12:42 am', '::1'),
(13, 'jbhvgfhdy6rtrxdytu678h', 'Sunday 13/Dec/2020', '11:12:22 am', '::1'),
(14, '4916sMArleLcVZ%3[Y1XEQhpb%Fw)2412', 'Sunday 13/Dec/2020', '11:12:34 am', '::1'),
(15, 'jbhvgfhdy6rtrxdytu678h', 'Sunday 13/Dec/2020', '11:12:57 am', '::1'),
(16, '4098E7cnoLrSBI04ONx%D3afwutRY3044', 'Sunday 13/Dec/2020', '11:12:40 am', '::1'),
(17, 'jbhvgfhdy6rtrxdytu678h', 'Sunday 13/Dec/2020', '11:12:17 am', '::1'),
(18, 'bnhjjgye4567rt6drythfy5dt', 'Sunday 13/Dec/2020', '11:12:02 am', '::1'),
(19, '4916sMArleLcVZ%3[Y1XEQhpb%Fw)2412', 'Sunday 13/Dec/2020', '02:12:05 pm', '::1'),
(20, 'y5e6rtugvhvsr45r6ytfdryg', 'Sunday 13/Dec/2020', '02:12:42 pm', '::1'),
(21, 'bnhjjgye4567rt6drythfy5dt', 'Monday 14/Dec/2020', '07:12:44 am', '::1'),
(22, 'bnhjjgye4567rt6drythfy5dt', 'Tuesday 15/Dec/2020', '08:12:38 am', '::1'),
(23, 'y5e6rtugvhvsr45r6ytfdryg', 'Tuesday 15/Dec/2020', '08:12:25 am', '::1'),
(24, '5734NUDr7X4wMJba[RtTKV3)(9%Z82182', 'Tuesday 15/Dec/2020', '08:12:46 am', '::1'),
(25, 'bnhjjgye4567rt6drythfy5dt', 'Tuesday 15/Dec/2020', '08:12:13 am', '::1'),
(26, 'jbhvgfhdy6rtrxdytu678h', 'Tuesday 15/Dec/2020', '01:12:25 pm', '::1'),
(27, 'y5e6rtugvhvsr45r6ytfdryg', 'Tuesday 15/Dec/2020', '01:12:49 pm', '::1'),
(28, 'bnhjjgye4567rt6drythfy5dt', 'Tuesday 15/Dec/2020', '01:12:10 pm', '::1'),
(29, 'jbhvgfhdy6rtrxdytu678h', 'Wednesday 16/Dec/2020', '03:12:27 pm', '::1'),
(30, 'bnhjjgye4567rt6drythfy5dt', 'Thursday 17/Dec/2020', '11:12:23 am', '::1'),
(31, 'y5e6rtugvhvsr45r6ytfdryg', 'Thursday 17/Dec/2020', '12:12:31 pm', '::1'),
(32, 'bnhjjgye4567rt6drythfy5dt', 'Thursday 17/Dec/2020', '12:12:41 pm', '::1'),
(33, 'jbhvgfhdy6rtrxdytu678h', 'Thursday 17/Dec/2020', '12:12:45 pm', '::1'),
(34, 'y5e6rtugvhvsr45r6ytfdryg', 'Thursday 17/Dec/2020', '01:12:56 pm', '::1'),
(35, 'jbhvgfhdy6rtrxdytu678h', 'Thursday 17/Dec/2020', '03:12:12 pm', '::1'),
(36, '59144LGx12w[a)7(ASptoTUPE6O%e2419', 'Thursday 17/Dec/2020', '03:12:14 pm', '::1'),
(37, 'jbhvgfhdy6rtrxdytu678h', 'Thursday 17/Dec/2020', '04:12:40 pm', '::1'),
(38, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'Thursday 17/Dec/2020', '04:12:31 pm', '::1'),
(39, 'y5e6rtugvhvsr45r6ytfdryg', 'Thursday 17/Dec/2020', '04:12:30 pm', '::1'),
(40, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'Thursday 17/Dec/2020', '04:12:02 pm', '::1'),
(41, 'y5e6rtugvhvsr45r6ytfdryg', 'Thursday 17/Dec/2020', '05:12:20 pm', '::1'),
(42, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'Thursday 17/Dec/2020', '05:12:51 pm', '::1'),
(43, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'Thursday 17/Dec/2020', '05:12:24 pm', '::1'),
(44, 'y5e6rtugvhvsr45r6ytfdryg', 'Thursday 17/Dec/2020', '05:12:10 pm', '::1'),
(45, 'jbhvgfhdy6rtrxdytu678h', 'Thursday 17/Dec/2020', '05:12:30 pm', '::1'),
(46, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'Thursday 17/Dec/2020', '05:12:38 pm', '::1');

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
  `codeKey` varchar(100) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mem74fi4rdh`
--

INSERT INTO `mem74fi4rdh` (`id`, `uniqKey`, `firstName`, `lastName`, `email`, `username`, `password`, `codeKey`, `branch`, `dateJoined`) VALUES
(3, 'y5e6rtugvhvsr45r6ytfdryg', 'kitchen', 'B C', 'kitchen@gmail.com', 'kitchen', '$2y$08$SU7fnSrOoPeMSq4wvSxJZuJmk/sUY58hAZRz/TYDuObHiwEIYxqnC', 'kitchen', 'nill', '2020-12-15 07:15:37'),
(5, 'jbhvgfhdy6rtrxdytu678h', 'Admin', 'Admin', 'admin@gmail.com', 'admin', '$2y$08$nikARchzTxIS2X4xyq8FR.y6.5Avv032esIXFp1H3IQXpo6/MrGDK', 'admin', 'Nill', '2020-12-13 10:39:27'),
(10, '5734NUDr7X4wMJba[RtTKV3)(9%Z82182', 'Auwal Manga', 'ccc', 'maga@j.com', 'manga', '$2y$08$SU7fnSrOoPeMSq4wvSxJZuJmk/sUY58hAZRz/TYDuObHiwEIYxqnC', 'branch', 'hq hotoro', '2020-12-15 07:16:13'),
(16, '4820SPnZemGHLwRCd)EvT%tYyKVbx5426', 'jsdnjsd', 'sdfsdfvf', 'fvvffd@f.com', '496gFaOx698', '$2y$08$hM/iua3u9OLT8MMypGZMYe/utpq/xWT5GtVkjfXO01f3RWRiBVIEm', 'kitchen', 'Tarauni H', '2020-12-16 19:06:37'),
(17, '5562[ZkOJ)wx4KCvSpyuI9(%rHsQf5223', 'dds', 'fgh', 'cs@df.cv', '20//463241', '$2y$08$gDp/b973GlsBMxTi0wkm7OcmkIfzGtKWIeBgsraPV7po5gQ7.0Mee', 'kitchen', 'Tarauni H', '2020-12-16 19:09:18'),
(20, '6383)lFhsbC2H[W]VZQA6TBnLqD8t3387', 'kjkn', 'njnjkjj', 'jnjn@j.co', '20//457593', '$2y$08$j308VjIkFh6oMI2TDTpbmuIDqe49qtTKlx1.bBlPVHvjpgbwiL..y', 'branch', 'Tarauni H', '2020-12-17 02:17:17'),
(23, '6276zR]vh)LKGfUl%7%S2%icue0[d5384', 'jkjnj', 'jkkjnjknj', 'jjk@j.c', '20/hq /404834', '$2y$08$tLgOiyTfXRy6BA3h/qrxpec0cuaCgyeQTJ1E2T7UzQWb/AzTs903O', 'branch', 'hq hotoro', '2020-12-17 07:43:37'),
(24, '5211HfM)opqlRtA]J983u6r0CWILs4659', 'kmsdlkds', 'dskdskj', 'dskj@mdmf.co', '20/Tar/429426', '$2y$08$SKQ6dy1Dnit2RHUybKAlyubfqBL6ZGaKP1h9BVY/bs9kFD9MFA4yO', 'kitchen', 'Tarauni H', '2020-12-17 07:46:01'),
(25, '6454wUk)Yy2XshoOW9VG3CxNtdqSJ6284', 'hbkjbkj', 'kbjbjk', 'jkbb@fvg.co', '20/HQ/39879', '$2y$08$je59SFQyaLm.aDSwqWtv.uNWA0mGgMgynZdbQRtk2/AATcM7BSe0m', 'branch', 'hq hotoro', '2020-12-17 10:50:31'),
(26, '5155RNJ0(A]fFpz%1lOPtgMb)3K%c2071', 'hbhjkj', 'kjbkjjk', 'kjbbj@fg.co', '20/TA/43168', '$2y$08$zXhJikn/AnB0OVW71QGpgOt1okT.XIyetVjcMkrcZDkl/Vv1FASnm', 'kitchen', 'Tarauni H', '2020-12-17 10:51:06'),
(27, '521157RVbKzls]CtHr[NEZavGOo9P4242', 'jkdsbkjxbh', 'hbjvhj', 'vhjbvhjhj@fgh.co', '20/HQ/39411', '$2y$08$z9h0IlW6Y.THG/6OYU2IruAkyvg1R9UZD.JPb4jTuH7rmQo5IB1iS', 'kitchen', 'hq hotoro', '2020-12-17 10:54:02'),
(28, '6520D%puR1jlK5k0SUF8yP3EBXsgm3320', 'bkhbkhjb', 'kbkhbkj', 'hbjbj@hbhj.c', '20/HQ/35203', '$2y$08$i5Xei5V3p7f6vkR1U7o.QuzxefygiAROltT2Bbcv/auwjWkhw23di', 'kitchen', 'hq hotoro', '2020-12-17 11:44:11'),
(30, '5750FcrTgGOPRHC%ukALaSdb[oI9W6539', 'bkj', 'bkjkj', 'bkhj@fg.com', 'STF/DQ/158', '$2y$08$EHslu/d5XAD9IrP1qzw1J.xQPJs7xKgHaxJWlecDxtf.I7RjKoYEC', 'branch', 'Diplomatic Quarter', '2020-12-17 12:00:49'),
(31, '59144LGx12w[a)7(ASptoTUPE6O%e2419', 'branchA', 'Bn branch', 'b@b.com', 'STF/DQ/730', '$2y$08$Cnn7tgoAg00W8pht9aQ9Fud4j8NTVAkLgApfgBt.3umyuI3rMHZWi', 'branch', 'Diplomatic Quarter', '2020-12-17 14:50:59'),
(32, '6299jPXLOCfUq2h)%Virs]kS4Nd106548', 'hjbhbj', 'njkj', 'sample@g.com', 'STF/DQ/694', '$2y$08$SumSyxKkN/xeYRUdUCmcBOQVrP3S3JoJ162fQX8a24J8SrkW64CPi', 'branch', 'Diplomatic Quarter', '2020-12-17 15:45:21');

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
(1, '5253XYMB4pEg(wyT]r0adozeSfNuA3430', 'cup', '45', 'Diplomatic Quarter', 'kitchen', '18/12/2020', '05:12:34 pm', '2020-12-17 16:27:27'),
(2, '4949YUwJSTbi5V6Imvk(WO)GurQN16193', 'cup', '45', 'Diplomatic Quarter', 'kitchen', '17/12/2020', '05:12:34 pm', '2020-12-17 16:14:32'),
(3, '5547qFwTR%s51cJ)8(Uxz%CAlvd9f2189', 'spoon', '45', 'Diplomatic Quarter', 'kitchen', '17/12/2020', '05:12:34 pm', '2020-12-17 16:17:24'),
(4, '4496F[rKPJsWnBA7yj14Nha6%3Z9v5981', 'cup', '45', 'Select Branch', 'kitchen', '17/12/2020', '05:12:34 pm', '2020-12-17 16:09:34'),
(5, '58816sF%3R%7nP[vq8pGYwhB5Xlf02297', 'spoon', '445454', 'Select Branch', 'kitchen', '17/12/2020', '05:12:32 pm', '2020-12-17 16:41:32'),
(6, '5975h9FG[0rkiqVSX5nmftDwIEca65006', 'Plate', '', 'Diplomatic Quarter', 'kitchen', '17/12/2020', '05:12:48 pm', '2020-12-17 16:44:48'),
(7, '5006FZM6XvImJt)iKuly25P8kpqEH3599', 'Plate', '', 'Riyard Front', 'kitchen', '17/12/2020', '05:12:48 pm', '2020-12-17 16:44:48'),
(8, '4570f2%K6W8cND(%dh5JR0%OEg7Cm4201', 'Plate', '', 'Riyard Park', 'kitchen', '17/12/2020', '05:12:49 pm', '2020-12-17 16:44:49'),
(9, '51585pQBE%iAdjLJ[F%eGhnswY%qz2801', 'Plate', '', 'Diplomatic Quarter', 'kitchen', '17/12/2020', '05:12:55 pm', '2020-12-17 16:44:55'),
(10, '61557%)W1xpAly5]devic4frPRXQ82084', 'Plate', '', 'Riyard Front', 'kitchen', '17/12/2020', '05:12:55 pm', '2020-12-17 16:44:55'),
(11, '5364[L%oFV15(q8huIsfzybrNMOQ24251', 'Plate', '', 'Riyard Park', 'kitchen', '17/12/2020', '05:12:55 pm', '2020-12-17 16:44:55');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `branchesjhyt`
--
ALTER TABLE `branchesjhyt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashendoftheday`
--
ALTER TABLE `cashendoftheday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items78fyu`
--
ALTER TABLE `items78fyu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itemsleft`
--
ALTER TABLE `itemsleft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itemsreturn`
--
ALTER TABLE `itemsreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logstable`
--
ALTER TABLE `logstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mem74fi4rdh`
--
ALTER TABLE `mem74fi4rdh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `salesreport78u`
--
ALTER TABLE `salesreport78u`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sentitems`
--
ALTER TABLE `sentitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
