-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2016 às 21:18
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `europeana`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `metadados`
--

CREATE TABLE IF NOT EXISTS `metadados` (
`id` int(11) NOT NULL,
  `metadados` text NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `metadados`
--

INSERT INTO `metadados` (`id`, `metadados`, `collection_id`) VALUES
(1, 'a:44:{i:0;s:2:"id";i:1;s:3:"ugc";i:2;s:12:"completeness";i:3;s:7:"country";i:4;s:23:"europeanaCollectionName";i:5;s:10:"dcLanguage";i:6;s:28:"edmConceptPrefLabelLangAware";i:7;s:13:"dcDescription";i:8;s:14:"edmLandingPage";i:9;s:22:"dcDescriptionLangAware";i:10;s:18:"dcSubjectLangAware";i:11;s:15:"dcTypeLangAware";i:12;s:10:"edmConcept";i:13;s:15:"edmConceptLabel";i:14;s:9:"timestamp";i:15;s:5:"title";i:16;s:12:"dataProvider";i:17;s:8:"provider";i:18;s:12:"edmIsShownAt";i:19;s:10:"edmPreview";i:20;s:14:"dctermsSpatial";i:21;s:13:"dcContributor";i:22;s:5:"score";i:23;s:19:"previewNoDistribute";i:24;s:16:"dcTitleLangAware";i:25;s:22:"dcContributorLangAware";i:26;s:19:"dcLanguageLangAware";i:27;s:6:"rights";i:28;s:21:"europeanaCompleteness";i:29;s:8:"language";i:30;s:4:"type";i:31;s:14:"edmDatasetName";i:32;s:4:"guid";i:33;s:4:"link";i:34;s:23:"timestamp_created_epoch";i:35;s:22:"timestamp_update_epoch";i:36;s:17:"timestamp_created";i:37;s:16:"timestamp_update";i:38;s:4:"year";i:39;s:9:"dcCreator";i:40;s:11:"edmTimespan";i:41;s:16:"edmTimespanLabel";i:42;s:25:"edmTimespanLabelLangAware";i:43;s:18:"dcCreatorLangAware";}', 5103),
(2, 'a:54:{i:0;s:2:"id";i:1;s:3:"ugc";i:2;s:12:"completeness";i:3;s:7:"country";i:4;s:23:"europeanaCollectionName";i:5;s:10:"dcLanguage";i:6;s:25:"edmPlaceAltLabelLangAware";i:7;s:13:"dcDescription";i:8;s:14:"edmLandingPage";i:9;s:22:"dcDescriptionLangAware";i:10;s:15:"dcTypeLangAware";i:11;s:8:"provider";i:12;s:5:"title";i:13;s:12:"dataProvider";i:14;s:9:"dcCreator";i:15;s:17:"edmPlaceLongitude";i:16;s:8:"edmPlace";i:17;s:13:"edmPlaceLabel";i:18;s:16:"edmPlaceLatitude";i:19;s:11:"edmTimespan";i:20;s:16:"edmTimespanLabel";i:21;s:13:"dcContributor";i:22;s:10:"edmPreview";i:23;s:5:"score";i:24;s:22:"edmPlaceLabelLangAware";i:25;s:25:"edmTimespanLabelLangAware";i:26;s:19:"previewNoDistribute";i:27;s:16:"dcTitleLangAware";i:28;s:18:"dcCreatorLangAware";i:29;s:22:"dcContributorLangAware";i:30;s:19:"dcLanguageLangAware";i:31;s:6:"rights";i:32;s:14:"dctermsSpatial";i:33;s:12:"edmIsShownAt";i:34;s:21:"europeanaCompleteness";i:35;s:9:"timestamp";i:36;s:8:"language";i:37;s:4:"type";i:38;s:14:"edmDatasetName";i:39;s:4:"link";i:40;s:4:"guid";i:41;s:23:"timestamp_created_epoch";i:42;s:22:"timestamp_update_epoch";i:43;s:17:"timestamp_created";i:44;s:16:"timestamp_update";i:45;s:18:"dcSubjectLangAware";i:46;s:4:"year";i:47;s:28:"edmConceptPrefLabelLangAware";i:48;s:10:"edmConcept";i:49;s:15:"edmConceptLabel";i:50;s:12:"edmIsShownBy";i:51;s:8:"edmAgent";i:52;s:13:"edmAgentLabel";i:53;s:22:"edmAgentLabelLangAware";}', 5128);

-- --------------------------------------------------------

--
-- Estrutura da tabela `metadados_tainacan`
--

CREATE TABLE IF NOT EXISTS `metadados_tainacan` (
`id` int(11) NOT NULL,
  `metadado` varchar(255) NOT NULL,
  `metadata_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `metadados_tainacan`
--

INSERT INTO `metadados_tainacan` (`id`, `metadado`, `metadata_id`, `collection_id`) VALUES
(1, 'id', 344, 5103),
(2, 'ugc', 345, 5103),
(3, 'completeness', 346, 5103),
(4, 'country', 347, 5103),
(5, 'europeanaCollectionName', 348, 5103),
(6, 'dcLanguage', 349, 5103),
(7, 'edmConceptPrefLabelLangAware', 350, 5103),
(8, 'dcDescription', 351, 5103),
(9, 'edmLandingPage', 352, 5103),
(10, 'dcDescriptionLangAware', 353, 5103),
(11, 'dcSubjectLangAware', 354, 5103),
(12, 'dcTypeLangAware', 355, 5103),
(13, 'edmConcept', 356, 5103),
(14, 'edmConceptLabel', 357, 5103),
(15, 'timestamp', 358, 5103),
(16, 'title', 359, 5103),
(17, 'dataProvider', 360, 5103),
(18, 'provider', 361, 5103),
(19, 'edmIsShownAt', 362, 5103),
(20, 'edmPreview', 363, 5103),
(21, 'dctermsSpatial', 364, 5103),
(22, 'dcContributor', 365, 5103),
(23, 'score', 366, 5103),
(24, 'previewNoDistribute', 367, 5103),
(25, 'dcTitleLangAware', 368, 5103),
(26, 'dcContributorLangAware', 369, 5103),
(27, 'dcLanguageLangAware', 370, 5103),
(28, 'rights', 371, 5103),
(29, 'europeanaCompleteness', 372, 5103),
(30, 'language', 373, 5103),
(31, 'type', 374, 5103),
(32, 'edmDatasetName', 375, 5103),
(33, 'guid', 376, 5103),
(34, 'link', 377, 5103),
(35, 'timestamp_created_epoch', 378, 5103),
(36, 'timestamp_update_epoch', 379, 5103),
(37, 'timestamp_created', 380, 5103),
(38, 'timestamp_update', 381, 5103),
(39, 'year', 382, 5103),
(40, 'dcCreator', 383, 5103),
(41, 'edmTimespan', 384, 5103),
(42, 'edmTimespanLabel', 385, 5103),
(43, 'edmTimespanLabelLangAware', 386, 5103),
(44, 'dcCreatorLangAware', 387, 5103),
(45, 'id', 391, 5128),
(46, 'ugc', 392, 5128),
(47, 'completeness', 393, 5128),
(48, 'country', 394, 5128),
(49, 'europeanaCollectionName', 395, 5128),
(50, 'dcLanguage', 396, 5128),
(51, 'edmPlaceAltLabelLangAware', 397, 5128),
(52, 'dcDescription', 398, 5128),
(53, 'edmLandingPage', 399, 5128),
(54, 'dcDescriptionLangAware', 400, 5128),
(55, 'dcTypeLangAware', 401, 5128),
(56, 'provider', 402, 5128),
(57, 'title', 403, 5128),
(58, 'dataProvider', 404, 5128),
(59, 'dcCreator', 405, 5128),
(60, 'edmPlaceLongitude', 406, 5128),
(61, 'edmPlace', 407, 5128),
(62, 'edmPlaceLabel', 408, 5128),
(63, 'edmPlaceLatitude', 409, 5128),
(64, 'edmTimespan', 410, 5128),
(65, 'edmTimespanLabel', 411, 5128),
(66, 'dcContributor', 412, 5128),
(67, 'edmPreview', 413, 5128),
(68, 'score', 414, 5128),
(69, 'edmPlaceLabelLangAware', 415, 5128),
(70, 'edmTimespanLabelLangAware', 416, 5128),
(71, 'previewNoDistribute', 417, 5128),
(72, 'dcTitleLangAware', 418, 5128),
(73, 'dcCreatorLangAware', 419, 5128),
(74, 'dcContributorLangAware', 420, 5128),
(75, 'dcLanguageLangAware', 421, 5128),
(76, 'rights', 422, 5128),
(77, 'dctermsSpatial', 423, 5128),
(78, 'edmIsShownAt', 424, 5128),
(79, 'europeanaCompleteness', 425, 5128),
(80, 'timestamp', 426, 5128),
(81, 'language', 427, 5128),
(82, 'type', 428, 5128),
(83, 'edmDatasetName', 429, 5128),
(84, 'link', 430, 5128),
(85, 'guid', 431, 5128),
(86, 'timestamp_created_epoch', 432, 5128),
(87, 'timestamp_update_epoch', 433, 5128),
(88, 'timestamp_created', 434, 5128),
(89, 'timestamp_update', 435, 5128),
(90, 'dcSubjectLangAware', 436, 5128),
(91, 'year', 437, 5128),
(92, 'edmConceptPrefLabelLangAware', 438, 5128),
(93, 'edmConcept', 439, 5128),
(94, 'edmConceptLabel', 440, 5128),
(95, 'edmIsShownBy', 441, 5128),
(96, 'edmAgent', 442, 5128),
(97, 'edmAgentLabel', 443, 5128),
(98, 'edmAgentLabelLangAware', 444, 5128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `metadados`
--
ALTER TABLE `metadados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadados_tainacan`
--
ALTER TABLE `metadados_tainacan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metadados`
--
ALTER TABLE `metadados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `metadados_tainacan`
--
ALTER TABLE `metadados_tainacan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
