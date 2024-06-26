-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table pmr.failed_jobs: ~0 rows (approximately)

-- Dumping data for table pmr.jurusan: ~8 rows (approximately)
INSERT INTO `jurusan` (`id_jurusan`, `jurusan`, `status`) VALUES
	(1, 'Rekayasa Perangkat Lunak', 'on'),
	(2, 'Desain Komunikasi Visual', 'on'),
	(3, 'Teknik Jaringan Komputer dan Telekomunikasi', 'on'),
	(4, 'Teknik Jaringan Akses Telekomunikasi', 'on'),
	(5, 'Teknik Komputer Jaringan', 'on'),
	(6, 'Animasi', 'on'),
	(11, 'Tata Boga', 'off'),
	(12, 'Teknik Mesin', 'off'),
	(13, 'Perhotelan', 'on'),
	(14, 'Administrasi', 'off'),
	(15, 'Cyber Security', 'off');

-- Dumping data for table pmr.kegiatan: ~8 rows (approximately)
INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tautan_dokumentasi`, `deskripsi`, `tanggal`, `created_at`, `updated_at`) VALUES
	(2, 'Sehat Jasmani', 'http://127.0.0.1:000000/kegiatan/dokumentasi/create', 'Kegiatan Wajib. Semua Anggota telah mengikuti', '2023-12-01', '2023-11-27 21:53:56', '2023-11-27 21:53:56'),
	(5, 'Gizi Seimbang itu Penting', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'Ini deskripsi dari kegiatan gizi seimbang', '2023-11-10', '2023-11-29 15:08:28', '2023-11-29 15:08:28'),
	(6, 'Makan Daun', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'Ayo jadi vegetarian!', '2023-12-01', '2023-11-30 19:27:01', '2023-11-30 19:27:01'),
	(7, 'Jalan Sehat', 'http://127.0.0.1:8000/api/kegiatan/dokumentasi/create', 'Dilaksanakan oleh semua Anggota', '2023-11-10', '2023-12-03 00:42:56', '2023-12-03 00:42:56'),
	(8, 'mau pingsan saya', 'http://127.0.0.1:000000/kegiatan/dokumentasi/create', 'saya ngantuk berat. semoga besok kadar darah ngga rendah-rendah bgt', '2023-12-04', '2023-12-03 08:47:24', '2023-12-03 08:48:19'),
	(9, 'hello world', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'hello world', '2023-12-04', '2023-12-03 08:48:54', '2023-12-03 08:48:54'),
	(10, 'Makan Bersama', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'Kegiatan ini dilaksanakan oleh seluruh anggota PMR', '2023-12-04', '2023-12-03 18:54:59', '2023-12-03 18:54:59'),
	(11, 'Pertolongan Pertama', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'Ini deskripsi', '2023-12-06', '2023-12-05 20:45:39', '2023-12-05 20:45:39'),
	(12, 'Kunjungan ke Rumah Sakit Syifa Medika', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'diikuti oleh anggota A, B, C, D, E. dan dibimbing oleh kaka pembina X', '2023-12-21', '2023-12-20 19:01:42', '2023-12-20 19:01:42'),
	(13, 'hello world', 'http://127.0.0.1:8000/kegiatan/dokumentasi/create', 'ini deskripsi', '2024-02-01', '2024-01-31 15:55:20', '2024-01-31 15:55:20'),
	(14, 'Sosialisasi PPDB Tahun Ajaran 2024/2025', 'http://127.0.0.1:000000/kegiatan/dokumentasi/create', 'Pengambilan Video Konten PPDB SMK Telkom Banjarbaru', '2024-06-13', '2024-06-12 19:22:14', '2024-06-12 19:22:14'),
	(15, 'Vaksinasi Sekolah', 'http://127.0.0.1:000000/kegiatan/dokumentasi/create', 'Vaksinasi SMK Telkom Banjarbaru', '2024-06-13', '2024-06-12 20:06:28', '2024-06-12 20:06:28');

-- Dumping data for table pmr.kelas: ~22 rows (approximately)
INSERT INTO `kelas` (`id_kelas`, `kelas`, `status`) VALUES
	(1, 'XA', 'on'),
	(2, 'XB', 'on'),
	(3, 'XC', 'on'),
	(4, 'XD', 'on'),
	(5, 'XE', 'on'),
	(6, 'XF', 'on'),
	(7, 'XG', 'on'),
	(8, 'XIA', 'on'),
	(9, 'XIB', 'on'),
	(10, 'XIC', 'on'),
	(11, 'XID', 'on'),
	(12, 'XIE', 'on'),
	(13, 'XIF', 'on'),
	(14, 'XIG', 'on'),
	(15, 'XIIA', 'on'),
	(16, 'XIIB', 'on'),
	(17, 'XIIC', 'on'),
	(18, 'XIID', 'on'),
	(19, 'XIIE', 'on'),
	(20, 'XIIF', 'on'),
	(21, 'XIIG', 'on'),
	(26, 'XIIH', 'off'),
	(27, 'XII I', 'off'),
	(28, 'XII J', 'off');

-- Dumping data for table pmr.migrations: ~11 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(202, '2023_11_13_205631_create_kalender_table', 3),
	(270, '2014_10_12_000000_create_users_table', 4),
	(271, '2014_10_12_100000_create_password_reset_tokens_table', 4),
	(272, '2019_08_19_000000_create_failed_jobs_table', 4),
	(273, '2019_12_14_000001_create_personal_access_tokens_table', 4),
	(274, '2023_11_13_204147_create_siswa_table', 4),
	(290, '2023_11_13_205537_create_kegiatan_table', 5),
	(291, '2023_11_13_205646_create_presensi_table', 5),
	(292, '2023_11_13_205659_create_pendaftar_table', 5),
	(293, '2023_11_22_061558_create_kelas_table', 5),
	(294, '2023_11_22_061614_create_jurusan_table', 5);

-- Dumping data for table pmr.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table pmr.pendaftar: ~9 rows (approximately)
INSERT INTO `pendaftar` (`id_pendaftar`, `nis`, `email`, `nama_siswa`, `id_jurusan`, `id_kelas`, `no_telp`, `status`) VALUES
	(74, '5433221193', '5433221193@smktelkom-bjb.sch.id', 'Desy Adelina R', 4, 11, '08317789009', 'terima'),
	(75, '5433221194', '5433221194@smktelkom-bjb.sch.id', 'Abdul', 4, 7, '085622119945', 'terima'),
	(83, '5432211177', '5432211177@smktelkom-bjb.sch.id', 'Aya', 5, 5, '08317789009', 'terima'),
	(90, '54322111125', '54322111125@smktelkom-bjb.sch.id', 'Gusti Alifa Rahmi Gusda', 4, 8, '08317789009', 'terima'),
	(91, '5432211111', '5432211111@smktelkom-bjb.sch.id', 'Desy Adelina R', 5, 12, '082288762111', 'terima'),
	(92, '543221171', '543221171@smktelkom-bjb.sch.id', 'Miya Ariyani', 4, 8, '085622119945', 'terima'),
	(94, '543221173', '543221173@smktelkom-bjb.sch.id', 'Yaya Wulandara', 5, 16, '085622119945', 'pending'),
	(95, '543221174', '543221174@smktelkom-bjb.sch.id', 'Dina Puspita', 3, 15, '083155210021', 'pending'),
	(96, '543221199', '543221199@smktelkom-bjb.sch.id', 'Farhana', 1, 18, '083155210021', 'terima'),
	(97, '543221193', '543221193@smktelkom-bjb.sch.id', 'Desy Adelina R', 1, 11, '082199800211', 'terima');

-- Dumping data for table pmr.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table pmr.presensi: ~12 rows (approximately)
INSERT INTO `presensi` (`id_presensi`, `nis`, `tanggal_presensi`, `status_presensi`) VALUES
	(9, '5432211111', '2023-12-01 02:10:30', 'sakit'),
	(10, '5432211113', '2023-12-01 09:45:05', 'izin'),
	(11, '5432211114', '2023-12-01 13:16:22', 'hadir'),
	(12, '5432211115', '2023-12-01 13:16:49', 'hadir'),
	(13, '5432211111', '2023-12-01 16:19:43', 'izin'),
	(14, '5432211111', '2023-12-02 03:10:16', 'hadir'),
	(15, '5432211114', '2023-12-03 08:16:06', 'hadir'),
	(16, '5433221193', '2023-12-03 08:17:57', 'izin'),
	(17, '5432211111', '2023-12-03 13:52:55', 'izin'),
	(18, '5432211112', '2023-12-04 01:03:32', 'hadir'),
	(19, '5432211114', '2023-12-04 01:04:51', 'hadir'),
	(20, '5432211114', '2023-12-04 01:52:03', 'hadir'),
	(21, '5433221193', '2023-12-04 02:09:01', 'hadir'),
	(22, '5432211111', '2023-12-21 02:51:17', 'hadir'),
	(23, '543221193', '2024-06-13 03:14:48', 'sakit');

-- Dumping data for table pmr.siswa: ~16 rows (approximately)
INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_jurusan`, `id_kelas`, `email`, `no_telp`, `status`) VALUES
	('5432211115', 'Udin Pratama', 3, 8, '543221115@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('5432211119', 'Sabrina Aprilia', 3, 6, '5432211119@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('5432211120', 'Johan Ardiansyah', 3, 14, '5432211120@smktelkom-bjb.sch.id', '085622119945', 'aktif'),
	('5432211117', 'Farhan Sucipto', 4, 18, '5432211117@smktelkom-bjb.sch.id', '082288762111', 'aktif'),
	('5432211121', 'Dian Salma', 4, 6, '5432211119@smktelkom-bjb.sch.id', '081245537991', 'aktif'),
	('5432211118', 'Danang Jayantara', 4, 6, '5432211118@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('5433221194', 'Abdul', 4, 7, '5433221194@smktelkom-bjb.sch.id', '085622119945', 'aktif'),
	('5433221193', 'Desy Adelina R', 4, 11, '5433221193@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('543221885', 'John Doe', 5, 10, '543221885@smktelkom-bjb.sch.id', '0817726991', 'aktif'),
	('5433221196', 'Tester aio', 4, 6, '5433221196@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('5432211177', 'Aya', 5, 5, '5432211177@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('54322111129', 'Novi Adinda', 4, 8, '54322111129@smktelkom-bjb.sch.id', '083155210021', 'aktif'),
	('54322111125', 'Gusti Alifa Rahmi Gusda', 4, 8, '54322111125@smktelkom-bjb.sch.id', '08317789009', 'aktif'),
	('5432211111', 'Desy Adelina R', 5, 12, '5432211111@smktelkom-bjb.sch.id', '082288762111', 'aktif'),
	('543221171', 'Miya Ariyani', 4, 8, '543221171@smktelkom-bjb.sch.id', '085622119945', 'aktif'),
	('543221193', 'Desy Adelina R', 1, 11, '543221193@smktelkom-bjb.sch.id', '082199800211', 'aktif'),
	('543221199', 'Farhana', 1, 18, '543221199@smktelkom-bjb.sch.id', '083155210021', 'aktif');

-- Dumping data for table pmr.users: ~3 rows (approximately)
INSERT INTO `users` (`id_user`, `nis`, `nama_siswa`, `email`, `password`) VALUES
	(1, NULL, '', 'tester@team.com', '$2y$10$RCfHzmlvDcy/EH8abUWYJeyNHudUs3LnnvDvWVTLTvYv4hD..VIbW'),
	(4, '5432211111222', 'Test#Admin edited', 'tester#admin@gmail.com', '$2y$10$EvvQ7Im3xTLDaFEdWol3WelhXxSA21YH5mA8cPGZvgghRqafaNyua'),
	(6, '5432211121', 'Dian Salma', '5432211121@smktelkom-bjb.sch.id', '$2y$10$QL9lU91w81F.CsNrSmqmxuk4IvsIUc8qthU2LAUpDX/ScajltIH16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
