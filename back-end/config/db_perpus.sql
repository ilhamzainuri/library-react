-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2025 at 10:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `bukuId` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `eISBN` varchar(50) DEFAULT NULL,
  `jumlah_buku` int(5) NOT NULL,
  `kategoriId` int(11) DEFAULT NULL,
  `id_subkategori` int(11) DEFAULT NULL,
  `rakId` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`bukuId`, `judul`, `penulis`, `jumlah_halaman`, `format`, `penerbit`, `tahun_terbit`, `eISBN`, `jumlah_buku`, `kategoriId`, `id_subkategori`, `rakId`, `gambar`, `sinopsis`) VALUES
(2, 'Dasar-Dasar Teknik Informatika', 'Novega Pratama Adiputra', 117, 'Cetak', 'Deepublish', '2020', '978-623-02-0819-5', 15, 2, 6, 3, 'dasar2teknik-informatika.jpg', 'Perkembangan di bidang TIK (Teknologi Informasi dan Komunikasi) saat ini sangat pesat dan berpengaruh signifikan terhadap pribadi maupun komunitas, segala aktivitas, kehidupan, cara kerja, metode perkuliahan, gaya hidup maupun cara berpikir. Adapun jenis-jenis TIK yang kita kenal selama ini adalah radio; televisi; telepon (fixed dan mobile); faksimile; electronic recording (audio dan video); komputer dengan segala peripherals seperti software, hardware, dan useware (program atau isi informasi); dan jaringan (lokal, wilayah, dan global/internet). Teknologi informasi merupakan suatu teknologi yang digunakan untuk mengolah data, termasuk memproses, mendapatkan, menyusun, menyimpan, memanipulasi data dalam berbagai cara untuk menghasilkan informasi yang berkualitas, yaitu informasi yang relevan, akurat, dan tepat waktu. Teknologi ini menggunakan seperangkat komputer untuk mengolah data dan sistem jaringan untuk menghubungkan satu komputer dengan komputer yang lainnya sesuai dengan kebutuhan dan teknologi telekomunikasi digunakan agar data dapat disebar dan diakses secara global. Perkembangan kinerja komputer diukur dengan kecepatan kerjanya. Walau demikian, ternyata kinerja komputer berbanding terbalik dengan ukurannya. Awalnya satu unit komputer harus berukuran satu rumah, sekarang menjadi semakin kecil. Perkembangan itu juga diiringi dengan perkembangan internet atau interconnected networks sebagai media penyampai informasi yang sangat efektif. TIK telah menjadi simbol gelombang perubahan. Perkembangan teknologi informasi memacu untuk memasuki era baru dalam kehidupan. Kehidupan seperti ini dikenal dengan e-life (electronic life), artinya kehidupan ini sudah dipengaruhi'),
(3, 'Pengantar Manajemen', 'Herry Krisnandi, S.E., M.M. , Dr. Suryono Efendi, S.E., M.B.A., M.M. , Dr. Ir. Edi Sugiono, S.E., M.M.', 228, 'Cetak', 'LPU-UNAS', '2019', ' 978-623-7273-01-1', 5, 1, 5, 1, 'pengantar-manajemen.png', 'Ilmu Manajemen, dari waktu ke waktu senantiasa berubah. Berubah\r\nbukan berarti pandangan dan paradigma lama tidak penting, akan tetapi\r\nberubah menuju kemajuan. Sebab dasar pijakan untuk menuju\r\nkemajuan itu sudah barang tentu dilahirkan oleh para ahli manajemen\r\nsebelumnya.\r\nSaat diminta untuk memberikan prakata untuk buku Pengantar\r\nManajemen ini,saya sungguh terharu, berbagai perasaan berkecamuk di\r\nhati. Betapa malu saya, sebagai seorang guru besar ilmu manajemen,\r\nbelum sempat juga menyumbangkan ilmu dan pemikiran bagi\r\nperadaban umat manusia, seperti halnya yang dilakukan oleh penulis\r\nini. Berbagai tulisan saya selama ini tercecer dimana-mana, dan belum\r\nsempat juga mengumpulkannya untuk sekedar dibuatkan sebuah buku\r\nkumpulan karangan.'),
(4, 'Belajar WordPress Dari Dasar Hingga Mahir', 'Muhammad Fadillah Arsa', 337, 'Cetak', 'CV Jejak', '2021', '6233384079, 9786233384070', 8, 2, 6, 3, '1764862026_wordpress.jpg', 'WordPress merupakan Content Management System yang dapat kita pergunakan untuk membangun website dengan mudah. Dengan menggunakan WordPress, saat ini kita tidak lagi harus mempelajari web programming untuk membuat sebuah website, hanya perlu “klik, klik, klik” dalam beberapa jam saja website yang kita butuhkan sudah bisa dipublikasikan.                                                    \r\n\r\nBuku ini menyajikan materi pembelajaran lengkap belajar membuat website dengan wordpress dari mulai fundamental hingga studi kasus. Buku ini akan menjadi buku pembelajaran yang akan mengakomodasi teman-teman untuk bisa mahir membuat website jenis apapun dengan menggunakan WordPress.                          \r\n\r\nBuku ini terdiri atas 20 bab materi yang disusun secara sistematis untuk memudahkan proses belajar. Materi yang diajarkan termasuk materi pengenalan WordPress, pemasangan, pengaturan, pembelajaran dasar, materi lanjutan, dan praktek studi kasus seperti membuat blog pribadi, web portofolio, landing page, toko online, dan kursus online.              \r\n\r\nBuku ini cocok dibaca oleh semua kalangan. Karena saat ini membuat website sudah menjadi kemampuan yang wajib dimiliki semua orang untuk dapat sukses di era digital.'),
(5, 'Psikologi Kepribadian; Menyelami Misteri Kepribadian Manusi', 'Lynn Wilcox', 412, 'Cetak', 'IRCiSoD', '2018', '978-602-7696-64-8', 8, 1, 2, 2, '1764862455_PSIKOLOGI.webp', '\"Apa jadinya bila seseorang merasa bingung dengan pikiran dan perilakunya sendiri? Ada dualisme kepribadian dalam dirinya, yang satu mengarah pada keburukan, sedangkan yang lain mengajak pada kebaikan. Aktualisasi kepribadiannya kemudian ditentukan sepenuhnya oleh “nilai” yang memenangkan pertarungan kepribadian tersebut. Dan, ternyata, mayoritas kita justru mengidap problem kepribadian itu, yang pada tingkat lanjut berakibat pada dominannya rasa berdosa, bersalah, gelisah, bahkan dalam beberapa kasus berakhir dengan kegilaan atau bunuh diri. Tidak seorang pun menginginkan hal ini terjadi! Lantas apa yang mesti dilakukan? Buku ini adalah salah satu solusinya. Melalui lembar demi lembarnya,kita diajak untuk memahami integritas pribadi kita kea rah positif menggunakan metode psikoterapi Barat dan Islam (metode sufi). Proses konseling yang diajukan bersifat konseptual, komparatif, dan praktis. Sehingga, adakalanya psikoterapi Barat dan Islam bisa dijalankan secara beriringan atau berdasarkan prosedur masing-masing. Anda tinggal memilih: proses konseling Barat atau Islam, atau keduanya sekaligus. Yang pasti, proses apa pun yang Anda terapkan, semuanya bertujuan membentuk kepribadian yang kokoh, sehat, dan penuh dedikasi.\"'),
(12, 'Seporsi Mie Ayam Sebelum Mati', 'Brian Khrisna', 216, 'Cetak', 'Gramedia Widiasarana Indonesia', '2025', '9786020531328', 2, 3, 12, 4, '1766521004_95ob5m98ur.avif', 'Ale, seorang pria berusia 37 tahun memiliki tinggi badan 189 cm dan berat 138 kg. Badannya bongsor, berkulit hitam, dan memiliki masalah dengan bau badan. Sejak kecil, Ale hidup di lingkungan keluarga yang tidak mendukungnya. Ia tak memiliki teman dekat dan menjadi korban perundungan di sekolahnya.\r\nAle didiagnosis psikiaternya mengalami depresi akut. Bukannya Ale tidak peduli untuk memperbaiki dirinya sendiri, ia peduli. Ale telah berusaha mengatasi masalah-masalah yang timbul dari dirinya agar ia diterima di lingkungan pertemanan. Namun usahanya tidak pernah berhasil. Bahkan keluarganya pun tidak mendukungnya saat Ale membutuhkan sandaran dan dukungan.\r\n\r\nAtas itu semua, Ale memutuskan untuk mati. Ia mempersiapkan kematiannya dengan baik. Agar ketika mati pun, Ale tidak banyak merepotkan orang. Dua puluh empat jam dari sekarang, ia akan menelan obat antidepresan yang dia punya sekaligus. Sebelum waktu itu tiba, Ale membersihkan apartemennya yang berantakan, makan makanan mahal yang tak pernah ia beli, pergi berkaraoke dan menyanyi sepuasnya hingga mabuk.\r\n\r\nSaat 24 jam itu tiba, Ale telah bersiap dengan kemeja hitam dan celana hitam, bak baju melayat ke pemakamannya sendiri. Ia kenakan topi kecurut ulang tahun dan meletuskan konfeti yang ia beli untuk dirinya sendiri.\r\n“Selamat ulang tahun yang terakhir, Ale.”\r\n\r\nAle siap menenggak seluruh obat antidepresan yang ia punya. Saat ia memain-mainkan botolnya, Ale terdiam saat membaca anjuran di kemasan botol itu, dikonsumsi sesudah makan. Seketika perutnya berbunyi. Dan Ale pun memutuskan untuk makan dulu sebelum mengakhiri hidupnya. Setidaknya, itu akan menjadi satu-satunya keputusan yang bisa dia ambil atas kehendaknya sendiri. Setelah selama hidupnya ia tak pernah mampu melakukan hal-hal yang ia inginkan.\r\n\r\nAle akan makan seporsi mie ayam sebelum mati.'),
(13, 'Bandung Menjelang Pagi', 'Product image Brian Khrisna', 304, 'Cetak', 'Mediakita', '2024', '9789797948115', 6, 3, 12, 4, '1766522804_bandung.avif', 'Menjelang pagi, Bandung berubah menjadi kota yang tak lagi sama. Malam terasa sangat panjang dan lebih mencekam dari kelam. Para bandit, pemadat, tukang judi, bocah geng motor, begundal grafiti, semuanya berkeliaran bak tikus-tikus ketika air got meluap.\r\n\r\nDi kota ini, Dipha adalah bocah berandalan yang mampu mengerjakan apa saja. Berjualan bacang di Asia Afrika, pelayan kafe di Braga, buruh angkut kertas di Pajagalan, ataupun buruh kain di Tamin. Apa pun ia lakukan untuk bertahan hidup. Kemampuannya untuk mengerjakan apa saja itu membawanya bertemu dengan seorang gadis misterius bernama Vinda yang ngotot minta dicarikan tempat tinggal dengan segala syarat yang tak masuk akal.\r\n\r\nSeperti dipermainkan oleh takdir, satu-satunya tempat yang tersedia adalah kontrakan petak yang terletak tepat di seberang kontrakan Dipha. Mau tidak mau, Vinda akhirnya menempati kontrakan itu.\r\n\r\nVinda yang sangat mencintai Bandung begitu bertolak belakang dengan Dipha yang sudah mengenal betapa bobroknya kota itu ketika menjelang pagi. Asia Afrika, Braga, Dago, Kalipah Apo, Astana Anyar, Banceuy, Jalan ABC, dan seluruh jalan-jalan tikus di Kota Bandung menjadi saksi tumbuhnya perasaan di antara keduanya.\r\n\r\nNamun, sayangnya mereka berdua kerap lupa, bahwa sejatinya, oleh-oleh paling khas dari Kota Bandung adalah: patah hati.\r\n\r\n*****\r\nUntuk bertahan hidup di Bandung, Dipha bekerja serabutan. Apa pun akan ia kerjakan asalkan bisa mendapat uang untuk menyambung hidupnya sehari saja. Suatu siang, saat membawakan pesanan bacang untuk para petugas puskesmas, ia bertemu dengan seorang gadis misterius yang selalu memakai masker dan sarung tangan.\r\n\r\nSelanjutnya, ia dimintai tolong untuk mencarikan sebuah kosan yang murah dan bersih untuk gadis itu. Lama berkeliling Kota Bandung, mereka tak kunjung menemukan kosan yang sesuai. Hingga akhirnya Dipha membawa gadis itu ke kontrakan yang berada berseberangan dengan kontrakan yang juga ditumpanginya. Dimulailah hari-hari Dipha bersama si gadis misterius yang bernama Vinda. Cerita keduanya pun bergulir.\r\n\r\nVinda begitu mencintai Kota Bandung sedangkan Dipha telah melihat kota itu dari segala sisinya, termasuk sisi gelap yang selama ini tidak terlihat melalui lensa kamera para wisatawan. Jalan Asia Afrika, Braga, Dago, jembatan layang Pasupati, menjadi saksi berkembangnya rasa di antara keduanya. Namun, rahasia yang keduanya simpan akan menentukan apakah kisah mereka akan berakhir bahagia, ataukah mereka akan mendapat oleh-oleh terbaik yang diberikan Kota Bandung: patah hati.\r\n\r\nBandung Menjelang Pagi menceritakan tentang sepasang manusia yang bertemu, memadu kasih, dan dipaksa untuk berpisah di Kota Bandung. Isinya sarat dengan kehidupan yang dijalani kelompok masyarakat yang kerap terlewatkan oleh penglihatan mata. Cerita yang penuh harap akan hidup yang Bahagia, tapi terpaksa menerima realitas, bahwa manusia boleh berencana, tapi tetap Tuhan yang menentukan takdir tiap hamba-Nya.\r\n\r\nKeunggulan:\r\n· Karya terbaru Brian Khrisna, yang sudah dikenal ciamik merangkai cerita berbumbu comedy romance.\r\n· Di dalam buku ini, Brian Khrisna mengajak pembaca mengikuti kisah romansa sambil menjelajah spot-spot terkenal di Kota Bandung, seperti Jalan Asia Afrika, Jalan ABC, Dago, dan jembatan laying Pasupati.\r\n· Di dalam buku ini juga, Brian Khrisna menuliskan sisi lain Kota Bandung dan penduduknya, yang mungkin selama ini tidak tertangkap kamera wisawatan.\r\n· Brian Khrisna dengan sangat apik memadukan adegan-adegan dan dialog-dialog keseharian yang menggelitik, yang sudah menjadi ciri khas gaya penulisannya.\r\n· Terdapat barcode playlist YouTube dan Spotify yang berisikan lagu-lagu yang disebutkan di dalam cerita.\r\n· Terdapat ilustrasi tempat-tempat ikonik di Bandung di setiap awal bab.'),
(15, 'Starlas Midnight', 'Haicichy', 352, 'Cetak', 'Skuad', '2024', '9786349640336', 5, 3, 12, 4, '1766523053_STARLA.jpg', 'Starla selalu dijaga, dikurung dalam tembok bernama Dewangga-kakak yang terlalu protektif. Dunia Starla kecil. Terlalu rapat, terlalu sempit. Dan cinta selalu terasa seperti sesuatu yang harus dihindari.\r\n\r\n\"Jatuh cinta itu cuma luka yang dibungkus manis, Cinta itu penipu.\" Begitu katanya. Dan Starla percaya-sampai Erland datang.\r\n\r\nErland tak menawarkan mimpi. la hadir dengan luka, dengan sepi, dengan sisi dunia yang tak pernah diajarkan pada Starla. Namun, justru diretaknya, Starla merasa diterima. Dirapuhnya, ia merasa aman.\r\n\r\nMereka bertemu di tengah malam, di jam-jam dimana dunia tidak lagi berisik. Di tengah sunyi malam dan sorot lampu balkon, hati mulai bicara lebih lantang dari logika.\r\n\r\nJika cinta adalah bahaya, kenapa bersamanya aku merasa paling selamat?'),
(16, 'Pergi', 'Tere Liye', 459, 'Cetak', 'PENERBIT SABAK GRIP', '2021', '9786239554514', 8, 3, 12, 4, '1766523140_pergi.avif', 'Buku novel yang berjudul Pergi karya Tere Liye ini merupakan sekuel dari novel Pulang. Buku ini dapat dinikmati oleh pembaca remaja maupun dewasa. Sekuel dari Novel “Pulang” ini menceritakan tentang tokoh Bujang yang menjadi penerus Tauke Besar di Keluarga Tong, salah satu keluarga Shadow Economy di dunia. Semenjak dibawa dari Talang, Bujang dibesarkan menjadi laki-laki yang berpendidikan tinggi, cerdas, cekatan, ahli taktik, dan sekaligus tukang jagal nomor satu Keluarga Tong. Hingga akhir hayat Tauke Besar, Bujang yang masih tergolong muda dipilih menjadi Kepala Keluarga Tong, Tauke Besar yang baru.\r\n\r\nDibawah kepemimpinan Bujang, Keluarga Tong sering mengalami kesulitan serta serangan dari keluarga Shadow Economy yang lain. Masalah menjadi semakin rumit ketika ancaman justeru datang dari Master Dragon, kepala dari seluruh keluarga Shadow Economy yang seharusnya menjadi penengah di antara seluruh keluarga. Kemajuan bisnis Keluarga Tong dibawah pimpinan Bujang membuat Master Dragon cemas. Master Dragon menganggap bahwa Keluarga Tong akan menjadi ancaman atas kedudukannya sebagai kepala dari seluruh keluarga Shadow Economy.\r\n\r\nPerjalanan cerita semakin seru ketika perlawanan serta serangan demi serangan dilancarkan Mater Dragon demi menghancurkan pertahanan Keluarga Tong. Alur kisah diceritakan secara detail sehingga kita bisa merasakan suasana tegang peperangan yang terjadi antar keluarga Shadow Economy tersebut.\r\n\r\nKelanjutan cerita serunya dapat kalian dapatkan di dalam buku ini!\r\nSinopsis\r\nSebuah kisah tentang menemukan tujuan, ke mana hendak pergi, melalui kenangan demi kenangan masa lalu, pertarungan hidup-mati, untuk memutuskan ke mana langkah kaki akan dibawa.'),
(17, 'Bumi', 'Tere Liye', 438, 'Cetak', 'Sabak Grip Nusantara', '2022', '9786239726263', 7, 3, 12, 4, '1766523240_bumi.avif', '“Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian, tetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku menyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.”\r\n\r\nSinopsis\r\n\r\nTere Liye kembali mengkreasikan imajinasinya kedalam kedalam beberapa rangkaian novel.\r\n\r\nBumi, merupakan rangkaian awal dari kisah sekelompok anak remaja berkemampuan istimewa. Menceritakan tentang Raib, Ali, dan Seli yang bertualang ke dunia paralel. Mereka yang istimewa, mampu pergi ke dunia pararel bumi, bertemu dengan klan lain dan berhadapan dengan Tamus yang memiliki ambisi membebaskan si Tanpa Mahkota dan kemudian, menguasai bumi.\r\n\r\nPerkenalkan, Raib, seorang gadis belia berusia lima belas tahun yang tidak biasa. Dia bisa menghilang. Jangan beritahu siapapun, Itu adalah rahasia terbesar yang tak pernah ia ceritakan pada siapapun, termasuk kedua orangtuanya. Kehidupannya tetap berjalan normal, meskipun untuk dirinya sendiri. Tidak jarang Raib menjahili orang tuanya dengan tiba-tiba menghilang, lalu muncul kembali secara tiba-tiba membuat kaget kedua orangtuanya.\r\n\r\nTidak hanya menyuguhkan cerita fantasi, novel ini juga memberikan pesan moral tentang keluarga, dan persahabatan. Tere Liye sukses membangun kisah persahabatan antara Raib, Ali, dan Seli terasa nyata. Hubungan antara Raib dan keluarganya membuat pembaca penasaran sekaligus tersadar akan cara berkomunikasi dengan orang tua.\r\n\r\nTere Liye memberikan banyak kejutan di tiap halaman yang direpresentasikan oleh Raib, membuat pembaca dapat menikmati cerita yang seolah tidak akan ada habisnya. Tere Liye berhasil meracik buku ini sebagai bahan baca para pecinta novel sastra maupun fantasi.'),
(18, 'Psikologi Konseling', 'Prof Dr Zulfan Saam', 192, 'Cetak', 'Rajagrafindo', '2013', ' 978-979-769-609-2', 3, 1, 2, 2, '1766523359_psikologi konseling.avif', 'Psikologi Konseling'),
(19, 'Psikologi Pendidikan', 'Sumadi Suryabrata', 219, 'Cetak', 'Rajawali Press', '2021', '9789794210826', 4, 1, 2, 2, '1766523456_200010412_xl.avif', 'Pada hakikatnya pendidikan berlangsung sepanjang hidup manusia. Oleh Sebab itu persoalan psikologis yang bersangkutan dengan pendidikan sangat luas sekali. Buku ini. dengan pendekatan operasional. mencakup serta merangkum hampir semua persoalan psikologis dalam proses pendidikan. Diharapkan dengan pendekatan operasional ini. Psikologi Pendidikan sebagai pengetahuan amaliah benar-benar dapat memenuhi fungsinya.'),
(20, 'Psikologi Belajar', 'Rohmalina Wahab', 258, 'Cetak', 'RajaGrafindo Persada', '2014', '9789797698720', 3, 1, 2, 2, '1766523543_9789797698720_Psikologi-Bel.avif', 'Belajar adalah proses ketika seorang peserta didik mengalami perubahan dari satu kondisi kepada kondisi lain, kondisi yang lain tersebut tentu direncanakan, dikontrol dan dikendalikan. Rintangan atau hambatan yang dialami siswa dalam psikologi pendidikan disebut dengan hambatan atau kesulitan belajar. Mempelajari “psikologi belajar” bagi para pendidik atau calon pendidik sangatlah penting dan berguna. Dengan mempelajari psikologi belajar, para pendidik atau calon pendidik dapat mengetahui dan mempersiapkan langkah-langkah (strategi) apa saja yang dapat ditempuh guna menciptakan lingkungan dan proses belajar-mengajar yang dapat menumbuh-kembangkan bakat, pengetahuan dan kemampuan setiap peserta didik secara utuh.\r\nBuku ini menyajikan sejumlah materi yang perlu diketahui terkait psikologi belajar. Di dalamnya memuat ulasan mulai dari pengertian dan ruang lingkup psikologi belajar, masalah belajar, teori-teori belajar, motivasi belajar, perkembangan (psiko-fisik) peserta didik, strategi belajar, proses pembelajaran, hingga evaluasi dan prestasi belajar. Selain itu, penulis juga menghadirkan ayat-ayat Al-Qur’an untuk tiap-tiap topik psikologi belajar yang diperbincangkan di buku ini.\r\nBuku ini bisa dibaca oleh para mahasiswa utamanya mereka yang menempuh pendidikan di Fakultas Tarbiyah, Fakultas Pendidikan atau juga Fakultas Psikologi dari sejumlah perguruan tinggi di Indonesia. Di samping itu, buku ini bisa pula menjadi bahan bacaan bagi para pendidik, calon pendidik dan juga pemerhati dunia pendidikan atau pembaca secara umum yang tertarik dengan dunia pendidikan.'),
(21, 'Psikologi Pendidikan', 'A. Mustofa Bisri', 256, 'Cetak', ' Parama Ilmu', '2013', '9786021351321', 1, 1, 2, 2, '1766523609_9786021351321.avif', 'Psikologi pendidikan merupakan sebuah studi sistematis terhadap proses serta faktor-faktor yang ada hubungannya dengan pendidikan. Sedangkan pendidikan adalah proses pertumbuhan yang berlangsung melalui kegiatan belajar. Jadi, psikologi pendidikan ini memusatkan perhatian pada persoalan-persoalan yang berkaitan dengan proses dan faktor yang berhubungan dengan kegiatan belajar.\r\nPsikologi pendidikan adalah cabang dari ilmu psikologi yang dalam penguraian serta penelitiannya menekankan pada masalah pertumbuhan dan perkembangan anak, baik fisik maupun mental, yang sangat erat hubungannya dengan masalah pendidikan, terutama yang mempengaruhi proses dan keberhasilan mengajar.\r\nBuku ini akan membahas secara menyeluruh dan detail mengenai psikologi pendidikan, baik dalam kajian teori maupun prakteknya dalam proses belajar mengajar, sehingga tujuan dari ilmu ini untuk mendorong hasil yang lebih optimal dalam kegiatan serta hasil belajar mengajar pun bisa tercapai dengan baik. Selain itu, buku ini juga mengulas aspek-aspek pendidikan yang ditilik dari kacamata psikologi dan berisi sebelas bab.\r\nPembahasan bab tersebut dimulai dari definisi psikologi pendidikan itu sendiri; teori-teori pendidikan; proses dari perkembangan dan fase-fase pertumbuhan; perkembangan psikofisik dan kognitif; efisiensi, pendekatan, dan metode belajar; sampai mengenai belajar dan mengajar'),
(22, 'Sejarah Psikologi: Perkembangan Perspektif Teoritis', 'Irwanto, Ph.D', 392, 'Cetak', 'Gramedia Pustaka Utama', '2018', ' 9786020683279', 2, 1, 2, 2, '1766523680_9786020683279_Sejarah-Psikologi_Perkembangan-Perspektif-Teoritis.avif', 'Psikologi adalah disiplin ilmu yang mempelajari lebih dalam mengenai mental, pikiran, dan perilaku manusia. Disiplin ilmu ini meneliti alur pemikiran manusia dan alasan di balik perilaku dan tindakan tersebut. Ilmu psikologi ini sering kali dimanfaatkan untuk menyelesaikan masalah atau mencari solusi tepat dalam serangkaian aktivitas manusia yang kompleks.\r\n\r\nSejarah pemikiran psikologi merupakan sejarah panjang perdebatan mengenai “Siapa saya?” atau “Apa manusia itu dan bedanya dengan makhluk lain?” Dalam mengkaji sejarah psikologi, terdapat dua pendekatan yang bisa dilakukan. Pertama, psikologi sebagai disiplin ilmu yang berkembang menjadi profesi. Kedua, mempelajari apa saja yang dibahas dalam psikologi, sejak kapan tema-tema itu muncul, dan bagaimana tema-tema itu berkembang dalam sejarah ilmu sosial.\r\n\r\nBuku Sejarah Psikologi: Perkembangan Perspektif Teoritis karya Irwanto, Ph.D dan Felicia Y. Gunawan ini mengkaji sejarah psikologi menggunakan pendekatan kedua, yang terentang dari Socrates sampai tokoh psikologi dari Indonesia. Melalui pendekatan tersebut buku setebal 394 halaman yang diterbitkan oleh Gramedia Pustaka Utama pada 18 Oktober 2018 ini berupaya menggali sejarah munculnya gagasan tentang manusia dan perilakunya.\r\n\r\nBuku ini ditulis untuk tujuan yang sangat praktis, yaitu membantu mahasiswa mempelajari psikologi dalam konteks sejarah keilmuan dan perspektif para pemikirnya. Dengan kata lain, melalui buku ini pembaca akan belajar bagaimana asumsi-asumsi mengenai tingkah laku manusia—terutama mengenai unsur-unsur yang disebut perilaku—berkembang dan dipelajari dalam konteks sehari-hari dan dalam konteks filsafat manusia.'),
(23, 'Ekonomi Pembangunan Syariah Edisi Revisi', 'Irfan Syauqi Beik', 266, 'Cetak', 'RajaGrafindo Persada', '2016', '9789797699369', 1, 1, 5, 1, '1766523802_9789797699369_ekonomi-pembangunan-syariah-edisi-revisi.avif', 'Buku Ekonomi Pembangunan Syariah ini adalah buku teks yang didesain secara khusus untuk memberikan pengetahuan mengenai konsep ekonomi pembangunan dalam perspektif syariah. Di antara keunggulan buku ini adalah diperkenalkannya Model CIBEST sebagai alat ukur kesejahteraan dan kemiskinan dari perspektif syariah, yang terdiri atas kuadran CIBEST dan Indeks-lndeks kesejahteraan, kemiskinan materiil, kemiskinan spiritual dan kemiskinan absolut.'),
(24, 'Ekonomi & Bisnis Islam : Seri Konsep&Aplikasi Ekonomi', 'Dewan Pengurus Nasional Fordebi & Adesy', 460, 'Cetak', '9789797699918', '2016', '9789797699918', 3, 1, 5, 1, '1766523863_9789797699918_ekonomi_bisnis_islam_seri_konsep_aplikasi_ekonomi.avif', 'Buku Ekonomi dan Bisnis Islam: Seri Konsep dan Aplikasi Ekonomi\r\ndan Bisnis Islam ini merupakan sebuah buku komprehensif yang\r\nmembahas Manajemen Islam, Fiqih Muamalah, dan Ekonomi\r\nIslam. Pembelajar Ekonomi Islam akan mampu memahami\r\nbagaimana Islam memiliki implikasi atas semua praktik ekonomi,\r\nkhususnya pada lembaga keuangan syariah. Ekonomi Islam berbasis\r\nﬂow concept, bukan stock concept, meletakkan distribusi pada poin\r\nvital pertumbuhan ekonomi, salah satunya melalui zakat. Buku yang\r\ndisusun oleh dosen-dosen yang tergantung dalam Forum Dosen\r\nEkonomi dan Bisnis Islam (FORDEBI) ini, bekerja sama dengan\r\nAsosiasi Dosen Ekonomi Syariah (ADESy) menjadi rujukan penting\r\nbagi pembelajar ekonomi Islam di Indonesia.'),
(25, 'Analisis Regresi Dalam Penelitian Ekonomi & Bisnis', 'Agus Tri Basuki', 318, 'Cetak', 'RajaGrafindo Persada', '2016', '9789797699161', 3, 1, 5, 1, '1766523923_9789797699161.jpg', 'Ekonomi dan bisnis merupakan dua hal yang saling berhubungan satu sama lain. Ilmu ekonomi dan ilmu bisnis memiliki cakupan yang hampir sama. Salah satunya adalah penggunaan statistik untuk mendapatkan data dan hasil yang diinginkan. Fungsi statistik pada ilmu ekonomi adalah untuk mengetahui semua faktor yang berhubungan dengan permasalahan perusahaan. Dengan menggunakan statistik, kita dapat menyediakan beberapa data tertentu untuk menguraikan suatu masalah atau kondisi perusahaan. Selain itu, statistik juga dapat menjadi alat pengawasan dan pengendalian.\r\n\r\nSedangkan pada ilmu bisnis, statistik sangat diperlukan dalam usaha untuk mendapatkan data yang benar-benar sesuai prediksi dan berkualitas demi menghasilkan output atau keputusan yang tepat sasaran. Prediksi terhadap data-data ini memang harus dilakukan untuk meminimalkan terjadinya kesalahan-kesalahan dalam perencanaan bisnis kedepannya.\r\n\r\nBuku ini kami tujukan untuk para mahasiswa yang sedang mengambil mata kuliah statistik, metode penelitian dan penggunaan alat analisis regresi sebagai penelitian, baik program S1 dan S2, bahkan S3 di bidang ekonomi dan bisnis. Untuk itu, dalam buku ini kami mencoba menjelaskan berbagai misteri, sehingga dengan demikian buku ini akan membantu mereka untuk mendapatkan kemampuan dalam menganalisis data.\r\n\r\nBuku “Analisis Regresi dalam Penelitian Ekonomi & Bisnis” karya Agus Tri Basuki dilengkapi dengan aplikasi SPSS dan Eviews yang akan membantu Anda untuk melakukan pengolahan data statistik.'),
(26, 'Sejarah Pemikiran Ekonomi Islam Kontemporer', 'Havis Aravik, S.H.I., M.S.I.', 190, 'Cetak', 'Prenadamedia Group', '2017', '9786024222246', 4, 1, 5, 1, '1766523979_ID_SPEIK2018MTH04.avif', 'Ekonomi Islam bukan barang baru. Keberadaannya telah ada sejak disyariatkan Islam dan dipraktikkan secara komprehensif oleh manusia terbaik dunia Nabi Muhammad SAW—di mana tutur katanya senantiasa dalam bimbingan wahyu Allah SWT (QS. an-Najm [53]: 3-4), dan sikap hidupnya merupakan cerminan dari Al-Quran (QS. al-Qalam [68]: 4). Selanjutnya, praktik tersebut dilanjutkan dan dikembangkan para sahabat (khulafa ar-rasyidin) sampai ke bentuk pemerintahan Islam berwujud khilafah-khilafah dari Abbasiyah sampai ke Turki Utsmani. Oleh karena itu, ekonomi Islam merupakan konsep ekonomi ideal dan akan selalu relevan untuk masa kini dan masa mendatang (salih li kull zaman wa makan).\r\n\r\nBuku Sejarah Pemikiran Ekonomi Islam Kontemporer yang ada di tangan pembaca ini mengupas bagian-bagian penting dari sejarah dan pemikiran ekonomi Islam. Di dalam buku ini memuat berbagai biografi dan pemikiran ekonomi dari tokoh-tokoh ekonomi Islam kontemporer, seperti: Baqir al-Sadr, Bani Sadr, Muhammad Abdul Mannan, Monzer Kahf, Umer Chapra, Muhammad Nejatullah Siddiqi, Syed Nawab Haidar Naqvi, Muhammad Akram Khan, Muhammad Fahim Khan, dan Muhammad Sharif Chaudhry.\r\n\r\nBuku ini diperuntukkan untuk menunjang kegiatan pembelajaran yang terkait dengan isu-isu ekonomi Islam, khususnya mata kuliah Sejarah Pemikiran Ekonomi Islam dan bahan pendukung dalam disiplin ilmu ekonomi Islam yang digunakan di seluruh Universitas Islam Negeri (UIN), Institut Agama Islam Negeri/Swasta (IAIN/IAIS), dan Sekolah Tinggi Agama Islam Negeri/Swasta (STAIN/STAIS) maupun Sekolah Tinggi Ekonomi Islam di seluruh Indonesia.'),
(27, 'Ekonomi Industri', 'Muhammad Teguh', 274, 'Cetak', 'Rajagrafindo', '2010', '9789797693084', 6, 1, 5, 1, '1766524491_Ekonomi_Industri.avif', 'Ekonomi Industri'),
(28, 'Programming With Python: Kumpulan Contoh Kasus Python dan Machine Learning untuk Pemula', 'Product image Product image Product image Product image Jubilee Enterprise', 210, 'Cetak', 'Elex Media Komputindo', '2025', '9786230073939', 3, 2, 6, 3, '1766524646_g7yomah5ty.avif', 'Apakah Anda ingin memahami machine learning tetapi merasa konsepnya terlalu rumit?\r\n\r\nProgramming with Python: Kumpulan Contoh Kasus Python dan Machine Learning untuk Pemula dirancang untuk Anda yang baru memulai belajar machine learning . Dengan pendekatan praktis dan bahasa yang mudah dipahami, buku ini menyajikan topik-topik penting mulai dari pengenalan dasar hingga implementasi algoritma seperti regresi linear dan logistik, KNN, K-Means, decision tree, random forest, hingga SVM.\r\n\r\nDisertai contoh kasus nyata dan kode Python yang bisa langsung diunduh dan dijalankan, Anda akan belajar bagaimana:\r\n• Mempersiapkan data untuk model machine learning\r\n• Menerapkan berbagai algoritma populer\r\n• Menstandardisasi dan menormalisasi data\r\n• Mengukur kinerja model dengan metrik yang tepat\r\n• Menyimpan model untuk penggunaan jangka panjang\r\n\r\nBuku ini sangat cocok bagi pelajar, mahasiswa, pengajar, maupun profesional non-teknis yang ingin mulai memahami cara kerja kecerdasan buatan melalui Python.\r\n\r\n*****\r\nPernahkah Anda terpikir betapa menariknya dunia yang terbuka lebar lewat lembaran buku? Membaca bukan hanya kegiatan rutin, tetapi juga petualangan tak terbatas ke dalam imajinasi dan pengetahuan. Membaca mengasah pikiran, membuka wawasan, dan memperkaya kosakata. Ini adalah pintu menuju dunia di luar kita yang tak terbatas.\r\n\r\nTetapkan waktu khusus untuk membaca setiap hari. Dari membaca sebelum tidur hingga menyempatkan waktu di pagi hari, kebiasaan membaca dapat dibentuk dengan konsistensi. Pilih buku sesuai minat dan level literasi. Mulailah dengan buku yang sesuai dengan keinginan dan kemampuan membaca. Temukan tempat yang tenang dan nyaman untuk membaca. Lampu yang cukup, kursi yang nyaman, dan sedikit musik pelataran bisa menciptakan pengalaman membaca yang lebih baik. Bergabunglah dalam kelompok membaca atau forum literasi. Diskusikan buku yang Anda baca dan dapatkan rekomendasi dari sesama pembaca. Buat catatan atau jurnal tentang buku yang telah Anda baca. Tuliskan pemikiran, kesan, dan pelajaran yang Anda dapatkan.\r\n\r\nLibatkan keluarga dalam kegiatan membaca. Bacakan cerita untuk anak-anak atau ajak mereka membaca bersama. Ini menciptakan ikatan keluarga yang erat melalui kegiatan positif. Jangan ragu untuk menjelajahi genre baru. Terkadang, kejutan terbaik datang dari buku yang tidak pernah Anda bayangkan akan Anda nikmati. Manfaatkan teknologi dengan membaca buku digital atau bergabung dalam komunitas literasi online. Ini membuka peluang untuk terhubung dengan pembaca dari seluruh dunia.'),
(29, 'Jaringan Komputer Berbasis Mikrotik', 'Iwan Sofana', 406, 'Cetak', 'Informatika', '2015', '9786026232373', 3, 2, 6, 3, '1766524723_9786026232373_JARINGAN-KOMPUTER-BERBASIS-MIKROTIK-CD.avif', 'Mikrotik merupakan sistem operasi berupa perangkat lunak yang digunakan untuk menjadikan komputer menjadi router jaringan. Sistem operasi ini sangat cocok untuk keperluan administrasi jaringan komputer, misalnya untuk membangun sistem jaringan komputer skala kecil maupun besar.\r\n\r\nSinopsis\r\n\r\nPerangkat MikroTik saat ini sudah menjadi primadona di kalangan praktisi jaringan komputer, khususnya di Indonesia. Selain handal. tidak kalah dibandingkan perangkat buatan vendor lain, harganya pun cukup terjangkau. Bahkan sistem operasi RouterOS yang merupakan sistem operasi bagi MikroTik router. dapat di download dan digunakan secara gratis selama 24 jam. Hal ini tentunya merupakan berita bagus bagi pengguna yang ingin belajar dan mengenal Router0S.\r\nPenulis telah berusaha keras menyusun materi buku ini berdasarkan kurikulum MTCNA yang populer. Sehingga mereka yang tertarik untuk mengikuti ujian sertifikasi MTCNA dapat mengambil manfaat dengan membaca buku ini. Dalam banyak hal, MTCNA tidak kalah bergengsi dibandingkan sertifikasi CCNA atau program sertifikasi lainnya yang populer. Penulis juga menyertakan CD Pendamping yang di dalamnya berisi berbagai aplikasi bantu. salah satunya adalah SimTik 2017 yang merupakan aplikasi untuk simulasi/presentasi jaringan komputer hasil karya Penulis Berbagai aplikasi bantu yang disediakan pada CD Pendamping. dapat memudahkan Pembaca yang ingin melakukan praktikum jaringan komputer dengan bekal peralatan seadanya. yaitu dengan cara membangun Virtual Lab MikroTik.\r\nSatu hal yang perlu digaris bawahi yaitu, meskipun buku ini bercerita tentang perangkat buatan MikroTik, namun ini persoalannya tetap pada jaringan komputer. Sebagian besar konsep yang digunakan untuk membangun jaringan komputer menggunakan perangkat MikroTik, tetap dapat diterapkan pada jaringan komputer manapun. Sehingga Pembaca yang dapat mengetahui tentang jaringan komputer, atau hanya ingin sekedar belajar jaringan komputer umum. juga dapat memperoleh manfaat yang cukup besar dari buku ini.'),
(30, 'Aplikasi Komputer', 'NURHAFIFAH M., ERI M., WAHYUDI., DKK', 356, 'Cetak', 'Mitra Wacana Media', '2019', '9786023184262', 4, 2, 6, 3, '1766524813_img974.avif', 'Aplikasi komputer adalah jenis program komputer yang dibuat sesuai dengan bahasa pemrograman dan digunakan untuk berbagai kebutuhan yang diperlukan. Dalam kehidupan sehari-hari Anda dapat melihat beberapa penggunaan dari aplikasi komputer tersebut untuk bisnis, pendidikan, maupun untuk hiburan. Dengan menggunakan beberapa aplikasi komputer tersebut, semua orang dapat dengan mudah bekerja dan dapat menghemat waktu. Dalam berbagai kebutuhan salah satu aplikasi komputer yang paling banyak digunakan adalah Ms. Office. Di dalam aplikasi ini terdapat beberapa poin penting diantaranya adalah adanya aplikasi Ms. Excel, Ms. Word, Ms. Power point, Ms. Outlook dan beberapa aplikasi lainnya. Ms. Word, Ms. Office dan Power Point merupakan aplikasi Ms. Office yang sering digunakan. Aplikasi ini pun menjadi bagian penting untuk mempercepat proses pengerjaan suatu pekerjaan. Selain aplikasi tersebut masih banyak lagi beberapa aplikasi yang digunakan untuk perkantoran.\r\n\r\nBuku Aplikasi Komputer ini berisi penjelasan tentang aplikasi yang sering digunakan untuk membantu kehidupan sehari-hari. Materi yang disajikan, ditulis dengan jelas dan menggunakan bahasa yang mudah untuk dipahami. Buku ini diharapkan dapat berguna bagi pembaca dan dapat dibaca oleh semua kalangan masyarakat.');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriId` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriId`, `nama_kategori`) VALUES
(1, 'Ilmu Sosial dan Humaniora'),
(2, 'Ilmu Sains dan Teknologi'),
(3, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `rakId` int(11) NOT NULL,
  `nomor_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`rakId`, `nomor_rak`) VALUES
(1, 'Rak Ekonomi'),
(2, 'Rak Psikologi'),
(3, 'Rak Komputer'),
(4, 'Rak Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `nama_subkategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `kategoriId`, `nama_subkategori`) VALUES
(1, 1, 'Sosiologi'),
(2, 1, 'Psikologi'),
(3, 1, 'Hukum'),
(4, 1, 'Sejarah'),
(5, 1, 'Ekonomi'),
(6, 2, 'Komputer'),
(7, 2, 'Fisika'),
(8, 2, 'Kesehatan'),
(9, 2, 'Konstruksi'),
(10, 2, 'Geologi'),
(11, 3, 'Aksi'),
(12, 3, 'Sastra');

-- --------------------------------------------------------

--
-- Table structure for table `useracc`
--

CREATE TABLE `useracc` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` enum('guest','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useracc`
--

INSERT INTO `useracc` (`userId`, `name`, `username`, `email`, `password`, `phone`, `role`) VALUES
(1, 'ilhamzainuri', 'ilhamartar', 'artar010404@gmail.com', 'ilham', '085820664592', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuId`),
  ADD KEY `kategoriId` (`kategoriId`,`id_subkategori`,`rakId`),
  ADD KEY `rakId` (`rakId`),
  ADD KEY `id_subkategori` (`id_subkategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriId`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`rakId`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`),
  ADD KEY `kategoriId` (`kategoriId`);

--
-- Indexes for table `useracc`
--
ALTER TABLE `useracc`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `rakId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `useracc`
--
ALTER TABLE `useracc`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategoriId`) REFERENCES `kategori` (`kategoriId`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`rakId`) REFERENCES `rak` (`rakId`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_subkategori`) REFERENCES `subkategori` (`id_subkategori`);

--
-- Constraints for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `subkategori_ibfk_1` FOREIGN KEY (`kategoriId`) REFERENCES `kategori` (`kategoriId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
