-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 05:54 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `intern`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `name`) VALUES
(5, '--chọn--'),
(7, 'Ba Đình'),
(6, 'Cầu Giấy'),
(8, 'Thanh Xuân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_enterprise`
--

CREATE TABLE `address_enterprise` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address_enterprise`
--

INSERT INTO `address_enterprise` (`id`, `job_id`, `address_id`) VALUES
(6, 240, 6),
(7, 242, 8),
(8, 243, 8),
(9, 244, 7),
(10, 245, 8),
(11, 246, 7),
(12, 247, 8),
(13, 248, 6),
(14, 249, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assigned_table`
--

CREATE TABLE `assigned_table` (
  `organization_request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `assigned_table`
--

INSERT INTO `assigned_table` (`organization_request_id`, `student_id`, `start_date`, `end_date`, `status`, `create_date`) VALUES
(243, 14, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capacity_dictionary`
--

CREATE TABLE `capacity_dictionary` (
  `id` int(11) NOT NULL,
  `ability_name` varchar(20) NOT NULL,
  `aibility_type` varchar(20) NOT NULL,
  `ability_note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `capacity_dictionary`
--

INSERT INTO `capacity_dictionary` (`id`, `ability_name`, `aibility_type`, `ability_note`) VALUES
(2, 'JAVA', 'ngôn ngữ lập trinh', '10'),
(3, 'PHP', 'ngôn ngữ lập trinh', '10'),
(4, 'C++', 'ngôn ngữ lập trinh', '10'),
(7, 'Python', 'ngôn ngữ lập trinh', '10'),
(17, 'Ruby', '', ''),
(18, 'JavaScript', '', ''),
(19, 'C#', '', ''),
(20, 'Mysql', '', ''),
(21, 'SQL Sever', '', ''),
(22, 'Oracle', '', ''),
(23, ' WordPress-', '', ''),
(24, 'Kotlin', '', ''),
(25, 'React', '', ''),
(26, 'AngularJS', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialized` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `specialized`, `created_at`, `end_at`, `user_id`) VALUES
(1, 'Trường Đại Học Khoa Học Tự Nhiên', '\r\n<p>Khoa học máy tính</><p>- Sinh viên năm 4</p>\r\n<p>- Điểm tích luỹ: 2.7</p>\r\n<p>- Hệ chính quy</p>', 0, 0, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `request_id` int(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `student_id`, `request_id`, `content`, `submission_date`) VALUES
(22, 14, 247, 'hi', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `president` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_establish` date DEFAULT NULL,
  `employee_count` int(11) DEFAULT NULL,
  `imageFile` varchar(255) DEFAULT NULL,
  `cover_img` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `gross_revenue` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `enterprise`
--

INSERT INTO `enterprise` (`id`, `username`, `auth_key`, `password_hash`, `president`, `email`, `date_establish`, `employee_count`, `imageFile`, `cover_img`, `description`, `gross_revenue`, `status`, `created_at`, `updated_at`, `address`, `name`) VALUES
(28, 'FPT', 'E8uHnUBexpoVTI2O1bsBBc4uLyeWlhDt', '$2y$13$CdnnjG2MmgcOLckygztkcOQUcqkoAGVo/e8iv12ysYU0vTP6OVq6O', 'Tạ Minh Thao', 'fpt@gmal.com', NULL, 10000, 'fpt.png', 'fpt.jpg', '<p><b>Type</b><span style=\"white-space:pre\">	</span>Subsidiary</p><p><b>Industry</b><span style=\"white-space:pre\">	</span>Information Technology</p><p><b>Founded</b><span style=\"white-space:pre\">	</span>1999; 22 years ago</p><p><b>Headquarters</b><span style=\"white-space:pre\">	</span>Hanoi, Vietnam</p><p><b>Number of locations</b><span style=\"white-space:pre\">	</span>28 offices (2018)</p><p><b>Area served</b><span style=\"white-space:pre\">	</span>Worldwide</p><p><b>Key people<span style=\"white-space:pre\">	</span></b></p><p>-Chu Thi Thanh Ha (Chairwoman)</p><p>-Pham Minh Tuan (CEO)</p><p>-Tran Dang Hoa (COO &amp; Chairman, FPT Japan)</p><p>-Nguyen Khai Hoan (CFO)</p><p>-Do Van Khac (CDO)</p><p>-Dao Duy Cuong (CDTO)</p><p>-Nguyen Tuan Minh (CHRO)</p><p>-Bui Hoang Tung (CBDO)</p><p><b>Products&nbsp; </b>&nbsp;SoftwareServices&nbsp; Software, ITO Services</p><p><b>Revenue<span style=\"white-space:pre\">	</span></b>Increase $370 million (2018)</p><p><b>Net income Increase</b> $60 million (2018)</p><p><b>Number of employees</b> 28,000 (2020)</p><p>-FPT Software was founded in 1999 by 13 members of FPT Group, lead by Nguyen Thanh Nam (later CEO, Chairman of FPT Software then CEO of FPT Group). It was originally named as FPT Strategic Unit 1 or FSU1, in charge of IT Outsourcing to the global market. The financial crisis and fluctuations within Vietnam’s economy in 1997 and 1998 placed many companies including FPT, at a disadvantage. FPT sought to reach out to the world, like other global companies, and provide software outsourcing services. FPT Software was founded to serve this purpose.[3]</p><p><br></p><p>In 2000, it opened it first oversea branches in Silicon Valley, US and Bangalore, India. Both closed after one year due to a lack of customers. Given that do-or-die situation, the FPT Board of Directors decide to shift its attention to Japan. It ends well where by 2004, the company opens its delivery center in Hochiminh, then Danang in 2005. In the same year, FPT opened its first branch in Japan, then by 2007 in Singapore, 2008 in Paris, France and reopen United States’s branch in the same year.</p><p><br></p><p>In 2009, FPT Software reorganized as a joint-stock company, with its CEO Nguyen Thanh Nam promoted to CEO of FPT Group &amp; Chairman of FPT Software and Bui Thi Hong Lien, former CEO FPT India and former CEO FPT Japan (a wholly owned subsidiary of FPT and operated by FPT Software), named as CEO.</p><p><br></p><p>In 2012, it has its first major organization shift, with change in leadership (Chairman Nguyen Thanh Nam is replaced by Hoang Nam Tien, then Chairman of FPT Land and former Chairman of FPT Trading; CEO Bui Thi Hong Lien is replaced by Nguyen Thanh Lam, EVP &amp; MD, FPT Software Hochiminh), business model (from multiple subsidiary companies to delivery centers and oversea branches), and strategy (from traditional ITO services to SMAC-oriented services). The goal is to reach $100 million revenue by 2013 (Fsoft revenue was $60 million in 2011, with average growth of 10-15% before than)</p><p><br></p><p>By the end of 2013, it reached the milestone of $100 million of revenue and 5,000 employees, become the first and only (up until 2018) Vietnamese IT services company to reach that mile stone. The company\'s goal now changed to reach $1 billion revenue by 2020.</p><p><br></p><p>In 06/2014, it acquired RWE IT Slovakia, an IT Business Unit of RWE, becoming the first Vietnamese IT company to conduct an oversea M&amp;A. The deal helps FPT Software to access to the Energy Management domain and knowhow in SAP technologies with more than 400 experts.</p><p><br></p><p>In 08/2015, the outgoing CEO Nguyen Thanh Lam (brother of FPT Software founder Nguyen Thanh Nam) is replaced by Hoang Viet Anh, COO &amp; MD, FSU1, former CEO FPT Asia Pacific.</p><p><br></p><p>In 2016, FPT Software has reached 2 milestones: 10,000 employees and $230 million of revenue, put it comparable to India top 20 IT Services companies. FPT Japan also reached the milestone of $126 million of revenue, becoming the first Oversea Branch of FPT Software to cross over $100 million milestone.</p><p><br></p><p>In 2017, sponsored by FPT Group Chairman Trương Gia Bình, the company launched its major campaigns of Digital Transformation and Whale Hunting Strategy. This helps the group to establish relations with more than 40 major global corporations, of which more than 20 is in Fortune Global 500 such as Airbus [4] ,[5] Siemens,[6][7] UPS [8]...etc... By the end of the year, the company has 75 partners in Fortune Global 500.</p><p><br></p><p>In 03/2018, FPT Group has a major organization change where three subsidiaries swap their CEOs:</p><p><br></p><p>- Pham Minh Tuan, then CEO of FPT Informations Systems and a former EVP of FPT Software, is swapped as the new CEO of FPT Software.</p><p><br></p><p>- Hoang Viet Anh, the outgoing CEO of FPT Software, is promoted to FPT Deputy General Director &amp; CEO, FPT Telecom.</p><p><br></p><p>- Nguyen Van Khoa, the outgoing CEO of FPT Telecom, is promoted to FPT Deputy General Director &amp; CEO, FPT Information Systems</p><p><br></p><p>In 07/2018, FPT Software acquired 90% of Intellinet, a US-based consulting firm with 150 high level consultants with revenue of $30 million. The deal is estimated to reach $45–50 million when FPT Software acquire the rest 10% in the next 3 years. FPT Japan also reach the workforce of 1,000 employees (not included offshore) by that date, becoming the biggest Vietnamese company in Japan and ranks among top 40 Japanese IT companies. The company is also given green-light by Vietnamese authority to test its driverless car in actual road</p>', NULL, 10, '2020-11-21', NULL, ' Tầng 9, tòa nhà 3A, ngõ 76, phố Duy Tân', 'FPT Software'),
(29, 'linxhq', 'GGm2gCIqF8cJY7WjrrpdQw7zyy2kh952', '$2y$13$ElLFEEGvY5jNQHnvEHH6IuoQmST07EKj2VUyPQ5kZXkl7Thh2cG7.', 'PZ4dXODZhjqipNid3iMpg7H9R52fI5ff_1605951662', 'linxhq@gmal.com', NULL, 555, 'toshiba.png', 'to.jpg', '<p><b>Overview about ITviec</b></p><p>Ít nhưng mà chất</p><p><br></p><p>ITviec.com is where \"Ít nhưng mà chất\" developers go to find great new jobs.</p><p><br></p><p>Our mission is to help IT people develop so they can build great products and change the world. We don\'t have the most jobs...but we do have the best ones.</p><p><br></p><p>We focus on building an awesome job website and providing IT people with tips and practical advice they can use to manage their IT career and find the job that\'s best for them.</p><p><br></p><p>We have a fun, young, no-bullshit culture. You have an idea? Just do it! No committees and no bureaucracy.</p><p><br></p><p><b>Are you \"Ít nhưng mà chất\"? </b>Join us right NOW!!</p><div><br></div>', NULL, 10, '2020-11-21', NULL, '4555 duy tan', ''),
(30, '2NF', 'bkPCDUWmYhdzge1CyBQy--6-D-EC9ltc', '$2y$13$6ly411OeD2897RRj8tIdte9Pn6ZmgGBiz1/9M12HLKg1qG6S80Um6', ' Nguyễn Như Hạnh', '2nf@gmail.com', NULL, 80, '2nf-avt.png', '2nf-bia.png', '<div>-Tổng Giám Đốc (CEO<span style=\"font-family: &quot;Arial Black&quot;;\">﻿</span>):<b>&nbsp;Nguyễn Như Hạnh</b></div><div><span style=\"font-size: 16px; font-style: normal; font-weight: 400;\">-Chủ Tịch:</span><span style=\"font-size: 16px; font-style: normal;\"><b> Đặng Minh Tuấn</b></span><br></div><div>-Năm thành lập: 04/2012</div><div><div>-Nhân viên: 95 người (năm 2019)</div><div>-Địa chỉ: Tầng 9, tòa nhà 3A,<span style=\"font-size: 16px; font-style: normal; font-weight: 400; font-family: Poppins-Regular, sans-serif;\">ngõ 82, phố Duy Tân, quận Cầu Giấy, Thành phố Hà Nội, Việt Nam.</span></div><div>-Điện thoại: (084) 43-8398-714</div><div>-Email: hanh@2nf.com.vn</div></div><div>-Được thành lập từ năm 2012 đến nay, 2NF đã trải qua nhiều năm hợp tác phát triển với các khách hàng Nhật Bản và quốc tế. Chúng tôi đã xây dựng được vị trí trong ngành phát triển phần mềm, niềm tin trong lòng các khách hàng bằng chất lượng, hiệu quả công việc cao, đặc biệt là tinh thần trách nhiệm cao, thái độ làm việc tốt.</div><div>-Chúng tôi sẽ nỗ lực hơn nữa để đạt được các nhiệm vụ và tầm nhìn đã đề ra, đem lại lợi ích tốt nhất cho khách hàng và các bên liên quan khác, góp phần xây dựng xã hội tốt đẹp hơn.</div><div>-Rất mong nhận được sự hợp tác giúp đỡ từ tất cả các Quý vị!</div><div><br></div>', 0, 10, '2020-12-30', NULL, ' Tầng 9, tòa nhà 3A, ngõ 82, phố Duy Tân', 'Công ty TNHH Phần mềm 2NF '),
(31, 'FSS', 'e4SmdHH8CW_M4ZcUtyqQg2kN60HulDiM', '$2y$13$LZdZ4mbjNJiktJADUX/GLeasljKWsjsWCvDOUonLV.n8hz2DLmgZS', 'y4FZ4a9Fgi1nvfEMAvTv9PDOJqEtCjT0_1609298925', 'fss@gmail.com', NULL, NULL, NULL, 'hy.jpg', NULL, NULL, 10, '2020-12-30', NULL, NULL, ''),
(32, 'Home62', 'Home Credit Việt Nam', '$2y$13$RZm7Xcr.NzIZa9hEjegXweITQc9dzzIDZy2WArSyOMWLB/nuD6.eO', 'Phạm Thanh Tùng', 'sam@gmail.com', NULL, 30, 'credit.png', 'credit.jpg', '<p><b>Chúng tôi là ai?</b></p><p>Home Credit là một trong những tập đoàn tài chính tiêu dùng toàn cầu hiện có mặt trên 10 quốc gia. Hoạt động từ năm 2008 đến nay, Home Credit Việt Nam là một trong những công ty dẫn đầu về cung cấp các giải pháp tài chính và cho vay hợp lý, dựa theo 3 tiêu chí: nhanh chóng, tiện lợi và thân thiện</p><p><b>QUYỀN LỢI tại Home Credit</b></p><p>Khi trở thành nhân viên Home Credit, bạn có thể nhận được những quyền lợi tương xứng tùy theo năng lực: lương tháng 13 và thưởng KPI, 15 ngày phép/năm, 100% BHXH, BHYT, BHTN, Gói Bảo hiểm Cao Cấp, Bảo hiểm Tai nạn 24/7, Khám sức khỏe hàng năm và các Trợ cấp khác.<br><b>MÔI TRƯỜNG của chúng tôi</b></p><p>Bạn có bao giờ nghĩ rằng mình sẽ làm việc trong một môi trường quốc tế cởi mở và minh bạch, nơi mà bạn không chỉ được truyền cảm hứng về đam mê trong công việc, mà còn được khai phá khả năng đương đầu với thay đổi và thách thức? Bật mí nhé, đó là cuộc sống của bạn tại Home.<br><br></p>', NULL, 10, '2020-12-30', NULL, 'Ngõ 85 Cầu giấy Hà Nội', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `enterprise_name` varchar(255) NOT NULL,
  `namejob` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `experience`
--

INSERT INTO `experience` (`id`, `enterprise_name`, `namejob`, `created_at`, `end_at`, `user_id`) VALUES
(1, '2NF', '<h3>Thực Tập Sinh ASP.NET MVC</h3>\r\n<p>-Làm project website bán hàng</p>', 0, 0, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `field`
--

INSERT INTO `field` (`id`, `name`) VALUES
(1, '--Chọn--'),
(8, 'AI - Trí tuệ nhân tạo, Machine Learning'),
(5, 'Cơ sở dữ liêu'),
(7, 'Lập trình nhúng'),
(2, 'Lập trình phần mềm'),
(6, 'Lập trình ứng dụng'),
(4, 'Lập trình web'),
(3, 'QA Tester'),
(9, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `field_job`
--

CREATE TABLE `field_job` (
  `id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `field_job`
--

INSERT INTO `field_job` (`id`, `field_id`, `job_id`) VALUES
(1, 5, 237),
(2, 5, 238),
(3, 5, 239),
(4, 5, 240),
(5, 4, 243),
(6, 4, 244),
(7, 6, 245),
(8, 1, 246),
(9, 8, 247),
(10, 4, 248),
(11, 4, 249);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hobby`
--

CREATE TABLE `hobby` (
  `id` int(11) NOT NULL,
  `hobby_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hobby`
--

INSERT INTO `hobby` (`id`, `hobby_name`, `user_id`) VALUES
(4, '<p>- Thích xem phim,thích học tiếng anh,chơi\r\nthể thao đặc biệt là đá bóng\r\n</p>', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `personal_information` varchar(255) NOT NULL,
  `specialize` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `information`
--

INSERT INTO `information` (`id`, `personal_information`, `specialize`, `user_id`) VALUES
(1, '<p>- Hoạt bát, nhiệt tình, thật thà và cẩn thận.</p>\r\n<p>- Thích tìm tòi, chinh phục những tri thức, công việc mà\r\nmình chưa biết đến.</p>', '<p>- Sử dụng Git cơ bản,</p>\r\n<p>- Cơ bản Mysql, OOP, SOLID</p>\r\n<p>-Đọc tài liệu chuyên ngành khá tốt</p>\r\n<p>- Khả năng làm việc nhóm tốt\r\n</p>', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `market`
--

INSERT INTO `market` (`id`, `name`) VALUES
(1, '--Chọn--'),
(2, 'Nhật Bản'),
(3, 'Mỹ'),
(4, 'Singapore');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `markets_job`
--

CREATE TABLE `markets_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `markets_job`
--

INSERT INTO `markets_job` (`id`, `job_id`, `market_id`) VALUES
(1, 240, 3),
(2, 243, 3),
(3, 244, 2),
(4, 245, 2),
(5, 246, 3),
(6, 247, 3),
(7, 248, 2),
(8, 249, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1602215405),
('m130524_201442_init', 1602215408),
('m190124_110200_add_verification_token_column_to_user_table', 1602215408),
('m201007_082621_create_news_table_student', 1602215408),
('m201007_082857_create_news_table_enterprise', 1602215409),
('m201007_083831_create_news_table_teachers', 1602215409),
('m201215_073327_create_news_experience', 1608186321),
('m201215_074619_create_news_colleges', 1608186322),
('m201215_074916_create_news_operation', 1608186322),
('m201215_075222_create_news_target', 1608186322),
('m201215_075446_create_news_hobby', 1608186322),
('m201217_064310_add_target_id_column_to_user_table', 1608188143),
('m201217_064830_create_information_table', 1608188143),
('m201217_065652_add_target_id_column_to_student_table', 1608188317),
('m201217_070726_add_student_id_for_student_table', 1608188966),
('m201217_070942_addForeignKey_for_student_table', 1608189505),
('m201217_072016_addForeignKey_for_colleges_table', 1608189759),
('m201217_072304_addForeignKey_for_enterprise_table', 1608190448),
('m201217_072435_addForeignKey_for_hobby_table', 1608190475),
('m201217_072533_addForeignKey_for_information_table', 1608190563),
('m201217_072614_addForeignKey_for_operation_table', 1608190587),
('m201217_072650_addForeignKey_for_target_table', 1608190587),
('m201221_141210_create_field_table', 1608695595),
('m201221_141652_create_address_table', 1608695595),
('m201221_142458_create_payment_table', 1608695595),
('m201221_142743_create_work_table', 1608695596),
('m201221_144403_create_market_table', 1608697319),
('m201223_041141_create_address_enterprise_table', 1608697319),
('m201223_041217_create_field_job_table', 1608697319),
('m201223_041310_create_work_job_table', 1608697319),
('m201223_041336_create_payment_job_table', 1608697319),
('m201223_041636_create_markets_job_table', 1608697319);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `operation`
--

INSERT INTO `operation` (`id`, `name`, `detail`, `created_at`, `end_at`, `user_id`) VALUES
(1, 'Hành trình đỏ về nguồn\r\n', '<p> CLB dành cho những bạn trẻ muốn cải thiện kĩ năng\r\nmềm. Ở đó tôi được học hỏi các kỹ năng: làm việc nhóm,\r\nkỹ năng thuyết trình ….</p>', 0, 0, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `organization_requests`
--

CREATE TABLE `organization_requests` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `amount` int(11) NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `imageFile` varchar(50) DEFAULT NULL,
  `cancel` varchar(10000) DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `organization_requests`
--

INSERT INTO `organization_requests` (`id`, `organization_id`, `subject`, `short_description`, `amount`, `date_submitted`, `status`, `imageFile`, `cancel`, `create_at`) VALUES
(236, 28, 'ttt', '<p>ee</p>', 4, NULL, 8, 'java.jpg', NULL, '0000-00-00'),
(237, 28, 'Hi', '<p>ee</p>', 333, '2020-12-28', 8, 'net.jpg', NULL, '0000-00-00'),
(238, 28, 'Hi', '<p>ee</p>', 333, '2020-12-28', 8, 'net.jpg', NULL, '0000-00-00'),
(239, 28, 'Tuyển ', '<p>anh thao</p>', 1, '2020-12-14', 8, 'js.jpg', NULL, '0000-00-00'),
(240, 28, 'Tuyển Nhé', 'hi hi', 333, '2020-12-01', 8, NULL, NULL, '2020-12-14'),
(241, 28, 'Tuyển dụng thực tập Java', '<p><b>1.Mô tả công việc&nbsp;</b></p><p>-Được đào tạo định hướng về Front-end và Back-end&nbsp;</p><p>-Tham gia các dự án nước ngoài theo hình thức training on-job dưới sự hướng dẫn trực tiếp của Leader&nbsp;</p><p>-Đọc hiểu tài liệu kỹ thuật, tìm hiểu và phân tích yêu cầu sản phẩm, thiết kế tính năng, nghiên cứu các công nghệ được phân công Phối hợp với các thành viên trong team để thiết kế, triển khai các tính năng mới theo yêu cầu dự án&nbsp;</p><p>-Thực hiên các công việc khác theo sự phân công của quản lý&nbsp;</p><p>-Chi tiết sẽ trao đổi cụ thể khi phỏng vấn&nbsp;</p><p><b>2.Yêu cầu công việc&nbsp; &nbsp;</b></p><p>-Sinh viên năm 3,4 hoặc tốt nghiệp cao đẳng/đại học chuyên ngành CNTT, Kỹ thuật phần mềm, Khoa học máy tính, ... hoặc các lĩnh vực liên quan Nắm vững các kiến thức về PHP Có kiến thức tốt về MySQL, viết và tối ưa hóa truy vấn SQL</p><p>-Kiến thức tốt về lập trình hướng đối tượng.</p><p>-Có kiến thức về lập trình web: HTML, CSS, Javascript, JQuery, ...</p><p>-Có kinh nghiệm làm việc với một trong các Framework: Laravel, CakePHP là lợi thế Kỹ năng làm việc nhóm và trao đổi thông tin tốt Chăm chỉ, có tinh thần học hỏi, chủ động trong công việc Đam mê lập trình, tư duy logic, sẵn sàng tìm hiểu và học hỏi cái mới</p><p>-Nhiệt tình và có trách nhiệm trong công việc&nbsp;</p><p><b>3.Các phúc lợi dành cho bạn&nbsp; </b></p><p>-Có hỗ trợ lương hàng tháng từ 1,000,000 – 5,000,000 tùy theo năng lực</p><p>-Có cơ hội trở thành nhân viên chính thức tại Adamo với mức lương hấp dẫn&nbsp;</p><p>-Lương T13 khi lên chính thức&nbsp; Review lương 2 lần 1 năm</p><p>-Thưởng các dịp lễ Tết, thưởng quý, thưởng thâm niên, thưởng lợi nhuận.</p><p>-Quà tặng dịp sinh nhật cá nhân Cơ hội được học hỏi, làm việc với công nghệ mới</p><p>-Được làm việc trong một môi trường chuyên nghiệp với các đối tác nước ngoài&nbsp;</p><p>-Du lịch, teambuilding 2 năm/lần Khám sức khỏe định kỳ cho nhân viên&nbsp;</p><p>-Hỗ trợ tham gia các khóa đào tạo nâng cao kiến thức và kỹ năng</p><div style=\"font-size: 16px;\"><br></div>', 10, '2021-01-23', 8, 'java.jpg', NULL, '2020-12-30'),
(242, 28, 'Tuyển dụng thực tập Java', '<p><b>1.Mô tả công việc&nbsp;</b></p><p>-Được đào tạo định hướng về Front-end và Back-end&nbsp;</p><p>-Tham gia các dự án nước ngoài theo hình thức training on-job dưới sự hướng dẫn trực tiếp của Leader&nbsp;</p><p>-Đọc hiểu tài liệu kỹ thuật, tìm hiểu và phân tích yêu cầu sản phẩm, thiết kế tính năng, nghiên cứu các công nghệ được phân công Phối hợp với các thành viên trong team để thiết kế, triển khai các tính năng mới theo yêu cầu dự án&nbsp;</p><p>-Thực hiên các công việc khác theo sự phân công của quản lý&nbsp;</p><p>-Chi tiết sẽ trao đổi cụ thể khi phỏng vấn&nbsp;</p><p><b>2.Yêu cầu công việc&nbsp; &nbsp;</b></p><p>-Sinh viên năm 3,4 hoặc tốt nghiệp cao đẳng/đại học chuyên ngành CNTT, Kỹ thuật phần mềm, Khoa học máy tính, ... hoặc các lĩnh vực liên quan Nắm vững các kiến thức về PHP Có kiến thức tốt về MySQL, viết và tối ưa hóa truy vấn SQL</p><p>-Kiến thức tốt về lập trình hướng đối tượng.</p><p>-Có kiến thức về lập trình web: HTML, CSS, Javascript, JQuery, ...</p><p>-Có kinh nghiệm làm việc với một trong các Framework: Laravel, CakePHP là lợi thế Kỹ năng làm việc nhóm và trao đổi thông tin tốt Chăm chỉ, có tinh thần học hỏi, chủ động trong công việc Đam mê lập trình, tư duy logic, sẵn sàng tìm hiểu và học hỏi cái mới</p><p>-Nhiệt tình và có trách nhiệm trong công việc&nbsp;</p><p><b>3.Các phúc lợi dành cho bạn&nbsp; </b></p><p>-Có hỗ trợ lương hàng tháng từ 1,000,000 – 5,000,000 tùy theo năng lực</p><p>-Có cơ hội trở thành nhân viên chính thức tại Adamo với mức lương hấp dẫn&nbsp;</p><p>-Lương T13 khi lên chính thức&nbsp; Review lương 2 lần 1 năm</p><p>-Thưởng các dịp lễ Tết, thưởng quý, thưởng thâm niên, thưởng lợi nhuận.</p><p>-Quà tặng dịp sinh nhật cá nhân Cơ hội được học hỏi, làm việc với công nghệ mới</p><p>-Được làm việc trong một môi trường chuyên nghiệp với các đối tác nước ngoài&nbsp;</p><p>-Du lịch, teambuilding 2 năm/lần Khám sức khỏe định kỳ cho nhân viên&nbsp;</p><p>-Hỗ trợ tham gia các khóa đào tạo nâng cao kiến thức và kỹ năng</p><div style=\"font-size: 16px;\"><br></div>', 10, '2021-01-23', 8, 'java.jpg', 'fg', '2020-12-30'),
(243, 28, 'Tuyển dụng thực tập Java', '<p><b>1.Mô tả công việc&nbsp;</b></p><p>-Được đào tạo định hướng về Front-end và Back-end&nbsp;</p><p>-Tham gia các dự án nước ngoài theo hình thức training on-job dưới sự hướng dẫn trực tiếp của Leader&nbsp;</p><p>-Đọc hiểu tài liệu kỹ thuật, tìm hiểu và phân tích yêu cầu sản phẩm, thiết kế tính năng, nghiên cứu các công nghệ được phân công Phối hợp với các thành viên trong team để thiết kế, triển khai các tính năng mới theo yêu cầu dự án&nbsp;</p><p>-Thực hiên các công việc khác theo sự phân công của quản lý&nbsp;</p><p>-Chi tiết sẽ trao đổi cụ thể khi phỏng vấn&nbsp;</p><p><b>2.Yêu cầu công việc&nbsp; &nbsp;</b></p><p>-Sinh viên năm 3,4 hoặc tốt nghiệp cao đẳng/đại học chuyên ngành CNTT, Kỹ thuật phần mềm, Khoa học máy tính, ... hoặc các lĩnh vực liên quan Nắm vững các kiến thức về PHP Có kiến thức tốt về MySQL, viết và tối ưa hóa truy vấn SQL</p><p>-Kiến thức tốt về lập trình hướng đối tượng.</p><p>-Có kiến thức về lập trình web: HTML, CSS, Javascript, JQuery, ...</p><p>-Có kinh nghiệm làm việc với một trong các Framework: Laravel, CakePHP là lợi thế Kỹ năng làm việc nhóm và trao đổi thông tin tốt Chăm chỉ, có tinh thần học hỏi, chủ động trong công việc Đam mê lập trình, tư duy logic, sẵn sàng tìm hiểu và học hỏi cái mới</p><p>-Nhiệt tình và có trách nhiệm trong công việc&nbsp;</p><p><b>3.Các phúc lợi dành cho bạn&nbsp; </b></p><p>-Có hỗ trợ lương hàng tháng từ 1,000,000 – 5,000,000 tùy theo năng lực</p><p>-Có cơ hội trở thành nhân viên chính thức tại Adamo với mức lương hấp dẫn&nbsp;</p><p>-Lương T13 khi lên chính thức&nbsp; Review lương 2 lần 1 năm</p><p>-Thưởng các dịp lễ Tết, thưởng quý, thưởng thâm niên, thưởng lợi nhuận.</p><p>-Quà tặng dịp sinh nhật cá nhân Cơ hội được học hỏi, làm việc với công nghệ mới</p><p>-Được làm việc trong một môi trường chuyên nghiệp với các đối tác nước ngoài&nbsp;</p><p>-Du lịch, teambuilding 2 năm/lần Khám sức khỏe định kỳ cho nhân viên&nbsp;</p><p>-Hỗ trợ tham gia các khóa đào tạo nâng cao kiến thức và kỹ năng</p><div style=\"font-size: 16px;\"><br></div>', 10, '2021-01-23', 10, 'java.jpg', NULL, '2020-12-30'),
(244, 30, 'Thiết kế website php ', '<p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Cần 1 bạn biết viết code đăng nhập php kết nối my sql như link là ok : https://freetuts.net/xay-dung-chuc-nang-dang-nhap-va-dang-ky-voi-php-va-mysql-85.html</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Để nhận vào 1 đoạn json =&gt; php và xuất ra html (hoặc php) =&gt; json</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Yêu cầu : đã có những website tự làm a=&gt;z (wordpress cũng được)</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Trả theo giờ làm : 80,000 đ/ giờ</p>', 1, '2021-01-13', 10, 'php.jpg', NULL, '2020-12-30'),
(245, 30, 'Thiết kế giao diện Mobile App', '<p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Hi all, code 1 trang hiển thị dữ liệu từ API có sẵn, chi tiết tính năng cần code:</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">https://docs.google.com/presentation/d/174X6ffuQJPZVQ-aPxFhFqUQ-L27tdLVVBIKfD8ZVBqg/edit?usp=sharing</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; letter-spacing: -0.28px;\"><b>Yêu cầu:</b></p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">- Code bằng Bloc Cubit</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">- Clean code, ngăn nắp gọn gàng, có giá trị sử dụng lại, dễ tùy chỉnh</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">- Kết thúc bàn giao full source chạy tốt trên cả Android và IOS</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Hiện tại bản trên github project mình chuẩn bị sẵn đã khai báo đủ hết Class, Repository từ api và có thể gọi được data ngon lành → chỉ việc code logic trong Cubit và State và những cái còn lại để đáp ứng các yêu cầu</p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Nếu bạn hứng thú với order này, vui lòng báo giá lại cho mình các đầu việc và thời gian hoàn thành. Cám ơn đã dành thời gian :)</p>', 2, '2021-01-15', 10, 'c.jpg', NULL, '2020-12-30'),
(246, 30, 'Thiết kế mạch điện tử', '<p style=\"font-weight: 400; font-style: normal;\"><span style=\"font-size: 14px; font-style: normal; font-weight: 400;\">-Tham gia các dự án nước ngoài theo hình thức training on-job dưới sự hướng dẫn trực tiếp của Leader&nbsp;</span><br></p><p style=\"font-weight: 400; font-style: normal;\">-Đọc hiểu tài liệu kỹ thuật, tìm hiểu và phân tích yêu cầu sản phẩm, thiết kế tính năng, nghiên cứu các công nghệ được phân công</p><p style=\"font-weight: 400; font-style: normal;\">-Phối hợp với các thành viên trong team để thiết kế, triển khai các tính năng mới theo yêu cầu dự án&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-Thực hiên các công việc khác theo sự phân công của quản lý&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-Chi tiết sẽ trao đổi cụ thể khi phỏng vấn&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">2.Yêu cầu công việc&nbsp; &nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-<span style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">Dự án chuẩn đoán rung động máy, cần tuyển kĩ sư thiết kế mạch điện tử, có hiểu biết về lọc tương tự, linh kiện điện tử, kĩ thuật điện tử tương tự số</span></p><p style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: 400; letter-spacing: -0.28px;\">https://www.ti.com/lit/an/slyt749/slyt749.pdf?ts=[được ẩn bởi vlance]4&amp;ref_url=https%253A%252F%252Fwww.google.com%252F&amp;fbclid=IwAR3lKVweYZ1G1381_j_LWNSGW0SArmw-HPcUyKQKQ56fjpK296CK38wzbqY</p><p style=\"font-weight: 400; font-style: normal;\">3.Các phúc lợi dành cho bạn&nbsp; Có hỗ trợ lương hàng tháng từ 1,000,000 – 5,000,000 tùy theo năng lực</p><p style=\"font-weight: 400; font-style: normal;\">-Có cơ hội trở thành nhân viên chính thức tại Adamo với mức lương hấp dẫn&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-Lương T13 khi lên chính thức&nbsp; Review lương 2 lần 1 năm</p><p style=\"font-weight: 400; font-style: normal;\">-Thưởng các dịp lễ Tết, thưởng quý, thưởng thâm niên, thưởng lợi nhuận.</p><p style=\"font-weight: 400; font-style: normal;\">-Quà tặng dịp sinh nhật cá nhân Cơ hội được học hỏi, làm việc với công nghệ mới</p><p style=\"font-weight: 400; font-style: normal;\">-Được làm việc trong một môi trường chuyên nghiệp với các đối tác nước ngoài&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-Du lịch, teambuilding 2 năm/lần Khám sức khỏe định kỳ cho nhân viên&nbsp;</p><p style=\"font-weight: 400; font-style: normal;\">-Hỗ trợ tham gia các khóa đào tạo nâng cao kiến thức và kỹ năng</p>', 2, '2021-01-23', 10, 'c.jpg', NULL, '2020-12-30'),
(247, 32, 'Thực Tập  Machine Learning/AI/Python', '<div class=\"job_reason_to_join_us\" style=\"font-size: 16px; font-style: normal; font-weight: 400;\"><h2 class=\"title\" style=\"font-family: inherit; font-size: 27px;\">Top 3 Reasons To Join Us</h2><div class=\"top-3-reasons\" style=\"font-weight: 500; line-height: 1.7em;\"><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Solutions for real-world, large-scale problems</li><li>Competitive salary and bonus</li><li>International and professional working environment</li></ul></div></div><div class=\"job_description\" style=\"padding-top: 20px; padding-bottom: 10px; font-size: 16px; font-style: normal; font-weight: 400;\"><div class=\"title-apply-line\"><h2 class=\"title\" style=\"font-family: inherit; margin-top: 0px; margin-bottom: 0px; font-size: 27px; float: left;\">Job Description</h2><div class=\"clearfix\"></div></div><div class=\"description\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 538px;\"><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Research and develop machine learning (especially deep learning) techniques to solve computer vision problems (e.g., Person re-identification, Product recognition, Human behavior estimation, Object tracking, Face recognition, etc.).</li><li>Use machine learning and deep learning frameworks to build the core components of our image and video data analytics engine.</li><li>Develop solutions for real-world, large-scale problems.</li></ul><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p></div></div><div class=\"skills_experience\" style=\"padding-top: 20px; padding-bottom: 10px; font-size: 16px; font-style: normal; font-weight: 400;\"><h2 class=\"title\" style=\"font-family: inherit; margin-top: 0px; margin-bottom: 0px; font-size: 27px;\">Your Skills and Experience</h2><div class=\"experience\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 538px;\"><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Good knowledge of math.</li><li><strong>Knowledge of machine learning, deep learning, computer vision.</strong></li><li>Capability of conducting applied research in machine learning, deep learning and computer vision.</li><li>Experience in programming, proficiency in at least one of the programming languages&nbsp;<strong>Python</strong>, C++, Java.</li><li><strong>Experience of using machine learning and deep learning frameworks TensorFlow, PyTorch, Keras.</strong></li><li>Ability to work in a group and work independently.</li><li>Ability to use English (reading, writing, conversation).</li></ul></div></div>', 3, '2021-01-15', 10, 'python.png', NULL, '2020-12-30'),
(248, 32, 'Thực Tập Front End Engineer (React JS)', '<div class=\"job_reason_to_join_us\" style=\"font-size: 16px; font-style: normal; font-weight: 400;\"><h2 class=\"title\" style=\"font-family: inherit; font-size: 27px;\">Top 3 Reasons To Join Us</h2><div class=\"top-3-reasons\" style=\"font-weight: 500; line-height: 1.7em;\"><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Solutions for real-world, large-scale problems</li><li>Competitive salary and bonus</li><li>International and professional working environment</li></ul></div></div><div class=\"job_description\" style=\"padding-top: 20px; padding-bottom: 10px; font-size: 16px; font-style: normal; font-weight: 400;\"><div class=\"title-apply-line\"><h2 class=\"title\" style=\"font-family: inherit; margin-top: 0px; margin-bottom: 0px; font-size: 27px; float: left;\">Job Description</h2><div class=\"clearfix\"></div></div><div class=\"description\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 538px;\"><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Research and develop machine learning (especially deep learning) techniques to solve computer vision problems (e.g., Person re-identification, Product recognition, Human behavior estimation, Object tracking, Face recognition, etc.).</li><li>Use machine learning and deep learning frameworks to build the core components of our image and video data analytics engine.</li><li>Develop solutions for real-world, large-scale problems.</li></ul><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p></div></div><div class=\"skills_experience\" style=\"padding-top: 20px; padding-bottom: 10px; font-size: 16px; font-style: normal; font-weight: 400;\"><h2 class=\"title\" style=\"font-family: inherit; margin-top: 0px; margin-bottom: 0px; font-size: 27px;\">Your Skills and Experience</h2><div class=\"experience\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 538px;\"><p style=\"margin-top: 1em; margin-bottom: 1em;\"></p><ul style=\"margin-top: 1em; margin-bottom: 1em;\"><li>Good knowledge of math.</li><li><strong>Knowledge of machine learning, deep learning, computer vision.</strong></li><li>Capability of conducting applied research in machine learning, deep learning and computer vision.</li><li>Experience in programming, proficiency in at least one of the programming languages&nbsp;<strong>Python</strong>, C++, Java.</li><li><strong>Experience of using machine learning and deep learning frameworks TensorFlow, PyTorch, Keras.</strong></li><li>Ability to work in a group and work independently.</li><li>Ability to use English (reading, writing, conversation).</li></ul></div></div>', 4, '2021-01-23', 10, 'front.png', NULL, '2020-12-30'),
(249, 32, 'Tuyển Thực Tập NodeJS', '<p style=\"margin-bottom: 1rem; line-height: 24px; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><span style=\"font-weight: bolder;\">1. Cơ hội phát triển:</span></p><ul style=\"margin-bottom: 1rem; list-style-type: square; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><li>Môi trường làm việc thân thiện &amp; chuyên nghiệp, được học hỏi từ các kỹ sư kinh nghiệm từ Nhật Bản đồng thời có cơ hội phát triển sự nghiệp cùng đồng nghiệp là những kỹ sư trẻ tài năng, đam mê và có lý tưởng lớn</li><li>Trải nghiệm làm việc ngắn/dài hạn tại Nhật Bản</li><li>Cơ hội thăng tiến, phát triển bản thân không giới hạn tuỳ theo mong muốn của bản thân</li><li>Được tư vấn và chia sẻ về phát triển năng lực và nghề nghiệp bản thân</li></ul><p style=\"margin-bottom: 1rem; line-height: 24px; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><span style=\"font-weight: bolder;\">2. Quyền lợi và chế độ phúc lợi:</span></p><ul style=\"margin-bottom: 1rem; list-style-type: square; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><li>Làm việc từ Thứ 2 – Thứ 6</li><li>Được sự hướng dẫn, dìu dắt từ những người có kinh nghiệm nhiều năm, kỹ năng tốt</li><li>Được tham gia vào dự án thực tế, quy trình làm việc chuyên nghiệp</li><li>Hỗ trợ thực tập 2 tháng đầu tiên ít nhất là&nbsp;<span style=\"font-weight: bolder;\">1.000.000</span>&nbsp;đồng (Tuỳ vào năng lực sẽ quyết định mức hỗ trợ khi phỏng vấn)</li><li>Sau 02 tháng sẽ được trực tiếp tham gia vào các dự án Công ty trong 3 tháng (Mức lương hỗ trợ sẽ từ&nbsp;<span style=\"font-weight: bolder;\">2.0000.0000&nbsp;</span>đồng –&nbsp;<span style=\"font-weight: bolder;\">5.000.0000</span>&nbsp;đồng) kết thúc giai đoạn này, nếu có kết quả tốt sẽ ký hợp đồng chính thức luôn không cần qua thử việc</li><li>Có cơ hội trở thành nhân viên chính thức với mức lương cạnh tranh và chế độ đãi ngộ tốt</li><li>Môi trường làm việc trẻ, năng động đầy nhiệt huyết</li><li>Tham gia các hoạt động khác như: Teambuilding, Game, …</li></ul><p style=\"margin-bottom: 1rem; line-height: 24px; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><span style=\"font-weight: bolder;\">3. Yêu cầu ứng viên:</span></p><ul style=\"margin-bottom: 1rem; list-style-type: square; color: rgb(0, 0, 0); font-family: Roboto; font-size: 16px; font-style: normal; font-weight: 400;\"><li>Sinh viên năm cuối hoặc đã tốt nghiệp trong vòng 1 năm chuyên nghành CNTT hoặc tương đương các trường Đại học/Cao đẳng. Có thể làm việc fulltime</li><li>Tư duy logic tốt, cầu tiến, ham học hỏi, có trách nhiệm với bản thân và tập thể</li><li>Thời gian thực tập: 02~03 tháng, có đánh giá hàng tháng</li></ul>', 3, '2021-01-16', 10, 'js.jpg', NULL, '2020-12-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `organization_request_abilities`
--

CREATE TABLE `organization_request_abilities` (
  `id` int(11) NOT NULL,
  `organization_request_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_required` int(11) DEFAULT NULL,
  `note` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `organization_request_abilities`
--

INSERT INTO `organization_request_abilities` (`id`, `organization_request_id`, `ability_id`, `ability_required`, `note`) VALUES
(190, 241, 2, NULL, NULL),
(191, 241, 18, NULL, NULL),
(192, 241, 20, NULL, NULL),
(193, 242, 2, NULL, NULL),
(194, 242, 18, NULL, NULL),
(195, 242, 20, NULL, NULL),
(196, 243, 2, NULL, NULL),
(197, 243, 18, NULL, NULL),
(198, 243, 20, NULL, NULL),
(199, 244, 3, NULL, NULL),
(200, 244, 19, NULL, NULL),
(201, 244, 20, NULL, NULL),
(202, 245, 2, NULL, NULL),
(203, 245, 22, NULL, NULL),
(204, 245, 23, NULL, NULL),
(205, 245, 24, NULL, NULL),
(206, 245, 25, NULL, NULL),
(207, 246, 4, NULL, NULL),
(208, 246, 19, NULL, NULL),
(209, 247, 2, NULL, NULL),
(210, 247, 7, NULL, NULL),
(211, 248, 3, NULL, NULL),
(212, 248, 18, NULL, NULL),
(213, 248, 25, NULL, NULL),
(214, 248, 26, NULL, NULL),
(215, 249, 18, NULL, NULL),
(216, 249, 22, NULL, NULL),
(217, 249, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `name`) VALUES
(1, '--Chọn--'),
(2, 'Trả theo giờ'),
(3, 'Trả theo tháng'),
(4, 'Trả theo dự án');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_job`
--

CREATE TABLE `payment_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment_job`
--

INSERT INTO `payment_job` (`id`, `job_id`, `payment_id`) VALUES
(1, 240, 1),
(2, 243, 2),
(3, 247, 3),
(4, 245, 3),
(5, 246, 2),
(6, 248, 2),
(7, 244, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `imageFile` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `hobby_id` int(11) DEFAULT NULL,
  `operation_id` int(11) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  `information_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `date_of_birth`, `class_name`, `imageFile`, `status`, `created_at`, `updated_at`, `address`, `phone`, `college_id`, `target_id`, `hobby_id`, `operation_id`, `experience_id`, `information_id`) VALUES
(14, 'PhamThanhTung', 'MasWXaGWWc4F_7icDjfgslpkQTbnv4d1', '$2y$13$XzHkt0yiH3h8obj7sBDfyukQ58G2TcegQbOjgrLQgGLCRX72YH8Yu', '-sbtp1o3x-IGXOXov07Yx_s3fWUFlTon_1605925452', 'phamthanhtung@gmail.com', '1999-12-16', 'k62a3', 'user.png', 10, NULL, NULL, '334 Nguyễn Trãi , Thanh Xuân , Hà Nội', 585640443, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'taminhthao', 'hxZUPvDQcNAxsZscunZ-ErI73HpvzP2y', '$2y$13$9u.dMToq4NGkETJckTSQSuJXnoozKB.zvme6KSi4WDa14aCkDVvry', 'w1SwNFguI2sWkmrm2bbkivwIcjZda87m_1605925453', 'taminthao@gmail.com', NULL, 'k62a3', 'fpt.png', 10, NULL, NULL, '54 hus', 585640443, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'nguyenducmanh', 'CcXxikDTBaHKlwI1EmCgHjShn6RwylSP', '$2y$13$3IqPmgdiEtI3A2TS4s7qQOGxfBhF.5zBl4tHnYzSGz4taLbtcvVmW', '27wsroSV-ffkBkdo-JEhN-Aw-RfI23hs_1605925454', 'nguyenducmanh@gmail.com', NULL, 'k62a3', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'quynh99', 'WkheneiqibxZPcVtoS0iVEnuxcbcfcXi', '$2y$13$y.Dg1uxDL6Qdp4gp6//Ueu44IFIIZW6x15LYq0BW3BUST.kPDEX3O', 'WV3ElG2pHg95iEuExJMU2GsV-jguV3o3_1605925455', 'quynh99@gmail.com', NULL, 'k62a3', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_registration`
--

CREATE TABLE `student_registration` (
  `student_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `submit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student_registration`
--

INSERT INTO `student_registration` (`student_id`, `request_id`, `submit_date`) VALUES
(14, 243, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_skill_profile`
--

CREATE TABLE `student_skill_profile` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student_skill_profile`
--

INSERT INTO `student_skill_profile` (`id`, `student_id`, `ability_id`, `ability_rate`) VALUES
(11, 14, 2, 10),
(12, 14, 4, 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `short_time` varchar(255) NOT NULL,
  `long_time` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `target`
--

INSERT INTO `target` (`id`, `short_time`, `long_time`, `created_at`, `end_at`, `user_id`) VALUES
(5, '\r\n+ Tốt nghiệp đại học loại khá\r\n+ Thành thạo Laravel', '+Sau 5 năm sẽ trở thành full-stack Web\r\nDeveloper', 0, 0, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `img`, `sex`, `status`, `created_at`, `updated_at`) VALUES
(2, 'giaovien2', 'rqlrC6_Ov9nMgRVpZnKkV0KyRLKU6w35', '$2y$13$YMbmgdCSbrMCgliIiqXtWeZ9vI1okeEsTU/Gj2M7.DcfzQlETxnIC', '48cQScQr18vLwsPOayxMPAr8nqjb4F3s_1602216668', 'taminhthao99@gmail.com', NULL, 42, 10, '2020-10-09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colleges_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `hobby_id` int(11) DEFAULT NULL,
  `operation_id` int(11) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  `information_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `work`
--

INSERT INTO `work` (`id`, `name`) VALUES
(1, '--Chọn--'),
(2, 'Partime'),
(3, 'Fulltime');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_job`
--

CREATE TABLE `work_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `work_job`
--

INSERT INTO `work_job` (`id`, `job_id`, `work_id`) VALUES
(1, 238, 2),
(2, 239, 3),
(3, 240, 2),
(4, 243, 3),
(5, 244, 2),
(6, 245, 3),
(7, 246, 2),
(8, 247, 3),
(9, 248, 3),
(10, 249, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `address_enterprise`
--
ALTER TABLE `address_enterprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `address_enterprise_ibfk_2` (`job_id`);

--
-- Chỉ mục cho bảng `assigned_table`
--
ALTER TABLE `assigned_table`
  ADD PRIMARY KEY (`organization_request_id`,`student_id`) USING BTREE,
  ADD KEY `FK_assigned_student_skill` (`student_id`),
  ADD KEY `FK_assigned_enterprise_request` (`organization_request_id`);

--
-- Chỉ mục cho bảng `capacity_dictionary`
--
ALTER TABLE `capacity_dictionary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk-student` (`user_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`,`student_id`,`request_id`) USING BTREE,
  ADD KEY `student_id` (`student_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Chỉ mục cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`president`);

--
-- Chỉ mục cho bảng `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enterprise_name` (`enterprise_name`),
  ADD KEY `fk-experience-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `field_job`
--
ALTER TABLE `field_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Chỉ mục cho bảng `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-hobby-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-information-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `markets_job`
--
ALTER TABLE `markets_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_id` (`market_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk-operation-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `organization_requests`
--
ALTER TABLE `organization_requests`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `organization_request_abilities`
--
ALTER TABLE `organization_request_abilities`
  ADD PRIMARY KEY (`id`,`organization_request_id`,`ability_id`),
  ADD KEY `FK_assigned_list` (`organization_request_id`),
  ADD KEY `ability_id` (`ability_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment_job`
--
ALTER TABLE `payment_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `fk-information` (`information_id`),
  ADD KEY `fk-colleges` (`college_id`),
  ADD KEY `fk-target` (`target_id`),
  ADD KEY `fk-hobby` (`hobby_id`),
  ADD KEY `fk-operation` (`operation_id`),
  ADD KEY `fk-experience` (`experience_id`);

--
-- Chỉ mục cho bảng `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`student_id`,`request_id`) USING BTREE,
  ADD KEY `FK_student_registration_skill` (`request_id`);

--
-- Chỉ mục cho bảng `student_skill_profile`
--
ALTER TABLE `student_skill_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ability_id` (`ability_id`),
  ADD KEY `student_skill_profile_ibfk_1` (`student_id`);

--
-- Chỉ mục cho bảng `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-target-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Chỉ mục cho bảng `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `work_job`
--
ALTER TABLE `work_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `address_enterprise`
--
ALTER TABLE `address_enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `capacity_dictionary`
--
ALTER TABLE `capacity_dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `field_job`
--
ALTER TABLE `field_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `markets_job`
--
ALTER TABLE `markets_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `organization_requests`
--
ALTER TABLE `organization_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT cho bảng `organization_request_abilities`
--
ALTER TABLE `organization_request_abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payment_job`
--
ALTER TABLE `payment_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `student_skill_profile`
--
ALTER TABLE `student_skill_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `work_job`
--
ALTER TABLE `work_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address_enterprise`
--
ALTER TABLE `address_enterprise`
  ADD CONSTRAINT `address_enterprise_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `address_enterprise_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `organization_requests` (`id`);

--
-- Các ràng buộc cho bảng `assigned_table`
--
ALTER TABLE `assigned_table`
  ADD CONSTRAINT `FK_assigned_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `assigned_table_ibfk_1` FOREIGN KEY (`organization_request_id`) REFERENCES `organization_requests` (`id`);

--
-- Các ràng buộc cho bảng `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `fk-student` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `organization_requests` (`id`);

--
-- Các ràng buộc cho bảng `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk-experience-user_id` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `field_job`
--
ALTER TABLE `field_job`
  ADD CONSTRAINT `field_job_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`),
  ADD CONSTRAINT `field_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `organization_requests` (`id`);

--
-- Các ràng buộc cho bảng `hobby`
--
ALTER TABLE `hobby`
  ADD CONSTRAINT `fk-hobby-user_id` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk-information-user_id` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `markets_job`
--
ALTER TABLE `markets_job`
  ADD CONSTRAINT `markets_job_ibfk_1` FOREIGN KEY (`market_id`) REFERENCES `market` (`id`),
  ADD CONSTRAINT `markets_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `organization_requests` (`id`);

--
-- Các ràng buộc cho bảng `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `fk-operation-user_id` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `organization_request_abilities`
--
ALTER TABLE `organization_request_abilities`
  ADD CONSTRAINT `FK_assigned_list` FOREIGN KEY (`organization_request_id`) REFERENCES `organization_requests` (`id`),
  ADD CONSTRAINT `organization_request_abilities_ibfk_1` FOREIGN KEY (`ability_id`) REFERENCES `capacity_dictionary` (`id`);

--
-- Các ràng buộc cho bảng `payment_job`
--
ALTER TABLE `payment_job`
  ADD CONSTRAINT `payment_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `organization_requests` (`id`),
  ADD CONSTRAINT `payment_job_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk-colleges` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-experience` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-hobby` FOREIGN KEY (`hobby_id`) REFERENCES `hobby` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-information` FOREIGN KEY (`information_id`) REFERENCES `information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-operation` FOREIGN KEY (`operation_id`) REFERENCES `operation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-target` FOREIGN KEY (`target_id`) REFERENCES `target` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `student_registration`
--
ALTER TABLE `student_registration`
  ADD CONSTRAINT `student_registration_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `organization_requests` (`id`),
  ADD CONSTRAINT `student_registration_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Các ràng buộc cho bảng `student_skill_profile`
--
ALTER TABLE `student_skill_profile`
  ADD CONSTRAINT `FK_student_skill_capacity` FOREIGN KEY (`ability_id`) REFERENCES `capacity_dictionary` (`id`),
  ADD CONSTRAINT `student_skill_profile_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Các ràng buộc cho bảng `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `fk-target-user_id` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `work_job`
--
ALTER TABLE `work_job`
  ADD CONSTRAINT `work_job_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `work` (`id`),
  ADD CONSTRAINT `work_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `organization_requests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
