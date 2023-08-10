-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 29, 2023 at 04:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `action_id` int(255) NOT NULL,
  `action_proj_no` varchar(255) NOT NULL,
  `action_for` varchar(255) NOT NULL,
  `action_body` varchar(255) NOT NULL,
  `action_date` date NOT NULL,
  `action_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`action_id`, `action_proj_no`, `action_for`, `action_body`, `action_date`, `action_by`) VALUES
(2, 'SGS(N).23Q002', 'quotation', 'Test redirect', '2023-02-15', 'ammar'),
(7, 'SGS(J).23Q001', 'quotation', 'Send an email and letter', '2023-03-21', 'ammar'),
(8, 'SGS(J).23Q001', 'quotation', 'New quotation', '2023-03-21', 'ammar'),
(10, 'SGS(J).23Q004', 'quotation', 'Send an email', '2023-03-22', 'ammar'),
(11, '<br />\r\n<b>Warning</b>:  Undefined variable $proj_no in <b>C:xampphtdocspromisys_devproject_management.php</b> on line <b>85</b><br />\r\n', 'quotation', 'Test', '2023-03-27', 'JHR049'),
(12, 'SGS(J).23Q004', 'quotation', 'Test redirect', '2023-03-27', 'JHR049'),
(13, '', 'quotation', 'Test log', '2023-03-27', 'ammar'),
(14, 'SGS(J).23Q005', 'quotation', 'Test log', '2023-03-27', 'ammar'),
(17, 'SGS(A).23Q003', 'quotation', 'Test redirect', '2023-03-28', 'ammar'),
(20, '', 'ps_7', 'Send an email and letter', '2023-03-29', 'MAM'),
(22, '', 'ps_8', 'Test add', '2023-03-29', 'MAM'),
(23, '', 'ps_1', 'Send an email and letter', '2023-03-29', 'MAM');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `role`, `created`) VALUES
(1, 'manish', 'manish123', '21232f297a57a5a743894a0e4a801fc3', 'super_admin', '2021-01-23 01:51:05'),
(2, 'akol', 'akol123', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2021-01-23 21:41:25'),
(3, 'kamal', 'kamal123', '21232f297a57a5a743894a0e4a801fc3', 'manager', '2021-01-23 01:57:54'),
(4, 'John Doe', 'admin', 'e99a18c428cb38d5f260853678922e03', 'super_admin', '2022-12-21 01:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_event_master`
--

INSERT INTO `calendar_event_master` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(1, 'Test 123', '2022-12-29', '2022-12-31'),
(2, 'Test', '2023-02-10', '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `checklist_id` int(255) NOT NULL,
  `checklist_value` varchar(255) NOT NULL,
  `checklist_proj_no` varchar(255) NOT NULL,
  `checklist_title` varchar(255) NOT NULL,
  `checklist_body` varchar(255) NOT NULL,
  `checklist_path` varchar(255) NOT NULL,
  `checklist_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklist_id`, `checklist_value`, `checklist_proj_no`, `checklist_title`, `checklist_body`, `checklist_path`, `checklist_status`) VALUES
(1, '53', 'SGS(J).23J001', 'Teasdasd', '', '', ''),
(2, '100', 'SGS(J).23J001', '23423423423', '', '', ''),
(3, '37', 'SGS(A).23J002', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_child`
--

CREATE TABLE `checklist_child` (
  `child_id` int(255) NOT NULL,
  `child_value` varchar(255) NOT NULL,
  `child_proj_no` varchar(255) NOT NULL,
  `child_title` varchar(255) NOT NULL,
  `child_type` varchar(255) NOT NULL,
  `child_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist_child`
--

INSERT INTO `checklist_child` (`child_id`, `child_value`, `child_proj_no`, `child_title`, `child_type`, `child_status`) VALUES
(1, '53', 'SGS(J).23J001', '123sdfsdfsdfsdf', '', 'check'),
(2, '53', 'SGS(J).23J001', 'sdfsdfsdfsdfsdf', '', 'check'),
(3, '53', 'SGS(J).23J001', 'sfsdfsdfsdf', '', 'check'),
(4, '100', 'SGS(J).23J001', 'sfsdfsdfsf', '', 'unchecked'),
(5, '100', 'SGS(J).23J001', 'sdfsdfsdfsdf', '', 'check'),
(6, '100', 'SGS(J).23J001', 'sdfsdfsdfs', '', 'check'),
(7, '37', 'SGS(A).23J002', 'Ut at justo vitae augue porta commodo.', '', 'check'),
(8, '37', 'SGS(A).23J002', 'Aenean sit amet tellus a risus semper venenatis.', '', 'check'),
(9, '37', 'SGS(A).23J002', 'Praesent vel nulla in nulla laoreet dapibus.', '', 'check');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(255) NOT NULL,
  `client_comp_name` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_pic` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `client_fax` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_comp_name`, `client_address`, `client_pic`, `client_phone`, `client_fax`, `client_email`) VALUES
(6, 'Apple', 'No 23, Jalan Pulai 60', 'Steve Jobs', '0127434241', '+8345345345', 'stevejobs@apple.com'),
(7, 'Microsoft', 'No 23, Jalan Pulai 60', 'Steve Jobs', '0127434241', '+8345345345', 'stevejobs@apple.com'),
(14, 'Samsung', 'Korea', 'John Doe', '01234567', '0123456', 'samsung@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(255) NOT NULL,
  `doc_proj_no` varchar(255) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_remark` varchar(255) NOT NULL,
  `doc_path` varchar(255) NOT NULL,
  `doc_type` varchar(255) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_upload_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(255) NOT NULL,
  `log_title` varchar(255) NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_title`, `log_user`, `log_date`, `log_status`) VALUES
(1, 'Logged in', 'JHR065', '2023-03-26 00:00:00', 'Success'),
(2, 'Logged out', 'JHR065', '2023-03-26 00:00:00', 'Success'),
(3, 'Logged in', 'JHR065', '2023-03-26 00:00:00', 'Success'),
(4, 'Logged out', 'JHR065', '2023-03-26 05:43:29', 'Success'),
(5, 'Logged in', 'JHR065', '2023-03-26 05:46:11', 'Success'),
(6, 'Logged out', 'JHR065', '2023-03-27 03:05:04', 'Success'),
(7, 'Logged in', 'JHR065', '2023-03-27 03:05:07', 'Success'),
(8, 'Request invoice', 'JHR065', '2023-03-27 06:15:50', 'Success'),
(9, 'Request invoice for SGS(J).23J003', 'JHR065', '2023-03-27 06:18:01', 'Success'),
(10, 'Logged in', 'JHR065', '2023-03-27 06:53:28', 'Success'),
(11, 'Delete invoice', 'JHR065', '2023-03-27 07:00:25', 'Success'),
(12, 'Delete invoice', 'JHR065', '2023-03-27 08:30:04', 'Success'),
(13, 'Request invoice for SGS(J).23J003', 'JHR065', '2023-03-27 08:34:10', 'Success'),
(14, 'Upload invoice', 'JHR065', '2023-03-27 08:44:55', 'Success'),
(15, 'Logged out', 'JHR065', '2023-03-27 09:05:16', 'Success'),
(16, 'Logged out', 'JHR049', '2023-03-27 09:05:31', 'Success'),
(17, 'Logged in', 'JHR049', '2023-03-27 09:05:54', 'Success'),
(18, 'Logged out', 'JHR049', '2023-03-27 09:07:19', 'Success'),
(19, 'Logged in', 'JHR065', '2023-03-27 09:07:23', 'Success'),
(20, 'Added a new quotation SGS(J).23Q005', 'JHR065', '2023-03-27 09:14:22', 'Success'),
(21, 'Add action to quotation SGS(J).23Q005', 'JHR065', '2023-03-27 09:27:00', 'Success'),
(22, 'Add action to quotation SGS(J).23Q005', 'JHR065', '2023-03-27 09:28:26', 'Success'),
(23, 'Add action to quotation SGS(J).23Q005', 'JHR065', '2023-03-27 09:28:37', 'Success'),
(24, 'Add action to quotation SGS(J).23Q005', 'JHR065', '2023-03-27 09:28:43', 'Success'),
(25, 'Delete an action for quotation ', 'JHR065', '2023-03-27 09:30:22', 'Success'),
(26, 'Delete an action in quotation ', 'JHR065', '2023-03-27 09:32:05', 'Success'),
(27, 'Approved quotation ', 'JHR065', '2023-03-27 09:37:34', 'Success'),
(28, 'Approved quotation ', 'JHR065', '2023-03-27 09:39:50', 'Success'),
(29, 'Request invoice for SGS(J).23J007', 'JHR065', '2023-03-27 09:46:51', 'Success'),
(30, 'Delete invoice', 'JHR065', '2023-03-27 09:46:55', 'Success'),
(31, 'Request invoice for SGS(J).23J007', 'JHR065', '2023-03-27 09:47:44', 'Success'),
(32, 'Upload invoice for SGS(J).23J007', 'JHR065', '2023-03-27 09:48:00', 'Success'),
(33, 'Request invoice for SGS(J).23J007', 'JHR065', '2023-03-27 10:07:31', 'Success'),
(34, 'Delete invoice', 'JHR065', '2023-03-27 10:07:39', 'Success'),
(35, 'Request invoice for SGS(J).23J007', 'JHR065', '2023-03-27 10:07:48', 'Success'),
(36, 'Upload invoice for SGS(J).23J007', 'JHR065', '2023-03-27 10:08:12', 'Success'),
(37, 'Logged in', 'JHR065', '2023-03-28 02:29:49', 'Success'),
(38, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 04:21:00', 'Success'),
(39, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 04:24:55', 'Success'),
(40, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 04:41:21', 'Success'),
(41, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 04:43:51', 'Success'),
(42, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 04:46:41', 'Success'),
(43, 'Add actual schedule data SGS(A).23J002On-Site', 'JHR065', '2023-03-28 05:40:03', 'Success'),
(44, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 05:45:11', 'Success'),
(45, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 05:59:04', 'Success'),
(46, 'Update schedule data SGS(A).23J002', 'JHR065', '2023-03-28 06:48:17', 'Success'),
(47, 'Update schedule data SGS(A).23J002', 'JHR065', '2023-03-28 06:48:40', 'Success'),
(48, 'Update schedule data SGS(A).23J002', 'JHR065', '2023-03-28 06:49:32', 'Success'),
(49, 'Update schedule data SGS(A).23J002', 'JHR065', '2023-03-28 06:49:47', 'Success'),
(50, 'Update schedule data SGS(A).23J002', 'JHR065', '2023-03-28 06:50:41', 'Success'),
(51, 'Logged in', 'JHR065', '2023-03-28 07:10:56', 'Success'),
(52, 'Logged in', 'JHR065', '2023-03-28 07:44:12', 'Success'),
(53, 'Logged in', 'JHR065', '2023-03-28 08:06:06', 'Success'),
(54, 'Add action to quotation SGS(A).23Q003', 'JHR065', '2023-03-28 08:17:23', 'Success'),
(55, 'Add action to quotation SGS(A).23Q003', 'JHR065', '2023-03-28 08:17:30', 'Success'),
(56, 'Delete an action in quotation ', 'JHR065', '2023-03-28 08:17:37', 'Success'),
(57, 'Delete an action in quotation ', 'JHR065', '2023-03-28 08:17:41', 'Success'),
(58, 'Delete project schedule', 'JHR065', '2023-03-28 08:32:43', 'Success'),
(59, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 08:51:14', 'Success'),
(60, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 08:51:39', 'Success'),
(61, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 08:52:21', 'Success'),
(62, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 08:52:39', 'Success'),
(63, 'Delete project schedule', 'JHR065', '2023-03-28 08:53:54', 'Success'),
(64, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 09:00:02', 'Success'),
(65, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 09:00:19', 'Success'),
(66, 'Delete project schedule', 'JHR065', '2023-03-28 09:01:31', 'Success'),
(67, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 09:28:26', 'Success'),
(68, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 09:39:44', 'Success'),
(69, 'Add schedule data SGS(A).23J002', 'JHR065', '2023-03-28 09:47:33', 'Success'),
(70, 'Add actual schedule data SGS(A).23J002 On-Site', 'JHR065', '2023-03-28 09:47:55', 'Success'),
(71, 'Logged in', 'JHR065', '2023-03-29 01:59:59', 'Success'),
(72, 'Add action to project schedule', 'JHR065', '2023-03-29 02:36:57', 'Success'),
(73, 'Add action to project schedule', 'JHR065', '2023-03-29 02:39:38', 'Success'),
(74, 'Add action to project schedule', 'JHR065', '2023-03-29 02:39:42', 'Success'),
(75, 'Delete project schedule', 'JHR065', '2023-03-29 02:52:26', 'Success'),
(76, 'Delete an action in project schedule', 'JHR065', '2023-03-29 02:54:21', 'Success'),
(77, 'Delete an action in project schedule', 'JHR065', '2023-03-29 02:54:29', 'Success'),
(78, 'Add action to project schedule', 'JHR065', '2023-03-29 03:03:04', 'Success'),
(79, 'Delete a document', 'JHR065', '2023-03-29 03:26:41', 'Success'),
(80, 'Add action to project schedule', 'JHR065', '2023-03-29 03:40:32', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `manage_id` int(255) NOT NULL,
  `manage_proj_no` varchar(255) NOT NULL,
  `manage_date` date NOT NULL,
  `manage_by` varchar(255) NOT NULL,
  `manage_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`manage_id`, `manage_proj_no`, `manage_date`, `manage_by`, `manage_status`) VALUES
(2, 'SGS(A).23J002', '2023-02-27', 'SAR', '1'),
(4, 'SGS(J).23J007', '2023-03-27', 'SAAT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `paid_id` int(255) NOT NULL,
  `paid_proj_no` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `paid_date` date NOT NULL,
  `paid_no` varchar(255) NOT NULL,
  `paid_collector` varchar(255) NOT NULL,
  `paid_receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(255) NOT NULL,
  `payment_proj_no` varchar(255) NOT NULL,
  `payment_tot_amt` varchar(255) NOT NULL,
  `payment_client` varchar(255) NOT NULL,
  `payment_pic` varchar(255) NOT NULL,
  `payment_tax` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_proj_no`, `payment_tot_amt`, `payment_client`, `payment_pic`, `payment_tax`, `payment_date`, `payment_status`, `payment_proof`) VALUES
(1, 'SGS(J).23J001', '2989898.00', 'Apple SDN BHD', '', '', '2023-02-15', '', ''),
(2, 'SGS(A).23J002', '2989898.00', 'Microsoft SDN BHD', '', '', '2023-02-27', '', ''),
(3, 'SGS(J).23J003', '999999999.00', '7', '', '', '2023-03-22', '', ''),
(4, 'SGS(J).23J007', '694201.00', 'Apple', '', '', '2023-03-27', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_quot_no` varchar(255) NOT NULL,
  `project_no` varchar(255) NOT NULL,
  `project_no_inc` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_work_scope` varchar(255) NOT NULL,
  `project_market_segmentation` varchar(255) NOT NULL,
  `project_duration` varchar(255) NOT NULL,
  `project_amount` varchar(255) NOT NULL,
  `project_remark` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `project_app_factor` varchar(255) NOT NULL,
  `project_pic` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `project_site_location` varchar(255) NOT NULL,
  `project_cost_profit` varchar(255) NOT NULL,
  `project_client` varchar(255) NOT NULL,
  `project_client_type` varchar(255) NOT NULL,
  `project_client_status` varchar(255) NOT NULL,
  `project_client_pic` varchar(255) NOT NULL,
  `project_client_phone` varchar(255) NOT NULL,
  `project_client_email` varchar(255) NOT NULL,
  `project_app_date` date NOT NULL,
  `project_quot_deadline` date NOT NULL,
  `project_update_status` varchar(255) NOT NULL,
  `project_checklist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_quot_no`, `project_no`, `project_no_inc`, `project_code`, `project_title`, `project_work_scope`, `project_market_segmentation`, `project_duration`, `project_amount`, `project_remark`, `project_status`, `project_app_factor`, `project_pic`, `project_type`, `project_site_location`, `project_cost_profit`, `project_client`, `project_client_type`, `project_client_status`, `project_client_pic`, `project_client_phone`, `project_client_email`, `project_app_date`, `project_quot_deadline`, `project_update_status`, `project_checklist`) VALUES
(2, 'SGS(A).23Q003', 'SGS(A).23J002', '002', 'Test abc 12345677', 'Add project test.', 'TITLE', 'UTILITY', '2 month', '2989898.00', 'Approved', 'ongoing', '', 'SAR', 'QUOTATION', 'Kuala Lumpur', '', 'Apple', 'Private', 'Existing', 'Bill Gates', '0123456789', 'john_doe@gmail.com', '2023-02-27', '2023-03-10', '1', '1'),
(4, 'SGS(J).23Q004', 'SGS(J).23J003', '003', '', 'Test New Quotation', 'ENG', 'OIL & GAS', '2 month', '999999999.00', 'Approve', 'approved', '', 'SMS', 'TENDER', 'Johor Bahru', '', 'Apple', 'Private', 'Existing', 'Steve Jobs', '0127434241', 'stevejobs@apple.com', '2023-03-22', '2023-03-31', '0', '1'),
(5, '', 'J004', '004', '', '', '', '', '', '', 'Test log', 'approved', '', '', '', '', '', '', '', '', '', '', '', '2023-03-27', '0000-00-00', '0', '1'),
(6, '', 'J005', '005', '', '', '', '', '', '', 'Approve', 'approved', '', '', '', '', '', '', '', '', '', '', '', '2023-03-27', '0000-00-00', '0', '1'),
(7, '', 'J006', '006', '', '', '', '', '', '', 'Test', 'approved', '', '', '', '', '', '', '', '', '', '', '', '2023-03-27', '0000-00-00', '0', '1'),
(8, 'SGS(J).23Q005', 'SGS(J).23J007', '007', 'Test abc 12345677', 'Test log', 'UUM', 'PROPERTY & INFRASTRUCTURE', '3 month', '694201.00', 'Test', 'ongoing', '', 'SAAT', 'QUOTATION', 'Johor Bahru', '', 'Apple', 'Private', 'Existing', 'Steve Jobs', '0127434241', 'stevejobs@apple.com', '2023-03-27', '2023-03-31', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_deliver`
--

CREATE TABLE `project_deliver` (
  `pd_id` int(255) NOT NULL,
  `pd_proj_no` varchar(255) NOT NULL,
  `pd_proj_code` varchar(255) NOT NULL,
  `pd_amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pd_date` date NOT NULL,
  `pd_invoice` varchar(255) NOT NULL,
  `pd_remark` varchar(255) NOT NULL,
  `pd_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_deliver`
--

INSERT INTO `project_deliver` (`pd_id`, `pd_proj_no`, `pd_proj_code`, `pd_amount`, `status`, `pd_date`, `pd_invoice`, `pd_remark`, `pd_invoice_no`) VALUES
(1, 'SGS(J).23J001', '', '1231231.33', 'pending', '2023-02-15', '1.Awareness_ISO9001-2015 Training.pptx.pdf', 'rsrs', '34243'),
(2, 'SGS(J).23J001', '', '131231.32', 'pending', '2023-02-15', '1.Awareness_ISO9001-2015 Training.pptx.pdf', 'Test new remark', '123123'),
(4, 'SGS(J).23J003', '', '29999.00', 'pending', '2023-03-27', '', 'Test New', ''),
(6, 'SGS(J).23J003', '', '112333.00', 'pending', '2023-03-27', '1.Awareness_ISO9001-2015 Training.pptx.pdf', 'Test New', '1231231'),
(8, 'SGS(J).23J007', '', '29999.00', 'pending', '2023-03-27', '1.Awareness_ISO9001-2015 Training.pptx.pdf', 'Test status', '1231231'),
(10, 'SGS(J).23J007', '', '700000.00', 'pending', '2023-03-27', '1.Awareness_ISO9001-2015 Training.pptx.pdf', 'Test status', '1231231');

-- --------------------------------------------------------

--
-- Table structure for table `project_schedule`
--

CREATE TABLE `project_schedule` (
  `ps_id` int(255) NOT NULL,
  `ps_proj_no` varchar(255) NOT NULL,
  `ps_type` varchar(255) NOT NULL,
  `ps_title` varchar(255) NOT NULL,
  `ps_start` date NOT NULL,
  `ps_end` date NOT NULL,
  `ps_start_act` date NOT NULL,
  `ps_end_act` date NOT NULL,
  `ps_pic` varchar(255) NOT NULL,
  `ps_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_schedule`
--

INSERT INTO `project_schedule` (`ps_id`, `ps_proj_no`, `ps_type`, `ps_title`, `ps_start`, `ps_end`, `ps_start_act`, `ps_end_act`, `ps_pic`, `ps_remark`) VALUES
(1, 'SGS(A).23J002', 'On-Site', 'Test Update', '2023-03-30', '2023-05-07', '2023-03-30', '2023-04-05', 'SMS', 'Test Update'),
(2, 'SGS(A).23J002', 'Process', 'ghjgjhgjgjhgjhgjhgjhgjhgjhgjhgjhgjhgjhgjhgjhhjgjhg', '2023-03-29', '2023-04-06', '0000-00-00', '0000-00-00', 'SAAT', ''),
(4, 'SGS(A).23J002', 'On-Site', 'Test time interval', '2023-03-28', '2023-03-31', '2023-03-28', '2023-04-09', 'SMS', 'PKP'),
(7, 'SGS(A).23J002', 'On-Site', 'Test', '2023-03-28', '2023-04-05', '2023-03-28', '2023-05-07', 'SMS', 'Lorem ipsum'),
(8, 'SGS(A).23J002', 'Technical', 'Test technical', '2023-03-28', '2023-04-08', '2023-03-28', '2023-03-30', 'SAAT', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quot_id` int(255) NOT NULL,
  `quot_no` varchar(255) NOT NULL,
  `quot_no_inc` varchar(255) NOT NULL,
  `quot_app_date` date NOT NULL,
  `quot_title` varchar(255) NOT NULL,
  `quot_pic` varchar(255) NOT NULL,
  `quot_client_type` varchar(255) NOT NULL,
  `quot_client_status` varchar(255) NOT NULL,
  `quot_work_scope` varchar(255) NOT NULL,
  `quot_client` varchar(255) NOT NULL,
  `quot_client_pic` varchar(255) NOT NULL,
  `quot_client_phone` varchar(255) NOT NULL,
  `quot_client_email` varchar(255) NOT NULL,
  `quot_sub_deadline` date NOT NULL,
  `quot_market_segmentation` varchar(255) NOT NULL,
  `quot_proj_duration` varchar(255) NOT NULL,
  `quot_site_location` varchar(255) NOT NULL,
  `quot_amount` varchar(255) NOT NULL,
  `quot_amount_tax` varchar(255) NOT NULL,
  `quot_status` varchar(255) NOT NULL,
  `quot_remark` varchar(255) NOT NULL,
  `quot_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quot_id`, `quot_no`, `quot_no_inc`, `quot_app_date`, `quot_title`, `quot_pic`, `quot_client_type`, `quot_client_status`, `quot_work_scope`, `quot_client`, `quot_client_pic`, `quot_client_phone`, `quot_client_email`, `quot_sub_deadline`, `quot_market_segmentation`, `quot_proj_duration`, `quot_site_location`, `quot_amount`, `quot_amount_tax`, `quot_status`, `quot_remark`, `quot_type`) VALUES
(2, 'SGS(N).23Q002', '002', '2023-02-16', 'Test insert data', 'SAR', 'Private', 'Existing', 'ENG', 'Apple SDN BHD', 'Steve Jobs', '0127434241', 'apple@apple.com', '2023-02-16', 'OIL & GAS', '1 month', 'Johor Bahru', '694200.00', '', 'rejected', 'Rejected', 'QUOTATION'),
(3, 'SGS(A).23Q003', '003', '2023-02-27', 'Add project test.', 'SAR', 'Private', 'Existing', 'TITLE', 'Microsoft SDN BHD', 'Bill Gates', '0123456789', 'john_doe@gmail.com', '2023-03-10', 'UTILITY', '2 month', 'Kuala Lumpur', '2989898.00', '', 'approved', 'Approved', 'QUOTATION'),
(4, 'SGS(J).23Q004', '004', '2023-03-21', 'Test New Quotation', 'SMS', 'Private', 'Existing', 'ENG', 'Apple', 'Steve Jobs', '0127434241', 'stevejobs@apple.com', '2023-03-31', 'OIL & GAS', '2 month', 'Johor Bahru', '999999999.00', '', 'approved', 'Approve', 'TENDER'),
(5, 'SGS(J).23Q005', '005', '2023-03-27', 'Test log', 'SAAT', 'Private', 'Existing', 'UUM', 'Apple', 'Steve Jobs', '0127434241', 'stevejobs@apple.com', '2023-03-31', 'PROPERTY & INFRASTRUCTURE', '3 month', 'Johor Bahru', '694201.00', '', 'approved', 'Test', 'QUOTATION');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `remark_id` int(255) NOT NULL,
  `remark_proj_no` varchar(255) NOT NULL,
  `remark_title` varchar(255) NOT NULL,
  `remark_date` date NOT NULL,
  `remark_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `schedule_proj_no` varchar(255) NOT NULL,
  `schedule_staff` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` date NOT NULL,
  `end_datetime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `schedule_proj_no`, `schedule_staff`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'SGS(J).23J001', 'MAM', 'Meeting', 'Meeting at JB', '2023-02-16', '2023-02-16'),
(2, 'SGS(J).23J001', 'MZZ', 'TEst', 'tests', '2023-02-23', '2023-02-24'),
(3, 'SGS(J).23J001', 'MAM', 'Test task', 'detail', '2023-02-28', '2023-03-09'),
(4, 'SGS(A).23J002', 'SAAT', 'Test', 'asasasas', '2023-03-17', '2023-03-31'),
(5, 'SGS(A).23J002', 'MAM', 'Test123', 'Tesasdsf dfgdfgdfgfdgdfg', '2023-03-26', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(123) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_initial` varchar(255) NOT NULL,
  `staff_title` varchar(255) NOT NULL,
  `staff_department` varchar(255) NOT NULL,
  `staff_ic` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `staff_address` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `employee_epf_no` varchar(255) NOT NULL,
  `employee_income_tax_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_acc_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_number`, `staff_name`, `staff_initial`, `staff_title`, `staff_department`, `staff_ic`, `staff_email`, `staff_phone`, `staff_address`, `branch`, `employee_epf_no`, `employee_income_tax_no`, `bank_name`, `bank_acc_no`, `status`) VALUES
(2, 'FIN010', 'FAKHRULRADHI BIN AHMAD', 'FA', 'FINANCE MANAGER', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(3, 'FIN011', 'MAHIRAH @ SYAIRAH BINTI SATAR', 'MASS', 'FINANCE EXECUTIVE', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(4, 'FIN008', 'NUR HASANAH BINTI ABD HANIF', 'NHAH', 'FINANCE EXECUTIVE', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(5, 'ADM015', 'EMMY OZIRA BIN OMAR', 'EOO', 'ADMIN AND QUALITY MANAGER', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(6, 'ADM016', 'NOR AMIRAH BINTI JALUDIN', 'NAJ', 'HUMAN RESOURCES EXECUTIVE', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(7, 'ICT005', 'NOR FASYA FASEHA BT ABD MURAD', 'NFFAM', 'ICT SUPPORT ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(8, 'ENG017', 'ARIFIN BIN UDA SERI', 'AUS', 'ADMIN ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(9, 'ADM014', 'MOHAMAD RAFFIZAL BIN MOHAMAD RADZI', 'MRMR', 'ADMIN ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(10, 'ENG060', 'ROHANI BINTI AHMAD', 'RA', 'BUSINESS DEVELOPMENT MANAGER', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(11, 'ENG100', 'MOHD EZUAN BIN ABDULLAH', 'MEA', 'BUSINESS DEVELOPMENT MANAGER', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(12, 'ENG075', 'NURUL ASHIKIN BINTI KAMARUDIN', 'NAK', 'BUSINESS DEVELOPMENT EXECUTIVE', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(13, 'ENG101', 'AHMAD KHUSAIRY BIN NORDIN', 'AKN', 'BUSINESS DEVELOPMENT EXECUTIVE', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(14, 'ENG067', 'AHMAD ROSLAN BIN MOHD BAKRI', 'ARMB', 'SENIOR PROJECT MANAGER', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(15, 'ENG057', 'MOHD NOOR NASHRIQ BIN ABDUL LATIFF', 'MNNAL', 'PROJECT MANAGER', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(16, 'ENG029', 'JUNAINAH BINTI MOHD MUSA', 'JMM', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(17, 'ENG033', 'NURUL AZREEN BINTI MOHAMAD ZIN', 'NAMZ', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(18, 'ENG072', 'SITI ESAH BINTI HAMJAH', 'SHE', 'PROJECT EXECUTIVE(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(19, 'ENG085', 'AHMAD FAISAL HADI BIN AB HAMID', 'AFHAH', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(20, 'ENG088', 'MUHAMMAD AIZUDDIN HANNAN B MAZALAN', 'MAHM', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(21, 'ENG096', 'NURUL NAJIHAH BINTI YAAKOB', 'NNY', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(22, 'ENG097', 'NURUL FAZWA ATIEKA BINTI MOHD MURAD', 'NFAMM', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(23, 'ENG103', 'MUHAMMAD SADAM BIN MOHD RAMSAH', 'MSMR', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(24, 'ENG106', 'NURUL NADIA BINTI MUCHLIS', 'NNM', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(25, 'ENG104', 'NUR SAFIQA BINTI AHMAD KAMAL', 'NSAK', 'PROJECT ASSISTANT(DATA PROCESSING) ', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(26, 'ENG105', 'MUHAMMAD DANIEL BIN ZULKAPALI AMI', 'MDZA', 'PROJECT ASSISTANT(DATA PROCESSING) ', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(27, 'FLD107', 'MUSTAZAMA AH BIN MASNGUTI', 'MM', 'FIELD COORDINATOR', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(28, 'FLD108', 'BADLI BIN CHE ALAI', 'BCA', 'SENIOR PROJECT EXECUTIVE(UUM)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(29, 'FLD109', 'MOHD AMERUDDIN BIN ABDUL AZIZ', 'MAAA', 'PROJECT EXECUTIVE (UUM)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(30, 'FLD111', 'MOHAMAD FAIS BIN OTHMAN', 'MFO', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(31, 'FLD007', 'RAHIM BIN YAHAYA', 'RY', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(32, 'FLD055', 'MOHD ZAHARI BIN SALEH ', 'MZS', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(33, 'FLD059', 'AZIZUL AZNAM BIN ZAKARIA', 'AAZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(34, 'FLD064', 'HAFIZAL BIN ZAKARIA', 'HZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(35, 'FLD062', 'MOHD SHUKRI BIN SALEH', 'MSS', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(36, 'FLD098', 'MOHD IZRUL BIN ABDULLAH', 'MIA', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(37, 'FLD106', 'NAZRI BIN ABDULLAH', 'NA', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(38, 'FLD113', 'NAZYRUL IKMAL BIN ZURAINI', 'NIZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(39, 'FLD114', 'JAINUDIN BIN RASAH', 'JR', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE'),
(40, 'JHR003', 'SAIFUL AZHAR BIN RAMLEE', 'SAR', 'GENERAL MANAGER', 'JOHOR', '850921015081', 'saifulazhar@setiageosolutions.com', '', 'No. 28, Jalan Penaga 5, Taman Pulai Hijauan, 81110 Kangkar Pulai, Johor Bahru, Johor', 'JOHOR', '', '', '', '', 'ACTIVE'),
(41, 'JHR019', 'SHARIFUDDIN MD SUKUR', 'SMS', 'GIS / IT MANAGER', 'JOHOR', '850513065645', 'sharifuddin@setiageosolutions.com', '', 'No 15, Jalan Pulai Mesra 20, Bandar baru Kangkar Pulai,81300, Skudai Johor', 'JOHOR', '', '', '', '', 'ACTIVE'),
(42, 'JHR023', 'SYAIFUL AMRI BIN AHMAD TARMIZI', 'SAAT', 'BUSINESS DEVELOPMENT EXECUTIVE', 'JOHOR', '870125015265', 'syaifulamri@setiageosolutions.com', '', 'Bengkel Jahit,82300, Kg Serkat, Pontian, Johor', 'JOHOR', '', '', '', '', 'ACTIVE'),
(43, 'JHR032', 'MURSYIDAH BINTI KHAIRUDDIN', 'MK', 'ADMIN EXECUTIVE', 'JOHOR', '890613025102', 'mursyidahkhairuddin@gmail.com', '', 'No.110, Susur Pipit, KM4 Jalan Langgar, 05460 Alor Setar, Kedah.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(44, 'JHR064', 'UMI NOREZZATE BINTI ROSLI', 'UNR', 'ADMIN ASSISTANT', 'JOHOR', '990722125610', 'adm.asst.sgsjohor@gmail.com', '', 'No.58, Jalan Bunga Sena 2, Taman Senai Impian, 06400 Pokok Sena, Kedah.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(45, 'JHR036', 'MOHD DANIEL BIN LAILI', 'MDL', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'JOHOR', '941117015199', 'daniel@setiageosolutions.com', '', 'G-01, Blok Calla, Taman Saujana Puri, 75450 Bukit Katil, Melaka.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(46, 'JHR007', 'NURUL SAKDAH @ NAZIAH BINTI CHAHAT', 'NSNC', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'JOHOR', '840915015932', 'nurulsakdah@jurukursetia.com', '', 'No. 16, Jalan Bakti 62, Mutiara Rini, 81300 Skudai, Johor', 'JOHOR', '', '', '', '', 'ACTIVE'),
(47, 'JHR033', 'MUHSINAH BINTI YACOB', 'MY', 'PROJECT ASSISTANT(DATA PROCESSING)', 'JOHOR', '900501015942', 'muhsinahyacob@gmail.com', '', 'No.23, Jalan Ara 2, Taman Sri Pulai, 81100 Skudai, Johor.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(48, 'JHR037', 'MOHD FARHAN BIN ZAKARIYA', 'MFZ', 'GIS ANALYST', 'JOHOR', '960207025271', 'farhanzakariya9672@gmail.com', '', 'Batu 2 1/4, Alor Bangsa, Sungai Korok, 05400 Alor Setar, Kedah.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(49, 'JHR038', 'YASMEEN SYAZANA BINTI MD YASIN', 'YSMY', 'GIS ANALYST', 'JOHOR', '940624016394', 'yasmeensyazana94@gmail.com', '', 'No.7, Jalan Meranti 15, Taman Sri Pulai, 81300 Skudai, Johor.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(50, 'JHR012', 'MOHAMMAD NOR IZBULLAH BIN NOR AZIZAN', 'MNINA', 'PROJECT EXECUTIVE (DATA CAPTURE)', 'JOHOR', '920111065045', 'izbullahzizan92@gmail.com', '', 'No. 01-6B, Jalan Mawar 2, Taman Tampoi Indah 2, 81200 Johor Bahru, Johor', 'JOHOR', '', '', '', '', 'ACTIVE'),
(51, 'JHR034', 'MOHAMAD WAZIR BIN YAHYA', 'MWY', 'PROJECT ASSISTANT (DATA CAPTURE)', 'JOHOR', '741103015677', 'wazirman74@gmail.com', '', '01-05-03, Blok 1, Jalan Kekwa 1/2, Taman Sutera Utama, 81300 Skudai, Johor.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(52, 'JHR039', 'NORAZLAN BIN ABDUL MUBIN', 'NAM', 'PROJECT ASSISTANT (DATA CAPTURE)', 'JOHOR', '820702065575', 'azlanmubin@gmail.com', '', 'No.2, Jalan Pelangi 3, Taman Pelangi Mas, 81560 Pekan Nenas, Johor.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(53, 'JHR062', 'FATIN HIDAYAH BINTI AHMAD', 'FHA', 'PROJECT EXECUTIVE (DATA PROCESSING)', 'JOHOR', '950125015046', 'fatinhidayahahmad@gmail.com', '', 'Lot 47, Jalan 31/141, Kampung Malaysia Tambahan, 57100 Sungai Besi, Kuala Lumpur.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(54, 'JHR065', 'MUHAMMAD AMMAR BIN MUSA', 'MAM', 'GIS PROGRAMMER', 'IT', '940110015773', 'itsammarmusa@gmail.com', '0127434241', 'No.23, Jalan Pulai 60, Taman Pulai Utama, 81300 Skudai, Johor.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(55, 'PHG001', 'HASSANUDDIN BIN SALIM', 'HS', 'BRANCH MANAGER', 'PAHANG', '', '', '', '', 'PAHANG', '', '', '', '', 'ACTIVE'),
(56, 'PHG008', 'CAMEYLIA ATHIRAH BINTI ZAINOR', 'CAZ', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PAHANG', '', '', '', '', 'PAHANG', '', '', '', '', 'ACTIVE'),
(57, 'PHG009', 'MOHD ZUKRI BIN MOHD SALLEH', 'MZMS', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PAHANG', '', '', '', '', 'PAHANG', '', '', '', '', 'ACTIVE'),
(58, 'PHG 010', 'NURUL NAIMAH BINTI JANBERI', 'NNJ', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'PAHANG', '', '', '', '', 'PAHANG', '', '', '', '', 'ACTIVE'),
(59, 'PHG011', 'MUHD LOKMAN BIN MAT SA ARI', 'MLMS', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PAHANG', '', '', '', '', 'PAHANG', '', '', '', '', 'ACTIVE'),
(60, 'JHR041', 'AHMAD MUBIN BIN WAHAB', 'AMW', 'GIS ANALYST', 'TNB MMS', '881101115759', 'ahmadmubinwahab@gmail.com', '', 'NO 14, JALAN HARMONI 6/4, TAMAN DESA HARMONI, 81100 JOHOR BAHRU, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(61, 'JHR042', 'FATEN NAJWA BINTI MOHD KHAIR ', 'FNMK', 'GIS ANALYST', 'TNB MMS', '960317015736', 'fatennajwa96@gmail.com', '', 'NO 35-01, JALAN IBRAHIM 82000 PONTIAN, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(62, 'JHR043', 'SITI ZAHIDAH BINTI ISMAIL ', 'SZI', 'GIS ANALYST', 'TNB MMS', '951206017398', 'szahidahismail@gmail.com', '', '1230, JALAN CENDERAWASIH 8, BANDAR PUTRA, 81000 KULAI, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(63, 'JHR044', 'SUHANA BINTI MOHD JAMIL ', 'SMJ', 'GIS ANALYST', 'TNB MMS', '921110025572', 'suhana9210@gmail.com', '', 'NO 23, PINTAS PIPIT 11, TAMAN HELANG JAYA, 14300 NIBONG TEBAL, PULAU PINANG', 'JOHOR', '', '', '', '', 'ACTIVE'),
(64, 'JHR045', 'NURUL ASYIQIN BINTI ROSLI ', 'NAR', 'GIS ANALYST', 'TNB MMS', '940829125180', 'eiqinasyiqin@gmail.com', '', 'NO 58, JALAN BUNGA SENA, TAMAN SENA IMPIAN, 06400 POKOK SENA, KEDAH', 'JOHOR', '', '', '', '', 'ACTIVE'),
(65, 'JHR046', 'NORSYUHADA BINTI AZLAN ', 'NSA', 'GIS ANALYST', 'TNB MMS', '950313105700', 'nsyuhadazlan@gmail.com', '', 'LORONG 2, BATU 18, MERBAU SEMPAK, 47000 SUNGAI BULOH, SELANGOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(66, 'JHR049', 'MOHAMAD ZAKWAN BIN ZAINAL', 'MZZ', 'GIS ANALYST', 'TNB MMS', '950110016413', 'm.zakwanzainal@gmail.com', '', 'NO.16, JALAN PERSISIRAN, TAMAN LAUTAN BIRU, 86800 MERSING, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(67, 'JHR055', 'NOR HAFIZAH BINTI MOOHITI ', 'NHM', 'GIS ANALYST', 'TNB MMS', '951002016780', 'hafieyza210@gmail.com', '', 'KAMPUNG SERI BUNIAN, BATU 33, JALAN JOHOR, 82000 PONTIAN, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(68, 'JHR056', 'NUR HIDAYAH BINTI ABDUL KADIR ', 'NHAK', 'GIS ANALYST', 'TNB MMS', '511012098', 'hidayakadir000511@gmail.com', '', 'NO.242, JLAN MEWAH (OFF JALAN SHUKOR), KG MELAYU MAJIDEE, 81100 JOHOR BAHR, JOHORU', 'JOHOR', '', '', '', '', 'ACTIVE'),
(69, 'JHR057', 'NURANNIS BINTI ABDULLAH', 'NAA', 'GIS ANALYST', 'TNB MMS', '423600068', 'nurannis8@gmail.com', '', 'NO.59H, LORONG 4, JALAN TEMENGGONG, 85000 SEGAMAT, JOHOR', 'JOHOR', '', '', '', '', 'ACTIVE'),
(70, 'JHR058', 'AMIRUL MUKMININ BIN MOHD AZIMI ', 'AMMA', 'GIS ANALYST', 'TNB MMS', '970418035671', 'amukminin38@gmail.com', '', '2-11-B4, TAMAN SRI JANGGUS, ALMA, 14000 BUKIT MERTAJAM, PULAU PINANG', 'JOHOR', '', '', '', '', 'ACTIVE'),
(71, 'JHR059', 'MUHAMMAD ILHAM BIN ABU HASAN ', 'MIAH', 'GIS ANALYST', 'TNB MMS', '970423615013', 'thisisilham97@gmail.com', '', 'D-2-10, TAMAN MACHANG BUBOK, LORONG 34, BUKIT MERTAJAM, PULAU PINANG', 'JOHOR', '', '', '', '', 'ACTIVE'),
(72, 'JHR051', 'NUR ANIS NATASYA BINTI REDZUAN ', 'NANR', 'GIS ANALYST', 'TNB MMS', '981025036386', 'natasyaredzuan@gmail.com', '', 'NO.15, KAMPUNG PALOH RAMBAI, 16450 KETEREH, KOTA BHARU, KELANTAN', 'JOHOR', '', '', '', '', 'ACTIVE'),
(73, 'JHR052', 'SYAZWANI HUSNA BINTI MOHD HIJAZI ', 'SHMH', 'GIS ANALYST', 'TNB MMS', '951205055034', 'syazwanijob95@gmail.com', '', 'NO.10, LORONG BUNGA RAYA23/2, TAMAN TASIK JAYA, SENAWANG, NEGERI SEMBILAN', 'JOHOR', '', '', '', '', 'ACTIVE'),
(74, 'JHR061', 'IHSAN AFIF FARUQI BIN ABDUL RAUP ', 'IAFAR', 'GIS ANALYST', 'TNB MMS', '970713155027', 'afiffaruqi97@gmail.com', '', 'NO.90 JALAN TS 2/3, TAMAN SURIA 2, 06000 JITRA, KEDAH', 'JOHOR', '', '', '', '', 'ACTIVE'),
(75, 'JHR063', 'SITI NABILAH BINTI MAT NOR ', 'SNMN', 'GIS ANALYST', 'TNB MMS', '950120065650', 'nabillahmatnor@gmail.com', '', 'NO.46, JALAN BUKIT CERMIN 2, TAMAN BUKIT CERMIN, 28400 MENTAKAB, PAHANG.', 'JOHOR', '', '', '', '', 'ACTIVE'),
(76, 'JHR066', 'RAJA NUR AFIFAH BINTI RAJA ZAINUDDIN', 'RNARZ', 'GIS ANALYST', 'TNB MMS', '', '', '', '', 'JOHOR', '', '', '', '', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(255) NOT NULL,
  `task_proj_no` varchar(255) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_body` varchar(255) NOT NULL,
  `task_remark` varchar(255) NOT NULL,
  `task_type` varchar(255) NOT NULL,
  `task_priority` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `task_date` varchar(255) NOT NULL,
  `task_staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_proj_no`, `task_title`, `task_body`, `task_remark`, `task_type`, `task_priority`, `task_status`, `task_date`, `task_staff`) VALUES
(1, 'SGS(J).23J001', '', '', '', 'todo', '', '', '2023-02-20', 'MAM'),
(2, 'SGS(J).23J001', '', '', '', 'schedule', '', '', '20230220', 'MZZ'),
(3, 'SGS(J).23J001', 'Test todo name', '', '', 'todo', '', '', '2023-02-28', 'MAM'),
(4, 'SGS(J).23J001', '', '', '', 'schedule', '', '', '2023-02-27', 'MAM'),
(5, 'SGS(J).23J001', 'Test task', '', '', 'schedule', '', '', '2023-02-28', 'MAM'),
(6, 'SGS(A).23J002', 'Test', '', '', 'todo', '', '', '2023-03-09', 'SAR'),
(7, 'SGS(A).23J002', 'Testttt', '', '', 'todo', '', '', '2023-03-24', 'SAAT'),
(8, 'SGS(A).23J002', '', '', '', 'schedule', '', '', '2023-03-12', 'SAAT'),
(9, 'SGS(A).23J002', 'Test', '', '', 'schedule', '', '', '2023-03-17', 'SAAT'),
(10, 'SGS(A).23J002', 'Test123', '', '', 'schedule', '', '', '2023-03-12', 'MAM');

-- --------------------------------------------------------

--
-- Stand-in structure for view `test`
-- (See below for the actual view)
--
CREATE TABLE `test` (
`todo_id` int(255)
,`todo_proj_no` varchar(255)
,`todo_name` varchar(255)
,`todo_date` date
,`todo_staff` varchar(255)
,`id` int(30)
,`schedule_proj_no` varchar(255)
,`schedule_staff` varchar(255)
,`title` text
,`description` text
,`start_datetime` date
,`end_datetime` date
);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `timeline_id` int(255) NOT NULL,
  `timeline_proj_no` varchar(255) NOT NULL,
  `timeline_title` varchar(255) NOT NULL,
  `timeline_body` varchar(255) NOT NULL,
  `timeline_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `timeline_proj_no`, `timeline_title`, `timeline_body`, `timeline_date`) VALUES
(1, 'SGS(J).23J001', '123', '321', '2023-02-15'),
(2, 'SGS(J).23J001', '123123', '123123', '2023-02-23'),
(3, 'SGS(J).23J001', '12312313', '12312312313', '2023-02-28'),
(4, 'SGS(A).23J002', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(255) NOT NULL,
  `todo_proj_no` varchar(255) NOT NULL,
  `todo_name` varchar(255) NOT NULL,
  `todo_date` date NOT NULL,
  `todo_staff` varchar(255) NOT NULL,
  `todo_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_id`, `todo_proj_no`, `todo_name`, `todo_date`, `todo_staff`, `todo_status`) VALUES
(1, 'SGS(J).23J001', 'Test', '2023-02-20', 'MAM', 'pending'),
(2, 'SGS(J).23J001', 'Test todo name', '2023-02-28', 'MAM', 'pending'),
(3, 'SGS(A).23J002', 'Test', '2023-03-09', 'SAR', 'pending'),
(4, 'SGS(A).23J002', 'Testttt', '2023-03-24', 'SAAT', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `staff_no` varchar(255) NOT NULL,
  `role` enum('user','admin','superuser') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortform` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_no`, `role`, `username`, `password`, `name`, `shortform`, `special`) VALUES
(2, 'JHR000', 'user', 'John', 'e2fc714c4727ee9395f324cd2e7f331f', 'John Doe', 'JD', 'false'),
(3, 'JHR065', 'admin', 'ammar', 'e2fc714c4727ee9395f324cd2e7f331f', 'Ammar Musa', 'MAM', 'true'),
(4, 'JHR049', 'admin', 'JHR049', '36d64dc1893553c2e81df23a87a0fb3b', 'MOHAMAD ZAKWAN BIN ZAINAL', 'MZZ', 'false');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_combined`
-- (See below for the actual view)
--
CREATE TABLE `vw_combined` (
`todo_id` int(255)
,`todo_proj_no` varchar(255)
,`todo_name` varchar(255)
,`todo_date` date
,`todo_staff` varchar(255)
,`id` int(30)
,`schedule_proj_no` varchar(255)
,`schedule_staff` varchar(255)
,`title` text
,`description` text
,`start_datetime` date
,`end_datetime` date
);

-- --------------------------------------------------------

--
-- Structure for view `test`
--
DROP TABLE IF EXISTS `test`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test`  AS SELECT `todo`.`todo_id` AS `todo_id`, `todo`.`todo_proj_no` AS `todo_proj_no`, `todo`.`todo_name` AS `todo_name`, `todo`.`todo_date` AS `todo_date`, `todo`.`todo_staff` AS `todo_staff`, `schedule_list`.`id` AS `id`, `schedule_list`.`schedule_proj_no` AS `schedule_proj_no`, `schedule_list`.`schedule_staff` AS `schedule_staff`, `schedule_list`.`title` AS `title`, `schedule_list`.`description` AS `description`, `schedule_list`.`start_datetime` AS `start_datetime`, `schedule_list`.`end_datetime` AS `end_datetime` FROM (`todo` join `schedule_list` on(`schedule_list`.`schedule_staff` = `todo`.`todo_staff`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_combined`
--
DROP TABLE IF EXISTS `vw_combined`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_combined`  AS SELECT `todo`.`todo_id` AS `todo_id`, `todo`.`todo_proj_no` AS `todo_proj_no`, `todo`.`todo_name` AS `todo_name`, `todo`.`todo_date` AS `todo_date`, `todo`.`todo_staff` AS `todo_staff`, `schedule_list`.`id` AS `id`, `schedule_list`.`schedule_proj_no` AS `schedule_proj_no`, `schedule_list`.`schedule_staff` AS `schedule_staff`, `schedule_list`.`title` AS `title`, `schedule_list`.`description` AS `description`, `schedule_list`.`start_datetime` AS `start_datetime`, `schedule_list`.`end_datetime` AS `end_datetime` FROM (`todo` join `schedule_list` on(`schedule_list`.`schedule_staff` = `todo`.`todo_staff`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`checklist_id`);

--
-- Indexes for table `checklist_child`
--
ALTER TABLE `checklist_child`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`manage_id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`paid_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_deliver`
--
ALTER TABLE `project_deliver`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `project_schedule`
--
ALTER TABLE `project_schedule`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quot_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`remark_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`timeline_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `action_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checklist_child`
--
ALTER TABLE `checklist_child`
  MODIFY `child_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `manage_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `paid_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_deliver`
--
ALTER TABLE `project_deliver`
  MODIFY `pd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_schedule`
--
ALTER TABLE `project_schedule`
  MODIFY `ps_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quot_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `remark_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `timeline_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
