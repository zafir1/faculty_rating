
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 02:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u410837921_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating_table`
--

CREATE TABLE IF NOT EXISTS `rating_table` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `rate_value` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `rating_table`
--

INSERT INTO `rating_table` (`rating_id`, `user_id`, `teacher_id`, `rate_value`) VALUES
(2, 28, 1, 5),
(3, 28, 2, 7),
(4, 20, 3, 8),
(5, 20, 1, 5),
(6, 29, 1, 7),
(7, 30, 9, 1),
(8, 31, 1, 10),
(9, 31, 2, 7),
(10, 31, 3, 9),
(11, 35, 1, 6),
(12, 34, 1, 9),
(13, 34, 2, 7),
(14, 20, 2, 9),
(15, 38, 1, 10),
(16, 39, 1, 10),
(17, 40, 1, 10),
(18, 40, 7, 10),
(19, 47, 1, 10),
(20, 47, 7, 10),
(21, 49, 1, 10),
(22, 49, 3, 2),
(23, 49, 15, 4),
(24, 49, 16, 8),
(25, 49, 22, 4),
(26, 20, 23, 8),
(27, 20, 14, 1),
(28, 20, 20, 1),
(29, 20, 4, 8),
(37, 52, 1, 10),
(31, 52, 2, 4),
(32, 52, 3, 8),
(33, 52, 4, 7),
(34, 52, 5, 5),
(35, 52, 6, 2),
(36, 52, 7, 8),
(38, 20, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `detail_link` varchar(80) NOT NULL DEFAULT 'onlinehit.tk',
  `raters` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `average` float NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `branch`, `designation`, `contact_number`, `email`, `detail_link`, `raters`, `rating`, `average`) VALUES
(1, 'Tilak mukherjee', 'ece', 'Professor', '9988776655', 'tilakmukherjee@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Tilak_Mukherjee.htm', 12, 102, 8.5),
(2, 'Mrs. Somdutta Sinha', 'ece', 'Assistance Professor', '9988776656', 'somdutta.sinha.ecehit@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Somdutta_Sinha.htm', 5, 34, 6.8),
(3, 'Pinaki Satpathi', 'ece', 'Assistance Proffessor', '8877554411', 'pinakisatpathi@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Pinaki_Satpathy.htm', 4, 27, 6.75),
(4, 'Malay Kumar Pandit', 'ECE', 'Professor', '03224-252900', 'mkp10011@yahoo.com', 'http://hithaldia.in/faculty/ece_faculty/Malay_Kumar_Pandit.htm', 2, 15, 7.5),
(5, 'Dr. Jaydeb Bhaumik', 'ECE', 'Professor & Head', '03224-252900', 'hod.ecehit@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Jaydeb_Bhaumik.htm', 2, 10, 5),
(6, 'Sri Asim Kumar Jana', 'ECE', 'Associate Professor', '03224-252900', 'asimkjana@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Asim_Kumar_Jana.htm', 1, 2, 2),
(7, 'Sri Kushal Roy', 'ECE', 'Asst. Professor', '03224-252900', 'kushalroy1979@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Kushal_Roy.htm', 3, 28, 9.3333),
(8, 'Sri Amit Bhattacharyya', 'ECE', 'Asst. Professor', '03224-252900', 'amit_elec06@yahoo.com', 'http://hithaldia.in/faculty/ece_faculty/Amit_Bhattacharyya.htm', 0, 0, 0),
(9, 'Sri Jagannath Samanta', 'ECE', 'Assistant Professor', '03224-252900', 'jagannath19060@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Jagannath_Samanta.htm', 1, 1, 1),
(10, 'Sri Suman Paul', 'ECE', 'Assistant Professor', '03224-252900', 'paulsuman999@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Suman_Paul.htm', 0, 0, 0),
(11, 'Mr. Raj Kumar Maity', 'ECE', 'Assistant Professor', '03224-252900', 'hitece.raj@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Raj_Kumar_Maity.htm', 0, 0, 0),
(12, 'Mr. Tirthadip Sinha', 'ECE', 'Assistant Professor', '03224-252900', 'tirthadip_sinha@yahoo.co.in', 'http://hithaldia.in/faculty/ece_faculty/Tirthadip_Sinha.htm', 0, 0, 0),
(13, 'Sri Banibrata Bag', 'ECE', 'Assistance Professor', '03224-252900', 'bani305@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Banibrata_Bag.htm', 0, 0, 0),
(14, 'Mr. Surajit Mukherjee', 'ECE', 'Assistance Professor', '03224-252900', 'ece.surajit@yahoo.com', 'http://hithaldia.in/faculty/ece_faculty/Surajit_Mukherjee.htm', 1, 1, 1),
(15, 'Mr. Akinchan Das', 'ECE', 'Assistant Professor', '03224-252900', 'aki_06das@yahoo.co.in', 'http://hithaldia.in/faculty/ece_faculty/Akinchan_Das.htm', 1, 4, 4),
(16, 'Sri Dibyendu Chowdhury', 'ECE', 'Assistance Professor', '03224-252900', 'dc.ecehit@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Dibyendu_Chowdhury.htm', 1, 8, 8),
(17, 'Dr. Bishnu Prasad De', 'ECE', 'Assistant Professor', '03224-252900', 'bishnu.ece@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Bishnu_Prasad_De.htm', 0, 0, 0),
(18, 'Mr. Avishek Das', 'ECE', 'Assistant Professor', '03224-252900', 'avishek.uit.0408@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Avishek_Das.htm', 0, 0, 0),
(19, 'Mr. Avisankar Roy', 'ECE', 'Assistant Professor', '03224-252900', 'avisankar.hit@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Avisankar_Roy.htm', 0, 0, 0),
(20, 'Sri Santanu Maity', 'ECE', 'Assistant Professor', '03224-252900', 'santanu2010@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Santanu_Maity.htm', 1, 1, 1),
(21, 'Ms. Razia Sultana', 'ECE', 'Assistant Professor', '03224-252900', 'razia04@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Razia_Sultana.htm', 0, 0, 0),
(22, 'Mr. Dipak Samanta', 'ECE', 'Assistant Professor', '03224-252900', 'dipak.ecehit@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Dipak_Samanta.htm', 1, 4, 4),
(23, 'Mrs. Moumita Jana', 'ECE', 'Assistant Professor', '03224-252900', 'mou.321jana@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Moumita_Jana.htm', 1, 8, 8),
(24, 'Dr. Wriddhi Bhowmik', 'ECE', 'Assistant Professor', '03224-252900', 'bhowmikwriddhi@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Wriddhi_Bhowmik.htm', 0, 0, 0),
(25, 'Mr. Jayanta Kumar Bag', 'ECE', 'Assistant Professor', '03224-252900', 'jkbag2008@gmail.com', 'http://hithaldia.in/faculty/ece_faculty/Jayanta_Kumar_Bag.htm', 0, 0, 0),
(26, 'Ms. Sumana Mandal', 'School of Applied Science', 'Asst. Professor (Mathematics)', '+91973537981', 'sumana.mum.sm@gmail.com', 'http://hithaldia.in/faculty/sas_faculty/Ms_Sumana_Mandal/index.html', 0, 0, 0),
(27, 'DR. SUDARSHAN BARDHAN', 'School of Applied Science', 'Asst. Professor (Mathematics)', '+91943324059', 'dashu_87@yahoo.co.in', 'http://hithaldia.in/faculty/sas_faculty/Dr_Sudarshan_Bardhan/index.html', 0, 0, 0),
(28, 'Prof. A. B. Maity', 'School of Applied Science', 'Dean-School of Applied Science & Humanties', '+91943391252', 'abm_hit@yahoo.com', 'http://hithaldia.in/faculty/sas_faculty/Prof_A_B_Maity/index.html', 0, 0, 0),
(29, 'Dr. Pijus Kanti Khatua', 'School of Applied Science', 'Associate Professor', '+91963551484', 'pkkjuchem@yahoo.co.in', 'http://hithaldia.in/faculty/sas_faculty/Dr_P_K_Khatua/index.html', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  `allow_email` int(1) NOT NULL DEFAULT '1',
  `profile` varchar(55) NOT NULL DEFAULT 'images/profile/fefa696964.png',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `email_code`, `active`, `type`, `allow_email`, `profile`) VALUES
(20, 'zafir_ahmad', '5f4dcc3b5aa765d61d8327deb882cf99', 'Zafir', 'AHMAD', 'ahmadzafir@gmail.com', '27a7f90341f3e05a85c495219f17edbd', 1, 1, 1, 'images/profile/fefa696964.png'),
(21, 'nasir_zafir', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nasir', 'ahmad', 'mdnasirzan@gmail.com', '34de6195907877863692c52ee941174b', 1, 2, 0, ''),
(32, 'ayusharyan', 'd07e53988c9e3bf3a8813dee273a0bbc', 'Ayush', 'Aryan', 'ayusharyan0@gmail.com', '9c0b63efd10afd7bb5ea38ae67c65b14', 1, 0, 1, ''),
(31, 'Subho_batra', '7ed9fb4fbb7443e3bf5197df1db4bf05', 'Subhojeet', 'Saha', 'subhojeetsaha69@gmail.com', '7c2c421a0170d2f5ede52cc6c76d9f75', 1, 0, 1, ''),
(30, 'Ana2310', '97a20bf9b40e0671f71a148c75e04170', 'Anand', 'Agarwal', 'Aganand2310@gmail.com', 'd8c6f1ad1ba5731d49919024a2644ca0', 1, 0, 1, ''),
(29, 'vib', 'e10adc3949ba59abbe56e057f20f883e', 'v', 'j', 'vibhashjha75@gmail.com', 'ddd14214c05ef1107ff0e53bc4cb7be9', 1, 0, 1, ''),
(28, 'zafir_nasir', '5f4dcc3b5aa765d61d8327deb882cf99', 'ZAFIR', 'Nasir', 'zafirahmad78@gmail.com', '021f9260f789ee325e35576a5328526e', 1, 0, 1, ''),
(34, 'abhi1234', '76e3e07d735e14de9d768d8fe05c39a8', 'Abhishek', 'Kumar', 'abhiguptagolu123456789@gmail.com', '8113b779c05bfd947eb09515b22bd1be', 1, 0, 1, ''),
(33, 'Avinash', '1d981d36140488e913aa744d6e52f6ca', 'Avinash', 'Gupta', 'avigupt102@gmail.com', '58eabaca1abd625a4aa26f52aa3ee01c', 1, 0, 1, ''),
(35, 'Soujit', 'ec5ee82c25d3d4d4fc5bf8fdfad3091c', 'Soujit', 'Dutta', 'Soujitdatta@gmail.com', 'bd47af2527c2ba016407c9768dda1c20', 1, 0, 1, ''),
(37, 'nazir_ahmad', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nazir', 'ahmad', 'zafirahmad718@gmail.com', '3188f545b0492e7eefd573b47f4cb307', 0, 0, 1, 'images/profile/fefa696964.png'),
(38, 'zafir_zan', '5f4dcc3b5aa765d61d8327deb882cf99', 'zafir', 'ahmad', 'ahmadzafir0@gmail.com', '686ec69d0c288cc717a69df0d71443d0', 1, 0, 1, 'images/profile/fefa696964.png'),
(39, 'zan_family', '5f4dcc3b5aa765d61d8327deb882cf99', 'Arfun', 'Nisha', 'ahmadzafir1@gmail.com', '2295fd7ac5b6733ea1c8b225b5dcb4e8', 1, 0, 1, 'images/profile/fefa696964.png'),
(43, 'fahad_ahmad', '5f4dcc3b5aa765d61d8327deb882cf99', 'FAHAD', 'AHMAD', 'ahmadzafir00@gmail.com', 'fa3d669c06689821e3dde9889d27c441', 1, 0, 1, 'images/profile/fefa696964.png'),
(40, 'saddam_hussain', '5f4dcc3b5aa765d61d8327deb882cf99', 'Saddam', 'Hussain', 'mshussain934@gmail.com', '34ba8153a81be7b8f2010f5979373218', 1, 0, 1, 'images/profile/fefa696964.png'),
(41, 'Saran', 'f3ced47e2185f1c8c970d2c0526d6020', 'Swarndeep', 'Gupta', 'Kumarswarndeepgupta@gmail.com', '7b358218f1a97923267169a175ae10c3', 1, 0, 1, 'images/profile/fefa696964.png'),
(42, 'anandgaurav', '17d1da1c2d4a8546a69f0fab3e9f17d6', 'anand', 'gaurav', 'anandgaurav610@gmail.com', '04842b9554a743a46cf9f872ac3b437c', 1, 0, 1, 'images/profile/fefa696964.png'),
(44, 'alamarif007', 'ef22cbee172258880fd316cb2b0cd2ed', 'Arif', 'Alam', 'alamarif007@gmail.com', 'a54d9c43201ef654065057d950894943', 1, 0, 1, 'images/profile/fefa696964.png'),
(45, 'zan_family1', '5f4dcc3b5aa765d61d8327deb882cf99', 'faisal', 'ahmad', 'ahmadzafir01@gmail.com', '4bbda2c5ec2f0e2297b3ced57fec5104', 1, 0, 1, ''),
(46, 'rit', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ritika', 'Rani', 'ritikarani@gmail.com', 'a28300f34fb0bfea555789eb1383faf6', 1, 0, 1, 'images/profile/c07548ee1b.jpg'),
(47, 'Niloy', '25d55ad283aa400af464c76d713c07ad', 'Niloy', 'Mondal', 'Niloyallever@gmail.com', '26edca756df4c88365c819439928ae09', 1, 0, 1, 'images/profile/fefa696964.png'),
(48, 'Subham', '1d300ea857710d56cc79d8d9c479b277', 'Subham', 'Kumar', 'mail.subham01@gmail.com', '1233b6ca44aa626577445da4070b576d', 1, 0, 1, 'images/profile/fefa696964.png'),
(49, 'vik', '79de42be92ee0311b56902062842a109', 'VIKASH', 'kumar', 'vikashkumar28011997@gmail.com', '1bcc291e591ebd182d4dd070b7bebdba', 1, 0, 1, 'images/profile/fefa696964.png'),
(50, 'satkr', '536250f30c5cb85c68001ec0438645e9', 'Satyanand ', 'Kumar ', 'satyanand3178@gmail.com', '922d2af18dece508f770f33a19147ca8', 1, 0, 1, 'images/profile/fefa696964.png'),
(51, 'Karnkumarkivis', '580b1d3441d9ffe9b61b954658bfad63', 'Karn', 'Kumar', 'KARNKUMARKIVIS@GMAIL.COM', '58077708f9a3b6c4ff26b2508c184429', 0, 0, 1, 'images/profile/fefa696964.png'),
(52, 'zan', '482c811da5d5b4bc6d497ffa98491e38', 'RAHUL', 'kumar', 'rahulkumar@gmail.com', '518eff369914e2b8b67dd006eb483ffb', 1, 0, 1, 'images/profile/fefa696964.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
