-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2016 pada 07.44
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
(12, 3, 2, 'Apalah kumaha sia we', '<p>Yongkru mamen</p>', NULL, 2, '2016-05-19 12:00:11', '2016-05-19 12:00:11', 1),
(13, 2, 2, 'Ini kita bahas ginian', '<p>aaaaaaaaaaaaa</p>', '<p>Kesimpulan gak penting</p>', 2, '2016-05-19 12:00:33', '2016-05-19 12:01:09', 0);

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
  `id_directorate` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `quota` int(11) NOT NULL,
  `conclusion` text NOT NULL,
  `report_file` varchar(500) NOT NULL,
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
  `id_user` int(11) NOT NULL
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `discussion`
--

INSERT INTO `discussion` (`id_discussion`, `id_scope`, `id_user`, `id_step`, `title`, `content`, `summary`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 2, 5, 'Apalah artinya judul', '<p>Apalah artinya konten</p>', '', '2016-05-20 01:32:18', '2016-05-20 01:32:18', 1),
(2, 3, 2, 2, 'Kenapa saya disuruh bikin diskusi di ecommerce juga?', '<p>yaudahlah terserah kalian aja, saya mah jadi tumbal juga gak apa-apa. hayuk diskusi</p>', '', '2016-05-20 02:15:48', '2016-05-20 02:15:48', 1);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `journal`
--

INSERT INTO `journal` (`id_journal`, `id_user`, `id_directorate`, `title`, `description`, `file`, `views`, `created_at`, `status`) VALUES
(2, 2, 6, 'Analisis dan Implementasi Aplikasi Ini dan Itu', 'Ini adalah panduan umum startup challenge unpas 2016, lalala yeyeye, karena tulisan ini adalah deskripsi maka harusnya tulisan ini panjang banget gitu loh ya biar keliatannya bagus pake banget', '34160e9a6fbc8078bc2a45d0716af20e[NEW] Panduan Umum Startup Challenge UNPAS 2016 (update 4 April 2016).pdf', 0, '2016-04-17 12:36:28', 1),
(3, 2, 4, 'Coba', 'aslkdjawidjjd aslkdjawid aslkdjawi', '61eb65bb2a3245a730b54b9ace3fa8a9Slide Sebuku.pdf', 0, '2016-05-10 15:09:14', 1);

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
(4, 2, 2, 'asdasd', '2016-05-19 14:48:32');

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
  `point` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(500) DEFAULT 'default.jpeg',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `NIK`, `id_user`, `fullname`, `birthdate`, `gender`, `id_expert`, `point`, `pic`, `updated_at`, `login`) VALUES
(1, '62012', 2, 'Rochadi', NULL, NULL, 36, 0, NULL, '2016-05-18 01:00:45', 1),
(2, '1234', 3, 'Karyawan', NULL, NULL, 99, 0, NULL, '2016-05-18 01:03:17', 1),
(3, '75238', 4, 'Yudi Nugraha', NULL, NULL, 32, 0, NULL, '2016-05-10 16:24:31', 1),
(4, '740195', 5, 'Mohamad Noer Fajar', NULL, NULL, 37, 0, NULL, '2016-05-11 03:33:20', 1);

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
-- Struktur dari tabel `step`
--

CREATE TABLE `step` (
  `id_step` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_scope` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_cop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `step`
--

INSERT INTO `step` (`id_step`, `id_user`, `id_scope`, `step`, `keterangan`, `id_cop`) VALUES
(1, 4, 2, 1, 'Bagien eta', 8),
(2, 2, 3, 2, 'Bagean ieu', 9),
(3, 5, 4, 1, 'maneh jelasin itu', 10),
(4, 4, 4, 1, 'maneh jelasin ini', 10),
(5, 2, 2, 2, 'yah', 11),
(6, 5, 2, 1, 'Bahas itu ya coy', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `id_level`, `registered_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2016-03-18 02:56:24'),
(2, 'rochadi@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-04-16 15:55:16'),
(3, 'karyawan@gmail.com', '9e014682c94e0f2cc834bf7348bda428', 3, '2016-05-02 10:12:00'),
(4, 'yudi_nugraha@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:21:40'),
(5, 'mohamad_n_fajar@telkomsel.co.id', '1a2e9da658917c5abff3d683b2d02619', 2, '2016-05-10 16:26:40');

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
-- Indexes for table `scope`
--
ALTER TABLE `scope`
  ADD PRIMARY KEY (`id_scope`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id_step`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

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
  MODIFY `id_cop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_participant`
--
ALTER TABLE `course_participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `directorate`
--
ALTER TABLE `directorate`
  MODIFY `id_directorate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id_discussion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `discussion_comment`
--
ALTER TABLE `discussion_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `journal_comment`
--
ALTER TABLE `journal_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `scope`
--
ALTER TABLE `scope`
  MODIFY `id_scope` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT;
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
