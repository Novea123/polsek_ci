-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2025 at 03:49 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polsek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_barang_bukti` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `lokasi_penyimpanan` text NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `penanganan` varchar(50) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id_bukti`, `id_laporan`, `deskripsi`, `jenis_barang_bukti`, `jumlah`, `tanggal_ditemukan`, `lokasi_penyimpanan`, `status_barang`, `penanganan`, `bukti`) VALUES
(8, 14, 'Tidak ada', 'Senjata', 3, '2025-01-29', 'Gudang', 'Diamankan', 'Penyimpanan', 'e4b2ec0848ae6dd8dd1ed1150fb7dae2c1f8ec49.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ditangkap`
--

CREATE TABLE `tbl_ditangkap` (
  `id_orang` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `nama_orang` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_hukum` varchar(50) NOT NULL,
  `jenis_kejahatan` varchar(50) NOT NULL,
  `tanggal_ditangkap` date NOT NULL,
  `durasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ditangkap`
--

INSERT INTO `tbl_ditangkap` (`id_orang`, `id_laporan`, `nama_orang`, `jenis_kelamin`, `ttl`, `alamat`, `pekerjaan`, `status_hukum`, `jenis_kejahatan`, `tanggal_ditangkap`, `durasi`) VALUES
(9, 1, 'Dono', 'Pria', '0000-00-00', 'Jl. Trans Kalimantan', 'Petani', 'Tersangka', 'Cyberbullying', '2025-01-01', '2 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `tipe` enum('Pemasukan','Pengeluaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `tipe`) VALUES
(1, 'Jasa Web Development', 'Pemasukan'),
(2, 'Jasa Web Desain', 'Pemasukan'),
(3, 'Jasa Digital Marketing', 'Pemasukan'),
(4, 'Jasa Kursus dan Pelatihan', 'Pemasukan'),
(5, 'Penjualan E-Book', 'Pemasukan'),
(6, 'Penjualan Video Tutorial', 'Pemasukan'),
(7, 'Penjualan Sourcecode', 'Pemasukan'),
(8, 'Pemasukan Lainnya', 'Pemasukan'),
(9, 'Biaya Rutin Bulanan', 'Pengeluaran'),
(10, 'Biaya Rutin Tahunan', 'Pengeluaran'),
(11, 'Transportasi', 'Pengeluaran'),
(12, 'Komunikasi', 'Pengeluaran'),
(13, 'Tagihan', 'Pengeluaran'),
(14, 'Gaji Karyawan', 'Pengeluaran'),
(15, 'Biaya Tidak Terduga', 'Pengeluaran'),
(16, 'Pengeluaran Lainnya', 'Pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `jenis_kejahatan` varchar(50) NOT NULL,
  `lokasi_kejadian` text NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `waktu_kejadian` time NOT NULL,
  `deskripsi_kejadian` text NOT NULL,
  `status` enum('Sedang Proses','Dalam Penyelidikan','Selesai') NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_pelapor`, `id_petugas`, `jenis_kejahatan`, `lokasi_kejadian`, `tanggal_kejadian`, `waktu_kejadian`, `deskripsi_kejadian`, `status`, `bukti`) VALUES
(14, 1, 0, 'Pemerasan', 'Jl. Ahmad Yani, Km. 7', '2025-01-29', '13:30:00', 'Tidak tau', 'Selesai', '965c526177f912e1e686a0892b56a6f8aa01eeae.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggaran`
--

CREATE TABLE `tbl_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggar` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_pelanggaran` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sanksi` varchar(100) NOT NULL,
  `status` enum('Belum Diproses','Dalam Proses','Selesai') NOT NULL DEFAULT 'Belum Diproses',
  `id_petugas` varchar(100) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggaran`
--

INSERT INTO `tbl_pelanggaran` (`id_pelanggaran`, `nama_pelanggar`, `nik`, `alamat`, `jenis_pelanggaran`, `lokasi`, `tanggal`, `sanksi`, `status`, `id_petugas`, `bukti`) VALUES
(1, 'Budi Santoso', '3201010101010001', 'Jl. Merdeka No. 10, Jakarta', 'Melanggar lampu merah', 'Jl. Sudirman', '2024-02-04', 'Denda Rp 250.000', 'Dalam Proses', '0', ''),
(2, 'Siti Aisyah', '3201010101010002', 'Jl. Melati No. 5, Bandung', 'Tidak membawa SIM', 'Jl. Asia Afrika', '2024-02-03', 'Teguran', 'Dalam Proses', '0', ''),
(3, 'Joko Widodo', '3201010101010003', 'Jl. Anggrek No. 12, Surabaya', 'Pelanggaran Peraturan Daerah', 'Jl. Basuki Rahmat', '2024-02-02', 'Denda Rp 500.000', 'Dalam Proses', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelapor`
--

CREATE TABLE `tbl_pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelapor`
--

INSERT INTO `tbl_pelapor` (`id_pelapor`, `nama_pelapor`, `no_identitas`, `no_hp`, `alamat`) VALUES
(1, 'Ahmad Surya', '123456789012', '081223344556', 'Jl. Mawar No. 4'),
(2, 'Rina Wijaya', '987654321098', '081332211445', 'Jl. Melati No. 7'),
(3, 'Andi', '9294242', '0821841', 'Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `jabatan`, `no_hp`, `alamat`) VALUES
(0, 'Briptu Norman', 'Wakapolsek', '08123456789', 'Jl. Kehidupan\r\n'),
(1, 'Nevie', 'Kanit Provos', '0812131', 'Banjarmasin'),
(3, 'Novia', 'Kanit Provos', '04284924242', 'Banjarmasin'),
(4, 'Rendi', 'Kanitreskrim', '08137173131', 'Tanjung '),
(7, 'Muhammad', 'Kapolsek', '081273973478', 'Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Novea Dahliani', 'admin', '$2y$12$c/Fsu8Zq0rQKdmWm83xzWeREwDRrPppmvG56qhkLpcl6mrzwf..Te', 'Admin'),
(2, 'Danang Kesuma', 'user', '$2y$12$lvF/n8t20geLr2oZxkfZ9.7.ubY2h/RuYAcid0zufB6INcIt/eRy2', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nik` char(20) DEFAULT NULL,
  `username` char(100) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` char(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `username`, `full_name`, `password`, `role`, `phone`, `email`, `address`, `last_login`, `is_active`) VALUES
(1, '6372120001', 'Nurmala Sari', 'Nurmala Sari', '$2y$10$DoHt.HZfk9Gz.HqI5CPcs.y8zilCuWerzViXMRUIOjw8y95aoulqK', 'pemilik', '081123058435', 'nurmalasri@gmail.com', 'jl. veteran', NULL, 1),
(2, '6372320003', 'marini islami', 'Marini Islami', 'ririn', 'kasir', '081273973478', 'marinirini@gmail.com', 'jl. kelayan A', NULL, 1),
(3, '6372420004', 'jmzahraa', 'Jamilatuzzahra', 'gleamara', 'kasir', '081248395709', 'jmzara@gmail.com', 'jl. kelayan B', NULL, 1),
(4, '6372520005', 'nanazkia', 'Nazwa Azkia', 'azkiayaya', 'kasir', '084850958467', 'azkianazwa@gmail.com', 'jl. Sungai Andai', NULL, 1),
(5, '6355757676', 'admin', 'Ahmadi', '$2y$10$fdqSsHWLFXbAiEe.mEqfCe2YpMCT1csthCKEw50wMpMuA30x/ppte', 'ADMIN', '049294282424', 'admin@gmail.com', NULL, '2025-06-11 04:22:09', 1),
(6, NULL, 'kasir', 'kasir', '$2y$10$Ni.SpfsO9MhAORQ3I/pxHOeE8vWM3nrs8mLo.AA0ITSpOU1GSQ2im', 'kasir', '082429232828', 'kasir@gmail.com', NULL, NULL, 1),
(7, '7748348384', 'kas', 'kas', '$2y$10$40dkEFaxaXeQoNHFCZThbev4QkKzZIdYY47q3lfdQzGywYUgiiub6', 'kasir', '842942842', 'kas@gmail.com', 'banjarmasiin', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `tbl_ditangkap`
--
ALTER TABLE `tbl_ditangkap`
  ADD PRIMARY KEY (`id_orang`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `tbl_pelapor`
--
ALTER TABLE `tbl_pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ditangkap`
--
ALTER TABLE `tbl_ditangkap`
  MODIFY `id_orang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelapor`
--
ALTER TABLE `tbl_pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD CONSTRAINT `tbl_bukti_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `tbl_laporan` (`id_laporan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
