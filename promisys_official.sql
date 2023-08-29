-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 08:43 AM
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
-- Database: `promisys_official`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`action_id`, `action_proj_no`, `action_for`, `action_body`, `action_date`, `action_by`) VALUES
(1, 'SGS(J).22Q001', 'quotation', 'Contact Client', '2023-06-11', 'MAM'),
(2, 'SGS(J).22Q004', 'quotation', 'Contact Client', '2023-06-11', 'MAM'),
(3, 'SGS(J).22Q005', 'quotation', 'Pass to SAR for Submission', '2023-06-11', 'MAM'),
(4, 'SGS(J).22Q006', 'quotation', 'Contact Client', '2023-06-11', 'MAM'),
(5, 'SGS(J).22Q007', 'quotation', 'Done submit by hardcopy', '2023-06-11', 'MAM'),
(17, 'SGS.24Q001', 'quotation', 'Approved', '2023-06-22', 'ZNB'),
(21, 'SGS.23B001', '', 'BELUM BAYAR', '2023-06-22', 'AFHAH'),
(22, 'SGS(J).23P001', '3650', 'PEDING DI FINANCE TNB', '2023-06-22', 'MAM'),
(23, 'SGS.23B001', '3001', 'FASYA MINTAK UBAH AMOUNT', '2023-06-22', 'AFHAH'),
(24, 'SGS(J).23Q001', 'quotation', '17.04.23 - FAILED MIGHT BE BECAUSE OF LESS CONFIDENT DURING INTERVIEW.', '2023-07-30', 'SAAT'),
(25, 'SGS(J).23Q002', 'quotation', 'NO RESPONSE FROM CLIENT', '2023-07-30', 'SAAT'),
(26, 'SGS(J).23Q003', 'quotation', 'NO RESPONSE FROM CLIENT', '2023-07-30', 'SAAT'),
(27, 'SGS(J).23Q004', 'quotation', 'FAILED DUE TO HIGH PRICE', '2023-07-30', 'SAAT'),
(28, 'SGS(J).23Q005', 'quotation', 'NO RESPONSE FROM CLIENT', '2023-07-30', 'SAAT'),
(29, 'SGS(J).23Q006', 'quotation', 'FAILED DUE TO HIGH PRICE', '2023-07-30', 'SAAT'),
(30, 'SGS(J).23Q044', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(31, 'SGS(J).23Q045', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(32, 'SGS(J).23Q046', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(33, 'SGS(J).23Q047', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(34, 'SGS(J).23Q007', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(35, 'SGS(J).23Q008', 'quotation', 'AWARDED', '2023-07-30', 'SAAT'),
(36, 'SGS(J).23Q019', 'quotation', 'AWARDED', '2023-08-01', 'SAAT'),
(37, 'SGS(J).23Q028', 'quotation', 'AWARDED', '2023-08-01', 'SAAT'),
(38, 'SGS(J).23Q027', 'quotation', 'AWARDED', '2023-08-01', 'SAAT'),
(39, 'SGS(J).23Q048', 'quotation', 'AWARDED', '2023-08-01', 'SAAT'),
(40, 'SGS(J).23Q039', 'quotation', 'AWARDED', '2023-08-01', 'SAAT'),
(41, 'SGS(J).23Q037', 'quotation', 'FAILED DUE TO HIGH PRICE', '2023-08-01', 'SAAT'),
(42, 'SGS(J).23Q030', 'quotation', 'PROJECT CANCEL', '2023-08-01', 'SAAT'),
(43, 'SGS(J).23Q026', 'quotation', 'NO RESPONSE FROM CLIENT', '2023-08-01', 'SAAT'),
(44, 'SGS(J).23Q041', 'quotation', 'FAILED DUE TO HIGH PRICE', '2023-08-01', 'SAAT');

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_proj_no` varchar(255) NOT NULL,
  `a_quot_no` varchar(255) NOT NULL,
  `a_quot_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklist_id`, `checklist_value`, `checklist_proj_no`, `checklist_title`, `checklist_body`, `checklist_path`, `checklist_status`) VALUES
(1, '', '', '', 'QUOTATION (QUOTATION LETTER (FILE) - PDF ', '', ''),
(2, '', '', '', 'LAO LETTER (FILE) - PDF', '', ''),
(3, '', '', '', 'COVER LETTER(FILE) - PDF ', '', ''),
(4, '', '', '', 'FILE REGISTRATION (FILE) - PDF', '', ''),
(5, '', '', '', 'INSTRUCTION OF SURVEY (FILE) - PDF', '', ''),
(6, '', '', '', 'RAW DATA (FILE) - .SDR/STAD', '', ''),
(7, '', '', '', 'BOOKING (FILE) - PDF/JPG', '', ''),
(8, '', '', '', 'GAMBAR SITE (FILE)', '', ''),
(9, '', '', '', 'FINAL PLAN (FILE) - DWG ', '', ''),
(10, '', '', '', 'INVOICE (FILE) - PDF', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_comp_name`, `client_address`, `client_pic`, `client_phone`, `client_fax`, `client_email`) VALUES
(16, 'SOUTHKEY CITY SDN BHD', 'Jalan Bakar Batu (south side)', 'AZLIN FARHANA RAMLI', '07-3357373 (210)', '+8345345345', 'azlin@southkey.com.my'),
(18, 'ISKANDAR WATERFRONT', '', 'FARHANA', '07-2333 888', '', 'farhana@iskandarwaterfront.com'),
(19, 'KULIM (M) BERHAD', '', 'SAIFUL AZIZI', '013-772 6069', '', 'saiful@kulim.com.my'),
(20, 'FELCRA BERHAD', '', 'KHAIRU IZWAN BIN ABDUL KAHAR', '03 - 4145 5412', '', 'temp.izwan@felcra.com.my'),
(21, 'TENAGA NASIONAL BERHAD (TNB)', '', 'HAIRUL HAIZAM BIN HARUN', '019-271 2597', '', ''),
(22, 'SPT SERVICES SDN. BHD.', '', 'NUR ASLINDA SHAMSUDIN', '07-253 5888 (1253)', '', 'nur.aslinda@spts.com.my'),
(23, 'SAFWA GLOBAL VENTURES SDN BHD', '', 'SUZLIYANA', '07-509 9686', '', 'suzliyana@infracity.com.my'),
(24, 'PELABUHAN TANJUNG PELEPAS', '', 'FASYA AIRIEN DAYANA ABDUL JAMALI', '07-504 2222', '', 'fasya.abdjamali@ptp.com.my'),
(25, 'SENAI AIRPORT CITY', '', 'MUZIATI HANAFIAH', '07-595 1114', '', 'muziati.hanafiah@senaiairport.com'),
(26, 'SAMAIDEN SDN BHD', '', 'ASYURAH AZMAN', '03-6151 5021', '', 'asyurah.azman@samaiden.com.my'),
(27, 'TPM TECHNOPARK SDN BHD', '', 'MAHFIZ HAMIDON', '017-767 5166', '', 'mahfiz@tpmtechnopark.com.my'),
(28, 'JABATAN PENGAIRAN & SALIRAN M ALAYSIA', '', 'EN HASHIM BIN ABDULLAH', '', '', 'hashimabd@water.gov.my'),
(29, 'OUTSPAN SDN BHD', '', 'YAP', '016-723 2332', '', '	lxyap@jpace.net'),
(30, 'IWK SDN BHD', '', 'EN FAUZIEE HASHIM', '', '', 'irmayantyis@iwk.com.my'),
(31, 'JABATAN KERJA RAYA', '', 'PN NORA', '016-756 0095', '', 'noras@jkr.gov.my'),
(32, 'SOUTHKEY ', '', 'PN AZLIN FARHANA', '07-335 7373', '', 'azlin.southkey@gmail.com'),
(33, 'UDA LAND (SOUTH) SDN BHD', '', '', '07-237 4944', '', ''),
(34, 'PETRONAS DAGANGAN BERHAD', '', '', '03-2092 5955', '', ''),
(35, 'SAVILLS (KL) SDN BHD', '', 'PN NADIAH AZMAN', '012-704 6694', '', 'nurnadiah.azman@savills.com.my'),
(36, 'BCC BRIGHT CAPITAL SDN BHD', '', 'PN ROZILAH', '016-720 0032', '', 'bccbright2013@gmail.com'),
(37, 'JABATAN PENGAIRAN & SALIRAN MALAYSIA', '', 'GS.MOHAMAD HAFIZ BIN HASSAN', '03-4289 5505', '', 'hafizhassan@water.gov.my'),
(38, 'SHAREDA SAILA', '', 'SHAREDA SAILA', '', '', 'sashasailabruang@gmail.com'),
(39, 'MAXIS BERHAD', '', 'Nur Liyana Ghaffarud-din', '017 596 9713', '', 'nurliyanag@maxis.com.my'),
(40, 'RANHILL WATER TECHNOLOGIES SDN BHD', '', 'HASLIYANA', '013 - 485 3552', '', 'hasliyana.fatin@ranhill.com.my'),
(41, 'MAJLIS PERBANDARAN ISKANDAR PUTERI', '', ' - ', ' - ', '', ' - '),
(42, 'FAIZAL LAND & PLANNING', '', 'NUR FAIZAL ABDULLAH', '07-238 5828', '', 'faizalplan@yahoo.com'),
(43, 'CENDANA TUNGGAL SDN BHD', '', 'FUZIAH ISMAIL', '07-2333 888', '', 'fuziah@iskandarwaterfront.com'),
(44, 'GLENMARIE PROPERTIES SDN\nBHD', '', 'NABILA AMIRA TUN MOHD KHAIRI', '07-353 6136', '', 'nabilamira@glenmarieproperties.com'),
(45, 'IBRAHIM & SONS ENGINEERING SDN BHD', '', 'NORNEKMAN BIN WAGIMAN', '017-7529840', '', 'nekman.ibse@gmail.com'),
(46, 'HSM PERKASA SDN BHD', '', 'PN HIDAYAH', '016-293 1399', '', '	hidayahh1308@gmail.com'),
(47, 'NEXUS EC SDN BHD', '', 'LOGA', '03-5882 8967', '', 'nexusec@gmail.com'),
(48, 'TROPICANA DANGA COVE', '', 'MOHD HAZWAN BIN MUSTAPA', '017-2659095', '', 'hazwan.m@tropicanacorp.com.my'),
(49, 'LENDLEASE', '', 'LAXE YONG', '65 8128 0198', '', 'laxe.yong@lendlease.com'),
(50, 'BUKIT PELALI PROPERTIES', '', 'EN LUQMAN', '017-779 2926', '', 'luqman@astaka.com.my'),
(51, 'JRK', '', 'MR LIM', '019-772 9692', '', 'limtft@gmail.com'),
(52, 'TECC SOLUTIONS SDN BHD', '', 'MR ER', '012-758 3271', '', 'tsaurjzi.er@tecc.com.my'),
(53, 'UNIDIVE MARINE', '', 'EN NAZMI', '016-333 8144', '', 'nazmi@unidive.com.my\n'),
(54, 'ROTARY ENGINEERING PTE LTD', '', 'MR KHEK SOON HUAT', '65 9832 9608', '', 'sh.khek@rotaryeng.com.sg\n'),
(55, 'SAMAIDEN', '', 'ASYURAH AZMAN', '03-6150 7941', '', 'asyurah.azman@samaiden.com.my'),
(56, 'SAFWA GLOBAL VENTURE SDN BHD', '', 'EN SYAHIRIN', '012-764 0008', '', ''),
(57, 'LAGENDA MERSING SDN BHD', '', 'FAZLINA', '017-761 5105', '', 'agile.kulai1076@gmail.com'),
(58, 'CiD REALTORS SDN BHD', '', 'VINCENT TAN', '012-4056205', '', 'tanyihfan@cid.my'),
(59, 'DRB HICOM', '', 'ARIFF HILMI', '016-350 4641', '', 'ariff.hilmi@glenmarieproperties.com'),
(60, 'MAHAMURNI PROPERTIES SDN BHD', '', 'SAIFUL AZIZI', '013-772 6069', '', 'saiful@kulim.com.my'),
(61, 'AECOM PERUNDING SDN BHD', '', 'AFENDI ARIFF', '012-624 0414', '', 'Afendi.Ariff@aecom.com'),
(62, 'PETRONAS GAS BERHAD', '', 'GEP', 'GEP', '', 'GEP'),
(63, 'EXCELGENIC SDN BHD', '', 'MR TAN', '016-9500879', '', 'excelgenic.jb@gmail.com'),
(64, 'CASTLAB SDN BHD', '', 'EN YUSOF', '013-760 4578', '', 'm.yusof@castlab.com.my'),
(65, 'SLP CONSTRUCTION SDN BHD', '', 'MUHAMMAD FIRDAUS KAMARUDIN', 'NA', '', 'muhammadfirdauskamarudin7@gmail.com'),
(66, 'LINGKARAN EFEKTIF SDN BHD', '', 'MUHAMMAD HAFIFI', '011‐39535311', '', 'hafifi@lingkaran‐efektif.com'),
(67, 'HICOM HARTANAH SDN BHD', '', 'ARIFF HILMI', '016-350 4641', '', 'ariff.hilmi@glenmarieproperties.com'),
(68, 'MACGDI', '', 'EPEROLEHAN', 'EPEROLEHAN', '', 'EPEROLEHAN'),
(69, 'JLAND GROUP SDN BHD', '', 'NADIAH ZAINUDIN', '019-750 1907', '', 'nadiah.zainudin@jlandgroup.com.my'),
(70, 'GAS MALAYSIA', '', 'MOHD NAHAR OMAR', '', '', ''),
(71, 'CHINA COMMUNICATIONS CONSTRCUTION COMPANY', '', 'RUTH LEONG', '016-792 8149', '', 'ruthleong97@gmail.com'),
(72, 'MAXIS', '', '', '', '', ''),
(73, 'INDAH WATER KONSORTIUM', '', 'IRMAYANTY BINTI ISMAIL', '03-27801444', '', 'irmayantyis@iwk.com.my'),
(74, 'TENAGA NASIONAL BERHAD (TNB) - MMS', '', 'EN ZAKWAN', '01772230923', '', ''),
(75, 'AIR SELANGOR', '  Pengurusan Air Selangor Sdn. Bhd.    Level 4, Tower E,    Bangsar Trade Centre (BTC),    Jalan Pantai Bharu, Kuala Lumpur.', 'Pn. Nuraina Zamry', '019-283 9585', '', 'nuraina.zamry@airselangor.com'),
(76, 'Google', 'Singapore', 'Songran', '6212341234', '61234234234', 'songran@google.com'),
(77, 'En Saiful bin Sarifuddin', 'Lot 10550, Mk Pulau Tawar, Daerah Jerantut, Pahang', 'En Saiful bin Sarifuddin', '0192772268', '', ''),
(78, 'En Ho San Cheh', 'Lot 7158, Batu 16.2, Jln Genting Highland, 69000 Genting, Pahang', 'En Ho San Cheh', '0126115768', '', ''),
(79, 'Goodwood Industries Sdn Bhd', 'Lot 26253, Mk Pulau Tawar, Daerah Jerantut, Pahang', 'En Shazwan', '0145487790', '', ''),
(80, 'PAKATAN UKUR BAHAN SDN BHD', 'NO 30, JALAN JAYA 2, TAMAN JAYA 2, 81300 SKUDAI, JOHOR', 'KHATIJAH', '07-556 6864', '', 'akmajannah7372@gmail.com'),
(81, 'OCTAGON SDN BHD', 'NO. 9, JALAN SUTERA 1/5A, BUKIT ANGKAT INDUSTRIAL PARK SG CHUA, 43000 KAJANG, SELANGOR DARUL EHSAN, MALAYSIA', 'LILI', '03-8741 4929', '', 'project6@octagonmaju.com.my'),
(82, 'WM SENIBONG SDN BHD', 'N-01, BLOK N, PINGGIRAN SENIBONG, NO. 1 PERSIARAN SENIBONG, TELUK SENIBONG, 81750 MASAI, JOHOR MALAYSIA', 'WOON LEONG', '03-382 0388', '', 'cmleong@wmsenibong.com.my'),
(83, 'MUHAMAD ALIFF BIN ZAINUDIN', 'LOT 224B, JALAN JELUTONG 1,  KAMPONG PULAI, 81550 GELANG PATAH, JOHOR DARUL TAKZIM.', 'MUHAMAD ALIFF BIN ZAINUDIN', '013-644 4367', '', ''),
(84, 'PIJ PLANTATION', 'ARAS 2, BANGUNAN PIJ HOLDINGS, JALAN BUKIT TIMBALAN,  BANDAR JOHOR BAHRU, 80000 JOHOR BAHRU,  JOHOR DARUL TAKZIM', 'SHAHIDAWATI BINTI OTHMAN', '07-2215279', '', 'pij.plantaton@gmail.com'),
(85, 'Y&S ILHAM JAYA SDN BHD', 'Y&S ILHAM JAYA SDN BHD (D-509B), KAMPUNG KUALA BEKAH, JALAN PULAU MUSANG, 20050 KUALA TERENGGANU, TERENGGANU DARUL IMAN', 'ALIAH MAHMOOD', '013-744 2098', '', 'alia.mahmood@yns.my'),
(86, 'GENTING PROPERTY SDN BHD', 'LEVEL 3 WISMA GENTING, JALAN SULTAN ISMAIL, 50250 KUALA LUMPUR', 'PENG SHER SEONG', '019-3578101', '', 'sherseong.peng@genting.com'),
(87, 'ANGKASA CONSULTANT SERVICES SDN BHD', 'NO.49 JALAN USJ 10/1A UEP SUBANG JAYA, 47620 SUBANG JAYA SELANGOR DARUL EHSAN', 'Muhammad Imran', '012-2841080', '', 'm.imran@acssb.com.my'),
(88, 'TENAGA NASIONAL BERHAD (MERSING)', 'NO 48 JLN ISMAIL, 86800 MERSING MALAYSIA', 'PRIYADASHINI', '07-1234456', '', 'priyadashini.saravanan@tnb.com.my'),
(89, 'TENAGA NASIONAL BERHAD (KLUANG)', 'BAHAGIAN PEMBAHAGIAN 86000 JOHOR MALAYSIA', 'MUHAMAD BIN AHMAD SHUKRI', '013-8838687', '', 'muhamad.shukri@tnb.com.my'),
(90, 'TENAGA NASIONAL BERHAD (KOTA TINGGI)', 'BAHAGIAN PEMBAHAGIAN 81900 JOHOR-JALAN LOMBONG MALAYSIA', 'MOHAMAD FAHMI B MOHAMAD NOR', '018-7713234', '', 'fahmi.nor@tnb.com.my'),
(91, 'TENAGA NASIONAL BERHAD (BATU PAHAT)', 'BAHAGIAN PEMBAHAGIAN 83009 JOHOR-JALAN BAKAU CONDONG MALAYSIA', 'NOR HUWAINA BT BORHAN', '019-7738846', '', 'norhuwaina@tnb.com.my'),
(92, 'PULANGAN NAGA SDN BHD', 'NO 115A, JALAN BERINGIN, TAMAN MELODIES, 80250 JOHOR BAHRU, JOHOR', 'SERENA TONG CHAI NYEOK', '019-770 7938', '', 'jadecommercial@outlook.com'),
(93, 'NERACA PRISMA SDN BHD', 'LEVEL 1, WISMA DRB-HICOM, NO 2, JALAN USAHAWAN U1/8, SEKSYEN U1, 40150 SHAH ALAM, SELANGOR', 'ARIFF HILMI', '016-350 4641', '', 'ariff.hilmi@glenmarieproperties.com'),
(94, 'TENAGA NASIONAL BERHAD (PONTIAN)', 'BAHAGIAN PEMBAHAGIAN 82000 JOHOR-JALAN PARIT MASJID MALAYSIA', 'ZHAFRAN AIMAN BIN ZULKARNAIN', '01234567', '', 'zhafranaiman.zulkarnain@tnb.com.my'),
(98, 'asdasdasd', 'asdas', 'dasdasd', '01223423424', '9345345', 'atas.meja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contract_partner`
--

CREATE TABLE `contract_partner` (
  `cp_id` int(255) NOT NULL,
  `cp_proj_no` varchar(255) NOT NULL,
  `cp_ref_no` varchar(255) NOT NULL,
  `cp_name` varchar(255) NOT NULL,
  `cp_start` date NOT NULL,
  `cp_end` date NOT NULL,
  `cp_fee` varchar(255) NOT NULL,
  `cp_term` varchar(255) NOT NULL,
  `cp_lad` varchar(255) NOT NULL,
  `cp_vas` varchar(255) NOT NULL,
  `cp_others` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `doc_version` varchar(11) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_upload_by` varchar(255) NOT NULL,
  `doc_folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_proj_no`, `doc_name`, `doc_remark`, `doc_path`, `doc_type`, `doc_version`, `doc_date`, `doc_upload_by`, `doc_folder`) VALUES
(1, '', '6.Contract Partner Registration Form new.pdf', 'Form list', 'form/6.Contract Partner Registration Form new.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(2, '', 'Appointment of Contract Partner.pdf', 'Form list', 'form/Appointment of Contract Partner.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(3, '', 'Asset Declaration Form.SGS.doc', 'Form list', 'form/Asset Declaration Form.SGS.doc', '', '1.0', '2023-06-11', 'MAM', ''),
(4, '', 'Contract Partner Claims.pdf', 'Form list', 'form/Contract Partner Claims.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(5, '', 'Contract Partner Registration Form.pdf', 'Form list', 'form/Contract Partner Registration Form.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(6, '', 'HRD.001 - OVERTIME REQUEST FORM.pdf', 'Form list', 'form/HRD.001 - OVERTIME REQUEST FORM.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(7, '', 'POA_&_CP_CLAIM_AL_FATIH_CONS_MANAGEMENT_TRAINING_&_CONSULTANCY_SGSJ.pdf', 'Form list', 'form/POA_&_CP_CLAIM_AL_FATIH_CONS_MANAGEMENT_TRAINING_&_CONSULTANCY_SGSJ.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(8, '', 'QF.201.0.3-02 Training Request Form_260822 (new).doc', 'Form list', 'form/QF.201.0.3-02 Training Request Form_260822 (new).doc', '', '1.0', '2023-06-11', 'MAM', ''),
(9, '', 'SGSSB_Incident Investigation Report.pdf', 'Form list', 'form/SGSSB_Incident Investigation Report.pdf', '', '1.0', '2023-06-11', 'MAM', ''),
(10, 'SGS(J).22J001', 'tapak kerja ptis.kmz', 'Tapak kerja', 'project/SGS(J).22J001/Supporting_Document/tapak kerja ptis.kmz', 'kmz', '', '2023-06-13', 'MAM', 'Supporting Document'),
(11, 'SGS(J).22J001', 'NEWTMBHN.dwg', 'Data', 'project/SGS(J).22J001/Data/NEWTMBHN.dwg', 'dwg', '', '2023-06-13', 'MAM', 'Data'),
(19, 'SGS(C).23Q002', 'Scanned Documents.pdf', 'Supporting files.', 'quotation/SGS(C).23Q002/Scanned Documents.pdf', '', '', '2023-01-12', 'NNJ', ''),
(20, 'SGS(C).23Q004', 'LOT 26253 - KM-Model-1.pdf', 'Supporting files.', 'quotation/SGS(C).23Q004/LOT 26253 - KM-Model-1.pdf', '', '', '2023-01-18', 'NNJ', ''),
(21, 'SGS(J).23Q001', 'SGS(J).23Q001rev3 SOUTHKEY.STRATA VER.2.pdf', 'Supporting files.', 'quotation//SGS(J).23Q001rev3 SOUTHKEY.STRATA VER.2.pdf', '', '', '2023-07-30', 'SAAT', ''),
(22, 'SGS(J).23Q001', 'Appendix 2 - Setia Geosolutipns Sdn Bhd Propose BQ4.pdf', 'Supporting files.', 'quotation//Appendix 2 - Setia Geosolutipns Sdn Bhd Propose BQ4.pdf', '', '', '2023-07-30', 'SAAT', ''),
(23, 'SGS(J).23Q002', 'BQ- KNITTING FGH Ramatex Utility Mapping Work.pdf', 'Supporting files.', 'quotation//BQ- KNITTING FGH Ramatex Utility Mapping Work.pdf', '', '', '2023-07-30', 'SAAT', ''),
(24, 'SGS(J).23Q002', 'SGS(J).23Q002 SAMAIDEN.UUM.pdf', 'Supporting files.', 'quotation//SGS(J).23Q002 SAMAIDEN.UUM.pdf', '', '', '2023-07-30', 'SAAT', ''),
(25, 'SGS(J).23Q003', 'SGS(J).23Q003 TPM TECHNOPARK.pdf', 'Supporting files.', 'quotation//SGS(J).23Q003 TPM TECHNOPARK.pdf', '', '', '2023-07-30', 'SAAT', ''),
(26, 'SGS(J).23Q004', '1. SURVEY WORK UUDM, J BALAU 1.pdf', 'Supporting files.', 'quotation//1. SURVEY WORK UUDM, J BALAU 1.pdf', '', '', '2023-07-30', 'SAAT', ''),
(27, 'SGS(J).23Q004', '2. SURVEY WORK UUDM, J CENGAI.pdf', 'Supporting files.', 'quotation//2. SURVEY WORK UUDM, J CENGAI.pdf', '', '', '2023-07-30', 'SAAT', ''),
(28, 'SGS(J).23Q004', '3. SURVEY WORK UUDM, J DATO SULAIMAN.pdf', 'Supporting files.', 'quotation//3. SURVEY WORK UUDM, J DATO SULAIMAN.pdf', '', '', '2023-07-30', 'SAAT', ''),
(29, 'SGS(J).23Q004', 'SGS(J).23Q004 SAFWA UUM.docx', 'Supporting files.', 'quotation//SGS(J).23Q004 SAFWA UUM.docx', '', '', '2023-07-30', 'SAAT', ''),
(30, 'SGS(J).23Q005', 'SGS(J).23Q005.pdf', 'Supporting files.', 'quotation//SGS(J).23Q005.pdf', '', '', '2023-07-30', 'SAAT', ''),
(31, 'SGS(J).23Q006', 'BQ - Detail Topo Survey for NADI.PDF', 'Supporting files.', 'quotation//BQ - Detail Topo Survey for NADI.PDF', '', '', '2023-07-30', 'SAAT', ''),
(32, 'SGS(J).23Q006', 'SGS(J).23Q006 SOUTHKEY.TOPO.docx', 'Supporting files.', 'quotation//SGS(J).23Q006 SOUTHKEY.TOPO.docx', '', '', '2023-07-30', 'SAAT', ''),
(33, 'SGS(J).23Q033', 'Quotation SURVEY.pdf', 'Supporting files.', 'quotation/SGS(J).23Q033/Quotation SURVEY.pdf', '', '', '2023-06-15', 'SAAT', ''),
(34, 'SGS(J).23Q033', 'SGS(J).23Q033 PUB PRICE RATE.pdf', 'Supporting files.', 'quotation/SGS(J).23Q033/SGS(J).23Q033 PUB PRICE RATE.pdf', '', '', '2023-06-15', 'SAAT', ''),
(35, 'SGS(J).23Q034', 'SGS(J).23Q034 OCTAGON SDN BHD UUM.pdf', 'Supporting files.', 'quotation/SGS(J).23Q034/SGS(J).23Q034 OCTAGON SDN BHD UUM.pdf', '', '', '2023-06-15', 'SAAT', ''),
(36, 'SGS(J).23Q035', 'BQ (r1).pdf', 'Supporting files.', 'quotation/SGS(J).23Q035/BQ (r1).pdf', '', '', '2023-06-19', 'SAAT', ''),
(37, 'SGS(J).23Q035', 'SGS(J).23Q035 WM SENIBONG SDN BHD UUM.pdf', 'Supporting files.', 'quotation/SGS(J).23Q035/SGS(J).23Q035 WM SENIBONG SDN BHD UUM.pdf', '', '', '2023-06-19', 'SAAT', ''),
(38, 'SGS(J).23Q036', 'SGS(J).23Q036_PECAH BAHAGIAN.pdf', 'Supporting files.', 'quotation/SGS(J).23Q036/SGS(J).23Q036_PECAH BAHAGIAN.pdf', '', '', '2023-06-28', 'SAAT', ''),
(39, 'SGS(J).23Q037', 'PACKAGE TOTAL SUM FOR SURVEY FEES.pdf', 'Supporting files.', 'quotation/SGS(J).23Q037/PACKAGE TOTAL SUM FOR SURVEY FEES.pdf', '', '', '2023-07-14', 'SAAT', ''),
(40, 'SGS(J).23Q037', 'Quotation Format (V2) 12 SITES.pdf', 'Supporting files.', 'quotation/SGS(J).23Q037/Quotation Format (V2) 12 SITES.pdf', '', '', '2023-07-14', 'SAAT', ''),
(41, 'SGS(J).23Q037', 'SGS(J).23Q037 IWK DEMARCATE 12 SITE.pdf', 'Supporting files.', 'quotation/SGS(J).23Q037/SGS(J).23Q037 IWK DEMARCATE 12 SITE.pdf', '', '', '2023-07-14', 'SAAT', ''),
(42, 'SGS(J).23Q038', 'SGS(J).23Q038 PIJ FINAL TITLE.docx', 'Supporting files.', 'quotation/SGS(J).23Q038/SGS(J).23Q038 PIJ FINAL TITLE.docx', '', '', '2023-07-20', 'SAAT', ''),
(43, 'SGS(J).23Q038', 'SURAT AKUAN PEMBIDA1.pdf', 'Supporting files.', 'quotation/SGS(J).23Q038/SURAT AKUAN PEMBIDA1.pdf', '', '', '2023-07-20', 'SAAT', ''),
(44, 'SGS(J).23Q038', 'TAWARAN SEBUT HARGA UKUR SEMPADAN1.pdf', 'Supporting files.', 'quotation/SGS(J).23Q038/TAWARAN SEBUT HARGA UKUR SEMPADAN1.pdf', '', '', '2023-07-20', 'SAAT', ''),
(45, 'SGS(J).23Q039', 'Bill of Quantity_rev1.pdf', 'Supporting files.', 'quotation/SGS(J).23Q039/Bill of Quantity_rev1.pdf', '', '', '2023-07-12', 'SAAT', ''),
(46, 'SGS(J).23Q039', 'SGS(J).23Q039 PTP D09.pdf', 'Supporting files.', 'quotation/SGS(J).23Q039/SGS(J).23Q039 PTP D09.pdf', '', '', '2023-07-12', 'SAAT', ''),
(47, 'SGS(J).23Q040', 'SGS(J).23Q040 Y&S ILHAM JAYA UUM.pdf', 'Supporting files.', 'quotation/SGS(J).23Q040/SGS(J).23Q040 Y&S ILHAM JAYA UUM.pdf', '', '', '2023-07-13', 'SAAT', ''),
(48, 'SGS(J).23Q041', 'SGS(J).23Q041 GENTING PROPOERTIES SDN BHD UUM.pdf', 'Supporting files.', 'quotation/SGS(J).23Q041/SGS(J).23Q041 GENTING PROPOERTIES SDN BHD UUM.pdf', '', '', '2023-07-20', 'SAAT', ''),
(49, 'SGS(J).23Q043', 'J102 ES4 Appendix.pdf', 'Supporting files.', 'quotation/SGS(J).23Q043/J102 ES4 Appendix.pdf', '', '', '2023-07-27', 'SAAT', ''),
(50, 'SGS(J).23Q043', 'SGS(J).23Q043 ANGKASA CONSULTANT SERVICES SDN BHD.pdf', 'Supporting files.', 'quotation/SGS(J).23Q043/SGS(J).23Q043 ANGKASA CONSULTANT SERVICES SDN BHD.pdf', '', '', '2023-07-27', 'SAAT', ''),
(51, 'SGS(J).23Q009', 'SGS(J).23Q009 KULIM DEMARCATE.pdf', 'Supporting files.', 'quotation//SGS(J).23Q009 KULIM DEMARCATE.pdf', '', '', '2023-08-01', 'SAAT', ''),
(52, 'SGS(J).23Q010', 'SGS(J).23Q010 AECOM PERUNDING.pdf', 'Supporting files.', 'quotation//SGS(J).23Q010 AECOM PERUNDING.pdf', '', '', '2023-08-01', 'SAAT', ''),
(53, 'SGS(J).23Q010', '5. FEE PROPOSAL.pdf', 'Supporting files.', 'quotation//5. FEE PROPOSAL.pdf', '', '', '2023-08-01', 'SAAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(255) NOT NULL,
  `log_title` varchar(255) NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_title`, `log_user`, `log_date`, `log_status`) VALUES
(1, 'Logged out', 'JHR065', '2023-06-11 02:08:37', 'Success'),
(2, 'Logged in', 'JHR065', '2023-06-11 02:08:46', 'Success'),
(3, 'Added a new quotation ', 'JHR065', '2023-06-11 02:37:01', 'Success'),
(4, 'Add action to quotation SGS(J).22Q001', 'JHR065', '2023-06-11 02:37:16', 'Success'),
(5, 'Reject quotation : ', 'JHR065', '2023-06-11 02:37:39', 'Success'),
(6, 'Added a new quotation ', 'JHR065', '2023-06-11 02:41:25', 'Success'),
(7, 'Added a new quotation ', 'JHR065', '2023-06-11 02:46:39', 'Success'),
(8, 'Added a new quotation ', 'JHR065', '2023-06-11 02:49:21', 'Success'),
(9, 'Add action to quotation SGS(J).22Q004', 'JHR065', '2023-06-11 02:49:37', 'Success'),
(10, 'Reject quotation : ', 'JHR065', '2023-06-11 02:50:08', 'Success'),
(11, 'Added a new quotation ', 'JHR065', '2023-06-11 02:52:55', 'Success'),
(12, 'Add action to quotation SGS(J).22Q005', 'JHR065', '2023-06-11 02:53:33', 'Success'),
(13, 'Approved quotation : SGS(J).22Q005', 'JHR065', '2023-06-11 02:54:13', 'Success'),
(14, 'Added a new quotation ', 'JHR065', '2023-06-11 03:41:56', 'Success'),
(15, 'Add action to quotation SGS(J).22Q006', 'JHR065', '2023-06-11 03:42:20', 'Success'),
(16, 'Reject quotation : ', 'JHR065', '2023-06-11 03:42:49', 'Success'),
(17, 'Added a new quotation SGS(J).22Q007', 'JHR065', '2023-06-11 03:47:38', 'Success'),
(18, 'Add action to quotation SGS(J).22Q007', 'JHR065', '2023-06-11 03:48:14', 'Success'),
(19, 'Reject quotation : ', 'JHR065', '2023-06-11 03:48:36', 'Success'),
(20, 'Logged in', 'JHR065', '2023-06-12 00:15:42', 'Success'),
(21, 'Logged in', 'JHR065', '2023-06-12 23:45:36', 'Success'),
(22, 'Add document to SGS(J).22J001', 'JHR065', '2023-06-12 17:49:18', 'Failed'),
(23, 'Add document to SGS(J).22J001', 'JHR065', '2023-06-12 18:01:53', 'Success'),
(24, 'Add document to SGS(J).22J001', 'JHR065', '2023-06-12 18:06:32', 'Success'),
(25, 'Logged in', 'JHR065', '2023-06-13 00:56:26', 'Success'),
(26, 'Logged in', 'JHR065', '2023-06-13 01:05:13', 'Success'),
(27, 'Logged in', 'JHR065', '2023-06-13 01:08:11', 'Success'),
(28, 'Logged in', 'JHR036', '2023-06-13 01:15:59', 'Success'),
(29, 'Logged in', 'JHR065', '2023-06-13 01:17:43', 'Success'),
(30, 'Logged out', 'JHR065', '2023-06-13 01:19:22', 'Success'),
(31, 'Logged in', 'JHR065', '2023-06-13 01:24:03', 'Success'),
(32, 'Add action to quotation SGS(J).23Q019', 'JHR036', '2023-06-13 01:50:00', 'Success'),
(33, 'Approved quotation : SGS(J).23Q019', 'JHR036', '2023-06-13 01:50:18', 'Success'),
(34, 'Logged in', 'JHR065', '2023-06-13 01:53:40', 'Success'),
(35, 'Logged out', 'JHR065', '2023-06-13 01:55:34', 'Success'),
(36, 'Logged in', 'JHR065', '2023-06-13 01:55:43', 'Success'),
(37, 'Logged in', 'JHR065', '2023-06-13 01:56:17', 'Success'),
(38, 'Logged in', 'JHR065', '2023-06-13 07:22:51', 'Success'),
(39, 'Logged in', 'JHR065', '2023-06-15 01:15:15', 'Success'),
(40, 'Logged in', 'JHR023', '2023-06-15 02:09:36', 'Success'),
(41, 'Delete securement : SGS(J).23J001', 'JHR023', '2023-06-15 02:19:53', 'Success'),
(42, 'Logged out', 'JHR023', '2023-06-15 02:27:09', 'Success'),
(43, 'Logged in', 'JHR065', '2023-06-15 02:27:44', 'Success'),
(44, 'Logged in', 'JHR019', '2023-06-18 03:31:24', 'Success'),
(45, 'Logged in', 'JHR065', '2023-06-20 03:16:39', 'Success'),
(46, 'Logged out', 'JHR065', '2023-06-20 03:24:18', 'Success'),
(47, 'Logged in', 'JHR065', '2023-06-20 06:19:33', 'Success'),
(48, 'Logged in', 'JHR065', '2023-06-21 02:37:23', 'Success'),
(49, 'Add action to project schedule', 'JHR065', '2023-06-21 03:24:00', 'Success'),
(50, 'Update action', 'JHR065', '2023-06-21 03:24:08', 'Success'),
(51, 'Delete an action in project schedule', 'JHR065', '2023-06-21 03:24:13', 'Success'),
(52, 'Add schedule data SGS(J).22J001', 'JHR065', '2023-06-20 22:26:50', 'Success'),
(53, 'Add actual schedule data SGS(J).22J001 On-Site', 'JHR065', '2023-06-20 22:28:07', 'Success'),
(54, 'Request invoice for SGS(J).22J001', 'JHR065', '2023-06-20 22:50:02', 'Success'),
(55, 'Upload invoice for SGS(J).22J001', 'JHR065', '2023-06-21 04:56:48', 'Success'),
(56, 'Logged in', 'JHR036', '2023-06-21 05:02:35', 'Success'),
(57, 'Add action to project schedule', 'JHR065', '2023-06-21 05:41:32', 'Success'),
(58, 'Add schedule data SGS(J).22J001', 'JHR065', '2023-06-20 23:50:17', 'Success'),
(59, 'Logged in', 'JHR065', '2023-06-21 06:42:35', 'Success'),
(60, 'Logged in', 'JHR065', '2023-06-21 06:57:21', 'Success'),
(61, 'Delete project schedule', 'JHR065', '2023-06-21 01:07:53', 'Success'),
(62, 'Delete project schedule', 'JHR065', '2023-06-21 01:07:58', 'Success'),
(63, 'Added a new quotation SGS(J).23Q033', 'JHR065', '2023-06-21 07:15:38', 'Success'),
(64, 'Delete invoice', 'JHR065', '2023-06-21 07:32:42', 'Success'),
(65, 'Request invoice for SGS(J).22J001', 'JHR065', '2023-06-21 01:33:57', 'Success'),
(66, 'Upload invoice for SGS(J).22J001', 'JHR065', '2023-06-21 07:45:14', 'Success'),
(67, 'Request invoice for SGS(J).22J001', 'JHR065', '2023-06-21 01:45:37', 'Success'),
(68, 'Delete invoice', 'JHR065', '2023-06-21 07:45:50', 'Success'),
(69, 'Delete invoice', 'JHR065', '2023-06-21 07:45:54', 'Success'),
(70, 'Add schedule data SGS(J).22J001 Email status: Sent', 'JHR065', '2023-06-21 02:27:35', 'Success'),
(71, 'Delete project schedule', 'JHR065', '2023-06-21 02:28:22', 'Success'),
(72, 'Delete an action in project schedule', 'JHR065', '2023-06-21 08:33:30', 'Success'),
(73, 'Logged in', 'JHR065', '2023-06-21 12:03:22', 'Success'),
(74, 'Logged in', 'JHR065', '2023-06-21 12:31:21', 'Success'),
(75, 'Added a new quotation SGS(C).23Q001', 'PHG010', '2023-06-22 01:57:23', 'Success'),
(76, 'Added a new quotation SGS(J).23Q033', 'JHR065', '2023-06-22 02:24:30', 'Success'),
(77, 'Added a new quotation SGS.23Q001', 'ENG088', '2023-06-22 02:28:03', 'Success'),
(78, 'Added a new quotation SGS.23Q002', 'ENG085', '2023-06-22 02:31:50', 'Success'),
(79, 'Add action to quotation SGS(J).23Q033', 'JHR065', '2023-06-22 02:32:06', 'Success'),
(80, 'Approved quotation : SGS(J).23Q033', 'JHR065', '2023-06-22 02:39:07', 'Success'),
(81, 'Add action to quotation SGS.23Q002', 'ENG088', '2023-06-22 02:39:20', 'Success'),
(82, 'Delete an action in quotation ', 'ENG088', '2023-06-22 02:39:45', 'Success'),
(83, 'Approved quotation : SGS.23Q002', 'ENG085', '2023-06-22 02:40:09', 'Success'),
(84, 'Add action to quotation SGS(C).23Q001', 'PHG010', '2023-06-22 02:43:21', 'Success'),
(85, 'Add action to quotation SGS.23Q002', 'ENG085', '2023-06-22 02:47:59', 'Success'),
(86, 'Delete an action in quotation ', 'ENG085', '2023-06-22 02:49:08', 'Success'),
(87, 'Add action to quotation SGS.23Q002', 'ENG085', '2023-06-22 02:49:31', 'Success'),
(88, 'Added a new quotation SGS.24Q001', 'ENG025', '2023-06-22 02:50:32', 'Success'),
(89, 'Add action to project schedule', 'JHR065', '2023-06-22 02:50:56', 'Success'),
(90, 'Add action to project schedule', 'JHR065', '2023-06-22 02:51:07', 'Success'),
(91, 'Add schedule data SGS(J).23P001 Email status: Sent', 'JHR065', '2023-06-21 20:52:24', 'Success'),
(92, 'Added a new quotation SGS(J).23Q034', 'JHR023', '2023-06-22 02:52:43', 'Success'),
(93, 'Add document to SGS.23B001', 'ENG085', '2023-06-21 20:55:44', 'Success'),
(94, 'Add action to project schedule', 'ENG085', '2023-06-22 02:56:03', 'Success'),
(95, 'Add schedule data SGS(J).23P001 Email status: Sent', 'JHR065', '2023-06-21 20:58:14', 'Success'),
(96, 'Add action to quotation SGS.24Q001', 'ENG025', '2023-06-22 02:58:44', 'Success'),
(97, 'Add actual schedule data SGS(J).23P001 On-Site', 'JHR065', '2023-06-21 20:59:03', 'Success'),
(98, 'Approved quotation : SGS.24Q001', 'ENG025', '2023-06-22 02:59:25', 'Success'),
(99, 'Add actual schedule data SGS(J).23P001 On-Site', 'JHR065', '2023-06-21 20:59:40', 'Success'),
(100, 'Added a new quotation SGS.23Q003', 'ENG029', '2023-06-22 03:00:14', 'Success'),
(101, 'Add action to quotation SGS.23Q003', 'ENG029', '2023-06-22 03:00:33', 'Success'),
(102, 'Add schedule data SGS(J).23P001 Email status: Sent', 'JHR065', '2023-06-21 21:01:11', 'Success'),
(103, 'Approved quotation : SGS(C).23Q001', 'PHG010', '2023-06-22 03:02:08', 'Success'),
(104, 'Add document to SGS.23B001', 'ENG085', '2023-06-21 21:03:05', 'Success'),
(105, 'Add document to SGS(J).23P001', 'JHR065', '2023-06-21 21:03:13', 'Success'),
(106, 'Add document to SGS(J).23P001', 'JHR065', '2023-06-21 21:04:43', 'Success'),
(107, 'Add document to SGS.23B001', 'ENG085', '2023-06-21 21:04:47', 'Success'),
(108, 'Add actual schedule data SGS.23B001 On-Site', 'ENG085', '2023-06-21 21:07:28', 'Success'),
(109, 'Update action', 'ENG085', '2023-06-22 03:09:06', 'Success'),
(110, 'Add action to project schedule', 'ENG085', '2023-06-22 03:10:01', 'Success'),
(111, 'Update action', 'ENG067', '2023-06-22 03:10:09', 'Success'),
(112, 'Update action', 'ENG067', '2023-06-22 03:11:12', 'Success'),
(113, 'Update schedule data ', 'ENG029', '2023-06-21 21:16:38', 'Success'),
(114, 'Request invoice for SGS.23B001', 'ENG085', '2023-06-21 21:16:58', 'Success'),
(115, 'Add action invoice ', 'ENG085', '2023-06-22 03:17:17', 'Success'),
(116, 'Delete invoice', 'ENG085', '2023-06-22 03:17:33', 'Success'),
(117, 'Request invoice for SGS(J).23P001', 'JHR065', '2023-06-21 21:17:37', 'Success'),
(118, 'Request invoice for SGS.23B001', 'ENG085', '2023-06-21 21:17:39', 'Success'),
(119, 'Request invoice for SGS(J).23P001', 'JHR003', '2023-06-21 21:18:03', 'Success'),
(120, 'Request invoice for SGS.23B001', 'ENG085', '2023-06-21 21:18:06', 'Success'),
(121, 'Request invoice for SGS.23B001', 'ENG085', '2023-06-21 21:18:15', 'Success'),
(122, 'Delete an action in invoice', 'ENG085', '2023-06-22 03:18:25', 'Success'),
(123, 'Update schedule data ', 'ENG029', '2023-06-21 21:18:25', 'Success'),
(124, 'Upload invoice for SGS(J).23P001', 'JHR065', '2023-06-22 03:18:33', 'Success'),
(125, 'Add action invoice ', 'ENG085', '2023-06-22 03:18:38', 'Success'),
(126, 'Add action invoice 3650', 'JHR065', '2023-06-22 03:19:18', 'Success'),
(127, 'Payment receive for ', 'JHR065', '2023-06-22 03:20:16', 'Success'),
(128, 'Request invoice for SGS(J).23P001', 'JHR065', '2023-06-21 21:21:13', 'Success'),
(129, 'Upload invoice for SGS.23B001', 'JHR065', '2023-06-22 03:23:55', 'Success'),
(130, 'Payment receive for ', 'ENG085', '2023-06-22 03:24:31', 'Success'),
(131, 'Add action invoice 3001', 'ENG085', '2023-06-22 03:25:22', 'Success'),
(132, 'Delete invoice', 'JHR065', '2023-06-22 03:27:18', 'Success'),
(133, 'Request invoice for SGS.23B001', 'JHR065', '2023-06-21 21:27:37', 'Success'),
(134, 'Upload invoice for SGS(J).23P001', 'JHR065', '2023-06-22 03:31:26', 'Success'),
(135, 'Payment receive for ', 'JHR065', '2023-06-22 03:35:16', 'Success'),
(136, 'Upload invoice for SGS(J).23P001', 'JHR065', '2023-06-22 03:35:28', 'Success'),
(137, 'Payment receive for ', 'JHR065', '2023-06-22 03:35:36', 'Success'),
(138, 'Add document to SGS.23B001', 'ENG029', '2023-06-21 21:40:25', 'Success'),
(139, 'Delete project schedule', 'ENG029', '2023-06-21 21:41:21', 'Success'),
(140, 'Delete invoice', 'ENG085', '2023-06-22 03:42:46', 'Success'),
(141, 'Delete invoice', 'ENG085', '2023-06-22 03:42:52', 'Success'),
(142, 'Delete invoice', 'ENG085', '2023-06-22 03:42:56', 'Success'),
(143, 'Delete an action in project schedule', 'ENG085', '2023-06-22 03:43:19', 'Success'),
(144, 'Delete an action in project schedule', 'ENG085', '2023-06-22 03:43:22', 'Success'),
(145, 'Delete project schedule', 'ENG085', '2023-06-21 21:43:46', 'Success'),
(146, 'Delete securement : SGS.23B001', 'ENG085', '2023-06-22 03:44:07', 'Success'),
(147, 'Delete invoice', 'JHR065', '2023-06-22 04:39:53', 'Success'),
(148, 'Delete invoice', 'JHR065', '2023-06-22 04:39:58', 'Success'),
(149, 'Delete invoice', 'JHR065', '2023-06-22 04:40:04', 'Success'),
(150, 'Delete an action in project schedule', 'JHR065', '2023-06-22 04:40:55', 'Success'),
(151, 'Delete an action in project schedule', 'JHR065', '2023-06-22 04:41:02', 'Success'),
(152, 'Delete project schedule', 'JHR065', '2023-06-21 22:41:19', 'Success'),
(153, 'Delete project schedule', 'JHR065', '2023-06-21 22:41:24', 'Success'),
(154, 'Delete project schedule', 'JHR065', '2023-06-21 22:41:30', 'Success'),
(155, 'Delete securement : SGS(J).23P001', 'JHR065', '2023-06-22 04:41:52', 'Success'),
(156, 'Delete an action in quotation ', 'PHG010', '2023-07-08 01:52:41', 'Success'),
(157, 'Delete securement : SGS(C).23C001', 'PHG010', '2023-07-08 03:45:01', 'Success'),
(158, 'Added a new quotation SGS(C).23Q001', 'PHG010', '2023-07-08 03:51:43', 'Success'),
(159, 'Added a new quotation SGS(C).23Q002', 'PHG010', '2023-07-08 04:12:50', 'Success'),
(160, 'Added a new quotation SGS(C).23Q003', 'PHG010', '2023-07-08 04:28:36', 'Success'),
(161, 'Added a new quotation SGS(C).23Q004', 'PHG010', '2023-07-08 04:44:01', 'Success'),
(162, 'Add action to quotation SGS(J).23Q001', 'JHR023', '2023-07-30 04:19:53', 'Success'),
(163, 'Reject quotation : ', 'JHR023', '2023-07-30 04:21:26', 'Success'),
(164, 'Add action to quotation SGS(J).23Q002', 'JHR023', '2023-07-30 04:24:14', 'Success'),
(165, 'Add action to quotation SGS(J).23Q003', 'JHR023', '2023-07-30 04:26:53', 'Success'),
(166, 'Add action to quotation SGS(J).23Q004', 'JHR023', '2023-07-30 04:37:56', 'Success'),
(167, 'Reject quotation : ', 'JHR023', '2023-07-30 04:39:10', 'Success'),
(168, 'Add action to quotation SGS(J).23Q005', 'JHR023', '2023-07-30 04:40:57', 'Success'),
(169, 'Add action to quotation SGS(J).23Q006', 'JHR023', '2023-07-30 04:43:40', 'Success'),
(170, 'Added a new quotation SGS(J).23Q033', 'JHR023', '2023-07-30 05:02:48', 'Success'),
(171, 'Added a new quotation SGS(J).23Q034', 'JHR023', '2023-07-30 05:10:38', 'Success'),
(172, 'Added a new quotation SGS(J).23Q035', 'JHR023', '2023-07-30 06:47:35', 'Success'),
(173, 'Added a new quotation SGS(J).23Q036', 'JHR023', '2023-07-30 06:52:38', 'Success'),
(174, 'Added a new quotation SGS(J).23Q037', 'JHR023', '2023-07-30 06:55:46', 'Success'),
(175, 'Added a new quotation SGS(J).23Q038', 'JHR023', '2023-07-30 07:15:06', 'Success'),
(176, 'Added a new quotation SGS(J).23Q039', 'JHR023', '2023-07-30 07:20:58', 'Success'),
(177, 'Added a new quotation SGS(J).23Q040', 'JHR023', '2023-07-30 07:26:23', 'Success'),
(178, 'Added a new quotation SGS(J).23Q041', 'JHR023', '2023-07-30 07:33:52', 'Success'),
(179, 'Added a new quotation SGS(J).23Q042', 'JHR023', '2023-07-30 07:37:32', 'Success'),
(180, 'Added a new quotation SGS(J).23Q043', 'JHR023', '2023-07-30 07:46:21', 'Success'),
(181, 'Added a new quotation SGS(J).23Q044', 'JHR023', '2023-07-30 07:56:54', 'Success'),
(182, 'Add action to quotation SGS(J).23Q044', 'JHR023', '2023-07-30 07:57:14', 'Success'),
(183, 'Approved quotation : SGS(J).23Q044', 'JHR023', '2023-07-30 07:57:34', 'Success'),
(184, 'Added a new quotation SGS(J).23Q045', 'JHR023', '2023-07-30 08:03:35', 'Success'),
(185, 'Add action to quotation SGS(J).23Q045', 'JHR023', '2023-07-30 08:03:49', 'Success'),
(186, 'Approved quotation : SGS(J).23Q045', 'JHR023', '2023-07-30 08:05:12', 'Success'),
(187, 'Added a new quotation SGS(J).23Q046', 'JHR023', '2023-07-30 08:10:47', 'Success'),
(188, 'Add action to quotation SGS(J).23Q046', 'JHR023', '2023-07-30 08:11:09', 'Success'),
(189, 'Approved quotation : SGS(J).23Q046', 'JHR023', '2023-07-30 08:11:21', 'Success'),
(190, 'Added a new quotation SGS(J).23Q047', 'JHR023', '2023-07-30 08:17:14', 'Success'),
(191, 'Add action to quotation SGS(J).23Q047', 'JHR023', '2023-07-30 08:17:33', 'Success'),
(192, 'Approved quotation : SGS(J).23Q047', 'JHR023', '2023-07-30 08:17:53', 'Success'),
(193, 'Add action to quotation SGS(J).23Q007', 'JHR023', '2023-07-30 08:23:29', 'Success'),
(194, 'Approved quotation : SGS(J).23Q007', 'JHR023', '2023-07-30 08:23:58', 'Success'),
(195, 'Add action to quotation SGS(J).23Q008', 'JHR023', '2023-07-30 08:33:05', 'Success'),
(196, 'Approved quotation : SGS(J).23Q008', 'JHR023', '2023-07-30 08:33:24', 'Success'),
(197, 'Delete an action in quotation ', 'JHR023', '2023-08-01 01:44:37', 'Success'),
(198, 'Add action to quotation SGS(J).23Q019', 'JHR023', '2023-08-01 01:44:46', 'Success'),
(199, 'Approved quotation : SGS(J).23Q019', 'JHR023', '2023-08-01 01:45:45', 'Success'),
(200, 'Add action to quotation SGS(J).23Q028', 'JHR023', '2023-08-01 01:49:05', 'Success'),
(201, 'Approved quotation : SGS(J).23Q028', 'JHR023', '2023-08-01 01:51:56', 'Success'),
(202, 'Add action to quotation SGS(J).23Q027', 'JHR023', '2023-08-01 02:00:45', 'Success'),
(203, 'Approved quotation : SGS(J).23Q027', 'JHR023', '2023-08-01 02:03:23', 'Success'),
(204, 'Added a new quotation SGS(J).23Q048', 'JHR023', '2023-08-01 02:16:51', 'Success'),
(205, 'Add action to quotation SGS(J).23Q048', 'JHR023', '2023-08-01 02:20:07', 'Success'),
(206, 'Approved quotation : SGS(J).23Q048', 'JHR023', '2023-08-01 02:20:18', 'Success'),
(207, 'Add action to quotation SGS(J).23Q039', 'JHR023', '2023-08-01 02:24:35', 'Success'),
(208, 'Approved quotation : SGS(J).23Q039', 'JHR023', '2023-08-01 02:24:45', 'Success'),
(209, 'Add action to quotation SGS(J).23Q037', 'JHR023', '2023-08-01 04:33:29', 'Success'),
(210, 'Reject quotation : ', 'JHR023', '2023-08-01 04:33:48', 'Success'),
(211, 'Add action to quotation SGS(J).23Q030', 'JHR023', '2023-08-01 04:34:56', 'Success'),
(212, 'Reject quotation : ', 'JHR023', '2023-08-01 04:35:25', 'Success'),
(213, 'Add action to quotation SGS(J).23Q026', 'JHR023', '2023-08-01 04:35:58', 'Success'),
(214, 'Add action to quotation SGS(J).23Q041', 'JHR023', '2023-08-01 04:51:12', 'Success'),
(215, 'Reject quotation : ', 'JHR023', '2023-08-01 04:51:22', 'Success'),
(216, 'Direct award added : SGS(J).23J012', 'JHR065', '2023-08-15 02:37:12', 'Success'),
(217, 'Direct award added : SGS(J).23J012', 'JHR065', '2023-08-15 03:23:27', 'Success'),
(218, 'Direct award added : SGS(J).23J012', 'JHR065', '2023-08-15 03:45:45', 'Success'),
(219, 'Added a new quotation SGS(J).23Q049', 'JHR065', '2023-08-21 03:29:53', 'Success');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`manage_id`, `manage_proj_no`, `manage_date`, `manage_by`, `manage_status`) VALUES
(1, 'SGS(J).22J001', '2023-06-11', 'NSNC', '1'),
(2, 'SGS(J).23J001', '2023-06-13', 'MDL', '1'),
(3, 'SGS(J).23P001', '2023-06-22', 'MAM', '1'),
(4, 'SGS.23B001', '2023-06-22', 'AFHAH', '1'),
(5, 'SGS(C).23C001', '2023-06-22', 'NNJ', '1'),
(6, 'SGS(J).23J001', '2023-07-30', 'MDL', '1'),
(7, 'SGS(J).23J002', '2023-07-30', 'NSNC', '1'),
(8, 'SGS(J).23J003', '2023-07-30', 'MDL', '1'),
(9, 'SGS(J).23J004', '2023-07-30', 'MDL', '1'),
(10, 'SGS(J).23J005', '2023-07-30', 'NSNC', '1'),
(11, 'SGS(J).23J006', '2023-07-30', 'SAAT', '1'),
(12, 'SGS(J).23J007', '2023-08-01', 'MDL', '1'),
(13, 'SGS(J).23J008', '2023-08-01', 'NSNC', '1'),
(14, 'SGS(J).23J009', '2023-08-01', 'MDL', '1'),
(15, 'SGS(J).23J010', '2023-08-01', 'NSNC', '1'),
(16, 'SGS(J).23J011', '2023-08-01', 'MDL', '1');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(255) NOT NULL,
  `note_user` varchar(255) NOT NULL,
  `note_body` varchar(255) NOT NULL,
  `note_priority` varchar(255) NOT NULL,
  `note_timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `note_staff` varchar(255) NOT NULL,
  `note_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(255) NOT NULL,
  `noti_title` varchar(255) NOT NULL,
  `noti_body` varchar(255) NOT NULL,
  `noti_req_by` varchar(255) NOT NULL,
  `noti_timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `noti_type` varchar(255) NOT NULL,
  `noti_ref_no` varchar(255) NOT NULL,
  `noti_status` varchar(255) NOT NULL,
  `noti_inc_no` varchar(255) NOT NULL,
  `noti_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_proj_no`, `payment_tot_amt`, `payment_client`, `payment_pic`, `payment_tax`, `payment_date`, `payment_status`, `payment_proof`) VALUES
(1, 'SGS(J).22J001', '43585.08', 'TENAGA NASIONAL BERHAD', '', '', '2023-06-11', '', ''),
(6, 'SGS(J).23J001', '4865.40', 'TENAGA NASIONAL BERHAD (MERSING)', '', '', '2023-07-30', '', ''),
(7, 'SGS(J).23J002', '6095.00', 'TENAGA NASIONAL BERHAD (KLUANG)', '', '', '2023-07-30', '', ''),
(8, 'SGS(J).23J003', '6640.9', 'TENAGA NASIONAL BERHAD (KOTA TINGGI)', '', '', '2023-07-30', '', ''),
(9, 'SGS(J).23J004', '31619.80', 'TENAGA NASIONAL BERHAD (BATU PAHAT)', '', '', '2023-07-30', '', ''),
(10, 'SGS(J).23J005', '19186.00', 'PULANGAN NAGA SDN BHD', '', '', '2023-07-30', '', ''),
(11, 'SGS(J).23J006', '13250.00', 'NERACA PRISMA SDN BHD', '', '', '2023-07-30', '', ''),
(12, 'SGS(J).23J007', '44520.00', 'LINGKARAN EFEKTIF SDN BHD', '', '', '2023-08-01', '', ''),
(13, 'SGS(J).23J008', '20016.40', 'PELABUHAN TANJUNG PELEPAS', '', '', '2023-08-01', '', ''),
(14, 'SGS(J).23J009', '103613.47', 'JABATAN KERJA RAYA', '', '', '2023-08-01', '', ''),
(15, 'SGS(J).23J010', '116176.00', 'TENAGA NASIONAL BERHAD (PONTIAN)', '', '', '2023-08-01', '', ''),
(16, 'SGS(J).23J011', '6529.60', 'PELABUHAN TANJUNG PELEPAS', '', '', '2023-08-01', '', '');

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
  `project_amount_tax` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_deliver`
--

CREATE TABLE `project_deliver` (
  `pd_id` int(255) NOT NULL,
  `pd_proj_no` varchar(255) NOT NULL,
  `pd_proj_code` varchar(255) NOT NULL,
  `pd_amount` varchar(255) NOT NULL,
  `pd_amount_received` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pd_date` date NOT NULL,
  `pd_invoice` varchar(255) NOT NULL,
  `pd_remark` varchar(255) NOT NULL,
  `pd_invoice_no` varchar(255) NOT NULL,
  `pd_receive_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_schedule`
--

CREATE TABLE `project_schedule` (
  `ps_id` int(255) NOT NULL,
  `ps_proj_no` varchar(255) NOT NULL,
  `ps_type` varchar(255) NOT NULL,
  `ps_title` varchar(255) NOT NULL,
  `ps_add_date` date NOT NULL,
  `ps_start` date NOT NULL,
  `ps_end` date NOT NULL,
  `ps_start_act` date NOT NULL,
  `ps_end_act` date NOT NULL,
  `ps_pic` varchar(255) NOT NULL,
  `ps_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quot_id` int(255) NOT NULL,
  `quot_no` varchar(255) NOT NULL,
  `quot_no_inc` varchar(255) NOT NULL,
  `quot_app_date` date NOT NULL,
  `quot_branch` varchar(255) NOT NULL,
  `quot_proj_state` varchar(255) NOT NULL,
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
  `quot_type` varchar(255) NOT NULL,
  `quot_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quot_id`, `quot_no`, `quot_no_inc`, `quot_app_date`, `quot_branch`, `quot_proj_state`, `quot_title`, `quot_pic`, `quot_client_type`, `quot_client_status`, `quot_work_scope`, `quot_client`, `quot_client_pic`, `quot_client_phone`, `quot_client_email`, `quot_sub_deadline`, `quot_market_segmentation`, `quot_proj_duration`, `quot_site_location`, `quot_amount`, `quot_amount_tax`, `quot_status`, `quot_remark`, `quot_type`, `quot_link`) VALUES
(1, 'SGS(J).22Q001', '001', '2022-01-03', 'Johor', 'Johor', 'ITQ TO APPOINT LICENSED SURVEYOR FOR SURVEY ROAD AND CONTAINER YARD FOR SPT SERVICES SDN. BHD. AT SOLID PRODUCT JETTY (SPJ), PENGERANG', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'SPT SERVICES SDN. BHD.', 'NUR ASLINDA SHAMSUDIN', '07-253 5888 (1253)', 'nur.aslinda@spts.com.my', '2022-01-20', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'PENGERANG', '120098', '113300', 'rejected', 'Failed', 'QUOTATION', ''),
(2, 'SGS(J).22Q002', '002', '2022-01-05', 'Johor', 'Johor', 'INVITATION TO QUOTE (ITQ) FOR THE APPOINTMENT FOR A SURVEYOR AS A PANEL VENDOR FOR A PROJECT KNOWN AS ‘PENGURUSAN DAN PENYELENGGARAAN JALAN-JALAN PIHAK BERKUASA TEMPATAN SECARA BERSEPADU DI SELURUH NEGERI JOHOR’', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'SAFWA GLOBAL VENTURES SDN BHD', 'SUZLIYANA', '07-509 9686', 'suzliyana@infracity.com.my', '2022-01-18', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'JOHOR', '0', '0', 'applied', '', 'QUOTATION', ''),
(3, 'SGS(J).22Q003', '003', '2022-01-12', 'Johor', 'Johor', 'RFQ FOR SURVEY WORKS AT PLOT DW3 AT PTP, GELANG PATAH, JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'PELABUHAN TANJUNG PELEPAS', 'FASYA AIRIEN DAYANA ABDUL JAMALI', '07-504 2222', 'fasya.abdjamali@ptp.com.my', '2022-01-17', 'OIL & GAS', '1 Month', 'PTP', '9820.90', '9265', 'applied', '', 'QUOTATION', ''),
(4, 'SGS(J).22Q004', '004', '2022-01-06', 'Johor', 'Johor', 'ITQ TO APPOINTMENT OF SURVEYOR TO CARRY OUT UTILITIES MAPPING AT UTILITIES RESERVE (7M WIDTH), CONNECTION FROM JALAN SAC 2 TO THE EXISTING PPU SENAI HI-TECH ENTRANCE WITHIN ECOWORLD', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'SENAI AIRPORT CITY', 'MUZIATI HANAFIAH', '07-595 1114', 'muziati.hanafiah@senaiairport.com', '2022-01-20', 'AVIATION', '1 Month', 'SENAI', '19080', '18000', 'rejected', 'Failed', 'QUOTATION', ''),
(5, 'SGS(J).22Q005', '005', '2022-01-05', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT JALAN MASAI LAMA, HIGHWAY PASIR GUDANG, JOHOR', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD', 'HAIRUL HAIZAM BIN HARUN', '019-271 2597', '', '2022-01-24', 'POWER', '1 Month', 'PASIR GUDANG', '43585.08', '40969.98', 'approved', 'Secured', 'QUOTATION', ''),
(6, 'SGS(J).22Q006', '006', '2022-01-17', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT RTI 33kV - 55387, 297-298-904-3909, L0T 2946-2947, JALAN KLUANG, 83000 BATU PAHAT , JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'SAMAIDEN SDN BHD', 'ASYURAH AZMAN', '03-6151 5021', 'asyurah.azman@samaiden.com.my', '2022-01-31', 'POWER', '2 Year', 'BATU PAHAT', '10600', '10000', 'rejected', 'No response from clients', 'QUOTATION', ''),
(7, 'SGS(J).22Q007', '007', '2022-02-01', 'Johor', 'Johor', 'CADANGAN KHIDMAT PERUNDING JURUKUR TANAH UNTUK PERMOHONAN MENDAFTARKAN HAKMILIK BLOK KEPADA HAKMILIK INDIVIDU BAGI TUJUAN INDUSTRI SEDERHANA & KERJA HAKMILIK\r\n', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'TPM TECHNOPARK SDN BHD', 'MAHFIZ HAMIDON', '017-767 5166', 'mahfiz@tpmtechnopark.com.my', '2022-02-08', 'PROPERTY & INFRASTRUCTURE', '6 Month', 'SEDENAK', '630826.35', '595119.2', 'rejected', 'Failed', 'QUOTATION', ''),
(8, 'SGS(J).22Q008', '008', '2022-02-02', 'Johor', 'Johor', 'APPLICATION FOR CHANGE OF LAND USE FROM RUBBER TO OIL PALM AND FROM NIL TO OIL PALM - PENGUBAHAN SYARAT SEKATAN DAN JENIS PENGGUNAAN TANAH DI BAWAH SEKSYEN 124 KANUN TANAH NEGARA (KTN)', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'KULIM (M) BERHAD', 'SAIFUL AZIZI AHMAD', '013-772 6069', 'saiful@kulim.com.my', '2022-02-10', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'JOHOR', '47700.00', '44838', 'applied', '', 'QUOTATION', ''),
(9, 'SGS(J).22Q009', '009', '2022-02-02', 'Johor', 'Johor', 'PEROLEHAN MENAIKTARAF SISTEM PENGURUSAN DATA GEOSPATIAL UNTUK\nBAHAGIAN PENGURUSAN FASILITI DAN GIS, JABATAN PENGAIRAN DAN SALIRAN\nMALAYSIA', 'SMS', 'GOV', 'EXISTING', 'GIS', 'TBA', 'EN HASHIM BIN ABDULLAH', '', 'hashimabd@water.gov.my', '2022-02-04', 'PROPERTY & INFRASTRUCTURE', '1 YEAR', 'PUTRAJAYA', '959000.00', '904716.98', 'applied', '', 'TENDER', ''),
(10, 'SGS(J).22Q010', '010', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR ALLOCATE PROPOSE ROUTE, CROSS SECTION PROFILE & PEGGING WITH 50M INTERVAL AT PROPOSED EXPANSION TO THE EXISTING FACTORY ON PLOT D28F-1, JALAN DPB/3, SEBAHAGIAN PTD 2423, PELABUHAN TANJUNG PELEPAS, MUKIM TANJUNG KUPANG, DAERAH JOHOR BAHRU, JOHOR FO', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'OUTSPAN SDN BHD', 'YAP', '016-723 2332', 'lxyap@jpace.net', '2022-02-21', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'PTP', '16764.96', '15759.06', 'applied', '', 'QUOTATION', ''),
(11, 'SGS(J).22Q011', '011', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR INDEPENDENT SURVEY WORKS FOR BATHYMETRIC SURVEY AT PELABUHAN\nTANJUNG PELEPAS.', 'SAAT', 'GLC', 'EXISTING', 'HYDRO', 'TBA', 'EN SUHAIMI', '013-755 7374', 'suhaimi.kamarrudin@ptp.com.my', '2022-03-02', 'OIL & GAS', '2.5 MONTHS', 'PTP', '613316.00', '578600.00', 'applied', '', 'QUOTATION', ''),
(12, 'SGS(J).22Q012', '012', '2022-02-02', 'Johor', 'Johor', 'INVITATION FOR QUOTATION OF DEMARCATION SURVEY FOR THE EXISTING SEWERAGE SITES IN JOHOR (11 SITES).', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'EN FAUZIEE HASHIM', '', 'irmayantyis@iwk.com.my', '2022-03-07', 'UTILITY', '2 MONTHS', 'JOHOR', '63600.00', '60000.00', 'applied', '', 'QUOTATION', ''),
(13, 'SGS(J).22Q013', '013', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI SEMAKAN DATA UKURAN TOPOGRAFI DI ATAS PTD 102252, DAERAH KULAIJAYA, MUKIM SENAI, JOHOR DARUL TAZIM.', 'SAAT', 'GOV', 'EXISTING', 'ENG', 'TBA', 'PN NORA', '016-756 0095', 'noras@jkr.gov.my', '2022-03-15', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'KULAI', '5830.00', '5500.00', 'applied', '', 'QUOTATION', ''),
(14, 'SGS(J).22Q014', '014', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA PERMOHONAN HAKMILIK KEKAL BAGI LADANG BUKIT KELOMPOK (LBK) DAN LADANG PASIR LOGOK (LPL).', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'PN NURUL ZIRIAH', '019-372 3316', 'nurulziriah@kulim.com.my', '2022-03-17', 'PROPERTY & INFRASTRUCTURE', '2 YEARS', 'KOTA TINGGI', '1536704.26', '1449721.00', 'applied', '', 'QUOTATION', ''),
(15, 'SGS(J).22Q015', '015', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UNDERGROUND MAPPING UTILITIES ALONG JALAN BAYU PUTERI 2 , SOUTHKEY CITY, JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', 'PN AZLIN FARHANA', '07-335 7373', 'azlin.southkey@gmail.com', '2022-03-28', 'UTILITY', '2 WEEKS', 'JOHOR BAHRU', '24168.00', '22800.00', 'applied', '', 'QUOTATION', ''),
(16, 'SGS(J).22Q016', '016', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI KERJA-KERJA UTILITY MAPPING BAGI MENGENALPASTI KEDUDUKAN SEBENAR PAIP SEDIADA DI TAPAK CADANGAN PEMBANGUNAN 325 UNIT RUMAH TERES 2 TINGKAT DI FASA 4, BANDAR UDA UTAMA, MUKIM PULAI, DAERAH JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', '', '07-237 4944', '', '2022-04-13', 'UTILITY', '1 MONTH', 'JOHOR BAHRU', '26749.10', '25235.00', 'applied', '', 'QUOTATION', ''),
(17, 'SGS(J).22Q017', '017', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI KERJA-KERJA UTILITY MAPPING DI LALUAN PEMBENTUNGAN BAGI CADANGAN PEMBANGUNAN 21 UNIT KEDAI PEJABAT 2&3 TINGKAT DI FASA 6E, BANDAR UDA UTAMA, MUKIM PULAI, DAERAH JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', '', '07-237 4944', '', '2022-04-13', 'UTILITY', '2 WEEKS', 'JOHOR BAHRU', '5830.00', '5500.00', 'applied', '', 'QUOTATION', ''),
(18, 'SGS(J).22Q018', '018', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR ADDITIONAL CATEGORY OF LAND USE (RESTORAN PANDU LALU) AT PTD 198073, MUKIM OF TEBRAU, DISTRICT OF JOHOR BAHRU, JOHOR DARUL TAKZIM.\n~ADDITIONAL ATJ REQUIREMENT', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', '', '03-2092 5955', '', '2022-04-05', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'JOHOR BAHRU', '5830.00', '5500.00', 'applied', '', 'QUOTATION', ''),
(19, 'SGS(J).22Q019', '019', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR THE LAND SURRENDER APPLICATION ON PTD 198718, MUKIM PLENTONG, JOHOR BAHRU, JOHOR DARUL TAKZIM.', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'PN NADIAH AZMAN', '012-704 6694', 'nurnadiah.azman@savills.com.my', '2022-04-18', 'PROPERTY & INFRASTRUCTURE', '12 MONTHS', 'JOHOR BAHRU', '66410.06', '62651.00', 'applied', '', 'QUOTATION', ''),
(20, 'SGS(J).22Q020', '020', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR THE CHANGE OF LAND USE APPLICATION FROM ‘TANAMAN KELAPA SAWIT’ TO ‘TANAMAN NANAS’ ON PTD 105774, MUKIM TEBRAU, JOHOR BAHRU, JOHOR DARUL TAKZIM.', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'TBA', 'EN FAZREEN', '011-1090 3248', 'fazreen@kulim.com.my', '2022-04-28', 'PROPERTY & INFRASTRUCTURE', '12 MONTHS', 'JOHOR BAHRU', '10366.80', '9780.00', 'applied', '', 'QUOTATION', ''),
(21, 'SGS(J).22Q021', '021', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UNDERGROUND MAPPING UTILITIES ALONG JALAN KARGO 5, THE PROPOSED SENAI AIRPORT CITY DEVELOPMENT, JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'TBA', 'PN ROZILAH', '016-720 0032', 'bccbright2013@gmail.com', '2022-04-20', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'JOHOR BAHRU', '14310.00', '13500.00', 'applied', '', 'QUOTATION', ''),
(22, 'SGS(J).22Q022', '022', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR GPS SURVEY AT STACKING YARD BLOCKS, QUAYSIDE & OTHERS STRUCTURES AT PTP, GELANG PATAH, JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'TBA', 'EN SUHAIMI', '013-755 7374', 'suhaimi.kamarrudin@ptp.com.my', '2022-04-26', 'PROPERTY & INFRASTRUCTURE', '2 MONTHS', 'JOHOR BAHRU', '4918.40', '4640.00', 'applied', '', 'QUOTATION', ''),
(23, 'SGS(J).22Q023', '023', '2022-02-02', 'Johor', 'Johor', 'CADANGAN SEBUTHARGA BAGI PEMBINAAN TABIKA KEMAS NUR EHSAN TAMAN KLUANG BARU 2, KLUANG JOHOR', 'SAAT', 'GOV', 'EXISTING', 'ENG', 'TBA', 'EN HEERWAN', '03-4051 8617', 'heerwan@jkr.gov.my', '2022-05-02', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'JOHOR BAHRU', '43675.38', '41203.19', 'applied', '', 'QUOTATION', ''),
(24, 'SGS(J).22Q024', '024', '2022-02-02', 'Johor', 'Johor', 'PERKHIDMATAN UKUR KEJURUTERAAN UNTUK PROGRAM RAMALAN DAN AMARAN BANJIR NEGARA DI LEMBANGAN SUNGAI MUAR', 'SAAT', 'GOV', 'EXISTING', 'ENG', 'TBA', 'GS.MOHAMAD HAFIZ BIN HASSAN', '03-4289 5505', 'hafizhassan@water.gov.my', '2022-05-26', 'PROPERTY & INFRASTRUCTURE', '8 MONTHS', 'MUAR', '1886137.92', '1779375.40', 'applied', '', 'TENDER', ''),
(25, 'SGS(J).22Q025', '025', '2022-02-02', 'Johor', 'Johor', 'PERKHIDMATAN UKUR KEJURUTERAAN UNTUK PROGRAM RAMALAN DAN AMARAN BANJIR NEGARA DI LEMBANGAN SUNGAI BATU PAHAT, JOHOR DARUL TAKZIM', 'SAAT', 'GOV', 'EXISTING', 'ENG', 'TBA', 'GS.MOHAMAD HAFIZ BIN HASSAN', '03-4289 5505', 'hafizhassan@water.gov.my', '2022-05-26', 'PROPERTY & INFRASTRUCTURE', '8 MONTHS', 'BATU PAHAT', '1202369.55', '1134310.90', 'applied', '', 'TENDER', ''),
(26, 'SGS(J).22Q026', '026', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR TOPOGRAPHIC AND UUM SURVEY AT DEDICATED AREA ALONG JALAN SEELONG FOR ROAD WIDENING PURPOSES.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', 'MUZIATI HANAFIAH', '07-595 1114', 'muziati.hanafiah@senaiairport.com', '2022-05-11', 'AVIATION', '6 WEEKS', 'SENAI', '79500.00', '75000.00', 'applied', '', 'QUOTATION', ''),
(27, 'SGS(J).22Q027', '027', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI UKURAN DEMARKASI DI ATAS LOT 822, MUKIM SUNGAI TIRAM, DAERAH JOHOR BAHRU, JOHOR DARUL TAKZIM.', 'SAAT', 'PRIVATE', 'NEW', 'TITLE', 'TBA', 'SHAREDA SAILA', '', 'sashasailabruang@gmail.com', '2022-05-25', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'JOHOR', '6890.00', '6500.00', 'applied', '', 'QUOTATION', ''),
(28, 'SGS(J).22Q028', '028', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR SURVEY WORKS AT STP PLOT, PTP, GELANG PATAH, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'TBA', 'FASYA AIRIEN DAYANA ABDUL JAMALI', '07-504 2222', 'fasya.abdjamali@ptp.com.my', '2022-05-27', 'OIL & GAS', '1 MONTH', 'JOHOR', '13250.00', '12500.00', 'applied', '', 'QUOTATION', ''),
(29, 'SGS(J).22Q029', '029', '2022-02-02', 'Johor', 'Johor', 'DESKTOP ADDRESS MAPPING', 'SMS', 'PRIVATE', 'NEW', 'GIS', 'TBA', 'Nur Liyana Ghaffarud-din', '017 596 9713', 'nurliyanag@maxis.com.my', '2022-05-25', 'PROPERTY & INFRASTRUCTURE', '7 MONTHS', 'JOHOR', '144400.00', '136226.42', 'applied', '', 'QUOTATION', ''),
(30, 'SGS(J).22Q030', '030', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT MSM SUGAR REFINERY, TG LANGSAT, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', 'HASLIYANA', '013 - 485 3552', 'hasliyana.fatin@ranhill.com.my', '2022-06-10', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'TG LANGSAT', '9540.00', '9000.00', 'applied', '', 'QUOTATION', ''),
(31, 'SGS(J).22Q031', '031', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT JENERI WATER TREATMENT PLANT (WTP),KEDAH..', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', 'HASLIYANA', '013 - 485 3552', 'hasliyana.fatin@ranhill.com.my', '2022-06-23', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'KEDAH', '9540.00', '9000.00', 'applied', '', 'QUOTATION', ''),
(32, 'SGS(J).22Q032', '032', '2022-02-02', 'Johor', 'Johor', 'PERKHIDMATAN PENGUKURAN TOPOGRAFI\nDAN UTILITY DETECTION MAPPING DI ATAS\n(LOT 145338) HUTAN BANDAR MBIP, TAMAN\nMUTIARA RINI, SKUDAI, JOHOR BAHRU', 'SAAT', 'GOV', 'NEW', 'UUM', 'TBA', ' - ', ' - ', ' - ', '2022-07-17', 'UTILITY', '2 MONTHS', 'JOHOR', '128156.97', '120902.80', 'applied', '', 'QUOTATION', ''),
(33, 'SGS(J).22Q033', '033', '2022-02-02', 'Johor', 'Johor', 'PERKHIDMATAN MELAKSANA DAN MENYIAPKAN PENGUMPULAN DATA INVENTORI POKOK DAN ASET INFRA/PERABOT JALAN BAGI JALAN-JALAN DI KAWASAN MAJLIS BANDARAYA ISKANDAR PUTERI  TAHUN 2022', 'SMS', 'GOV', 'NEW', 'GIS', 'TBA', ' - ', ' - ', ' - ', '2022-07-18', 'PROPERTY & INFRASTRUCTURE', '18 MONTHS', 'JOHOR', '2281120.00', '2152000.00', 'applied', '', 'TENDER', ''),
(34, 'SGS(J).22Q034', '034', '2022-02-02', 'Johor', 'Johor', 'KERJA UKUR HIDROGRAFI UNTUK PROJEK PEMBINAAN DAN PEMBAIKAN BAN PANTAI DI PANTAI PONTIAN (TG BIN - TAMPOK), JOHOR.', 'SAAT', 'GOV', 'EXISTING', 'HYDRO', 'TBA', 'ADRIAN JOHN NGAU', '03-8893 5273', 'adrian@water.gov.my', '2022-08-01', 'PROPERTY & INFRASTRUCTURE', '3 MONTHS', 'PONTIAN', '861432.91', '812672.56', 'applied', '', 'TENDER', ''),
(35, 'SGS(J).22Q035', '035', '2022-02-02', 'Johor', 'Johor', 'KERJA UKUR HIDROGRAFI UNTUK PROJEK PEMBINAAN DAN PEMBAIKAN BAN PANTAI DI PANTAI SKIM TAMPOK, PANTAI SKIM RENGIT, PANTAI SKIM MINYAK BEKU, PANTAI SKIM PESERAI DAN PANTAI SKIM SENGGARANG DI BATU PAHAT, JOHOR.', 'SAAT', 'GOV', 'EXISTING', 'HYDRO', 'TBA', 'ADRIAN JOHN NGAU', '03-8893 5273', 'adrian@water.gov.my', '2022-08-01', 'PROPERTY & INFRASTRUCTURE', '5 MONTHS', 'SENGGARANG', '1455533.17', '1373144.50', 'applied', '', 'TENDER', ''),
(36, 'SGS(J).22Q036', '036', '2022-02-02', 'Johor', 'Johor', 'MAXIS SECOND BATCH (NEGERI SEMBILAN)', 'SMS', 'PRIVATE', 'NEW', 'GIS', 'TBA', 'NURFARINA BINTI JEFRI ', '011-1901 1100', 'TNURFARI@maxis.com.my', '2022-08-01', 'PROPERTY & INFRASTRUCTURE', '1 MONTHS', 'JOHOR', '11626.08', '10968.00', 'applied', '', 'QUOTATION', ''),
(37, 'SGS(J).22Q037', '037', '2022-02-02', 'Johor', 'Johor', 'DEMARCATION SURVEY ON PART OF LOT 3771, LABIS BAHRU ESTATE, MUKIM OF PAGOH, DISTRICT OF SEGAMAT, JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'TBA', 'SAIFUL AZIZI AHMAD', '013-772 6069', 'saiful@kulim.com.my', '2022-08-04', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'SEGAMAT', '8533.00', '8050.00', 'applied', '', 'QUOTATION', ''),
(38, 'SGS(J).22Q038', '038', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA UNTUK PERKHIDMATAN PENGUKURAN TOPOGRAFI BAGI PERMOHONAN PINDAAN KEBENARAN MERANCANG TERHADAP PLOT STP SEDIADA YANG BERKELUASAN 10.221 EKAR DI DALAM PELABUHAN TANJUNG PELEPAS, GELANG PATAH, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'NUR FAIZAL ABDULLAH', '07-238 5828', 'faizalplan@yahoo.com', '2022-08-04', 'PROPERTY & INFRASTRUCTURE', '12 MONTHS', 'JOHOR', '49348.94', '46555.60', 'applied', '', 'QUOTATION', ''),
(39, 'SGS(J).22Q039', '039', '2022-02-02', 'Johor', 'Johor', 'LAND SURVEYOR CONSULTANCY SERVICES\nRESIDENTIAL DEVELOPMENT ON LOT 250 & 249 (13.553 ACRES), GELANG PATAH, MUKIM PULAI, JOHOR BAHRU', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'FUZIAH ISMAIL', '07-2333 888', 'fuziah@iskandarwaterfront.com', '2022-08-09', 'PROPERTY & INFRASTRUCTURE', '12 MONTHS', 'JOHOR', '303234.73', '286070.50', 'applied', '', 'QUOTATION', ''),
(40, 'SGS(J).22Q040', '040', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI MELAKSANAKAN PERKHIDMATAN PENYEDIAAN PELAN HAKMILIK\nSEMENTARA (B2), PLOT-PLOT PERTANIAN (8 LOT TAMBAHAN) DI PROJEK FELCRA BERHAD\nTEBING TINGGI 6, DAERAH SEGAMAT, JOHOR DARUL TAKZIM.', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'KHAIRU IZWAN BIN ABDUL KAHAR', '03 - 4145 5412', 'temp.izwan@felcra.com.my ', '2022-08-21', 'PROPERTY & INFRASTRUCTURE', '6 MONTHS', 'SEGAMAT', '6935.58', '6543.00', 'applied', '', 'QUOTATION', ''),
(41, 'SGS(J).22Q041', '041', '2022-02-02', 'Johor', 'Johor', 'CADANAGAN SEBUTHARGA BAGI CADANGAN KHIDMAT PERUNDING JURUKUR TANAH UNTUK PERMOHONAN KEBENARAN MERANCANG PINDAAN (KM) BAGI PEMBANGUNAN TAMAN PERINDUSTRIAN KULAI (STEP I), DI ATAS PTD 32674, PTD 32651, PTD 32648, PTD 32645, PTD 32644, PTD 32643, PTD 32640 D', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'TBA', 'SAYANI BT RAMELAN', '07-222 6922', 'sayani@tpmtechnopark.com.my', '2022-09-13', 'PROPERTY & INFRASTRUCTURE', '2 MONTHS', 'SEDENAK', '190800.00', '180000.00', 'applied', '', 'QUOTATION', ''),
(42, 'SGS(J).22Q042', '042', '2022-02-02', 'Johor', 'Johor', 'RFP FOR APPLICATION OF LEASE EXTENSION TO 60 YEARS FOR TLO 1096 & TLO 801, JALAN LANGKASUKA, LARKIN INDUSTRIAL ESTATE, 80350, JOHOR BHARU, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'TITLE', 'TBA', 'NABILA AMIRA TUN MOHD KHAIRI', '07-353 6136', 'nabilamira@glenmarieproperties.com', '2022-09-20', 'PROPERTY & INFRASTRUCTURE', '2 YEARS', 'JOHOR', '10600.00', '10000.00', 'applied', '', 'QUOTATION', ''),
(43, 'SGS(J).22Q043', '043', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR SURVEY WORKS AT PLOT D39A & D39B, PTP, GELANG PATAH, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'TBA', 'FASYA AIRIEN DAYANA ABDUL JAMALI', '07-504 2222', 'fasya.abdjamali@ptp.com.my', '2022-09-26', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'GELANG PATAH', '13449.92', '12688.60', 'applied', '', 'QUOTATION', ''),
(44, 'SGS(J).22Q044', '044', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PPU STULANG, JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'TBA', 'NORNEKMAN BIN WAGIMAN', '017-7529840', 'nekman.ibse@gmail.com', '2022-09-22', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'STULANG', '10600.00', '10000.00', 'applied', '', 'QUOTATION', ''),
(45, 'SGS(J).22Q045', '045', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA BAGI MELAKSANAKAN PERKHIDMATAN UKURAN HAKMILIK PLOT-PLOT PERTANIAN FELCRA HOLDING (8 LOT TAMBAHAN) DI PROJEK FELCRA BERHAD\nTEBING TINGGI 6, DAERAH SEGAMAT, JOHOR DARUL TAKZIM.', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'KHAIRU IZWAN BIN ABDUL KAHAR', '03 - 4145 5412', 'temp.izwan@felcra.com.my ', '2022-09-22', 'PROPERTY & INFRASTRUCTURE', '6 MONTHS', 'SEGAMAT', '34146.84', '32214.00', 'applied', '', 'QUOTATION', ''),
(46, 'SGS(J).22Q046', '046', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA PENYEDIAAN PELAN LOKASI UNTUK PERMOHONAN  LEMBAGA PENGURUSAN LADANG (ELB) BAGI KERJA PROSES PECAH SEMPADAN (SECARA SBKS) DI ATAS SEBAHAGIAN PTD 105775, HS(D) 354255 & PTD 105763, HS(D) 354243 MUKIM TEBRAU, DAERAH JOHOR BAHRU, JOHOR', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'NURUL ZIRIAH BT MOHD ZAMRY', '019-372 3316', 'nurulziriah@kulim.com.my', '2022-09-26', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'TEBRAU', '7420.00', '7000.00', 'applied', '', 'QUOTATION', ''),
(47, 'SGS(J).22Q047', '047', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR TOPOGRAPHICAL SURVEY (STRIP SURVEY) WORKS TO SUPPORT CIVIL & STRUCTURE CONSULTANT DESIGN FOR MANHOLES INSTALLATION IN JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'PN HIDAYAH', '016-293 1399', '	hidayahh1308@gmail.com', '2022-09-28', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'AYER BALOI', '37100.00', '35000.00', 'applied', '', 'QUOTATION', ''),
(48, 'SGS(J).22Q048', '048', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA CADANGAN PEMBANGUNAN PANGSAPURI KOS SEDERHANA, BLOK A, PAKEJ 2, PUSAT BANDAR TAMPOI, JOHOR BAHRU, JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'TBA', 'A. KARIM BIN SUPOK', '07-237 4944', 'NA', '2022-10-04', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'BANDAR BARU UDA', '24910.00', '23500.00', 'applied', '', 'QUOTATION', ''),
(49, 'SGS(J).22Q049', '049', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR SURVEY WORK FOR PTIS LAND AND PTIS PARTIAL LAND SURRENDER, PTP, GELANG PATAH, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'TBA', 'FASYA AIRIEN DAYANA ABDUL JAMALI', '07-504 2222', 'fasya.abdjamali@ptp.com.my', '2022-10-05', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'GELANG PATAH', '14001.96', '13209.40', 'applied', '', 'QUOTATION', ''),
(50, 'SGS(J).22Q050', '050', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR TOPOGRAPHICAL SURVEY, DEMARCATION SURVEY & UNDERGROUND UTILITIES MAPPING (UUM) SURVEY WORKS AT LOT 50, MUKIM PANTAI TIMUR, PENGERANG, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'LOGA', '03-5882 8967', 'nexusec@gmail.com', '2022-10-26', 'PROPERTY & INFRASTRUCTURE', '3 MONTHS', 'PENGERANG', '583000.00', '550000.00', 'applied', '', 'QUOTATION', ''),
(51, 'SGS(J).22Q051', '051', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR PROPOSED SERVICED APARTMENT AND RETAILS ON PTD 242431 AT TROPICANA DANGA COVE (TDC), TAMAN CAHAYA KOTA PUTERI, MUKIM PLENTONG, DAERAH JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'TITLE', 'TBA', 'MOHD HAZWAN BIN MUSTAPA', '017-2659095', 'hazwan.m@tropicanacorp.com.my', '2022-11-07', 'PROPERTY & INFRASTRUCTURE', '2 YEARS', 'JOHOR BAHRU', '1791796.50', '1690374.06', 'applied', '', 'QUOTATION', ''),
(52, 'SGS(J).22Q052', '052', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR DEMARCATION SURVEY ON PART OF PTD 15678 (PREVIOUSLY PTD 1354 LOT 1990), MUKIM OF BULOH KASAP, DISTRICT OF SEGAMAT, STATE OF JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'TBA', 'SAIFUL AZIZI AHMAD', '013-772 6069', 'saiful@kulim.com.my', '2022-11-17', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'SEGAMAT', '9010.00', '8500.00', 'applied', '', 'QUOTATION', ''),
(53, 'SGS(J).22Q053', '053', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF PASIR GUDANG HIGHWAY, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'TBA', 'LAXE YONG', '65 8128 0198', 'laxe.yong@lendlease.com', '2022-11-24', 'PROPERTY & INFRASTRUCTURE', '6 WEEKS', 'JOHOR', '270300.00', '255000.00', 'applied', '', 'QUOTATION', ''),
(54, 'SGS(J).22Q054', '054', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF JALAN PERSIARAN SEBANA UTAMA, PENGERANG, KOTA TINGGI, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'TBA', 'EN LUQMAN', '017-779 2926', 'luqman@astaka.com.my', '2022-11-24', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'PENGERANG', '12720.00', '12000.00', 'applied', '', 'QUOTATION', ''),
(55, 'SGS(J).22Q055', '055', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR INDEPENDENT SURVEY WORKS FOR BATHYMETRIC SURVEY AT PELABUHAN TANJUNG PELEPAS.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'TBA', 'EN SUHAIMI', '013-755 7374', 'suhaimi.kamarrudin@ptp.com.my', '2022-12-01', 'OIL & GAS', '3 MONTHS', 'GELANG PATAH', '894322.00', '843700.00', 'applied', '', 'QUOTATION', ''),
(56, 'SGS(J).22Q056', '056', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF ROAD IN TAMAN SENTOSA, TAMAN SRI TEBRAU & TAMAN ABAD.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'MR LIM', '019-772 9692', 'limtft@gmail.com', '2022-12-14', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'JOHOR', '18020.00', '17000.00', 'applied', '', 'QUOTATION', ''),
(57, 'SGS(J).22Q057', '057', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR TBM & CONTROL POINT ESTABLISHMENT AT ATB, TANJUNG BIN, PONTIAN, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'TBA', 'MR ER', '012-758 3271', 'tsaurjzi.er@tecc.com.my', '2022-12-19', 'OIL & GAS', '1 WEEK', 'TANJUNG BIN', '7950.00', '7500.00', 'applied', '', 'QUOTATION', ''),
(58, 'SGS(J).22Q058', '058', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF JALAN DATO SULAIMAN, JALAN BALAU & JALAN CENGAI, JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'TBA', 'EN HOOD AHMAD', '014-393 0075', 'hoodahmad@infracity.com.my', '2022-12-22', 'PROPERTY & INFRASTRUCTURE', '1.5 MONTHS', 'JOHOR', '79500.00', '75000.00', 'applied', '', 'QUOTATION', ''),
(59, 'SGS(J).22Q059', '059', '2022-02-02', 'Johor', 'Johor', 'SEBUTHARGA UKURAN HAKMILIK DI PERINDUSTRIAN SEDENAK', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'TBA', 'PN SAYANI', '017-767 5166', 'sayani@tpmtechnopark.com.my', '2022-12-22', 'PROPERTY & INFRASTRUCTURE', '1 YEAR', 'SEDENAK', '1976049.24', '1864197.40', 'applied', '', 'QUOTATION', ''),
(60, 'SGS(J).22Q060', '060', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR SIDE SCAN SONAR SURVEY AT MMHE SHIPYARD, PASIR GUDANG, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'HYDRO', 'TBA', 'EN NAZMI', '016-333 8144', 'nazmi@unidive.com.my\n', '2022-12-22', 'OIL & GAS', '2 WEEKS', 'PASIR GUDANG', '48018.00', '45300.00', 'applied', '', 'QUOTATION', ''),
(61, 'SGS(J).22Q061', '061', '2022-02-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT ATB, TANJUNG BIN, PONTIAN, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'TBA', 'MR KHEK SOON HUAT', '65 9832 9608', 'sh.khek@rotaryeng.com.sg\n', '2022-12-29', 'OIL & GAS', '1.5 MONTHS', 'TANJUNG BIN', '58300.00', '55000.00', 'applied', '', 'QUOTATION', ''),
(62, 'SGS(J).23Q001', '001', '2023-01-11', 'Johor', 'Johor', 'RFP FOR LAND SURVEYING CONSULTANCY SERVICES FOR STRATA AND SIFUS APPLICATION WORKS FOR PROPOSED MIXED DEVELOPMENT ON PRECINCT 1B: (12.53 ACRES), ON PART OF LOT 210552 (KEM MAJIDEE), MUKIM OF PLENTONG, DISTRICT OF JOHOR BAHRU, JOHOR', 'SAAT', 'PRIVATE', 'EXISTING', 'STRATA', 'SOUTHKEY CITY SDN BHD', 'AZLIN FARHANA RAMLI', '07-3357373 (210)', 'azlin@southkey.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'BAKAR BATU', '4302682.00', '4044521.08', 'rejected', 'FAILED', 'QUOTATION', ''),
(63, 'SGS(J).23Q002', '002', '2023-01-08', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT KNITTING FGH, RAMATEX TEXTILES INDUSTRIAL SDN BHD, JALAN KLUANG, BATU PAHAT, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'SAMAIDEN', 'ASYURAH AZMAN', '03-6150 7941', 'asyurah.azman@samaiden.com.my', '2023-01-08', 'PROPERTY & INFRASTRUCTURE', '2 Year', 'BATU PAHAT', '12190.00', '11458.6', 'applied', '', 'QUOTATION', ''),
(64, 'SGS(J).23Q003', '003', '2023-01-12', 'Johor', 'Johor', 'SEBUTHARGA UKURAN HAKMILIK DI PERINDUSTRIAN SEDENAK (PECAH SEMPADAN & LANJUTAN TEMPOH PAJAKAN)', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'TPM TECHNOPARK SDN BHD', 'PN SAYANI', '017-767 5166', 'sayani@tpmtechnopark.com.my', '2023-01-12', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'SEDENAK', '642616.52', '604059.53', 'applied', '', 'QUOTATION', ''),
(65, 'SGS(J).23Q004', '004', '2023-01-12', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF JALAN DATO SULAIMAN, JALAN BALAU & JALAN CENGAI, JOHOR BAHRU, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'SAFWA GLOBAL VENTURE SDN BHD', 'EN SYAHIRIN', '012-764 0008', '', '2023-01-12', 'PROPERTY & INFRASTRUCTURE', '1.5 Month', 'JOHOR BAHRU', '79761.29', '74975.61', 'rejected', 'FAILED', 'QUOTATION', ''),
(66, 'SGS(J).23Q005', '005', '2023-02-20', 'Johor', 'Johor', 'RFQ FOR TOPOGRAPHC SURVEY AT PTD 112724 & PTD112725, MUKIM SENAI, JOHOR BAHRU, JOHOR DARUL TAKZIM', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'LAGENDA MERSING SDN BHD', 'FAZLINA', '017-761 5105', 'agile.kulai1076@gmail.com', '2023-02-20', 'PROPERTY & INFRASTRUCTURE', '3 Month', 'KULAI', '227900.00', '214226', 'applied', '', 'QUOTATION', ''),
(67, 'SGS(J).23Q006', '006', '2023-02-03', 'Johor', 'Johor', 'RFQ FOR DETAIL AND TOPO SURVEY ON LOT PTD 208571 (PRECINT 4), MUKIM PLENTONG, JOHOR BAHRU, JOHOR', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'SOUTHKEY CITY SDN BHD', 'AZLIN FARHANA RAMLI', '07-3357373 (210)', 'azlin@southkey.com.my', '2023-02-03', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'BAKAR BATU', '9010.00', '8469.4', 'applied', '', 'QUOTATION', ''),
(68, 'SGS(J).23Q007', '007', '2023-02-14', 'Johor', 'Johor', 'TITLE SURVEY (SUBDIVISION) OF LOT 403, MUKIM TANJUNG KUPANG, JOHOR BAHRU, JOHOR.', 'SAAT', 'Private', 'New', 'TITLE', 'PULANGAN NAGA SDN BHD', 'SERENA TONG CHAI NYEOK', '019-770 7938', 'jadecommercial@outlook.com', '2023-02-14', 'PROPERTY & INFRASTRUCTURE', '12 Month', 'TANJUNG KUPANG', '19186.00', '18034.84', 'approved', 'AWARDED', 'QUOTATION', ''),
(69, 'SGS(J).23Q008', '008', '2023-02-22', 'Johor', 'Johor', 'APPOINTMENT OF LAND SURVEYOR TO PREPARE DETAIL SURVEY PLAN OF EXISTING MAIN SDE EXPRESSWAY, SENAI, JOHOR DARUL TAKZIM.', 'SAAT', 'Private', 'Existing', 'ENG', 'NERACA PRISMA SDN BHD', 'ARIFF HILMI', '016-350 4641', 'ariff.hilmi@glenmarieproperties.com', '2023-02-22', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'SDE EXPRESSWAY', '13250.00', '12455', 'approved', 'AWARDED', 'QUOTATION', ''),
(70, 'SGS(J).23Q009', '009', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR THE SURVEY WORK ON PART OF HSD 58551 PTD 19086 MUKIM OF TANJUNG SEMBRONG, DISTRICT OF BATU PAHAT STATE OF JOHOR, KNOWN AS ASAM BUBUK ESTATE', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'MAHAMURNI PROPERTIES SDN BHD', 'SAIFUL AZIZI', '013-772 6069', 'saiful@kulim.com.my', '2023-06-11', 'PLANTATION', '1 WEEK', 'KAMPUNG BENANGONG', '4764.97', '4495.25', 'applied', '', 'QUOTATION', ''),
(71, 'SGS(J).23Q010', '010', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UNDERGROUND UTILITY MAPPING SURVEY AT RTS LINK PROJECT, JOHOR BAHRU.', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'AECOM PERUNDING SDN BHD', 'AFENDI ARIFF', '012-624 0414', 'Afendi.Ariff@aecom.com', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1.5 MONTHS', 'JOHOR BAHRU', '0', '0', 'applied', '', 'QUOTATION', ''),
(72, 'SGS(J).23Q011', '011', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR THE PROPOSED OF COMMERCIAL DEVELOPMENT AT PTD 192051, JALAN BAYU PUTERI 1/1 & 2, MUKIM PLENTONG, DAERAH JOHOR BAHRU, JOHOR DARUL TAKZIM (16.43 ACRES).', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'ISKANDAR WATERFRONT', 'FARHANA', '07-2333 888', 'farhana@iskandarwaterfront.com', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'BAKAR BATU', '48230.00', '45500.00', 'applied', '', 'QUOTATION', ''),
(73, 'SGS(J).23Q012', '012', '2023-01-02', 'Johor', 'Johor', 'CAMELLIA PROJECT - PROVISION OF SITE INVESTIGATION WORKS FOR LIQUEFIED NATURAL GAS (LNG) DRIVEN AIR SEPARATION UNIT (ASU) FOR PETRONAS GAS BERHAD', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'PETRONAS GAS BERHAD', 'GEP', 'GEP', 'GEP', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '8 WEEKS', 'PENGERANG', '398708.93', '376140.50', 'applied', '', 'TENDER', ''),
(74, 'SGS(J).23Q013', '013', '2023-01-02', 'Johor', 'Johor', 'PELAWAAN MENYERTAI TAWARAN SEBUTHARGA UNTUK MELAKSANAKAN KERJA PERKHIDMATAN UKURAN KELILING DI PROJEK FELCRA BERHAD ROA TANAH ABANG (T/S), MUKIM PADANG ENDAU, DAERAH SEGAMAT, JOHOR DARUL TAKZIM', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'FELCRA BERHAD', 'KHAIRUL IZWAN', '017 - 6208792', 'temp.izwan@felcra.com.my', '2023-03-28', 'PROPERTY & INFRASTRUCTURE', '2 MONTHS', 'ENDAU', '103171.24', '97331.36', 'applied', '', 'QUOTATION', ''),
(75, 'SGS(J).23Q014', '014', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF JALAN PERSIARAN KIARA & PERSIARAN DAMAI, PASIR GUDANG, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'EXCELGENIC SDN BHD', 'MR TAN', '016-9500879', 'excelgenic.jb@gmail.com', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '3 WEEKS', 'PASIR GUDANG', '17490.00', '16500.00', 'applied', '', 'QUOTATION', ''),
(76, 'SGS(J).23Q015', '015', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF KEMPAS PLUS HIGHWAY, TEBRAU, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'CASTLAB SDN BHD', 'EN YUSOF', '013-760 4578', 'm.yusof@castlab.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'TEBRAU', '15900.00', '15000.00', 'applied', '', 'QUOTATION', ''),
(77, 'SGS(J).23Q016', '016', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR DEMARCATION SURVEY AT D37B & WATER TANK, PELABUHAN TANJUNG PELEPAS, GELANG PATAH, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'PELABUHAN TANJUNG PELEPAS', 'FASYA AIRIEN', '07-504 2222', 'fasya.abdjamali@ptp.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '3 WEEKS', 'PTP', '8505.44', '8024.00', 'applied', '', 'QUOTATION', ''),
(78, 'SGS(J).23Q017', '017', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PART OF TANGKAK PLUS HIGHWAY, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'SLP CONSTRUCTION SDN BHD', 'MUHAMMAD FIRDAUS KAMARUDIN', 'NA', 'muhammadfirdauskamarudin7@gmail.com', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'TANGKAK', '15900.00', '15000.00', 'applied', '', 'QUOTATION', ''),
(79, 'SGS(J).23Q018', '018', '2023-01-02', 'Johor', 'Johor', 'RFQ OF TOPOGRAPHIC AND DEMARCATION SURVEY FOR PROPOSED DESARU PROJECT (73.95 ACRES) ON PTD 2613, PTD 2606, PTD 2607, PTD 2608, PTD 2609, PTD 2611, PTD 2612, PTD 2614, PTD 2615 AND PTD 2616, MUKIM KOTA TINGGI, JOHOR DARUL TAKZIM', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'ISKANDAR WATERFRONT', 'FARHANA', '07-2333 888', 'farhana@iskandarwaterfront.com', '2023-03-27', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'DESARU', '42400.00', '40000.00', 'applied', '', 'QUOTATION', ''),
(80, 'SGS(J).23Q019', '019', '2023-04-13', 'Johor', 'Johor', 'UNDERGROUND UTILITY MAPPING SURVEY AT RAPID PENGERANG, KOTA TINGGI, JOHOR.', 'SAAT', 'Private', 'New', 'UUM', 'LINGKARAN EFEKTIF SDN BHD', 'MUHAMMAD HAFIFI', '011‐39535311', 'hafifi@lingkaranefektif.com', '2023-04-13', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'PENGERANG', '44520.00', '41848.8', 'approved', 'AWARDED', 'QUOTATION', ''),
(81, 'SGS(J).23Q020', '020', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT DESALINATION PLANT, FOREST CITY, JOHOR.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'RANHILL WATER TECHNOLOGIES SDN BHD', 'HASLIYANA FATIN', '013 - 4853 552', 'hasliyana.fatin@ranhill.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'FOREST CITY', '5830.00', '5500.00', 'applied', '', 'QUOTATION', ''),
(82, 'SGS(J).23Q021', '021', '2023-01-02', 'Johor', 'Johor', 'RFP FOR APPLICATION OF LEASE EXTENSION TO 60 YEARS FOR TLO 1096 & TLO 801, JALAN LANGKASUKA, LARKIN INDUSTRIAL ESTATE, 80350, JOHOR BAHRU, JOHOR', 'SAAT', 'GLC', 'EXISTING', 'TITLE', 'HICOM HARTANAH SDN BHD', 'ARIFF HILMI', '016-350 4641', 'ariff.hilmi@glenmarieproperties.com', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 MONTH', 'LARKIN', '5830.00', '5500.00', 'applied', '', 'QUOTATION', ''),
(83, 'SGS(J).23Q022', '022', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR THE SURVEY WORK ON PART OF PART OF GERAN 237351 LOT 972 MUKIM OF SEDENAK, DISTRICT OF KULAI, STATE OF JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'KULIM (M) BERHAD', 'SAIFUL AZIZI', '013-772 6069', 'saiful@kulim.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'SEDENAK', '4770.00', '4500.00', 'applied', '', 'QUOTATION', ''),
(84, 'SGS(J).23Q023', '023', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR THE SURVEY WORK ON PART OF PART OF HS(D) 13179 LOT 356 MUKIM OF TANJUNG SURAT, DISTRICT OF KOTA TINGGI, STATE OF JOHOR, KNOWN AS SG. PAPAN ESTATE.', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'KULIM (M) BERHAD', 'SAIFUL AZIZI', '013-772 6069', 'saiful@kulim.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'SG PAPAN', '7950.00', '7500.00', 'applied', '', 'QUOTATION', ''),
(85, 'SGS(J).23Q024', '024', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT PMU 132/33/11kV YONG PENG (YGPG), JOHOR.', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD', 'EN HAIKAL YONG SYAFIQ', '', '', '2023-06-11', 'POWER', '1 WEEK', 'PMU YONG PENG', '12311.90', '11615.00', 'applied', '', 'QUOTATION', ''),
(86, 'SGS(J).23Q025', '025', '2023-01-02', 'Johor', 'Johor', 'PEROLEHAN PERKHIDMATAN PENGEMASKINIAN, VERIFIKASI DAN PEMBANGUNAN DATA GEOSPATIAL NEGERI PERLIS, KEDAH DAN PERAK UNTUK PUSAT GEOSPATIAL NEGARA (PGN), KEMENTERIAN SUMBER ASLI, ALAM SEKITAR DAN PERUBAHAN IKLIM (NRECC)', 'SMS', 'GOV', 'NEW', 'GIS', 'MACGDI', 'EPEROLEHAN', 'EPEROLEHAN', 'EPEROLEHAN', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '20 MONTHS', 'PERLIS, KEDAH & PERAK', '498647.85', '470422.50', 'applied', '', 'QUOTATION', ''),
(87, 'SGS(J).23Q026', '026', '2023-01-02', 'Johor', 'Johor', 'REQUEST FOR QUOTATION FOR THE APPOINTMENT OF LAND SURVEYOR CONSULTANT FOR MASTER PLAN, \nMASTER LAYOUT PLAN & PLANNING PERMISSION APPLICATION (KM) AT BANDAR TIRAM, JOHOR BAHRU, JOHOR', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'JLAND GROUP SDN BHD', 'NADIAH ZAINUDIN', '019-750 1907', 'nadiah.zainudin@jlandgroup.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '8 WEEKS', 'BANDAR TIRAM', '116600.00', '110000.00', 'applied', '', 'QUOTATION', ''),
(88, 'SGS(J).23Q027', '027', '2023-05-25', 'Johor', 'Johor', 'CADANGAN UKUR TOPOGRAFI, DEMARKASI & PEMETAAN UTILITI BAWAH TANAH BAGI DAIF JOHOR (2023) - PEMBINAAN SEMULA BANGUNAN DAIF DI SEKOLAH KEBANGSAAN KAMPONG MELAYU, KLUANG, JOHOR (JBA2019)', 'SAAT', 'Gov', 'Existing', 'ENG', 'JABATAN KERJA RAYA', 'AZMI BIN ABD AZIZ', '016-2177601', 'azmiaziz@jkr.gov.my', '2023-05-25', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'KLUANG', '103613.47', '97396.66', 'approved', 'AWARDED', 'QUOTATION', ''),
(89, 'SGS(J).23Q028', '028', '2023-05-12', 'Johor', 'Johor', 'SURVEY WORKS AT PLOT D39A. PLOT D39B & PLOT D38C, PELABUHAN TANJUNG PELEPAS, GELANG PATAH, JOHOR.', 'SAAT', 'GLC', 'Existing', 'ENG', 'PELABUHAN TANJUNG PELEPAS', 'SITI NOR SYAHIDA ISMAIL', '011-12947248', 'sitinorsyahida.ismail@ptp.com.my', '2023-05-12', 'PROPERTY & INFRASTRUCTURE', '2 Month', 'PELABUHAN TANJUNG PELEPAS', '20016.40', '18815.42', 'approved', 'AWARDED', 'QUOTATION', ''),
(90, 'SGS(J).23Q029', '029', '2023-01-02', 'Johor', 'Johor', 'RFQ FOR PROVISION OF LAND SURVEYING FOR GAS MALAYSIA VIRTUAL PIPELINE SDN BHD', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'GAS MALAYSIA', 'MOHD NAHAR OMAR', '', '', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '3 WEEKS', 'KLUANG', '26000.00', '24528.30', 'applied', '', 'QUOTATION', ''),
(91, 'SGS(J).23Q030', '030', '2023-01-02', 'Johor', 'Johor', 'RFQ OF UUM SURVEY WORK FOR GUARDRAIL INSTALLATION AT SUNGAI PULAI BRIDGE PROJECT, JOHOR DARUL TAKZIM.', 'SAAT', 'PRIVATE', 'EXISTING', 'UUM', 'CHINA COMMUNICATIONS CONSTRCUTION COMPANY', 'RUTH LEONG', '016-792 8149', 'ruthleong97@gmail.com', '2023-05-31', 'PROPERTY & INFRASTRUCTURE', '2 WEEKS', 'SG PULAI BRIDGE', '20670.00', '19500.00', 'rejected', 'CANCELED', 'QUOTATION', ''),
(92, 'SGS(J).23Q031', '031', '2023-01-02', 'Johor', 'Johor', 'MDU SURVEY INSIDE & OUTSIDE KLANG VALLEY AREA', 'SMS', 'PRIVATE', 'EXISTING', 'GIS', 'MAXIS', '', '', '', '2023-05-31', '', '', '', '21000.00', '19811.32', 'applied', '', 'QUOTATION', ''),
(93, 'SGS(J).23Q032', '032', '2023-01-02', 'Johor', 'Johor', 'INVITATION FOR QUOTATION OF DEMARCATION SURVEY & PREPARATION OF PU PLAN AT TAMAN PASIR PUTIH (PSG047), MUKIM PLENTONG, DAERAH JOHOR BAHRU, JOHOR', 'SAAT', 'PRIVATE', 'EXISTING', 'ENG', 'INDAH WATER KONSORTIUM', 'IRMAYANTY BINTI ISMAIL', '03-27801444', 'irmayantyis@iwk.com.my', '2023-06-11', 'PROPERTY & INFRASTRUCTURE', '1 WEEK', 'TAMAN PASIR PUTIH', '6890.00', '6500.00', 'applied', '', 'QUOTATION', ''),
(99, 'SGS.24Q001', '001', '2023-07-31', 'HQ', 'Kuala Lumpur', 'Google Streetview Data Collection', 'ZNB', 'PRIVATE', 'NEW', 'GIS', 'Google', 'Songran', '6212341234', 'songran@google.com', '2023-06-26', 'PROPERTY & INFRASTRUCTURE', '12 Month', 'All over Malaysia', '2000000', '2000000', 'approved', 'Test', 'QUOTATION', ''),
(102, 'SGS(C).23Q001', '001', '2023-01-03', 'Pahang', 'Pahang', 'Kerja Ukuran Topografi & Pecah Sempadan untuk Cadangan Pembangunan di atas Lot 10550 & 10551, Mk Pulau Tawar, Daerah Jerantut, Pahang', 'NNJ', 'Private', 'New', 'TITLE', 'En Saiful bin Sarifuddin', 'En Saiful bin Sarifuddin', '0192772268', '', '2023-01-06', 'PROPERTY & INFRASTRUCTURE', '730 Day', 'Pulau Tawar, Jerantut', '27374.88', '27374.88', 'applied', '', 'QUOTATION', ''),
(103, 'SGS(C).23Q002', '002', '2023-01-12', 'Pahang', 'Pahang', 'Kerja Ukur Penandaan Sempadan bagi Permohonan LPS Memperbaharui Tanaman Kontan di Genting Sempah, Mk Bentong, Daerah Bentong, Pahang (Plot A)', 'NNJ', 'PRIVATE', 'NEW', 'ENG', 'En Ho San Cheh', 'En Ho San Cheh', '0126115768', '', '2023-01-18', 'PROPERTY & INFRASTRUCTURE', '14 Day', 'Genting Sempah, Bentong', '9540', '8967.6', 'applied', '', 'QUOTATION', ''),
(104, 'SGS(C).23Q003', '003', '2023-01-17', 'Pahang', 'Pahang', 'Kerja Ukur Penandaan Sempadan bagi Permohonan LPS Memperbaharui Tanaman Kontan di Genting Sempah, Mk Bentong, Daerah Bentong, Pahang (Plot B)', 'NNJ', 'Private', 'New', 'ENG', 'En Ho San Cheh', 'En Ho San Cheh', '0126115768', '', '2023-01-24', 'PROPERTY & INFRASTRUCTURE', '14 Day', 'Genting Sempah, Bentong', '9222', '8700', 'applied', '', 'QUOTATION', ''),
(105, 'SGS(C).23Q004', '004', '2023-01-18', 'Pahang', 'Pahang', 'Kerja Ukuran Topografi dan Hakmilik bagi Lot 26253, Mk Pulau Tawar, Daerah Jerantut, Pahang', 'NNJ', 'Private', 'New', 'TITLE', 'Goodwood Industries Sdn Bhd', 'En Shazwan', '0145487790', '', '2023-01-24', 'PROPERTY & INFRASTRUCTURE', '720 Day', 'Pulau Tawar, Jerantut', '22983.60', '21682.64', 'applied', '', 'QUOTATION', ''),
(106, 'SGS(J).23Q033', '033', '2023-06-15', 'Johor', 'Johor', 'RFQ FOR JOHOR ROAD STATE MAINTENANCE', 'SAAT', 'Private', 'New', 'ENG', 'PAKATAN UKUR BAHAN SDN BHD', 'KHATIJAH', '07-556 6864', 'akmajannah7372@gmail.com', '2023-06-15', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'JOHOR', '9460.39', '8924.9', 'applied', '', 'QUOTATION', ''),
(107, 'SGS(J).23Q034', '034', '2023-06-15', 'Johor', 'Johor', 'RFQ FOR UUM SURVEY AT CALTEX KULAI (OPPOSITE IOI MALL), KULAI, JOHOR.', 'SAAT', 'Private', 'New', 'UUM', 'OCTAGON SDN BHD', 'LILI', '03-8741 4929', 'project6@octagonmaju.com.my', '2023-06-15', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'KULAI', '6890.00', '6500', 'applied', '', 'QUOTATION', ''),
(108, 'SGS(J).23Q035', '035', '2023-06-19', 'Johor', 'Johor', 'RFQ OF UUM SURVEY FOR PROPOSED RENOVATION WORKS OF EXISTING 2-STOREY CLUB HOUSE AT PTD 86859 & 59409,\r\nMUKIM PULAI DAERAH JOHOR BAHRU, JOHOR.', 'SAAT', 'Private', 'New', 'UUM', 'WM SENIBONG SDN BHD', 'WOON LEONG', '03-382 0388', 'cmleong@wmsenibong.com.my', '2023-06-19', 'PROPERTY & INFRASTRUCTURE', '3 Year', 'GELANG PATAH', '30210.00', '28500', 'applied', '', 'QUOTATION', ''),
(109, 'SGS(J).23Q036', '036', '2023-06-28', 'Johor', 'Johor', 'SEBUTHARGA BAGI KERJA UKURAN HAKMILIK PECAH BAHAGIAN LOT 1142, MUKIM AYER BALOI, PONTIAN, JOHOR DARUL TAKZIM.', 'SAAT', 'Private', 'New', 'TITLE', 'MUHAMAD ALIFF BIN ZAINUDIN', 'MUHAMAD ALIFF BIN ZAINUDIN', '013-644 4367', '', '2023-06-28', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'AYER BALOI', '19075.76', '17996', 'applied', '', 'QUOTATION', ''),
(110, 'SGS(J).23Q037', '037', '2023-07-14', 'Johor', 'Johor', 'INVITATION FOR QUOTATION OF DEMARCATION SURVEY & PREPARATION OF PU PLAN AT JOHOR (12 SITES)', 'SAAT', 'GLC', 'Existing', 'ENG', 'INDAH WATER KONSORTIUM', 'IRMAYANTY BINTI ISMAIL', '03-27801444', 'irmayantyis@iwk.com.my', '2023-07-14', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'JOHOR', '36517.00', '34450', 'rejected', 'FAILED', 'QUOTATION', ''),
(111, 'SGS(J).23Q038', '038', '2023-07-20', 'Johor', 'Johor', 'TAWARAN SEBUTHARGA KERJA PENGUKURAN DAN PENANDAAN SEMPADAN PTD8378, H.S.(D) 57546, KAHANG KLUANG SELUAS 250.19 HEKTAR', 'SAAT', 'GLC', 'Existing', 'TITLE', 'PIJ PLANTATION', 'SHAHIDAWATI BINTI OTHMAN', '07-2215279', 'pij.plantaton@gmail.com', '2023-07-20', 'PROPERTY & INFRASTRUCTURE', '1 Year', 'KAHANG', '121548.08', '114668', 'applied', '', 'QUOTATION', ''),
(112, 'SGS(J).23Q039', '039', '2023-07-12', 'Johor', 'Johor', 'SURVEY WORKS FOR PLOT D09 - DW4 PTP, PELABUHAN TANJUNG PELEPAS, GELANG PATAH, JOHOR DARUL TAKZIM.', 'SAAT', 'GLC', 'Existing', 'ENG', 'PELABUHAN TANJUNG PELEPAS', 'SITI NOR SYAHIDA ISMAIL', '011-12947248', 'sitinorsyahida.ismail@ptp.com.my', '2023-07-12', 'OIL & GAS', '1 Month', 'GELANG PATAH', '6529.60', '6137.82', 'approved', 'AWARDED', 'QUOTATION', ''),
(113, 'SGS(J).23Q040', '040', '2023-07-13', 'Johor', 'Johor', 'RFQ OF UUM SURVEY AT NPB AREA & PROCESS AREA AT RAPID PENGERANG, JOHOR.', 'SAAT', 'PRIVATE', 'NEW', 'UUM', 'Y&S ILHAM JAYA SDN BHD', 'ALIAH MAHMOOD', '013-744 2098', 'alia.mahmood@yns.my', '2023-07-13', 'OIL & GAS', '1 Month', 'PENGERANG', '9010.00', '8469.4', 'applied', '', 'QUOTATION', ''),
(114, 'SGS(J).23Q041', '041', '2023-07-20', 'Johor', 'Johor', 'RFQ OF UUM SURVEY AT JALAN BATU PAHAT KE AYER HITAM, JOHOR.', 'SAAT', 'Private', 'New', 'UUM', 'GENTING PROPERTY SDN BHD', 'PENG SHER SEONG', '019-3578101', 'sherseong.peng@genting.com', '2023-07-20', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'SRI GADING', '92220.00', '87000', 'rejected', 'FAILED', 'QUOTATION', ''),
(115, 'SGS(J).23Q042', '042', '2023-07-24', 'Johor', 'Johor', 'MDU SURVEY INSIDE & OUTSIDE KLANG VALLEY AREA (BPM004592)', 'SMS', 'Private', 'Existing', 'GIS', 'MAXIS BERHAD', 'Nur Liyana Ghaffarud-din', '017 596 9713', 'nurliyanag@maxis.com.my', '2023-07-24', 'PROPERTY & INFRASTRUCTURE', '1 Month', 'KLANG', '1000', '943.4', 'applied', '', 'QUOTATION', ''),
(116, 'SGS(J).23Q043', '043', '2023-07-27', 'Johor', 'Johor', 'QUOTATION FOR ENGINEERING SURVEY WORKS FOR CADANGAN PEMASANGAN PAIP AGIHAN DAN TANGKI PENGIMBANG BARU DARI LOJI RAWATAN AIR LAYANG 2 KE JOHOR BAHRU', 'SAAT', 'PRIVATE', 'NEW', 'ENG', 'ANGKASA CONSULTANT SERVICES SDN BHD', 'Muhammad Imran', '012-2841080', 'm.imran@acssb.com.my', '2023-07-27', 'PROPERTY & INFRASTRUCTURE', '6 Week', 'SUNGAI TEBRAU', '67414.66', '63369.78', 'applied', '', 'QUOTATION', ''),
(117, 'SGS(J).23Q044', '044', '2023-01-15', 'Johor', 'Johor', 'J3-MSG-SBUM UMAP REPAIR PDM ANTARA PE MRSM MERSING KE PE KUARTERS GURU', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD (MERSING)', 'PRIYADASHINI', '07-1234456', 'priyadashini.saravanan@tnb.com.my', '2023-01-15', 'POWER', '1 Month', 'MERSING', '4865.40', '4590', 'approved', 'AWARDED', 'QUOTATION', ''),
(118, 'SGS(J).23Q045', '045', '2023-02-09', 'Johor', 'Johor', 'J3-KLU-SBUM-KPB UMAP REPAIR PDM FEBRUARY', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD (KLUANG)', 'MUHAMAD BIN AHMAD SHUKRI', '013-8838687', 'muhamad.shukri@tnb.com.my', '2023-02-09', 'POWER', '1 Month', 'KLUANG', '6095.00', '5750', 'approved', 'AWARDED', 'QUOTATION', ''),
(119, 'SGS(J).23Q046', '046', '2023-02-14', 'Johor', 'Johor', 'TMP UNTUK KERJA-KERJA MSVT D-KTG-S19-1483 MERENTANG KABEL ANTARA CAD SSU PASAK KE SS ASAHI ,DAERAH KOTA TINGGI, JOHOR DARUL TAKZIM', 'SAAT', 'GLC', 'EXISTING', 'ENG', 'TENAGA NASIONAL BERHAD (KOTA TINGGI)', 'MOHAMAD FAHMI B MOHAMAD NOR', '018-7713234', 'fahmi.nor@tnb.com.my', '2023-02-14', 'POWER', '1 Month', 'KOTA TINGGI', '6640.9', '6265', 'approved', 'AWARDED', 'QUOTATION', ''),
(120, 'SGS(J).23Q047', '047', '2023-03-02', 'Johor', 'Johor', 'KERJA UKUR SUKAT JALAN MASUK PMU YONG PENG SELATAN, DAERAH BATU PAHAT, JOHOR DARUL TAKZIM', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD (BATU PAHAT)', 'NOR HUWAINA BT BORHAN', '019-7738846', 'norhuwaina@tnb.com.my', '2023-03-02', 'POWER', '1 Month', 'BATU PAHAT', '31619.80', '29830', 'approved', 'AWARDED', 'QUOTATION', ''),
(121, 'SGS(J).23Q048', '048', '2023-07-06', 'Johor', 'Johor', 'SURVEY WORKS AND UNDERGROUND UTILITY MAPPING AT PMU PEKAN NENAS 132/11kV,JOHOR DARUL TAKZIM.', 'SAAT', 'GLC', 'EXISTING', 'UUM', 'TENAGA NASIONAL BERHAD (PONTIAN)', 'ZHAFRAN AIMAN BIN ZULKARNAIN', '01234567', 'zhafranaiman.zulkarnain@tnb.com.my', '2023-07-06', 'POWER', '1 Month', 'PONTIAN', '116176.00', '109600', 'approved', 'AWARDED', 'QUOTATION', ''),
(123, '64daf4e99f2a3', '', '0000-00-00', 'Johor', '', 'Test new direct award', '', 'Private', 'Existing', 'UUM', 'TPM TECHNOPARK SDN BHD', 'MAHFIZ HAMIDON', '017-767 5166', 'mahfiz@tpmtechnopark.com.my', '0000-00-00', 'PROPERTY & INFRASTRUCTURE', '7 Week', 'BATU PAHAT', '1000000', '943396.23', '', '', 'DIRECT AWARD', ''),
(124, 'SGS(J).23Q049', '049', '2023-08-28', 'Johor', 'Johor', 'Test', 'MAM', 'Private', 'New', 'ENG', 'asdasdasd', 'dasdasd', '01223423424', 'atas.meja@gmail.com', '2023-08-31', 'PROPERTY & INFRASTRUCTURE', '3 Week', 'Test', '100000', '94339.62', 'applied', '', 'VARIATION ORDER', 'SGS(J).22J001');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `securement`
--

CREATE TABLE `securement` (
  `s_id` int(255) NOT NULL,
  `s_quot_no` varchar(255) NOT NULL,
  `s_proj_no` varchar(255) NOT NULL,
  `s_proj_code` varchar(255) NOT NULL,
  `s_branch` varchar(255) NOT NULL,
  `s_proj_pic` varchar(255) NOT NULL,
  `s_award_date` date NOT NULL,
  `s_proj_deadline` date NOT NULL,
  `s_status` varchar(255) NOT NULL,
  `s_year` varchar(255) NOT NULL,
  `s_no_inc` varchar(255) NOT NULL,
  `s_checklist` varchar(255) NOT NULL,
  `s_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `securement`
--

INSERT INTO `securement` (`s_id`, `s_quot_no`, `s_proj_no`, `s_proj_code`, `s_branch`, `s_proj_pic`, `s_award_date`, `s_proj_deadline`, `s_status`, `s_year`, `s_no_inc`, `s_checklist`, `s_link`) VALUES
(1, 'SGS(J).22Q005', 'SGS(J).22J001', 'TNB JALAN MASAI 2', 'Johor', 'NSNC', '2022-01-20', '0000-00-00', 'pending', '', '001', '', ''),
(5, 'SGS.24Q001', 'SGS.23V002', '', 'HQ', '', '2023-06-24', '0000-00-00', 'pending', '', '002', '', ''),
(7, 'SGS(J).23Q044', 'SGS(J).23J001', 'TNB MRSM MERSING', 'Johor', 'MDL', '2023-01-16', '0000-00-00', 'pending', '', '001', '', ''),
(8, 'SGS(J).23Q045', 'SGS(J).23J002', 'TNB KLUANG', 'Johor', 'NSNC', '2023-02-12', '0000-00-00', 'pending', '', '002', '', ''),
(9, 'SGS(J).23Q046', 'SGS(J).23J003', 'TMP SSU PASAK INDAH - SS ASAHI', 'Johor', 'MDL', '2023-02-21', '0000-00-00', 'pending', '', '003', '', ''),
(10, 'SGS(J).23Q047', 'SGS(J).23J004', 'TNB TAMAN SEMBRONG', 'Johor', 'MDL', '2023-03-05', '0000-00-00', 'pending', '', '004', '', ''),
(11, 'SGS(J).23Q007', 'SGS(J).23J005', '304 TG KUPANG', 'Johor', 'NSNC', '2023-03-08', '0000-00-00', 'pending', '', '005', '', ''),
(12, 'SGS(J).23Q008', 'SGS(J).23J006', 'SDE EXPRESSWAY', 'Johor', 'NSNC', '2023-03-09', '0000-00-00', 'pending', '', '006', '', ''),
(13, 'SGS(J).23Q019', 'SGS(J).23J007', 'UUM PENGERANG', 'Johor', 'MDL', '2023-04-20', '0000-00-00', 'pending', '', '007', '', ''),
(14, 'SGS(J).23Q028', 'SGS(J).23J008', 'PTP PLOT 39A, 39B & 38C', 'Johor', 'NSNC', '2023-05-25', '0000-00-00', 'pending', '', '008', '', ''),
(15, 'SGS(J).23Q027', 'SGS(J).23J009', 'JKR DAIF SKKM', 'Johor', 'MDL', '2023-05-31', '0000-00-00', 'pending', '', '009', '', ''),
(16, 'SGS(J).23Q048', 'SGS(J).23J010', 'PMU PEKAN NENAS', 'Johor', 'NSNC', '2023-07-13', '0000-00-00', 'pending', '', '010', '', ''),
(17, 'SGS(J).23Q039', 'SGS(J).23J011', 'PTP DW4', 'Johor', 'MDL', '2023-07-20', '0000-00-00', 'pending', '', '011', '', ''),
(20, '64daf4e99f2a3', 'SGS(J).23J012', 'Test direct award', 'Johor', 'MAM', '2023-08-15', '2023-08-31', 'pending', '', '012', '', '');

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
  `status` varchar(255) NOT NULL,
  `staff_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_number`, `staff_name`, `staff_initial`, `staff_title`, `staff_department`, `staff_ic`, `staff_email`, `staff_phone`, `staff_address`, `branch`, `employee_epf_no`, `employee_income_tax_no`, `bank_name`, `bank_acc_no`, `status`, `staff_type`) VALUES
(2, 'FIN010', 'FAKHRULRADHI BIN AHMAD', 'FA', 'FINANCE MANAGER', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(3, 'FIN011', 'MAHIRAH @ SYAIRAH BINTI SATAR', 'MASS', 'FINANCE EXECUTIVE', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(4, 'FIN008', 'NUR HASANAH BINTI ABD HANIF', 'NHAH', 'FINANCE EXECUTIVE', 'FINANCE', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(5, 'ADM015', 'EMMY OZIRA BIN OMAR', 'EOO', 'ADMIN AND QUALITY MANAGER', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(6, 'ADM016', 'NOR AMIRAH BINTI JALUDIN', 'NAJ', 'HUMAN RESOURCES EXECUTIVE', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(7, 'ICT005', 'NOR FASYA FASEHA BT ABD MURAD', 'NFFAM', 'ICT SUPPORT ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(8, 'ENG017', 'ARIFIN BIN UDA SERI', 'AUS', 'ADMIN ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(9, 'ADM014', 'MOHAMAD RAFFIZAL BIN MOHAMAD RADZI', 'MRMR', 'ADMIN ASSISTANT', 'ADMINISTRATION', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(10, 'ENG060', 'ROHANI BINTI AHMAD', 'RA', 'BUSINESS DEVELOPMENT MANAGER', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(12, 'ENG075', 'NURUL ASHIKIN BINTI KAMARUDIN', 'NAK', 'BUSINESS DEVELOPMENT EXECUTIVE', 'BUSINESS DEVELOPMENT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(13, 'ENG101', 'AHMAD KHUSAIRY BIN NORDIN', 'AKN', 'BUSINESS DEVELOPMENT EXECUTIVE', 'BUSINESS DEVELOPMENT', '11111111', 'khusairy@setiageosolutions.com', '', 'pahang', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(14, 'ENG067', 'AHMAD ROSLAN BIN MOHD BAKRI', 'ARMB', 'SENIOR PROJECT MANAGER', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(15, 'ENG057', 'MOHD NOOR NASHRIQ BIN ABDUL LATIFF', 'MNNAL', 'PROJECT MANAGER', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(16, 'ENG029', 'JUNAINAH BINTI MOHD MUSA', 'JMM', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(17, 'ENG033', 'NURUL AZREEN BINTI MOHAMAD ZIN', 'NAMZ', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(18, 'ENG072', 'SITI ESAH BINTI HAMJAH', 'SHE', 'PROJECT EXECUTIVE(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(19, 'ENG085', 'AHMAD FAISAL HADI BIN AB HAMID', 'AFHAH', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(20, 'ENG088', 'MUHAMMAD AIZUDDIN HANNAN B MAZALAN', 'MAHM', 'PROJECT EXECUTIVE (PROJECT MANAGEMENT)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(21, 'ENG096', 'NURUL NAJIHAH BINTI YAAKOB', 'NNY', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(22, 'ENG097', 'NURUL FAZWA ATIEKA BINTI MOHD MURAD', 'NFAMM', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(23, 'ENG103', 'MUHAMMAD SADAM BIN MOHD RAMSAH', 'MSMR', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(24, 'ENG106', 'NURUL NADIA BINTI MUCHLIS', 'NNM', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(25, 'ENG104', 'NUR SAFIQA BINTI AHMAD KAMAL', 'NSAK', 'PROJECT ASSISTANT(DATA PROCESSING) ', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(26, 'ENG105', 'MUHAMMAD DANIEL BIN ZULKAPALI AMI', 'MDZA', 'PROJECT ASSISTANT(DATA PROCESSING) ', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(27, 'FLD107', 'MUSTAZAMA AH BIN MASNGUTI', 'MM', 'FIELD COORDINATOR', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(28, 'FLD108', 'BADLI BIN CHE ALAI', 'BCA', 'SENIOR PROJECT EXECUTIVE(UUM)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(29, 'FLD109', 'MOHD AMERUDDIN BIN ABDUL AZIZ', 'MAAA', 'PROJECT EXECUTIVE (UUM)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(30, 'FLD111', 'MOHAMAD FAIS BIN OTHMAN', 'MFO', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(31, 'FLD007', 'RAHIM BIN YAHAYA', 'RY', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(32, 'FLD055', 'MOHD ZAHARI BIN SALEH ', 'MZS', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(33, 'FLD059', 'AZIZUL AZNAM BIN ZAKARIA', 'AAZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(34, 'FLD064', 'HAFIZAL BIN ZAKARIA', 'HZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(35, 'FLD062', 'MOHD SHUKRI BIN SALEH', 'MSS', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(36, 'FLD098', 'MOHD IZRUL BIN ABDULLAH', 'MIA', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(37, 'FLD106', 'NAZRI BIN ABDULLAH', 'NA', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(38, 'FLD113', 'NAZYRUL IKMAL BIN ZURAINI', 'NIZ', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(39, 'FLD114', 'JAINUDIN BIN RASAH', 'JR', 'PROJECT ASSISTANT (DATA CAPTURE)', 'PROJECT', '', '', '', '', 'HQ', '', '', '', '', 'ACTIVE', 'Staff'),
(40, 'JHR003', 'SAIFUL AZHAR BIN RAMLEE', 'SAR', 'GENERAL MANAGER', 'JOHOR', '850921015081', 'saifulazhar@setiageosolutions.com', '', 'No. 28, Jalan Penaga 5, Taman Pulai Hijauan, 81110 Kangkar Pulai, Johor Bahru, Johor', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(41, 'JHR019', 'SHARIFUDDIN MD SUKUR', 'SMS', 'GIS / IT MANAGER', 'JOHOR', '850513065645', 'sharifuddin@setiageosolutions.com', '', 'No 15, Jalan Pulai Mesra 20, Bandar baru Kangkar Pulai,81300, Skudai Johor', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(42, 'JHR023', 'SYAIFUL AMRI BIN AHMAD TARMIZI', 'SAAT', 'BUSINESS DEVELOPMENT EXECUTIVE', 'JOHOR', '870125015265', 'syaifulamri@setiageosolutions.com', '', 'Bengkel Jahit,82300, Kg Serkat, Pontian, Johor', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(43, 'JHR032', 'MURSYIDAH BINTI KHAIRUDDIN', 'MK', 'ADMIN EXECUTIVE', 'JOHOR', '890613025102', 'mursyidahkhairuddin@gmail.com', '', 'No.110, Susur Pipit, KM4 Jalan Langgar, 05460 Alor Setar, Kedah.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(44, 'JHR064', 'UMI NOREZZATE BINTI ROSLI', 'UNR', 'ADMIN ASSISTANT', 'JOHOR', '990722125610', 'adm.asst.sgsjohor@gmail.com', '', 'No.58, Jalan Bunga Sena 2, Taman Senai Impian, 06400 Pokok Sena, Kedah.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(45, 'JHR036', 'MOHD DANIEL BIN LAILI', 'MDL', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'JOHOR', '941117015199', 'daniel@setiageosolutions.com', '', 'G-01, Blok Calla, Taman Saujana Puri, 75450 Bukit Katil, Melaka.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(46, 'JHR007', 'NURUL SAKDAH @ NAZIAH BINTI CHAHAT', 'NSNC', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'JOHOR', '840915015932', 'nurulsakdah@jurukursetia.com', '', 'No. 16, Jalan Bakti 62, Mutiara Rini, 81300 Skudai, Johor', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(47, 'JHR033', 'MUHSINAH BINTI YACOB', 'MY', 'PROJECT ASSISTANT(DATA PROCESSING)', 'JOHOR', '900501015942', 'muhsinahyacob@gmail.com', '', 'No.23, Jalan Ara 2, Taman Sri Pulai, 81100 Skudai, Johor.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(49, 'JHR038', 'YASMEEN SYAZANA BINTI MD YASIN', 'YSMY', 'GIS ANALYST', 'JOHOR', '940624016394', 'yasmeensyazana94@gmail.com', '', 'No.7, Jalan Meranti 15, Taman Sri Pulai, 81300 Skudai, Johor.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(50, 'JHR012', 'MOHAMMAD NOR IZBULLAH BIN NOR AZIZAN', 'MNINA', 'PROJECT EXECUTIVE (DATA CAPTURE)', 'JOHOR', '920111065045', 'izbullahzizan92@gmail.com', '', 'No. 01-6B, Jalan Mawar 2, Taman Tampoi Indah 2, 81200 Johor Bahru, Johor', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(51, 'JHR034', 'MOHAMAD WAZIR BIN YAHYA', 'MWY', 'PROJECT ASSISTANT (DATA CAPTURE)', 'JOHOR', '741103015677', 'wazirman74@gmail.com', '', '01-05-03, Blok 1, Jalan Kekwa 1/2, Taman Sutera Utama, 81300 Skudai, Johor.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(52, 'JHR039', 'NORAZLAN BIN ABDUL MUBIN', 'NAM', 'PROJECT ASSISTANT (DATA CAPTURE)', 'JOHOR', '820702065575', 'azlanmubin@gmail.com', '', 'No.2, Jalan Pelangi 3, Taman Pelangi Mas, 81560 Pekan Nenas, Johor.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(53, 'JHR062', 'FATIN HIDAYAH BINTI AHMAD', 'FHA', 'PROJECT EXECUTIVE (DATA PROCESSING)', 'JOHOR', '950125015046', 'fatinhidayahahmad@gmail.com', '', 'Lot 47, Jalan 31/141, Kampung Malaysia Tambahan, 57100 Sungai Besi, Kuala Lumpur.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(54, 'JHR065', 'MUHAMMAD AMMAR BIN MUSA', 'MAM', 'GIS PROGRAMMER', 'IT', '940110015773', 'itsammarmusa@gmail.com', '0127434241', 'No.23, Jalan Pulai 60, Taman Pulai Utama, 81300 Skudai, Johor.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(55, 'PHG001', 'HASSANUDDIN BIN SALIM', 'HS', 'BRANCH MANAGER', 'PAHANG', '', '', '', '', 'Pahang', '', '', '', '', 'ACTIVE', 'Staff'),
(56, 'PHG008', 'CAMEYLIA ATHIRAH BINTI ZAINOR', 'CAZ', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PAHANG', '', '', '', '', 'Pahang', '', '', '', '', 'ACTIVE', 'Staff'),
(57, 'PHG009', 'MOHD ZUKRI BIN MOHD SALLEH', 'MZMS', 'PROJECT ASSISTANT(DATA PROCESSING)', 'PAHANG', '', '', '', '', 'Pahang', '', '', '', '', 'ACTIVE', 'Staff'),
(58, 'PHG010', 'NURUL NAIMAH BINTI JANBERI', 'NNJ', 'PROJECT EXECUTIVE(PROJECT MANAGEMENT)', 'PAHANG', '', '', '', '', 'Pahang', '', '', '', '', 'ACTIVE', 'Staff'),
(59, 'PHG011', 'MUHD LOKMAN BIN MAT SA ARI', 'MLMS', 'PROJECT EXECUTIVE(DATA CAPTURE)', 'PAHANG', '', '', '', '', 'Pahang', '', '', '', '', 'ACTIVE', 'Staff'),
(60, 'JHR041', 'AHMAD MUBIN BIN WAHAB', 'AMW', 'GIS ANALYST', 'TNB MMS', '881101115759', 'ahmadmubinwahab@gmail.com', '', 'NO 14, JALAN HARMONI 6/4, TAMAN DESA HARMONI, 81100 JOHOR BAHRU, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(61, 'JHR042', 'FATEN NAJWA BINTI MOHD KHAIR ', 'FNMK', 'GIS ANALYST', 'TNB MMS', '960317015736', 'fatennajwa96@gmail.com', '', 'NO 35-01, JALAN IBRAHIM 82000 PONTIAN, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(62, 'JHR043', 'SITI ZAHIDAH BINTI ISMAIL ', 'SZI', 'GIS ANALYST', 'TNB MMS', '951206017398', 'szahidahismail@gmail.com', '', '1230, JALAN CENDERAWASIH 8, BANDAR PUTRA, 81000 KULAI, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(63, 'JHR044', 'SUHANA BINTI MOHD JAMIL ', 'SMJ', 'GIS ANALYST', 'TNB MMS', '921110025572', 'suhana9210@gmail.com', '', 'NO 23, PINTAS PIPIT 11, TAMAN HELANG JAYA, 14300 NIBONG TEBAL, PULAU PINANG', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(64, 'JHR045', 'NURUL ASYIQIN BINTI ROSLI ', 'NAR', 'GIS ANALYST', 'TNB MMS', '940829125180', 'eiqinasyiqin@gmail.com', '', 'NO 58, JALAN BUNGA SENA, TAMAN SENA IMPIAN, 06400 POKOK SENA, KEDAH', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(65, 'JHR046', 'NORSYUHADA BINTI AZLAN ', 'NSA', 'GIS ANALYST', 'TNB MMS', '950313105700', 'nsyuhadazlan@gmail.com', '', 'LORONG 2, BATU 18, MERBAU SEMPAK, 47000 SUNGAI BULOH, SELANGOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(66, 'JHR049', 'MOHAMAD ZAKWAN BIN ZAINAL', 'MZZ', 'GIS ANALYST', 'TNB MMS', '950110016413', 'm.zakwanzainal@gmail.com', '', 'NO.16, JALAN PERSISIRAN, TAMAN LAUTAN BIRU, 86800 MERSING, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(67, 'JHR055', 'NOR HAFIZAH BINTI MOOHITI ', 'NHM', 'GIS ANALYST', 'TNB MMS', '951002016780', 'hafieyza210@gmail.com', '', 'KAMPUNG SERI BUNIAN, BATU 33, JALAN JOHOR, 82000 PONTIAN, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(68, 'JHR056', 'NUR HIDAYAH BINTI ABDUL KADIR ', 'NHAK', 'GIS ANALYST', 'TNB MMS', '511012098', 'hidayakadir000511@gmail.com', '', 'NO.242, JLAN MEWAH (OFF JALAN SHUKOR), KG MELAYU MAJIDEE, 81100 JOHOR BAHR, JOHORU', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(69, 'JHR057', 'NURANNIS BINTI ABDULLAH', 'NAA', 'GIS ANALYST', 'TNB MMS', '423600068', 'nurannis8@gmail.com', '', 'NO.59H, LORONG 4, JALAN TEMENGGONG, 85000 SEGAMAT, JOHOR', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(70, 'JHR058', 'AMIRUL MUKMININ BIN MOHD AZIMI ', 'AMMA', 'GIS ANALYST', 'TNB MMS', '970418035671', 'amukminin38@gmail.com', '', '2-11-B4, TAMAN SRI JANGGUS, ALMA, 14000 BUKIT MERTAJAM, PULAU PINANG', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(71, 'JHR059', 'MUHAMMAD ILHAM BIN ABU HASAN ', 'MIAH', 'GIS ANALYST', 'TNB MMS', '970423615013', 'thisisilham97@gmail.com', '', 'D-2-10, TAMAN MACHANG BUBOK, LORONG 34, BUKIT MERTAJAM, PULAU PINANG', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(72, 'JHR051', 'NUR ANIS NATASYA BINTI REDZUAN ', 'NANR', 'GIS ANALYST', 'TNB MMS', '981025036386', 'natasyaredzuan@gmail.com', '', 'NO.15, KAMPUNG PALOH RAMBAI, 16450 KETEREH, KOTA BHARU, KELANTAN', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(73, 'JHR052', 'SYAZWANI HUSNA BINTI MOHD HIJAZI ', 'SHMH', 'GIS ANALYST', 'TNB MMS', '951205055034', 'syazwanijob95@gmail.com', '', 'NO.10, LORONG BUNGA RAYA23/2, TAMAN TASIK JAYA, SENAWANG, NEGERI SEMBILAN', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(74, 'JHR061', 'IHSAN AFIF FARUQI BIN ABDUL RAUP ', 'IAFAR', 'GIS ANALYST', 'TNB MMS', '970713155027', 'afiffaruqi97@gmail.com', '', 'NO.90 JALAN TS 2/3, TAMAN SURIA 2, 06000 JITRA, KEDAH', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(75, 'JHR063', 'SITI NABILAH BINTI MAT NOR ', 'SNMN', 'GIS ANALYST', 'TNB MMS', '950120065650', 'nabillahmatnor@gmail.com', '', 'NO.46, JALAN BUKIT CERMIN 2, TAMAN BUKIT CERMIN, 28400 MENTAKAB, PAHANG.', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(76, 'JHR066', 'RAJA NUR AFIFAH BINTI RAJA ZAINUDDIN', 'RNARZ', 'GIS ANALYST', 'TNB MMS', '', '', '', '', 'Johor', '', '', '', '', 'ACTIVE', 'Staff'),
(78, 'ENG004', 'ZUL MAJID BIN MOKHTAR BAZIN', '', '', '', '', 'zmmb@jurukursetia.com', '', '', 'Pahang', '', '', '', '', '', 'Staff'),
(79, 'ENG025', 'ZULNIZAM BABJAN', 'ZNB', 'SR', 'MD OFFICE', '740123055065', 'zulnizam@setiageosolutions.com', '', '', 'HQ', '', '', '', '', '', 'Staff');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `staff_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','superuser') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortform` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_no`, `email`, `role`, `username`, `password`, `name`, `shortform`, `special`, `exp_date`, `reset_link_token`, `status`) VALUES
(3, 'JHR065', 'itsammarmusa@gmail.com', 'superuser', 'JHR065', 'd838784765060f867aa05ddcf33c899d', 'MUHAMMAD AMMAR BIN MUSA', 'MAM', 'true', '2023-04-27 02:14:17', '', 'Active'),
(14, 'ENG025', 'zulnizam@setiageosolutions.com', 'admin', 'ENG025', 'd5f3cf597595f57cc9e4085fd3ef2358', 'ZULNIZAM BIN BABJAN', 'ZNB', 'false', '', '', 'Active'),
(15, 'ENG004', '', 'admin', 'ENG004', '57210b12af5e06ad2e6e54a93b1465aa', 'ZUL MAJID BIN MOKHTAR BAZIN', '', 'false', '', '', 'Active'),
(16, 'FIN010', '', 'admin', 'FIN010', '57210b12af5e06ad2e6e54a93b1465aa', 'FAKHRULRADHI BIN AHMAD', 'FA', 'true', '', '', 'Active'),
(17, 'ADM015', '', 'admin', 'ADM015', '57210b12af5e06ad2e6e54a93b1465aa', 'EMMY OZIRA BIN OMAR', 'EOO', 'true', '', '', 'Active'),
(18, 'ENG060', '', 'admin', 'ENG060', '57210b12af5e06ad2e6e54a93b1465aa', 'ROHANI BINTI AHMAD', 'RA', 'false', '', '', 'Active'),
(20, 'ENG075', '', 'admin', 'ENG075', '57210b12af5e06ad2e6e54a93b1465aa', 'NURUL ASHIKIN BINTI KAMARUDIN', 'NAK', 'false', '', '', 'Active'),
(21, 'ENG067', '', 'admin', 'ENG067', '57210b12af5e06ad2e6e54a93b1465aa', 'AHMAD ROSLAN BIN MOHD BAKRI', 'ARMB', 'false', '', '', 'Active'),
(22, 'ENG085', '', 'admin', 'ENG085', '75654a135d30171a39cb117b050deb24', 'AHMAD FAISAL HADI BIN AB HAMID', 'AFHAH', 'false', '', '', 'Active'),
(23, 'ENG057', '', 'admin', 'ENG057', 'd4b8ffc3e6ec12d51579df1aa79e98e8', 'MOHD NOOR NASHRIQ BIN ABDUL LATIFF', 'MNNAL', 'false', '', '', 'Active'),
(24, 'ENG088', '', 'admin', 'ENG088', '57210b12af5e06ad2e6e54a93b1465aa', 'MUHAMMAD AIZUDDIN HANNAN B MAZALAN', 'MAHM', 'false', '', '', 'Active'),
(25, 'ENG029', '', 'admin', 'ENG029', '57210b12af5e06ad2e6e54a93b1465aa', 'JUNAINAH BINTI MOHD MUSA', 'JMM', 'false', '', '', 'Active'),
(26, 'ENG033', '', 'admin', 'ENG033', '57210b12af5e06ad2e6e54a93b1465aa', 'NURUL AZREEN BINTI MOHAMAD ZIN', 'NAMZ', 'false', '', '', 'Active'),
(27, 'JHR003', '', 'admin', 'JHR003', '2ec3961d8c9958cc5136d50fcbed934e', 'SAIFUL AZHAR BIN RAMLEE', 'SAR', 'false', '', '', 'Active'),
(28, 'JHR019', '', 'admin', 'JHR019', '1e9d2c7b50425f564c0936b3a62d24de', 'SHARIFUDDIN MD SUKUR', 'SMS', 'false', '', '', 'Active'),
(29, 'JHR036', '', 'admin', 'JHR036', '5309a4b1b372e743e1a0af15a25cd636', 'MOHD DANIEL BIN LAILI', 'MDL', 'false', '', '', 'Active'),
(30, 'JHR023', '', 'admin', 'JHR023', '62497fbd5d710c0d666cdadf99ad85b6', 'SYAIFUL AMRI BIN AHMAD TARMIZI', 'SAAT', 'true', '', '', 'Active'),
(31, 'JHR007', '', 'admin', 'JHR007', '2803bf493563ba8b075df13139bcec54', 'NURUL SAKDAH @ NAZIAH BINTI CHAHAT', 'NSNC', 'false', '', '', 'Active'),
(32, 'PHG010', '', 'admin', 'PHG010', '57210b12af5e06ad2e6e54a93b1465aa', 'NURUL NAIMAH BINTI JANBERI', 'NNJ', 'false', '', '', 'Active'),
(33, 'ENG101', '', 'admin', 'ENG101', 'ecfa4f9b22b3a8163b3ce6b6994fae4c', 'AHMAD KHUSAIRY BIN NORDIN', 'AKN', 'false', '', '', 'Active');

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
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`a_id`);

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
-- Indexes for table `contract_partner`
--
ALTER TABLE `contract_partner`
  ADD PRIMARY KEY (`cp_id`);

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
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`);

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
-- Indexes for table `securement`
--
ALTER TABLE `securement`
  ADD PRIMARY KEY (`s_id`);

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
  MODIFY `action_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checklist_child`
--
ALTER TABLE `checklist_child`
  MODIFY `child_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `contract_partner`
--
ALTER TABLE `contract_partner`
  MODIFY `cp_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `manage_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `paid_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_deliver`
--
ALTER TABLE `project_deliver`
  MODIFY `pd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project_schedule`
--
ALTER TABLE `project_schedule`
  MODIFY `ps_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quot_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `remark_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `securement`
--
ALTER TABLE `securement`
  MODIFY `s_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `timeline_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
