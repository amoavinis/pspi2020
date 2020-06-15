-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Ιουν 2020 στις 12:25:18
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `actioncalldb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `interested`
--

CREATE TABLE `interested` (
  `user_email` varchar(64) NOT NULL,
  `post_id` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `interested`
--

INSERT INTO `interested` (`user_email`, `post_id`) VALUES
('testemail3@test.email', 00000000001),
('testemail3@test.email', 00000000002),
('testemail3@test.email', 00000000004),
('testemail4@test.email', 00000000002),
('testemail5@test.email', 00000000003),
('testemail6@test.email', 00000000002),
('testemail6@test.email', 00000000003);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `organizations`
--

CREATE TABLE `organizations` (
  `name` varchar(100) NOT NULL,
  `url` varchar(400) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `organizations`
--

INSERT INTO `organizations` (`name`, `url`, `latitude`, `longitude`, `type`) VALUES
('ΦΙΛΟΖΩΙΚΟΣ ΣΥΛΛΟΓΟΣ ΧΙΟΥ', 'http://chiosanimalwelfare.weebly.com/', 38.3758, 26.0647, 'filozoiki'),
('Εθελοντές Φιλόζωοι Πτολεμαΐδας', 'http://ethelontesfilozoiptolemaidas.simplesite.com/', 40.5122, 21.6786, 'filozoiki'),
('Γνωρίζω Αγαπάω Φροντίζω (ΓΑΦ)', 'http://gaf-lcp.org/', 37.3281, 23.1438, 'filozoiki'),
('Φιλοζωικό Σωματείο \"ΚΙΒΩΤΟΣ\" Αλεξανδρούπολη', 'http://kivotosalexpolis.gr/', 40.8457, 25.8753, 'filozoiki'),
('ΜΚΟ Αποστολή', 'http://mkoapostoli.com/', 0, 0, 'syssitio'),
('Ο άλλος άνθρωπος', 'http://oallosanthropos.blogspot.com/', 0, 0, 'syssitio'),
('Sitia Animal Rescue', 'http://sitia-animal-rescue.gr/', 35.2066, 26.105, 'filozoiki'),
('Φιλοζωικό Σωματείο Λήμνου \"Αδέσποτες Ψυχές\"', 'http://straysoulslemnos.weebly.com/', 39.8757, 25.0611, 'filozoiki'),
('Καταφύγιο Αδέσποτων Ζώων Σύρου / Syros Stray Animal Shelter', 'http://syrosshelter.com/', 37.4446, 24.9423, 'filozoiki'),
('ARTEMIS, Πολιτιστικό & Φιλοζωικό Εθελοντικό Σωμ. Ν. Τρικάλων', 'http://www.artemis-taas.org/', 39.5561, 21.7679, 'filozoiki'),
('Ανακύκλωση συσκευών', 'http://www.electrocycle.gr/', 0, 0, 'recycle'),
('Φιλοζωικός Σύλλογος Καλαμπάκας \"Η ΣΤΕΓΗ\"', 'http://www.istegi.org/', 39.707, 21.6279, 'filozoiki'),
('Ζακυνθινός Όμιλος Μέριμνας Ζώων', 'http://www.zawf.gr/', 37.7545, 20.9149, 'filozoiki'),
('\"ΑγγίΖωο\" Φιλοζωικό σωματείο Κοζάνης', 'https://aggizwofilozwiko.blogspot.com/search/label/gr', 40.3007, 21.7883, 'filozoiki'),
('ΦΙΛΟΖΩΙΚΟΣ ΠΟΛΙΤΙΣΤΙΚΟΣ ΣΥΛΛΟΓΟΣ ΦΥΛΗΣ \"ΑΓΑΠΑΖΩ\"', 'https://bit.ly/2XdtSyf', 38.1024, 23.6683, 'filozoiki'),
('ΣΥΛΛΟΓΟΣ ΠΡΟΣΤΑΣΙΑΣ ΖΩΩΝ Ι.Π.ΜΕΣΟΛΟΓΓΙΟΥ \"Η ΕΛΠΙΔΑ\"', 'https://el-gr.facebook.com/protectstray/', 38.3686, 21.4284, 'filozoiki'),
('Equal Society κοινωνικό φαρμακείο', 'https://equalsociety.gr/el/epikairotita/draseis-organismou/koinoniko-farmakeio', 37.9839, 23.7283, 'farmakeio'),
('Equal Society κοινωνικό συσσίτιο', 'https://equalsociety.gr/el/epikairotita/draseis-organismou/koinoniko-sisitio-anthropon-geumata', 37.9839, 23.7283, 'syssitio'),
('Φιλoζωική Ένωση Νέας Ιωνίας (Φ.Ε.Ν.Ι)', 'https://fenineasionias.blogspot.com/', 38.0393, 23.7576, 'filozoiki'),
('Πολιτιστικός Φιλοζωϊκός Σύλλογος Τρίπολης', 'https://filtripoli.blogspot.com/', 37.4163, 22.7644, 'filozoiki'),
('Φιλοζωικός Σύλλογος Αιγιάλειας \"Τα Φιλαράκια\"', 'https://fsa-strayanimalsgreece.gr/', 38.1541, 22.314, 'filozoiki'),
('ΦΙΛΟΖΩΙΚΗ ΠΑΡΕΜΒΑΣΗ ΕΛΛΗΝΙΚΟΥ ΑΡΓΥΡΟΥΠΟΛΗΣ', 'https://goo.gl/hfLDHA', 37.906, 23.7504, 'filozoiki'),
('Φιλοζωική Ομάδα Πανεπιστημίου Ιωαννίνων', 'https://goo.gl/l8jE9h', 39.664, 20.8523, 'filozoiki'),
('Φιλοζωϊκό και Πολιτιστικό Σωματείο Π.Φαλήρου', 'https://goo.gl/X9xy4r', 37.9302, 23.7002, 'filozoiki'),
('Αδελφότητα Ορθοδόξου Εξωτερικής Ιεραποστολής', 'https://ierapostoles.gr/%CF%80%CF%81%CE%BF%CE%B3%CF%81%CE%AC%CE%BC%CE%BC%CE%B1%CF%84%CE%B1/%CF%83%CF%85%CF%83%CF%83%CE%AF%CF%84%CE%B9%CE%B1-2/', 0, 0, 'syssitio'),
('Φιλοζωικό Πολιτιστικό & Περιβαλλοντικό Σωματείο Πολυγύρου', 'https://kivotospol.blogspot.gr/', 40.378, 23.4425, 'filozoiki'),
('Noiazomai Animal Rescue', 'https://noiazomaianimalrescue.blogspot.gr/', 40.606, 22.9597, 'filozoiki'),
('Ελληνικός οργανισμός ανακύκλωσης', 'https://www.eoan.gr/el/content/20/ti-ulika-anakuklonoume', 0, 0, 'recycle'),
('\"ΑΓΑΠΗ\" Φιλοζωικό & Περιβαλλοντικό Σωματείο Ερμιονίδας', 'https://www.facebook.com/%CE%91%CE%B3%CE%B1%CF%80%CE%B7-%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C-%CE%A0%CE%B5%CF%81%CE%B9%CE%B2%CE%B1%CE%BB%CE%BB%CE%BF%CE%BD%CF%84%CE%B9%CE%BA%CF%8C-%CE%A3%CF%89%CE%BC%CE%B1%CF%84%CE%B5%CE%AF%CE%BF-%CE%95%CF%81%CE%BC%CE%B9%CE%BF%CE%BD%CE%AF%CE%B4%CE%B1%CF%82-166154540633325/', 37.3281, 23.1438, 'filozoiki'),
('Αδέσποτες Πατούσες Πύργου Stray Paws of Pyrgos', 'https://www.facebook.com/%CE%91%CE%B4%CE%AD%CF%83%CF%80%CE%BF%CF%84%CE%B5%CF%82-%CE%A0%CE%B1%CF%84%CE%BF%CF%8D%CF%83%CE%B5%CF%82-%CE%A0%CF%8D%CF%81%CE%B3%CE%BF%CF%85-Stray-Paws-of-Pyrgos-357647907735227/?hc_ref=ARTMaNQfU8dlSmyZNUJ38LHnKG2-nCOkG0PSLttgZrB9', 37.6712, 21.4423, 'filozoiki'),
('Animal Protection (Προστασία Ζώων Αίγινας -Αγκιστρίου)', 'https://www.facebook.com/%CE%A0%CF%81%CE%BF%CF%83%CF%84%CE%B1%CF%83%CE%AF%CE%B1-%CE%96%CF%8E%CF%89%CE%BD-%CE%91%CE%AF%CE%B3%CE%B9%CE%BD%CE%B1%CF%82-%CE%91%CE%B3%CE%BA%CE%B9%CF%83%CF%84%CF%81%CE%AF%CE%BF%CF%85-837286279678148', 37.7244, 23.4938, 'filozoiki'),
('Φιλοζωικός Σύλλογος Δήμου Παγγαίου \"Νώε\"', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CE%BF%CF%82-%CE%A3%CF%85%CE%BB%CE%BB%CE%BF%CE%B3%CE%BF%CF%82-%CE%9D-%CE%97%CF%81%CE%B1%CE%BA%CE%BB%CE%B5%CE%B9%CF%84%CF%83%CE%B1%CF%82-%CE%94%CE%AE%CE%BC%CE%BF%CF%82-%CE%A0%CE%B1%CE%B3%CE%B3%CE%B1%CE%B9%CE%BF%CF%85-%CE%9D%CF%89%CE%B5-1090262724442889', 40.8654, 24.3165, 'filozoiki'),
('Φιλοζωικός Σύλλογος Β. Εύβοιας ΑΡΤΕΜΙΣ', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C%CF%82-%CE%A3%CF%8D%CE%BB%CE%BB%CE%BF%CE%B3%CE%BF%CF%82-%CE%92%CE%95%CF%85%CE%B2%CE%BF%CE%B9%CE%B1%CF%82-%CE%91%CF%81%CF%84%CE%B5%CE%BC%CE%B9%CF%82-2019751448126122', 38.9544, 23.1508, 'filozoiki'),
('Φιλοζωικό Σωματείο Καλλιθέας \"Προστασία Δύστυχων Αδέσποτων Ζώων\"', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C-%CE%A3%CF%89%CE%BC%CE%B1%CF%84%CE%B5%CE%AF%CE%BF-%CE%9A%CE%B1%CE%BB%CE%BB%CE%B9%CE%B8%CE%AD%CE%B1%CF%82-%CE%94%CF%8D%CF%83%CF%84%CF%85%CF%87%CF%89%CE%BD-%CE%91%CE%B4%CE%AD%CF%83%CF%80%CE%BF%CF%84%CF%89%CE%BD-%CE%96%CF%8E%CF%89%CE%BD-535100136592240/', 37.956, 23.7034, 'filozoiki'),
('Αδέσποτες Φωνές - Stray Voices Μοσχάτου Ταύρου', 'https://www.facebook.com/a.f.stray.voices.2018/', 37.9707, 23.6941, 'filozoiki'),
('Αδέσποτα Όνειρα Φιλοζωική Ομάδα Εθελοντών', 'https://www.facebook.com/adespota.oneira/', 40.6922, 23.0033, 'filozoiki'),
('Save the tails - Εθελοντική Ένωση Φιλόζωων Πετρούπολης', 'https://www.facebook.com/adespota.skulakia.petroupolis/', 38.0425, 23.6838, 'filozoiki'),
('Φιλόζωοι Ανατολικού Πηλίου - East Pilio Animal Welfare', 'https://www.facebook.com/eastpilioanimalwelfare/', 39.438, 23.0899, 'filozoiki'),
('Empty the cages Athens', 'https://www.facebook.com/emptythecagesathens/', 37.9839, 23.7283, 'filozoiki'),
('Φιλοζωική Ένωση Λυκόβρυσης Πέυκης (Φ.Ε.ΛΥ.ΠΕ.)', 'https://www.facebook.com/felypegr/', 38.0681, 23.7803, 'filozoiki'),
('ΦΙΛΟΙ ΤΩΝ ΖΩΩΝ ΠΑΠΑΓΟΥ ΧΟΛΑΡΓΟΥ', 'https://www.facebook.com/filoizwwnpapxol/?ref=bookmarks', 38.0018, 23.7983, 'filozoiki'),
('ΚΥΩΝ ΚΑΙ ΓΑΛΗ ΦΙΛΟΖΩΙΚΟ ΣΩΜΑΤΕΙΟ ΠΑΝΟΡΑΜΑΤΟΣ', 'https://www.facebook.com/filozoikipanoramatos', 40.5868, 23.0316, 'filozoiki'),
('Φιλοζωικό Σωματείο Άρτας', 'https://www.facebook.com/filozoikosomateioartas/', 39.1616, 20.9858, 'filozoiki'),
('ΠΑΡΕΜΒΑΣΗ ΓΙΑ ΤΑ ΖΩΑ ΠΡΕΒΕΖΑ', 'https://www.facebook.com/groups/145433632189831/?ref=ts&amp;fref=ts', 38.9839, 20.7805, 'filozoiki'),
('Φιλοζωικός Σύλλογος Παγγαίου Η ΕΛΠΙΔΑ', 'https://www.facebook.com/groups/1674557449502201', 40.7757, 23.9515, 'filozoiki'),
('Η ΦΩΝΗ ΤΩΝ ΖΩΩΝ Φιλοζωϊκό Σωματείο Αστυπάλαιας', 'https://www.facebook.com/ifonitonzoon/', 36.5761, 26.3029, 'filozoiki'),
('Navarino Pet Community', 'https://www.facebook.com/navarinopetcommunity/', 36.9138, 21.6964, 'filozoiki'),
('Φιλοζωικός Όμιλος Ξάνθης', 'https://www.facebook.com/pages/%CE%A6%CE%9F%CE%9E-%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C%CF%82-%CE%8C%CE%BC%CE%B9%CE%BB%CE%BF%CF%82-%CE%9E%CE%AC%CE%BD%CE%B8%CE%B7%CF%82-FOX/375429335863185', 41.138, 24.8863, 'filozoiki'),
('Pegasus Animal Care Kalymnos', 'https://www.facebook.com/pegasusanimalcare/#', 37.0026, 26.9924, 'filozoiki'),
('ΦΙΛΟΖΩΙΚΟΣ ΣΥΛΛΟΓΟΣ ΚΡΕΣΤΕΝΩΝ \'ΝΟΙΑΖΟΜΑΙ\'', 'https://www.facebook.com/profile.php?id=100024815347723', 37.5919, 21.6194, 'filozoiki'),
('SAVE Stray animals and volunteers Εθελοντές Λυκόβρυσης Πεύκης', 'https://www.facebook.com/Savelp2020/', 38.0599, 23.7925, 'filozoiki'),
('Μέριμνα Αδέσποτων Ζώων Κουφάλια', 'https://www.facebook.com/stray.koufaliagreece/', 40.7786, 22.5776, 'filozoiki'),
('Stray Paws Santorini S.P.S.', 'https://www.facebook.com/straypawssantorini/', 36.4071, 25.4567, 'filozoiki'),
('Συνύπαρξις Σωματείο Αγίων Αναργύρων Καματερού', 'https://www.facebook.com/SynYparxis/', 38.0273, 23.718, 'filozoiki'),
('Φιλοζωικό Σωματείο Φλώρινας \"Η Πατούσα\"', 'https://www.facebook.com/zoophiloi.phlorinas?ref=tn_tnmn', 40.7814, 21.4067, 'filozoiki'),
('Animal Action Hellas - Δράση για τα Ζώα στην Ελλάδα', 'https://www.gawf.org.uk/animal-action/', 37.9486, 23.6671, 'filozoiki'),
('Όλοι μαζί μπορούμε', 'https://www.oloimaziboroume.gr/', 0, 0, 'koinwfeleis draseis'),
('ΕΛΛΗΝΙΚΗ ΕΤΑΙΡΕΙΑ ΑΞΙΟΠΟΙΗΣΗΣ ΑΝΑΚΥΚΛΩΣΗΣ', 'www.herrco.gr', 0, 0, 'recycle');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `password_resets`
--

CREATE TABLE `password_resets` (
  `user_email` varchar(64) NOT NULL,
  `reset_key` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `poster_email` varchar(64) NOT NULL COMMENT 'Keeps track of the poster''s id.',
  `title` varchar(250) NOT NULL,
  `details` text DEFAULT NULL,
  `date_posted` datetime NOT NULL,
  `date_of_event` datetime NOT NULL,
  `city` enum('Attica, Athens','Thessaloniki','Patras','Larissa','Heraklion','Attica, Peristeri','Attica, Kallithea','Attica, Acharnes','Thessaloniki, Kalamaria','Attica, Nikaia','Attica, Glyfada','Thessaloniki, Evosmos','Attica, Chalandri','Attica, Nea Smyrni','Attica, Marousi','Attica, Agios Dimitrios','Attica, Zografou','Attica, Egaleo','Attica, Nea Ionia','Ioannina','Attica, Palaio Faliro','Attica, Korydallos','Trikala','Attica, Vyronas','Attica, Agia Paraskevi','Attica, Galatsi','Agrinio','Chalcis','Attica, Petroupoli','Serres','Alexandroupoli','Xanthi','Katerini','Kalamata','Kavala','Chania','Lamia','Drama','Veria','Attica, Alimos','Kozani','Thessaloniki, Polichni','Karditsa','Thessaloniki, Sykies','Thessaloniki, Ampelokipoi','Thessaloniki, Pylaia','Attica, Agioi Anargyroi','Attica, Argyroupoli','Attica, Ano Liosia','Rethymno','Ptolemaida','Tripoli','Attica, Cholargos','Attica, Vrilissia','Attica, Aspropyrgos','Corinth','Attica, Gerakas','Attica, Metamorfosi','Giannitsa','Athens, Voula','Athens, Kamatero','Mytilene','Thessaloniki, Neapoli','Thessaloniki, Eleftherio-Kordelio','Chios','Attica, Agia Varvara','Attica, Kaisariani','Attica, Nea Filadelfeia','Attica, Moschato','Attica, Perama','Salamina','Attica, Eleusis','Corfu','Pyrgos','Megara','Kilkis','Attica, Dafni','Thebes','Attica, Melissia','Argos','Arta','Artemida','Livadeia','Attica, Pefki','Thessaloniki, Oraiokastro','Aigio','Kos','Attica, Koropi','Preveza','Naousa','Orestiada','Thessaloniki, Peraia','Edessa','Florina','Attica, Nea Erythraia','Attica, Elliniko','Amaliada','Attica, Pallini','Sparta','Attica, Agios Ioannis Rentis','Thessaloniki, Thermi','Attica, Vari','Attica, Nea Makri','Attica, Tavros','Alexandreia','Thessaloniki, Menemeni','Paiania','Attica, Kalyvia Thorikou','Nafplio','Drapetsona','Thessaloniki, Efkarpia','Attica, Papagou','Nafpaktos','Kastoria','Grevena','Thessaloniki, Pefka','Nea Alikarnassos','Missolonghi','Attica, Gazi','Ierapetra','Kalymnos','Attica, Rafina','Attica, Loutraki','Agios Nikolaos','Ermoupoli','Ialysos','Attica, Mandra','Tyrnavos','Attica, Glyka Nera','Attica, Ymittos','Attica, Neo Psychiko','') NOT NULL COMMENT 'All greek cities listed in https://simple.wikipedia.org/wiki/List_of_cities_in_Greece',
  `latitude` float NOT NULL DEFAULT 0,
  `longitude` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `poster_email`, `title`, `details`, `date_posted`, `date_of_event`, `city`, `latitude`, `longitude`) VALUES
(00000000001, 'testemail2@test.email', 'Megaro Mousikis Thessalonikis', '', '2020-05-07 19:04:36', '2020-05-09 20:32:31', 'Thessaloniki', 40.5975, 22.9478),
(00000000002, 'testemail2@test.email', 'White Tower', '', '2020-05-07 19:04:36', '2020-05-09 20:32:31', 'Thessaloniki', 40.6264, 22.9483),
(00000000003, 'testemail2@test.email', 'Alexander the Great\'s Statue', '', '2020-05-07 19:04:36', '2020-05-10 20:32:31', 'Thessaloniki', 40.6241, 22.95),
(00000000004, 'testemail3@test.email', 'Ancient Roman Agora', '', '2020-05-07 19:04:36', '2020-05-09 10:23:15', 'Thessaloniki', 40.6377, 22.9459),
(00000000016, 'amoavinis@gmail.com', '7', '', '2020-06-10 13:29:01', '2020-06-27 00:00:00', 'Thessaloniki', 40.63, 22.95);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `signup_confirms`
--

CREATE TABLE `signup_confirms` (
  `user_email` varchar(64) NOT NULL,
  `signup_key` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL COMMENT 'hash256',
  `authority` set('administrator','simple') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `authority`) VALUES
('a@a.com', 'asdfg', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'simple'),
('amoavinis@gmail.com', 'amoavinis111', 'd17f25ecfbcc7857f7bebea469308be0b2580943e96d13a3ad98a13675c4bfc2', 'simple'),
('testemail1@test.email', 'test_username1', 'test_password1', 'simple'),
('testemail2@test.email', 'test_username2', 'test_password2', 'simple'),
('testemail3@test.email', 'test_username3', 'test_password3', 'simple'),
('testemail4@test.email', 'test_username4', 'test_password4', 'simple'),
('testemail5@test.email', 'test_username5', 'test_password5', 'simple'),
('testemail6@test.email', 'testsimple', '8e7a4a6e5ff1034956dfebed82ff7857473eea859badcb7b33a0697367e87a32', 'simple'),
('todeg57430@kewrg.com', 'test_user1', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'simple');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users_waiting`
--

CREATE TABLE `users_waiting` (
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL COMMENT 'hash256',
  `authority` set('administrator','simple') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `interested`
--
ALTER TABLE `interested`
  ADD KEY `user_email` (`user_email`),
  ADD KEY `post_id` (`post_id`);

--
-- Ευρετήρια για πίνακα `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`url`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Ευρετήρια για πίνακα `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`user_email`);

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`poster_email`);

--
-- Ευρετήρια για πίνακα `signup_confirms`
--
ALTER TABLE `signup_confirms`
  ADD PRIMARY KEY (`user_email`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Ευρετήρια για πίνακα `users_waiting`
--
ALTER TABLE `users_waiting`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `interested`
--
ALTER TABLE `interested`
  ADD CONSTRAINT `interested_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interested_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Περιορισμοί για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`poster_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
