-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2016 pada 03.55
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_attachment`
--

CREATE TABLE `cop_attachment` (
  `id_attachment` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `cop_invitation`
--

CREATE TABLE `cop_invitation` (
  `id_invitation` int(11) NOT NULL,
  `id_cop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(11) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `journal`
--

INSERT INTO `journal` (`id_journal`, `id_user`, `id_directorate`, `title`, `description`, `file`, `views`, `created_at`, `status`, `keterangan`) VALUES
(8, 3, 1, 'asdasd', 'dsadawd', '72a01487a5e54d84fe94fc7fd1006304Lampiran_Proposal_dan__MOU.pdf', 0, '2016-06-20 01:45:06', 0, '');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `open_discussion`
--

CREATE TABLE `open_discussion` (
  `id_discussion` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `open_discussion`
--

INSERT INTO `open_discussion` (`id_discussion`, `id_scope`, `id_user`, `title`, `content`, `created_at`, `updated_at`, `status`, `views`) VALUES
(3, 1, 2, 'asdsadasd', '<p>asdasdasdasd</p>', '2016-06-20 01:43:06', '2016-06-20 01:43:06', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `open_discussion_comment`
--

CREATE TABLE `open_discussion_comment` (
  `id_comment` int(11) NOT NULL,
  `id_discussion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `open_discussion_comment`
--

INSERT INTO `open_discussion_comment` (`id_comment`, `id_discussion`, `id_user`, `content`, `created_at`) VALUES
(5, 3, 2, '<p>asasdasdasd</p>', '2016-06-20 01:43:21'),
(6, 3, 3, '<p>asdavczbh</p>', '2016-06-20 01:43:48');

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
(1, '62012', 2, 'Rochadi', '1984-05-16', 'M', 3, '767d74ac369711742ea79ef88c68ae4amaps.jpg', '2016-06-07 14:13:59', 1),
(3, '75238', 4, 'Yudi Nugraha', '1966-01-19', 'F', 13, '0a56cb4a68ea220be9ada8656f3f1e17Picture 2.jpg', '2016-06-05 04:37:16', 1),
(4, '740195', 5, 'Mohamad Noer Fajar', '2001-05-16', 'M', 12, 'default.png', '2016-05-31 22:29:43', 1);

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
  `bp_quota` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `id_level`, `registered_at`, `stat`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-06-19 15:55:48', 1),
(2, '62012', 'rochadi@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-06-19 03:43:16', 1),
(3, '1111', 'karyawan@gmail.com', '9e014682c94e0f2cc834bf7348bda428', 3, '2016-06-20 00:26:29', 1),
(4, '75238', 'yudi_nugraha@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-06-19 03:43:25', 1),
(5, '740195', 'mohamad_n_fajar@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-06-19 03:43:32', 1),
(21, 'admin', 'admin@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 4, '2016-06-19 15:56:56', 1),
(62, 'adminec', 'adminec@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-06-20 00:47:51', 1),
(63, 'adminem', 'adminem@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-06-20 00:47:51', 1),
(64, 'adminspb', 'adminspb@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-06-20 00:47:51', 1),
(65, 'adminict', 'adminict@gmail.com', '1a2e9da658917c5abff3d683b2d02619', 1, '2016-06-20 00:47:51', 1);

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
-- Indexes for table `open_discussion`
--
ALTER TABLE `open_discussion`
  ADD PRIMARY KEY (`id_discussion`),
  ADD KEY `id_scope` (`id_scope`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `open_discussion_comment`
--
ALTER TABLE `open_discussion_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_discussion` (`id_discussion`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_cop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cop_attachment`
--
ALTER TABLE `cop_attachment`
  MODIFY `id_attachment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cop_comment`
--
ALTER TABLE `cop_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `open_discussion`
--
ALTER TABLE `open_discussion`
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `open_discussion_comment`
--
ALTER TABLE `open_discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
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
