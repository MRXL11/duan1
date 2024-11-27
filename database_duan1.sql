-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2024 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluans`
--

CREATE TABLE `binhluans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` datetime NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binhluans`
--

INSERT INTO `binhluans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 1, 1, 'Cuốn sách rất hay và đáng đọc!', '2024-11-05 12:00:00', 1),
(2, 2, 1, 'Nội dung thú vị và ý nghĩa.', '2024-11-06 14:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietbienthes`
--

CREATE TABLE `chitietbienthes` (
  `id` int NOT NULL,
  `sanpham_bien_the_id` int NOT NULL,
  `mo_ta_chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhangs`
--

CREATE TABLE `chitietdonhangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chitietdonhangs`
--

INSERT INTO `chitietdonhangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 1, '150000.00', 2, '300000.00'),
(2, 1, 2, '180000.00', 1, '180000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohangs`
--

CREATE TABLE `chitietgiohangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chitietgiohangs`
--

INSERT INTO `chitietgiohangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chucvus`
--

CREATE TABLE `chucvus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chucvus`
--

INSERT INTO `chucvus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Admin'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucs`
--

CREATE TABLE `danhmucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmucs`
--

INSERT INTO `danhmucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Tiểu thuyết', 'Sách tiểu thuyết nổi tiếng'),
(2, 'Khoa học', 'Sách khoa học cơ bản'),
(3, 'Kinh tế', 'Sách kinh tế và quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `donhangs`
--

CREATE TABLE `donhangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL,
  `ghi_chu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donhangs`
--

INSERT INTO `donhangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat_hang`, `tong_tien`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`, `ghi_chu`) VALUES
(1, 'DH001', 1, 'Nguyễn Văn A', 'nguyenvana@example.com', '0901234567', '123 Đường ABC, TP XYZ', '2024-11-01', '310000.00', 1, 1, 'Giao hàng nhanh');

-- --------------------------------------------------------

--
-- Table structure for table `giohangs`
--

CREATE TABLE `giohangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `giohangs`
--

INSERT INTO `giohangs` (`id`, `tai_khoan_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoans`
--

CREATE TABLE `phuongthucthanhtoans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuongthucthanhtoans`
--

INSERT INTO `phuongthucthanhtoans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán qua thẻ tín dụng');

-- --------------------------------------------------------

--
-- Table structure for table `sanphambienthes`
--

CREATE TABLE `sanphambienthes` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `ten_bien_the` varchar(255) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `so_luong` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `id` int NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `so_luong` int NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  `ten` varchar(255) NOT NULL,
  `tac_gia` varchar(255) NOT NULL,
  `id_danh_muc` int NOT NULL,
  `nha_xuat_ban` varchar(255) NOT NULL,
  `nam_xuat_ban` int NOT NULL,
  `gia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `hinh_anh`, `so_luong`, `ngay_nhap`, `mo_ta`, `trang_thai`, `ten`, `tac_gia`, `id_danh_muc`, `nha_xuat_ban`, `nam_xuat_ban`, `gia`) VALUES
(1, 'sapiens.jpg', 100, '2024-10-01', NULL, 1, '', '', 1, '', 0, '0.00'),
(2, 'thinking_fast_slow.jpg', 50, '2024-10-05', NULL, 1, '', '', 2, '', 0, '0.00'),
(3, 'alchemist.jpg', 30, '2024-11-01', NULL, 1, '', '', 3, '', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoans`
--

CREATE TABLE `taikhoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taikhoans`
--

INSERT INTO `taikhoans` (`id`, `ho_ten`, `anh_dai_dien`, `email`, `so_dien_thoai`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Admin User', 'admin_avatar.jpg', 'admin@example.com', '0123456789', 'hashed_password', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trangthaidonhangs`
--

CREATE TABLE `trangthaidonhangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trangthaidonhangs`
--

INSERT INTO `trangthaidonhangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Đang xử lý'),
(2, 'Đã giao hàng'),
(3, 'Đã hủy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluans`
--
ALTER TABLE `binhluans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `chitietbienthes`
--
ALTER TABLE `chitietbienthes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_bien_the_id` (`sanpham_bien_the_id`);

--
-- Indexes for table `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chitietgiohangs`
--
ALTER TABLE `chitietgiohangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chucvus`
--
ALTER TABLE `chucvus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmucs`
--
ALTER TABLE `danhmucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhangs`
--
ALTER TABLE `donhangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_don_hang` (`ma_don_hang`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Indexes for table `giohangs`
--
ALTER TABLE `giohangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `phuongthucthanhtoans`
--
ALTER TABLE `phuongthucthanhtoans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanphambienthes`
--
ALTER TABLE `sanphambienthes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanphams_danhmucs` (`id_danh_muc`);

--
-- Indexes for table `taikhoans`
--
ALTER TABLE `taikhoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `chuc_vu_id` (`chuc_vu_id`);

--
-- Indexes for table `trangthaidonhangs`
--
ALTER TABLE `trangthaidonhangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluans`
--
ALTER TABLE `binhluans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chitietbienthes`
--
ALTER TABLE `chitietbienthes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chitietgiohangs`
--
ALTER TABLE `chitietgiohangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chucvus`
--
ALTER TABLE `chucvus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmucs`
--
ALTER TABLE `danhmucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donhangs`
--
ALTER TABLE `donhangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giohangs`
--
ALTER TABLE `giohangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoans`
--
ALTER TABLE `phuongthucthanhtoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanphambienthes`
--
ALTER TABLE `sanphambienthes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taikhoans`
--
ALTER TABLE `taikhoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trangthaidonhangs`
--
ALTER TABLE `trangthaidonhangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluans`
--
ALTER TABLE `binhluans`
  ADD CONSTRAINT `binhluans_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanphams` (`id`),
  ADD CONSTRAINT `binhluans_ibfk_2` FOREIGN KEY (`tai_khoan_id`) REFERENCES `taikhoans` (`id`);

--
-- Constraints for table `chitietbienthes`
--
ALTER TABLE `chitietbienthes`
  ADD CONSTRAINT `chitietbienthes_ibfk_1` FOREIGN KEY (`sanpham_bien_the_id`) REFERENCES `sanphambienthes` (`id`);

--
-- Constraints for table `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD CONSTRAINT `chitietdonhangs_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `donhangs` (`id`),
  ADD CONSTRAINT `chitietdonhangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanphams` (`id`);

--
-- Constraints for table `chitietgiohangs`
--
ALTER TABLE `chitietgiohangs`
  ADD CONSTRAINT `chitietgiohangs_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `giohangs` (`id`),
  ADD CONSTRAINT `chitietgiohangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanphams` (`id`);

--
-- Constraints for table `donhangs`
--
ALTER TABLE `donhangs`
  ADD CONSTRAINT `donhangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `taikhoans` (`id`),
  ADD CONSTRAINT `donhangs_ibfk_2` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuongthucthanhtoans` (`id`),
  ADD CONSTRAINT `donhangs_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trangthaidonhangs` (`id`);

--
-- Constraints for table `giohangs`
--
ALTER TABLE `giohangs`
  ADD CONSTRAINT `giohangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `taikhoans` (`id`);

--
-- Constraints for table `sanphambienthes`
--
ALTER TABLE `sanphambienthes`
  ADD CONSTRAINT `sanphambienthes_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanphams` (`id`);

--
-- Constraints for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `fk_sanphams_danhmucs` FOREIGN KEY (`id_danh_muc`) REFERENCES `danhmucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taikhoans`
--
ALTER TABLE `taikhoans`
  ADD CONSTRAINT `taikhoans_ibfk_1` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chucvus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
