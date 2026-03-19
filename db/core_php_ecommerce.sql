-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2024 lúc 10:47 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baocaoktpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idDonHang` int(11) NOT NULL,
  `idSanPham` int(11) NOT NULL,
  `gia` decimal(18,0) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `tongTien` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idDonHang`, `idSanPham`, `gia`, `soLuong`, `tongTien`) VALUES
(3, 35, 7999999, 1, 7999999),
(4, 35, 7999999, 1, 7999999),
(5, 35, 7999999, 1, 7999999),
(6, 32, 199999, 1, 199999),
(9, 34, 17555555, 1, 17555555),
(11, 37, 599999, 2, 8),
(11, 36, 6888888, 1, 8),
(13, 37, 599999, 1, 20),
(13, 33, 9999999, 2, 20),
(14, 35, 7999999, 1, 31),
(14, 30, 23444444, 1, 31),
(15, 36, 6888888, 1, 24),
(15, 34, 17555555, 1, 24),
(17, 36, 6888888, 1, 24),
(17, 34, 17555555, 1, 24),
(18, 31, 18999999, 1, 18),
(19, 36, 6888888, 1, 6888888),
(20, 32, 199999, 1, 36866661),
(20, 35, 7999999, 2, 36866661),
(20, 36, 6888888, 3, 36866661),
(21, 36, 6888888, 1, 6888888),
(21, 38, 499999, 2, 999998),
(22, 37, 599999, 1, 599999),
(23, 37, 599999, 5, 2999995),
(24, 38, 4999992, 1, 4999992);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `san_pham_id` int(11) NOT NULL,
  `CPU` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `O_Cung` varchar(100) NOT NULL,
  `Man_Hinh` varchar(100) NOT NULL,
  `Card_Man_Hinh` varchar(100) NOT NULL,
  `Cong_Ket_Noi` text NOT NULL,
  `He_Dieu_Hanh` varchar(50) NOT NULL,
  `Thiet_Ke` varchar(50) NOT NULL,
  `Kich_Thuoc_Khoi_Luong` varchar(100) NOT NULL,
  `Thoi_Diem_Ra_Mat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`san_pham_id`, `CPU`, `RAM`, `O_Cung`, `Man_Hinh`, `Card_Man_Hinh`, `Cong_Ket_Noi`, `He_Dieu_Hanh`, `Thiet_Ke`, `Kich_Thuoc_Khoi_Luong`, `Thoi_Diem_Ra_Mat`) VALUES
(1, 'Apple A16 Bionic', 'Varies (likely 6GB or 8GB)', '128GB, 256GB, 512GB, 1TB', '6.7-inch Super Retina XDR OLED, 120Hz ProMotion', 'Apple-designed GPU with 5-core graphics engine', '5G (sub-6 and mmWave), Wi-Fi 6E (802.11ax), Bluetooth 5.3, NFC, Ultra Wideband chip', 'iOS 16 (as of May 14, 2024)', 'Surgical-grade stainless steel and textured matte ', '160.8mm (6.33 inches) x 78.1mm (3.07 inches) x 7.85mm (0.31 inches); 240 grams (8.47 ounces)', '0000-00-00'),
(2, 'Intel Core i5-9300H, 2.4GHz', '8GB, DDR4', '512GB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'NVIDIA GeForce GTX 1650', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 10 Home', 'Vỏ nhựa', 'Dài 363 mm - Rộng 254 mm - Dày 23.2 mm - Nặng 2.2 kg', '2019-07-01'),
(12, 'AMD Ryzen 5 3500U, 2.1GHz', '8GB, DDR4', '256GB SSD', '14\" Full HD (1920 x 1080)', 'AMD Radeon Vega 8', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 10 Home', 'Vỏ nhựa', 'Dài 322 mm - Rộng 212 mm - Dày 19.9 mm - Nặng 1.5 kg', '2020-06-01'),
(13, 'Qualcomm Snapdragon 710, 2.2GHz', '4GB', '64GB', '6.3\" Full HD+ (2340 x 1080)', 'Adreno 616', 'USB Type-C, Audio Jack', 'Android 9.0', 'Kính cường lực', 'Dài 158.7 mm - Rộng 75.2 mm - Dày 8.2 mm - Nặng 182g', '2019-05-01'),
(14, 'AMD Ryzen 7 5800H, 3.2GHz', '16GB, DDR4', '1TB SSD NVMe', '16.1\" Full HD (1920 x 1080)', 'NVIDIA GeForce RTX 3070', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 11', 'Vỏ kim loại', 'Dài 370 mm - Rộng 260 mm - Dày 24 mm - Nặng 2.4 kg', '2022-09-01'),
(15, 'Intel Core i9-10900K, 3.7GHz', '32GB, DDR4', '2TB SSD NVMe', '17.3\" 4K UHD (3840 x 2160)', 'NVIDIA GeForce RTX 3080', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 11 Pro', 'Vỏ kim loại', 'Dài 399 mm - Rộng 276 mm - Dày 24 mm - Nặng 3.5 kg', '2023-05-01'),
(16, 'MediaTek Dimensity 700, 2.2GHz', '4GB', '64GB', '6.6\" Full HD+ (2408 x 1080)', 'Mali-G57', 'USB Type-C, Audio Jack', 'Android 11', 'Kính cường lực', 'Dài 164.0 mm - Rộng 75.9 mm - Dày 9.1 mm - Nặng 205g', '2021-03-01'),
(17, 'Exynos 1280, 2.4GHz', '6GB', '128GB', '6.5\" Full HD+ (2400 x 1080)', 'Mali-G68', 'USB Type-C, Audio Jack', 'Android 12', 'Kính cường lực', 'Dài 159.9 mm - Rộng 74.7 mm - Dày 7.4 mm - Nặng 189g', '2022-05-01'),
(18, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(19, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(20, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(21, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(25, 'Intel Core i5-1135G7, 2.4GHz', '8GB, DDR4', '512GB SSD NVMe', '14\" Full HD (1920 x 1080)', 'Intel Iris Xe Graphics', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 11', 'Vỏ nhựa', 'Dài 324 mm - Rộng 214 mm - Dày 19.1 mm - Nặng 1.6 kg', '2022-11-01'),
(26, 'Intel Core i7-11800H, 2.3GHz', '16GB, DDR4', '1TB SSD NVMe', '14\" Full HD (1920 x 1080)', 'Intel Iris Xe Graphics', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 11', 'Vỏ nhôm', 'Dài 320 mm - Rộng 220 mm - Dày 18 mm - Nặng 1.5 kg', '2023-03-01'),
(27, 'Intel Core i5-11400H, 2.7GHz', '8GB, DDR4', '512GB SSD NVMe', '16.1\" Full HD (1920 x 1080)', 'Intel UHD Graphics', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 11', 'Vỏ nhựa', 'Dài 370 mm - Rộng 260 mm - Dày 21 mm - Nặng 2.4 kg', '2022-08-15'),
(28, 'AMD Ryzen 7 6800H, 3.3GHz', '16GB, DDR4', '1TB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'NVIDIA GeForce RTX 3060', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 11', 'Vỏ nhựa', 'Dài 354 mm - Rộng 249 mm - Dày 22.9 mm - Nặng 2.2 kg', '2023-04-01'),
(29, 'AMD Ryzen 7 5800H, 3.2GHz', '16GB, DDR4', '1TB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'NVIDIA GeForce RTX 3060', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 11', 'Vỏ kim loại', 'Dài 356 mm - Rộng 251 mm - Dày 20.3 mm - Nặng 2.3 kg', '2023-02-20'),
(30, 'Intel Core i5-10300H, 2.5GHz', '8GB, DDR4', '512GB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'NVIDIA GeForce GTX 1650', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 10 Home', 'Vỏ nhựa', 'Dài 363 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.3 kg', '2021-02-01'),
(31, 'Intel Core i7-10750H, 2.6GHz', '16GB, DDR4', '1TB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'NVIDIA GeForce GTX 1650', 'USB-C, USB-A, HDMI, Ethernet, Audio Jack', 'Windows 11', 'Vỏ nhựa và kim loại', 'Dài 359 mm - Rộng 249 mm - Dày 20.6 mm - Nặng 2.1 kg', '2022-10-10'),
(32, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(33, 'Apple A13 Bionic, 2.65GHz', '4GB', '64GB', '6.1\" Liquid Retina HD (1792 x 828)', 'Apple GPU', 'Lightning, Audio Jack', 'iOS 13', 'Kính cường lực', 'Dài 150.9 mm - Rộng 75.7 mm - Dày 8.3 mm - Nặng 194g', '2019-09-01'),
(34, 'Intel Core i5-1135G7, 2.4GHz', '8GB, DDR4', '512GB SSD NVMe', '15.6\" Full HD (1920 x 1080)', 'Intel Iris Xe Graphics', 'USB-C, USB-A, HDMI, Audio Jack', 'Windows 10 Home', 'Vỏ nhôm', 'Dài 357.6 mm - Rộng 235.4 mm - Dày 19.9 mm - Nặng 1.8 kg', '2023-01-15'),
(35, 'MediaTek Helio P95, 2.2GHz', '8GB', '128GB', '6.43\" Full HD+ (2400 x 1080)', 'PowerVR GM9446', 'USB Type-C, Audio Jack', 'Android 10', 'Kính cường lực', 'Dài 160.1 mm - Rộng 73.8 mm - Dày 7.5 mm - Nặng 164g', '2020-10-01'),
(36, 'Qualcomm Snapdragon 720G, 2.3GHz', '8GB', '128GB', '6.4\" Full HD+ (2400 x 1080)', 'Adreno 618', 'USB Type-C, Audio Jack', 'Android 10', 'Kính cường lực', 'Dài 160.3 mm - Rộng 73.9 mm - Dày 7.7 mm - Nặng 171g', '2020-03-01'),
(37, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL),
(38, '123', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `iddanhgia` int(11) NOT NULL,
  `manguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `noidung` text DEFAULT NULL,
  `ngaydanhgia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`iddanhgia`, `manguoidung`, `idsanpham`, `noidung`, `ngaydanhgia`) VALUES
(37, 1, 37, 'Đánh giá tích cực về sản phẩm.', '2024-05-20 14:42:38'),
(38, 2, 37, 'Sản phẩm này rất ấn tượng.', '2024-05-20 14:42:38'),
(39, 4, 37, 'Tôi hài lòng với chất lượng của sản phẩm.', '2024-05-20 14:42:38'),
(40, 5, 37, 'Cần cải thiện một số điểm nhất định của sản phẩm.', '2024-05-20 14:42:38'),
(41, 6, 37, 'Sản phẩm này không đáng giá tiền.', '2024-05-20 14:42:38'),
(42, 1, 38, 'Đánh giá tích cực về sản phẩm.', '2024-05-20 14:42:51'),
(43, 2, 38, 'Sản phẩm này rất ấn tượng.', '2024-05-20 14:42:51'),
(44, 4, 38, 'Tôi hài lòng với chất lượng của sản phẩm.', '2024-05-20 14:42:51'),
(45, 5, 38, 'Cần cải thiện một số điểm nhất định của sản phẩm.', '2024-05-20 14:42:51'),
(46, 6, 38, 'Sản phẩm này không đáng giá tiền.', '2024-05-20 14:42:51'),
(47, 1, 33, 'Đánh giá tích cực về sản phẩm.', '2024-05-20 14:43:01'),
(48, 2, 33, 'Sản phẩm này rất ấn tượng.', '2024-05-20 14:43:01'),
(49, 4, 33, 'Tôi hài lòng với chất lượng của sản phẩm.', '2024-05-20 14:43:01'),
(50, 5, 33, 'Cần cải thiện một số điểm nhất định của sản phẩm.', '2024-05-20 14:43:01'),
(51, 6, 33, 'Sản phẩm này không đáng giá tiền.', '2024-05-20 14:43:01'),
(52, 1, 32, 'Đánh giá tích cực về sản phẩm.', '2024-05-20 14:43:01'),
(53, 2, 32, 'Sản phẩm này rất ấn tượng.', '2024-05-20 14:43:01'),
(54, 4, 32, 'Tôi hài lòng với chất lượng của sản phẩm.', '2024-05-20 14:43:01'),
(55, 5, 32, 'Cần cải thiện một số điểm nhất định của sản phẩm.', '2024-05-20 14:43:01'),
(56, 6, 32, 'Sản phẩm này không đáng giá tiền.', '2024-05-20 14:43:01'),
(57, 1, 31, 'Đánh giá tích cực về sản phẩm.', '2024-05-20 14:43:01'),
(58, 2, 31, 'Sản phẩm này rất ấn tượng.', '2024-05-20 14:43:01'),
(59, 4, 31, 'Tôi hài lòng với chất lượng của sản phẩm.', '2024-05-20 14:43:01'),
(60, 5, 31, 'Cần cải thiện một số điểm nhất định của sản phẩm.', '2024-05-20 14:43:01'),
(61, 6, 31, 'Sản phẩm này không đáng giá tiền.', '2024-05-20 14:43:01'),
(62, 1, 28, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:43:13'),
(63, 2, 28, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:43:13'),
(64, 4, 28, 'Sản phẩm đáng để mua.', '2024-05-20 14:43:13'),
(65, 5, 28, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:43:13'),
(66, 6, 28, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:43:13'),
(67, 1, 27, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:43:13'),
(68, 2, 27, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:43:13'),
(69, 4, 27, 'Sản phẩm đáng để mua.', '2024-05-20 14:43:13'),
(70, 5, 27, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:43:13'),
(71, 6, 27, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:43:13'),
(72, 1, 30, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:43:22'),
(73, 2, 30, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:43:22'),
(74, 4, 30, 'Sản phẩm đáng để mua.', '2024-05-20 14:43:22'),
(75, 5, 30, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:43:22'),
(76, 6, 30, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:43:22'),
(77, 1, 29, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:43:22'),
(78, 2, 29, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:43:22'),
(79, 4, 29, 'Sản phẩm đáng để mua.', '2024-05-20 14:43:22'),
(80, 5, 29, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:43:22'),
(81, 6, 29, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:43:22'),
(82, 1, 28, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:43:22'),
(83, 2, 28, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:43:22'),
(84, 4, 28, 'Sản phẩm đáng để mua.', '2024-05-20 14:43:22'),
(85, 5, 28, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:43:22'),
(86, 6, 28, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:43:22'),
(87, 1, 38, 'Sản phẩm rất tốt, tôi rất hài lòng.', '2024-05-20 14:58:39'),
(88, 2, 38, 'Chất lượng sản phẩm tuyệt vời.', '2024-05-20 14:58:39'),
(89, 4, 38, 'Sản phẩm đáng để mua.', '2024-05-20 14:58:39'),
(90, 5, 38, 'Cần cải thiện một số điểm nhỏ.', '2024-05-20 14:58:39'),
(91, 6, 38, 'Không hài lòng với sản phẩm này.', '2024-05-20 14:58:39'),
(92, 1, 37, 'aa', '2024-05-22 16:15:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDonHang` int(11) NOT NULL,
  `maNguoiDung` int(11) NOT NULL,
  `ghiChu` text DEFAULT NULL,
  `ngayDat` datetime DEFAULT NULL,
  `trangThai` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `diaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDonHang`, `maNguoiDung`, `ghiChu`, `ngayDat`, `trangThai`, `diaChi`, `sodienthoai`) VALUES
(3, 13, '', '2024-05-19 16:05:48', '0', '123 Ninh Kieu, Can Tho', '9072837298'),
(4, 13, '', '2024-05-19 16:05:51', '0', '123 Ninh Kieu, Can Tho', '9072837298'),
(5, 13, '', '2024-05-19 16:06:50', '0', '123 Ninh Kieu, Can Tho', '9072837298'),
(6, 13, '', '2024-05-19 16:08:04', '0', '123 Ninh Kieu, Can Tho', '9072837298'),
(9, 13, '', '2024-05-19 17:47:49', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(10, 13, '', '2024-05-20 10:38:48', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(11, 13, '', '2024-05-20 10:50:53', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(12, 13, '', '2024-05-20 10:52:58', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(13, 13, '', '2024-05-20 10:53:42', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(14, 13, '', '2024-05-20 11:00:35', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(15, 13, '', '2024-05-20 11:01:59', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(16, 13, '', '2024-05-20 11:02:04', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(17, 13, '', '2024-05-20 11:02:58', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(18, 13, '', '2024-05-20 11:03:30', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(19, 13, '', '2024-05-20 11:05:11', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(20, 13, '', '2024-05-20 11:05:46', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(21, 13, '', '2024-05-20 11:10:18', 'Đã đặt hàng', '123 Ninh Kieu, Can Tho', '9072837298'),
(22, 1, '', '2024-05-22 16:21:57', 'Đã đặt hàng', '123', '0977777777'),
(23, 1, '', '2024-05-22 16:22:13', 'Đã đặt hàng', '123', '0977777777'),
(24, 16, '', '2024-05-24 05:13:24', 'Đã đặt hàng', '123, 3abc', '0927292321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(11) NOT NULL,
  `tieude_khuyenmai` varchar(255) NOT NULL,
  `hinh_khuyenmai` varchar(255) DEFAULT NULL,
  `noidung_khuyenmai` text DEFAULT NULL,
  `noidung_tomtat_khuyenmai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `tieude_khuyenmai`, `hinh_khuyenmai`, `noidung_khuyenmai`, `noidung_tomtat_khuyenmai`) VALUES
(1, 'Khuyến mãi vận chuyển miễn phí', 'mienphiship.jpg', 'Chương trình khuyến mãi miễn phí vận chuyển áp dụng cho tất cả các đơn hàng, không giới hạn số lượng sản phẩm và số tiền tối thiểu. Bạn có thể mua bất kỳ sản phẩm nào trên website của chúng tôi mà không cần phải lo lắng về chi phí vận chuyển.', 'Miễn phí vận chuyển cho tất cả các đơn hàng, không cần số tiền tối thiểu. Đây là cơ hội lớn để bạn có thể mua sắm thoải mái mà không cần lo ngại về chi phí vận chuyển!'),
(2, 'Khuyến mãi giảm 20% cho đồ điện tử', 'giam20-dientu.jpg', 'Chương trình khuyến mãi giảm giá 20% áp dụng cho tất cả các sản phẩm điện tử trên website của chúng tôi. Hãy nhanh tay mua ngay để nhận ưu đãi này!', 'Giảm 20% cho sản phẩm điện tử! Ưu đãi hấp dẫn dành cho bạn!'),
(3, 'Tháng yêu thương - Tặng quà cho mỗi đơn hàng', 'tangqua-thangyeuthuong.webp', 'Chương trình khuyến mãi tháng yêu thương! Mỗi đơn hàng bạn đặt trên website của chúng tôi sẽ được tặng kèm một món quà ý nghĩa. Hãy tạo điểm nhấn cho mỗi khoảnh khắc đáng nhớ!', 'Tháng yêu thương! Tặng quà cho mỗi đơn hàng!'),
(4, 'Trải nghiệm miễn phí sản phẩm mới!', 'trai-nghiem-mien-phi.webp', 'Chương trình thử sản phẩm miễn phí! Chọn một số sản phẩm mới và bạn sẽ được nhận miễn phí để trải nghiệm. Hãy là người đầu tiên trải nghiệm những sản phẩm hot nhất!', 'Thử sản phẩm mới miễn phí!'),
(5, 'Mua sắm và quyên góp từ thiện cùng chúng tôi!', 'quyen-gop-tu-thien.jpeg', 'Chương trình mua sắm và quyên góp từ thiện! Mỗi lần mua sắm, chúng tôi sẽ quyên góp một phần số tiền cho các tổ chức từ thiện. Hãy cùng chúng tôi lan tỏa yêu thương!', 'Mua sắm và quyên góp từ thiện cùng chúng tôi!'),
(6, 'Thưởng khách hàng thân thiết - Nhận ưu đãi đặc biệt', 'khach-hang-than-thiet.jpg', 'Chương trình thưởng khách hàng thân thiết! Bạn sẽ nhận được ưu đãi đặc biệt và quà tặng giá trị sau mỗi lần mua hàng. Chúng tôi luôn biết ơn sự ủng hộ của bạn!', 'Thưởng khách hàng thân thiết!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `noiBat` tinyint(4) NOT NULL,
  `thuTu` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ten`, `noiBat`, `thuTu`, `icon`) VALUES
(1, 'Điện thoại', 2, 1, 'fa-solid fa-mobile'),
(2, 'Phụ kiện', 0, 3, 'fa-solid fa-laptop'),
(3, 'Laptop', 1, 2, 'fa-solid fa-headphones'),
(4, 'Máy in', 1, 4, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinh` varchar(500) NOT NULL,
  `moTa` varchar(2000) NOT NULL,
  `loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `ten`, `gia`, `hinh`, `moTa`, `loai`) VALUES
(1, 'Điện thoại iPhone 14 Pro Max 256GB', 30390000, 'iphone-14-pro-max-purple-1.jpg', 'iPhone 14 Pro Max sẽ vẫn giữ lại kiểu thiết kế đặc trưng đến từ các thế hệ trước như iPhone 13 series với các cạnh vuông vức và hai mặt gia công phẳng, đây vẫn được xem là kiểu thiết kế rất thịnh hành và thành công trên thị trường di động tính đến thời điểm hiện tại.', 1),
(2, 'Laptop Acer Aspire 7 Gaming', 20490000, 'acer-aspire-7-gaming-a715-42g-r05g-r5-nhqaysv007-1.jpg', 'Laptop Acer Aspire 7 Gaming A715 42G R05G (NH.QAYSV.007) sở hữu phong cách thiết kế độc đáo, thời thượng cùng hiệu năng mạnh mẽ, đáp ứng tối đa mọi nhu cầu của người dùng từ cơ bản đến nâng cao.', 3),
(12, 'Asus VivoBook A412DA', 13990000, '4.jpg', 'asus laptop', 3),
(13, 'Realme', 1339002, 'test.jpg', 'điện thoại', 1),
(14, 'HP omen', 19990000, 'omentest.png', 'hp omen', 3),
(15, 'Dell alien', 39990000, 'dellalienwaretest.webp', 'dell', 3),
(16, 'Samsung a14', 4999000, 'a14test.webp', 'samsung', 1),
(17, 'Samsung a54', 7399000, 'a54test.webp', 'samsung', 1),
(18, 'Lot chuot', 139900, 'lotchuot.jpg', 'lot chuot hoat hinh', 2),
(19, 'Sac robot', 999000, 'sacrobot.jpg', 'sac robot', 2),
(20, 'Moondrop CHU', 6290000, 'moondropCHU.jpg', 'tai nghe', 2),
(21, 'Moondrop Aria', 1999000, 'MoondropAria.jpg', 'Tai nghe', 2),
(25, 'Asus Vivobook', 29092122, 'test1asus.jpg', 'Laptop văn phòng Asus Vivobook', 3),
(26, 'Msi Modern 14', 176566666, 'test2msimodern.jpg', 'Laptop Văn Phòng MSI', 3),
(27, 'HP Victus 16', 20999999, 'test3hpvictus.jpg', 'Laptop HP Gaming', 3),
(28, 'Asus TUF A16', 23999999, 'test4asustuf.png', 'Laptop Gaming Asus', 3),
(29, 'Lenovo Gaming', 26999999, 'test5lenovolegion.jpg', 'Lapop Gaming Lenovo', 3),
(30, 'Acer Nitro 5', 23444444, 'test6acernitro5.jpg', 'Laptop Gaming Acer', 3),
(31, 'MSI GF63', 18999999, 'test7msigf63.webp', 'LAPTOP GAMING MSI', 3),
(32, 'Sạc ', 199999, 'test8sac.jpg', 'Sạc điện thoại', 2),
(33, 'Iphone 11', 9999999, 'test9ip11.jpg', 'Iphone 11', 1),
(34, 'Lenovo Ideapad', 17555555, 'test10lenovoideapad.jpg', 'Lenovo Ideapad', 3),
(35, 'Oppo A93', 7999999, 'test11oppoa93.jpg', 'Điện thoại Oppo', 1),
(36, 'Oppo Reno', 6888888, 'test12opporeno.jpg', 'Điện thoại Oppo', 1),
(37, 'Tai nghe', 599999, 'test13tainghe.jpg', 'Tai nghe không dây', 2),
(38, 'Bộ sạc', 4999992, 'test001.jpg', 'Bộ sạc và cáp', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `manguoidung` int(11) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `ho` varchar(255) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`manguoidung`, `pass`, `ho`, `ten`, `email`, `quyen`, `sdt`, `diachi`, `user`) VALUES
(1, '$2y$10$bbKcWtg8wDPdcb1cv362HOYdg42ml.V9nSKjxGVX1zw/W.8iO4hLu', 'Phạm', 'Sơn', 'hongyenit@gmail.com', 1, NULL, NULL, 'admin'),
(2, '$2y$10$6mexTGkm0Q.be41pfBJsDusOPHwrtgGoJDuSjVMH1xN...', 'a', 'a', 'duyadang1223@gmail.com', 0, '9182379812', 'abc sss', 'Haellaooaa'),
(4, '$2y$10$enfbxO5GvYWpvTyi8C4i6.9t4vijHTXhokWoyZ070Gj...', 'a', 'a', 'duydang122344@gmail.com', 0, '9182379812', 'abc sss', 'Helloo'),
(5, '$2y$10$59v/Fn6Dp8JRARzvWBvGUe.3Tn8Z/ibkm73N9YeDedO...', 'a', 'a', 'duydang12234a4@gmail.com', 0, '9182379812', 'abc sss', 'Hellooa'),
(6, '$2y$10$6MNiIpZQ3pJPJinl19LWROHwTDehiGPvopWUW3sT5l2...', 'a', 'a', 'duydang122a34a4@gmail.com', 0, '9182379812', 'abc sss', 'Hellooaa'),
(10, '$2y$10$QPOs7iWx0MehSHxbDZ0TCODAJVge6ABA5z9rlT0LxM0vCnXQMRYeK', 'huynh2ưe', 'dang2', '', 0, '', '', 'testdk2'),
(11, '$2y$10$qsDWBgyOJ0xSR52aNN67guWBbOA.gjumTgVeS3LN7jN...', 'Nguyễn', 'Thúy', 'nthyen@ctuet.edu.vn', 1, NULL, NULL, 'user'),
(13, '$2y$10$oBATY8NolmW5kza8I5j1reYGmHuTVKr6GSG6cP3d4Vhffm189GEo2', 'dang', 'huynh', 'duydang@gmail.com', 0, '907283729837', '123 Ninh Kieu, Can Tho', 'dang'),
(16, '$2y$10$URfldlK//EPaUCaKVKbtle.Fpamam9TvxsYFByXbCRSb3q4ig607O', 'a', 'q', 'duy3@gmail.com', 0, '092729232132', '123, 3abc', '123a3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id_tintuc` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `hinh_tintuc` varchar(255) DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `noi_dung_tom_tat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id_tintuc`, `tieu_de`, `hinh_tintuc`, `noi_dung`, `noi_dung_tom_tat`) VALUES
(1, 'Góc thắc mắc: Vì sao iPhone 15 Pro Max đắt nhất, mà vẫn bán chạy nhất thế nhỉ?', '15promax.jpg', 'Với giá thành cao ngất ngưởng nhưng vẫn không ngừng được săn đón, câu hỏi đặt ra là: Vì sao iPhone 15 Pro Max được mua nhiều dù có giá mắc nhất? Lý do không chỉ về công nghệ, tính năng, mà còn về sức mạnh của thương hiệu và nhu cầu thị trường. Hãy cùng khám phá những yếu tố làm nên sức hút phi thường của chiếc điện thoại này ở bài viết này nhé.', 'Với giá thành cao ngất ngưởng nhưng vẫn không ngừng đem lại những tính năng và trải nghiệm tốt nhất cho người dùng, iPhone 15 Pro Max đang là một trong những điện thoại hàng đầu trên thị trường hiện nay.'),
(2, 'Nên mua Galaxy S23 series hay Galaxy S24 series để trải nghiệm Galaxy AI tuyệt nhất đây?', '23vs24.jpg', 'Như vậy, Samsung đã chính thức mang Galaxy AI lên các thế hệ flagship cũ của hãng trong đó có Galaxy S23 series. Vậy câu hỏi đặt ra là sẽ phải chọn lựa như thế nào nếu mang Galaxy S23 series và Galaxy S24 series lên bàn cân? Galaxy S24 series sẽ có những điểm vượt trội nào so với đàn anh Galaxy S23 series với ưu thế về giá?', 'Trong khi Galaxy S23 series tập trung vào việc cải thiện hiệu suất và tính năng, thì Galaxy S24 series mang đến một sự đột phá với tính năng trí tuệ nhân tạo (AI) mới.'),
(3, 'Laptop MSI gaming chạy chip Intel giá chỉ từ 15.99 triệu, giảm thêm đến 500K cho HSSV', 'msigaming.jpg', 'Ưu đãi cực hấp dẫn dành cho nhiều mẫu Laptop Gaming. Giờ đây, bạn đã có ngay cơ hội sở hữu một chiếc laptop MSI chơi game đẳng cấp chỉ từ 15.99 triệu mà còn được hỗ trợ trả góp 0% và duyệt nhanh trong 3 phút.', 'MSI đang cung cấp những chiếc laptop gaming chạy chip Intel với giá khá cạnh tranh, là cơ hội tuyệt vời cho các game thủ.'),
(4, 'Xiaomi 14 giá bao nhiêu khi sở hữu vi xử lý Snapdragon mạnh nhất hiện nay?', 'xiaomi14.jpg', 'Xiaomi vừa đem đến loạt cải tiến đáng giá trên Xiaomi 14. Tiêu biểu là hiệu năng mạnh mẽ từ chip Snapdragon 8 Gen 3 với nhiếp ảnh đỉnh cao từ camera Leica. Vậy Xiaomi 14 giá bao nhiêu?', 'Xiaomi 14 với vi xử lý Snapdragon mới đã thu hút sự chú ý với giá bán hấp dẫn và cải tiến đáng giá.'),
(5, 'Oppo Find X6 Pro ra mắt với camera đỉnh cao', 'findx6.jpg', 'Oppo Find X6 Pro đã chính thức ra mắt với hệ thống camera đỉnh cao, khả năng chụp ảnh trong điều kiện thiếu sáng vượt trội và thiết kế sang trọng. Sản phẩm này hứa hẹn sẽ là một lựa chọn hấp dẫn trong phân khúc điện thoại cao cấp.', 'Oppo Find X6 Pro ra mắt với camera hàng đầu và nhiều tính năng mới hấp dẫn.'),
(6, 'Sony Xperia 1 V: Trải nghiệm màn hình 4K OLED', 'x5m5.jpg', 'Sony Xperia 1 V mang đến trải nghiệm màn hình 4K OLED đỉnh cao, cùng với hệ thống âm thanh vòm Dolby Atmos và camera chất lượng cao, là lựa chọn tuyệt vời cho những ai yêu thích công nghệ và giải trí.', 'Sony Xperia 1 V mang lại trải nghiệm màn hình 4K OLED tuyệt vời cho người dùng.'),
(7, 'Vivo V27 Pro: Smartphone với thiết kế siêu mỏng và hiệu năng mạnh mẽ', 'v27pro.jpg', 'Vivo V27 Pro gây ấn tượng với thiết kế siêu mỏng, hiệu năng mạnh mẽ nhờ vi xử lý MediaTek Dimensity 1200 và hệ thống camera sắc nét, là lựa chọn không thể bỏ qua cho người dùng yêu thích sự hoàn mỹ.', 'Vivo V27 Pro ấn tượng với thiết kế siêu mỏng và hiệu suất ổn định.'),
(8, 'Realme GT Neo 4: Sự kết hợp hoàn hảo giữa hiệu năng và giá cả', 'gtneo4.jpg', 'Realme GT Neo 4 nổi bật với hiệu năng mạnh mẽ từ chip Snapdragon 870, màn hình AMOLED 120Hz và giá cả phải chăng, là lựa chọn lý tưởng cho người dùng muốn sở hữu một chiếc điện thoại cao cấp mà không cần tốn quá nhiều chi phí.', 'Realme GT Neo 4 với hiệu năng mạnh mẽ và giá bán hấp dẫn.'),
(9, 'Huawei P60 Pro: Camera Leica đẳng cấp và pin khủng', 'hp60pro.jpg', 'Huawei P60 Pro mang đến trải nghiệm nhiếp ảnh đỉnh cao với camera Leica, thời lượng pin ấn tượng và thiết kế thời trang, hứa hẹn sẽ làm hài lòng những tín đồ công nghệ.', 'Huawei P60 Pro với camera Leica đẳng cấp và pin dung lượng lớn.'),
(10, 'Google Pixel 7: Trải nghiệm Android gốc hoàn hảo', 'ggp7.jpg', 'Google Pixel 7 mang đến trải nghiệm Android gốc hoàn hảo, hiệu năng mạnh mẽ từ chip Google Tensor và hệ thống camera chất lượng, là lựa chọn tuyệt vời cho những ai yêu thích sự đơn giản và hiệu quả.', 'Google Pixel 7 mang đến trải nghiệm Android gốc và camera chất lượng cao.'),
(11, 'OnePlus 12: Hiệu năng vượt trội với chip Snapdragon 8 Gen 2', 'op12.jpg', 'OnePlus 12 gây ấn tượng với hiệu năng vượt trội từ chip Snapdragon 8 Gen 2, màn hình Fluid AMOLED 120Hz và sạc nhanh Warp Charge 65, là lựa chọn không thể bỏ qua cho người dùng yêu thích tốc độ và hiệu suất.', 'OnePlus 12 với hiệu năng vượt trội từ chip Snapdragon mới.'),
(12, 'Asus ROG Phone 7: Điện thoại gaming đỉnh cao', 'rog7.jpg', 'Asus ROG Phone 7 mang đến trải nghiệm chơi game đỉnh cao với chip Snapdragon 8 Gen 2, màn hình AMOLED 144Hz và hệ thống làm mát tiên tiến, là lựa chọn hoàn hảo cho các game thủ chuyên nghiệp.', 'Asus ROG Phone 7 là điện thoại gaming đỉnh cao với hiệu suất mạnh mẽ.'),
(13, 'Nokia X50: Sự trở lại mạnh mẽ của Nokia', 'x50n.jpg', 'Nokia X50 đánh dấu sự trở lại mạnh mẽ của Nokia với thiết kế bền bỉ, hiệu năng ổn định và hệ thống camera Zeiss chất lượng, là lựa chọn lý tưởng cho những ai yêu thích thương hiệu Nokia.', 'Nokia X50 đánh dấu sự trở lại mạnh mẽ của thương hiệu với tính năng và hiệu suất vượt trội.'),
(14, 'Motorola Edge 40 Pro: Trải nghiệm màn hình cong ấn tượng', 'm40pro.jpg', 'Motorola Edge 40 Pro mang đến trải nghiệm màn hình cong ấn tượng, hiệu năng mạnh mẽ từ chip Snapdragon 8 Gen 2 và hệ thống camera chất lượng, là lựa chọn tuyệt vời cho người dùng muốn sự khác biệt.', 'Motorola Edge 40 Pro với màn hình cong ấn tượng và hiệu suất mạnh mẽ.'),
(15, 'Honor Magic5 Pro: Sự kết hợp hoàn hảo giữa thiết kế và công nghệ', 'hm5.jpg', 'Honor Magic5 Pro gây ấn tượng với thiết kế tinh tế, hiệu năng mạnh mẽ từ chip Snapdragon 8 Gen 2 và hệ thống camera chất lượng, là lựa chọn không thể bỏ qua cho người dùng yêu thích sự hoàn mỹ.', 'Honor Magic5 Pro kết hợp hoàn hảo giữa thiết kế đẹp mắt và hiệu suất ổn định.'),
(16, 'ZTE Axon 40 Ultra: Màn hình không viền và công nghệ camera ẩn', 'z40u.jpg', 'ZTE Axon 40 Ultra nổi bật với màn hình không viền và công nghệ camera ẩn dưới màn hình, cùng với hiệu năng mạnh mẽ và hệ thống camera chất lượng, là lựa chọn lý tưởng cho người dùng muốn sở hữu công nghệ tiên tiến.', 'ZTE Axon 40 Ultra với màn hình không viền và công nghệ camera hàng đầu.'),
(17, 'Black Shark 6: Điện thoại gaming với thiết kế hầm hố', 'bs6.jpg', 'Black Shark 6 mang đến trải nghiệm chơi game đỉnh cao với chip Snapdragon 8 Gen 2, màn hình AMOLED 144Hz và hệ thống làm mát tiên tiến, là lựa chọn hoàn hảo cho các game thủ chuyên nghiệp.', 'Black Shark 6 là điện thoại gaming với thiết kế mạnh mẽ và hiệu suất ổn định.'),
(18, 'Lenovo Legion Phone Duel 3: Hiệu năng đỉnh cao cho game thủ', 'lld3.jpg', 'Lenovo Legion Phone Duel 3 gây ấn tượng với hiệu năng đỉnh cao từ chip Snapdragon 8 Gen 2, màn hình AMOLED 144Hz và hệ thống làm mát tiên tiến, là lựa chọn tuyệt vời cho các game thủ chuyên nghiệp.', 'Lenovo Legion Phone Duel 3 với hiệu suất đỉnh cao cho game thủ.'),
(19, 'Alcatel 3L: Smartphone giá rẻ với hiệu năng ổn định', 'a3l.jpg', 'Alcatel 3L mang đến trải nghiệm smartphone giá rẻ với hiệu năng ổn định từ chip MediaTek Helio P22, màn hình IPS LCD và hệ thống camera kép, là lựa chọn lý tưởng cho người dùng muốn tiết kiệm chi phí.', 'Alcatel 3L là điện thoại giá rẻ với hiệu năng ổn định và thiết kế đẹp.'),
(20, 'Fairphone 5: Điện thoại bền vững và thân thiện với môi trường', 'fr5.jpg', 'Fairphone 5 nổi bật với thiết kế bền vững, thân thiện với môi trường và hiệu năng ổn định, là lựa chọn hoàn hảo cho người dùng quan tâm đến vấn đề bảo vệ môi trường và muốn sở hữu một chiếc điện thoại có thể sửa chữa dễ dàng.', 'Fairphone 5 với thiết kế bền vững và sự tập trung vào môi trường.'),
(21, 'Cat S62 Pro: Smartphone siêu bền cho công việc nặng', 'cat62.jpg', 'Cat S62 Pro mang đến trải nghiệm smartphone siêu bền với thiết kế chắc chắn, khả năng chống nước và bụi IP68, cùng với hiệu năng ổn định, là lựa chọn lý tưởng cho những người làm việc trong môi trường khắc nghiệt.', 'Cat S62 Pro là smartphone siêu bền dành cho công việc nặng.'),
(27, 'cực hot a52', 's24.jpg', '2121', 's24 giám giá a55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `idDonHang` (`idDonHang`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`san_pham_id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`iddanhgia`),
  ADD KEY `manguoidung` (`manguoidung`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDonHang`),
  ADD KEY `maNguoiDung` (`maNguoiDung`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `loai` (`loai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`manguoidung`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `iddanhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `manguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`idDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`manguoidung`) REFERENCES `taikhoan` (`manguoidung`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`maNguoiDung`) REFERENCES `taikhoan` (`manguoidung`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loai`) REFERENCES `loai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
