-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 02:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profix`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calendar_events`
--

CREATE TABLE `tbl_calendar_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_calendar_events`
--

INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES
(1, 'Test Event', '2019-12-19 07:00:00', '2019-12-19 10:00:00', '', 'bangi'),
(2, 'New Event', '2019-12-19 10:00:00', '2019-12-19 11:00:00', '', 'bangi'),
(3, 'New Event', '2019-12-19 15:30:00', '2019-12-19 17:00:00', '', 'bangi'),
(5, 'Nabilicious', '2019-12-19 18:25:00', '2019-12-19 19:30:00', 'Testing', 'bangi'),
(6, 'Test11', '2020-01-02 18:35:00', '2020-01-02 19:15:00', 'Testing', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_geolocate` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_telephone` varchar(255) NOT NULL,
  `c_vat` varchar(255) NOT NULL,
  `c_file` varchar(255) DEFAULT NULL,
  `c_company` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_postal` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_ssn` varchar(255) NOT NULL,
  `c_comment` varchar(255) NOT NULL,
  `u_role` varchar(255) DEFAULT NULL,
  `u_branch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES
(1, 'Ashrullllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, NULL),
(40, 'Ashrullllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi'),
(42, 'Ashruloooooooooooooo', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/145382a14febdf8f194fc62021a703a4.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testting', NULL, 'shah alam'),
(44, 'Ashrultest', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi'),
(46, 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/826c4e945061fc4c78dd53ecc2837af6.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi'),
(47, 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/19386972b93c5b7c9d4327950f41c69d.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi'),
(48, 'Nabilllllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/1e7e64b78e4b0906f8d6cfdf501ba195.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi'),
(49, 'Pian', 'Perak', 'Sepang', '0191725352', 'VAT', '/uploads/7410c8ba5c7a17f9c9dd6b7f78b210ea.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi'),
(50, 'Syraf', 'Perak', 'Sepang', '0172563723', 'VAT', '79e744554ea6de7d08bc0e7d043f2d96.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi'),
(51, 'Nabil', 'Perak', 'Sepang', '0172563723', 'VAT', 'ca3af29e6a3ed2505b394adcfa4fb922.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi'),
(52, 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', '39c317edebc3479c4b98d4545b84eeea.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi'),
(53, 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', '5fcc037567ccf919ec78f1fecab535af.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_database`
--

CREATE TABLE `tbl_database` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `version` datetime NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_database`
--

INSERT INTO `tbl_database` (`id`, `file_name`, `version`, `u_branch`) VALUES
(1, './database/backup-on-2019-12-30.sql', '2019-12-30 00:00:00', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drawer`
--

CREATE TABLE `tbl_drawer` (
  `id` int(11) NOT NULL,
  `openTime` datetime NOT NULL,
  `openBy` varchar(255) NOT NULL,
  `openingCash` float(9,2) NOT NULL,
  `currentBalance` double(9,2) NOT NULL,
  `closedTime` datetime NOT NULL,
  `closedBy` varchar(255) NOT NULL,
  `closingCash` double(9,2) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drawer`
--

INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES
(5, '2019-12-20 22:58:58', 'Aliff', 5838.00, 0.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(10, '2019-12-22 00:36:28', 'Aliff', 1105.00, 1376.00, '2019-11-12 07:28:00', '', 0.00, 'bangi'),
(11, '2019-12-23 00:20:37', 'Aliff', 1000.00, 914.00, '2019-12-23 16:56:14', 'Aliff', 914.00, 'bangi'),
(13, '2019-12-24 22:11:57', 'Aliff', 1000.00, 1000.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(14, '2019-12-26 15:47:51', 'Aliff', 470.00, 486.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(15, '2019-12-30 09:33:15', 'Aliff', 1000.00, 1022.00, '2019-12-30 21:54:47', 'Aliff', 1022.00, 'bangi'),
(16, '2019-12-30 21:54:54', 'Aliff', 1000.00, 1000.00, '2019-12-30 21:55:13', 'Aliff', 1000.00, 'bangi'),
(17, '2019-12-30 21:56:01', 'Aliff', 1000.00, 1000.00, '2019-12-30 23:40:50', 'Aliff', 1000.00, 'bangi'),
(18, '2019-12-30 23:42:11', 'Aliff', 1100.00, 1100.00, '2019-12-30 23:43:03', 'Aliff', 1100.00, 'bangi'),
(19, '2019-12-30 23:43:52', 'Aliff', 1000.00, 1000.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(20, '2019-12-31 00:06:23', 'Aliff', 1000.00, 1000.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(21, '2020-01-01 17:45:02', 'Aliff', 1000.00, 1000.00, '0000-00-00 00:00:00', '', 0.00, 'bangi'),
(22, '2020-01-02 00:55:04', 'Aliff', 1000.00, 1000.00, '0000-00-00 00:00:00', '', 0.00, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_permission`
--

CREATE TABLE `tbl_group_permission` (
  `id` int(11) NOT NULL,
  `groupId` varchar(255) NOT NULL,
  `reparation_view` int(11) NOT NULL,
  `reparation_add` int(11) NOT NULL,
  `reparation_edit` int(11) NOT NULL,
  `reparation_delete` int(11) NOT NULL,
  `clients_view` int(11) NOT NULL,
  `clients_add` int(11) NOT NULL,
  `clients_edit` int(11) NOT NULL,
  `clients_delete` int(11) NOT NULL,
  `stock_view` int(11) NOT NULL,
  `stock_add` int(11) NOT NULL,
  `stock_edit` int(11) NOT NULL,
  `stock_delete` int(11) NOT NULL,
  `suppliers_view` int(11) NOT NULL,
  `suppliers_add` int(11) NOT NULL,
  `suppliers_edit` int(11) NOT NULL,
  `suppliers_delete` int(11) NOT NULL,
  `models_view` int(11) NOT NULL,
  `models_add` int(11) NOT NULL,
  `models_edit` int(11) NOT NULL,
  `models_delete` int(11) NOT NULL,
  `purchases_view` int(11) NOT NULL,
  `purchases_add` int(11) NOT NULL,
  `purchases_edit` int(11) NOT NULL,
  `purchases_delete` int(11) NOT NULL,
  `users_view` int(11) NOT NULL,
  `users_add` int(11) NOT NULL,
  `users_edit` int(11) NOT NULL,
  `users_delete` int(11) NOT NULL,
  `group_view` int(11) NOT NULL,
  `group_add` int(11) NOT NULL,
  `group_edit` int(11) NOT NULL,
  `group_delete` int(11) NOT NULL,
  `tax_view` int(11) NOT NULL,
  `tax_add` int(11) NOT NULL,
  `tax_edit` int(11) NOT NULL,
  `tax_delete` int(11) NOT NULL,
  `categories_view` int(11) NOT NULL,
  `categories_add` int(11) NOT NULL,
  `categories_edit` int(11) NOT NULL,
  `categories_delete` int(11) NOT NULL,
  `manufacturers_view` int(11) NOT NULL,
  `manufacturers_add` int(11) NOT NULL,
  `manufacturers_edit` int(11) NOT NULL,
  `manufacturers_delete` int(11) NOT NULL,
  `reports_stock` int(11) NOT NULL,
  `reports_finance` int(11) NOT NULL,
  `reports_quantity` int(11) NOT NULL,
  `reports_sales` int(11) NOT NULL,
  `reports_drawer` int(11) NOT NULL,
  `database_view` int(11) NOT NULL,
  `database_backup` int(11) NOT NULL,
  `database_restore` int(11) NOT NULL,
  `database_remove` int(11) NOT NULL,
  `miscellanous_email` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group_permission`
--

INSERT INTO `tbl_group_permission` (`id`, `groupId`, `reparation_view`, `reparation_add`, `reparation_edit`, `reparation_delete`, `clients_view`, `clients_add`, `clients_edit`, `clients_delete`, `stock_view`, `stock_add`, `stock_edit`, `stock_delete`, `suppliers_view`, `suppliers_add`, `suppliers_edit`, `suppliers_delete`, `models_view`, `models_add`, `models_edit`, `models_delete`, `purchases_view`, `purchases_add`, `purchases_edit`, `purchases_delete`, `users_view`, `users_add`, `users_edit`, `users_delete`, `group_view`, `group_add`, `group_edit`, `group_delete`, `tax_view`, `tax_add`, `tax_edit`, `tax_delete`, `categories_view`, `categories_add`, `categories_edit`, `categories_delete`, `manufacturers_view`, `manufacturers_add`, `manufacturers_edit`, `manufacturers_delete`, `reports_stock`, `reports_finance`, `reports_quantity`, `reports_sales`, `reports_drawer`, `database_view`, `database_backup`, `database_restore`, `database_remove`, `miscellanous_email`, `u_branch`) VALUES
(1, 'master', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'bangi'),
(2, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hold`
--

CREATE TABLE `tbl_hold` (
  `id` int(11) NOT NULL,
  `random_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(9,2) NOT NULL,
  `status` int(11) NOT NULL,
  `id_item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hold`
--

INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES
(949, '36509969', 'Battery', 1, 21.00, 0, '34'),
(951, '36509969', 'Camera Sony Xperia Z', 1, 21.00, 0, '37'),
(953, '1847534547', 'Camera Sony Xperia M', 1, 21.00, 0, '36'),
(957, '79493929', 'Battery', 1, 21.00, 0, '34'),
(958, '79493929', 'Battery', 1, 29.00, 0, '35'),
(963, '369480810', 'Battery', 1, 29.00, 0, '35'),
(965, '1677410638', 'Battery', 1, 29.00, 0, '35'),
(967, '146884123', 'Battery', 1, 29.00, 0, '35'),
(977, '2031930422', 'Camera Sony Xperia M', 10, 210.00, 0, '36'),
(978, '2031930422', 'Battery', 1, 21.00, 0, '34'),
(982, '725428327', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(983, '1731309825', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(984, '116729146', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1001, '1369556355', 'Samsung Galaxy S10', 10, 210.00, 0, '33'),
(1002, '1369556355', 'Battery', 5, 145.00, 0, '35'),
(1003, '1196047214', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1004, '1196047214', 'Battery', 1, 29.00, 0, '35'),
(1005, '370413818', 'Battery', 1, 21.00, 0, '34'),
(1006, '595306120', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1007, '1670721703', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1008, '822203367', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1009, '822203367', 'Battery', 1, 29.00, 0, '35'),
(1010, '234027368', 'Battery', 1, 29.00, 0, '35'),
(1014, '406553306', 'Battery', 1, 29.00, 0, '35'),
(1019, '1099294961', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1022, '1951969026', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1023, '1951969026', 'Camera Sony Xperia M', 1, 21.00, 0, '36'),
(1024, '309439957', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1025, '1160822745', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1026, '882672846', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1027, '1666760278', 'Samsung Galaxy S10', 1, 21.00, 0, '33'),
(1028, '1393496153', 'Samsung Galaxy S10', 1, 21.00, 0, '33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holdproduct`
--

CREATE TABLE `tbl_holdproduct` (
  `id` int(11) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` double(9,2) NOT NULL,
  `pro_tax` double(9,2) NOT NULL,
  `pro_disc` double(9,2) NOT NULL,
  `pro_status` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_holdproduct`
--

INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES
(231, '33', 'Samsung Galaxy S10', 1, 31.00, 10.00, 0.00, 0, '2239'),
(237, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '9833'),
(240, '33', 'Samsung Galaxy S10', 1, 41.00, 10.00, 0.00, 0, '8512'),
(244, '36', 'Camera Sony Xperia M', 1, 21.00, 0.00, 0.00, 0, '9709'),
(245, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '9709'),
(246, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '1607'),
(247, '37', 'Camera Sony Xperia Z', 1, 21.00, 0.00, 0.00, 0, '1607'),
(248, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '4099'),
(250, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '1076'),
(267, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 1, '4648'),
(268, '33', 'Samsung Galaxy S10', 1, 21.00, 0.00, 0.00, 0, '2906'),
(269, '34', 'Battery', 1, 6.00, 10.00, 15.00, 0, '2906');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_details`
--

CREATE TABLE `tbl_invoice_details` (
  `id` int(11) NOT NULL,
  `invoiceName` varchar(255) NOT NULL,
  `invoiceEmail` varchar(255) NOT NULL,
  `invoiceAddr` varchar(255) NOT NULL,
  `invoiceTel` varchar(255) NOT NULL,
  `invoiceCustom` varchar(255) NOT NULL,
  `invoiceDisclaimer` varchar(255) NOT NULL,
  `invoiceLogo` varchar(255) NOT NULL,
  `invoiceBackground` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_details`
--

INSERT INTO `tbl_invoice_details` (`id`, `invoiceName`, `invoiceEmail`, `invoiceAddr`, `invoiceTel`, `invoiceCustom`, `invoiceDisclaimer`, `invoiceLogo`, `invoiceBackground`, `u_branch`) VALUES
(1, 'Invoice', 'gadgetprofix@gmail.com', 'No.2B Bandar Pasir Puteh, Jalan Kota Bharu', '017 999 0009', '', '', 'ee87fd7fdf79b9c88acdac99e307e306.png', '', 'bangi'),
(2, 'Receipt', 'test@gmail.com', 'Salak Selatan', '987652673', '', 'Test', '52af0c048419af26477b1a13082af59b.png', '', 'shah alam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup_category`
--

CREATE TABLE `tbl_lookup_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lookup_category`
--

INSERT INTO `tbl_lookup_category` (`cat_id`, `cat_name`, `hold_id`, `u_branch`) VALUES
(41, 'Screen', '6505', 'bangi'),
(42, 'Battery', '6506', 'bangi'),
(60, 'Camera', '9577', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup_imei`
--

CREATE TABLE `tbl_lookup_imei` (
  `id` int(11) NOT NULL,
  `imei` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lookup_imei`
--

INSERT INTO `tbl_lookup_imei` (`id`, `imei`) VALUES
(1, '155534253455456'),
(2, '175534253455456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup_item`
--

CREATE TABLE `tbl_lookup_item` (
  `id` int(11) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_price` double(9,2) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lookup_item`
--

INSERT INTO `tbl_lookup_item` (`id`, `i_name`, `i_price`, `u_branch`) VALUES
(1, 'Plug In All Android (100008)  ', 17.00, 'bangi'),
(2, 'Plug In All Android (100010)  ', 9.00, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup_model`
--

CREATE TABLE `tbl_lookup_model` (
  `id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lookup_model`
--

INSERT INTO `tbl_lookup_model` (`id`, `m_name`) VALUES
(1, 'Redmi Note 7'),
(2, 'Vivo S1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup_subcategory`
--

CREATE TABLE `tbl_lookup_subcategory` (
  `sub_id` int(11) NOT NULL,
  `subCat_name` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lookup_subcategory`
--

INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES
(26, 'Amoled Samsung', '41', '6505', 'bangi'),
(27, 'HD+ Screen', '41', '6505', 'bangi'),
(28, 'HDR+ HD+ Screen', '41', '6505', 'bangi'),
(29, 'Battery Lithium', '42', '6506', 'bangi'),
(110, 'Battery Lithium 1000mah', '42', '6506', 'bangi'),
(111, 'Battery Lithium 2000mah', '42', '6506', 'bangi'),
(112, 'Battery Lithium 3000mah', '42', '6506', 'bangi'),
(113, 'Battery Lithium 4000mah', '42', '6506', 'bangi'),
(123, 'Samsung F1.8', '60', '9577', 'bangi'),
(124, 'Sony IMX1', '60', '9577', 'bangi'),
(125, 'Sony IMX2', '60', '9577', 'bangi'),
(126, 'Sony IMX3', '60', '9577', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`m_id`, `m_name`, `u_branch`) VALUES
(1, 'Acer', 'bangi'),
(2, 'Apple', 'bangi'),
(7, 'Hewlett Peckerd', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `md_id` int(11) NOT NULL,
  `md_name` varchar(255) NOT NULL,
  `md_manufacturer` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`md_id`, `md_name`, `md_manufacturer`, `u_branch`) VALUES
(1, 'E5333', 'Sony Xperia', 'bangi'),
(3, 'E5333', 'Sony Xperia', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `r_repairno` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_ref` varchar(255) NOT NULL,
  `pay_amount` double(9,2) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pay_note` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES
(43, 'REPAIR4410', '806280801', '2019-12-03', '9283634', 250.00, 'Cash', 'test', ''),
(51, 'REPAIR4499', '806280801', '2019-12-18', '2019/567', 50.00, 'Cash', 'Test', ''),
(53, 'REPAIR4499', '806280801', '2019-12-18', '2019/567', 50.00, 'Cash', 'Test', ''),
(54, 'REPAIR4407', '806280801', '2019-12-11', '9283634', 0.00, 'Cash', 'test', ''),
(55, 'REPAIR4400', '806280801', '2019-03-03', '9283634', 1000.00, 'Cash', 'test', ''),
(72, 'REPAIR7870', '692491403', '0000-00-00', '', 0.00, '', '', ''),
(74, 'REPAIR9021', '291249039', '0000-00-00', '', 0.00, '', '', ''),
(77, 'REPAIR9021', '291249039', '2019-12-26', '2019/45', 30.00, 'Cash', 'Test', ''),
(78, 'REPAIR9021', '291249039', '0000-00-00', '2019/604', 0.00, '-', 'Test', ''),
(85, 'REPAIR7870', '692491403', '0000-00-00', '2019/467', 0.00, '-', 'Test', ''),
(86, 'REPAIR7870', '692491403', '0000-00-00', '2019/215', 0.00, '-', 'Test', ''),
(90, 'REPAIR7870', '692491403', '0000-00-00', '2019/21', 0.00, '-', 'Test', ''),
(91, 'REPAIR7870', '692491403', '0000-00-00', '2019/243', 0.00, '-', 'Test', ''),
(92, 'REPAIR7870', '692491403', '0000-00-00', '2019/451', 0.00, '-', 'Test', ''),
(93, 'REPAIR7870', '692491403', '0000-00-00', '2019/253', 0.00, '-', 'Test', ''),
(94, 'REPAIR7870', '692491403', '2019-12-27', '2019/660', 100.00, 'Cash', 'Test', ''),
(95, 'REPAIR9021', '291249039', '2019-12-26', '2019/44', 6.00, 'Cash', 'Test', 'bangi'),
(96, 'REPAIR4720', '1920586045', '0000-00-00', '', 0.00, '', '', 'bangi'),
(101, 'REPAIR7087', '1964831362', '0000-00-00', '', 0.00, '', '', 'bangi'),
(102, 'REPAIR7087', '1964831362', '2019-12-25', '2019/366', 6.00, 'Cash', 'Test', 'bangi'),
(103, 'REPAIR3199', '1297034262', '0000-00-00', '', 0.00, '', '', 'bangi'),
(104, 'REPAIR3199', '1297034262', '2019-12-31', '2019/76', 1.00, 'Cash', 'Test', 'bangi'),
(110, 'REPAIR8098', '1860059694', '0000-00-00', '', 0.00, '', '', 'bangi'),
(111, 'REPAIR1791', '520890838', '0000-00-00', '', 0.00, '', '', 'bangi'),
(119, 'REPAIR4576', '1369556355', '2019-12-31', '2019/705', 15.00, 'Cash', 'Test', 'bangi'),
(120, 'REPAIR7605', '370413818', '0000-00-00', '', 0.00, '', '', 'bangi'),
(124, 'REPAIR6695', '822203367', '0000-00-00', '', 0.00, '', '', 'bangi'),
(125, 'REPAIR6695', '822203367', '2019-12-30', '2019/156', 1.00, 'Cash', 'Test', 'bangi'),
(126, 'REPAIR3994', '234027368', '0000-00-00', '', 0.00, '', '', 'bangi'),
(127, 'REPAIR3151', '406553306', '0000-00-00', '', 0.00, '', '', 'bangi'),
(128, 'REPAIR4576', '1369556355', '2019-12-25', '2019/848', 40.00, 'Cash', 'Test', 'bangi'),
(129, 'REPAIR1043', '1099294961', '0000-00-00', '', 0.00, '', '', 'bangi'),
(130, 'REPAIR1043', '1099294961', '2019-12-31', '2019/287', 1.00, 'Cash', 'Test', 'bangi'),
(131, 'REPAIR1043', '1099294961', '2019-12-31', '2019/196', 10.00, 'Cash', 'Test', 'bangi'),
(132, 'REPAIR2991', '1951969026', '0000-00-00', '', 0.00, '', '', 'bangi'),
(133, 'REPAIR8652', '309439957', '0000-00-00', '', 0.00, '', '', 'bangi'),
(134, 'REPAIR953', '1187756392', '0000-00-00', '', 0.00, '', '', 'bangi'),
(135, 'REPAIR932', '1160822745', '0000-00-00', '', 0.00, '', '', 'bangi'),
(136, 'REPAIR3347', '882672846', '0000-00-00', '', 0.00, '', '', 'bangi'),
(137, 'REPAIR8613', '1666760278', '0000-00-00', '', 0.00, '', '', 'bangi'),
(138, 'REPAIR8613', '1666760278', '0000-00-00', '', 0.00, '', '', 'bangi'),
(139, 'REPAIR8613', '1666760278', '0000-00-00', '', 0.00, '', '', 'bangi'),
(140, 'REPAIR3751', '1393496153', '0000-00-00', '', 0.00, '', '', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posdetails`
--

CREATE TABLE `tbl_posdetails` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `total` double(9,2) NOT NULL,
  `total_paid` double(9,2) NOT NULL,
  `date_pos` datetime NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `user_incharge` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posdetails`
--

INSERT INTO `tbl_posdetails` (`id`, `transaction_id`, `c_id`, `total`, `total_paid`, `date_pos`, `hold_id`, `user_incharge`, `u_branch`) VALUES
(140, 'POS5748', '50', 21.00, 22.00, '2019-12-16 15:14:35', '975', 'Aliff', 'bangi'),
(141, 'POS4890', '51', 153.00, 153.00, '2019-10-01 16:08:29', '2371', 'Aliff', 'bangi'),
(143, 'POS1189', '50', 147.00, 147.00, '2019-12-18 22:57:25', '3251', 'Aliff', 'shah alam'),
(145, 'POS3626', '40', 63.00, 10.00, '2019-12-22 01:05:54', '2760', 'Aliff', 'bangi'),
(163, 'POS8620', '42', 21.00, 11.00, '2019-12-30 17:21:33', '4648', 'Aliff', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pospayment`
--

CREATE TABLE `tbl_pospayment` (
  `id` int(11) NOT NULL,
  `pay_ref` varchar(255) NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `pay_amount` double(9,2) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pay_note` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pospayment`
--

INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES
(12, '2019/261', '2019-12-16 15:14:35', 0.00, '', '', 'POS5748', '975', 'bangi'),
(13, '2019/260', '2019-12-19', 11.00, 'Cash', 'Test', 'POS5748', '975', 'bangi'),
(14, '2019/984', '2019-12-17', 11.00, 'Cash', 'Test', 'POS5748', '975', 'bangi'),
(15, '', '2019-12-16 16:08:29', 0.00, '', '', 'POS4890', '2371', 'bangi'),
(20, '2019/93', '2019-12-18', 11.00, 'Cash', 'Test', 'POS4890', '2371', 'bangi'),
(21, '2019/839', '2019-12-26', 142.00, 'Cash', 'Test', 'POS4890', '2371', 'bangi'),
(22, '', '2019-12-18 18:03:50', 0.00, '', '', 'POS9218', '4446', ''),
(24, '', '2019-12-18 22:57:25', 0.00, '', '', 'POS1189', '3251', ''),
(26, '', '2019-12-22 01:04:49', 0.00, '', '', 'POS417', '9124', ''),
(27, '', '2019-12-22 01:05:54', 0.00, '', '', 'POS3626', '2760', ''),
(28, '', '2019-12-22 01:07:08', 0.00, '', '', 'POS9841', '6625', ''),
(29, '2019/832', '2019-12-22 14:05:33', 11.00, '', 'Test', 'POS7193', '5266', 'bangi'),
(30, '2019/132', '2019-12-22 14:06:05', 11.00, '', 'Test', 'POS1610', '1453', 'bangi'),
(31, '2019/377', '2019-12-22 14:11:08', 25.00, '', 'Test', 'POS2128', '5818', 'bangi'),
(32, '2019/927', '2019-12-22 14:20:28', 11.00, '', 'Test', 'POS4330', '871', 'bangi'),
(33, '2019/258', '2019-12-22 14:31:00', 11.00, '', 'Test', 'POS8009', '3374', 'bangi'),
(34, '2019/258', '2019-12-22 14:32:07', 11.00, '', 'Test', 'POS8009', '3374', 'bangi'),
(35, '2019/114', '2019-12-22 14:33:11', 25.00, '', 'Test', 'POS6009', '5618', 'bangi'),
(36, '2019/265', '2019-12-25', 10.00, 'Cash', 'Test', 'POS7193', '5266', 'bangi'),
(37, '2019/265', '2019-12-25', 10.00, 'Cash', 'Test', 'POS7193', '5266', 'bangi'),
(38, '2019/349', '2019-12-23', 1.00, 'Cash', 'Test', 'POS7193', '5266', 'bangi'),
(39, '2019/618', '2019-12-17', 19.00, 'Cash', 'Test', 'POS7193', '5266', 'bangi'),
(40, '2019/107', '2019-12-24', 50.00, 'Cash', 'Test', 'POS9218', '4446', 'bangi'),
(41, '2019/526', '2019-12-25', 10.00, 'Cash', 'Test', 'POS1610', '1453', 'bangi'),
(57, '2019/369', '2019-12-25', 7.00, 'Cash', 'Test', 'POS1189', '3251', 'bangi'),
(58, '2019/947', '2019-12-26', 100.00, 'Cash', 'Test', 'POS1189', '3251', 'bangi'),
(59, '2019/173', '2019-12-26', 100.00, 'Cash', 'Test', 'POS1189', '3251', 'bangi'),
(84, '2019/927', '0000-00-00', 0.00, '-', 'Test', 'POS3626', '2760', 'bangi'),
(85, '2019/54', '0000-00-00', 0.00, '-', 'Test', 'POS3626', '2760', 'bangi'),
(86, '2019/695', '2019-12-25', 10.00, 'Cash', 'Test', 'POS3626', '2760', 'bangi'),
(87, '2019/733', '0000-00-00', 0.00, '-', 'Test', 'POS3626', '2760', 'bangi'),
(88, '2019/227', '2019-12-30 17:21:33', 1.00, '', 'Test', 'POS8620', '4648', 'bangi'),
(89, '2019/271', '2019-12-31', 10.00, 'Cash', 'Test', 'POS8620', '4648', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_client`
--

CREATE TABLE `tbl_print_client` (
  `id` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_print_client`
--

INSERT INTO `tbl_print_client` (`id`, `hold_id`, `c_id`) VALUES
(2, '1418943719', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_purchase`
--

CREATE TABLE `tbl_print_purchase` (
  `id` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `pur_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_print_purchase`
--

INSERT INTO `tbl_print_purchase` (`id`, `hold_id`, `pur_id`) VALUES
(101, '1320810709', '40'),
(102, '1280154307', '42'),
(103, '1280154307', '39'),
(105, '1775204527', '42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_sales`
--

CREATE TABLE `tbl_print_sales` (
  `id` int(11) NOT NULL,
  `p_details_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custAddress` varchar(255) NOT NULL,
  `custPhone` int(11) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custBranch` varchar(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proQty` int(11) NOT NULL,
  `proPrice` double(9,2) NOT NULL,
  `proTax` double(9,2) NOT NULL,
  `user_incharge` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_print_sales`
--

INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES
(1, 0, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '2128674645', ''),
(2, 0, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1844737109', 'bangi'),
(3, 0, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1304152508', 'bangi'),
(27, 0, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1336043634', 'bangi'),
(28, 0, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1800706041', 'bangi'),
(29, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '66087229', 'bangi'),
(30, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '462818525', 'bangi'),
(31, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '639914749', 'bangi'),
(32, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '992980609', 'bangi'),
(33, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '992980609', 'bangi'),
(34, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '992980609', 'bangi'),
(35, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1489690501', 'bangi'),
(36, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1489690501', 'bangi'),
(37, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1813626938', 'bangi'),
(38, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1466370576', 'bangi'),
(39, 140, 'POS5748', 'Syraf', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '752464810', 'bangi'),
(44, 158, 'POS4330', 'Ashrullllllllll', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', 'bangi'),
(45, 146, 'POS9841', 'Ashrullllllllll', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', ''),
(46, 155, 'POS2128', 'Ashrullllllllll', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', 'bangi'),
(47, 162, 'POS6009', 'Ashruloooooooooooooo', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', 'bangi'),
(48, 149, 'POS7193', 'Ashrullllllllll', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', 'bangi'),
(49, 142, 'POS9218', 'Pian', 'Salak Selatan', 191725352, 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', 'bangi'),
(50, 159, 'POS8009', 'Ashrullllllllll', 'Salak Selatan', 172563723, 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', 1, 21.00, 0.00, 'Aliff', '1872628853', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_stock`
--

CREATE TABLE `tbl_print_stock` (
  `id` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_cost` double(9,2) NOT NULL,
  `p_price` double(9,2) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_alertQuantity` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_print_stock`
--

INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES
(3, '35', 'Battery', '43650', 11.00, 29.00, 21, 11, '', '856073731'),
(4, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, 7, 11, '', '856073731'),
(5, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, 7, 11, 'bangi', '1225501868'),
(6, '35', 'Battery', '43650', 11.00, 29.00, 21, 11, 'bangi', '1225501868'),
(7, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, 7, 11, 'bangi', '1045223422'),
(8, '36', 'Camera Sony Xperia M', '43650', 11.00, 21.00, 12, 11, 'bangi', '1045223422'),
(9, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, 7, 11, 'bangi', '615873935'),
(10, '34', 'Battery', '70000', 11.00, 21.00, 21, 11, 'bangi', '615873935'),
(11, '34', 'Battery', '70000', 11.00, 21.00, 21, 11, 'bangi', '2026431385'),
(12, '34', 'Battery', '70000', 11.00, 21.00, 21, 11, 'bangi', '1068032094'),
(13, '36', 'Camera Sony Xperia M', '43650', 11.00, 21.00, 12, 11, 'bangi', '1068032094'),
(14, '37', 'Camera Sony Xperia Z', '70000', 11.00, 21.00, 21, 17, 'bangi', '1068032094'),
(15, '34', 'Battery', '70000', 11.00, 21.00, 21, 11, 'bangi', '2123733440'),
(16, '35', 'Battery', '43650', 11.00, 29.00, 21, 11, 'bangi', '2123733440'),
(17, '36', 'Camera Sony Xperia M', '43650', 11.00, 21.00, 12, 11, 'bangi', '2123733440'),
(18, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, 7, 11, 'bangi', '697658457'),
(19, '33', 'Samsung Galaxy S10', '70000', 11.00, 21.00, -6, 11, 'bangi', '1278797781');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_type` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `p_subCategory` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_unit` varchar(255) NOT NULL,
  `p_cost` double(9,2) NOT NULL,
  `p_price` double(9,2) NOT NULL,
  `p_supplier` varchar(255) NOT NULL,
  `p_model` varchar(255) NOT NULL,
  `p_alertQuantity` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_tax` varchar(255) NOT NULL,
  `p_taxMethod` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES
(33, 'Service', '70000', 'Samsung Galaxy S10', '', '123', 'Test', '0ee96f390701b0d23245af0e4a7e9c72.png', '12', 11.00, 21.00, 'Padil Bundle', 'Service', 11, 907, 'Service', 'Service', '6505', 'bangi'),
(34, 'Service', '70000', 'Battery', '', '110', 'Test', '2209b865f245e7ab1d244a5434a02664.png', '12', 11.00, 21.00, 'Kedai Ustaz', 'Service', 11, 99, 'Service', 'Service', '4016', 'bangi'),
(35, 'Service', '43650', 'Battery', '42', '110', 'Test', '6d545a690ffbdb57c4796817a012b581.png', '12', 11.00, 29.00, 'Kedai Ustaz', 'Service', 11, 14, 'Service', 'Service', '143', 'bangi'),
(36, 'Service', '43650', 'Camera Sony Xperia M', '42', '124', 'Test21', 'a27a64fee77ddf6a27132b5f345f58e5.png', '12', 11.00, 21.00, 'Kedai Ustaz', 'Service', 11, 99, 'Service', 'Service', '249', 'bangi'),
(37, 'Service', '70000', 'Camera Sony Xperia Z', '60', '124', 'Test', 'fb28eea7508dc5d2c87cc1e2332c5c9f.png', '12', 11.00, 21.00, 'Nabil', 'Service', 17, 19, 'Service', 'Service', '6294', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `pur_date` datetime NOT NULL,
  `pur_ref` varchar(255) NOT NULL,
  `pur_status` varchar(255) NOT NULL,
  `pur_file` varchar(255) NOT NULL,
  `purSupplier` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `pur_total` double(9,2) NOT NULL,
  `pur_tax` varchar(255) NOT NULL,
  `pur_discount` varchar(255) NOT NULL,
  `pur_ship` varchar(255) NOT NULL,
  `pur_note` varchar(255) NOT NULL,
  `afterDisc` double(9,2) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `pur_date`, `pur_ref`, `pur_status`, `pur_file`, `purSupplier`, `hold_id`, `pur_total`, `pur_tax`, `pur_discount`, `pur_ship`, `pur_note`, `afterDisc`, `u_branch`) VALUES
(41, '2019-11-27 12:13:36', '018273', 'Pending', 'c8b7c72906408354df96f63179d6d0c9.png', 'Kedai Ustaz', '982794647', 26.00, 'VAT', '10', 'test', '<p>testing</p>', 0.00, 'bangi'),
(42, '2019-12-12 01:20:51', '018273', 'Pending', '4ea5c0caff1556213b1d8f22e412e16d.png', 'Kedai Ustaz', '1590520413', 26.00, 'VAT', '10', 'test', '<p>Test</p>', 23.40, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_item`
--

CREATE TABLE `tbl_purchase_item` (
  `id` int(11) NOT NULL,
  `itemID` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` double(9,2) NOT NULL,
  `itemQuantity` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_item`
--

INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES
(75, '', 'Plug In All Android (100008)  ', 17.00, '1', '1033392947', 'bangi'),
(76, '', 'Plug In All Android (100010)  ', 9.00, '1', '1033392947', 'bangi'),
(80, '', 'Plug In All Android (100008)  ', 17.00, '1', '397955798', 'bangi'),
(81, '', 'Plug In All Android (100010)  ', 9.00, '1', '397955798', 'bangi'),
(83, '1', 'Plug In All Android (100008)  ', 17.00, '1', '1961745983', 'bangi'),
(85, '1', 'Plug In All Android (100008)  ', 17.00, '1', '1252514272', 'bangi'),
(86, '2', 'Plug In All Android (100010)  ', 9.00, '1', '1252514272', 'bangi'),
(87, '1', 'Plug In All Android (100008)  ', 17.00, '1', '1252514272', 'bangi'),
(88, '1', 'Plug In All Android (100008)  ', 17.00, '1', '666793347', 'bangi'),
(89, '2', 'Plug In All Android (100010)  ', 9.00, '1', '666793347', 'bangi'),
(90, '1', 'Plug In All Android (100008)  ', 17.00, '1', '2057061476', 'bangi'),
(91, '2', 'Plug In All Android (100010)  ', 9.00, '1', '2057061476', 'bangi'),
(92, '1', 'Plug In All Android (100008)  ', 17.00, '1', '2057061476', 'bangi'),
(93, '1', 'Plug In All Android (100008)  ', 17.00, '1', '982794647', 'bangi'),
(94, '2', 'Plug In All Android (100010)  ', 9.00, '1', '982794647', 'bangi'),
(95, '1', 'Plug In All Android (100008)  ', 17.00, '1', '34557229', 'bangi'),
(96, '2', 'Plug In All Android (100010)  ', 9.00, '1', '34557229', 'bangi'),
(97, '1', 'Plug In All Android (100008)  ', 17.00, '1', '1590520413', 'bangi'),
(98, '2', 'Plug In All Android (100010)  ', 9.00, '1', '1590520413', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair_details`
--

CREATE TABLE `tbl_repair_details` (
  `id` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `r_diagnostics` varchar(255) NOT NULL,
  `r_repairstatus` varchar(255) NOT NULL,
  `r_statusid` int(11) NOT NULL,
  `r_statusBGColor` varchar(255) NOT NULL,
  `r_statusTextColor` varchar(255) NOT NULL,
  `r_statuscompleted` int(11) NOT NULL,
  `r_statusemail` int(11) NOT NULL,
  `r_repairno` varchar(255) NOT NULL,
  `r_file` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_repair_details`
--

INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_statusid`, `r_statusBGColor`, `r_statusTextColor`, `r_statuscompleted`, `r_statusemail`, `r_repairno`, `r_file`, `u_branch`) VALUES
(42, '126969499', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR3653', '02ac426c12d423abf1f5277f31bfadcc.png', ''),
(43, '56122533', 'Test11', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR281', '0504fa5bd460b1a26ca7b63cfa7d0052.png', ''),
(44, '2107685547', 'Test17', 'New Job', 0, '', '', 0, 0, 'REPAIR9222', 'aae51a015b0fa8458f794eae016e8cc8.png', ''),
(45, '1083033830', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR3015', 'e35f900d8c11b09ca81833e8d0f2114f.png', ''),
(46, '1012177755', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR5549', '20b44c250ee5cef7bc96da8ebb08606d.png', ''),
(47, '530492861', 'Test11', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR5261', '086ffd38b385128fbb58469421cfbcb5.png', ''),
(48, '1831098617', 'Test13', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR2915', '9b8d57abbc2e8e1bb088d412976001e1.png', ''),
(49, '387644351', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR1519', '3db2a7ce5eb33440b42488c22590345c.png', ''),
(50, '1378917563', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR1468', '117a6489758e323f1ade966a47bd5712.png', ''),
(51, '907741208', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR5092', '117a6489758e323f1ade966a47bd5712.png', ''),
(52, '1901711216', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR8133', '09b65c4c14fed60a457d58c80fc57ca9.png', ''),
(53, '614690892', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR1817', 'e5267e8d544d58a2022107a8b5158102.png', ''),
(55, '632833885', 'Test99', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR1749', '233b46268bfff54e0eba3efc2b9045df.png', ''),
(57, '806280801', 'Test10101', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR4499', '38cc93ed4107b06a1631306be32a1c4c.png', ''),
(61, '255465711', 'Test', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR9305', '3f66118044f5c457c3d4a3ebcc24dc41.png', ''),
(62, '692491403', 'Test', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR7870', '667c4acb4d14942f9c3221e19a511d85.png', ''),
(63, '291249039', 'Test', 'Done by Asyraf', 0, '', '', 0, 0, 'REPAIR9021', '8473d92eff8636be17fc96987df09989.png', ''),
(66, '1964831362', 'Test', 'Done by Ashrul', 0, '', '', 0, 0, 'REPAIR7087', 'b7ffbb45ff5da1923b7b80c247017452.png', 'bangi'),
(67, '1297034262', 'Test', '<button class=', 0, '', '', 0, 0, 'REPAIR3199', 'f039228a82b1ce1053c492994c4147a2.png', 'bangi'),
(72, '1860059694', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR8098', '915147d5e78e3b842434584194b93cf0.png', 'bangi'),
(73, '520890838', 'Test', 'Done by Ashrul', 0, '', '', 0, 0, 'REPAIR1791', '57da8a217c270758b0852c0ac4d69298.png', 'bangi'),
(76, '1913004707', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR4721', '06b62ada2f6cf5d8660c223b0d5aede7.png', 'bangi'),
(77, '1369556355', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR4576', '796cd6c7905f22858631d2b437783198.png', 'bangi'),
(78, '1196047214', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR7956', '2aa12c7745ac213895e3c81c992fd486.png', 'bangi'),
(82, '822203367', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR6695', 'dde5e1f09681605f8dbce6a7d5d4ca71.png', 'bangi'),
(83, '234027368', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR3994', '75c38ee5dae482932cd2a60bc998c8f5.png', 'bangi'),
(84, '406553306', 'Test', 'Process', 0, '', '', 0, 0, 'REPAIR3151', '66eb1f9c8e52a045da67f1e85d06d9b2.png', 'bangi'),
(85, '1099294961', 'Test', 'New Job', 0, '', '', 0, 0, 'REPAIR1043', 'f85c68ef3fd696da766840543d0ffeac.png', 'bangi'),
(86, '1951969026', '', 'Done by Pian', 7, '', '', 1, 0, 'REPAIR2991', '0ce3420b4848648cc72ecf19531d30de.png', 'bangi'),
(87, '1160822745', 'Test', 'Done by Pian', 0, '', '', 1, 0, 'REPAIR932', '2ce87917c008f330b5f88b50beebbd12.png', 'bangi'),
(88, '882672846', 'Test', 'OK', 8, '#fff', '#000', 0, 0, 'REPAIR3347', '9f894fd57c8aa3c02f6b6939c94f69a7.png', 'bangi'),
(89, '1666760278', 'Test', 'Done by Pian', 7, '#516253', '#827362', 1, 0, 'REPAIR8613', '1b56d5bad890eaaacccba340bc342db7.png', 'bangi'),
(90, '1393496153', 'Test', 'Done by Pian', 7, '#516253', '#827362', 1, 1, 'REPAIR3751', '1985f7f94824ecd6b2751a6941b35c0b.png', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair_status`
--

CREATE TABLE `tbl_repair_status` (
  `id` int(11) NOT NULL,
  `statusName` varchar(255) NOT NULL,
  `statusTemplate` varchar(255) NOT NULL,
  `statusBGColor` varchar(255) NOT NULL,
  `statusTextColor` varchar(255) NOT NULL,
  `position_order` int(11) NOT NULL,
  `status_completed` int(11) NOT NULL,
  `status_email` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_repair_status`
--

INSERT INTO `tbl_repair_status` (`id`, `statusName`, `statusTemplate`, `statusBGColor`, `statusTextColor`, `position_order`, `status_completed`, `status_email`, `u_branch`) VALUES
(7, 'Done by Pian', 'Test Template', '#516253', '#827362', 2, 1, 1, 'bangi'),
(8, 'OK', '', '#fff', '#000', 1, 0, 0, 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reparation`
--

CREATE TABLE `tbl_reparation` (
  `r_code` varchar(255) NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_imei` varchar(255) DEFAULT NULL,
  `r_telephone` int(12) DEFAULT NULL,
  `r_defect` varchar(255) DEFAULT NULL,
  `r_model` varchar(255) DEFAULT NULL,
  `r_opened` datetime DEFAULT NULL,
  `r_status` varchar(255) DEFAULT NULL,
  `r_statusid` int(11) NOT NULL,
  `r_statusBGColor` varchar(255) NOT NULL,
  `r_statusTextColor` varchar(255) NOT NULL,
  `r_statuscompleted` int(11) NOT NULL,
  `r_statusemail` int(11) NOT NULL,
  `r_assigned` varchar(255) DEFAULT NULL,
  `r_created` varchar(255) DEFAULT NULL,
  `r_lastmodified` varchar(255) DEFAULT NULL,
  `r_file` varchar(255) NOT NULL,
  `r_total` double(9,2) NOT NULL,
  `r_paid` double(9,2) NOT NULL,
  `r_repairno` varchar(255) DEFAULT NULL,
  `r_category` varchar(255) NOT NULL,
  `r_manufacturer` varchar(255) NOT NULL,
  `r_servicecharge` double(9,2) NOT NULL,
  `r_closedate` varchar(255) NOT NULL,
  `r_period` varchar(255) NOT NULL,
  `r_comment` varchar(255) NOT NULL,
  `r_taxtype` varchar(255) NOT NULL,
  `r_subtotal` double(9,2) NOT NULL,
  `r_tax` double(9,2) NOT NULL,
  `r_signature` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reparation`
--

INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_statusid`, `r_statusBGColor`, `r_statusTextColor`, `r_statuscompleted`, `r_statusemail`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES
('CUS00093', 50, 'Syraf', 'asyrafsam14@gmail.com', '155534253455456', 172563723, 'Screen Break', 'Redmi Note 7', '2019-12-31 04:33:06', 'Done by Pian', 7, '#516253', '#827362', 1, 0, 'Asyraf', 'Aliff', 'Aliff', '', 31.00, 0.00, 'REPAIR932', 'Camera', 'Xiaomi', 10.00, '11/30/2019', '3 Week', 'Test', 'VAT', 21.00, 10.00, 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dC3RcVb0/8O9vn5kkBSlgCspLUUBQnlceIuVREBbiA7g+inf5RCltJgV5NzOTwEAyMwmFoqUzaVF8473KVa/i/2KBgigFpSjoBQVaqI+qYCnUPkIec/bvv/ZM0k7TtM0kk8zre9bKmnRyzt6/32cfyC9n9tlHwI0CFKAABShAAQpQgAIUKI', '1160822745', 'bangi'),
('CUS00094', 48, 'Nabilllllllllll', 'asyrafsam14@gmail.com', '155534253455456', 172563723, 'Screen Break', 'Vivo S1', '2020-01-01 07:38:12', 'OK', 8, '#fff', '#000', 0, 0, 'Asyraf', 'Aliff', 'Aliff', '', 31.00, 0.00, 'REPAIR3347', 'Camera', 'Xiaomi', 10.00, '12/28/2019', '1 Week', 'Test', 'Tax Rate', 21.00, 10.00, 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dCXxc1X0v8N//3JmRjVmN2bKAWcxmwITFmCXsW9qXNk0CzWvy0qZZbEvgFhojzYwEA9bMyHbiNMaS7SR9/by8tnmlodlYYhLjFQM2CbsNFhAWBwhmNWBLM3PP/33OnZGR5ZG1WNIs+t0P8xlJc+9ZvufK/HXuWQQ8KEABClCAAhSgAAUoQI', '882672846', 'bangi'),
('CUS00095', 49, 'Pian', 'asyrafsam14@gmail.com', '155534253455456', 191725352, 'Screen Break', 'Vivo S1', '2019-12-31 05:29:50', 'Done by Pian', 7, '#516253', '#827362', 1, 0, 'Asyraf', 'Aliff', 'Aliff', '', 31.00, 0.00, 'REPAIR8613', 'Camera', 'Xiaomi', 10.00, '12/31/2019', '1 Week', 'Test', 'VAT', 21.00, 10.00, 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dC3xcZZ0//s/3mVyhFxAoUO7QoosXvBYE5CIqXlZ/6F/xsq67ItBmplQE2uTMSe1Ac2aStnJpO5NGZYu6u64oKrq6KiiF1ttyEeuKcrGgAkpLC6UXmmTm+f5fz5kkTUvaJm2SOTPzOa9XXjNJznme7/f9HOh3Tp7zHAE3ClCAAqMo0NHRMR', '1666760278', 'bangi'),
('CUS00096', 44, 'Ashrultest', 'asyrafsam14@gmail.com', '155534253455456', 172563723, 'Screen Break', 'Redmi Note 7', '2020-01-02 12:55:08', 'Done by Pian', 7, '#516253', '#827362', 1, 1, 'Asyraf', 'Aliff', 'Aliff', '', 31.00, 0.00, 'REPAIR3751', 'Camera', 'Xiaomi', 10.00, '01/31/2020', '1 Week', 'Test', 'VAT', 21.00, 10.00, 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dC5xcdX338e/vP7ObkAsJ1whYLqJSAfFCn3JVSGMv+vSxRQuPbb20tRB2NqZiDdmZ2ehgdmZ2wWIN7KypeKkVbaEVL219REECCELVUizeAGNFUQhgAiRh53J+z+vMZiGEhMxu9jKXz7xe+9rL/G+/9/8kfHM4e46JFwIIIIAAAggggAACCM', '1393496153', 'bangi');

--
-- Triggers `tbl_reparation`
--
DELIMITER $$
CREATE TRIGGER `tg_tbl_reparation_insert` BEFORE INSERT ON `tbl_reparation` FOR EACH ROW BEGIN
  INSERT INTO tbl_reparation_seq VALUES (NULL);
  SET NEW.r_code = CONCAT('CUS', LPAD(LAST_INSERT_ID(), 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reparation_item`
--

CREATE TABLE `tbl_reparation_item` (
  `id` int(11) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemQuantity` varchar(255) NOT NULL,
  `itemPrice` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reparation_item`
--

INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES
(107, '1', '126969499', 'Plug In All Android (100008)  ', '1', 17.00),
(108, '2', '126969499', 'Plug In All Android (100010)  ', '1', 9.00),
(109, '2', '56122533', 'Plug In All Android (100010)  ', '1', 9.00),
(110, '1', '56122533', 'Plug In All Android (100008)  ', '1', 17.00),
(111, '2', '56122533', 'Plug In All Android (100010)  ', '1', 9.00),
(112, '1', '126969499', 'Plug In All Android (100008)  ', '1', 17.00),
(113, '2', '126969499', 'Plug In All Android (100010)  ', '1', 9.00),
(114, '1', '56122533', 'Plug In All Android (100008)  ', '1', 17.00),
(115, '2', '56122533', 'Plug In All Android (100010)  ', '1', 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reparation_log`
--

CREATE TABLE `tbl_reparation_log` (
  `id` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `r_repairno` varchar(255) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `log_action` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reparation_log`
--

INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES
(1, '1083033830', 'REPAIR3015', '2019-12-05 02:51:49', 'Aliff', 'Insert Reparation', 'bangi'),
(2, '1012177755', 'REPAIR5549', '0000-00-00 00:00:00', 'Aliff', 'Insert New Reparation', 'bangi'),
(3, '530492861', 'REPAIR5261', '0000-00-00 00:00:00', 'Aliff', 'Insert New Reparation', 'bangi'),
(4, '1831098617', 'REPAIR2915', '2019-12-05 10:22:19', 'Aliff', 'Insert New Reparation', 'bangi'),
(5, '1083033830', 'REPAIR3015', '2019-12-05 10:38:33', 'Aliff', 'Status Update', 'bangi'),
(6, '126969499', 'REPAIR3653', '2019-12-05 11:04:51', 'Aliff', 'Payment Added', 'bangi'),
(7, '', 'REPAIR3653', '2019-12-05 12:18:02', 'Aliff', 'Payment Deleted', 'bangi'),
(8, '', 'REPAIR3653', '2019-12-05 12:20:47', 'Aliff', 'Payment Deleted', 'bangi'),
(9, '126969499', 'REPAIR3653', '2019-12-05 12:24:41', 'Aliff', 'Payment Added', 'bangi'),
(10, '', 'REPAIR3653', '2019-12-05 12:25:03', 'Aliff', 'Payment Deleted', 'bangi'),
(11, '2107685547', 'REPAIR9222', '2019-12-05 02:07:40', 'Aliff', 'Payment Added', 'bangi'),
(12, '', 'REPAIR9222', '2019-12-05 02:07:58', 'Aliff', 'Payment Deleted', 'bangi'),
(13, '1831098617', 'REPAIR2915', '2019-12-05 02:13:27', 'Aliff', 'Reparation updated', 'bangi'),
(14, '2107685547', 'REPAIR9222', '2019-12-05 02:13:38', 'Aliff', 'Reparation updated', 'bangi'),
(15, '2107685547', 'REPAIR9222', '2019-12-05 02:15:45', 'Aliff', 'Reparation updated', 'bangi'),
(16, '2107685547', 'REPAIR9222', '2019-12-05 02:16:00', 'Aliff', 'Reparation updated', 'bangi'),
(17, '2107685547', 'REPAIR9222', '2019-12-05 02:37:50', 'Aliff', 'Payment Added', 'bangi'),
(18, '2107685547', 'REPAIR9222', '2019-12-05 02:39:36', 'Aliff', 'Payment Added', 'bangi'),
(19, '2107685547', 'REPAIR9222', '2019-12-05 02:39:54', 'Aliff', 'Payment Added', 'bangi'),
(20, '2107685547', 'REPAIR9222', '2019-12-05 04:41:17', 'Aliff', 'Payment Added', 'bangi'),
(21, '2107685547', 'REPAIR9222', '2019-12-05 04:42:31', 'Aliff', 'Payment Added', 'bangi'),
(22, '2107685547', 'REPAIR9222', '2019-12-05 04:43:20', 'Aliff', 'Payment Added', 'bangi'),
(23, '2107685547', 'REPAIR9222', '2019-12-05 04:46:14', 'Aliff', 'Payment Added', 'bangi'),
(24, '2107685547', 'REPAIR9222', '2019-12-05 04:48:43', 'Aliff', 'Payment Added', 'bangi'),
(25, '2107685547', 'REPAIR9222', '2019-12-05 04:48:58', 'Aliff', 'Payment Added', 'bangi'),
(26, '2107685547', 'REPAIR9222', '2019-12-05 04:49:55', 'Aliff', 'Payment Added', 'bangi'),
(27, '2107685547', 'REPAIR9222', '2019-12-05 04:54:04', 'Aliff', 'Payment Added', 'bangi'),
(28, '2107685547', 'REPAIR9222', '2019-12-05 04:54:04', 'Aliff', 'Payment Added', 'bangi'),
(29, '2107685547', 'REPAIR9222', '2019-12-05 04:56:02', 'Aliff', 'Payment Added', 'bangi'),
(30, '2107685547', 'REPAIR9222', '2019-12-05 04:56:02', 'Aliff', 'Payment Added', 'bangi'),
(31, '2107685547', 'REPAIR9222', '2019-12-05 04:57:28', 'Aliff', 'Payment Added', 'bangi'),
(32, '387644351', 'REPAIR1519', '2019-12-05 05:07:24', 'Aliff', 'Insert New Reparation', 'bangi'),
(33, '387644351', 'REPAIR1519', '2019-12-05 05:08:08', 'Aliff', 'Payment Added', 'bangi'),
(34, '387644351', 'REPAIR1519', '2019-12-05 05:08:08', 'Aliff', 'Payment Added', 'bangi'),
(35, '387644351', 'REPAIR1519', '2019-12-05 05:08:44', 'Aliff', 'Payment Added', 'bangi'),
(36, '387644351', 'REPAIR1519', '2019-12-05 05:09:20', 'Aliff', 'Payment Added', 'bangi'),
(37, '387644351', 'REPAIR1519', '2019-12-05 05:09:20', 'Aliff', 'Payment Added', 'bangi'),
(38, '387644351', 'REPAIR1519', '2019-12-05 05:11:29', 'Aliff', 'Payment Added', 'bangi'),
(39, '1378917563', 'REPAIR1468', '2019-12-05 08:07:15', 'Aliff', 'Insert New Reparation', 'bangi'),
(40, '387644351', 'REPAIR1519', '2019-12-05 08:12:43', 'Aliff', 'Payment Added', 'bangi'),
(41, '1378917563', 'REPAIR1468', '2019-12-05 08:13:22', 'Aliff', 'Payment Added', 'bangi'),
(42, '907741208', 'REPAIR5092', '2019-12-05 08:24:40', 'Aliff', 'Insert New Reparation', 'bangi'),
(43, '907741208', 'REPAIR5092', '2019-12-05 08:25:57', 'Aliff', 'Payment Added', 'bangi'),
(44, '907741208', 'REPAIR5092', '2019-12-05 08:27:50', 'Aliff', 'Payment Added', 'bangi'),
(45, '1378917563', 'REPAIR1468', '2019-12-06 03:38:08', 'Aliff', 'Status Update', 'bangi'),
(46, '1378917563', 'REPAIR1468', '2019-12-06 03:40:10', 'Aliff', 'Status Update', 'bangi'),
(47, '1901711216', 'REPAIR8133', '2019-12-06 03:57:59', 'Aliff', 'Insert New Reparation', 'bangi'),
(48, '907741208', 'REPAIR5092', '2019-12-06 05:11:14', 'Aliff', 'Payment Added', 'bangi'),
(49, '614690892', 'REPAIR1817', '2019-12-06 05:37:56', 'Aliff', 'Insert New Reparation', 'bangi'),
(50, '1788919830', 'REPAIR3607', '2019-12-06 05:38:38', 'Aliff', 'Insert New Reparation', 'bangi'),
(51, '1788919830', 'REPAIR3607', '2019-12-06 05:41:02', 'Aliff', 'Payment Added', 'bangi'),
(52, '1788919830', 'REPAIR3607', '2019-12-06 05:41:24', 'Aliff', 'Payment Added', 'bangi'),
(53, '632833885', 'REPAIR1749', '2019-12-07 01:10:44', 'Aliff', 'Insert New Reparation', 'bangi'),
(54, '632833885', 'REPAIR1749', '2019-12-07 01:11:56', 'Aliff', 'Payment Added', 'bangi'),
(55, '', '', '2019-12-07 10:31:05', 'Aliff', 'Payment Deleted', 'bangi'),
(56, '', '', '2019-12-07 10:31:14', 'Aliff', 'Payment Deleted', 'bangi'),
(57, '', '', '2019-12-07 10:31:50', 'Aliff', 'Payment Deleted', 'bangi'),
(58, '', '', '2019-12-07 10:32:42', 'Aliff', 'Payment Deleted', 'bangi'),
(59, '', '', '2019-12-07 10:35:16', 'Aliff', 'Payment Deleted', 'bangi'),
(60, '', '', '2019-12-07 10:35:27', 'Aliff', 'Payment Deleted', 'bangi'),
(61, '', '40', '2019-12-07 10:40:49', 'Aliff', 'Payment Deleted', 'bangi'),
(62, '364061962', 'REPAIR420', '2019-12-07 05:43:29', 'Aliff', 'Insert New Reparation', 'bangi'),
(63, '364061962', 'REPAIR420', '2019-12-07 05:44:17', 'Aliff', 'Payment Added', 'bangi'),
(64, '806280801', 'REPAIR4499', '2019-12-07 05:44:36', 'Aliff', 'Insert New Reparation', 'bangi'),
(65, '806280801', 'REPAIR4499', '2019-12-07 05:48:42', 'Aliff', 'Payment Added', 'bangi'),
(66, '806280801', 'REPAIR4499', '2019-12-07 05:49:00', 'Aliff', 'Payment Added', 'bangi'),
(67, '', '45', '2019-12-07 10:50:30', 'Aliff', 'Payment Deleted', 'bangi'),
(68, '806280801', 'REPAIR4499', '2019-12-07 05:52:33', 'Aliff', 'Payment Added', 'bangi'),
(69, '', '44', '2019-12-07 10:53:05', 'Aliff', 'Payment Deleted', 'bangi'),
(70, '', 'REPAIR4499', '2019-12-07 10:55:14', 'Aliff', 'Payment Deleted', 'bangi'),
(71, '806280801', 'REPAIR4499', '2019-12-07 06:10:21', 'Aliff', 'Status Update', 'bangi'),
(72, '1538848305', 'REPAIR2141', '2019-12-07 06:11:31', 'Aliff', 'Insert New Reparation', 'bangi'),
(73, '1538848305', 'REPAIR2141', '2019-12-07 06:12:29', 'Aliff', 'Payment Added', 'bangi'),
(74, '476615075', 'REPAIR5684', '2019-12-16 12:55:49', 'Aliff', 'Insert New Reparation', 'bangi'),
(75, '476615075', 'REPAIR5684', '2019-12-16 11:19:54', 'Aliff', 'Payment Added', 'bangi'),
(76, '476615075', 'REPAIR5684', '2019-12-16 11:20:14', 'Aliff', 'Payment Added', 'bangi'),
(77, '476615075', 'REPAIR5684', '2019-12-16 11:27:43', 'Aliff', 'Payment Added', 'bangi'),
(78, '476615075', 'REPAIR5684', '2019-12-16 11:48:41', 'Aliff', 'Payment Added', 'bangi'),
(79, '476615075', 'REPAIR5684', '2019-12-16 11:57:20', 'Aliff', 'Payment Added', 'bangi'),
(80, '476615075', 'REPAIR5684', '2019-12-16 11:57:35', 'Aliff', 'Payment Added', 'bangi'),
(81, '', 'REPAIR5684', '2019-12-16 05:21:48', 'Aliff', 'Payment Deleted', 'bangi'),
(82, '', 'REPAIR5684', '2019-12-16 05:24:23', 'Aliff', 'Payment Deleted', 'bangi'),
(83, '476615075', 'REPAIR5684', '2019-12-16 12:24:35', 'Aliff', 'Payment Added', 'bangi'),
(84, '476615075', 'REPAIR5684', '2019-12-16 12:24:54', 'Aliff', 'Payment Added', 'bangi'),
(85, '', 'REPAIR5684', '2019-12-16 05:25:19', 'Aliff', 'Payment Deleted', 'bangi'),
(86, '476615075', 'REPAIR5684', '2019-12-16 12:25:22', 'Aliff', 'Payment Added', 'bangi'),
(87, '', 'REPAIR5684', '2019-12-16 05:25:59', 'Aliff', 'Payment Deleted', 'bangi'),
(88, '476615075', 'REPAIR5684', '2019-12-16 12:26:03', 'Aliff', 'Payment Added', 'bangi'),
(89, '1538848305', 'REPAIR2141', '2019-12-16 12:26:18', 'Aliff', 'Payment Added', 'bangi'),
(90, '', 'REPAIR2141', '2019-12-16 05:26:42', 'Aliff', 'Payment Deleted', 'bangi'),
(91, '', 'REPAIR2141', '2019-12-16 05:26:52', 'Aliff', 'Payment Deleted', 'bangi'),
(92, '', 'REPAIR2141', '2019-12-16 05:26:58', 'Aliff', 'Payment Deleted', 'bangi'),
(93, '', 'REPAIR2141', '2019-12-16 05:27:04', 'Aliff', 'Payment Deleted', 'bangi'),
(94, '', 'REPAIR2141', '2019-12-16 05:27:10', 'Aliff', 'Payment Deleted', 'bangi'),
(95, '1997814573', 'REPAIR1112', '2019-12-16 12:27:16', 'Aliff', 'Insert New Reparation', 'bangi'),
(96, '1997814573', 'REPAIR1112', '2019-12-16 12:28:11', 'Aliff', 'Payment Added', 'bangi'),
(97, '1997814573', 'REPAIR1112', '2019-12-16 12:28:25', 'Aliff', 'Payment Added', 'bangi'),
(98, '', 'REPAIR1112', '2019-12-16 05:28:51', 'Aliff', 'Payment Deleted', 'bangi'),
(99, '', 'REPAIR5684', '2019-12-16 05:28:57', 'Aliff', 'Payment Deleted', 'bangi'),
(100, '', 'REPAIR1112', '2019-12-16 05:29:38', 'Aliff', 'Payment Deleted', 'bangi'),
(101, '', 'REPAIR5684', '2019-12-16 05:30:01', 'Aliff', 'Payment Deleted', 'bangi'),
(102, '255465711', 'REPAIR9305', '2019-12-16 12:30:02', 'Aliff', 'Insert New Reparation', 'bangi'),
(103, '', 'REPAIR9305', '2019-12-16 05:31:06', 'Aliff', 'Payment Deleted', 'bangi'),
(104, '692491403', 'REPAIR7870', '2019-12-16 12:31:08', 'Aliff', 'Insert New Reparation', 'bangi'),
(105, '692491403', 'REPAIR7870', '2019-12-16 12:32:24', 'Aliff', 'Payment Added', 'bangi'),
(106, '', 'REPAIR7870', '2019-12-16 05:32:46', 'Aliff', 'Payment Deleted', 'bangi'),
(107, '291249039', 'REPAIR9021', '2019-12-16 12:34:29', 'Aliff', 'Insert New Reparation', 'bangi'),
(108, '291249039', 'REPAIR9021', '2019-12-16 12:35:09', 'Aliff', 'Payment Added', 'bangi'),
(109, '', 'REPAIR9021', '2019-12-16 05:35:43', 'Aliff', 'Payment Deleted', 'bangi'),
(110, '291249039', 'REPAIR9021', '2019-12-16 12:35:45', 'Aliff', 'Payment Added', 'bangi'),
(111, '291249039', 'REPAIR9021', '2019-12-17 09:45:54', 'Aliff', 'Status Update', 'bangi'),
(112, '1538848305', 'REPAIR2141', '2019-12-17 09:46:22', 'Aliff', 'Status Update', 'bangi'),
(113, '', 'REPAIR9021', '2019-12-18 09:24:01', 'Aliff', 'Payment Deleted', 'bangi'),
(114, '291249039', 'REPAIR9021', '2019-12-18 04:24:17', 'Aliff', 'Payment Added', 'bangi'),
(115, '291249039', 'REPAIR9021', '2019-12-18 04:24:34', 'Aliff', 'Payment Added', 'bangi'),
(116, '1303954294', 'REPAIR6441', '2019-12-18 05:36:16', 'Aliff', 'Insert New Reparation', 'bangi'),
(117, '1303954294', 'REPAIR6441', '2019-12-18 05:37:57', 'Aliff', 'Payment Added', 'bangi'),
(118, '1303954294', 'REPAIR6441', '2019-12-18 05:39:56', 'Aliff', 'Payment Added', 'bangi'),
(119, '', 'REPAIR6441', '2019-12-18 10:40:49', 'Aliff', 'Payment Deleted', 'bangi'),
(120, '476615075', 'REPAIR5684', '2019-12-22 10:39:12', 'Aliff', 'Payment Added', 'bangi'),
(121, '1303954294', 'REPAIR6441', '2019-12-22 10:39:34', 'Aliff', 'Payment Added', 'bangi'),
(122, '692491403', 'REPAIR7870', '2019-12-22 10:40:55', 'Aliff', 'Payment Added', 'bangi'),
(123, '692491403', 'REPAIR7870', '2019-12-22 10:41:50', 'Aliff', 'Payment Added', 'bangi'),
(124, '', 'REPAIR5684', '2019-12-22 05:17:45', 'Aliff', 'Payment Deleted', 'bangi'),
(125, '476615075', 'REPAIR5684', '2019-12-23 12:17:48', 'Aliff', 'Payment Added', 'bangi'),
(126, '', 'REPAIR5684', '2019-12-22 05:18:51', 'Aliff', 'Payment Deleted', 'bangi'),
(127, '476615075', 'REPAIR5684', '2019-12-23 12:18:53', 'Aliff', 'Payment Added', 'bangi'),
(128, '', 'REPAIR5684', '2019-12-22 05:20:49', 'Aliff', 'Payment Deleted', 'bangi'),
(129, '1303954294', 'REPAIR6441', '2019-12-23 12:21:10', 'Aliff', 'Payment Added', 'bangi'),
(130, '692491403', 'REPAIR7870', '2019-12-23 12:21:49', 'Aliff', 'Payment Added', 'bangi'),
(131, '692491403', 'REPAIR7870', '2019-12-23 12:22:06', 'Aliff', 'Payment Added', 'bangi'),
(132, '', 'REPAIR7870', '2019-12-22 05:22:44', 'Aliff', 'Payment Deleted', 'bangi'),
(133, '', 'REPAIR7870', '2019-12-22 05:22:53', 'Aliff', 'Payment Deleted', 'bangi'),
(134, '', 'REPAIR7870', '2019-12-22 05:23:11', 'Aliff', 'Payment Deleted', 'bangi'),
(135, '', 'REPAIR7870', '2019-12-22 05:23:17', 'Aliff', 'Payment Deleted', 'bangi'),
(136, '692491403', 'REPAIR7870', '2019-12-23 12:23:20', 'Aliff', 'Payment Added', 'bangi'),
(137, '692491403', 'REPAIR7870', '2019-12-23 09:50:24', 'Aliff', 'Payment Added', 'bangi'),
(138, '', 'REPAIR7870', '2019-12-23 02:50:58', 'Aliff', 'Payment Deleted', 'bangi'),
(139, '', 'REPAIR7870', '2019-12-23 02:51:04', 'Aliff', 'Payment Deleted', 'bangi'),
(140, '692491403', 'REPAIR7870', '2019-12-23 09:51:07', 'Aliff', 'Payment Added', 'bangi'),
(141, '', 'REPAIR9021', '2019-12-23 02:58:33', 'Aliff', 'Payment Deleted', 'bangi'),
(142, '291249039', 'REPAIR9021', '2019-12-26 03:41:00', 'Aliff', 'Payment Added', 'bangi'),
(143, '2086295926', 'REPAIR5886', '2019-12-26 03:44:26', 'Aliff', 'Insert New Reparation', 'bangi'),
(144, '2086295926', 'REPAIR5886', '2019-12-26 03:44:47', 'Aliff', 'Payment Added', 'bangi'),
(145, '2086295926', 'REPAIR5886', '2019-12-26 03:46:17', 'Aliff', 'Payment Added', 'bangi'),
(146, '2086295926', 'REPAIR5886', '2019-12-26 03:47:54', 'Aliff', 'Payment Added', 'bangi'),
(147, '1964831362', 'REPAIR7087', '2019-12-26 04:54:20', 'Aliff', 'Insert New Reparation', 'bangi'),
(148, '1964831362', 'REPAIR7087', '2019-12-26 04:55:16', 'Aliff', 'Payment Added', 'bangi'),
(149, '1297034262', 'REPAIR3199', '2019-12-30 09:31:30', 'Aliff', 'Insert New Reparation', 'bangi'),
(150, '1297034262', 'REPAIR3199', '2019-12-30 09:32:32', 'Aliff', 'Payment Added', 'bangi'),
(151, '1765729272', 'REPAIR9664', '2019-12-30 09:33:18', 'Aliff', 'Insert New Reparation', 'bangi'),
(152, '1765729272', 'REPAIR9664', '2019-12-30 09:34:11', 'Aliff', 'Payment Added', 'bangi'),
(153, '544407328', 'REPAIR6817', '2019-12-30 09:41:46', 'Aliff', 'Insert New Reparation', 'bangi'),
(154, '544407328', 'REPAIR6817', '2019-12-30 09:45:37', 'Aliff', 'Reparation updated', 'bangi'),
(155, '2054110935', 'REPAIR7146', '2019-12-30 10:08:47', 'Aliff', 'Insert New Reparation', 'bangi'),
(156, '2054110935', 'REPAIR7146', '2019-12-30 10:09:33', 'Aliff', 'Reparation updated', 'bangi'),
(157, '653007294', 'REPAIR2505', '2019-12-30 10:14:24', 'Aliff', 'Insert New Reparation', 'bangi'),
(158, '653007294', 'REPAIR2505', '2019-12-30 10:15:38', 'Aliff', 'Reparation updated', 'bangi'),
(159, '653007294', 'REPAIR2505', '2019-12-30 10:15:54', 'Aliff', 'Reparation updated', 'bangi'),
(160, '1860059694', 'REPAIR8098', '2019-12-30 10:57:53', 'Aliff', 'Insert New Reparation', 'bangi'),
(161, '520890838', 'REPAIR1791', '2019-12-30 11:00:16', 'Aliff', 'Insert New Reparation', 'bangi'),
(162, '520890838', 'REPAIR1791', '2019-12-30 11:04:04', 'Aliff', 'Reparation updated', 'bangi'),
(163, '520890838', 'REPAIR1791', '2019-12-30 11:04:32', 'Aliff', 'Reparation updated', 'bangi'),
(164, '1297034262', 'REPAIR3199', '2019-12-30 11:18:07', 'Aliff', 'Reparation updated', 'bangi'),
(165, '1396629382', 'REPAIR2592', '2019-12-30 11:19:41', 'Aliff', 'Insert New Reparation', 'bangi'),
(166, '1396629382', 'REPAIR2592', '2019-12-30 11:23:31', 'Aliff', 'Reparation updated', 'bangi'),
(167, '1300271953', 'REPAIR956', '2019-12-30 11:24:02', 'Aliff', 'Insert New Reparation', 'bangi'),
(168, '1300271953', 'REPAIR956', '2019-12-30 11:25:36', 'Aliff', 'Reparation updated', 'bangi'),
(169, '1913004707', 'REPAIR4721', '2019-12-30 11:27:50', 'Aliff', 'Insert New Reparation', 'bangi'),
(170, '1913004707', 'REPAIR4721', '2019-12-30 11:28:29', 'Aliff', 'Reparation updated', 'bangi'),
(171, '1913004707', 'REPAIR4721', '2019-12-30 11:28:56', 'Aliff', 'Payment Added', 'bangi'),
(172, '1396629382', 'REPAIR2592', '2019-12-30 11:46:49', 'Aliff', 'Reparation updated', 'bangi'),
(173, '1396629382', 'REPAIR2592', '2019-12-30 11:47:16', 'Aliff', 'Reparation updated', 'bangi'),
(174, '1369556355', 'REPAIR4576', '2019-12-30 04:05:02', 'Aliff', 'Insert New Reparation', 'bangi'),
(175, '1396629382', 'REPAIR2592', '2019-12-30 04:06:56', 'Aliff', 'Payment Added', 'bangi'),
(176, '1196047214', 'REPAIR7956', '2019-12-30 04:07:58', 'Aliff', 'Insert New Reparation', 'bangi'),
(177, '1369556355', 'REPAIR4576', '2019-12-30 04:10:27', 'Aliff', 'Payment Added', 'bangi'),
(178, '1065292617', 'REPAIR659', '2019-12-30 04:11:25', 'Aliff', 'Insert New Reparation', 'bangi'),
(179, '595306120', 'REPAIR9666', '2019-12-30 04:11:39', 'Aliff', 'Insert New Reparation', 'bangi'),
(180, '1670721703', 'REPAIR838', '2019-12-30 04:12:31', 'Aliff', 'Insert New Reparation', 'bangi'),
(181, '822203367', 'REPAIR6695', '2019-12-30 04:15:38', 'Aliff', 'Insert New Reparation', 'bangi'),
(182, '822203367', 'REPAIR6695', '2019-12-30 04:16:20', 'Aliff', 'Payment Added', 'bangi'),
(183, '234027368', 'REPAIR3994', '2019-12-30 04:16:36', 'Aliff', 'Insert New Reparation', 'bangi'),
(184, '406553306', 'REPAIR3151', '2019-12-30 04:17:21', 'Aliff', 'Insert New Reparation', 'bangi'),
(185, '234027368', 'REPAIR3994', '2019-12-30 04:20:05', 'Aliff', 'Reparation updated', 'bangi'),
(186, '1369556355', 'REPAIR4576', '2019-12-30 05:17:42', 'Aliff', 'Status Update', 'bangi'),
(187, '1369556355', 'REPAIR4576', '2019-12-30 05:17:51', 'Aliff', 'Payment Added', 'bangi'),
(188, '1099294961', 'REPAIR1043', '2019-12-30 05:23:23', 'Aliff', 'Insert New Reparation', 'bangi'),
(189, '1099294961', 'REPAIR1043', '2019-12-30 05:24:13', 'Aliff', 'Payment Added', 'bangi'),
(190, '1099294961', 'REPAIR1043', '2019-12-30 05:24:28', 'Aliff', 'Payment Added', 'bangi'),
(191, '1951969026', 'REPAIR2991', '2019-12-30 11:05:11', 'Aliff', 'Insert New Reparation', 'bangi'),
(192, '1160822745', 'REPAIR932', '2019-12-31 04:33:06', 'Aliff', 'Insert New Reparation', 'bangi'),
(193, '882672846', 'REPAIR3347', '2019-12-31 04:49:32', 'Aliff', 'Insert New Reparation', 'bangi'),
(194, '1666760278', 'REPAIR8613', '2019-12-31 05:29:50', 'Aliff', 'Insert New Reparation', 'bangi'),
(195, '882672846', 'REPAIR3347', '2020-01-01 07:34:49', 'Aliff', 'Reparation updated', 'bangi'),
(196, '882672846', 'REPAIR3347', '2020-01-01 07:35:17', 'Aliff', 'Reparation updated', 'bangi'),
(197, '882672846', 'REPAIR3347', '2020-01-01 07:37:40', 'Aliff', 'Reparation updated', 'bangi'),
(198, '882672846', 'REPAIR3347', '2020-01-01 07:37:51', 'Aliff', 'Reparation updated', 'bangi'),
(199, '882672846', 'REPAIR3347', '2020-01-01 07:38:12', 'Aliff', 'Reparation updated', 'bangi'),
(200, '1393496153', 'REPAIR3751', '2020-01-02 12:55:08', 'Aliff', 'Insert New Reparation', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reparation_seq`
--

CREATE TABLE `tbl_reparation_seq` (
  `r_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reparation_seq`
--

INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reparation_status`
--

CREATE TABLE `tbl_reparation_status` (
  `id` int(11) NOT NULL,
  `statusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reparation_status`
--

INSERT INTO `tbl_reparation_status` (`id`, `statusName`) VALUES
(1, 'New Job'),
(2, 'Process'),
(3, 'Done by Asyraf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_revenue`
--

CREATE TABLE `tbl_revenue` (
  `revenue_id` int(11) NOT NULL,
  `revenue_date` date NOT NULL,
  `revenue_subtotal` double(9,2) NOT NULL,
  `revenue_holdid` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_revenue`
--

INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES
(1, '2019-11-13', 70.00, 'REPAIR6441', 'bangi'),
(2, '2019-12-24', 133.00, 'POS9218', 'bangi'),
(3, '2019-11-20', 147.00, 'POS1189', 'bangi'),
(4, '0000-00-00', 0.00, 'POS417', 'bangi'),
(5, '2019-12-25', 0.00, 'POS3626', 'bangi'),
(6, '0000-00-00', 0.00, 'POS9841', 'bangi'),
(7, '2019-12-22', 11.00, 'POS4868', 'bangi'),
(8, '2019-12-22', 11.00, 'POS563', 'bangi'),
(9, '2019-12-17', 38.00, 'POS7193', 'bangi'),
(10, '2019-12-17', 38.00, 'POS7193', 'bangi'),
(11, '2019-12-17', 38.00, 'POS7193', 'bangi'),
(12, '2019-12-25', 0.00, 'POS1610', 'bangi'),
(13, '2019-12-22', 11.00, 'POS3342', 'bangi'),
(14, '2019-12-22', 11.00, 'POS3342', 'bangi'),
(15, '2019-12-22', 21.00, 'POS2128', 'bangi'),
(16, '2019-12-22', 21.00, 'POS4446', 'bangi'),
(17, '2019-12-22', 21.00, 'POS4446', 'bangi'),
(18, '2019-12-22', 11.00, 'POS4330', 'bangi'),
(19, '2019-12-22', 11.00, 'POS8009', 'bangi'),
(20, '2019-12-22', 11.00, 'POS8009', 'bangi'),
(21, '2019-12-22', 21.00, 'POS5855', 'bangi'),
(22, '2019-12-22', 21.00, 'POS6009', 'bangi'),
(23, '0000-00-00', 0.00, 'REPAIR4720', 'bangi'),
(24, '2019-12-26', 27.00, 'REPAIR5886', 'bangi'),
(25, '2020-01-01', 6.00, 'REPAIR7087', 'bangi'),
(26, '2019-12-31', 1.00, 'REPAIR3199', 'bangi'),
(27, '2019-12-31', 11.00, 'REPAIR9664', 'bangi'),
(28, '0000-00-00', 0.00, 'REPAIR6817', 'bangi'),
(29, '0000-00-00', 0.00, 'REPAIR7146', 'bangi'),
(30, '0000-00-00', 0.00, 'REPAIR2505', 'bangi'),
(31, '0000-00-00', 0.00, 'REPAIR8098', 'bangi'),
(32, '0000-00-00', 0.00, 'REPAIR1791', 'bangi'),
(33, '2019-12-26', 1.00, 'REPAIR2592', 'bangi'),
(34, '0000-00-00', 0.00, 'REPAIR956', 'bangi'),
(35, '2019-12-31', 3.00, 'REPAIR4721', 'bangi'),
(36, '2019-12-25', 55.00, 'REPAIR4576', 'bangi'),
(37, '0000-00-00', 0.00, 'REPAIR7956', 'bangi'),
(38, '0000-00-00', 0.00, 'REPAIR7605', 'bangi'),
(39, '0000-00-00', 0.00, 'REPAIR659', 'bangi'),
(40, '0000-00-00', 0.00, 'REPAIR9666', 'bangi'),
(41, '0000-00-00', 0.00, 'REPAIR838', 'bangi'),
(42, '2019-12-30', 1.00, 'REPAIR6695', 'bangi'),
(43, '0000-00-00', 0.00, 'REPAIR3994', 'bangi'),
(44, '0000-00-00', 0.00, 'REPAIR3151', 'bangi'),
(45, '2019-12-31', 11.00, 'POS8620', 'bangi'),
(46, '2019-12-31', 11.00, 'REPAIR1043', 'bangi'),
(47, '0000-00-00', 0.00, 'REPAIR2991', 'bangi'),
(48, '0000-00-00', 0.00, 'REPAIR8652', 'bangi'),
(49, '0000-00-00', 0.00, 'REPAIR953', 'bangi'),
(50, '0000-00-00', 0.00, 'REPAIR932', 'bangi'),
(51, '0000-00-00', 0.00, 'REPAIR3347', 'bangi'),
(52, '0000-00-00', 0.00, 'REPAIR8613', 'bangi'),
(53, '0000-00-00', 0.00, 'REPAIR8613', 'bangi'),
(54, '0000-00-00', 0.00, 'REPAIR8613', 'bangi'),
(55, '0000-00-00', 0.00, 'REPAIR3751', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` text NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_country` varchar(255) NOT NULL,
  `s_postal` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_company` varchar(255) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_state` varchar(255) NOT NULL,
  `s_phone` int(11) NOT NULL,
  `s_vat` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`s_id`, `s_name`, `s_address`, `s_country`, `s_postal`, `s_email`, `s_company`, `s_city`, `s_state`, `s_phone`, `s_vat`, `u_branch`) VALUES
(2, 'Kedai Ustaz', 'Salak Selatan', 'Malaysia', '70000', 'nabil@gmail.com', 'UTeM', 'Sepang', 'NEGERI SEMBILAN', 172563723, '123123123', 'shah alam'),
(4, 'Padil Bundle', 'Salak Selatan', 'Malaysia', '70000', 'nabil@gmail.com', 'UTeM', 'Sepang', 'NEGERI SEMBILAN', 172563723, '123123123', 'bangi'),
(5, 'Bundle', 'Test', 'test', '72633', 'test@gmail.com', 'test', 'test', 'test', 18273723, 'test', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `ul_name` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_phone` int(15) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `u_company` varchar(255) NOT NULL,
  `u_status` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `u_name`, `ul_name`, `u_image`, `u_email`, `u_phone`, `u_pass`, `u_role`, `u_company`, `u_status`, `u_branch`) VALUES
(1, 'Aliff', 'Test2', 'mascot_41x40.png', 'cs_aliaffan@gmail.com', 172563723, 'gadget7070', 'master', 'UTeM', 'Active', 'bangi'),
(2, 'Asyraf', 'acap', 'ProfixLogin.png', 'asyraf@gmail.com', 0, 'asyraf', 'admin', '', 'Active', 'bangi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `groupDescription` varchar(255) NOT NULL,
  `groupPermission` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`id`, `groupName`, `groupDescription`, `groupPermission`, `u_branch`) VALUES
(1, 'master', 'master user', '', 'bangi'),
(4, 'Admin', 'general user', '', 'bangi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_calendar_events`
--
ALTER TABLE `tbl_calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_database`
--
ALTER TABLE `tbl_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_drawer`
--
ALTER TABLE `tbl_drawer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_permission`
--
ALTER TABLE `tbl_group_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hold`
--
ALTER TABLE `tbl_hold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_holdproduct`
--
ALTER TABLE `tbl_holdproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lookup_category`
--
ALTER TABLE `tbl_lookup_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_lookup_imei`
--
ALTER TABLE `tbl_lookup_imei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lookup_item`
--
ALTER TABLE `tbl_lookup_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lookup_model`
--
ALTER TABLE `tbl_lookup_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lookup_subcategory`
--
ALTER TABLE `tbl_lookup_subcategory`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_posdetails`
--
ALTER TABLE `tbl_posdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pospayment`
--
ALTER TABLE `tbl_pospayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_print_client`
--
ALTER TABLE `tbl_print_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_print_purchase`
--
ALTER TABLE `tbl_print_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_print_sales`
--
ALTER TABLE `tbl_print_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_print_stock`
--
ALTER TABLE `tbl_print_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_item`
--
ALTER TABLE `tbl_purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_repair_details`
--
ALTER TABLE `tbl_repair_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_repair_status`
--
ALTER TABLE `tbl_repair_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reparation`
--
ALTER TABLE `tbl_reparation`
  ADD PRIMARY KEY (`r_code`);

--
-- Indexes for table `tbl_reparation_item`
--
ALTER TABLE `tbl_reparation_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reparation_log`
--
ALTER TABLE `tbl_reparation_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reparation_seq`
--
ALTER TABLE `tbl_reparation_seq`
  ADD PRIMARY KEY (`r_code`);

--
-- Indexes for table `tbl_reparation_status`
--
ALTER TABLE `tbl_reparation_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_revenue`
--
ALTER TABLE `tbl_revenue`
  ADD PRIMARY KEY (`revenue_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_calendar_events`
--
ALTER TABLE `tbl_calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_database`
--
ALTER TABLE `tbl_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_drawer`
--
ALTER TABLE `tbl_drawer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_group_permission`
--
ALTER TABLE `tbl_group_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hold`
--
ALTER TABLE `tbl_hold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `tbl_holdproduct`
--
ALTER TABLE `tbl_holdproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lookup_category`
--
ALTER TABLE `tbl_lookup_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_lookup_imei`
--
ALTER TABLE `tbl_lookup_imei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lookup_item`
--
ALTER TABLE `tbl_lookup_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lookup_model`
--
ALTER TABLE `tbl_lookup_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lookup_subcategory`
--
ALTER TABLE `tbl_lookup_subcategory`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_posdetails`
--
ALTER TABLE `tbl_posdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_pospayment`
--
ALTER TABLE `tbl_pospayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_print_client`
--
ALTER TABLE `tbl_print_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_print_purchase`
--
ALTER TABLE `tbl_print_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_print_sales`
--
ALTER TABLE `tbl_print_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_print_stock`
--
ALTER TABLE `tbl_print_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_purchase_item`
--
ALTER TABLE `tbl_purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_repair_details`
--
ALTER TABLE `tbl_repair_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_repair_status`
--
ALTER TABLE `tbl_repair_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_reparation_item`
--
ALTER TABLE `tbl_reparation_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_reparation_log`
--
ALTER TABLE `tbl_reparation_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbl_reparation_seq`
--
ALTER TABLE `tbl_reparation_seq`
  MODIFY `r_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_reparation_status`
--
ALTER TABLE `tbl_reparation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_revenue`
--
ALTER TABLE `tbl_revenue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
