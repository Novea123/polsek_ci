-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2025 at 06:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id_bukti` int NOT NULL,
  `id_laporan` int NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_barang_bukti` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `lokasi_penyimpanan` text NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id_bukti`, `id_laporan`, `deskripsi`, `jenis_barang_bukti`, `jumlah`, `tanggal_ditemukan`, `lokasi_penyimpanan`, `status_barang`, `bukti`) VALUES
(8, 14, 'Telah ditemukan sejumlah senjata api berjenis pistol', 'Senjata Api', 0, '2025-01-29', '', 'Diproses', 'e4b2ec0848ae6dd8dd1ed1150fb7dae2c1f8ec49.jpg'),
(19, 14, 'Telah ditemukan narkoba berjenis sabu-sabu seberat 5gr', 'Narkotika', 0, '2025-06-11', '', 'Disimpan', NULL),
(20, 14, 'Telah di temukan sejumlah senjata api\r\n', 'Senjata Api', 0, '2025-06-18', '', 'Diproses', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
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
-- Table structure for table `tbl_kinerja`
--

CREATE TABLE `tbl_kinerja` (
  `id_kinerja` int NOT NULL,
  `id_petugas` int NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `total_kasus` int NOT NULL,
  `kasus_selesai` varchar(255) NOT NULL,
  `rata_penangan` varchar(255) NOT NULL,
  `tersangka` varchar(255) NOT NULL,
  `nilai_kinerja` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kinerja`
--

INSERT INTO `tbl_kinerja` (`id_kinerja`, `id_petugas`, `nama_petugas`, `jabatan`, `total_kasus`, `kasus_selesai`, `rata_penangan`, `tersangka`, `nilai_kinerja`) VALUES
(1, 0, 'Briptu Norman', 'Wakapolsek', 3, '4', '12 hari', 'Solihin', 80),
(2, 4, 'Rendi', 'Kanitreskrim', 1, '2', '7 hari', 'Andi', 75),
(3, 3, 'Novia', 'Kanit Provos', 1, '9', '14 hari', 'Khoirul', 90),
(4, 0, 'Briptu Norman', 'Wakapolsek', 4, '2', '5 hari', 'Andi', 65),
(5, 4, 'Rendi', 'Kanitreskrim', 5, '2', '7 hari', 'Alex', 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int NOT NULL,
  `id_pelapor` int NOT NULL,
  `id_petugas` int NOT NULL,
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
(14, 1, 0, 'Pemerasan', 'Jl. Ahmad Yani, Km. 7', '2025-01-29', '13:30:00', 'Tidak tau', 'Selesai', '965c526177f912e1e686a0892b56a6f8aa01eeae.jpeg'),
(15, 3, 0, 'Pembunuhan', 'Jl. Trans Kalimantan', '2025-06-03', '11:40:00', 'Telah terjadi pembunuhan atas motif sakit hati', 'Sedang Proses', ''),
(16, 2, 0, 'Penipuan', 'Jl. Pramuka', '2025-06-19', '12:54:00', 'Telah terjadi penipuan lewat sosmed', 'Sedang Proses', ''),
(17, 5, 0, 'Kekerasan', 'Jl.Handil Bakti', '2025-06-21', '08:54:00', 'Telah terjadi kekerasan yang menimpa solihin', 'Sedang Proses', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitoring`
--

CREATE TABLE `tbl_monitoring` (
  `id_kasus` int NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `jenis_kejahatan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('Dalam Proses','Proses','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_monitoring`
--

INSERT INTO `tbl_monitoring` (`id_kasus`, `nama_pelapor`, `nama_petugas`, `tanggal_lapor`, `jenis_kejahatan`, `lokasi`, `status`) VALUES
(1, 'amin', 'Novia', '2025-06-02', 'Pembegalan', 'Jl.Pramuka', 'Dalam Proses'),
(2, 'Andi Wijaya', 'Saputra', '2025-06-19', 'Penipuan', 'Jl.Trans Kalimantan\r\n', 'Dalam Proses'),
(3, 'Hariadi', 'Andi Wijaya', '2025-06-20', 'Penipuan', 'Jl. Handil Bakti', 'Proses'),
(4, 'Sandi', 'Novia', '2025-06-13', 'Pencurian', 'Jl. Cemara Raya', 'Dalam Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggaran`
--

CREATE TABLE `tbl_pelanggaran` (
  `id_pelanggaran` int NOT NULL,
  `nama_pelanggar` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_pelanggaran` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sanksi` varchar(100) NOT NULL,
  `status` enum('Belum Diproses','Dalam Proses','Selesai') NOT NULL DEFAULT 'Belum Diproses',
  `id_petugas` varchar(100) NOT NULL,
  `bukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggaran`
--

INSERT INTO `tbl_pelanggaran` (`id_pelanggaran`, `nama_pelanggar`, `nik`, `alamat`, `jenis_pelanggaran`, `lokasi`, `tanggal`, `sanksi`, `status`, `id_petugas`, `bukti`) VALUES
(1, 'Budi Santoso', '3201010101010001', 'Jl. Merdeka No. 10, Jakarta', 'Pelanggaran Lalu Lintas', 'Jl. Sudirman', '2024-02-04', 'Denda Rp 250.000', 'Dalam Proses', '0', ''),
(2, 'Siti Aisyah', '3201010101010002', 'Jl. Melati No. 5, Bandung', 'Tidak membawa SIM', 'Jl. Asia Afrika', '2024-02-03', 'Teguran', 'Dalam Proses', '0', ''),
(3, 'Joko Widodo', '3201010101010003', 'Jl. Anggrek No. 12, Surabaya', 'Pelanggaran Lalu Lintas', 'Jl. Basuki Rahmat', '2024-02-02', 'Denda Rp 500.000', 'Selesai', '0', ''),
(4, 'amin', '6213041208000001', 'Jl. Sudirman no 14', 'Pelanggaran Lalu Lintas', 'Jl Adhyaksa', '2025-06-18', 'Perinagatan', 'Belum Diproses', '2', ''),
(5, 'Agus', '6213041208000001', 'Jl. Agatis', 'Pelanggaran Umum', 'Jl Melayu ', '2025-06-18', 'Denda Rp 250.000', 'Dalam Proses', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelapor`
--

CREATE TABLE `tbl_pelapor` (
  `id_pelapor` int NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelapor`
--

INSERT INTO `tbl_pelapor` (`id_pelapor`, `nama_pelapor`, `no_identitas`, `no_hp`, `alamat`, `id_user`) VALUES
(1, 'Ahmad Surya', '123456789012', '081223344556', 'Jl. Mawar No. 4', 8),
(2, 'Rina Wijaya', '987654321098', '081332211445', 'Jl. Melati No. 7', 9),
(3, 'Andi Wijaya', '9294242213131231', '0821841', 'Banjarmasin', 10),
(5, 'amin', '7324158904672', '081123058435', 'Jl.Melayu Darat', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `jabatan`, `no_hp`, `alamat`, `id_user`) VALUES
(0, 'Briptu Norman', 'Wakapolsek', '08123456789', 'Jl. Kehidupan\r\n', 1),
(1, 'Nevie', 'Kanit Provos', '0812131555666', 'Banjarmasin', 2),
(3, 'Novia', 'Kanitintelkam', '042849242423', 'Banjarbaru', 3),
(4, 'Rendi', 'Kanitreskrim', '08137173131', 'Tanjung ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekapitulasi`
--

CREATE TABLE `tbl_rekapitulasi` (
  `id_penyelesaian` int NOT NULL,
  `id_kasus` int NOT NULL,
  `jenis_kejahatan` varchar(255) NOT NULL,
  `jumlah_kasus` int NOT NULL,
  `proses_hukum` int NOT NULL,
  `mediasi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rekapitulasi`
--

INSERT INTO `tbl_rekapitulasi` (`id_penyelesaian`, `id_kasus`, `jenis_kejahatan`, `jumlah_kasus`, `proses_hukum`, `mediasi`) VALUES
(1, 14, 'Pembegalan', 5, 4, 6),
(2, 1, 'Pembegalan', 1, 1, 3),
(3, 2, 'Pembegalan', 2, 4, 3),
(4, 3, 'Penipuan', 6, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahanan`
--

CREATE TABLE `tbl_tahanan` (
  `id_orang` int NOT NULL,
  `id_laporan` int NOT NULL,
  `nama_orang` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_hukum` varchar(50) NOT NULL,
  `jenis_kejahatan` varchar(50) NOT NULL,
  `tanggal_ditangkap` date NOT NULL,
  `durasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahanan`
--

INSERT INTO `tbl_tahanan` (`id_orang`, `id_laporan`, `nama_orang`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `pekerjaan`, `status_hukum`, `jenis_kejahatan`, `tanggal_ditangkap`, `durasi`) VALUES
(9, 1, 'Dono', 'Pria', '2025-06-25', 'Jl. Trans Kalimantan', 'Petani', 'Tersangka', 'Cyberbullying', '2025-01-01', '2 bulan'),
(10, 14, 'Aminah', 'Wanita', '2025-06-18', 'sdadsadasdsadasd', 'Buruh', 'Proses', 'Pembegalan', '2025-06-18', '2 bulan'),
(11, 2, 'Agus', 'Pria', '2025-06-04', 'Jl. Handil Bakti', 'Kuli Bangunan', 'Dalam Proses', 'Kekerasan', '2025-06-25', '3 bulan'),
(12, 2, 'Sandi', 'Pria', '2025-06-25', 'Jl. Sungai Jingah', 'Buruh Lepas', 'Dalam Proses', 'Pembegalan', '2025-06-25', '2 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tindaklanjutkasus`
--

CREATE TABLE `tbl_tindaklanjutkasus` (
  `id_tindak_lanjut` int NOT NULL,
  `id_laporan` int NOT NULL,
  `tanggal_tindak_kasus` date NOT NULL,
  `jenis_tindakan` varchar(255) NOT NULL,
  `id_petugas` int NOT NULL,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_tindaklanjutkasus`
--

INSERT INTO `tbl_tindaklanjutkasus` (`id_tindak_lanjut`, `id_laporan`, `tanggal_tindak_kasus`, `jenis_tindakan`, `id_petugas`, `status`) VALUES
(1, 14, '2025-06-24', 'Penangkapan', 1, 'Dalam Proses'),
(2, 14, '2025-06-24', 'Penangkapan', 3, 'Belum Ditindaklanjuti'),
(3, 16, '2025-06-25', 'Penyidikan', 4, 'Dalam Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('pelapor','petugas','admin','kapolsek') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'briptunorman', 'e9335e177b288c7af4af8f1225c3f938', 'kapolsek', '2025-06-25 17:28:27'),
(2, 'nevie', 'e9335e177b288c7af4af8f1225c3f938', 'petugas', '2025-06-25 17:28:27'),
(3, 'novia', 'e9335e177b288c7af4af8f1225c3f938', 'admin', '2025-06-25 17:28:27'),
(4, 'rendi', 'e9335e177b288c7af4af8f1225c3f938', 'petugas', '2025-06-25 17:28:27'),
(8, '123456789012', 'e9335e177b288c7af4af8f1225c3f938', 'pelapor', '2025-06-25 17:51:55'),
(9, '987654321098', 'e9335e177b288c7af4af8f1225c3f938', 'pelapor', '2025-06-25 17:51:55'),
(10, '9294242213131231', 'e9335e177b288c7af4af8f1225c3f938', 'pelapor', '2025-06-25 17:51:55'),
(11, '7324158904672', 'e9335e177b288c7af4af8f1225c3f938', 'pelapor', '2025-06-25 17:51:55');

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
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kinerja`
--
ALTER TABLE `tbl_kinerja`
  ADD PRIMARY KEY (`id_kinerja`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `tbl_pelapor`
--
ALTER TABLE `tbl_pelapor`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD KEY `fk_pelapor_user` (`id_user`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `fk_petugas_user` (`id_user`);

--
-- Indexes for table `tbl_rekapitulasi`
--
ALTER TABLE `tbl_rekapitulasi`
  ADD PRIMARY KEY (`id_penyelesaian`);

--
-- Indexes for table `tbl_tahanan`
--
ALTER TABLE `tbl_tahanan`
  ADD PRIMARY KEY (`id_orang`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `tbl_tindaklanjutkasus`
--
ALTER TABLE `tbl_tindaklanjutkasus`
  ADD PRIMARY KEY (`id_tindak_lanjut`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id_bukti` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kinerja`
--
ALTER TABLE `tbl_kinerja`
  MODIFY `id_kinerja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  MODIFY `id_kasus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  MODIFY `id_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pelapor`
--
ALTER TABLE `tbl_pelapor`
  MODIFY `id_pelapor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rekapitulasi`
--
ALTER TABLE `tbl_rekapitulasi`
  MODIFY `id_penyelesaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tahanan`
--
ALTER TABLE `tbl_tahanan`
  MODIFY `id_orang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_tindaklanjutkasus`
--
ALTER TABLE `tbl_tindaklanjutkasus`
  MODIFY `id_tindak_lanjut` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD CONSTRAINT `tbl_bukti_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `tbl_laporan` (`id_laporan`);

--
-- Constraints for table `tbl_pelapor`
--
ALTER TABLE `tbl_pelapor`
  ADD CONSTRAINT `fk_pelapor_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD CONSTRAINT `fk_petugas_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
