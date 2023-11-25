-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 06:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidura`
--

-- --------------------------------------------------------

--
-- Table structure for table `addevents`
--

CREATE TABLE `addevents` (
  `Event_ID` int(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Event_Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addevents`
--

INSERT INTO `addevents` (`Event_ID`, `User_Name`, `Event_Name`, `Location`, `Date`, `Details`) VALUES
(22, 'saman ', 'birthday', 'school', '2023-10-17', 'hello'),
(23, 'sineth', 'party', 'matara', '2023-10-31', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_type` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `account_number` int(50) NOT NULL,
  `year` int(50) NOT NULL,
  `bill_no` int(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pastcode` varchar(50) NOT NULL,
  `cvc` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `username`, `card_number`, `name`, `country`, `pastcode`, `cvc`, `month`, `year`) VALUES
(12, 'vidura', '4567890', 'vidura nirmal', 'Sri Lanka', '567890', '567890', 'April', '4567'),
(13, 'vidura', '1225546', 'vidura nirmal', 'Sri Lanka', '098', '255', 'October', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `username` varchar(50) NOT NULL,
  `event_id` int(50) NOT NULL,
  `date` int(50) NOT NULL,
  `opentime` int(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `closetime` int(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_no` int(50) NOT NULL,
  `rating` int(6) NOT NULL,
  `message` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `reply` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_no`, `rating`, `message`, `username`, `reply`) VALUES
(5, 1, '        ', 'vidura', '');

-- --------------------------------------------------------

--
-- Table structure for table `financial_menager`
--

CREATE TABLE `financial_menager` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deparment` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_menager`
--

INSERT INTO `financial_menager` (`id`, `username`, `password`, `name`, `deparment`, `address`, `firstname`, `lastname`, `email`) VALUES
(2, 'Dilshani Senavirathna', '123', 'B.W.J.Dilshani Senavirathna', 'FINANCIAL DEPERMENT', '23/1/8 Bangalavaththa Road , Malambe', 'Dil', 'Senevirathne', ' DilshaniSenavirathna@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(50) NOT NULL,
  `payment_methord` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_ship`
--

CREATE TABLE `payment_ship` (
  `slip_id` int(50) NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_ship`
--

INSERT INTO `payment_ship` (`slip_id`, `bill_type`, `username`, `amount`, `payment_method`, `payment_bank`) VALUES
(33, 'Credit Card Payment', 'vidura', '5000', 'Credit card', 'People Bank'),
(34, 'Insurance', 'vidura', '45678', 'Paypal', 'People Bank'),
(35, 'Credit Card Payment', 'vidura', '3456', 'Credit card', 'People Bank'),
(36, 'Utility', 'vidura', '99999', 'Credit card', 'Sampath Bank'),
(37, 'Credit Card Payment', 'vidura', '1234', 'Credit card', 'People Bank'),
(38, 'Telecommunication', 'vidura', '2000', 'Credit card', 'People Bank'),
(39, 'Credit Card Payment', 'vidura', '2345678[', 'Paypal', 'People Bank'),
(40, 'Credit Card Payment', 'vidura', '2345678[', 'Paypal', 'People Bank'),
(41, 'Insurance', 'vidura', '99999', 'Paypal', 'People Bank'),
(42, 'Credit Card Payment', 'vidura', '5000', 'Credit card', 'Sampath Bank'),
(43, 'Credit Card Payment', 'vidura', '5000', 'Paypal', 'Sampath Bank'),
(44, 'Credit Card Payment', 'vidura', '34567', 'Paypal', 'Sampath Bank'),
(45, 'Credit Card Payment', 'vidura', '34567', 'Credit card', 'Sampath Bank'),
(46, 'Credit Card Payment', 'vidura', '34567', 'Credit card', 'Sampath Bank'),
(47, 'Credit Card Payment', 'vidura', '34567', 'Paypal', 'Sampath Bank'),
(48, 'Education', 'vidura', '2000', 'Paypal', 'People Bank'),
(49, 'Education', 'vidura', '2000', 'Paypal', 'People Bank'),
(50, 'Utility', 'vidura', '2000', 'Credit card', 'Bank of Ceylon'),
(51, 'Utility', 'vidura', '2000', 'Paypal', 'Sampath Bank');

-- --------------------------------------------------------

--
-- Table structure for table `support_term_menager`
--

CREATE TABLE `support_term_menager` (
  `username` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deparment` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_term_menager`
--

INSERT INTO `support_term_menager` (`username`, `id`, `password`, `deparment`, `address`, `firstname`, `lastname`, `email`) VALUES
('kenuri perera', 2, '123', 'IT DEPERMENT', '23/1/8 Bangalavaththa Road , Malambe', 'Kenuriii', 'Perera', '   kenuruperera@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `address`, `city`, `email`) VALUES
(43, 'vidura', 'nirmal', 'vidura nirmal', '11', '23/4/4 Madagampitiya road, pallewela', 'Pallewela', 'viduranirmal@gmail.com'),
(44, 'vidura', 'nirmal', 'vidura', '11', '23/4/4 Madagampitiya road, pallewela', 'Pallewela', 'viduranirmal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addevents`
--
ALTER TABLE `addevents`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_no`);

--
-- Indexes for table `financial_menager`
--
ALTER TABLE `financial_menager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_ship`
--
ALTER TABLE `payment_ship`
  ADD PRIMARY KEY (`slip_id`);

--
-- Indexes for table `support_term_menager`
--
ALTER TABLE `support_term_menager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addevents`
--
ALTER TABLE `addevents`
  MODIFY `Event_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_no` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `financial_menager`
--
ALTER TABLE `financial_menager`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_ship`
--
ALTER TABLE `payment_ship`
  MODIFY `slip_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `support_term_menager`
--
ALTER TABLE `support_term_menager`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
