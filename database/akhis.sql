-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2021 pada 14.55
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `no_hp`, `email`, `password`, `foto`, `status_online`) VALUES
(11021001, 'Admin Akhis', '6281290345678', 'akhis@gmail.com', '$2y$10$vCrBRT7mStlN6GyRS7XcfudtU7ElFNBHrChDcUXqRX5.l51ypDPBq', 'default-L.png', 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
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
-- Struktur dari tabel `chat`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `aturan_minum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `digital_payment`
--

CREATE TABLE `digital_payment` (
  `id_dp` int(11) NOT NULL,
  `no_akun` varchar(16) NOT NULL,
  `nama_platform` varchar(35) NOT NULL,
  `atas_nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `digital_payment`
--

INSERT INTO `digital_payment` (`id_dp`, `no_akun`, `nama_platform`, `atas_nama`) VALUES
(1, '087654362892', 'dana', 'admin akhis'),
(2, '087654362892', 'gopay', 'admin akhis'),
(3, '12457292462', 'Bank Mandiri', 'admin akhis'),
(4, '45372478392', 'Bank BCA', 'admin akhis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `controller_access` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `role`, `controller_access`) VALUES
(1, 'admin', 'admin'),
(2, 'dokter', 'dokter'),
(3, 'pasien', 'pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `jenis`) VALUES
(1, 'kapsul'),
(2, 'bubuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `live_chat`
--

CREATE TABLE `live_chat` (
  `id_LC` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `terakhir_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
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
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `komposisi`, `dosis`, `efek_samping`, `harga`, `satuan`, `keterangan`, `gambar`, `created_at`, `id_admin`) VALUES
(1, 'Sumagesic 600 mg 4', 'bubuk', 'Tiap tablet mengandung Paracetamol 600 mg', 'Dewasa : 1 tablet, 3-4 kali sehari atau sesuai petunjuk dokter.', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: - Penggunaan untuk jangka waktu lama dan dosis besar dapat menyebabkan kerusakan fungsi hati. - Reaksi hipersensitifitas/ alergi.', 3200, 'strip', 'SUMAGESIC TABLET merupakan obat dengan kandungan Paracetamol 600 mg. Obat ini dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol pada kandungan obat ini bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik).\r\nIndikasi Umum', '1635250167.jpg', '2021-10-26', 11021001),
(2, 'Paracetamol (Acetaminophen)', 'kapsul', 'Setiap tablet mengandung Paracetamol 500 mg', 'Dewasa: 1-2 kaplet, 3-4 kali per hari. Penggunaan maximum 8 kaplet per hari. Anak 7-12 tahun : 0.5 - 1 kaplet, 3-4 kali per hari. Penggunaan maximum 4 kaplet per hari.', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: - Penggunaan untuk jangka waktu lama dan dosis besar dapat menyebabkan kerusakan fungsi hati. - Reaksi hipersensitifitas/ alergi.', 2000, 'Strip', 'PARACETAMOL TABLET merupakan obat yang dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik.', '1635251133.jpg', '2021-10-26', 11021001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `invoice` varchar(25) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `no_resi` varchar(35) DEFAULT 'belum dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `nama_resep` varchar(60) NOT NULL,
  `created_at` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail_resep`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Stand-in struktur untuk tampilan `v_pesanan`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur untuk view `v_detail_resep`
--
DROP TABLE IF EXISTS `v_detail_resep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_resep`  AS SELECT `dr`.`id` AS `id`, `dr`.`id_resep` AS `id_resep`, `r`.`nama_resep` AS `nama_resep`, `dr`.`id_obat` AS `id_obat`, `o`.`nama_obat` AS `nama_obat`, `dr`.`Qty` AS `Qty`, `dr`.`aturan_minum` AS `aturan_minum`, `o`.`gambar` AS `gambar`, `o`.`harga`* `dr`.`Qty` AS `sub_total`, `r`.`id_dokter` AS `dibuat_oleh`, `r`.`id_pasien` AS `dibuat_untuk`, `p`.`nama_lengkap` AS `nama_lengkap`, `p`.`alamat` AS `alamat`, `p`.`no_hp` AS `no_hp` FROM (((`detail_resep` `dr` join `resep` `r` on(`dr`.`id_resep` = `r`.`id_resep`)) join `obat` `o` on(`dr`.`id_obat` = `o`.`id_obat`)) join `pasien` `p` on(`r`.`id_pasien` = `p`.`id_pasien`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pesanan`
--
DROP TABLE IF EXISTS `v_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesanan`  AS SELECT `p`.`id_resep` AS `id_resep`, `ps`.`foto` AS `foto`, `ps`.`nama_lengkap` AS `nama_lengkap`, `r`.`nama_resep` AS `nama_resep`, `p`.`status` AS `status`, `ps`.`alamat` AS `alamat`, `ps`.`no_hp` AS `no_hp` FROM ((`pesanan` `p` join `resep` `r` on(`p`.`id_resep` = `r`.`id_resep`)) join `pasien` `ps` on(`r`.`id_pasien` = `ps`.`id_pasien`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikael`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_resep_ibfk_1` (`id_resep`),
  ADD KEY `detail_resep_ibfk_2` (`id_obat`);

--
-- Indeks untuk tabel `digital_payment`
--
ALTER TABLE `digital_payment`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `live_chat`
--
ALTER TABLE `live_chat`
  ADD PRIMARY KEY (`id_LC`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obat_ibfk_1` (`id_admin`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `transaksi_ibfk_1` (`id_resep`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `resep_ibfk_1` (`id_dokter`),
  ADD KEY `resep_ibfk_2` (`id_pasien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `digital_payment`
--
ALTER TABLE `digital_payment`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `id_LC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
