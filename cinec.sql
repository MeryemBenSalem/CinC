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
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingSeat` varchar(12) NOT NULL,
  `bookingEmail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `bookingType` varchar(255) NOT NULL,
  `DATE-TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookingID`),
  UNIQUE KEY `bookingID` (`bookingID`),
  KEY `foreign_key_movieID` (`movieID`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
--

--
-- Table structure for table `movietable`
--

DROP TABLE IF EXISTS `movietable`;
CREATE TABLE IF NOT EXISTS `movietable` (
  `movieID` int NOT NULL AUTO_INCREMENT,
  `movieImg` varchar(20000) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `trailer` varchar(150) NOT NULL,
  `movieImgPAYSAGE` varchar(20000) NOT NULL,
  PRIMARY KEY (`movieID`),
  UNIQUE KEY `movieID` (`movieID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `description`, `trailer`, `movieImgPAYSAGE`) VALUES
(1, 'https://m.media-amazon.com/images/M/MV5BMzdjNjI5MmYtODhiNS00NTcyLWEzZmUtYzVmODM5YzExNDE3XkEyXkFqcGdeQXVyMTAyMjQ3NzQ1._V1_FMjpg_UX1000_.jpg', 'The Menu', 'Mystery ,Thriller', 221, '2022-11-18', ' Mark Mylod', 'Ralph Fiennes, Anya Taylor-Joy, Nicholas Hoult', 'Un couple se rend sur une île isolée pour dîner dans un des restaurants les plus en vogue du moment, en compagnie d’autres invités triés sur le volet. Le savoureux menu concocté par le chef va leur réserver des surprises aussi étonnantes que radicales...', 'https://www.youtube.com/embed/C_uTkUGcHv4', 'https://static1.colliderimages.com/wordpress/wp-content/uploads/2022/08/TM_TEASER_ONLINE_POSTER_1334x2000.jpg'),
(2, 'https://fr.web.img2.acsta.net/pictures/23/03/07/14/47/0511257.jpg', 'Luther', 'Mystery ,Drame, Judiciaire, Policier', 110, '2023-03-10', 'Jamie Payne', 'Idris Elba, Cynthia Erivo, Andy Serkis, Dermot Crowley','Hanté par un meurtre non résolu, John Luther, brillant policier londonien en disgrâce, s"évade de prison pour traquer un sinistre tueur en série.', 'https://www.youtube.com/embed/EGK5qtXuc1Q', 'https://www.heavenofhorror.com/wp-content/uploads/2023/03/luther-the-fallen-sun-netflix-review.jpg'),
(3, 'https://fr.web.img6.acsta.net/pictures/23/01/04/10/01/0755697.jpg', 'Evil Dead Rise', 'Mystery ,Epouvante-horreur, Fantastique', 110, '2023-04-19', 'Lee Cronin', 'Lily Sullivan, Alyssa Sutherland ,Morgan Davies ', 'Alors que Beth n’a pas vu sa grande sœur Ellie depuis longtemps, elle vient lui rendre visite à Los Angeles où elle élève, seule, ses trois enfants. Mais leurs retrouvailles tournent au cauchemar, quand elles découvrent un mystérieux livre dans le sous-sol de l’immeuble, dont la lecture libère des démons qui prennent possession des vivants...','https://www.youtube.com/embed/smTK_AeAPHs', 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/image/001/475/evil-dead-rise-photo-alyssa-sutherland-1475177.jpg'),
(4, 'https://global-img.gamergen.com/super-mario-bros-le-film-poster-03-02-2023_0901015412.jpg', 'Super Mario Bros', 'Animation ,Famille, Comédie', 105, '2023-04-05', 'Aaron Horvath,Michael Jelenic', 'Chris Pratt , Anya Taylor-Joy , Charlie Day , Jack Black', 'Alors qu’ils tentent de réparer une canalisation souterraine, Mario et son frère Luigi, tous deux plombiers, se retrouvent plongés dans un nouvel univers féerique à travers un mystérieux conduit. Mais lorsque les deux frères sont séparés, Mario s’engage dans une aventure trépidante pour retrouver Luigi.', 'https://www.youtube.com/embed/TnGl01FkMMo', 'https://i.ytimg.com/vi/TnGl01FkMMo/maxresdefault.jpg'),
(5, 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/Dune_%282021_film%29.jpg/220px-Dune_%282021_film%29.jpg', 'Dune', 'Science-fiction ,Drame', 132, '2023-05-25', 'Denis Villeneuve', 'Timothée Chalamet , Rebecca Ferguson , Oscar Isaac , Josh Brolin', 'L"histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s"il veut préserver l"avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l"univers – la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l"humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…', 'https://www.youtube.com/embed/n9xhJrPXop4', 'https://pyxis.nymag.com/v1/imgs/c71/982/5c698eb21bc1f089bf996427172539d9f9-Dune-2.jpg'),
(6, 'https://jvmag.ch/wp-content/uploads/2023/05/fast_x_ver3_xlg.jpg', 'FAST & FURIOUS X', 'Action', 107, '2019-05-17', 'Louis Leterrier', 'Vin Diesel ,Michelle Rodriguez ,Tyrese Gibson ,\nChris \"Ludacris\" Bridges ,John Cena', 'Après bien des missions et contre toute attente, Dom Toretto et sa famille ont su déjouer, devancer, surpasser et distancer tous les adversaires qui ont croisé leur route. Ils sont aujourd’hui face à leur ennemi le plus terrifiant et le plus intime : émergeant des brumes du passé, ce revenant assoiffé de vengeance est bien déterminé à décimer la famille en réduisant à néant tout ce à quoi, et surtout à qui Dom ait jamais tenu...', 'https://www.youtube.com/embed/eoOaKN4qCKw', 'https://i.ytimg.com/vi/fAfs4JkeN78/maxresdefault.jpg'),
(7, 'https://m.media-amazon.com/images/M/MV5BNjI4ZTQ1OTYtNTI0Yi00M2EyLThiNjMtMzk1MmZlOWMyMDQwXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_.jpg', 'Death On The Nile', 'Mystery , Policier, Thriller', 90, '2022-10-22', 'Kenneth Branagh', '\r\nTom Bateman,Annette Bening,Kenneth Branagh', 'Au cours d’une luxueuse croisière sur le Nil, ce qui devait être une lune de miel idyllique se conclut par la mort brutale de la jeune mariée. Ce crime sonne la fin des vacances pour le détective Hercule Poirot. A bord en tant que passager, il se voit confier l’enquête par le capitaine du bateau. Et dans cette sombre affaire d’amour obsessionnel aux conséquences meurtrières, ce ne sont pas les suspects qui manquent ! S’ensuivent une série de rebondissements et de retournements de situation qui, sur fond de paysages grandioses, vont peu à peu déstabiliser les certitudes de chacun jusqu’à l’incroyable dénouement !', 'https://www.youtube.com/embed/dZRqB0JLizw', 'https://www.denofgeek.com/wp-content/uploads/2022/04/Suspects-in-Death-on-the-Nile-Ending.jpg?fit=1280%2C720'),
(8, 'https://fr.web.img3.acsta.net/pictures/23/03/16/10/38/2432777.jpg', 'Murder Mystery 2', ' Comédie, Policier', 110, '2023-03-23', 'Jeremy Garelick', 'Jennifer Aniston, Adam Sandler, James Vanderbilt', 'Désormais soucieux de faire décoller leur propre agence, les détectives Nick et Audrey Spitz se retrouvent au cœur d"un enlèvement de niveau international, qui les touche de près.', 'https://www.youtube.com/embed/LM2F56uK0fs', 'https://www.whats-on-netflix.com/wp-content/uploads/2023/01/murder-mystery-2-netflix-movie-min-jpg.webp'),
(9, 'https://fr.web.img6.acsta.net/pictures/21/10/21/15/41/2023058.jpg', 'Red Notice', ' Action, Aventure, Policier', 220, '2022-10-10', 'Rawson Marshall Thurber ', 'Dwayne Johnson ,Ryan Reynolds , Gal Gadot', 'Lorsqu’Interpol déclenche une Alerte Rouge – destinée à traquer et capturer les criminels les plus recherchés au monde –, le FBI fait appel à son meilleur profiler, John Hartley. Il sillonne la planète jusqu’au jour où il se retrouve embarqué dans un braquage spectaculaire et contraint de s’associer au plus grand voleur d’œuvres d’art au monde Nolan Booth pour… arrêter la voleuse d’œuvres d’art la plus recherchée au monde, « le Fou ».', 'https://www.youtube.com/embed/Pj0wz7zu3Ms', 'https://occ-0-33-325.1.nflxso.net/dnm/api/v6/6AYY37jfdO6hpXcMjf9Yu5cnmO0/AAAABVkcDtE1_UaJBGFQUfxakjzhYdT1L4kso24uZS0ASl_faURPBSGzY_Mxbx1KEcNbZr3ZqCatG-0zi2k3L4oBXenznQrrROKJQqdu.jpg?r=590'),
(10, 'https://m.media-amazon.com/images/M/MV5BNDE2ODVmNGMtOGI3Zi00ODNjLTg5ZmUtNzAxNjQ4M2FjNzlkXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg', 'The Man From Toronto', 'Action , Comedy', 200, '2022-10-18', 'APatrick Hughes', 'Kevin Hart , Woody Harrelson', 'Une erreur sur la personne oblige un entrepreneur empoté à collaborer avec un assassin notoire surnommé "l"homme de Toronto", dans le faible espoir de sauver sa peau.', 'https://www.youtube.com/embed/urqy8DrcGBs', 'https://variety.com/wp-content/uploads/2022/06/The-Man-from-Toronto.jpg'),
(11, 'https://m.media-amazon.com/images/M/MV5BNGMzYWZlYmYtNTcyMC00ZGVjLThjN2ItMjY4MjkwN2NlMjYwXkEyXkFqcGdeQXVyOTU0NjY1MDM@._V1_FMjpg_UX1000_.jpg', 'Ghosted', ' Comédie, Romance, Action', 120, '2023-04-23', 'Dexter Fletcher', 'Chris Evans, Ana de Armas, Adrien Brody', 'Lorsque Cole tombe follement amoureux de la mystérieuse Sadie, il est loin de se douter qu’elle est en réalité un agent secret. Alors que Cole est bien décidé à revoir Sadie, ils sont soudain entraînés dans une aventure pour sauver le monde.', 'https://www.youtube.com/embed/IAdCsNtEuBU', 'https://thumb.canalplus.pro/http/unsafe/1440x810/filters:quality(80)/media.prod.hawc.canal.aws.io-cplus.net/790bf125f5e8c72f8e4b97052fb1151d.jpg');

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
