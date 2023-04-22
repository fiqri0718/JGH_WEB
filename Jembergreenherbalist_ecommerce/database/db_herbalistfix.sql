-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 01:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_herbalistfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `info_kontak` varchar(50) NOT NULL,
  `foto_admin` varchar(50) NOT NULL,
  `tgl_buat` date NOT NULL,
  `id_level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `username`, `password`, `nama_depan`, `nama_belakang`, `alamat`, `info_kontak`, `foto_admin`, `tgl_buat`, `id_level`) VALUES
(5, 'superadmin@gmail.com', 'super', 'admin12', 'Superadmin', 'Superadmin', 'jember', '0829567890', '530688.jpg', '2021-11-13', 3),
(7, 'fiqri12@gmail.com', 'fiqri', 'admin12345', 'fiqri', 'admin', 'Tuban', '09888888', 'image916.png', '2021-11-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(8) NOT NULL,
  `an_bank` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `an_bank`, `nama_bank`, `no_rek`) VALUES
(2, 'fiqri', 'BRI', '6252626262');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`, `tgl_input`) VALUES
(12, 'Produk Herbal Primer', '2020-11-08'),
(13, 'Produk Herbal Sekunder', '2020-11-08'),
(14, 'Kopi', '2021-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(3) NOT NULL,
  `level` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'pelanggan'),
(3, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`, `tgl_input`) VALUES
(10, 'Tuban', 24000, '2021-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tgl_pembayaran`, `bukti_pembayaran`) VALUES
(17, 99, 'maulana', 'titil', 74000, '2021-11-26', '20211126133951Bank BNI Logo (PNG-720p) - FileVecto'),
(18, 100, 'fiqri', 'bri', 124000, '2021-11-28', '20211128003944p.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(30) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(99, 38, 10, '2021-11-26', 74000, 'Tuban', 24000, 'tuban', 'SELESAI', '53353353'),
(100, 38, 10, '2021-11-28', 124000, 'Tuban', 24000, 'tuban', 'Barang Dikirim', 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_produk`
--

CREATE TABLE `tb_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subtot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subtot`) VALUES
(139, 99, 42, 2, 'Ekstrak Jahe Daun Sirsat', 25000, 0, 0, 50000),
(140, 100, 40, 2, 'Ekstrak Jahe Kelor', 25000, 0, 0, 50000),
(141, 100, 41, 1, 'Ekstrak Jahe Bidara', 25000, 0, 0, 25000),
(142, 100, 42, 1, 'Ekstrak Jahe Daun Sirsat', 25000, 0, 0, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `beratisi_produk` varchar(20) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(250) NOT NULL,
  `info_produk` text NOT NULL,
  `nutrisi_manfaat` text NOT NULL,
  `cara_penyimpanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `kategori`, `stok`, `beratisi_produk`, `harga_produk`, `foto_produk`, `info_produk`, `nutrisi_manfaat`, `cara_penyimpanan`) VALUES
(40, 'Ekstrak Jahe Kelor', '12', 23, '0.2', 25000, '20211117012433image1044.png', 'Tidak banyak yang tahu daun kelor ini bisa menjadi alternatif pengobatan herbal yang paling bagus untuk semua usia. Dan bisa dipastikan efek samping yang diberikannya juga selalu POSITIF. Walau ukuran daun nya kecil, daun kelor memiliki banyak manfaat penting bagi kesehatan tubuh. Bahkan, para ilmuan menyebutnya sebagai POHON AJAIB (Miracle Tree) Peneltian daun kelor dilakukan sejak 1980. ', '• Protein\r\n• Zat besi\r\n• Kalsium\r\n• Magnesium\r\n• Riboflavin (B2)\r\n• Vitamin A dan C\r\n• Efek laktagogum\r\n• Potasium dan kalium\r\n• Flavonoid dan fitosterol\r\n• DLL.\r\n\r\n', '• Sebagai anti bakteri dan anti racun\r\n• Anti diabetes\r\n• Sebagai anti kanker\r\n• Sebagai sumber zat besi\r\n• Untuk mengatasi alergi\r\n• Sebagai penyedia energi\r\n• Sebagai penyedia nutrisi\r\n• Untuk mengobati cacingan\r\n• Sebagai sumber anti oksidan\r\n• Meningkatkan Fungsi Ekskresi\r\n• Sebagai sumber energi alami\r\n• Dapat mengatasi penyakit kuning\r\n• Untuk meningkatkan produksi ASI\r\n• Sebagai suplemen makanan alami\r\n• Sebagai sumber asam amino esensial\r\n• Memperbaiki sistem metabolisme tubuh\r\n• Untuk membantu mengobati penyakit jantung\r\n• Sebagai sumber flavonoid dan anti oksidan\r\n• Untuk mengatasi rematik, pegal linu dan nyeri\r\n• Menurunkan tekanan darah dan kolesterol tinggi\r\n• Menstabilkan mood dan melindungi kesehatan otak\r\n• Daun kelor mampu mencukupi gizi pada ibu menyusui dan anak\r\n• Mampu mengatasi PMS, nyeri saat datang bulan dan nyeri pinggul\r\n• Mengatasi masalah pencernaan, maag, asam lambung dan ginjal\r\n• Menyehatkan kulit, baik untuk kecantikan dan menghilangkan flek hitam\r\n• Mengatasi keluhan arthritis, pegal linu, rematik, asam urat dan masih banyak manfaat lainnya'),
(41, 'Ekstrak Jahe Bidara', '12', 24, '0.2', 25000, '20211117014602image1056.png', '-', '-', '-'),
(42, 'Ekstrak Jahe Daun Sirsat', '12', 22, '0.2', 25000, '20211117015741image1068.png', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `info_kontak` varchar(25) NOT NULL,
  `foto_user` varchar(25) NOT NULL,
  `tgl_buat` date NOT NULL,
  `id_level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `password`, `nama_depan`, `nama_belakang`, `alamat`, `info_kontak`, `foto_user`, `tgl_buat`, `id_level`) VALUES
(38, 'talisa121@gmail.com', 'fawaid', 'Fawaid2002', 'maulana', 'fiqri', '', '', '', '2021-11-26', 2),
(39, 'vivi@gmail.com', 'vivi', 'Vivi12345', 'maulana', 'Fawaid', '', '', '', '2021-11-26', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
