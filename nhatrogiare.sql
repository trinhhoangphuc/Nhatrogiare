-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2018 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhatrogiare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `ma` int(10) UNSIGNED NOT NULL COMMENT 'ma reporrs',
  `nha_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'ma phong',
  `ip` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP',
  `trangthai` int(11) NOT NULL COMMENT 'trang thai',
  `taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại tạo mới',
  `capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `ma` smallint(5) UNSIGNED NOT NULL COMMENT 'mã hinh sản phẩm',
  `nha_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'sản phẩm mã khóa ngoại',
  `stt` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'hình sản phẩm',
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'hình ảnh tên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh`
--

INSERT INTO `hinh` (`ma`, `nha_ma`, `stt`, `ten`) VALUES
(65, 33, 1, 'nhatrogiare-48733858-dá.jpg'),
(66, 33, 2, 'nhatrogiare-50291687-dfs.jpg'),
(67, 33, 3, 'nhatrogiare-72141126-gdfg.jpg'),
(68, 33, 4, 'nhatrogiare-90849326-hgfh.jpg'),
(73, 36, 1, 'nhatrogiare-72031127-cho-thuê-căn-hộ-3-phòng-ngủ-tại-hồ-chí-minh.jpg'),
(74, 36, 2, 'nhatrogiare-54612231-cho-thuê-căn-hộ-dịch-vụ-tại-nghĩa-tân-quận-câu-giây-hà-nội.jpg'),
(75, 36, 3, 'nhatrogiare-84208872-d.jpg'),
(76, 37, 1, 'nhatrogiare-90956154-nha-cho-thue4.jpg'),
(77, 37, 2, 'nhatrogiare-66524765-nha-tro-gia-re.jpg-3.jpg'),
(78, 37, 3, 'nhatrogiare-27000720-sf.jpg'),
(79, 37, 4, 'nhatrogiare-87875540-xcv.jpg'),
(80, 38, 1, 'nhatrogiare-92363346-hotel1.jpg'),
(81, 38, 2, 'nhatrogiare-15669257-hotel2.jpg'),
(82, 38, 3, 'nhatrogiare-37792056-hotel4.jpg'),
(83, 38, 4, 'nhatrogiare-74152410-top1.jpg'),
(84, 39, 1, 'nhatrogiare-43293073-cxz.jpg'),
(85, 39, 2, 'nhatrogiare-4395125-webp-net-resizeimage-1-1429313.jpg'),
(86, 39, 3, 'nhatrogiare-6410991-xc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã loại phòng',
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên lọa phòng',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'hiển thị',
  `taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại tạo mới',
  `capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma`, `ten`, `slug`, `trangthai`, `taoMoi`, `capNhat`) VALUES
(1, 'Ở Ghép', 'o ghep', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(2, 'Nhà Nguyên Căn', 'nha nguyen can', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(3, 'Nhà Trọ', 'nha tro', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2018_09_27_094618_create_loai_table', 1),
(21, '2018_09_27_094710_create_tinh_table', 1),
(22, '2018_09_27_094805_create_nha_table', 1),
(23, '2018_09_27_094818_create_bao_table', 1),
(24, '2018_09_27_140331_create_hinh_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha`
--

CREATE TABLE `nha` (
  `ma` bigint(20) UNSIGNED NOT NULL COMMENT 'mã phòng',
  `tieude` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `mota` text COLLATE utf8mb4_unicode_ci COMMENT 'mô tả',
  `gia` bigint(20) UNSIGNED NOT NULL COMMENT 'giá phòng',
  `dientich` smallint(5) UNSIGNED NOT NULL COMMENT 'mã vị trí',
  `luotxem` smallint(5) UNSIGNED NOT NULL COMMENT 'lượt xem',
  `diachi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'địa chỉ',
  `dienthoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'địện thoại',
  `lat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tọa độ x',
  `lng` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tọa độ y',
  `hinh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'hình ảnh',
  `user_ma` int(10) UNSIGNED NOT NULL COMMENT 'mã user',
  `loai_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'mã loại',
  `tinh_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'mã tỉnh',
  `trangthai` bigint(20) UNSIGNED NOT NULL COMMENT 'duyệt',
  `taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại tạo mới',
  `capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'loại cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha`
--

INSERT INTO `nha` (`ma`, `tieude`, `mota`, `gia`, `dientich`, `luotxem`, `diachi`, `dienthoai`, `lat`, `lng`, `hinh`, `user_ma`, `loai_ma`, `tinh_ma`, `trangthai`, `taoMoi`, `capNhat`) VALUES
(33, 'Cho thuê villa 3 phòng ngủ tại Tương Bình Hiệp', '<p>Nền cho đầu tư tương lai<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/fdd/1/16/274c.png\" style=\"height:16px; width:16px\" />❌B&aacute;n nền gốc 2 mặt tiền A13 v&agrave; B26 C&aacute;ch trục ch&iacute;nh A3 lộ 30m Hưng Ph&uacute; 1 c&aacute;i nền s&aacute;t khu vingrup mới c&ocirc;ng bố quy hoạch.<br />\r\n__ Dự &aacute;n sắp tới sẽ l&agrave;m s&acirc;n golf 18 lổ, biệt thự cồn ấu, cầu bắt qua x&oacute;m ch&agrave;i.... khu hot v&agrave; vip nhất cần thơ.<br />\r\n__ DT: 5m88 x 16 = 81.5m2 thổ cư 100%.<br />\r\n__Tặng bản vẻ nh&agrave; 1 trệt 1 lầu đ&atilde; đc duyệt. C&oacute; sẳn 4 ph&ograve;ng trọ.<br />\r\n__ H: T&acirc;y Nam, T&acirc;y Bắc mương hở 2m coi như nền c&oacute; 3 mặt tiền.<br />\r\n$$$Gi&aacute;: ch&iacute;nh chủ gọi<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/fd8/1/16/1f4f2.png\" style=\"height:16px; width:16px\" />📲 Za,Fa,call trực tiếp: 0948041096 (hồng y)<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/fc8/1/16/1f5fa.png\" style=\"height:16px; width:16px\" />🗺 Nhận k&yacute;_gởi v&agrave; mọi dịch vụ nh&agrave;, đất<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/fc0/1/16/1f30e.png\" style=\"height:16px; width:16px\" />🌎<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f51/1/16/2714.png\" style=\"height:16px; width:16px\" />✔C&aacute;m ơn c&aacute;c bạn đ&atilde; quan t&acirc;m<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f50/1/16/2757.png\" style=\"height:16px; width:16px\" /></p>', 56778789, 43, 1, '34 Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ, Vietnam', '2343456', '10.034193517828692', '105.7885605423279', 'nhatrogiare-48733858-dá.jpg', 5, 1, 1, 1, '2018-10-05 08:04:46', '2018-10-05 08:04:46'),
(36, 'Cho thuê nhà nguyên căn, 4 phòng ngủ, giá dưới 11 triệu', '<p><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f89/1/16/1f3db.png\" style=\"height:16px; width:16px\" />🏛<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/fb7/1/16/269c.png\" style=\"height:16px; width:16px\" />⚜️<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f89/1/16/1f3db.png\" style=\"height:16px; width:16px\" />🏛B&aacute;n nh&agrave; 1 trệt 1 lầu KDC Long Thịnh phường Ph&uacute; Thứ, quận C&aacute;i Răng, Tp.Cần Thơ.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Diện t&iacute;ch: 4.5 x 20 = 90 m2.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️DTSD: 180m2.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Lộ giới: 13.5m.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Ph&aacute;p l&yacute;: sổ hồng.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Hướng: T&acirc;y Bắc.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f8d/1/16/1f449_1f3fc.png\" style=\"height:16px; width:16px\" />👉🏼Thiết kế: 1 ph&ograve;ng kh&aacute;ch lớn, c&oacute; thể đậu xe hơi trong nh&agrave;, 1 ph&ograve;ng bếp k&egrave;m m&aacute;y h&uacute;t m&ugrave;i v&agrave; tủ gỗ, c&oacute; 3 ph&ograve;ng ngủ, 3 toilet.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f8d/1/16/1f449_1f3fc.png\" style=\"height:16px; width:16px\" />👉🏼C&aacute;ch trung t&acirc;m Ninh Kiều 10 ph&uacute;t đi xe m&aacute;y, gần Ph&uacute; Thứ, UBND Ph&uacute; Thứ, THPT, THCS b&aacute;n k&iacute;nh 1km,... Hạ tầng ho&agrave;n chỉnh. KDC đ&ocirc;ng đ&uacute;c, sang trọng.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f5a/1/16/1f4b0.png\" style=\"height:16px; width:16px\" />💰Gi&aacute; b&aacute;n: 2 tỷ 300 triệu.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f4d/1/16/1f4de.png\" style=\"height:16px; width:16px\" />📞Li&ecirc;n hệ: 0967 141 321 (Tuấn Cảnh).<br />\r\nChuy&ecirc;n nhận k&yacute; gửi nh&agrave; đất b&aacute;n.<br />\r\nChuy&ecirc;n nghiệp - Nhanh gọn - Uy t&iacute;n.<br />\r\nC&ocirc;ng ty Địa Ốc Minh Phương.</p>', 34300000, 45, 1, '44 Đường Nguyễn Văn Linh, Hưng Lợi, Ninh Kiều, Cần Thơ, Vietnam', '055454534', '10.0242071', '105.76091680000002', 'nhatrogiare-72031127-cho-thuê-căn-hộ-3-phòng-ngủ-tại-hồ-chí-minh.jpg', 5, 2, 4, 1, '2018-10-05 08:30:26', '2018-10-05 08:30:26'),
(37, 'Cho thuê căn hộ 2 phòng ngủ tại Vinhomes Central Park', '<p><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f39/1/16/1f4e2.png\" style=\"height:16px; width:16px\" />📢<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f39/1/16/1f4e2.png\" style=\"height:16px; width:16px\" />📢<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f39/1/16/1f4e2.png\" style=\"height:16px; width:16px\" />📢Hot hot hot, nền qua cầu 26/3 gi&aacute; cho đầu tư rất hấp dẫn, mua nhanh kẻo b&aacute;n!<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f89/1/16/1f3db.png\" style=\"height:16px; width:16px\" />🏛B&aacute;n nền vị tr&iacute; đẹp qua cầu 26/3 KDC Hưng Ph&uacute; 1, C&aacute;i Răng, TPCT.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Diện t&iacute;ch: 4.5x25=112.5m2.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Hướng: T&acirc;y Bắc.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Lộ giới: 16m (3.5-9-3.5).<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ff8/1/16/267b.png\" style=\"height:16px; width:16px\" />♻️Ph&aacute;p l&yacute;: Sổ hồng, thổ cư 100%.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f8d/1/16/1f449_1f3fc.png\" style=\"height:16px; width:16px\" />👉🏼Tiện &iacute;ch: Nền gi&aacute; tốt, vị tr&iacute; đẹp, gần si&ecirc;u thị Big C, trường học c&aacute;c cấp, Kv d&acirc;n cư đ&ocirc;ng đ&uacute;c, tiềm năng về l&acirc;u d&agrave;i.<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f5a/1/16/1f4b0.png\" style=\"height:16px; width:16px\" />💰Gi&aacute; b&aacute;n: 1.98 tỷ (kh&ocirc;ng thương lượng).<br />\r\n<img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f4d/1/16/1f4de.png\" style=\"height:16px; width:16px\" />📞Li&ecirc;n hệ: 0967 141 321 (Tuấn Cảnh).<br />\r\nChuy&ecirc;n nhận k&yacute; gửi nh&agrave; đất b&aacute;n.<br />\r\nChuy&ecirc;n nghiệp, nhanh gọn v&agrave; uy t&iacute;n.</p>', 23000000, 43, 3, '49 Hai Bà Trưng, Nam Bình, Ninh Bình, Vietnam', '094343455', '20.238564', '105.97199909999995', 'nhatrogiare-90956154-nha-cho-thue4.jpg', 5, 2, 4, 1, '2018-10-05 08:33:07', '2018-10-05 08:33:07'),
(38, 'Resort MerPerle Hòn Tằm Resort', '<p><strong>MerPerle H&ograve;n Tằm Resort </strong>c&oacute; 49 ph&ograve;ng được trang bị c&aacute;c tiện nghi như m&aacute;y lạnh, truy cập wifi miễn ph&iacute;, tivi m&agrave;n h&igrave;nh phẳng, b&agrave;n, m&aacute;y pha tr&agrave;/cafe, khu vực tiếp kh&aacute;ch, ph&ograve;ng tắm ri&ecirc;ng&nbsp;đi k&egrave;m bồn tắm, v&ograve;i sen, đồ vệ sinh c&aacute; nh&acirc;n miễn ph&iacute;.<br />\r\n<br />\r\nC&aacute;c dịch vụ của kh&aacute;ch sạn gồm an ninh 24 giờ, cho thu&ecirc; xe đạp, cửa h&agrave;ng lưu niệm, dịch vụ bưu điện, dịch vụ du lịch, dịch vụ giặt l&agrave;, dịch vụ ph&ograve;ng 24 giờ, dịch vụ v&eacute;, đưa đ&oacute;n s&acirc;n bay, giữ h&agrave;nh l&yacute;, nh&acirc;n vi&ecirc;n hướng dẫn, nhận/trả ph&ograve;ng ri&ecirc;ng, ph&ograve;ng h&uacute;t thuốc, qu&aacute;n c&agrave; ph&ecirc;, quầy bar, quầy lễ t&acirc;n 24 giờ, thiết bị ph&ograve;ng họp, thu đổi ngoại tệ, thủ tục nhận ph&ograve;ng/trả ph&ograve;ng nhanh, trung t&acirc;m hội nghị.<br />\r\n<br />\r\nNhững phương tiện giải tr&iacute; bao gồm b&atilde;i biển ri&ecirc;ng, bồn tắm nước n&oacute;ng, b&oacute;ng b&agrave;n, c&acirc;u c&aacute;, c&acirc;u lạc bộ trẻ em, c&ocirc;ng vi&ecirc;n nước, h&aacute;t karaoke, hồ bơi (trẻ em), hồ bơi trong nh&agrave;, hồ bơi&thinsp;ngo&agrave;i trời, lướt v&aacute;n, khu vui chơi trẻ em, lặn biển, lướt v&aacute;n, massage, ph&ograve;ng tắm hơi, ph&ograve;ng thể dục, ph&ograve;ng tr&ograve; chơi, s&acirc;n chơi golf (trong v&ograve;ng 3 km), s&acirc;n golf (tại chỗ), s&acirc;n golf mini, s&acirc;n tennis, spa, thể thao dưới nước, thu&ecirc; dụng cụ trượt tuyết, thu&ecirc; thiết bị thể thao nước (thuyền, xuồng).</p>\r\n\r\n<p>&nbsp;</p>', 2500000, 20, 7, 'Unnamed Road, Tp. Nha Trang, Vietnam', '09876542', '12.1786238', '109.23565770000005', 'nhatrogiare-92363346-hotel1.jpg', 5, 1, 1, 1, '2018-10-06 15:19:25', '2018-10-06 15:19:25'),
(39, 'Khách sạn ABC', '<p><strong>Kh&aacute;ch sạn TMS Luxury Đ&agrave; Nẵng</strong> tọa lạc tại&nbsp;L&ocirc; A3 Đường V&otilde; Nguy&ecirc;n Gi&aacute;p, P. Mỹ An, Q. Ngũ H&agrave;nh Sơn, TP. Đ&agrave; Nẵng - đối diện b&atilde;i biển Mỹ Kh&ecirc; &ndash; một trong s&aacute;u b&atilde;i biển đẹp nhất h&agrave;nh tinh. Từ kh&aacute;ch sạn, qu&yacute; kh&aacute;ch c&oacute; thể dễ d&agrave;ng di chuyển đến c&aacute;c địa điểm thăm quan nổi tiếng của Đ&agrave; Nẵng cũng như v&agrave;o trung t&acirc;m th&agrave;nh phố.<br />\r\n<br />\r\nTừ những căn ph&ograve;ng y&ecirc;n tĩnh nhưng vẫn theo khuynh hướng hiện đại đến những trải nghiệm sảng kho&aacute;i như tận chốn thi&ecirc;n đường của dịch vụ spa, tất cả mọi thứ được kiến tạo dựa tr&ecirc;n những nhu cầu v&agrave; mong muốn của kh&aacute;ch h&agrave;ng nhằm mang đến cho qu&yacute; kh&aacute;ch một kỳ nghỉ với những trải nghiệm tuyệt vời trong từng cung bậc cảm x&uacute;c.</p>\r\n\r\n<p>&nbsp;</p>', 1000000, 23, 0, '31 Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ, Vietnam', '097856454', '10.03437250554877', '105.78881696560666', 'nhatrogiare-43293073-cxz.jpg', 6, 1, 1, 1, '2018-10-08 04:02:31', '2018-10-08 04:02:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã tinh phòng',
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên lọa phòng',
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'hiển thị',
  `taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tinh tạo mới',
  `capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tinh cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`ma`, `ten`, `slug`, `trangthai`, `taoMoi`, `capNhat`) VALUES
(1, 'Sóc Trăng', 'soc trang', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(2, 'Mỹ Xuyên', 'my xuyen', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(3, 'Vĩnh Long', 'vinh long', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(4, 'Cần Thơ', 'can tho', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(5, 'Trà Vinh', 'tra vinh', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38'),
(6, 'Bạc Liêu', 'bac lieu', 1, '2018-09-28 14:50:38', '2018-09-28 14:50:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `approve` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role`, `approve`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$PbcTr8FMJ1vKkjVx5s3BZe3lksecH1V4B.FU604GQQkUcVdekJzZ6', 'admin.jpg', 1, 1, NULL, '2018-09-29 17:00:00', NULL),
(5, 'Trịnh Hoàng Phúc', 'thphucct@gmail.com', '$2y$10$6yvsOpvxP/xCstFD9xa.xOqWTSQZ9nmab3o1xgYNAuahqkt9567XC', 'avatar-41943981-prt_400x400_1475311974.gif', 0, 1, 'qMWHN8SASAdexcc0aRH0YrZMfw03Vf8aE3CWmkJcKOBnlzrn5BSzpTQpsGUG', '2018-10-05 00:45:54', '2018-10-05 01:09:58'),
(6, 'Nguyễn Văn A', 'nva@gmail.com', '$2y$10$k/ej.SUtZL2t76UzaEs8j.CgQXxbsbulIU3mFTH88rKDLo91kSMAu', 'avatar-37413052-logo2.png', 0, 1, 'Ezd2Ee0K927SoAHKhBAMIBoRUiAJq1UFSM3d6ny9tbvZk3zlQGJ15xQmayx0', '2018-10-07 20:56:10', '2018-10-07 20:59:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `baocao_nha_ma_foreign` (`nha_ma`);

--
-- Chỉ mục cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `hinh_nha_ma_foreign` (`nha_ma`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha`
--
ALTER TABLE `nha`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `nha_user_ma_foreign` (`user_ma`),
  ADD KEY `nha_loai_ma_foreign` (`loai_ma`),
  ADD KEY `nha_tinh_ma_foreign` (`tinh_ma`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ma reporrs';

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'mã hinh sản phẩm', AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã loại phòng', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nha`
--
ALTER TABLE `nha`
  MODIFY `ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'mã phòng', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã tinh phòng', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_nha_ma_foreign` FOREIGN KEY (`nha_ma`) REFERENCES `nha` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD CONSTRAINT `hinh_nha_ma_foreign` FOREIGN KEY (`nha_ma`) REFERENCES `nha` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nha`
--
ALTER TABLE `nha`
  ADD CONSTRAINT `nha_loai_ma_foreign` FOREIGN KEY (`loai_ma`) REFERENCES `loai` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nha_tinh_ma_foreign` FOREIGN KEY (`tinh_ma`) REFERENCES `tinh` (`ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nha_user_ma_foreign` FOREIGN KEY (`user_ma`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
