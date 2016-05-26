-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mei 2016 pada 09.40
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `els_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop`
--

CREATE TABLE `cop` (
  `id_cop` int(11) NOT NULL,
  `id_scope` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `summary` text,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cop`
--

INSERT INTO `cop` (`id_cop`, `id_scope`, `id_user`, `title`, `content`, `summary`, `type`, `created_at`, `updated_at`, `status`) VALUES
(5, NULL, 2, 'asdasdds', '<p>asdasdasdasd</p>', '<p>Jadi ya intinya sih saya juga gak ngerti maksudnya apaan, hahaha.</p>', 1, '2016-05-10 17:03:50', '2016-05-12 10:56:55', 0),
(6, NULL, 5, 'Coba inovasi baru ah', '<p>asdasdasdasdasdasdasd</p>', NULL, 1, '2016-05-11 03:57:40', '2016-05-11 03:57:40', 1),
(7, 1, 2, 'Kita akan belajar tentang ecommerce, teng teng teng', '<p>Ayo anak-anak kita akan mulai belajar sebentar lagi yaaa</p>', '', 2, '2016-05-19 02:20:14', '2016-05-19 05:31:24', 0),
(8, 2, 2, 'Enterprise Management cooy', '<p>Ini nih yang paling rame tuh kalau kita bahas enterprise management</p>', '<p>Coba dulu gan</p>', 2, '2016-05-19 03:20:46', '2016-05-19 05:52:30', 0),
(9, 3, 2, 'Coba practice', '<p>Best practice</p>', '<p>intinya gitu sih</p>', 2, '2016-05-19 05:55:21', '2016-05-19 05:55:47', 0),
(10, 4, 2, 'zz', '<p>zz</p>', '<p>Kesimpulannya ya gitu</p>', 2, '2016-05-19 06:15:48', '2016-05-19 06:20:37', 0),
(11, 2, 2, 'Wooyah', '<p>Apalah ini deskripsi gak jelas</p>', '<p>gitulah gatau gue juga pusing</p>', 2, '2016-05-19 08:05:13', '2016-05-19 08:10:13', 0),
(12, 3, 5, 'Apalah kumaha sia we', '<p>Yongkru mamen</p>', '<p>apa?</p>', 2, '2016-05-19 12:00:11', '2016-05-26 05:01:10', 0),
(13, 2, 2, 'Ini kita bahas ginian', '<p>aaaaaaaaaaaaa</p>', '<p>Kesimpulan gak penting</p>', 2, '2016-05-19 12:00:33', '2016-05-19 12:01:09', 0),
(14, 2, 4, 'Testing BP', '<p>Yongkru mamen</p>', '<p>Kesimpulan</p>', 2, '2016-05-22 09:23:55', '2016-05-26 05:00:59', 0),
(15, 2, 2, 'juduuul', '<p>aaaaaa</p>', '<p>kes</p>', 2, '2016-05-26 01:08:30', '2016-05-26 01:25:56', 0),
(16, 2, 2, 'enter', '<p>a</p>', '<p>Cu</p>', 2, '2016-05-26 01:26:14', '2016-05-26 01:26:23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_comment`
--

CREATE TABLE `cop_comment` (
  `id_comment` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cop_comment`
--

INSERT INTO `cop_comment` (`id_comment`, `id_cop`, `id_user`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'Spam woy!', '<p>Jangan nyepam mulu gan</p>', '2016-05-12 09:05:16', '0000-00-00 00:00:00'),
(2, 5, 2, 'Cek lagi', '<p><i>dopost</i></p>', '2016-05-12 09:07:19', '0000-00-00 00:00:00'),
(3, 5, 2, 'bodo amat', '<p><i><b><u>apasih</u></b></i></p>', '2016-05-12 09:07:46', '0000-00-00 00:00:00'),
(4, 5, 2, 'bold cenah', '<p><b></b><b>bold</b><b></b></p>', '2016-05-12 09:08:39', '0000-00-00 00:00:00'),
(5, 5, 4, 'Naon anjing', '<p>Kalian ini pada kenapa sih, gak ada kerjaan deh.</p>', '2016-05-12 09:55:07', '0000-00-00 00:00:00'),
(6, 5, 4, 'Naon anjing', '<p>Kalian ini pada kenapa sih, gak ada kerjaan deh.</p>', '2016-05-12 09:55:07', '0000-00-00 00:00:00'),
(7, 6, 2, '', '<p>Naon ari sia ngadon ngabacot</p>', '2016-05-19 03:08:42', '0000-00-00 00:00:00'),
(8, 11, 2, 'Eh ada yang salah', '<p>ini harusnya ini</p>', '2016-05-19 08:05:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_invitation`
--

CREATE TABLE `cop_invitation` (
  `id_invitation` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cop_invitation`
--

INSERT INTO `cop_invitation` (`id_invitation`, `id_cop`, `id_user`) VALUES
(6, 5, 2),
(7, 5, 4),
(9, 6, 5),
(10, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_step` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  `location` varchar(20) NOT NULL,
  `quota` int(11) NOT NULL,
  `summary` text NOT NULL,
  `report_file` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `id_user`, `id_step`, `id_scope`, `title`, `description`, `datetime`, `location`, `quota`, `summary`, `report_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 2, 'Kuliah menjadi pribadi yang tidak membanggakan (Private)', 'Rahasia', '2016-05-25 00:00:00', 'On request', 1, '', '', 1, '2016-05-24 06:57:19', '2016-05-24 07:01:37'),
(2, 2, 2, 3, 'Kuliah anti bahlul', '<p>Pokoknya ente-ente harus ikut</p>', '2016-05-26 11:00:00', 'Kelas', 20, '', '', 1, '2016-05-24 07:19:49', '2016-05-24 07:20:26'),
(3, 4, 4, 4, 'Kelas android untuk orang bego', '<p>Cek 123456789</p>', '2016-05-27 11:00:00', 'Rahasia', 20, '', '', 1, '2016-05-25 14:16:20', '2016-05-25 14:16:20'),
(4, 5, 3, 4, 'Laravel 101', '<p>Tentang sesuatu yang.... gak tau itulah pokoknya</p>', '2016-05-28 05:00:00', 'Gedung sebelah', 20, '', '', 1, '2016-05-25 14:20:05', '2016-05-25 14:20:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_participant`
--

CREATE TABLE `course_participant` (
  `id_participant` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course_participant`
--

INSERT INTO `course_participant` (`id_participant`, `id_course`, `id_user`, `enrolled_at`) VALUES
(1, 1, 2, '2016-05-24 07:11:07'),
(2, 2, 4, '2016-05-25 14:17:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `directorate`
--

CREATE TABLE `directorate` (
  `id_directorate` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `directorate_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `directorate`
--

INSERT INTO `directorate` (`id_directorate`, `id_scope`, `directorate_name`) VALUES
(1, 2, 'CEO''s Office'),
(2, 2, 'Finance'),
(3, 2, 'Human Capital Management'),
(4, 4, 'Information Technology'),
(5, 4, 'LTE Champion'),
(6, 1, 'Marketing'),
(7, 4, 'Network'),
(8, 3, 'Planning and Transformation'),
(9, 1, 'Sales Directorate'),
(99, 99, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion`
--

CREATE TABLE `discussion` (
  `id_discussion` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_step` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `summary` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `discussion`
--

INSERT INTO `discussion` (`id_discussion`, `id_scope`, `id_user`, `id_step`, `title`, `content`, `summary`, `created_at`, `updated_at`, `status`, `views`) VALUES
(1, 2, 2, 5, 'Apalah artinya judul', '<p>Apalah artinya konten</p>', '', '2016-05-20 01:32:18', '2016-05-21 17:03:24', 0, 0),
(2, 3, 2, 2, 'Kenapa saya disuruh bikin diskusi di ecommerce juga?', '<p>yaudahlah terserah kalian aja, saya mah jadi tumbal juga gak apa-apa. hayuk diskusi</p>', '', '2016-05-20 02:15:48', '2016-05-21 17:03:24', 0, 0),
(3, 2, 5, 6, 'saya mah ngalah aja lah disuruh ini juga', '<p>Terserah bung</p>', '', '2016-05-21 09:36:50', '2016-05-21 16:54:18', 3, 0),
(4, 4, 5, 3, 'Anjir naha ICT', '<p>Teuing bray urang&nbsp;</p>', '', '2016-05-21 09:37:04', '2016-05-21 17:03:24', 0, 0),
(5, 2, 4, 1, 'kok saya harus bikin lagi?', '<p>entahlah</p>', '', '2016-05-21 16:16:58', '2016-05-21 16:33:58', 1, 0),
(6, 4, 4, 4, 'Gamau lah males banget', '<p>Braaay bantuin bray</p>', '', '2016-05-21 16:17:56', '2016-05-21 16:34:02', 1, 0),
(7, 3, 4, 7, 'Aaaaaaaaaaaaaaaaaaaaaaaaa', '<p>oooooo</p>', '', '2016-05-21 16:24:57', '2016-05-21 16:34:06', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion_comment`
--

CREATE TABLE `discussion_comment` (
  `id_comment` int(11) NOT NULL,
  `id_discussion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `discussion_comment`
--

INSERT INTO `discussion_comment` (`id_comment`, `id_discussion`, `id_user`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'a', '<p>b</p>', '2016-05-21 16:10:32', '2016-05-21 16:10:32'),
(2, 4, 3, 'jelek pak', '<p>nyampah banget lu jadi BE</p>', '2016-05-21 16:11:41', '2016-05-21 16:11:41'),
(3, 4, 4, 'Mampus lo, wkwkwk', '<p>-</p>', '2016-05-21 16:18:23', '2016-05-21 16:18:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion_vote`
--

CREATE TABLE `discussion_vote` (
  `id_vote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_discussion` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `discussion_vote`
--

INSERT INTO `discussion_vote` (`id_vote`, `id_user`, `id_discussion`, `timestamp`) VALUES
(1, 2, 1, '2016-05-21 09:16:33'),
(2, 2, 2, '2016-05-21 09:20:47'),
(12, 5, 3, '2016-05-21 09:45:36'),
(13, 5, 2, '2016-05-21 09:45:55'),
(14, 5, 4, '2016-05-21 09:45:57'),
(15, 2, 4, '2016-05-21 10:22:53'),
(16, 4, 7, '2016-05-21 16:35:46'),
(17, 4, 5, '2016-05-21 16:35:48'),
(18, 4, 6, '2016-05-21 16:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expert`
--

CREATE TABLE `expert` (
  `id_expert` int(11) NOT NULL,
  `id_directorate` int(11) NOT NULL,
  `expert_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `expert`
--

INSERT INTO `expert` (`id_expert`, `id_directorate`, `expert_name`) VALUES
(1, 1, 'Business Expert Cost Leadership Engine Transformation'),
(2, 1, 'Business Expert Investigation Audit'),
(3, 1, 'Business Expert Organization and Culture Engine Transformation'),
(4, 1, 'Business Expert Technology Engine Transformation'),
(5, 1, 'Senior Business Expert Cost Leadership Engine Transformation'),
(6, 1, 'Senior Business Expert Organization and Culture Engine Transformation'),
(7, 1, 'Senior Business Expert Technology Engine Transformation'),
(8, 1, 'Senior Business Expert Top Line Revenues Engine Transformation'),
(9, 2, 'Senior Business Expert Financial System and Process Development'),
(10, 3, 'Business Expert Performance and Reward Strategy'),
(11, 4, 'Business Expert IT Operation'),
(12, 4, 'Senior Business Expert IT Application Consolidation'),
(13, 5, 'Business Expert LTE Commercial Research'),
(14, 5, 'Business Expert LTE Strategic Partnership'),
(15, 5, 'Technical Expert Core Planning and Rollout'),
(16, 5, 'Technical Expert IT Planning and Rollout'),
(17, 5, 'Technical Expert RAN Planning and Rollout'),
(18, 5, 'Technical Expert RAN Planning and Rollout'),
(19, 5, 'Technical Expert Transport and Support Planning and Rollout'),
(20, 6, 'Senior Business Expert Marketing'),
(21, 7, 'Business Expert Network Transformation'),
(22, 7, 'Business Expert Project Management'),
(23, 7, 'Senior Business Expert Network Business Portfolio Strategy'),
(24, 7, 'Senior Technical Expert Network Planning, Engineering and Deployment'),
(25, 7, 'Technical Expert Network Service and Operation Excellence'),
(26, 7, 'Technical Expert Service and Quality Assurance'),
(27, 7, 'Planning and Transformation Directorate'),
(28, 7, 'Senior Business Expert Enterprise Regulatory and Compliance'),
(30, 9, 'Business Expert Digital Customer Care'),
(31, 9, 'Business Expert Internal Control Jabotabek Jabar'),
(32, 9, 'Business Expert Internal Control Pamasuka'),
(33, 9, 'Business Expert Sales and Service Strategy'),
(34, 9, 'Senior Business Expert CRM Project Management'),
(35, 9, 'Senior Business Expert Product, Service and Distribution Strategy'),
(36, 7, 'Advisor CNOP Internal Business Control'),
(37, 7, 'Expert Engineer CNOP Planning and Deployment'),
(38, 0, 'karyawan'),
(99, 99, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `journal`
--

CREATE TABLE `journal` (
  `id_journal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_directorate` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(500) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `journal`
--

INSERT INTO `journal` (`id_journal`, `id_user`, `id_directorate`, `title`, `description`, `file`, `views`, `created_at`, `status`) VALUES
(2, 2, 6, 'Analisis dan Implementasi Aplikasi Ini dan Itu', 'Ini adalah panduan umum startup challenge unpas 2016, lalala yeyeye, karena tulisan ini adalah deskripsi maka harusnya tulisan ini panjang banget gitu loh ya biar keliatannya bagus pake banget', '34160e9a6fbc8078bc2a45d0716af20e[NEW] Panduan Umum Startup Challenge UNPAS 2016 (update 4 April 2016).pdf', 8, '2016-05-26 02:40:02', 1),
(3, 2, 4, 'Coba', 'aslkdjawidjjd aslkdjawid aslkdjawi', '61eb65bb2a3245a730b54b9ace3fa8a9Slide Sebuku.pdf', 1, '2016-05-10 15:09:14', 1),
(4, 2, 6, 'apaan tuh', 'gak tau deh', '5f0e070824382c6c79cd0dae28b28fc0Sebuku Business Model.pdf', 2, '2016-05-26 02:30:13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `journal_comment`
--

CREATE TABLE `journal_comment` (
  `id_comment` int(11) NOT NULL,
  `id_journal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `journal_comment`
--

INSERT INTO `journal_comment` (`id_comment`, `id_journal`, `id_user`, `content`, `created_at`) VALUES
(1, 2, 2, '', '2016-05-11 03:12:27'),
(2, 2, 2, 'Wah, journalnya keren gan', '2016-05-11 03:12:55'),
(3, 3, 2, 'cek', '2016-05-11 03:30:33'),
(4, 2, 2, 'asdasd', '2016-05-19 14:48:32'),
(5, 2, 2, '', '2016-05-22 09:41:59'),
(6, 2, 2, 'asd', '2016-05-22 09:42:34'),
(7, 3, 2, 'asd', '2016-05-23 09:52:38'),
(8, 2, 3, 'euy', '2016-05-26 04:56:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level_name`) VALUES
(1, 'admin'),
(2, 'be'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `id_expert` int(11) DEFAULT NULL,
  `pic` varchar(500) DEFAULT 'default.jpeg',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `NIK`, `id_user`, `fullname`, `birthdate`, `gender`, `id_expert`, `pic`, `updated_at`, `login`) VALUES
(1, '62012', 2, 'Rochadi', NULL, NULL, 36, NULL, '2016-05-18 01:00:45', 1),
(2, '1234', 3, 'Karyawan', NULL, NULL, 99, NULL, '2016-05-18 01:03:17', 1),
(3, '75238', 4, 'Yudi Nugraha', NULL, NULL, 32, NULL, '2016-05-10 16:24:31', 1),
(4, '740195', 5, 'Mohamad Noer Fajar', NULL, NULL, 37, NULL, '2016-05-11 03:33:20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_pending`
--

CREATE TABLE `profile_pending` (
  `id_pending` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `NIK` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F','','') DEFAULT NULL,
  `id_expert` int(11) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `scope`
--

CREATE TABLE `scope` (
  `id_scope` int(11) NOT NULL,
  `scope_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `scope`
--

INSERT INTO `scope` (`id_scope`, `scope_name`) VALUES
(1, 'Ecommerce'),
(2, 'Enterprise Management'),
(3, 'Strategic Planning & Business'),
(4, 'Information Communication Technology'),
(99, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `state`
--

CREATE TABLE `state` (
  `id_state` int(11) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `state`
--

INSERT INTO `state` (`id_state`, `step`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `step`
--

CREATE TABLE `step` (
  `id_step` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `bp_quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `step`
--

INSERT INTO `step` (`id_step`, `id_user`, `id_scope`, `step`, `keterangan`, `id_cop`, `bp_quota`) VALUES
(1, 4, 2, 2, 'Bagien eta', 8, 1),
(2, 2, 3, 6, 'Bagean ieu', 9, 1),
(3, 5, 4, 6, 'maneh jelasin itu', 10, 1),
(4, 4, 4, 6, 'maneh jelasin ini', 10, 1),
(5, 2, 2, 6, 'yah', 11, 1),
(6, 5, 2, 2, 'Bahas itu ya coy', 13, 1),
(7, 4, 3, 2, 'yoi bray', 12, 0),
(8, 5, 3, 1, 'Topik BP', 14, 0),
(9, 2, 2, 1, 'aaaaaaaaaaa', 15, 0),
(10, 4, 2, 1, 'bbbbbbbbbbbbbb', 15, 0),
(11, 5, 2, 1, 'cccccccccccc', 15, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `id_level`, `registered_at`, `stat`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2016-03-18 02:56:24', 1),
(2, 'rochadi@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-04-16 15:55:16', 1),
(3, 'karyawan@gmail.com', '9e014682c94e0f2cc834bf7348bda428', 3, '2016-05-02 10:12:00', 1),
(4, 'yudi_nugraha@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:21:40', 1),
(5, 'mohamad_n_fajar@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:26:40', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cop`
--
ALTER TABLE `cop`
  ADD PRIMARY KEY (`id_cop`);

--
-- Indexes for table `cop_comment`
--
ALTER TABLE `cop_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `cop_invitation`
--
ALTER TABLE `cop_invitation`
  ADD PRIMARY KEY (`id_invitation`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `course_participant`
--
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- Indexes for table `directorate`
--
ALTER TABLE `directorate`
  ADD PRIMARY KEY (`id_directorate`),
  ADD KEY `id_scope` (`id_scope`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id_discussion`);

--
-- Indexes for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id_expert`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id_journal`);

--
-- Indexes for table `journal_comment`
--
ALTER TABLE `journal_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `NIP` (`NIK`);

--
-- Indexes for table `profile_pending`
--
ALTER TABLE `profile_pending`
  ADD PRIMARY KEY (`id_pending`);

--
-- Indexes for table `scope`
--
ALTER TABLE `scope`
  ADD PRIMARY KEY (`id_scope`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id_state`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id_step`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cop`
--
ALTER TABLE `cop`
  MODIFY `id_cop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cop_comment`
--
ALTER TABLE `cop_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cop_invitation`
--
ALTER TABLE `cop_invitation`
  MODIFY `id_invitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course_participant`
--
ALTER TABLE `course_participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `directorate`
--
ALTER TABLE `directorate`
  MODIFY `id_directorate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `journal_comment`
--
ALTER TABLE `journal_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profile_pending`
--
ALTER TABLE `profile_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scope`
--
ALTER TABLE `scope`
  MODIFY `id_scope` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `directorate`
--
ALTER TABLE `directorate`
  ADD CONSTRAINT `directorate_ibfk_1` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
