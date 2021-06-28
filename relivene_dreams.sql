-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2021 at 04:50 PM
-- Server version: 10.3.29-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relivene_dreams`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `session`, `year`, `created_at`, `updated_at`) VALUES
(1, '2021', '2021 - 2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `subject_id`, `teacher_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(2, 2, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(3, 3, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(4, 4, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(5, 5, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(6, 6, 2, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(7, 7, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39'),
(8, 8, NULL, 5, '2021-05-17 11:13:39', '2021-05-17 11:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `bank_cash_accounts`
--

CREATE TABLE `bank_cash_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Others', 'others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_days`
--

CREATE TABLE `class_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_days`
--

INSERT INTO `class_days` (`id`, `day`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', 1, NULL, NULL),
(2, 'Monday', 1, NULL, NULL),
(3, 'Tuesday', 1, NULL, NULL),
(4, 'Wednesday', 1, NULL, NULL),
(5, 'Thursday', 1, NULL, NULL),
(6, 'Friday', 1, NULL, NULL),
(7, 'Saturday', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_routines`
--

CREATE TABLE `class_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_taken` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mike Keat', 'no-reply@google.com', 'whitehat monthly SEO plans', '83672367865', 'Hi there \r\n \r\nI have just checked  dreamsacademy.edu.np for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Keat\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 0, '2021-05-10 19:38:30', '2021-05-10 19:38:30'),
(2, 'Mike Dyson', 'no-replyGloro@gmail.com', 'Local SEO for more business', '81797234816', 'Good Day \r\n \r\nI have just took an in depth look on your  dreamsacademy.edu.np for  the current Local search visibility and seen that your website could use a boost. \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart increasing your local visibility with us, today! \r\n \r\nregards \r\nMike Dyson\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', 0, '2021-05-13 19:51:35', '2021-05-13 19:51:35'),
(3, 'Mazlan Selvi', 'no-replyDen@gmail.com', 'Please I need your urgent response', '87488573685', 'Dear Friend, \r\n \r\nMy names are Mr. Mezlan Selvi, a lawyer base in Kuala Lumpur - Malaysia. I have previously sent you an email regarding a transaction of US$13.5 Million left behind by my late client before his tragic death but no response from you. \r\n \r\nHowever, I am contacting you once again with strong believe that you will work /partner with me to execute this business transaction in good faith. Please if you are interested in proceeding with me, kindly respond to me via my private email mselvi@ponnusamylawassociates-my.com for more detailed information. \r\n \r\nAs a matter of fact, this transaction is 100% risk free and I look forward to your acknowledgement. \r\n \r\nRegards, \r\nMr. Mazlan Selvi \r\nEmail: mselvi@ponnusamylawassociates-my.com', 0, '2021-05-14 00:20:47', '2021-05-14 00:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` timestamp NULL DEFAULT NULL,
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `ending_time` time DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_student` int(11) DEFAULT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `summary`, `category_id`, `price`, `description`, `starting_date`, `schedule`, `starting_time`, `ending_time`, `duration`, `total_credit`, `max_student`, `feature_image`, `view_count`, `seo_meta_keywords`, `seo_meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Housekeeping Attendant (Room boy/maid)', 'housekeeping-attendant-room-boy-maid', 'Effective housekeeping can help control or eliminate workplace hazards. Poor housekeeping practices frequently contribute to incidents.', 1, NULL, '<p>Effective housekeeping can help control or eliminate workplace hazards. Poor housekeeping practices frequently contribute to incidents. If the sight of paper, debris, clutter, and spills is accepted as normal, then other more serious hazards may be taken for granted. Housekeeping is not just cleanliness. It includes keeping work areas neat and orderly, maintaining halls and floors free of slip and trip hazards, and removing waste materials (e.g., paper, cardboard) and other fire hazards from work areas. It also requires paying attention to important details such as the layout of the whole workplace, aisle marking, the adequacy of storage facilities, and maintenance. Good housekeeping is also a basic part of incident and fire prevention. Effective housekeeping is an ongoing operation: it is not a one-time or hit-and-miss cleanup done occasionally. Periodic \"panic\" cleanups are costly and ineffective in reducing incidents<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/98b4dac0-ad41-4b33-afea-888155a63916.jpg', 0, NULL, NULL, 1, '2021-05-07 15:07:07', '2021-05-10 13:23:34'),
(2, 'Waiter/Waitress', 'waiter-waitress', 'Being a good restaurant waiter/ess takes more than a smile and coordination for handling dinner plates.', 1, NULL, '<p>Being a good restaurant waiter/ess takes more than a smile and coordination for handling dinner plates. Initially, restaurant patrons might choose a place to eat based on the restaurant\'s reputation, location, and reviews they read about the quality of food. However, when they receive good service from a staff who enjoys what they do for a living, it makes the experience worth returning for and an experience they\'ll recommend to friends. Provide good service to fellow employees as well -- being good also means being a reliable and helpful co-worker.<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/3880e5ed-1c80-419e-bf1c-4af873fe7df7.jpg', 0, NULL, NULL, 1, '2021-05-07 15:08:47', '2021-05-10 13:24:24'),
(3, 'Barista', 'barista', 'A barista is a person who prepares and also generally serves espresso-based coffee drinks. In the United States, the term barista is also often applied to coffee shop employees who prepare both espresso and regular coffee drinks.', 1, NULL, '<p>A barista is a person who prepares and also generally serves espresso-based coffee drinks. In the United States, the term barista is also often applied to coffee shop employees who prepare both espresso and regular coffee drinks. Although the term barista technically refers to someone who has been professionally trained in preparing espresso, it may also be used to describe anyone with a high level of skill in making espresso shots and espresso drinks, such as lattes and cappuccinos.<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/48092a10-6d04-47b8-b43d-5ed7179ef908.jpg', 0, NULL, NULL, 1, '2021-05-07 15:09:38', '2021-05-07 15:09:38'),
(4, 'Cooking (Assistant cook/commis III)', 'cooking-assistant-cook-commis-iii', 'Cooking or cookery is the art, science, and craft of using heat to prepare food for consumption.', 1, NULL, '<p>sxf</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/92ff6541-6dfd-4d74-a053-a26afad1b28e.jpg', 0, NULL, NULL, 1, '2021-05-10 13:37:27', '2021-05-10 13:37:27'),
(5, 'Diploma in Hospitality and Tourism Management', 'DHM', 'Trained to develop higher-level skills in managing tourism & hospitality organizations', 1, NULL, '<p>This program aims to help students to develop their understanding of management in the</p><p>context of the hospitality industry. It will give you an overview of the hospitality industry. It will</p><p>equip you to find employment with junior management prospects particularly in the hospitality</p><p>industry sector or to continue your professional or academic studies in the related field.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/0bf95f97-0e10-47bf-878e-7323e909b665.jpg', 0, NULL, NULL, 1, '2021-05-10 13:41:03', '2021-05-10 14:20:16'),
(6, 'Advance Diploma in Hospitality and Tourism Management', 'ADHM', 'In order to manage a hotel successfully, you will need a certain set of skills as well as managerial knowledge. In this you will get detailed information on how to get started in the hotel management business.', 1, NULL, '<p><span style=\"color: rgb(58, 77, 84); font-family: Rubik, sans-serif; font-size: 16px;\">&nbsp;ADHM course provides in-depth lab based foundation for students to acquire the required knowledge and skill standards in the operational areas of food production, food and beverage service, catering, front office operation and housekeeping.</span><br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'courses/328da204-b3e8-4291-8727-8007e6901d6f.jpg', 0, NULL, NULL, 1, '2021-05-10 13:59:47', '2021-05-10 13:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `course_applications`
--

CREATE TABLE `course_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Others', 'others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_comments`
--

CREATE TABLE `course_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `document_name`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 'Routine', 'downloads/02844e08-4ef0-4e20-960f-dfaa624c8745.jpg', '2021-05-17 11:19:30', '2021-05-17 11:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` timestamp NULL DEFAULT NULL,
  `ending_date` timestamp NULL DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_candidates`
--

CREATE TABLE `event_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_speakers`
--

CREATE TABLE `event_speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendances`
--

CREATE TABLE `exam_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_categories`
--

CREATE TABLE `faculty_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_categories`
--

INSERT INTO `faculty_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Account Executive', 'Accountant', '2021-05-10 10:48:03', '2021-05-10 11:25:13'),
(2, 'Administrative Officer', 'administrative-officer', '2021-05-10 11:00:11', '2021-05-10 11:00:11'),
(3, 'Front Desk Officer', 'F/O', '2021-05-10 11:00:52', '2021-05-10 11:00:52'),
(4, 'Executive Director', 'executive-director', '2021-05-10 11:01:58', '2021-05-10 11:10:51'),
(5, 'Chairman', 'chairman', '2021-05-10 11:03:49', '2021-05-10 11:03:49'),
(6, 'Academic Director', 'academic-director', '2021-05-10 11:06:24', '2021-05-10 11:09:40'),
(7, 'Operation Director', 'operation-director', '2021-05-10 11:08:13', '2021-05-10 11:08:13'),
(8, 'Receptionist', 'receptionist', '2021-05-10 11:11:14', '2021-05-10 11:11:14'),
(9, 'Program Co-ordinator', 'program coordinator', '2021-05-10 11:11:41', '2021-05-10 11:11:41'),
(10, 'International Academic Facilitator', 'international-academic-coordinator', '2021-05-10 11:12:25', '2021-05-10 11:27:23'),
(11, 'Faculties', 'faculties', '2021-05-10 11:14:07', '2021-05-10 11:14:07'),
(12, 'Advisors', 'advisors', '2021-05-10 11:14:22', '2021-05-10 11:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(11) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `name`, `slug`, `position_id`, `details`, `photo`, `facebook`, `twitter`, `instagram`, `skype`, `created_at`, `updated_at`) VALUES
(1, 'Anju Bista', 'anju-bista-Adhikari', 1, NULL, 'teams/66f99db2-28ff-4144-8226-26abc7b783e2.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:30:54', '2021-05-10 11:31:15'),
(2, 'Narottam Adhikari', 'narottam-adhikari', 6, NULL, 'teams/aba4a2f0-a601-4767-a8dd-4baa5a9dfe4c.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:34:15', '2021-05-10 11:40:42'),
(5, 'Jitendra Babu Mahato', 'Jitu', 7, NULL, 'teams/981970a2-73bd-4ba6-ad16-6105310e531a.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:37:17', '2021-05-10 11:40:00'),
(6, 'Basanta Ghimire', 'basanta-ghimire', 10, NULL, 'teams/22747a0d-2d7e-498e-b288-a85689df7710.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:38:03', '2021-05-10 11:39:42'),
(7, 'Girish Dhungel', 'girish-dhungel', 4, NULL, 'teams/4b722cfb-3f7e-4f5e-a273-276aa2d5060d.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:41:27', '2021-05-10 12:55:01'),
(8, 'Milan Bista', 'milan-bista', 12, NULL, 'teams/2e974d34-432a-4c53-b9b1-38d6333b6936.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:42:00', '2021-05-10 11:42:00'),
(9, 'Kunal Rai', 'kunal-rai', 12, NULL, 'teams/06e60140-2f80-40fd-b415-7facafb893dc.jpg', NULL, NULL, NULL, NULL, '2021-05-10 11:42:27', '2021-05-10 11:42:27'),
(10, 'Laxmi Pyakurel', 'laxmi-pyakurel-Dhungel', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 12:45:58', '2021-05-10 12:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`id`, `fee_type`, `fee_code`, `note`, `created_at`, `updated_at`) VALUES
(1, 'DHM Installment', 'DHMI', NULL, '2021-05-10 11:29:02', '2021-05-10 11:29:02'),
(2, 'Advance Diploma Installment', 'ADHMI', NULL, '2021-05-10 11:29:30', '2021-05-10 11:29:30'),
(3, 'Short Term Course', 'STCI', NULL, '2021-05-10 11:29:51', '2021-05-10 11:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Others', 'others', NULL, NULL),
(2, 'Services', 'services', '2021-05-07 15:22:50', '2021-05-07 15:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `folder_id`, `image`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 2, '/52255560-1fdd-4a12-9479-700392e74b24.jpg', NULL, '2021-05-07 15:23:23', '2021-05-07 15:23:23'),
(2, 1, '/721492f3-bbc4-4b8a-a830-849a2e56b7a3.jpg', NULL, '2021-05-07 15:23:48', '2021-05-07 15:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks_from` decimal(8,2) NOT NULL,
  `marks_to` decimal(8,2) NOT NULL,
  `point` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `candidate` decimal(10,2) DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_candidates`
--

CREATE TABLE `job_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mark_details`
--

CREATE TABLE `mark_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mark_id` int(11) NOT NULL,
  `mark_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_value` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mark_distributions`
--

CREATE TABLE `mark_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mark_distribution_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_percentage` decimal(8,2) NOT NULL,
  `is_exam` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_active` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_15_033855_laratrust_setup_tables', 1),
(5, '2021_02_15_053625_create_contacts_table', 1),
(6, '2021_02_15_054300_create_settings_table', 1),
(7, '2021_02_15_103041_create_posts_table', 1),
(8, '2021_02_15_103233_create_categories_table', 1),
(9, '2021_02_15_103311_create_comments_table', 1),
(10, '2021_02_15_103348_create_tags_table', 1),
(11, '2021_03_03_015354_create_courses_table', 1),
(12, '2021_03_03_015628_create_course_categories_table', 1),
(13, '2021_03_03_100754_create_folders_table', 1),
(14, '2021_03_03_100940_create_galleries_table', 1),
(15, '2021_03_03_143224_create_notices_table', 1),
(16, '2021_03_06_151848_create_events_table', 1),
(17, '2021_03_06_152323_create_event_candidates_table', 1),
(18, '2021_03_06_152343_create_event_speakers_table', 1),
(19, '2021_03_22_202417_create_course_applications_table', 1),
(20, '2021_03_22_211622_create_faqs_table', 1),
(21, '2021_03_23_132039_create_jobs_table', 1),
(22, '2021_03_24_101807_create_notifications_table', 1),
(23, '2021_03_25_095759_create_plugins_table', 1),
(24, '2021_03_25_100342_create_sliders_table', 1),
(25, '2021_03_27_190452_create_user_notices_table', 1),
(26, '2021_03_31_112626_create_sections_table', 1),
(27, '2021_03_31_113042_create_assign_subjects_table', 1),
(28, '2021_03_31_113306_create_subjects_table', 1),
(29, '2021_03_31_113452_create_class_routines_table', 1),
(30, '2021_03_31_113608_create_class_days_table', 1),
(31, '2021_03_31_131950_create_parents_table', 1),
(32, '2021_03_31_132733_create_students_table', 1),
(33, '2021_03_31_135505_create_student_sessions_table', 1),
(34, '2021_03_31_144124_create_picklists_table', 1),
(35, '2021_04_01_023535_create_assignments_table', 1),
(36, '2021_04_01_023633_create_student_attendances_table', 1),
(37, '2021_04_01_023656_create_staff_attendances_table', 1),
(38, '2021_04_01_124628_create_assign_students_table', 1),
(39, '2021_04_01_124646_create_student_assignments_table', 1),
(40, '2021_04_01_130959_create_share_files_table', 1),
(41, '2021_04_01_141101_create_academic_years_table', 1),
(42, '2021_04_01_150627_create_exams_table', 1),
(43, '2021_04_01_150651_create_exam_attendances_table', 1),
(44, '2021_04_01_150714_create_exam_schedules_table', 1),
(45, '2021_04_01_163004_create_marks_table', 1),
(46, '2021_04_01_163020_create_mark_details_table', 1),
(47, '2021_04_01_163040_create_mark_distributions_table', 1),
(48, '2021_04_01_180915_create_grades_table', 1),
(49, '2021_04_02_063001_create_transactions_table', 1),
(50, '2021_04_02_063256_create_chart_of_accounts_table', 1),
(51, '2021_04_02_063356_create_fee_types_table', 1),
(52, '2021_04_02_063418_create_payee_payers_table', 1),
(53, '2021_04_02_063431_create_payment_methods_table', 1),
(54, '2021_04_02_063459_create_student_payments_table', 1),
(55, '2021_04_02_063749_create_invoices_table', 1),
(56, '2021_04_02_063823_create_invoice_items_table', 1),
(57, '2021_04_02_063922_create_bank_cash_accounts_table', 1),
(58, '2021_04_02_181240_create_syllabus_table', 1),
(59, '2021_04_02_200613_create_messages_table', 1),
(60, '2021_04_02_200747_create_user_messages_table', 1),
(61, '2021_04_04_011014_create_invoice_payments_table', 1),
(62, '2021_04_11_115104_create_testimonials_table', 1),
(63, '2021_04_11_212238_create_faculty_members_table', 1),
(64, '2021_04_30_113656_create_faculty_categories_table', 1),
(65, '2021_04_30_193151_create_appointments_table', 1),
(66, '2021_05_03_112520_create_emails_table', 1),
(67, '2021_05_03_203654_create_applications_table', 1),
(68, '2021_05_03_203739_create_downloads_table', 1),
(69, '2021_05_05_162200_create_visitors_table', 1),
(70, '2021_05_05_162239_create_phone_call_logs_table', 1),
(71, '2021_05_05_162340_create_complains_table', 1),
(72, '2021_05_05_162457_create_postal_receives_table', 1),
(73, '2021_05_10_161559_create_student_requests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice_comments`
--

CREATE TABLE `notice_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_id` int(11) NOT NULL,
  `notice_comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(255) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payee_payers`
--

CREATE TABLE `payee_payers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'crud-admin-assign-subject', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(2, 'crud-admin-class-routine', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(3, 'crud-admin-section', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(4, 'crud-admin-subject', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(5, 'crud-admin-syllabus', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(6, 'crud-admin-application-request', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(7, 'crud-admin-assignment', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(8, 'crud-admin-blog', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(9, 'crud-admin-blog-category', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(10, 'crud-admin-blog-comment', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(11, 'crud-admin-course', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(12, 'crud-admin-course-category', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(13, 'crud-admin-benefit', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(14, 'crud-admin-download', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(15, 'crud-admin-faculty-category', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(16, 'crud-admin-faculty-member', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(17, 'crud-admin-folder', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(18, 'crud-admin-gallery', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(19, 'crud-admin-journey', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(20, 'crud-admin-plugins', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(21, 'crud-admin-settings', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(22, 'crud-admin-slider', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(23, 'crud-admin-testimonial', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(24, 'crud-admin-faq', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(25, 'crud-admin-event', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(26, 'crud-admin-event-candidate', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(27, 'crud-admin-event-speaker', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(28, 'crud-admin-exam', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(29, 'crud-admin-job', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(30, 'crud-admin-job-application', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(31, 'crud-admin-grade', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(32, 'crud-admin-mark', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(33, 'crud-admin-mark-distribution', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(34, 'crud-admin-notice', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(35, 'crud-admin-about', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(36, 'crud-admin-sharefile', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(37, 'crud-admin-user', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(38, 'crud-admin-academic-year', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(39, 'crud-admin-picklist', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(40, 'crud-admin-utility', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(41, 'crud-admin-appointment', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(42, 'crud-admin-email', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(43, 'crud-admin-contact', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(44, 'crud-admin-course-comments', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(45, 'crud-admin-course-application', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(46, 'crud-admin-attendance', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(47, 'crud-admin-complaint', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(48, 'crud-admin-dispatch', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(49, 'crud-admin-general-calls', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(50, 'crud-admin-visitors', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(51, 'crud-admin-student', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(52, 'crud-admin-teacher', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(53, 'crud-admin-parent', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(54, 'crud-admin-account', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(55, 'crud-admin-transactions', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(56, 'crud-admin-payee-payers', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(57, 'crud-admin-payments', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(58, 'crud-admin-requests', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(59, 'crud-admin-chart-of-accounts', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(60, 'crud-admin-fee-types', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(61, 'crud-admin-invoices', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(62, 'crud-admin-student-payments', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(63, 'crud-admin-attendance-report', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(64, 'crud-admin-reports', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(65, 'crud-teacher', NULL, NULL, '2021-05-17 08:15:34', '2021-05-17 08:15:34'),
(66, 'crud-parent', NULL, NULL, '2021-05-17 08:15:35', '2021-05-17 08:15:35'),
(67, 'crud-student', NULL, NULL, '2021-05-17 08:15:35', '2021-05-17 08:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 6),
(42, 1),
(42, 6),
(43, 1),
(43, 6),
(44, 1),
(44, 6),
(45, 1),
(45, 6),
(46, 1),
(46, 6),
(47, 1),
(47, 6),
(48, 1),
(48, 6),
(49, 1),
(49, 6),
(50, 1),
(50, 6),
(51, 1),
(51, 5),
(51, 6),
(52, 1),
(52, 5),
(52, 6),
(53, 1),
(53, 5),
(53, 6),
(54, 1),
(54, 5),
(54, 6),
(55, 1),
(55, 5),
(55, 6),
(56, 1),
(56, 5),
(56, 6),
(57, 1),
(57, 5),
(57, 6),
(58, 1),
(58, 5),
(58, 6),
(59, 1),
(59, 5),
(59, 6),
(60, 1),
(60, 5),
(60, 6),
(61, 1),
(61, 5),
(61, 6),
(62, 1),
(62, 5),
(62, 6),
(63, 1),
(63, 5),
(63, 6),
(64, 1),
(64, 5),
(64, 6),
(65, 2),
(66, 4),
(67, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_call_logs`
--

CREATE TABLE `phone_call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `call_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picklists`
--

CREATE TABLE `picklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `picklists`
--

INSERT INTO `picklists` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Religion', 'Hindu', NULL, NULL),
(2, 'Religion', 'Christian', NULL, NULL),
(3, 'Religion', 'Muslim', NULL, NULL),
(4, '', 'Jain', '2021-05-10 14:38:02', '2021-05-10 14:38:02'),
(5, '', 'Buddhist', '2021-05-10 14:38:10', '2021-05-10 14:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postal_receives`
--

CREATE TABLE `postal_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `first_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourth_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `slug`, `summary`, `description`, `feature_image`, `youtube`, `seo_meta_keywords`, `seo_meta_description`, `published_at`, `category_id`, `view_count`, `first_image`, `second_image`, `third_image`, `fourth_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Welcome to Our Website', 'welcome-to-our-website', 'Dreams Academy of Professional Studies (DAPS) is duly registered with the Nepal government as an institution in hospitality and is established by a group of dynamic professionals in the heart of Kathmandu valley in 2020.', '<p>Dreams Academy of Professional Studies&nbsp;(DAPS) is duly registered with the Nepal government as an institution in hospitality and is established by a group of dynamic professionals in the heart of Kathmandu valley in 2020.&nbsp; It is authorized to provide vocational training related to Hospitality, Tourism, and Overseas packages.DAPS also provides special training on special demand.&nbsp; DAPS is providing Cook ( Food Production), Bakery, Housekeeping, Front Office, Bartender, Waiter/ess, Care Giver, etc training .DAPS provides the most modern facilities and resources for its students. We have developed the training methodology in a scientific and result-oriented way that is based on lectures, exercise, interactive discussion, weekly debate, fortnightly assessment, etc</p>', 'blogs/bd4635ac-67ae-4482-9375-0317f4f360ea.jpg', NULL, NULL, NULL, '2021-04-24 05:54:00', 1, 5, NULL, NULL, NULL, NULL, NULL, '2021-05-07 15:11:45', '2021-05-18 13:18:36'),
(2, 1, 'Online Class', 'online-class', 'DAPS is going to run online session.', '<p>As per the governmental directives, this is notified to all the concerned including faculties, non-teaching staff, students, and guardians/parents that the college administration shall remain closed from 2078-01-16 Thursday until further notice. All the classroom learning and teaching activities will be continued through the online sessions.</p>', 'blogs/383db48c-f32c-42c4-a84d-1cc978f2fbcf.jpg', NULL, NULL, NULL, '2021-04-27 15:48:00', 1, 2, NULL, NULL, NULL, NULL, NULL, '2021-05-07 15:13:43', '2021-05-17 07:44:20'),
(3, 1, 'Registration form submission', 'registration-form-submission', 'Registration form', '<p>Respected Students and Faculties:<br />Please be informed for 1 days off ( i.e. 15th Baishak, 2078) as the Nepal Government is about to enforce Prohibitory orders for a week in Kathmandu Valley from 16th Baishak and we will be commencing online class through Microsoft Team from 16th Baisakh 2078.<br />All the students are requested to fill their registration form and submit to college administration till friday i.e17th Baisakh 2078 via physically or email(infodreamscollege@gmail.com)as well as clear your dues to be registered in the university,before submitting the registration form.<br />Contact college administration in case of any difficulties(9851037862,9841488039,9801401495)<br />Stay safe.<br />Thank you!<br />DREAMS ACADEMY OF PROFESSIONAL STUDIES</p>', 'blogs/549a65e1-dd7e-40cc-af13-2dba51f8e47f.jpg', NULL, NULL, NULL, '2021-04-27 15:52:00', 1, 2, NULL, NULL, NULL, NULL, NULL, '2021-05-07 15:15:03', '2021-05-12 18:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2021-05-07 14:53:08', '2021-05-07 14:53:08'),
(2, 'teacher', 'Teacher', NULL, '2021-05-07 14:53:08', '2021-05-07 14:53:08'),
(3, 'student', 'Student', NULL, '2021-05-07 14:53:08', '2021-05-07 14:53:08'),
(4, 'guardian', 'Guardian', NULL, '2021-05-07 14:53:09', '2021-05-07 14:53:09'),
(5, 'accountant', 'Accountant', NULL, '2021-05-07 14:53:09', '2021-05-07 14:53:09'),
(6, 'receptionist', 'Receptionist', NULL, '2021-05-07 14:53:09', '2021-05-07 14:53:09'),
(7, 'user', 'User', NULL, '2021-05-07 14:53:09', '2021-05-07 14:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(4, 14, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 3, 1, '2021-05-10 17:33:09', '2021-05-10 17:33:09'),
(2, 'A', 1, 1, '2021-05-14 13:24:33', '2021-05-14 13:24:33'),
(3, 'A', 2, 1, '2021-05-14 13:24:42', '2021-05-14 13:24:42'),
(4, 'A', 4, 1, '2021-05-14 13:24:52', '2021-05-14 13:24:52'),
(5, 'A', 5, 1, '2021-05-14 13:25:05', '2021-05-14 13:25:05'),
(6, 'A', 6, 1, '2021-05-14 13:25:31', '2021-05-14 13:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'academic_years', '1', NULL, NULL),
(2, 'currency_symbol', 'Rs', NULL, NULL),
(3, 'official_email', 'info@dreamsacademy.edu.np', NULL, NULL),
(4, 'official_phone', '9841488039', NULL, NULL),
(5, 'facebook', 'https://www.facebook.com/Dreams-Academy-100622115322763', NULL, NULL),
(6, 'youtube', 'https://www.youtube.com/channel/UCCXaeuXnwegNccLLwoT32vQ', NULL, NULL),
(7, 'instagram', 'https://www.instagram.com/merodukkan/', NULL, NULL),
(8, 'title', 'Dreams Academy of Professional Studies', NULL, NULL),
(9, 'seo_meta_keywords', 'Dreams Academy of Professional Studies', NULL, NULL),
(10, 'seo_meta_description', 'Dreams Academy of Professional Studies', NULL, NULL),
(11, 'image', 'logo_meta.png', NULL, NULL),
(12, 'copyright', '&copy; 2020 Dreams Academy of Professional Studies. All Rights Reserved', NULL, NULL),
(13, 'welcome_txt', 'Dreams Academy of Professional Studies', NULL, NULL),
(14, 'favicon', 'fav.png', NULL, NULL),
(15, 'landline', '01-4471468', NULL, NULL),
(16, 'map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31708841359!2d85.26238631863856!3d27.708954344415975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19fc216fa22f%3A0x27f767f0e5e149e9!2sDreams%20Academy%20of%20Professional%20Studies!5e0!3m2!1sen!2snp!4v1620406157965!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, NULL),
(17, 'address', 'Prabachan Marg, Old Baneshwor, Kathmandu', NULL, NULL),
(18, 'office_email', 'info@dreamsacademy.edu.np', NULL, NULL),
(19, 'from_name', 'Dreams Academy of Professional Studies', NULL, NULL),
(20, 'from_email', 'info@dreamsacademy.edu.np', NULL, NULL),
(21, 'mail_type', 'smtp', NULL, NULL),
(22, 'smtp_host', 'mail.dreamsacademy.edu.np', NULL, NULL),
(23, 'smtp_port', '465', NULL, NULL),
(24, 'smtp_username', 'info@dreamsacademy.edu.np', NULL, NULL),
(25, 'smtp_password', 'gT}q%$2j41dH', NULL, NULL),
(26, 'smtp_encryption', 'ssl', NULL, NULL),
(27, 'logo', 'logo.png', NULL, NULL),
(28, 'esewa_active', 'Yes', NULL, NULL),
(29, 'esewa_id', '9880227545 / info@dreamsacademy.com', NULL, NULL),
(30, 'esewa_payee', 'Dreams Academy', NULL, NULL),
(31, 'introduction', '<h3 class=\"text-uppercase mt-0\" style=\"color: rgb(0, 0, 0);\">ABOUT&nbsp;<span class=\"text-theme-colored2\">DREAMS ACADEMY OF PROFESSIONAL STUDIES</span></h3><h3 class=\"text-uppercase mt-0\"><div class=\"double-line-bottom-theme-colored-2\" style=\"font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-transform: none;\"></div><p class=\"mt-20\" style=\"font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-transform: none;\">Dreams Academy of Professional Studies (DAPS) is established in 2020 AD in Association with CMC, Singapore. It Is Located at Mid-Baneshwor, Kathmandu, Nepal. Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and Hospitality Management to the enthusiastic students .DAPS leads a bridge to a bright future by providing the opportunity to acquire the knowledge, skill and attitude regarding hospitality management sector to contend success in the national and international market. we offer various courses in Food Production, F &amp; B Service, Housekeeping, Front Office, Salesmanship, Secretarial practice, Care givers, Waiter / Waitress, Barman training for people going to foreign strand. Our courses range from one month to sixteen months. We are in hospitality industry for the development of human resource through professional skills and knowledge and balancing skills and jobs through planning, coordination and implementation. We are also responsible for development of candidates regarding their abilities and deploy them into right opportunities at the right time. Our main focus is to provide high level of quality with apprenticeship-based education. We are doing well at providing special facilities to the people who are from rural areas. We have been providing Scholarship to the desired candidates. Priority to the rural people and Scholarship to desired candidates.</p></h3>', NULL, NULL),
(32, 'message-from-director', '<h3 class=\"text-uppercase mt-0\">Message <span class=\"text-theme-colored2\">From the Director</span></h3>\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\n                <p class=\"mt-20\">Our students are the pillars of our academy they are reflection of our values, norms and principles in the hospitality business industry. On behalf of Dreams Academy of Professional Studies (DAPS) family I\n                    extend a very warm welcome in joining us for structuring your career.\n                </p>\n                <p>Dreams Academy of Professional Studies (DAPS) is an organization where people are nurtured constantly through permanent learning & skills improvement to achieve international standards and are respected, heard, and\n                    encouraged to do their best.</p>\n                <p>We all must work together to create a clear vision and strong ethos of student achievement and when we do teaching and learning becomes a partnership among administration, teachers, parents and students. This in turn leads\n                    to a successful academic organization strongly rooted in a shared vision and a common sense of mission and purpose. We Must: Teach meaningful  \' stuff ‘, Listen to our students, Be interesting, Be inspiring, Be passionate,\n                    Be caring, Be civilized, and Model respect and good behavior.</p>\n                <p>We always want to make education as a tool for candidate \' s betterment and to provide equal axis for making knowledge and higher education for students who are being part of DAPS. It is always our motive and vision to\n                    develop self-confidence and positive thoughts which help them to gain every success in their life later. </p>\n                <p>Hospitality Career Strategists, who serve to combine behavioral attributes, service orientation, emotional intelligence and other soft talents along with professional’s knowledge and skills. </p>\n                <br>\n                <p><strong>\n                        With Regards,<br>\n                        Girish Dhungel <br>\n                        Director\n\n                    </strong>\n                </p>', NULL, NULL),
(33, 'our-objective-mission-and-vision', '<h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Objectives</span></h3>\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\n                <p class=\"mt-20\">\n                <ul>\n                    <li>\n                        To impart the international standard education in hospitality management with roleplay.\n                    </li>\n                    <li>\n                        To strive towards imparting sound knowledge, nurturing talent and making dynamic leaders for the future.\n                    </li>\n                    <li>\n                        Imbibing the functional skills in students to cater to the requirements of the hospitality industry.\n                    </li>\n                </ul>\n                </p>\n                <br>\n                <h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Mission</span></h3>\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\n                <p class=\"mt-20\">\n                    Foster each individuals with a conducive environment and promote lifelong learning in an open and caring atmosphere that motivates to reach constructive maturity, challenge one’s strengths, grow, progress and maximize\n                    one’s innate potential to excel and lead a harmonious life.\n                </p>\n                <br>\n                <h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Vision</span></h3>\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\n                <p class=\"mt-20\">\n                    Empower students with creative learning practices to value knowledge and skills, become confident mentally, physically, intellectually, morally ,spiritually and create a world in which everyone blossoms to be a responsible\n                    individuals capable of coping with the changing world having right accompaniment of professionalism and excellence.\n                </p>', NULL, NULL),
(34, 'facility-and-resource', '<h3 class=\"text-uppercase mt-0\">Facility &amp; <span class=\"text-theme-colored2\">Resources</span></h3>\r\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\r\n                <p class=\"mt-20\">\r\n                    DAPS offers ample envelopes of the quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined\r\n                    outcome and facilities that justify the growing demand of the hospitality arena. Other services are listed below:\r\n                </p>\r\n                <p>\r\n                </p><ul>\r\n                    <li>\r\n                        Multimedia classroom\r\n                    </li>\r\n                    <li>\r\n                        Downtown location\r\n                    </li>\r\n                    <li>\r\n                        Modernized and efficient practical lab\r\n                    </li>\r\n                    <li>\r\n                        Reasonable fee structure\r\n                    </li>\r\n                    <li>\r\n                        International teaching methodology\r\n                    </li>\r\n                    <li>\r\n                        Free Internet facilities\r\n                    </li>\r\n                    <li>\r\n                        Free tools and kits\r\n                    </li>\r\n                    <li>\r\n                        Free notes and handouts\r\n                    </li>\r\n                    <li>\r\n                        Free Demo and Observation\r\n                    </li>\r\n                    <li>\r\n                        Sports activities\r\n                    </li>\r\n                    <li>\r\n                        Scout membership and trainings\r\n                    </li>\r\n                    <li>\r\n                        Job Placement\r\n                    </li>\r\n                    <li>\r\n                        Industrial Training\r\n                    </li>\r\n                    <li>\r\n                        Hotel Visit\r\n                    </li>\r\n                    <li>\r\n                        Event Management\r\n                    </li>\r\n                    <li>\r\n                        Life skill-oriented counselling’s\r\n                    </li>\r\n                </ul>\r\n                <p></p>', NULL, NULL),
(35, 'placement-and-support-unit', '<h3 class=\"text-uppercase mt-0\">Placement <span class=\"text-theme-colored2\">Support</span> Unit</h3>\r\n                <div class=\"double-line-bottom-theme-colored-2\"></div>\r\n                <p class=\"mt-20\">\r\n                    The Department of Placement is the backbone of any institution. We have separate placement support unit (PSU) for the support of our students. From the very beginning the institute lays greater emphasis on placement of\r\n                    students. The Placement unit of the institute centrally assists students throughout foreign placement as well as domestic placement. The placement unit provides complete support to face interview. The unit trains the\r\n                    students with placement readiness programs which include effective communication and skill for employment training.\r\n                </p>\r\n                <strong>Objective</strong>\r\n                <p>\r\n                </p><ul>\r\n                    <li>\r\n                        Developing the student’s knowledge and skills to meet the recruitment process.\r\n                    </li>\r\n                    <li>\r\n                        To develop the interpersonal skills required to enable them to work efficiently as a member of a team trying to achieve organizational goals.\r\n                    </li>\r\n                    <li>\r\n                        To motivate students to develop their overall personality in terms of career planning and goal setting.\r\n                    </li>\r\n                    <li>\r\n                        To organize students so that they can receive, quickly understand and carry out instructions to the satisfaction of their employer as a means of developing towards the completion of more responsible work.\r\n                    </li>\r\n                    <li>\r\n                        To act as a link between students and the employment community.\r\n                    </li>\r\n                    <li>\r\n                        To achieve 100 % Placements for Eligible Students.\r\n                    </li>\r\n                </ul>\r\n                <p></p>\r\n                <p>\r\n                    <strong>Countries of Placement</strong><br>\r\n                    China, Macau, Bahrain, UAE, Saudi Arabia, Oman, Malaysia etc</p><ul>\r\n                </ul>\r\n                <p></p>', NULL, NULL),
(36, 'popular-courses', 'DAPS offers Barista, DHM, ADHM, Barman', NULL, NULL),
(37, 'modern-book-library', 'DAPS prefers Modern Book to our students for their betterment.', NULL, NULL),
(38, 'qualified-teacher', 'DAPS have better qualified teacher.', NULL, NULL),
(39, 'update-notification', 'DAPS notify you about our latest news, courses, events through our application as soon as possible.', NULL, NULL),
(40, 'entertainment-facilities', 'DAPS offers ample envelopes of quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined\n                    outcome and facilities that justify the growing demand of the hospitality arena.', NULL, NULL),
(41, 'online-support', 'DAPS provides online payment system alongwith private accounts for their payment details, notification and mailing.', NULL, NULL),
(42, 'starting_time', '7.00 am', NULL, NULL),
(43, 'ending_time', '3.00 pm', NULL, NULL),
(44, 'secondary_email', 'infodreamsacademy@gmail.com', NULL, NULL),
(45, 'why-choose-us', 'new-image.jpg', NULL, NULL),
(46, 'journey-title', 'In 2020 We Start Our Journey', NULL, NULL),
(47, 'journey-details', '<h3 class=\"font-weight-500 font-30 font- mt-10\">Make <span class=\"text-theme-colored\">Your Dream Education</span> </h3>\n                <p>Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and\n                    Hospitality Management to the enthusiastic students.</p>', NULL, NULL),
(48, 'journey-youtube', '1', NULL, NULL),
(49, 'journey-poster', 'team.jpg', NULL, NULL),
(50, 'bank_id', '09200800319878000001', NULL, NULL),
(51, 'bank_name', 'Shangri-la Development Bank', NULL, NULL),
(52, 'bank_branch', 'Ason,Kathmandu', NULL, NULL),
(53, 'bank_account_name', 'Dreams Academy of Professional Studies', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `share_files`
--

CREATE TABLE `share_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `button1`, `url_link1`, `button2`, `url_link2`, `details`, `photo`, `position`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/88b4b6cf-997b-4106-885f-8542568e864f.jpg', 'right', '2021-05-07 15:24:33', '2021-05-07 15:24:33'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/c5e55aaf-d0c7-4667-a5df-83bf7048f330.jpg', 'right', '2021-05-07 15:24:47', '2021-05-07 15:24:47'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/08025c06-d4c5-437d-8c3f-f8171e4ddc83.jpg', 'right', '2021-05-07 15:25:14', '2021-05-07 15:25:14'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/33255607-678d-408c-a49e-4caf24c2cc11.jpg', 'right', '2021-05-07 15:25:24', '2021-05-07 15:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendances`
--

CREATE TABLE `staff_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_requests`
--

CREATE TABLE `student_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_sessions`
--

CREATE TABLE `student_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `subject_type`, `course_id`, `full_mark`, `pass_mark`, `created_at`, `updated_at`) VALUES
(1, 'HouseKeeping', 'HK01', 'Both', 5, 100, 40, '2021-05-17 09:53:39', '2021-05-17 09:53:39'),
(2, 'F&B Service', 'F&B01', 'Both', 5, 100, 40, '2021-05-17 09:54:17', '2021-05-17 09:54:17'),
(3, 'Marketing', 'MKT01', 'Both', 5, 100, 40, '2021-05-17 09:54:40', '2021-05-17 09:54:40'),
(4, 'Understanding Tourism System and Environment', 'UTSE01', 'Both', 5, 100, 40, '2021-05-17 09:55:15', '2021-05-17 09:55:15'),
(5, 'Presentation Skill', 'Presentation', 'Practical', 5, 50, 12, '2021-05-17 09:56:00', '2021-05-17 09:56:00'),
(6, 'Front Office', 'F/O01', 'Both', 5, 100, 40, '2021-05-17 09:56:26', '2021-05-17 09:56:26'),
(7, 'Principle of Management', 'POM01', 'Both', 5, 100, 40, '2021-05-17 09:56:53', '2021-05-17 09:56:53'),
(8, 'Food Production', 'FP01', 'Both', 5, 100, 40, '2021-05-17 09:57:21', '2021-05-17 09:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `session_id`, `title`, `description`, `class_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Syllabus of DHM', '<p><span style=\"background-color: rgb(245, 245, 245); color: rgb(51, 51, 51); font-size: 16px;\">Syllabus for&nbsp;</span>All Subject</p>', 5, '1b8856a0-42bb-46fb-91de-1ffd48d59553.pdf', '2021-05-10 14:08:28', '2021-05-10 14:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `author_id`, `name`, `email`, `phone`, `birthday`, `gender`, `religion`, `joining_date`, `address`, `photo`, `facebook`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 3, 'Narottam Adhikari', 'adnarottam2012@gmail.com', '9851037862', '1994-09-19', 'Male', 'Hindu', '2021-01-01', 'Kirtipur', 'teachers/15c7e96a-098a-4091-988d-b683adb1705f.jpg', '#', '#', '#', '2021-05-10 14:34:02', '2021-05-10 14:34:02'),
(2, 8, 'Archana Shrestha', 'shresthaarchana95@gmail.com', '9843941035', '2013-06-19', 'Female', 'Hindu', '2021-01-03', 'Kathmandu,Nepal', 'profile.png', '#', '#', '#', '2021-05-13 12:17:24', '2021-05-13 12:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_date` date NOT NULL,
  `account_id` int(11) NOT NULL,
  `trans_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `dr_cr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chart_id` int(11) NOT NULL,
  `payee_payer_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `email_verified_at`, `phone`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rupesh Chaudhary', 'rupeshchaudhary7338@gmail.com', '2021-05-07 15:03:36', '9880227545', 'profile.png', '$2y$10$EB17G1mrSlgQDXqucVLu0OsZTKMMK25UgMGITN2gn4ACPPClMbHTm', NULL, NULL, '2021-05-07 15:03:36'),
(2, 'Girish Dhungel', 'girshdhungel@gmail.com', '2021-05-07 21:22:32', NULL, 'users/e62c9fc4-2b68-4c90-9518-09334c6c82de.jpg', '$2y$10$d2oXU5aYX0PhBpsPeBbY2.rrldNvBh5mJ7fr6U3jlBRAHyYPucIr6', NULL, '2021-05-07 15:30:41', '2021-05-07 15:30:41'),
(3, 'Narottam Adhikari', 'adnarottam2012@gmail.com', NULL, '9851037862', 'teachers/15c7e96a-098a-4091-988d-b683adb1705f.jpg', '$2y$10$ZBxQJHErq3h6IJQpgYWm/u19cIi62x30dSt3mmbbK/4ujUKuQdCfO', NULL, '2021-05-10 14:34:02', '2021-05-10 14:34:02'),
(8, 'Archana Shrestha', 'shresthaarchana95@gmail.com', NULL, '9843941035', 'profile.png', '$2y$10$KMcYb0p39a4/Gue06XahV.azBfbRFuK4WOpoflW2IXyXPzmv7XAdm', NULL, '2021-05-13 12:17:24', '2021-05-13 12:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `read` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notices`
--

CREATE TABLE `user_notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `notice_id` int(11) NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `in_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_slug_unique` (`slug`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_cash_accounts`
--
ALTER TABLE `bank_cash_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_days`
--
ALTER TABLE `class_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routines`
--
ALTER TABLE `class_routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complains_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_applications`
--
ALTER TABLE `course_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_categories_slug_unique` (`slug`);

--
-- Indexes for table `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `event_candidates`
--
ALTER TABLE `event_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_speakers`
--
ALTER TABLE `event_speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_attendances`
--
ALTER TABLE `exam_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_categories`
--
ALTER TABLE `faculty_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_categories_slug_unique` (`slug`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_members_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folders_slug_unique` (`slug`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_candidates`
--
ALTER TABLE `job_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_details`
--
ALTER TABLE `mark_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_distributions`
--
ALTER TABLE `mark_distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notices_slug_unique` (`slug`);

--
-- Indexes for table `notice_comments`
--
ALTER TABLE `notice_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payee_payers`
--
ALTER TABLE `payee_payers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `phone_call_logs`
--
ALTER TABLE `phone_call_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_call_logs_slug_unique` (`slug`);

--
-- Indexes for table `picklists`
--
ALTER TABLE `picklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_receives`
--
ALTER TABLE `postal_receives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postal_receives_slug_unique` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_files`
--
ALTER TABLE `share_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_citizenship_no_unique` (`citizenship_no`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requests`
--
ALTER TABLE `student_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_requests_slug_unique` (`slug`);

--
-- Indexes for table `student_sessions`
--
ALTER TABLE `student_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notices`
--
ALTER TABLE `user_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitors_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bank_cash_accounts`
--
ALTER TABLE `bank_cash_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_days`
--
ALTER TABLE `class_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_routines`
--
ALTER TABLE `class_routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_applications`
--
ALTER TABLE `course_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_candidates`
--
ALTER TABLE `event_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_speakers`
--
ALTER TABLE `event_speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_attendances`
--
ALTER TABLE `exam_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_categories`
--
ALTER TABLE `faculty_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_candidates`
--
ALTER TABLE `job_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mark_details`
--
ALTER TABLE `mark_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mark_distributions`
--
ALTER TABLE `mark_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_comments`
--
ALTER TABLE `notice_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payee_payers`
--
ALTER TABLE `payee_payers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `phone_call_logs`
--
ALTER TABLE `phone_call_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picklists`
--
ALTER TABLE `picklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postal_receives`
--
ALTER TABLE `postal_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `share_files`
--
ALTER TABLE `share_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_sessions`
--
ALTER TABLE `student_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notices`
--
ALTER TABLE `user_notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
