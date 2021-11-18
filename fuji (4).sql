-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2021 at 11:11 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuji`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `Album_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Genre` int(11) NOT NULL,
  `Cover_art` varchar(150) NOT NULL,
  `Date` date DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Artist_ID` int(11) NOT NULL,
  PRIMARY KEY (`Album_ID`),
  UNIQUE KEY `Artist` (`Album_ID`),
  KEY `Artist_ID` (`Artist_ID`),
  KEY `Genre` (`Genre`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`Album_ID`, `Title`, `Description`, `Genre`, `Cover_art`, `Date`, `Active`, `Artist_ID`) VALUES
(1, 'test', '12', 5, '10_10_2021-18-52_04afb5631f2111b342feb1a378979dfb75.jpg', NULL, NULL, 0),
(2, 'test', '12', 4, '10_10_2021-18-54_47afb5631f2111b342feb1a378979dfb75.jpg', NULL, NULL, 0),
(3, '123', '3123', 2, '10_10_2021-20-53_27download.png', NULL, NULL, 0),
(4, '123', '3123', 1, '10_10_2021-20-53_33download.png', NULL, NULL, 0),
(5, '123', '3123', 6, '10_10_2021-20-53_57download.png', NULL, NULL, 0),
(6, 'playboy', '123', 4, '10_10_2021-20-59_50playboy-400x396-4.jpg', NULL, NULL, 0),
(7, 'Playboy', '123', 5, '10_10_2021-21-00_30playboy-400x396-4.jpg', '2021-11-17', 1, 3),
(8, 'Call me if you get lost', '', 2, '10_17_2021-23-19_50ab67616d0000b273696b4e67423edd64784bfbb4.jpg', NULL, 1, 5),
(9, 'Playboy', '', 1, '10_17_2021-23-34_55playboy-400x396-4.jpg', NULL, 1, 0),
(10, 'Certified Lover Boy', '', 4, '10_18_2021-00-01_40Drake-Certified-Lover-Boy-1630334465.jpeg', NULL, 1, 6),
(11, 'Flower boy', '', 2, '10_18_2021-11-55_07ab67616d0000b2738940ac99f49e44f59e6f7fb3.jpg', NULL, 1, 5),
(12, 'Igor', '', 2, '10_18_2021-11-59_3960712a7b6cbcc792502d877fb9a170c5.1000x1000x1.jpg', NULL, 1, 5),
(13, '1243234', '234234', 3, '10_18_2021-12-52_1260712a7b6cbcc792502d877fb9a170c5.1000x1000x1.jpg', NULL, NULL, 5),
(14, '1243234', '234234', 3, '10_18_2021-12-57_5760712a7b6cbcc792502d877fb9a170c5.1000x1000x1.jpg', NULL, NULL, 5),
(15, 'dwadw', 'awdawd', 2, '10_18_2021-12-58_06Drake-Certified-Lover-Boy-1630334465.jpeg', NULL, NULL, 5),
(23, 'test', 'awdadwd', 1, '10_18_2021-19-44_25download20211006011636.png', NULL, NULL, 5),
(24, 'Someboy', '', 1, '10_25_2021-12-25_18ab67616d0000b2736ca58463f6ae71fe4ed8e93d.jpg', NULL, 1, 9),
(25, 'always', '', 1, '10_30_2021-00-04_2685miik-always-preview-m3.jpg', NULL, 1, 9),
(26, 'Shoot For The Stars Aim For The Moon', '', 3, '11_04_2021-21-06_52ab67616d0000b27377ada0863603903f57b34369.jpg', NULL, 1, 11),
(27, 'Meet The Woo', '', 2, '11_04_2021-21-09_52ab67616d0000b2738fe5d04b06aff90f9fe796f5.jpg', NULL, 1, 11),
(28, 'Die Lit', '', 2, '11_06_2021-12-38_34ab67616d0000b273a1e867d40e7bb29ced5c0194.jpg', NULL, 1, 12),
(29, 'Whole Lotta Red', '', 2, '11_06_2021-17-47_08ab67616d0000b27398ea0e689c91f8fea726d9bb.jpg', NULL, 1, 12),
(30, 'Legends Never Die', '', 2, '11_06_2021-20-59_4881hF73Kv9GL._AC_SY450_.jpg', NULL, 1, 13),
(31, 'To Pimp A Butterfly', '', 2, '11_07_2021-14-23_13Kendrick-Lamar-To-Pimp-A-Butterfly-album-cover-web-optimised-820.jpg', NULL, 1, 16),
(32, 'Stokeley', '', 2, '11_10_2021-23-40_37ab67616d0000b273e62c8561e3b1bd9ad952ce01.jpg', '2021-11-11', 1, 17),
(33, 'Astro World', '', 2, '11_15_2021-15-13_14550x550.jpg', NULL, NULL, 18),
(34, 'Astro World', '', 2, '11_15_2021-15-16_41550x550.jpg', '2021-11-15', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `Genre_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Genre_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_ID`, `Name`) VALUES
(1, 'Rnb'),
(2, 'Rap'),
(3, 'Pop'),
(4, 'EDM'),
(5, 'Jazz'),
(6, 'Rock'),
(7, 'Country'),
(8, 'Classical'),
(9, 'Rock'),
(10, 'Punk'),
(11, 'Christian'),
(12, 'Latin'),
(13, 'Blues');

-- --------------------------------------------------------

--
-- Table structure for table `highlightedalbums`
--

DROP TABLE IF EXISTS `highlightedalbums`;
CREATE TABLE IF NOT EXISTS `highlightedalbums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ALBUM_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highlightedalbums`
--

INSERT INTO `highlightedalbums` (`ID`, `ALBUM_ID`) VALUES
(1, 25),
(2, 24),
(3, 10),
(4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `Song_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Album` int(11) DEFAULT NULL,
  `Artist` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `File` varchar(120) NOT NULL,
  PRIMARY KEY (`Song_ID`),
  KEY `Album` (`Album`),
  KEY `Artist` (`Artist`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`Song_ID`, `Album`, `Artist`, `Title`, `File`) VALUES
(1, NULL, 9, 'Yaosobi', '10_29_2021-18-41_20YOASOBI_YoruniKakeruã€ VocalOnlyã€‘.mp3'),
(4, NULL, 9, 'rdrhdrh', '10_29_2021-18-45_23ultron- 808.wav'),
(5, NULL, 9, 'Test', '11_03_2021-19-39_29Killing Me Softly With His Song.mp3'),
(6, NULL, 9, 'yrty', '11_03_2021-19-41_58eaJ x keshi - pillows (lyrics).mp3'),
(7, NULL, 9, 'g', '11_03_2021-19-42_59anarchyclip.wav'),
(8, NULL, 9, 'g', '11_03_2021-19-44_25anarchyclip.wav'),
(9, NULL, 9, 'g', '11_03_2021-19-44_28anarchyclip.wav'),
(10, NULL, 9, 'dawdawd', '11_03_2021-19-44_40anarchyclip.wav'),
(11, NULL, 9, 'dawdawd', '11_03_2021-19-44_48anarchyclip.wav'),
(12, NULL, 9, 'dawdawd', '11_03_2021-19-44_49anarchyclip.wav'),
(13, NULL, 9, 'dawdawd', '11_03_2021-19-44_49anarchyclip.wav'),
(14, NULL, 9, 'dawdawd', '11_03_2021-19-45_12anarchyclip.wav'),
(15, NULL, 9, 'dawdawd', '11_03_2021-19-45_19anarchyclip.wav'),
(16, NULL, 9, 'dawdawd', '11_03_2021-19-45_19anarchyclip.wav'),
(17, NULL, 9, 'dawdawd', '11_03_2021-19-45_19anarchyclip.wav'),
(18, NULL, 9, 'dawdawd', '11_03_2021-19-45_20anarchyclip.wav'),
(19, NULL, 9, 'test', '11_03_2021-19-45_28'),
(20, NULL, 9, 'test', '11_03_2021-19-45_30'),
(21, NULL, 11, 'test', '11_06_2021-12-19_5610_18_2021-19-20_15brockhampton type beat.wav_vocals.mp3'),
(22, NULL, 11, 'kh', '11_06_2021-12-32_47anarchyclip.wav'),
(23, NULL, 12, 'dontcare', '11_07_2021-11-16_52Drake fair trade F_MINOR 154BPM.wav'),
(24, NULL, 18, 'boeie', '11_15_2021-15-25_47Pissy Pamper.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Profile_Image` varchar(100) NOT NULL DEFAULT 'Default_Profile.jpg',
  `Summary` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Email`, `Password`, `Admin`, `Profile_Image`, `Summary`) VALUES
(1, 'test', 'thijmtang2003@gmail.com', '$2y$10$jiHrnJO5MtLBY9pVkjK6Uuf3OIDp6sqckGGquW9v.O9U/bmnmm2re', 0, 'Default_Profile.jpg', NULL),
(2, 'test', 'test@gmail.com', '$2y$10$u.Y8Uq9yn2QrExWpS5k70.aSS88GCfLhWP1ieeRWfhdso69LTzczO', 0, 'Default_Profile.jpg', NULL),
(3, 'Tory Lanez', 'Torylanez@gmail.com', '$2y$10$nVYpk5XVNW8AEgMGxEiYveS8DNX11PAd492cMv3ouuBXB9qx5dSV.', 0, 'torylanezprofilepic.jpg', NULL),
(4, 'Lil Tecca', 'Teccaworld@gmail.com', '$2y$10$4hR6uG8JEpgYV/BqgTQB6erwO.CgwcWAYzEQnTNwnE.dBYvclz4.u', 0, 'Default_Profile.jpg', NULL),
(5, 'Tyler, the Creator', 'tylercreator@gmail.com', '$2y$10$nVYpk5XVNW8AEgMGxEiYveS8DNX11PAd492cMv3ouuBXB9qx5dSV.', 0, 'Tyler,_The_Creator.jpg', NULL),
(6, 'Drake', 'certifiedboylover@gmail.com', '$2y$10$bdT2fa523IuACwpwkg79HujQIDqsE2fmSy3kku5BTa1klTWPfSvUK', 0, '11_04_2021-19-37_19b8b.jpg', 'Certified boy lover'),
(7, 'Kanye West', 'Kanye@gmail.com', '$2y$10$WdYvANBids79D8Qnsp72t.1d00RCayuOT/Xhgq0LY2RUiJsjAKJnW', 0, 'Default_Profile.jpg', NULL),
(8, 'aawd', 'awda@gmail.com', '$2y$10$kmm2uer.1fRor4LR8YDzcOXluAP98nG2pHCW2wcQBaDhmxeXOeBly', 0, 'Default_Profile.jpg', NULL),
(9, 'Keshi', 'keshi@gmail.com', '$2y$10$FcwLYoIvLM2FMbawYG9f3uEPseZQ1xvQqrLLcAMIZoA4W..dgi5Vy', 0, '11_07_2021-12-10_49ab6761610000e5ebd969cf117d0b0d4424bebdc5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(11, 'Pop Smoke', 'Woo@gmail.com', '$2y$10$YAne9t2qDPiaQYJn49ddRukUz.jKoTK6Be0/T584jHhVN/AlDBx1G', 0, '11_04_2021-21-08_241024.jpeg', 'Known for his breakout single \"Welcome to the Party,\" Brooklyn\'s Pop Smoke combined gravelly vocals with erratic production to become the face of Brooklyn\'s rising drill scene. Within just a year of his debut, he made a rapid rise in the mainstream, landing in the Top Ten with sophomore mixtape Meet the Woo, Vol. 2. Tragically, soon after achieving this chart peak, he was gunned down on February 19, 2020.\r\n\r\n'),
(12, 'Playboi Carti', 'kingcarti@gmail.com', '$2y$10$3dKiveC/wdles0cWhu7n/urF5iIZbUzosJelGzq0KpC8hxXQ.Cs.S', 0, '11_06_2021-12-39_11ab67706c0000bebb5bfb0b39b7cb893a46d39351.jpg', 'Yee3+t sl44tt C4rTii\r\n\r\n<a href =\"index.php\">aa</a>'),
(13, 'Juice WRLD', '999@gmail.com', '$2y$10$KVmhDh5uGkPGHrUkuDZ7Bu.byZT0inWuAbMVaPuvhslXL1inSkyQW', 0, '11_06_2021-18-58_5381hF73Kv9GL._AC_SY450_.jpg', ''),
(14, 'Brockhampton', 'Brockhampton@gmail.com', '$2y$10$d0tMG8HR2NZ5ATvjYEdCuOtyOFgi8JJd0qWuABvDFMDk8c226y5fO', 0, '11_06_2021-21-46_36Pearce-BrockhamptonPandemic.jpg', 'Best boyband'),
(15, 'admin', 'admin@gmail.com', '$2y$10$7xr00/sf6i/AKc17P5yQ1eI6gbr5RywLc09zoZDW678topIHa8Itm', 1, '11_07_2021-12-45_57Donkey_Kong_character.png', ''),
(16, 'Kendrick Lamar', 'KendrickLamar@gmail.com', '$2y$10$aNrK6Oxqg85P6.5oxv/a/.po6UvgrBnxw2NQDWrfBslfO1f5Pc3e.', 0, '11_08_2021-13-31_57ab6761610000e5eb2183ea958d3777d4c485138a.jpg', ''),
(17, 'Ski Mask The Slump God', 'skimask@gmail.com', '$2y$10$cnMLiY00tuR9kMibZERgpOkRBAPksjq9YNOIfk0PzEIO/mqlHuCP.', 0, '11_10_2021-23-40_06ab6761610000e5ebc422e139e232c73565c7c3d6.jpg', 'Suckkiii'),
(18, 'Travis Scott', 'cactus@gmail.com', '$2y$10$xmqb.kXzU/817bTKQfTxwet6FjlLQFT.LSS8v0OkiQW4Zn8ivfo7G', 0, '11_15_2021-15-12_595d6aef6f1513c5e4ff365e989e5c772c.jpg', 'Its lit');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`Genre`) REFERENCES `genre` (`Genre_ID`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`Album`) REFERENCES `album` (`Album_ID`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`Artist`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
