-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 07:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `status_online` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `no_hp`, `email`, `password`, `foto`, `status_online`) VALUES
(11021001, 'Admin Akhis', '6281290345678', 'akhis@gmail.com', '$2y$10$vCrBRT7mStlN6GyRS7XcfudtU7ElFNBHrChDcUXqRX5.l51ypDPBq', 'default-L.png', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikael` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `isi` text NOT NULL,
  `created_at` date NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_LC` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `dari` int(11) NOT NULL,
  `kepada` int(11) NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  `jam_dikirim` time NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_LC`, `pesan`, `dari`, `kepada`, `tanggal_dikirim`, `jam_dikirim`, `status`) VALUES
(66, 37, 'siang dok saya ingin konsultasi mengenai sakit yang saya rasakan.\nTelinga saya sepertinya sedang bermasalah dok kira-kira obat apa ya dok yang ampuh?', 32111001, 22111001, '2021-12-10', '13:34:10', 'dibaca'),
(67, 37, 'selamat siang pak putra, di layanan AKHIS kami telah menyediakan obat untuk mengatasi masalah telinga bapak untuk melunakkan kotoran telinga dan  mencegah infeksi di telinga bapak ', 22111001, 32111001, '2021-12-10', '13:37:26', 'dibaca'),
(68, 37, 'obat apa ya dok namanya? bisa kah saya minta resep obat dari dokter untuk mengatasi telinga saya yang sedang bermasalah dok?', 32111001, 22111001, '2021-12-10', '13:39:13', 'dibaca'),
(69, 37, 'nama obatnya vital ear oil pak. baik akan saya buatkan resep untuk bapak putra pangestu', 22111001, 32111001, '2021-12-10', '13:40:24', 'dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `aturan_minum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id`, `id_resep`, `id_obat`, `Qty`, `aturan_minum`) VALUES
(32, 28, 12, 1, '2x sehari');

-- --------------------------------------------------------

--
-- Table structure for table `digital_payment`
--

CREATE TABLE `digital_payment` (
  `id_dp` int(11) NOT NULL,
  `no_akun` varchar(16) NOT NULL,
  `nama_platform` varchar(35) NOT NULL,
  `atas_nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `digital_payment`
--

INSERT INTO `digital_payment` (`id_dp`, `no_akun`, `nama_platform`, `atas_nama`) VALUES
(1, '087654362892', 'dana', 'admin akhis'),
(2, '087654362892', 'gopay', 'admin akhis'),
(3, '12457292462', 'Bank Mandiri', 'admin akhis'),
(4, '45372478392', 'Bank BCA', 'admin akhis');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `status_online` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `foto`, `nama_lengkap`, `jenis_kelamin`, `email`, `password`, `status_online`) VALUES
(22111001, '1636109599.jpg', 'dr Yosua simbolon', 'L', 'yosua@gmail.com', '$2y$10$9IU/rxLkCzea46Rmy8JWBeOmP5/c0YlzuPgeuW1ykiwPvxDnfR12u', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `controller_access` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `role`, `controller_access`) VALUES
(1, 'admin', 'admin'),
(2, 'dokter', 'dokter'),
(3, 'pasien', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `jenis`) VALUES
(1, 'kapsul'),
(2, 'bubuk'),
(3, 'sirup'),
(4, 'tablet'),
(5, 'tetes');

-- --------------------------------------------------------

--
-- Table structure for table `live_chat`
--

CREATE TABLE `live_chat` (
  `id_LC` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `terakhir_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_chat`
--

INSERT INTO `live_chat` (`id_LC`, `id_pasien`, `id_dokter`, `terakhir_chat`) VALUES
(37, 32111001, 22111001, '2021-12-10 13:40:24'),
(38, 32111003, 22111001, '2021-11-05 18:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `komposisi` text NOT NULL,
  `dosis` text NOT NULL,
  `efek_samping` text NOT NULL,
  `harga` double NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL,
  `created_at` date NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `komposisi`, `dosis`, `efek_samping`, `harga`, `satuan`, `keterangan`, `gambar`, `created_at`, `id_admin`) VALUES
(1, 'Sumagesic 600 mg 4', 'bubuk', 'Tiap tablet mengandung Paracetamol 600 mg', 'Dewasa : 1 tablet, 3-4 kali sehari atau sesuai petunjuk dokter.', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: - Penggunaan untuk jangka waktu lama dan dosis besar dapat menyebabkan kerusakan fungsi hati. - Reaksi hipersensitifitas/ alergi.', 3200, 'strip', 'SUMAGESIC TABLET merupakan obat dengan kandungan Paracetamol 600 mg. Obat ini dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol pada kandungan obat ini bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik).\r\nIndikasi Umum', '1635250167.jpg', '2021-10-26', 11021001),
(2, 'Paracetamol (Acetaminophen)', 'kapsul', 'Setiap tablet mengandung Paracetamol 500 mg', 'Dewasa: 1-2 kaplet, 3-4 kali per hari. Penggunaan maximum 8 kaplet per hari. Anak 7-12 tahun : 0.5 - 1 kaplet, 3-4 kali per hari. Penggunaan maximum 4 kaplet per hari.', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: - Penggunaan untuk jangka waktu lama dan dosis besar dapat menyebabkan kerusakan fungsi hati. - Reaksi hipersensitifitas/ alergi.', 2000, 'Strip', 'PARACETAMOL TABLET merupakan obat yang dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik.', '1635251133.jpg', '2021-10-26', 11021001),
(7, 'Mylanta Cair 50 ML 50ML', 'sirup', 'Per 5 mL : Alumunium hidroksida 200 mg, Magnesium hidroksida 200 mg, Simetikon 20 mg.\r\n    Dosis. Dewasa : 1-2 sendok takar (5-10 mL) 3-4 kali sehari. ...\r\n    Dikonsumsi 1 jam sebelum makan atau 2 jam sesudah makan dan menjelang tidur.\r\n    Green.\r\n    Dus, Botol @ 150 ml.\r\n    Integrated Healthcare Indonesia.\r\n    BPOM: DBL1441200233A1.', 'Diminum 1 jam sebelum atau 2 jam setelah makan dan menjelang tidur. Dewasa: 5 sampai 10 ml, 3 s/d 4 kali sehari.', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah:\r\n1. Bisa menyebabkan Mual atau muntah.\r\n2. Rasa terbakar di mulut atau tenggorokan.\r\n3. Konstipasi atau justru diare.\r\n4. Perubahan persepsi rasa (dysgeusia)', 13000, 'Botol', 'Mylanta adalah obat yang bermanfaat untuk meredakan gejala sakit maag, seperti mual atau sakit dan sakit atau perih di perut. Selain itu, obat ini juga bisa digunakan untuk menangani asam lambung berlebih pada penderita gastritis, tukak lambung, atau gastroesophageal reflux disease (GERD). ', '1636175792.jpg', '2021-11-06', 11021001),
(8, 'Antasida (antacid)  Doen 10 Tablet', 'tablet', 'Komposisi\r\nAlumunium Hydroxide 200 mg, Magnesium Hydroxide 200 mg', 'Dosis\r\nDewasa : 1-2 tablet, 3-4 kali per hari. Anak (6-12 tahun) : 0.5-1 tablet, 3-4 kali per hari.', 'Konstipasi, Diare, Mual', 1500, 'strip', 'Antasida menyembuhkan sakit maag dengan mengatasi asam berlebih di dalam lambung. Penetral asam, seperti bahan-bahan yang terkandung dalam Mylanta , bekerja menurunkan asam lambung dalam hitungan detik. Juga dengan benefit lain nya seperti menyamankan rasa tidak enak di tenggorokan saat Anda meminumnya..\r\n\r\ndengan bekerja menurunkan asam lambung dalam hitungan detik, antasida ini meredakan nyeri dengan cepat\r\n', '1636177727.jpg', '2021-11-06', 11021001),
(9, 'Panadol Anak Syrup 1-6 tahun', 'sirup', 'Tiap 5 ml mengandung : Paracetamol 160 mg.\r\nDikonsumsi sebelum atau sesudah makan.\r\nJangan digunakan pada penderita yang menderita kerusakan hati dan alergi terhadap Paracetamol.\r\nGreen.\r\nDus, Botol @ 30 ml.\r\nSterling.\r\nBPOM: DBL7624501537A1.', 'Anak usia 2-3 tahun: 1 sendok takar (5 ml), diberikan 3-4 kali sehari. - Anak usia 4-5 tahun: 1.5 sendok takar (7.5 ml), diberikan 3-4 kali sehari. - Anak usia 6 tahun: 2 sendok takar (10 ml), diberikan 3-4 kali sehari. Maksimum interval penggunaan dosis adalah 4 jam dan tidak melebihi 4 kali dalam 24 jam.', 'Kandungan paracetamol dan obat lain dalam Panadol jarang menyebabkan efek samping, terutama jika dikonsumsi menurut dosis yang dianjurkan. Namun, pada beberapa orang, Panadol dapat menimbulkan efek samping, seperti:\r\n\r\n 1. Pusing\r\n 2. Sulit tidur\r\n 3. Muntah\r\n 4. Nyeri perut\r\n 5. Urine berwarna gelap\r\n 6. Sulit buang air kecil\r\n 7. Tubuh mudah lelah\r\n 8. Kulit dan putih mata menguning atau penyakit kuning', 65000, 'Botol', 'Panadol adalah obat yang mengandung paracetamol. Panadol memiliki beberapa varian yang ditujukan untuk meredakan gejala dan keluhan, seperti demam, flu, sakit kepala, hidung tersumbat, batuk tidak berdahak, bersin-bersin atau imunisasi.  Panadol juga sering digunakan untuk meredakan sakit gigi/tumbuh gigi dan nyeri otot.\r\n\r\nPanadol mengandung paracetamol sebagai bahan aktif utama. Beberapa varian Panadol juga mengandung kombinasi paracetamol dengan bahan aktif lain, seperti dextromethorphan, phenylephrine, dan pseudoephedrin.', '1636179724.jpg', '2021-11-06', 11021001),
(10, 'Ambeven', 'kapsul', 'Komposisi\r\nGraphtophyllum picatum 30%, Sophora jamponica 15%, Rubia cordifolia 15%, Coleus atropurpureus 10%, Saguisorba officinalis 10%, Kaemferiae angustifoliae 10%, Curcuma heynaenae 10%', 'Dosis Ambeven untuk orang dewasa adalah 2 kapsul untuk sekali minum. Obat harus diminum 3 kali sehari.\r\nUntuk dosis pemeliharaan, minum 1 kali kapsul obat sebanyak 3 kali dalam sehari. \r\n\r\nDosis obat untuk anak-anak belum ditentukan keamanan dan efektivitasnya. Baiknya konsultasikan ke dokter untuk mengetahui dosis pemakaian dan pengobatan lebih lanjut. \r\n\r\n*Informasi berikut ini tidak bisa dijadikan pengganti resep dokter. Anda HARUS berkonsultasi dengan dokter atau apoteker sebelum menggunakan obat ini.*', 'Efek samping Ambeven mungkin termasuk pusing, mengantuk, atau kelemahan tubuh. Maka itu, sebaiknya jangan dulu mengemudi atau mengoperasikan mesin berat setelah minum obat ini.\r\n\r\nTidak semua orang mengalami efek samping saat menggunakan obat ini. Mungkin juga ada beberapa efek samping yang belum disebutkan di atas. Bila Anda memiliki kekhawatiran mengenai efek samping tertentu, konsultasikanlah pada dokter atau apoteker Anda.', 12000, 'strip', 'Ambeven adalah obat untuk mengobati wasir atau ambeien. Wasir adalah kondisi di mana pembuluh darah vena di sekitar anus meradang atau bengkak. Kondisi juga sering disebut sebagai hemorrhoid.\r\n \r\nBiasanya wasir disebabkan karena sering dan terlalu keras mengejan saat BAB (buang air besar).', '1636182847.jpg', '2021-11-06', 11021001),
(11, 'Enstrostop Tablet Obat Diare Per Strip', 'tablet', 'Entrostop mengandung 650 mg attapulgite dan 50 mg pectin yang bekerja sama untuk untuk menyerap racun dan bakteri penyebab diare dalam usus, serta mengurangi jumlah cairan yang dikeluarkan. Selain itu, obat ini juga dapat mengurangi pergerakan usus sehingga keluhan nyeri perut akibat diare dapat berkurang.', 'Dewasa dan anak-anak usia >12 tahun: 2 tablet setiap selesai buang air besar sampai diare berhenti. Dosis maksimal 12 tablet per hari. Anak-anak usia 6–12 tahun: 1 tablet setiap selesai buang air besar sampai diare berhenti. Dosis maksimal dosis 6 tablet per hari.', 'Berikut ini adalah beberapa efek samping yang mungkin saja dapat terjadi setelah mengonsumsi Entrostop:\r\n\r\n 1. Konstipasi\r\n 2. Perut kembung\r\n 3. Sakit maag\r\n 4. Mual\r\n 5. Sakit kepala\r\n 6. Pusing\r\n 7. Kram perut\r\n\r\nSegera temui dokter jika efek samping tersebut tidak kunjung membaik, atau jika Anda mengalami reaksi alergi.', 8000, 'strip', 'Enstrostop adalah obat untuk Mengobati gejala diare dengan cara menyerap racun atau bakteri penyebab diare, mengeluarkan melalui BAB, kemudian menghentikan diare. Attapulgite :Menyerap racun dan bakteri penyebab diare.', '1636184875.jpg', '2021-11-06', 11021001),
(12, 'Vital Ear Drops 10 ml', 'tetes', 'Thymol 10 mg, menthol 20mg, camphor 600mg, paraffin liquid ad 10 ml', '2 tetes 3 kali sehari', 'Iritasi ringan pada telinga', 33000, 'Botol', '\r\nVITAL EAR OIL merupakan cairan tetes telinga yang mengandung Thymol, Oleum Menthol, dan Oleum Camphora. Cairan ini digunakan untuk mengatasi masalah telinga seperti melunakkan kotoran telinga dan mencegah infeksi telinga.', '1639112206.jpg', '2021-12-10', 11021001),
(13, 'Otilon Ear Drop 8 ml', 'tetes', 'Tiap ml mengandung: Polymyxin B Sulfate 10.000 IU, Neomycin Sulfate 5 mg, Fludrocortisone Acetate 1 mg, Lidocaine HCl 40 mg', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. 2-4 kali sehari 4-5 tetes. Batasi penggunaannya hingga maksimal 10 hari berturut-turut.\r\n\r\nAturan Pakai\r\nTeteskan pada telinga yang sakit', 'Sensitasi pada kulit, ototoksisitas, nefrotoksisitas, hiperpigmentasi, dermatitis oral, dermatitis kontak alergi, maserasi dan atrofi kulit, infeksi sekunder, striae, dan miliaria.', 55000, 'Botol', '\r\nOTILON EAR DROP merupakan sediaan tetes telinga yang mengandung komposisi Polymyxin B Suphate, Neomycin Sulphate, Fludrocortisone Acetate, Lidocaine HCl. Polymyxin B Suphate dan Neomycin Sulphate merupakan antibiotik dengan spektrum luas yang aktif terhadap berbagai mikroorganisme yaitu Pseudomonas aeruginosa, Staphylococcus aureus, Escherichia coli, Klebsiella, Enterobacter sp., Neisseria sp. Fludrocortisone Acetate mempunyai khasiat anti radang, anti alergi dan anti pruritus. Lidocaine HCl merupakan anestesi lokal yang efektif untuk mengurangi rasa sakit pada infeksi telinga. Obat ini digunakan untuk mengobati Otitis externa akut dan kronis yang disebabkan oleh bakteri yang peka terhadap Polymyxin dan Neomycin Sulphate. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.\r\n', '1639112577.jpg', '2021-12-10', 11021001),
(14, 'Insto Reguler Eye Drops 15 ml', 'tetes', 'Tetrahydrozoline HCl 0.05% w/v, Benzalkonium Cl 0.01% w/v', '2-3 tetes setiap kali pemakaian sebanyak 3-4 kali sehari atau sesuai dengan resep dokter', 'Ada beberapa efek samping yang bisa muncul akibat kandungan tetrahydrozoline, hypromellose, dan benzalkonium chloride di dalam Insto, antara lain:\r\n\r\n    Mata terasa pedih dan terbakar.\r\n    Rasa nyeri\r\n    Iritasi pada mata.\r\n    Mata memerah dan terasa hangat.\r\n\r\nSegera periksakan ke dokter jika muncul gejala efek samping tersebut agar dapat ditangani dengan tepat.', 15000, 'botol', 'INSTO REGULAR EYE DROP mengandung zat aktif 0,05 % tetrahydrozoline HCl dan 0.01% benzalkonium klorida yang digunakan untuk mengatasi mata merah dan rasa perih akibat iritasi mata ringan yang dapat disebabkan karena asap, debu dan lainnya.\r\n', '1639115334.jpg', '2021-12-10', 11021001),
(15, 'Breathy Nasal Drops 30 ml', 'tetes', 'Per mL : NaCl 6.5 mg', 'Bayi & anak > 1 bln : 1-2 tetes pada masing-masing lubang hidung', 'Reaksi Hipersensitiv', 50000, 'Botol', 'BREATHY merupakan obat tetes hidung yang digunakan untuk melembabkan membran nasal (hidung) yang kering dan meradang karena pilek, alergi, kelembaban yang rendah, dan iritasi hidung yang lainnya.\r\n\r\nBREATHY mengandung larutan NaCl yaitu larutan isotonis yang memiliki fungsi meringankan inflamasi membran hidung dengan mengencerkan lendir (ingus) supaya mudah keluar sekaligus melembabkan hidung yang kering.\r\n\r\nAturan Pakai\r\nDiteteskan melalui lubang hidung\r\n', '1639116442.jpg', '2021-12-10', 11021001),
(16, 'Xarelto 10 mg 10 Tablet', 'tablet', 'Rivaroxaban 10 mg', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. SPAF, dosis yang dianjurkan : 1 x sehari 20mg. Trombosis vena dalam (DVT), dosis yang dianjurkan : 2 x sehari 15mg selama 3 minggu pertama, dilanjutkan dengan 1 x sehari 20mg, maksimal 30mg per hari. Hari ke 22 dan seterusnya : 1 x sehari 20mg (maks). Pencegahan VTE pada orang dewasa yang menjalani operasi penggantian panggul atau lutut 10 mg sekali sehari. Durasi pengobatan: Operasi penggantian pinggul 5 minggu. Operasi penggantian lutut 2 minggu.\r\n\r\nAturan Pakai\r\nSebaiknya diberikan bersama dengan makanan', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: Anemia, pusing, pendarahan pada mata, takikardi, hipotensi hematoma, epitaksis, pendarahan saluran cerna, pruritus, nyeri otot, pendarahan saluran kemih, demam, peningkatan kadar transaminase, pendarahan pasca operasi', 400000, 'strip', '\r\nXARELTO TABLET merupakan antikoagulan yang mengandung Rivaroxaban 10 mg. Obat ini digunakan untuk deep vein thrombosis (DVT), pulmonary embolism (PE), dan atrial fibrillation (AFib). Xarelto menurunkan risiko stroke dan pembekuan darah pada pembuluh darah di tubuh. Obat ini bekerja dengan menghambat protein yang bekerja untuk pembekuan darah. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.\r\n', '1639117391.jpg', '2021-12-10', 11021001);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `status_online` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `password`, `foto`, `status_online`) VALUES
(32111001, 'putra pangestu', '', '2001-10-17', '<p>semanan</p>', '082121212', 'putra@gmail.com', '$2y$10$FM3IHjZNdD5RTCeowMRk7OO17UU1HCEQ/LuTsruvt4UAQpgsatDKy', 'default-L.png', 'online'),
(32111002, 'fatur', '', '0000-00-00', '', '', 'fatur@gmail.com', '$2y$10$PiTMYCZDGqZZmRRDiNoV4OAA06/8nPrC8fRs1bJzf9GaGyQ3ZU6hG', 'default-L.png', ''),
(32111003, 'rahmat', '', '2021-11-23', '<p>jalan bahagia</p>\r\n<p>kelurahan tegal alur</p>\r\n<p>kecamatan kalideres</p>\r\n<p>kota jakarta barat</p>', '9876543567', 'rahmat@gmail.com', '$2y$10$u6y135uHt6cGT4IBIL.PK.mk4ZLKuYLfuOQjFdOLLQeRMMvRqG5/W', 'default-L.png', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `dibayar_pada` date NOT NULL,
  `dikonfirmasi_pada` date NOT NULL,
  `total_bayar` double NOT NULL,
  `status_lunas` enum('lunas','belum lunas') NOT NULL,
  `keterangan` text NOT NULL,
  `id_dp` int(11) NOT NULL,
  `invoice` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `bukti_bayar`, `dibayar_pada`, `dikonfirmasi_pada`, `total_bayar`, `status_lunas`, `keterangan`, `id_dp`, `invoice`) VALUES
(9, '1636109676.png', '2021-11-05', '0000-00-00', 17000, 'belum lunas', '', 1, '210511021115'),
(10, '1636110564.jpg', '2021-11-05', '0000-00-00', 21400, 'belum lunas', '', 1, '210511061106'),
(11, '1636112450.jpg', '2021-11-05', '0000-00-00', 18200, 'belum lunas', '', 1, '210511061139'),
(12, '1638498044.jpg', '2021-12-03', '0000-00-00', 28000, 'belum lunas', '', 1, '212911031141'),
(13, '1638499593.jpg', '2021-12-03', '0000-00-00', 16500, 'belum lunas', '', 1, '210312091244');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `invoice` varchar(25) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `no_resi` varchar(35) DEFAULT 'belum dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`invoice`, `id_resep`, `status`, `no_resi`) VALUES
('211012011241', 28, 'menunggu pembayaran', 'belum dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `nama_resep` varchar(60) NOT NULL,
  `created_at` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `created_at`, `id_dokter`, `id_pasien`) VALUES
(23, 'obat demam', '2021-11-05', 22111001, 32111003),
(24, 'obat maag', '2021-11-05', 22111001, 32111003),
(28, 'sakit telinga', '2021-12-10', 22111001, 32111001);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_cek_resep`
-- (See below for the actual view)
--
CREATE TABLE `v_cek_resep` (
`id_resep` int(11)
,`nama_lengkap` varchar(35)
,`nama_resep` varchar(60)
,`created_at` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_resep`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_resep` (
`id` int(11)
,`id_resep` int(11)
,`nama_resep` varchar(60)
,`id_obat` int(11)
,`nama_obat` varchar(50)
,`Qty` int(11)
,`aturan_minum` text
,`gambar` text
,`sub_total` double
,`dibuat_oleh` int(11)
,`dibuat_untuk` int(11)
,`nama_lengkap` varchar(35)
,`alamat` text
,`no_hp` varchar(13)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `v_pesanan` (
`id_resep` int(11)
,`foto` text
,`nama_lengkap` varchar(35)
,`nama_resep` varchar(60)
,`status` varchar(35)
,`alamat` text
,`no_hp` varchar(13)
);

-- --------------------------------------------------------

--
-- Structure for view `v_cek_resep`
--
DROP TABLE IF EXISTS `v_cek_resep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cek_resep`  AS SELECT `r`.`id_resep` AS `id_resep`, `p`.`nama_lengkap` AS `nama_lengkap`, `r`.`nama_resep` AS `nama_resep`, `r`.`created_at` AS `created_at` FROM (`resep` `r` join `pasien` `p` on(`r`.`id_pasien` = `p`.`id_pasien`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_resep`
--
DROP TABLE IF EXISTS `v_detail_resep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_resep`  AS SELECT `dr`.`id` AS `id`, `dr`.`id_resep` AS `id_resep`, `r`.`nama_resep` AS `nama_resep`, `dr`.`id_obat` AS `id_obat`, `o`.`nama_obat` AS `nama_obat`, `dr`.`Qty` AS `Qty`, `dr`.`aturan_minum` AS `aturan_minum`, `o`.`gambar` AS `gambar`, `o`.`harga`* `dr`.`Qty` AS `sub_total`, `r`.`id_dokter` AS `dibuat_oleh`, `r`.`id_pasien` AS `dibuat_untuk`, `p`.`nama_lengkap` AS `nama_lengkap`, `p`.`alamat` AS `alamat`, `p`.`no_hp` AS `no_hp` FROM (((`detail_resep` `dr` join `resep` `r` on(`dr`.`id_resep` = `r`.`id_resep`)) join `obat` `o` on(`dr`.`id_obat` = `o`.`id_obat`)) join `pasien` `p` on(`r`.`id_pasien` = `p`.`id_pasien`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pesanan`
--
DROP TABLE IF EXISTS `v_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesanan`  AS SELECT `p`.`id_resep` AS `id_resep`, `ps`.`foto` AS `foto`, `ps`.`nama_lengkap` AS `nama_lengkap`, `r`.`nama_resep` AS `nama_resep`, `p`.`status` AS `status`, `ps`.`alamat` AS `alamat`, `ps`.`no_hp` AS `no_hp` FROM ((`pesanan` `p` join `resep` `r` on(`p`.`id_resep` = `r`.`id_resep`)) join `pasien` `ps` on(`r`.`id_pasien` = `ps`.`id_pasien`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikael`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_resep_ibfk_1` (`id_resep`),
  ADD KEY `detail_resep_ibfk_2` (`id_obat`);

--
-- Indexes for table `digital_payment`
--
ALTER TABLE `digital_payment`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_chat`
--
ALTER TABLE `live_chat`
  ADD PRIMARY KEY (`id_LC`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obat_ibfk_1` (`id_admin`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `transaksi_ibfk_1` (`id_resep`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `resep_ibfk_1` (`id_dokter`),
  ADD KEY `resep_ibfk_2` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `digital_payment`
--
ALTER TABLE `digital_payment`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id_LC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
