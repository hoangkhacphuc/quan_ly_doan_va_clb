-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_doan_clb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `User` varchar(30) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Position` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`User`, `Pass`, `ID`, `Position`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`ID`, `Image`) VALUES
(1, 'img1.jpg'),
(2, 'img2.jpg'),
(3, 'img3.jpg'),
(4, 'img4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chidoan`
--

CREATE TABLE `chidoan` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `LienChiDoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chidoan`
--

INSERT INTO `chidoan` (`ID`, `Name`, `LienChiDoan`) VALUES
(50, 'K13 CNTT VJ', 5),
(56, 'K13-KTCĐT', 15),
(57, 'K14-CĐT', 15),
(58, 'K14-CNSH', 16),
(59, 'K14-KTHH', 16),
(60, 'K11-KHMT', 5),
(61, 'K12-KHMT', 5),
(62, 'K13-CNTT', 5),
(63, 'K14-CNTT1', 5),
(64, 'K14-CNTT2', 5),
(65, 'K14-CNTT3', 5),
(66, 'K14-CNTT4', 5),
(67, 'K14-CNTTVJ', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `club`
--

CREATE TABLE `club` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `FoundationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `club`
--

INSERT INTO `club` (`ID`, `Name`, `Avatar`, `FoundationDate`) VALUES
(2, '12', NULL, '0000-00-00'),
(3, 'Doan Thanh Nien', NULL, '0000-00-00'),
(4, '', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `Gift` varchar(10) NOT NULL,
  `ID_event` int(11) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `ID_player` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienchidoan`
--

CREATE TABLE `lienchidoan` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienchidoan`
--

INSERT INTO `lienchidoan` (`ID`, `Name`) VALUES
(5, 'Khoa Công nghệ thông tin'),
(15, 'Khoa Cơ khí - Cơ điện tử'),
(16, 'Khoa Công nghệ SH - HH - MT'),
(17, 'Khoa Điện - Điện tử'),
(18, 'Khoa Điều dưỡng'),
(19, 'Khoa Dược'),
(20, 'Khoa KH-KT Vật liệu'),
(21, 'Khoa Kỹ thuật y học'),
(22, 'Khoa Kinh tế - Kinh doanh'),
(23, 'Khoa Kỹ thuật ô tô và năng lượng'),
(24, 'Khoa Tiếng anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL,
  `Content` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`ID`, `Content`, `Status`) VALUES
(1, 'This is content 1', 0),
(2, 'This is thông báo 2', 1),
(4, 'This is thông báo 4', 1),
(5, 'This is thông báo 5', 0),
(6, 'This is thông báo 6', 1),
(7, 'This is thông báo 7', 1),
(31, 'This is thông báo 8', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`ID`, `Name`) VALUES
(1, 'Super Admin'),
(2, 'Sinh Viên'),
(3, 'Quản Lý Đoàn'),
(4, 'Quản Lý Câu Lạc Bộ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positionactivity`
--

CREATE TABLE `positionactivity` (
  `ID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Grade` int(11) DEFAULT NULL,
  `Expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positionmanagement`
--

CREATE TABLE `positionmanagement` (
  `ID` int(11) DEFAULT NULL,
  `Position` int(11) NOT NULL,
  `chidoan` int(11) NOT NULL,
  `lienchidoan` int(11) NOT NULL,
  `club` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(10000) DEFAULT NULL,
  `Author` int(11) DEFAULT NULL COMMENT 'Tác giả',
  `Posting` date DEFAULT NULL COMMENT 'Ngày đăng',
  `Type` int(11) DEFAULT NULL,
  `Hide` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Position` varchar(20) DEFAULT '0,0,0' COMMENT 'Điểm chức vụ',
  `MaxPlayer` varchar(30) DEFAULT '0,0,0',
  `SelectPosition` varchar(10) DEFAULT '0,0,0' COMMENT 'Checkbox'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`ID`, `Title`, `Content`, `Author`, `Posting`, `Type`, `Hide`, `Image`, `Position`, `MaxPlayer`, `SelectPosition`) VALUES
(22, 'Đây là tiêu đề', '<p>rtneuertu</p>\n', 1, '2021-11-26', 0, 1, 'Image/Upload/erhukqtorcbiolfpmhlg.jpg', '0|0|0', '0|0|0', '0|0|0'),
(23, 'Đây là tiêu đề  123', '<p>c2v12ubmbb<img src=\"http://localhost:8080/Image/Upload/lgjkfoeksoklqfhbcejt.png\" style=\"height:225px; width:466px\" /></p>\n', 1, '2021-11-27', 1, 0, 'Image/Upload/ajocbkdjiaadqaomsgsk.jpg', '1|0|0', '10|0|0', '1|0|0'),
(24, 'Đây là tiêu đề  123', '<p>c2v12ubmbb<img src=\"http://localhost:8080/Image/Upload/lgjkfoeksoklqfhbcejt.png\" style=\"height:225px; width:466px\" /></p>\n', 1, '2021-11-27', 1, 0, 'Image/Upload/prmhfbshtidbmiraphsn.jpg', '1|0|0', '10|0|0', '1|0|0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `StudentID` varchar(30) NOT NULL,
  `Avatar` varchar(100) NOT NULL,
  `PhoneNumber` varchar(12) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` int(2) NOT NULL COMMENT '0 : Nam\r\n1 : Nữ',
  `Address` varchar(150) NOT NULL,
  `Language` varchar(150) DEFAULT '',
  `DateJoinUnion` date NOT NULL,
  `AddressJoinUnion` varchar(150) NOT NULL,
  `DateJoinParty` date DEFAULT NULL,
  `AddressJoinParty` varchar(300) DEFAULT '',
  `ChiDoan` int(11) NOT NULL,
  `Grade` int(11) DEFAULT 0 COMMENT 'Điểm',
  `Award` varchar(300) DEFAULT '' COMMENT 'Khen thưởng',
  `Punishment` varchar(300) DEFAULT '' COMMENT 'Kỷ luật',
  `Notification` varchar(10) NOT NULL,
  `DOJ` date NOT NULL COMMENT 'Ngày đăng ký'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`ID`, `Name`, `StudentID`, `Avatar`, `PhoneNumber`, `Email`, `DOB`, `Sex`, `Address`, `Language`, `DateJoinUnion`, `AddressJoinUnion`, `DateJoinParty`, `AddressJoinParty`, `ChiDoan`, `Grade`, `Award`, `Punishment`, `Notification`, `DOJ`) VALUES
(1, 'Hoàng Khắc Phúc', '19010066', '1.jpg', '0563014144', 'nhockenxx2@gmail.com', '2001-02-24', 0, 'Kim Sơn-Ninh Bình', NULL, '2021-11-12', 'Trường THPT Kim Sơn B', '2021-11-13', '', 50, 0, '', '', '', '2021-11-13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`User`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Position` (`Position`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chidoan`
--
ALTER TABLE `chidoan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LienChiDoan` (`LienChiDoan`);

--
-- Chỉ mục cho bảng `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`Gift`),
  ADD KEY `ID_player` (`ID_player`),
  ADD KEY `ID_event` (`ID_event`);

--
-- Chỉ mục cho bảng `lienchidoan`
--
ALTER TABLE `lienchidoan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `positionactivity`
--
ALTER TABLE `positionactivity`
  ADD KEY `ID` (`ID`);

--
-- Chỉ mục cho bảng `positionmanagement`
--
ALTER TABLE `positionmanagement`
  ADD KEY `ID` (`ID`),
  ADD KEY `Position` (`Position`),
  ADD KEY `chidoan` (`chidoan`),
  ADD KEY `lienchidoan` (`lienchidoan`),
  ADD KEY `club` (`club`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Author` (`Author`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ChiDoan` (`ChiDoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chidoan`
--
ALTER TABLE `chidoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `club`
--
ALTER TABLE `club`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lienchidoan`
--
ALTER TABLE `lienchidoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `student` (`ID`);

--
-- Các ràng buộc cho bảng `chidoan`
--
ALTER TABLE `chidoan`
  ADD CONSTRAINT `chidoan_ibfk_1` FOREIGN KEY (`LienChiDoan`) REFERENCES `lienchidoan` (`ID`);

--
-- Các ràng buộc cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD CONSTRAINT `giftcode_ibfk_1` FOREIGN KEY (`ID_player`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `giftcode_ibfk_2` FOREIGN KEY (`ID_event`) REFERENCES `post` (`ID`);

--
-- Các ràng buộc cho bảng `positionactivity`
--
ALTER TABLE `positionactivity`
  ADD CONSTRAINT `positionactivity_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `post` (`ID`);

--
-- Các ràng buộc cho bảng `positionmanagement`
--
ALTER TABLE `positionmanagement`
  ADD CONSTRAINT `positionmanagement_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `positionmanagement_ibfk_2` FOREIGN KEY (`Position`) REFERENCES `position` (`ID`),
  ADD CONSTRAINT `positionmanagement_ibfk_3` FOREIGN KEY (`chidoan`) REFERENCES `chidoan` (`ID`),
  ADD CONSTRAINT `positionmanagement_ibfk_4` FOREIGN KEY (`lienchidoan`) REFERENCES `lienchidoan` (`ID`),
  ADD CONSTRAINT `positionmanagement_ibfk_5` FOREIGN KEY (`club`) REFERENCES `club` (`ID`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `student` (`ID`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ChiDoan`) REFERENCES `chidoan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
