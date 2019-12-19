-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2019 pada 02.28
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id_absensi_siswa` int(5) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kehadiran` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id_absensi_siswa`, `kodejdwl`, `nisn`, `kode_kehadiran`, `tanggal`, `waktu_input`) VALUES
(59, 13, '0151379251', 'S', '2019-11-28', '2019-11-28 08:12:40'),
(58, 13, '123', 'H', '2019-11-28', '2019-11-28 08:12:40'),
(55, 13, '0151379251', 'H', '2019-11-08', '2019-11-27 14:06:30'),
(54, 13, '123', 'H', '2019-11-08', '2019-11-27 14:06:30'),
(48, 13, '123', 'H', '2019-11-26', '2019-11-27 13:33:45'),
(49, 13, '0151379251', 'H', '2019-11-26', '2019-11-27 13:33:45'),
(50, 13, '123', 'H', '2019-11-27', '2019-11-27 13:34:51'),
(51, 13, '0151379251', 'H', '2019-11-27', '2019-11-27 13:34:51'),
(52, 13, '123', 'H', '2019-11-25', '2019-11-27 13:36:44'),
(53, 13, '0151379251', 'H', '2019-11-25', '2019-11-27 13:36:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(5) NOT NULL,
  `nama_agama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_wakel`
--

CREATE TABLE `catatan_wakel` (
  `id_catatan` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan_wakel`
--

INSERT INTO `catatan_wakel` (`id_catatan`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `catatan`, `user_akses`, `waktu_input`) VALUES
(2, 20161, '9991268756', 'X.TKJ.1', 'Memiliki keterampilan merencanakan dan melaksanakan percobaan interferensi gelombang cahaya ', '1', '2016-04-29 08:09:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(5) NOT NULL,
  `nama_golongan` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`, `keterangan`) VALUES
(0, 'IV/a', 'Golongan I/a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat_jalan` varchar(255) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(150) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `nuptk` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `tmt` varchar(20) NOT NULL,
  `id_status_kepegawaian` int(5) NOT NULL,
  `id_jenis_ptk` int(5) NOT NULL,
  `id_status_keaktifan` int(5) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_golongan` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `id_jenis_kelamin`, `id_agama`, `telepon`, `email`, `alamat_jalan`, `rt`, `rw`, `nama_dusun`, `desa_kelurahan`, `kecamatan`, `kabupaten`, `kode_pos`, `nuptk`, `nik`, `tmt`, `id_status_kepegawaian`, `id_jenis_ptk`, `id_status_keaktifan`, `foto`, `id_golongan`) VALUES
('196608201993032006', '7473038696', 'Lili Suyani', 'Jember', '1966-08-20', 2, 1, '0751461692', '@gmail.com', 'simpang empat padang lua', '0', '0', 'padang lua', 'banuhampu', 'Kec. sumberbaru', '', 0, '8152744647300033', '1374025104571989', '1994-06-01', 3, 4, 1, '', 0),
('195806161984000016', '11435453225', 'Agus Musanib', 'Lumajang', '1950-02-02', 2, 1, '0751461692', 'dankrez48@gmail.com', 'Prof.M.Yamin, SH', '4', '4', '', 'Tarok Dipo', 'Kec. jatiroto', '', 0, '', '1374025104571989', '2004-05-05', 1, 1, 1, '', 0),
('198406142009012003', '12241237914', 'Dellya', 'Jember', '1984-06-14', 2, 1, '0751461692', '@gmail.com', 'Parak Kongsi Jorong Parik Putuih', '', '', '', 'Ampang Gadang', 'Kec. sumberbaru', '', 0, '3946762664210112', '1374025104571989', '2009-01-01', 3, 4, 1, '', 0),
('195806161984000001', '11', 'Aina Yonavia', 'Jember', '1989-02-28', 1, 1, '0751461692', 'dankrez48@gmail.com', 'Jl.bonjo Baru By Pass', '3', '5', '', 'Tarok DIpo', 'Kec. Sumberagung', '', 26122, '', '1374025104571989', '2015-07-13', 2, 2, 1, '', 0),
('1234', '1234', 'Aisyah', 'Jember', '1958-06-16', 2, 1, '0751461692', 'dankrez48@gmail.com', 'Birugo Puhun 80.266', '', '', '', 'Tarok Dipo', 'Kec. sumberbaru', '', 0, '3948736639300012', '1374025104571989', '1983-03-01', 3, 2, 1, '', 0),
('195704111980032004', '12', 'April Daniati', 'Lumajang', '1957-04-11', 2, 1, '0751461692', 'dankrez48@gmail.com', 'Jl.Perintis Kemerdekaan No.121 B', '', '', '', 'Balai-Balai', 'Kec. jatiroto', '', 27114, '1743735636300012', '1374025104571989', '1980-03-01', 3, 4, 1, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id_identitas_sekolah` int(5) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `nss` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kode_pos` int(7) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id_identitas_sekolah`, `nama_sekolah`, `npsn`, `nss`, `alamat_sekolah`, `kode_pos`, `no_telpon`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `website`, `email`) VALUES
(1, 'SMK NEGERI 7 JEMBER', '20554848', '4232322', 'JL. PB. SUDIRMAN NO.16', 68156, '0334-321400', 'Jatiroto', 'Sumberbaru', 'Jember', 'Jawa Timur', 'https://smkn7jember.sch.id/', 'smkn7jember@ymail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `kodejdwl` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `hari` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`kodejdwl`, `id_tahun_akademik`, `kode_kelas`, `kode_pelajaran`, `kode_ruangan`, `nip`, `jam_mulai`, `jam_selesai`, `hari`, `aktif`) VALUES
(13, 20161, 'X.TKJ.1', 'MK01', 'R003', '195704111980032004', '09:00:00', '11:30:00', 'Senin', 'Ya'),
(34, 20161, 'X.TKJ.1', 'MK02', 'R004', '195806161984000001', '12:00:00', '12:30:00', 'Senin', 'Ya'),
(37, 20161, 'X.TSM.2', 'MK03', 'R002', '198406142009012003', '09:44:40', '09:44:40', 'Senin', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(5) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ptk`
--

CREATE TABLE `jenis_ptk` (
  `id_jenis_ptk` int(5) NOT NULL,
  `jenis_ptk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_ptk`
--

INSERT INTO `jenis_ptk` (`id_jenis_ptk`, `jenis_ptk`, `keterangan`) VALUES
(1, 'Tenaga Administrasi Sekolah', ''),
(2, 'Guru Mapel', ''),
(3, 'Guru BK', ''),
(4, 'Wali Kelas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `journal_list`
--

CREATE TABLE `journal_list` (
  `id_journal` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_ke` varchar(50) NOT NULL,
  `materi` text NOT NULL,
  `keterangan` text NOT NULL,
  `waktu_input` datetime NOT NULL,
  `users` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `journal_list`
--

INSERT INTO `journal_list` (`id_journal`, `kodejdwl`, `hari`, `tanggal`, `jam_ke`, `materi`, `keterangan`, `waktu_input`, `users`) VALUES
(1, 13, 'Jumat', '2016-07-08', '1', 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisannn.', 'Sebagai pendidik kita tentunya harus mempersiapkan segala sesuatu yang berhubungan dengan administrasi untuk mengajar...dalam kesempatan ini kami akan mencoba membuat draft jurnal kelas', '2016-07-08 08:08:37', '195806161984000002'),
(2, 13, 'Jumat', '2016-07-08', '2', 'Menganalisis teks cerita pendek, baik melalui lisan maupun tulisane.', 'Jurnal pembelajaran harian merupakan salah satu perangkat pembelajaran yang diperlukan oleh guru guna mencatat pelaksanaan pembelajaran setiap hari. jurnal pembelajaran dapat membantu proses sejauh mana kita telah mengajar serta menghandle siapa saja murid/guru yang tidak masuk atau yang tidak mengikuti proses KBM.', '2016-07-08 09:11:24', '195806161984000002'),
(5, 13, 'Jumat', '2016-07-08', '3', 'Berikut ini merupakan contoh dari enkripsi RSA dan dekripsinya. Parameter yang digunakan disini berupa bilangan kecil.', 'RSA di bidang kriptografi adalah sebuah algoritma pada enkripsi public key. RSA merupakan algoritma pertama yang cocok untuk digital signature seperti halnya ekripsi, dan salah satu yang paling maju dalam bidang kriptografi public key. RSA masih digunakan secara luas dalam protokol electronic commerce, dan dipercaya dalam mengamnkan dengan menggunakan kunci yang cukup panjang.', '2016-07-08 10:33:39', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kepala_jurusan` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `kepala_jurusan`, `aktif`) VALUES
('TKJ', 'Teknik Komputer Jaringan', ' Mail', 'Ya'),
('TSM', 'Teknik Sepeda Motor', 'Hasan', 'Ya'),
('MM', 'MULTIMEDIA', 'deni', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id_kalender_akademik` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id_kalender_akademik`, `foto`) VALUES
(1, '20191217092714-kalender akademik.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kode_kehadiran` varchar(5) NOT NULL,
  `nama_kehadiran` varchar(20) NOT NULL,
  `nilai` int(2) NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`kode_kehadiran`, `nama_kehadiran`, `nilai`, `bobot`) VALUES
('H', 'Hadir', 1, '1'),
('I', 'Izin', 1, '0.5'),
('S', 'Sakit', 1, '0.5'),
('A', 'Alpa', 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nip`, `kode_jurusan`, `kode_ruangan`, `nama_kelas`, `aktif`) VALUES
('X.TSM.2', '198406142009012003', 'TSM', 'R004', 'Kelas X TSM 2', 'Ya'),
('X.TSM.1', '195806161984000001', 'TSM', 'R002', 'Kelas X TSM 1', 'Ya'),
('X.TKJ.3', '196608201993032006', 'TKJ', 'R003', 'Kelas X TKJ 3', 'Ya'),
('X.TKJ.2', '195806161984000016', 'TKJ', 'R01', 'Kelas X TKJ 2', 'Tidak'),
('X.TKJ.1', '195704111980032004', 'TKJ', 'R001', 'Kelas X TKJ 1', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_mata_pelajaran`
--

CREATE TABLE `kelompok_mata_pelajaran` (
  `id_kelompok_mata_pelajaran` int(5) NOT NULL,
  `jenis_kelompok_mata_pelajaran` varchar(50) NOT NULL,
  `nama_kelompok_mata_pelajaran` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok_mata_pelajaran`
--

INSERT INTO `kelompok_mata_pelajaran` (`id_kelompok_mata_pelajaran`, `jenis_kelompok_mata_pelajaran`, `nama_kelompok_mata_pelajaran`) VALUES
(1, 'A', 'Kelompok A (Umum)'),
(2, 'B', 'Kelompok B (Umum)'),
(3, 'C', 'Kelompok C (Peminatan)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi_dasar`
--

CREATE TABLE `kompetensi_dasar` (
  `id_kompetensi_dasar` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `ranah` enum('pengetahuan','keterampilan','sikap') NOT NULL,
  `kompetensi_dasar` text NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kompetensi_dasar`
--

INSERT INTO `kompetensi_dasar` (`id_kompetensi_dasar`, `kodejdwl`, `ranah`, `kompetensi_dasar`, `waktu_input`) VALUES
(1, 33, 'pengetahuan', 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisannn.', '2016-07-03 08:10:13'),
(2, 33, 'keterampilan', 'Menganalisis teks cerita pendek, baik melalui lisan maupun tulisane.', '2016-07-03 09:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_pelajaran` varchar(20) NOT NULL,
  `id_kelompok_mata_pelajaran` int(3) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `namamatapelajaran` varchar(150) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kkm` int(3) NOT NULL,
  `kompetensi_umum` text NOT NULL,
  `kompetensi_khusus` text NOT NULL,
  `jumlah_jam` varchar(20) NOT NULL,
  `urutan` int(3) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_pelajaran`, `id_kelompok_mata_pelajaran`, `kode_jurusan`, `nip`, `namamatapelajaran`, `tingkat`, `kkm`, `kompetensi_umum`, `kompetensi_khusus`, `jumlah_jam`, `urutan`, `aktif`) VALUES
('MK01', 1, 'TKJ', '195704111980032004', 'Bahasa Indonesia', '2 (SLTA)', 70, 'Isikan Nama Kompetensi Umum', 'Isikan Nama Kompetensi Khusus', '2', 2, 'Ya'),
('MK03', 2, 'TKJ', '195806161984000016', 'Bahasa Inggris', '2 (SLTA)', 77, 'Isikan Nama Kompetensi Umum', 'Isikan Nama Kompetensi Khusus', '3', 0, 'Ya'),
('MK9', 2, 'TKJ', '198406142009012003', 'jurusan', '2', 75, 'dasd', 'asdasd', '2', 1, 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_extrakulikuler`
--

CREATE TABLE `nilai_extrakulikuler` (
  `id_nilai_extrakulikuler` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_extrakulikuler`
--

INSERT INTO `nilai_extrakulikuler` (`id_nilai_extrakulikuler`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `kegiatan`, `nilai`, `deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991268756', 'X.MIPA.1', 'Kegiatan Mandi-mandii', 87, 'Kegiatan mandi-mandi dilaksanakan di lubuak minturun bersamaan dengan perayaan ulang tahun sekolah.', '1', '2016-04-29 10:11:10'),
(2, 20161, '9991268756', 'X.MIPA.1', 'Kegiatan Bakar ayam.', 95, 'Memiliki keterampilan Mengidentifikasi, menyajikan model matematika dan menyelesaikan masalah keseharian.				', '1', '2016-04-29 07:08:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_keterampilan`
--

CREATE TABLE `nilai_keterampilan` (
  `id_nilai_keterampilan` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `nilai5` float NOT NULL,
  `nilai6` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_keterampilan`
--

INSERT INTO `nilai_keterampilan` (`id_nilai_keterampilan`, `kodejdwl`, `nisn`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991268756', 75, 70, 78, 85, 78, 72, 'Mengabstraksi teks cerita pendek, baik secara lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(2, 5, '9998218087', 88, 90, 98, 96, 0, 0, '', '1', '2016-04-11 18:26:32'),
(3, 13, '9998215055', 67, 98, 76, 90, 0, 0, '', '1', '2016-04-11 18:26:32'),
(4, 5, '9998214335', 87, 88, 0, 0, 0, 0, '', '1', '2016-04-11 18:26:32'),
(5, 5, '9998214151', 89, 0, 0, 90, 0, 0, '', '1', '2016-04-11 18:26:32'),
(6, 5, '9997515863', 89, 80, 88, 0, 0, 0, '', '1', '2016-04-11 18:26:32'),
(7, 5, '9991268756', 87, 90, 94, 93, 88, 83, 'Mengabstraksi teks cerita ulang, baik secara lisan maupun tulisan ', '1', '2016-04-14 08:03:27'),
(8, 5, '9998218087', 88, 93, 90, 99, 0, 0, '', '1', '2016-04-14 08:03:27'),
(9, 5, '9998215055', 78, 87, 89, 79, 0, 0, '', '1', '2016-04-14 08:03:27'),
(10, 5, '9991268756', 89, 89, 98, 95, 79, 77, 'Mengabstraksi teks pantun, baik secara lisan maupun tulisan', '1', '2016-04-14 08:03:57'),
(11, 5, '9998218087', 78, 87, 89, 88, 0, 0, '', '1', '2016-04-14 08:03:57'),
(12, 5, '9998215055', 70, 78, 87, 90, 0, 0, '', '1', '2016-04-14 08:03:57'),
(13, 5, '9991268756', 90, 89, 87, 90, 85, 90, 'Menginterpretasi makna teks pantun, baik secara lisan maupun tulisan ', '1', '2016-04-14 08:04:20'),
(14, 5, '9998218087', 87, 88, 83, 89, 0, 0, '', '1', '2016-04-14 08:04:20'),
(15, 5, '9991268756', 99, 87, 98, 95, 96, 91, 'Menyunting teks cerita ulang, sesuai dengan struktur dan kaidah teks baik secara lisan maupun tulisan', '1', '2016-04-14 08:04:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pengetahuan`
--

CREATE TABLE `nilai_pengetahuan` (
  `id_nilai_pengetahuan` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_pengetahuan`
--

INSERT INTO `nilai_pengetahuan` (`id_nilai_pengetahuan`, `kodejdwl`, `nisn`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991268756', 89, 90, 89, 95, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(2, 5, '9998218087', 90, 88, 90, 98, 'Menganalisis teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(3, 5, '9998215055', 98, 67, 98, 76, '', '1', '2016-04-11 18:26:32'),
(4, 5, '9998214335', 88, 87, 88, 0, '', '1', '2016-04-11 18:26:32'),
(5, 5, '9998214151', 0, 89, 0, 0, '', '1', '2016-04-11 18:26:32'),
(6, 5, '9997515863', 80, 89, 80, 88, '', '1', '2016-04-11 18:26:32'),
(7, 5, '9991268756', 90, 87, 90, 94, 'Membandingkan teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:03:27'),
(8, 5, '9998218087', 93, 88, 93, 90, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:27'),
(9, 5, '9998215055', 87, 78, 87, 89, '', '1', '2016-04-14 08:03:27'),
(10, 5, '9991268756', 89, 89, 89, 98, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:57'),
(11, 5, '9998218087', 87, 78, 87, 89, '', '1', '2016-04-14 08:03:57'),
(12, 5, '9998215055', 78, 70, 78, 87, '', '1', '2016-04-14 08:03:57'),
(13, 5, '9991268756', 89, 90, 89, 87, 'Membandingkan teks cerita ulang, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:20'),
(14, 5, '9998218087', 88, 87, 88, 83, '', '1', '2016-04-14 08:04:20'),
(15, 5, '9991268756', 87, 90, 87, 78, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:04:36'),
(16, 5, '9998218087', 98, 99, 98, 89, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:36'),
(18, 5, '9991268756', 90, 89, 90, 98, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-30 10:50:43'),
(19, 37, '23423', 80, 80, 90, 80, 'fssdf', '1', '2019-11-22 09:57:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_prestasi`
--

CREATE TABLE `nilai_prestasi` (
  `id_nilai_prestasi` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_prestasi`
--

INSERT INTO `nilai_prestasi` (`id_nilai_prestasi`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `jenis_kegiatan`, `keterangan`, `user_akses`, `waktu_input`) VALUES
(2, 20161, '9991268756', 'X.TKJ.1', 'Kegiatan Jalan-jalan sore', 'Memiliki keterampilan merencanakan dan melaksanakan percobaan interferensi gelombang cahaya 				', '1', '2016-04-29 08:09:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sikap`
--

CREATE TABLE `nilai_sikap` (
  `id_nilai_sikap` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `positif` text NOT NULL,
  `negatif` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('spiritual','sosial') NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sikap_semester`
--

CREATE TABLE `nilai_sikap_semester` (
  `id_nilai_sikap_semester` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `spiritual_predikat` varchar(2) NOT NULL,
  `spiritual_deskripsi` text NOT NULL,
  `sosial_predikat` varchar(2) NOT NULL,
  `sosial_deskripsi` text NOT NULL,
  `user_akses` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_sikap_semester`
--

INSERT INTO `nilai_sikap_semester` (`id_nilai_sikap_semester`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `spiritual_predikat`, `spiritual_deskripsi`, `sosial_predikat`, `sosial_deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991268756', 'X.TKJ.1', 'A', 'Pertahankan Nilai anda,..', 'B', 'Tingkatkan Nilai anda,..', '1', '2016-04-28 10:10:16'),
(2, 20161, '0151379251', 'X.TKJ.1', 'C', 'Tolong Perbaiki Sikap anda,..', 'D', 'Anda Tidak Berutak,..', '1', '2016-04-28 10:10:16'),
(3, 20161, '0004107204', 'X.TKJ.1', 'A', 'Pertahankan Nilai anda,..', 'C', 'Tolong Perbaiki Sikap anda,..', '1', '2016-04-28 10:10:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_uts`
--

CREATE TABLE `nilai_uts` (
  `id_nilai_uts` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `angka_pengetahuan` float NOT NULL,
  `deskripsi_pengetahuan` text NOT NULL,
  `angka_keterampilan` float NOT NULL,
  `deskripsi_keterampilan` text NOT NULL,
  `waktu_input_uts` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_uts`
--

INSERT INTO `nilai_uts` (`id_nilai_uts`, `kodejdwl`, `nisn`, `angka_pengetahuan`, `deskripsi_pengetahuan`, `angka_keterampilan`, `deskripsi_keterampilan`, `waktu_input_uts`) VALUES
(1, 5, '9991268756', 85, '', 90, '', '2016-04-15 17:54:05'),
(2, 5, '9998218087', 74, '', 83, '', '2016-04-15 17:54:05'),
(3, 13, '9999152999', 89, '', 90, '', '2016-04-21 18:52:57'),
(4, 14, '9999152999', 85, '', 79, '', '2016-04-21 18:53:14'),
(5, 34, '123', 80, '', 90, '', '2019-11-22 09:18:48'),
(6, 34, '0151379251', 80, '', 90, '', '2019-11-22 09:18:48'),
(7, 13, '123', 100, '', 10, '', '2019-11-22 09:37:35'),
(8, 37, '23423', 10, '', 6, '', '2019-11-22 09:45:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `predikat`
--

CREATE TABLE `predikat` (
  `id_predikat` int(5) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nilai_a` int(3) NOT NULL,
  `nilai_b` int(3) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `predikat`
--

INSERT INTO `predikat` (`id_predikat`, `kode_kelas`, `nilai_a`, `nilai_b`, `grade`, `keterangan`) VALUES
(1, '0', 86, 100, 'A', 'Sangat Baik'),
(2, '0', 79, 85, 'B', 'Baik'),
(3, '0', 77, 78, 'C', 'Cukup'),
(4, '0', 0, 77, 'D', 'Kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `kapasitas_belajar` int(5) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`, `kapasitas_belajar`, `aktif`) VALUES
('R001', 'A.1', 35, 'Ya'),
('R002', 'A.2', 40, 'Ya'),
('R003', 'B.1', 34, 'Ya'),
('R004', 'Ruangan 5', 45, 'Ya'),
('R01', 'Ruangan 1', 0, 'Ya'),
('R02', 'Ruangan 2', 0, 'Ya'),
('R03', 'Ruangan 4', 0, 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` int(5) NOT NULL,
  `nama_sesi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `nama_sesi`, `keterangan`, `aktif`) VALUES
(1, 'Semester 1', '', 'Ya'),
(2, 'Semester 2', '', 'Ya'),
(3, 'Semester 3', '', 'Ya'),
(4, 'Semester 4', '', 'Ya'),
(5, 'Semester 5', '', 'Ya'),
(6, 'Semester 6', '', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nipd` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `id_jenis_kelamin` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `id_agama` varchar(20) NOT NULL,
  `kebutuhan_khusus` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `alat_transportasi` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `skhun` varchar(50) NOT NULL,
  `penerima_kps` varchar(20) NOT NULL,
  `no_kps` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `tahun_lahir_ayah` int(4) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `kebutuhan_khusus_ayah` varchar(100) NOT NULL,
  `no_telpon_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `tahun_lahir_ibu` int(4) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `kebutuhan_khusus_ibu` varchar(100) NOT NULL,
  `no_telpon_ibu` varchar(15) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `tahun_lahir_wali` int(4) NOT NULL,
  `pendidikan_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `penghasilan_wali` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `status_awal` varchar(20) NOT NULL,
  `status_siswa` enum('Aktif','Tidak Aktif') NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `id_sesi` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nipd`, `password`, `nama`, `id_jenis_kelamin`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `nik`, `id_agama`, `kebutuhan_khusus`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `telepon`, `hp`, `email`, `skhun`, `penerima_kps`, `no_kps`, `foto`, `nama_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `kebutuhan_khusus_ayah`, `no_telpon_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `kebutuhan_khusus_ibu`, `no_telpon_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `angkatan`, `status_awal`, `status_siswa`, `tingkat`, `kode_kelas`, `kode_jurusan`, `id_sesi`) VALUES
(1, '14422', '123', 'DENI HIDAYATULLAH', '1', '123', 'Jember', '1999-11-14', '1306066910090000', '1', 'Tidak ada', 'PERUMNAS KUBANG PUTIH JL. MERPATI NO.301', '10', '10', 'qweqwe@gmail.com', 'Yosorati', 'Sumberbaru', 26181, '', 'Sepeda motor', '0751-7835083', '082385418021', 'deni@GMAIL.COM', '2-12-02-002-002-7   ', 'TIDAK', '', '20191125185205-IMG-20180831-WA0010.jpg', 'WASLIM', 1968, 'SMP / sederajat', 'Lainnya', 'Rp. 1,000,000 - Rp. 1,999,999', 'Tidak ada', '12412412', 'aku', 1973, 'SMP / sederajat', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.1', 'TKJ', 1),
(63, '14423', '0151379251', 'M Hanafi Abror', '1', '0151379251', 'Jember', '2015-06-27', '1375012610990000', '1', 'Tidak ada', 'JALAN PANORAMA NO 4B', '4', '2', '', 'Jatiroto', 'Lumajang', 0, 'Bersama orang tua', 'Angkutan umum/bus/pete-pete', '75221487', '085766422330', 'mha@YAHOO.COM', '2-12-02-001-007-2   ', 'TIDAK', '', '', 'EFDIWARMAN', 1964, 'SMA / sederajat', 'Wiraswasta', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', 'ASYULIANTI', 1969, 'SMA / sederajat', '', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.1', 'TKJ', 1),
(105, '14424', '0004107204', 'ANDRE THOMOK SIDABUTAR', '1', '0004107204', 'LUBUK BASUNG', '2000-05-16', '', '1', 'Tidak ada', 'MANGGIS GANTING', '0', '0', '', 'MANGGIS', '', 0, 'Bersama orang tua', 'Angkutan umum/bus/pete-pete', '', '', '', '2/12/2002', 'TIDAK', '', '', 'UNTUNG SARAGI SIDABUTAR', 1966, 'SMA / sederajat', 'PNS/TNI/Polri', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', 'RONA TAMPUBOLON', 1977, 'SMA / sederajat', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.2', 'TKJ', 1),
(143, '14425', '9998218087', 'ANNISA SERLINA', '2', '9998218087', 'PEKAN KAMIS', '2000-10-15', '1306095510000000', '1', 'Tidak ada', 'GANTING KOTO TANGAN', '0', '0', '', '', '', 0, 'Bersama orang tua', 'Angkutan umum/bus/pete-pete', '', '083180361912', '', '2/12/2002', 'TIDAK', '', '', 'NOVIARDI', 1965, 'SMA / sederajat', 'Petani', 'Rp. 500,000 - Rp. 999,999', 'Tidak ada', '', 'SESNIAR', 1966, 'SMA / sederajat', 'Lainnya', 'Rp. 500,000 - Rp. 999,999', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.2', 'TKJ', 1),
(214, '14426', '0007105659', 'DAVIN FERDIANSYAH', '1', '0007105659', 'PADANG', '2000-09-06', '1312060609020000', '1', 'Tidak ada', '', '0', '0', '', 'MUARO KIAWAI', 'Kec. Gunung Tuleh', 26371, 'Kost', 'Angkutan umum/bus/pete-pete', '', '', '', '2/12/2002', 'TIDAK', '', '', 'SYAHRIAL', 1962, 'S1', 'PNS/TNI/Polri', 'Rp. 5,000,000 - Rp. 20,000,000', 'Tidak ada', '', 'DESMINAR', 1965, 'S1', 'PNS/TNI/Polri', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.3', 'TKJ', 1),
(242, '14427', '0000267795', 'DHINDA AMALIA KIFLIA', '2', '0000267795', 'Bukittinggi', '2000-03-01', '1375034103000000', '1', 'Tidak ada', 'JL.Puding Mas no.33-Tabek Gadang-Aur Kuning-Bukittinggi', '1', '2', '', '', '', 0, 'Bersama orang tua', 'Angkutan umum/bus/pete-pete', '0752-31089', '081261631384', 'dhindaamaliakiflianainggolan@yahoo.co.id', '2/12/2002', 'TIDAK', '', '', 'Zulkifli Nainggolan', 1966, 'SMA / sederajat', 'Wiraswasta', 'Rp. 1,000,000 - Rp. 1,999,999', 'Tidak ada', '', 'Delfiani', 1972, 'SMA / sederajat', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.3', 'TKJ', 1),
(1270, 'w53535', 'aaa', 'DENI HIDAYATULLAH', '1', '23423', '', '0000-00-00', '', '1', '', '', '00', '00', '@gmail.com', '', '', 61, '', '', '', '', '', '', '', '', '20191123150705-20190427_051644.jpg', 'WASLI', 0, '', '', '', '', '', 'fe', 0, '', '', '', '', '', 'aa', 0, '', '', '', 2019, '', 'Aktif', '', 'X.TSM.2', 'TSM', 0),
(335, '14428', '0007011100', 'Erwin Andrianto', '1', '0007011100', 'Jakarta', '2000-04-12', '1306071204000000', '1', 'Tidak ada', 'Tanah  Nyariang', '0', '0', '', 'Sumberjo', 'Sumberbaru', 0, 'Bersama orang tua', '', '', '085263312034', '', '2/12/2002', 'TIDAK', '', '', 'endrisman', 1971, 'SMA / sederajat', 'Wiraswasta', 'Rp. 500,000 - Rp. 999,999', 'Tidak ada', '', 'Reni', 1972, 'D1', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.3', 'TKJ', 1),
(369, '14429', '0000261160', 'Kirana Yuwita', '2', '0000261160', 'BUKITTINGGI', '2000-07-07', '1306074707000000', '1', 'Tidak ada', 'JORONG PARIT PUTUS,NAGARI AMPANG GADANG,Kec.AMPEK ANGKEK,Kab.AGAM', '0', '0', '', 'Rowotengah', 'Sumberbaru', 0, 'Bersama orang tua', 'Sepeda motor', '', '089629288677', 'kirana@YAHOO.co.id', '2-12-02-            ', 'TIDAK', '', '', 'MEDMON HAIKAL', 1969, 'S1', 'PNS/TNI/Polri', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', 'EVI YENDRIANI', 1975, 'SMA / sederajat', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TKJ.3', 'TKJ', 1),
(391, '14431', '9994930260', 'FIRA WARZUKNI', '2', '9994930260', 'KAPECONG', '1999-10-23', '1306151606100010', '1', 'Tidak ada', 'TARUSAN JR HALALANG', '0', '0', '', 'TARUSAN', 'Kec. Kamang Magek', 0, 'Bersama orang tua', 'Angkutan umum/bus/pete-pete', '', '083180050317', '', '2/12/2002', 'TIDAK', '', '', 'JUFRIAL', 1967, 'SMP / sederajat', 'Wiraswasta', 'Rp. 2,000,000 - Rp. 4,999,999', 'Tidak ada', '', 'NURAINI', 1967, 'SMA / sederajat', 'Tidak bekerja', '', 'Tidak ada', '', '', 1900, '', '', '', 2019, 'Baru', 'Aktif', '(SLTA)', 'X.TSM.2', 'MM', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_keaktifan`
--

CREATE TABLE `status_keaktifan` (
  `id_status_keaktifan` int(5) NOT NULL,
  `nama_status_keaktifan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_keaktifan`
--

INSERT INTO `status_keaktifan` (`id_status_keaktifan`, `nama_status_keaktifan`, `keterangan`) VALUES
(1, 'Aktif', ''),
(2, 'Tidak Aktif', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `id_status_kepegawaian` int(5) NOT NULL,
  `status_kepegawaian` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`id_status_kepegawaian`, `status_kepegawaian`, `keterangan`) VALUES
(1, 'Tenaga Honor Sekolah\n', ''),
(2, 'Guru Honor Sekolah\n', ''),
(3, 'PNS\r\n', ''),
(4, 'GTY/PTY\r\n', ''),
(5, 'CPNS\r\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pernikahan`
--

CREATE TABLE `status_pernikahan` (
  `id_status_pernikahan` int(5) NOT NULL,
  `status_pernikahan` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pernikahan`
--

INSERT INTO `status_pernikahan` (`id_status_pernikahan`, `status_pernikahan`, `keterangan`) VALUES
(1, 'Menikah', ''),
(2, 'Belum Menikah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(5) NOT NULL,
  `nama_tahun` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `nama_tahun`, `keterangan`, `aktif`) VALUES
(20151, 'Semester Ganjil 2018/2019', '2018/2019', 'Tidak'),
(20152, 'Semester Genap 2018/2019', '2020/2019', 'Tidak'),
(20161, 'Semester Ganjil 2019/2020', '2019/2020', 'Ya'),
(20162, 'Semester Genap 2019/2020', '2019/2020', 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telpon`, `jabatan`, `level`, `aktif`) VALUES
(1, 'admin', 'bff0cc42103de1b4721370e84dc24f635a7afeca41198c9b3e03946a1b6b7191d14356408a5e57ce6daf77e6e800c66fac7ab0482d57d48d23e6808e4b562daa', 'Administrator', 'admin@smkn7jember.sch.id', '081267771344', 'Kepala IT', 'superuser', 'Y'),
(2, 'kepsek', '2cd39b25613a7c5d37ff41cb39aba8ee5cb7fc1e238c3916b24ffa2f21e78652e0c0c74ea25b7f044e2275ecd16c559eb3e9c2743fa7debc8002c74657dcde14', 'Drs. kepsek Jaya, M.Pd', '@gmail.com', '082173054501', 'Kepala Sekolah', 'kepala', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id_absensi_siswa`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `catatan_wakel`
--
ALTER TABLE `catatan_wakel`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`kodejdwl`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indeks untuk tabel `jenis_ptk`
--
ALTER TABLE `jenis_ptk`
  ADD PRIMARY KEY (`id_jenis_ptk`);

--
-- Indeks untuk tabel `journal_list`
--
ALTER TABLE `journal_list`
  ADD PRIMARY KEY (`id_journal`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id_kalender_akademik`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kode_kehadiran`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `kelompok_mata_pelajaran`
--
ALTER TABLE `kelompok_mata_pelajaran`
  ADD PRIMARY KEY (`id_kelompok_mata_pelajaran`);

--
-- Indeks untuk tabel `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  ADD PRIMARY KEY (`id_kompetensi_dasar`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indeks untuk tabel `nilai_extrakulikuler`
--
ALTER TABLE `nilai_extrakulikuler`
  ADD PRIMARY KEY (`id_nilai_extrakulikuler`);

--
-- Indeks untuk tabel `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
  ADD PRIMARY KEY (`id_nilai_keterampilan`);

--
-- Indeks untuk tabel `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
  ADD PRIMARY KEY (`id_nilai_pengetahuan`);

--
-- Indeks untuk tabel `nilai_prestasi`
--
ALTER TABLE `nilai_prestasi`
  ADD PRIMARY KEY (`id_nilai_prestasi`);

--
-- Indeks untuk tabel `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  ADD PRIMARY KEY (`id_nilai_sikap`);

--
-- Indeks untuk tabel `nilai_sikap_semester`
--
ALTER TABLE `nilai_sikap_semester`
  ADD PRIMARY KEY (`id_nilai_sikap_semester`);

--
-- Indeks untuk tabel `nilai_uts`
--
ALTER TABLE `nilai_uts`
  ADD PRIMARY KEY (`id_nilai_uts`);

--
-- Indeks untuk tabel `predikat`
--
ALTER TABLE `predikat`
  ADD PRIMARY KEY (`id_predikat`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `status_keaktifan`
--
ALTER TABLE `status_keaktifan`
  ADD PRIMARY KEY (`id_status_keaktifan`);

--
-- Indeks untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD PRIMARY KEY (`id_status_kepegawaian`);

--
-- Indeks untuk tabel `status_pernikahan`
--
ALTER TABLE `status_pernikahan`
  ADD PRIMARY KEY (`id_status_pernikahan`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id_absensi_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `catatan_wakel`
--
ALTER TABLE `catatan_wakel`
  MODIFY `id_catatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `kodejdwl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_ptk`
--
ALTER TABLE `jenis_ptk`
  MODIFY `id_jenis_ptk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `journal_list`
--
ALTER TABLE `journal_list`
  MODIFY `id_journal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id_kalender_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelompok_mata_pelajaran`
--
ALTER TABLE `kelompok_mata_pelajaran`
  MODIFY `id_kelompok_mata_pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  MODIFY `id_kompetensi_dasar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nilai_extrakulikuler`
--
ALTER TABLE `nilai_extrakulikuler`
  MODIFY `id_nilai_extrakulikuler` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
  MODIFY `id_nilai_keterampilan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
  MODIFY `id_nilai_pengetahuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `nilai_prestasi`
--
ALTER TABLE `nilai_prestasi`
  MODIFY `id_nilai_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  MODIFY `id_nilai_sikap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `nilai_sikap_semester`
--
ALTER TABLE `nilai_sikap_semester`
  MODIFY `id_nilai_sikap_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai_uts`
--
ALTER TABLE `nilai_uts`
  MODIFY `id_nilai_uts` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `predikat`
--
ALTER TABLE `predikat`
  MODIFY `id_predikat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id_sesi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1276;

--
-- AUTO_INCREMENT untuk tabel `status_keaktifan`
--
ALTER TABLE `status_keaktifan`
  MODIFY `id_status_keaktifan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  MODIFY `id_status_kepegawaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status_pernikahan`
--
ALTER TABLE `status_pernikahan`
  MODIFY `id_status_pernikahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20164;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
