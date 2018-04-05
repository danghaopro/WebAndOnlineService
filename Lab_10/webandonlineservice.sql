-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 06:50 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webandonlineservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `num`) VALUES
(1, 'Windows 10 Education, Version 1709', 'Windows 10 Education is only available for education customers in volume licensing programs.', 0, 1),
(2, 'Visual Studio Enterprise 2017', 'Enterprise-class development\r\n\r\nTools and services for designing, building and managing complex enterprise', 0, 1),
(3, 'SQL Server 2017 Developer', 'Build, test, and demonstrate applications in a non-production environment with this full-featured edition of SQL Server 2017.', 0, 1),
(4, 'Windows Server 2016 Datacenter', 'Windows Server 2016 Datacenter edition is ideal for highly virtualized and software-defined datacenter environments', 0, 1),
(5, 'Project Professional 2016', 'Project Professional 2016 enables you to keep your projects, resources, and teams organized and on track. Easily and efficiently plan projects, track status, and collaborate with others.', 0, 1),
(6, 'Visio Professional 2016', 'Visio Professional 2016 makes it easier than ever to create and share professional, versatile diagrams that simplify and communicate complex information.', 0, 1),
(7, 'Windows 8.1 Professional', 'With the new Windows, you get the best of work and play. Windows 8.1 Pro includes everything in Windows 8.1, plus enhanced features that help you manage your devices, access one PC from another, encrypt your data, and more.', 0, 1),
(8, 'Access 2013', 'Access provides a simple way to build SharePoint apps. Easy-to-use tools help you get started fast and quickly share your app, improving end-users productivity from virtually anywhere.', 0, 1),
(9, 'Project Professional 2013 with Service Pack 1', 'Project Professional 2013 helps you easily plan projects and collaborate with others from virtually anywhere.', 0, 1),
(10, 'Access 2016', 'Create your own database apps easily in formats that serve your business best.', 0, 1),
(11, 'Visio Professional 2013 with Service Pack 1', 'Visio 2013 provides new features designed to help you create diagrams more intuitively—including new and updated shapes and stencils, improved effects and themes, and a coauthoring feature that makes teamwork easier.', 0, 1),
(12, 'Apple iPhone X 256GB', 'Apple iPhone X 256GB Chính hãng là một sản phẩm mới mà Apple ra mắt, một sản phẩm có một thiết kế đột phá và liều lĩnh. Dù vấp phải khá nhiều ý kiến trái chiều nhưng cũng không thể phủ nhận iPhone X là một sản phẩm hấp dẫn và mới lạ.', 30390000, 10),
(13, 'Apple iPhone 8 Plus 256GB', 'iPhone 8 Plus là chiếc iPhone được nâng cấp hoàn hảo nhất về thiết kế lẫn tính năng. Đây là chiếc smartphone mang đến trải nghiệm quen thuộc và thú vị nhất cho người dùng.', 24990000, 15),
(14, 'Samsung Galaxy S9+ (Plus) 128GB', 'Thế hệ điện thoại Samsung Galaxy S tiếp tục được Samsung nâng lên một tầm cao mới. Với Galaxy S9 Plus 128GB chính hãng, bạn sẽ “nhìn thấy điều không thể” nhờ bộ phận camera được cải tiến toàn diện.', 24990000, 12),
(15, 'Samsung Galaxy Note 8', 'Một lần nữa, hãng điện thoại Samsung đã khiến những fan hâm mộ và người dùng công nghệ phải mãn nhãn với thiết kế cũng như cấu hình đẳng cấp của thế hệ tiếp theo thuộc dòng sản phẩm Note – Samsung Galaxy Note 8. Galaxy Note 8 được thiết kế với ý nghĩa để phù hợp với cách con người chủ động trong làm việc và giải trí khi mà cuộc sống ngày càng phụ thuộc vào công nghệ tiên tiến hiện nay.', 24490000, 20),
(16, 'Apple iPhone 7 Plus 128GB', 'Smartphone xuất sắc nhất Việt Nam là danh hiệu thuộc về iPhone 7 Plus theo chương trình bầu chọn uy tín được báo Vnexpress tổ chức hằng năm. Với những giá trị mà iPhone 7 Plus mang lại cho người sử dụng, không có gì ngạc nhiên khi chiếc smartphone cao cấp của Apple nhận được giải thưởng cao quý này.', 18990000, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
