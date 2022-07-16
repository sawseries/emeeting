-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2022 at 10:36 AM
-- Server version: 5.6.36-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stiinfras_meet`
--

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `topic` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'หัวข้อ',
  `doc_type` int(11) NOT NULL COMMENT 'ประเภทเอกสาร',
  `start_date` date NOT NULL COMMENT 'วันที่เริ่มต้น',
  `end_date` date NOT NULL COMMENT 'วันที่สิ้นสุด',
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `room` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ห้อง',
  `type` int(11) NOT NULL,
  `link` text COLLATE utf8_unicode_ci COMMENT 'link / zoom (ถ้ามี)',
  `doctopic_text` text COLLATE utf8_unicode_ci COMMENT 'หัวเอกสาร (ถ้ามี)',
  `detail` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียดการประชุม(ถ้ามี)',
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ผู้เพิ่มข้อมูล',
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `code`, `topic`, `doc_type`, `start_date`, `end_date`, `time_start`, `time_end`, `room`, `type`, `link`, `doctopic_text`, `detail`, `user`, `ip`, `active`, `created_at`, `updated_at`) VALUES
(118, 'T1', 'ระเบียบวาระการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่  2/2565 ', 1, '2022-07-01', '2022-07-01', '13:30:00', '16:30:00', 'อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ มหาวิทยาลัยสงขลานครินทร์ และด้วยระบบ VDO Conference ผ่านโปรแกรม ZOOM ', 3, 'https://psu-th.zoom.us/j/99981160573?pwd=UFpGNnNsckxkeEFZK0RVT3FxVXNQdz09#success', '\n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    \n                    ระเบียบวาระการประชุม<div>คณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ครั้งที่ 2 / 2565&nbsp;<div>ในวันศุกร์ที่ 1 เดือน กรกฎาคม พ.ศ. 2565 เวลา 13.30 – 16.30 น.&nbsp;<br></div><div>ณ อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ (จ.สงขลา) มหาวิทยาลัยสงขลานครินทร์&nbsp;</div><div>วิทยาเขตหาดใหญ่ (พื้นที่ส่วนขยาย)&nbsp;</div><div>และด้วยระบบ VDO Conference ผ่านโปรแกรม ZOOM&nbsp;</div><div><br></div>                      \n                                          \n                                          \n                                          \n                    </div>                      \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                    ', '\n                    \n                    \n                    \n                    \n                    \n                    <div><div>Meeting ID: 999 8116 0573<br></div><div>Passcode: 650701</div></div>                      \n                                          \n                                          \n                                          \n                                          \n                                          \n                                          \n                    ', 'admin03', '223.205.57.169', 1, '2022-06-28 01:14:33', '2022-06-28 01:14:33'),
(119, 'T119', 'รายงานการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่ 1/2565', 2, '2022-02-24', '2022-02-24', '13:30:00', '16:30:00', 'ณ ห้องประชุม AG06 อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ (จังหวัดสงขลา)', 1, '875092608.ม', '', '', 'admin01', '122.154.60.1', 0, '2022-06-28 09:15:18', '2022-06-28 09:15:18'),
(130, 'T130', 'รายงานการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่ 3/2564', 2, '2022-11-18', '2022-11-18', '13:30:00', '16:48:00', 'ณ ห้องประชุม AG06 อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ มหาวิทยาลัยสงขลานครินทร์', 1, '94971572.pdf', '', '', 'admin03', '122.154.60.1', 0, '2022-06-30 11:48:36', '2022-06-30 11:48:36'),
(131, 'T131', 'รายงานการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่ 2/2564 ', 2, '2021-08-31', '2021-08-31', '13:30:00', '16:30:00', 'ณ ห้องประชุม Science Stone อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ (จังหวัดสงขลา) ', 1, '559954565.pdf', '', '', 'admin01', '122.154.60.1', 0, '2022-06-30 12:02:08', '2022-06-30 12:02:08'),
(132, 'T132', 'รายงานการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่ 1/2564 ', 2, '2021-02-23', '2021-02-23', '09:30:00', '12:30:00', 'ณ ห้องประชุม Science Stone อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ (จังหวัดสงขลา)', 1, '1121301890.pdf', '', '', 'admin01', '122.154.60.1', 0, '2022-06-30 12:03:41', '2022-06-30 12:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_back`
--

CREATE TABLE `meeting_back` (
  `t_id` int(11) NOT NULL,
  `t1` text NOT NULL,
  `t2` text NOT NULL,
  `t3` text NOT NULL,
  `t4` text NOT NULL,
  `t5` text NOT NULL,
  `t6` text NOT NULL,
  `t7` text NOT NULL,
  `t8` text NOT NULL,
  `t9` text NOT NULL,
  `t10` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t11` text NOT NULL,
  `t12` text NOT NULL,
  `t13` text NOT NULL,
  `t14` text NOT NULL,
  `t15` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t16` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t17` text NOT NULL,
  `t18` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t19` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t20` text NOT NULL,
  `t21` text NOT NULL,
  `t22` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rdoc_limit_date` date NOT NULL DEFAULT '0000-00-00',
  `date_click` date NOT NULL DEFAULT '0000-00-00',
  `p_img4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_img1` varchar(200) NOT NULL,
  `p_img2` varchar(200) NOT NULL,
  `p_img3` varbinary(200) NOT NULL,
  `pan2` enum('1','2','3','4') NOT NULL,
  `pan3` enum('1','2','3') NOT NULL,
  `pan4` enum('1','2','3','4','5','6') NOT NULL,
  `t23` text NOT NULL,
  `t24` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t25` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t26` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t27` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t28` text NOT NULL,
  `t29` text NOT NULL,
  `t30` text NOT NULL,
  `t31` text NOT NULL,
  `t32` text NOT NULL,
  `t33` text NOT NULL,
  `t34` text NOT NULL,
  `t35` text NOT NULL,
  `t36` text NOT NULL,
  `t37` text NOT NULL,
  `t38` text NOT NULL,
  `t39` text NOT NULL,
  `t40` text NOT NULL,
  `t41` text NOT NULL,
  `t42` text NOT NULL,
  `t43` text NOT NULL,
  `t44` text NOT NULL,
  `t45` text NOT NULL,
  `t46` text NOT NULL,
  `t47` text NOT NULL,
  `t48` text NOT NULL,
  `t49` text NOT NULL,
  `t50` text NOT NULL,
  `t51` text NOT NULL,
  `t52` text NOT NULL,
  `t53` text NOT NULL,
  `t54` text NOT NULL,
  `t55` text NOT NULL,
  `t56` text NOT NULL,
  `t57` text NOT NULL,
  `t58` text NOT NULL,
  `t59` text NOT NULL,
  `t60` text NOT NULL,
  `t61` text NOT NULL,
  `t62` text NOT NULL,
  `t63` text NOT NULL,
  `t64` text NOT NULL,
  `t65` text NOT NULL,
  `t66` text NOT NULL,
  `t67` text NOT NULL,
  `t68` text NOT NULL,
  `t69` text NOT NULL,
  `t70` text NOT NULL,
  `t71` text NOT NULL,
  `t72` text NOT NULL,
  `t73` text NOT NULL,
  `t74` text NOT NULL,
  `t75` text NOT NULL,
  `t76` text NOT NULL,
  `t77` text NOT NULL,
  `t78` text NOT NULL,
  `t79` text NOT NULL,
  `t80` text NOT NULL,
  `t81` text NOT NULL,
  `t82` text NOT NULL,
  `t83` text NOT NULL,
  `t84` text NOT NULL,
  `t85` text NOT NULL,
  `t86` text NOT NULL,
  `t87` text NOT NULL,
  `t88` text NOT NULL,
  `t89` text NOT NULL,
  `t90` text NOT NULL,
  `t91` text NOT NULL,
  `t92` text NOT NULL,
  `t93` text NOT NULL,
  `t94` text NOT NULL,
  `t95` text NOT NULL,
  `t96` text NOT NULL,
  `t97` text NOT NULL,
  `t98` text NOT NULL,
  `t99` text NOT NULL,
  `t100` text NOT NULL,
  `t101` text NOT NULL,
  `t102` text NOT NULL,
  `t103` text NOT NULL,
  `t104` text NOT NULL,
  `t105` text NOT NULL,
  `t106` text NOT NULL,
  `t107` text NOT NULL,
  `t108` text NOT NULL,
  `t109` text NOT NULL,
  `t110` text NOT NULL,
  `t111` text NOT NULL,
  `t112` text NOT NULL,
  `t113` text NOT NULL,
  `t114` text NOT NULL,
  `t115` text NOT NULL,
  `t116` text NOT NULL,
  `t117` text NOT NULL,
  `t118` text NOT NULL,
  `t119` text NOT NULL,
  `t120` text NOT NULL,
  `t121` text NOT NULL,
  `t122` text NOT NULL,
  `t123` text NOT NULL,
  `t124` text NOT NULL,
  `t125` text NOT NULL,
  `t126` text NOT NULL,
  `t127` text NOT NULL,
  `t128` text NOT NULL,
  `t129` text NOT NULL,
  `t130` text NOT NULL,
  `t131` text NOT NULL,
  `t132` text NOT NULL,
  `t133` text NOT NULL,
  `t134` text NOT NULL,
  `t135` text NOT NULL,
  `t136` text NOT NULL,
  `t137` text NOT NULL,
  `t138` text NOT NULL,
  `t139` text NOT NULL,
  `t140` text NOT NULL,
  `t141` text NOT NULL,
  `t142` text NOT NULL,
  `t143` text NOT NULL,
  `t144` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t145` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t146` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t147` text NOT NULL,
  `t148` text NOT NULL,
  `t149` text NOT NULL,
  `t150` text NOT NULL,
  `t151` text NOT NULL,
  `t152` text NOT NULL,
  `t153` text NOT NULL,
  `t154` text NOT NULL,
  `t155` text NOT NULL,
  `t156` text NOT NULL,
  `t157` text NOT NULL,
  `t158` text NOT NULL,
  `t159` text NOT NULL,
  `t160` text NOT NULL,
  `t161` text NOT NULL,
  `t162` text NOT NULL,
  `t163` text NOT NULL,
  `t164` text NOT NULL,
  `t165` text NOT NULL,
  `t166` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t167` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t168` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t169` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t170` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t171` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t172` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t173` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t174` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t175` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t176` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t177` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t178` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t179` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t180` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t181` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting_back`
--

INSERT INTO `meeting_back` (`t_id`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `t8`, `t9`, `t10`, `t11`, `t12`, `t13`, `t14`, `t15`, `t16`, `t17`, `t18`, `t19`, `t20`, `t21`, `t22`, `rdoc_limit_date`, `date_click`, `p_img4`, `p_img1`, `p_img2`, `p_img3`, `pan2`, `pan3`, `pan4`, `t23`, `t24`, `t25`, `t26`, `t27`, `t28`, `t29`, `t30`, `t31`, `t32`, `t33`, `t34`, `t35`, `t36`, `t37`, `t38`, `t39`, `t40`, `t41`, `t42`, `t43`, `t44`, `t45`, `t46`, `t47`, `t48`, `t49`, `t50`, `t51`, `t52`, `t53`, `t54`, `t55`, `t56`, `t57`, `t58`, `t59`, `t60`, `t61`, `t62`, `t63`, `t64`, `t65`, `t66`, `t67`, `t68`, `t69`, `t70`, `t71`, `t72`, `t73`, `t74`, `t75`, `t76`, `t77`, `t78`, `t79`, `t80`, `t81`, `t82`, `t83`, `t84`, `t85`, `t86`, `t87`, `t88`, `t89`, `t90`, `t91`, `t92`, `t93`, `t94`, `t95`, `t96`, `t97`, `t98`, `t99`, `t100`, `t101`, `t102`, `t103`, `t104`, `t105`, `t106`, `t107`, `t108`, `t109`, `t110`, `t111`, `t112`, `t113`, `t114`, `t115`, `t116`, `t117`, `t118`, `t119`, `t120`, `t121`, `t122`, `t123`, `t124`, `t125`, `t126`, `t127`, `t128`, `t129`, `t130`, `t131`, `t132`, `t133`, `t134`, `t135`, `t136`, `t137`, `t138`, `t139`, `t140`, `t141`, `t142`, `t143`, `t144`, `t145`, `t146`, `t147`, `t148`, `t149`, `t150`, `t151`, `t152`, `t153`, `t154`, `t155`, `t156`, `t157`, `t158`, `t159`, `t160`, `t161`, `t162`, `t163`, `t164`, `t165`, `t166`, `t167`, `t168`, `t169`, `t170`, `t171`, `t172`, `t173`, `t174`, `t175`, `t176`, `t177`, `t178`, `t179`, `t180`, `t181`) VALUES
(158, '01', 'ประเภทการประชุม :1', 'รายละเอียดการประชุม :2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-13', '0000-00-00', 'img4151592632320220412_154449.png', '', '', '', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, '2/2565', 'ประชุมคณะกรรมการอำนวยการ', '-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-18', '0000-00-00', 'pdf20220412_164015.pdf', '', '', '', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, '3/2565', 'ประชุมคณะกรรมการอำนวยการ', 'รายละเอียดการประชุม', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-09-15', '0000-00-00', 'pdf20220412_165932.pdf', '', '', '', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_term`
--

CREATE TABLE `meeting_term` (
  `id` int(11) NOT NULL,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `doc_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) DEFAULT NULL COMMENT 'ลำดับ',
  `topic` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'หัวข้อ',
  `top` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หัวข้อหลัก',
  `title` text COLLATE utf8_unicode_ci COMMENT 'หัวข้อ',
  `type` int(11) NOT NULL COMMENT '1=link,2=text,3=file',
  `file` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ไฟล์/url ',
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meeting_term`
--

INSERT INTO `meeting_term` (`id`, `code`, `doc_code`, `no`, `topic`, `top`, `title`, `type`, `file`, `ip`, `created_at`, `updated_at`) VALUES
(722, 'S722', 'T1', 19, '<b>เรื่องสืบเนื่อง</b>', '0', '<b>วาระที่ 4</b>', 1, '', '122.154.60.1', '2022-06-28 09:26:00', '2022-06-28 09:26:00'),
(724, 'S724', 'T1', 14, '<b>แจ้งเพื่อทราบ</b>', '0', '<b>วาระที่ 2</b>', 1, '', '122.154.60.1', '2022-06-28 09:27:35', '2022-06-28 09:27:35'),
(725, 'S725', 'T1', 18, '<b>รับรองรายงานการประชุม ครั้งที่ 1/2565</b>', '0', '<b>วาระที่ 3</b>', 3, '2054730716.pdf', '122.154.60.1', '2022-06-28 09:28:13', '2022-06-28 09:28:13'),
(726, 'S726', 'T1', 24, '<b>เรื่องเสนอเพื่อพิจารณา</b>', '0', '<b>วาระที่ 5</b>', 1, '', '122.154.60.1', '2022-06-28 09:28:46', '2022-06-28 09:28:46'),
(727, 'S727', 'T1', 26, '<b>เรื่องอื่นๆ</b>', '0', '<b>วาระที่ 6</b>', 1, '', '122.154.60.1', '2022-06-28 09:29:03', '2022-06-28 09:29:03'),
(728, 'S728', 'T1', 0, '2.1 กิจกรรมดำเนินการสำคัญของอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์<div>    ประจำเดือนมีนาคม - พฤษภาคม 2565</div>', 'S724', '', 3, '1781626203.pdf', '122.154.60.1', '2022-06-28 09:31:17', '2022-06-28 09:31:17'),
(729, 'S729', 'T1', 1, '2.2 ปฏิทินกิจกรรมสำคัญอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ประจำเดือน<div>     มิถุนายน - สิงหาคม 2565</div>', 'S724', '', 3, '571039553.pdf', '122.154.60.1', '2022-06-28 09:32:11', '2022-06-28 09:32:11'),
(730, 'S730', 'T1', 2, '2.3 ผลการดำเนินงานอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ปี 2565<div>     รอบ 6 เดือน (ตุลาคม 2564 - มีนาคม 2565)</div>', 'S724', '', 3, '1993406766.pdf', '122.154.60.1', '2022-06-28 09:38:05', '2022-06-28 09:38:05'),
(732, 'S731', 'T1', 0, '4.1 การดำเนินการตามมติที่ประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ <div>    มหาวิทยาลัยสงขลานครินทร์</div>', 'S722', '', 3, '940422827.pdf', '122.154.60.1', '2022-06-28 09:40:56', '2022-06-28 09:40:56'),
(733, 'S733', 'T1', 1, '4.2 Research and Innovation เทคโนโลยีที่สำเร็จแล้ว หรือใกล้สำเร็จ เพื่อผลักดันออกสู่ตลาด', 'S722', '', 3, '1433154419.pdf', '122.154.60.1', '2022-06-28 09:41:51', '2022-06-28 09:41:51'),
(734, 'S734', 'T1', 2, '4.3 การสร้างความร่วมมือกับบริษัทเอกชนขนาดใหญ่ระดับประเทศ', 'S722', '', 3, '432958241.pdf', '122.154.60.1', '2022-06-28 09:42:23', '2022-06-28 09:42:23'),
(735, 'S735', 'T1', 3, '4.4 การส่งเสริมและมีกระบวนการที่เพิ่มขีดความสามารถให้ SMEs เติบโตอย่างยั่งยืน', 'S722', '', 3, '1438769573.pdf', '122.154.60.1', '2022-06-28 09:43:09', '2022-06-28 09:43:09'),
(736, 'S736', 'T1', 0, '5.1 (ร่าง) แผนยุทธศาสตร์ของอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ 5 ปี<div>    (พ.ศ. 2566 - 2570)</div>', 'S726', '', 3, '1407612684.pdf', '122.154.60.1', '2022-06-28 09:44:05', '2022-06-28 09:44:05'),
(737, 'S737', 'T1', 0, '6.1 การกำหนดวันประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่ 3/2565', 'S727', '', 1, '', '122.154.60.1', '2022-06-28 09:45:00', '2022-06-28 09:45:00'),
(738, 'S738', 'T1', 13, '<b>ประธานแจ้งเพื่อทราบ</b>', '0', '<b>วาระที่ 1</b>', 1, '', '122.154.60.1', '2022-06-29 08:49:59', '2022-06-29 08:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `department` text NOT NULL,
  `position` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `status`, `department`, `position`, `line`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'admin', 'admin', '1234', 4, 'admin', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(15, 'สำนักงานกลาง', 'สำนักงานกลาง', 'office', '1234', 4, 'สำนักงานกลาง', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(21, 'sompong', 'sompong', 'sompong', 'lookpud@2009', 2, 'ฝ่ายโครงสร้างพื้นฐานเพื่อสนับสนุนการวิจัยและพัฒนาแก่ภาคเอกชน', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(28, 'sukrattajit', 'mongkhunsiricharoen', 'sukrattajit', '1234', 1, 'เจ้าหน้าที่ระบบคอมพิวเตอร์และสื่อสาร', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(30, 'sti', 'sti', 'sti', '1234', 2, 'sti', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(42, 'สุขรัฐจิต', 'มงคลศิริเจริญ', 'sukrattajit.m', '1234', 4, 'อุทยานวิทยาศาสตร์', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(43, 'Sompong', 'Petroch', 'Sompong.petr', 'lookpud@2009', 4, 'PSUSP', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(44, 'sukrattajit', 'mongkhonsiricharoen', 'sukrattajit', 'icetang', 4, 'อุทยานวิทยาศาสตร์ ม.อ.', '', '', '', '', '2022-06-21 12:48:56', '2022-06-21 12:49:23'),
(47, 'somporns', 'somporns', 'somporns', 'somporns', 2, 'somporns', 'somporns', '', '', '', '2022-06-24 12:18:12', '2022-06-24 12:18:12'),
(48, 'admin01', 'admin01', 'admin01', 'admin01', 2, 'admin01', 'admin01', '', '', '', '2022-06-24 12:24:49', '2022-06-24 12:24:49'),
(49, 'admin02', 'admin02', 'admin02', 'admin02', 2, 'admin02', 'admin02', '', '', '', '2022-06-24 12:25:10', '2022-06-24 12:25:10'),
(50, 'admin03', 'admin03', 'admin03', 'admin03', 2, 'admin03', 'admin03', '', '', '', '2022-06-24 12:25:36', '2022-06-24 12:25:36'),
(51, 'ศุภพิชญ์', 'มากแก้ว', 'supapich.m', 'pichy1234**', 2, 'อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์', 'หัวหน้าสำนักงานกลาง', '', '', '', '2022-06-24 14:01:48', '2022-06-24 14:01:48'),
(52, 'นางสาวเพ็ญพร ', 'มากจงดี', 'penporn.m', 'penporn', 2, 'สำนักงานกลาง อุทยานวิทยาศาสตร์ ม.อ.', 'เลขานุการ', '', '', '', '2022-06-24 15:22:33', '2022-06-24 15:22:33'),
(54, 'ฉัตรชัย', 'แสงนพรัตน์', 'chatchai.s', 'chat1234**', 4, 'อุทยานวิทยาศาสตร์', 'เจ้าหน้าที่ธุรการ', 'zeespy', '0919830062', 'zeeta_hi@hotmail.co.th', '2022-06-28 15:08:42', '2022-06-28 15:08:42'),
(55, 'ปภาดา', 'จันทรพัฒน์', 'sawseries', '074210099', 4, 'สำนักงานกลาง', 'จนท.ระบบงานคอมพิวเตอร์และเครือ', 'sawseries', '0824359640', 'pabhada.jan@gmail.com', '2022-06-29 12:55:35', '2022-06-29 12:55:35'),
(57, 'นิจจรีย์', 'สุวรรณชาตรี', 'nitjaree.s', 'garagate27.', 4, 'สำนักงานกลาง', 'เจ้าหน้าที่บุคคล', 'gg.garagate', '0994084174', 'nitjaree.s@psu.ac.th', '2022-06-29 15:05:32', '2022-06-29 15:05:32'),
(58, 'นิภาพร', 'จอนเจือ', 'jujub2007', 'D32009C8', 4, 'ศูนย์บ่มเพาะวิสาหกิจ อว.', 'หัวหน้าสำนักงาน(การเงินและบัญช', 'jujub2007', '0866980941', 'nipapornboonyasuwan@gmail.com', '2022-06-29 15:09:57', '2022-06-29 15:09:57'),
(59, 'ฤทัยรัตน์', 'สุขศรีสังข์', 'ruetairat.s', 'ruetairat.23', 4, 'สำนักงานกลาง', 'เจ้าหน้าที่การเงิน', 'ruetairat_bb', '0845828727', 'ruetairat.bb@gmail.com', '2022-06-29 15:42:06', '2022-06-29 15:42:06'),
(60, 'อังคณา', 'หมัดตะทวี', 'angkana.m', 'angkana.12', 4, 'อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์', 'เจ้าหน้าที่พัสดุ', 'nadoreii', '0937646161', 'angkana6871@gmail.com', '2022-06-29 15:42:18', '2022-06-29 15:42:18'),
(61, 'ผศ.คำรณ  ', 'พิทักษ์', 'kamron.p', '2500', 4, 'อุทยานวิทยาศาสตร์ ม.อ.', 'Director', 'iamkamron', '0898763076', 'kamron.p@psu.ac.th', '2022-06-29 15:45:03', '2022-06-29 15:45:03'),
(62, 'นางสาวเพ็ญพร ', 'มากจงดี', 'penporn.m', 'pen123', 4, 'สำนักงานกลาง อุทยานวิทยาศาสตร์ ม.อ.', 'เลขานุการ', 'jujub.j', '0858967854', 'penporn.m@psu.ac.th', '2022-06-29 15:51:52', '2022-06-29 15:51:52'),
(63, 'สุรัลชนา', 'ศรชัย', 'suranchana.o', 'suran4456', 4, 'สำนักงานกลาง', 'เจ้าหน้าที่บุคคล', 'plaii_far', '0947454456', 'suranchana.o@.psu.ac.th', '2022-06-29 17:09:39', '2022-06-29 17:09:39'),
(66, 'สุนทร', 'วงษ์ศิริ', 'suntorn.wa', 'joe8*ssap', 4, 'สำนักงานอธิการบดี', 'รองอธิการบดีฝ่ายวิจัยและนวัตกรรม', 'joesunton', '2819', 'joesunton@gmail.com', '2022-06-30 09:50:57', '2022-06-30 09:50:57'),
(67, 'พูลสวัสดิ์', 'เผ่าประพัธน์', 'poonsawat', 'poonsawat', 4, 'บ.ซีพี ออลล์', 'ที่ปรึกษาคณะเจ้าหน้าที่บริหาร', 'no', '020711097', 'poonsawatpho@cpall.co.th', '2022-06-30 10:24:47', '2022-06-30 10:24:47'),
(69, 'วศิน', 'สุวรรณรัตน์', 'wasin.s', 'wasin.s1331', 4, 'มหาวิทยาลัยสงขลานครินทร์', 'รองอธิการบดีวิทยาเขตหาดใหญ่', '-', '074282809', 'wasin.s@psu.ac.th', '2022-06-30 11:16:39', '2022-06-30 11:16:39'),
(71, 'ชูศักดิ์', 'ลิ่มสกุล', 'chusak.l', '142498', 4, 'สถาบันวิจัยจุฬาภรณ์', 'รองประธานกรรมการบริหาร', 'chusak.lim', '0817389696', 'chusak.l@psu.ac.th', '2022-06-30 12:04:40', '2022-06-30 12:04:40'),
(72, 'จริยา ', 'คำแหง', '่jariya.kha', 'abc123**', 4, 'อุทยานวิทยาศาสตร์ ม.อ.', 'ผู้จัดการอาวุโส', 'supergirlriya', '0651596545', 'jariya.kha8@gmail.com', '2022-06-30 13:42:27', '2022-06-30 13:42:27'),
(73, 'ฟูกิจ', 'นิลรัตน์', 'ฟูกิจ นิลรัตน์', 'tarlin', 4, 'ข้าราชการบำนาญ', 'ข้าราชการบำนาญ', 'Fukit Nilrat', '(+66) 896584319', 'fukit.n@psu.ac.th', '2022-06-30 17:41:12', '2022-06-30 17:41:12'),
(74, 'นางสาวพิมพ์ชนก', 'ทองน้อย', 'pimchanok.tho', 'pimchanok.04', 4, 'สำนักงานกลาง', 'เจ้าหน้าที่การเงิน', 'ffaleem', '0816099809', 'Pimchanok.tho@psu.ac.th', '2022-07-01 09:09:20', '2022-07-01 09:09:20'),
(75, 'Wirach', 'Taweepreda', 'wirach.t', 'Wirach1972', 4, 'Faculty of Science', 'ผู้ช่วยคณบดีฝ่ายบริการวิชาการ', '0838894155', '0838894155', 'wirach.t@psu.ac.th', '2022-07-01 10:28:56', '2022-07-01 10:28:56'),
(76, 'Chachanat', 'Thebtaranonth', 'chachanat', 'Ct2212', 4, 'NXPO', 'Advisor', 'Chachanat@gmail.com', '0818025511', 'chachanat', '2022-07-01 10:41:35', '2022-07-01 10:41:35'),
(77, 'นิคม', 'สุวรรณวร', 'nikom.s', 'eimhtsj4', 4, 'คณะวิศวกรรมศาสตร์', 'คณบดี', 'thaletech', '0850777845', 'nikom.suvonvorn@gmail.com', '2022-07-01 11:50:26', '2022-07-01 11:50:26'),
(78, 'กรรณิการ์ ', 'สหกะโร', 'kannika.sah', 'า้นืกำำ๕/ภ', 4, 'คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี', 'คณบดี', '0816799390', '0816799390', 'kannika.sah@psu.ac.th', '2022-07-01 12:09:18', '2022-07-01 12:09:18'),
(79, 'jariya', 'khamhang', 'jariya', 'jariya', 4, 'PSU Science Park', 'ผู้จัดการอาวุโส', 'supergirlriya', '0651596545', 'jariya.kha8@gmail.com', '2022-07-01 12:19:26', '2022-07-01 12:19:26'),
(80, 'ชูศักดิ์', 'ลิ่มสกุล', 'chusak.l', '142498', 4, 'สถาบันวิจัยจุฬาภรณ์', 'รองประธานกรรมการบริหารสถาบันวิจัยจุฬาภรณ์', 'chusak.lim', '0817389696', 'chusak.l@psu.ac.th', '2022-07-01 12:48:29', '2022-07-01 12:48:29'),
(81, 'Sompong', 'Petroch', 'sompong', 'lookpud2009', 4, 'อุทยานวิทยาศาสตร์', 'ผู้จัดการอาวุโส', 'redmachine77', '0814787744', 'sompong.petr@gmail.com', '2022-07-01 13:02:15', '2022-07-01 13:02:15'),
(82, 'ศุภศิลป์', 'มณีรัตน์', 'suppasil.m', 'SweetsandyTing@09', 4, 'สำนักวิจัยและพัฒนา', 'ผู้อำนวยการสำนักวิจัยและพัฒนา', 'leonidas2010', '0869654800', 'suppasil.m@psu.ac.th', '2022-07-01 13:16:45', '2022-07-01 13:16:45'),
(83, 'หทัยทิพย์', 'บุตรมณี', 'oil', 'oil', 4, 'สำนักงานความร่วมมืออุตสาหกรรม', 'หัวหน้าสำนักงานความร่วมมืออุตสาหกรรม', '-', '02-1701', 'hathaithip.b@psu.ac.th', '2022-07-01 13:32:09', '2022-07-01 13:32:09'),
(84, 'นิมิตร', 'วรกุล', 'wnimit', '721503', 4, 'คณะเภสัชศาสตร์', 'คณบดี', 'wnimit', '0897334221', 'wnimit@pharmacy.psu.ac.th', '2022-07-01 13:39:25', '2022-07-01 13:39:25'),
(85, 'วรสันติ์', 'โสภณ', 'vorasan', 'moo1dang!', 4, 'อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์', 'รองผอ.', 'moovorason', '0819197862', 'vorasan.so@gmail.com', '2022-07-01 15:54:04', '2022-07-01 15:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_back`
--
ALTER TABLE `meeting_back`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `meeting_term`
--
ALTER TABLE `meeting_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `meeting_back`
--
ALTER TABLE `meeting_back`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `meeting_term`
--
ALTER TABLE `meeting_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
