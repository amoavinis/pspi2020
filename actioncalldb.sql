-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 03:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actioncalldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `user_email` varchar(64) NOT NULL,
  `post_id` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interested`
--

INSERT INTO `interested` (`user_email`, `post_id`) VALUES
('testemail3@test.email', 00000000001),
('testemail3@test.email', 00000000002),
('testemail3@test.email', 00000000004),
('testemail4@test.email', 00000000002),
('testemail5@test.email', 00000000003);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `title` varchar(250) NOT NULL,
  `details` text DEFAULT NULL,
  `date_posted` datetime NOT NULL,
  `date_of_event` datetime NOT NULL,
  `city` enum('Athens','Thessaloniki','Patras','Larissa','Heraklion','Peristeri','Kallithea','Acharnes','Kalamaria','Nikaia','Glyfada','Evosmos','Chalandri','Nea Smyrni','Marousi','Agios Dimitrios','Zografou','Egaleo','Nea Ionia','Ioannina','Palaio Faliro','Korydallos','Trikala','Vyronas','Agia Paraskevi','Galatsi','Agrinio','Chalcis','Petroupoli','Serres','Alexandroupoli','Xanthi','Katerini','Kalamata','Kavala','Chania','Lamia','Drama','Veria','Alimos','Kozani','Polichni','Karditsa','Sykies','Ampelokipoi','Pylaia','Agioi Anargyroi','Argyroupoli','Ano Liosia','Nea Ionia','Rethymno','Ptolemaida','Tripoli','Cholargos','Vrilissia','Aspropyrgos','Corinth','Gerakas','Metamorfosi','Giannitsa','Voula','Kamatero','Mytilene','Neapoli','Eleftherio-Kordelio','Chios','Agia Varvara','Kaisariani','Nea Filadelfeia','Moschato','Perama','Salamina','Eleusis','Corfu','Pyrgos','Megara','Kilkis','Dafni','Thebes','Melissia','Argos','Arta','Artemida','Livadeia','Pefki','Oraiokastro','Aigio','Kos','Koropi','Preveza','Naousa','Orestiada','Peraia','Edessa','Florina','Nea Erythraia','Elliniko','Amaliada','Pallini','Sparta','Agios Ioannis Rentis','Thermi','Vari','Nea Makri','Tavros','Alexandreia','Menemeni','Paiania','Kalyvia Thorikou','Nafplio','Drapetsona','Efkarpia','Papagou','Nafpaktos','Kastoria','Grevena','Pefka','Nea Alikarnassos','Missolonghi','Gazi','Ierapetra','Kalymnos','Rafina','Loutraki','Agios Nikolaos','Ermoupoli','Ialysos','Mandra','Tyrnavos','Glyka Nera','Ymittos','Neo Psychiko','') NOT NULL COMMENT 'All greek cities listed in https://simple.wikipedia.org/wiki/List_of_cities_in_Greece',
  `geolocation` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_email`, `title`, `details`, `date_posted`, `date_of_event`, `city`, `geolocation`) VALUES
(00000000001, 'testemail2@test.email', 'Post_Title_#1', '', '2020-05-07 19:04:36', '2020-05-09 20:32:31', 'Thessaloniki', 0x000000000101000000fbff0b54abf64b4008004099c05a0ac0),
(00000000002, 'testemail2@test.email', 'White Tower', '', '2020-05-07 19:04:36', '2020-05-09 20:32:31', 'Thessaloniki', 0x000000000101000000cfbbb1a030504440d255babbcef23640),
(00000000003, 'testemail2@test.email', 'Alexander the Great\'s Statue', '', '2020-05-07 19:04:36', '2020-05-10 20:32:31', 'Thessaloniki', 0x0000000001010000001669e21de04f4440795a7ee02af33640),
(00000000004, 'testemail3@test.email', 'Ancient Roman Agora', '', '2020-05-07 19:04:36', '2020-05-09 10:23:15', 'Thessaloniki', 0x000000000101000000f984ecbc8d5144401e87c1fc15f23640);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL COMMENT 'hash256',
  `authority` set('administrator','simple') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `authority`) VALUES
('testemail1@test.email', 'test_username1', 'test_password1', 'simple'),
('testemail2@test.email', 'test_username2', 'test_password2', 'simple'),
('testemail3@test.email', 'test_username3', 'test_password3', 'simple'),
('testemail4@test.email', 'test_username4', 'test_password4', 'simple'),
('testemail5@test.email', 'test_username5', 'test_password5', 'simple'),
('testemail6@test.email', 'testsimple', '8e7a4a6e5ff1034956dfebed82ff7857473eea859badcb7b33a0697367e87a32', 'simple');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD KEY `user_email` (`user_email`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interested`
--
ALTER TABLE `interested`
  ADD CONSTRAINT `interested_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interested_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
