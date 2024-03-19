-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Haz 2022, 13:52:25
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `CS306_Project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Admin`
--

CREATE TABLE `Admin` (
  `username` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` char(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Admin`
--

INSERT INTO `Admin` (`username`, `pass`) VALUES
('CS306', 'CS306');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Class`
--

CREATE TABLE `Class` (
  `classid` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `Capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Class`
--

INSERT INTO `Class` (`classid`, `Capacity`) VALUES
('Fass1099', 30),
('FassG062', 150),
('FensG032', 80),
('FensG035', 80),
('FensG077', 275),
('FensL067', 45),
('Fman1099', 275);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Courses`
--

CREATE TABLE `Courses` (
  `course_id` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Courses`
--

INSERT INTO `Courses` (`course_id`, `course_name`) VALUES
('20222', 'CS210'),
('20227', 'CS300'),
('20353', 'IE303'),
('20364', 'IE309'),
('20683', 'CS201'),
('20777', 'CS204'),
('20990', 'IE312');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `CourseSchedule`
--

CREATE TABLE `CourseSchedule` (
  `classid` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `begining` datetime NOT NULL,
  `ending` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `CourseSchedule`
--

INSERT INTO `CourseSchedule` (`classid`, `course_id`, `begining`, `ending`) VALUES
('FENSG077', '20227', '2022-06-02 18:30:00', '2022-06-02 20:00:00'),
('Fman1099', '20222', '2022-06-02 10:00:00', '2022-06-02 11:30:00'),
('Fman1099', '20222', '2022-06-02 15:30:00', '2022-06-02 17:00:00'),
('Fman1099', '20222', '2022-06-02 18:30:00', '2022-06-02 20:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Enrollment`
--

CREATE TABLE `Enrollment` (
  `course_id` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Enrollment`
--

INSERT INTO `Enrollment` (`course_id`, `stu_id`) VALUES
('20222', 22051),
('20222', 25021),
('20227', 22051);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `EXAM`
--

CREATE TABLE `EXAM` (
  `classid` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_id` int(11) DEFAULT NULL,
  `inst_id` int(11) DEFAULT NULL,
  `course_id` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_start` datetime DEFAULT NULL,
  `exam_finish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Instructor`
--

CREATE TABLE `Instructor` (
  `inst_id` int(11) NOT NULL,
  `inst_name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Instructor`
--

INSERT INTO `Instructor` (`inst_id`, `inst_name`) VALUES
(11232, 'Gulsen Demiroz'),
(12323, 'Yücel Saygın'),
(22222, 'Emre Erol'),
(23344, 'Inanc Arin'),
(28773, 'Cem Güneri'),
(38344, 'Selim Balcisoy'),
(44321, 'Robert Booth'),
(54123, 'Baris Altop');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Observer`
--

CREATE TABLE `Observer` (
  `obs_id` int(11) NOT NULL,
  `obs_name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Observer`
--

INSERT INTO `Observer` (`obs_id`, `obs_name`) VALUES
(22143, 'Ece Erulker'),
(22399, 'Buse Nur Karatepe'),
(23453, 'Damla Kaya'),
(23455, 'Ebru Aslan'),
(25734, 'Arca Ozkan'),
(45433, 'Tolga Erguner');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Student`
--

CREATE TABLE `Student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_gen` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_ent_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Student`
--

INSERT INTO `Student` (`stu_id`, `stu_name`, `stu_gen`, `stu_ent_year`) VALUES
(22051, 'Yaren Demir', 'F', 2021),
(25021, 'Baris Ege Cetin', 'M', 2017),
(26678, 'Sude Kadayifci', 'F', 2018),
(27756, 'Burcu Durmus', 'F', 2019),
(27899, 'Umut Ulas Aydin', 'M', 2019),
(28046, 'Sarp Sargınoglu', 'M', 2019),
(29459, 'Begüm Yardimci', 'F', 2020),
(30521, 'Teoman Yamacı', 'M', 2021);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Teach`
--

CREATE TABLE `Teach` (
  `inst_id` int(11) NOT NULL,
  `course_id` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `Teach`
--

INSERT INTO `Teach` (`inst_id`, `course_id`) VALUES
(11232, '20222'),
(11232, '20227'),
(23344, '20227');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`classid`);

--
-- Tablo için indeksler `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Tablo için indeksler `CourseSchedule`
--
ALTER TABLE `CourseSchedule`
  ADD PRIMARY KEY (`classid`,`begining`),
  ADD KEY `course_id` (`course_id`);

--
-- Tablo için indeksler `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`course_id`,`stu_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Tablo için indeksler `EXAM`
--
ALTER TABLE `EXAM`
  ADD KEY `classid` (`classid`),
  ADD KEY `obs_id` (`obs_id`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Tablo için indeksler `Instructor`
--
ALTER TABLE `Instructor`
  ADD PRIMARY KEY (`inst_id`);

--
-- Tablo için indeksler `Observer`
--
ALTER TABLE `Observer`
  ADD PRIMARY KEY (`obs_id`);

--
-- Tablo için indeksler `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Tablo için indeksler `Teach`
--
ALTER TABLE `Teach`
  ADD PRIMARY KEY (`inst_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `CourseSchedule`
--
ALTER TABLE `CourseSchedule`
  ADD CONSTRAINT `courseschedule_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `Class` (`classid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `courseschedule_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `Student` (`stu_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `EXAM`
--
ALTER TABLE `EXAM`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `Class` (`classid`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`obs_id`) REFERENCES `Observer` (`obs_id`),
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`inst_id`) REFERENCES `Instructor` (`inst_id`),
  ADD CONSTRAINT `exam_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);

--
-- Tablo kısıtlamaları `Teach`
--
ALTER TABLE `Teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`inst_id`) REFERENCES `Instructor` (`inst_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
