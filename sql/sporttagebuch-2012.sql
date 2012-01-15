-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 14. Januar 2012 um 14:29
-- Server Version: 5.1.44
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `sporttagebuch-2012`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stb_basis_daten`
--

CREATE TABLE IF NOT EXISTS `stb_basis_daten` (
  `id_basis` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_stb_m` int(10) unsigned NOT NULL,
  `basis_datum` bigint(20) unsigned NOT NULL,
  `basis_uhrzeit` bigint(20) unsigned NOT NULL,
  `basis_laufzeit` bigint(20) unsigned NOT NULL,
  `id_schuh` bigint(20) unsigned NOT NULL,
  `id_spa` bigint(20) unsigned DEFAULT NULL,
  `basis_km` float(10,2) unsigned NOT NULL,
  `strecke` varchar(250) DEFAULT NULL,
  `basis_temp` float(10,2) DEFAULT NULL,
  `basis_witterung` bigint(20) unsigned NOT NULL,
  `id_belastung` bigint(20) unsigned DEFAULT NULL,
  `basis_gewicht` float(10,2) DEFAULT NULL,
  `basis_fett` float(10,2) DEFAULT NULL,
  `basis_av` int(4) DEFAULT NULL,
  `basis_mx` int(4) DEFAULT NULL,
  `basis_schlaf` int(4) DEFAULT NULL,
  `basis_motivation` int(4) DEFAULT NULL,
  `basis_zufriedenheit` int(4) DEFAULT NULL,
  `basis_bemerkungen` text,
  `del` bigint(20) unsigned NOT NULL DEFAULT '0',
  `create_at` bigint(20) unsigned NOT NULL,
  `create_from` bigint(20) unsigned NOT NULL,
  `change_at` bigint(20) unsigned NOT NULL,
  `change_from` bigint(20) unsigned NOT NULL,
  `lock_at` bigint(20) unsigned NOT NULL DEFAULT '0',
  `lock_from` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_basis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `stb_basis_daten`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stb_belastungsarten`
--

CREATE TABLE IF NOT EXISTS `stb_belastungsarten` (
  `id_belastung` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_belastung` varchar(100) NOT NULL,
  `kurz_belastung` varchar(20) NOT NULL,
  `hfmax_belastung` varchar(50) NOT NULL,
  `beschreibung_belastung` text,
  `del` bigint(20) NOT NULL DEFAULT '0',
  `create_at` bigint(20) unsigned NOT NULL,
  `create_from` bigint(20) unsigned NOT NULL,
  `change_at` bigint(20) unsigned NOT NULL,
  `change_from` bigint(20) unsigned NOT NULL,
  `lock_at` bigint(20) unsigned NOT NULL DEFAULT '0',
  `lock_from` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_belastung`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `stb_belastungsarten`
--

INSERT INTO `stb_belastungsarten` (`id_belastung`, `name_belastung`, `kurz_belastung`, `hfmax_belastung`, `beschreibung_belastung`, `del`, `create_at`, `create_from`, `change_at`, `change_from`, `lock_at`, `lock_from`) VALUES
(1, 'Grundlagenausdauer', 'GA-1', '65-75', 'Steigerung der aeroben LeistungsfÃ¤higkeit.\r\nSubjektives Empfinden: \r\nfast zu langsam, so kÃ¶nnte ich 2-3 Std. aushalten.*\r\nHfmax 65-75\r\n', 0, 0, 0, 1274029623, 1, 1310463417, 1),
(2, 'Intensive Grundlagenausdauer', 'GA-2', '75-85', 'Intensives Grundlagentraining.\r\nSubjektives Empfinden:\r\nein gutes Tempo, das ich 1-1,5 Std. aushalten.*\r\nHfmax 75-85', 0, 0, 0, 1274029667, 1, 1274029667, 1),
(3, 'Wettkampfspezifischer  Entwicklungsbereich', 'WSA', '85-92', 'Steigerung der anaeroben LeistungsfÃ¤higkeit.\r\nSubjektives Empfinden:\r\njetzt ist''s aber heftig.* \r\n--%Hfmax 85-92', 0, 1274027393, 1, 1324105971, 1, 1324105971, 1),
(4, 'Regeneration', 'Rekom', '60-65', 'Erholung, aktive Regeneration.\r\nSubjektives Empfinden:\r\nsehr leicht, sehr lange durchzuhalten.*\r\nHfmax  60-65', 0, 1274027450, 1, 1274029475, 1, 1274029475, 1),
(5, 'K1', 'K1', '', '', 0, 1324107200, 1, 1324107204, 1, 1324107204, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stb_schuhe`
--

CREATE TABLE IF NOT EXISTS `stb_schuhe` (
  `id_shoe` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ltb_m` bigint(20) unsigned NOT NULL,
  `shoe_brand` varchar(200) NOT NULL,
  `shoe_model` varchar(255) NOT NULL,
  `shoe_categorie` varchar(255) NOT NULL,
  `shoe_info` text NOT NULL,
  `start_date` bigint(20) NOT NULL,
  `max_km` float(10,2) NOT NULL,
  `del` bigint(20) unsigned NOT NULL DEFAULT '0',
  `create_at` bigint(20) unsigned NOT NULL,
  `create_from` bigint(20) unsigned NOT NULL,
  `change_at` bigint(20) unsigned NOT NULL,
  `change_from` bigint(20) unsigned NOT NULL,
  `lock_at` bigint(20) unsigned NOT NULL DEFAULT '0',
  `lock_from` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_shoe`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `stb_schuhe`
--

INSERT INTO `stb_schuhe` (`id_shoe`, `id_ltb_m`, `shoe_brand`, `shoe_model`, `shoe_categorie`, `shoe_info`, `start_date`, `max_km`, `del`, `create_at`, `create_from`, `change_at`, `change_from`, `lock_at`, `lock_from`) VALUES
(1, 0, 'Zoot', 'Ultra TT 3.0', 'Laufschuh', '', 0, 900.00, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 'adidas', 'unbekannt', 'Laufschuh', '', 0, 0.00, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stb_sportarten`
--

CREATE TABLE IF NOT EXISTS `stb_sportarten` (
  `id_spa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_spa` varchar(100) NOT NULL,
  `beschreibung_spa` varchar(255) NOT NULL,
  `del` bigint(20) unsigned NOT NULL DEFAULT '0',
  `create_at` bigint(20) unsigned NOT NULL,
  `create_from` bigint(20) unsigned NOT NULL,
  `change_at` bigint(20) unsigned NOT NULL,
  `change_from` bigint(20) unsigned NOT NULL,
  `lock_at` bigint(20) unsigned NOT NULL DEFAULT '0',
  `lock_from` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_spa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `stb_sportarten`
--

INSERT INTO `stb_sportarten` (`id_spa`, `name_spa`, `beschreibung_spa`, `del`, `create_at`, `create_from`, `change_at`, `change_from`, `lock_at`, `lock_from`) VALUES
(1, 'Laufen', '', 0, 0, 0, 0, 0, 0, 0),
(2, 'Mountainbike', '', 0, 0, 0, 0, 0, 0, 0),
(3, 'Rolle', '', 0, 0, 0, 0, 0, 0, 0),
(4, 'Schwimmen', '', 0, 0, 0, 0, 0, 0, 0),
(5, 'Zeitfahrmaschine', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stb_test_basis_daten`
--

CREATE TABLE IF NOT EXISTS `stb_test_basis_daten` (
  `id_basis` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_stb_m` int(10) unsigned NOT NULL,
  `basis_datum` bigint(20) unsigned NOT NULL,
  `basis_uhrzeit` bigint(20) unsigned NOT NULL,
  `basis_laufzeit` bigint(20) unsigned NOT NULL,
  `id_schuh` bigint(20) unsigned NOT NULL,
  `id_spa` bigint(20) unsigned DEFAULT NULL,
  `basis_km` float(10,2) unsigned NOT NULL,
  `strecke` varchar(250) DEFAULT NULL,
  `basis_temp` float(10,2) DEFAULT NULL,
  `basis_witterung` bigint(20) unsigned NOT NULL,
  `id_belastung` bigint(20) unsigned DEFAULT NULL,
  `basis_gewicht` float(10,2) DEFAULT NULL,
  `basis_fett` float(10,2) DEFAULT NULL,
  `basis_av` int(4) DEFAULT NULL,
  `basis_mx` int(4) DEFAULT NULL,
  `basis_schlaf` int(4) DEFAULT NULL,
  `basis_motivation` int(4) DEFAULT NULL,
  `basis_zufriedenheit` int(4) DEFAULT NULL,
  `basis_bemerkungen` text,
  `del` bigint(20) unsigned NOT NULL DEFAULT '0',
  `create_at` bigint(20) unsigned NOT NULL,
  `create_from` bigint(20) unsigned NOT NULL,
  `change_at` bigint(20) unsigned NOT NULL,
  `change_from` bigint(20) unsigned NOT NULL,
  `lock_at` bigint(20) unsigned NOT NULL DEFAULT '0',
  `lock_from` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_basis`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Daten für Tabelle `stb_test_basis_daten`
--

INSERT INTO `stb_test_basis_daten` (`id_basis`, `id_stb_m`, `basis_datum`, `basis_uhrzeit`, `basis_laufzeit`, `id_schuh`, `id_spa`, `basis_km`, `strecke`, `basis_temp`, `basis_witterung`, `id_belastung`, `basis_gewicht`, `basis_fett`, `basis_av`, `basis_mx`, `basis_schlaf`, `basis_motivation`, `basis_zufriedenheit`, `basis_bemerkungen`, `del`, `create_at`, `create_from`, `change_at`, `change_from`, `lock_at`, `lock_from`) VALUES
(1, 1, 1294095600, 1312524000, 1530, 5, 1, 5.00, '7', 4.00, 0, 0, 80.00, 19.00, 140, 160, 0, 0, 0, 'Erster Eintrag', 0, 1312525147, 1, 1312554400, 1, 0, 0),
(2, 1, 1296601200, 1313236800, 3660, 4, 1, 10.50, '1', 15.00, 0, 0, 77.30, 18.50, 138, 165, 0, 0, 0, '', 0, 1312525598, 1, 1313255089, 1, 0, 0),
(3, 1, 1299020400, 1312536600, 1591, 11, 1, 4.50, '7', 18.00, 0, 0, 74.00, 19.50, 0, 0, 0, 0, 0, '', 0, 1312556631, 1, 1312556631, 1, 0, 0),
(4, 1, 1301954400, 1312614000, 4320, 5, 1, 11.20, '1', 19.00, 0, 0, 78.00, 19.50, 141, 167, 0, 0, 0, 'April Eintrag', 0, 1312617188, 1, 1312617523, 1, 0, 0),
(5, 1, 1300143600, 1312617600, 8400, 1, 5, 54.00, '0', 11.00, 0, 0, 78.00, 18.00, 123, 154, 0, 0, 0, '', 0, 1312617903, 1, 1312617903, 1, 0, 0),
(6, 1, 1301180400, 1312625700, 12660, 1, 5, 84.23, '0', 14.00, 0, 0, 76.00, 18.50, 129, 167, 0, 0, 0, '', 0, 1312617986, 1, 1312618498, 1, 0, 0),
(7, 1, 1294095600, 1312738200, 2700, 0, 3, 1.50, '5', 0.00, 0, 0, 78.00, 18.50, 0, 0, 0, 0, 0, '', 0, 1312695990, 1, 1312695990, 1, 0, 0),
(8, 1, 1294354800, 1312738200, 2400, 0, 3, 1.20, '5', 0.00, 0, 0, 78.00, 19.00, 0, 0, 0, 0, 0, '', 0, 1312696640, 1, 1312696640, 1, 0, 0),
(9, 1, 1296514800, 1312738200, 1800, 0, 3, 1.00, '5', 0.00, 0, 0, 77.00, 18.50, 0, 0, 0, 0, 0, '', 0, 1312696934, 1, 1312696934, 1, 0, 0),
(10, 1, 1313359200, 1313406840, 2112, 5, 1, 7.20, '1', 25.00, 0, 0, 77.00, 19.50, 123, 133, 0, 0, 0, 'Der 10te Datensatz', 0, 1313413136, 1, 1313413136, 1, 0, 0),
(11, 1, 1313445600, 1313402400, 4920, 1, 5, 35.00, '6', 21.00, 0, 0, 76.00, 18.20, 122, 144, 0, 0, 0, 'Der 11te Datensatz', 0, 1313413244, 1, 1313413416, 1, 0, 0),
(72, 0, 1318377600, 1326526200, 5424, 1, 2, 100.00, 'Richtung Aschaffenburg', 6.00, 0, 0, 70.00, 11.50, 133, 145, 0, 0, 0, 'Alles eingetragen', 0, 1326546346, 0, 1326546346, 0, 0, 0);
