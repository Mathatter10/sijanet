-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Agu 2019 pada 02.57
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sijanet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bchanggar`
--

CREATE TABLE `bchanggar` (
  `id_hanggar` int(11) NOT NULL,
  `id_bc` int(11) NOT NULL,
  `id_tpb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bchanggar`
--

INSERT INTO `bchanggar` (`id_hanggar`, `id_bc`, `id_tpb`) VALUES
(1, 47, 0),
(2, 52, 0),
(3, 41, 0),
(4, 34, 0),
(5, 42, 0),
(6, 36, 0),
(7, 38, 0),
(8, 55, 0),
(9, 46, 0),
(10, 48, 0),
(11, 58, 0),
(12, 57, 0),
(13, 51, 0),
(14, 0, 0),
(15, 33, 0),
(16, 37, 0),
(17, 50, 0),
(18, 0, 0),
(19, 35, 0),
(20, 0, 0),
(21, 45, 0),
(22, 44, 0),
(23, 43, 0),
(24, 54, 0),
(25, 53, 0),
(26, 56, 0),
(27, 0, 0),
(28, 49, 0),
(29, 0, 0),
(30, 40, 0),
(31, 39, 0),
(32, 0, 0),
(33, 0, 0),
(34, 0, 0),
(35, 0, 0),
(36, 0, 0),
(37, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bckasi`
--

CREATE TABLE `bckasi` (
  `id_kasi` int(11) NOT NULL,
  `id_bc` int(11) NOT NULL,
  `pkc` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bckasi`
--

INSERT INTO `bckasi` (`id_kasi`, `id_bc`, `pkc`, `keterangan`) VALUES
(1, 6, 1, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai I'),
(2, 13, 2, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai II'),
(3, 11, 3, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai III'),
(4, 7, 4, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai IV'),
(5, 5, 5, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai V'),
(6, 12, 6, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai VI'),
(7, 14, 7, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai VII'),
(8, 9, 8, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai VIII'),
(9, 8, 9, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai IX'),
(10, 10, 10, 'Kepala Seksi Pelayanan Kepabeanan dan Cukai X');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bcuser`
--

CREATE TABLE `bcuser` (
  `id_bc` int(11) NOT NULL,
  `nama_bc` text NOT NULL,
  `nip` varchar(18) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `unit` int(11) NOT NULL COMMENT '1. PKC, 2. Perben, 3.Superuser',
  `level` int(11) NOT NULL COMMENT '1. Kasi, 2. Kasubsi, 3. Pelaksana'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bcuser`
--

INSERT INTO `bcuser` (`id_bc`, `nama_bc`, `nip`, `username`, `password`, `unit`, `level`) VALUES
(3, 'Faishal Ibrahim D. P.', '199510082015021003', 'faishal.ibrahim', '123456', 1, 3),
(4, 'Harmiyarsyah, S.H., M.M.', '197304031998031001', 'harmiarsyah', '123456', 2, 1),
(5, 'Akhmad Taufiq,S.E.,M.Si', '197102111992011004', 'akhmad.taufiq', '123456', 1, 1),
(6, 'Yudi Supriyadi, S.Sos.', '196511171985031001', 'yudi.supriyadi', '123456', 1, 1),
(7, 'Arry Hafidz Daryaman', '197101071990121001', 'arry.hafidz', '123456', 1, 1),
(8, 'Taufik Ismail, S.E.', '197102201992011002', 'taufik.ismail', '123456', 1, 1),
(9, 'Agus Ahmadhusein', '197208181992011001', 'agus.ahmadhusein', '123456', 1, 1),
(10, 'Alfajri', '196908181992011001', 'alfajri', '123456', 1, 1),
(11, 'Toto Boedhi Artono', '197205041992011001', 'toto.boedhi', '123456', 1, 1),
(12, 'Dony Kusmeidya', '197205051992121001', 'dony.kusmeidya', '123456', 1, 1),
(13, 'Yomi Burhanudin', '197901142000121001', 'yomi.burhanudin', '123456', 1, 1),
(14, 'Agus Dakhlan', '197202181992121001', 'agus.dakhlan', '123456', 1, 1),
(19, 'Indra Bayu Lesmana, S.E.', '198303122003121001', 'indra.bayu', '123456', 2, 2),
(20, 'Arfan Rosandy', '197811182003121003', 'arfan.rosandy', '123456', 2, 2),
(21, 'Dedy Suheimy', '197504201996031001', 'dedy.suheimy', '123456', 2, 2),
(22, 'Wawat', '196702281987032001', 'wawat', '123456', 2, 2),
(23, 'Ridho Moch. Zain', '199509182015021003', 'moch.zain', '123456', 1, 3),
(24, 'Alvi Viditama', '199503242015021004', 'alvi.viditama', '123456', 1, 3),
(25, 'Nurkholis Sidik', '199001062010121004', 'nurkholis.sidik', '123456', 2, 3),
(26, 'Ahmad Ghofur Zauharudin', '199804112018011001', 'akhmad.ghofur', '123456', 1, 3),
(27, 'Andi Annisa Tenri Leleang', '200001182018122001', 'andi.annisa', '123456', 1, 3),
(28, 'Alwan Fakhrudin', '199803312018011003', 'alwan.fakhrudin', '123456', 2, 3),
(29, 'Yoga Kurniawan', '199805182018011002', 'yoga.kurniawan', '123456', 2, 3),
(30, 'Novianto Surya Kusuma', '199711152018121001', 'novianto.surya', '123456', 2, 3),
(31, 'Afifah Murendah', '199905282018122002', 'afifah.murendah', '123456', 2, 3),
(32, 'Superuser Sijanet', '01', 'superuser', 'adminsuper', 3, 0),
(33, 'Zulfahmi Akbar', '198210122003121002', 'zulfahmi.akbar', '123456', 1, 2),
(34, 'Muhamad Rijal', '197607281998031001', 'muhamad.rijal', '123456', 1, 2),
(35, 'Haryadi Adi Nugroho', '198002152001121002', 'haryadi.adi', '123456', 1, 2),
(36, 'Uded Sutardi', '196406061985031004', 'uded.sutardi', '123456', 1, 2),
(37, 'Kuswana', '197312131994031002', 'kuswana', '123456', 1, 2),
(38, 'Novan Andhika Putra', '198711182007011004', 'novan.andhika', '123456', 1, 2),
(39, 'Hadi Satya Dirya', '197610251999031001', 'hadi.satya', '123456', 1, 2),
(40, 'Nino Herdiansyah', '197603081997031001', 'nino.herdiansyah', '123456', 1, 2),
(41, 'Pipih Nuryanti', '196407271985032002', 'pipih.nuryanti', '123456', 1, 2),
(42, 'Kusmiyati', '197712092000012002', 'kusmiyati', '123456', 1, 2),
(43, 'Iding Rahmat Sidik', '196212021984021001', 'iding.rahmat', '123456', 1, 2),
(44, 'Dewan Agung', '197707311997031001', 'dewan.agung', '123456', 1, 2),
(45, 'Margono', '198009142003121001', 'margono', '123456', 1, 2),
(46, 'Linda Murni', '197302201992122001', 'linda.murni', '123456', 1, 2),
(47, 'Moh. Deni Ramdhan', '197608281996021002', 'deni.ramdhan', '123456', 1, 2),
(48, 'Ghazali Wijaya', '198202262003121001', 'ghazali.wijaya', '123456', 1, 2),
(49, 'Yulius Andri Sulistyanto', '198707312010121003', 'yulius.andri', '123456', 1, 2),
(50, 'Iwan Saputra', '196409111985031002', 'iwan.saputra', '123456', 1, 2),
(51, 'Rahmat Arief', '197904061999031001', 'rahmat.arief', '123456', 1, 2),
(52, 'Budi Santoso', '196303241983031002', 'budi.santoso', '123456', 1, 2),
(53, 'Dedi Juanda', '197603081997031001', 'dedi.juanda', '123456', 1, 2),
(54, 'Wawan Kusnarlan', '197902032000121006', 'wawan.kusnarlan', '123456', 1, 2),
(55, 'Sujono', '196112061983031002', 'sujono', '123456', 1, 2),
(56, 'Haryani', '196207251983032001', 'haryani', '123456', 1, 2),
(57, 'Feri Ferdiansyah', '198011242003121001', 'feri.ferdiansyah', '123456', 1, 2),
(58, 'Adrians Pramudji Ans', '197102031990101001', 'adrian.pramudji', '123456', 1, 2),
(59, 'Khusnul Khotimah', '197312291992122002', 'khusnul.khotimah', '123456', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_izin`
--

CREATE TABLE `data_izin` (
  `id_surat` int(50) NOT NULL,
  `no_surat` varchar(200) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `pkc` varchar(200) DEFAULT NULL,
  `id_tpb` varchar(200) DEFAULT NULL,
  `kegiatan` varchar(500) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `jth_tempo` date DEFAULT NULL,
  `tujuan` varchar(200) DEFAULT NULL,
  `revisi` int(11) NOT NULL,
  `perpanjangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_izin`
--

INSERT INTO `data_izin` (`id_surat`, `no_surat`, `tgl_surat`, `pkc`, `id_tpb`, `kegiatan`, `nilai`, `jth_tempo`, `tujuan`, `revisi`, `perpanjangan`) VALUES
(1, '1', '2019-07-31', '1', '1', '1', '150000000', '2019-09-30', 'PT. ABC', 0, 0),
(2, '789', '2019-08-07', '1', '1', '6', '10000000', '2019-08-10', 'PT ADUHAI', 0, 0),
(3, '2646', '2019-05-09', '2', '14', '1', '71372000', '2019-07-07', 'PT. Bintang Family Indonesia, Kab. Bandung', 0, 0),
(4, '3106', '2019-05-28', '2', '50', '1', '39953400', '2019-08-11', 'PT. Era Murni Busana, Bandung', 0, 0),
(5, '2270', '2019-04-24', '8', '57', '1', '33601000', '2019-08-15', 'PT. IS Indonesia Utama, Kab. Purwakarta', 0, 0),
(6, '3221', '2019-06-13', '8', '23', '1', '18946000', '2019-08-07', 'CV. Amira Sejahtera, Kab. Bandung', 0, 0),
(7, '2993', '2019-05-22', '4', '33', '1', '626500', '2019-08-31', 'PT. Kemilau Surya Mandiri, Bandung', 0, 0),
(8, '2749', '2019-05-13', '2', '15', '1', '12865000', '2019-07-11', 'PT. Gistex Garmen Indonesia, Kab. Majalengka', 0, 0),
(9, '2849', '2019-05-15', '6', '26', '1', '111233100', '2019-08-29', 'PT. Daesang International, Purwakarta', 0, 0),
(10, '3220', '2019-06-13', '8', '23', '1', '6192000', '2019-08-10', 'CV. Bina Karya Arroza, Kab. Bandung', 0, 0),
(11, '3107', '2019-05-28', '2', '50', '1', '25854800', '2019-07-26', 'CV. Prima Sinar Kalimas, DKI Jakarta', 0, 0),
(12, '9889', '2019-06-01', '9', '10', '1', '100000000', '2019-08-21', 'PT. Maju Bersama, Bandung', 0, 0),
(13, '123456', '2019-07-01', '6', '50', '1', '5000100', '2019-09-01', 'PT. Maju Bersama, Bandung', 0, 0),
(14, '234567', '2019-07-28', '4', '2', '1', '2594800', '2019-08-13', 'PT. Maju Bersama, Bandung', 0, 0),
(15, '3122', '2019-07-26', '6', '33', '1', '1643800', '2019-07-26', 'PT. Kencana Fajar Mulia, Cimahi', 0, 0),
(16, '3476', '2019-06-24', '9', '23', '1', '8066000', '2019-08-20', 'CV. Ariny, Bandung', 0, 0),
(17, '1234', '2019-08-08', '2', '50', '1', '1000000', '2019-08-31', 'CV. Ariny, Bandung', 0, 0),
(18, '581', '2019-08-12', '1', '3', '1', '150369000', '2019-08-17', 'HAHA', 0, 0),
(19, '666', '2019-08-14', '4', '1', '1', '100000000000', '2019-10-16', 'PT Test', 0, 0),
(20, '6666', '2019-08-14', '4', '2', '1', '10000000', '2019-09-13', 'PT Test Lagi', 0, 0),
(21, '6666', '2019-08-07', '3', '2', '1', '10000000', '2019-08-21', 'PT Test Lagi', 0, 0),
(22, '1222', '2019-08-15', '1', '1', '2', '23423424', '2019-08-15', 'qwewr', 0, 0),
(23, '999', '2019-08-23', '1', '1', '1', '150369000', '2019-08-21', 'PT Test', 0, 0),
(24, '555', '2019-08-22', '6', '2', '1', '150369000', '2019-08-29', 'PT ADUHAI', 0, 0),
(25, '159', '2019-08-14', '1', '3', '1', '1560688', '2019-08-14', 'PT Test', 0, 0),
(26, '4564684', '2019-08-14', '1', '3', '4', '1565165', '2019-08-15', 'ytytyt', 0, 0),
(27, '49879798454', '2019-08-14', '1', '3', '1', '7489798754', '2019-08-14', '458768746', 0, 0),
(28, '7879', '2019-08-14', '1', '3', '1', '23423424', '2019-08-14', 'tyyuyt', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jaminan`
--

CREATE TABLE `data_jaminan` (
  `id_jaminan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `bentuk_jaminan` int(11) NOT NULL COMMENT '1. CB, 2. TN, 3. BG, 4. JP, 5. JL',
  `no_jaminan` varchar(50) NOT NULL,
  `tgl_jaminan` date NOT NULL,
  `id_penjamin` int(11) DEFAULT NULL,
  `id_tpb` int(11) NOT NULL,
  `realisasi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jaminan`
--

INSERT INTO `data_jaminan` (`id_jaminan`, `id_surat`, `bentuk_jaminan`, `no_jaminan`, `tgl_jaminan`, `id_penjamin`, `id_tpb`, `realisasi`) VALUES
(1, 1, 1, '1231864641', '2019-08-07', 1, 1, '1'),
(2, 2, 1, '1231864641', '2019-08-07', 7, 1, '1'),
(3, 8, 1, '13100071.19.01389', '2019-08-07', 7, 15, ''),
(4, 3, 1, '13100071.19.01383', '2019-08-07', 7, 14, '1'),
(5, 7, 1, '1704.19.00300', '2019-08-07', 3, 33, ''),
(6, 6, 1, '2202.19.000340', '2019-08-07', 2, 23, '1'),
(7, 5, 1, 'CBD 2019 02.0 2 01971', '2019-08-07', 8, 57, ''),
(8, 9, 1, '2511.19.05.00726', '2019-08-07', 4, 26, ''),
(9, 4, 1, '13.100.19.00082', '2019-08-07', 7, 50, ''),
(10, 10, 1, '2202.19.000339', '2019-08-07', 2, 23, ''),
(11, 11, 1, '13.100.19.00083', '2019-08-07', 7, 50, ''),
(12, 12, 2, '123135468', '2019-08-07', NULL, 10, ''),
(13, 13, 1, '13.100.19.10082', '2019-08-07', 7, 50, '1'),
(14, 14, 2, '84561564', '2019-08-07', NULL, 2, ''),
(15, 15, 1, '1704.19.00325', '2019-08-08', 3, 33, '1'),
(16, 16, 1, '2202.19.000363', '2019-08-08', 2, 23, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluar`
--

CREATE TABLE `data_keluar` (
  `id_realisasi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jns_dok` int(11) NOT NULL,
  `no_dok` varchar(20) NOT NULL,
  `tgl_dok` date NOT NULL,
  `uraian_barang` text NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_keluar`
--

INSERT INTO `data_keluar` (`id_realisasi`, `id_surat`, `jns_dok`, `no_dok`, `tgl_dok`, `uraian_barang`, `jumlah_barang`, `satuan_barang`) VALUES
(1, 1, 1, '123456', '2019-07-31', 'KAIN', 101, 'mtr'),
(2, 3, 1, '013658', '2019-06-20', '100% POLYESTER PFP J', 3837, 'mtr'),
(3, 3, 1, '013675', '2019-06-20', '100% POLYESTER PFP J', 3347, 'mtr'),
(4, 13, 1, '0121564', '2019-08-13', 'Kain', 5000, 'yard'),
(5, 15, 1, '015534', '2019-07-11', 'COTTON', 2160, 'kg'),
(6, 6, 1, '014133', '2019-06-26', 'JARING', 1827, 'kg'),
(7, 6, 1, '014132', '2019-06-26', 'BENANG', 5, 'kg'),
(8, 2, 1, '1223588', '2019-08-12', 'KAIN', 10000, 'kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_masuk`
--

CREATE TABLE `data_masuk` (
  `id_realisasi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jns_dok` int(11) NOT NULL,
  `no_dok` varchar(20) NOT NULL,
  `tgl_dok` date NOT NULL,
  `uraian_barang` text NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_masuk`
--

INSERT INTO `data_masuk` (`id_realisasi`, `id_surat`, `jns_dok`, `no_dok`, `tgl_dok`, `uraian_barang`, `jumlah_barang`, `satuan_barang`) VALUES
(10, 1, 2, '123456', '2019-07-31', 'BAJU', 10, 'pcs'),
(11, 3, 2, '015637', '2019-06-24', '100% POLYESTER EMBOS', 767, 'mtr'),
(12, 3, 2, '015902', '2019-06-26', '100% POLYESTER EMBOS', 6417, 'mtr'),
(13, 13, 2, '564564', '2019-08-08', 'BAJU', 2500, 'pcs'),
(14, 15, 2, '017727', '2019-07-15', 'BADGE LABEL', 2160, 'kg'),
(15, 6, 2, '016501', '2019-07-03', 'JARING', 313, 'kg'),
(16, 6, 2, '016592', '2019-07-04', 'JARING', 538, 'kg'),
(17, 6, 2, '016727', '2019-07-05', 'JARING', 132, 'kg'),
(18, 6, 2, '016851', '2019-07-06', 'JARING', 844, 'kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_perben`
--

CREATE TABLE `data_perben` (
  `id_jaminan` int(11) NOT NULL,
  `nama_periksa` varchar(50) NOT NULL,
  `waktu_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_teliti` varchar(50) NOT NULL,
  `waktu_teliti` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nomor_bpj` varchar(100) NOT NULL,
  `tanggal_bpj` date NOT NULL,
  `nomor_ttsj` varchar(100) NOT NULL,
  `tanggal_ttsj` date NOT NULL,
  `nomor_ttpj` int(11) NOT NULL,
  `tanggal_ttpj` date NOT NULL,
  `catatan_periksa` text NOT NULL,
  `catatan_teliti` text NOT NULL,
  `bentuk_konfirmasi` int(11) NOT NULL,
  `catatan_konfirmasi` text NOT NULL,
  `catatan_penarikan` text NOT NULL,
  `hardcopy` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_perben`
--

INSERT INTO `data_perben` (`id_jaminan`, `nama_periksa`, `waktu_periksa`, `nama_teliti`, `waktu_teliti`, `nomor_bpj`, `tanggal_bpj`, `nomor_ttsj`, `tanggal_ttsj`, `nomor_ttpj`, `tanggal_ttpj`, `catatan_periksa`, `catatan_teliti`, `bentuk_konfirmasi`, `catatan_konfirmasi`, `catatan_penarikan`, `hardcopy`) VALUES
(0, 'Alwan Fakhrudin', '2019-08-07 13:57:24', '', '0000-00-00 00:00:00', '', '0000-00-00', '', '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', NULL),
(1, 'Alwan Fakhrudin', '2019-08-07 12:56:24', 'Arfan Rosandy', '2019-07-31 04:11:08', '1', '2019-07-31', '', '0000-00-00', 1, '2019-07-31', 'SESUAI', '', 0, '', '', NULL),
(2, 'Alwan Fakhrudin', '2019-08-07 13:21:38', 'Arfan Rosandy', '2019-08-07 03:49:12', '2', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(3, 'Alwan Fakhrudin', '2019-08-07 11:49:03', 'Arfan Rosandy', '2019-08-07 06:49:02', '3', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', NULL),
(4, 'Alwan Fakhrudin', '2019-08-07 12:06:35', 'Arfan Rosandy', '2019-08-07 06:48:57', '4', '2019-08-07', '', '0000-00-00', 3, '2019-08-07', 'SESUAI', '', 0, '', 'SETUJU PENARIKAN', NULL),
(5, 'Alwan Fakhrudin', '2019-08-07 13:27:38', 'Arfan Rosandy', '2019-08-07 06:49:09', '5', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(6, 'Alwan Fakhrudin', '2019-08-07 13:22:07', 'Arfan Rosandy', '2019-08-07 06:49:17', '6', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(7, 'Alwan Fakhrudin', '2019-08-07 11:48:55', 'Arfan Rosandy', '2019-08-07 06:48:33', '7', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', NULL),
(8, 'Alwan Fakhrudin', '2019-08-07 13:22:18', 'Arfan Rosandy', '2019-08-07 06:49:05', '8', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(9, 'Alwan Fakhrudin', '2019-08-07 13:27:47', 'Arfan Rosandy', '2019-08-07 06:49:13', '9', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(10, 'Alwan Fakhrudin', '2019-08-07 13:22:13', 'Arfan Rosandy', '2019-08-07 08:11:11', '10', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', '2019-08-07'),
(11, 'Alwan Fakhrudin', '2019-08-07 13:11:22', 'Arfan Rosandy', '2019-08-07 08:11:20', '11', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', '', 0, '', '', NULL),
(12, 'Alwan Fakhrudin', '2019-08-07 14:00:46', 'Arfan Rosandy', '2019-08-07 09:00:44', '12', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', NULL),
(13, 'Alwan Fakhrudin', '2019-08-07 14:35:35', 'Arfan Rosandy', '2019-08-07 09:30:26', '13', '2019-08-07', '', '0000-00-00', 13, '2019-08-07', 'SESUAI', '', 0, '', 'SESUAI', NULL),
(14, 'Alwan Fakhrudin', '2019-08-07 14:25:30', 'Arfan Rosandy', '2019-08-07 09:24:51', '14', '2019-08-07', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', 'Jaminan atas pengeluaran barang dan atau bahan baku dalam rangka subkontrak dari Kawasan Berikat ke TLDDP', 0, '', '', NULL),
(15, 'Alwan Fakhrudin', '2019-08-08 02:07:31', 'Khusnul Khotimah', '2019-08-07 21:01:19', '15', '2019-08-08', '', '0000-00-00', 15, '2019-08-08', 'SESUAI', '', 0, '', '', NULL),
(16, 'Alwan Fakhrudin', '2019-08-08 08:22:21', 'Indra Bayu Lesmana, S.E.', '2019-08-08 03:22:12', '16', '2019-08-08', '', '0000-00-00', 0, '0000-00-00', 'SESUAI', 'SESUAI', 0, '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_realisasi`
--

CREATE TABLE `data_realisasi` (
  `id_realisasi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jns_dok` int(11) NOT NULL,
  `no_dok` varchar(20) NOT NULL,
  `tgl_dok` date NOT NULL,
  `uraian_barang` text NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_realisasi`
--

INSERT INTO `data_realisasi` (`id_realisasi`, `id_surat`, `jns_dok`, `no_dok`, `tgl_dok`, `uraian_barang`, `jumlah_barang`, `satuan_barang`) VALUES
(1, 1, 1, '123456', '2019-07-31', 'KAIN', 101, 'mtr'),
(2, 3, 1, '013658', '2019-06-20', '100% POLYESTER PFP J', 3837, 'mtr'),
(3, 3, 1, '013675', '2019-06-20', '100% POLYESTER PFP J', 3347, 'mtr'),
(4, 13, 1, '0121564', '2019-08-13', 'Kain', 5000, 'yard'),
(5, 15, 1, '015534', '2019-07-11', 'COTTON', 2160, 'kg'),
(6, 6, 1, '014133', '2019-06-26', 'JARING', 1827, 'kg'),
(7, 6, 1, '014132', '2019-06-26', 'BENANG', 5, 'kg'),
(10, 1, 2, '123456', '2019-07-31', 'BAJU', 10, 'pcs'),
(11, 3, 2, '015637', '2019-06-24', '100% POLYESTER EMBOS', 767, 'mtr'),
(12, 3, 2, '015902', '2019-06-26', '100% POLYESTER EMBOS', 6417, 'mtr'),
(13, 13, 2, '564564', '2019-08-08', 'BAJU', 2500, 'pcs'),
(14, 15, 2, '017727', '2019-07-15', 'BADGE LABEL', 2160, 'kg'),
(15, 6, 2, '016501', '2019-07-03', 'JARING', 313, 'kg'),
(16, 6, 2, '016592', '2019-07-04', 'JARING', 538, 'kg'),
(17, 6, 2, '016727', '2019-07-05', 'JARING', 132, 'kg'),
(18, 6, 2, '016851', '2019-07-06', 'JARING', 844, 'kg'),
(19, 2, 1, '4564654', '2019-08-12', 'KAIN', 100000, 'kg'),
(20, 2, 2, '46549845614', '2019-08-20', 'ANYAM', 123456, 'kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_status`
--

CREATE TABLE `data_status` (
  `id_surat` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_status`
--

INSERT INTO `data_status` (`id_surat`, `status`) VALUES
(1, 19),
(2, 11),
(3, 19),
(4, 11),
(5, 11),
(6, 16),
(7, 11),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 19),
(14, 11),
(15, 19),
(16, 11),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_hist` int(50) NOT NULL,
  `id_surat` int(50) NOT NULL,
  `aktifitas` varchar(200) NOT NULL,
  `operator` varchar(200) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan_hist` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_hist`, `id_surat`, `aktifitas`, `operator`, `waktu`, `keterangan_hist`) VALUES
(1, 0, '', '', '2019-07-09 03:22:51', ''),
(2, 1, 'Ubah Data Surat Persetujuan Jaminan', 'Faishal Ibrahim D. P.', '2019-07-09 03:31:35', 'salah input'),
(3, 1, 'Ubah Data Surat Persetujuan Jaminan', 'Faishal Ibrahim D. P.', '2019-07-09 03:49:32', 'perubahan lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(4) NOT NULL,
  `ket_giat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `ket_giat`) VALUES
(1, 'Subkontrak'),
(2, 'Perbaikan / reparasi'),
(3, 'Peminjaman Barang Modal untuk keperluan produksi'),
(4, 'Pengetesan dan pengembangan kualitas produksi'),
(5, 'Penggunaan kemasan yang dipakai berulang'),
(6, 'Dipamerkan'),
(7, 'Tujuan lain dengan persetujuan Kepala Kantor Pabean');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_pb` int(4) NOT NULL,
  `no_suratpb` varchar(200) NOT NULL,
  `tgl_suratpb` date NOT NULL,
  `id_jampb` int(4) NOT NULL,
  `alasanpb` varchar(500) NOT NULL,
  `waktupb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengusaha_detail`
--

CREATE TABLE `pengusaha_detail` (
  `id_pengusaha` int(11) NOT NULL,
  `npwp_pengusaha` varchar(20) NOT NULL,
  `nama_pengusaha` text NOT NULL,
  `alamat_pengusaha` text NOT NULL,
  `no_skep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengusaha_detail`
--

INSERT INTO `pengusaha_detail` (`id_pengusaha`, `npwp_pengusaha`, `nama_pengusaha`, `alamat_pengusaha`, `no_skep`) VALUES
(1, '13232431', 'ase', 'jl.asad', 'S-231'),
(2, '01.061.029.3-422.001', 'EIGER STORE', 'Jalan Ujung Berung', ''),
(3, '01.061.029.3-422.002', 'CONSINA', 'JL. Cihampelas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjamindetail`
--

CREATE TABLE `penjamindetail` (
  `id_detail` int(11) NOT NULL,
  `id_penjamin` int(11) NOT NULL,
  `npwp_penjamin` varchar(20) DEFAULT NULL,
  `nama_penjamin` text NOT NULL,
  `alamat_penjamin` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `faksimili` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjamindetail`
--

INSERT INTO `penjamindetail` (`id_detail`, `id_penjamin`, `npwp_penjamin`, `nama_penjamin`, `alamat_penjamin`, `telepon`, `faksimili`) VALUES
(1, 1, '01.061.029.3-422.001', 'ASURANSI ASEI INDONESIA, PT', 'Grand Royal Panghegar Lt.2 Jl Merdeka No.2 Bandung', '', ''),
(2, 2, '01.305.801.1-428.001', 'ASURANSI BUANA INDEPENDENT', 'Jl. Jend. Sudirman No. 72 Bandung', '(022) 4203217,4263619', '(022) 4234101'),
(3, 3, '01.000.046.1-423.001', 'ASURANSI KREDIT INDONESIA, PT', 'JL. LAPANGAN SUPRATMAN NO.8, BANDUNG 40114', '022 7201839', '022 7208331'),
(4, 4, '01.314.857.2-017.000', 'ASURANSI MEGA PRATAMA JAKARTA, PT', 'JL. RAYA PASAR MINGGU DIII 87C NO. 14, PEJANTEN TI...', '021.7983401', '021.7983405/02'),
(5, 5, '', 'ASURANSI RAMA SATRIA WIBAWA, PT', 'JL. BUAH BATU NO.46, BANDUNG', '', ''),
(6, 6, '01.318.451.0-054.000', 'ASURANSI RAMAYANA JAKARTA Tbk, PT', 'Komp.Royal Palace Blok A No.21-22, Jln. Prof.Dr.So...', '', ''),
(7, 7, '01.391.149.0-073.000', 'ASURANSI SINAR MAS, PT', 'PLAZA SIMAS, JL. FACHRUDIN NO.18, JAKARTA 10250', '(021) 3902141', '(021) 3902159/60'),
(8, 8, '71.227.393.7-428.001', 'JAMKRINDO SYARIAH, PT', 'Jl. Dr. Djunjunan No. 16 A Bandung', '022-82602944', '022-82602943'),
(9, 9, '01.060.004.7-429.001', 'PERUM JAMKRINDO', 'Jl. Soekarno Hatta Km.12 No.722 Gedebage Bandung', '', ''),
(10, 10, '01.568.936.7-062.000', 'PT. ASURANSI TUGU KRESNA PRATAMA', 'Jl. Raya Pasar Minggu No. 5 Pancoran Jakarta Selat...', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjaminttd`
--

CREATE TABLE `penjaminttd` (
  `id_jaminan` int(11) NOT NULL,
  `nama_ttd` text NOT NULL,
  `jabatan_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjaminttd`
--

INSERT INTO `penjaminttd` (`id_jaminan`, `nama_ttd`, `jabatan_ttd`) VALUES
(1, 'PUTRA', 'DIREKTUR'),
(2, 'DICKI', 'MANAGER'),
(3, 'CHAREL FILBERT YAVETH YAL', 'PIMPINAN CABANG'),
(4, 'CHAREL FILBERT YAVETH YAL', 'PIMPINAN CABANG'),
(5, 'SONI SETIAWAN ADIANTO', 'KEPALA SEKSI UNDERWRITING NON KREDIT'),
(6, 'IWAN RIMAYANSYAH', 'KEPALA SEKSI'),
(7, 'RADITYA HERMASTUTI', 'KEPALA CABANG'),
(8, 'EDY IRAWAN, AAAIK', 'KADEPT. TEKNIK'),
(9, 'SIGIT SETIA BUDI', 'BRANCH MANAGER'),
(10, 'IWAN RIMAYANSYAH', 'KEPALA SEKSI'),
(11, 'SIGIT SETIA BUDI', 'BRANCH MANAGER'),
(13, 'SIGIT SETIA BUDI', 'BRANCH MANAGER'),
(15, 'HENI WAHYUNINGSIH', 'KEPALA  BAGIAN UNDERWRITING'),
(16, 'IWAN', 'KEPALA SEKSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjaminuser`
--

CREATE TABLE `penjaminuser` (
  `id_user` int(11) NOT NULL,
  `id_penjamin` int(11) NOT NULL,
  `nama_penjamin` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjaminuser`
--

INSERT INTO `penjaminuser` (`id_user`, `id_penjamin`, `nama_penjamin`, `username`, `password`) VALUES
(1, 1, 'ASURANSI ASEI INDONESIA, PT', 'asei.indonesia', '123456'),
(2, 2, 'ASURANSI BUANA INDEPENDENT', 'buana.independent', '123456'),
(3, 3, 'ASURANSI KREDIT INDONESIA, PT', 'kredit.indonesia', '123456'),
(4, 4, 'ASURANSI MEGA PRATAMA JAKARTA, PT', 'mega.pratama', '123456'),
(5, 5, 'ASURANSI RAMA SATRIA WIBAWA, PT', 'satria.wibawa', '123456'),
(6, 6, 'ASURANSI RAMAYANA JAKARTA Tbk, PT', 'ramayana', '123456'),
(7, 7, 'ASURANSI SINAR MAS, PT', 'sinar.mas', '123456'),
(8, 8, 'JAMKRINDO SYARIAH, PT', 'jamkrindo.syariah', '123456'),
(9, 9, 'PERUM JAMKRINDO', 'perum.jamkrindo', '123456'),
(10, 10, 'PT. ASURANSI TUGU KRESNA PRATAMA', 'kresna.pratama', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjangan`
--

CREATE TABLE `perpanjangan` (
  `id_pj` int(4) NOT NULL,
  `no_suratpj` varchar(200) NOT NULL,
  `tgl_suratpj` date NOT NULL,
  `id_jampj` int(4) NOT NULL,
  `jaminanpj` int(20) NOT NULL,
  `new_due_date` date NOT NULL,
  `alasanpj` varchar(500) NOT NULL,
  `waktupj` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi`
--

CREATE TABLE `revisi` (
  `id_rev` int(50) NOT NULL,
  `no_rev` varchar(50) NOT NULL,
  `tgl_rev` date NOT NULL,
  `id_surat` int(50) NOT NULL,
  `nilai_rev` int(50) NOT NULL,
  `kegiatan_rev` int(50) NOT NULL,
  `jth_tempo_rev` date NOT NULL,
  `tujuan_rev` varchar(200) NOT NULL,
  `keterangan_rev` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `revisi`
--

INSERT INTO `revisi` (`id_rev`, `no_rev`, `tgl_rev`, `id_surat`, `nilai_rev`, `kegiatan_rev`, `jth_tempo_rev`, `tujuan_rev`, `keterangan_rev`) VALUES
(1, '1', '2011-11-11', 8, 11111111, 2, '2011-11-11', '11111111111', '11111111111'),
(2, '2rev', '2011-11-11', 6, 1111111, 1, '2011-11-11', '1111111111', '1111111111'),
(3, '1revsadasd', '2011-11-11', 5, 111111, 1, '2011-11-11', '11111111111111', '11111111111111'),
(4, '31231313123', '2012-03-12', 5, 12313, 3, '2012-03-12', '123123132', '123123132');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_status`
--

CREATE TABLE `s_status` (
  `status` int(11) NOT NULL,
  `keterangan_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `s_status`
--

INSERT INTO `s_status` (`status`, `keterangan_status`) VALUES
(0, 'Jaminan Ditolak'),
(1, 'Perekaman Surat Persetujuan'),
(2, 'Perpanjangan Izin Persetujuan'),
(3, 'Pembatalan Izin Persetujuan'),
(4, 'Pengajuan Jaminan ke Penjamin'),
(5, 'Penerbitan E-Jaminan'),
(6, 'Pengajuan Jaminan ke Perbendaharaan'),
(7, 'Pemeriksaan'),
(8, 'Penelitian Jaminan'),
(9, 'Menunggu Konfirmasi'),
(10, 'Jaminan Terkonfirmasi'),
(11, 'Terbit E-BPJ'),
(12, 'Pengajuan Jaminan Tunai'),
(13, 'Pengajuan Jaminan Bank Garansi'),
(14, 'Pengajuan Jaminan Perusahaan'),
(15, 'Pengajuan Jaminan Lainnya'),
(16, 'Pengajuan Penarikan'),
(17, 'Perekaman Surat Revisi'),
(18, 'Penelitian Penarikan'),
(19, 'Terbit TTPJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpbdetail`
--

CREATE TABLE `tpbdetail` (
  `id_detail` int(11) NOT NULL,
  `id_tpb` int(11) NOT NULL,
  `npwp_tpb` varchar(20) NOT NULL,
  `nama_tpb` text NOT NULL,
  `alamat_tpb` text NOT NULL,
  `no_skep` text NOT NULL,
  `telepon_tpb` varchar(50) NOT NULL,
  `faksimili_tpb` varchar(50) NOT NULL,
  `id_hanggar` int(11) NOT NULL,
  `telegram_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tpbdetail`
--

INSERT INTO `tpbdetail` (`id_detail`, `id_tpb`, `npwp_tpb`, `nama_tpb`, `alamat_tpb`, `no_skep`, `telepon_tpb`, `faksimili_tpb`, `id_hanggar`, `telegram_id`) VALUES
(1, 1, '01.104.801.4-441.000', 'PT Ade Textile Industries (Adetex)', 'Jl. Raya Banjaran KM. 17 Banjaran, Kelurahan Lebakwangi, Kecamatan Arjasari, Kabupaten Bandung, Jawa Barat', 'KEP-909/WBC.09/2018', '022-5200638', '0', 16, 244085620),
(2, 2, '02.046.516.7-441.000', 'PT Aichi Tex Indonesia', 'Kawasan Industri Dwipuri Rancaekek Km. 24,5 Blok B Nomor 6, Desa Mangunarga, Kecamatan Cimanggung, Kabupaten Sumedang, Jawa Barat', '2550/KM.4/2017', '0', '0', 15, 772831525),
(3, 3, '02.333.034.3-429.000', 'PT Asia Penta Garment', 'Jl. Mekar Mulya Kavling 11 (Soekarno Hatta) Kecamatan Rancasari, Wilayah Gedebage, Bandung, Jawa Barat', '77/KM.4/2015', '0', '0', 10, 586419603),
(4, 4, '02.479.848.0-445.000', 'PT Big Golden Bell', 'Kawasan Budidaya Peruntukan industri, Jl. Laswi Km 16, No 168 Kelurahan Jelekong, Kecamatan Baleendah, Kabupaten Bandung, Jawa Barat', '477/KM.4/2018', '0', '0', 17, 0),
(5, 5, '31.602.252.4-421.000', 'PT CCH Indonesia', 'Jl. Desa Giri Asih No. 16 RT 01 RW 13 Desa Giri Asih, Kecamatan Batujajar, Kabupaten Bandung Barat, Jawa Barat', '863/KM.4/2017', '0', '0', 2, 0),
(6, 6, '01.583.527.5-444.000', 'PT Celebit Circuit Technology Indonesia', 'Jl. Buah Dua RT 01 RW 04 Desa Rancaekek, Kecamatan Rancaekek, Bandung, Jawa Barat', '3253/KM.4/2017', '0', '0', 24, 0),
(7, 7, '01.456.031.2-441.000', 'PT Daese Garmin', 'Jl. H. Ibrahim Adjie, No. 90, Kelurahan Kebon Waru, Kecamatan Batununggal, Kotamadya Bandung, Jawa Barat', '2716/KM.4/2017', '0', '0', 10, 0),
(8, 8, '01.645.347.4-444.000', 'PT Derma International', 'Jl. Panyaungan No. 8 RT. 01 RW.03 Desa Cileunyi Wetan, Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat', '2051/KM.4/2017', '0', '0', 21, 0),
(9, 9, '01.002.132.7-051.000', 'PT Dirgantara Indonesia', 'Jl. Pajajaran No. 154 Desa Husein Sastranegara, Kecamatan Cicendo, Bandung, Jawa Barat', '3616/KM.4/2017', '0', '0', 25, 0),
(10, 10, '01.671.324.0-445.000', 'PT Feng Tay Ind.Enterprises', 'Jl. Raya Banjaran Km. 14,6 Desa Bojong Manggu, Kecamatan Pamengpeuk, Kabupaten Bandung, Jawa Barat', '2204/KM.4/2017', '0', '0', 6, 0),
(11, 11, '01.824.697.5-445.000', 'PT Forever Garmindo', 'Jl. Raya Banjaran Km. 12,8 No. 389 Desa Langonsari, Kecamatan Pamengpeuk, Bandung, Jawa Barat', '2276/KM.4/2017', '0', '0', 6, 0),
(12, 12, '02.046.598.5-446.000', 'PT Gaha Green Garment', 'Kawasan Industri Dwipapuri Kavling N1-N3, N5-N6, N12, N15-N17 Jl. Raya Rancaekek Km. 24,5 Sumedang 45364, Jawa Barat', '741/KM.4/2012', '0', '0', 15, 0),
(13, 13, '01.678.036.3-441.000', 'PT GE Nusantara Turbines Services', 'Kawasan Berikat PT Dirgantara Indonesia Jl. Pajajaran No. 154 Desa Husein Sastranegara, Kecamatan Cicendo, Bandung, Jawa Barat', '287/KM.4/2018', '0', '0', 25, 0),
(14, 14, '01.104.755.2-441.000', 'PT Gistex', 'Jl. Nanjung No. 82 RT 005 RW 011, Desa Lagadar, Kecamatan Margaasih, Kabupaten Bandung, Jawa Barat', '2834/KM.4/2017', '(022) 6670633', '(022) 6674741', 22, 0),
(15, 15, '31.560.872.9-423.000', 'PT Gistex Garmen Indonesia', 'Jl. Panyawungan Km. 19 Desa Cileunyi Wetan, Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat', '2477/KM.4/2015', '(022) 7796683', '(022) 7796686', 21, 0),
(16, 16, '01.882.858.2-445.000', 'PT Grace Hill Garments Indonesia', 'Jl. Pasawahan Nomor. 4 Rt 05/ Rw 11Desa. Sayati Kecamatan Margahayu, Kabupaten Bandung, Jawa Barat', '528/KM.4/2018', '0', '0', 3, 0),
(17, 17, '01.118.497.5-441.000', 'PT Grand Textile Industry', 'Jl. Jenderal A.H. Nasution KM 7 No. 127,Kel, Karang Pamulang,Kec. Mandalajati, Bandung', '567/WBC.09/2018', '0', '0', 10, 0),
(18, 18, '31.444.370.6-445.000', 'PT Greentex Indonesia Utama II', 'Jl. Raya Banjaran Km. 16,5 Banjaran, Desa Lebakwangi, Kecamatan Arjasari, Kabupaten Bandung, Jawa Barat', 'KEP-701/WBC.09/2018', '0', '0', 16, 0),
(19, 19, '01.104.759.4-441.000', 'PT Hakatex', 'Jl. Moh. Toha Km. 5,6 Kelurahan Pasawahan, Kecamatan Bodjong Loa, Kabupaten Bandung, Jawa Barat', '2261/KM.4/2017', '0', '0', 28, 0),
(20, 20, '01.723.330.5-441.000', 'PT Hanamaster Jaya', 'Jl Cibingbin No. 99 RT. 03/03 Desa Laksanamekar Kecamatan Padalarang, Kabupaten Bandung Jawa Barat', '633/WBC.09/2018', '0', '0', 13, 0),
(21, 21, '01.869.949.6-446.001', 'PT Hasasi International', 'Jl. Raya Rancaekek KM 26, Desa Cihanjung, Kec. Cimanggung, Kab. Sumedang, Jawa Barat', '655/KM.4/2017', '0', '0', 19, 0),
(22, 22, '01.338.244.5-445.001', 'PT Indo Everest Texindo', 'Jl. Cisirung No. 101, Desa Cangkuang Wetan, Kecamatan Dayeuh Kolot, Jawa Barat', '73/WBC.08/KPP.MP.04/2017', '0', '0', 3, 0),
(23, 23, '01.001.717.6.057.000', 'PT Indoneptune Net Manufacturing', 'Jl. Raya Bandung Garut Km. 25, Desa Cangkuang, Kecamatan Rancaekek, Kabupaten Bandung, Jawa Barat', '1555/KM.4/2017', '(022) 7798042', '(022) 7798740, 7793567', 4, 0),
(24, 24, '84.924.555.0-444.000', 'PT Indoplas Footwear Indonesia ', 'Jalan Raya Cicalengka - Majalengka, Hegarmanah, Cicalengka, Kabupaten Bandung', 'KEP-983/WBC.09/2018', '0', '0', 19, 0),
(25, 25, '01.001.680.6-054.000', 'PT Indo-Rama Syntethics', 'Jl. Batujajar KM 5.5, Desa Giri Asih, Padalarang, Bandung', '310/KM.4/2016', '0', '0', 2, 0),
(26, 26, '02.192.997.1-444.000', 'PT Ing International', 'Jl. Raya Rancaekek Majalaya Nomor. 389, Desa Solokan Jeruk, Kecamatan Solokan Jeruk, Bandung, Jawa Barat', '2547/KM.4/2017', '(022) 5959577', '(022) 5959581', 17, 0),
(27, 27, '02.735.117.0-444.000', 'PT JO-A Texville', 'Jl. Raya Rancaekek No. 389 Desa. Solokan Jeruk Kecamatan Solokan Jeruk Majalaya Kabupaten Bandung, Jawa Barat', '2450/KM.4/2017', '0', '0', 17, 0),
(28, 28, '02.554.491.7-422.000', 'PT Ketronics Indonesia', 'Jl. Cicukang Nomor 34, Cigondewah Kaler, Bandung, Jawa Barat ', '2135/KM.4/2017', '0', '0', 9, 0),
(29, 29, '01.001.743.2-057.000', 'PT Kewalram Indonesia', 'Jl. Raya Rancaekek Km. 25 Desa Sukadana, Kecamatan Cimanggu, Kabupaten Sumedang, Jawa Barat', '2787/KM.4/2017', '0', '0', 4, 0),
(30, 30, '01.001.743.2-057.000', 'PT Kewalram Indonesia (II)', 'Dusun Cikadaton RT 03 RW 02, Desa Cikahuripan, Kec. Cimanggung, Kab. Sumedang, Jawa Barat', '1585/KM.4/2016', '0', '0', 4, 0),
(31, 31, '02.193.040.9-421.000', 'PT Kwangduk Worldwide (I)', 'Jl. Raya Cipeundeuy Desa Cikalong Wetan, Kecamatan Cikalong Wetan, Kabupaten Bandung, Jawa Barat', '2039/KM.4/2017', '0', '0', 23, 0),
(32, 32, '02.193.040.9-421.000', 'PT Kwangduk Worldwide (II)', 'Jl. Raya Cipeundeuy, Kp. Cisaheun, RT 01 Rw 13 Kelurahan Cikalong,  Kecamatan. Cikalong Wetan, Bandung, Jawa Barat', '297/KM.4/2017', '0', '0', 23, 0),
(33, 33, '01.104.716.4-441.000', 'PT Leading Garment Industries', 'Jl. Mengger Hilir Nomor. 97 (Moch Toha Km. 5,6) Pasawahan, Dayeuhkolot, Bandung, Jawa Barat', '2129/KM.4/2017', '022-5200638', '022-5207000', 28, 0),
(34, 34, '01.448.131.1-441.000', 'PT Leuwijaya Utama Textile', 'Jl. Cibaligo Nomor 72, Km. 1,75 RT 003/009, Kelurahan Utama, kecamatan Cimahi Selatan, Bandung, Jawa Barat', '2555/KM.4/2017', '0', '0', 8, 0),
(35, 35, '80.691.099.8-421.000', 'PT Long Harmony Industry', 'Jl. Raya Batujajar KM 3,5 desa giriasih, kecamatan batujajar, kabupaten bandung barat, jawa barat', 'KEP-187/WBC.09/2019', '0', '0', 2, 0),
(36, 36, '02.736.588.1.445.000', 'PT Mahameru Centratama Spinning Mills', 'Jl. Cisirung Km. 2 Moch Toha Km. 6,5 Desa Cangkuang, kecamatan Dayeuh Kolot, Kabupaten Bandung, Jawa barat', '694/KM.4/2016', '0', '0', 3, 0),
(37, 37, '01.280.264.1-441.000', 'PT Masterindo Jaya Abadi', 'Jl. Soekarno-Hatta Nomor. 24 Kelurahan Cibutu, Kecamatan Bandung Kulon, Kotamadya Bandung, Jawa Barat', '2505/KM.4/2017', '0', '0', 9, 0),
(38, 38, '01.130.699.0-441.000', 'PT Metro Garmin', 'Jl. Moch Toha Km. 7.5  (Jalan Raya dayeuh Kolot No. 243) Kelurahan Citeureup, kecamatan Dayeuh Kolot Kabupaten Bandung, Jawa Barat', '3625/KM.4/2017', '0', '0', 1, 0),
(39, 39, '01.061.784.3-057.000', 'PT Namnam Fashion Industries I', 'Jl. Leuwigajah Nomor 106 A, Desa Cigugur Tengah, Kecamatan Cimahi Tengah, Bandung, Jawa Barat', '2200/KM.4/2017', '0', '0', 8, 0),
(40, 40, '74.540.692.6-444.000', 'PT Nirwana Alabare Garment', 'Jl. Raya Rancaekek – Majalaya No. 289, Desa Solokan Jeruk Kecamatan Solokan Jeruk, Kabupaten Bandung', '3094/KM.4/2017', '0', '0', 17, 0),
(41, 41, '01.824.681.9-057.000', 'PT Nisshinbo Indonesia', 'Jl. Nanjung No. 66, Kelurahan Utama, Kecamatan Cimahi Selatan, Kotamdya Cimahi, Jawa Barat', '2337/KM.4/2017', '0', '0', 22, 0),
(42, 42, '01.778.432.3-441.000', 'PT Nusantara Turbine dan Propulsi', 'Jl. Pajajaran Nomor 154, Desa Husein Sastranegara, Kecamatan Cicendo, Bandung, Jawa Barat', '3687/KM.4/2017', '0', '0', 25, 0),
(43, 43, '31.277.977.0-445.000', 'PT Pan Asia Jaya Abadi', 'Jl. Mochamad Toha Km 6,8 (Cisirung), Pasawahan, Kecamatan Dayeuh Kolot, Bandung, Jawa Barat', '922/KM.4/2018', '0', '0', 1, 0),
(44, 44, '01.524.803.2-441.000', 'PT Polyfin Canggih', 'Jl. Raya Rancaekek Km. 19 Nomor 28, Desa Cipacing,Kecamatan Cikeruh, Kabupaten Sumedang, Jawa Barat', '887/WBC.09/2018', '0', '0', 24, 0),
(45, 45, '31.358.014.4-445.000', 'PT Pop Star', 'Jl. Nanjung Km. 3 Nomor. 99, Desa Lagadar, Kecamatan Margaasih, Kabupaten Bandung, Jawa Barat', 'KEP-604/WBC.09/2018', '0', '0', 22, 0),
(46, 46, '02.606.524.3-441.000', 'PT Popular Daenong', 'Jl. Nanjung No. 82 RT 005 RW 011, Desa Lagadar, Kecamatan Margaasih, Kabupaten Bandung, Jawa Barat', '2849/KM.4/2017', '0', '0', 22, 0),
(47, 47, '01.081.777.3-445.000', 'PT Saimoda Garmindo', 'Jl. Raya Banjaran Km. 16 Desa Lebakwangi, Kecamatan Arjasari, Kabupaten Bandung, jawa Barat', '1867/KM.4/2016', '0', '0', 16, 0),
(48, 48, '01.723.441.0-055.000', 'PT Sanwa Part Indonesia', 'Jl. Batujajar Permai I Nomor 3 Kp. Cibingbin Rt. 05 Rw. 04 Desa Laksana Mekar, Kecamatan Padalarang, Kabupaten Bandung Barat, Jawa Barat', '2585/KM.4/2017', '0', '0', 13, 0),
(49, 49, '02.192.999.7-057.000', 'PT Seikou Seat Cover', 'Jl. Kopo Km. 11,2 No. 90, Desa Cilampeni, Kecamatan Ketapang, Kabupaten Bandung, Jawa Barat', '2798/KM.4/2017', '0', '0', 31, 0),
(50, 50, '01.645.036.3-444.000', 'PT Shinko Toyobo Gistex', 'Jl. Panyawungan Km. 19 Desa Cileunyi Wetan, Kecamatan Cileunyi, Kabupaten Bandung, Jawa Barat', '2464/KM.4/2017', '022 - 7798891', '022 - 7798894', 21, 0),
(51, 51, '01.104.771.9-429.000', 'PT Silverkris', 'Jl. A. Yani Km. 9 (Jl. Cicukang No.6) Kel. Cisaranten Bina Harapan, Kecamatan Arcamanik, Kota Bandung', '1600/KM.4/2016', '0', '0', 10, 0),
(52, 52, '70.374.791.5-012.000', 'PT Teodore Pan Garmindo', 'Jl. Industri IV No. 10 Leuwigajah, RT 002 RW 009, Kelurahan Utama, Kecamatan Cimahi Selatan, Bandung, Jawa Barat', '3235/KM.4/2017', '0', '0', 8, 0),
(53, 53, '01.069.305.9-057.000', 'PT Trimas Sarana Garment Industry', 'Jl. Raya Kopo Km. 7 Desa Sayati, Kecamatan Margahayu, Bandung, Jawa Barat', '2688/KM.4/2017', '0', '0', 31, 0),
(54, 54, '01.882.712.1-057.000', 'PT Trisco Tailored Apparel Manufacturing', 'Jl. Raya Kopo Soreang,Km 11,5, Kelurahan Cilampeni, Kecamatan Katapang, Kabupaten Bandung, Jawa Barat ', '82/WBC.09/2019', '0', '0', 31, 0),
(55, 55, '01.069.598.9-057.000', 'PT Trisenta Interior Manufacturing', 'Jl. Raya Kopo Km. 7 Nomor. 84 Desa Sayati, Kecamatan Margahayu, Kabupaten Bandung, Jawa Barat', '2686/KM.4/2017', '0', '0', 31, 0),
(56, 56, '02.930.862.4-445.001', 'PT Unicorn Utama', 'Jl. Raya Banjaran KM. 16,5 Desa Lebakwangi, Kecamatan Arjasari, Kabupaten Bandung Jawa Barat', '1289/KM.4/2018', '0', '0', 16, 0),
(57, 57, '02.629.804.2-446.000', 'PT Yakjin Jaya Indonesia', 'Jl. Raya Rancaekek Km. 27 Desa Sindangpakuon, Kecamatan Cimanggung, Kabupaten Sumedang, Jawa Barat', '359/KM.4/2017', '(022) 7798020', '(022) 7798046', 19, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpbttd`
--

CREATE TABLE `tpbttd` (
  `id_ttd` int(11) NOT NULL,
  `id_tpb` int(11) NOT NULL,
  `nama_ttd` int(11) NOT NULL,
  `jabatan_ttd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpbuser`
--

CREATE TABLE `tpbuser` (
  `id_user` int(11) NOT NULL,
  `id_tpb` int(11) NOT NULL,
  `nama_tpb` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tpbuser`
--

INSERT INTO `tpbuser` (`id_user`, `id_tpb`, `nama_tpb`, `username`, `password`) VALUES
(1, 1, 'PT Ade Textile Industries (Adetex)', 'ade.textile', '123456'),
(2, 2, 'PT Aichi Tex Indonesia', 'aichi.tex', '123456'),
(3, 3, 'PT Asia Penta Garment', 'asia.penta', '123456'),
(4, 4, 'PT Big Golden Bell', 'big.golden', '123456'),
(5, 5, 'PT CCH Indonesia', 'cch.indonesia', '123456'),
(6, 6, 'PT Celebit Circuit Technology Indonesia', 'celebit.circuit', '123456'),
(7, 7, 'PT Daese Garmin', 'daese.garmin', '123456'),
(8, 8, 'PT Derma International', 'derma.international', '123456'),
(9, 9, 'PT Dirgantara Indonesia', 'dirgantara.indonesia', '123456'),
(10, 10, 'PT Feng Tay Ind.Enterprises', 'feng.tay', '123456'),
(11, 11, 'PT Forever Garmindo', 'forever.garmindo', '123456'),
(12, 12, 'PT Gaha Green Garment', 'gaha.green', '123456'),
(13, 13, 'PT GE Nusantara Turbines Services', 'ge.nusantara', '123456'),
(14, 14, 'PT Gistex', 'gistex', '123456'),
(15, 15, 'PT Gistex Garmen Indonesia', 'gistex.garmen', '123456'),
(16, 16, 'PT Grace Hill Garments Indonesia', 'grace.hill', '123456'),
(17, 17, 'PT Grand Textile Industry', 'grand.textile', '123456'),
(18, 18, 'PT Greentex Indonesia Utama II', 'greentex.indonesia', '123456'),
(19, 19, 'PT Hakatex', 'hakatex', '123456'),
(20, 20, 'PT Hanamaster Jaya', 'hanamaster.jaya', '123456'),
(21, 21, 'PT Hasasi International', 'hasasi.international', '123456'),
(22, 22, 'PT Indo Everest Texindo', 'indo.everest', '123456'),
(23, 23, 'PT Indoneptune Net Manufacturing', 'indoneptune.net', '123456'),
(24, 24, 'PT Indoplas Footwear Indonesia ', 'indoplas.footwear', '123456'),
(25, 25, 'PT Indo-Rama Syntethics', 'indo.rama', '123456'),
(26, 26, 'PT Ing International', 'ing.international', '123456'),
(27, 27, 'PT JO-A Texville', 'jo.a', '123456'),
(28, 28, 'PT Ketronics Indonesia', 'ketronics.indonesia', '123456'),
(29, 29, 'PT Kewalram Indonesia', 'kewalram.indonesia', '123456'),
(30, 30, 'PT Kewalram Indonesia (II)', 'kewalram.indonesia', '123456'),
(31, 31, 'PT Kwangduk Worldwide (I)', 'kwangduk.worldwide', '123456'),
(32, 32, 'PT Kwangduk Worldwide (II)', 'kwangduk.worldwide', '123456'),
(33, 33, 'PT Leading Garment Industries', 'leading.garment', '123456'),
(34, 34, 'PT Leuwijaya Utama Textile', 'leuwijaya.utama', '123456'),
(35, 35, 'PT Long Harmony Industry', 'long.harmony', '123456'),
(36, 36, 'PT Mahameru Centratama Spinning Mills', 'mahameru.centratama', '123456'),
(37, 37, 'PT Masterindo Jaya Abadi', 'masterindo.jaya', '123456'),
(38, 38, 'PT Metro Garmin', 'metro.garmin', '123456'),
(39, 39, 'PT Namnam Fashion Industries I', 'namnam.fashion', '123456'),
(40, 40, 'PT Nirwana Alabare Garment', 'nirwana.alabare', '123456'),
(41, 41, 'PT Nisshinbo Indonesia', 'nisshinbo.indonesia', '123456'),
(42, 42, 'PT Nusantara Turbine dan Propulsi', 'nusantara.turbine', '123456'),
(43, 43, 'PT Pan Asia Jaya Abadi', 'pan.asia', '123456'),
(44, 44, 'PT Polyfin Canggih', 'polyfin.canggih', '123456'),
(45, 45, 'PT Pop Star', 'pop.star', '123456'),
(46, 46, 'PT Popular Daenong', 'popular.daenong', '123456'),
(47, 47, 'PT Saimoda Garmindo', 'saimoda.garmindo', '123456'),
(48, 48, 'PT Sanwa Part Indonesia', 'sanwa.part', '123456'),
(49, 49, 'PT Seikou Seat Cover', 'seikou.seat', '123456'),
(50, 50, 'PT Shinko Toyobo Gistex', 'shinko.toyobo', '123456'),
(51, 51, 'PT Silverkris', 'silverkris', '123456'),
(52, 52, 'PT Teodore Pan Garmindo', 'teodore.pan', '123456'),
(53, 53, 'PT Trimas Sarana Garment Industry', 'trimas.sarana', '123456'),
(54, 54, 'PT Trisco Tailored Apparel Manufacturing', 'trisco.tailored', '123456'),
(55, 55, 'PT Trisenta Interior Manufacturing', 'trisenta.interior', '123456'),
(56, 56, 'PT Unicorn Utama', 'unicorn.utama', '123456'),
(57, 57, 'PT Yakjin Jaya Indonesia', 'yakjin.jaya', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bchanggar`
--
ALTER TABLE `bchanggar`
  ADD PRIMARY KEY (`id_hanggar`);

--
-- Indexes for table `bckasi`
--
ALTER TABLE `bckasi`
  ADD PRIMARY KEY (`id_kasi`);

--
-- Indexes for table `bcuser`
--
ALTER TABLE `bcuser`
  ADD PRIMARY KEY (`id_bc`);

--
-- Indexes for table `data_izin`
--
ALTER TABLE `data_izin`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `data_jaminan`
--
ALTER TABLE `data_jaminan`
  ADD PRIMARY KEY (`id_jaminan`);

--
-- Indexes for table `data_keluar`
--
ALTER TABLE `data_keluar`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `data_masuk`
--
ALTER TABLE `data_masuk`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `data_perben`
--
ALTER TABLE `data_perben`
  ADD PRIMARY KEY (`id_jaminan`);

--
-- Indexes for table `data_realisasi`
--
ALTER TABLE `data_realisasi`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `data_status`
--
ALTER TABLE `data_status`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_hist`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indexes for table `pengusaha_detail`
--
ALTER TABLE `pengusaha_detail`
  ADD PRIMARY KEY (`id_pengusaha`);

--
-- Indexes for table `penjamindetail`
--
ALTER TABLE `penjamindetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `penjaminttd`
--
ALTER TABLE `penjaminttd`
  ADD PRIMARY KEY (`id_jaminan`);

--
-- Indexes for table `penjaminuser`
--
ALTER TABLE `penjaminuser`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `perpanjangan`
--
ALTER TABLE `perpanjangan`
  ADD PRIMARY KEY (`id_pj`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_rev`);

--
-- Indexes for table `s_status`
--
ALTER TABLE `s_status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `tpbdetail`
--
ALTER TABLE `tpbdetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tpbttd`
--
ALTER TABLE `tpbttd`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `tpbuser`
--
ALTER TABLE `tpbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bchanggar`
--
ALTER TABLE `bchanggar`
  MODIFY `id_hanggar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `bckasi`
--
ALTER TABLE `bckasi`
  MODIFY `id_kasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bcuser`
--
ALTER TABLE `bcuser`
  MODIFY `id_bc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `data_izin`
--
ALTER TABLE `data_izin`
  MODIFY `id_surat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `data_jaminan`
--
ALTER TABLE `data_jaminan`
  MODIFY `id_jaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_keluar`
--
ALTER TABLE `data_keluar`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_masuk`
--
ALTER TABLE `data_masuk`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_realisasi`
--
ALTER TABLE `data_realisasi`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `data_status`
--
ALTER TABLE `data_status`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_hist` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembatalan`
--
ALTER TABLE `pembatalan`
  MODIFY `id_pb` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengusaha_detail`
--
ALTER TABLE `pengusaha_detail`
  MODIFY `id_pengusaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penjamindetail`
--
ALTER TABLE `penjamindetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `penjaminttd`
--
ALTER TABLE `penjaminttd`
  MODIFY `id_jaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penjaminuser`
--
ALTER TABLE `penjaminuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perpanjangan`
--
ALTER TABLE `perpanjangan`
  MODIFY `id_pj` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_rev` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tpbdetail`
--
ALTER TABLE `tpbdetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tpbttd`
--
ALTER TABLE `tpbttd`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tpbuser`
--
ALTER TABLE `tpbuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
