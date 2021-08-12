-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jun 2021 pada 23.54
-- Versi server: 10.3.29-MariaDB-cll-lve
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosg9985_panti_sosial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat_admin` varchar(255) NOT NULL,
  `no_identitas` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_level` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `aktifasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `foto`, `alamat_admin`, `no_identitas`, `password`, `id_level`, `email`, `aktifasi`) VALUES
(8, 'Andy Zunaedy', 'Foto_penghuni_panti72.jpg', 'Yogyakarta ID', '32160602707970020', '$2y$10$nd5vsix3xvBArlP5jGRlbuSkU93Wmml5ItYO1vTto8PNGeV4/L7.e', 1, 'andyzunaedy@gmail.com', 1),
(15, 'Fatwa Maruf', 'FatwaMaruf.JPG', '', '', '$2y$10$VtT0e8B6uNHiUwatLVp61uTxMgC386iqUTrC3dBP01jSfDWN9sG9y', 2, 'Fatwamaruf9877@gmail.com', 0),
(16, 'Sunarti', 'lokasi.png', 'Yogyakarta', '312342341', '$2y$10$uoItvcaiauTyy.dtEHx7aOe3oaJlNVM4rClMp1QyqMthR8ShkiM5q', 2, 'Sunarti75@gmail.com', 1),
(17, 'Rubino Rubianto', 'Drs__H__Rubino_Rubianto,_M_Pd.jpg', '', '', '$2y$10$3pBYE/OcE0WVQkmNospNB.97Po//V1sz4plDYlhdQXuiQxYpr2/mu', 2, 'R_rubianto@gmail.com', 0),
(18, 'Joko Pramono', 'Drs__Joko_Pramono.jpg', '', '', '$2y$10$S7l67.iEZDHd30NdjfXsxuZA0ckV5OHFp/MmNCdT.xoCc3qa2PKQq', 2, 'Joko_pramono12@gmail.com', 0),
(19, 'yosep budi hartono', 'Foto_penghuni_panti.jpg', '', '', '$2y$10$6q1G52TFyZunzNVe3qwH..QLhhHfrAg4S5beBBgEU5y4.TBcXyCmi', 2, 'yosepbudi@gmail.com', 0),
(20, 'mahesa', '1606396445.jpg', '', '', '$2y$10$WPH3x7dK0LCepcCnbfZfMu2fOfxgffFC619L2.s0E9iQsO0qx3bmi', 2, 'mahesa@gmail.com', 0),
(21, 'nopal', 'ss.JPG', '', '', '$2y$10$jwir2zcngjly2A3Z0Ob20.UtAXes8LUT1AbD8d8bUXpms.DcR5vcC', 2, 'nopal@gmail.com', 0),
(118, 'dewa', 'Foto_penghuni_panti71.jpg', 'Yogyakarta', '32160602707970022', '$2y$10$qws8Oua51yTtGxBv7AbsJu1RU8yWNlwqadYno/zR9MkIgPbbLYJ5e', 2, 'ninehunter9@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_token`
--

CREATE TABLE `admin_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(123) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` varchar(25) NOT NULL,
  `id_kecamatan` varchar(25) NOT NULL,
  `nama_desa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `nama_desa`) VALUES
('3403032001', '340403', 'Sumberahayu'),
('3403032002', '340403', 'Sumbersari'),
('3403032003', '340403', 'Sumberagung'),
('3403032004', '340403', 'Sumberarum'),
('3404012001', '340401', 'Balecatur'),
('3404012002', '340401', 'Ambarketawang'),
('3404012003', '340401', 'Banyuraden'),
('3404012004', '340401', 'Nogotirto'),
('3404012005', '340401', 'Tringhanggo'),
('3404022001', '340402', 'Sidorejo'),
('3404022002', '340402', 'Sidoluhur'),
('3404022003', '340402', 'Sidomulyo'),
('3404022004', '340402', 'Sidoagung'),
('3404022005', '340402', 'Sidokarto'),
('3404022006', '340402', 'Sidoarum'),
('3404022007', '340402', 'Sidomoyo'),
('3404042001', '340404', 'Sendangarum'),
('3404042002', '340404', 'Sendangmulyo'),
('3404042003', '340404', 'Sendangagung'),
('3404042004', '340404', 'Sendangsari'),
('3404042005', '340404', 'Sendangrejo'),
('3404052001', '340405', 'Margoluwih'),
('3404052002', '340405', 'Margodadi'),
('3404052003', '340405', 'Margomulyo'),
('3404052004', '340405', 'Margokaton'),
('3404052005', '340405', 'Margoagung'),
('3404062001', '340406', 'Sinduadi'),
('3404062002', '340406', 'Sendangadi'),
('3404062003', '340406', 'Tlogoadi'),
('3404062004', '340406', 'Tirtoadi'),
('3404062005', '340406', 'Sumberadi'),
('3404072001', '340407', 'Caturtunggal'),
('3404072002', '340407', 'Maguwoharjo'),
('3404072003', '340407', 'Condongcatur'),
('3404082001', '340408', 'Sendangtirto'),
('3404082002', '340408', 'Tegaltirto'),
('3404082003', '340408', 'Kalitirto'),
('3404082004', '340408', 'Jogotirto'),
('3404092001', '340409', 'Sumberharjo'),
('3404092002', '340409', 'Wukiharjo'),
('3404092003', '340409', 'Gayamharjo'),
('3404092004', '340409', 'Sambirejo'),
('3404092005', '340409', 'Madurejo'),
('3404092006', '340409', 'Bokoharjo'),
('3404102001', '340410', 'Purwomartani'),
('3404102002', '340410', 'Tirtomani'),
('3404102003', '340410', 'Tamanmartani'),
('3404102004', '340410', 'Selomartani'),
('3404112001', '340411', 'Sindumartani'),
('3404112002', '340411', 'Bimomartani'),
('3404112003', '340411', 'Widodomartani'),
('3404112004', '340411', 'Wedomartani'),
('3404112005', '340411', 'Umbulmartani'),
('3404122001', '340412', 'Sariharjo'),
('3404122002', '340412', 'Minomartani'),
('3404122003', '340412', 'Sinduharjo'),
('3404122004', '340412', 'Sukoharjo'),
('3404122005', '340412', 'Sardonoharjo'),
('3404122006', '340412', 'Donoharjo'),
('3404132001', '340413', 'Caturharjo'),
('3404132002', '340413', 'Triharjo'),
('3404132003', '340413', 'Tridadi'),
('3404132004', '340413', 'Panduwoharjo'),
('3404132005', '340413', 'Trimulyo'),
('3404142001', '340414', 'Bayurejo'),
('3404142002', '340414', 'Tambakrejo'),
('3404142003', '340414', 'Sumberrejo'),
('3404142004', '340414', 'Pondokrejo'),
('3404142005', '340414', 'Mororejo'),
('3404142006', '340414', 'Margorejo'),
('3404142007', '340414', 'Lumbungrejo'),
('3404142008', '340414', 'Merdikorejo'),
('3404152001', '340415', 'Bangunkerto'),
('3404152002', '340415', 'Donokerto'),
('3404152003', '340415', 'Girikerto'),
('3404152004', '340415', 'Wonokerto'),
('3404162001', '340416', 'Purwobinangun'),
('3404162002', '340416', 'Candibinangun'),
('3404162003', '340416', 'Harjobinangun'),
('3404162004', '340416', 'Pakembinangun'),
('3404162005', '340416', 'Hargobinangun'),
('3404172001', '340417', 'Argomulyo'),
('3404172002', '340417', 'Wukisari'),
('3404172003', '340417', 'Glagaharjo'),
('3404172004', '340417', 'Kepuharjo'),
('3404172005', '340417', 'Umbulharjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_panti`
--

CREATE TABLE `galeri_panti` (
  `id_galeri` int(11) NOT NULL,
  `id_profil` varchar(50) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `nama_galeri` varchar(100) NOT NULL,
  `foto_galeri` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `aktifasi_galeri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_panti`
--

INSERT INTO `galeri_panti` (`id_galeri`, `id_profil`, `id_admin`, `nama_galeri`, `foto_galeri`, `keterangan`, `aktifasi_galeri`) VALUES
(33, '609204bb1e7a9', 118, 'foto panti', '20140104_084926.jpg', 'foto bagian depan panti', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_panti`
--

CREATE TABLE `jenis_panti` (
  `id_jenis_panti` varchar(15) NOT NULL,
  `jenis_panti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_panti`
--

INSERT INTO `jenis_panti` (`id_jenis_panti`, `jenis_panti`) VALUES
('1', 'Panti Anak'),
('2', 'Panti Disabilitas'),
('3', 'Panti Rehabilitas'),
('4', 'Rumah Singgah'),
('5', 'Panti Jompo'),
('6', 'Lks Lansia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(25) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('340401', 'Gamping'),
('340402', 'Godean'),
('340403', 'Moyudan'),
('340404', 'Minggir'),
('340405', 'Seyegan'),
('340406', 'Mlati'),
('340407', 'Depok'),
('340408', 'Berbah'),
('340409', 'Prambanan'),
('340410', 'Kalasan'),
('340411', 'Ngemplak'),
('340412', 'Ngaglik'),
('340413', 'Sleman'),
('340414', 'Tempel'),
('340415', 'Turi'),
('340416', 'Pakem'),
('340417', 'Cangkringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_profil` varchar(50) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi_k` varchar(255) NOT NULL,
  `aktifasi_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_profil`, `id_admin`, `nama_kegiatan`, `foto_kegiatan`, `tanggal`, `deskripsi_k`, `aktifasi_kegiatan`) VALUES
(23, '609204bb1e7a9', 118, 'Senam', 'flowers-2560x1440-5k-4k-wallpaper-8k-sunray-yellow-green-grass-4658.jpg', '2021-04-14', 'Senam', 1),
(24, '609204bb1e7a9', 118, 'Kerja Bakti', 'Kegiatan-Kerja-Bakti-di-Sekitar-Panti-4.jpg', '2021-03-19', 'Kerja bakti yang dilakukan oleh anak anak panti pada hari minggu', 1),
(25, '609204bb1e7a9', 118, 'Baca Al-quran Bersama', 'tahfidz-2-1024x576.jpg', '2021-04-24', 'Pengajian rutin', 1),
(26, '609204bb1e7a9', 118, 'Santunan', 'IMG-20180427-WA0057.jpg', '2021-05-03', 'Santunan ini dilakukan pada hari rabu kemarin', 1),
(27, '609204bb1e7a9', 118, 'Olahraga', 'tim-panti-asuhan-ridho-makmur_20180506_160941.jpg', '2021-04-09', 'Anak anak lelaki setiap minggu di sempatkan untuk berolahrga seperti sepak bola, bulu tangkis, dan voli', 1),
(29, '60979f5c85d01', 118, 'Bakti Sosial', '184140315_479159100173883_8434869399790532801_n.jpg', '2021-05-09', 'MasyaaAllah Buka bersama untuk Panti Asuhan Daarut Taqwa\r\n\r\nPanti asuhan Daarut taqwa mengucapkan Jazakumullah Khoyran kepada Karang Taruna yuwana wiratama sekeluarga atas kunjungan dan Donasinya untuk Panti Asuhan Daarut Taqwa semoga menjadi amal jariyah', 1),
(30, '60979f5c85d01', 118, 'Piket', '182696517_2924491787807159_1146660744284369342_n.jpg', '2021-05-07', 'PIKET......\r\n\r\nIya kata ini tentu cukup familiar tentu bagi sebagian anak2 yg pernah hidup di asrama....\r\n\r\nBukan sekedar rutinitas namun kata ini ( PIKET ) dalam kehidupan berasrama tentu banyak sekali hikmah & penanaman pendidikan karakter anak asuh ...', 1),
(31, '60979f5c85d01', 118, 'Buka Bersama', '183270017_464305431323307_973182380948215755_n.jpg', '2021-05-09', 'MasyaaAllah Buka bersama untuk Panti Asuhan Daarut Taqwa\r\n\r\nPanti asuhan Daarut taqwa mengucapkan Jazakumullah Khoyran kepada Ummati sekeluarga atas kunjungan dan Donasinya untuk Panti Asuhan Daarut Taqwa semoga menjadi amal jariyah dan barokah, dimudahka', 1),
(32, '60979f5c85d01', 118, 'Buka Bersama Puasa Sunnah Senin & Kamis', '162891669_146641557351160_4090284248828886668_n.jpg', '2021-03-23', 'Alhamdulillah,,,\r\n\"Maka nikmat Tuhanmu yang manakah yang engkau dustakan\" (Ar-Rahman)\r\n\r\nIni adalah kegiatan yang hampir rutin setiap Senin dan Kamis menjadi agenda di Panti Asuhan Daarut Taqwa yaitu kegiatan Buka Bersama Puasa Sunnah...\r\n\r\nKebersamaan in', 1),
(33, '6097704552cf4', 118, 'Santunan Lansia', '183651716_803487283904657_1124443329895321275_n.jpg', '2021-05-10', 'Santunan Lansia\r\nPanti Asuhan Putri Islam Yogyakarta', 1),
(34, '6097704552cf4', 118, 'Buka Bersama', '173852598_736766970317483_1265453078393312103_n.jpg', '2021-04-16', 'Buka puasa dan Do\'a bersama @berbagisarapanofficial . Semoga barakah untuk semua. Aamiin...????????', 1),
(35, '6097704552cf4', 118, 'Sosialisasi', '172761812_790671641573396_690660715321793888_n.jpg', '2021-04-11', 'Program gerakan memakai masker bersama BCA Syariah\r\n\r\nTerimakasih atas kunjungannya', 1),
(36, '6097704552cf4', 118, 'Bakti Sosial', '144281636_237250697929625_1679409146104795297_n.jpg', '2021-01-31', 'Terimakasih keluarga Mbak Marcella Dwinda Danti Hutami.\r\n\r\nSemoga Allah membalas kebaikan keluarga Mbak Marcella dengan kebaikan dan kebarakahan yang berlipat ganda. Aamiin..', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_kirim`
--

CREATE TABLE `komentar_kirim` (
  `id_komen` int(11) NOT NULL,
  `id_profil` varchar(50) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `komen_status` int(11) NOT NULL,
  `isi_komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar_kirim`
--

INSERT INTO `komentar_kirim` (`id_komen`, `id_profil`, `id_admin`, `nama_user`, `email_user`, `komen_status`, `isi_komentar`) VALUES
(21, '609204bb1e7a9', 118, 'mahes', 'mahesa@gmail.com', 0, 'Semoga sehat sehat ya disana anak anaknya dan pengurusnya'),
(22, '609204bb1e7a9', 118, 'dewa', 'ninehunter9@gmail.com', 21, 'terimakasih mas, semoga masnya juga sehat sehat dan lancar rezekinya ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_admin`
--

CREATE TABLE `level_admin` (
  `id_level` int(11) NOT NULL,
  `level_admin` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_admin`
--

INSERT INTO `level_admin` (`id_level`, `level_admin`) VALUES
(1, 'Admin'),
(2, 'Pengurus Panti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni_panti`
--

CREATE TABLE `penghuni_panti` (
  `id_penghuni` int(3) NOT NULL,
  `id_profil` varchar(50) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `nama_penghuni` varchar(100) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `foto_penghuni` varchar(255) NOT NULL,
  `deskripsi_p` text NOT NULL,
  `aktifasi_penghuni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghuni_panti`
--

INSERT INTO `penghuni_panti` (`id_penghuni`, `id_profil`, `id_admin`, `nama_penghuni`, `id_jk`, `umur`, `foto_penghuni`, `deskripsi_p`, `aktifasi_penghuni`) VALUES
(82, '609206311de17', 118, 'Nurudin', 1, '12', 'Foto_penghuni_panti16.jpg', 'Asli Cikarang dan menatap disini sudah 5 tahun', 1),
(83, '609204bb1e7a9', 118, 'Muhammad Rizky', 1, '14', 'Foto_penghuni_panti17.jpg', 'Berasal dari kabupaten pemalang jawa tengah kelas 2 SMP', 1),
(84, '609204bb1e7a9', 118, 'Ridho Utama', 1, '14', 'Foto_penghuni_panti18.jpg', 'Asal dari magelang dan kelas 2 SMP', 1),
(85, '609204bb1e7a9', 118, 'Fadil Ahmad', 1, '13', 'Foto_penghuni_panti19.jpg', 'Asli Yogyakarta dan sedang duduk dikelas 1 smp', 1),
(86, '609204bb1e7a9', 118, 'Faruq', 1, '14', 'Foto_penghuni_panti20.jpg', 'Berasal dari brebes dan sekarang duduk dikelas 2 SMP', 1),
(87, '609204bb1e7a9', 118, 'Muhammad Abdul', 1, '14', 'Foto_penghuni_panti21.jpg', 'Berasal dari magelang dan duduk dikelas 2 SMP', 1),
(88, '609204bb1e7a9', 118, 'Nurcahyo', 1, '14', 'Foto_penghuni_panti22.jpg', 'Berasal dari pekalongan dan duduk dikelas 2 SMP', 1),
(89, '609204bb1e7a9', 118, 'Andy Maulana', 1, '14', 'Foto_penghuni_panti23.jpg', 'Berasal dari magelang dan sedang duduk di kelas 2 SMP', 1),
(90, '609204bb1e7a9', 118, 'Joko priadi', 1, '13', 'Foto_penghuni_panti24.jpg', 'Berasal dari cilegon dan duduk dikelas 2 SMP', 1),
(91, '609204bb1e7a9', 118, 'Maulana', 1, '14', 'Foto_penghuni_panti25.jpg', 'Berasal dari Yogyakarta dan duduk dikelas 2 smp', 1),
(92, '609204bb1e7a9', 118, 'Amin', 1, '13', 'Foto_penghuni_panti26.jpg', 'Berasal dari temanggung dan sedang duduk dikelas 2 smp', 1),
(93, '609204bb1e7a9', 118, 'Budi', 1, '14', 'Foto_penghuni_panti27.jpg', 'Berasal dari magelang dan sedang duduk di kelas 2 SMP', 1),
(94, '609204bb1e7a9', 118, 'Malliq', 1, '13', 'Foto_penghuni_panti28.jpg', 'Berasal dari temanggung dan sedang duduk dikelas 2 SMP', 1),
(95, '609204bb1e7a9', 118, 'Dwi', 2, '14', 'Foto_penghuni_panti29.jpg', 'Berasal dari pemalang dan duduk dikelas 2 SMP', 1),
(96, '609204bb1e7a9', 118, 'Anggun', 2, '13', 'Foto_penghuni_panti30.jpg', 'Berasal dari Pamulang dan sedang duduk dikelas 2 smp', 1),
(97, '609204bb1e7a9', 118, 'Putri', 2, '13', 'Foto_penghuni_panti31.jpg', 'Berasal dari Cirebon dan duduk dikelas 2 SMP', 1),
(98, '609204bb1e7a9', 118, 'Riska', 2, '14', 'Foto_penghuni_panti32.jpg', 'Berasal dari Klaten dan duduk dikelas 2 SMP', 1),
(99, '609204bb1e7a9', 118, 'Lia', 2, '14', 'Foto_penghuni_panti33.jpg', 'Berasal dari daerah prambanan dan sedang duduk di kelas 2 SMP', 1),
(100, '609204bb1e7a9', 118, 'Andi', 1, '15', 'Foto_penghuni_panti34.jpg', 'Berasal dari Magelang dan duduk dikelas 3 SMP', 1),
(101, '609204bb1e7a9', 118, 'Rido Yanuar', 1, '15', 'Foto_penghuni_panti35.jpg', 'Berasal dari NTT dan sedang duduk dikelas 3 SMP', 1),
(102, '609204bb1e7a9', 118, 'Hilman', 1, '15', 'Foto_penghuni_panti36.jpg', 'Berasal dari Pamulang dan sedang duduk di kelas 3 SMP', 1),
(103, '609204bb1e7a9', 118, 'Ahmad dwi', 1, '15', 'Foto_penghuni_panti37.jpg', 'Berasal dari Wates dan sedang duduk dikelas 3 SMP', 1),
(104, '609204bb1e7a9', 118, 'Ahmad gufron', 1, '15', 'Foto_penghuni_panti38.jpg', 'Berasal dari kulonprogo dan sedang duduk dikelas 3 SMP', 1),
(105, '609204bb1e7a9', 118, 'Bambang yudi', 1, '15', 'Foto_penghuni_panti39.jpg', 'Berasal dari godean dan sedang duduk di kelas 3 SMP', 1),
(106, '609204bb1e7a9', 118, 'Lela', 2, '15', 'Foto_penghuni_panti40.jpg', 'Berasal dari klaten dan sedang duduk di bangku kelas 3 SMP', 1),
(107, '609204bb1e7a9', 118, 'Dwi Putri', 2, '15', 'Foto_penghuni_panti41.jpg', 'Berasal dari Cirebon dan duduk di bangku kelas 3 SMP', 1),
(108, '609204bb1e7a9', 118, 'Fatimah', 2, '15', 'Foto_penghuni_panti42.jpg', 'Berasal dari Pemalang dan sedang duduk dikelas 3 SMP', 1),
(109, '60976e19784d6', 118, 'Geriansah', 1, '12', 'Foto_penghuni_panti43.jpg', 'Berasal dari pemalang dan sedang duduk di kelas 1 SMP', 1),
(110, '60976e19784d6', 118, 'Melani', 2, '8', 'Foto_penghuni_panti44.jpg', 'Berasal dari yogyakarta dan duduk dikelas 3', 1),
(111, '60976e19784d6', 118, 'Fahmi Dwi', 1, '16', 'Foto_penghuni_panti45.jpg', 'Berasal dari sleman dan duduk dikelas 11 SMA', 1),
(112, '60976e19784d6', 118, 'Joko', 1, '16', 'Foto_penghuni_panti46.jpg', 'Berasal dari kebumen dan duduk dikelas 11 SMA', 1),
(113, '60976e19784d6', 118, 'Putri aminah', 2, '15', 'Foto_penghuni_panti47.jpg', 'Berasal dari magelang dan sedang duduk di kelas 9 SMP', 1),
(114, '60976e19784d6', 118, 'Anto', 1, '16', 'Foto_penghuni_panti48.jpg', 'Berasal dari kaliurang dan sedang duduk di kelas 10 SMA', 1),
(115, '60976e19784d6', 118, 'Fadil rahmad', 1, '17', 'Foto_penghuni_panti49.jpg', 'Berasal dari godean dan sedang duduk di kelas 12 SMA', 1),
(116, '60976e19784d6', 118, 'Antoni', 1, '14', 'Foto_penghuni_panti50.jpg', 'Berasal dari klaten dan sedang duduk di kelas 8 SMP', 1),
(117, '60976e19784d6', 118, 'Rina', 2, '16', 'Foto_penghuni_panti51.jpg', 'Berasal dari prambanan dan sedang duduk di kelas 11 SMA', 1),
(118, '60976e19784d6', 118, 'Rani', 2, '17', 'Foto_penghuni_panti52.jpg', 'Berasal dari prambanan dan sedang duduk dikelas 12 SMA', 1),
(119, '60976e19784d6', 118, 'Maharjati', 2, '11', 'Foto_penghuni_panti53.jpg', 'Berasal dari temanggung dan sedang duduk di kelas 6 SD', 1),
(120, '60976e19784d6', 118, 'Riski Dwi', 1, '15', 'Foto_penghuni_panti54.jpg', 'Berasal dari bantul dan sedang duduk di kelas 10 SMA', 1),
(121, '60976e19784d6', 118, 'Mahres', 1, '9', 'Foto_penghuni_panti55.jpg', 'Berasal dari bantul dan sedang duduk di kelas 3 SD', 1),
(122, '60976e19784d6', 118, 'Dwinur', 1, '10', 'Foto_penghuni_panti56.jpg', 'Berasal dari Sleman dan sedang duduk di kelas 5 SD', 1),
(123, '60976e19784d6', 118, 'Nani', 2, '13', 'Foto_penghuni_panti57.jpg', 'Berasal dari magelang dan sedang duduk di kelas 7 SMP', 1),
(124, '60976e19784d6', 118, 'Arif rahmad', 1, '8', 'Foto_penghuni_panti58.jpg', 'Berasal dari temanggung dan sedang duduk di kelas 2 SD', 1),
(125, '60976e19784d6', 118, 'Hadi', 1, '15', 'Foto_penghuni_panti59.jpg', 'Berasal dari sleman dan sedang duduk di kelas 10 SMA', 1),
(126, '60976e19784d6', 118, 'Ihsan', 1, '11', 'Foto_penghuni_panti60.jpg', 'Berasal dari magelang dan sedang duduk di kelas 6 SD', 1),
(127, '60976e19784d6', 118, 'haryanto', 1, '17', 'Foto_penghuni_panti61.jpg', 'Berasal dari Tempel dan sedang duduk di kelas 12 SMA', 1),
(128, '60976e19784d6', 118, 'Mahesa dwi', 1, '15', 'Foto_penghuni_panti62.jpg', 'Berasal dari godean dan sedang duduk di kelas 10 SMA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_panti`
--

CREATE TABLE `profil_panti` (
  `id_profil` varchar(50) NOT NULL,
  `id_kecamatan` varchar(25) NOT NULL,
  `id_desa` varchar(25) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_jenis_panti` varchar(15) NOT NULL,
  `nama_panti` varchar(100) NOT NULL,
  `nomor_izin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `foto_p` varchar(255) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `aktifasi_profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_panti`
--

INSERT INTO `profil_panti` (`id_profil`, `id_kecamatan`, `id_desa`, `id_admin`, `id_jenis_panti`, `nama_panti`, `nomor_izin`, `alamat`, `lat`, `lng`, `foto_p`, `telpon`, `email`, `deskripsi`, `aktifasi_profil`) VALUES
('609204bb1e7a9', '340413', '3404132003', 118, '1', 'Panti Asuhan Daarul \'Ilmi', '222/4145/KP2TSP/2018', 'JL. MAGELANG Km 11 MURTEN TRIDADI SLEMAN', '-7.730619078393951', '110.33913310371652', 'pantidarulilmu.jpg', '08121579301', 'ninehunter9@gmail.com', 'Merupakan panti asuhan yang berada di Kabupaten Sleman. Panti asuhan ini merawat dan mendidik anak-anak yatim piatu serta anak-anak terlantan. Panti Asuhan Darul \'ilmi memenuhi kebutuhan anak-anak yang dirawatnya mulai dari makanan hingga sekolahnya.\r\n\r\nPanti asuhan Kabupaten Sleman terbuka terhadap bantuan donatur dan sumbangan warga. Segera kunjungi panti asuhan terdekat ini jika Anda hendak menyalurkan bantuan atau sumbangan, atau bisa juga menghubungi melalui kontak telepon jika tersedia.', 1),
('609206311de17', '340403', '3403032002', 118, '1', 'YAYASAN MUSTADH\'AFIN BINA INSANI', '222/4702/KP2TSP/2018', 'DAKAWON, SOMBANGAN, SUMBERSARI, MOYUDAN, SLEMAN, YOGYAKARTA', '-7.781650131358089', '110.26688396930695', 'pantibinainsani.jpg', '08179424651', 'ninehunter9@gmail.com', 'Ada rasa trenyuh dan kasihan (dalam bahasa Jawanya: mesakake) melihat anak-anak yang masih butuh uluran tangan dan pertolongan dari Ibu atau Ayah bahkan keduanya. Akan tetapi, pada kenyataannya Alloh memanggil mereka.\r\nKami tak kuat, tak tahan membendung air mata pada anak-anak yang seperti ini. Mereka merasakan betapa menderita, karena masih membutuhkan bantuan, masih ingin dalam gendongan, masih ingin dalam belaian kasih sayangnya, tetaoi Alloh berkehendak lain.\r\nAkhirnya kamu punya tekad untuk berusaha membantu meringankan beban penderitaan anak-anak tersebut semampu kami. Maka perlu adanya wadah untuk mewujudkannya, dan dlhamdulillah, pada tanggal 5 Mei 2005 kami bangun lembaga yang bernama “Lembaga Penyantun Anak Yatim Piatu dan Dhuafa Mustadh’afin” (LPAY & D) di sebuah rumah yang berukuran 11 x 12 m2 yang pada mulanya hanya terisi 9 anak. Kemudian semakin hari semakin bertambah, hingga pada bulan Juli 2005 ada 23 anak.\r\nPada tanggal 10 Juli 2005, kami mengadakan khitanan massal dan pengajian akbar yang juga dihadiri oleh masyarakat sekitar, tokoh-tokoh agama, pejabat kelurahan serta kecamatan. Bapak Camat Moyudan, Drs. Kuntadi turut hadir dan beliau pula yang membuka acara sekaligus meresmikannya. Acara kemudian dilanjutkan dengan hiburan nasyid yang dibawakan oleh anak-anak kita dan terakhir pengajian oleh Bapak Drs. H. Hadi Suprapto.\r\nKemudian kami mendapatkan kepercayaan dari bapak H. Mundzakir untuk menempati rumahnya yang ada di Dakawon hingga saat ini. Sedangkan Ibu Syamsudin telah mewakafkan tanah pekarangannya kepada kami seluas 730 m2.', 1),
('6092085312f0c', '340404', '3404042005', 118, '1', 'PANTI ASUHAN MUHAMMADIYAH MINGGIR (MEKAR MELATI)', '222/5711/KP2TSP/2016', 'SIDOREJO RT 06 RW 28 SENDANGREJO MINGGIR', '-7.717625634517111', '110.2671620217404', 'pantiasuhanmekar.jpg', '08121588696', 'ninehunter9@gmail.com', 'Kegiatan utama Panti Asuhan adalah melakukan usaha dibidang kesejahteraan sosial dengan memberi santunan kepada fakir miskin, yatim, yatim piatu dan anak terlantar baik di dalam maupun di luar panti.', 1),
('609209c2d7bed', '340412', '3404122004', 118, '2', 'YAYASAN KRISTEN UNTUK KESEHATAN UMUM (YAKKUM)', '222/5042/KP2TSP/2018', 'JL. KALIURANG KM 13,5 BESI, SUKOHARJO, NGAGLIK, SLEMAN', '-7.6923995643297856', '110.4179117817911', 'yayasankesehatan.jpg', '0274895386', 'ninehunter9@gmail.com', 'Pusat Rehabilitasi YAKKUM didirikan pada tanggal 16 November 1982 dengan nama Proyek Rehabilitasi Bethesda atas prakarsa dari Colin McLennan dari Selandia Baru. Proyek ini didirikan untuk menolong penyandang disabilitas fisik yang ada di Indonesia dengan dukungan dana dari Persekutuan Gereja Presbyterian & Methodist di Selandia Baru.\r\n\r\nPendirian lembaga ini atas  persetujuan Sidang Dewan Gereja Indonesia di Tomohan Sulawesi Utara. Pada awalnya, lembaga ini bernama Proyek Rehabilitasi Bethesda yang kemudian diampu langsung implementasinya oleh Rumah Sakit Bethesda. Dengan bantuan dana dari EZE pada tahun 1987 lembaga ini berhasil membangun gedung di Jl. Kaliurang Km.13,5, Besi, Yogyakarta diatas tanah seluas 9000 meter persegi. Dan pada tahun 1991 berganti nama dari Proyek Rehabilitasi Bethesda menjadi Pusat Rehabilitasi YAKKUM.\r\n\r\nProgram yang dikembangkan pada periode 1982-1994 lebih banyak membantu anak dan remaja penyandang disabiltas fisik agar mereka dapat mandiri secara fisik dan ekonomi. Pada waktu itu, kegiatan yang dilakukan masih sebatas rehabilitasi fisik dengan operasi, pelayanan klinik, fisioterapi, pendidikan, pemberian alat bantu dan kursus ketrampilan.\r\n\r\nPada periode 1996-2004 mulai ada perkembangan program okupasi terapi dan psikososial, sebagai bentuk jawaban terhadap kebutuhan penyandang disabilitas. Kemudian pada tahun 2007, selain masih mengimplementasikan program yang sudah ada, Pusat Rehabilitasi YAKKUM juga mulai banyak terjun ke program Rehabilitasi Bersumberdaya Masyarakat (RBM). Program RBM ini lebih banyak dilakukan langsung di masyarakat sebagai bentuk edukasi terhadap masyarakat untuk dapat menciptakan rehabilitasi mandiri yang bersumberdaya masyarakat. Sejalan dengan program tersebut, Pusat Rehabiliatsi YAKKUM juga membangun sebuah program livelihood untuk penyandnag disabilitas sebagai salah satu upaya peningkatan pendapatan ekonomi penyandang disabilitas. \r\n\r\nPada tahun 2011, Pusat Rehabilitas YAKKUM juga mulai mengembangkan Program Pengurangan Resiko Bencana Inklusif. Program ini merupakan program edukasi kepada masyarakat serta penyandang disabilitas di dalamnya dalam mengurangi resiko bencana sekaligus sebagai ranah advokasi penyandang disabilitas untuk bisa ikut memiliki peran di dalam masyarakat. Kesemua perkembangan yang terjadi tersebut tidak terlepas dari dukungan dan kerjasama dengan berbagai pihak, baik dari pihak pemerintah, non-pemerintah serta masyarakat sendiri.', 1),
('60920b3e75a94', '340412', '3404122006', 118, '2', 'PANTI ASUHAN BINA REMAJA DONOHARJO', '222/5967/KP2TSP/2017', 'BANTARAN DONOHARJO NGAGLIK', '-7.704934786994285', '110.3817689742577', 'binaremaja.jpeg', '081227101505', 'ninehunter9@gmail.com', 'Merupakan panti asuhan yang berada di Kabupaten Sleman. Panti asuhan ini merawat dan mendidik anak-anak yatim piatu serta anak-anak terlantan. Panti Asuhan Bina Remaja Donoharjo memenuhi kebutuhan anak-anak yang dirawatnya mulai dari makanan hingga sekolahnya.\r\n\r\nPanti asuhan Kabupaten Sleman terbuka terhadap bantuan donatur dan sumbangan warga. Segera kunjungi panti asuhan terdekat ini jika Anda hendak menyalurkan bantuan atau sumbangan, atau bisa juga menghubungi melalui kontak telepon jika tersedia.', 1),
('60920d52c495a', '340414', '3404142005', 118, '2', 'LEMBAGA KESEJAHTERAAN SOSIAL', '222/4303/KP2TSP/2017', 'PLUMBON MOROREJO TEMPEL SLEMAN 085643029918', '-7.663006266044555', '110.33073185647733', 'LEMBAGA_KESEJAHTERAAN_SOSIAL.JPG', '081931736762', 'ninehunter9@gmail.com', 'Pendidikan dan pengasuhan anak berkebutuhan khusus di Kabupaten Sleman Provinsi D.I. Yogyakarta tak lepas dari kontribusi para pengurus Lembaga Kesejahteraan Sosial (LKS). Salah satu LKS yang menunjukkan peran nyatanya dalam menggali potensi anak berkebutuhan khusus di Sleman adalah LKS Wiyati Dharma Sleman.', 1),
('60920fed682f0', '340406', '3404062001', 118, '5', 'Yayasan Wredha Mulya', '\'222/5448/KP2TSP/2018', 'Sendowo, RT 13/ Rw 56, Blok C No.1 A1, Sinduadi, Mlati, Sleman 55284', '-7.7722590073473885', '110.37115331328283', 'Panti_Wredha_Mulya.JPG', '02274542049', 'ninehunter9@gmail.com', 'Panti asuhan putri yatim dan du\'afa Muhammadiyah Pramaban dirintis\r\ndan didirikan oleh H.Badarudin,BA, H.Anshorudin,BA, H.Murmadi, AR dan beberapa\r\ntoko masyarakat di Prambanan. beridirinya panti asuhan putri yatim piatu dan duafa Muhammada Prambanan\r\ndi Kalasan dilatar belakangi oleh adanya anak yatim piatu dan duafa(terlantar) yang tidak berpendidikan dan adanya perinta Allah SWT dalam Al-quran surat Al-Maun serta kader mubalig.', 1),
('60976e19784d6', '340409', '3404092006', 118, '1', 'PANTI ASUHAN YATIM PIATU DAN DHU\'AFA MUHAMMADIYAH', '222/3751/KP2TSP/2018', 'JL. PRAMBANAN-PIYUNGAN KM 1 RINGINSARI RT 001/RW 011 BOKOHARJO PRAMBANAN', '-7.762722068409699', '110.48763216472074', 'PANTI_ASUHAN_YATIM_PIATU_DAN_DHUAFA_MUHAMMADIYAH.JPG', '0274-496099', 'ninehunter9@gmail.com', 'Merupakan panti asuhan yang beralamat jalan prambanan', 1),
('60976f20f0999', '340416', '3404162004', 118, '1', 'PANTI ASUHAN SABILUL HUDA', '188/0004/V.I /2010', 'JL. KALIURANG KM 17 SUKUNAN PAKEMBINANGUN PAKEM SLEMAN', '-7.667470092118598', '110.41849582783226', 'panti_asuhan_sabilul_huda.jpg', '0274-895475', 'ninehunter9@gmail.com', 'Yayasan Bangkit Sejahtera adalah yayasan yang bergerak dibidang sosial keagamaan, yang telah bergerak sejak tahun 1998, dan dikukuhkan secara hukum pada tanggal 1 ramadhan 1427 H, 23 September 2006 dengan nama awal Yayasan Sabilulhuda. Mulai proses pendaftaran ke Menkumham dan berubah nama menjadi Yayasan Bangkit Sejahtera pada tanggal 1 Djulhijah 1433 H, 17 Oktober 2012 di Yogyakarta', 1),
('6097704552cf4', '340408', '3404082002', 118, '1', 'PANTI ASUHAN YATIM PUTRI KHOIRUNNISA', '222/783/KP2TSP/2017', 'KUTON TEGALTIRTO BERBAH SLEMAN', '-7.769973584269926', '110.40782546764767', 'PANTI_ASUHAN_YATIM_PUTRI_KHOIRUNNISA.jpg', '0274-7023000', 'ninehunter9@gmail.com', 'Panti Asuhan Yatim Putri Khairunnisa adalah organisasi sosial keagamaan yang lahir ditengah-tengah masyarakat bangsa Indonesia. Kiprahnya sangat positif dan dinamis dibidang sosial keagamaan dalam rangka mencapai cita-cita mengangkat harkat kaum dhuafa agar dapat meningkatkan taraf hidupnya, maju berkembang, selaras dengan warga masyarakat dalam memenuhi kebutuhan hidup normal.', 1),
('609771a0c2268', '340412', '3404122001', 118, '1', 'PANTI ASUHAN DAN PONDOK PESANTREN ZUHRIYAH', '222/354/GR.I/2015', 'JL. PALAGAN TENTARA PELAJAR KM 10 RT/RW 03/02 REJODANI SARIHARJO NGAGLIK SLEMAN', '-7.707812169449041', '110.38938519693762', 'PANTI_ASUHAN_DAN_PONDOK_PESANTREN_ZUHRIYAH.JPG', '0274-866663', 'ninehunter9@gmail.com', 'Panti Asuhan Zuhriyah adalah Panti Asuhan yang menjadi Panti Asuhan yang mengakomodir atau menerima semua lapisan Anggota Masyarakat Indonesia artinya siapa saja Rakyat Indonesia yg berminat untuk menjadi Anggota Panti Asuhan Zuhriyah', 1),
('609773894d1b5', '340416', '3404162003', 118, '1', 'YAYASAN SAHABAT MANUSIA PEMBUTUH CINTA', '466/02832/PZ/2019', 'KATEN RT 002 RW 013 HARJOBINANGUN PAKEM SLEMAN', '-7.666372540878106', '110.41521383113509', 'yayasanhamba.JPG', '0274-898011', 'ninehunter9@gmail.com', 'Anak-anak yang diasuh Yayasan HAMBA kebanyakan berasal dari keluarga tertolak. Mereka mengikuti pendidikan di sekolah umum di sekitar yayasan, mulai PAUD hingga SMK. Beberapa anak yang berkebutuhan khusus dengan kategori ringan tetap diasuh oleh Yayasan dan menjalani terapi secara teratur. Dalam menjalankan misinya, Yayasan HAMBA senantiasa berkoordinasi dengan lembaga – lembaga mitra termasuk Dinas Sosial Kabupaten Sleman dan Dinas Sosial Provinsi DIY. Sejak 2015, Yayasan HAMBA bermitra dengan SOS Children Village Indonesia.\r\n\r\nDi yayasan HAMBA memakai sistem pengasuhan keluarga. Oleh karena itu seorang pengasuh bertindak sebagai sosok ibu pengganti untuk anak- anak. Sosok ibu pengganti harus punya kasih.', 1),
('609775284a445', '340407', '3404072003', 118, '1', 'YAYASAN SAYAP IBU', '222/5979/KP2TSP/2018', 'JL. RAJAWALI NO 3 PRINGWULUNG CONDONGCATUR DEPOK SLEMAN', '-7.676130941906061', '110.44025658722225', 'IMG-20151102-WA0000.jpg', '0274-514068', 'ninehunter9@gmail.com', 'Keberadaan anak-anak yang berada di Panti 1 merupakan anak serahan dan temuan. Istilah anak seraha merupakan anak yang diserahkan oleh orang tua biologis anak kepada negara dalam hal ini melalui Dinas Sosial, dan anak temuan adalah anak yang tidak diketahui asal-usulnya dan ditemukan di tempat tertentu dan tidak diketahui orang tua atau walinya.', 1),
('609777b08c8f8', '340405', '3404052005', 118, '1', 'PANTI SOSIAL ASUHAN ANAK MUHAMMADIYAH SEYEGAN', '222/118/KP2TSP/2018', 'KOMPLEK SMK MUH. SEYEGAN, MARGOAGUNG SEYEGAN SLEMAN', '-7.712353858768804', '110.3064033104299', 'rsz_whatsapp_image_2020-06-09_at_14-35-03.jpg', '0274-7435956', 'ninehunter9@gmail.com', 'merupakan panti asuhan yang beralamat KOMPLEK SMK MUH. SEYEGAN, MARGOAGUNG SEYEGAN SLEMAN', 1),
('609778ac61048', '340412', '3404122006', 118, '1', 'PANTI ASUHAN AS SAKINAH', '222/489/GR.I/2012', 'JL. PALAGAN TENTARA PELAJAR KM 14,5 BALONG DONOHARJO NGAGLIK SLEMAN', '-7.710017168148199', '110.38468691643912', 'PANTI_ASUHAN_AS_SAKINAH.jpg', '087838270881', 'ninehunter9@gmail.com', 'Berdiri sejak tahun 2009 | Pengasuhan anak yatim dhuafa untuk pendidikan agama dan akhlak', 1),
('609779e66bf77', '340415', '3404152002', 118, '1', 'PANTI ASUHAN AL MUBAAROK', '188/3016/V.I', 'PULIHREJO RT 02 / RW 03 KARANGANYAR DONOKERTO TURI SLEMAN', '-7.646155250663504', '110.35018219312542', 'PANTI_ASUHAN_AL_MUBAAROK.jpg', '0274-896247', 'ninehunter9@gmail.com', 'Merupakan Panti Asuhan yang berbasis pesantren ( Tahfidz Al Qur\'an)untuk pendidikan agama bagi yatim piatu dan dhuafa.', 1),
('60977b3bd8a43', '340407', '3404072001', 118, '1', 'YAYASAN AL ISLAM', '222/4703/KP2TSP/2018', 'JL. WISATA NO 267 A TAMBAKBAYAN CATURTUNGGAL DEPOK SLEMAN', '-7.775163955503315', '110.41707633194898', 'YAYASAN_AL_ISLAM.jpg', '0274-485105', 'ninehunter9@gmail.com', 'Menegakkan tauhid berdasarkan pemahaman ahlussunnah wal jama\'ah yang berdasarkan al-Qur\'an dan Hadist, menggugah kesadaran umat islam akan pentingnya menghindari penyakit STBC (Syirik, Takhayul, Bid\'ah, Churafat), menjadikan Al-Islam sebagai wahana kegiatan sekaligus sebagai perekat umat islam tanpa memandang suku kelompok maupun golongan.', 1),
('60977c38a2e0f', '340412', '3404122005', 118, '1', 'RUMAH YATIM ARROHMAN INDONESIA', '222/5653/KP2TSP/2016', 'JL. KALIURANG KM 9,2 KLABANAN SARDONOHARJO NGAGLIK', '-7.725030736033107', '110.39828092453322', 'RUMAH_YATIM_ARROHMAN_INDONESIA.jpg', '0274-8231000', 'ninehunter9@gmail.com', 'April 1997, salah seorang rekan kami ( Sdr. Abdullah ) meninggal dunia. Penyakit ginjalnya yang sudah akut memisahkannya dari kehidupan ini, dari seorang isteri dan dari empat orang buah hatinya yang masih kecil-kecil. M. Iqbal (5 Thn), Aty Nuraini (3,5), M. Faruq Waliullah (2) dan Salma Hanifah (5 Bln) harus menerima kenyataan menghadapi dan menjalani kehidupan tanpa kasih sayang dan bimbingan sang ayah. Kondisi ini membuat kami merasa sangat prihatin. Tak terbayangkan bagaimana sang ibu (Zainab Hayati, 36 Thn) akan berjuang membesarkan, dan memberikan bekal terbaik untuk masa depan keempat buah hatinya. Bekal yang ditinggalkan almarhum pun tidaklah terlalu besar dan tentu akan sangat minim untuk membiayai dan memenuhi segala kebutuhan mereka. Kami pun tergerak untuk membantu mereka. Dengan segala keterbatasan yang ada kami mencoba menyisihkan apa yang kami miliki untuk membantu mereka memenuhi kebutuhannya yang untuk kondisi seperti sekarang ini memang tidak mudah.\r\n\r\nSecara bersama, kami mengontrak sebuah rumah sederhana untuk tempat tinggal mereka dan kami pun upayakan mereka dapat bersekolah sebagaimana layaknya.', 1),
('60977daab4253', '340415', '3404152003', 118, '1', 'YAYASAN GHIFARI', '188/7122/V.3/2008', 'DUSUN PELEM, GIRIKERTO, TURI', '-7.5918776731407', '110.39695232549572', 'YAYASAN_GHIFARI.JPG', '08175451356', 'ninehunter9@gmail.com', 'Mencetak kader-kader Muhammadiyah yang hafidh quran, terampil, mandiri, dan berakhlak mulia serta bermanfaat bagi agama nusa dan bangsa', 1),
('60978908c89c2', '340413', '3404132005', 118, '1', 'Panti Asuhan Yayasan Al-Barokah Jogokerten', '222/1024/KP2TSP/2018', 'JL. SALAK NO 14 JOGOKERTEN TRIMULYO SLEMAN', '-7.680857322087849', '110.35462697215175', 'Panti_Asuhan_Al-Barokah_Sleman.jpg', '0274-869256', 'ninehunter9@gmail.com', 'Panti asuhan ini beralamatkan JL. SALAK NO 14 JOGOKERTEN TRIMULYO SLEMAN', 1),
('60978a0a9f008', '340416', '3404162001', 118, '1', 'PANTI ASUHAN PUTRI MUHAMMADIYAH PAKEM', '222/4500/KP2TSP/2016', 'JAMBLANGAN PURWOBINANGUN PAKEM SLEMAN', '-7.653208729857603', '110.39446894111693', 'PANTI_ASUHAN_PUTRI_MUHAMMADIYAH_PAKEM.jpg', '0274-896481', 'ninehunter9@gmail.com', 'Panti Asuhan Putri  Muhammadiyah Pakem  di  Dusun Jamblangan, Purwobinangun,  Pakem, Sleman bukan hanya memberikan pendidikan formal  (SD-SMA)  namun juga dengan kajian agama dan keterampilan.bagi anak asuhnya', 1),
('60978ac2484fa', '340410', '3404102001', 118, '1', 'PANTI ASUHAN GRIYA KASIH VICTORY', '222/2755/KP2TSP/2018', 'DUSUN KADIROJO I, RT/RW 05/02 PURWOMARTANI KALASAN SLEMAN', '-7.769220083965085', '110.44662853926644', 'PANTI_ASUHAN_GRIYA_KASIH_VICTORY.JPG', '0274-4987760', 'ninehunter9@gmail.com', 'Panti Asuhan GRIYA KASIH VICTORY ini didirikan oleh YAYASAN VICTORY  atas inisiatif /gagasan dari Bpk. Jakub Budi Djatmiko dan ibu Maryati Budi Mulyono pada saat rapat di Malang. Panti asuhan ini diresmikan pada tanggal 5 Agustus 2001 oleh Bpk. Budi Mulyono selaku ketua Yayasan Victory pada saat itu, dengan tujuan melayani anak-anak dari keluarga tidak mampu sehingga memiliki harapan taraf hidup yang lebih baik.\r\n\r\nNamun karena satu dan lain hal, Yayasan Victory dibubarkan pada tahun 2003. Maka berdirilah PERKUMPULAN GRIYA KASIH VICTORY dengan Badan Pendiri Bpk. Ir. Jakub Budi Djatmiko, MM dan Bpk. Ir. Soeprayitno pada tahun 2009, untuk memberikan payung hukum bagi Panti Asuhan Griya Kasih Victory.\r\n\r\nPanti Asuhan ini semula berlokasi di Dusun Weron, Umbulharjo, Cangkringan, Sleman, Daerah Istimewa Yogyakarta. Namun karena meletusnya Gunung Merapi pada tahun 2010, maka panti asuhan ini pindah lokasi, menempati bangunan baru di Desa Kadirojo I, Purwomartani, Kalasan, Sleman, Daerah istimewa Yogyakarta, atas bantuan dari para donatur.\r\n\r\nHingga tahun 2016, panti asuhan ini telah menampung 40 anak dari berbagai daerah di Indonesia dan telah mengentaskan 17 anak lulus SLTA, 8 diantaranya berhasil melanjutkan pendidikan ke perguruan tinggi atas bantuan dari donatur.', 1),
('60978b8430ad6', '340409', '3404092005', 118, '1', 'YAYASAN YATIM PIATU DAN DHU\'AFA AL-BAROKAH', '222/4989/KP2TSP/2017', 'KETANDAN MADUREJO PRAMBANAN SLEMAN', '-7.799534482662264', '110.48479274511463', 'YAYASAN_YATIM_PIATU_DAN_DHUAFA_AL-BAROKAH.JPG', '085228666443', 'ninehunter9@gmail.com', 'Awal mula berdirinya panti asuhan Al-Barokah berasal dari pengajian ibu-ibu-ibu yang menyantuni anak-anak yang tidak mampu, anggota dari pengajian tersebut berjumlah 15 orang. Perkumpulan ibu-ibu tersebut telah puluhan tahun berjalan, terdapat pula perkumpulan bapakbapak yang berkumpul pada jumat wage. Berasal dari perkumpulanperkumpulan tersebut, muncul ide untuk menampung anak-anak yang tidak mampu, yatim maupun piatu.', 1),
('60978cbf377a9', '340403', '3403032004', 118, '1', 'BADAN AMAL SHALEH AMANAH', '222/779/GR.I/2012', 'KLEPU SUMBERARUM MOYUDAN SLEMAN', '-7.776893381752517', '110.32913091043048', 'BADAN_AMAL_SHALEH_AMANAH.jpg', '0274-6526956', 'ninehunter9@gmail.com', 'LPA BASA beralamatkan di desa Klepu, Rt: 1 Rw: 1 Sumberarum Kecamatan Moyudan Kabupaten Sleman Yogyakarta / Jl. Godean KM 16,4. Pada awalnya Panti Asuhan BASA bernama LPA BASA singkatan dari Lembaga Penyantunan (mulanya Lembaga Pendidikan) Anak Asuh Badan Amal Shaleh Amanah, bernaung di bawah Yayasan Keluarga Muslim Indonesia (YKMI). Dirintis tahun 1985 oleh Drs. H. Sunarto, Akt., diresmikan pada tangga l22 Desember 2006 dengan status terdaftar pada kanwil Depsos Prop. DIY No: 08/C1s/Kw1/I Tanggal 31 Januari 1991. (Akte Notaris : Ny. Soemi Sajogjo Moedito Mardjikoen, SH no: 1 tanggal 1 Maret 1991). Awalnya sekelompok mahasiswa menyelenggarakan kajian keislaman yang kemudian bersepakat untuk menindaklanjutinya dengan upaya memberi perhatian kepada anak-anak dhuafa, terutama dalam hal pendidikan formal. Tahun 1986 memperoleh wakaf dari keluarga Hj. Siswoharjono berupa sebidang tanah di Klepu, Sumberarum, Moyudan, Sleman dan disitulah LPA BASA terus berkembang hingga kini. Visi dan Misi Visi : Mengantar anak menuju gerbang kemandirian, bertumpu pada upaya penguatan ketrampilan, akhlak serta ilmu guna meraih masa depan lebih baik Misi : Mengembangkan pembekalan ketrampilan dasar, interaksi sosial, bimbingan ibadah serta pendidikan formal sehingga menjadi insan yang bermanfaat dan sadar akan keberadaannya (mandiri, berwawasan, berakhlak mulia).', 1),
('60978db172a57', '340407', '3404072001', 118, '1', 'PANTI ASUHAN REKSA PUTRA BAGIAN PUTRA', '222/6270/KP2TSP/2018', 'JL. BEO 34 PAPRINGAN CATURTUNGGAL DEPOK', '-7.775352869754336', '110.39487077974297', 'PANTI_ASUHAN_REKSA_PUTRA_BAGIAN_PUTRA.jpeg', '0816683411', 'ninehunter9@gmail.com', 'Panti Asuhan Reksa Putra berdiri pada tanggal 1 Maret 1950 oleh Majelis Gereja Kristen Djawa Gondokusuman yang terdorong untuk melakukan pelayanan di bidang sosial.\r\nPanti Asuhan Reksa Putra dibagi menjadi dua yaitu bagian Putra dan bagian Putri,Panti Asuhan Reksa Putra bagian Putra terletak di Jl. Beo 34, Papringan Caturtunggal, Depok, Sleman di pimpin oleh Bp. Kriyono, SH sedangkan Panti Asuhan Reksa Putra bagian Putri terletak di Resonegaran GK V/1291, Yogyakarta. Panti Asuhan Reksa Putra bagian Putri ini di pimpin oleh ibu Endang Isananto.\r\nPanti Asuhan ini bertujuan memberi perawatan dan pendidikan bagi anak Yatim-Piatu, Yatim/Piatu, miskin dan terlantar.Selain memberikan pendidikan formil, kami juga mengusahakan adanya pendidikan ketrampilan dan pembinaan rohani sehari-hari\r\nUntuk pemantauan kesehatan kami bekerjasama dengan Puskesmas setempat, yang secara rutin mendatangi Panti dan memeriksa Gizi/kesehatan, berat/tinggi badan serta HB.', 1),
('60978f29af567', '340407', '3404072002', 118, '1', 'PANTI ASUHAN DIPONEGORO', '222/4837/KP2TSP/2017', 'SEMBEGO 01/38 MAGUWOHARJO DEPOK', '-7.760043721622012', '110.44052211240138', 'PANTI_ASUHAN_DIPONEGORO.JPG', '0818271599', 'ninehunter9@gmail.com', 'Panti Asuhan Diponegoro adalah salah satu lembaga sosial yang memberikan pelayanan sosial terhadap anak yatim piatu dan anak terlantar dengan meningkatkan kesejahteraan anggota panti yang mengalami hambatan sosial dan ekonomi, mereka sudah tidak mempunyai keluarga yang menggantikan fungsi orang tuanya yang sudah meninggal dunia atau kedua orang tuanya masih ada namun tidak mampu memenuhi kebutuhan keluarga. Dengan adanya anak-anak seperti itu maka Panti Asuhan Diponegoro berusaha meringankan beban mereka dengan memberikan bantuan fisik dan non fisik. Mereka tidak hanya membutuhkan makan dan minum saja, tetapi juga membutuhkan pendidikan.', 1),
('609790b15469c', '340412', '3404122001', 118, '1', 'BADAN KESEJAHTERAAN SOSIAL SINAR MELATI YOGYAKARTA', '\'222/131/KP2TSP/2016', 'SEDAN 01/33 SARIHARJO NGAGLIK', '-7.740886817808017', '110.37656080857867', 'F22_-_SM_Aula_Besar_Sariharjo_Sleman.jpg', '08122958931', 'ninehunter9@gmail.com', 'Sinar Melati adalah lembaga independen. Pada awalnya berbentuk pengajian. Berdiri pada Bulan Rajab 1409 H bertepatan Tanggal 21 Februari 1989. Pada tanggal 21 April 1990 berubah dari bentuk pengajian menjadi yayasan. Sampai Tanggal 21 Februari 2009 dengan berbagai pertimbangan, berubah menjadi Badan Kesejahteraan Sosial (BKS) Sinar Melati.', 1),
('609792cc67dfd', '340413', '3404132003', 118, '1', 'LSM SULAIMANIYAH', '466/02850/PZ/2019', 'JL. MAGELANG KM 12 WADAS TRIDADI SLEMAN', '-7.711562024888333', '110.3533430064205', 'Foto_penghuni_panti7.jpg', '02274868447', 'ninehunter9@gmail.com', 'Panti ini beralamatkan JL. MAGELANG KM 12 WADAS TRIDADI SLEMAN', 1),
('6097950cd2119', '340409', '3404092001', 118, '1', 'Panti Asuhan Putri An-Nur', '222/4985/KP2TSP/2017', 'Masjid An-Nur Berjo Sumberharjo Prambanan', '-7.769973584269926', '110.40782546764767', 'Panti_Asuhan_Putri_An-Nur.JPG', '085100571001', 'ninehunter9@gmail.com', 'Panti ini beralamatkan di Masjid An-Nur Berjo Sumberharjo Prambanan', 1),
('60979dd1b4608', '340408', '3404082003', 118, '1', 'Rumah Anak Indonesia', '222/1308/KP2TSP/2016', 'Kaliajir Lor, Kalitirto, Kec. Berbah, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55573', '-7.7844887052642715', '110.45071189508678', 'RAI.JPG', '081392799764', 'ninehunter9@gmail.com', 'Rumah Anak Indonesia adalah lembaga sosial non profit yang bergerak dalam bidang pelayanan sosial untuk membantu pemerintah dalam mensejahterakan dan memberdayakan masyarakat, terutama mengatasi permasalahan-permasalahan yang dihadapi anak-anak baik di Daerah Istimewa Yogyakarta khususnya dan Indonesia pada umumnya.', 1),
('60979e904cbd4', '340414', '3404142005', 118, '1', 'Panti Asuhan Baitul Qowwam', '\'222/985/KP2TSP/2016', 'Plumbon Kidul RT 002 RW 013 Mororejo Tempel', '-7.674738907212614', '110.32155681228105', 'Panti_Asuhan_Baitul_Qowwam.jpg', '081215520406', 'ninehunter9@gmail.com', 'Baitul Qowwam atau Empowering House (Rumah Pemberdayaan) adalah PANTI ASUHAN YATIM-DHU’AFA,  sebuah Lembaga Kesejahteraan Sosial (LKS) yang menampung dan mengasuh  anak-anak yang kurang beruntung, mereka adalah anak-anak yatim dan miskin. Di Baitul Qowwam anak-anak tersebut dipenuhi keperluan hidup dan biaya sekolahnya. Jurusan dan sekolah bebas dipilih di wilayah sekitar panti sesuai potensi dan peminatan anak. Lembaga ini berdiri pada tahun 2009. Lembaga ini juga telah berhasil mengantarkan anak-anak yang pada mulanya mengalami kesulitan mendapatkan akses pendidikan yang baik, saat ini mampu mengenyam pendidikan tinggi dengan beasiswa, tanpa keluar biaya, dan bahkan mendapatkan tunjangan hidup. Dua (2) anak di UGM; tiga (3) anak kuliah di UIN,  dua (2) anak di UII, satu (1) anak di STIE YKPN, satu (1) anak di UAD, dua (2) anak di UNRIYO. Suatu hal yang tidak pernah merek bayangkan sebelumnya.', 1),
('60979f5c85d01', '340404', '3404042005', 118, '1', 'Panti Asuhan Daarut Taqwa Ihsania', '222/217/GR.I/2015', 'Jarakan RT 06/ RW 26 No.128, Sedangrejo, Minggir, Sleman 55562', '-7.733415250606407', '110.27087412762552', 'Panti_Asuhan_Daarut_Taqwa_Ihsania.jpg', '089688393990', 'ninehunter9@gmail.com', 'Panti Asuhan Da\'arut Taqwa sudah berdiri sejak 2004, dalam perjalanannya selain bergerak di bidang sosial di tahun 2005 mereka mendirikan Panti Asuhan & Rumah Tahfidz Daarut Taqwa. Pada awal berdiri, mereka mengasuh 4 santri dan sering berpindah-pindah tempat, hingga akhirnya tahun 2008 ada donatur mewakafkan rumahnya di Desa Sendangrejo, Minggir untuk ditempati. Denah menuju panti ini cukup mudah, dari arah kota Jogja, perempatan Ngijon belok kanan lurus hingga menempuh 3 km, lalu belok kanan (ada plang) dan ikuti jalan aspal serta petunjuk kurang lebih 700 m sampai di lokasi. Dalam kesehariannya, selain bersekolah para santri memiliki kegiatan rutin pendalaman keagamaan dan salah satunya adalah hapalan Al Quran. Guna meningkatkan minat baca, pengurus juga telah menyediakan ruangan khusus baca (perpustakaan), walaupun koleksi buku belum banyak, maka pengurus juga membuka pintu seluas-luasnya bagi para donatur yang ingin menyumbangkan buku, baik buku pelajaran, majalah maupun novel remaja.', 1),
('60979ffdd329f', '340402', '3404022005', 118, '1', 'Panti Asuhan Rumah Sajada Yayasan Sajada', '222/4892/KP2TSP/2018', 'Wirokraman RT 04/ RW 13, Sidokarto, Godean, Sleman', '-7.782397264069598', '110.30866121043066', 'Panti_Asuhan_Rumah_Sajada_Yayasan_Sajada.jpg', '085106005057', 'ninehunter9@gmail.com', 'Panti Asuhan dan Pondok Pesantren Yatim dan dhuafa\' Rumah Sajada ini didirikan di Yogyakarta tanggal 1 Februari 2009, didirikan oleh orang-orang yang mempunyai kepedulian atas kondisi umat Islam, khususnya yatim dan piatu yang masih membutuhkan banyak pendampingan dan bantuan untuk meningkatkan harkat dan taraf hidupnya melalui pendidikan. Dengan harapan mereka akan dapat menjadi manusia muslim yang berkualitas dan unggul sehingga dapat berguna bagi pengembangan umat Islam dimasa yang akan datang.', 1),
('6097a0af41beb', '340411', '3404112002', 118, '1', 'Panti Asuhan Bima Bhakti Putri', '222/1146/KP2TSP/2018', 'Jl. Cangkringan Km.9,5 RT 04/Rw015, Pondok Suruh, Bimomartani, Ngemplak, Kabupaten Sleman', '-7.688191590422181', '110.45578066810154', 'Panti_Asuhan_Bima_Bhakti_Putri.jpg', '02742850683', 'ninehunter9@gmail.com', 'Yayasan Bima Bhakti berasal dari diwakafkannya tanak milik Bapak H. Sudaryanto seluas 1709 m. Tanah terebut terletak di Dusun Pondok Suruh RT 004 RW 015 Bimomartani Ngemplak Sleman Yogyakarta, sedangkan H. Sudaryanto sendiri bertempat tinggal di daerah Condong Catur.', 1),
('6097a1b3b2a48', '340415', '3404152001', 118, '1', 'Panti Asuhan Yayasan Tafaquh Fiddin Al Mubaarok', '222/1185/KP2TSP/2018', 'Dusun Kendal RT 005 RW 012 Bangunkerto Turi', '-7.651793095423648', '110.35015145275737', 'Panti_Asuhan_Yayasan_Tafaquh_Fiddin_Al_Mubaarok.jpg', '085643499777', 'ninehunter9@gmail.com', 'Panti asuhan ini beralamat Dusun Kendal RT 005 RW 012 Bangunkerto Turi', 1),
('6097a2b02fa10', '340407', '3404072001', 118, '1', 'Panti Asuhan Yayasan Tahfidz Sulaymaniah', '\'222/3975/2018', 'Jl. Gambir Gang Seruni No. 8 Caturtunggal Depok', '-7.630518414697191', '110.37947433167135', 'UICCI_Pesantren_Mahasiswa_Sulaimaniyah.jpg', '0274561641', 'ninehunter9@gmail.com', 'adalah salah satu Ponpes di bawah naungan United Islamic Culturaal Centre of Indonesia (UICCI) atau Yayasan Pusat Persatuan Kebudayaan Islam di Indonesia. UICCI adalah lembaga organisasi sosial Islam yang didirikan pada tahun 2005 oleh para sukarelawan muslim indonesia dan Turki yang berpusat di Istanbul Turki. Sampai saat ini pesantren dan yayasan  kami yang berpusat di Rawamangun, Jakarta sudah memiliki 34 cabang di indonesia, yakni di Jakarta, Banten, Aceh, Medan, Surabaya, Kalimantan, Yogyakarta, Semarang, Temanggung, Klaten, Bandung, Sukabumi, Bogor, Palembang, Sumenep, Lumajang, dll. Bahkan pesantren ini memiliki cabang hampir di seluruh dunia, dengan kategori SMP, SMA, Mahasiswa, Tadris dan Tahfizhul Quran.', 1),
('60982f01e22eb', '340410', '3404102001', 118, '2', 'PANTI ASUHAN BHAKTI LUHUR', '222/6132/KP2TSP/2017', 'DUSUN SUMBER LOR RT 01 RW 29 KALITIRTO BERBAH', '-7.791488115345313', '110.45285224792666', 'panti-asuhan-bhakti-luhur_169.jpeg', '0274-4435230', 'ninehunter9@gmail.com', 'Panti ini beralamatkan diDUSUN SUMBER LOR RT 01 RW 29 KALITIRTO BERBAH', 1),
('60983085d30a0', '340410', '3404102001', 118, '2', 'PANTI CACAT GANDA YAYASAN SAYAP IBU SLEMAN', '222/5979/KP2TSP/2018', 'KADIROJO PURWOMARTANI KALASAN SLEMAN', '-7.765841707929495', '110.44815567867873', 'PANTI_CACAT_GANDA_YAYASAN_SAYAP_IBU_SLEMAN.jpg', '081931712442', 'ninehunter9@gmail.com', 'Panti Asuhan Cacat Ganda Yayasan Sayap Ibu Yogyakarta adalah salah satu unit kerja dari Yayasan Sayap Ibu Cabang DIY. Panti Asuhan Cacat Ganda YSI merupakan panti asuhan yang melayani anak-anak terlantar berkebutuhan khusus ( disabilitas/difabel ) yang kebanyakan adalah penyandang tuna ganda ( multi handycap ) dengan beragam jenis kecacatan. Dalam pelayanannya Panti Asuhan Cacat Ganda berupaya mengupayakan panti sebagai rumah yang nyaman bagi anak-anak asuhnya.', 1),
('6098315487ce9', '340416', '3404162005', 118, '2', 'YAYASAN PANTI ASIH PAKEM', '222/1309/KP2TSP/2016', 'JL. KALIURANG KM 21 HARGOBINANGUN PAKEM', '-7.611562966883436', '110.42715159917468', 'YAYASAN_PANTI_ASIH_PAKEM.JPG', '02744478471', 'ninehunter9@gmail.com', 'Panti ini beralamatkan JL. KALIURANG KM 21 HARGOBINANGUN PAKEM', 1),
('609832710d103', '340412', '3404122001', 118, '3', 'LEMBAGA REHABILITASI KUNCI YOGYAKARTA', '222/2815/KP2TSP/2018', 'NANDAN, SARIHARJO, NGAGLIK, SLEMAN, YOGYAKARTA', '-7.751981355561941', '110.368089715313', 'Yayasan-Kunci-Nandan-e1403956519137.jpg', '0274624747', 'ninehunter9@gmail.com', 'Panti in beralamatkan NANDAN, SARIHARJO, NGAGLIK, SLEMAN, YOGYAKARTA', 1),
('60983334628e3', '340408', '3404082002', 118, '3', 'PANTI REHABILITASI YAYASAN TETIRAH DZIKIR', '222/4308/KP2TSP/2017', 'JL. WONOSARI KM 10 RT 07 RW 16 TEGALTIRTO BERBAH SLEMAN YOGYAKARTA', '-7.816661694883109', '110.44059155950954', 'cropped-photo-from-wachid-henry-nugroho.jpg', '081328077451', 'ninehunter9@gmail.com', 'Panti Rehabilitasi Tetirah Dzikir adalah wadah penanganan dan\r\npembinaan korban NAPZA dan penyandang masalah kejiwaan. Hal ini\r\nmerupakan sebuah upaya yang dilakukan sebagai bentuk kepedulian\r\nmengingat semakin banyaknya jatuh korban dampak persoalan degradasi\r\nkesadaran manusia, dimana zaman yang semakin modern di era globalisasi\r\nsekarang ini perhatian manusia lebih banyak dipengaruhi oleh nilai-nilai\r\nhedonism, kompetisi, krisis ekonomi, yang bagi sebagian manusia menjadi\r\nancaman dalam menghadapi masadepan yang mengakibatkan\r\nketidakseimbangan psikis, krisis jatidiri, Penyalahguna Napza, penyakitpenyakit kronis jasmani dan rohani', 1),
('609833d747273', '340405', '3404052001', 118, '3', 'GRIYA PEMULIHAN SILOAM', '222/354/KP2TSP/2018', 'JL. GODEAN-TEMPEL KM 3 DSN. KLANGKAPAN II, RT. 01 / RW. 05 MARGOLUWIH SEYEGAN SLEMAN', '-7.747261260005241', '110.29386999811067', 'siloam.jpg', '0274798382', 'ninehunter9@gmail.com', 'Lembaga swadaya masyarakat Griya Pemulihan Siloam Yogyakarta adalah sebuah wahana pelayanan sosial yang peduli dengan masalah-masalah sosial khususnya masalah ketergantungan obat/NAPZA.LSM Pelita Kasih memberikan pelayanan bersifat “Holistic Integrited” .', 1),
('609834a96ad82', '340409', '3404092005', 118, '3', 'YAYASAN INDOCHARIS', '222/2756/KP2TSP/2018', 'DUSUN MUTIHAN RT 02 RW 02 MADUREJO PRAMBANAN SLEMAN', '-7.79347822940884', '110.46865080974513', '20140104_084926.jpg', '085868191022', 'ninehunter9@gmail.com', 'Yayasan IndoCharis memiliki rehabilitasi sosial yang melayani korban penyalahguna NAPZA dan penyandang disabilitas mental.', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_id_level` (`id_level`);

--
-- Indeks untuk tabel `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `fk_id_kecamatann` (`id_kecamatan`);

--
-- Indeks untuk tabel `galeri_panti`
--
ALTER TABLE `galeri_panti`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `fk_id_profil_galeri` (`id_profil`),
  ADD KEY `fk_id_admin_galeri` (`id_admin`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `jenis_panti`
--
ALTER TABLE `jenis_panti`
  ADD PRIMARY KEY (`id_jenis_panti`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `fk_id_profilll` (`id_profil`);

--
-- Indeks untuk tabel `komentar_kirim`
--
ALTER TABLE `komentar_kirim`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `level_admin`
--
ALTER TABLE `level_admin`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `penghuni_panti`
--
ALTER TABLE `penghuni_panti`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `fk_id_profil` (`id_profil`),
  ADD KEY `fk_jk` (`id_jk`);

--
-- Indeks untuk tabel `profil_panti`
--
ALTER TABLE `profil_panti`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`),
  ADD KEY `fk_id_desa` (`id_desa`),
  ADD KEY `fk_id_jenis_panti` (`id_jenis_panti`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `galeri_panti`
--
ALTER TABLE `galeri_panti`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `komentar_kirim`
--
ALTER TABLE `komentar_kirim`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `level_admin`
--
ALTER TABLE `level_admin`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penghuni_panti`
--
ALTER TABLE `penghuni_panti`
  MODIFY `id_penghuni` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_id_level` FOREIGN KEY (`id_level`) REFERENCES `level_admin` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `fk_id_kecamatann` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galeri_panti`
--
ALTER TABLE `galeri_panti`
  ADD CONSTRAINT `fk_id_admin_galeri` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_galeri` FOREIGN KEY (`id_profil`) REFERENCES `profil_panti` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_id_profilll` FOREIGN KEY (`id_profil`) REFERENCES `profil_panti` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penghuni_panti`
--
ALTER TABLE `penghuni_panti`
  ADD CONSTRAINT `fk_id_profil` FOREIGN KEY (`id_profil`) REFERENCES `profil_panti` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jk` FOREIGN KEY (`id_jk`) REFERENCES `jenis_kelamin` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profil_panti`
--
ALTER TABLE `profil_panti`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_jenis_panti` FOREIGN KEY (`id_jenis_panti`) REFERENCES `jenis_panti` (`id_jenis_panti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
