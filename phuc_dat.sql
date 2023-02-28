-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 02:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phuc_dat`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `studen_id` varchar(9) NOT NULL,
  `studen_name` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `major` varchar(40) NOT NULL,
  `gender` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `roles`, `password`, `studen_id`, `studen_name`, `date_of_birth`, `major`, `gender`) VALUES
(11, 'cantngcc210146@fpt.edu.vn', '[\"ROLE_ADMIN\"]', '$2y$13$HA09KCHxmfP.QnMiHJBuL.YVuoFCAOST3FJacVhNmgL2ZSEtDyP2e', 'GCC210146', 'Trần Nguyệt Cần', '2003-07-12', 'SE - Computing', 0),
(12, 'PhucAdmin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$RmCRAny/NYW6PqlW.QYBO.W8/8k.lAkMYTvh4cucn7m/.e62sxZ9O', 'GCC210017', 'Ngô Huỳnh Phúc', '2013-10-24', 'SE - Computing', 1),
(13, 'PhongNguyen@gmail.com', '[\"ROLE_USER\"]', '$2y$13$2OIF8A90cJuCWXeEZPDga.jHXAkOca/tuSKJO0X7LiuRj9t5eQlz.', 'GCC210026', 'Nguyễn Quốc Phong', '2003-01-01', 'SE - Computing', 1),
(14, 'NghiaVo@gmail.com', '[\"ROLE_USER\"]', '$2y$13$b8xa4JZv7O5qvSfhQTpHYuVylCW3mU1rL4R8EGX1QEp.B8uh.Oqse', 'GCC210025', 'Võ Tấn Nghĩa', '2004-01-01', 'SE - Computing', 1),
(15, 'QueTran@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$c9Yn97dH/nOaWBKqTXXwkOurcO.ztxeHcEAwBJ4KQl0QDdun5aNyC', 'GCC210042', 'Nguyễn Quế Trân', '2003-03-09', 'SE - Computing', 0),
(16, 'thaohcgcc220028@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$TijHaTDLAPhaaHs.qqDc9OPIiYojU/xh6JFUJ.UyIwjTJGBW/uZwi', 'GCC220028', 'Huỳnh Chúc Thảo', '2004-01-26', 'SE - Computing', 0),
(17, 'ngoctmgbc220159@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$uPcRkPoi2Rw3DMGj5g7VuOt3y47s6y8MgKMJ/jBTUidyTnrsKxo/6', 'GBC220159', 'Trần Mỹ Ngọc', '2004-10-31', 'BA - Business', 0),
(18, 'khanhgbc200062@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$hLjhBECDaX1fC1yhV87rF.Ij5ImgT6sAy.tvLVJdBfKecSsHFBWVS', 'GBC200062', 'Nguyễn Hoàng Kha', '2002-06-11', 'GD - Graphic Design', 1),
(19, 'khoatdgbc210114@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$lBhaJnctED9XDsNdI8nkB.bJK.aCBT6ro4aArWeKZ9.yfXUdartBS', 'GBC210114', 'Trang Đăng Khoa', '2003-09-28', 'BA - Business', 1),
(20, 'khanghngcc220169@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$PJ4IKtIV5DJUOL7LFMDC7eDkFbjDtDJwCnYMJr2gdtEbKW62d3ba6', 'GCC220169', 'Hứa Nguyên Khang', '2003-02-05', 'SE - Computing', 1),
(21, 'tinttgdc220003@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$OdjTBtzmniFhEC6zHXCotOWJNYXJ85HamA93hTgL.MV4B9sJkGkRu', 'GDC220003', 'Tăng Thế Tín', '2003-11-06', 'GD - Graphic Design', 1),
(25, 'datdmgcc210147@fpt.edu.vn', '[\"ROLE_ADMIN\"]', '$2y$13$tbC2ey5YbWp6uTOTIiMJ1ufVGPC0DUVL1hexxsCbpi2STgtiQT2lG', 'GCC210147', 'Đặng Minh Đạt', '2003-10-15', 'SE - Computing', 1),
(26, 'thinhngdc210099@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$sTOJcfogFHvivurRgzfJaudUtNnLRVbp6uMM3OgzRkgNu2GE9qkHC', 'GDC210099', 'Nguyễn Huỳnh Ngọc Thi', '2003-10-23', 'GD - Graphic Design', 0),
(27, 'trinhnkmgbc220024@fpt.edu.vn', '[\"ROLE_USER\"]', '$2y$13$bDrY3fee26nDNJQFTxPokeCUCEXF7i407fKa0ev4VsVd/xHcrbf5G', 'GBC220024', 'Nguyễn Kiều Mai Trinh', '2004-05-23', 'BA - Business', 0),
(28, 'lamtbgdc220095@fpt.edu.vn', '[\"ROLE_ADMIN\"]', '$2y$13$6IxWIXrIyzKEmyMi4eaTQ.6bSXRIf9bQuMrZYu7IohvKNHdV37hQC', 'GDC220095', 'Trịnh Bảo Lam', '2004-12-16', 'GD - Graphic Design', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `score`, `image`, `start_date`, `start_time`, `end_time`, `club_id`) VALUES
(3, 'Hung King', 12, '111-63f5215f7c55f.jpg', '2023-03-11', '01:00:00', '15:00:00', 6),
(5, 'Road to Roadmap', 15, 'Untitled-1-63f5731e3873e.jpg', '2018-01-01', '18:00:00', '20:00:00', 1),
(6, 'Hung King Memorial - A Spiritual return', 10, 'Poster-1-63f5745a4a62e.jpg', '2022-09-13', '14:00:00', '17:00:00', 2),
(7, 'Save your memory', 10, 'save-your-memories-63f57c7113454.jpg', '2022-10-13', '08:00:00', '10:00:00', 2),
(8, 'Talkshow: Dám bị ghét', 7, 'dam-bi-ghet-63f58c0f56b92.jpg', '2023-02-23', '18:00:00', '21:00:00', 2),
(10, 'Create your collage art', 15, 'z4136173622032-8dc32faa445b0804b6b2579936ad1594-63f967de3e331.jpg', '2023-03-30', '18:00:00', '20:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id`, `activities_id`, `account_id`) VALUES
(1, 3, 11),
(2, 3, 15),
(3, 7, 12),
(4, 10, 14),
(5, 5, 16),
(7, 6, 18),
(8, 6, 12),
(9, 10, 12),
(10, 5, 11),
(11, 10, 18),
(13, 7, 25);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_id` varchar(10) NOT NULL,
  `club_name` varchar(40) NOT NULL,
  `number_of_members` int(11) NOT NULL,
  `leader_name` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_id`, `club_name`, `number_of_members`, `leader_name`, `description`, `image`) VALUES
(1, 'GC101', 'English Speaking', 27, 'Dang Minh Dat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '300824154-206644008370273-2480039076600738088-n-63fb95781561c.jpg'),
(2, 'GC102', 'Media', 28, 'Bui Nhut Tan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '309215633-163115316385848-1929412277029499647-n-63fb95433d000.jpg'),
(3, 'GC103', 'Book', 27, 'Phan Nhu Binh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '313277613-550853803713131-1851362736861867598-n-63fb953ac9224.jpg'),
(4, 'GC104', 'Design', 20, 'Nguyen Hoang Khang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '331935913-524052396294274-8361296671467589506-n-63fb95b75ba95.jpg'),
(5, 'GC105', 'Volunteer', 22, 'Le Thanh Ngoan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '222168853-102280598819246-6969189945715857766-n-63fb95c3d1aa0.jpg'),
(6, 'GC106', 'Esport', 30, 'Phan Tan Dat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '331434436-5748565955241241-2988244455736863882-n-63fb9788f3906.jpg'),
(7, 'GC107', 'Art', 35, 'Ngo Anh Thu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '298218116-441668934683666-8381681246317992088-n-63fb977fb0fa3.jpg'),
(8, 'GC108', 'Vovinam', 38, 'Nguyen Nhat Chinh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '292041792-448291737304071-1776781993003554722-n-63fb97779695f.jpg'),
(9, 'GC109', 'Football', 26, 'Huynh Hoang Khiem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '309844867-121399737372008-7600813447428522142-n-63fb983517dd3.jpg'),
(10, 'GC110', 'IT', 37, 'Thach Ngoc Trung', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '279494563-175281868174846-2117013210033184397-n-63fb97922b266.jpg'),
(11, 'GC111', 'Event', 30, 'Tran Thi Thuy Kieu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt mollitia quae quia. Officia, tempore. Ipsum optio illo veniam quibusdam suscipit magnam quae molestiae iure. Maiores enim amet dolores et id.', '313003545-212693817782146-6826519847852714932-n-63fb98516ac7f.jpg'),
(12, 'PDP112', 'PDP and Student Service', 20, 'Phan Hai Dang', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis beatae voluptatibus facere quisquam nesciunt debitis cumque mollitia officia, excepturi, aliquam tempore fugiat eaque voluptates a reiciendis vero dignissimos saepe minus.', '322346546-721781669699185-166224984725914055-n-63fb983bbc0a6.jpg'),
(27, 'GC113', 'Badminton', 22, 'Tran Khanh', '1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, aperiam ex. Dolores mollitia corporis assumenda, tempora quaerat totam, accusantium eveniet ullam nemo accusamus cum labore, minima facere sit. Optio, id.', '285723581-123052323738024-5808949169819623576-n-63fc7c82de9ab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230215102956', '2023-02-15 11:30:34', 72),
('DoctrineMigrations\\Version20230216051315', '2023-02-16 06:13:26', 1252),
('DoctrineMigrations\\Version20230217075236', '2023-02-17 08:52:48', 580),
('DoctrineMigrations\\Version20230217075523', '2023-02-17 08:55:31', 36),
('DoctrineMigrations\\Version20230217101017', '2023-02-17 11:10:27', 50),
('DoctrineMigrations\\Version20230221031335', '2023-02-21 04:13:45', 1324),
('DoctrineMigrations\\Version20230221171707', '2023-02-21 18:17:15', 783),
('DoctrineMigrations\\Version20230223053325', '2023-02-23 06:33:35', 1450),
('DoctrineMigrations\\Version20230224080032', '2023-02-24 09:00:46', 1749),
('DoctrineMigrations\\Version20230224080629', '2023-02-24 09:06:39', 175),
('DoctrineMigrations\\Version20230226151758', '2023-02-26 16:18:09', 1360);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `account_id_id` int(11) NOT NULL,
  `club_id_id` int(11) NOT NULL,
  `member_role` smallint(6) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `account_id_id`, `club_id_id`, `member_role`, `image`) VALUES
(4, 11, 3, 3, 'z4131591140013-2af888ee43d2ca670c61c9aa0f025314-63f9776414576.jpg'),
(5, 15, 5, 2, 'z4136415035393-a5576dfdd87909eb4e9c30543135be34-63f97d47a0dd6.jpg'),
(6, 13, 8, 1, 'z4135945576990-6f2819e3ac167402728fe3598afe0a2b-63f97db0e38ee.jpg'),
(7, 14, 9, 3, 'z4135945437570-330885547d7d868eb4164e5245dc6dbe-63f97df7baef6.jpg'),
(8, 12, 1, 1, 'GCC210017-63fb98d3b6c9e.png'),
(9, 25, 1, 0, 'GCC210147-63fb98e473676.png'),
(10, 18, 1, 1, 'GBC200062-63fca1e157796.png'),
(11, 26, 4, 3, 'GDC210099-63fcaa38672c9.png');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7D3656A4E7927C74` (`email`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B5F1AFE561190A32` (`club_id`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_90466CF92A4DB562` (`activities_id`),
  ADD KEY `IDX_90466CF99B6B5FBA` (`account_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_70E4FA7849CB4726` (`account_id_id`),
  ADD KEY `IDX_70E4FA78DF2AB4E5` (`club_id_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `FK_B5F1AFE561190A32` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `FK_90466CF92A4DB562` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `FK_90466CF99B6B5FBA` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_70E4FA7849CB4726` FOREIGN KEY (`account_id_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_70E4FA78DF2AB4E5` FOREIGN KEY (`club_id_id`) REFERENCES `clubs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
