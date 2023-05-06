-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 06:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uphbisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_abt` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jenis_isi` mediumtext NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_abt`, `jenis`, `jenis_isi`, `image`) VALUES
(1, 'About Us', '<h3>About UPH Bisa</h3><p>UPH Bisa is a company that specializes in providing sponsorships for events held at Universitas Pelita Harapan (UPH). Established in 2020, UPH Bisa is committed to supporting events that promote innovation, creativity, and community engagement.</p><p>At UPH Bisa, we believe that supporting events is more than just a marketing strategy. We see it as an opportunity to invest in the development of our future leaders and to promote the growth of the local community. Our team consists of passionate professionals who are dedicated to helping event organizers achieve their goals and to creating a positive impact in the society. Whether you are an event organizer looking for a sponsor or a company interested in supporting events at UPH, we are here to help. Contact us to learn more about our sponsorship opportunities and how we can work together to make your event a success.</p><p>&nbsp;</p>', '16452875fa0fa1.jpg'),
(2, 'Our Goals', '<h3><i>UPH Bisa Goals</i></h3><p>At UPH Bisa, our mission is to support the success of events held at UPH through our sponsorship program. We aim to build strong partnerships with event organizers and provide them with the resources they need to create impactful and memorable experiences for their audience. Our goal is to contribute to the growth of the UPH community and to inspire and empower the next generation of leaders.</p>', ''),
(3, 'Our Location', '<p>Located in Lippo Plaza Medan, our place is easily accessible to all. Come visit us and let\'s work together to make your event a success!</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.989536524681!2d98.67159271143447!3d3.589874450268471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131cf83481853%3A0x3a7bca4684a64298!2sAryaduta%20Medan!5e0!3m2!1sid!2sid!4v1683130311062!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `bnft`
--

CREATE TABLE `bnft` (
  `id_benefit` int(20) NOT NULL,
  `benefit` mediumtext NOT NULL,
  `bronze` int(10) NOT NULL,
  `silver` int(10) NOT NULL,
  `gold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bnft`
--

INSERT INTO `bnft` (`id_benefit`, `benefit`, `bronze`, `silver`, `gold`) VALUES
(1, 'Adding a logo to an Instagram post for an event.', 1, 2, 3),
(2, 'Adding a logo to the event poster displayed on the UPH Medan Campus bulletin board.', 1, 2, 3),
(3, 'Adding a logo in appreciation post.', 1, 2, 3),
(4, 'Adding a logo to the digital poster that will be distributed by the Student Life Department.', 1, 2, 3),
(5, 'Adding a logo at the beginning and end of the event vlog.', 1, 2, 3),
(6, 'Distributing product brochures to participants.', 1, 2, 3),
(7, 'Awarding plaques to sponsors at the end of the event.', 0, 0, 1),
(8, 'Placing a standing banner in the Student Lounge area on the 6th floor.', 0, 0, 1),
(9, 'Mentioning and explaining the company at the event.', 0, 0, 1),
(10, 'Interactive quiz.', 0, 0, 1),
(11, '30-second benefit video on Instagram Story.', 1, 2, 3),
(12, 'Screening a 30-second advertisement video at the event.', 1, 2, 3),
(13, 'Honorable Credits.', 1, 1, 2),
(14, 'Adlibs', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(32) NOT NULL,
  `orgn` varchar(40) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` mediumtext NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `acara_detail` longtext NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `images` varchar(220) NOT NULL,
  `harga_gold` int(20) NOT NULL,
  `harga_silver` int(20) NOT NULL,
  `harga_bronze` int(20) NOT NULL,
  `ship_gold` mediumtext NOT NULL,
  `ship_silver` mediumtext NOT NULL,
  `ship_bronze` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `orgn`, `judul`, `tanggal`, `lokasi`, `deskripsi`, `acara_detail`, `jenis`, `images`, `harga_gold`, `harga_silver`, `harga_bronze`, `ship_gold`, `ship_silver`, `ship_bronze`) VALUES
(1, 'BEM', 'Escape The Ordinary', '2023-03-16', 'UPH Lippo Plaza Medan', '<p>Badan Eksekutif Mahasiswa UPH (BEM-UPH) merupakan sebuah organisasi kemahasiswaan yang berfungsi sebagai badan eksekutif tingkat universitas dan dibentuk dengan tujuan untuk meningkatkan kualitas hidup mahasiswa, baik secara akademik maupun non akademik. Dalam mencapai tujuan tersebut, BEM-UPH mengimplementasikannya melalui program kerja yang diselenggarakan sesuai dengan kebutuhan mahasiswa yang tercermin dalam Pedoman Badan Eksekutif Mahasiswa (BEM GBH) yang ditetapkan oleh Dewan Perwakilan Mahasiswa (MPM UPH).</p>', '<p>Pernahkah Anda merasa memiliki potensi untuk melakukan sesuatu yang besar namun tidak tahu apa itu? Ingin menantang diri Anda ke tingkat yang baru? Badan Eksekutif Mahasiswa Medan hadir untuk memberi Anda kesempatan untuk menjelajahi dan mengambil langkah kecil untuk keluar dari zona nyaman Anda.</p>', 'Talk Show', '1Escape The Ordinar643d088dcd67a.jpg', 1500000, 1000000, 500000, '<p>Membarikan barang/jasa senilai Rp. 1.500.000</p>', '<p>Membarikan barang/jasa senilai Rp. 1.000.000</p>', '<p>Membarikan barang/jasa senilai Rp. 500.000</p>'),
(2, 'BEM', 'Fit For Future', '2023-03-16', 'UPH Medan', '<p>Badan Eksekutif Mahasiswa UPH (BEM-UPH) merupakan sebuah organisasi kemahasiswaan yang berfungsi sebagai badan eksekutif tingkat universitas dan dibentuk dengan tujuan untuk meningkatkan kualitas hidup mahasiswa, baik secara akademik maupun non akademik.<br>Dalam mencapai tujuan tersebut, BEM-UPH mengimplementasikannya melalui program kerja yang diselenggarakan sesuai dengan kebutuhan mahasiswa yang tercermin dalam Pedoman Badan Eksekutif Mahasiswa (BEM GBH) yang ditetapkan oleh Dewan Perwakilan Mahasiswa (MPM UPH).</p>', '<p>Fit For Future (FFF) merupakan sebuah acara yang diadakan untuk membantu Anda mendapatkan lebih banyak wawasan tentang pentingnya memiliki gaya hidup yang sehat.</p>', 'Seminar', '2Fit For Future643d089e9b434.jpg', 1500000, 999000, 599000, '<p>Membarikan barang/jasa senilai Rp. 1.500.000</p>', '<p>Membarikan barang/jasa senilai Rp. 999.000</p>', '<p>Membarikan barang/jasa senilai Rp. 599.000</p>'),
(4, 'SGS', 'Christmas Celebration', '2022-12-02', 'UPH Lippo Plaza', '<p>Spiritual Growth for Students (SGS) merupakan sebuah organisasi kemahasiswaan dari Universitas Pelita Harapan yang bertujuan untuk mengembangkan spiritualitas mahasiswa dan membantu mereka bertumbuh sebagai murid Kristus.</p>', '<p>Christmas Celebration 2022 merupakan sebuahacara tahunan yang diselenggarakan oleh Spiritual Growth for Student (SGS) yang bertujuan memperingati kelahiran Yesus Kristus ke dunia untuk menyelamatkan umat manusia. Natal juga mengajarkan tentang kesederhanaan dimana Yesus Kristus sang Juru Selamat umat manusia yang adalah Raja segala raja tidak lahir dalam kemewahan, melainkan dalam kandang domba.</p>', 'Seminar', '4Christmas Celebration643cad1af169b.jpg', 999000, 749000, 499000, '<p>Membarikan barang/jasa senilai Rp. 999.000</p>', '<p>Membarikan barang/jasa senilai Rp. 749.000</p>', '<p>Membarikan barang/jasa senilai Rp. 499.000</p>'),
(5, 'SGS', 'Welcoming New Student', '2022-09-15', 'UPH Medan', '<p>Spiritual Growth for Students (SGS) merupakan sebuah organisasi kemahasiswaan dari Universitas Pelita Harapan yang bertujuan untuk mengembangkan spiritualitas mahasiswa dan membantu mereka bertumbuh sebagai murid Kristus.</p>', '<p>Welcoming New Students 2022 merupakan sebuah acara tahunan yang diselenggarakan oleh Spiritual Growth for Student (SGS) yang bertujuan untuk menyapa dan memperkenalkan mahasiswa baru ke dalam komunitas Kristiani yang ada di Kampus UPH Medan.</p>', 'Seminar', '5Welcoming New Student643d2ca0cd0a0.jpg', 10000000, 5000000, 1000000, '<p>Membarikan barang/jasa senilai Rp. 10.000.000</p>', '<p>Membarikan barang/jasa senilai Rp. 5.000.000</p>', '<p>Membarikan barang/jasa senilai Rp. 1.000.000</p>'),
(7, 'HMPSSI', 'INTECH', '2023-08-17', 'UPH Medan Lippo Plaza', '<p>Himpunan Mahasiswa Sistem Informasi</p>', '<p>Tempat dimana anda mengeksplorasi diri anda</p>', 'Talk Show', '76453d51e2da77.jpg', 1500000, 1000000, 500000, '<p>Mendukung acara dengan memberikan bantuan berupa barang ataupun jasa senilai 1500000</p>', '<p>Mendukung acara dengan memberikan bantuan berupa barang ataupun jasa senilai 1000000</p>', '<p>Mendukung acara dengan memberikan bantuan berupa barang ataupun jasa senilai 500000</p>'),
(8, 'SGS', 'CORES Day 1', '2023-06-15', 'UPH Medan Lippo', '<p>Spiritual Growth for Students (SGS) merupakan sebuah organisasi kemahasiswaan dari Universitas Pelita Harapan yang bertujuan untuk mengembangkan spiritualitas mahasiswa dan membantu mereka bertumbuh sebagai murid Kristus.</p>', '<p>Wadah Kerohanian Anak Anak Kristen UPH Medan</p>', 'Seminar', '86453d622cbd1c.jpg', 700000, 600000, 500000, '<p>Mendukung dalam bentuk memberi barang atau jasa senilai Rp. 700.000</p>', '<p>Mendukung dalam bentuk memberi barang atau jasa senilai Rp. 600.000</p>', '<p>Mendukung dalam bentuk memberi barang atau jasa senilai Rp. 500.000</p>'),
(9, 'HMPSA', 'Digital Marketing Hacks One Step Ahead', '2023-09-27', 'Aryaduta Medan', '<p>Himpunan Mahasiswa Akuntansi</p>', '<p>Seminar yang berbicara tentang Digital Marketing</p>', 'Talk Show', '96453d69966c72.jpg', 5000000, 2000000, 1000000, '<p>Mendukung dalam bentuk memberikan barang atau jasa senilai Rp. 5000000</p>', '<p>Mendukung dalam bentuk memberikan barang atau jasa senilai Rp. 2000000</p>', '<p>Mendukung dalam bentuk memberikan barang atau jasa senilai Rp. 1000000</p>'),
(10, 'BEM', 'Mindset Enchancement', '2023-07-19', 'Lippo Plaza', '<p>Badan Eksekutif Mahasiswa UPH (BEM-UPH) merupakan sebuah organisasi kemahasiswaan yang berfungsi sebagai badan eksekutif tingkat universitas dan dibentuk dengan tujuan untuk meningkatkan kualitas hidup mahasiswa, baik secara akademik maupun non akademik.<br>Dalam mencapai tujuan tersebut, BEM-UPH mengimplementasikannya melalui program kerja yang diselenggarakan sesuai dengan kebutuhan mahasiswa yang tercermin dalam Pedoman Badan Eksekutif Mahasiswa</p>', '<p>Semniar yang membahas tentang Mindset Enchancement</p>', 'Talk Show', '106453d765c4a30.jpg', 1500000, 1000000, 500000, '<p>Mendukung dalam memberikan barang atau jasa senilai Rp. 1500000</p>', '<p>Mendukung dalam memberikan barang atau jasa senilai Rp. 1000000</p>', '<p>Mendukung dalam memberikan barang atau jasa senilai Rp. 500000</p>'),
(11, 'HMPSM', 'Sweetest Journey 2.0', '2023-07-21', 'Aryaduta Medan', '<p>Himpunan Mahasiswa Manajemen</p>', '<p>Belajar Masak</p>', 'Talk Show', '116453d8c4b4ba3.jpg', 1000000, 800000, 500000, '<p>Membantu dalam bentuk barang atau jasa senilai 1000000</p>', '<p>Membantu dalam bentuk barang atau jasa senilai 800000</p>', '<p>Membantu dalam bentuk barang atau jasa senilai 500000</p>'),
(12, 'HMPSA', 'TALE HMPSA', '2023-06-28', '', '<p>Himpunan Mahasiswa Akuntansi</p>', '<p>Waktu tutor bersama antara Mahasiswa program studi HMPSA&nbsp;</p>', 'Seminar', '126453d94667620.jpg', 10000000, 749000, 499000, '', '', ''),
(13, 'HMPSM', 'TALE HMPSM', '2023-06-24', 'UPH Lippo Plaza Medan', '<p>Himpunan Mahasiswa Manajemen</p>', '<p>Tutor bersama mahasiswa jurusan HMPSM</p>', 'Seminar', '136453d9b9df4b2.jpg', 999000, 600000, 499000, '<p>membantu dalam bentuk jasa atau barang senilai Rp. 999.000</p>', '<p>membantu dalam bentuk jasa atau barang senilai Rp. 600.000</p>', '<p>membantu dalam bentuk jasa atau barang senilai Rp. 499.000</p>'),
(14, '', ' Efektivitas Penerapan Ecourt', '2023-08-21', 'UPH Lippo Plaza Medan', '', '<p>Webinar Efektivitas Penerapan Ecourt dan Pendirian E-PT Serta Layanan Pemerintah Lainnya Secara Elektronik Di Indonesia</p>', 'Talk Show', '146453da1b618a1.jpg', 10000000, 5000000, 1000000, '<p>Mendukung dalam bentuk barang atau jasa senilai Rp. 10000000</p>', '<p>Mendukung dalam bentuk barang atau jasa senilai Rp. 5000000</p>', '<p>Mendukung dalam bentuk barang atau jasa senilai Rp. 1000000</p>');

-- --------------------------------------------------------

--
-- Table structure for table `login_db`
--

CREATE TABLE `login_db` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `uname` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akses` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `bio` longtext NOT NULL,
  `image` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_db`
--

INSERT INTO `login_db` (`id`, `name`, `uname`, `pass`, `akses`, `email`, `no_telp`, `bio`, `image`) VALUES
(1, 'Samuel Zakaria H', 'Sam28', 'f858f289d49b93a8e6be89aad98c9a59', 'admin', '', '', '', ''),
(3, 'Willbert Wisely', 'Wwy', '88049629ab490893f23d5383191daae3', 'user', 'wilbert@gmail.com', '081398987656', 'Saya adalah seorang CEO berpengalaman dan visioner di bidang teknologi dan energi. saya memulai karir di perusahaan besar di Silicon Valley, dan kemudian memimpin beberapa perusahaan startup yang sukses dalam mengembangkan teknologi baru dan inovatif. Selama bertahun-tahun, saya terlibat aktif dalam industri mobil listrik, dan memperoleh pengetahuan yang mendalam tentang tren dan tantangan di dalamnya, dan juga memiliki pemahaman yang kuat tentang keberlanjutan dan dampak lingkungan, serta tekad untuk mengembangkan solusi yang inovatif dan berkelanjutan untuk tantangan energi global. Dengan pengalaman, keahlian, dan visinya, ia siap untuk membawa Tesla ke tingkat yang lebih tinggi sebagai CEO baru, memperkuat posisi Tesla sebagai pemimpin inovasi dalam industri mobil listrik dan energi yang sangat keren.', '3Wwy643d280711920.jpg'),
(4, 'Christopher Alex', 'Chai', 'a08372b70196c21a9229cf04db6b7ceb', 'user', 'chai@gmail.com', '0822325653345', 'Saya bergabung dengan Apple pada tahun 1998 dan sebelumnya menjabat sebagai Chief Operating Officer (COO) sebelum menjadi CEO pada tahun 2011. Sebelum bergabung dengan Apple, saya pernah bekerja di perusahaan seperti IBM dan Compaq. Sebagai CEO Apple, saya telah memimpin perusahaan untuk merilis produk-produk yang sukses seperti iPhone, iPad, dan Apple Watch, serta memperluas bisnis perusahaan ke bidang layanan seperti Apple Music dan Apple TV+.', '4Chai643d27a7e4e0a.jpg'),
(11, 'chai', 'chirst', 'aa345bd4cc9a99b5b1a984277a09d447', 'user', 'chai@gmail.com', '0987654', '', ''),
(12, 'gilbert', 'gilbert1', 'c3301e135a2487455d4fbe4dba732ece', 'user', 'gilbert@gmail.com', '008765432', '<p>saya <strong>wibu</strong></p>', '12gilbert1643e0314e917a.jpg'),
(13, 'chai', 'chai1', 'ab44a0f9b509cad748d3eeaefe3c5006', 'admin', 'chai@gmail.com', '0987654', '', ''),
(14, 'Jastin', 'tintin', 'bfeacf440c5bdba1e790fec99399618f', 'user', 'jastin@gmail.com', '+6281370309604', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `idp` int(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Subject` text NOT NULL,
  `msg` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idp`, `uname`, `email`, `Subject`, `msg`) VALUES
(1, 'ShadowLuar', 'vinson@gmail.com', 'Keluhan', 'Tolong deskripsi BEM pada event Fit For Future dilengkapin dengan pesan berikut \r\n\r\nBadan Eksekutif Mahasiswa UPH (BEM-UPH) merupakan sebuah organisasi kemahasiswaan yang berfungsi sebagai badan eksekutif tingkat universitas dan dibentuk dengan tujuan untuk meningkatkan kualitas hidup mahasiswa, baik secara akademik maupun non akademik. Dalam mencapai tujuan tersebut, BEM-UPH mengimplementasikannya melalui program kerja yang diselenggarakan sesuai dengan kebutuhan mahasiswa yang tercermin dalam Pedoman Badan Eksekutif Mahasiswa (BEM GBH) yang ditetapkan oleh Dewan Perwakilan Mahasiswa (MPM UPH).'),
(2, 'Ivanaa', 'jodie@gmail.com', 'Saran', 'mungkin akan lebih baik jika gambar dari event Escape The Ordinary ditambahkan');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `rcpt` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `id_info` int(20) NOT NULL,
  `jenis_benefit` varchar(50) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_receipt` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`rcpt`, `id`, `id_info`, `jenis_benefit`, `metode`, `harga`, `status`, `id_receipt`) VALUES
(20, 14, 1, 'gold', 'Transfer', 1500000, 'Approved', '645303de06410'),
(21, 3, 4, 'silver', 'Transfer', 0, 'Rejected', '645303ff66526'),
(22, 3, 1, 'bronze', 'Transfer', 500000, 'Approved', '6453056d0540d'),
(23, 14, 4, 'gold', 'Transfer', 999000, '', '64531b86c225c'),
(24, 14, 4, 'silver', 'Transfer', 749000, 'Rejected', '64531b8deabe2'),
(25, 14, 1, 'bronze', 'Partnership', 500000, 'Approved', '64533bbb6261b');

-- --------------------------------------------------------

--
-- Table structure for table `trns`
--

CREATE TABLE `trns` (
  `id_trns` int(11) NOT NULL,
  `id_receipt` mediumtext NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` int(20) NOT NULL,
  `status` mediumtext NOT NULL,
  `id_transaksi` mediumtext NOT NULL,
  `image_trns` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trns`
--

INSERT INTO `trns` (`id_trns`, `id_receipt`, `tanggal_transaksi`, `total_transaksi`, `status`, `id_transaksi`, `image_trns`) VALUES
(12, '645303de06410', '2023-05-09', 1500000, 'Approved', '645303e524344', '645303e524344645303f104dad.png'),
(13, '645303ff66526', '2023-05-16', 0, 'Rejected', '64530464cce41', '64530464cce4164530476189a0.png'),
(14, '6453056d0540d', '2023-05-01', 500000, 'Approved', '645305a729caf', '645305a729caf645305b8c5879.png'),
(15, '64531b8deabe2', '2023-05-01', 749000, 'Rejected', '64531ba0f2d31', '64531ba0f2d3164531bb2b3f31.png'),
(16, '64533bbb6261b', '2023-05-01', 500000, 'Approved', '645345e9a3551', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `trns_approval`
--

CREATE TABLE `trns_approval` (
  `id_trnsapp` int(20) NOT NULL,
  `id_transaksi` mediumtext NOT NULL,
  `name_trns` varchar(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `acc_num` int(20) NOT NULL,
  `total_transaksi` int(20) NOT NULL,
  `image_trns` mediumtext NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trns_approval`
--

INSERT INTO `trns_approval` (`id_trnsapp`, `id_transaksi`, `name_trns`, `tanggal_transaksi`, `acc_num`, `total_transaksi`, `image_trns`, `status`) VALUES
(12, '645303e524344', 'Jastin', '2023-05-09', 23424636, 1500000, '645303e524344645303f104dad.png', 'Approved'),
(13, '64530464cce41', 'Willbert Wisely', '2023-05-16', 2147483647, 0, '64530464cce4164530476189a0.png', 'Rejected'),
(14, '645305a729caf', 'Willbert Wisely', '2023-05-01', 2147483647, 500000, '645305a729caf645305b8c5879.png', 'Approved'),
(15, '64531ba0f2d31', 'Jastin Efgan', '2023-05-01', 2147483647, 749000, '64531ba0f2d3164531bb2b3f31.png', 'Rejected'),
(16, '645345e9a3551', 'Cookies Mama', '2023-05-01', 2147483647, 500000, ' ', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_abt`);

--
-- Indexes for table `bnft`
--
ALTER TABLE `bnft`
  ADD PRIMARY KEY (`id_benefit`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `login_db`
--
ALTER TABLE `login_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`rcpt`);

--
-- Indexes for table `trns`
--
ALTER TABLE `trns`
  ADD PRIMARY KEY (`id_trns`);

--
-- Indexes for table `trns_approval`
--
ALTER TABLE `trns_approval`
  ADD PRIMARY KEY (`id_trnsapp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_abt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bnft`
--
ALTER TABLE `bnft`
  MODIFY `id_benefit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login_db`
--
ALTER TABLE `login_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `idp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `rcpt` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `trns`
--
ALTER TABLE `trns`
  MODIFY `id_trns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trns_approval`
--
ALTER TABLE `trns_approval`
  MODIFY `id_trnsapp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
