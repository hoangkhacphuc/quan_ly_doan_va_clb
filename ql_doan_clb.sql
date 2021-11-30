-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 11:19 AM
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
('123123', '4297f44b13955235245b2497399d7a93', 4, 2),
('19010067', 'c2f593e8c08a0148c2e5efdb34ff72d4', 2, 3),
('19010068', '467c8e0020d634efb0787af342a7d153', 3, 4),
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
-- Cấu trúc bảng cho bảng `event_member`
--

CREATE TABLE `event_member` (
  `Member` int(11) NOT NULL,
  `Position` int(11) DEFAULT NULL,
  `Posts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Title` varchar(400) NOT NULL,
  `Content` mediumtext DEFAULT NULL,
  `Author` int(11) DEFAULT NULL COMMENT 'Tác giả',
  `Posting` date DEFAULT NULL COMMENT 'Ngày đăng',
  `Type` int(11) DEFAULT NULL,
  `Hide` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Position` varchar(20) DEFAULT '0,0,0' COMMENT 'Điểm chức vụ',
  `MaxPlayer` varchar(30) DEFAULT '0,0,0',
  `SelectPosition` varchar(10) DEFAULT '0,0,0' COMMENT 'Checkbox',
  `Start` date DEFAULT NULL COMMENT 'Ngày bắt đầu',
  `End` date DEFAULT NULL COMMENT 'Ngày kết thúc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`ID`, `Title`, `Content`, `Author`, `Posting`, `Type`, `Hide`, `Image`, `Position`, `MaxPlayer`, `SelectPosition`, `Start`, `End`) VALUES
(25, 'Trường Đại học Phenikaa khai giảng năm học 2021-2022 và Kỷ niệm ngày Nhà giáo Việt Nam 20/11', '<p><strong><em>&ldquo;Đại dịch Covid 19 đ&atilde; ảnh hưởng nặng nề đến mọi lĩnh vực của đời sống x&atilde; hội, thầy hiểu rằng, để đến với giảng đường đại học h&ocirc;m nay, c&aacute;c em đ&atilde; phải nỗ lực vượt qua rất nhiều gian nan, thử th&aacute;ch. Kỳ cuối cấp vừa rồi, c&aacute;c em đ&atilde; phải học tập, thi cử trong điều kiện kh&oacute; khăn, nhưng c&aacute;c em đ&atilde; l&agrave; người chiến thắng&rdquo; &ndash; GS.TS Phạm Th&agrave;nh Huy - Hiệu trưởng Trường Đại học Phenikaa nhắn gửi tới c&aacute;c t&acirc;n sinh vi&ecirc;n K15 trong lễ khai giảng.</em></strong></p>\n\n<p>S&aacute;ng nay (19/11/2021), Trường Đại học Phenikaa long trọng tổ chức Lễ khai giảng năm học 2021-2022 v&agrave; Kỷ niệm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam. Do ảnh hưởng của dịch covid 19, buổi Lễ được tổ chức dưới hai h&igrave;nh thức trực tiếp v&agrave; trực tuyến.</p>\n\n<p>Buổi Lễ c&oacute; sự hiện của TS. Hồ Xu&acirc;n Năng &ndash; Chủ tịch HĐQT Tập đo&agrave;n Phenikaa, Chủ tịch Hội đồng Trường Đại học Phenikaa c&ugrave;ng c&aacute;c l&atilde;nh đạo của Tập đo&agrave;n; GS.TS Phạm Th&agrave;nh Huy &ndash; B&iacute; thư Đảng uỷ, Hiệu trưởng Trường Đại học Phenikaa c&ugrave;ng c&aacute;c thầy c&ocirc; trong Ban Gi&aacute;m hiệu; PSG.TS Phương Đ&igrave;nh T&acirc;m &ndash; Chủ tịch C&ocirc;ng đo&agrave;n Trường v&agrave; c&aacute;c thầy c&ocirc; trong Ban chấp h&agrave;nh C&ocirc;ng đo&agrave;n Trường; c&ugrave;ng l&atilde;nh đạo c&aacute;c Khoa, Ph&ograve;ng, Ban, Trung t&acirc;m; c&aacute;c thầy c&ocirc; nguy&ecirc;n l&agrave; l&atilde;nh đạo Trường c&ugrave;ng nhiều thế hệ c&aacute;n bộ, giảng vi&ecirc;n v&agrave; sinh vi&ecirc;n của Trường.</p>\n\n<p><img alt=\"Chủ tịch Hội đồng Trường TS. Hồ Xuân Năng phát biểu tại buổi Lễ\" src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khai-giang01.jpg\" /></p>\n\n<p>Thay mặt Ban Gi&aacute;m hiệu, GS.TS Phạm Th&agrave;nh Huy gửi lời ch&uacute;c mừng tới gần 3.500 t&acirc;n sinh vi&ecirc;n đ&atilde; ch&iacute;nh thức gia nhập đại gia đ&igrave;nh Phenikaa: &ldquo;Năm học đầu ti&ecirc;n của ngưỡng cửa đại học đ&atilde; bắt đầu, thầy chắc rằng, c&aacute;c em đều cảm thấy học đại học c&oacute; nhiều sự kh&aacute;c biệt, m&ocirc;i trường học tập đ&ograve;i hỏi c&aacute;c em cần c&oacute; sự chủ động hơn, tự học hơn; ch&iacute;nh v&igrave; vậy, c&aacute;c em cần c&oacute; sự c&acirc;n bằng, ph&acirc;n bổ thời gian học tập, giải tr&iacute;, r&egrave;n luyện thể thao một c&aacute;ch hợp l&yacute;. Trường Đại học Phenikaa kh&ocirc;ng chỉ l&agrave; nơi để c&aacute;c em học tập c&aacute;c kiến thức v&agrave; kỹ năng nghề nghiệp m&agrave; c&ograve;n l&agrave; nơi để c&aacute;c em r&egrave;n luyện thể thao, văn ho&aacute; l&agrave;m việc, văn ho&aacute; ứng xử nhằm ph&aacute;t triển nh&acirc;n c&aacute;ch một c&aacute;ch tốt nhất&rdquo;.</p>\n\n<p>Trong diễn văn khai giảng, GS.TS Phạm Th&agrave;nh Huy đ&atilde; điểm lại những kết quả nổi bật của Trường trong 2021. Thầy nhấn mạnh: D&ugrave; gặp nhiều kh&oacute; khăn do ảnh hưởng dịch bệnh, nhưng trong năm học vừa qua, Trường Đại học Phenikaa đ&atilde; đạt được nhiều th&agrave;nh t&iacute;ch đ&aacute;ng kh&iacute;ch lệ trong tất cả c&aacute;c mặt hoạt động: gi&aacute;o dục, nghi&ecirc;n cứu khoa học, đổi mới s&aacute;ng tạo, hợp t&aacute;c quốc tế... Đ&acirc;y l&agrave; năm học m&agrave; nhiều sinh vi&ecirc;n của Trường đ&atilde; tham gia v&agrave; đạt nhiều giải thưởng trong c&aacute;c kỳ thi Olympic sinh vi&ecirc;n như Vật l&yacute;, Tin học, sinh vi&ecirc;n NCKH&hellip; Top 1 c&aacute;c trường đại học v&agrave; Viện nghi&ecirc;n cứu Việt Nam trong Bảng xếp hạng Nature Index; Top 4 c&aacute;c trường đại học ở Việt Nam trong Bảng xếp hạng THE Impact Rankings. Chất lượng sinh vi&ecirc;n đầu v&agrave;o tiếp tục được n&acirc;ng cao với điểm trung b&igrave;nh tr&uacute;ng tuyển l&agrave; 23,5; số c&aacute;c em tr&uacute;ng tuyển với điểm từ 24 trở l&ecirc;n l&agrave; 36%. Thủ khoa của Trường năm n&agrave;y c&oacute; điểm rất cao 29 điểm.</p>\n\n<p><img alt=\"Thủ khoa Vương Thị Hồng Hà nhận phần thưởng từ TS. Hồ Xuân Năng và GS.TS Phạm Thành Huy\" src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/vvt6726.jpg\" /></p>\n\n<p>Lễ khai giảng năm nay c&agrave;ng &yacute; nghĩa khi được tổ chức đ&uacute;ng dịp kỷ niệm 39 năm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20/11. Những kết quả đạt được ch&iacute;nh l&agrave; m&oacute;n qu&agrave; &yacute; nghĩa, lời tri &acirc;n đến c&aacute;c thế hệ c&aacute;n bộ, giảng vi&ecirc;n của Nh&agrave; trường.</p>\n\n<p>Ph&aacute;t biểu tại buổi lễ, TS. Hồ Xu&acirc;n Năng ghi nhận, đ&aacute;nh gi&aacute; cao v&agrave; ch&uacute;c mừng sự nỗ lực phấn đấu m&agrave; tập thể c&aacute;n bộ giảng vi&ecirc;n, sinh vi&ecirc;n Trường Đại học Phenikaa đ&atilde; đạt được. Chủ tịch cho biết: Trước khi năm học 2021-2022 bắt đầu, Trường ch&uacute;ng ta đ&atilde; k&iacute;ch hoạt nhiều nhiệm vụ nằm trong chiến lược ph&aacute;t triển d&agrave;i hạn của Trường, đ&oacute; l&agrave; c&aacute;c dự &aacute;n: T&aacute;i cấu tr&uacute;c Trường th&agrave;nh Đại học Phenikaa, Dự &aacute;n tiểu đ&ocirc; thị đại học th&ocirc;ng minh trong khu&ocirc;n vi&ecirc;n Trường, Dự &aacute;n đại học th&ocirc;ng minh Phenikaa. Tất cả c&aacute;c dự &aacute;n n&agrave;y y&ecirc;u cầu nguồn lực rất lớn cả về t&agrave;i ch&iacute;nh, con người, sự ủng hộ v&agrave; nỗ lực của mỗi th&agrave;nh vi&ecirc;n Phenikaa.</p>\n\n<p><img alt=\"TS. Hồ Xuân Năng và GS.TS Phạm Thành Huy trao phần thưởng cho tân sinh viên có thành tích xuất sắc\" src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khai-giang03.jpg\" /></p>\n\n<p>Nhắn gửi đến c&aacute;c em t&acirc;n sinh vi&ecirc;n, Chủ tịch mong rằng, c&aacute;c em h&atilde;y trở th&agrave;nh cầu nối để c&oacute; được thật nhiều học sinh giỏi chọn Trường Đại học Phenikaa l&agrave; địa chỉ, tạo bệ ph&oacute;ng cho m&igrave;nh. C&aacute;c em h&atilde;y thực sự chủ động v&agrave; nghi&ecirc;m t&uacute;c, say m&ecirc; học tập, nghi&ecirc;n cứu khoa học v&agrave; r&egrave;n luyện, lu&ocirc;n lu&ocirc;n phản biện lại ch&iacute;nh m&igrave;nh để hiểu được thực sự tiềm năng của m&igrave;nh, từ đ&oacute; ph&aacute;t huy v&agrave; trở th&agrave;nh c&ocirc;ng d&acirc;n to&agrave;n cầu.</p>\n\n<p>Thay mặt cho gần 3.500 sinh vi&ecirc;n K15, Vương Thị Hồng H&agrave; &ndash;&nbsp; thủ khoa của Trường chia sẻ: &ldquo;Trở th&agrave;nh sinh vi&ecirc;n l&agrave; bước ngoặt lớn trong cuộc đời của mỗi ch&uacute;ng em. Em hiểu rằng, trong hơn 3.500 t&acirc;n sinh vi&ecirc;n ch&uacute;ng em h&ocirc;m nay c&oacute; nhiều bạn đến với Phenikaa bằng sự BẢN LĨNH v&agrave; cả TỰ TIN, nhưng sau tất cả, ng&agrave;y h&ocirc;m nay ch&uacute;ng em đ&atilde; ch&iacute;nh thức trở th&agrave;nh một phần của Phenikaa &ndash; một trường ĐH rất mới tr&ecirc;n bản đồ gi&aacute;o dục Việt Nam.</p>\n\n<p>Bước v&agrave;o giảng đường đại học, được tiếp cận với một phương thức đ&agrave;o tạo mới, từ đ&acirc;y ch&uacute;ng em sẽ phải học tập ho&agrave;n to&agrave;n kh&aacute;c với bậc học phổ th&ocirc;ng. Tuy vẫn c&ograve;n sự d&igrave;u dắt của thầy c&ocirc; v&agrave; c&aacute;c anh chị kh&oacute;a trước nhưng ch&uacute;ng em phải thực sự phải thể hiện t&iacute;nh độc lập, tự lực c&aacute;nh sinh trong to&agrave;n bộ qu&aacute; tr&igrave;nh l&agrave;m việc. Giống như th&ocirc;ng điệp h&agrave;nh động &ldquo;hiện thực ho&aacute; tiềm năng&rdquo; của trường Đại học Phenikaa, ch&uacute;ng em tin rằng đ&acirc;y ch&iacute;nh l&agrave; nền tảng th&uacute;c đẩy v&agrave; ph&aacute;t triển những ước mơ, ho&agrave;i b&atilde;o của sinh vi&ecirc;n&rdquo;.</p>\n\n<p>Nhằm biểu dương v&agrave; ghi nhận những đ&oacute;ng g&oacute;p của c&aacute;c tập thể v&agrave; c&aacute; nh&acirc;n c&oacute; th&agrave;nh t&iacute;ch xuất sắc trong năm học 2021-2022, Trường Đại học Phenikaa đ&atilde; trao tặng giấy khen cho 9 tập thể đạt th&agrave;nh t&iacute;ch Lao động xuất sắc, 16 tập thể đạt th&agrave;nh t&iacute;ch Lao động ti&ecirc;n tiến, 65 c&aacute; nh&acirc;n đạt danh hiệu Chiến sĩ thi đua cấp cơ sở v&agrave; 178 c&aacute; nh&acirc;n đạt th&agrave;nh t&iacute;ch Lao động ti&ecirc;n tiến.</p>\n\n<p><img alt=\"TS Hồ Xuân Năng và GS.TS Phạm Thành Huy chúc mừng 9 tập thể đạt thành tích Lao động xuất sắc  \" src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khai-giang02.jpg\" /></p>\n\n<p>Cũng trong buổi Lễ, c&aacute;c sinh vi&ecirc;n c&oacute; th&agrave;nh t&iacute;ch xuất sắc K15, sinh vi&ecirc;n xếp loại xuất sắc, giỏi trong năm học 2020-2021, sinh vi&ecirc;n đạt giải trong c&aacute;c cuộc thi sinh vi&ecirc;n nghi&ecirc;n cứu khoa học cấp bộ, c&aacute;c kỳ thi Olympic đ&atilde; nhận giấy khen v&agrave; phần thưởng do Chủ tịch TS. Hồ Xu&acirc;n Năng v&agrave; Ban Gi&aacute;m hiệu trao tặng. &nbsp;</p>\n\n<p>Kết th&uacute;c buổi Lễ, PGS.TS Phạm Th&agrave;nh Huy đ&aacute;nh trống khai giảng năm học mới. Tiếng trống khai trường vang mở ra một năm học mới đầy &yacute; nghĩa. H&atilde;y hứa rằng, ch&uacute;ng ta sẽ cố gắng hết m&igrave;nh để đạt được kết quả cao nhất trong năm học n&agrave;y c&ugrave;ng Trường Đại học Phenikaa.</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/hbnfqcoqehoqrnigljfr.jpg', '10|5|1', '5|20|1', '1|1|1', '2021-11-10', '2021-11-11'),
(26, 'Trường Đại học Phenikaa tham gia Triển lãm Khoa học và Công nghệ TECHFEST Việt Nam 2021', '<p>S&aacute;ng 25/11/2021, tại trụ sở của Cục Th&ocirc;ng tin Khoa học v&agrave; C&ocirc;ng nghệ Quốc gia đ&atilde; diễn ra lễ khai mạc Triển l&atilde;m TECHFEST Việt Nam 2021. Trường Đại học Phenikaa đ&atilde; tham gia trưng b&agrave;y, giới thiệu c&aacute;c sản phẩm Khoa học c&ocirc;ng nghệ của Trường.</p>\n\n<p>TECHFEST Việt Nam 2021 l&agrave; sự kiện thường ni&ecirc;n lớn nhất d&agrave;nh cho cộng đồng khởi nghiệp Đổi mới s&aacute;ng tạo tại Việt Nam, do Bộ Khoa học v&agrave; C&ocirc;ng nghệ chủ tr&igrave;, phối hợp với c&aacute;c Bộ ng&agrave;nh, cơ quan, tổ chức ch&iacute;nh trị - x&atilde; hội. Sự kiện thu h&uacute;t rất đ&ocirc;ng c&aacute;c đơn vị doanh nghiệp, trường đại học, viện nghi&ecirc;n cứu quan t&acirc;m v&agrave; tham gia.<img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khoa-hoc-cong-nghe01.jpg\" /></p>\n\n<p>TECHFEST 2021 với chủ đề &ldquo;Đổi mới s&aacute;ng tạo - Kiến tạo tương lai&rdquo;. Năm 2021, dịch bệnh Covid-19 vẫn tiếp tục diễn biến hết sức phức tạp, con đường khởi nghiệp s&aacute;ng tạo, vốn ch&ocirc;ng gai lại c&agrave;ng th&ecirc;m ch&ocirc;ng gai. Việc đổi mới s&aacute;ng tạo, thay đổi phương thức sinh hoạt, l&agrave;m việc v&agrave; tương t&aacute;c kh&ocirc;ng c&ograve;n l&agrave; lựa chọn, m&agrave; đ&atilde; trở th&agrave;nh bắt buộc. TECHFEST năm nay hướng tới th&uacute;c đẩy giải ph&aacute;p c&ocirc;ng nghệ của doanh nghiệp khởi nghiệp s&aacute;ng tạo, nền tảng đổi mới s&aacute;ng tạo &ldquo;mở&rdquo; trong giải quyết vấn đề của x&atilde; hội trong bối cảnh Covid-19 v&agrave; phục hồi nền kinh tế hậu Covid-19. Đ&acirc;y thời điểm startup cần nắm bắt cơ hội mới vươn l&ecirc;n, để &ldquo;kiến tạo tương lai&rdquo; th&ocirc;ng qua s&aacute;ng kiến c&ocirc;ng nghệ. Đồng thời, lấy sức mạnh tr&iacute; tuệ của con người, sự đổi mới s&aacute;ng tạo l&agrave;m trung t&acirc;m ph&aacute;t huy kết hợp với sức mạnh đại đo&agrave;n kết d&acirc;n tộc.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khoa-hoc-cong-nghe03.jpg\" /></p>\n\n<p>Đến với triển l&atilde;m năm nay, Trường Đại học Phenikaa giới thiệu 09 sản phẩm thuộc nh&oacute;m Điện - Điện tử v&agrave; ứng dụng AI gồm c&aacute;c sản phẩm: Hệ thống gi&aacute;m s&aacute;t hoạt động của người sử dụng cảm biến gia tốc ba trục; Ứng dụng hỗ trợ an to&agrave;n giao th&ocirc;ng cho người đi &ocirc; t&ocirc; trong điều kiện giao th&ocirc;ng tại Việt Nam; Hệ thống AI hỗ trợ nhận dạng đa h&agrave;nh động đa đối tượng; v&agrave; Nh&oacute;m sản phẩm ứng dụng c&ocirc;ng nghệ sinh học gồm c&aacute;c sản phẩm: PU-Bacil (Hỗn dịch lợi khuẩn đa chủng); Nấm Cordyceps militaris; PU-Waxycorn; PU-Taq &hellip;</p>\n', 1, '2021-11-29', 0, 1, 'Image/Upload/fcbfaqmpqgsklsrleekl.jpg', '0|0|0', '0|0|0', '0|0|0', NULL, NULL),
(27, 'Trường Đại học Phenikaa tham dự “Diễn đàn các Hiệu trưởng của Mạng lưới ATU-NET”', '<p><strong>Trong hai ng&agrave;y 22-23/11/2021, PGS.TS Nguyễn Ph&uacute; Kh&aacute;nh - Ph&oacute; Hiệu trưởng Trường Đại học Phenikaa đ&atilde; tham dự sự kiện &ldquo;Diễn đ&agrave;n c&aacute;c Hiệu trưởng của Mạng lưới ATU-Net&rdquo; (ATU-Net University Presidents Forum).</strong></p>\n\n<p>Đ&acirc;y l&agrave; sự kiện được tổ chức thường ni&ecirc;n với sự tham gia của l&atilde;nh đạo c&aacute;c trường đại học th&agrave;nh vi&ecirc;n, c&aacute;c đối t&aacute;c quốc tế của Mạng lưới ATU-Net, c&aacute;c b&ecirc;n li&ecirc;n quan đến gi&aacute;o dục đại học bao gồm cả sinh vi&ecirc;n trong khu vực ch&acirc;u &Aacute; v&agrave; tr&ecirc;n thế giới.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/hop-tac01.jpg\" /></p>\n\n<p>Do đại dịch Covid-19 vẫn diễn biến phức tạp n&ecirc;n sự kiện năm nay được tổ chức trực tuyến tr&ecirc;n nền tảng Zoom v&agrave; ph&aacute;t trực tiếp tr&ecirc;n Facebook. Sự kiện do Đại học C&ocirc;ng nghệ Malaysia (Universiti Teknologi Malaysia &ndash; UTM) chủ tr&igrave; với sự tham dự của gần 200 đại biểu l&agrave; c&aacute;c Hiệu trưởng, Ph&oacute; Hiệu trưởng c&aacute;c trường đại học th&agrave;nh vi&ecirc;n của Mạng lưới ATU-Net như: Shibaura Institute of Technology (Nhật Bản), King Mongkut&rsquo;s University of Technology Thonburi (Th&aacute;i Lan) v&agrave; c&aacute;c trường Đại học th&agrave;nh vi&ecirc;n của Mạng lưới cũng như c&aacute;c trường Đại học quốc tế, Đại sứ Li&ecirc;n minh ch&acirc;u &Acirc;u tại Malaysia, đại diện c&aacute;c tổ chức gi&aacute;o dục: Global Engineering Education Exchange, Malaysia-France University Centre, bộ phận hợp t&aacute;c quốc tế, giảng vi&ecirc;n v&agrave; sinh vi&ecirc;n của c&aacute;c trường đại học&hellip;</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/hop-tac02.png\" /></p>\n\n<p>Với chủ đề&nbsp;<strong><em>Brave New World of Higher Education: Realities and Vision</em></strong>,<strong>&nbsp;</strong>trong hai ng&agrave;y diễn ra sự kiện,<strong>&nbsp;</strong>c&aacute;c đại biểu đ&atilde; nghe 06 b&agrave;i tr&igrave;nh b&agrave;y v&agrave; tham gia<strong>&nbsp;</strong>thảo luận về gi&aacute;o dục đại học trong bối cảnh Covid-19, chứng kiến lễ trao giải cho đội v&ocirc; địch cuộc thi ATU-Net Hackathon 2021 v&agrave; vinh danh c&aacute;c chương tr&igrave;nh ti&ecirc;u biểu của Mạng lưới ATU-Net trong năm 2021. Đặc biệt, trong ng&agrave;y thứ hai của sự kiện đ&atilde; diễn ra hoạt động&nbsp;<strong><em>Tri &acirc;n c&aacute;c trường đại học th&agrave;nh vi&ecirc;n của Mạng lưới ATU-Net</em></strong>&nbsp;với phần chiếu phim về th&ocirc;ng điệp của đại diện c&aacute;c trường đại học th&agrave;nh vi&ecirc;n v&agrave; chụp ảnh tập thể.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/hop-tac03.jpg\" /></p>\n\n<p>Thay mặt Ban Gi&aacute;m hiệu Trường Đại học Phenikaa, PGS.TS. Nguyễn Ph&uacute; Kh&aacute;nh đ&atilde; gửi đến sự kiện th&ocirc;ng điệp của Trường Đại học Phenikaa: Trường Đại học Phenikaa hiện l&agrave; th&agrave;nh vi&ecirc;n đầu ti&ecirc;n v&agrave; duy nhất của Việt Nam tham gia Mạng lưới ATU-Net. Trong năm 2021, c&aacute;n bộ, giảng vi&ecirc;n, sinh vi&ecirc;n của Trường đ&atilde; t&iacute;ch cực tham gia v&agrave;o nhiều hoạt động của Mạng lưới như ATU-Net International Staff Week, ATU-Net Young Researcher Grant v&agrave; Virtual Asia Exploration batch 2. C&aacute;c hoạt động đ&atilde; g&oacute;p phần n&acirc;ng cao năng lực của c&aacute;c c&aacute;n bộ, giảng vi&ecirc;n, mở mang kiến thức v&agrave; tăng cường trải nghiệm quốc tế cho c&aacute;c bạn sinh vi&ecirc;n của Trường.</p>\n\n<p>Trường Đại học Phenikaa sẽ tiếp tục tham gia t&iacute;ch cực v&agrave; đ&oacute;ng g&oacute;p hiệu quả v&agrave;o c&aacute;c hoạt động chung của Mạng lưới ATU-Net trong thời gian tới.</p>\n', 1, '2021-11-29', 0, 1, 'Image/Upload/qtmfecrnneojscurlbrq.png', '0|0|0', '0|0|0', '0|0|0', NULL, NULL),
(28, 'Khởi động Dự án “Tam giác hướng nghiệp hiệu quả”', '<p><strong>Nhằm gi&uacute;p học sinh c&oacute; cơ hội kh&aacute;m ph&aacute; v&agrave; ph&aacute;t triển năng lực bản th&acirc;n, cũng như tiếp cận những kiến thức khoa học mới v&agrave; định hướng sớm nghề nghiệp tương lai, Trường Đại học Phenikaa đ&atilde; ch&iacute;nh thức khởi động Dự &aacute;n &ldquo;Tam gi&aacute;c hướng nghiệp hiệu quả&rdquo; v&agrave;o s&aacute;ng ng&agrave;y 24/11/2021. Chương tr&igrave;nh được tổ chức trực tiếp tại Phenikaa, đồng thời cả trực tuyến tr&ecirc;n nền tảng zoom.</strong></p>\n\n<p>Mở đầu buổi lễ, GS Phạm Th&agrave;nh Huy &ndash; Hiệu trưởng Trường Đại học Phenikaa chia sẻ, việc x&aacute;c định đ&uacute;ng hướng đi, chọn đ&uacute;ng nghề sẽ lu&ocirc;n l&agrave; khởi đầu đẹp, gi&uacute;p c&aacute;c em học sinh nhanh ch&oacute;ng tiến đến những g&igrave; m&agrave; m&igrave;nh đ&atilde; dự định từ trước đ&oacute;. Nhưng chọn nghề theo sở th&iacute;ch l&agrave; chưa đủ. Việc chọn nghề ph&ugrave; hợp với t&iacute;nh c&aacute;ch v&agrave; năng lực, nhu cầu thị trường cũng rất quan trọng. Bởi lẽ, nếu c&aacute;c em chọn sai nghề, tương lai sẽ bị lệch hướng rất xa. &nbsp;</p>\n\n<p>Trước bối cảnh đ&oacute;, Trường Đại học Phenikaa phối kết hợp với Mạng lưới Gi&aacute;o dục kh&ocirc;ng bi&ecirc;n giới x&acirc;y dựng dự &aacute;n&nbsp;<strong>&ldquo;Tam gi&aacute;c hướng nghiệp hiệu quả&rdquo;&nbsp;</strong>với mục ti&ecirc;u kết nối c&aacute;c trường THPT với trường đại học - doanh nghiệp để tăng cường hoạt động trải nghiệm, hướng nghiệp v&agrave; n&acirc;ng cao năng lực cho học sinh phổ th&ocirc;ng.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/kichoffduan/pka-03.JPG\" /></p>\n\n<p>Thầy Hiệu trưởng cũng nhấn mạnh, Trường Đại học Phenikaa tự h&agrave;o c&oacute; đội ngũ nh&agrave; khoa học, giảng vi&ecirc;n xuất sắc c&ugrave;ng với hệ thống trang thiết bị phục vụ cho học tập v&agrave; nghi&ecirc;n cứu đồng bộ, hiện đại. Do vậy, khi tham gia Dự &aacute;n, c&aacute;c nh&oacute;m nghi&ecirc;n cứu v&agrave; thực h&agrave;nh sẽ được l&agrave;m việc trực tiếp với thầy c&ocirc; trường THPT c&ugrave;ng c&aacute;c nh&agrave; khoa học, giảng vi&ecirc;n v&agrave; sinh vi&ecirc;n Trường Đại học Phenikaa.</p>\n\n<p>Trong khu&ocirc;n khổ chương tr&igrave;nh, Hội thảo &ldquo;C&ocirc;ng nghệ xoay chuyển thế giới nghề nghiệp&rdquo; đ&atilde; diễn ra với sự chia sẻ của ba diễn giả: TS L&ecirc; Anh Sơn &ndash; Gi&aacute;m đốc C&ocirc;ng ty CP Phenikaa X, Ph&oacute; Viện trưởng Viện Đ&agrave;o tạo Sau đại học Trường Đại học Phenikaa; TS Ho&agrave;ng Hưng Hải &ndash; Gi&aacute;m đốc sản phẩm Qualcomm Việt Nam v&agrave; ThS B&ugrave;i Th&aacute;i Học &ndash; Ph&oacute; Hiệu trưởng Trường THPT Chuy&ecirc;n L&ecirc; Hồng Phong (Nam Định).</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/kichoffduan/kickoffda-064.jpg\" /></p>\n\n<p>Hội thảo tập trung l&agrave;m s&aacute;ng tỏ vai tr&ograve;, ảnh hưởng của c&ocirc;ng nghệ cao tới những thay đổi trong thế giới nghề nghiệp. Đồng thời, trước những thay đổi đ&oacute; của thế giới nghề nghiệp, c&aacute;c nh&agrave; gi&aacute;o dục hiện nay cần chuẩn bị g&igrave; cho những học sinh trong 5 năm, 10 năm, 15 năm tới khi c&aacute;c em trưởng th&agrave;nh v&agrave; bước ch&acirc;n v&agrave;o thế giới nghề nghiệp.</p>\n\n<p>Trong Hội thảo, Ph&oacute; Hiệu trưởng Trường THPT Chuy&ecirc;n L&ecirc; Hồng Phong đ&atilde; giới thiệu chương tr&igrave;nh định hướng nghề nghiệp của Trường. Đ&acirc;y l&agrave; một chuỗi c&aacute;c hoạt động định hướng ng&agrave;nh &ndash; nghề hướng đến to&agrave;n thể học sinh nh&agrave; trường, với mục đ&iacute;ch mang đến cho c&aacute;c em những th&ocirc;ng tin nghề nghiệp chuẩn x&aacute;c, tư vấn ng&agrave;nh &ndash; nghề đ&uacute;ng đắn v&agrave; linh hoạt; đặc biệt h&igrave;nh th&agrave;nh khả năng tự chủ trong việc lựa chọn trường học, ng&agrave;nh học v&agrave; nghề nghiệp của học sinh tr&ecirc;n cơ sở hiểu biết to&agrave;n diện, đ&uacute;ng đắn về năng lực, sở trưởng của bản th&acirc;n cũng như nhu cầu của thị trường lao động trong hiện tại v&agrave; tương lai.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/kichoffduan/kickoffda-108.jpg\" /></p>\n\n<p>Với mục ti&ecirc;u 100% học sinh trong nh&agrave; trường được tư vấn hướng nghiệp to&agrave;n diện, Ban Tư vấn gi&aacute;o dục hướng nghiệp trường THPT chuy&ecirc;n L&ecirc; Hồng Phong đ&atilde; phối kết hợp c&ugrave;ng Quỹ LHP Talent, Ban Tư vấn t&acirc;m l&iacute; học đường, Ban Truyền th&ocirc;ng, Đo&agrave;n trường v&agrave; c&aacute;c C&acirc;u lạc bộ, Hội đồng chuy&ecirc;n m&ocirc;n của nh&agrave; trường, c&aacute;c trường Đại học, hội thảo du học v&agrave; to&agrave;n thể phụ huynh học sinh&hellip; v&agrave; đề ra chuỗi c&aacute;c hoạt động bổ &iacute;ch xuy&ecirc;n suốt trong năm học 2021 &ndash; 2022.</p>\n\n<p>C&aacute;c diễn giả đ&atilde; nhận được sự quan t&acirc;m của nhiều trường THPT trong vấn đề định hướng nghề nghiệp sớm cho học sinh.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/kichoffduan/kickoffda-128.jpg\" /></p>\n\n<p>Cũng trong chương tr&igrave;nh, c&aacute;c kh&aacute;ch mời, diễn giả v&agrave; đại diện trường THPT đ&atilde; c&oacute; buổi tham quan cơ sở vật chất c&ugrave;ng c&aacute;c ph&ograve;ng th&iacute; nghiệm của Trường Đại học Phenikaa.</p>\n\n<p>Dự &aacute;n &ldquo;Tam gi&aacute;c hướng nghiệp hiệu quả&rdquo; c&oacute; mục ti&ecirc;u l&agrave; hiện thực h&oacute;a cam kết kết nối những nh&agrave; quản l&yacute; gi&aacute;o dục c&ugrave;ng ph&aacute;t triển v&agrave; đ&oacute;ng g&oacute;p cho đổi mới gi&aacute;o dục về tăng cường hoạt động trải nghiệm, hướng nghiệp v&agrave; n&acirc;ng cao năng lực cho học sinh phổ th&ocirc;ng.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/kichoffduan/kickoffda-129.jpg\" /></p>\n\n<p>Phạm vi triển khai: Giai đoạn 1 (2021&ndash;2022) gồm: 11 trường THPT &ndash; Miền Bắc, Trường ĐH Phenikaa v&agrave; 2 doanh nghiệp, Nghi&ecirc;n cứu. Dự &aacute;n cũng sẽ x&acirc;y dựng m&ocirc; h&igrave;nh v&agrave; quy tr&igrave;nh hướng dẫn để c&oacute; thể nh&acirc;n rộng dự &aacute;n cho 25 trường phổ th&ocirc;ng, 5 trường đại học tr&ecirc;n to&agrave;n quốc giai đoạn 2 (năm học 2022 &ndash; 2023); đồng thời hướng đến kết nối những nh&agrave; quản l&yacute; gi&aacute;o dục c&ugrave;ng học hỏi, chia sẻ kinh nghiệm v&agrave; tạo n&ecirc;n những gi&aacute; trị thiết thực cho c&aacute;c trường th&agrave;nh vi&ecirc;n cũng như cộng đồng gi&aacute;o dục.</p>\n', 1, '2021-11-29', 0, 1, 'Image/Upload/qsiijgaorjojjlpgpggu.jpg', '0|0|0', '0|0|0', '0|0|0', NULL, NULL),
(29, 'Lễ ký kết hợp tác chiến lược xây dựng tiểu đô thị đại học thông minh đầu tiên tại Việt Nam', '<p><strong><em>S&aacute;ng nay (23/11/2021), đ</em></strong><strong><em>ược sự uỷ quyền của Trường đại học Phenikaa,&nbsp;</em></strong><strong><em>CTCP Phenikaa-X (đơn vị th&agrave;nh vi&ecirc;n của Trường đại học Phenikaa), Viettel Networks v&agrave; Qualcomm đ&atilde; k&yacute; kết thỏa thuận hợp t&aacute;c chiến lược, ch&iacute;nh thức triển khai dự &aacute;n x&acirc;y dựng tiểu đ&ocirc; thị đại học th&ocirc;ng minh đầu ti&ecirc;n tại Việt Nam tr&ecirc;n khu&ocirc;n&nbsp;</em></strong><strong><em>vi&ecirc;n</em></strong><strong><em>&nbsp;</em></strong><strong><em>của Trường Đại học Phenikaa. Dự &aacute;n sẽ th&uacute;c đẩy ph&aacute;t triển đ&ocirc; thị th&ocirc;ng minh tại Việt Nam theo chiến lược đến năm 2030 của Ch&iacute;nh phủ, đ&oacute;ng g&oacute;p v&agrave;o lĩnh vực ph&aacute;t triển c&aacute;c ứng dụng cho đ&ocirc; thị th&ocirc;ng minh của thế giới.</em></strong></p>\n\n<p>Dự &aacute;n Tiểu đ&ocirc; thị đại học th&ocirc;ng minh Phenikaa được thử nghiệm triển khai với sự hợp t&aacute;c s&acirc;u rộng của 3 b&ecirc;n theo tiến tr&igrave;nh nhiều giai đoạn. Với hạ tầng nền tảng v&agrave; trang thiết bị ti&ecirc;n tiến tr&ecirc;n, dự &aacute;n sẽ đưa khu&ocirc;n vi&ecirc;n trường Đại học Phenikaa trở th&agrave;nh tiểu đ&ocirc; thị th&ocirc;ng minh, s&aacute;ng tạo đầu ti&ecirc;n tại Việt Nam với nhiều sản phẩm c&ocirc;ng nghệ 4.0 như bản đồ số, xe tự h&agrave;nh, robot th&ocirc;ng minh, camera, thiết bị bay (drones), thiết bị thực tế ảo (XR/VR), thiết bị sử dụng tr&iacute; tuệ nh&acirc;n tạo (AI),&hellip; Nhờ đ&oacute;, c&aacute;c hoạt động của trường Đại học Phenikaa sẽ được chuyển đổi l&ecirc;n c&aacute;c nền tảng số, thay đổi to&agrave;n diện c&ocirc;ng t&aacute;c quản trị, vận h&agrave;nh cơ sở vật chất.&nbsp;</p>\n\n<p>Trong Dự &aacute;n n&agrave;y, Trường đại học Phenikaa v&agrave; Phenikaa-X sẽ cung cấp c&aacute;c sản phẩm c&ocirc;ng nghệ hoạt động dựa tr&ecirc;n tr&iacute; tuệ nh&acirc;n tạo (AI) như bản đồ số, xe tự h&agrave;nh, robot th&ocirc;ng minh cũng như c&aacute;c giải ph&aacute;p hỗ trợ quản l&yacute;, vận h&agrave;nh cơ sở vật chất như trường học, t&ograve;a nh&agrave;, bệnh viện, thư viện, giao th&ocirc;ng th&ocirc;ng minh, khu đỗ xe...</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/qualcomm03.JPG\" /></p>\n\n<p>Viettel Networks sẽ triển khai hạ tầng kết nối 5G v&agrave; t&iacute;nh to&aacute;n tại bi&ecirc;n (Mobile Edge Computing), Qualcomm cung cấp chip v&agrave; c&aacute;c module kết nối với mạng 5G. Mạng 5G sẽ phủ s&oacute;ng to&agrave;n bộ khu&ocirc;n vi&ecirc;n trường Đại học Phenikaa tr&ecirc;n cả hai băng tần l&agrave; 2600MHz v&agrave; mmWave, cho ph&eacute;p người d&ugrave;ng c&oacute; thể truy cập Internet với tốc độ đường truyền l&ecirc;n đến tr&ecirc;n 1Gbps. Như vậy, sau khi thử nghiệm th&agrave;nh c&ocirc;ng tại Viettel Innovation Lab v&agrave;o th&aacute;ng 8/2021, Đại học Phenikaa sẽ l&agrave; nơi thực tế đầu ti&ecirc;n tại Việt Nam v&agrave; Đ&ocirc;ng Nam &Aacute; triển khai mạng 5G đồng thời tr&ecirc;n cả hai băng tần 2600MHz v&agrave; mmWave 26GHz.</p>\n\n<p>Ngo&agrave;i ra, Viettel Networks v&agrave; Qualcomm sẽ hỗ trợ Phenikaa-X trong c&ocirc;ng t&aacute;c R&amp;D để nghi&ecirc;n cứu, thử nghiệm c&aacute;c sản phẩm mới, th&uacute;c đẩy sự ph&aacute;t triển của dự &aacute;n x&acirc;y dựng c&aacute;c giải ph&aacute;p, ứng dụng đ&ocirc; thị th&ocirc;ng minh &ldquo;Make-in-Vietnam&rdquo; trong tương lai.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/qualcomm02.JPG\" /></p>\n\n<p>Hạ tầng triển khai dự &aacute;n - khu&ocirc;n vi&ecirc;n Đại học Phenikaa &ndash; tọa lạc tại phường Y&ecirc;n Nghĩa, quận H&agrave; Đ&ocirc;ng với diện t&iacute;ch 14ha. Đại học Phenikaa hiện l&agrave; một trong những trường đại học c&oacute; cơ sở vật chất hiện đại nhất Thủ đ&ocirc; H&agrave; Nội, với hệ thống ph&ograve;ng học đa phương tiện, ph&ograve;ng thực h&agrave;nh/th&iacute; nghiệm hiện đại, kh&ocirc;ng gian học ngo&agrave;i trời truyền cảm hứng, k&yacute; t&uacute;c x&aacute; đầy đủ tiện &iacute;ch, khu thể thao phức hợp, nh&agrave; thi đấu đa năng..., đặc biệt ph&ugrave; hợp để ph&aacute;t triển tiểu đ&ocirc; thị th&ocirc;ng minh theo y&ecirc;u cầu của dự &aacute;n. Việc ph&aacute;t triển dự &aacute;n tại Đại học Phenikaa cũng tạo điều kiện cho c&aacute;c startup thử nghiệm những c&ocirc;ng nghệ mới nhất, sinh vi&ecirc;n c&oacute; khả năng thực h&agrave;nh c&aacute;c thiết bị truyền dẫn tốc độ cao, qua đ&oacute; thu h&uacute;t nh&acirc;n t&agrave;i v&agrave; đ&agrave;o tạo nh&acirc;n t&agrave;i cho tương lai.</p>\n\n<p>Chia sẻ về Dự &aacute;n, &ocirc;ng Hồ Xu&acirc;n Năng, Chủ tịch Hội đồng trường ki&ecirc;m Tổng Gi&aacute;m đốc Trường Đại học Phenikaa cho biết:&nbsp;<em>&ldquo;Dự &aacute;n Tiểu đ&ocirc; thị đại học th&ocirc;ng minh Phenikaa tiếp tục khẳng định chiến lược đổi mới s&aacute;ng tạo v&agrave; t&iacute;nh hiệu quả của Tập đo&agrave;n Phenikaa</em><em>&nbsp;v&agrave; Trường đại học Phenikaa</em><em>&nbsp;trong lĩnh vực c&ocirc;ng nghệ, hướng tới thực hiện h&oacute;a mục ti&ecirc;u đưa Phenikaa trở th&agrave;nh trung t&acirc;m c&ocirc;ng nghệ đổi mới s&aacute;ng tạo h&agrave;ng đầu tại Đ&ocirc;ng Nam &Aacute;. Th&ocirc;ng qua nền tảng 5G v&agrave; c&aacute;c ứng dụng c&ocirc;ng nghệ hiện đại, ch&uacute;ng t&ocirc;i tin rằng dự &aacute;n sẽ tạo ra một lực đẩy mạnh mẽ cho Việt Nam, g&oacute;p phần kiến tạo cuộc sống chất lượng cao cho cộng đồng, cũng như th&uacute;c đẩy sự ph&aacute;t triển của nền kinh tế số tại Việt Nam</em>&rdquo;.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/qualcomm04.JPG\" /></p>\n\n<p>Ph&aacute;t biểu tại sự kiện, &Ocirc;ng L&ecirc; B&aacute; T&acirc;n, Ph&oacute; Tổng Gi&aacute;m đốc Viettel Networks khẳng định:&nbsp;<em>&ldquo;Viettel x&aacute;c định 5G l&agrave; một trong những c&ocirc;ng nghệ then chốt để x&acirc;y dựng hạ tầng số tại Việt Nam. Hiện nay, ch&uacute;ng t&ocirc;i đ&atilde; sẵn s&agrave;ng về mặt giải ph&aacute;p kỹ thuật cho mạng 5G v&agrave; cam kết sẽ mang đến một hạ tầng 5G vượt trội cho dự &aacute;n hợp t&aacute;c lần n&agrave;y. Đ&acirc;y sẽ l&agrave; m&ocirc;i trường tốt nhất để kiểm chứng v&agrave; ph&aacute;t huy lợi thế, hiệu quả của mạng 5G Viettel qua những ứng dụng thực tế trong cuộc sống. Ch&uacute;ng t&ocirc;i kỳ vọng m&ocirc; h&igrave;nh tiểu đ&ocirc; thị th&ocirc;ng minh Phenikaa sẽ lan tỏa ra nhiều tổ chức, địa phương kh&aacute;c ở Việt Nam g&oacute;p phần th&uacute;c đẩy chiến lược chuyển đổi số quốc gia&rdquo;.</em></p>\n\n<p>&Ocirc;ng Thiều Phương Nam, Tổng gi&aacute;m đốc Qualcomm tại Việt Nam, Campuchia v&agrave; Myanmar, cho biết: &ldquo;<em>Ch&uacute;ng t&ocirc;i vui mừng khi l&agrave; một th&agrave;nh vi&ecirc;n của dự &aacute;n Tiểu đ&ocirc; thị đại học th&ocirc;ng minh Phenikaa với mục ti&ecirc;u thể hiện được tầm quan trọng của c&ocirc;ng nghệ 5G v&agrave; c&aacute;c t&aacute;c động của c&ocirc;ng nghệ n&agrave;y đến cuộc sống của mỗi người d&acirc;n Việt Nam. C&ocirc;ng nghệ n&agrave;y sẽ l&agrave; nền tảng gi&uacute;p Việt Nam ph&aacute;t triển c&aacute;c giải ph&aacute;p, sản phẩm c&ocirc;ng nghệ nhằm hỗ trợ người d&acirc;n c&oacute; một cuộc sống tiện &iacute;ch v&agrave; th&ocirc;ng minh hơn</em>&rdquo;.</p>\n\n<p>&nbsp;</p>\n', 1, '2021-11-29', 0, 1, 'Image/Upload/hiuffgpdgippnfgamuhq.jpg', '0|0|0', '0|0|0', '0|0|0', NULL, NULL),
(30, 'Chương trình chào tân sinh viên và Kỷ niệm 3 năm thành lập Khoa Khoa Công nghệ Sinh học, Hoá học và Kỹ thuật môi trường', '<p><strong><em>Ng&agrave;y 18/11/2021, Khoa C&ocirc;ng nghệ Sinh học, H&oacute;a học v&agrave; Kỹ thuật m&ocirc;i trường (CNSH, HH&amp;KTMT) tổ chức Lễ kỷ niệm 3 năm th&agrave;nh lập (19/11/2018 &ndash; 19/11/2021) v&agrave; chương tr&igrave;nh ch&agrave;o t&acirc;n học vi&ecirc;n v&agrave; sinh vi&ecirc;n của Khoa mang t&ecirc;n &ldquo;NHIỆT 2021&rdquo; theo h&igrave;nh thức trực tuyến tr&ecirc;n nền tảng zoom.</em></strong></p>\n\n<p>Tham dự buổi lễ c&oacute; sự hiện diện của GS.TS Phạm Th&agrave;nh Huy &ndash; B&iacute; thư Đảng ủy, Hiệu trưởng Trường Đại học Phenikaa; TS Phạm Anh Tuấn &ndash; Ph&oacute; Tổng Gi&aacute;m đốc Tập đo&agrave;n Phenikaa, Th&agrave;nh vi&ecirc;n Hội đồng trường, giảng vi&ecirc;n Khoa CNSH, HH&amp;KTMT; TS Đ&agrave;o Văn Dương &ndash; Trưởng Khoa c&ugrave;ng tập thể giảng vi&ecirc;n, c&aacute;n bộ, học vi&ecirc;n v&agrave; sinh vi&ecirc;n của Khoa.</p>\n\n<p>Trở th&agrave;nh t&acirc;n sinh vi&ecirc;n, mở c&aacute;nh cửa v&agrave;o giảng đường đại học l&agrave; ước mơ của nhiều bạn trẻ nhưng sau c&aacute;nh cửa ấy, c&aacute;c bạn t&acirc;n sinh vi&ecirc;n sẽ bước v&agrave;o một m&ocirc;i trường ho&agrave;n to&agrave;n mới với nhiều băn khoăn, lo lắng khi c&aacute;c bạn phải rời xa gia đ&igrave;nh v&agrave; người th&acirc;n. Hiểu điều đ&oacute;, Khoa CNSH, HH&amp;KTMT, Trường Đại học Phenikaa đ&atilde; tổ chức chương tr&igrave;nh Ch&agrave;o đ&oacute;n t&acirc;n sinh vi&ecirc;n K15 mang t&ecirc;n &ldquo;NHIỆT&rdquo; nhằm gi&uacute;p c&aacute;c t&acirc;n sinh vi&ecirc;n l&agrave;m quen với m&ocirc;i trường học tập ở bậc đại học v&agrave; t&igrave;m hiểu về Trường v&agrave; Khoa. Đ&acirc;y cũng l&agrave; cơ hội để c&aacute;c t&acirc;n sinh vi&ecirc;n gặp gỡ, trao đổi với c&aacute;c thầy c&ocirc; v&agrave; c&aacute;c bạn về chương tr&igrave;nh m&agrave; m&igrave;nh sẽ theo học.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khoa-hoa01.png\" /></p>\n\n<p>Ph&aacute;t biểu tại biểu lễ, TS. Đ&agrave;o Văn Dương đ&atilde; &ocirc;n lại qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển của Khoa. Đến nay, Khoa c&oacute; 31 c&aacute;n bộ, giảng vi&ecirc;n, trong đ&oacute; c&oacute; 01 Gi&aacute;o sư. TSKH. NGND. AHLĐ, 03 Ph&oacute; Gi&aacute;o sư v&agrave; tr&ecirc;n 90% giảng vi&ecirc;n c&oacute; tr&igrave;nh độ Tiến sĩ tốt nghiệp từ c&aacute;c cở sở đ&agrave;o tạo trong v&agrave; nước ngo&agrave;i.</p>\n\n<p>Khoa đang đảm nhận nhiệm vụ đ&agrave;o tạo tr&igrave;nh độ Thạc sĩ v&agrave; Tiến sĩ chuy&ecirc;n ng&agrave;nh Kỹ thuật H&oacute;a học; đ&agrave;o tạo 03 chuy&ecirc;n ng&agrave;nh bậc đại học: C&ocirc;ng nghệ Sinh học, Kỹ thuật H&oacute;a học v&agrave; Khoa học M&ocirc;i trường.</p>\n\n<p>Về nghi&ecirc;n cứu khoa học, Khoa đ&atilde; c&ocirc;ng bố hơn 90 b&agrave;i b&aacute;o tr&ecirc;n c&aacute;c tạp ch&iacute; uy t&iacute;n, đ&atilde; v&agrave; đang thực hiện gần 20 đề t&agrave;i cấp cơ sở, được t&agrave;i trợ bởi NAFOSTED, Nghị định thư cũng như c&aacute;c quỹ quốc tế như USAID, GCRF. Sinh vi&ecirc;n c&oacute; cơ hội được học tập, trải nghiệm thực tế doanh nghiệp v&agrave; nghi&ecirc;n cứu ngay từ năm thứ nhất. B&ecirc;n cạnh đ&oacute;, c&aacute;n bộ v&agrave; sinh vi&ecirc;n Khoa cũng tham gia c&aacute;c dự &aacute;n cộng đồng như sản xuất gel s&aacute;t khuẩn tay PKA-CHE1 hỗ trợ v&ugrave;ng dịch, chiến dịch l&agrave;m sạch biển do tổ chức Green trip ph&aacute;t động, &hellip;.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khoa-hoa02.png\" /></p>\n\n<p>Thay mặt l&atilde;nh đạo Trường, GS.TS. Phạm Th&agrave;nh Huy đ&atilde; gửi lời ch&agrave;o mừng nồng nhiệt tới c&aacute;c em t&acirc;n sinh vi&ecirc;n K15 Khoa CNSH-HH-KTMT n&oacute;i chung v&agrave; Trường Đại học Phenikaa n&oacute;i chung. Hiệu trưởng mong rằng, Trường Đại học Phenikaa sẽ l&agrave; nơi gi&uacute;p c&aacute;c em học tập, trải nghiệm v&agrave; sống những năm th&aacute;ng tươi đẹp nhất của tuổi trẻ. Đồng thời, Thầy căn dặn: C&aacute;c em h&atilde;y học hỏi v&agrave; phấn đấu kh&ocirc;ng ngừng nghỉ, s&aacute;ng tạo v&agrave; trải nghiệm những điều mới mẻ của cuộc sống sinh vi&ecirc;n. C&aacute;c em h&atilde;y vẽ thật nhiều những gam m&agrave;u tươi s&aacute;ng, trong trẻo cho bức tranh tuổi thanh xu&acirc;n tươi đẹp của m&igrave;nh tại ng&ocirc;i Trường Đại học Phenikaa.</p>\n\n<p>Trong chương tr&igrave;nh ch&agrave;o t&acirc;n học vi&ecirc;n v&agrave; sinh vi&ecirc;n K15, TS. Vũ Ngọc Phan &ndash; Ph&oacute; trưởng Khoa CNSH, HH&amp;KTMT đ&atilde; chia sẻ th&ocirc;ng tin v&agrave; kế hoạch ph&aacute;t triển c&ocirc;ng t&aacute;c sinh vi&ecirc;n Khoa. C&aacute;c bạn sinh vi&ecirc;n c&oacute; cơ hội ph&aacute;t triển c&aacute;c kỹ năng mềm, trải nghiệm thực tế v&agrave; r&egrave;n luyện trong nghi&ecirc;n cứu khoa học.</p>\n\n<p>Thay mặt cho c&aacute;c t&acirc;n học vi&ecirc;n v&agrave; sinh vi&ecirc;n, học vi&ecirc;n Phạm Tuấn Anh &ndash; Kỹ thuật Ho&aacute; học K1 v&agrave; sinh vi&ecirc;n Ngọc Huyền &ndash; C&ocirc;ng nghệ sinh học K15 gửi lời ch&uacute;c mừng đến c&aacute;c Thầy, c&ocirc; gi&aacute;o nh&acirc;n ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20/11 v&agrave; chia sẻ cảm x&uacute;c khi được học tập v&agrave; l&agrave;m việc tại Khoa.</p>\n\n<p><img src=\"https://phenikaa-uni.edu.vn:3600/pu/vi/thomvt/thang11/khoa-hoa04.png\" /></p>\n\n<p>Bước ch&acirc;n v&agrave;o một m&ocirc;i trường ho&agrave;n to&agrave;n mới kh&aacute;c xa với m&ocirc;i trường phổ th&ocirc;ng l&agrave; điều kh&ocirc;ng kh&ocirc;ng thể tr&aacute;nh khỏi bỡ ngỡ đối với mỗi t&acirc;n sinh vi&ecirc;n. Bởi vậy, c&aacute;c vị kh&aacute;ch mời đặc biệt của chương tr&igrave;nh đ&atilde; giải đ&aacute;p những thắc mắc v&agrave; băn khoăn của t&acirc;n sinh vi&ecirc;n.</p>\n\n<p>Kết th&uacute;c chương tr&igrave;nh l&agrave; phần giao lưu văn nghệ v&agrave; mini game tương t&aacute;c giữa c&aacute;c th&agrave;nh vi&ecirc;n tham dự v&agrave; kh&aacute;n giả xem livestream. D&ugrave; được tổ chức trực tuyến tr&ecirc;n nền tảng zoom nhưng chương tr&igrave;nh NHIỆT 2021 đ&atilde; diễn ra ấm &aacute;p v&agrave; nhiều cảm x&uacute;c. Chương tr&igrave;nh đ&atilde; diễn ra th&agrave;nh c&ocirc;ng tốt đẹp với sự hứng khởi của c&aacute;c bạn t&acirc;n sinh vi&ecirc;n khi đ&atilde; được trang bị kiến thức cho bản th&acirc;n để bước v&agrave;o một năm học mới.</p>\n', 1, '2021-11-29', 0, 1, 'Image/Upload/aasphggsaukflgtfqdgs.png', '0|0|0', '0|0|0', '0|0|0', NULL, NULL),
(31, 'Minigame “Đi làm có gì vui?”', '<p>Thực hiện c&ocirc;ng t&aacute;c C&ocirc;ng đo&agrave;n Trường năm học 2020-2021 v&agrave; kỷ niệm 39 năm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20/11, C&ocirc;ng đo&agrave;n trường Đại học Phenikaa tổ chức&nbsp;Minigame&nbsp;<strong>&ldquo;Đi l&agrave;m c&oacute; g&igrave; vui?&rdquo;</strong>&nbsp;với nội dung cụ thể như sau:</p>\n\n<p><strong>I. MỤC Đ&Iacute;CH CUỘC THI</strong></p>\n\n<p>Hoạt động<strong>&nbsp;</strong>được tổ chức với mục đ&iacute;ch lưu giữ v&agrave; chia sẻ những h&igrave;nh ảnh của đo&agrave;n vi&ecirc;n c&ocirc;ng đo&agrave;n thuộc C&ocirc;ng đo&agrave;n trường ĐH Phenikaa trong hoạt động h&agrave;ng ng&agrave;y, trong lao động, trong sinh hoạt tập thể. Cuộc thi hướng tới tinh thần đo&agrave;n kết, gắn b&oacute;, sẻ chia của c&aacute;c đồng nghiệp trong Ng&ocirc;i nh&agrave; chung Phenikaa Uni v&agrave; lan tỏa tinh thần l&agrave;m việc vui tươi, t&iacute;ch cực trong tập thể.</p>\n\n<p><strong>II. NỘI DUNG THỰC HIỆN</strong></p>\n\n<p><strong>1. Đối tượng tham gia</strong></p>\n\n<p>Đối tượng tham gia cuộc thi l&agrave; đo&agrave;n vi&ecirc;n C&ocirc;ng đo&agrave;n thuộc C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa.</p>\n\n<p><strong>2. Nội dung dự thi</strong></p>\n\n<p>&nbsp;- Dự thi viết status ngắn với nội dung l&iacute; giải cho c&acirc;u hỏi &ldquo;Đi l&agrave;m c&oacute; g&igrave; vui?&rdquo; kh&ocirc;ng qu&aacute; 40 từ (Tiếng Việt) đạt nhiều lượt tương t&aacute;c nhất tr&ecirc;n Fanpage C&ocirc;ng đo&agrave;n Trường ĐH Phenikaa (thả biểu tượng cảm x&uacute;c: like, thả tim, thương thương, haha,&hellip;).</p>\n\n<p>- Nội dung dự thi kh&ocirc;ng hợp lệ nếu vi phạm c&aacute;c ti&ecirc;u chuẩn về đạo đức, văn h&oacute;a Phenikaa v&agrave; sử dụng c&aacute;c từ ngữ kh&ocirc;ng ph&ugrave; hợp. Ban tổ chức sẽ c&oacute; th&ocirc;ng b&aacute;o chi tiết tới th&iacute; sinh gửi b&agrave;i dự thi.</p>\n\n<p>- Mỗi c&aacute; nh&acirc;n dự thi với tối đa 01 status kh&ocirc;ng qu&aacute; 40 từ.</p>\n\n<p>- Ti&ecirc;u đề email: [Đi l&agrave;m c&oacute; g&igrave; vui] &ndash; Họ v&agrave; t&ecirc;n &ndash; M&atilde; PU</p>\n\n<p>- Nội dung email: Status dự thi</p>\n\n<p><strong>3. Thể lệ:</strong></p>\n\n<p>- Mỗi th&iacute; sinh được dự thi gửi&nbsp;01 t&aacute;c phẩm Status<strong>&nbsp;Đi l&agrave;m c&oacute; g&igrave; vui</strong>. C&aacute;c bức ảnh/video dự thi được BTC đăng tải tr&ecirc;n Fanpage C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa bắt đầu từ ng&agrave;y 10/11/2021 đến 12h ng&agrave;y 16/11/2021. Người dự thi truy cập v&agrave;o Fanpage C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa để tương t&aacute;c với t&aacute;c phẩm dự thi, để tăng tương t&aacute;c với b&agrave;i thi người dự thi c&oacute; thể tag bạn b&egrave; v&agrave;o comment hoặc chia sẻ b&agrave;i viết để b&agrave;i viết tiếp cận được với nhiều bạn b&egrave; (thả biểu tượng cảm x&uacute;c: like, thả tim, thương thương, &hellip;).</p>\n\n<p>- T&aacute;c phẩm dự thi được gửi qua email:&nbsp;<strong>congdoan@phenikaa-uni.edu.vn</strong>.</p>\n\n<p>- C&aacute;c mốc thời gian của Cuộc thi:</p>\n\n<p>+ Th&ocirc;ng b&aacute;o ph&aacute;t động:&nbsp;<strong>01/11/2021</strong></p>\n\n<p>+ Tiếp nhận b&agrave;i dự thi:&nbsp;<strong>Từ 01/11 &ndash; 11h ng&agrave;y16/11/2021</strong></p>\n\n<p>+ Đăng tải b&agrave;i dự thi để t&iacute;nh tương t&aacute;c:&nbsp;<strong>10/11/2021</strong></p>\n\n<p>+ Chốt kết quả tương t&aacute;c của b&agrave;i thi:&nbsp;<strong>21h ng&agrave;y 16/11/2021.</strong></p>\n\n<p>+ Dự kiến c&ocirc;ng bố kết quả v&agrave; trao giải v&agrave;o ng&agrave;y&nbsp;<strong>17/11/2021.</strong></p>\n\n<p><strong>4. Cơ cấu giải thưởng:</strong></p>\n\n<p>Ban Tổ chức cuộc thi sẽ căn cứ tr&ecirc;n số lượng lượt thả biểu tượng cảm x&uacute;c (like, thả tim, thương thương, haha,&hellip;) từ cao đến thấp để trao giải:</p>\n\n<p>- Giải minigame Đi l&agrave;m c&oacute; g&igrave; vui:</p>\n\n<p>+ Giải nhất: 01 giải trị gi&aacute; 1.000.000 đ.</p>\n\n<p>+ Giải nh&igrave;: 01 giải trị gi&aacute; 700.000 đ</p>\n\n<p>+ Giải ba: 01 giải trị gi&aacute; 500.000 đ</p>\n\n<p><strong>5. Ban Tổ chức v&agrave; đơn vị phối hợp:</strong></p>\n\n<p>- Ban Tổ chức: Ban chấp h&agrave;nh C&ocirc;ng đo&agrave;n Trường ĐH Phenikaa</p>\n\n<p>- Đơn vị phối hợp: Ph&ograve;ng Tuyển sinh Truyền th&ocirc;ng hỗ trợ thiết kế c&aacute;c ấn phẩm li&ecirc;n quan tới cuộc thi v&agrave; hỗ trợ truyền th&ocirc;ng cho cuộc thi.</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/iesdnedssjfcfolrlqaj.jpg', '0|0|10', '0|0|100', '0|0|1', '2021-11-17', '2021-12-02'),
(32, 'Lễ kick off Dự án ', '<p>Tiếp theo Hội thảo th&aacute;ng 10 với chủ đề: &ldquo;Tam gi&aacute;c hướng nghiệp hiệu quả: Kết nối c&aacute;c trường phổ th&ocirc;ng - trường đại học/đ&agrave;o tạo nghề - doanh nghiệp&rdquo;, C&acirc;u lạc bộ Mạng lưới Quản l&yacute; Gi&aacute;o dục Việt Nam trực thuộc Hội T&acirc;m l&yacute; - Gi&aacute;o dục Việt Nam (Mạng lưới Quản l&yacute; gi&aacute;o dục) phối hợp với trường Đại học Phenikaa tổ chức hội thảo tiếp theo với chủ đề &ldquo;<strong>C&ocirc;ng nghệ cao xoay chuyển thế giới nghề nghiệp&rdquo;&nbsp;</strong>nhằm hỗ trợ tăng cường kỹ năng hướng nghiệp cho học sinh phổ th&ocirc;ng trong bối cảnh c&aacute;ch mạng C&ocirc;ng nghiệp 4.0. Mạng lưới Quản l&yacute; gi&aacute;o dục tr&acirc;n trọng k&iacute;nh mời đại diện Sở Gi&aacute;o dục v&agrave; Đ&agrave;o tạo tham dự Hội thảo. Th&ocirc;ng tin cụ thể như sau:</p>\n\n<p><strong>1. Thời gian:&nbsp;</strong>08:00 -12:00 ng&agrave;y 24 th&aacute;ng 11 năm 2021</p>\n\n<p><strong>2. Phương thức:&nbsp;</strong>Trực tiếp kết hợp trực tuyến qua Zoom</p>\n\n<p><strong>3. Nội dung Hội thảo:</strong></p>\n\n<ul>\n	<li>Vai tr&ograve;/ảnh hưởng của sự ph&aacute;t triển c&ocirc;ng nghệ cao đối với c&aacute;c định hướng nghề nghiệp, việc l&agrave;m.</li>\n	<li>Gi&aacute;o dục Hướng nghiệp trong trường phổ th&ocirc;ng hướng tới đ&aacute;p ứng được c&aacute;c y&ecirc;u cầu/kỹ năng cần c&oacute; từ doanh nghiệp (đặc biệt c&aacute;c doanh nghiệp, tập đo&agrave;n về c&ocirc;ng nghệ) trong bối cảnh c&aacute;ch mạng C&ocirc;ng nghiệp 4.0.</li>\n	<li>Thực tiễn đổi mới c&ocirc;ng t&aacute;c gi&aacute;o dục trải nghiệm, hướng nghiệp gắn với c&aacute;c lĩnh vực c&ocirc;ng nghệ cao cho học sinh tại trường phổ th&ocirc;ng hiện nay.</li>\n	<li><strong>Đặc biệt trong buổi hội thảo sẽ c&oacute; phần Khởi động Dự &aacute;n Tam gi&aacute;c hướng nghiệp hiệu quả v&agrave; giới thiệu c&aacute;c &yacute; tưởng nghi&ecirc;n cứu thuộc c&aacute;c trường THPT đ&atilde; được ph&ecirc; duyệt tham gia giai đoạn 1 của Dự &aacute;n.</strong></li>\n</ul>\n\n<p><strong>4. Th&agrave;nh phần tham dự</strong></p>\n\n<ul>\n	<li>C&aacute;c nh&agrave; quản l&yacute; gi&aacute;o dục từ c&aacute;c Sở Gi&aacute;o dục v&agrave; Đ&agrave;o tạo tỉnh/th&agrave;nh phố, c&aacute;n bộ quản l&yacute; c&aacute;c trường phổ th&ocirc;ng (Mỗi Sở GDĐT gồm 01 đại diện sở GDĐT v&agrave; 10 Hiệu trưởng/Ph&oacute; Hiệu trưởng trường THPT thuộc Sở GDĐT).</li>\n	<li>C&aacute;c trường đại học, c&aacute;c chuy&ecirc;n gia v&agrave; nh&agrave; chuy&ecirc;n m&ocirc;n trong lĩnh vực gi&aacute;o dục hướng nghiệp.</li>\n	<li>Học sinh v&agrave; gi&aacute;o vi&ecirc;n c&aacute;c nh&oacute;m nghi&ecirc;n cứu tham gia Dự &aacute;n Tam gi&aacute;c hướng nghiệp hiệu quả</li>\n	<li>C&aacute;c th&agrave;nh vi&ecirc;n t&iacute;ch cực của Mạng lưới Quản l&yacute; gi&aacute;o dục.</li>\n</ul>\n\n<p><strong>5. Diễn giả</strong></p>\n\n<ul>\n	<li>TS. Ho&agrave;ng Hải- Gi&aacute;m đốc sản phẩm; Qualcomm Vietnam.</li>\n	<li>TS. L&ecirc; Anh Sơn -&nbsp; Ph&oacute; Viện trưởng Viện Đ&agrave;o tạo Sau Đại học &ndash; Trường Đại học Phenikaa; Gi&aacute;m đốc c&ocirc;ng ty cổ phần PhenikaaX&nbsp;</li>\n	<li>ThS. B&ugrave;i Th&aacute;i Học &ndash; Ph&oacute; Hiệu trưởng Trường THPT Chuy&ecirc;n L&ecirc; Hồng Phong, Nam Định.</li>\n</ul>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/husrfgkldncqnnuctadi.jpg', '0|0|10', '0|0|100', '0|0|1', '2021-11-17', '2021-11-29'),
(33, 'Lễ khai giảng năm học 2021-2022 và Kỷ niệm ngày Nhà giáo Việt Nam 20/11', '<p>Trường Đại học Phenikaa tổ chức Lễ khai giảng năm học 2021-2022 v&agrave; Kỷ niệm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20/11. Buổi lễ sẽ được tổ chức theo hai h&igrave;nh thức trực tiếp tại Trường ĐH Phenikaa (hạn chế số người tham dự) v&agrave; trực tuyến tr&ecirc;n c&aacute;c k&ecirc;nh th&ocirc;ng tin mạng x&atilde; hội ch&iacute;nh thức của Trường v&agrave; nền tảng Ms Team.</p>\n\n<p>K&iacute;nh mời qu&yacute; Thầy C&ocirc; gi&aacute;o, c&aacute;c nh&agrave; khoa học, c&aacute;n bộ, c&aacute;c anh chị học vi&ecirc;n cao học, nghi&ecirc;n cứu sinh, Qu&yacute; phụ huynh v&agrave; c&aacute;c bạn sinh vi&ecirc;n quan t&acirc;m tham dự:&nbsp;</p>\n\n<p>Thời gian: 9h15, Thứ S&aacute;u ng&agrave;y 19/11/2021.</p>\n\n<p>Địa điểm: Ph&ograve;ng 309, Nh&agrave; A2, Trường Đại học Phenikaa</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/ccakhgbcndlghrkcjogh.jpg', '0|0|1', '0|0|1000', '0|0|1', '2021-12-04', '2021-12-04'),
(34, 'Tổ chức Webinar [Phenikaa – Hitachi Vantara Vietnam] Data Science Hướng nghiệp ngành công nghệ thông tin', '<p><strong>1. Mục đ&iacute;ch &ndash; &Yacute; nghĩa</strong></p>\n\n<p>Webinar Hướng nghiệp Data Science ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin nhằm chia sẻ, hướng nghiệp, cung cấp c&aacute;c kiến thức, kinh nghiệm về Data Science, triển vọng ph&aacute;t triển nghề nghiệp, cũng như mang tới cơ hội việc l&agrave;m v&agrave; tuyển dụng tại chỗ cho sinh vi&ecirc;n c&aacute;c ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin;</p>\n\n<p>Tạo s&acirc;n chơi bổ &iacute;ch, &yacute; nghĩa cho sinh vi&ecirc;n khối ng&agrave;nh CNTT;</p>\n\n<p>G&oacute;p phần truyền th&ocirc;ng, quảng b&aacute; h&igrave;nh ảnh Trường Đại học Phenikaa tới c&aacute;c đơn vị trong v&agrave; ngo&agrave;i trường.</p>\n\n<p><strong>2. Thời gian, địa điểm, th&agrave;nh phần tham gia</strong></p>\n\n<ul>\n	<li><strong>Thời gian tổ chức:</strong>&nbsp;Từ 9h20 &ndash; 12h00, thứ Tư, ng&agrave;y 17 th&aacute;ng 11 năm 2021</li>\n	<li><strong>Địa điểm:</strong>&nbsp;Online qua MS Teams.</li>\n	<li><strong>Th&agrave;nh phần tham gia:</strong></li>\n</ul>\n\n<p>- Về ph&iacute;a kh&aacute;ch mời, đối t&aacute;c:</p>\n\n<p>+ Đại diện C&ocirc;ng ty Hitachi Vantara Vietnam;</p>\n\n<p>+ Diễn giả:</p>\n\n<p>Mr. Đặng Minh Dũng - Head of Data Science</p>\n\n<p>Ms. Đinh Vũ Ho&agrave;i My - Senior Consultant</p>\n\n<p>Mr. Đặng Vinh - Senior Consultant</p>\n\n<p>- Về ph&iacute;a Nh&agrave; trường:</p>\n\n<p>+ Đại diện l&atilde;nh đạo Ph&ograve;ng CTSV;</p>\n\n<p>+ Đại diện l&atilde;nh đạo Khoa CNTT;</p>\n\n<p>+ Đại diện Đo&agrave;n Thanh ni&ecirc;n Trường;</p>\n\n<p>+ Sinh vi&ecirc;n ng&agrave;nh CNTT.</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/cuotgtshhiojrnofadji.jpg', '0|0|1', '0|0|1000', '0|0|1', '2021-11-09', '2021-12-02');
INSERT INTO `post` (`ID`, `Title`, `Content`, `Author`, `Posting`, `Type`, `Hide`, `Image`, `Position`, `MaxPlayer`, `SelectPosition`, `Start`, `End`) VALUES
(35, 'Cuộc thi ảnh/video “Đồng nghiệp trong trái tim tôi 2021”', '<p>Thực hiện c&ocirc;ng t&aacute;c C&ocirc;ng đo&agrave;n Trường năm học 2020-2021 v&agrave; kỷ niệm 39 năm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20/11, C&ocirc;ng đo&agrave;n trường Đại học Phenikaa tổ chức cuộc thi ảnh/video &ldquo;<strong>Đồng nghiệp trong tr&aacute;i tim t&ocirc;i 2021</strong>&rdquo;&nbsp;với nội dung cụ thể như sau:</p>\n\n<p><strong>I. MỤC Đ&Iacute;CH CUỘC THI</strong></p>\n\n<p>&nbsp;Hoạt động<strong>&nbsp;</strong>được tổ chức với mục đ&iacute;ch lưu giữ v&agrave; chia sẻ những h&igrave;nh ảnh của đo&agrave;n vi&ecirc;n c&ocirc;ng đo&agrave;n thuộc C&ocirc;ng đo&agrave;n trường ĐH Phenikaa trong hoạt động h&agrave;ng ng&agrave;y, trong lao động, trong sinh hoạt tập thể. Cuộc thi hướng tới tinh thần đo&agrave;n kết, gắn b&oacute;, sẻ chia của c&aacute;c đồng nghiệp trong Ng&ocirc;i nh&agrave; chung Phenikaa Uni v&agrave; lan tỏa tinh thần l&agrave;m việc vui tươi, t&iacute;ch cực trong tập thể.</p>\n\n<p><strong>II. NỘI DUNG THỰC HIỆN</strong></p>\n\n<p><strong>1. Đối tượng tham gia</strong></p>\n\n<p>Đối tượng tham gia cuộc thi l&agrave; đo&agrave;n vi&ecirc;n C&ocirc;ng đo&agrave;n thuộc C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa.</p>\n\n<p><strong>2. Nội dung dự thi</strong></p>\n\n<p>- Nội dung ảnh/video dự thi ghi lại khoảnh khắc đẹp của Đồng nghiệp l&agrave; c&aacute;n bộ, đo&agrave;n vi&ecirc;n C&ocirc;ng đo&agrave;n trong khi l&agrave;m việc, trong sinh hoạt tập thể v&agrave; trong cuộc sống h&agrave;ng ng&agrave;y.</p>\n\n<p>- Ảnh/video được chụp/quay bằng m&aacute;y ảnh hoặc điện thoại th&ocirc;ng minh, c&oacute; chất lượng, c&oacute; độ n&eacute;t cao, c&oacute; t&iacute;nh nghệ thuật, nội dung ph&ugrave; hợp với chủ đề của cuộc thi.</p>\n\n<p>- B&agrave;i dự thi Ảnh/Video dự thi phải l&agrave; ảnh c&oacute; mặt của th&agrave;nh vi&ecirc;n l&agrave; c&aacute;n bộ, đo&agrave;n vi&ecirc;n C&ocirc;ng đo&agrave;n v&agrave; người lao đồng của Phenikaa Uni, c&oacute; thể l&agrave; ảnh chụp đơn, ảnh chụp tập thể, video c&aacute; nh&acirc;n, video tập thể.</p>\n\n<p>- B&agrave;i dự thi k&egrave;m theo nội dung giới thiệu về Đồng nghiệp kh&ocirc;ng qu&aacute; 200 từ, c&oacute; thể viết bằng Tiếng Anh/Tiếng Việt.</p>\n\n<p>- Người dự thi gửi Ảnh/Video đảm bảo về bản quyền h&igrave;nh ảnh/&acirc;m thanh sử dụng cho b&agrave;i thi.</p>\n\n<p>- B&agrave;i dự thi k&egrave;m th&ocirc;ng tin:</p>\n\n<p>+ Ti&ecirc;u đề email: [Đồng nghiệp trong tr&aacute;i tim t&ocirc;i] &ndash; Họ v&agrave; tr&ecirc;n người dự thi &ndash; M&atilde; PU</p>\n\n<p>+ Nội dung email:</p>\n\n<p>- T&ecirc;n người dự thi (k&egrave;m m&atilde; nh&acirc;n sự)</p>\n\n<p>- Số điện thoại</p>\n\n<p>- T&ecirc;n đồng nghiệp trong t&aacute;c phẩm (m&atilde; nh&acirc;n sự/ nếu l&agrave; ảnh tập thể th&igrave; T&ecirc;n tập thể)</p>\n\n<p>- Ảnh/video k&egrave;m nội dung giới thiệu về đồng nghiệp kh&ocirc;ng qu&aacute; 100 từ.</p>\n\n<p>* B&agrave;i dự thi gửi sử dụng email c&aacute; nh&acirc;n trường cấp để gửi, vui l&ograve;ng kh&ocirc;ng gửi từ email đơn vị.</p>\n\n<p><strong>3. Thể lệ:</strong></p>\n\n<p>- Mỗi th&iacute; sinh được dự thi kh&ocirc;ng qu&aacute; 03 t&aacute;c phẩm&nbsp;<strong>Đồng nghiệp trong tr&aacute;i tim t&ocirc;i 2021</strong>. C&aacute;c bức ảnh/video dự thi được BTC đăng tải tr&ecirc;n Fanpage C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa bắt đầu từ ng&agrave;y 10/11/2021 đến 12h ng&agrave;y 16/11/2021. Người dự thi truy cập v&agrave;o Fanpage C&ocirc;ng đo&agrave;n Trường Đại học Phenikaa để tương t&aacute;c với t&aacute;c phẩm dự thi, để tăng tương t&aacute;c với b&agrave;i thi người dự thi c&oacute; thể tag bạn b&egrave; v&agrave;o comment hoặc chia sẻ b&agrave;i viết để b&agrave;i viết tiếp cận được với nhiều bạn b&egrave; (thả biểu tượng cảm x&uacute;c: like, thả tim, thương thương, &hellip;).</p>\n\n<p>- T&aacute;c phẩm dự thi được gửi qua email:&nbsp;<strong>congdoan@phenikaa-uni.edu.vn</strong>.</p>\n\n<p>- C&aacute;c mốc thời gian của Cuộc thi:</p>\n\n<p>+ Th&ocirc;ng b&aacute;o ph&aacute;t động:&nbsp;<strong>01/11/2021</strong></p>\n\n<p>+ Tiếp nhận b&agrave;i dự thi:&nbsp;<strong>Từ 01/11 &ndash; 11h ng&agrave;y16/11/2021</strong></p>\n\n<p>+ Đăng tải b&agrave;i dự thi để t&iacute;nh tương t&aacute;c:&nbsp;<strong>10/11/2021</strong></p>\n\n<p>+ Chốt kết quả tương t&aacute;c của b&agrave;i thi:&nbsp;<strong>21h ng&agrave;y 16/11/2021.</strong></p>\n\n<p>+ Dự kiến c&ocirc;ng bố kết quả v&agrave; trao giải v&agrave;o ng&agrave;y&nbsp;<strong>17/11/2021</strong>.</p>\n\n<p><strong>4. Cơ cấu giải thưởng:</strong></p>\n\n<p>Ban Tổ chức cuộc thi sẽ căn cứ tr&ecirc;n số lượng lượt thả biểu tượng cảm x&uacute;c (like, thả tim, thương thương, haha,&hellip;) từ cao đến thấp để trao giải:</p>\n\n<p>- Giải nhất: 01 giải. Trị gi&aacute;: 5.000.000 vnđ/giải</p>\n\n<p>- Giải nh&igrave;: 03 giải. Trị gi&aacute;: 3.000.000 vnđ/giải</p>\n\n<p>- Giải ba: 05 giải. Trị gi&aacute;: 1.000.000 vnđ/giải</p>\n\n<p>- Giải Khuyến kh&iacute;ch: 05 giải. Trị gi&aacute; 500.000 vnđ/giải</p>\n\n<p>- Giải Ấn tượng do BTC lựa chọn: 01 giải. Trị gi&aacute; 1.000.000 vnđ/giải</p>\n\n<p>- Giải Nh&acirc;n vật được y&ecirc;u mến nhiều nhất (d&agrave;nh cho c&aacute;c nh&acirc;n được nhiều người lựa chọn dự thi nhất): 01 giải Trị gi&aacute; 1.000.000 đ</p>\n\n<p><strong>5. Ban Tổ chức v&agrave; đơn vị phối hợp:</strong></p>\n\n<p>- Ban Tổ chức: Ban chấp h&agrave;nh C&ocirc;ng đo&agrave;n Trường ĐH Phenikaa</p>\n\n<p>- Đơn vị phối hợp: Ph&ograve;ng Tuyển sinh Truyền th&ocirc;ng hỗ trợ thiết kế c&aacute;c ấn phẩm li&ecirc;n quan tới cuộc thi v&agrave; hỗ trợ truyền th&ocirc;ng cho cuộc thi.</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/rsupqtfpcbcrknooqejk.jpg', '0|0|0', '0|0|1000', '0|0|1', '2021-11-24', '2021-12-09'),
(36, 'Hội thảo Xin ý kiến đóng góp về mục tiêu đào tạo, chuẩn đầu ra, khung chương trình đào tạo ngành Y khoa - Trường ĐH Phenikaa', '<p><strong>1. Mục đ&iacute;ch v&agrave; y&ecirc;u cầu.</strong></p>\n\n<ul>\n	<li>Xin &yacute; kiến của c&aacute;c chuy&ecirc;n gia, c&aacute;c nh&agrave; khoa học, đơn vị sử dụng lao động, đơn vị đ&agrave;o tạo v&agrave; người học về mục ti&ecirc;u đ&agrave;o tạo, chuẩn đầu ra, khung chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Y khoa tr&igrave;nh độ đại học nhằm đảm bảo t&iacute;nh chất kh&aacute;ch quan, khoa học, thực tiễn, chất lượng, đ&aacute;p ứng nhu cầu sử dụng lao động của x&atilde; hội.</li>\n	<li>C&aacute;c &yacute; kiến trong hội thảo cần tập trung v&agrave;o từng chuẩn đầu ra đ&aacute;p ứng nhu cầu sử dụng nguồn lao động của doanh nghiệp v&agrave; x&atilde; hội v&agrave; khung CTĐT, khẳng định chất lượng chương tr&igrave;nh đ&agrave;o tạo, x&acirc;y dựng vị thế khoa Y Trường ĐH Phenikaa.</li>\n</ul>\n\n<p><strong>2. Thời gian, địa điểm v&agrave; h&igrave;nh thức tổ chức</strong></p>\n\n<p>Thời gian dự kiến:&nbsp;<strong><em>14h00&nbsp;</em></strong><strong><em>thứ&nbsp;</em></strong><strong><em>4, ng&agrave;y 08 th&aacute;ng 9 năm 202</em></strong><strong><em>1</em></strong>.</p>\n\n<p>H&igrave;nh thức tổ chức hội thảo: Hội thảo ch&iacute;nh thức được tổ chức trực tuyến th&ocirc;ng qua ứng dụng Zoom&nbsp;</p>\n\n<p>Địa điểm: Trường Đại Học Phenikaa- Phường Y&ecirc;n Nghĩa - H&agrave; Đ&ocirc;ng - H&agrave; Nội</p>\n\n<p><strong>3. Th&agrave;nh phần tham gia</strong></p>\n\n<p>Khoảng 40 đại biểu bao gồm:</p>\n\n<ul>\n	<li>Ph&ograve;ng Đ&agrave;o tạo, th&agrave;nh vi&ecirc;n tổ đề &aacute;n x&acirc;y dựng chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Y khoa Trường ĐH Phenikaa;</li>\n	<li>C&aacute;c bệnh viện l&agrave; cơ sở thực h&agrave;nh trong đ&agrave;o tạo ng&agrave;nh Y khoa của Trường v&agrave; c&aacute;c b&ecirc;nh viện kh&aacute;c;</li>\n	<li>Khoa, đơn vị đ&agrave;o tạo đại học v&agrave; sau đại học ng&agrave;nh Y khoa;</li>\n	<li>Giảng vi&ecirc;n, chuy&ecirc;n gia c&aacute;c trường đại học đ&agrave;o tạo ng&agrave;nh Y khoa;</li>\n	<li>Cựu sinh vi&ecirc;n c&aacute;c ng&agrave;nh Y khoa của c&aacute;c Trường.</li>\n</ul>\n\n<p><strong>4. Chương tr&igrave;nh hội thảo</strong></p>\n\n<p>&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td>\n			<p style=\"text-align:center\"><strong>STT</strong></p>\n			</td>\n			<td>\n			<p style=\"text-align:center\"><strong>Thời gian</strong></p>\n			</td>\n			<td>\n			<p style=\"text-align:center\"><strong>Nội dung</strong></p>\n			</td>\n			<td>\n			<p style=\"text-align:center\"><strong>Ghi ch&uacute;</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">1</p>\n			</td>\n			<td>\n			<p>13h30-14h00</p>\n			</td>\n			<td>\n			<p>Đ&oacute;n tiếp đại biểu</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">2</p>\n			</td>\n			<td>\n			<p>14h00 - 14h10</p>\n			</td>\n			<td>\n			<p>Tuy&ecirc;n bố l&yacute; do, giới thiệu đại biểu</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">3</p>\n			</td>\n			<td>\n			<p>14h10 - 14h20</p>\n			</td>\n			<td>\n			<p>Ph&aacute;t biểu khai mạc Hội thảo</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">4</p>\n			</td>\n			<td>\n			<p>14h20-14h35</p>\n			</td>\n			<td>\n			<p>Giới thiệu về Trường Đại học Phenikaa</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">5</p>\n			</td>\n			<td>\n			<p>14h35 &ndash; 14h55</p>\n			</td>\n			<td>\n			<p>- B&aacute;o c&aacute;o t&igrave;nh h&igrave;nh triển khai đề &aacute;n mở ng&agrave;nh Y khoa;</p>\n\n			<p>- Tr&igrave;nh b&agrave;y dự thảo về mục ti&ecirc;u, chuẩn đầu ra v&agrave; chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Y khoa.</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">6</p>\n			</td>\n			<td>\n			<p>14h55 &ndash; 16h50</p>\n			</td>\n			<td>\n			<p>Thảo luận v&agrave; đ&oacute;ng g&oacute;p &yacute; kiến của c&aacute;c đại biểu tham dự Hội thảo</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">7</p>\n			</td>\n			<td>\n			<p>16h50 &ndash; 17h00</p>\n			</td>\n			<td>\n			<p>Ban Tổ chức ph&aacute;t biểu tiếp thu &yacute; kiến g&oacute;p &yacute; của c&aacute;c đại biểu.</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p style=\"text-align:center\">8</p>\n			</td>\n			<td>\n			<p>17h00</p>\n			</td>\n			<td>\n			<p>Bế mạc Hội thảo</p>\n			</td>\n			<td>\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n', 1, '2021-11-30', 1, 1, 'Image/Upload/ophsldcomrocmkcpusob.jpg', '0|0|0', '0|0|0', '0|0|0', '2021-11-17', '2021-11-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `StudentID` varchar(30) NOT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(12) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Sex` int(2) DEFAULT 0 COMMENT '0 : Nam\r\n1 : Nữ',
  `Address` varchar(150) DEFAULT NULL,
  `Language` varchar(150) DEFAULT '',
  `DateJoinUnion` date DEFAULT NULL,
  `AddressJoinUnion` varchar(150) DEFAULT NULL,
  `DateJoinParty` date DEFAULT NULL,
  `AddressJoinParty` varchar(300) DEFAULT '',
  `ChiDoan` int(11) NOT NULL,
  `Grade` int(11) DEFAULT 0 COMMENT 'Điểm',
  `Award` varchar(300) DEFAULT '' COMMENT 'Khen thưởng',
  `Punishment` varchar(300) DEFAULT '' COMMENT 'Kỷ luật',
  `Notification` varchar(10) DEFAULT NULL,
  `DOJ` date NOT NULL COMMENT 'Ngày đăng ký'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`ID`, `Name`, `StudentID`, `Avatar`, `PhoneNumber`, `Email`, `DOB`, `Sex`, `Address`, `Language`, `DateJoinUnion`, `AddressJoinUnion`, `DateJoinParty`, `AddressJoinParty`, `ChiDoan`, `Grade`, `Award`, `Punishment`, `Notification`, `DOJ`) VALUES
(1, 'Hoàng Khắc Phúc', '19010066', '1.jpg', '0563014144', 'nhockenxx2@gmail.com', '2001-02-24', 0, 'Kim Sơn-Ninh Bình', NULL, '2021-11-12', 'Trường THPT Kim Sơn B', '2021-11-13', '', 50, 0, '', '', '', '2021-11-13'),
(2, 'Hoàng Khắc Phúc', '19010067', NULL, NULL, 'phuc.hk19010066@st.phenikaa-uni.edu.vn', '0000-00-00', 0, '', '', '0000-00-00', '', '0000-00-00', '', 50, 0, '', '', NULL, '2021-11-29'),
(3, 'Hoàng Khắc Phúc', '19010068', NULL, NULL, '123@gmail.com', '0000-00-00', 0, '', '', '0000-00-00', '', '0000-00-00', '', 50, 0, '', '', NULL, '2021-11-29'),
(4, 'Phúc', '123123', NULL, NULL, '123213', '0000-00-00', 0, '', '', '0000-00-00', '', '0000-00-00', '', 50, 0, '', '', NULL, '2021-11-29'),
(5, 'Hoàng Khắc Phúc nè', '19010065', NULL, NULL, 'phuc123@gmail.com', '0000-00-00', 0, '', '', '0000-00-00', '', '0000-00-00', '', 50, 0, '', '', NULL, '2021-11-29');

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
-- Chỉ mục cho bảng `event_member`
--
ALTER TABLE `event_member`
  ADD KEY `fk_em_Member` (`Member`),
  ADD KEY `fk_em_Posts` (`Posts`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Các ràng buộc cho bảng `event_member`
--
ALTER TABLE `event_member`
  ADD CONSTRAINT `fk_em_Member` FOREIGN KEY (`Member`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `fk_em_Posts` FOREIGN KEY (`Posts`) REFERENCES `post` (`ID`);

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
