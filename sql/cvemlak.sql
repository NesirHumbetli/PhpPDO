-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 23 Nis 2020, 08:59:41
-- Sunucu sürümü: 5.7.28
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cvemlak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

DROP TABLE IF EXISTS `ayar`;
CREATE TABLE IF NOT EXISTS `ayar` (
  `ayar_id` int(1) NOT NULL DEFAULT '0',
  `ayar_logo` varchar(250) NOT NULL,
  `ayar_altlogo` varchar(250) NOT NULL,
  `ayar_mainbg` varchar(250) NOT NULL,
  `ayar_sayturl` varchar(100) NOT NULL,
  `ayar_title` varchar(250) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_keywords` varchar(250) NOT NULL,
  `ayar_author` varchar(100) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(50) NOT NULL,
  `ayar_faks` varchar(50) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_ray` varchar(50) NOT NULL,
  `ayar_sehr` varchar(50) NOT NULL,
  `ayar_isvaxt` varchar(250) NOT NULL,
  `ayar_recaptcha` varchar(250) NOT NULL,
  `ayar_googlemap` varchar(250) NOT NULL,
  `ayar_analystic` varchar(50) NOT NULL,
  `ayar_facebook` varchar(100) NOT NULL,
  `ayar_twitter` varchar(100) NOT NULL,
  `ayar_youtube` varchar(100) NOT NULL,
  `ayar_google` varchar(100) NOT NULL,
  `ayar_smtphost` varchar(50) NOT NULL,
  `ayar_smtpuser` varchar(50) NOT NULL,
  `ayar_smtppassword` varchar(50) NOT NULL,
  `ayar_smtpport` varchar(50) NOT NULL,
  `ayar_slider` enum('0','1') NOT NULL,
  PRIMARY KEY (`ayar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_altlogo`, `ayar_mainbg`, `ayar_sayturl`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_adres`, `ayar_ray`, `ayar_sehr`, `ayar_isvaxt`, `ayar_recaptcha`, `ayar_googlemap`, `ayar_analystic`, `ayar_facebook`, `ayar_twitter`, `ayar_youtube`, `ayar_google`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_slider`) VALUES
(0, 'images/28334logo-real-estate.png', 'images/30687logo-law-firm-footer.png', 'images/Mainbg/2809green.jpg', 'http://localhost/CV-emlak/', 'Php Emlak', 'Əmlak saytının yazılması', 'php,pdo,mysql,script,emlak', 'Nəsir Hümbətli', '+994 (55) 547 87 69', '+994 (55) 547 87 69', '+994 (55) 547 87 69', 'name55255@gmail.com', 'AzTU', 'Yasamal', 'Bakı', ' Həftə içi 09:00 - 18:00', '', 'AIzaSyDNOZOHy6l4dkrBQjYRWmfnH_Wwrqt7LFc', '', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.google.com/', 'smtp.gmail.com', 'name55255@gmail.com', 'xxxxxx', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emlak`
--

DROP TABLE IF EXISTS `emlak`;
CREATE TABLE IF NOT EXISTS `emlak` (
  `emlak_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_id` int(11) NOT NULL,
  `emlak_zaman` datetime NOT NULL,
  `emlak_basliq` varchar(250) NOT NULL,
  `emlak_adres` text NOT NULL,
  `emlak_qiymet` float NOT NULL,
  `emlak_durum` varchar(50) NOT NULL,
  `emlak_detay` text NOT NULL,
  `emlak_resimyol` varchar(250) NOT NULL,
  PRIMARY KEY (`emlak_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `emlak`
--

INSERT INTO `emlak` (`emlak_id`, `kullanici_id`, `emlak_zaman`, `emlak_basliq`, `emlak_adres`, `emlak_qiymet`, `emlak_durum`, `emlak_detay`, `emlak_resimyol`) VALUES
(10, 1, '2020-04-16 11:05:01', 'Villa', 'Baku', 12500, 'Kirayə', '<p>Eleqant &Uuml;lublu Dizayn olunmuş.</p>\r\n', 'images/emlak/29142272072244221232white-concrete-3-storey-house-206172.jpg'),
(11, 1, '2020-04-16 11:09:38', 'Villa', 'Baku', 2.5, 'Kirayə', '<p>Kirayə yeni temirli ikimertebeli.</p>\r\n', 'images/emlak/25128253042686128864blue-and-gray-concrete-house-with-attic-during-twilight-186077.jpg'),
(12, 1, '2020-04-16 11:40:22', 'Həyət Evi', 'Baku', 200, 'Satılır', '<p>Yeni Təmirli</p>\r\n', 'images/emlak/24926white-and-brown-wooden-house-near-bare-trees-under-white-sky-3935333 (1).jpg'),
(13, 1, '2020-04-16 11:05:01', 'Villa', 'Baku', 12500, 'Satılır', '<p>Eleqant &Uuml;lublu Dizayn olunmuş.</p>\r\n', 'images/emlak/29142272072244221232white-concrete-3-storey-house-206172.jpg'),
(14, 1, '2020-04-16 11:09:38', 'Villa', 'Baku', 2000, 'Kirayə', '<p>Kirayə yeni temirli ikimertebeli.</p>\r\n', 'images/emlak/25128253042686128864blue-and-gray-concrete-house-with-attic-during-twilight-186077.jpg'),
(15, 1, '2020-04-16 11:40:22', 'Həyət Evi', 'Baku', 20000, 'Satılır', '<p>Yeni Təmirli</p>\r\n', 'images/emlak/24926white-and-brown-wooden-house-near-bare-trees-under-white-sky-3935333 (1).jpg'),
(16, 1, '2020-04-16 11:09:38', 'Villa', 'Baku', 2.5, 'Kirayə', '<p>Kirayə yeni temirli ikimertebeli.</p>\r\n', 'images/emlak/25128253042686128864blue-and-gray-concrete-house-with-attic-during-twilight-186077.jpg'),
(17, 1, '2020-04-16 11:40:22', 'Həyət Evi', 'Baku', 20000, 'Satılır', '<p>Yeni Təmirli</p>\r\n', 'images/emlak/24926white-and-brown-wooden-house-near-bare-trees-under-white-sky-3935333 (1).jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `mezmun_id` int(11) DEFAULT NULL,
  `galeri_resimyol` varchar(250) NOT NULL,
  `galer_sira` int(2) DEFAULT NULL,
  PRIMARY KEY (`galeri_id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `mezmun_id`, `galeri_resimyol`, `galer_sira`) VALUES
(44, 11, 'images/galeri/28575g6.jpg', NULL),
(45, 11, 'images/galeri/26746g5.jpg', NULL),
(46, 11, 'images/galeri/20893g4.jpg', NULL),
(43, 10, 'images/galeri/28758g1.jpg', NULL),
(42, 10, 'images/galeri/24070g2.jpg', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haqqimizda`
--

DROP TABLE IF EXISTS `haqqimizda`;
CREATE TABLE IF NOT EXISTS `haqqimizda` (
  `haqqimizda_id` int(1) NOT NULL,
  `haqqimizda_basliq` varchar(250) NOT NULL,
  `haqqimizda_mezmun` text NOT NULL,
  `haqqimizda_video` varchar(50) NOT NULL,
  `haqqimizda_hedef` text NOT NULL,
  `haqqimizda_missiya` text NOT NULL,
  PRIMARY KEY (`haqqimizda_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `haqqimizda`
--

INSERT INTO `haqqimizda` (`haqqimizda_id`, `haqqimizda_basliq`, `haqqimizda_mezmun`, `haqqimizda_video`, `haqqimizda_hedef`, `haqqimizda_missiya`) VALUES
(0, 'Başlıq', '<blockquote>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit leo a elit bibendum, non sagittis lacus dictum. Morbi ultricies a metus ut efficitur. Donec convallis rutrum metus a venenatis. Donec tincidunt sagittis dignissim. Maecenas mattis sodales ex at ornare. Duis gravida diam malesuada, lobortis sapien eu, consequat purus. Fusce a enim ac massa egestas auctor. Nullam nibh velit, aliquam sit amet fermentum eu, varius ac quam. In molestie commodo magna, feugiat iaculis turpis rhoncus in. Vivamus facilisis diam et posuere varius. Sed ut scelerisque enim. Fusce sed odio sem.</p>\r\n</blockquote>\r\n\r\n<p><img alt=\"\" src=\"https://i.picsum.photos/id/961/536/354.jpg\" style=\"float:left; height:234px; margin-left:10px; margin-right:10px; width:354px\" />Aliquam fringilla tellus arcu, ac volutpat erat tempor sit amet. Ut condimentum diam interdum massa tincidunt, at faucibus nulla dictum. Integer ullamcorper sapien et porttitor vestibulum. Sed sed felis et elit fermentum porttitor. Pellentesque ac dui justo. Etiam in orci lorem. Maecenas et velit tempus, pulvinar quam et, luctus tellus.</p>\r\n\r\n<p>Aenean aliquam enim sed augue faucibus sollicitudin. Sed euismod nisi rutrum mattis malesuada. Praesent aliquam diam at ipsum efficitur vulputate. Vivamus pulvinar leo magna, quis gravida lorem ultricies id. Interdum et malesuada fames ac ante ipsum primis in faucibus. In lacinia malesuada neque, in placerat odio condimentum ut. Cras volutpat viverra ante non fringilla. Praesent erat arcu, imperdiet ac faucibus pulvinar, pellentesque at quam. Nunc at aliquam nulla. Proin viverra neque sed est convallis, in eleifend quam convallis. Integer auctor massa vitae suscipit posuere. Maecenas eu lacus velit. Phasellus ut sodales tortor. Cras sit amet iaculis felis, id porta neque.</p>\r\n\r\n<p>Ut convallis est sed nisi posuere tristique. Duis consectetur, ex vitae gravida accumsan, purus arcu scelerisque tellus, vitae finibus elit ante ut ante. Sed nec orci rutrum, hendrerit est in, porta enim. Suspendisse potenti. Duis sem elit, eleifend eget nisl eget, laoreet pretium purus. Donec hendrerit ante non accumsan mollis. Vivamus vitae turpis vehicula, semper nisi sed, accumsan metus. Vestibulum tristique risus sed odio dictum accumsan.</p>\r\n\r\n<p>Quisque bibendum euismod dui, et finibus purus elementum quis. Sed venenatis ipsum non sem dictum, eu ultrices libero faucibus. In non urna nec velit ultricies posuere ac non nibh. Mauris posuere lorem nibh, ut accumsan est aliquam ut. Curabitur eu justo porta, fringilla erat id, vestibulum tortor. Maecenas pharetra consectetur tortor, ac ornare enim tristique vitae. Nam sit amet mi ut leo euismod posuere. Cras placerat, lorem nec placerat eleifend, magna ipsum sollicitudin massa, ut auctor eros purus ut metus.</p>\r\n', 'JAVweF9W7YU', 'Başqası sənə inanmadan əvvəl sən özünə inanmalısan.', 'Kendini ya inşa edecek ya imha edeceksin.Karar senin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_zaman` datetime NOT NULL,
  `user_resim` varchar(250) NOT NULL,
  `user_ad` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_adsoyad` varchar(50) NOT NULL,
  `user_tel` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_yetki` varchar(50) NOT NULL,
  `user_durum` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`user_id`, `user_zaman`, `user_resim`, `user_ad`, `user_password`, `user_adsoyad`, `user_tel`, `user_mail`, `user_yetki`, `user_durum`) VALUES
(1, '2020-04-11 14:58:00', 'images/user/7997t2.jpg', 'admin', '62cc2d8b4bf2d8728120d052163a77df', 'Nəsir Hümbətli', '+994(77) 777-77-77', 'Nesir.Humbetli@gmail.com', '5', 1),
(2, '2020-04-11 14:58:00', 'images/user/7997t2.jpg', 'user', '62cc2d8b4bf2d8728120d052163a77df', 'User Hümbətli', '+994(55) 555-55-55', 'User@gmail.com', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) DEFAULT NULL,
  `menu_ust` int(11) NOT NULL,
  `menu_icon` varchar(50) DEFAULT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_detay` text NOT NULL,
  `menu_url` varchar(250) NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` int(1) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `kategori_id`, `menu_ust`, `menu_icon`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`) VALUES
(7, NULL, 0, NULL, 'Xəbərlər', '', 'xeberler', 3, 1),
(2, NULL, 0, NULL, 'Haqqimizda', '', 'Haqqimizda', 2, 1),
(4, NULL, 0, NULL, 'Anasayfa', '', 'anaseyfe', 1, 1),
(6, NULL, 0, NULL, 'Əlaqə', '', 'elaqe', 4, 1),
(15, NULL, 4, NULL, 'Bölmə 1', '', 'https://www.google.com', 0, 1),
(16, NULL, 4, NULL, 'Bölmə 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et sem suscipit, mollis ligula id, interdum massa. Maecenas at maximus velit, ac elementum risus. Curabitur maximus, leo eu vehicula ultricies, nulla felis tempor tortor, ac tempus eros ex eu mi. Curabitur eu efficitur sem, at consectetur quam. Ut ornare facilisis magna in luctus. Quisque tempor eros vitae ultricies auctor. Mauris pretium, lectus eget pulvinar iaculis, ante nisi vestibulum lectus, sed mollis lacus ipsum eu ligula. Vivamus dapibus ultrices felis, non cursus quam. Nam vel augue non lorem bibendum venenatis. Donec malesuada efficitur neque, ac semper est consequat eu. Vivamus gravida neque nec varius congue. Mauris nunc quam, placerat ac rutrum vel, ultricies ac ante. Nunc eu ultrices ipsum. Etiam blandit condimentum ante et bibendum. Etiam auctor ornare consectetur.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 0, 1),
(13, NULL, 7, NULL, 'Təhsil Xəbərləri', '<p>Təhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərlərisadasdTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil XəbərləriTəhsil Xəbərlərisadasd</p>\r\n', '', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mezmun`
--

DROP TABLE IF EXISTS `mezmun`;
CREATE TABLE IF NOT EXISTS `mezmun` (
  `mezmun_id` int(11) NOT NULL AUTO_INCREMENT,
  `mezmun_zaman` datetime NOT NULL,
  `mezmun_resimyol` varchar(250) NOT NULL,
  `mezmun_ad` varchar(250) NOT NULL,
  `mezmun_movzu` text NOT NULL,
  `mezmun_keyword` varchar(250) NOT NULL,
  `mezmun_durum` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`mezmun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mezmun`
--

INSERT INTO `mezmun` (`mezmun_id`, `mezmun_zaman`, `mezmun_resimyol`, `mezmun_ad`, `mezmun_movzu`, `mezmun_keyword`, `mezmun_durum`) VALUES
(17, '2020-04-07 18:53:35', 'img/mezmun/2778829049267712227426751209202858929584white.jpg', 'Mezmun 8', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1'),
(18, '2020-04-07 18:53:35', 'img/mezmun/2430622878293773094026751209202858929584white.jpg', 'Mezmun 7', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1'),
(19, '2020-04-07 18:53:35', 'img/mezmun/3028728559293752017526751209202858929584white.jpg', 'Mezmun 6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1'),
(20, '2020-04-07 18:53:35', 'img/mezmun/3079626277260292805526751209202858929584white.jpg', 'Mezmun 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1'),
(21, '2020-04-07 18:53:35', 'img/mezmun/24287233363104730692219962068930335268152367126617209132212826751209202858929584white.jpg', 'Mezmun 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et sem suscipit, mollis ligula id, interdum massa. Maecenas at maximus velit, ac elementum risus. Curabitur maximus, leo eu vehicula ultricies, nulla felis tempor tortor, ac tempus eros ex eu mi. Curabitur eu efficitur sem, at consectetur quam. Ut ornare facilisis magna in luctus. Quisque tempor eros vitae ultricies auctor. Mauris pretium, lectus eget pulvinar iaculis, ante nisi vestibulum lectus, sed mollis lacus ipsum eu ligula. Vivamus dapibus ultrices felis, non cursus quam. Nam vel augue non lorem bibendum venenatis. Donec malesuada efficitur neque, ac semper est consequat eu. Vivamus gravida neque nec varius congue. Mauris nunc quam, placerat ac rutrum vel, ultricies ac ante. Nunc eu ultrices ipsum. Etiam blandit condimentum ante et bibendum. Etiam auctor ornare consectetur.</p>\r\n', 'Car1,Car2,Car3', '1'),
(22, '2020-04-07 18:53:35', 'img/mezmun/219962068930335268152367126617209132212826751209202858929584white.jpg', 'Mezmun 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et sem suscipit, mollis ligula id, interdum massa. Maecenas at maximus velit, ac elementum risus. Curabitur maximus, leo eu vehicula ultricies, nulla felis tempor tortor, ac tempus eros ex eu mi. Curabitur eu efficitur sem, at consectetur quam. Ut ornare facilisis magna in luctus. Quisque tempor eros vitae ultricies auctor. Mauris pretium, lectus eget pulvinar iaculis, ante nisi vestibulum lectus, sed mollis lacus ipsum eu ligula. Vivamus dapibus ultrices felis, non cursus quam. Nam vel augue non lorem bibendum venenatis. Donec malesuada efficitur neque, ac semper est consequat eu. Vivamus gravida neque nec varius congue. Mauris nunc quam, placerat ac rutrum vel, ultricies ac ante. Nunc eu ultrices ipsum. Etiam blandit condimentum ante et bibendum. Etiam auctor ornare consectetur.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Car1,Car2,Car3', '1'),
(23, '2020-04-07 18:53:35', 'img/mezmun/277013083827901227322367126617209132212826751209202858929584white.jpg', 'Mezmun 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1'),
(24, '2020-04-07 18:53:35', 'img/mezmun/2367126617209132212826751209202858929584white.jpg', 'Mezmun 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel eleifend odio, at egestas orci. Nam ac condimentum tortor. Quisque ac lobortis orci, vitae iaculis odio. Sed quis sapien eget nibh faucibus vehicula eu a ante. Quisque euismod purus a felis laoreet efficitur. Donec mattis facilisis sem, ut egestas diam sodales sed. Quisque quis augue et ipsum efficitur dapibus in in ex. Duis viverra eros a eros lobortis, semper aliquam massa imperdiet.</p>\r\n\r\n<p>Vestibulum faucibus orci eu tempor volutpat. Etiam vitae nulla pretium, semper sapien nec, iaculis metus. Phasellus vel mauris ipsum. Vivamus a tellus tempus, fringilla mi ac, sollicitudin eros. Morbi ac efficitur felis. Aliquam placerat mauris neque, et auctor augue volutpat ac. Nam sit amet metus et lorem maximus vulputate eget malesuada lectus.</p>\r\n\r\n<p>Phasellus finibus ac risus vel vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ullamcorper tellus, at hendrerit lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eu velit sed nunc vulputate commodo nec eleifend tellus. Nam ac condimentum purus. In euismod mi non elit aliquet, ac ornare mauris elementum. Suspendisse pellentesque eget magna egestas sodales. Duis mattis sem vel mi consequat egestas. Donec convallis faucibus nisl, iaculis blandit magna tempus non. Vivamus quis sem elementum, sagittis mauris non, rhoncus diam.</p>\r\n\r\n<p>Suspendisse justo felis, fermentum in urna ac, sagittis placerat est. Etiam tempor pretium ligula tristique elementum. Nulla quis mauris vel ligula lobortis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent rhoncus augue sapien, eu pulvinar metus viverra non. Sed velit enim, ultrices ut lacus id, interdum elementum elit. Cras quis arcu ut diam vestibulum rhoncus et et mauris. Curabitur porttitor mattis pulvinar. Integer consectetur ut nulla a tincidunt. Praesent facilisis malesuada neque in molestie. Nullam eget mollis risus, placerat lobortis felis.</p>\r\n\r\n<p>Duis sagittis ipsum eget justo sagittis blandit. Integer malesuada pharetra sapien, quis pharetra massa vulputate ac. Sed non felis velit. Morbi accumsan, nisi sed lobortis aliquam, diam elit scelerisque ex, in pellentesque turpis nibh non purus. Sed porttitor risus et orci vulputate hendrerit. Quisque ut consectetur odio, non rutrum mi. Nam tincidunt congue odio ac rutrum. Aenean pellentesque risus id velit elementum feugiat. Vestibulum id placerat nibh. Donec at eros a purus tincidunt fringilla. Vestibulum dignissim aliquam nisi, vel pellentesque arcu feugiat ut. Vivamus tincidunt vestibulum dictum.</p>\r\n', 'Car1,Car2,Car3', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_ad` varchar(150) NOT NULL,
  `slider_resimyol` varchar(250) DEFAULT NULL,
  `slider_url` varchar(250) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_url`, `slider_sira`, `slider_durum`) VALUES
(51, 'Slider2', 'images/slider/25534298923058328665bu.jpg', '0', 2, '1'),
(52, 'Slider3', 'images/slider/26869292553042529302photo-of-people-using-laptop-s-3182759.jpg', '', 3, '1'),
(56, 'Slider1', 'images/slider/30463283092011331882top.jpg', 'http://phpdev.cf/', 1, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
