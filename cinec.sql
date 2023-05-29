-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2023 at 03:01 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `password`) VALUES
(1, 'Meryem', 'Meryem', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

DROP TABLE IF EXISTS `bookingtable`;
CREATE TABLE IF NOT EXISTS `bookingtable` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `movieID` int DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingPNumber` varchar(12) NOT NULL,
  `bookingEmail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ORDERID` varchar(255) NOT NULL,
  `DATE-TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookingID`),
  UNIQUE KEY `bookingID` (`bookingID`),
  KEY `foreign_key_movieID` (`movieID`),
  KEY `foreign_key_ORDERID` (`ORDERID`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`, `amount`, `ORDERID`, `DATE-TIME`) VALUES
(71, 6, 'private-hall', 'imax', '14-3', '15-00', 'xyz', 'abc', '000000000', '000@gmail.com', '30', 'cash', '2020-12-14 12:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

DROP TABLE IF EXISTS `feedbacktable`;
CREATE TABLE IF NOT EXISTS `feedbacktable` (
  `msgID` int NOT NULL AUTO_INCREMENT,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`msgID`),
  UNIQUE KEY `msgID` (`msgID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

DROP TABLE IF EXISTS `movietable`;
CREATE TABLE IF NOT EXISTS `movietable` (
  `movieID` int NOT NULL AUTO_INCREMENT,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `mainhall` int NOT NULL,
  `viphall` int NOT NULL,
  `privatehall` int NOT NULL,
  PRIMARY KEY (`movieID`),
  UNIQUE KEY `movieID` (`movieID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `mainhall`, `viphall`, `privatehall`) VALUES
(1, 'https://m.media-amazon.com/images/M/MV5BMzdjNjI5MmYtODhiNS00NTcyLWEzZmUtYzVmODM5YzExNDE3XkEyXkFqcGdeQXVyMTAyMjQ3NzQ1._V1_FMjpg_UX1000_.jpg', 'The Menu', 'Mystery', 221, '2022-11-18', ' Mark Mylod', 'Ralph Fiennes, Anya Taylor-Joy, Nicholas Hoult', 0, 0, 0),
(2, 'https://fr.web.img2.acsta.net/pictures/23/03/07/14/47/0511257.jpg', 'Luther', 'Mystery', 110, '2023-03-10', 'Jamie Payne', 'Idris Elba, Cynthia Erivo, Andy Serkis, Dermot Crowley', 0, 0, 0),
(3, 'https://fr.web.img6.acsta.net/pictures/23/01/04/10/01/0755697.jpg', '\r\nEvil Dead Rise', 'Mystery', 110, '2023-04-19', 'Lee Cronin', 'Lily Sullivan, Alyssa Sutherland ,Morgan Davies ', 0, 0, 0),
(4, 'https://global-img.gamergen.com/super-mario-bros-le-film-poster-03-02-2023_0901015412.jpg', 'Super Mario Bros', 'Animation', 105, '2023-04-05', 'Aaron Horvath,Michael Jelenic', 'Chris Pratt , Anya Taylor-Joy , Charlie Day , Jack Black', 0, 0, 0),
(5, 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/articles/001/388/482/dune-affiche-horizontale-1388487-large.jpg', 'Dune', 'Science-fiction', 132, '2023-05-25', 'Denis Villeneuve', 'Timothée Chalamet , Rebecca Ferguson , Oscar Isaac , Josh Brolin', 0, 0, 0),
(6, 'https://upload.wikimedia.org/wikipedia/en/f/f2/Fast_X_poster.jpg', 'Fast X', 'Action', 107, '2019-05-17', 'Louis Leterrier', 'Vin Diesel ,Michelle Rodriguez ,Tyrese Gibson ,\nChris \"Ludacris\" Bridges ,John Cena', 0, 0, 0),
(7, 'https://w0.peakpx.com/wallpaper/143/903/HD-wallpaper-movie-death-on-the-nile-2022-emma-mackey-gal-gadot.jpg', 'Death On The Nile', 'Mystery', 90, '2022-10-22', 'Kenneth Branagh', '\r\nTom Bateman,Annette Bening,Kenneth Branagh', 0, 0, 0),
(8, 'https://media2.ledevoir.com/images_galerie/nwd_1482328_1136276/image.jpg', 'Murder Mystery 2', 'Comedy', 110, '2023-03-23', 'Jeremy Garelick', 'Jennifer Aniston, Adam Sandler, James Vanderbilt', 0, 0, 0),
(9, 'https://staticg.sportskeeda.com/editor/2021/11/ed532-16366147619013-1920.jpg', 'Red Notice', ' Action ', 220, '2022-10-10', 'Rawson Marshall Thurber ', 'Dwayne Johnson ,Ryan Reynolds , Gal Gadot', 0, 0, 0),
(10, 'https://s3.amazonaws.com/yomzansi.com/wp-content/uploads/2022/06/27084849/yomzansi-kevin-hart-man-from-toronto.jpg', 'The Man From Toronto', ' Comedy', 200, '2022-10-18', 'APatrick Hughes', 'Kevin Hart , Woody Harrelson', 0, 0, 0),
(11, 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/articles/001/475/605/ghosted-photo-ana-de-armas-chris-evans-1475609-large.jpg', 'Ghosted', 'Mystery', 120, '2023-04-23', 'Dexter Fletcher', 'Chris Evans, Ana de Armas, Adrien Brody', 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `foreign_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movietable` (`movieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
