-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_henny`
--

-- --------------------------------------------------------

--
-- Table structure for table `tahun_tbl`
--

CREATE TABLE `tahun_tbl` (
  `id_tahun` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tahun_tbl`
--

INSERT INTO `tahun_tbl` (`id_tahun`, `tahun`) VALUES
(2, '2023'),
(6, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `isi_kegiatan` text DEFAULT NULL,
  `slug_kegiatan` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tempat_kegiatan` varchar(1281) DEFAULT NULL,
  `foto_kegiatan` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_kegiatan`, `isi_kegiatan`, `slug_kegiatan`, `tanggal`, `jam`, `tempat_kegiatan`, `foto_kegiatan`) VALUES
(29, 'Kerja Bakti', '<p>&nbsp;Undangan Kerja Bakti</p><p><br></p><p>Kepada Seluruh Warga Masyarakat,</p><p><br></p><p>Dalam rangka menjaga kebersihan dan keindahan lingkungan, kami mengundang seluruh warga masyarakat untuk bergabung dalam kegiatan kerja bakti yang akan dilaksanakan pada:</p><p><br></p><p>Hari/Tanggal: Sabtu, 15 Desember 2023</p><p>Waktu: 08.00 - 12.00 WIB</p><p>Tempat: Gereja XYZ</p><p><br></p><p>Kami memohon partisipasi aktif dari seluruh warga untuk membersihkan lingkungan sekitar. Kegiatan ini akan meliputi pembersihan area sekolah, penanaman tanaman hias, dan perbaikan infrastruktur kecil.</p><p><br></p><p>Mohon membawa peralatan pembersih (sapu, penggaruk, dan sejenisnya) untuk mendukung kelancaran kegiatan ini.</p><p><br></p><p>Mari kita bergotong-royong untuk menciptakan lingkungan yang bersih dan nyaman bagi kita semua. Kami sangat mengharapkan kehadiran dan partisipasi aktif dari saudara-saudara sekalian.</p><p><br></p><p>Hormat kami,</p><p>Panitia Kerja Bakti</p>', 'kerja-bakti', '2023-12-15', '10:18:00', 'Sentani', '1702603131_999b3e78efca3fe933bf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_donasi` varchar(128) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl`, `id_rekening`, `nama_bank`, `no_rek`, `nama_pengirim`, `jumlah`, `jenis_donasi`, `bukti`) VALUES
(4, '2023-10-22', 3, 'BCA', '1234-5678-90', 'Pri Utomo Damar Agung', 1000000, 'Sumbangan ', '1697942908_23cfbbfc3848d86f119c.png'),
(3, '2023-10-22', 1, 'BRI', '1234-5678-90', 'Pri Utomo Damar Agung', 1000000, 'Sumbangan ', '1697942595_6f0eb30bc89157af8471.png'),
(5, '2023-10-22', 1, 'BRI', '1234-5678-90', 'Pri Utomo Damar Agung', 2000000, 'Sumbangan kekeluargaan', '1697943066_24b35768a3e6904e54af.png'),
(6, '2023-10-23', 1, 'BRI', '1234-5678-93', 'Pri Utomo Damar Agung', 500000, 'Sumbangan Ibadah', '1698022425_c554e0f992b5904b7ddf.png'),
(7, '2023-10-23', 1, 'BCA', '1234-5678-90', 'Pri Utomo Damar Agung', 250000, 'Sumbangan Ibadah', '1698035638_481f7ff781f855c17928.jpg'),
(8, '2023-12-11', 5, 'BRI', '1234-5678-90', 'Pri Utomo Damar Agung', 12344444, 'Rumah Tongkonan', '1702253218_231c68d92dc8fb77388a.png'),
(9, '2023-12-11', 3, 'BCA', '1234-5678-93', 'Pri Utomo Damar Agung', 123222, 'Ibadah', '1702253312_1c4c8b5a8c3e8a693551.png'),
(10, '2024-03-24', 1, 'jj', '99', 'bb', 9000, 'Rumah Tongkonan', '1711291590_1732912eea8637181dc3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi2`
--

CREATE TABLE `tbl_donasi2` (
  `id_donasi` int(11) NOT NULL,
  `nama_pengirim` varchar(40) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `jenis_donasi` varchar(40) NOT NULL,
  `jumlah_donasi` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donasi2`
--

INSERT INTO `tbl_donasi2` (`id_donasi`, `nama_pengirim`, `no_telp`, `jenis_donasi`, `jumlah_donasi`, `create_date`) VALUES
(1, 'Kaleb', '081772881922', 'Rumah Tongkonan', '120000', '2024-03-25 23:13:56'),
(2, 'Stu', '081382819922', 'Rumah Tongkonan', '150000', '2024-03-26 05:19:43'),
(3, 'das', '1234', 'Rumah Tongkonan', '20000', '2024-03-28 21:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ibadah`
--

CREATE TABLE `tbl_ibadah` (
  `id_ibadah` int(11) NOT NULL,
  `nama_ibadah` varchar(128) DEFAULT NULL,
  `isi_ibadah` text DEFAULT NULL,
  `slug_ibadah` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tempat_ibadah` varchar(128) DEFAULT NULL,
  `pemimpin_ibadah` varchar(128) DEFAULT NULL,
  `foto_ibadah` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_ibadah`
--

INSERT INTO `tbl_ibadah` (`id_ibadah`, `nama_ibadah`, `isi_ibadah`, `slug_ibadah`, `tanggal`, `jam`, `tempat_ibadah`, `pemimpin_ibadah`, `foto_ibadah`) VALUES
(4, 'Ibadah Natal Gereja Di Wilayah 1 Jayapura', '<p>Undangan Ibadah Natal Di Wilayah 1 Jayapura</p><p><br></p><p>Kepada Seluruh Warga Masyarakat IKT,</p><p><br></p><p>kami mengundang seluruh warga masyarakat untuk bergabung dalam ibadah natal bersama yang akan dilaksanakan pada:</p><p><br></p><p>Hari/Tanggal: Sabtu, 20 Desember 2023</p><p>Waktu: 08.00 - 12.00 WIB</p><p>Tempat: Gereja XYZ</p><p><br></p><p>Hormat kami,</p>', 'ibadah-natal-gereja-di-wilayah-1-jayapura', '2023-12-20', '08:00:00', 'Sentani', 'Eben Heiser', '1702603033_ed278118d90eaf7e47cc.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_ibadah`
--

CREATE TABLE `tbl_kas_ibadah` (
  `id_kas_ibadah` int(11) NOT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_ibadah`
--

INSERT INTO `tbl_kas_ibadah` (`id_kas_ibadah`, `kas_keluar`, `kas_masuk`, `ket`, `status`, `tanggal`) VALUES
(1, 0, 1234444, 'Sumbangan Ibadah', 'Masuk', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_ibadah_mingguan`
--

CREATE TABLE `tbl_kas_ibadah_mingguan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_ikt`
--

CREATE TABLE `tbl_kas_ikt` (
  `id_kas_ikt` int(11) NOT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas_ikt`
--

INSERT INTO `tbl_kas_ikt` (`id_kas_ikt`, `kas_keluar`, `kas_masuk`, `ket`, `status`, `tanggal`) VALUES
(1, 0, 1000000, 'Saldo Masuk', 'Masuk', '2023-10-21'),
(2, 500000, 0, 'Beli Air Mineral 1 Karton', 'Keluar', '2023-10-28'),
(4, 700000, 0, 'Beli Air Mineral 12 Karton', 'Keluar', '2023-10-31'),
(7, 0, 12344444, 'Kerukunan', 'Masuk', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerukunan`
--

CREATE TABLE `tbl_kerukunan` (
  `id_kerukunan` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `nama_kerukunan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kerukunan`
--

INSERT INTO `tbl_kerukunan` (`id_kerukunan`, `id_tahun`, `nama_kerukunan`) VALUES
(5, 2, 'Kerukunan 1'),
(6, 2, 'Kerukunan 2'),
(7, 2, 'Kerukunan 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'Bank BRI', '2345-4584-1111-111', 'Ikatan Keluarga Toraja'),
(3, 'Bank Mandiri', '4837-111-232-111', 'Ikatan Keluarga Toraja'),
(5, 'BCA', '1234-5678-90', 'Ikatan Keluarga Toraja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama_masjid` varchar(100) NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `no_telpon` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_masjid`, `id_kota`, `alamat`, `email`, `no_telpon`) VALUES
(1, 'IKATAN KELUARGA TORAJA', '3307', 'Jl. Sentani', 'ikt.kabjayapura@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'Sekretaris', 'admin@gmail.com', '$2y$10$Q8t/b2nbwChi9ZKCwrbE1O.gDNbSM774FHns.wro2Rf0OaQeECk76', 1),
(5, 'Bendahara', 'bendahara@gmail.com', '$2y$10$9RW.PExYOeaYYh8iNeHNKOIURTRDGvhJyhtlOteaopa/8Qpzq8UMG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `nama_wilayah` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_wilayah`, `id_tahun`, `nama_wilayah`) VALUES
(1, 2, 'Wilayah 1'),
(2, 2, 'Wilayah 2'),
(3, 2, 'Wilayah 3'),
(4, 2, 'Wilayah 4'),
(6, 2, 'Wilayah 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`) USING BTREE;

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`) USING BTREE;

--
-- Indexes for table `tbl_donasi2`
--
ALTER TABLE `tbl_donasi2`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_kas_ibadah_mingguan`
--
ALTER TABLE `tbl_kas_ibadah_mingguan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`) USING BTREE;

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donasi2`
--
ALTER TABLE `tbl_donasi2`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kas_ibadah_mingguan`
--
ALTER TABLE `tbl_kas_ibadah_mingguan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
