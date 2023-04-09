-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2023 at 03:49 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `created_at`, `updated_at`, `status`, `display_order`) VALUES
(2, 'Сагс', 'Сагс', '2023-04-09 00:33:28', '2023-04-09 23:37:34', 1, 2),
(4, 'Цахим спорт', '', '2023-04-09 23:46:01', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

DROP TABLE IF EXISTS `competition`;
CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competition_category_id` int(11) DEFAULT NULL,
  `team_one` int(11) DEFAULT NULL,
  `team_two` int(11) DEFAULT NULL,
  `play_status` int(11) DEFAULT NULL,
  `team_one_point` int(11) DEFAULT NULL,
  `team_two_point` int(11) DEFAULT NULL,
  `win_status` int(11) DEFAULT NULL,
  `play_date` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `address` text,
  `status` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`id`, `competition_category_id`, `team_one`, `team_two`, `play_status`, `team_one_point`, `team_two_point`, `win_status`, `play_date`, `description`, `address`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 0, NULL, NULL, NULL, '2023-04-11 09:56:00', '', 's', 1, 0, '2023-04-09 20:36:48', '2023-04-09 21:56:58'),
(3, 1, 4, 5, 1, 4, 1, 1, '2023-04-08 11:00:00', '', 'Mongol', 1, 0, '2023-04-09 22:53:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `competition_category`
--

DROP TABLE IF EXISTS `competition_category`;
CREATE TABLE IF NOT EXISTS `competition_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition_category`
--

INSERT INTO `competition_category` (`id`, `name`, `file_id`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'ДЭЭД ЛИГ', 8, 1, 1, '2023-04-09 17:54:17', '2023-04-09 17:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `category_id`, `file_id`, `title`, `description`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'Э.Дөлгөөнгүй Бродерс Металлуудыг хожлоо', 'Э.Дөлгөөнгүй Бродерс Металлуудыг хожлоо', 'Сагсан бөмбөгийн Үндэсний Дээд лигийн плей-оффын хагас шигшээ шатанд учраа таарсан Завхан Бродерс болон Тэнүүн Өлзий Металл багуудын цувралын тав дахь тоглолт UG Arena-д боллоо.\n\nЦувралд тэргүүлэгч Металлууд тоглолтыг давуу эхлүүлсэн ч Бродерс төгсгөлд илүү байв. Б.Мөнхтүвшин эзгүй дээр, эхний үед Э.Дөлгөөнийг бэртлээр алдсан Бродерс залуу тоглогчдынхоо сайн тоглолтоор 91-77 харьцаагаар хожлоо.\n\nБродерс багаас Даймонд Стөүн, Фредерик Лиш нарын легионерууд үүргээ гүйцэтгэж сайн тоглосон бол залуу тоглогч Э.Мөнхтулга энэ өдөр өөрийгөө таниулсан. Тэрээр 17 оноо, 2 самбартайгаар тоглолтыг дуусгасан.\n\nИйнхүү цуврал 3-2 харьцаатай болж Завхан Бродерс дахин нэг тоглолтод бүхнээ шавхана. Тэдний хожсоныг финалд Эрдэнэтийн Уурхайчид хүлээж байна.', 1, '2023-04-09 23:07:45', NULL),
(2, 2, 10, 'Э.Дөлгөөнгүй Бродерс Металлуудыг хожлоо', 'Э.Дөлгөөнгүй Бродерс Металлуудыг хожлоо', 'Сагсан бөмбөгийн Үндэсний Дээд лигийн плей-оффын хагас шигшээ шатанд учраа таарсан Завхан Бродерс болон Тэнүүн Өлзий Металл багуудын цувралын тав дахь тоглолт UG Arena-д боллоо.\n\nЦувралд тэргүүлэгч Металлууд тоглолтыг давуу эхлүүлсэн ч Бродерс төгсгөлд илүү байв. Б.Мөнхтүвшин эзгүй дээр, эхний үед Э.Дөлгөөнийг бэртлээр алдсан Бродерс залуу тоглогчдынхоо сайн тоглолтоор 91-77 харьцаагаар хожлоо.\n\nБродерс багаас Даймонд Стөүн, Фредерик Лиш нарын легионерууд үүргээ гүйцэтгэж сайн тоглосон бол залуу тоглогч Э.Мөнхтулга энэ өдөр өөрийгөө таниулсан. Тэрээр 17 оноо, 2 самбартайгаар тоглолтыг дуусгасан.\n\nИйнхүү цуврал 3-2 харьцаатай болж Завхан Бродерс дахин нэг тоглолтод бүхнээ шавхана. Тэдний хожсоныг финалд Эрдэнэтийн Уурхайчид хүлээж байна.', 1, '2023-04-09 23:28:18', '2023-04-09 23:33:00'),
(3, 4, 11, 'The Mongolz баг Парисын мажорт Ази тивийг төлөөлж оролцохоор боллоо', 'The Mongolz баг Парисын мажорт Ази тивийг төлөөлж оролцохоор боллоо', 'CSGO тоглоомын Парисын мажор тэмцээнд оролцох эрхийн төлөөх Азийн аварга шалгаруулах тэмцээн анх удаа Монгол улсад болов. Мөсөн өргөөд болсон тэмцээнд Монголын хоёр баг оролцсоноос The Mongolz буюу хуучнаар IHC Esports мажорт оролцох эрхээ авлаа.\r\n\r\nТодруулбал, CSGO тоглоомын сүүлчийн (Цаашид тоглоомын шинэ хувилбараар мажор тэмцээнүүд зохиогдоно) мажор \"BLAST.tv Paris Major 2023\" тавдугаар сарын 08-21-ний хооронд болно.\r\n\r\nТус тэмцээнд Ази тивээс хоёр баг оролцох эрхтэй. Хоёр эрхийн төлөөх \"Asia-Pacific RMR\" буюу Ази-Номхон далайн аварга шалгаруулах тэмцээн анх удаа Монгол улсад дөрвөн өдрийн турш болж өндөрлөв.\r\n\r\nҮүнд Монголын \"The MongolZ (IHC Esports багийн тоглогчид нэрээ сольсон)\", Eruption багууд оролцож нэг нь мажорын эрх авсан юм.\r\n\r\nThe MongolZ баг эхний эрхийн төлөөх тоглолтод Австралийн Grayhound багт 2-1 харьцаагаар хожигдсон ч хоёр дахь эрхийн төлөө Хятадын Rare Atom багийг 2-0 (Inferno 16-11, Mirage 16-11) харьцаагаар хожив. Багийн бүрэлдэхүүнээс blitz, Techno4K, ANNIHILATION болон дасгалжуулагч maaRaa нар өмнө хоёр удаагийн мажор тэмцээнд оролцож нэрээ мөнхөлсөн бол багийн сэлгээнээс гараанд шилжсэн Bart4k, шинэ хамтрагч hasteka нар анхны мажортоо оролцоно.\r\n\r\nХарин Eruption баг \"Lower Bracket Quarterfinals\" шатанд Ойрх Дорнодын \"Twisted Minds\" багт хожигдож тэмцээнээ дуусгасан юм.', 1, '2023-04-09 23:46:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_orignal_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `file_size` double DEFAULT NULL,
  `file_width` int(11) DEFAULT NULL,
  `file_height` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_name`, `file_orignal_name`, `file_type`, `file_size`, `file_width`, `file_height`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '4a575b0fbda385e46e7b7d7c3cb70543.png', 'fc-ub.png', 'image/png', 97.19, 100, 100, '2023-04-09 17:26:55', NULL, 0),
(2, 'c6edf6e74adb9055ea6f716358b9e36a.png', 'fc-ub.png', 'image/png', 97.19, 100, 100, '2023-04-09 17:31:21', '2023-04-09 17:31:27', 0),
(3, '1a1e4690f19686a1747d604a1733f0a6.png', 'DEREN.png', 'image/png', 101.3, 100, 100, '2023-04-09 17:32:01', NULL, 0),
(4, '66926d8d625f7583732a8fb2b8d683d6.png', 'sp-falcons-128x128.png', 'image/png', 20.31, 128, 128, '2023-04-09 17:32:23', NULL, 0),
(5, '5c292281843361f5bd03ba126a67eaef.png', '8-128x128.png', 'image/png', 19.27, 128, 128, '2023-04-09 17:32:43', NULL, 0),
(6, '5e72eb480bb0705674132c78965dd161.png', 'mff-logo-1.png', 'image/png', 138, 1000, 683, '2023-04-09 17:51:53', NULL, 0),
(7, '2679add3772bbd50bc367154f64a1be6.png', 'mff-logo-1.png', 'image/png', 138, 1000, 683, '2023-04-09 17:53:07', NULL, 0),
(8, '5da5125a3f69a3c0d1fc956c45449c18.png', 'mff-logo-1.png', 'image/png', 138, 1000, 683, '2023-04-09 17:54:17', NULL, 0),
(9, 'ee2cc2501008cca1f941b57c38a027a7.png', '8-128x128.png', 'image/png', 19.27, 128, 128, '2023-04-09 23:07:45', NULL, 0),
(10, '38ed55052d9ebf0c3ca19c3a7c505511.jpg', '304913-06042023-1680789823-476360283-340228720_2348185308695760_4865508775213754019_n.jpg', 'image/jpeg', 177.23, 1000, 666, '2023-04-09 23:28:18', '2023-04-09 23:33:00', 0),
(11, '2c591a5bb884a8f0937fb6ef2c0256eb.jpg', '304984-09042023-1681053688-1173393455-340465615_5796109623848874_5342844097288671476_n.jpg', 'image/jpeg', 211.17, 1000, 667, '2023-04-09 23:46:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `file_id`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'УЛААНБААТАР', 2, 1, 1, '2023-04-09 17:26:55', '2023-04-09 17:31:27'),
(3, 'ДЭРЭН', 3, 1, 2, '2023-04-09 17:32:01', NULL),
(4, 'БУЛГАН СП ФАЛКОНС', 4, 1, 3, '2023-04-09 17:32:23', NULL),
(5, 'ХААН ХҮНС – ЭРЧИМ', 5, 1, 4, '2023-04-09 17:32:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(999) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Battsooj', 'Davaasuren', 'admin@admin.com', 1, '$2y$10$3xPvL9LbH4lV/l9z9Klm1uj92p8lKZ/h1htWcgLKLvoVbBjPNUWIu', '2021-06-25 18:51:06', '2022-10-28 03:32:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
