-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2014 at 01:27 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(25) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(123, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kriteria`
--

CREATE TABLE IF NOT EXISTS `tabel_kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kriteria`
--

INSERT INTO `tabel_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('K01', 'Usia'),
('K02', 'Pendidikan Terakhir'),
('K03', 'Pengalaman Kerja'),
('K04', 'mempunyai SKCK'),
('K05', 'menguasai ms office'),
('K06', 'ijazah/ipk'),
('K07', 'Kesehatan'),
('K08', 'penampilan'),
('K09', 'Wawancara'),
('K10', 'Tes / Ujian');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai`
--

CREATE TABLE IF NOT EXISTS `tabel_nilai` (
  `id_nilai_soal` int(4) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `benar` int(4) NOT NULL,
  `salah` int(4) NOT NULL,
  `kosong` int(4) NOT NULL,
  `point` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_nilai_soal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `tabel_nilai`
--

INSERT INTO `tabel_nilai` (`id_nilai_soal`, `id_user`, `benar`, `salah`, `kosong`, `point`, `tanggal`) VALUES
(85, 40, 6, 4, 0, 60, '2014-12-03'),
(86, 41, 6, 4, 0, 60, '2014-12-03'),
(87, 49, 6, 4, 0, 60, '2014-12-19'),
(88, 47, 9, 1, 0, 90, '2014-12-19'),
(89, 48, 6, 4, 0, 60, '2014-12-19'),
(90, 46, 10, 0, 0, 100, '2014-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_perbkrit`
--

CREATE TABLE IF NOT EXISTS `tabel_perbkrit` (
  `id_perbandingankriteria` varchar(10) NOT NULL,
  `id_kriteria1` varchar(5) NOT NULL,
  `id_kriteria2` varchar(5) NOT NULL,
  `nilai_perbandingan` float NOT NULL,
  `tahun` int(6) NOT NULL,
  PRIMARY KEY (`id_perbandingankriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_perbkrit`
--

INSERT INTO `tabel_perbkrit` (`id_perbandingankriteria`, `id_kriteria1`, `id_kriteria2`, `nilai_perbandingan`, `tahun`) VALUES
('1', 'K01', 'K02', 2, 2014),
('2', 'K01', 'K03', 2, 2014),
('3', 'K01', 'K04', 3, 2014),
('4', 'K01', 'K05', 5, 2014),
('5', 'K01', 'K06', 4, 2014),
('6', 'K01', 'K07', 6, 2014),
('7', 'K01', 'K08', 6, 2014),
('8', 'K01', 'K09', 7, 2014),
('9', 'K01', 'K10', 2, 2014),
('10', 'K02', 'K03', 3, 2014),
('11', 'K02', 'K04', 6, 2014),
('12', 'K02', 'K05', 5, 2014),
('13', 'K02', 'K06', 4, 2014),
('14', 'K02', 'K07', 4, 2014),
('15', 'K02', 'K08', 4, 2014),
('16', 'K02', 'K09', 2, 2014),
('17', 'K02', 'K10', 1, 2014),
('18', 'K03', 'K04', 8, 2014),
('19', 'K03', 'K05', 3, 2014),
('20', 'K03', 'K06', 4, 2014),
('21', 'K03', 'K07', 8, 2014),
('22', 'K03', 'K08', 5, 2014),
('23', 'K03', 'K09', 2, 2014),
('24', 'K03', 'K10', 8, 2014),
('25', 'K04', 'K05', 9, 2014),
('26', 'K04', 'K06', 7, 2014),
('27', 'K04', 'K07', 5, 2014),
('28', 'K04', 'K08', 4, 2014),
('29', 'K04', 'K09', 3, 2014),
('30', 'K04', 'K10', 3, 2014),
('31', 'K05', 'K06', 5, 2014),
('32', 'K05', 'K07', 4, 2014),
('33', 'K05', 'K08', 4, 2014),
('34', 'K05', 'K09', 4, 2014),
('35', 'K05', 'K10', 8, 2014),
('36', 'K06', 'K07', 4, 2014),
('37', 'K06', 'K08', 5, 2014),
('38', 'K06', 'K09', 4, 2014),
('39', 'K06', 'K10', 3, 2014),
('40', 'K07', 'K08', 5, 2014),
('41', 'K07', 'K09', 6, 2014),
('42', 'K07', 'K10', 2, 2014),
('43', 'K08', 'K09', 5, 2014),
('44', 'K08', 'K10', 2, 2014),
('45', 'K09', 'K10', 7, 2014),
('46', 'K01', 'K02', 5, 2013),
('47', 'K01', 'K03', 3, 2013),
('48', 'K01', 'K04', 2, 2013),
('49', 'K01', 'K05', 2, 2013),
('50', 'K01', 'K06', 2, 2013),
('51', 'K01', 'K07', 2, 2013),
('52', 'K01', 'K08', 2, 2013),
('53', 'K01', 'K09', 2, 2013),
('54', 'K01', 'K10', 2, 2013),
('55', 'K02', 'K03', 3, 2013),
('56', 'K02', 'K04', 4, 2013),
('57', 'K02', 'K05', 3, 2013),
('58', 'K02', 'K06', 1, 2013),
('59', 'K02', 'K07', 2, 2013),
('60', 'K02', 'K08', 1, 2013),
('61', 'K02', 'K09', 1, 2013),
('62', 'K02', 'K10', 2, 2013),
('63', 'K03', 'K04', 1, 2013),
('64', 'K03', 'K05', 1, 2013),
('65', 'K03', 'K06', 3, 2013),
('66', 'K03', 'K07', 2, 2013),
('67', 'K03', 'K08', 3, 2013),
('68', 'K03', 'K09', 3, 2013),
('69', 'K03', 'K10', 2, 2013),
('70', 'K04', 'K05', 3, 2013),
('71', 'K04', 'K06', 3, 2013),
('72', 'K04', 'K07', 1, 2013),
('73', 'K04', 'K08', 3, 2013),
('74', 'K04', 'K09', 2, 2013),
('75', 'K04', 'K10', 2, 2013),
('76', 'K05', 'K06', 3, 2013),
('77', 'K05', 'K07', 3, 2013),
('78', 'K05', 'K08', 2, 2013),
('79', 'K05', 'K09', 3, 2013),
('80', 'K05', 'K10', 2, 2013),
('81', 'K06', 'K07', 2, 2013),
('82', 'K06', 'K08', 2, 2013),
('83', 'K06', 'K09', 3, 2013),
('84', 'K06', 'K10', 2, 2013),
('85', 'K07', 'K08', 3, 2013),
('86', 'K07', 'K09', 3, 2013),
('87', 'K07', 'K10', 1, 2013),
('88', 'K08', 'K09', 2, 2013),
('89', 'K08', 'K10', 2, 2013),
('90', 'K09', 'K10', 2, 2013);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prioglobal`
--

CREATE TABLE IF NOT EXISTS `tabel_prioglobal` (
  `id_prioglobal` varchar(6) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `nilai` float NOT NULL,
  `tahun` int(6) NOT NULL,
  PRIMARY KEY (`id_prioglobal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_prioglobal`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_skor`
--

CREATE TABLE IF NOT EXISTS `tabel_skor` (
  `id_skor` varchar(6) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `id_user` int(4) NOT NULL,
  `skor` int(5) NOT NULL,
  PRIMARY KEY (`id_skor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_skor`
--

INSERT INTO `tabel_skor` (`id_skor`, `id_kriteria`, `id_user`, `skor`) VALUES
('61', 'K01', 40, 80),
('62', 'K02', 40, 80),
('63', 'K03', 40, 80),
('64', 'K04', 40, 80),
('65', 'K05', 40, 80),
('66', 'K06', 40, 80),
('67', 'K07', 40, 80),
('68', 'K08', 40, 80),
('69', 'K09', 40, 80),
('70', 'K10', 40, 60),
('71', 'K01', 41, 90),
('72', 'K02', 41, 80),
('73', 'K03', 41, 90),
('74', 'K04', 41, 80),
('75', 'K05', 41, 90),
('76', 'K06', 41, 80),
('77', 'K07', 41, 90),
('78', 'K08', 41, 80),
('79', 'K09', 41, 90),
('80', 'K10', 41, 60),
('81', 'K01', 42, 80),
('82', 'K02', 42, 90),
('83', 'K03', 42, 70),
('84', 'K04', 42, 60),
('85', 'K05', 42, 80),
('86', 'K06', 42, 70),
('87', 'K07', 42, 90),
('88', 'K08', 42, 96),
('89', 'K09', 42, 78),
('90', 'K10', 42, 0),
('91', 'K01', 46, 90),
('92', 'K02', 46, 79),
('93', 'K03', 46, 80),
('94', 'K04', 46, 97),
('95', 'K05', 46, 80),
('96', 'K06', 46, 90),
('97', 'K07', 46, 90),
('98', 'K08', 46, 90),
('99', 'K09', 46, 90),
('100', 'K10', 46, 100),
('101', 'K01', 47, 70),
('102', 'K02', 47, 80),
('103', 'K03', 47, 90),
('104', 'K04', 47, 89),
('105', 'K05', 47, 70),
('106', 'K06', 47, 79),
('107', 'K07', 47, 90),
('108', 'K08', 47, 89),
('109', 'K09', 47, 90),
('110', 'K10', 47, 90),
('111', 'K01', 48, 90),
('112', 'K02', 48, 90),
('113', 'K03', 48, 70),
('114', 'K04', 48, 90),
('115', 'K05', 48, 90),
('116', 'K06', 48, 80),
('117', 'K07', 48, 90),
('118', 'K08', 48, 90),
('119', 'K09', 48, 70),
('120', 'K10', 48, 60),
('121', 'K01', 49, 80),
('122', 'K02', 49, 70),
('123', 'K03', 49, 90),
('124', 'K04', 49, 89),
('125', 'K05', 49, 98),
('126', 'K06', 49, 78),
('127', 'K07', 49, 97),
('128', 'K08', 49, 90),
('129', 'K09', 49, 80),
('130', 'K10', 49, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_soal`
--

CREATE TABLE IF NOT EXISTS `tabel_soal` (
  `id_soal` int(4) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(100) NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `publish` enum('yes','no') NOT NULL,
  `tipe` int(2) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tabel_soal`
--

INSERT INTO `tabel_soal` (`id_soal`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban`, `publish`, `tipe`) VALUES
(1, '<br>Semua penyelam adalah perenang. <br>Sementara penyelam adalah pelaut', 'Sementara pelaut adalah perenang', 'sementara pereneng bukan penyelam', 'Semua pelaut adalah perenang', 'Sementara penyelam bukan pelaut', 'D', 'yes', 1),
(2, '<br>Semua manusia tidak bertanduk. <br>Semua kucing tidak  memamah biak', 'Semua manusia tidak bertanduk.Semua kucing tidak pememamah biak', 'Kucing tidak bertanduk', 'Manusia sama dengan kucing', 'Tidak dapat ditarik kesimpulan', 'D', 'yes', 1),
(3, 'Sementara sarjana adalah dosen.semua dosen harus meneliti', 'Sementara sarjana bukan dosen', 'Sementara peneliti bukan dosen', 'Sementara dosen tidak meneliti', 'sementara peneliti adalah dosen', 'A', 'yes', 1),
(4, '<br>Semua pekerja harus mengenakan topi pengaman. <br>Sementara pekerja mengenakan sarung tangan', 'Sementara pekerja tidak menggunakan topi pengaman', 'Semua pekerja tidak mengenakan sarung tangan', 'Sementara pekerja menggnakan topi pengaman dan sarung tangan', 'Sementara pekerja tidak mengenakan topi pengaman dan tidak m', 'C', 'yes', 1),
(5, 'Semua seniman kreatif. Sementara ilmuan tidak kreatif', 'Semua ilmuwan kreatif', 'Sementara ilmuwan kreatif', 'Tidak ada seniman yang ilmuwan', 'Sementara ilmuwan bukan seniman', 'B', 'yes', 1),
(6, '<br> Tidak semua hipotesis penelitian terbukti benar. <br>Sementara peneliti disertai tidak menguji ', 'Sementara doktor tidak menulis disertasi', 'Sementara hipotesis disertasi tidak terbukti', 'Semua hipotesis disertasi terbukti benar', 'semua doktor, hipotesis disertasinya benar', 'B', 'yes', 1),
(7, '<br> Semua anggota asosiasi profesiharus hadir dalam rapat. <br>Sementara dokter adalah anggota asos', 'Semua yang hadir dalam rapat adalah dokter', 'Semua anggota rapat bukan anggota asosiasi profesi', 'Sementara peserta rapat adalah dokter', 'Semua yang hadir bukan dokter', 'C', 'yes', 1),
(8, '<br> Semua jenis ikan bernafas dengan insang. <br>Ikan paus bernafas dengan paru-paru', 'Sementara jenis ikan bernafas dengan paru-paru', 'Semua ikan paus bernafas dengan insang', 'Sementara ikan paus bernafas dengan insang', 'Semua ikan paus termasuk ikan', 'D', 'yes', 1),
(9, '<br>Sementara penyanyi ada pada kedudukan utama. <br>Semua yang ada pada kedudukan utama mendatangka', 'Sementara penyanyi tidak pada kedudukan pertama', 'Semua penyanyi ada pada kedudukan utama', 'Sementara penyanyi tidak mendatangkan uang', 'Sementara yang mendatangkan uang adalah penyanyi', 'A', 'yes', 1),
(10, '<br>Pengendara sepeda motor yang lewat jalan Protokol harus <br>mengenakan helm. Sementara murid yan', 'Semua murid tidak boleh lewat jalan protokol', 'Sementara murid bersepeda motor boleh lewat jalan protokol', 'Semua murid bersepeda motor boleh lewat jalan protokol', 'Semua murid bersepeda motor harus mengenakan helm', 'C', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tahun`
--

CREATE TABLE IF NOT EXISTS `tabel_tahun` (
  `id_tahun` varchar(5) NOT NULL,
  `nama_tahun` int(5) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_tahun`
--

INSERT INTO `tabel_tahun` (`id_tahun`, `nama_tahun`, `status`) VALUES
('t02', 2014, 0),
('t01', 2013, 1),
('t04', 2015, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jk` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `tgl` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `pendidikan_terakhir` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `pengalaman` varchar(22) COLLATE latin1_general_ci NOT NULL,
  `tahun` int(6) NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `jk`, `tgl`, `alamat`, `telepon`, `pendidikan_terakhir`, `pengalaman`, `tahun`, `username`, `password`) VALUES
(47, 'Kusnadi', 'laki-laki', '08/05/1985', 'surabaya', '5675759', 'D3', '6 tahun', 2013, 'kusnadi', '87509b7f1182014f1948aa8e699848d1'),
(48, 'Yusuf', 'laki-laki', '28/12/1989', 'kediri', '6787789', 'SMK', '4 tahun', 2013, 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405'),
(41, 'Agung Hariyadi', 'laki-laki', '13/01/1991', 'surabaya', '435454687', 'SMK', '4 tahun', 2014, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f'),
(40, 'Yusron Afiki', 'laki-laki', '10/12/2014', 'pasuruan', '2345678', 'D3', '6 tahun', 2014, 'yusron', '52b851e6dffbc3b9cc8ccc36e34eceda'),
(39, 'Amin Tohari', 'laki-laki', '12/02/1992', 'malang', '2347678', 'S1', '5 tahun', 2014, 'amin', '30ae43ad1aa0a416699051b73a3dfcf6'),
(49, 'Adit', 'laki-laki', '04/05/1987', 'malang', '769890', 'D3', '2 tahun', 2013, 'adit', '486b6c6b267bc61677367eb6b6458764'),
(46, 'Muhammad', 'laki-laki', '09/12/1992', 'malang', '5647789', 'D3', '5 tahun', 2013, 'muhammad', 'a7777999e260290f68a1455cacdabf6c'),
(50, 'Andik', 'laki-laki', '13/07/1988', 'malang', '57689909', 'D3', '3 tahun', 2013, 'andik', '0fc502878c8255bd1ffaa832fdcde0b6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
