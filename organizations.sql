-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Ιουν 2020 στις 18:41:28
-- Έκδοση διακομιστή: 10.4.8-MariaDB
-- Έκδοση PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('ΦΙΛΟΖΩΙΚΟΣ ΣΥΛΛΟΓΟΣ ΧΙΟΥ', 'http://chiosanimalwelfare.weebly.com/', 38.3758, 26.0647, 'Φιλοζωική'),
('Εθελοντές Φιλόζωοι Πτολεμαΐδας', 'http://ethelontesfilozoiptolemaidas.simplesite.com/', 40.5122, 21.6786, 'Φιλοζωική'),
('Γνωρίζω Αγαπάω Φροντίζω (ΓΑΦ)', 'http://gaf-lcp.org/', 37.3281, 23.1438, 'Φιλοζωική'),
('Φιλοζωικό Σωματείο \"ΚΙΒΩΤΟΣ\" Αλεξανδρούπολη', 'http://kivotosalexpolis.gr/', 40.8457, 25.8753, 'Φιλοζωική'),
('ΜΚΟ Αποστολή', 'http://mkoapostoli.com/', 0, 0, 'Συσσίτιο'),
('Ο άλλος άνθρωπος', 'http://oallosanthropos.blogspot.com/', 0, 0, 'Συσσίτιο'),
('Sitia Animal Rescue', 'http://sitia-animal-rescue.gr/', 35.2066, 26.105, 'Φιλοζωική'),
('Φιλοζωικό Σωματείο Λήμνου \"Αδέσποτες Ψυχές\"', 'http://straysoulslemnos.weebly.com/', 39.8757, 25.0611, 'Φιλοζωική'),
('Καταφύγιο Αδέσποτων Ζώων Σύρου / Syros Stray Animal Shelter', 'http://syrosshelter.com/', 37.4446, 24.9423, 'Φιλοζωική'),
('ARTEMIS, Πολιτιστικό & Φιλοζωικό Εθελοντικό Σωμ. Ν. Τρικάλων', 'http://www.artemis-taas.org/', 39.5561, 21.7679, 'Φιλοζωική'),
('Ανακύκλωση συσκευών', 'http://www.electrocycle.gr/', 0, 0, 'Ανακύκλωση'),
('Φιλοζωικός Σύλλογος Καλαμπάκας \"Η ΣΤΕΓΗ\"', 'http://www.istegi.org/', 39.707, 21.6279, 'Φιλοζωική'),
('Ζακυνθινός Όμιλος Μέριμνας Ζώων', 'http://www.zawf.gr/', 37.7545, 20.9149, 'Φιλοζωική'),
('\"ΑγγίΖωο\" Φιλοζωικό σωματείο Κοζάνης', 'https://aggizwofilozwiko.blogspot.com/search/label/gr', 40.3007, 21.7883, 'Φιλοζωική'),
('ΦΙΛΟΖΩΙΚΟΣ ΠΟΛΙΤΙΣΤΙΚΟΣ ΣΥΛΛΟΓΟΣ ΦΥΛΗΣ \"ΑΓΑΠΑΖΩ\"', 'https://bit.ly/2XdtSyf', 38.1024, 23.6683, 'Φιλοζωική'),
('ΣΥΛΛΟΓΟΣ ΠΡΟΣΤΑΣΙΑΣ ΖΩΩΝ Ι.Π.ΜΕΣΟΛΟΓΓΙΟΥ \"Η ΕΛΠΙΔΑ\"', 'https://el-gr.facebook.com/protectstray/', 38.3686, 21.4284, 'Φιλοζωική'),
('Equal Society κοινωνικό φαρμακείο', 'https://equalsociety.gr/el/epikairotita/draseis-organismou/koinoniko-farmakeio', 37.9839, 23.7283, 'Φαρμακείο'),
('Equal Society κοινωνικό συσσίτιο', 'https://equalsociety.gr/el/epikairotita/draseis-organismou/koinoniko-sisitio-anthropon-geumata', 37.9839, 23.7283, 'Συσσίτιο'),
('Φιλoζωική Ένωση Νέας Ιωνίας (Φ.Ε.Ν.Ι)', 'https://fenineasionias.blogspot.com/', 38.0393, 23.7576, 'Φιλοζωική'),
('Πολιτιστικός Φιλοζωϊκός Σύλλογος Τρίπολης', 'https://filtripoli.blogspot.com/', 37.4163, 22.7644, 'Φιλοζωική'),
('Φιλοζωικός Σύλλογος Αιγιάλειας \"Τα Φιλαράκια\"', 'https://fsa-strayanimalsgreece.gr/', 38.1541, 22.314, 'Φιλοζωική'),
('ΦΙΛΟΖΩΙΚΗ ΠΑΡΕΜΒΑΣΗ ΕΛΛΗΝΙΚΟΥ ΑΡΓΥΡΟΥΠΟΛΗΣ', 'https://goo.gl/hfLDHA', 37.906, 23.7504, 'Φιλοζωική'),
('Φιλοζωική Ομάδα Πανεπιστημίου Ιωαννίνων', 'https://goo.gl/l8jE9h', 39.664, 20.8523, 'Φιλοζωική'),
('Φιλοζωϊκό και Πολιτιστικό Σωματείο Π.Φαλήρου', 'https://goo.gl/X9xy4r', 37.9302, 23.7002, 'Φιλοζωική'),
('Αδελφότητα Ορθοδόξου Εξωτερικής Ιεραποστολής', 'https://ierapostoles.gr/%CF%80%CF%81%CE%BF%CE%B3%CF%81%CE%AC%CE%BC%CE%BC%CE%B1%CF%84%CE%B1/%CF%83%CF%85%CF%83%CF%83%CE%AF%CF%84%CE%B9%CE%B1-2/', 0, 0, 'Συσσίτιο'),
('Φιλοζωικό Πολιτιστικό & Περιβαλλοντικό Σωματείο Πολυγύρου', 'https://kivotospol.blogspot.gr/', 40.378, 23.4425, 'Φιλοζωική'),
('Noiazomai Animal Rescue', 'https://noiazomaianimalrescue.blogspot.gr/', 40.606, 22.9597, 'Φιλοζωική'),
('Ελληνικός οργανισμός ανακύκλωσης', 'https://www.eoan.gr/el/content/20/ti-ulika-anakuklonoume', 0, 0, 'Ανακύκλωση'),
('\"ΑΓΑΠΗ\" Φιλοζωικό & Περιβαλλοντικό Σωματείο Ερμιονίδας', 'https://www.facebook.com/%CE%91%CE%B3%CE%B1%CF%80%CE%B7-%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C-%CE%A0%CE%B5%CF%81%CE%B9%CE%B2%CE%B1%CE%BB%CE%BB%CE%BF%CE%BD%CF%84%CE%B9%CE%BA%CF%8C-%CE%A3%CF%89%CE%BC%CE%B1%CF%84%CE%B5%CE%AF%CE%BF-%CE%95%CF%81%CE%BC%CE%B9%CE%BF%CE%BD%CE%AF%CE%B4%CE%B1%CF%82-166154540633325/', 37.3281, 23.1438, 'Φιλοζωική'),
('Αδέσποτες Πατούσες Πύργου Stray Paws of Pyrgos', 'https://www.facebook.com/%CE%91%CE%B4%CE%AD%CF%83%CF%80%CE%BF%CF%84%CE%B5%CF%82-%CE%A0%CE%B1%CF%84%CE%BF%CF%8D%CF%83%CE%B5%CF%82-%CE%A0%CF%8D%CF%81%CE%B3%CE%BF%CF%85-Stray-Paws-of-Pyrgos-357647907735227/?hc_ref=ARTMaNQfU8dlSmyZNUJ38LHnKG2-nCOkG0PSLttgZrB9', 37.6712, 21.4423, 'Φιλοζωική'),
('Animal Protection (Προστασία Ζώων Αίγινας -Αγκιστρίου)', 'https://www.facebook.com/%CE%A0%CF%81%CE%BF%CF%83%CF%84%CE%B1%CF%83%CE%AF%CE%B1-%CE%96%CF%8E%CF%89%CE%BD-%CE%91%CE%AF%CE%B3%CE%B9%CE%BD%CE%B1%CF%82-%CE%91%CE%B3%CE%BA%CE%B9%CF%83%CF%84%CF%81%CE%AF%CE%BF%CF%85-837286279678148', 37.7244, 23.4938, 'Φιλοζωική'),
('Φιλοζωικός Σύλλογος Δήμου Παγγαίου \"Νώε\"', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CE%BF%CF%82-%CE%A3%CF%85%CE%BB%CE%BB%CE%BF%CE%B3%CE%BF%CF%82-%CE%9D-%CE%97%CF%81%CE%B1%CE%BA%CE%BB%CE%B5%CE%B9%CF%84%CF%83%CE%B1%CF%82-%CE%94%CE%AE%CE%BC%CE%BF%CF%82-%CE%A0%CE%B1%CE%B3%CE%B3%CE%B1%CE%B9%CE%BF%CF%85-%CE%9D%CF%89%CE%B5-1090262724442889', 40.8654, 24.3165, 'Φιλοζωική'),
('Φιλοζωικός Σύλλογος Β. Εύβοιας ΑΡΤΕΜΙΣ', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C%CF%82-%CE%A3%CF%8D%CE%BB%CE%BB%CE%BF%CE%B3%CE%BF%CF%82-%CE%92%CE%95%CF%85%CE%B2%CE%BF%CE%B9%CE%B1%CF%82-%CE%91%CF%81%CF%84%CE%B5%CE%BC%CE%B9%CF%82-2019751448126122', 38.9544, 23.1508, 'Φιλοζωική'),
('Φιλοζωικό Σωματείο Καλλιθέας \"Προστασία Δύστυχων Αδέσποτων Ζώων\"', 'https://www.facebook.com/%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C-%CE%A3%CF%89%CE%BC%CE%B1%CF%84%CE%B5%CE%AF%CE%BF-%CE%9A%CE%B1%CE%BB%CE%BB%CE%B9%CE%B8%CE%AD%CE%B1%CF%82-%CE%94%CF%8D%CF%83%CF%84%CF%85%CF%87%CF%89%CE%BD-%CE%91%CE%B4%CE%AD%CF%83%CF%80%CE%BF%CF%84%CF%89%CE%BD-%CE%96%CF%8E%CF%89%CE%BD-535100136592240/', 37.956, 23.7034, 'Φιλοζωική'),
('Αδέσποτες Φωνές - Stray Voices Μοσχάτου Ταύρου', 'https://www.facebook.com/a.f.stray.voices.2018/', 37.9707, 23.6941, 'Φιλοζωική'),
('Αδέσποτα Όνειρα Φιλοζωική Ομάδα Εθελοντών', 'https://www.facebook.com/adespota.oneira/', 40.6922, 23.0033, 'Φιλοζωική'),
('Save the tails - Εθελοντική Ένωση Φιλόζωων Πετρούπολης', 'https://www.facebook.com/adespota.skulakia.petroupolis/', 38.0425, 23.6838, 'Φιλοζωική'),
('Φιλόζωοι Ανατολικού Πηλίου - East Pilio Animal Welfare', 'https://www.facebook.com/eastpilioanimalwelfare/', 39.438, 23.0899, 'Φιλοζωική'),
('Empty the cages Athens', 'https://www.facebook.com/emptythecagesathens/', 37.9839, 23.7283, 'Φιλοζωική'),
('Φιλοζωική Ένωση Λυκόβρυσης Πέυκης (Φ.Ε.ΛΥ.ΠΕ.)', 'https://www.facebook.com/felypegr/', 38.0681, 23.7803, 'Φιλοζωική'),
('ΦΙΛΟΙ ΤΩΝ ΖΩΩΝ ΠΑΠΑΓΟΥ ΧΟΛΑΡΓΟΥ', 'https://www.facebook.com/filoizwwnpapxol/?ref=bookmarks', 38.0018, 23.7983, 'Φιλοζωική'),
('ΚΥΩΝ ΚΑΙ ΓΑΛΗ ΦΙΛΟΖΩΙΚΟ ΣΩΜΑΤΕΙΟ ΠΑΝΟΡΑΜΑΤΟΣ', 'https://www.facebook.com/Φιλοζωικήpanoramatos', 40.5868, 23.0316, 'Φιλοζωική'),
('Φιλοζωικό Σωματείο Άρτας', 'https://www.facebook.com/filozoikosomateioartas/', 39.1616, 20.9858, 'Φιλοζωική'),
('ΠΑΡΕΜΒΑΣΗ ΓΙΑ ΤΑ ΖΩΑ ΠΡΕΒΕΖΑ', 'https://www.facebook.com/groups/145433632189831/?ref=ts&amp;fref=ts', 38.9839, 20.7805, 'Φιλοζωική'),
('Φιλοζωικός Σύλλογος Παγγαίου Η ΕΛΠΙΔΑ', 'https://www.facebook.com/groups/1674557449502201', 40.7757, 23.9515, 'Φιλοζωική'),
('Η ΦΩΝΗ ΤΩΝ ΖΩΩΝ Φιλοζωϊκό Σωματείο Αστυπάλαιας', 'https://www.facebook.com/ifonitonzoon/', 36.5761, 26.3029, 'Φιλοζωική'),
('Navarino Pet Community', 'https://www.facebook.com/navarinopetcommunity/', 36.9138, 21.6964, 'Φιλοζωική'),
('Φιλοζωικός Όμιλος Ξάνθης', 'https://www.facebook.com/pages/%CE%A6%CE%9F%CE%9E-%CE%A6%CE%B9%CE%BB%CE%BF%CE%B6%CF%89%CE%B9%CE%BA%CF%8C%CF%82-%CE%8C%CE%BC%CE%B9%CE%BB%CE%BF%CF%82-%CE%9E%CE%AC%CE%BD%CE%B8%CE%B7%CF%82-FOX/375429335863185', 41.138, 24.8863, 'Φιλοζωική'),
('Pegasus Animal Care Kalymnos', 'https://www.facebook.com/pegasusanimalcare/#', 37.0026, 26.9924, 'Φιλοζωική'),
('ΦΙΛΟΖΩΙΚΟΣ ΣΥΛΛΟΓΟΣ ΚΡΕΣΤΕΝΩΝ \'ΝΟΙΑΖΟΜΑΙ\'', 'https://www.facebook.com/profile.php?id=100024815347723', 37.5919, 21.6194, 'Φιλοζωική'),
('SAVE Stray animals and volunteers Εθελοντές Λυκόβρυσης Πεύκης', 'https://www.facebook.com/Savelp2020/', 38.0599, 23.7925, 'Φιλοζωική'),
('Μέριμνα Αδέσποτων Ζώων Κουφάλια', 'https://www.facebook.com/stray.koufaliagreece/', 40.7786, 22.5776, 'Φιλοζωική'),
('Stray Paws Santorini S.P.S.', 'https://www.facebook.com/straypawssantorini/', 36.4071, 25.4567, 'Φιλοζωική'),
('Συνύπαρξις Σωματείο Αγίων Αναργύρων Καματερού', 'https://www.facebook.com/SynYparxis/', 38.0273, 23.718, 'Φιλοζωική'),
('Φιλοζωικό Σωματείο Φλώρινας \"Η Πατούσα\"', 'https://www.facebook.com/zoophiloi.phlorinas?ref=tn_tnmn', 40.7814, 21.4067, 'Φιλοζωική'),
('Animal Action Hellas - Δράση για τα Ζώα στην Ελλάδα', 'https://www.gawf.org.uk/animal-action/', 37.9486, 23.6671, 'Φιλοζωική'),
('Όλοι μαζί μπορούμε', 'https://www.oloimaziboroume.gr/', 0, 0, 'Κοινωφελείς Δράσεις'),
('ΕΛΛΗΝΙΚΗ ΕΤΑΙΡΕΙΑ ΑΞΙΟΠΟΙΗΣΗΣ ΑΝΑΚΥΚΛΩΣΗΣ', 'www.herrco.gr', 0, 0, 'Ανακύκλωση');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`url`),
  ADD UNIQUE KEY `url` (`url`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;