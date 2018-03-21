-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 08:56 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `biz_categories`
--

CREATE TABLE `biz_categories` (
  `BusinissID` int(5) NOT NULL,
  `CategoryID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businisses`
--

CREATE TABLE `businisses` (
  `BusinissID` int(5) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telephone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Title`, `Description`) VALUES
('AUTO', 'hello', 'hello duy anh'),
('DUYANH', 'tÃªn', 'tÃ´i tÃªn lÃ  duy anh'),
('HELLO', 'Xin chÃ o', 'There are many other greetings in Vietnamese which depend on the relationship or social standing between the speaker and the person addressed. This greeting can, however, be used between any people, theoretically at least. In reality, it is almost never used in conversations; the only situation where it can be heard is perhaps in generic advertisements aimed at foreign tourists; on TV, kÃ­nh chÃ o is used more frequent. It is still more natural to use chÃ o + [proper kinship \"pronoun\"] to greet someone.'),
('TEST', 'Sáº¿p Oceanbank khai chi 180 tá»· Ä‘á»ƒ láº¥y lÃ²ng káº¿ toÃ¡n trÆ°á»Ÿng PVN', 'NhÃ³m luáº­t sÆ° bÃ o chá»¯a cho bá»‹ cÃ¡o Nguyá»…n XuÃ¢n SÆ¡n má»Ÿ Ä‘áº§u pháº§n xÃ©t há»i sÃ¡ng 21/3 trong phiÃªn tÃ²a xá»­ Ã´ng Äinh La ThÄƒng cÃ¹ng Ä‘á»“ng pháº¡m báº±ng viá»‡c truy váº¥n bá»‹ cÃ¡o Ninh VÄƒn Quá»³nh (cá»±u káº¿ toÃ¡n trÆ°á»Ÿng PVN) vá» khoáº£n \"chÄƒm sÃ³c\" nháº­n tá»« Ã´ng Nguyá»…n XuÃ¢n SÆ¡n.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `Businiss ID` (`BusinissID`);

--
-- Indexes for table `businisses`
--
ALTER TABLE `businisses`
  ADD PRIMARY KEY (`BusinissID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businisses`
--
ALTER TABLE `businisses`
  MODIFY `BusinissID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD CONSTRAINT `biz_categories_ibfk_1` FOREIGN KEY (`BusinissID`) REFERENCES `businisses` (`BusinissID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `biz_categories_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `businisses`
--
ALTER TABLE `businisses`
  ADD CONSTRAINT `businisses_ibfk_1` FOREIGN KEY (`BusinissID`) REFERENCES `biz_categories` (`BusinissID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
