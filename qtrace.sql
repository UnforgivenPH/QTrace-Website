-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 08:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qtrace`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_ID` int(11) NOT NULL,
  `QC_ID_Number` varchar(20) DEFAULT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_middleName` varchar(20) DEFAULT NULL,
  `user_Email` varchar(20) NOT NULL,
  `user_Password` varchar(255) NOT NULL,
  `user_Role` enum('citizen','admin','superadmin') NOT NULL,
  `user_birthDate` date NOT NULL,
  `user_sex` enum('female','male','other') NOT NULL,
  `user_contactInformation` bigint(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `created_At` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_ID`, `QC_ID_Number`, `user_lastName`, `user_firstName`, `user_middleName`, `user_Email`, `user_Password`, `user_Role`, `user_birthDate`, `user_sex`, `user_contactInformation`, `user_address`, `user_status`, `created_At`) VALUES
(6, '74373497704', 'Manongdo', 'Gerald', 'Pavillon', 'ipoglang@gmail.com', '$2y$10$ABJV3LTejJGIWKXjcUeS2eUr5/C6P0GzzkCkHWT15Vgyc7y7ThXJe', 'admin', '2005-09-12', 'other', 9562184010, 'blk 51 lt 49 noche buena st. ', 'active', '2026-01-11'),
(7, '97192855754', 'Tan', 'Kurt', 'Clet', 'KurtTan@gmail.com', '$2y$10$5x4VPncdSUs9Wg81LIVcbOlcXAsnik7C7ESH5OiSbyyr1UREM56EG', 'citizen', '2006-03-10', 'female', 43243432, '123', 'active', '2026-01-11'),
(8, '13285297641', 'Tarun', 'Dos', 'Hambala', 'unotarun@gmail.com', '$2y$10$EvF/NUVDM/.bTMFqifk7XOIKxLQgIsoTCXXu638sJianBQBIcy3hS', 'admin', '2006-08-31', 'male', 817398719824, '78c atherton st.', 'active', '2026-01-18'),
(9, '97516143278', 'Deguzman', 'Alexander', '', 'Alex@gmail.com', '$2y$10$ywLmsIXJnAuNf3JGK5FsFuZ0nKh352Ys9RG0x6trvnKgUDxOw4JCK', 'admin', '2005-11-04', 'male', 84579432, 'blk 51 lt 49 noche buena st. ', 'active', '2026-01-18'),
(11, '61558680511', 'Berango', 'Joemari', 'P.', 'j.berango@gmail.com', '$2y$10$pJcItWdROSFF4PlSrLqi/eu9BDtNU4m4M5KYn3kRHjkGXr.TYFiW6', 'admin', '2001-12-22', 'male', 5345375109, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante, quis gravid', 'active', '2026-01-20'),
(12, '78195285403', 'Pua', 'Mikhale', 'C.', 'r.pua@gmail.com', '$2y$10$06lZi09W21ks53wbJ5coD.0muqkZGWtonbWbZ81LrAJELReUQaLSy', 'citizen', '2005-10-02', 'female', 9932341581, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante, quis gravid', 'active', '2026-01-20'),
(13, '40881637885', 'Doe', 'John', 'L.', 'j.doe@gmail.com', '$2y$10$Nyt0x7UrImaDO17iBJ8VV.5fpegTvCCGr4D1iSl5kKQkc3aSwBvm2', 'citizen', '1995-02-14', 'male', 1237234761, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante, quis gravid', 'active', '2026-01-20'),
(14, '86180871186', 'Mendoza', 'Prince', 'H.', 'p.mendoza@gmail.com', '$2y$10$LyDd2jZqz.9hCFl.D4Y0juWuK5LE8oOZBTQNZEOlYqdO8OT.2ncua', 'citizen', '2005-11-12', 'male', 1445611221, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante, quis gravid', 'active', '2026-01-20'),
(15, '46688937833', 'Lozada', 'Juan', 'S.', 'j.lozada@gmail.com', '$2y$10$qxuHkIdqFQ/.3a7/Gs.Qi.gpU6ALoywqLPx/ccZdZ0t/31VRxOyEK', 'citizen', '1997-06-18', 'male', 2345121234, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ', 'active', '2026-01-20'),
(16, '21180117990', 'Montifalco', 'Alex', 'G.', 'a.montifalco@gmail.c', '$2y$10$tu5uIE/IIeeEx6oqB/pwgusmhtZeNSri.UzRkebU1O5oPKqW2hb4m', 'citizen', '2005-08-15', 'male', 3453612321, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante', 'active', '2026-01-20'),
(17, '33094395895', 'Vance', 'Julianne', 'F.', 'j.vance@gmail.com', '$2y$10$5ikescmTbPXa7yyk8zeeEe2LzBGd0FQzkT7voX4lnnBIrPVWbCwt2', 'citizen', '1999-01-05', 'female', 5028419376, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante', 'active', '2026-01-20'),
(18, '80100760397', 'Thorne', 'Dominic', 'G.', 'd.thorne@gmail.com', '$2y$10$2IMXI/WZDMgdpVYIMRrHheHv/gBmIMj4QFKMZ.u5hosD6ghqqQnFu', 'citizen', '1989-06-19', 'male', 1930527748, ' Pellentesque faucibus est ante, quis gravida ligula pharetra sed. Proin dapibus, massa sit amet ali', 'active', '2026-01-20'),
(19, '18342082231', 'Sterling', 'Elara', 'Q.', 'e.sterling@gmail.com', '$2y$10$HA.iayGl8A38qXGoJ17zAOE6DOy1eliC4uEQzaKk6tPpPLeP7YXeC', 'citizen', '1971-05-11', 'female', 8271640593, 'gravida, ipsum ac sollicitudin hendrerit, mauris mauris feugiat justo, et pulvinar nunc quam vitae e', 'active', '2026-01-20'),
(20, '51588060498', 'Montgomery', 'Kellan', 'B.', 'k.montgomery@gmail.c', '$2y$10$ugYmY7Ua4SWaB/iX.SqiMeA7Dp75N3U5g0pCLHJpEqkg41mbHa7Cq', 'citizen', '1994-10-13', 'male', 5028419376, 'Fusce eget lectus diam. Suspendisse varius sem arcu, eu sagittis mauris blandit vitae.', 'active', '2026-01-20'),
(21, '53249342920', 'Rhodes', 'Sienna', 'L.', 's.rhodes@gmail.com', '$2y$10$qVi.IJTqky/p/oJ1knfakuYkkDNpWU0h4VCDVXFZ75H5A5sldArMW', 'citizen', '1998-10-29', 'female', 4039174700, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus est ante, quis gravid', 'active', '2026-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
