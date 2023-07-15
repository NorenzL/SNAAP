-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snaap_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_account`
--

CREATE TABLE `login_account` (
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_account`
--

INSERT INTO `login_account` (`user_name`, `password`) VALUES
('management', 'admin123'),
('staff', 'staff123');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_mat` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `product_name`, `product_size`, `product_mat`, `product_type`, `stock_quantity`) VALUES
(1, 'Adventure', 'Extra Small', 'Cotton', 'T-Shirt', 12),
(2, 'Adventure', 'Small', 'Cotton', 'T-Shirt', 3),
(3, 'Adventure', 'Medium', 'Cotton', 'T-Shirt', 4),
(4, 'Adventure', 'Large', 'Cotton', 'T-Shirt', 1),
(5, 'Adventure', 'Extra Large', 'Cotton', 'T-Shirt', 10),
(6, 'Astrophile', 'Extra Small', 'Cotton', 'T-Shirt', 1),
(7, 'Astrophile', 'Small', 'Cotton', 'T-Shirt', 2),
(8, 'Astrophile', 'Medium', 'Cotton', 'T-Shirt', 112),
(9, 'Astrophile', 'Large', 'Cotton', 'T-Shirt', 10),
(10, 'Astrophile', 'Extra Large', 'Cotton', 'T-Shirt', 5),
(11, 'Together', 'Extra Small', 'Polyester', 'T-Shirt', 2),
(12, 'Together', 'Small', 'Polyester', 'T-Shirt', 5),
(13, 'Together', 'Medium', 'Polyester', 'T-Shirt', 51),
(14, 'Together', 'Large', 'Polyester', 'T-Shirt', 89),
(15, 'Together', 'Extra Large', 'Polyester', 'T-Shirt', 72),
(16, 'Break', 'Extra Small', 'Spandex', 'T-Shirt', 54),
(17, 'Break', 'Small', 'Spandex', 'T-Shirt', 80),
(18, 'Break', 'Medium', 'Spandex', 'T-Shirt', 22),
(19, 'Break', 'Large', 'Spandex', 'T-Shirt', 73),
(20, 'Break', 'Extra Large', 'Spandex', 'T-Shirt', 19),
(21, 'Challenge', 'Extra Small', 'Spandex', 'T-Shirt', 22),
(22, 'Challenge', 'Small', 'Spandex', 'T-Shirt', 12),
(23, 'Challenge', 'Medium', 'Spandex', 'T-Shirt', 60),
(24, 'Challenge', 'Large', 'Spandex', 'T-Shirt', 67),
(25, 'Challenge', 'Extra Large', 'Spandex', 'T-Shirt', 39),
(26, 'Coffee', 'Extra Small', 'Polyester', 'T-Shirt', 3),
(27, 'Coffee', 'Small', 'Polyester', 'T-Shirt', 22),
(28, 'Coffee', 'Medium', 'Polyester', 'T-Shirt', 73),
(29, 'Coffee', 'Large', 'Polyester', 'T-Shirt', 94),
(30, 'Coffee', 'Extra Large', 'Polyester', 'T-Shirt', 13),
(31, 'Forward', 'Extra Small', 'Cotton', 'T-Shirt', 32),
(32, 'Forward', 'Small', 'Cotton', 'T-Shirt', 27),
(33, 'Forward', 'Medium', 'Cotton', 'T-Shirt', 35),
(34, 'Forward', 'Large', 'Cotton', 'T-Shirt', 94),
(35, 'Forward', 'Extra Large', 'Cotton', 'T-Shirt', 84),
(36, 'Happy', 'Extra Small', 'Cotton', 'T-Shirt', 5),
(37, 'Happy', 'Small', 'Cotton', 'T-Shirt', 40),
(38, 'Happy', 'Medium', 'Cotton', 'T-Shirt', 50),
(39, 'Happy', 'Large', 'Cotton', 'T-Shirt', 64),
(40, 'Happy', 'Extra Large', 'Cotton', 'T-Shirt', 79),
(41, 'Game', 'Extra Small', 'Cotton', 'T-Shirt', 47),
(42, 'Game', 'Small', 'Cotton', 'T-Shirt', 61),
(43, 'Game', 'Medium', 'Cotton', 'T-Shirt', 85),
(44, 'Game', 'Large', 'Cotton', 'T-Shirt', 55),
(45, 'Game', 'Extra Large', 'Cotton', 'T-Shirt', 41),
(46, 'Healthy', 'Extra Small', 'Spandex', 'T-Shirt', 5),
(47, 'Healthy', 'Small', 'Spandex', 'T-Shirt', 3),
(48, 'Healthy', 'Medium', 'Spandex', 'T-Shirt', 29),
(49, 'Healthy', 'Large', 'Spandex', 'T-Shirt', 49),
(50, 'Healthy', 'Extra Large', 'Spandex', 'T-Shirt', 84),
(51, 'Gentle', 'Extra Small', 'Cotton', 'T-Shirt', 36),
(52, 'Gentle', 'Small', 'Cotton', 'T-Shirt', 29),
(53, 'Gentle', 'Medium', 'Cotton', 'T-Shirt', 67),
(54, 'Gentle', 'Large', 'Cotton', 'T-Shirt', 56),
(55, 'Gentle', 'Extra Large', 'Cotton', 'T-Shirt', 65),
(56, 'Humble', 'Extra Small', 'Polyester', 'T-Shirt', 95),
(57, 'Humble', 'Small', 'Polyester', 'T-Shirt', 74),
(58, 'Humble', 'Medium', 'Polyester', 'T-Shirt', 57),
(59, 'Humble', 'Large', 'Polyester', 'T-Shirt', 1),
(60, 'Humble', 'Extra Large', 'Polyester', 'T-Shirt', 29),
(61, 'Going', 'Extra Small', 'Polyester', 'T-Shirt', 47),
(62, 'Going', 'Small', 'Polyester', 'T-Shirt', 68),
(63, 'Going', 'Medium', 'Polyester', 'T-Shirt', 54),
(64, 'Going', 'Large', 'Polyester', 'T-Shirt', 85),
(65, 'Going', 'Extra Large', 'Polyester', 'T-Shirt', 38),
(66, 'Metamorphosis', 'Extra Small', 'Cotton', 'T-Shirt', 71),
(67, 'Metamorphosis', 'Small', 'Cotton', 'T-Shirt', 91),
(68, 'Metamorphosis', 'Medium', 'Cotton', 'T-Shirt', 12),
(69, 'Metamorphosis', 'Large', 'Cotton', 'T-Shirt', 39),
(70, 'Metamorphosis', 'Extra Large', 'Cotton', 'T-Shirt', 42),
(71, 'Minimalist', 'Extra Small', 'Cotton', 'T-Shirt', 64),
(72, 'Minimalist', 'Small', 'Cotton', 'T-Shirt', 20),
(73, 'Minimalist', 'Medium', 'Cotton', 'T-Shirt', 16),
(74, 'Minimalist', 'Large', 'Cotton', 'T-Shirt', 47),
(75, 'Minimalist', 'Extra Large', 'Cotton', 'T-Shirt', 1),
(76, 'Passion', 'Extra Small', 'Polyester', 'T-Shirt', 64),
(77, 'Passion', 'Small', 'Polyester', 'T-Shirt', 25),
(78, 'Passion', 'Medium', 'Polyester', 'T-Shirt', 46),
(79, 'Passion', 'Large', 'Polyester', 'T-Shirt', 22),
(80, 'Passion', 'Extra Large', 'Polyester', 'T-Shirt', 62),
(81, 'Play', 'Extra Small', 'Spandex', 'T-Shirt', 81),
(82, 'Play', 'Small', 'Spandex', 'T-Shirt', 41),
(83, 'Play', 'Medium', 'Spandex', 'T-Shirt', 6),
(84, 'Play', 'Large', 'Spandex', 'T-Shirt', 53),
(85, 'Play', 'Extra Large', 'Spandex', 'T-Shirt', 56),
(86, 'Care', 'Extra Small', 'Cotton', 'T-Shirt', 100),
(87, 'Care', 'Small', 'Cotton', 'T-Shirt', 21),
(88, 'Care', 'Medium', 'Cotton', 'T-Shirt', 1),
(89, 'Care', 'Large', 'Cotton', 'T-Shirt', 33),
(90, 'Care', 'Extra Large', 'Cotton', 'T-Shirt', 60),
(91, 'Time', 'Extra Small', 'Spandex', 'T-Shirt', 52),
(92, 'Time', 'Small', 'Spandex', 'T-Shirt', 39),
(93, 'Time', 'Medium', 'Spandex', 'T-Shirt', 12),
(94, 'Time', 'Large', 'Spandex', 'T-Shirt', 65),
(95, 'Time', 'Extra Large', 'Spandex', 'T-Shirt', 59),
(96, 'Cat', 'Extra Small', 'Cotton', 'T-Shirt', 16),
(97, 'Cat', 'Small', 'Cotton', 'T-Shirt', 76),
(98, 'Cat', 'Medium', 'Cotton', 'T-Shirt', 96),
(99, 'Cat', 'Large', 'Cotton', 'T-Shirt', 73),
(100, 'Cat', 'Extra Large', 'Cotton', 'T-Shirt', 81),
(101, 'Travel', 'Extra Small', 'Cotton', 'T-Shirt', 34),
(102, 'Travel', 'Small', 'Cotton', 'T-Shirt', 57),
(103, 'Travel', 'Medium', 'Cotton', 'T-Shirt', 44),
(104, 'Travel', 'Large', 'Cotton', 'T-Shirt', 62),
(105, 'Travel', 'Extra Large', 'Cotton', 'T-Shirt', 33),
(106, 'Valorant', 'Extra Small', 'Cotton', 'Polo', 43),
(107, 'Valorant', 'Small', 'Cotton', 'Polo', 11),
(108, 'Valorant', 'Medium', 'Cotton', 'Polo', 48),
(109, 'Valorant', 'Large', 'Cotton', 'Polo', 15),
(110, 'Valorant', 'Extra Large', 'Cotton', 'Polo', 5),
(111, 'Mang-Inasar', 'Extra Small', 'Cotton', 'Polo', 13),
(112, 'Mang-Inasar', 'Small', 'Cotton', 'Polo', 58),
(113, 'Mang-Inasar', 'Medium', 'Cotton', 'Polo', 70),
(114, 'Mang-Inasar', 'Large', 'Cotton', 'Polo', 54),
(115, 'Mang-Inasar', 'Extra Large', 'Cotton', 'Polo', 14),
(116, 'Stripes', 'Extra Small', 'Cotton', 'Polo', 15),
(117, 'Stripes', 'Small', 'Cotton', 'Polo', 73),
(118, 'Stripes', 'Medium', 'Cotton', 'Polo', 7),
(119, 'Stripes', 'Large', 'Cotton', 'Polo', 48),
(120, 'Stripes', 'Extra Large', 'Cotton', 'Polo', 23),
(121, 'McDolibee', 'Extra Small', 'Cotton', 'Polo', 6),
(122, 'McDolibee', 'Small', 'Cotton', 'Polo', 16),
(123, 'McDolibee', 'Medium', 'Cotton', 'Polo', 39),
(124, 'McDolibee', 'Large', 'Cotton', 'Polo', 51),
(125, 'McDolibee', 'Extra Large', 'Cotton', 'Polo', 18),
(126, 'Limits', 'Extra Small', 'Cotton', 'SweatShirt', 70),
(127, 'Limits', 'Small', 'Cotton', 'SweatShirt', 8),
(128, 'Limits', 'Medium', 'Cotton', 'SweatShirt', 39),
(129, 'Limits', 'Large', 'Cotton', 'SweatShirt', 34),
(130, 'Limits', 'Extra Large', 'Cotton', 'SweatShirt', 40),
(131, 'Singko', 'Extra Small', 'Cotton', 'SweatShirt', 85),
(132, 'Singko', 'Small', 'Cotton', 'SweatShirt', 31),
(133, 'Singko', 'Medium', 'Cotton', 'SweatShirt', 53),
(134, 'Singko', 'Large', 'Cotton', 'SweatShirt', 49),
(135, 'Singko', 'Extra Large', 'Cotton', 'SweatShirt', 20),
(136, 'Live', 'Extra Small', 'Cotton', 'SweatShirt', 38),
(137, 'Live', 'Small', 'Cotton', 'SweatShirt', 12),
(138, 'Live', 'Medium', 'Cotton', 'SweatShirt', 54),
(139, 'Live', 'Large', 'Cotton', 'SweatShirt', 46),
(140, 'Live', 'Extra Large', 'Cotton', 'SweatShirt', 78),
(141, 'Rider', 'Extra Small', 'Fleece', 'Jacket', 67),
(142, 'Rider', 'Small', 'Fleece', 'Jacket', 61),
(143, 'Rider', 'Medium', 'Fleece', 'Jacket', 67),
(144, 'Rider', 'Large', 'Fleece', 'Jacket', 83),
(145, 'Rider', 'Extra Large', 'Fleece', 'Jacket', 13),
(146, 'Momentum', 'Extra Small', 'Fleece', 'Jacket', 69),
(147, 'Momentum', 'Small', 'Fleece', 'Jacket', 91),
(148, 'Momentum', 'Medium', 'Fleece', 'Jacket', 22),
(149, 'Momentum', 'Large', 'Fleece', 'Jacket', 72),
(150, 'Momentum', 'Extra Large', 'Fleece', 'Jacket', 43);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history_table`
--

CREATE TABLE `transaction_history_table` (
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_quantity` int(11) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history_table`
--

INSERT INTO `transaction_history_table` (`transaction_id`, `product_id`, `transaction_type`, `transaction_date`, `transaction_quantity`, `product_size`, `product_details`) VALUES
(1, 145, 'Add Stock', '2022-08-01', 91, 'Extra Large', 'Rider_Jacket_Fleece'),
(2, 54, 'Add Stock', '2022-08-01', 38, 'Large', 'Gentle_T-Shirt_Cotton'),
(3, 145, 'Withdraw Stock', '2022-08-15', 91, 'Extra Large', 'Rider_Jacket_Fleece'),
(5, 146, 'Add Stock', '2022-09-01', 69, 'Extra Small', 'Momentum_Jacket_Fleece'),
(6, 54, 'Withdraw Stock', '2022-09-15', 38, 'Large', 'Gentle_T-Shirt_Cotton'),
(8, 78, 'Add Stock', '2022-10-01', 62, 'Medium', 'Passion_T-Shirt_Polyester'),
(9, 146, 'Withdraw Stock', '2022-10-15', 69, 'Extra Small', 'Momentum_Jacket_Fleece'),
(11, 119, 'Add Stock', '2022-11-01', 88, 'Large', 'Stripes_Polo_Cotton'),
(12, 78, 'Withdraw Stock', '2022-11-15', 62, 'Medium', 'Passion_T-Shirt_Polyester'),
(14, 134, 'Add Stock', '2022-12-01', 77, 'Large', 'Singko_SweatShirt_Cotton'),
(15, 119, 'Withdraw Stock', '2022-12-15', 88, 'Large', 'Stripes_Polo_Cotton'),
(17, 104, 'Add Stock', '2023-01-01', 50, 'Large', 'Travel_T-Shirt_Cotton'),
(18, 134, 'Withdraw Stock', '2023-01-15', 77, 'Large', 'Singko_SweatShirt_Cotton'),
(20, 66, 'Add Stock', '2023-02-01', 64, 'Extra Small', 'Metamorphosis_T-Shirt_Cotton'),
(21, 104, 'Withdraw Stock', '2023-02-15', 50, 'Large', 'Travel_T-Shirt_Cotton'),
(23, 1, 'Add Stock', '2023-03-01', 71, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(24, 66, 'Withdraw Stock', '2023-03-15', 64, 'Extra Small', 'Metamorphosis_T-Shirt_Cotton'),
(26, 25, 'Add Stock', '2023-04-01', 16, 'Extra Large', 'Challenge_T-Shirt_Spandex'),
(27, 1, 'Withdraw Stock', '2023-04-15', 71, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(29, 25, 'Withdraw Stock', '2023-05-15', 16, 'Extra Large', 'Challenge_T-Shirt_Spandex'),
(31, 1, 'Add Stock', '2023-06-27', 5, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(32, 1, 'Add Stock', '2023-06-27', 5, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(33, 1, 'Add Stock', '2023-06-27', 5, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(34, 1, 'Recount Stock (Reduce)', '2023-06-27', 25, 'Extra Small', 'Adventure_T-Shirt_Cotton'),
(35, 1, 'Recount Stock (Add)', '2023-06-27', 5, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(36, 7, 'Recount Stock (Add)', '2023-06-27', 9, 'Small', 'Astrophile, T-Shirt, Cotton'),
(37, 2, 'Add Stock', '2023-06-27', 100, 'Small', 'Adventure_T-Shirt_Cotton'),
(38, 7, 'Add Stock', '2023-06-27', 35, 'Small', 'Astrophile_T-Shirt_Cotton'),
(39, 3, 'Add Stock', '2023-06-27', 1, 'Medium', 'Adventure_T-Shirt_Cotton'),
(40, 1, 'Add Stock', '2023-06-27', 1, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(41, 1, 'Withdraw Stock', '2023-06-27', 1, 'Extra Small', 'Adventure, , '),
(42, 2, 'Withdraw Stock', '2023-06-27', 1, 'Small', 'Adventure, , '),
(43, 16, 'Withdraw Stock', '2023-06-27', 5, 'Extra Small', 'Break, T-Shirt, Spandex'),
(44, 7, 'Withdraw Stock', '2023-06-27', 20, 'Small', 'Astrophile, T-Shirt, Cotton'),
(45, 1, 'Recount Stock (Add)', '2023-06-27', 3, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(46, 1, 'Add Stock', '2023-06-27', 5, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(47, 12, 'Withdraw Stock', '2023-06-27', 11, 'Small', 'Together, T-Shirt, Polyester'),
(48, 2, 'Withdraw Stock', '2023-06-27', 1, 'Small', 'Adventure, T-Shirt, Cotton'),
(49, 3, 'Withdraw Stock', '2023-06-27', 5, 'Medium', 'Adventure, T-Shirt, Cotton'),
(50, 7, 'Withdraw Stock', '2023-06-27', 21, 'Small', 'Astrophile, T-Shirt, Cotton'),
(51, 7, 'Withdraw Stock', '2023-06-27', 1, 'Small', 'Astrophile, T-Shirt, Cotton'),
(52, 6, 'Withdraw Stock', '2023-06-27', 1, 'Extra Small', 'Astrophile, T-Shirt, Cotton'),
(53, 7, 'Withdraw Stock', '2023-06-27', 1, 'Small', 'Astrophile, T-Shirt, Cotton'),
(54, 8, 'Add Stock', '2023-06-29', 34, 'Medium', 'Astrophile, T-Shirt, Cotton'),
(55, 61, 'Withdraw Stock', '2023-06-29', 15, 'Extra Small', 'Going, T-Shirt, Polyester'),
(56, 1, 'Recount Stock (Reduce)', '2023-06-29', 12, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(57, 2, 'Recount Stock (Add)', '2023-06-29', 2, 'Small', 'Adventure, T-Shirt, Cotton'),
(58, 18, 'Recount Stock (Reduce)', '2023-06-29', 4, 'Medium', 'Break, T-Shirt, Spandex'),
(59, 151, 'Set Initial Stock', '2023-06-30', 3, 'Extra Small', 'testing, T-Shirt, Cotton'),
(60, 152, 'Set Initial Stock', '2023-06-30', 2, 'Small', 'testing, T-Shirt, Cotton'),
(61, 153, 'Set Initial Stock', '2023-06-30', 4, 'Medium', 'testing, T-Shirt, Cotton'),
(62, 154, 'Set Initial Stock', '2023-06-30', 2, 'Large', 'testing, T-Shirt, Cotton'),
(63, 155, 'Set Initial Stock', '2023-06-30', 1, 'Extra Large', 'testing, T-Shirt, Cotton'),
(64, 156, 'Set Initial Stock', '2023-06-30', 31, 'Extra Small', 'test product, T-Shirt, Cotton'),
(65, 157, 'Set Initial Stock', '2023-06-30', 1, 'Small', 'test product, T-Shirt, Cotton'),
(66, 158, 'Set Initial Stock', '2023-06-30', 1, 'Medium', 'test product, T-Shirt, Cotton'),
(67, 159, 'Set Initial Stock', '2023-06-30', 1, 'Large', 'test product, T-Shirt, Cotton'),
(68, 160, 'Set Initial Stock', '2023-06-30', 1, 'Extra Large', 'test product, T-Shirt, Cotton'),
(69, 161, 'Set Initial Stock', '2023-06-30', 2, 'Extra Small', 'tshirt ni prince, T-Shirt, Cotton'),
(70, 162, 'Set Initial Stock', '2023-06-30', 14, 'Small', 'tshirt ni prince, T-Shirt, Cotton'),
(71, 163, 'Set Initial Stock', '2023-06-30', 0, 'Medium', 'tshirt ni prince, T-Shirt, Cotton'),
(72, 164, 'Set Initial Stock', '2023-06-30', 10, 'Large', 'tshirt ni prince, T-Shirt, Cotton'),
(73, 165, 'Set Initial Stock', '2023-06-30', 1, 'Extra Large', 'tshirt ni prince, T-Shirt, Cotton'),
(74, 166, 'Set Initial Stock', '2023-06-30', 2111, 'Extra Small', 'polo ni aaron, Polo, Cotton'),
(75, 167, 'Set Initial Stock', '2023-06-30', 1, 'Small', 'polo ni aaron, Polo, Cotton'),
(76, 168, 'Set Initial Stock', '2023-06-30', 4, 'Medium', 'polo ni aaron, Polo, Cotton'),
(77, 169, 'Set Initial Stock', '2023-06-30', 1, 'Large', 'polo ni aaron, Polo, Cotton'),
(78, 170, 'Set Initial Stock', '2023-06-30', 1, 'Extra Large', 'polo ni aaron, Polo, Cotton'),
(79, 1, 'Recount Stock (Add)', '2023-06-30', 1, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(80, 2, 'Recount Stock (Reduce)', '2023-06-30', 2, 'Small', 'Adventure, T-Shirt, Cotton'),
(81, 171, 'Set Initial Stock', '2023-06-30', 2, 'Extra Small', 'Momentum, T-Shirt, Spandex'),
(82, 172, 'Set Initial Stock', '2023-06-30', 2, 'Small', 'Momentum, T-Shirt, Spandex'),
(83, 173, 'Set Initial Stock', '2023-06-30', 2, 'Medium', 'Momentum, T-Shirt, Spandex'),
(84, 174, 'Set Initial Stock', '2023-06-30', 2, 'Large', 'Momentum, T-Shirt, Spandex'),
(85, 175, 'Set Initial Stock', '2023-06-30', 2, 'Extra Large', 'Momentum, T-Shirt, Spandex'),
(86, 176, 'Set Initial Stock', '2023-06-30', 2, 'Extra Small', 'Singko, Sweat Shirt, Cotton'),
(87, 177, 'Set Initial Stock', '2023-06-30', 2, 'Small', 'Singko, Sweat Shirt, Cotton'),
(88, 178, 'Set Initial Stock', '2023-06-30', 2, 'Medium', 'Singko, Sweat Shirt, Cotton'),
(89, 179, 'Set Initial Stock', '2023-06-30', 2, 'Large', 'Singko, Sweat Shirt, Cotton'),
(90, 180, 'Set Initial Stock', '2023-06-30', 2, 'Extra Large', 'Singko, Sweat Shirt, Cotton'),
(91, 181, 'Set Initial Stock', '2023-06-30', 2, 'Extra Small', 'Singko, Sweat Shirt, Cotton'),
(92, 182, 'Set Initial Stock', '2023-06-30', 2, 'Small', 'Singko, Sweat Shirt, Cotton'),
(93, 183, 'Set Initial Stock', '2023-06-30', 2, 'Medium', 'Singko, Sweat Shirt, Cotton'),
(94, 184, 'Set Initial Stock', '2023-06-30', 2, 'Large', 'Singko, Sweat Shirt, Cotton'),
(95, 185, 'Set Initial Stock', '2023-06-30', 2, 'Extra Large', 'Singko, Sweat Shirt, Cotton'),
(96, 1, 'Add Stock', '2023-06-30', 4, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(97, 1, 'Add Stock', '2023-06-30', 4, 'Extra Small', 'Adventure, T-Shirt, Cotton'),
(98, 10, 'Withdraw Stock', '2023-06-30', 40, 'Extra Large', 'Astrophile, T-Shirt, Cotton'),
(99, 7, 'Recount Stock (Reduce)', '2023-06-30', 2, 'Small', 'Astrophile, T-Shirt, Cotton'),
(100, 8, 'Recount Stock (Reduce)', '2023-06-30', 2, 'Medium', 'Astrophile, T-Shirt, Cotton'),
(101, 9, 'Recount Stock (Add)', '2023-06-30', 5, 'Large', 'Astrophile, T-Shirt, Cotton'),
(102, 10, 'Recount Stock (Add)', '2023-06-30', 2, 'Extra Large', 'Astrophile, T-Shirt, Cotton');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction_history_table`
--
ALTER TABLE `transaction_history_table`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `transaction_history_table`
--
ALTER TABLE `transaction_history_table`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
