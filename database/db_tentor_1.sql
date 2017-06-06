-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2017 at 10:14 AM
-- Server version: 5.5.54-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.6.30-7+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `biaya` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id`, `kelas`, `pertemuan`, `biaya`) VALUES
(1, 1, 3, '400000'),
(2, 1, 4, '535000'),
(3, 2, 3, '400000'),
(4, 2, 4, '535000'),
(5, 3, 3, '400000'),
(6, 3, 4, '535000'),
(7, 4, 3, '425000'),
(8, 4, 4, '570000'),
(9, 5, 3, '425000'),
(10, 5, 4, '570000'),
(11, 6, 3, '425000'),
(12, 6, 4, '570000'),
(13, 7, 3, '465000'),
(14, 7, 4, '620000'),
(15, 8, 3, '465000'),
(16, 8, 4, '620000'),
(17, 9, 3, '490000'),
(18, 9, 4, '655000'),
(19, 10, 3, '535000'),
(20, 10, 4, '715000'),
(21, 11, 3, '535000'),
(22, 11, 4, '715000'),
(23, 2, 3, '560000'),
(24, 2, 4, '760000');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_siswa`
--

CREATE TABLE IF NOT EXISTS `evaluasi_siswa` (
  `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_pencari` int(15) NOT NULL,
  `id_user_tentor` int(15) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `nilai` int(5) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_evaluasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `penjelasan` varchar(225) NOT NULL,
  `gambar` varchar(75) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tentor`
--

CREATE TABLE IF NOT EXISTS `jadwal_tentor` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_tentor` varchar(15) NOT NULL,
  `id_jam` varchar(15) NOT NULL,
  `sabtu` varchar(50) NOT NULL,
  `minggu` varchar(50) NOT NULL,
  `senin` varchar(50) NOT NULL,
  `selasa` varchar(50) NOT NULL,
  `rabu` varchar(50) NOT NULL,
  `kamis` varchar(50) NOT NULL,
  `jumat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `jadwal_tentor`
--

INSERT INTO `jadwal_tentor` (`id_jadwal`, `id_user_tentor`, `id_jam`, `sabtu`, `minggu`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`) VALUES
(16, '320170519001', '07.15-08.45', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(15, '320170519001', '05.30-07.00', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(14, '320170519001', '03.45-05.15', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(13, '320170519001', '02.00-03.30', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(9, '320170514001', '02.00-03.30', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(10, '320170514001', '03.45-05.15', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(11, '320170514001', '05.30-07.00', 'ngajar', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(12, '320170514001', '07.15-08.45', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(17, '320170528001', '02.00-03.30', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(18, '320170528001', '03.45-05.15', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(19, '320170528001', '05.30-07.00', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(20, '320170528001', '07.15-08.45', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(21, '320170528002', '02.00-03.30', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(22, '320170528002', '03.45-05.15', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(23, '320170528002', '05.30-07.00', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(24, '320170528002', '07.15-08.45', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
  `id_keahlian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(15) NOT NULL,
  `jenjang` enum('sd','smp','sma') NOT NULL,
  `mapel` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `status` enum('verified','belum','tolak') NOT NULL,
  PRIMARY KEY (`id_keahlian`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `id_user`, `jenjang`, `mapel`, `deskripsi`, `status`) VALUES
(3, '320170514001', 'sd', 'matematika', 'pernah mengajar di sdn tertentu', 'verified'),
(4, '320170519001', 'smp', 'Bahasa Inggris', 'Saya kuliah jurusan sastra inggris di unipdu', 'verified'),
(5, '320170528001', 'sma', 'matematika', 'Pernah mengajar di LBB Ganesha selama 2 tahun', 'verified'),
(6, '320170528002', 'smp', 'Bahasa Inggris', 'Saya masih kuliah jurusan bahasa inggris di Unesa', 'verified'),
(7, '320170528002', 'smp', 'Bahasa Indonesia', '', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
  `id_komplain` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelapor` int(15) NOT NULL,
  `id_terlapor` int(15) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alasan` varchar(225) NOT NULL,
  `status` enum('wait','selesai') NOT NULL,
  `solusi` varchar(225) NOT NULL,
  PRIMARY KEY (`id_komplain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(100) NOT NULL,
  `status` enum('buka','tutup') NOT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tentor`
--

CREATE TABLE IF NOT EXISTS `nilai_tentor` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_tentor` int(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_tentor`
--

CREATE TABLE IF NOT EXISTS `permintaan_tentor` (
  `id_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_pencari` int(15) NOT NULL,
  `id_user_tentor` int(15) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `durasi` int(2) NOT NULL,
  `status` enum('proses','diterima','ditolak') NOT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_pelamar`
--

CREATE TABLE IF NOT EXISTS `permohonan_pelamar` (
  `id_pemohon` int(11) NOT NULL,
  `scan_ktp` varchar(75) NOT NULL,
  `scan_ijazah` varchar(75) NOT NULL,
  `scan_akta4` varchar(75) NOT NULL,
  `daftar_riwayat_hidup` varchar(75) NOT NULL,
  `transkrip_nilai` varchar(75) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `status` enum('diterima','ditolak') NOT NULL,
  PRIMARY KEY (`id_pemohon`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE IF NOT EXISTS `riwayat` (
  `id_riwayat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_tentor` varchar(15) NOT NULL,
  `sd` varchar(50) NOT NULL,
  `tahun_sd` varchar(50) NOT NULL,
  `ijazahsd` varchar(100) NOT NULL,
  `smp` varchar(50) NOT NULL,
  `tahun_smp` varchar(50) NOT NULL,
  `ijazahsmp` varchar(100) NOT NULL,
  `sma` varchar(50) NOT NULL,
  `tahun_sma` varchar(50) NOT NULL,
  `ijazahsma` varchar(100) NOT NULL,
  `sarjana` varchar(50) NOT NULL,
  `tahun_sarjana` varchar(50) NOT NULL,
  `transkrip` varchar(100) NOT NULL,
  `verif_sd` enum('belum','tahap1','ok','tolak') NOT NULL,
  `verif_smp` enum('belum','tahap1','ok','tolak') NOT NULL,
  `verif_sma` enum('belum','tahap1','ok','tolak') NOT NULL,
  `verif_sarjana` enum('belum','tahap1','ok','tolak') NOT NULL,
  PRIMARY KEY (`id_riwayat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user_tentor`, `sd`, `tahun_sd`, `ijazahsd`, `smp`, `tahun_smp`, `ijazahsmp`, `sma`, `tahun_sma`, `ijazahsma`, `sarjana`, `tahun_sarjana`, `transkrip`, `verif_sd`, `verif_smp`, `verif_sma`, `verif_sarjana`) VALUES
(3, '320170519001', 'MI Miftahun Ulum', '2001-2006', 'assets/riwayat/linux.jpg', 'SMP 1 Diwek Jombang', '2006-2009', 'assets/riwayat/Al-Waqiah.jpg', 'SMP 1 Diwek Jombang', '2009-2012', 'assets/riwayat/avatar.jpg', 'UNIPDU Peterongan Jombang', '2013-sekarang', 'assets/riwayat/unipdu.png', 'tahap1', 'tahap1', 'tahap1', 'tahap1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(15) NOT NULL,
  `level` enum('admin','tentor_lbb','tentor_luar','siswa') DEFAULT NULL,
  `uname` varchar(10) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` enum('mail_tunggu','mail_ok','verified') NOT NULL,
  `kode_verifikasi` varchar(90) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `level`, `uname`, `pass`, `last_login`, `status`, `kode_verifikasi`) VALUES
('420170511001', 'siswa', 'siswa', 'bcd724d15cde8c47650fda962968f102', '2017-05-27 02:59:45', 'mail_ok', 'bcd724d15cde8c47650fda962968f10223f86cc2c670b465198a4da285e5e890'),
('120170511001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-05-30 03:08:21', 'mail_ok', ''),
('320170519001', 'tentor_lbb', 'tentorlbb', 'cbdd46cd107e58981723b1c607aa678d', '2017-05-23 08:13:49', 'verified', 'cbdd46cd107e58981723b1c607aa678dabda280ce7b8c88d32d064038963672c'),
('320170514001', 'tentor_luar', 'tentor', '0eaed533c2f81dc9990c9e35cb27c89c', '2017-05-23 08:08:17', 'verified', '013f0f67779f3b1686c604db150d12ea765440bcc451b63b6262754fabf8c337'),
('320170528001', 'tentor_lbb', 'mujib', 'dedc8e2027fe367051598b81149beea8', '2017-05-28 01:45:34', 'verified', '1d9e813dfb2905bebd40c3e99731a125a261003a047fa4a0162cc1018bd235f5'),
('320170528002', 'tentor_lbb', 'amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', '2017-05-28 08:27:08', 'verified', '51e0a46ceb9b9f53a96281bd6b4f38e82f5909e04924e3489d84b524e4807cbd'),
('320170528003', 'siswa', 'aliyul', 'cfc0841872bb206f76a22e1b1d790b55', '2017-05-30 02:58:30', 'mail_ok', 'cfc0841872bb206f76a22e1b1d790b557b6670edb2a3cdd52f290d42f6027a10');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id_user` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(125) NOT NULL,
  `longtitude` varchar(50) NOT NULL,
  `lattitude` varchar(50) NOT NULL,
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user`, `nama_lengkap`, `no_telp`, `email`, `alamat`, `foto`, `longtitude`, `lattitude`) VALUES
('420170511001', 'Muhammad Ulin Nuha', '085712551156', 'nuha.um@gmail.com', 'Kedawong, Diwek, Jombang Regency, East Java, Indonesia', 'assets/pp/Harga-Ayam-Broiler-Hari-Ini.png', '112.2485526338379', '-7.581895052990024'),
('120170511001', 'admin lengkap', '085712551156', 'admin@admin.com', 'Jombatan, Jombang Regency, East Java, Indonesia', 'assets/img/default_avatar.jpg', '112.23095030000002', '-7.558012799999999'),
('320170514001', 'tentor luar', '085712551156', 'nuha.um@gmail.com', 'Mancilan, Jombang Regency, East Java, Indonesia', 'assets/pp/unipdu.png', '112.34271809999996', '-7.5634465'),
('320170519001', 'tentor lbb', '085712990099', 'codingae@gmail.com', 'Peterongan, Jombang Regency, East Java, Indonesia', 'assets/pp/avatar.jpg', '112.28012899999999', '-7.5186395'),
('320170528001', 'Muhammad Mujib', '085712990099', 'codingae@gmail.com', 'Cukir Gang 1, Cukir, Diwek, Jombang Regency, East Java, Indonesia', 'assets/img/default_avatar.jpg', '112.23876341838536', '-7.61140071973516'),
('320170528002', 'Amalia lailatu el naja', '085712990022', 'codingae@gmail.com', 'Jalan Gub. Suryo Gang II, Jombatan, Jombang, East Java, Indonesia', 'assets/img/default_avatar.jpg', '112.23036115145112', '-7.556491122441095'),
('320170528003', 'Muhammad Aliyul Murtadlo', '085211121112', 'codingae@gmail.com', 'Jogoroto, Jombang Regency, East Java, Indonesia', 'assets/pp/20.png', '112.26498623275756', '-7.591853570286721');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pilih_tentor`
--
CREATE TABLE IF NOT EXISTS `view_pilih_tentor` (
`id_user` varchar(15)
,`level` enum('admin','tentor_lbb','tentor_luar','siswa')
,`uname` varchar(10)
,`status_user` enum('mail_tunggu','mail_ok','verified')
,`alamat` varchar(100)
,`longtitude` varchar(50)
,`lattitude` varchar(50)
,`jenjang` enum('sd','smp','sma')
,`mapel` varchar(25)
,`status_keahlian` enum('verified','belum','tolak')
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
--
CREATE TABLE IF NOT EXISTS `view_user` (
`id_user` varchar(15)
,`level` enum('admin','tentor_lbb','tentor_luar','siswa')
,`uname` varchar(10)
,`pass` varchar(50)
,`last_login` timestamp
,`status` enum('mail_tunggu','mail_ok','verified')
,`kode_verifikasi` varchar(90)
,`nama_lengkap` varchar(50)
,`no_telp` varchar(20)
,`email` varchar(50)
,`alamat` varchar(100)
,`foto` varchar(125)
,`longtitude` varchar(50)
,`lattitude` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `view_pilih_tentor`
--
DROP TABLE IF EXISTS `view_pilih_tentor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pilih_tentor` AS select `user`.`id_user` AS `id_user`,`user`.`level` AS `level`,`user`.`uname` AS `uname`,`user`.`status` AS `status_user`,`user_detail`.`alamat` AS `alamat`,`user_detail`.`longtitude` AS `longtitude`,`user_detail`.`lattitude` AS `lattitude`,`keahlian`.`jenjang` AS `jenjang`,`keahlian`.`mapel` AS `mapel`,`keahlian`.`status` AS `status_keahlian` from ((`user` join `user_detail` on((`user`.`id_user` = `user_detail`.`id_user`))) join `keahlian` on((`user`.`id_user` = `keahlian`.`id_user`)));

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `user`.`id_user` AS `id_user`,`user`.`level` AS `level`,`user`.`uname` AS `uname`,`user`.`pass` AS `pass`,`user`.`last_login` AS `last_login`,`user`.`status` AS `status`,`user`.`kode_verifikasi` AS `kode_verifikasi`,`user_detail`.`nama_lengkap` AS `nama_lengkap`,`user_detail`.`no_telp` AS `no_telp`,`user_detail`.`email` AS `email`,`user_detail`.`alamat` AS `alamat`,`user_detail`.`foto` AS `foto`,`user_detail`.`longtitude` AS `longtitude`,`user_detail`.`lattitude` AS `lattitude` from (`user` join `user_detail` on((`user`.`id_user` = `user_detail`.`id_user`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
