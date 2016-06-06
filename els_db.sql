-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jun 2016 pada 15.27
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
(1, NULL, 2, 'coba inov', '<p>cek</p>', '<p>tutup ah</p>', 1, '2016-06-04 03:44:52', '2016-06-04 03:58:44', 0),
(2, 1, 4, 'coba BP', '<p>yoi</p>', '<p>Lo lo lo</p>', 2, '2016-06-04 04:06:45', '2016-06-04 04:10:56', 0),
(3, 2, 2, 'Coba lagi', '<p>asdasdasd</p>', '<p>Hampura di close</p>', 2, '2016-06-04 04:12:36', '2016-06-04 04:16:35', 0),
(4, 3, 4, 'asd', '<p>asaaa</p>', '<p>zxczxc</p>', 2, '2016-06-04 04:17:49', '2016-06-04 04:17:57', 0),
(5, 3, 4, 'ss', '<p>aaaaaa</p>', '<p>cek</p>', 2, '2016-06-04 04:23:10', '2016-06-04 04:23:24', 0),
(6, 4, 4, 'asdasdds', '<p>zzz</p>', '<p>asdwffffff</p>', 2, '2016-06-04 04:23:36', '2016-06-04 04:24:04', 0),
(7, 4, 4, 'euy', '<p>aaa</p>', '<p>hehe</p>', 2, '2016-06-04 04:51:30', '2016-06-04 04:54:36', 0),
(8, 3, 10, 'asd', '<p>arinicantik</p>', '<p>arini cantik katanya</p>', 2, '2016-06-05 04:13:13', '2016-06-05 04:13:29', 0),
(9, NULL, 2, 'Coba inov lagi', '<p>tes&nbsp;</p>', NULL, 1, '2016-06-05 09:16:15', '2016-06-05 09:16:15', 1),
(10, NULL, 2, 'kljklsdklajsdlajkd', '<p>asldlajwidjasdn asldk aklsjd</p>', NULL, 1, '2016-06-05 10:32:56', '2016-06-05 10:32:56', 1),
(11, 3, 2, 'dfgdfgd', '<p>dfgdfgdfg</p>', '<p>klkljjlljk</p>', 2, '2016-06-05 10:33:24', '2016-06-05 10:33:39', 0),
(12, 4, 2, 'zzz', '<p>asdasdasd</p>', '<p>asdasd</p>', 2, '2016-06-05 10:39:32', '2016-06-05 10:39:46', 0),
(13, 1, 2, 'zzz', '<p>xxc</p>', '<p>a</p>', 2, '2016-06-06 02:42:03', '2016-06-06 02:42:16', 0),
(14, 3, 2, 'aaa', '<p>asd</p>', '<p>azxc</p>', 2, '2016-06-06 02:43:14', '2016-06-06 02:43:27', 0),
(15, 2, 2, 'asd', '<p>asoiul</p>', '<p>jkl</p>', 2, '2016-06-06 02:46:13', '2016-06-06 02:46:19', 0),
(16, 3, 2, 'asdasd', '<p>asdasdas</p>', '<p>aa</p>', 2, '2016-06-06 02:58:49', '2016-06-06 02:58:58', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_attachment`
--

CREATE TABLE `cop_attachment` (
  `id_attachment` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cop_attachment`
--

INSERT INTO `cop_attachment` (`id_attachment`, `id_cop`, `file`) VALUES
(1, 9, 'f72d158d9ddf37741cb4b987da4e78f0itulah.txt'),
(2, 9, '651b5f8058d328ba2372d40f9e72c9cdProposal EduFi.docx'),
(3, 10, '7e9d9b88adadb1ee516eb8894c409e28Screenshot_20160313-071822.png'),
(4, 10, '7c9b0ea60f5405bd78e86977d9399810Screenshot_20160313-071928.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_comment`
--

CREATE TABLE `cop_comment` (
  `id_comment` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) DEFAULT '',
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cop_comment`
--

INSERT INTO `cop_comment` (`id_comment`, `id_cop`, `id_user`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '', '<p>coba</p>', '2016-06-04 03:44:59', '0000-00-00 00:00:00'),
(2, 1, 4, '', '<p>apa sob</p>', '2016-06-04 03:46:03', '0000-00-00 00:00:00'),
(3, 1, 4, '', '<p>oit</p>', '2016-06-04 03:50:11', '0000-00-00 00:00:00'),
(4, 1, 2, '', '<p>naon</p>', '2016-06-04 03:52:13', '0000-00-00 00:00:00'),
(5, 1, 5, '', '<p>bahas naon ieu?</p>', '2016-06-04 03:54:56', '0000-00-00 00:00:00'),
(6, 2, 2, '', '<p>oit</p>', '2016-06-04 04:07:44', '0000-00-00 00:00:00'),
(7, 2, 4, '', '<p>jadi gini gan</p>', '2016-06-04 04:08:18', '0000-00-00 00:00:00'),
(8, 2, 4, '', '<p>tutup aja deh</p>', '2016-06-04 04:08:33', '0000-00-00 00:00:00'),
(9, 3, 2, '', '<p>cek</p>', '2016-06-04 04:12:41', '0000-00-00 00:00:00'),
(10, 3, 4, '', '<p>asd</p>', '2016-06-04 04:13:05', '0000-00-00 00:00:00'),
(11, 6, 4, '', '<p>sdwasdw</p>', '2016-06-04 04:23:42', '0000-00-00 00:00:00'),
(12, 6, 4, 'aa', '<p>a</p>', '2016-06-04 04:23:49', '0000-00-00 00:00:00'),
(13, 9, 2, NULL, '<p>asdasd</p>', '2016-06-06 02:41:26', '0000-00-00 00:00:00'),
(14, 14, 2, NULL, '<p>asdasd</p>', '2016-06-06 02:43:19', '0000-00-00 00:00:00');

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
(1, 1, 2),
(2, 1, 4),
(3, 1, 16),
(4, 1, 5),
(5, 9, 2),
(6, 9, 4),
(7, 9, 10),
(8, 10, 2),
(9, 10, 5),
(10, 10, 18);

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
  `enddate` datetime NOT NULL,
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

INSERT INTO `course` (`id_course`, `id_user`, `id_step`, `id_scope`, `title`, `description`, `datetime`, `enddate`, `location`, `quota`, `summary`, `report_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 7, 3, 'Kuliah dafuq', '<p>Deskripsi gan</p>', '2016-06-05 00:00:00', '2016-06-07 00:00:00', 'On request', 20, '<p>Closed gan, gada yang dateng</p>', '', 0, '2016-06-05 04:28:36', '2016-06-05 04:37:52');

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
(1, 1, 2, '2016-06-05 04:35:01'),
(2, 1, 3, '2016-06-05 04:35:25'),
(3, 1, 10, '2016-06-05 04:35:44');

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
(1, 1, 4, 1, 'asdasdds', '<p>55513211313510031235131d35v1edv35d35bvd0b35er1e3y12r535th34te0f30eg3r0b3551351</p>', '', '2016-06-05 04:10:32', '2016-06-05 04:17:12', 0, 0),
(2, 3, 4, 7, 'yoi', '<p>h jklhjklh jklh jklhjklhjklhjkhkjh klhgutf yi fuy ftd ytd ykg</p>', '', '2016-06-05 04:10:43', '2016-06-05 04:17:12', 0, 0),
(3, 3, 4, 9, 'AAAAAAAAAAAAAAAAAAAAAAAA', '<p>BBBBBBBBBBBBBBBBBBBBgbggggggggggggggggggggggggggg</p>', '', '2016-06-05 04:10:54', '2016-06-05 04:12:39', 3, 0),
(4, 4, 4, 10, 'sdfsdfsd', '<p>egmnvjkh jjcfgj drtasf h jytjt k7</p>', '', '2016-06-05 04:11:14', '2016-06-05 04:17:12', 0, 0),
(5, 4, 4, 15, 'aaa', '<p>sdfasdasd</p>', '', '2016-06-05 04:11:18', '2016-06-05 04:12:39', 3, 0),
(6, 1, 10, 3, 'ilove', '<p>mrtgggh</p>', '', '2016-06-05 04:12:14', '2016-06-05 04:12:39', 3, 0),
(7, 2, 10, 6, 'ikjjj', '<p>lllcfgt</p>', '', '2016-06-05 04:12:21', '2016-06-05 04:17:12', 0, 0),
(8, 3, 5, 16, 'asdasdds', '<p>222</p>', '<p>Rahasia</p>', '2016-06-05 04:16:58', '2016-06-05 04:20:14', 0, 0),
(9, 1, 2, 21, 'AAa', '<p>aaa</p>', '<p>tes</p>', '2016-06-06 02:46:38', '2016-06-06 02:53:05', 0, 0),
(10, 2, 2, 24, 'Jjj', '<p>jjj</p>', '<p>cek</p>', '2016-06-06 02:46:43', '2016-06-06 02:53:44', 0, 0),
(11, 3, 2, 23, 'vvv', '<p>vvv</p>', '', '2016-06-06 02:46:46', '2016-06-06 02:55:03', 0, 0),
(12, 3, 2, 25, 'hadeuh', '<p>asdasd</p>', '<p>zxczxczxc</p>', '2016-06-06 02:59:15', '2016-06-06 02:59:58', 0, 0),
(13, 3, 2, 26, 'xcvxcvxcvxc', '<p>dfsdsdf</p>', '', '2016-06-06 02:59:20', '2016-06-06 02:59:35', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion_comment`
--

CREATE TABLE `discussion_comment` (
  `id_comment` int(11) NOT NULL,
  `id_discussion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `discussion_comment`
--

INSERT INTO `discussion_comment` (`id_comment`, `id_discussion`, `id_user`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '', '<p>cek</p>', '2016-06-05 04:16:29', '2016-06-05 04:16:29'),
(2, 8, 3, '', '<p>s</p>', '2016-06-05 04:19:38', '2016-06-05 04:19:38'),
(3, 9, 2, NULL, '<p>asdasdasd</p>', '2016-06-06 02:48:01', '2016-06-06 02:48:01'),
(4, 12, 2, NULL, '<p>asdasd</p>', '2016-06-06 02:59:54', '2016-06-06 02:59:54');

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
(1, 3, 8, '2016-06-05 04:18:23');

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
(1, 2, 2, 'tes journal', 'tes', '1e99016ac3f4a794865857ebf421dae978635958_120516.pdf', 44, '2016-06-04 03:25:46', 1);

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
(1, 1, 2, 'tes komen jurnal', '2016-06-04 03:27:48'),
(2, 1, 3, 'tes komen', '2016-06-04 03:28:11'),
(3, 1, 2, 'aaaa', '2016-06-04 13:17:41'),
(4, 1, 2, 'cek', '2016-06-04 13:44:07'),
(5, 1, 4, 'notif coba', '2016-06-04 13:44:32');

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
(37, 4, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(38, 16, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/1', 4, 0),
(39, 5, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(40, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 1),
(41, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 1),
(42, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 1),
(43, 5, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 1),
(44, 16, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 0),
(45, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 1, 1),
(46, 4, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(47, 5, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(48, 16, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 0),
(49, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(50, 4, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(51, 16, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 0),
(52, 2, 'New Respond on coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(53, 4, 'Forum Closed coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(54, 5, 'Forum Closed coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 1),
(55, 16, 'Forum Closed coba inov', 'http://localhost/els/cop/innovation_view/1', 4, 0),
(56, 4, 'New Respond on coba BP', 'http://localhost/els/cop/bp_view/2', 1, 1),
(57, 2, 'New Respond on coba BP', 'http://localhost/els/cop/bp_view/2', 1, 1),
(58, 2, 'New Respond on coba BP', 'http://localhost/els/cop/bp_view/2', 1, 1),
(59, 2, 'New Respond on Coba lagi', 'http://localhost/els/cop/bp_view/3', 1, 1),
(60, 2, 'New Respond on Coba lagi', 'http://localhost/els/cop/bp_view/3', 1, 1),
(61, 4, 'Forum Closed Coba lagi', 'http://localhost/els/cop/bp_view', 1, 1),
(64, 4, 'New Responsibilities euy', 'http://localhost/els/cop/bp_view/7', 0, 1),
(65, 2, 'New Comment on  tes journal', 'http://localhost/els/journal/view/1', 2, 1),
(68, 4, 'New Respond on asdasdds', 'http://localhost/els/discussion/view_discussion/1', 0, 1),
(69, 5, 'New Respond on asdasdds', 'http://localhost/els/discussion/view_discussion/8', 0, 1),
(70, 3, 'Discussion Closed asdasdds', 'http://localhost/els/discussion/view_discussion/8', 0, 1),
(71, 4, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/9', 4, 1),
(72, 10, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/9', 4, 0),
(73, 5, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/10', 4, 0),
(74, 18, 'New Forum Invitation', 'http://localhost/els/cop/innovation_view/10', 4, 0),
(78, 4, 'New Responsibilities zzz', 'http://localhost/els/cop/bp_view/12', 0, 0),
(79, 18, 'New Responsibilities zzz', 'http://localhost/els/cop/bp_view/12', 0, 0),
(80, 10, 'New Responsibilities zzz', 'http://localhost/els/cop/bp_view/12', 0, 0),
(81, 4, 'New Respond on Coba inov lagi', 'http://localhost/els/cop/innovation_view/9', 4, 0),
(82, 10, 'New Respond on Coba inov lagi', 'http://localhost/els/cop/innovation_view/9', 4, 0),
(88, 2, 'New Responsibilities asd', 'http://localhost/els/cop/bp_view/15', 0, 1),
(90, 2, 'New Responsibilities asdasd', 'http://localhost/els/cop/bp_view/16', 0, 1),
(91, 2, 'New Responsibilities asdasd', 'http://localhost/els/cop/bp_view/16', 0, 1);

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
(4, 2, 50, 'Upload Journal', '2016-05-31 11:48:00'),
(5, 2, 50, 'Upload Journal', '2016-06-04 03:25:46'),
(6, 2, 50, 'Create Innovation', '2016-06-04 03:44:52'),
(7, 2, 1, 'Respond Innovation', '2016-06-04 03:45:00'),
(8, 4, 1, 'Respond Innovation', '2016-06-04 03:46:03'),
(9, 4, 1, 'Respond Innovation', '2016-06-04 03:50:11'),
(10, 2, 1, 'Respond Innovation', '2016-06-04 03:52:13'),
(11, 5, 1, 'Respond Innovation', '2016-06-04 03:54:56'),
(12, 4, 50, 'Create BP', '2016-06-04 04:06:45'),
(13, 2, 1, 'Respond Best Practice', '2016-06-04 04:07:44'),
(14, 4, 1, 'Respond Best Practice', '2016-06-04 04:08:18'),
(15, 4, 1, 'Respond Best Practice', '2016-06-04 04:08:33'),
(16, 2, 50, 'Create BP', '2016-06-04 04:12:36'),
(17, 2, 1, 'Respond Best Practice', '2016-06-04 04:12:41'),
(18, 4, 1, 'Respond Best Practice', '2016-06-04 04:13:05'),
(19, 4, 50, 'Create BP', '2016-06-04 04:17:49'),
(20, 4, 50, 'Create BP', '2016-06-04 04:23:10'),
(21, 4, 50, 'Create BP', '2016-06-04 04:23:36'),
(22, 4, 1, 'Respond Best Practice', '2016-06-04 04:23:42'),
(23, 4, 1, 'Respond Best Practice', '2016-06-04 04:23:49'),
(24, 4, 50, 'Create BP', '2016-06-04 04:51:30'),
(25, 2, 50, 'Upload Journal', '2016-06-04 15:04:05'),
(26, 10, 50, 'Create BP', '2016-06-05 04:13:13'),
(27, 5, 1, 'Respond Discussion', '2016-06-05 04:16:29'),
(28, 4, 50, 'Open Course', '2016-06-05 04:28:36'),
(29, 2, 50, 'Create Innovation', '2016-06-05 09:16:15'),
(30, 2, 50, 'Create Innovation', '2016-06-05 10:32:56'),
(31, 2, 50, 'Create BP', '2016-06-05 10:33:24'),
(32, 2, 50, 'Create BP', '2016-06-05 10:39:32'),
(33, 2, 1, 'Respond Innovation', '2016-06-06 02:41:26'),
(34, 2, 50, 'Create BP', '2016-06-06 02:42:03'),
(35, 2, 50, 'Create BP', '2016-06-06 02:43:14'),
(36, 2, 1, 'Respond Best Practice', '2016-06-06 02:43:19'),
(37, 2, 50, 'Create BP', '2016-06-06 02:46:13'),
(38, 2, 50, 'Create BP', '2016-06-06 02:58:49'),
(39, 2, 1, 'Respond Discussion', '2016-06-06 02:59:54'),
(40, 2, 50, 'Upload Journal', '2016-06-06 03:20:07');

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
(1, '62012', 2, 'Rochadi', '1984-05-16', 'M', 1, '44534e014cf2e07397194a3b3f990a7bsurabi-enhaii-di-medan.jpg', '2016-06-04 14:50:31', 1),
(3, '75238', 4, 'Yudi Nugraha', '1966-01-19', 'F', 13, '0a56cb4a68ea220be9ada8656f3f1e17Picture 2.jpg', '2016-06-05 04:37:16', 1),
(4, '740195', 5, 'Mohamad Noer Fajar', '2001-05-16', 'M', 12, 'default.png', '2016-05-31 22:29:43', 1),
(5, '', 10, 'Muhammad Salmin', NULL, NULL, 14, 'default.png', '2016-05-27 01:37:01', 1),
(8, '2147483647', 16, 'Tifani', '2016-05-26', 'M', 2, 'default.png', '2016-05-31 22:29:49', 1),
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

--
-- Dumping data untuk tabel `profile_pending`
--

INSERT INTO `profile_pending` (`id_pending`, `id_profile`, `NIK`, `fullname`, `birthdate`, `gender`, `id_expert`, `pic`) VALUES
(1, 1, 62012, 'Rochadi', '1984-05-16', 'M', 3, '767d74ac369711742ea79ef88c68ae4amaps.jpg');

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
(1, 4, 1, 4, 'aaaaaa', 2, 0),
(2, 18, 1, 9, 'b', 2, 0),
(3, 10, 1, 8, 'c', 2, 0),
(4, 16, 2, 9, 'z', 3, 0),
(5, 18, 2, 9, 'x', 3, 0),
(6, 10, 2, 4, 'c', 3, 0),
(7, 4, 3, 5, 'aaa', 4, 0),
(8, 18, 3, 9, 's', 5, 0),
(9, 4, 3, 8, 'd', 5, 0),
(10, 4, 4, 4, 'zz', 6, 0),
(11, 16, 4, 9, 'xx', 6, 0),
(15, 4, 4, 8, 'hehehe', 7, 0),
(16, 5, 3, 4, 'Woy', 8, 0),
(17, 16, 3, 9, 'vbnvbn', 11, 0),
(18, 4, 4, 9, 'aaa', 12, 0),
(19, 18, 4, 9, 'xxx', 12, 0),
(20, 10, 4, 9, 'qweqweqweqwe', 12, 0),
(21, 2, 1, 4, 'aaaaaaaaaaa', 13, 0),
(22, 16, 1, 9, 'x', 13, 0),
(23, 2, 3, 4, 'vvv', 14, 0),
(24, 2, 2, 4, 'jjj', 15, 0),
(25, 2, 3, 4, 'xcxzc', 16, 0),
(26, 2, 3, 8, 'zxczxc', 16, 0);

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
-- Indexes for table `cop_attachment`
--
ALTER TABLE `cop_attachment`
  ADD PRIMARY KEY (`id_attachment`),
  ADD UNIQUE KEY `file` (`file`),
  ADD KEY `id_cop` (`id_cop`);

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
  MODIFY `id_cop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cop_attachment`
--
ALTER TABLE `cop_attachment`
  MODIFY `id_attachment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cop_comment`
--
ALTER TABLE `cop_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cop_invitation`
--
ALTER TABLE `cop_invitation`
  MODIFY `id_invitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_participant`
--
ALTER TABLE `course_participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `directorate`
--
ALTER TABLE `directorate`
  MODIFY `id_directorate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `journal_comment`
--
ALTER TABLE `journal_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profile_pending`
--
ALTER TABLE `profile_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
