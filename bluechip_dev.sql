-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2014 at 02:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluechip.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_30_135008_create_posts_table', 1),
('2014_06_02_141353_create_users_table', 1),
('2014_06_02_141622_add_username_to_users_table', 2),
('2014_06_02_150700_add_username_to_users_table', 3),
('2014_06_02_152507_add_height_to_users_table', 4),
('2014_06_03_022513_create_players_table', 6),
('2014_06_03_025446_create_roles_table', 7),
('2014_06_03_030337_add_role_id_users_table', 8),
('2014_06_03_123955_create_seasons_table', 10),
('2014_06_03_133220_create_seasons_table', 11),
('2014_06_03_133313_create_players_table', 11),
('2014_06_03_151602_add_password_to_players', 12),
('2014_06_03_181527_add_password_to_players_table', 13),
('2014_06_04_204315_create_create_movies_tables_table', 14),
('2014_06_04_204454_create_movies_table', 15),
('2014_06_05_024914_add_remember_token_to_users', 15),
('2014_06_05_143008_create_phones_table', 16),
('2014_06_05_155618_create_posts_table', 17),
('2014_06_05_155654_create_authors_table', 17),
('2014_06_06_144550_add_paid_to_players_table', 18),
('2014_06_13_001420_add_table_token', 19),
('2014_06_19_154556_add_columns_to_players_table', 20),
('2014_06_20_182913_add_columns_signature_date_to_players_table', 21),
('2014_08_13_160732_add_participant_to_players_table', 22),
('2014_08_18_214551_add_letter_to_players_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `parent1_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent1_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent2_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent2_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_coach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_coach_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_coach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_coach_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gpa` decimal(5,2) NOT NULL,
  `psat` int(11) NOT NULL,
  `sat_act` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faceoff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lsm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lacrosse_honors` text COLLATE utf8_unicode_ci NOT NULL,
  `other_sports` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_policy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_date` date NOT NULL,
  `player_signature_medical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_signature_medical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `player_signature_date_medical` date NOT NULL,
  `parent_signature_date_medical` date DEFAULT NULL,
  `emergency_phone1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_conditions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `school_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `committed_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_text` text COLLATE utf8_unicode_ci NOT NULL,
  `release_text_minor` text COLLATE utf8_unicode_ci NOT NULL,
  `release_i_certify` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_print_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_date_signed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_emergency_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_parent_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_parent_date_signed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `letter` text COLLATE utf8_unicode_ci NOT NULL,
  `graduation_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `player_registration_date` date NOT NULL,
  `payment_due_date` date NOT NULL,
  `check_number` int(11) NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `players_season_id_foreign` (`season_id`),
  KEY `players_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=144 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `username`, `email`, `first_name`, `last_name`, `birth_date`, `height`, `weight`, `street`, `city`, `state`, `zip`, `phone`, `season_id`, `role_id`, `parent1_name`, `parent1_email`, `parent2_name`, `parent2_email`, `school_coach`, `school_coach_phone`, `club_team`, `club_coach`, `club_coach_phone`, `gpa`, `psat`, `sat_act`, `position`, `hand`, `faceoff`, `lsm`, `lacrosse_honors`, `other_sports`, `insurance_company`, `insurance_policy`, `insurance_date`, `player_signature_medical`, `parent_signature_medical`, `player_signature_date_medical`, `parent_signature_date_medical`, `emergency_phone1`, `emergency_phone2`, `medical_conditions`, `created_at`, `updated_at`, `password`, `activated`, `paid`, `school_name`, `committed_to`, `release_text`, `release_text_minor`, `release_i_certify`, `release_print_name`, `release_date_signed`, `release_birth_date`, `release_address`, `release_email`, `release_phone`, `release_emergency_contact`, `release_parent_name`, `release_parent_date_signed`, `letter`, `graduation_year`, `comments`, `player_registration_date`, `payment_due_date`, `check_number`, `payment_amount`) VALUES
(8, 'joel', 'joel@moscreative.com', 'Joel', 'Traugott', '1985-05-05', '6.00', '0.00', 'my street', 'columbia', 'md', '21232', '2342342342', 7, 1, 'asdf', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$a35rMRT4aZGu/ySY5iOb7uAK39Hu863KoIGdb2abxctOtJ2qSjHxC', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(49, 'pioneer903', 'yuriy@moscreative.com', 'Yuriy', 'Buhaddd', '1985-05-01', '5.60', '145.00', 'Smithy sq', 'Columba', 'AL', '21061', '444 333 7777', 9, 1, 'Kolya', 'k@gmail.com', 'Sveta', 's@gmail.com', 'Max', '444 555 4444', 'Winners', 'Josh', '444 888 4445', '4.00', 5, 5, 'A', 'Right', 'No', 'No', 'Some honors', 'Volleyball', 'Progressive', '6541631', '2014-06-18', 'Yuriy', 'Buha', '2014-06-20', '2014-06-20', '4445556666', '5558888999', 'Perfect medical condition', '2014-06-03 04:00:00', '0000-00-00 00:00:00', '', 0, 0, 'Baltimore HS', 'UMBC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(53, '', 'webbuha@gmail.com', 'Gregory', 'Parker', '1985-05-01', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'AL', '21061', '4433739309', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', 'Right', 'No', 'No', '', '', '', '', '1985-05-01', '1985-05-01', '', '1985-05-01', '1985-05-01', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '\r\n                    <p><i>Please Read Carefully, Sign and Submit the form</i></p>\r\n                    <p></p><b>NCAA/HIGH SCHOOL ELIGIBILITY.</b> I understand and agree that if I am, or may become, a student-athlete I am responsible for my own eligibility and/or amateur standing. I am aware of, and agree to comply with, all applicable rules, regulations, and bylaws of my state association, the NCAA and of any other governing body ("the Rules"). I understand the consequences of any failure to comply with the Rules, included but not limited to, loss of my eligibility to participate in future athletic contests in any sport.<p></p>\r\n                    <p>For purposes of this "Participant Release" document, "Event" means the "XXX" event being held at [location name and address] on [date], any and all transportation to, from, and between Event locations, all product testing at the Event. In consideration of the opportunity to participate in the Event, I, the undersigned participant, acknowledge and agree that:</p>\r\n                    <p><b>1.  ASSUMPTION OF RISK.</b> Participation in or attendance at the Event involves inherent risks and dangers of accidents, personal and bodily injury (including death) and property loss or damage. Theme may result from my own actions or inactions, as well as the actions or inactions of others, the rules of play, and the conditions of the facilities and equipment. Further, there may be other risks not know to me and not reasonably foreseeable at this time. I have considered the nature and extent of the risks involved, and I voluntarily choose to assume all such risks, both known and unknown, even those risks that result from the negligence of the Released Parties (defined below) or other and assume full responsibility for my participation in the Event. \r\n                      <b><i> I consent to treatment in the event of an emergency or other incident in which, in the reasonable judgment of the on-site personnel, I require medical care. I further agree to pay all costs associated with such medical care and to indemnify and hold harmless the Released Parties from any costs or claims arising from such medical care.</i></b></p>\r\n                    <p><b>2.  RELEASE FROM LIABILITY.</b> I, for myself and on behalf of my heirs, estate, insurers, successors and assigns, hereby fully and forever release and discharge NIKE, Inc. and the affiliates and subsidiaries of NIKE, Inc., their respective officers, directors, shareholders, employees, agents, distributors, representatives, contractors, successors, assigns, and insurers, all Event sponsors, advertisers, volunteers, and staff, and all owners or lessors of premises used in connection with the Event (collectively the “Released Parties”) from any and all claims or causes of action  I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property relating in any way to the Event, whether arising from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.</p>\r\n                    <p><b>3.  AUTHORIZATION TO RECORD AND TO USE RECORDINGS and NAME.</b> I hereby grant to NIKE, Inc., its affiliates, subsidiaries, successors, assigns and licensees (collectively “NIKE”) permission to film, photograph, video record and otherwise record my image, voice, or any other aspects of the recording at the Event (collectively “Recording”) and the right, throughout the world, in perpetuity, to register for copyright, to use and to assign and/or license others to use all or any portion of the results thereof (or a reproduction thereof), in all media and in any manner now known or hereafter developed, in connection with the Event or otherwise without any additional consideration. I shall have no right of approval and no legal claim arising out of any use or editing of the recording or my name. NIKE shall have no obligation to use any of the rights I grant. I represent that it is not necessary for NIKE to obtain permission from or to pay any third party in connection with the rights granted in this paragraph.</p>\r\n                    <p><b>4.  LICENCE TO USE COMMENTS, FEEDBACK AND IDEAS.</b> I hereby grant to NIKE a perpetual license to use all comments, feedback and ideas I may share with them, without notice, compensation or acknowledgement to me, for any purposes whatsoever, including, but not limited to, developing, manufacturing and marketing products and services and creating, modifying or improving products and services.</p>\r\n                    <p><b>5.  ARBITRATION.</b> In the event of any dispute between me and any of the Released Parties (defined above), such dispute shall be settled by administered by the American Arbitration Association under its Commercial Arbitration Rules (but not its Procedures for Large, Complex Commercial Disputes). The hearing shall be conducted in Portland, Oregon unless both parties consent to a different location. The decision of the arbitrator shall be final and binding upon all parties, and judgment upon the award rendered pursuant to such arbitration may be entered in any court of competent jurisdiction. </p>\r\n                    <p><b>I have read this Participant Release, fully understand and agree to its terms, and understand that I am giving up substantial rights by signing it. I sign this Participant Release freely and voluntarily, without any inducement or coercion.</b></p>\r\n\r\n                  ', '\r\n                  <p>IF THE PARTICIPANT IS A MINOR, THE PARENT OR GUARDIAN MYST READ AND SIGN BELOW:</p>\r\n                  <p>I am the parent or legal guardian of the above-named participant, and I agree that the participant may take part in the Event. \r\n                    I understand that transportation may be provided, and, in the event transportation is provided, \r\n                    I consent to the participant taking the bus, car or other vehicle provided. \r\n                    On behalf of the participant, I hereby irrevocably and unconditionally \r\n                    (1) agree to all of the terms of this Participant Release, and \r\n                    (2) authorize NIKE to arrange for any necessary medical treatment for Participant.\r\n                    I also, for myself and on behalf of my heirs, estate, insurers, successors and assigns, \r\n                    hereby fully and forever release and discharge the Released Parties (defined above) from any and all claims or causes of action \r\n                    I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property, whether arising \r\n                    from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.\r\n                  </p>\r\n                ', 'I have my parent''s or legal guarian''s consent as indicated below', 'sgsdf', '2014-08-08', '', 'release address', 'email@email.com', '323-049', 'emergency name', 'Parent name release', '2014-08-29', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(54, '', 'seo@moscreative.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '', '', 'AL', '', '', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '2014-06-26 20:00:50', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(58, '', 'yuriy@moscreative.com', 'Greg', 'Parker', '2014-07-18', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'AL', '21061', '4433739309', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', 'Right', 'No', 'No', '', '', '', '', '2014-07-12', 'Yuriy', '', '2013-01-31', '2012-12-30', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(90, '', 'josh@moscreative.com', 'Josh', 'Perlow', '0000-00-00', '0.00', '0.00', '8945 guilford Rd', 'Columba', 'MD', '21061', '4433336666', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '2014-06-26 20:35:37', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(93, '', 'yuriy@moscreative.com', 'Greg', 'Parker', '2014-08-15', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'PR', '21061', '4433739309', 14, NULL, 'LAKSJDBV', 'yuriybuha@gmail.com', '', '', '', '', '', '', '', '0.00', 0, 0, 'G', 'left', 'yes', 'yes', '', '', 'Progressive', '6541631', '2014-08-23', 'Yuriy', '', '2014-08-08', '2014-08-15', '443373930922222', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '\r\n                    <p><i>Please Read Carefully, Sign and Submit the form</i></p>\r\n                    <p></p><b>NCAA/HIGH SCHOOL ELIGIBILITY.</b> I understand and agree that if I am, or may become, a student-athlete I am responsible for my own eligibility and/or amateur standing. I am aware of, and agree to comply with, all applicable rules, regulations, and bylaws of my state association, the NCAA and of any other governing body ("the Rules"). I understand the consequences of any failure to comply with the Rules, included but not limited to, loss of my eligibility to participate in future athletic contests in any sport.<p></p>\r\n                    <p>For purposes of this "Participant Release" document, "Event" means the "XXX" event being held at [location name and address] on [date], any and all transportation to, from, and between Event locations, all product testing at the Event. In consideration of the opportunity to participate in the Event, I, the undersigned participant, acknowledge and agree that:</p>\r\n                    <p><b>1.  ASSUMPTION OF RISK.</b> Participation in or attendance at the Event involves inherent risks and dangers of accidents, personal and bodily injury (including death) and property loss or damage. Theme may result from my own actions or inactions, as well as the actions or inactions of others, the rules of play, and the conditions of the facilities and equipment. Further, there may be other risks not know to me and not reasonably foreseeable at this time. I have considered the nature and extent of the risks involved, and I voluntarily choose to assume all such risks, both known and unknown, even those risks that result from the negligence of the Released Parties (defined below) or other and assume full responsibility for my participation in the Event. \r\n                      <b><i> I consent to treatment in the event of an emergency or other incident in which, in the reasonable judgment of the on-site personnel, I require medical care. I further agree to pay all costs associated with such medical care and to indemnify and hold harmless the Released Parties from any costs or claims arising from such medical care.</i></b></p>\r\n                    <p><b>2.  RELEASE FROM LIABILITY.</b> I, for myself and on behalf of my heirs, estate, insurers, successors and assigns, hereby fully and forever release and discharge NIKE, Inc. and the affiliates and subsidiaries of NIKE, Inc., their respective officers, directors, shareholders, employees, agents, distributors, representatives, contractors, successors, assigns, and insurers, all Event sponsors, advertisers, volunteers, and staff, and all owners or lessors of premises used in connection with the Event (collectively the “Released Parties”) from any and all claims or causes of action  I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property relating in any way to the Event, whether arising from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.</p>\r\n                    <p><b>3.  AUTHORIZATION TO RECORD AND TO USE RECORDINGS and NAME.</b> I hereby grant to NIKE, Inc., its affiliates, subsidiaries, successors, assigns and licensees (collectively “NIKE”) permission to film, photograph, video record and otherwise record my image, voice, or any other aspects of the recording at the Event (collectively “Recording”) and the right, throughout the world, in perpetuity, to register for copyright, to use and to assign and/or license others to use all or any portion of the results thereof (or a reproduction thereof), in all media and in any manner now known or hereafter developed, in connection with the Event or otherwise without any additional consideration. I shall have no right of approval and no legal claim arising out of any use or editing of the recording or my name. NIKE shall have no obligation to use any of the rights I grant. I represent that it is not necessary for NIKE to obtain permission from or to pay any third party in connection with the rights granted in this paragraph.</p>\r\n                    <p><b>4.  LICENCE TO USE COMMENTS, FEEDBACK AND IDEAS.</b> I hereby grant to NIKE a perpetual license to use all comments, feedback and ideas I may share with them, without notice, compensation or acknowledgement to me, for any purposes whatsoever, including, but not limited to, developing, manufacturing and marketing products and services and creating, modifying or improving products and services.</p>\r\n                    <p><b>5.  ARBITRATION.</b> In the event of any dispute between me and any of the Released Parties (defined above), such dispute shall be settled by administered by the American Arbitration Association under its Commercial Arbitration Rules (but not its Procedures for Large, Complex Commercial Disputes). The hearing shall be conducted in Portland, Oregon unless both parties consent to a different location. The decision of the arbitrator shall be final and binding upon all parties, and judgment upon the award rendered pursuant to such arbitration may be entered in any court of competent jurisdiction. </p>\r\n                    <p><b>I have read this Participant Release, fully understand and agree to its terms, and understand that I am giving up substantial rights by signing it. I sign this Participant Release freely and voluntarily, without any inducement or coercion.</b></p>\r\n\r\n                  ', '\r\n                  <p>IF THE PARTICIPANT IS A MINOR, THE PARENT OR GUARDIAN MYST READ AND SIGN BELOW:</p>\r\n                  <p>I am the parent or legal guardian of the above-named participant, and I agree that the participant may take part in the Event. \r\n                    I understand that transportation may be provided, and, in the event transportation is provided, \r\n                    I consent to the participant taking the bus, car or other vehicle provided. \r\n                    On behalf of the participant, I hereby irrevocably and unconditionally \r\n                    (1) agree to all of the terms of this Participant Release, and \r\n                    (2) authorize NIKE to arrange for any necessary medical treatment for Participant.\r\n                    I also, for myself and on behalf of my heirs, estate, insurers, successors and assigns, \r\n                    hereby fully and forever release and discharge the Released Parties (defined above) from any and all claims or causes of action \r\n                    I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property, whether arising \r\n                    from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.\r\n                  </p>\r\n                ', 'I am over the age of majority (18 years of age or older in most states)', 'Full name', '2018-02-04', '2014-08-15', '6379 SMITHY SQUARE #D, GLEN BURNIE, PR', 'yuriy@moscreative.com', '4433739309', '443373930922222', 'Parent name release', '2014-08-29', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(94, '', 'yuriy@moscreative.com', 'Greg', 'Parker', '0000-00-00', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'AL', '21061', '4433739309', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(95, '', 'yuriy@moscreative.com', 'Greg', 'Parker', '2014-07-18', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'AL', '21061', '4433739309', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', 'Right', 'No', 'No', '', '', '', '', '2014-07-18', 'Yuriy', '', '2014-07-12', '2014-07-04', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(96, '', 'yuriy@moscreative.com', 'Greg', 'Parker', '0000-00-00', '0.00', '0.00', '6379 SMITHY SQUARE #D', 'GLEN BURNIE', 'AL', '21061', '4433739309', 14, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(120, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AL', '08879', '3473951551', 12, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(121, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AL', '08879', '3473951551', 12, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(122, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(123, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(124, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(125, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(126, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(127, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(128, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(129, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '22 U Westminster Blvd.', 'South Amboy', 'AZ', '08879', '3473951551', 11, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sophomore', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(130, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(131, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(132, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(133, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(134, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(135, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(136, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(137, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(138, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(139, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(140, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(141, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(142, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00'),
(143, '', 'yuriybuha@gmail.com', 'Yuriy', 'Buha', '0000-00-00', '0.00', '0.00', '6379 D Smithy Square', 'GLEN BURNIE', 'AL', '21061', '4433739309', 15, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'freshman', '', '0000-00-00', '0000-00-00', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'manager', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'player', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grad_year` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `grad_year`, `season`, `created_at`, `updated_at`) VALUES
(1, 2018, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2018, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2019, 'Summer', '2014-06-06 00:32:14', '2014-06-06 00:32:14'),
(4, 2019, 'Fall', '2014-06-06 00:32:36', '2014-06-06 00:32:36'),
(5, 2020, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2020, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2021, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2021, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2022, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2022, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2023, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2023, 'fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2024, 'summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2024, 'fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `player_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=117 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `player_id`, `created_at`, `updated_at`) VALUES
(1, 'KryzhanovskiydRbOp', 23, '2014-06-16 17:46:28', '2014-06-16 17:46:28'),
(2, 'BuhaDN1Ne', 24, '2014-06-16 23:21:14', '2014-06-16 23:21:14'),
(4, 'Buha6NigN', 26, '2014-06-16 23:32:55', '2014-06-16 23:32:55'),
(5, 'BuhaPid65', 27, '2014-06-17 00:41:13', '2014-06-17 00:41:13'),
(6, 'Buha0Sapf', 28, '2014-06-17 00:52:32', '2014-06-17 00:52:32'),
(7, 'BugaHc5vc', 29, '2014-06-17 00:56:06', '2014-06-17 00:56:06'),
(8, 'Buga6dsAm', 30, '2014-06-17 00:57:13', '2014-06-17 00:57:13'),
(9, 'LastnameIpowt', 31, '2014-06-17 00:57:23', '2014-06-17 00:57:23'),
(10, 'LastnameCkL2N', 32, '2014-06-17 00:58:55', '2014-06-17 00:58:55'),
(11, 'LastnamepGRFi', 33, '2014-06-17 00:59:07', '2014-06-17 00:59:07'),
(12, 'LastnamejGebN', 34, '2014-06-17 01:00:33', '2014-06-17 01:00:33'),
(13, 'Lastnamem2QZv', 35, '2014-06-17 01:02:14', '2014-06-17 01:02:14'),
(14, 'LastnameFrOTu', 36, '2014-06-17 01:04:14', '2014-06-17 01:04:14'),
(16, 'Sutovaj8o3K', 38, '2014-06-17 01:09:22', '2014-06-17 01:09:22'),
(17, 'Stanelyc3ywV', 39, '2014-06-17 01:11:57', '2014-06-17 01:11:57'),
(18, 'ParkerfFTT6', 40, '2014-06-17 01:17:13', '2014-06-17 01:17:13'),
(19, 'BuhahXPx8', 41, '2014-06-18 23:30:41', '2014-06-18 23:30:41'),
(20, 'BuhaX0BKm', 42, '2014-06-18 23:34:48', '2014-06-18 23:34:48'),
(21, 'KennedyHdgmI', 43, '2014-06-19 00:05:02', '2014-06-19 00:05:02'),
(22, 'PerlownJ0nj', 44, '2014-06-19 17:01:21', '2014-06-19 17:01:21'),
(23, 'StanelyEyzVS', 45, '2014-06-19 17:27:59', '2014-06-19 17:27:59'),
(25, 'BuhawywC4', 47, '2014-06-19 17:37:29', '2014-06-19 17:37:29'),
(26, 'BuhapbL95', 48, '2014-06-19 19:31:50', '2014-06-19 19:31:50'),
(39, 'ParkerwCQk4', 62, '2014-06-23 18:37:33', '2014-06-23 18:37:33'),
(41, 'ParkerYj4Ia', 64, '2014-06-23 18:42:06', '2014-06-23 18:42:06'),
(42, 'ParkerX3orb', 65, '2014-06-23 18:48:04', '2014-06-23 18:48:04'),
(43, 'Parkerbwxkj', 66, '2014-06-23 18:51:23', '2014-06-23 18:51:23'),
(44, 'ParkerT9aha', 67, '2014-06-23 18:59:35', '2014-06-23 18:59:35'),
(45, 'ParkerlPjpT', 68, '2014-06-23 19:01:39', '2014-06-23 19:01:39'),
(46, 'ParkeraNivO', 69, '2014-06-23 19:04:51', '2014-06-23 19:04:51'),
(47, 'Parker0WaFm', 70, '2014-06-23 19:05:26', '2014-06-23 19:05:26'),
(48, 'ParkerVXqWq', 71, '2014-06-23 19:07:58', '2014-06-23 19:07:58'),
(49, 'ParkerYZKRd', 72, '2014-06-23 19:10:09', '2014-06-23 19:10:09'),
(50, 'ParkerRKAvx', 73, '2014-06-23 19:11:43', '2014-06-23 19:11:43'),
(52, 'ParkerQJdiq', 75, '2014-06-23 19:17:06', '2014-06-23 19:17:06'),
(53, 'ParkerVo3OB', 76, '2014-06-23 19:23:49', '2014-06-23 19:23:49'),
(54, 'ParkeruHsK0', 77, '2014-06-23 19:25:05', '2014-06-23 19:25:05'),
(55, 'ParkerDoitp', 78, '2014-06-23 19:25:25', '2014-06-23 19:25:25'),
(56, 'ParkerfYrGj', 79, '2014-06-23 19:26:00', '2014-06-23 19:26:00'),
(57, 'ParkerFzEOx', 80, '2014-06-23 19:26:09', '2014-06-23 19:26:09'),
(58, 'ParkerpBGJI', 81, '2014-06-23 19:26:20', '2014-06-23 19:26:20'),
(59, 'ParkerfYRS1', 82, '2014-06-23 19:26:52', '2014-06-23 19:26:52'),
(60, 'Lawbba6t', 83, '2014-06-23 19:28:43', '2014-06-23 19:28:43'),
(61, 'LawMIVk6', 84, '2014-06-23 19:29:45', '2014-06-23 19:29:45'),
(62, 'LawtEe4a', 85, '2014-06-23 19:30:20', '2014-06-23 19:30:20'),
(63, 'LawqhFa7', 86, '2014-06-23 19:32:19', '2014-06-23 19:32:19'),
(64, 'Law109Kw', 87, '2014-06-23 19:34:59', '2014-06-23 19:34:59'),
(66, 'ParkerNEA7c', 91, '2014-06-25 21:34:40', '2014-06-25 21:34:40'),
(67, 'Parkercjfbr', 93, '2014-07-11 17:39:45', '2014-07-11 17:39:45'),
(68, 'ParkerVegyX', 94, '2014-07-11 17:42:03', '2014-07-11 17:42:03'),
(69, 'ParkerICaq4', 95, '2014-07-11 17:43:00', '2014-07-11 17:43:00'),
(70, 'Parkert0Dtp', 96, '2014-07-11 17:43:32', '2014-07-11 17:43:32'),
(71, 'ParkerMZ9uS', 97, '2014-07-11 17:43:43', '2014-07-11 17:43:43'),
(72, 'ParkerhnVeX', 98, '2014-07-11 17:43:54', '2014-07-11 17:43:54'),
(73, 'Parkerkxeix', 99, '2014-07-11 17:44:09', '2014-07-11 17:44:09'),
(74, 'Parkerhblvd', 100, '2014-07-11 17:44:22', '2014-07-11 17:44:22'),
(75, 'ParkerPUeBi', 101, '2014-07-11 17:44:29', '2014-07-11 17:44:29'),
(76, 'PerlowZd3v5', 102, '2014-07-11 17:45:53', '2014-07-11 17:45:53'),
(77, 'Traugott5IehR', 104, '2014-08-19 01:13:39', '2014-08-19 01:13:39'),
(78, 'BuhaEqEuZ', 105, '2014-08-19 01:21:41', '2014-08-19 01:21:41'),
(79, 'BuhalTCVJ', 106, '2014-08-19 01:49:13', '2014-08-19 01:49:13'),
(80, 'BuhaQBBXk', 107, '2014-08-19 02:09:09', '2014-08-19 02:09:09'),
(81, 'BuhaxDeiv', 108, '2014-08-19 02:16:15', '2014-08-19 02:16:15'),
(82, 'BuhaFvf9E', 109, '2014-08-19 02:18:44', '2014-08-19 02:18:44'),
(83, 'BuhaYOpms', 110, '2014-08-19 04:19:19', '2014-08-19 04:19:19'),
(84, 'BuhaT5kUH', 111, '2014-08-19 04:19:48', '2014-08-19 04:19:48'),
(85, 'BuhaKrXtR', 112, '2014-08-19 04:19:54', '2014-08-19 04:19:54'),
(86, 'BuhamhQa7', 113, '2014-08-19 04:19:59', '2014-08-19 04:19:59'),
(87, 'BuhavfBsW', 114, '2014-08-19 04:20:04', '2014-08-19 04:20:04'),
(88, 'BuhaB4ecM', 115, '2014-08-19 04:20:15', '2014-08-19 04:20:15'),
(89, 'Buha9afwG', 116, '2014-08-19 04:41:38', '2014-08-19 04:41:38'),
(90, 'BuhaPYqt9', 117, '2014-08-19 04:42:58', '2014-08-19 04:42:58'),
(91, 'ParkerP67Q0', 118, '2014-08-19 04:44:44', '2014-08-19 04:44:44'),
(92, 'BuhadddRX5TW', 119, '2014-08-19 04:46:06', '2014-08-19 04:46:06'),
(93, 'Buha2iEYK', 120, '2014-08-19 05:24:34', '2014-08-19 05:24:34'),
(94, 'BuhaGr7PD', 121, '2014-08-19 05:37:45', '2014-08-19 05:37:45'),
(95, 'BuhazDcy2', 122, '2014-08-19 06:04:56', '2014-08-19 06:04:56'),
(96, 'BuhaSkOnJ', 123, '2014-08-19 06:07:12', '2014-08-19 06:07:12'),
(97, 'BuhaCNgGn', 124, '2014-08-19 06:07:33', '2014-08-19 06:07:33'),
(98, 'BuhaNxIqc', 125, '2014-08-19 06:08:00', '2014-08-19 06:08:00'),
(99, 'BuhaljmTf', 126, '2014-08-19 06:08:24', '2014-08-19 06:08:24'),
(100, 'BuhaniUVf', 127, '2014-08-19 06:10:42', '2014-08-19 06:10:42'),
(101, 'BuhaZ0hIK', 128, '2014-08-19 06:11:20', '2014-08-19 06:11:20'),
(102, 'BuhawH292', 129, '2014-08-19 06:12:06', '2014-08-19 06:12:06'),
(103, 'Buha3zxCt', 130, '2014-08-19 06:12:59', '2014-08-19 06:12:59'),
(104, 'BuhasEJi8', 131, '2014-08-19 06:13:11', '2014-08-19 06:13:11'),
(105, 'BuhaDEFUY', 132, '2014-08-19 06:13:20', '2014-08-19 06:13:20'),
(106, 'Buhal9G9X', 133, '2014-08-19 06:15:15', '2014-08-19 06:15:15'),
(107, 'BuhaVjEk9', 134, '2014-08-19 06:15:27', '2014-08-19 06:15:27'),
(108, 'Buha8Bkv2', 135, '2014-08-19 06:15:41', '2014-08-19 06:15:41'),
(109, 'Buha4983j', 136, '2014-08-19 06:16:14', '2014-08-19 06:16:14'),
(110, 'Buhaafoeb', 137, '2014-08-19 06:17:22', '2014-08-19 06:17:22'),
(111, 'BuhawwKEj', 138, '2014-08-19 06:17:53', '2014-08-19 06:17:53'),
(112, 'BuhadWeoD', 139, '2014-08-19 06:18:40', '2014-08-19 06:18:40'),
(113, 'BuhafT2pO', 140, '2014-08-19 06:18:52', '2014-08-19 06:18:52'),
(114, 'BuhavCBTg', 141, '2014-08-19 06:19:58', '2014-08-19 06:19:58'),
(115, 'Buha7Xbwe', 142, '2014-08-19 06:21:58', '2014-08-19 06:21:58'),
(116, 'BuhaupMbZ', 143, '2014-08-19 06:22:09', '2014-08-19 06:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `birth_date`, `created_at`, `updated_at`, `street`, `username`, `height`, `role_id`, `remember_token`) VALUES
(14, 'admin@localhost', '$2y$10$PdubqxeMoP9yOQ5p78xE6Oi.b2BYSyjXRmfZz6vQ5yxdT7SsVmVH2', 'Administrator', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'admin', '0.00', NULL, 'qZositpON4LRPnoyUGMCjIWxZ56evX16IsgRWYzhfFFeY3O6QD7CkrdVtdO6');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `players_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
