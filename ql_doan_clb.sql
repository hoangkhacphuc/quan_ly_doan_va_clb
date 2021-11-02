-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2021 lúc 02:05 PM
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
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chidoan`
--

CREATE TABLE `chidoan` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `LienChiDoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienchidoan`
--

CREATE TABLE `lienchidoan` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'This is thông báo 1', 0),
(2, 'This is thông báo 2', 0),
(4, 'This is thông báo 4', 0),
(5, 'This is thông báo 5', 1),
(6, 'This is thông báo 6', 1),
(7, 'This is thông báo 7', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Content` varchar(5000) DEFAULT NULL,
  `Author` int(11) DEFAULT NULL,
  `Posting` date DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `Hide` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Privacy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Email` varchar(45) NOT NULL,
  `DOB` varchar(45) NOT NULL,
  `Sex` int(11) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Language` varchar(150) DEFAULT NULL,
  `DateJoinUnion` date NOT NULL,
  `AddressJoinUnion` varchar(150) NOT NULL,
  `DateJoinParty` date DEFAULT NULL,
  `AddressJoinParty` varchar(150) DEFAULT NULL,
  `ChiDoan` int(11) DEFAULT NULL,
  `Grade` int(11) NOT NULL,
  `Award` varchar(150) DEFAULT NULL,
  `Punishment` varchar(150) DEFAULT NULL,
  `Notification` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `chidoan`
--
ALTER TABLE `chidoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `club`
--
ALTER TABLE `club`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lienchidoan`
--
ALTER TABLE `lienchidoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chidoan`
--
ALTER TABLE `chidoan`
  ADD CONSTRAINT `chidoan_ibfk_1` FOREIGN KEY (`LienChiDoan`) REFERENCES `lienchidoan` (`ID`);

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
