-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2024 at 11:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timemason_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Aland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Cote D\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curacao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'XK', 'Kosovo'),
(121, 'KW', 'Kuwait'),
(122, 'KG', 'Kyrgyzstan'),
(123, 'LA', 'Lao People\'s Democratic Republic'),
(124, 'LV', 'Latvia'),
(125, 'LB', 'Lebanon'),
(126, 'LS', 'Lesotho'),
(127, 'LR', 'Liberia'),
(128, 'LY', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'Liechtenstein'),
(130, 'LT', 'Lithuania'),
(131, 'LU', 'Luxembourg'),
(132, 'MO', 'Macao'),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 'MG', 'Madagascar'),
(135, 'MW', 'Malawi'),
(136, 'MY', 'Malaysia'),
(137, 'MV', 'Maldives'),
(138, 'ML', 'Mali'),
(139, 'MT', 'Malta'),
(140, 'MH', 'Marshall Islands'),
(141, 'MQ', 'Martinique'),
(142, 'MR', 'Mauritania'),
(143, 'MU', 'Mauritius'),
(144, 'YT', 'Mayotte'),
(145, 'MX', 'Mexico'),
(146, 'FM', 'Micronesia, Federated States of'),
(147, 'MD', 'Moldova, Republic of'),
(148, 'MC', 'Monaco'),
(149, 'MN', 'Mongolia'),
(150, 'ME', 'Montenegro'),
(151, 'MS', 'Montserrat'),
(152, 'MA', 'Morocco'),
(153, 'MZ', 'Mozambique'),
(154, 'MM', 'Myanmar'),
(155, 'NA', 'Namibia'),
(156, 'NR', 'Nauru'),
(157, 'NP', 'Nepal'),
(158, 'NL', 'Netherlands'),
(159, 'AN', 'Netherlands Antilles'),
(160, 'NC', 'New Caledonia'),
(161, 'NZ', 'New Zealand'),
(162, 'NI', 'Nicaragua'),
(163, 'NE', 'Niger'),
(164, 'NG', 'Nigeria'),
(165, 'NU', 'Niue'),
(166, 'NF', 'Norfolk Island'),
(167, 'MP', 'Northern Mariana Islands'),
(168, 'NO', 'Norway'),
(169, 'OM', 'Oman'),
(170, 'PK', 'Pakistan'),
(171, 'PW', 'Palau'),
(172, 'PS', 'Palestinian Territory, Occupied'),
(173, 'PA', 'Panama'),
(174, 'PG', 'Papua New Guinea'),
(175, 'PY', 'Paraguay'),
(176, 'PE', 'Peru'),
(177, 'PH', 'Philippines'),
(178, 'PN', 'Pitcairn'),
(179, 'PL', 'Poland'),
(180, 'PT', 'Portugal'),
(181, 'PR', 'Puerto Rico'),
(182, 'QA', 'Qatar'),
(183, 'RE', 'Reunion'),
(184, 'RO', 'Romania'),
(185, 'RU', 'Russian Federation'),
(186, 'RW', 'Rwanda'),
(187, 'BL', 'Saint Barthelemy'),
(188, 'SH', 'Saint Helena'),
(189, 'KN', 'Saint Kitts and Nevis'),
(190, 'LC', 'Saint Lucia'),
(191, 'MF', 'Saint Martin'),
(192, 'PM', 'Saint Pierre and Miquelon'),
(193, 'VC', 'Saint Vincent and the Grenadines'),
(194, 'WS', 'Samoa'),
(195, 'SM', 'San Marino'),
(196, 'ST', 'Sao Tome and Principe'),
(197, 'SA', 'Saudi Arabia'),
(198, 'SN', 'Senegal'),
(199, 'RS', 'Serbia'),
(200, 'CS', 'Serbia and Montenegro'),
(201, 'SC', 'Seychelles'),
(202, 'SL', 'Sierra Leone'),
(203, 'SG', 'Singapore'),
(204, 'SX', 'Sint Maarten'),
(205, 'SK', 'Slovakia'),
(206, 'SI', 'Slovenia'),
(207, 'SB', 'Solomon Islands'),
(208, 'SO', 'Somalia'),
(209, 'ZA', 'South Africa'),
(210, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 'SS', 'South Sudan'),
(212, 'ES', 'Spain'),
(213, 'LK', 'Sri Lanka'),
(214, 'SD', 'Sudan'),
(215, 'SR', 'Suriname'),
(216, 'SJ', 'Svalbard and Jan Mayen'),
(217, 'SZ', 'Swaziland'),
(218, 'SE', 'Sweden'),
(219, 'CH', 'Switzerland'),
(220, 'SY', 'Syrian Arab Republic'),
(221, 'TW', 'Taiwan, Province of China'),
(222, 'TJ', 'Tajikistan'),
(223, 'TZ', 'Tanzania, United Republic of'),
(224, 'TH', 'Thailand'),
(225, 'TL', 'Timor-Leste'),
(226, 'TG', 'Togo'),
(227, 'TK', 'Tokelau'),
(228, 'TO', 'Tonga'),
(229, 'TT', 'Trinidad and Tobago'),
(230, 'TN', 'Tunisia'),
(231, 'TR', 'Turkey'),
(232, 'TM', 'Turkmenistan'),
(233, 'TC', 'Turks and Caicos Islands'),
(234, 'TV', 'Tuvalu'),
(235, 'UG', 'Uganda'),
(236, 'UA', 'Ukraine'),
(237, 'AE', 'United Arab Emirates'),
(238, 'GB', 'United Kingdom'),
(239, 'US', 'United States'),
(240, 'UM', 'United States Minor Outlying Islands'),
(241, 'UY', 'Uruguay'),
(242, 'UZ', 'Uzbekistan'),
(243, 'VU', 'Vanuatu'),
(244, 'VE', 'Venezuela'),
(245, 'VN', 'Viet Nam'),
(246, 'VG', 'Virgin Islands, British'),
(247, 'VI', 'Virgin Islands, U.s.'),
(248, 'WF', 'Wallis and Futuna'),
(249, 'EH', 'Western Sahara'),
(250, 'YE', 'Yemen'),
(251, 'ZM', 'Zambia'),
(252, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` text NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_start_time` text NOT NULL,
  `event_end_time` text NOT NULL,
  `event_status` enum('ACTIVE','INACTIVE','ENDED') NOT NULL,
  `created_on` datetime NOT NULL,
  `Total_Users` int(11) NOT NULL,
  `duration` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_description`, `event_date`, `event_start_time`, `event_end_time`, `event_status`, `created_on`, `Total_Users`, `duration`) VALUES
(1, 'Game1', '', '2023-09-05', '17:00', '23:00', 'ACTIVE', '2023-09-05 16:43:15', 5, '10'),
(2, 'Test', 'Test', '2023-09-09', '11:00', '23:00', 'ACTIVE', '2023-09-06 00:00:00', 0, '10'),
(3, 'Test', 'Test', '2023-09-09', '11:00', '23:00', 'ACTIVE', '2023-09-06 00:00:00', 0, '10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sudo_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` text NOT NULL,
  `Age` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `score` float(11,2) DEFAULT NULL,
  `alloted_time` datetime DEFAULT NULL,
  `QueueNo` int(11) NOT NULL,
  `team_size` int(11) DEFAULT NULL,
  `status` enum('APPROVED','REJECTED','PENDING','WAITING','COMPLETED') DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `end_time` datetime DEFAULT '0000-00-00 00:00:00',
  `start_time` datetime DEFAULT '0000-00-00 00:00:00',
  `completion_status` enum('WAITING','COMPLETED') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `event_id`, `name`, `sudo_name`, `gender`, `email`, `mobile_no`, `Age`, `rdate`, `score`, `alloted_time`, `QueueNo`, `team_size`, `status`, `nationality`, `timestamp`, `end_time`, `start_time`, `completion_status`) VALUES
(14, 2, 'Uhood', 'Alhameli', 'female', 'Ubh714@gmail.com', '0526881777', 40, '2023-10-07', 3.00, '2023-10-07 12:18:32', 2, 3, 'APPROVED', 'United Arab Emirates', '2023-10-06 22:47:03', '2023-10-07 12:23:40', '2023-10-07 12:20:39', 'WAITING'),
(2, 2, 'Ameer', 'Meer', 'male', 'Alaa.alschoufi@gmail.com', '0557116007', 6, '2023-10-07', 3.26, '2023-10-07 11:34:57', 1, 2, 'APPROVED', 'Syria', '2023-10-06 22:34:10', '2023-10-07 11:41:50', '2023-10-07 11:38:23', 'WAITING'),
(3, 2, 'Makhmoor Abbas ', 'MA', 'male', 'makhmoor_786@yahoo.com', '0557186395', 48, '2023-10-07', 5.00, '2023-10-07 11:40:17', 2, 1, 'APPROVED', 'Pakistan', '2023-10-06 22:34:49', '2023-10-07 11:49:52', '2023-10-07 11:44:50', 'WAITING'),
(4, 2, 'Zainab', 'Team 3', 'female', 'zainab.husain1999@live.com', '0569343153', 24, '2023-10-07', 3.00, '2023-10-07 11:45:41', 2, 3, 'APPROVED', 'India', '2023-10-06 22:35:02', '2023-10-07 11:55:48', '2023-10-07 11:52:46', 'WAITING'),
(5, 2, 'RACHELLE', 'Smart', 'female', 'Raqipgonzales@gmail.com', '0528934933', 41, '2023-10-07', NULL, '2023-10-07 11:50:07', 4, 3, 'REJECTED', 'Philippines', '2023-10-06 22:35:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(6, 2, 'RACHELLE', 'Smart', 'female', 'Raqipgonzales@gmail.com', '0528934933', 41, '2023-10-07', NULL, '2023-10-07 11:55:18', 5, 3, 'REJECTED', 'Philippines', '2023-10-06 22:35:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(7, 2, 'RACHELLE', 'Smart', 'female', 'Raqipgonzales@gmail.com', '0528934933', 41, '2023-10-07', NULL, '2023-10-07 12:00:52', 6, 3, 'REJECTED', 'Philippines', '2023-10-06 22:35:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(8, 2, 'Rahsid jaffar', 'BrotherAndSister', 'male', 'Rashidos304@gmail.com', '0523043176', 24, '2023-10-07', 3.00, '2023-10-07 11:49:07', 1, 2, 'APPROVED', 'India', '2023-10-06 22:37:33', '2023-10-07 12:01:18', '2023-10-07 11:58:17', 'WAITING'),
(9, 2, 'Joy', 'Skye', 'female', 'Dzoi.fernando@gma.com', '0564306812', 42, '2023-10-07', 2.26, '2023-10-07 11:55:48', 1, 3, 'APPROVED', 'Philippines', '2023-10-06 22:38:10', '2023-10-07 12:05:07', '2023-10-07 12:02:40', 'WAITING'),
(10, 2, 'Nabila', 'Bila ', 'female', 'Nabila.mousaid@hotmail.com', '0552678808', 32, '2023-10-07', NULL, '2023-10-07 12:02:26', 5, 5, 'REJECTED', 'المغرب', '2023-10-06 22:41:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(11, 2, 'Naila', 'Conan', 'female', 'b-nt-alreem@hotmail.com', '0501515222', 32, '2023-10-07', 2.40, '2023-10-07 12:14:07', 2, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 22:43:38', '2023-10-07 12:09:42', '2023-10-07 12:07:02', 'WAITING'),
(12, 2, 'Abdullah', 'Conan', 'male', 'Abdullah.a61401@gmail.com', '0503201422', 14, '2023-10-07', NULL, '2023-10-07 12:33:42', 11, 2, 'REJECTED', 'United Arab Emirates', '2023-10-06 22:43:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(13, 2, 'Ahmed', 'Amers', 'male', 'Ahmed.am3r@gmail.com', '0506132614', 36, '2023-10-07', 3.00, '2023-10-07 12:10:19', 2, 4, 'APPROVED', 'France', '2023-10-06 22:44:18', '2023-10-07 12:14:19', '2023-10-07 12:11:17', 'WAITING'),
(15, 2, 'شيخة', 'فريق الأميرات', 'female', 'abeeby_44@hotmail.com', '0504553113', 8, '2023-10-07', 1.36, '2023-10-07 12:17:31', 4, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 22:47:23', '2023-10-07 12:17:48', '2023-10-07 12:16:11', 'WAITING'),
(16, 2, 'Meera', 'Almarri ', 'female', 'Almarrimeera9@gmail.com', '0508552332', 50, '2023-10-07', 1.00, '2023-10-07 12:28:35', 5, 3, 'APPROVED', 'United Arab Emirates', '2023-10-06 22:47:46', '2023-10-07 12:26:11', '2023-10-07 12:25:10', 'WAITING'),
(17, 2, 'Hind fahad ', 'Anoohi', 'female', 'Hamdamahmood@hotmail.com', '0506555107', 12, '2023-10-07', 1.28, '2023-10-07 12:18:10', 2, 3, 'APPROVED', 'United Arab Emirates', '2023-10-06 22:49:58', '2023-10-07 12:31:49', '2023-10-07 12:30:20', 'WAITING'),
(18, 2, 'Nada', 'NS', 'female', 'nada.ayoub91@outlook.com', '0543566068', 31, '2023-10-07', 3.00, '2023-10-07 12:21:21', 4, 2, 'APPROVED', 'Egypt', '2023-10-06 22:53:09', '2023-10-07 12:37:07', '2023-10-07 12:34:07', 'WAITING'),
(19, 2, 'samar', 'heros', 'female', 'samar.yahiaa28@gmail.com', '0525772341', 33, '2023-10-07', 3.00, '2023-10-07 12:28:40', 2, 3, 'APPROVED', 'Egypt', '2023-10-06 23:01:03', '2023-10-07 12:42:12', '2023-10-07 12:39:10', 'WAITING'),
(20, 2, 'MOHAMMED SHADAN ', 'Shadan', 'male', 'mohdshadurc@gmail.com', '0567121642', 21, '2023-10-07', 1.42, '2023-10-07 12:32:18', 2, 2, 'APPROVED', 'India', '2023-10-06 23:01:52', '2023-10-07 12:45:33', '2023-10-07 12:43:51', 'WAITING'),
(21, 2, 'Doaa', 'Leen', 'female', 'd-arafat@hotmail.com', '0528002026', 36, '2023-10-07', 1.41, '2023-10-07 12:34:19', 2, 2, 'APPROVED', 'Jordan', '2023-10-06 23:03:48', '2023-10-07 12:49:30', '2023-10-07 12:47:47', 'WAITING'),
(22, 2, 'علي', 'الريم', 'male', 'alialhebsi1981@gmail.com', '0505201919', 42, '2023-10-07', 2.37, '2023-10-07 12:40:28', 2, 4, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:09:18', '2023-10-07 12:55:19', '2023-10-07 12:52:41', 'WAITING'),
(23, 2, 'عائشه', 'الخضر', 'female', 'a.alkhadhar98@gmail.com', '0566331188', 25, '2023-10-07', 1.30, '2023-10-07 12:39:31', 2, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:10:33', '2023-10-07 13:27:23', '2023-10-07 13:25:52', 'WAITING'),
(24, 2, 'Katsiaryna', 'Farooq', 'female', 'katsiarynafarooq@gmail.com', '0545737522', 37, '2023-10-07', 3.00, '2023-10-07 12:44:30', 3, 3, 'APPROVED', 'Belarus', '2023-10-06 23:13:13', '2023-10-07 13:01:10', '2023-10-07 12:58:08', 'WAITING'),
(25, 2, 'Meera ', 'Almarri ', 'male', 'Almarrimeera9@gmail.com', '0508552332', 50, '2023-10-07', NULL, '2023-10-07 12:44:27', 10, 4, 'COMPLETED', 'United Arab Emirates', '2023-10-06 23:13:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'COMPLETED'),
(26, 2, 'Roderick ', 'Cassy', 'male', 'roderickespiritu365@gmail.com', '0521868932', 42, '2023-10-07', 1.54, '2023-10-07 12:50:32', 4, 1, 'APPROVED', 'Philippines', '2023-10-06 23:13:51', '2023-10-07 13:16:39', '2023-10-07 13:14:44', 'WAITING'),
(27, 2, 'Mohammad', 'Any Yousef', 'male', 'Engmoh_ibr@hotmail.com', '0507515776', 40, '2023-10-07', NULL, '2023-10-07 12:52:39', 2, 4, 'REJECTED', 'Palestine', '2023-10-06 23:16:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(28, 2, 'Al yazi', 'Al yazia', 'female', 'Omar.abuhweij@gmail.com', '0505621563', 4, '2023-10-07', 3.00, '2023-10-07 12:56:39', 6, 2, 'APPROVED', 'Jordan', '2023-10-06 23:16:55', '2023-10-07 13:21:09', '2023-10-07 13:18:08', 'WAITING'),
(29, 2, 'Meera', 'Supporter', 'female', 'A_alketbi8@hotmail.com', '0508818488', 10, '2023-10-07', 1.51, '2023-10-07 13:01:33', 4, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:19:03', '2023-10-07 13:32:04', '2023-10-07 13:30:11', 'WAITING'),
(30, 2, 'محمد', 'محمد', 'male', 'Alwasl17@live.com', '0506249717', 84, '2023-10-07', NULL, '2023-10-07 13:08:37', 8, 2, 'REJECTED', 'United Arab Emirates', '2023-10-06 23:26:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(31, 2, 'Jasmin', 'Mother and daughter team', 'female', 'Jasmin.Mosaffaie@gmail.com', '0568093779', 23, '2023-10-07', 1.49, '2023-10-07 13:15:56', 8, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:38:33', '2023-10-07 13:37:43', '2023-10-07 13:35:53', 'WAITING'),
(32, 2, 'Rohin', 'Ayaan Raj', 'male', 'rohinbxb@gmail.com', '0552963303', 36, '2023-10-07', 2.13, '2023-10-07 13:19:22', 5, 3, 'APPROVED', 'India', '2023-10-06 23:40:08', '2023-10-07 13:50:06', '2023-10-07 13:47:52', 'WAITING'),
(33, 2, 'Elroy', 'Dcruze', 'male', 'ejdcruze@gmail.com', '0521001729', 9, '2023-10-07', 3.00, '2023-10-07 13:25:59', 14, 3, 'APPROVED', 'India', '2023-10-06 23:44:11', '2023-10-07 13:55:45', '2023-10-07 13:52:44', 'WAITING'),
(34, 2, 'Jonas', 'Bellé', 'male', 'Jenniferfritz@web.de', '0502286028', 11, '2023-10-07', NULL, '2023-10-07 13:25:58', 8, 3, 'REJECTED', 'Germany', '2023-10-06 23:45:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(35, 2, 'Saif', 'AS', 'male', 'Saifalreyami08@gmail.com', '0555055553', 13, '2023-10-07', NULL, '2023-10-07 13:32:00', 7, 2, 'REJECTED', 'United Arab Emirates', '2023-10-06 23:45:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(36, 2, 'Manam', 'The Kindys', 'male', 'manam.alkindi@gmail.com', '0555544021', 41, '2023-10-07', NULL, '2023-10-07 13:35:23', 9, 4, 'REJECTED', 'Oman', '2023-10-06 23:49:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(37, 2, 'Haya', 'Investigators', 'female', 'Elham.alawadhi@hotmail.com', '0551888118', 9, '2023-10-07', NULL, '2023-10-07 13:37:58', 16, 2, 'REJECTED', 'United Arab Emirates', '2023-10-06 23:52:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(38, 2, 'Flauber Peter ', 'Detective pockémo ', 'male', 'Lapetite.christina@gmail.com', '0527075785', 9, '2023-10-07', 2.23, '2023-10-07 14:25:44', 3, 3, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:53:45', '2023-10-07 14:28:22', '2023-10-07 14:25:58', 'WAITING'),
(39, 2, 'Naail rizvi', 'Hi', 'male', 'rizviilyas.1951@gmail.com', '0506910405', 10, '2023-10-07', 2.10, '2023-10-07 13:43:10', 10, 1, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:54:35', '2023-10-07 13:59:18', '2023-10-07 13:57:07', 'WAITING'),
(40, 2, 'Reem ', 'Almarri squad', 'female', 'Mohd.thani@live.com', '0551613338', 7, '2023-10-07', NULL, '2023-10-07 13:46:19', 17, 2, 'REJECTED', 'United Arab Emirates', '2023-10-06 23:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(41, 2, 'Ranjith perumal ', 'Kuppali ', 'male', 'Ranjith7252@gmail.com', '0581523909', 29, '2023-10-07', 1.20, '2023-10-07 13:50:38', 19, 2, 'APPROVED', 'India', '2023-10-06 23:56:31', '2023-10-07 13:40:57', '2023-10-07 13:39:35', 'WAITING'),
(42, 2, 'Nadia', 'Shahawy', 'female', 'nnubani@gmail.com', '0507444553', 39, '2023-10-07', NULL, '2023-10-07 13:55:05', 14, 3, 'REJECTED', 'United States', '2023-10-06 23:56:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(43, 2, 'Mohammad', 'Mohammad', 'male', 'salamaar123@gmail.con', '0556473233', 7, '2023-10-07', 2.07, '2023-10-07 13:58:06', 20, 2, 'APPROVED', 'United Arab Emirates', '2023-10-06 23:57:55', '2023-10-07 13:13:12', '2023-10-07 13:11:04', 'WAITING'),
(44, 2, 'Husein ', 'Said salim', 'male', 'Malak.ss.12@hotmail.com', '0561866881', 12, '2023-10-07', NULL, '2023-10-07 13:59:03', 21, 2, 'REJECTED', 'Palestine', '2023-10-06 23:58:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(45, 2, 'شيخة احمد', 'الكمدة', 'male', 'Alkamda90@gmail.com', '0552000073', 12, '2023-10-07', 2.01, '2023-10-07 14:07:00', 22, 5, 'APPROVED', 'United Arab Emirates', '2023-10-07 00:03:38', '2023-10-07 13:07:29', '2023-10-07 13:05:26', 'WAITING'),
(46, 2, 'Syed Mubashir Iftikhar ', 'Mubashir ', 'male', 'sidved123@gmail.com', '0545313795', 13, '2023-10-07', 3.00, '2023-10-07 14:12:06', 2, 2, 'APPROVED', 'Pakistan', '2023-10-07 00:08:28', '2023-10-07 14:36:16', '2023-10-07 14:33:15', 'WAITING'),
(47, 2, 'Husein', 'Team husein', 'male', 'Malak.ss.12@hotmail.com', '0561866881', 11, '2023-10-07', 2.21, '2023-10-07 14:17:07', 21, 2, 'APPROVED', 'United Arab Emirates', '2023-10-07 00:10:17', '2023-10-07 14:03:41', '2023-10-07 14:01:19', 'WAITING'),
(48, 2, 'Rameez Raja', 'Sisters ', 'female', 'Mayada_moatasem@hotmail.com', '0529930890', 36, '2023-10-07', NULL, '2023-10-07 14:22:24', 19, 4, 'REJECTED', 'United Arab Emirates', '2023-10-07 00:21:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(49, 2, 'Fatima Mohammad', 'Smarts ', 'female', 'dr.fatima.mohammad@gmail.com', '0505960678', 39, '2023-10-07', 2.39, '2023-10-07 14:25:26', 21, 2, 'APPROVED', 'Iran', '2023-10-07 00:22:06', '2023-10-07 13:45:17', '2023-10-07 13:42:38', 'WAITING'),
(50, 2, 'Beena', 'Beena', 'female', 'Beenadxb1@gmail.com', '0564150397', 50, '2023-10-07', 3.00, '2023-10-07 14:31:04', 22, 1, 'APPROVED', 'India', '2023-10-07 00:27:57', '2023-10-07 14:42:05', '2023-10-07 14:39:03', 'WAITING'),
(51, 2, 'عبدالله علي', 'السوادي', 'male', 'Alsowadi10@gmail.com', '0552805189', 40, '2023-10-07', 3.00, '2023-10-07 14:36:06', 2, 3, 'APPROVED', 'اليمن', '2023-10-07 00:29:22', '2023-10-07 14:48:03', '2023-10-07 14:45:01', 'WAITING'),
(52, 2, 'Shamma ', 'CCMI', 'female', 'Shamah_hamad@hotmail.com', '0552775166', 30, '2023-10-07', 3.00, '2023-10-07 14:39:07', 3, 2, 'APPROVED', 'United Arab Emirates', '2023-10-07 00:32:11', '2023-10-07 14:55:04', '2023-10-07 14:52:02', 'WAITING'),
(53, 2, 'Talal', 'Nay', 'male', 'Talal_00@live.com', '0558725404', 40, '2023-10-07', 2.22, '2023-10-07 14:44:41', 16, 5, 'APPROVED', 'Lebanon', '2023-10-07 00:40:20', '2023-10-07 14:08:11', '2023-10-07 14:05:48', 'WAITING'),
(54, 2, 'سالم الكتبي', 'قسم البيولوجي', 'male', 'alkitbe.11@hotmail.com', '0522221811', 35, '2023-10-07', NULL, '2023-10-07 15:03:51', 26, 2, 'REJECTED', 'United Arab Emirates', '2023-10-07 00:48:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(55, 2, 'Ahmed Aqel', 'AQEL', 'male', 'aqel77@hotmail.com', '0506544740', 46, '2023-10-07', NULL, '2023-10-07 14:50:47', 2, 2, 'COMPLETED', 'Jordan', '2023-10-07 00:53:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(56, 2, 'Paul Jones ', 'Jones Family ', 'male', 'pmj23r@gmail.com', '0559299425', 51, '2023-10-07', 3.00, '2023-10-07 14:52:50', 18, 5, 'APPROVED', 'United Kingdom', '2023-10-07 00:54:24', '2023-10-07 14:13:36', '2023-10-07 14:10:34', 'WAITING'),
(57, 2, 'Maria', 'Qazi', 'female', 'mqazi2311@gmail.com', '0506275243', 40, '2023-10-07', 3.00, '2023-10-07 14:56:40', 13, 2, 'APPROVED', 'Pakistan', '2023-10-07 00:59:09', '2023-10-07 14:18:18', '2023-10-07 14:15:16', 'WAITING'),
(58, 2, 'Tehreem', 'Mom and daughters', 'female', 'Hassan_naveed_anjum@hotmail.com', '0562265250', 37, '2023-10-07', NULL, '2023-10-07 15:01:32', 3, 3, 'COMPLETED', 'Pakistan', '2023-10-07 01:07:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(59, 2, 'Syed Faizan ', 'Raza', 'male', 'fayxan@hotmail.com', '0507248243', 38, '2023-10-07', NULL, '2023-10-07 15:05:21', 4, 2, 'COMPLETED', 'Pakistan', '2023-10-07 01:07:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(60, 2, 'Neil Abraham', 'RN Team', 'male', 'neil.c.abraham@gmail.com', '0545674353', 13, '2023-10-07', NULL, '2023-10-07 15:08:23', 16, 2, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:07:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(61, 2, 'Taline', 'The Malaeb’’s', 'female', 'hanadi.obeid@gmail.com', '0504223524', 9, '2023-10-07', NULL, '2023-10-07 15:12:29', 6, 4, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:09:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(62, 2, 'Tamanna', 'Tamranna', 'female', 'Tamannafaisal85@gmail.com', '0508236850', 22, '2023-10-07', NULL, '2023-10-07 15:15:31', 7, 2, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:09:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(63, 2, 'Awny', 'Rakan and awny', 'male', 'awny1597@gmail.com', '0506345669', 9, '2023-10-07', NULL, '2023-10-07 15:06:45', 11, 2, 'COMPLETED', 'Canada', '2023-10-07 01:11:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(64, 2, 'Ghala Alqassim', 'Team Paddington', 'female', 'mqassim87@gmail.com', '0503555944', 5, '2023-10-07', 2.12, '2023-10-07 15:09:46', 20, 2, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:12:42', '2023-10-07 14:22:38', '2023-10-07 14:20:24', 'WAITING'),
(65, 2, 'Rachel Sarah Jimmy', 'JC Rocks', 'female', 'jimjosephjim@gmail.com', '0523072440', 9, '2023-10-07', NULL, '2023-10-07 15:13:44', 9, 4, 'COMPLETED', 'India', '2023-10-07 01:12:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(66, 2, 'Hamdan', 'Hamdan', 'male', 'Halmutawa101@gmail.com', '0581311311', 11, '2023-10-07', NULL, '2023-10-07 15:13:43', 10, 2, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:13:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(67, 2, 'Abdul Mahesook', 'Mahshook Aysha ', 'male', 'mahshook.abd@gmail.com', '0509534622', 33, '2023-10-07', NULL, '2023-10-07 15:19:48', 22, 2, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:15:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(68, 2, 'Vaidyanath l', 'AnaNakshu Adventures ', 'male', 'Vaidyanath@gmail.com', '0557826598', 40, '2023-10-07', NULL, '2023-10-07 15:22:48', 12, 4, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:16:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(69, 2, 'Mishel', 'Mishel team', 'female', 'Thahzeen@gmail.com', '0567505630', 7, '2023-10-07', NULL, '2023-10-07 15:26:45', 20, 3, 'COMPLETED', 'India', '2023-10-07 01:17:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(70, 2, 'Neil Abraham', 'JN Squad', 'male', 'neil.c.abraham@gmail.com', '0545674353', 13, '2023-10-07', NULL, '2023-10-07 15:24:53', 14, 2, 'COMPLETED', 'United Arab Emirates', '2023-10-07 01:18:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(71, 2, 'Agmed', 'Mourad', 'male', 'ahmed_mourad2001@hotmail.com', '0564458792', 8, '2023-10-07', NULL, '2023-10-07 15:27:54', 24, 2, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:18:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(72, 2, 'Ahmed Alajmani', 'Al ajmani', 'male', 'Ahmed.Alajmani@hotmail.com', '0508575555', 36, '2023-10-07', NULL, '2023-10-07 15:32:46', 18, 6, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:26:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(73, 2, 'Mohammad  Almheiri ', 'Power puff girls and boy', 'female', 'mohdalmezaina@hotmail.com', '0555516300', 13, '2023-10-07', NULL, '2023-10-07 15:31:43', 17, 3, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:31:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(74, 2, 'Lamia Smati', 'Karam Team', 'male', 'lamiaamelsmati@gmail.com', '0507476387', 8, '2023-10-07', NULL, '2023-10-07 15:36:41', 20, 6, 'APPROVED', 'Algeria', '2023-10-07 01:37:43', '0000-00-00 00:00:00', '2023-10-07 14:58:11', 'WAITING'),
(75, 2, 'مريم واصل ', 'الباديه', 'male', 'bayanw9978@gmail.com', '0506400264', 27, '2023-10-07', NULL, '2023-10-07 15:39:42', 21, 3, 'APPROVED', 'اليمن', '2023-10-07 01:38:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(76, 2, 'عبد الرحمن', 'عبدالرحمن الملكي ', 'male', 'Waled71111@gmail.com', '0585852033', 12, '2023-10-07', NULL, '2023-10-07 15:42:43', 22, 2, 'APPROVED', 'اليمن', '2023-10-07 01:38:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(77, 2, 'Malak', 'Alkhedr', 'female', 'whosmalak00@gmail.com', '0585610540', 14, '2023-10-07', NULL, '2023-10-07 15:49:29', 22, 4, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:42:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(78, 2, 'Clare', 'Stingray', 'female', 'Clarelavin@hotmail.Co.uk', '0506510839', 5, '2023-10-07', NULL, '2023-10-07 15:53:08', 23, 2, 'APPROVED', 'United Kingdom', '2023-10-07 01:46:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(79, 2, 'Aala', 'white ', 'female', 'aala.albanna@icloud.com', '0561825859', 16, '2023-10-07', NULL, '2023-10-07 16:00:14', 24, 3, 'APPROVED', 'United Arab Emirates', '2023-10-07 01:48:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING'),
(80, 2, 'Yara Zaib Faisal', 'Salute', 'female', 'faiz_38@yahoo.com', '0558073328', 10, '2023-10-07', NULL, '2024-05-23 13:17:12', 23, 3, 'APPROVED', 'India', '2023-10-07 01:56:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'WAITING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alpha', 'alpha@gmail.com', NULL, '12345', NULL, NULL, NULL),
(2, 'Jane Doe', 'janedoe@example.com', NULL, '$2y$10$6zC7Tymi3FKCsPXV8aQq4.DY4Ukn3fXL6l6HMy4uYcJJdHpyYRk0y', NULL, '2024-05-22 23:46:04', '2024-05-22 23:46:04'),
(3, 'Jane Doe', 'syed@gmail.com', NULL, '$2y$10$SP8.SIyjkEldMewt7PoMhu5UKE5PFQbpFgr2UYB53lm3g1Xn.JFVS', NULL, '2024-05-22 23:47:26', '2024-05-22 23:47:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
