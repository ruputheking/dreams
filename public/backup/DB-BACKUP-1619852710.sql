DROP TABLE IF EXISTS academic_years;

CREATE TABLE `academic_years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO academic_years VALUES('1','2021','2021 - 2022','','');



DROP TABLE IF EXISTS appointments;

CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO appointments VALUES('1','Rupesh Chaudhary','rupeshchaudhary7338@gmail.com','9880227545','2021-05-01 00:00:00','Hi','2021-04-30 20:51:31','2021-04-30 20:51:31');



DROP TABLE IF EXISTS assign_students;

CREATE TABLE `assign_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS assign_subjects;

CREATE TABLE `assign_subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS assignments;

CREATE TABLE `assignments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS bank_cash_accounts;

CREATE TABLE `bank_cash_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES('1','Others','others','','');



DROP TABLE IF EXISTS chart_of_accounts;

CREATE TABLE `chart_of_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS class_days;

CREATE TABLE `class_days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO class_days VALUES('1','Sunday','1','','');
INSERT INTO class_days VALUES('2','Monday','1','','');
INSERT INTO class_days VALUES('3','Tuesday','1','','');
INSERT INTO class_days VALUES('4','Wednesday','1','','');
INSERT INTO class_days VALUES('5','Thursday','1','','');
INSERT INTO class_days VALUES('6','Friday','1','','');
INSERT INTO class_days VALUES('7','Saturday','1','','');



DROP TABLE IF EXISTS class_routines;

CREATE TABLE `class_routines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS comments;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS contacts;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS course_applications;

CREATE TABLE `course_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS course_categories;

CREATE TABLE `course_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO course_categories VALUES('1','Others','others','','');



DROP TABLE IF EXISTS course_comments;

CREATE TABLE `course_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS courses;

CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO courses VALUES('1','Housekeeping','housekeeping','Effective housekeeping can help control or eliminate workplace hazards. Poor housekeeping practices frequently contribute to incidents.','1','','<p>Effective housekeeping can help control or eliminate workplace hazards. Poor housekeeping practices frequently contribute to incidents. If the sight of paper, debris, clutter, and spills is accepted as normal, then other more serious hazards may be taken for granted.

Housekeeping is not just cleanliness. It includes keeping work areas neat and orderly, maintaining halls and floors free of slip and trip hazards, and removing waste materials (e.g., paper, cardboard) and other fire hazards from work areas. It also requires paying attention to important details such as the layout of the whole workplace, aisle marking, the adequacy of storage facilities, and maintenance. Good housekeeping is also a basic part of incident and fire prevention.

Effective housekeeping is an ongoing operation: it is not a one-time or hit-and-miss cleanup done occasionally. Periodic \"panic\" cleanups are costly and ineffective in reducing incidents<br></p>','','','','','','','','courses/fb3b2e78-adf1-48cc-b978-476386824754.jpg','0','','','1','2021-04-24 09:55:23','2021-04-25 15:48:56');
INSERT INTO courses VALUES('2','Waiter/ess','waiter-ess','Being a good restaurant waiter/ess takes more than a smile and coordination for handling dinner plates.','1','','<p>Being a good restaurant waiter/ess takes more than a smile and coordination for handling dinner plates. Initially, restaurant patrons might choose a place to eat based on the restaurant\'s reputation, location, and reviews they read about the quality of food. However, when they receive good service from a staff who enjoys what they do for a living, it makes the experience worth returning for and an experience they\'ll recommend to friends. Provide good service to fellow employees as well -- being good also means being a reliable and helpful co-worker.<br></p>','','','','','','','','courses/b779d2bf-1c83-47f5-89ae-4cba6f9cd0e6.jpg','0','','','1','2021-04-24 15:53:35','2021-04-25 15:48:33');
INSERT INTO courses VALUES('3','Barista','barista','A barista is a person who prepares and also generally serves espresso-based coffee drinks. In the United States, the term barista is also often applied to coffee shop employees who prepare both espresso and regular coffee drinks.','1','','<p>A barista is a person who prepares and also generally serves espresso-based coffee drinks. In the United States, the term barista is also often applied to coffee shop employees who prepare both espresso and regular coffee drinks. Although the term barista technically refers to someone who has been professionally trained in preparing espresso, it may also be used to describe anyone with a high level of skill in making espresso shots and espresso drinks, such as lattes and cappuccinos.<br></p>','','','','','','','','courses/0ba8b28e-4475-44c1-ae44-be903b74a512.jpg','0','','','1','2021-04-24 16:35:06','2021-04-24 16:35:06');



DROP TABLE IF EXISTS event_candidates;

CREATE TABLE `event_candidates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS event_speakers;

CREATE TABLE `event_speakers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO events VALUES('1','Pre Board Examination result 10th Batch','pre-board-examination-result-10th-batch','Dreams Academy of Professional Studies','Prabachan Marg, Kathmandu 44600','2021-05-05 03:12:00','2021-05-08 23:13:00','23:12:00','11:12:00','<p><span style=\"color: rgb(102, 102, 102); font-family: Poppins, sans-serif;\">Dreams Academy of Professional Studies (DAPS) is established in 2020 AD in Association with CMC, Singapore. It Is Located at Mid-Baneshwor, Kathmandu, Nepal. Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skills Market-oriented training having national as well as international standards in the field of Hotel / Restaurant and Hospitality Management to enthusiastic students. DAPS leads a bridge to a bright future by providing the opportunity to acquire the knowledge, skill, and attitude regarding the hospitality management sector to contend successfully in the national and international market. we offer various courses in Food Production, F &amp; B Service, Housekeeping, Front Office, Salesmanship, Secretarial practice, Caregivers, Waiter / Waitress, Barman training for people going to foreign strand. Our courses range from one month to sixteen months. We are in the hospitality industry for the development of human resources through professional skills and knowledge and balancing skills and jobs through planning, coordination, and implementation. We are also responsible for the development of candidates regarding their abilities and deploy them into the right opportunities at the right time. Our main focus is to provide a high level of quality with apprenticeship-based education. We are doing well at providing special facilities to the people who are from rural areas. We have been providing Scholarships to the desired candidates. Priority to the rural people and Scholarship to desired candidates.</span><br></p>','Dreams Academy of Professional Studies (DAPS) is established in 2020 AD in Association with CMC, Singapore. It Is Located at Mid-Baneshwor, Kathmandu, Nepal. Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skills Market-oriented training having national as well as international standards in the field of Hotel / Restaurant and Hospitality Management to enthusiastic students.','events/41928c5d-2918-43f2-be1c-23e525bbea4c.jpg','events/7df3ccd7-4342-46cb-8c8a-872945f4b8a8.jpg','events/7b2d862e-7536-422c-a4f0-cc464eef01a2.jpg','','','','','','0','0','2021-04-30 23:15:38','2021-04-30 23:15:38');



DROP TABLE IF EXISTS exam_attendances;

CREATE TABLE `exam_attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS exam_schedules;

CREATE TABLE `exam_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS exams;

CREATE TABLE `exams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS faculty_categories;

CREATE TABLE `faculty_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faculty_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO faculty_categories VALUES('1','Staff','staff','2021-04-30 13:00:18','2021-04-30 13:00:18');
INSERT INTO faculty_categories VALUES('3','Managing Director','managing-director','2021-04-30 13:05:52','2021-04-30 13:05:52');



DROP TABLE IF EXISTS faculty_members;

CREATE TABLE `faculty_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO faculty_members VALUES('1','Girish Dhungel','3','girish-dhungel','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vero expedita fugiat illo quasi doloremque, in unde omnis sint assumenda! Quaerat in, reprehenderit corporis voluptatum natus sequi reiciendis ullam. Quam eaque dolorum voluptates cupiditat','teams/f93cc528-15eb-4de8-8ea3-32961e0e0a10.jpg','https://www.facebook.com/dhungelgirish','https://www.facebook.com/dhungelgirish','https://www.facebook.com/dhungelgirish','https://www.facebook.com/dhungelgirish','2021-04-30 13:07:30','2021-04-30 18:42:07');



DROP TABLE IF EXISTS failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS faqs;

CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS fee_types;

CREATE TABLE `fee_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fee_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS folders;

CREATE TABLE `folders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `folders_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO folders VALUES('1','Others','others','','');
INSERT INTO folders VALUES('2','Service','service','2021-04-25 15:50:07','2021-04-25 15:50:07');



DROP TABLE IF EXISTS galleries;

CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO galleries VALUES('1','1','/0a7e2996-7fda-49b8-85be-b08df6cd7ac0.jpg','Pass Out From Dreams Academy of Professional Studies','2021-04-24 16:18:54','2021-04-24 16:18:54');
INSERT INTO galleries VALUES('2','2','/b18a3c6a-ff65-4422-9129-8c95b85c752d.jpg','','2021-04-25 15:53:57','2021-04-25 15:53:57');



DROP TABLE IF EXISTS grades;

CREATE TABLE `grades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks_from` decimal(8,2) NOT NULL,
  `marks_to` decimal(8,2) NOT NULL,
  `point` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS invoice_items;

CREATE TABLE `invoice_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS invoice_payments;

CREATE TABLE `invoice_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS invoices;

CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS job_candidates;

CREATE TABLE `job_candidates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS jobs;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS mark_details;

CREATE TABLE `mark_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mark_id` int(11) NOT NULL,
  `mark_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_value` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS mark_distributions;

CREATE TABLE `mark_distributions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mark_distribution_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_percentage` decimal(8,2) NOT NULL,
  `is_exam` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_active` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS marks;

CREATE TABLE `marks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS messages;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES('1','2014_10_12_000000_create_users_table','1');
INSERT INTO migrations VALUES('2','2014_10_12_100000_create_password_resets_table','1');
INSERT INTO migrations VALUES('3','2019_08_19_000000_create_failed_jobs_table','1');
INSERT INTO migrations VALUES('4','2021_02_15_033855_laratrust_setup_tables','1');
INSERT INTO migrations VALUES('5','2021_02_15_053625_create_contacts_table','1');
INSERT INTO migrations VALUES('6','2021_02_15_054300_create_settings_table','1');
INSERT INTO migrations VALUES('7','2021_02_15_103041_create_posts_table','1');
INSERT INTO migrations VALUES('8','2021_02_15_103233_create_categories_table','1');
INSERT INTO migrations VALUES('9','2021_02_15_103311_create_comments_table','1');
INSERT INTO migrations VALUES('10','2021_02_15_103348_create_tags_table','1');
INSERT INTO migrations VALUES('11','2021_03_03_015354_create_courses_table','1');
INSERT INTO migrations VALUES('12','2021_03_03_015628_create_course_categories_table','1');
INSERT INTO migrations VALUES('13','2021_03_03_100754_create_folders_table','1');
INSERT INTO migrations VALUES('14','2021_03_03_100940_create_galleries_table','1');
INSERT INTO migrations VALUES('15','2021_03_03_143224_create_notices_table','1');
INSERT INTO migrations VALUES('16','2021_03_06_151848_create_events_table','1');
INSERT INTO migrations VALUES('17','2021_03_06_152323_create_event_candidates_table','1');
INSERT INTO migrations VALUES('18','2021_03_06_152343_create_event_speakers_table','1');
INSERT INTO migrations VALUES('19','2021_03_22_202417_create_course_applications_table','1');
INSERT INTO migrations VALUES('20','2021_03_22_211622_create_faqs_table','1');
INSERT INTO migrations VALUES('21','2021_03_23_132039_create_jobs_table','1');
INSERT INTO migrations VALUES('22','2021_03_24_101807_create_notifications_table','1');
INSERT INTO migrations VALUES('23','2021_03_25_095759_create_plugins_table','1');
INSERT INTO migrations VALUES('24','2021_03_25_100342_create_sliders_table','1');
INSERT INTO migrations VALUES('25','2021_03_27_190452_create_user_notices_table','1');
INSERT INTO migrations VALUES('26','2021_03_31_112626_create_sections_table','1');
INSERT INTO migrations VALUES('27','2021_03_31_113042_create_assign_subjects_table','1');
INSERT INTO migrations VALUES('28','2021_03_31_113306_create_subjects_table','1');
INSERT INTO migrations VALUES('29','2021_03_31_113452_create_class_routines_table','1');
INSERT INTO migrations VALUES('30','2021_03_31_113608_create_class_days_table','1');
INSERT INTO migrations VALUES('31','2021_03_31_131950_create_parents_table','1');
INSERT INTO migrations VALUES('32','2021_03_31_132733_create_students_table','1');
INSERT INTO migrations VALUES('33','2021_03_31_135505_create_student_sessions_table','1');
INSERT INTO migrations VALUES('34','2021_03_31_144124_create_picklists_table','1');
INSERT INTO migrations VALUES('35','2021_04_01_023535_create_assignments_table','1');
INSERT INTO migrations VALUES('36','2021_04_01_023633_create_student_attendances_table','1');
INSERT INTO migrations VALUES('37','2021_04_01_023656_create_staff_attendances_table','1');
INSERT INTO migrations VALUES('38','2021_04_01_124628_create_assign_students_table','1');
INSERT INTO migrations VALUES('39','2021_04_01_124646_create_student_assignments_table','1');
INSERT INTO migrations VALUES('40','2021_04_01_130959_create_share_files_table','1');
INSERT INTO migrations VALUES('41','2021_04_01_141101_create_academic_years_table','1');
INSERT INTO migrations VALUES('42','2021_04_01_150627_create_exams_table','1');
INSERT INTO migrations VALUES('43','2021_04_01_150651_create_exam_attendances_table','1');
INSERT INTO migrations VALUES('44','2021_04_01_150714_create_exam_schedules_table','1');
INSERT INTO migrations VALUES('45','2021_04_01_163004_create_marks_table','1');
INSERT INTO migrations VALUES('46','2021_04_01_163020_create_mark_details_table','1');
INSERT INTO migrations VALUES('47','2021_04_01_163040_create_mark_distributions_table','1');
INSERT INTO migrations VALUES('48','2021_04_01_180915_create_grades_table','1');
INSERT INTO migrations VALUES('49','2021_04_02_063001_create_transactions_table','1');
INSERT INTO migrations VALUES('50','2021_04_02_063256_create_chart_of_accounts_table','1');
INSERT INTO migrations VALUES('51','2021_04_02_063356_create_fee_types_table','1');
INSERT INTO migrations VALUES('52','2021_04_02_063418_create_payee_payers_table','1');
INSERT INTO migrations VALUES('53','2021_04_02_063431_create_payment_methods_table','1');
INSERT INTO migrations VALUES('54','2021_04_02_063459_create_student_payments_table','1');
INSERT INTO migrations VALUES('55','2021_04_02_063749_create_invoices_table','1');
INSERT INTO migrations VALUES('56','2021_04_02_063823_create_invoice_items_table','1');
INSERT INTO migrations VALUES('57','2021_04_02_063922_create_bank_cash_accounts_table','1');
INSERT INTO migrations VALUES('58','2021_04_02_181240_create_syllabus_table','1');
INSERT INTO migrations VALUES('59','2021_04_02_200613_create_messages_table','1');
INSERT INTO migrations VALUES('60','2021_04_02_200747_create_user_messages_table','1');
INSERT INTO migrations VALUES('61','2021_04_04_011014_create_invoice_payments_table','1');
INSERT INTO migrations VALUES('62','2021_04_11_115104_create_testimonials_table','1');
INSERT INTO migrations VALUES('63','2021_04_11_212238_create_faculty_members_table','1');
INSERT INTO migrations VALUES('64','2021_04_30_113656_create_faculty_categories_table','2');
INSERT INTO migrations VALUES('65','2021_04_30_193151_create_appointments_table','3');



DROP TABLE IF EXISTS notice_comments;

CREATE TABLE `notice_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(11) NOT NULL,
  `notice_comment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS notices;

CREATE TABLE `notices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `seo_meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notices_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO notices VALUES('1','Free Admission Announcement','free-admission-announcement','New Admission is announced by Dreams Academy of Professional Studies (DAPS). All the first 10 students will get Rs 100 recharge card of any sim card.','<p>New Admission is announced by Dreams Academy of Professional Studies (DAPS). All the first 10 students will get Rs 100 recharge card of any sim card.<br></p>','5','','','2021-05-01 01:47:59','2021-05-01 01:53:28');



DROP TABLE IF EXISTS notifications;

CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO notifications VALUES('1','1','You have appointment request.','Rupesh Chaudharyhas been sent you a request for appointment','http://127.0.0.1:8000/dashboard/appointments','1','2021-04-30 20:51:31','2021-04-30 21:19:57');
INSERT INTO notifications VALUES('2','2','You have appointment request.','Rupesh Chaudharyhas been sent you a request for appointment','http://127.0.0.1:8000/dashboard/appointments','0','2021-04-30 20:51:31','2021-04-30 20:51:31');



DROP TABLE IF EXISTS parents;

CREATE TABLE `parents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS payee_payers;

CREATE TABLE `payee_payers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS payment_methods;

CREATE TABLE `payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS permission_role;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS permission_user;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS permissions;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS picklists;

CREATE TABLE `picklists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO picklists VALUES('1','Religion','Hindu','','');
INSERT INTO picklists VALUES('2','Religion','Christian','','');
INSERT INTO picklists VALUES('3','Religion','Muslim','','');



DROP TABLE IF EXISTS plugins;

CREATE TABLE `plugins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS post_tag;

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS posts;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO posts VALUES('1','1','Welcome to Our Website','welcome-to-our-website','Dreams Academy of Professional Studies (DAPS) is duly registered with the Nepal government as an institution in hospitality and is established by a group of dynamic professionals in the heart of Kathmandu valley in 2020.','<p>Dreams Academy of Professional Studies&nbsp;(DAPS) is duly registered with the Nepal government as an institution in hospitality and is established by a group of dynamic professionals in the heart of Kathmandu valley in 2020. The registration number is 36447/062/063. It is authorized to provide vocational training related to Hospitality, Tourism, and Overseas packages. And KIHM also provides special training on special demand. Baideshik Rojgar Prabardhan Board has granted&nbsp;DAPS to run Care Giver and Room Maid Training.&nbsp;DAPS is providing Cook ( Food Production), Baker, Housekeeping, Front Office, Bartender, Waiter/ess, Care Giver, etc training in the different geographical region of the country with the support of Skill for Employment Project (CTEVT), Enhanced Vocational Education and Training project, (EVENT) Govt of Nepal Emergency Peace Support Project (PEACE) Govt of Nepal and Employment Fund Secretariat ( EFS)/Helvetas Nepal&nbsp;DAPS provides the most modern facilities and resources for its students. We have developed the training methodology in a scientific and result-oriented way that is based on lectures, exercise, interactive discussion, weekly debate, fortnightly assessment, etc</p>','blogs/bd8d849e-288e-4e80-91a6-e9e196a2a4fd.jpg','','','','2021-04-24 16:24:00','1','3','','','','','','2021-04-24 16:24:09','2021-05-01 02:47:54');



DROP TABLE IF EXISTS role_user;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO role_user VALUES('1','1','App\\Models\\User');
INSERT INTO role_user VALUES('1','2','App\\Models\\User');
INSERT INTO role_user VALUES('7','4','App\\Models\\User');



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES('1','admin','Admin','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('2','teacher','Teacher','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('3','student','Student','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('4','guardian','Guardian','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('5','accountant','Accountant','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('6','receptionist','Receptionist','','2021-04-24 04:42:34','2021-04-24 04:42:34');
INSERT INTO roles VALUES('7','user','User','','2021-04-24 04:42:34','2021-04-24 04:42:34');



DROP TABLE IF EXISTS sections;

CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO settings VALUES('1','academic_years','1','','');
INSERT INTO settings VALUES('2','currency_symbol','Rs','','');
INSERT INTO settings VALUES('3','official_email','info@dreamsacademy.edu.np','','');
INSERT INTO settings VALUES('4','official_phone','9886314045','','');
INSERT INTO settings VALUES('5','facebook','https://www.facebook.com/Dreams-Academy-100622115322763','','');
INSERT INTO settings VALUES('6','youtube','https://www.youtube.com/channel/UCCXaeuXnwegNccLLwoT32vQ','','');
INSERT INTO settings VALUES('7','instagram','https://www.instagram.com/merodukkan/','','');
INSERT INTO settings VALUES('8','title','Dreams Academy of Professional Studies','','');
INSERT INTO settings VALUES('9','seo_meta_keywords','Dreams Academy of Professional Studies','','');
INSERT INTO settings VALUES('10','seo_meta_description','Dreams Academy of Professional Studies','','');
INSERT INTO settings VALUES('11','image','logo_meta.png','','');
INSERT INTO settings VALUES('12','copyright','&copy; 2020 Dreams Academy of Professional Studies. All Rights Reserved','','');
INSERT INTO settings VALUES('13','welcome_txt','Dreams Academy of Professional Studies','','');
INSERT INTO settings VALUES('14','favicon','fav.png','','');
INSERT INTO settings VALUES('15','landline','01-4471468','','');
INSERT INTO settings VALUES('16','map','<iframe
                    src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.3170884136!2d85.25761376863859!3d27.708954344415954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19083b8ca841%3A0xa74c32b502e432e!2sNational%20Integrated%20College!5e0!3m2!1sen!2snp!4v1612409209753!5m2!1sen!2snp\"
                    width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','','');
INSERT INTO settings VALUES('17','address','Prabachan Marg, Old Baneshwor, Kathmandu','','');
INSERT INTO settings VALUES('18','office_email','info@dreamsacademy.edu.np','','');
INSERT INTO settings VALUES('19','from_name','Dreams Academy of Professional Studies','','');
INSERT INTO settings VALUES('20','from_email','info@dreamsacademy.edu.np','','');
INSERT INTO settings VALUES('21','mail_type','smtp','','');
INSERT INTO settings VALUES('22','smtp_host','mail.dreamsacademy.edu.np','','');
INSERT INTO settings VALUES('23','smtp_port','465','','');
INSERT INTO settings VALUES('24','smtp_username','info@dreamsacademy.edu.np','','');
INSERT INTO settings VALUES('25','smtp_password','gT}q%$2j41dH','','');
INSERT INTO settings VALUES('26','smtp_encryption','ssl','','');
INSERT INTO settings VALUES('27','logo','logo.png','','');
INSERT INTO settings VALUES('28','esewa_active','Yes','','');
INSERT INTO settings VALUES('29','esewa_id','9880227545 / info@dreamsacademy.com','','');
INSERT INTO settings VALUES('30','esewa_payee','Dreams Academy','','');
INSERT INTO settings VALUES('31','introduction','<h3 class=\"text-uppercase mt-0\">About <span class=\"text-theme-colored2\">Dreams Academy of Professional Studies</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">Dreams Academy of Professional Studies (DAPS) is established in 2020 AD in Association with CMC, Singapore. It Is Located at Mid-Baneshwor, Kathmandu, Nepal. Dreams Academy of Professional Studies (DAPS) is an
                    autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and Hospitality Management to the enthusiastic students .DAPS
                    lead a bridge to a bright future by providing the opportunity to acquire the knowledge, skill and attitude regarding hospitality management sector to contend success in the national and international market. we offers
                    various courses in Food Production, F & B Service, Housekeeping, Front Office, Salesmanship, Secretarial practice, Care givers, Waiter / Waitress, Barman training for people going to foreign strand. Our courses range from
                    one month to sixteen months. We are in hospitality industry for the development of human resource through professional skills and knowledge and balancing skills and jobs through planning, coordination and implementation.
                    We are also responsible for development of candidates regarding their abilities and deploy them into right opportunities at the right time. Our main focus is to provide high level of quality with apprenticeship based
                    education. We are doing well at providing special facilities to the people who are from rural areas. We have been providing Scholarship to the desired candidates. Priority to the rural people and Scholarship to desired
                    candidates.
                </p>','','');
INSERT INTO settings VALUES('32','message-from-director','<h3 class=\"text-uppercase mt-0\">Message <span class=\"text-theme-colored2\">From the Director</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">Our students are the pillars of our academy they are reflection of our values, norms and principles in the hospitality business industry. On behalf of Dreams Academy of Professional Studies (DAPS) family I
                    extend a very warm welcome in joining us for structuring your career.
                </p>
                <p>Dreams Academy of Professional Studies (DAPS) is an organization where people are nurtured constantly through permanent learning & skills improvement to achieve international standards and are respected, heard, and
                    encouraged to do their best.</p>
                <p>We all must work together to create a clear vision and strong ethos of student achievement and when we do teaching and learning becomes a partnership among administration, teachers, parents and students. This in turn leads
                    to a successful academic organization strongly rooted in a shared vision and a common sense of mission and purpose. We Must: Teach meaningful  \' stuff ‘, Listen to our students, Be interesting, Be inspiring, Be passionate,
                    Be caring, Be civilized, and Model respect and good behavior.</p>
                <p>We always want to make education as a tool for candidate \' s betterment and to provide equal axis for making knowledge and higher education for students who are being part of DAPS. It is always our motive and vision to
                    develop self-confidence and positive thoughts which help them to gain every success in their life later. </p>
                <p>Hospitality Career Strategists, who serve to combine behavioral attributes, service orientation, emotional intelligence and other soft talents along with professional’s knowledge and skills. </p>
                <br>
                <p><strong>
                        With Regards,<br>
                        Girish Dhungel <br>
                        Director

                    </strong>
                </p>','','');
INSERT INTO settings VALUES('33','our-objective-mission-and-vision','<h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Objectives</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">
                <ul>
                    <li>
                        To impart the international standard education in hospitality management with roleplay.
                    </li>
                    <li>
                        To strive towards imparting sound knowledge, nurturing talent and making dynamic leaders for the future.
                    </li>
                    <li>
                        Imbibing the functional skills in students to cater to the requirements of the hospitality industry.
                    </li>
                </ul>
                </p>
                <br>
                <h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Mission</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">
                    Foster each individuals with a conducive environment and promote lifelong learning in an open and caring atmosphere that motivates to reach constructive maturity, challenge one’s strengths, grow, progress and maximize
                    one’s innate potential to excel and lead a harmonious life.
                </p>
                <br>
                <h3 class=\"text-uppercase mt-0\">Our <span class=\"text-theme-colored2\">Vision</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">
                    Empower students with creative learning practices to value knowledge and skills, become confident mentally, physically, intellectually, morally ,spiritually and create a world in which everyone blossoms to be a responsible
                    individuals capable of coping with the changing world having right accompaniment of professionalism and excellence.
                </p>','','');
INSERT INTO settings VALUES('34','facility-and-resource','<h3 class=\"text-uppercase mt-0\">Facility & <span class=\"text-theme-colored2\">Resources</span></h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">
                    DAPS offers ample envelopes of quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined
                    outcome and facilities that justify the growing demand of the hospitality arena. Other services are listed below:
                </p>
                <p>
                <ul>
                    <li>
                        Multimedia classroom
                    </li>
                    <li>
                        Downtown location
                    </li>
                    <li>
                        Modernized and efficient practical lab
                    </li>
                    <li>
                        Reasonable fee structure
                    </li>
                    <li>
                        International teaching methodology
                    </li>
                    <li>
                        Free Internet facilities
                    </li>
                    <li>
                        Free tools and kits
                    </li>
                    <li>
                        Free notes and handouts
                    </li>
                    <li>
                        Free Demo and Observation
                    </li>
                    <li>
                        Sports activities
                    </li>
                    <li>
                        Scout membership and trainings
                    </li>
                    <li>
                        Job Placement
                    </li>
                    <li>
                        Industrial Training
                    </li>
                    <li>
                        Hotel Visit
                    </li>
                    <li>
                        Event Management
                    </li>
                    <li>
                        Life skill oriented counselling’s
                    </li>
                </ul>
                </p>','','');
INSERT INTO settings VALUES('35','placement-and-support-unit','<h3 class=\"text-uppercase mt-0\">Placement <span class=\"text-theme-colored2\">Support</span> Unit</h3>
                <div class=\"double-line-bottom-theme-colored-2\"></div>
                <p class=\"mt-20\">
                    The Department of Placement is the backbone of any institution. We have separate placement support unit (PSU) for the support of our students. From the very beginning the institute lays greater emphasis on placement of
                    students. The Placement unit of the institute centrally assists students throughout foreign placement as well as domestic placement. The placement unit provides complete support to face interview. The unit trains the
                    students with placement readiness programs which include effective communication and skill for employment training.
                </p>
                <strong>Objective</strong>
                <p>
                <ul>
                    <li>
                        Developing the student’s knowledge and skills to meet the recruitment process.
                    </li>
                    <li>
                        To develop the interpersonal skills required to enable them to work efficiently as a member of a team trying to achieve organizational goals.
                    </li>
                    <li>
                        To motivate students to develop their overall personality in terms of career planning and goal setting.
                    </li>
                    <li>
                        To organize students so that they can receive, quickly understand and carry out instructions to the satisfaction of their employer as a means of developing towards the completion of more responsible work.
                    </li>
                    <li>
                        To act as a link between students and the employment community.
                    </li>
                    <li>
                        To achieve 100 % Placements for Eligible Students.
                    </li>
                </ul>
                </p>
                <p>
                    <strong>Countries of Placement</strong><br>
                    China, Macau, Bahrain, UAE, Saudi Arabia, Oman, Malaysia etc <br>
                    <strong>Some data of our past students who are working in abroad as well as inside Nepal</strong>
                <ul>
                    <li>
                        Shankar Subedi, our 5th batch student working in Park and Resort Hotel, Dubai.
                    </li>
                    <li>
                        Amrit Shrestha, our 5th Batch student working in Marriot Hotel, Kathmandu, Nepal.
                    </li>
                    <li>
                        Bibek Adhikari, our 5th Batch student working in Dubai.
                    </li>
                    <li>
                        Manish K.C , our 4th Batch Student working in Radisson Hotel , Kathmandu Nepal.
                    </li>
                    <li>
                        Rabina Karki, our 4th batch student working in Dubai.
                    </li>
                </ul>
                </p>','','');
INSERT INTO settings VALUES('36','popular-courses','DAPS offers Barista, DHM, ADHM, Barman','','');
INSERT INTO settings VALUES('37','modern-book-library','DAPS prefers Modern Book to our students for their betterment.','','');
INSERT INTO settings VALUES('38','qualified-teacher','DAPS have better qualified teacher.','','');
INSERT INTO settings VALUES('39','update-notification','DAPS notify you about our latest news, courses, events through our application as soon as possible.','','');
INSERT INTO settings VALUES('40','entertainment-facilities','DAPS offers ample envelopes of quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined
                    outcome and facilities that justify the growing demand of the hospitality arena.','','');
INSERT INTO settings VALUES('41','online-support','DAPS provides online payment system alongwith private accounts for their payment details, notification and mailing.','','');
INSERT INTO settings VALUES('42','starting_time','7.00 am','','');
INSERT INTO settings VALUES('43','ending_time','3.00 pm','','');
INSERT INTO settings VALUES('44','secondary_email','infodreamsacademy@gmail.com','','');
INSERT INTO settings VALUES('45','why-choose-us','new-image.jpg','','');
INSERT INTO settings VALUES('46','journey-title','In 2020 We Start Our Journey','','');
INSERT INTO settings VALUES('47','journey-details','<h3 class=\"font-weight-500 font-30 font- mt-10\">Make <span class=\"text-theme-colored\">Your Dream Education</span> </h3>
                <p>Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and
                    Hospitality Management to the enthusiastic students.</p>','','');
INSERT INTO settings VALUES('48','journey-youtube','1','','');
INSERT INTO settings VALUES('49','journey-poster','team.jpg','','');



DROP TABLE IF EXISTS share_files;

CREATE TABLE `share_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS sliders;

CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sliders VALUES('1','','','','','','','sliders/abff8156-f5e7-4fc4-a239-362fa635b95d.jpg','right','2021-04-24 14:28:13','2021-04-24 14:28:13');
INSERT INTO sliders VALUES('2','','','','','','','sliders/b2328061-c8e8-4371-83a2-b6417dceeda9.jpg','center','2021-04-24 14:32:50','2021-04-24 14:32:50');
INSERT INTO sliders VALUES('3','','','','','','','sliders/1461d223-3eb8-49e5-b094-eb21ce3813aa.jpg','left','2021-04-25 15:47:14','2021-04-25 15:47:14');
INSERT INTO sliders VALUES('4','','','','','','','sliders/13b9b4c9-52d2-49ad-97ed-2eafd1c6c64b.jpg','left','2021-04-25 15:47:57','2021-04-25 15:47:57');



DROP TABLE IF EXISTS staff_attendances;

CREATE TABLE `staff_attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_assignments;

CREATE TABLE `student_assignments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_attendances;

CREATE TABLE `student_attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_payments;

CREATE TABLE `student_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS student_sessions;

CREATE TABLE `student_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS students;

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_no` decimal(10,0) NOT NULL,
  `passport` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_citizenship_no_unique` (`citizenship_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS subjects;

CREATE TABLE `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS syllabus;

CREATE TABLE `syllabus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS tags;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS teachers;

CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS testimonials;

CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS transactions;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS user_messages;

CREATE TABLE `user_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `read` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS user_notices;

CREATE TABLE `user_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(11) NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO user_notices VALUES('1','1','Website','2021-05-01 01:47:59','2021-05-01 01:47:59');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES('1','Rupesh Chaudhary','rupeshchaudhary7338@gmail.com','','9880227545','profile.png','$2y$10$rYHUCHhxe0ntz2vlHzjl9Op.bFBqeCPFBk3WNXVQ2ADjdmljJyjH6','','','');
INSERT INTO users VALUES('2','Girish Dhungel','girshdhungel@gmail.com','','','users/8bfc5d5b-b450-4095-a5a7-2cbfd48f7dfe.jpg','$2y$10$8r3vfOzCaD8Ms4Y9PNRymeSXPgZMwGRdm/s11AladQZ76khLYJ7Om','','2021-04-25 15:46:08','2021-04-25 15:46:08');
INSERT INTO users VALUES('4','Rupesh Chaudhary','raxroohpayash@gmail.com','','9880227545','','$2y$10$j/hJtJMgtKtddDU0Oju/le9I0bBZ1dfK1Sqm5VgGrRfrliBi2GnCm','','2021-04-29 19:08:53','2021-04-29 19:08:53');



