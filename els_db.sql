-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2016 pada 15.18
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
(21, 1, 5, 'coba', '<p>eco</p>', '<p>eco</p>', 2, '2016-05-27 16:09:16', '2016-05-27 23:41:23', 0),
(22, 2, 2, 'Enterprise', '<p>hm</p>', '<p>aaa</p>', 2, '2016-05-27 23:27:42', '2016-05-27 23:28:17', 0),
(23, 2, 2, 'EP lagi', '<p>coba ep</p>', '<p>a</p>', 2, '2016-05-27 23:28:37', '2016-05-31 02:28:19', 0),
(24, 3, 2, 'SPB', '<p>Coba aja dulu</p>', '<p>SPB cenah</p>', 2, '2016-05-27 23:32:47', '2016-05-27 23:33:11', 0),
(25, 4, 2, 'ICT', '<p>Coba ICT</p>', '<p>kes</p>', 2, '2016-05-27 23:40:00', '2016-05-27 23:40:18', 0),
(26, 1, 10, 'ecommerce coba', '<p>ads</p>', '<p>ahay</p>', 2, '2016-05-28 00:00:25', '2016-05-28 00:00:52', 0),
(27, NULL, 2, 'Coba notif inov', '<p>Cek 123 123 123</p>', '<p>asdasd</p>', 1, '2016-05-31 07:03:04', '2016-05-31 07:03:50', 0),
(28, NULL, 2, 'inov', '<p>cek</p>', NULL, 1, '2016-05-31 07:04:04', '2016-05-31 07:04:04', 1),
(29, NULL, 2, 'inov lagi', '<p>coba coba</p>', NULL, 1, '2016-05-31 07:16:49', '2016-05-31 07:16:49', 1),
(30, 1, 2, 'Coba', '<p>Cek 123 cek</p>', '<p>kesh</p>', 2, '2016-05-31 07:56:37', '2016-05-31 11:06:08', 0),
(31, NULL, 2, 'Testing inov', '<p>Deskriasjipdas</p>', NULL, 1, '2016-05-31 11:01:32', '2016-05-31 11:01:32', 1),
(32, 4, 5, 'Best', '<p>Coba buka ICT</p>', '<p>Kesimpulannya</p>', 2, '2016-05-31 11:04:10', '2016-05-31 11:04:37', 0),
(33, 2, 2, 'coba bp', '<p>Cek</p>', NULL, 2, '2016-05-31 11:37:27', '2016-05-31 11:37:27', 1);

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
(1, 30, 4, '', '<p>oppoo</p>', '2016-05-31 07:57:10', '0000-00-00 00:00:00'),
(2, 30, 5, '', '<p>apa bray</p>', '2016-05-31 07:58:02', '0000-00-00 00:00:00'),
(3, 30, 5, '', '<p>sue</p>', '2016-05-31 07:59:41', '0000-00-00 00:00:00'),
(4, 30, 5, '', '<p>cek notif</p>', '2016-05-31 08:03:39', '0000-00-00 00:00:00'),
(5, 30, 5, '', '<p>coba lagi notif</p>', '2016-05-31 08:04:48', '0000-00-00 00:00:00'),
(6, 30, 5, '', '<p>coba lagi dongs</p>', '2016-05-31 08:08:42', '0000-00-00 00:00:00'),
(7, 28, 2, '', '<p>hoalaaah~</p>', '2016-05-31 08:21:12', '0000-00-00 00:00:00'),
(8, 28, 2, '', '<p>hoalaaah~</p>', '2016-05-31 08:21:12', '0000-00-00 00:00:00'),
(9, 30, 18, '', '<p>coba</p>', '2016-05-31 10:54:30', '0000-00-00 00:00:00'),
(10, 31, 5, '', '<p>apaan lo nginvite gue</p>', '2016-05-31 11:01:53', '0000-00-00 00:00:00'),
(11, 33, 2, '', '<p>dasdasdasdjagdad</p>', '2016-05-31 11:43:27', '0000-00-00 00:00:00'),
(12, 33, 2, '', '<p>dasdasdasdjagdad</p>', '2016-05-31 11:45:15', '0000-00-00 00:00:00'),
(13, 33, 2, '', '<p>tes lagi</p>', '2016-05-31 11:45:33', '0000-00-00 00:00:00');

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
(1, 27, 2),
(2, 27, 5),
(3, 27, 10),
(4, 28, 2),
(5, 28, 5),
(6, 28, 10),
(7, 29, 2),
(8, 29, 4),
(9, 29, 5),
(10, 31, 2),
(11, 31, 4),
(12, 31, 5),
(13, 31, 10),
(14, 31, 16),
(15, 31, 18);

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
(1, 2, 22, 3, 'Kuliah Strategic Planning And Business 101', '<p>Pengantar Strategic planning and business</p>', '2016-05-30 06:00:00', 'Gedung C', 20, '', '', 1, '2016-05-28 06:47:28', '2016-05-28 06:47:28'),
(2, 2, 28, 2, 'Waaaaw', '<p>Cek 123</p>', '2016-05-31 00:00:00', 'Kos', 1, '<p>Alhamdulillah Selesai</p>', '', 0, '2016-05-31 11:16:40', '2016-05-31 11:18:27');

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
(1, 1, 3, '2016-05-31 04:13:34'),
(2, 2, 9, '2016-05-31 11:17:08');

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
(99, 99, 'General');

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
(15, 3, 2, 22, 'Coba strategic planning and business', '<p>Hayo loh hayo</p>', '', '2016-05-27 23:42:48', '2016-05-28 06:41:54', 0, 0),
(16, 1, 2, 26, 'Ecommerce by rochadi~', '<p>yoi</p>', '', '2016-05-27 23:43:21', '2016-05-28 06:40:17', 0, 0),
(17, 1, 4, 25, 'yeah', '<p>a</p>', '', '2016-05-27 23:45:15', '2016-05-28 00:17:38', 3, 0),
(18, 2, 4, 18, 'yoi', '<p>aaa</p>', '', '2016-05-27 23:45:23', '2016-05-28 06:41:54', 0, 0),
(19, 3, 4, 21, 'muah', '<p>amh</p>', '', '2016-05-27 23:45:30', '2016-05-28 00:17:38', 3, 0),
(20, 2, 5, 19, 'enterprise~', '<p>asd</p>', '', '2016-05-27 23:55:32', '2016-05-28 00:17:38', 3, 0),
(21, 3, 5, 23, 'udah ini spb3', '<p>ih</p>', '', '2016-05-27 23:55:47', '2016-05-28 00:17:38', 3, 0),
(22, 4, 10, 24, 'tah discussion ict', '<p>coba coba weh</p>', '', '2016-05-27 23:57:11', '2016-05-28 06:41:54', 0, 0),
(23, 2, 2, 28, 'a', '<p>a</p>', '<p>aaaaaaaaaaaaaaaaaaaasdasdasdwdasdawdasdawdasdawdadaw</p>', '2016-05-31 02:28:33', '2016-05-31 06:15:26', 0, 0),
(24, 2, 2, 29, 'b', '<p>b</p>', '', '2016-05-31 02:28:38', '2016-05-31 02:29:12', 3, 0),
(25, 2, 2, 30, 'c', '<p>c</p>', '', '2016-05-31 02:28:42', '2016-05-31 02:29:12', 3, 0),
(26, 1, 2, 34, 'Judulnya ini', '<p>Deskripsinya itu</p>', '<p>Sudah Closed gan</p>', '2016-05-31 11:06:36', '2016-05-31 11:15:39', 0, 0);

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
(4, 22, 10, 'edaaaaan', '<p>oit</p>', '2016-05-28 01:30:16', '2016-05-28 01:30:16'),
(5, 16, 3, '', '<p>Apa sih mas gak jelas banget jadi BE, mening saya gantiin aja sini</p>', '2016-05-28 06:30:58', '2016-05-28 06:30:58'),
(6, 16, 3, '', '<p>Woy serius mas apaan sih</p>', '2016-05-28 06:31:27', '2016-05-28 06:31:27'),
(7, 16, 2, '', '<p>Kamu jadi karyawan gausah banyak bacot, yang penting saya dapet point</p>', '2016-05-28 06:31:57', '2016-05-28 06:31:57'),
(8, 23, 2, 'cek', '<p>yo</p>', '2016-05-31 02:29:26', '2016-05-31 02:29:26'),
(9, 23, 3, 'v', '<p>v</p>', '2016-05-31 02:29:52', '2016-05-31 02:29:52'),
(10, 23, 3, '', '<p>bisa kok</p>', '2016-05-31 04:44:56', '2016-05-31 04:44:56'),
(11, 26, 9, '', '<p>Hai~~~</p>', '2016-05-31 11:08:25', '2016-05-31 11:08:25'),
(12, 26, 2, '', '<p>Aya naon bray?</p>', '2016-05-31 11:13:51', '2016-05-31 11:13:51');

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
(19, 3, 16, '2016-05-28 00:16:38'),
(20, 3, 18, '2016-05-28 00:16:41'),
(21, 3, 15, '2016-05-28 00:16:42'),
(22, 3, 22, '2016-05-28 00:16:44'),
(23, 3, 26, '2016-05-31 11:07:23'),
(24, 9, 26, '2016-05-31 11:07:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exp`
--

CREATE TABLE `exp` (
  `id_exp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `exp`
--

INSERT INTO `exp` (`id_exp`, `id_user`, `keterangan`, `file`, `status`, `created_at`) VALUES
(2, 2, 'Juara makan kerupuk', '83501cd942922a6957761f2bd11bee49Discussion Report - yoi.pdf', 1, '2016-05-31 12:39:00'),
(3, 2, 'Juara apa lagi', '0b15a34a6c39729ac73bbb371374f4e0Discussion Report - yoi.pdf', 1, '2016-05-31 12:39:01');

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
(98, 99, 'Business Expert'),
(99, 99, 'Karyawan');

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
(2, 2, 6, 'Analisis dan Implementasi Aplikasi Ini dan Itu', 'Ini adalah panduan umum startup challenge unpas 2016, lalala yeyeye, karena tulisan ini adalah deskripsi maka harusnya tulisan ini panjang banget gitu loh ya biar keliatannya bagus pake banget', '34160e9a6fbc8078bc2a45d0716af20e[NEW] Panduan Umum Startup Challenge UNPAS 2016 (update 4 April 2016).pdf', 9, '2016-05-26 02:40:02', 1),
(3, 2, 4, 'Coba', 'aslkdjawidjjd aslkdjawid aslkdjawi', '61eb65bb2a3245a730b54b9ace3fa8a9Slide Sebuku.pdf', 3, '2016-05-10 15:09:14', 1),
(4, 2, 6, 'apaan tuh', 'gak tau deh', '5f0e070824382c6c79cd0dae28b28fc0Sebuku Business Model.pdf', 3, '2016-05-26 02:30:13', 1),
(5, 2, 5, 'Jurnal yoi', 'Deskripsi nyah', '4c5f6e6b584cecd26b02f40f1a935550Discussion Report - Coba strategic planning and business.pdf', 1, '2016-05-31 10:59:25', 1),
(6, 2, 3, 'Coba dulu gan', 'askldakljdaskljdklasdjkl', 'fc69e88a73f2e1d47a39b9cde0002f58Discussion Report - yoi.pdf', 2, '2016-05-31 11:48:00', 1);

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
(1, 3, 18, 'coba comment', '2016-05-31 10:54:14');

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
(1, 'superadmin'),
(2, 'be'),
(3, 'karyawan'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `type` int(11) NOT NULL,
  `red` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id_notif`, `id_user`, `title`, `link`, `type`, `red`) VALUES
(7, 4, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/29', 4, 1),
(8, 5, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/29', 4, 1),
(21, 4, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 1),
(22, 5, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 1),
(23, 2, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 1),
(24, 2, 'New Respond on inov', 'http://localhost/els/cop/bp_view/28', 1, 1),
(25, 4, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 0),
(26, 5, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 1),
(27, 2, 'New Respond on Coba', 'http://localhost/els/cop/bp_view/30', 1, 1),
(28, 4, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/31', 4, 0),
(29, 5, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/31', 4, 1),
(30, 10, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/31', 4, 0),
(31, 16, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/31', 4, 1),
(32, 18, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/31', 4, 0),
(33, 2, 'New Respond on Testing inov', 'http://localhost/els/cop/bp_view/31', 1, 1),
(34, 2, 'New Respond on Judulnya ini', 'http://localhost/els/cop/bp_view/26', 0, 1),
(35, 9, 'New Respond on Judulnya ini', 'http://localhost/els/discussion/view_discussion/26', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE `point` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `point`
--

INSERT INTO `point` (`id_rating`, `id_user`, `value`, `keterangan`, `created_at`) VALUES
(1, 2, 50, 'Create BP', '2016-05-31 11:37:27'),
(2, 2, 1, 'Respond Best Practice', '2016-05-31 11:45:15'),
(3, 2, 1, 'Respond Best Practice', '2016-05-31 11:45:33'),
(4, 2, 50, 'Upload Journal', '2016-05-31 11:48:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `NIK` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `id_expert` int(11) DEFAULT '98',
  `pic` varchar(500) DEFAULT 'default.png',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `NIK`, `id_user`, `fullname`, `birthdate`, `gender`, `id_expert`, `pic`, `updated_at`, `login`) VALUES
(1, '62012', 2, 'AAAAAAAAA', '1984-05-16', 'M', 36, '83f38c97de9d46f2f6f3e5cf591432cdsurabi-enhaii-di-medan.jpg', '2016-05-31 10:49:26', 1),
(3, '75238', 4, 'Yudi Nugraha', NULL, NULL, 32, 'default.png', '2016-05-27 01:34:43', 1),
(4, '740195', 5, 'Mohamad Noer Fajar', '2001-05-16', 'M', 12, '278ea3c732b770525ed4904aad3a5300Image_de80f95.jpg', '2016-05-31 11:03:05', 1),
(5, '', 10, 'Muhammad Salmin', NULL, NULL, 14, 'default.png', '2016-05-27 01:37:01', 1),
(8, '2147483647', 16, 'Tifani', '2016-05-26', 'M', 2, '375a780a62d477c2017244ba48d428d2Capture.PNG', '2016-05-31 11:58:31', 1),
(9, NULL, 18, 'Jan Fanro', NULL, NULL, 98, 'default.png', '2016-05-31 10:50:22', 1),
(10, NULL, 19, 'Selly lrst', NULL, NULL, 98, 'default.png', '2016-05-31 08:36:15', 0);

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
  `pic` varchar(500) DEFAULT NULL
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
(99, 'General');

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
(1, 2);

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
  `bp_quota` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `step`
--

INSERT INTO `step` (`id_step`, `id_user`, `id_scope`, `step`, `keterangan`, `id_cop`, `bp_quota`) VALUES
(18, 4, 2, 4, 'em1', 22, 0),
(19, 5, 2, 8, 'em2', 22, 0),
(20, 10, 2, 9, 'em3', 22, 0),
(21, 4, 3, 8, 'spb1', 24, 0),
(22, 2, 3, 5, 'spb2', 24, 0),
(23, 5, 3, 8, 'spb3', 24, 0),
(24, 10, 4, 4, 'satu aja', 25, 0),
(25, 4, 1, 8, 'ec1', 21, 0),
(26, 2, 1, 4, 'ec12', 21, 0),
(27, 10, 1, 9, 'yooii', 26, 0),
(28, 2, 2, 5, 'z', 23, 0),
(29, 2, 2, 8, 'x', 23, 0),
(30, 2, 2, 8, 'c', 23, 0),
(31, 4, 4, 9, 'ini A', 32, 0),
(32, 2, 4, 9, 'ini B', 32, 0),
(33, 5, 4, 9, 'ini C', 32, 0),
(34, 2, 1, 3, 'netywork', 30, 0),
(35, 18, 1, 9, 'gener', 30, 0),
(36, 10, 1, 9, 'lte~', 30, 0);

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
(1, 'superadmin@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-05-31 11:50:35', 1),
(2, 'rochadi@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-31 10:55:34', 1),
(3, 'karyawan@gmail.com', '9e014682c94e0f2cc834bf7348bda428', 3, '2016-05-02 10:12:00', 1),
(4, 'yudi_nugraha@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:21:40', 1),
(5, 'mohamad_n_fajar@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:26:40', 1),
(9, 'email@salman.com', '1a2e9da658917c5abff3d683b2d02619', 3, '2016-05-28 06:49:48', 1),
(10, 'salmin@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-31 02:02:33', 1),
(16, 'tifani@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-31 11:57:12', 1),
(17, 'tika@gmail.com', 'ac43724f16e9241d990427ab7c8f4228', 3, '2016-05-31 05:53:43', 1),
(18, 'jan@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 2, '2016-05-31 10:50:09', 1),
(19, 'selly@gmail.com', 'd6e03955e7b642bd2a537eb6385bf732', 2, '2016-05-31 05:49:18', 1),
(21, 'admin@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 4, '2016-05-31 11:51:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cop`
--
ALTER TABLE `cop`
  ADD PRIMARY KEY (`id_cop`),
  ADD KEY `id_scope` (`id_scope`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cop_comment`
--
ALTER TABLE `cop_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_cop` (`id_cop`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cop_invitation`
--
ALTER TABLE `cop_invitation`
  ADD PRIMARY KEY (`id_invitation`),
  ADD KEY `id_cop` (`id_cop`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_step` (`id_step`),
  ADD KEY `id_scope` (`id_scope`);

--
-- Indexes for table `course_participant`
--
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_discussion`),
  ADD KEY `id_scope` (`id_scope`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_step` (`id_step`);

--
-- Indexes for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_discussion` (`id_discussion`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_discussion` (`id_discussion`);

--
-- Indexes for table `exp`
--
ALTER TABLE `exp`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id_expert`),
  ADD KEY `id_directorate` (`id_directorate`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id_journal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_directorate` (`id_directorate`);

--
-- Indexes for table `journal_comment`
--
ALTER TABLE `journal_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_journal` (`id_journal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `NIP` (`NIK`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_expert` (`id_expert`);

--
-- Indexes for table `profile_pending`
--
ALTER TABLE `profile_pending`
  ADD PRIMARY KEY (`id_pending`),
  ADD KEY `id_profile` (`id_profile`);

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
  ADD PRIMARY KEY (`id_step`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_scope` (`id_scope`),
  ADD KEY `id_cop` (`id_cop`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cop`
--
ALTER TABLE `cop`
  MODIFY `id_cop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cop_comment`
--
ALTER TABLE `cop_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cop_invitation`
--
ALTER TABLE `cop_invitation`
  MODIFY `id_invitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `journal_comment`
--
ALTER TABLE `journal_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profile_pending`
--
ALTER TABLE `profile_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cop`
--
ALTER TABLE `cop`
  ADD CONSTRAINT `cop_ibfk_1` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`),
  ADD CONSTRAINT `cop_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `cop_comment`
--
ALTER TABLE `cop_comment`
  ADD CONSTRAINT `cop_comment_ibfk_1` FOREIGN KEY (`id_cop`) REFERENCES `cop` (`id_cop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cop_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `cop_invitation`
--
ALTER TABLE `cop_invitation`
  ADD CONSTRAINT `cop_invitation_ibfk_1` FOREIGN KEY (`id_cop`) REFERENCES `cop` (`id_cop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cop_invitation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`id_step`) REFERENCES `step` (`id_step`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `course_participant`
--
ALTER TABLE `course_participant`
  ADD CONSTRAINT `course_participant_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_participant_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `directorate`
--
ALTER TABLE `directorate`
  ADD CONSTRAINT `directorate_ibfk_1` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`);

--
-- Ketidakleluasaan untuk tabel `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`),
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `discussion_ibfk_3` FOREIGN KEY (`id_step`) REFERENCES `step` (`id_step`);

--
-- Ketidakleluasaan untuk tabel `discussion_comment`
--
ALTER TABLE `discussion_comment`
  ADD CONSTRAINT `discussion_comment_ibfk_1` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id_discussion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `discussion_vote`
--
ALTER TABLE `discussion_vote`
  ADD CONSTRAINT `discussion_vote_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `discussion_vote_ibfk_2` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id_discussion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exp`
--
ALTER TABLE `exp`
  ADD CONSTRAINT `exp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `journal_ibfk_2` FOREIGN KEY (`id_directorate`) REFERENCES `directorate` (`id_directorate`);

--
-- Ketidakleluasaan untuk tabel `journal_comment`
--
ALTER TABLE `journal_comment`
  ADD CONSTRAINT `journal_comment_ibfk_1` FOREIGN KEY (`id_journal`) REFERENCES `journal` (`id_journal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`id_expert`) REFERENCES `expert` (`id_expert`);

--
-- Ketidakleluasaan untuk tabel `profile_pending`
--
ALTER TABLE `profile_pending`
  ADD CONSTRAINT `profile_pending_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `step_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `step_ibfk_2` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`),
  ADD CONSTRAINT `step_ibfk_3` FOREIGN KEY (`id_cop`) REFERENCES `cop` (`id_cop`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
