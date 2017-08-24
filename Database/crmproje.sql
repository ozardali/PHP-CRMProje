-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Ara 2016, 00:28:15
-- Sunucu sürümü: 10.1.13-MariaDB
-- PHP Sürümü: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `crmproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_admin`
--

CREATE TABLE `a_admin` (
  `id` int(11) NOT NULL,
  `admin_kadi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `admin_sifre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name_surname` varchar(20) CHARACTER SET utf8 DEFAULT 'Ad Soyad',
  `admin_mail` varchar(250) DEFAULT NULL,
  `admin_gsm` varchar(11) DEFAULT NULL,
  `resim` varchar(500) NOT NULL DEFAULT '/adminfoto/1.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `a_admin`
--

INSERT INTO `a_admin` (`id`, `admin_kadi`, `admin_sifre`, `name_surname`, `admin_mail`, `admin_gsm`, `resim`) VALUES
(1, 'gokselozardali@gmail.com', '202cb962ac59075b964b07152d234b70', 'Göksel Özardalı', 'goksel@ozardali.com', '5411111111', '/fotograf/gokselozardali.png'),
(2, 'furkan', '202cb962ac59075b964b07152d234b70', 'Furkan Belikırık', NULL, NULL, '/adminfoto/furkan-belikirik.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_iletisim`
--

CREATE TABLE `a_iletisim` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `a_iletisim`
--

INSERT INTO `a_iletisim` (`id`, `name`, `email`, `message`) VALUES
(1, 'Ayhan Öztürk', 'ayhan.ozturk@gmail.com', 'Merhabalar, \r\nNeon CRM sistemini daha detaylı incelemek istiyorum. Acaba sizinle nasıl görüşebiliriz?'),
(2, 'Cihan Demirten', 'cihan.demirten@hotmail.com', 'Merhabalar,\r\nNeon CRM sistemini daha detaylı incelemek istiyorum. Acaba sizinle nasıl görüşebiliriz?\r\n'),
(3, 'Ayla Gül', 'ayla.gul@mynet.com', 'Sistemi satın almak istiyorum, lütfen iletişime geçiniz.'),
(4, 'Fuat Tekin', 'f.tekin@gmail.com', 'Sistemi satın almak istiyorum, lütfen iletişime geçiniz.'),
(5, 'Ferhat Şen', 'ferhatsen@hotmail.de', 'Selamlar, ben Neon CRM sistemini kullanmak istiyorum, lütfen iletişime geçiniz.'),
(6, 'Muhammed Bozdağ', 'mbozdag@gmail.com', 'Sistem gerçekten çok güzel olmuş, tebrikler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_mesajlar`
--

CREATE TABLE `a_mesajlar` (
  `mesaj_id` int(2) NOT NULL,
  `mesaj_sahibi` varchar(30) NOT NULL,
  `mesaj_baslik` varchar(30) NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_durumu` int(1) NOT NULL DEFAULT '0',
  `mesaj_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `a_mesajlar`
--

INSERT INTO `a_mesajlar` (`mesaj_id`, `mesaj_sahibi`, `mesaj_baslik`, `mesaj_icerik`, `mesaj_durumu`, `mesaj_tarih`) VALUES
(1, '12345678901', 'VIP Üyelik Hakkında', 'Merhabalar, ben VIP üye olmak istiyorum ama banka bilgilerinizi göremedim. Banka bilgilerini alabilir miyim acaba?', 0, '2016-12-28 22:23:20'),
(2, '11013032111', 'VIP Üyelik Başvurusu', 'Merhaba, ödemeyi de gerçekleştirdim. İyi çalışmalar', 0, '2016-12-28 22:59:49'),
(3, '1301602901', 'VIP Üyelik Başvurusu', 'VIP Başvurusu yaptım, bilginize.', 1, '2016-12-28 23:00:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_premium`
--

CREATE TABLE `a_premium` (
  `id` int(11) NOT NULL,
  `pre_tc` varchar(155) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `a_premium`
--

INSERT INTO `a_premium` (`id`, `pre_tc`, `tarih`) VALUES
(2, '11013032111', '2016-12-28 22:58:26'),
(3, '1301602901', '2016-12-28 23:00:10'),
(4, '42096092900', '2016-12-28 23:01:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_teklif`
--

CREATE TABLE `a_teklif` (
  `proje_id` int(11) NOT NULL,
  `proje_sahip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `proje_ad` varchar(200) NOT NULL,
  `proje_icerik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `a_teklif`
--

INSERT INTO `a_teklif` (`proje_id`, `proje_sahip`, `proje_ad`, `proje_icerik`) VALUES
(1, '12345678901', 'Android Satranç Uygulaması', 'Merhabalar, Android cihazlar üzerinde oynanabilecek bir satranç uygulaması istiyorum.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iller`
--

CREATE TABLE `iller` (
  `il_id` int(11) NOT NULL,
  `il_adi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iller`
--

INSERT INTO `iller` (`il_id`, `il_adi`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyon'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'K.Maraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce'),
(82, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `urun_aciklama` text CHARACTER SET utf8,
  `urun_miktari` int(120) NOT NULL,
  `urun_fiyati` int(100) NOT NULL,
  `urun_resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `urun_aciklama`, `urun_miktari`, `urun_fiyati`, `urun_resim`) VALUES
(1, 'Neon PC', 'Intel Core i7 İşlemci, 8GB DDR4 Bellek, 240GB İntel SSD, Nvidia GTX965 Ekran Kartı', 12, 3250, 'notebook.jpg'),
(2, 'Neon Kalem - 2017 Özel', 'Adınızın özel olarak işlendiği yepyeni bir kalem. NEON!', 5, 49, 'neon.png'),
(3, 'Asus M15 Masaüstü PC', 'Ürün detayları için Asus Resmi sitesini ziyaret ediniz.', 12, 2500, 'neon-pc.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `u_girislog`
--

CREATE TABLE `u_girislog` (
  `giris_id` int(11) NOT NULL,
  `giris_yapan` varchar(100) NOT NULL,
  `giris_ip` varchar(100) NOT NULL,
  `giris_durum` int(2) NOT NULL,
  `giris_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `u_girislog`
--

INSERT INTO `u_girislog` (`giris_id`, `giris_yapan`, `giris_ip`, `giris_durum`, `giris_tarihi`) VALUES
(1, 'gokselozardali@gmail.com', '::1', 1, '2016-12-28 22:20:44'),
(2, 'gokselozardali@gmail.com', '::1', 1, '2016-12-28 22:29:22'),
(3, 'gezenserkan@gmail.com', '::1', 1, '2016-12-28 22:58:21'),
(4, 'hmi.cakir@gmail.com', '::1', 1, '2016-12-28 23:00:04'),
(5, 'furkanbelikirik@gmail.com', '::1', 1, '2016-12-28 23:01:49'),
(6, 'furkanbelikirik@gmail.com', '::1', 1, '2016-12-28 23:02:35'),
(7, 'gokselozardali@gmail.com', '::1', 1, '2016-12-28 23:21:11'),
(8, 'gokselozardali@gmail.com', '::1', 1, '2016-12-28 23:21:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `u_mesajlar`
--

CREATE TABLE `u_mesajlar` (
  `mesaj_id` int(10) NOT NULL,
  `mesaj_giden` varchar(50) NOT NULL,
  `mesaj_baslik` varchar(150) NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `u_mesajlar`
--

INSERT INTO `u_mesajlar` (`mesaj_id`, `mesaj_giden`, `mesaj_baslik`, `mesaj_icerik`, `mesaj_tarihi`) VALUES
(1, '12345678901', 'VIP Banka Bilgileri Hakkında', 'Merhaba Göksel, \r\nÖdemeyi sitemizin anasayfasında bulunan Banka Bilgileri sayfasından bulabilirsin.', '2016-12-28 22:27:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `u_rehber`
--

CREATE TABLE `u_rehber` (
  `id` int(11) NOT NULL,
  `rehber_tc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rehber_adsoyad` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rehber_gsm` varchar(11) CHARACTER SET utf32 NOT NULL,
  `rehber_mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rehber_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `u_rehber`
--

INSERT INTO `u_rehber` (`id`, `rehber_tc`, `rehber_adsoyad`, `rehber_gsm`, `rehber_mail`, `rehber_tarih`) VALUES
(1, '12345678901', 'Furkan Belikırık', '05435544802', 'furkanbelikirik@gmail.com', '2016-12-28 22:31:01'),
(2, '12345678901', 'Melih Özardalı', '05451110513', 'melihozardali@gmail.com', '2016-12-28 22:31:27'),
(3, '12345678901', 'İlkay Özardalı', '05411234567', 'ilkayozardali@gmail.com', '2016-12-28 22:31:41'),
(4, '12345678901', 'Yağmur Aşçı', '05419614942', 'yagmurasci@astrovax.com', '2016-12-28 22:32:03'),
(5, '12345678901', 'Hami Çakır', '05065781214', 'hmi.cakir@gmail.com', '2016-12-28 22:32:27'),
(6, '12345678901', 'İbrahim Çetin (Yazılım Mühendisi)', '05417521245', 'i.cetin@abcyazilim.com', '2016-12-28 22:33:21'),
(7, '12345678901', 'İsmail Gül', '05425641207', 'ismailgul@gmail.com', '2016-12-28 22:33:48'),
(8, '12345678901', 'Mert Aksu', '05345453170', 'mertaksu@gmail.com', '2016-12-28 22:34:13'),
(9, '12345678901', 'Tayfun Ertan', '05069872234', 'tayfunertan@gmail.com', '2016-12-28 22:34:32'),
(10, '12345678901', 'Mert Mandacı', '05343457861', 'mertmandaci@gmail.com', '2016-12-28 22:35:36'),
(11, '12345678901', 'Melike Özardalı', '05426031456', 'melike@ozardali.com', '2016-12-28 22:36:01'),
(12, '12345678901', 'Taner Akağaç', '05322145643', 'tanerakagac22@hotmail.com', '2016-12-28 22:36:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `u_siparisler`
--

CREATE TABLE `u_siparisler` (
  `siparis_id` int(11) NOT NULL,
  `siparis_veren` varchar(11) NOT NULL,
  `siparis_urunid` int(11) NOT NULL,
  `siparis_adres` text CHARACTER SET utf8 NOT NULL,
  `siparis_il` varchar(255) CHARACTER SET utf8 NOT NULL,
  `siparis_postakod` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `u_siparisler`
--

INSERT INTO `u_siparisler` (`siparis_id`, `siparis_veren`, `siparis_urunid`, `siparis_adres`, `siparis_il`, `siparis_postakod`, `tarih`) VALUES
(1, '12345678901', 1, 'Tarlakapı Caddesi No:38 Trakyakontör Merkez,Edirne', '22', '22100', '2016-12-28 22:30:00'),
(2, '11013032111', 3, 'Adana Merkez', '1', '06100', '2016-12-28 22:58:53'),
(3, '1301602901', 2, 'Gebze Merkez ', '41', '35123', '2016-12-28 23:00:57'),
(4, '42096092900', 2, 'İstanbul Maltepe', '34', '34123', '2016-12-28 23:02:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `u_uyeler`
--

CREATE TABLE `u_uyeler` (
  `uye_id` int(5) NOT NULL,
  `uye_tc` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `uye_adsoyad` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uye_mail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uye_sifre` varchar(40) COLLATE utf8_turkish_ci DEFAULT 'd39a50edc7cad8865a7c3c22b33db10f',
  `uye_gsm` varchar(10) CHARACTER SET utf8 NOT NULL,
  `uye_il` int(15) DEFAULT '34',
  `uye_foto` varchar(255) CHARACTER SET utf8 DEFAULT 'profil.png',
  `uye_kayittarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_tip` int(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `u_uyeler`
--

INSERT INTO `u_uyeler` (`uye_id`, `uye_tc`, `uye_adsoyad`, `uye_mail`, `uye_sifre`, `uye_gsm`, `uye_il`, `uye_foto`, `uye_kayittarih`, `uye_tip`) VALUES
(1, '12345678901', 'Göksel Özardalı', 'gokselozardali@gmail.com', '123', '5419614941', 34, 'goksel.jpg', '2016-12-28 22:40:49', 1),
(2, '42096092900', 'Furkan Belikırık', 'furkanbelikirik@gmail.com', '123', '5419614940', 34, 'furkan.jpg', '2016-12-28 22:41:49', 0),
(3, '11013032111', 'Serkan Gezen', 'gezenserkan@gmail.com', '123', '5395890685', 1, 'serkan-gezen.jpg', '2016-12-28 22:43:05', 0),
(4, '1301602901', 'Hami Çakır', 'hmi.cakir@gmail.com', '123', '5060540591', 34, 'profil.png', '2016-12-28 22:47:46', 0),
(5, '1201501305', 'Cansu Şengöz', 'cansu.sengoz@yturok.com', '123', '5547840418', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(6, '1201306721', 'Yusuf Gürel', 'yusuf.gurel@yturok.com', '123', '5376897120', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(7, '1201308421', 'Çağrı Sezgin', 'cagrisezgin@yturok.com', '123', '5386825455', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(8, '1401504321', 'Hürcan Samet Çakır', 'hurcansametcakir@yturok.com', '123', '5353081109', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(9, '1401501832', 'Nesrin Sezer', 'nesrinsezer@yturok.com', '123', '5466393580', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(10, '1401500931', 'Beyhan Çeviral', 'beyhan.ceviral@yturok.com', '123', '5350524636', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(11, '1401411321', 'Kübra Kuş', 'kubra.kus@yturok.com', '123', '5394711904', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(12, '1401601467', 'Simge Gönen', 'simgegonen@yturok.com', '123', '5426380391', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(13, '1301601454', 'Sedanur Şen', 'sedanur.sen@yturok.com', '123', '5373568945', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(14, '1402301742', 'Tahsin Güneç', 'tahsin.gunec@yturok.com', '123', '5078340209', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(15, '1201505021', 'Reha Özgür Şimşek', 'rehaozgur.simsek@yturok.com', '123', '5535305120', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(16, '1401505145', 'Fatih Kaan Akkuş', 'fatihkaanakkus@yturok.com', '123', '5384219701', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(17, '1106609478', 'M. Ozan Köseoğlu', 'mozankoseoglu@yturok.com', '123', '5453693421', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(18, '1301213985', 'Aslınur Yertutan', 'aslinur.yertutan@yturok.com', '123', '5399883664', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(19, '1401601583', 'Berkan Önder Karamelek', 'bonderkaramelek@yturok.com', '123', '5363001665', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(20, '1501505220', 'Hadiye Cansu', 'Emron', '123', '5315197538', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(21, '1401504014', 'Şirin Yakupoğlu', 'sirinyakupoglu@yturok.com', '123', '5061090098', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(22, '1401602441', 'Emre Altuntaş', 'emrealtuntas@yturok.com', '123', '5312488074', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(23, '1201502124', 'Elanur İnel', 'elanurinel@yturok.com', '123', '5557121565', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(24, '1101502767', 'Göker Güner', 'gokerguner67@gmail.com', '123', '534204767', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(25, '1101250412', 'Azize Büşra Ulak', 'azizeulak@hotmail.com', '123', '0531014530', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(26, '1150400476', 'Şafak Özçelik', 'safakozcelik@windowslive.com', '123', '553341623', 34, 'profil.png', '2016-12-28 22:49:09', 0),
(27, '1150650012', 'Ali Hilmi Gür', 'alihilmigur@gmail.com', '123', '5535435973', 34, 'profil.png', '2016-12-28 22:49:09', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `a_admin`
--
ALTER TABLE `a_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_kadi` (`admin_kadi`),
  ADD UNIQUE KEY `admin_mail` (`admin_mail`);

--
-- Tablo için indeksler `a_iletisim`
--
ALTER TABLE `a_iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `a_mesajlar`
--
ALTER TABLE `a_mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `a_premium`
--
ALTER TABLE `a_premium`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `a_teklif`
--
ALTER TABLE `a_teklif`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `u_girislog`
--
ALTER TABLE `u_girislog`
  ADD PRIMARY KEY (`giris_id`);

--
-- Tablo için indeksler `u_mesajlar`
--
ALTER TABLE `u_mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `u_rehber`
--
ALTER TABLE `u_rehber`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `u_siparisler`
--
ALTER TABLE `u_siparisler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `u_uyeler`
--
ALTER TABLE `u_uyeler`
  ADD PRIMARY KEY (`uye_id`),
  ADD UNIQUE KEY `uye_id` (`uye_id`),
  ADD UNIQUE KEY `uye_ogrencino` (`uye_tc`),
  ADD UNIQUE KEY `uye_mail` (`uye_mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `a_admin`
--
ALTER TABLE `a_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `a_iletisim`
--
ALTER TABLE `a_iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `a_mesajlar`
--
ALTER TABLE `a_mesajlar`
  MODIFY `mesaj_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `a_premium`
--
ALTER TABLE `a_premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `a_teklif`
--
ALTER TABLE `a_teklif`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `u_girislog`
--
ALTER TABLE `u_girislog`
  MODIFY `giris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `u_mesajlar`
--
ALTER TABLE `u_mesajlar`
  MODIFY `mesaj_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `u_rehber`
--
ALTER TABLE `u_rehber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `u_siparisler`
--
ALTER TABLE `u_siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `u_uyeler`
--
ALTER TABLE `u_uyeler`
  MODIFY `uye_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
