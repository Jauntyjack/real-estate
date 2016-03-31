-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 04:16 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dutakota`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jual`
--

CREATE TABLE `data_jual` (
  `kode_data_jual` varchar(20) NOT NULL,
  `ktp_penjual` varchar(50) NOT NULL,
  `npwp_penjual` varchar(50) NOT NULL,
  `surat_nikah_penjual` varchar(50) NOT NULL,
  `ktp_pembeli` varchar(50) NOT NULL,
  `npwp_pembeli` varchar(50) NOT NULL,
  `surat_nikah_pembeli` varchar(50) NOT NULL,
  `kpr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jual`
--

INSERT INTO `data_jual` (`kode_data_jual`, `ktp_penjual`, `npwp_penjual`, `surat_nikah_penjual`, `ktp_pembeli`, `npwp_pembeli`, `surat_nikah_pembeli`, `kpr`) VALUES
('DJ1', 'DJ1_ktp_penjual.jpg', 'DJ1_npwp_penjual.jpg', 'DJ1_surat_nikah_penjual.jpg', 'DJ1_ktp_pembeli.jpg', 'DJ1_npwp_pembeli.jpg', 'DJ1_surat_nikah_pembeli.jpg', 'Ya'),
('DJ2', '', '', '', '', '', '', 'Ya'),
('DJ3', '', '', '', '', '', '', 'Tidak'),
('DJ4', '', '', '', '', '', '', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `data_sewa`
--

CREATE TABLE `data_sewa` (
  `kode_data_sewa` varchar(20) NOT NULL,
  `ktp_pemilik` varchar(50) NOT NULL,
  `ktp_penyewa` varchar(50) NOT NULL,
  `lama_sewa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sewa`
--

INSERT INTO `data_sewa` (`kode_data_sewa`, `ktp_pemilik`, `ktp_penyewa`, `lama_sewa`) VALUES
('DS1', 'DS1_ktp_pemilik.jpg', 'DS1_ktp_penyewa.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `kode_listing` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(20) NOT NULL,
  `kode_properti` varchar(20) NOT NULL,
  `kode_penjual` varchar(20) NOT NULL,
  `kode_pemasaran` varchar(20) NOT NULL,
  `nama_perwakilan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_marketing` varchar(50) NOT NULL,
  `nama_manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`kode_listing`, `jenis_transaksi`, `kode_properti`, `kode_penjual`, `kode_pemasaran`, `nama_perwakilan`, `tanggal`, `kode_marketing`, `nama_manager`) VALUES
('LS1', 'Dijual', 'PR1', 'JL1', 'PS1', 'claudia', '2015-11-02', 'qweqwe', 'celty'),
('LS10', 'Dijual', 'PR10', 'JL10', 'PS10', 'Dino', '2016-02-07', 'ikoiko', 'Michael'),
('LS2', 'Dijual', 'PR2', 'JL2', 'PS2', 'saya', '2015-11-03', 'qweqwe', 'celty'),
('LS3', 'Disewakan', 'PR3', 'JL3', 'PS3', 'rangga', '2015-11-05', 'linda', 'celty'),
('LS4', 'Dijual', 'PR4', 'JL4', 'PS4', 'saya', '2015-11-15', 'linda', 'celty'),
('LS5', 'Disewakan', 'PR5', 'JL5', 'PS5', 'denis', '2015-11-20', 'linda', 'celty'),
('LS6', 'Dijual', 'PR6', 'JL6', 'PS6', 'saya', '2015-12-15', 'asdasd', 'Michael'),
('LS7', 'Dijual', 'PR7', 'JL7', 'PS7', 'Shinta', '2016-01-06', 'asdasd', 'Michael'),
('LS8', 'Dijual', 'PR8', 'JL8', 'PS8', 'Desi', '2016-02-03', 'qweqwe', 'Michael'),
('LS9', 'Dijual', 'PR9', 'JL9', 'PS9', 'Helena', '2016-02-06', 'ikoiko', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `kode_marketing` varchar(50) NOT NULL,
  `password_marketing` varchar(30) NOT NULL,
  `nama_marketing` varchar(50) NOT NULL,
  `jk_marketing` varchar(20) NOT NULL,
  `no_hp_marketing` varchar(20) NOT NULL,
  `email_marketing` varchar(50) NOT NULL,
  `foto_marketing` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`kode_marketing`, `password_marketing`, `nama_marketing`, `jk_marketing`, `no_hp_marketing`, `email_marketing`, `foto_marketing`, `jabatan`) VALUES
('admin', 'admin', 'Admin', 'Perempuan', '085488652020', 'anita@gmail.com', 'default.jpg', 'admin'),
('asdasd', 'asdasd', 'Elise', 'Perempuan', '0817664235', 'asd@gmail.com', 'asdasd.jpg', 'marketing'),
('ikoiko', 'ikoiko', 'Iko Siwa', 'Laki-Laki', '0817664235', 'ikoiko@gmail.com', 'ikoiko.jpg', 'marketing'),
('kevinkev', 'kevinkev', 'Kevin Dionsius', 'Laki-Laki', '0817664235', 'kevin@gmail.com', 'kevinkev.jpg', 'marketing'),
('linda', 'linda', 'Linda', 'Laki-Laki', '0817664235', 'alex@gmail.com', 'linda.jpg', 'marketing'),
('qweqwe', 'qweqwe', 'Quincy', 'Laki-Laki', '084564', 'doni@gmail.com', 'qweqwe.jpg', 'marketing');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `status_kawin_pelanggan` varchar(30) NOT NULL,
  `no_telepon_pelanggan` varchar(20) NOT NULL,
  `no_hp_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `status_kawin_pelanggan`, `no_telepon_pelanggan`, `no_hp_pelanggan`) VALUES
('LG1', 'Cindy', 'jl batu ceper no 22', 'asd@gmail.com', 'Kawin', '021531321', '085465456500'),
('LG3', 'Dodo', 'jl kampung raya no 30', 'doni@gmail.com', 'Belum Kawin', '56477658', '081766545210'),
('LG4', 'Jenika', 'jl kampung raya no 30', 'jenika@gmail.com', 'Belum Kawin', '567412001', '081960475412'),
('LG5', 'Kelly', 'jl kampung raya no 30', 'kelly@gmail.com', 'Belum Kawin', '55687445', '081344687890'),
('LG6', 'Budi', 'jl kampung raya no 30', 'budi@gmail.com', 'Belum Kawin', '53966478', '081344687890');

-- --------------------------------------------------------

--
-- Table structure for table `pemasaran`
--

CREATE TABLE `pemasaran` (
  `kode_pemasaran` varchar(20) NOT NULL,
  `nama_disertifikat` varchar(50) NOT NULL,
  `hub_penjual` varchar(50) NOT NULL,
  `waktu_pengosongan` date NOT NULL,
  `harga_permintaan` bigint(20) NOT NULL,
  `harga_minimal` bigint(20) NOT NULL,
  `penawaran_terakhir` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasaran`
--

INSERT INTO `pemasaran` (`kode_pemasaran`, `nama_disertifikat`, `hub_penjual`, `waktu_pengosongan`, `harga_permintaan`, `harga_minimal`, `penawaran_terakhir`) VALUES
('PS1', 'Joly', 'anak', '2015-11-08', 1600000000, 1250000000, 1500000000),
('PS10', 'Dino', 'anak', '2016-02-17', 2700000000, 2500000000, 2500000000),
('PS11', 'Hari', 'Bapak', '2016-02-26', 3200000000, 3000000000, 3000000000),
('PS2', 'Joly', 'anak', '2015-11-10', 1300000000, 800000000, 950000000),
('PS3', 'Alicia', 'anak', '2015-12-30', 70000000, 50000000, 50000000),
('PS4', 'Geny', 'anak', '2015-12-02', 5000000000, 4000000000, 4500000000),
('PS5', 'Elise', 'anak', '2015-12-10', 3000000, 2000000, 1350000000),
('PS6', 'Randy', 'anak', '2016-01-02', 3100000000, 3000000000, 3100000000),
('PS7', 'Rinkha', 'anak', '2016-01-13', 2500000000, 2200000000, 2300000000),
('PS8', 'Jenny', 'anak', '2016-02-24', 2500000000, 2200000000, 2200000000),
('PS9', 'Helen', 'anak', '2016-02-02', 3700000000, 3500000000, 3500000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `kode_penjual` varchar(20) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `alamat_penjual` varchar(100) NOT NULL,
  `email_penjual` varchar(50) NOT NULL,
  `status_kawin_penjual` varchar(30) NOT NULL,
  `no_telepon_penjual` varchar(20) NOT NULL,
  `no_hp_penjual` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`kode_penjual`, `nama_penjual`, `alamat_penjual`, `email_penjual`, `status_kawin_penjual`, `no_telepon_penjual`, `no_hp_penjual`) VALUES
('JL1', 'Mikael Morena', 'JL alexexe', 'asd@gmail.com', 'Belum Kawin', '53546578', '0885478566'),
('JL10', 'Dino', 'Jl Dua Rangkas no 47', 'dino@gmail.com', 'Kawin', '55687445', '081344687890'),
('JL2', 'Syamsuddin', 'Jl Petahana no 22', 'asd@gmail.com', 'Belum Kawin', '567412001', '081960475412'),
('JL3', 'Alex Situmorang', 'jl dono', 'doni@gmail.com', 'Kawin', '53154687', '085744123450'),
('JL4', 'Shala Miranda', 'jalan jenissa', 'jeni@gmail.com', 'Belum Kawin', '55712456', '0877645450'),
('JL5', 'Shelly Efrata', 'Jl. Kemenangan Raya no 45', 'elise@gmail.com', 'Belum Kawin', '53966478', '081344687890'),
('JL6', 'Randy', 'Jl Cucur A9 no 19', 'randy@gmail.com', 'Belum Kawin', '55321220', '081344687890'),
('JL7', 'Shinta', 'Jl Perdana Ringka no 54', 'shintadg@gmail.com', 'Belum Kawin', '55687445', '081344687890'),
('JL8', 'Alex', 'Jl Perdana Ringka no 55', 'qwe@gmail.c', 'Belum Kawin', '55321220', '081960475412'),
('JL9', 'Helena', 'Jl Pesanggrahan Raya no 56', 'helen@gmail.com', 'Belum Kawin', '567412001', '0877645450');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `kode_properti` varchar(20) NOT NULL,
  `alamat_properti` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `tipe_properti` varchar(30) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `orientasi` varchar(20) NOT NULL,
  `tingkat` float NOT NULL,
  `kamar_tidur` tinyint(3) NOT NULL,
  `kamar_mandi` tinyint(3) NOT NULL,
  `ruangan_lain` varchar(100) NOT NULL,
  `listrik` smallint(5) NOT NULL,
  `telepon` tinyint(3) NOT NULL,
  `ac` tinyint(3) NOT NULL,
  `air` varchar(30) NOT NULL,
  `fasilitas_lain` varchar(100) NOT NULL,
  `status_kepemilikan` varchar(30) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`kode_properti`, `alamat_properti`, `kode_pos`, `kelurahan`, `kecamatan`, `tipe_properti`, `luas_tanah`, `luas_bangunan`, `orientasi`, `tingkat`, `kamar_tidur`, `kamar_mandi`, `ruangan_lain`, `listrik`, `telepon`, `ac`, `air`, `fasilitas_lain`, `status_kepemilikan`, `gambar`) VALUES
('PR1', 'Jl. Camar 20 Blok 31', 12560, 'Bintaro', 'Ciputat', 'Rumah Tinggal', 150, 150, 'timur', 5, 3, 2, 'tidak ada', 1300, 2, 1, 'PAM', 'tidak ada', 'Hak Milik', 'IM000168.JPG/IM000167.JPG/IM000166.JPG'),
('PR10', 'Jl. Flamboyan No. 20, Rempoa', 15225, 'Pondok Jaya', 'Pondok Aren', 'Ruko / R. Usaha', 130, 130, 'utara', 3.5, 2, 2, '', 3300, 1, 2, 'PAM', '', 'Hak Milik', 'ruko.jpg'),
('PR2', 'Jl. Camar 3 AG', 12560, 'Pondok Pucung', 'Pondok Aren', 'Rumah Tinggal', 150, 120, 'timur', 5, 2, 2, 'tidak ada', 2200, 2, 1, 'PAM', 'tidak ada', 'Hak Milik', 'IM000206.JPG/IM000207.JPG/IM000208.JPG/IM000209.JPG/IM000212.JPG/IM000213.JPG/IM000214.JPG/IM000217.JPG'),
('PR3', 'Jl Tegal Rotan Raya No.9D', 14045, 'Bintaro', 'Ciputat', 'Rumah Tinggal', 120, 120, 'timur', 5, 4, 4, 'tidak ada', 2200, 2, 5, 'PAM', 'tidak ada', 'Hak Milik', 'IM000366.JPG/IM000370.JPG/IM000371.JPG/IM000373.JPG/IM000375.JPG'),
('PR4', 'Jl. Bintaro Utama 3A', 12545, 'Pondok Ranji', 'Ciputat', 'Rumah Tinggal', 150, 200, 'utara', 3, 2, 2, 'tidak ada', 1300, 2, 4, 'PAM', 'tidak ada', 'HGB', 'IM000930.JPG/IM000941.jpg'),
('PR5', 'Ruko Emerald Avenue Blok EA/A-11, Sektor IX, Bintaro Jaya', 15330, 'Pondok Jaya', 'Pondok Aren', 'Ruko / R. Usaha', 60, 40, 'barat', 2, 3, 2, 'tidak ada', 2200, 2, 3, 'PAM', 'tidak ada', 'Hak Milik', 'IM000412.JPG/IM000699.JPG/IM000703.JPG/IM000704.JPG/IM000707.JPG'),
('PR6', 'JL Elang Blok HG, Bintaro Sektor 9', 15225, 'Pondok Pucung', 'Pondok Aren', 'Rumah Tinggal', 350, 207, 'timur', 2.5, 4, 4, 'gudang', 5200, 3, 4, 'PAM', 'tidak ada', 'Hak Milik', 'IM000103.JPG/IM000104.JPG'),
('PR7', 'Jl Grand Garden C5 no 42', 15330, 'Pondok Pucung', 'Pondok Aren', 'Rumah Tinggal', 250, 230, 'timur', 3, 4, 4, 'tidak ada', 5200, 2, 2, 'PAM', 'tidak ada', 'HGB', 'IM000232.JPG/IM000235.JPG/IM000236.JPG/IM000239.JPG'),
('PR8', 'Jl Kemenangan Raya no 72', 15224, 'Pondok Pucung', 'Pondok Aren', 'Rumah Tinggal', 120, 120, 'timur', 3, 3, 2, '', 5200, 4, 2, 'PAM', '', 'HGB', 'IM000697.JPG/IM000698.JPG/IM000699.JPG/IM000700.JPG/IM000701.JPG/IM000702.JPG'),
('PR9', 'Jl. Menteng bintaro Blok FG 1 - 18', 15229, 'Pondok Ranji', 'Ciputat', 'Rumah Tinggal', 300, 270, 'selatan', 3, 3, 2, 'gudang', 4700, 2, 3, 'PAM', '', 'HGB', 'Ciputat-20130529-00137.jpg/Ciputat-20130530-00144.jpg/Ciputat-20130530-00145.jpg/Ciputat-20130530-00147.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_listing` varchar(20) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `jenis_transaksi_akhir` varchar(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_marketing_trans` varchar(20) NOT NULL,
  `kode_data_jual` varchar(20) NOT NULL,
  `kode_data_sewa` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_listing`, `kode_pelanggan`, `jenis_transaksi_akhir`, `harga`, `tgl_transaksi`, `kode_marketing_trans`, `kode_data_jual`, `kode_data_sewa`, `status`) VALUES
('TR1', 'LS2', 'LG1', 'Jual', 1400000000, '2016-01-04', 'linda', 'DJ1', '', 'Selesai'),
('TR2', 'LS5', 'LG3', 'Sewa', 1700000000, '2015-12-20', 'linda', '', 'DS1', 'Selesai'),
('TR3', 'LS7', 'LG4', 'Jual', 2300000000, '2015-12-03', 'asdasd', 'DJ2', '', 'Selesai'),
('TR4', 'LS6', 'LG5', 'Jual', 2800000000, '2016-01-01', 'kevinkev', 'DJ3', '', 'Selesai'),
('TR5', 'LS9', 'LG6', 'Jual', 3000000000, '2016-02-07', 'qweqwe', 'DJ4', '', 'Diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jual`
--
ALTER TABLE `data_jual`
  ADD PRIMARY KEY (`kode_data_jual`);

--
-- Indexes for table `data_sewa`
--
ALTER TABLE `data_sewa`
  ADD PRIMARY KEY (`kode_data_sewa`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`kode_listing`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`kode_marketing`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD PRIMARY KEY (`kode_pemasaran`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`kode_penjual`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`kode_properti`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
