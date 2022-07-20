-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 15.18
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmeans_pelanggan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cluster`
--

CREATE TABLE `data_cluster` (
  `id_cluster` int(11) NOT NULL,
  `k1` int(11) NOT NULL,
  `k2` int(11) NOT NULL,
  `k3` int(11) NOT NULL,
  `k4` int(11) NOT NULL,
  `k5` int(11) NOT NULL,
  `nama_cluster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_cluster`
--

INSERT INTO `data_cluster` (`id_cluster`, `k1`, `k2`, `k3`, `k4`, `k5`, `nama_cluster`) VALUES
(1, 3, 2, 2, 2, 3, 'Berpotensi Menjadi Pelanggan yang Berminat dengan Produk yang DItawarkan'),
(2, 1, 3, 4, 4, 3, 'Tidak Berpotensi Menjadi Pelanggan yang Berminat dengan Produk yang DItawarkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'Aktif Bertanya'),
(2, 'Membandingkan Produk'),
(3, 'Paham Produk'),
(4, 'Pertimbangan'),
(5, 'Menawar Harga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `k1` int(11) NOT NULL,
  `k2` int(11) NOT NULL,
  `k3` int(11) NOT NULL,
  `k4` int(11) NOT NULL,
  `k5` int(11) NOT NULL,
  `Cluster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `id_pelanggan`, `k1`, `k2`, `k3`, `k4`, `k5`, `Cluster`) VALUES
(1, 1, 5, 5, 5, 5, 5, 'Cluster-2'),
(2, 2, 3, 4, 4, 4, 3, 'Cluster-2'),
(3, 3, 3, 2, 2, 2, 3, 'Cluster-1'),
(4, 4, 1, 3, 4, 4, 3, 'Cluster-1'),
(5, 5, 4, 5, 5, 5, 5, 'Cluster-2'),
(6, 6, 3, 3, 4, 4, 4, 'Cluster-2'),
(7, 7, 3, 3, 5, 5, 3, 'Cluster-2'),
(8, 8, 5, 5, 5, 5, 5, 'Cluster-2'),
(9, 9, 5, 5, 5, 5, 3, 'Cluster-2'),
(10, 10, 4, 4, 5, 4, 3, 'Cluster-2'),
(11, 11, 3, 5, 5, 5, 5, 'Cluster-2'),
(12, 12, 3, 4, 5, 4, 3, 'Cluster-2'),
(13, 13, 3, 2, 4, 4, 3, 'Cluster-1'),
(14, 14, 5, 5, 5, 4, 4, 'Cluster-2'),
(15, 15, 5, 5, 4, 5, 3, 'Cluster-2'),
(16, 16, 3, 4, 5, 5, 4, 'Cluster-2'),
(17, 17, 3, 4, 5, 5, 4, 'Cluster-2'),
(18, 18, 3, 3, 5, 5, 2, 'Cluster-2'),
(19, 19, 3, 4, 5, 4, 5, 'Cluster-2'),
(20, 20, 1, 4, 2, 1, 1, 'Cluster-1'),
(21, 21, 4, 5, 5, 5, 4, 'Cluster-2'),
(22, 22, 4, 4, 4, 3, 4, 'Cluster-2'),
(23, 23, 4, 4, 5, 4, 3, 'Cluster-2'),
(24, 24, 1, 5, 4, 5, 3, 'Cluster-1'),
(25, 25, 5, 5, 5, 5, 5, 'Cluster-2'),
(26, 26, 3, 5, 5, 5, 2, 'Cluster-2'),
(27, 27, 4, 5, 5, 5, 3, 'Cluster-2'),
(28, 28, 5, 1, 5, 5, 4, 'Cluster-2'),
(29, 29, 3, 4, 4, 4, 3, 'Cluster-2'),
(30, 30, 3, 4, 3, 3, 5, 'Cluster-1'),
(31, 31, 2, 4, 5, 5, 2, 'Cluster-2'),
(32, 32, 3, 4, 4, 5, 2, 'Cluster-2'),
(33, 33, 3, 5, 5, 5, 1, 'Cluster-2'),
(34, 34, 1, 1, 4, 3, 4, 'Cluster-1'),
(35, 35, 1, 4, 3, 5, 3, 'Cluster-1'),
(36, 36, 4, 3, 3, 4, 4, 'Cluster-2'),
(37, 37, 3, 4, 5, 5, 5, 'Cluster-2'),
(38, 38, 5, 2, 5, 5, 5, 'Cluster-2'),
(39, 39, 1, 3, 2, 2, 2, 'Cluster-1'),
(40, 40, 5, 5, 5, 5, 3, 'Cluster-2'),
(41, 41, 3, 3, 4, 5, 4, 'Cluster-2'),
(42, 42, 3, 3, 4, 4, 5, 'Cluster-2'),
(43, 43, 2, 3, 4, 5, 2, 'Cluster-1'),
(44, 44, 5, 5, 5, 5, 5, 'Cluster-2'),
(45, 45, 5, 3, 5, 5, 5, 'Cluster-2'),
(46, 46, 3, 3, 3, 3, 3, 'Cluster-1'),
(47, 47, 3, 1, 5, 5, 2, 'Cluster-1'),
(48, 48, 3, 3, 5, 5, 5, 'Cluster-2'),
(49, 49, 5, 5, 5, 5, 5, 'Cluster-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usia` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `usia`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_lengkap`, `no_hp`) VALUES
(1, 'Faras Shalsya Azhara', '1', '1', 20, 'Bekasi', '06/09/2000', 'Wanita', 'Jl.Melur 2 No.169 RT.005/010', '081290600251'),
(2, 'Siti Nurlaela', '2', '2', 22, 'Bekasi', '20/12/1998', 'Wanita', 'Kp loji desa cibarusah kota kabupaten bekasi', '08984128238'),
(3, 'Poppy widyawati S', '3', '3', 28, 'Tangerang', '17/01/1992', 'Wanita', 'Perum.Villa Permata Cikarang', '0895321370388'),
(4, 'Devi', '4', '4', 29, 'Bekasi', '09/06/2021', 'Wanita', 'Kp gebang kota serang baru', '083874418965'),
(5, 'Eka Her', '5', '5', 36, 'Purwakarta', '26/06/1984', 'Wanita', 'Perum.MBJ Cibarusah Bekasi', '087742612629'),
(6, 'Rina krisnawati', '6', '6', 30, 'Ciamis ', '05/11/1990', 'Wanita', 'Perum cikarang lake view blok g1/7', '08985359453'),
(7, 'Nike widayanti', '7', '7', 37, 'surabaya', '08/10/2021', 'Wanita', 'Puri persada indah blok ca no.2', '08561320228'),
(8, 'Fajar Setiyawan', '8', '8', 40, 'Jakarta', '17/12/1980', 'Pria', 'Jl. Pangkalan Jati 1 A rt : 004 / 011 no.38, Kel. Cipinang Melayu, Kec. Makasar, jaktim', '0817108670'),
(9, 'Ferina', '9', '9', 36, 'Jakarta', '18/08/1984', 'Wanita', 'Kp. Pasar rebo gg. Lestari no. 31 rt. 002 rw. 02 Bojongsari Depok ', '085770526393'),
(10, 'aipnu ertanto', '10', '10', 39, 'jakarta', '06/09/1981', 'Pria', 'jl harapan jaya 1 rt 8 rw 11 cipinang melayu', '081291882186'),
(11, 'YULI ISMI', '11', '11', 50, 'TANGERANG ', '16/07/1974', 'Wanita', 'Buaran Mekar sari Rt 02 Rw 07 NO 54 Tangerang', '08161692394'),
(12, 'Qanita Alifia Deynanda', '12', '12', 15, 'Depok', '19/08/2005', 'Wanita', 'Jl. Melati RT 6 RW 7 No.39 Tugu, Cimanggis, Depok', '082249088381'),
(13, 'Ananda Sustantiara', '13', '13', 20, 'Bekasi', '03/10/2000', 'Wanita', 'Perumahan kebon kelapa permai blok A3/01', '081229461403'),
(14, 'Purwanto', '14', '14', 43, 'Surakarta', '20/11/1978', 'Pria', 'Perumahan kebon kelapa permai blok B2/4 RT 004/001 cibarusah kota, cibarusah kab bekasi', '081281490173'),
(15, 'Ria', '15', '15', 28, 'Blora', '17/05/1993', 'Wanita', 'Puri persada indah', '083896259003'),
(16, 'Fauzia Rahma Dhanty', '16', '16', 22, 'Bekasi', '28/07/1998', 'Wanita', 'Jl. Melur 2 no.164 RT.005 RW.010, Jakasampurna, Bekasi Barat, Kota Bekasi 17145', '0895334165689'),
(17, 'Hamdan abada', '17', '17', 20, 'Bekasi', '26/04/2001', 'Pria', 'Perumahan kebon kelapa permai blok B1 no 05 Cibarusah kota', '085872308066'),
(18, 'Indah wilis', '18', '18', 45, 'Jakarta', '22/10/1976', 'Wanita', 'Komp rivera hill b6 no 1', '087882822810'),
(19, 'Rahma Puspita Oktaviani', '19', '19', 19, 'Depok', '09/10/2001', 'Wanita', 'Perum kebon kelapa permai blok B2 no.1', '089527078148'),
(20, 'Fatmi yunita', '20', '20', 37, 'Kediri', '28/06/2021', 'Wanita', 'Fatmi yunita', '081286282608'),
(21, 'Putri maulida', '21', '21', 21, 'Jakarta', '25/06/1999', 'Wanita', 'Jl timbul ujung no 18 rt2/rw5 jakarta barat', '0895325405636'),
(22, 'JAETUN.S.Pd.I', '22', '22', 40, 'Cirebon ', '31/01/1981', 'Wanita', 'Perum,kota Serang Baru blok c, 72 no, 38 Rt,20 Rw, 18 Kelrh Sukaragam Kec, Serang Baru kab, Bekasi', '081319318760'),
(23, 'Hari Supatmoko', '23', '23', 50, 'Jakarta', '10/02/1971', 'Pria', 'Pangkalan Jati Rt 004 Rw 011 Cipinang Melayu Makasar Jakarta Timur ', '081283142318'),
(24, 'An-nisa khaerunisa', '24', '24', 21, 'Cianjur', '21/06/1999', 'Wanita', 'Jln Plta Cijedil Kec. Cugenang Kab Cianjur ', '085794561998'),
(25, 'Tri sutanto', '25', '25', 26, 'Jakarta', '28/03/1995', 'Pria', 'Perum kebon kelapa permai blok A1 No05', '081314673157'),
(26, 'HERLIYANA', '26', '26', 36, 'BEKASI', '11/11/1984', 'Wanita', 'KP.RAWA PASUNG RT009 RW 003', '085710970329'),
(27, 'Eky Styawan', '27', '27', 39, 'Pacitan', '30/03/1982', 'Pria', 'Jl. Margonda Raya no.525', '089636207640'),
(28, 'Nafsiyah Fauziyah', '28', '28', 31, 'Bekasi', '03/01/2021', 'Wanita', 'KP. Langkah lancar desa sukaragam kec. Serang baru bekasi', '089531197312'),
(29, 'Muhammad Romdhon', '29', '29', 19, 'Bekasi', '11/11/2001', 'Pria', 'Kp. Kaliulu RT 06 RW 02 Ds Tanjungsari Kec Cikarang Utara Kab Bekasi', '085779545469'),
(30, 'Dini nur fauziah', '30', '30', 22, 'Serang', '21/05/1999', 'Wanita', 'Perum telaga pasiraya ', '0895372222912'),
(31, 'Ari Fuji Astuti', '31', '31', 23, 'Jakarta', '20/04/1998', 'Wanita', 'Perum Telaga Pasiraya Blok A10 No.11 RT.003, RW.013 Desa Sukasari Kec.Serang Baru Kab.Bekasi 17330', '0895372222683'),
(32, 'April', '32', '32', 20, 'Pemalang', '03/03/2001', 'Wanita', 'Perumahan Telaga Sakinah', '081211055094'),
(33, 'Selvia Ratih Dewi', '33', '33', 23, 'Jakarta', '08/09/1998', 'Wanita', 'Perumahan pasir raya', '-'),
(34, 'Innaufa septiani', '34', '34', 23, 'Bekasi', '29/07/1998', 'Wanita', 'Kp kandang RT07/RW04', '089661067366'),
(35, 'Ilham Syahrian', '35', '35', 22, 'Purwakarta', '09/12/1999', 'Pria', 'Purwakarta', '087829509070'),
(36, 'Yoga pangestu', '36', '36', 24, 'Jakarta', '28/07/1997', 'Pria', 'Bekasi', '0895366781275'),
(37, 'N Rifkha Fadhilah', '37', '37', 21, 'Purworejo', '26/11/1999', 'Wanita', 'Vila Gading Harapan blok C6/57 kelurahan bahagia kecamatan babelan', '082112356921'),
(38, 'Risa Nur Anisa', '38', '38', 25, 'Tasikmalaya', '03/06/1996', 'Wanita', 'kp.penjalin rt 01/01 pasir sari ', '0822675432980'),
(39, 'Muhamad aditya saputra', '39', '39', 22, 'Cianjur', '01/06/1999', 'Pria', 'Kp.babakan puncak', '082118501116'),
(40, 'Maryatul Giftiyan', '40', '40', 19, 'Bekasi', '22/08/2002', 'Wanita', 'Perum sukaraya indah blok E Rt 04 Rw 07', '088296648695'),
(41, 'Dhea Silvia Zilky', '41', '41', 20, 'Jakarta.', '29/09/2001', 'Wanita', 'JL.Dewi Sartika Gg Salak Rt06/Rw07 No.07 Kel.Margahayu Kec Bekasi Timur,17113', '085773242489'),
(42, 'Ega Nusaibah', '42', '42', 21, 'BEKASI', '07/07/2000', 'Wanita', 'Vila gading harapan blok C5/11', '085779997408'),
(43, 'Aisyah Az-zahra Salsabiela', '43', '43', 20, 'Bekasi', '20/06/2001', 'Wanita', 'Jl sultan agung GG h sarun ', '085591495987'),
(44, 'Nurlaelah putri', '44', '44', 21, 'Bekasi', '29/11/2000', 'Wanita', 'Kp.cibogo tegal RT/01 RW.002', '087876027066'),
(45, 'Amor louis', '45', '45', 20, 'jakarta', '06/11/2000', 'Wanita', 'perumahan cibarusah indah blok E1a no 2', '89514687204'),
(46, 'muhamad afrizal', '46', '46', 20, 'ngawi', '01/05/2001', 'Pria', 'perumahan kebon kelapa permai', '085695932502'),
(47, 'HUSNI MUBAROK', '47', '47', 19, 'bekasi', '29/05/2021', 'Pria', 'cikarang pusat,bekasi', '081322463116'),
(48, 'Dzulfiqar Hadid Abqary ', '48', '48', 18, 'Bekasi ', '30/01/2003', 'Pria', 'Perumahan kebon kelapa permai Blok B1 no 5 ', '81388401643'),
(49, 'Amalia NC', '49', '49', 21, 'Jakarta', '11/06/2000', 'Wanita', 'Cimanggis,depok', '087811784305');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_cluster`
--
ALTER TABLE `data_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_cluster`
--
ALTER TABLE `data_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
