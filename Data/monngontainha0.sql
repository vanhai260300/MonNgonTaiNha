-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 08:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monngontainha0`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `IDHoaDon` int(11) NOT NULL,
  `IDMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` bigint(20) NOT NULL,
  `MoTa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`IDHoaDon`, `IDMonAn`, `SoLuong`, `TongTien`, `MoTa`, `GhiChu`) VALUES
(1, 2, 6, 2400000, '', ''),
(1, 6, 3, 120000, '', ''),
(1, 9, 2, 100000, '', ''),
(2, 1, 3, 450000, '', ''),
(3, 2, 5, 2000000, '', ''),
(8, 5, 2, 22222, '', ''),
(8, 14, 1, 150000, '', ''),
(9, 5, 2, 3000, '', ''),
(9, 14, 1, 150000, '', ''),
(13, 2, 4, 1600000, '', ''),
(13, 6, 1, 40000, '', ''),
(13, 9, 1, 50000, '', ''),
(13, 15, 3, 75000, '', ''),
(14, 5, 1, 1500, '', ''),
(15, 2, 1, 400000, '', ''),
(16, 2, 2, 800000, '', ''),
(24, 2, 1, 45000, '', ''),
(24, 6, 1, 40000, '', ''),
(24, 9, 1, 50000, '', ''),
(26, 1, 2, 300000, '', ''),
(27, 6, 1, 40000, '', ''),
(28, 19, 1, 25000, '', ''),
(28, 20, 1, 50000, '', ''),
(29, 1, 1, 150000, '', ''),
(29, 19, 1, 25000, '', ''),
(29, 20, 1, 50000, '', ''),
(30, 4, 2, 6000, '', ''),
(31, 3, 1, 50000, '', ''),
(32, 2, 1, 45000, '', ''),
(32, 6, 1, 40000, '', ''),
(33, 2, 1, 45000, '', ''),
(33, 6, 1, 40000, '', '');

--
-- Triggers `chitiethoadon`
--
DELIMITER $$
CREATE TRIGGER `chitiethoadon_Update_chitiethoadon` BEFORE UPDATE ON `chitiethoadon` FOR EACH ROW SET NEW.TongTien = NEW.SoLuong * (SELECT monan.Gia FROM monan WHERE monan.IDMonAn = NEW.IDMonAn)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chitiethoadon_delete_hoadondathang` AFTER DELETE ON `chitiethoadon` FOR EACH ROW UPDATE hoadondathang h
   SET h.TongTien = 
    (SELECT SUM(TongTien) 
       FROM chitiethoadon c
      WHERE c.IDHoaDon = h.IDHoaDon)
 WHERE h.IDHoaDon = OLD.IDHoaDon
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chitiethoadon_insert` AFTER INSERT ON `chitiethoadon` FOR EACH ROW UPDATE hoadondathang h
   SET h.TongTien = 
    (SELECT SUM(TongTien) 
       FROM chitiethoadon c
      WHERE c.IDHoaDon = h.IDHoaDon)
 WHERE h.IDHoaDon = NEW.IDHoaDon
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chitiethoadon_insert_chitiethoadon` BEFORE INSERT ON `chitiethoadon` FOR EACH ROW SET NEW.TongTien = NEW.SoLuong * (SELECT monan.Gia FROM monan WHERE monan.IDMonAn = NEW.IDMonAn)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chitiethoadon_update_hoadondathang` AFTER UPDATE ON `chitiethoadon` FOR EACH ROW UPDATE hoadondathang h
   SET h.TongTien = 
    (SELECT SUM(TongTien) 
       FROM chitiethoadon c
      WHERE c.IDHoaDon = h.IDHoaDon)
 WHERE h.IDHoaDon = NEW.IDHoaDon
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cuahang`
--

CREATE TABLE `cuahang` (
  `IDCuaHang` int(11) NOT NULL,
  `TenCuaHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenChuCuaHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` bigint(20) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GioMoCua` time NOT NULL,
  `GioDongCua` time NOT NULL,
  `Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GPKD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnhCuaHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuahang`
--

INSERT INTO `cuahang` (`IDCuaHang`, `TenCuaHang`, `TenDangNhap`, `MatKhau`, `TenChuCuaHang`, `SDT`, `Email`, `DiaChi`, `GioMoCua`, `GioDongCua`, `Anh`, `GPKD`, `HinhAnhCuaHang`) VALUES
(1, 'Nhà hàng Jolibee', 'hai', 'hai', 'Lê Xuân Viên', 353386306, 'lexuanvien04@gmail.com', '32 Tiểu La', '07:00:00', '22:00:00', '5ad74b9dbc38a.jpg', '', ''),
(2, 'Quán Cô Hồng - Gỏi cá Nam Ô', 'QCoHong', 'qcohong', 'Nguyễn Thị Hồng', 234224563, 'hong123@gmail.com', '118 Huỳnh Thúc Kháng', '10:00:00', '22:00:00', '5ad74b60c13bb.jpg', '', ''),
(3, 'Nhà Hàng Mr.Anh', 'mranh', 'mranh', 'Trần Quốc Anh', 896200774, 'nhmranh@gmail.com', '340 Ông Ích Khiêm', '07:00:00', '22:00:00', '5ad74b2867be8.jpg', '', ''),
(4, 'Nhà hàng Cơm niêu Việt', 'nhviet', 'nhviet', 'Nguyễn Văn Hải', 365432876, 'nhviet12@gmail.com', '102 Nguyễn Tri Phương', '07:00:00', '22:00:00', '5ad74bfc19f35.jpg', '', ''),
(5, 'Bà Dưỡng', 'baduong', 'baduong', 'Nguyễn Thị Dưỡng', 123456789, 'baduong@gmail.com', 'K280/23 Hoàng Diệu', '09:30:00', '21:00:00', '5ad74ce37c383.jpg', '', ''),
(6, 'Hải sản Năm Đảnh', 'haisannamdanh', 'haisannamdanh', 'Năm Đảnh', 324564321, 'namdanh@gmail.com', 'K139/H59/38 Trần Quang Khải, P. Thọ Quang', '10:00:00', '22:00:00', '5ad74de005016.jpg', '', ''),
(7, 'A Hải', 'anhhai', 'anhhai', 'Lê Văn Hải', 897543657, 'anhhai@gmail.com', '96 Phan Châu Trinh', '08:30:00', '22:00:00', '5ad74ebf1d103.jpg', '', ''),
(8, 'Quán bánh canh dốc', 'banhcanhdoc', 'banhcanhdoc', 'Lê Thị Mơ', 905768654, 'banhcanhdoc@gmail.com', '35 Dũng Sĩ Thanh Khê - Thanh Khê', '16:00:00', '22:00:00', '5ad74de005016.jpg', '', ''),
(9, 'Quán Cô Lê', 'quancole', 'quancole', 'Võ Thị Lê', 878765471, 'cole@gmail.com', '112 Trần Cao Vân - Thanh Khê', '17:00:00', '21:00:00', '5ad74ebf1d103.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucmonan`
--

CREATE TABLE `danhmucmonan` (
  `IDDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaDM` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucmonan`
--

INSERT INTO `danhmucmonan` (`IDDanhMuc`, `TenDanhMuc`, `MoTaDM`) VALUES
(1, 'Cơm', 'Cơm sườn, cơm gà, cơm trứng,...'),
(2, 'Mỳ Quảng', 'Mỳ Quảng trứng, thập cẩm, tôm trứng,...'),
(3, 'Phở', 'Phở bò, phở nạm,...'),
(4, 'Món Âu', 'Các đồ ăn châu Âu'),
(5, 'Bánh xèo', 'Bánh xèo'),
(6, 'Bánh tráng thịt heo', 'Bánh tráng thịt heo'),
(7, 'Bánh canh', 'Bánh canh'),
(8, 'Lẩu ', 'Lẩu bò, lẩu hải sản,...'),
(9, 'Hải sản', 'Tôm, cua, ghẹ,...'),
(10, 'Bánh canh', 'Bánh canh cua, cá lóc, trứng,..'),
(11, 'Bún đậu mắm tôm', '...');

-- --------------------------------------------------------

--
-- Table structure for table `hoadondathang`
--

CREATE TABLE `hoadondathang` (
  `IDHoaDon` int(11) NOT NULL,
  `IDKhackHang` int(11) NOT NULL,
  `IDNVGH` int(11) DEFAULT NULL,
  `TGGiaoHang` datetime NOT NULL,
  `TGNhanHang` datetime NOT NULL,
  `PhiGiaoHang` bigint(20) NOT NULL,
  `TongTien` bigint(20) NOT NULL,
  `DiaChiGiaoHang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDTrangThai` int(11) NOT NULL,
  `SDTN` bigint(20) NOT NULL,
  `EmailN` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadondathang`
--

INSERT INTO `hoadondathang` (`IDHoaDon`, `IDKhackHang`, `IDNVGH`, `TGGiaoHang`, `TGNhanHang`, `PhiGiaoHang`, `TongTien`, `DiaChiGiaoHang`, `IDTrangThai`, `SDTN`, `EmailN`) VALUES
(1, 1, 1, '2021-06-01 07:13:11', '2021-07-01 08:00:00', 12000, 2620000, 'k16/19 Nguyễn Như Hạnh - Liên Chiểu', 5, 353386306, 'vienpro@gmail.com'),
(2, 2, 0, '2021-06-30 10:24:09', '2021-06-30 10:40:09', 10000, 450000, '76 Hàm Nghi - Hải Châu', 0, 376445796, 'anhnam@gmail.com'),
(3, 3, 0, '2021-07-01 05:24:09', '2021-07-01 10:50:09', 15000, 2000000, '03 Thanh Sơn - Hải Châu', 0, 365432876, 'VanHai123@gmail.com'),
(8, 4, 1, '2021-08-10 06:51:40', '2021-07-30 11:32:42', 10000, 172222, '', 1, 0, ''),
(9, 9, 0, '2021-07-30 11:59:27', '2021-07-30 11:59:27', 20000, 153000, '', 0, 0, ''),
(13, 6, 1, '2021-08-10 06:48:24', '0000-00-00 00:00:00', 18000, 1765000, '', 5, 0, ''),
(14, 8, 0, '2021-08-10 06:48:24', '0000-00-00 00:00:00', 20000, 1500, '', 0, 0, ''),
(15, 5, 0, '2021-08-10 06:48:24', '0000-00-00 00:00:00', 20000, 400000, '', 0, 0, ''),
(16, 1, 1, '2021-08-10 06:48:24', '0000-00-00 00:00:00', 0, 800000, '', 5, 0, ''),
(24, 1, 1, '2021-08-10 06:47:09', '0000-00-00 00:00:00', 15000, 135000, '', 1, 0, ''),
(25, 5, 1, '2021-08-10 06:43:25', '2021-08-10 06:43:25', 10000, 0, '', 0, 0, ''),
(26, 1, 1, '2021-08-10 06:48:24', '0000-00-00 00:00:00', 15000, 300000, '', 4, 0, ''),
(27, 4, 1, '2021-08-10 06:52:35', '0000-00-00 00:00:00', 15000, 40000, '', 4, 0, ''),
(28, 4, 1, '2021-08-10 10:11:36', '0000-00-00 00:00:00', 15000, 75000, '', 5, 0, ''),
(29, 4, 1, '2021-08-10 12:06:20', '0000-00-00 00:00:00', 15000, 225000, '', 5, 0, ''),
(30, 4, 1, '2021-08-10 04:23:24', '0000-00-00 00:00:00', 15000, 6000, '', 1, 0, ''),
(31, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15000, 50000, '', 0, 0, ''),
(32, 1, 1, '2021-08-11 07:09:21', '0000-00-00 00:00:00', 15000, 85000, '', 1, 0, ''),
(33, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15000, 85000, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKhachHang` int(11) NOT NULL,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`IDKhachHang`, `TenKH`, `TenDangNhap`, `MatKhau`, `SDT`, `Email`, `DiaChi`) VALUES
(1, 'Lê Anh Nam', 'hai', 'hai', '376445796', 'anhnam@gmail.com', '76 Hàm Nghi - Hải Châu'),
(2, 'Trần Quốc Tuấn', 'quoctuan', 'quoctuan', '967654176', 'quoctuan@gmail.com', '89 Hoàng Thị Loan - Liên Chiểu'),
(3, 'Lê Xuân Viên', 'vien', 'vien', '896200774', 'lexuanvien04@gmail.com', 'k16/19 Nguyễn Như Hạnh - Liên Chiểu'),
(4, 'Nguyễn Văn Hải', 'Hai123', '123', '365432876', 'VanHai123@gmail.com', '03 Thanh Sơn - Hải Châu'),
(5, 'Nguyễn Tiến Dũng', 'tiendung', '123', '326578752', 'tiendung123@gmail.com', '16 Ông ích Khiêm - Hải Châu'),
(6, 'Lê Đình Minh Quân', 'minhquan', '123', '786534231', 'minhquan123@gmail.com', '32/16 Nguyễn Tất Thành - Hải Châu'),
(8, 'Lương Hà Phương', 'haphuong', 'haphuong', '767897652', 'haphuong@gmail.com', '45/3 Núi Thành - Hải Châu'),
(9, 'Lê Thị Ái Vy', 'aivy', 'aivy', '324568763', 'aivy@gmail.com', '26 Lê Thánh Tông - Liên Chiểu'),
(10, 'Phan Hải', 'haidt', '123', '94563278', 'vanhai@gmail.com', 'Đội 5, Lam Thủy, Hải Hưng, Hải Lăng, Quảng Trị'),
(11, 'Phan Anh', 'phananh', '123', '0376445796', 'pa@gmail.com', 'Hải Hưng, Hải Lăng, Quảng Trị');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `IDMonAn` int(11) NOT NULL,
  `IDCuaHang` int(11) NOT NULL,
  `IDDanhMuc` int(11) NOT NULL,
  `TenMonAn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` bigint(100) NOT NULL,
  `Anh1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Anh2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Anh3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DanhGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleteAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`IDMonAn`, `IDCuaHang`, `IDDanhMuc`, `TenMonAn`, `Gia`, `Anh1`, `Anh2`, `Anh3`, `MoTa`, `TrangThai`, `DanhGia`, `deleteAt`) VALUES
(1, 3, 4, 'Pizza', 150000, '5ad75a1869e93.jpg', '', '', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(2, 1, 4, 'Tôm Chiên Giòn', 45000, '5ad7582e2ec9c.jpg', '', '', 'Một bữa cơm ngon cho gia đình yêu thướng', 'CO', '', NULL),
(3, 9, 2, 'Mỳ Quảng Thập cẩm', 50000, '5ad7582e2ec9c.jpg', '', '', 'Mỳ Quảng mang đậm quê hương', 'CO', '', NULL),
(4, 5, 5, 'Bánh xèo ', 3000, '5ad7590d9702b.jpg', '', '', 'Bánh Xèo', 'CO', '', NULL),
(5, 6, 9, 'Hải sản', 11111, '5ad75800a9399.jpg', '', '', 'Hải sản tươi ngon', 'CO', '', NULL),
(6, 1, 1, 'Cơm chiên gà quay', 40000, '5ad7590d9702b.jpg', '', '', 'Ngon và rẻ', 'CO', '', NULL),
(7, 9, 2, 'Mỳ Quảng tôm thịt Heo', 15000, '5ad7582e2ec9c.jpg', '', '', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(8, 8, 7, 'Bánh canh chả trứng', 15000, '5ad75800a9399.jpg', '', '', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(9, 1, 1, 'Cơn siêu ngon', 50000, '5ad75800a9399.jpg', '', '', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(11, 7, 6, 'Bánh tráng thịt heo', 25000, '5ad7590d9702b.jpg', '', '', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(13, 9, 3, 'Phở bò', 20000, 'pho1.jpg', 'pho2.jpg', 'pho3.jpg', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(14, 6, 9, 'Lẩu Hải Sản', 150000, 'lau1.jpg', 'lau2.jpg', 'lau3.jpg', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(15, 1, 1, 'Cơm chiên trứng', 25000, 'comt3.jpg', 'cont1.jpg', 'cont2.jpg', 'Pizza công thức mới cực ngon', 'CO', '', NULL),
(16, 1, 1, 'Cơm chiên Hải Sản', 20000, 'ccc.jpg', 'ccc.jpg', 'ccc.jpg', 'Cơm Chiên', 'CO', '', NULL),
(17, 1, 2, 'Mỳ Quảng Tôm ', 20000, 'mq.jpg', '', '', 'Mỳ quảng cay', 'CO', '', NULL),
(18, 7, 6, 'Bánh ướt thịt heo', 35000, 'bu.jpg', '', '', 'Bánh ướt Phương Lang', 'CO', '', NULL),
(19, 3, 4, 'Hamburger Thịt Bò', 25000, 'hbg.jpg', 'hbg.jpg', 'banh-hamburger-bo.jpg', 'Hambuiger ', 'CO', '', NULL),
(20, 3, 4, 'Combo Hamburger', 50000, 'banh-hamburger-bo.jpg', '', '', 'Hamburger', 'CO', '', NULL),
(21, 3, 4, 'Gà Rán Siêu ngon', 30000, 'gr.jpg', '', '', 'Gà Rán', 'CO', '', NULL),
(22, 3, 4, 'Gà Rán PhoMai', 35000, 'gr.jpg', '', '', 'GR', 'CO', '', NULL),
(23, 3, 4, 'GR Cay', 25000, 'hbg.jpg', '', '', 'GR', 'CO', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nvgiaohang`
--

CREATE TABLE `nvgiaohang` (
  `IDNVGH` int(11) NOT NULL,
  `TenNV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` bigint(20) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` bigint(20) NOT NULL,
  `Avata` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nvgiaohang`
--

INSERT INTO `nvgiaohang` (`IDNVGH`, `TenNV`, `TenDangNhap`, `MatKhau`, `SDT`, `Email`, `GioiTinh`, `DiaChi`, `CMND`, `Avata`) VALUES
(0, 'Chưa thanh toán\r\n', '0', '0', 0, '', '', '', 0, ''),
(1, 'Nguyễn Văn Bình', 'vanbinh', 'vanbinh', 896200774, 'vanbinh123@gmail.com', 'Nam', '123 Ngô Quyền - Hải Châu', 206543567, ''),
(2, 'Trần Văn An', 'vanan', 'vanan123', 365432876, 'vanan123@gmail.com', 'Nam', '02 Âu Cơ - Liên Chiểu', 206123562, ''),
(3, 'Trần Nghĩa', 'nghiatran', 'nghiatran', 357689232, 'nghiatran@gmail.com', 'Nam', '16 Cao Thắng', 206578543, ''),
(4, 'Lê Quốc Anh', 'quocanh', 'quocanh', 967654176, 'quocanh@gmail.com', 'Nam', '120 Nguyễn Tất Thành', 205987876, '');

-- --------------------------------------------------------

--
-- Table structure for table `quantrivien`
--

CREATE TABLE `quantrivien` (
  `IDAdmin` int(11) NOT NULL,
  `TenAdmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantrivien`
--

INSERT INTO `quantrivien` (`IDAdmin`, `TenAdmin`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'Lê Xuân Viên 2 2', 'admin', 'admin'),
(2, 'Nguyễn Văn Hải', 'admin2', 'admin'),
(3, 'Nguyễn Tiến Dũng', 'admin3', 'admin'),
(4, 'Lê Đình Minh Quân', 'admin4', 'admin'),
(5, 'Day la hai nhé hehe', 'oklahai', 'hai'),
(9, 'Thanh Hải', 'thanhha', '123'),
(79, 'Đây Hải', 'HaiVan', '123'),
(80, 'Minh Quân', '123', '123'),
(81, 'Hanh Hanh', 'abc123', '123'),
(82, 'Thanh hai', '2222', '111'),
(83, '213 Hehe', '123333', '123'),
(86, 'Nguyen van hai', 'admin1121', 'admin'),
(87, 'Nguyen van hai', '11111', '123');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaihd`
--

CREATE TABLE `trangthaihd` (
  `IDTrangThai` int(11) NOT NULL,
  `TenTrangThai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trangthaihd`
--

INSERT INTO `trangthaihd` (`IDTrangThai`, `TenTrangThai`) VALUES
(0, 'Chưa thanh toán'),
(1, 'Đã hủy'),
(2, 'Chờ xác nhận'),
(3, 'Đang xử lý'),
(4, 'Đang Giao'),
(5, 'Đã Giao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`IDHoaDon`,`IDMonAn`),
  ADD KEY `IDHoaDon` (`IDHoaDon`),
  ADD KEY `IDMonAn` (`IDMonAn`);

--
-- Indexes for table `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`IDCuaHang`);

--
-- Indexes for table `danhmucmonan`
--
ALTER TABLE `danhmucmonan`
  ADD PRIMARY KEY (`IDDanhMuc`);

--
-- Indexes for table `hoadondathang`
--
ALTER TABLE `hoadondathang`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `IDKhackHang` (`IDKhackHang`),
  ADD KEY `IDNVGH` (`IDNVGH`),
  ADD KEY `IDTrangThai` (`IDTrangThai`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKhachHang`),
  ADD UNIQUE KEY `TenDangNhapUniQue` (`TenDangNhap`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`IDMonAn`),
  ADD KEY `IDCuaHang` (`IDCuaHang`),
  ADD KEY `IDDanhMuc` (`IDDanhMuc`);

--
-- Indexes for table `nvgiaohang`
--
ALTER TABLE `nvgiaohang`
  ADD PRIMARY KEY (`IDNVGH`);

--
-- Indexes for table `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`IDAdmin`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`);

--
-- Indexes for table `trangthaihd`
--
ALTER TABLE `trangthaihd`
  ADD PRIMARY KEY (`IDTrangThai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `IDCuaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `danhmucmonan`
--
ALTER TABLE `danhmucmonan`
  MODIFY `IDDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hoadondathang`
--
ALTER TABLE `hoadondathang`
  MODIFY `IDHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `IDMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nvgiaohang`
--
ALTER TABLE `nvgiaohang`
  MODIFY `IDNVGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `IDAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `trangthaihd`
--
ALTER TABLE `trangthaihd`
  MODIFY `IDTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadondathang` (`IDHoaDon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`IDMonAn`) REFERENCES `monan` (`IDMonAn`);

--
-- Constraints for table `hoadondathang`
--
ALTER TABLE `hoadondathang`
  ADD CONSTRAINT `hoadondathang_ibfk_1` FOREIGN KEY (`IDKhackHang`) REFERENCES `khachhang` (`IDKhachHang`),
  ADD CONSTRAINT `hoadondathang_ibfk_2` FOREIGN KEY (`IDNVGH`) REFERENCES `nvgiaohang` (`IDNVGH`),
  ADD CONSTRAINT `hoadondathang_ibfk_3` FOREIGN KEY (`IDTrangThai`) REFERENCES `trangthaihd` (`IDTrangThai`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`IDCuaHang`) REFERENCES `cuahang` (`IDCuaHang`),
  ADD CONSTRAINT `monan_ibfk_2` FOREIGN KEY (`IDDanhMuc`) REFERENCES `danhmucmonan` (`IDDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
