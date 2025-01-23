-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2024 at 06:01 AM
-- Server version: 9.0.1
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fit2104_a5`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `replied` tinyint(1) NOT NULL,
  `organisation_id` int DEFAULT NULL,
  `contractor_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `message`, `replied`, `organisation_id`, `contractor_id`) VALUES
(1, 'Amy', 'Bob', '0403856828', 'admin@example.com', 'I need enquiries regarding this new project\r\n\r\n\r\nI need \r\n\r\n\r\nhelp ', 0, 1, 74),
(5, 'help', 'Heng', '0403856828', 'admin@gmail.com', 'im the higest in te room', 1, 1, 1),
(19, 'Yu Heng', 'Seow', '0423279098', 'seowyh98@gmail.com', 'Hi, I would like to have a meeting with u guys <3', 0, 67, 74),
(20, 'Lucy', 'Heng', '0403856828', 'lucymay@example.com', 'im interested', 0, NULL, NULL),
(21, 'Matthew ', 'Lim', '0124258284', 'matthew.lim@gmail.com', 'Hello, I\'m interested in working with you. ', 0, 1, NULL),
(22, 'Jordan', 'Ng', '0403856828', 'jordan@gmail.com', 'Hello, I would like to ask for enquiries.\r\n\r\nThank you.', 0, NULL, NULL),
(23, 'Jamie', 'Heng', '0403856828', 'jamie.heng@gmail.com', 'Hi, I\'m interested!', 0, NULL, 32),
(24, 'John', 'Cena', '0124258243', 'john.cena@gmail.com', 'Hello ! I would really like to work with you. Hope you get back to me soon !', 1, NULL, NULL),
(25, 'Tyler', 'Belvins', '0403856828', 'admin@example.com', 'Hello I would like to work with you', 0, 70, 76),
(26, 'Gru', 'Heng', '0425233232', 'gru.heng@gmail.com', 'Hello world', 1, 9, NULL),
(27, 'Tyler', 'Rhoades', '0405323442', 'tyler.rhodes@gmail.com', 'Hello, I\'m interest in working on this project with you', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `photo`) VALUES
(1, 'John', 'Doe', '412345678', 'john.doe@example.com', 'photo-ff465084-3378-4649-b972-21cdfd03b13a-doe.jpg'),
(2, 'Jane', 'Smith', '412678901', 'jane.smith@example.com', 'photo-0954c3c9-b0bd-49ad-9d98-bb03f43e9fa6-smith.jpeg'),
(3, 'Michael', 'Brown', '412234567', 'michael.brown@example.com', 'photo-02151b9d-f797-4f0a-8262-596f0ef5e2ca-brown.jpg'),
(4, 'Emily', 'Davis', '412987654', 'emily.davis@example.com', 'photo-b27fe8fa-6448-406c-a208-1a5ffe28df68-davis.jpg'),
(5, 'Sarah', 'Wilson', '412345987', 'sarah.wilson@example.com', 'photo-618d0ef8-f629-4087-81e5-0fbb83170293-wilson.jpg'),
(6, 'David', 'Johnson', '412567890', 'david.johnson@example.com', 'photo-b2dfc90c-0895-4d78-bdc1-bd0009950f56-johnson.jpg'),
(7, 'Laura', 'Martinez', '412678234', 'laura.martinez@example.com', ''),
(8, 'Robert', 'Lee', '412789345', 'robert.lee@example.com', ''),
(9, 'Michelle', 'Harris', '412890456', 'michelle.harris@example.com', ''),
(10, 'William', 'Clark', '412901567', 'william.clark@example.com', ''),
(11, 'Jessica', 'Lewis', '412123456', 'jessica.lewis@example.com', ''),
(12, 'Brian', 'Walker', '412234678', 'brian.walker@example.com', ''),
(13, 'Olivia', 'Hall', '412345789', 'olivia.hall@example.com', ''),
(14, 'James', 'Allen', '412456890', 'james.allen@example.com', ''),
(15, 'Isabella', 'Young', '412567901', 'isabella.young@example.com', ''),
(16, 'Daniel', 'Wright', '412678012', 'daniel.wright@example.com', ''),
(17, 'Ava', 'Scott', '412789123', 'ava.scott@example.com', ''),
(18, 'Matthew', 'Adams', '412890234', 'matthew.adams@example.com', ''),
(19, 'Sophie', 'Nelson', '412901345', 'sophie.nelson@example.com', ''),
(20, 'Andrew', 'Carter', '412123567', 'andrew.carter@example.com', ''),
(21, 'Chloe', 'Mitchell', '412234678', 'chloe.mitchell@example.com', ''),
(22, 'Ethan', 'Roberts', '412345789', 'ethan.roberts@example.com', ''),
(23, 'Mia', 'Turner', '412456890', 'mia.turner@example.com', ''),
(24, 'Lucas', 'Phillips', '412567901', 'lucas.phillips@example.com', ''),
(25, 'Emma', 'Campbell', '412678012', 'emma.campbell@example.com', ''),
(26, 'Alexander', 'Parker', '412789123', 'alexander.parker@example.com', ''),
(27, 'Lily', 'Evans', '412890234', 'lily.evans@example.com', ''),
(28, 'Jacob', 'Edwards', '412901345', 'jacob.edwards@example.com', ''),
(29, 'Charlotte', 'Collins', '412123456', 'charlotte.collins@example.com', ''),
(30, 'Ryan', 'Stewart', '412234567', 'ryan.stewart@example.com', ''),
(31, 'Amelia', 'Morris', '412345678', 'amelia.morris@example.com', ''),
(32, 'Aiden', 'Rogers', '412456789', 'aiden.rogers@example.com', ''),
(33, 'Grace', 'Reed', '412567890', 'grace.reed@example.com', ''),
(34, 'Noah', 'Cook', '412678901', 'noah.cook@example.com', ''),
(35, 'Mia', 'Bell', '412789012', 'mia.bell@example.com', ''),
(36, 'Jack', 'Murphy', '412890123', 'jack.murphy@example.com', ''),
(37, 'Ella', 'Bailey', '412901234', 'ella.bailey@example.com', ''),
(38, 'Lucas', 'Rivera', '412123345', 'lucas.rivera@example.com', ''),
(39, 'Harper', 'Cooper', '412234456', 'harper.cooper@example.com', ''),
(40, 'Benjamin', 'Richardson', '412345567', 'benjamin.richardson@example.com', ''),
(41, 'Lily', 'Wood', '412456678', 'lily.wood@example.com', ''),
(42, 'Mason', 'Cox', '412567789', 'mason.cox@example.com', ''),
(43, 'Aria', 'Ward', '412678890', 'aria.ward@example.com', ''),
(44, 'James', 'Foster', '412789901', 'james.foster@example.com', ''),
(45, 'Zoe', 'James', '412890012', 'zoe.james@example.com', ''),
(46, 'Elijah', 'Bennett', '412901123', 'elijah.bennett@example.com', ''),
(47, 'Scarlett', 'Gray', '412123234', 'scarlett.gray@example.com', ''),
(48, 'Matthew', 'Simmons', '412234345', 'matthew.simmons@example.com', ''),
(49, 'Evelyn', 'Hayes', '412345456', 'evelyn.hayes@example.com', ''),
(50, 'Jack', 'Brooks', '412456567', 'jack.brooks@example.com', ''),
(73, 'Hello', 'Heng', '0403856828', 'admin@example.com', ''),
(74, 'Yu Heng ', 'Seow', '0423279098', 'seowyh98@gmail.com', 'photo-55df0a7a-6243-4499-9861-0eec95fd21b6-seow.jpg'),
(76, 'Bethany', 'Seow', '0403856828', 'bethany.seow@gmail.com', 'photo-04b5bead-959f-459c-9084-ce8bf4a5559c-seow.jpeg'),
(77, 'Ian', 'Seow', '0403856828', 'ian.seow@gmail.com', 'photo-36c4ac64-7f5e-4847-9de2-2fc3adbb6fc6-seow.jpeg'),
(78, 'Jim', 'Seow', '0423279098', 'jim.seow@gmail.com', 'photo-e4956023-cc7b-48b4-a8b5-3e5420aac764-seow.jpg'),
(79, 'Natalie', 'Person', '0423279098', 'natalie.person@gmail.com', 'photo-46e30060-a6d0-4c41-af86-116ee52a4bf7-person.jpg'),
(81, 'Floyd', 'Mayweather', '0423279098', 'floyd.mayweather@gmail.com', 'photo-31a11f18-d4e6-4ccf-a1e3-4d74f336956c-mayweather.jpeg'),
(82, 'Jamie', 'Ng', '0403856828', 'jamie.ng@gmail.com', 'photo-1ed35996-192b-44db-86b0-7616fe9f0fc6-ng.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `contractors_skills`
--

CREATE TABLE `contractors_skills` (
  `id` int NOT NULL,
  `contractor_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractors_skills`
--

INSERT INTO `contractors_skills` (`id`, `contractor_id`, `skill_id`) VALUES
(1, 1, 1),
(3, 2, 4),
(9, 1, 2),
(10, 1, 5),
(45, 74, 2),
(46, 74, 3),
(49, 2, 6),
(50, 2, 7),
(53, 76, 1),
(54, 76, 3),
(55, 76, 6),
(56, 76, 8),
(57, 77, 1),
(58, 77, 9),
(59, 78, 2),
(60, 78, 3),
(61, 78, 6),
(62, 78, 10),
(63, 79, 8),
(64, 79, 10),
(65, 5, 10),
(69, 81, 3),
(70, 81, 6),
(71, 81, 7),
(72, 82, 3),
(73, 82, 8),
(74, 82, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dummy_organisations`
--

CREATE TABLE `dummy_organisations` (
  `business_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `industry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dummy_organisations`
--

INSERT INTO `dummy_organisations` (`business_name`, `contact_first_name`, `contact_last_name`, `contact_email`, `current_website`, `industry`) VALUES
('Tech Innovators', 'John', 'Smith', 'john.smith@techinnovators.com', 'http://techinnovators.com', 'Technology'),
('Green Solutions', 'Emily', 'Johnson', 'emily.johnson@greensolutions.com', 'http://greensolutions.com', 'Environmental'),
('Future Enterprises', 'Michael', 'Brown', 'michael.brown@futureenterprises.com', 'http://futureenterprises.com', 'Consulting'),
('Health Hub', 'Sarah', 'Wilson', 'sarah.wilson@healthhub.com', 'http://healthhub.com', 'Healthcare'),
('FinServe Group', 'David', 'Clark', 'david.clark@finservegroup.com', 'http://finservegroup.com', 'Finance'),
('Smart Design', 'Laura', 'Martinez', 'laura.martinez@smartdesign.com', 'http://smartdesign.com', 'Design'),
('Auto Solutions', 'Robert', 'Lee', 'robert.lee@autosolutions.com', 'http://autosolutions.com', 'Automotive'),
('Urban Living', 'Michelle', 'Harris', 'michelle.harris@urbanliving.com', 'http://urbanliving.com', 'Real Estate'),
('Code Wizards', 'William', 'Walker', 'william.walker@codewizards.com', 'http://codewizards.com', 'Software'),
('Creative Minds', 'Jessica', 'Adams', 'jessica.adams@creativeminds.com', 'http://creativeminds.com', 'Marketing'),
('Secure IT', 'Brian', 'Mitchell', 'brian.mitchell@secureit.com', 'http://secureit.com', 'IT Security'),
('Global Trade', 'Olivia', 'Roberts', 'olivia.roberts@globaltrade.com', 'http://globaltrade.com', 'Logistics'),
('Elite Partners', 'James', 'Turner', 'james.turner@elitepartners.com', 'http://elitepartners.com', 'Partnerships'),
('Innovate Health', 'Isabella', 'Scott', 'isabella.scott@innovatehealth.com', 'http://innovatehealth.com', 'Healthcare'),
('NextGen Tech', 'Daniel', 'Carter', 'daniel.carter@nextgentech.com', 'http://nextgentech.com', 'Technology'),
('Bright Future', 'Ava', 'Wright', 'ava.wright@brightfuture.com', 'http://brightfuture.com', 'Education'),
('Green Earth', 'Mia', 'Young', 'mia.young@greenearth.com', 'http://greenearth.com', 'Environmental'),
('Finance Experts', 'Matthew', 'King', 'matthew.king@financeexperts.com', 'http://financeexperts.com', 'Finance'),
('Tech Pioneers', 'Sophie', 'Evans', 'sophie.evans@techpioneers.com', 'http://techpioneers.com', 'Technology'),
('HealthFirst', 'Andrew', 'Green', 'andrew.green@healthfirst.com', 'http://healthfirst.com', 'Healthcare'),
('Market Leaders', 'Chloe', 'Hall', 'chloe.hall@marketleaders.com', 'http://marketleaders.com', 'Marketing'),
('Visionary Designs', 'Ethan', 'Adams', 'ethan.adams@visionarydesigns.com', 'http://visionarydesigns.com', 'Design'),
('Auto Vision', 'Lily', 'Mitchell', 'lily.mitchell@autovision.com', 'http://autovision.com', 'Automotive'),
('Urban Tech', 'Jacob', 'Bennett', 'jacob.bennett@urbantech.com', 'http://urbantech.com', 'Technology'),
('Pro Health', 'Charlotte', 'Collins', 'charlotte.collins@prohealth.com', 'http://prohealth.com', 'Healthcare'),
('Innovative Solutions', 'Ryan', 'Wood', 'ryan.wood@innovativesolutions.com', 'http://innovativesolutions.com', 'Consulting'),
('NextGen Designs', 'Amelia', 'Stewart', 'amelia.stewart@nextgendesigns.com', 'http://nextgendesigns.com', 'Design'),
('Smart Living', 'Lucas', 'Young', 'lucas.young@smartliving.com', 'http://smartliving.com', 'Real Estate'),
('Elite Tech', 'Emma', 'Rogers', 'emma.rogers@elitetech.com', 'http://elitetech.com', 'Technology'),
('Global Solutions', 'Alexander', 'Price', 'alexander.price@globalsolutions.com', 'http://globalsolutions.com', 'Logistics'),
('FinTech Partners', 'Grace', 'Cooper', 'grace.cooper@fintechpartners.com', 'http://fintechpartners.com', 'Finance'),
('Tech Advance', 'Noah', 'Walker', 'noah.walker@techadvance.com', 'http://techadvance.com', 'Technology'),
('Creative Tech', 'Harper', 'James', 'harper.james@creativetech.com', 'http://creativetech.com', 'Design'),
('Health Innovators', 'James', 'Harris', 'james.harris@healthinnovators.com', 'http://healthinnovators.com', 'Healthcare'),
('Tech Savvy', 'Ella', 'Nelson', 'ella.nelson@techsavvy.com', 'http://techsavvy.com', 'Technology'),
('Smart Solutions', 'Zoe', 'Clark', 'zoe.clark@smartsolutions.com', 'http://smartsolutions.com', 'Consulting'),
('Future Health', 'Elijah', 'Scott', 'elijah.scott@futurehealth.com', 'http://futurehealth.com', 'Healthcare'),
('Finance Future', 'Scarlett', 'Green', 'scarlett.green@financefuture.com', 'http://financefuture.com', 'Finance'),
('Urban Innovators', 'Matthew', 'Lee', 'matthew.lee@urbaninnovators.com', 'http://urbaninnovators.com', 'Real Estate'),
('Tech Experts', 'Evelyn', 'Walker', 'evelyn.walker@techexperts.com', 'http://techexperts.com', 'Technology'),
('Global Ventures', 'Jack', 'Martinez', 'jack.martinez@globalventures.com', 'http://globalventures.com', 'Logistics'),
('Elite Finance', 'Emily', 'Roberts', 'emily.roberts@elitefinance.com', 'http://elitefinance.com', 'Finance'),
('Health Solutions', 'Benjamin', 'Adams', 'benjamin.adams@healthsolutions.com', 'http://healthsolutions.com', 'Healthcare'),
('Innovative Designs', 'Lily', 'Smith', 'lily.smith@innovative-designs.com', 'http://innovative-designs.com', 'Design'),
('Auto Experts', 'Mason', 'Brown', 'mason.brown@autoexperts.com', 'http://autoexperts.com', 'Automotive'),
('Tech Innovators', 'Aria', 'Green', 'aria.green@techinnovators.com', 'http://techinnovators.com', 'Technology'),
('NextGen Solutions', 'James', 'Wright', 'james.wright@nextgensolutions.com', 'http://nextgensolutions.com', 'Consulting'),
('Smart Health', 'Lily', 'Young', 'lily.young@smarthealth.com', 'http://smarthealth.com', 'Healthcare'),
('Finance Innovators', 'Jack', 'Evans', 'jack.evans@financeinnovators.com', 'http://financeinnovators.com', 'Finance'),
('Urban Future', 'Grace', 'Baker', 'grace.baker@urbanfuture.com', 'http://urbanfuture.com', 'Real Estate');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int NOT NULL,
  `industry_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry_name`) VALUES
(1, 'Technology'),
(2, 'Environmental'),
(3, 'Consulting'),
(4, 'Healthcare'),
(5, 'Finance'),
(6, 'Design'),
(7, 'Automotive'),
(8, 'Real Estate'),
(9, 'Software'),
(10, 'Marketing'),
(11, 'IT Security'),
(12, 'Logistics'),
(13, 'Partnerships'),
(14, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` int NOT NULL,
  `business_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `current_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `industry_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `business_name`, `contact_first_name`, `contact_last_name`, `contact_email`, `current_website`, `industry_id`) VALUES
(1, 'Tech Innovators', 'John', 'Smith', 'john.smith@techinnovators.com', 'http://techinnovators.com', 1),
(2, 'Green Solutions', 'Emily', 'Johnson', 'emily.johnson@greensolutions.com', 'http://greensolutions.com', 2),
(3, 'Future Enterprises', 'Michael', 'Brown', 'michael.brown@futureenterprises.com', 'http://futureenterprises.com', 3),
(4, 'Health Hub', 'Sarah', 'Wilson', 'sarah.wilson@healthhub.com', 'http://healthhub.com', 4),
(5, 'FinServe Group', 'David', 'Clark', 'david.clark@finservegroup.com', 'http://finservegroup.com', 5),
(6, 'Smart Design', 'Laura', 'Martinez', 'laura.martinez@smartdesign.com', 'http://smartdesign.com', 6),
(7, 'Auto Solutions', 'Robert', 'Lee', 'robert.lee@autosolutions.com', 'http://autosolutions.com', 7),
(8, 'Urban Living', 'Michelle', 'Harris', 'michelle.harris@urbanliving.com', 'http://urbanliving.com', 8),
(9, 'Code Wizards', 'William', 'Walker', 'william.walker@codewizards.com', 'http://codewizards.com', 9),
(10, 'Creative Minds', 'Jessica', 'Adams', 'jessica.adams@creativeminds.com', 'http://creativeminds.com', 10),
(11, 'Secure IT', 'Brian', 'Mitchell', 'brian.mitchell@secureit.com', 'http://secureit.com', 11),
(12, 'Global Trade', 'Olivia', 'Roberts', 'olivia.roberts@globaltrade.com', 'http://globaltrade.com', 12),
(13, 'Elite Partners', 'James', 'Turner', 'james.turner@elitepartners.com', 'http://elitepartners.com', 13),
(14, 'Innovate Health', 'Isabella', 'Scott', 'isabella.scott@innovatehealth.com', 'http://innovatehealth.com', 4),
(15, 'NextGen Tech', 'Daniel', 'Carter', 'daniel.carter@nextgentech.com', 'http://nextgentech.com', 1),
(16, 'Bright Future', 'Ava', 'Wright', 'ava.wright@brightfuture.com', 'http://brightfuture.com', 14),
(17, 'Green Earth', 'Mia', 'Young', 'mia.young@greenearth.com', 'http://greenearth.com', 2),
(18, 'Finance Experts', 'Matthew', 'King', 'matthew.king@financeexperts.com', 'http://financeexperts.com', 5),
(19, 'Tech Pioneers', 'Sophie', 'Evans', 'sophie.evans@techpioneers.com', 'http://techpioneers.com', 1),
(20, 'HealthFirst', 'Andrew', 'Green', 'andrew.green@healthfirst.com', 'http://healthfirst.com', 4),
(21, 'Market Leaders', 'Chloe', 'Hall', 'chloe.hall@marketleaders.com', 'http://marketleaders.com', 10),
(22, 'Visionary Designs', 'Ethan', 'Adams', 'ethan.adams@visionarydesigns.com', 'http://visionarydesigns.com', 6),
(23, 'Auto Vision', 'Lily', 'Mitchell', 'lily.mitchell@autovision.com', 'http://autovision.com', 7),
(24, 'Urban Tech', 'Jacob', 'Bennett', 'jacob.bennett@urbantech.com', 'http://urbantech.com', 1),
(25, 'Pro Health', 'Charlotte', 'Collins', 'charlotte.collins@prohealth.com', 'http://prohealth.com', 4),
(26, 'Innovative Solutions', 'Ryan', 'Wood', 'ryan.wood@innovativesolutions.com', 'http://innovativesolutions.com', 3),
(27, 'NextGen Designs', 'Amelia', 'Stewart', 'amelia.stewart@nextgendesigns.com', 'http://nextgendesigns.com', 6),
(28, 'Smart Living', 'Lucas', 'Young', 'lucas.young@smartliving.com', 'http://smartliving.com', 8),
(29, 'Elite Tech', 'Emma', 'Rogers', 'emma.rogers@elitetech.com', 'http://elitetech.com', 1),
(30, 'Global Solutions', 'Alexander', 'Price', 'alexander.price@globalsolutions.com', 'http://globalsolutions.com', 12),
(31, 'FinTech Partners', 'Grace', 'Cooper', 'grace.cooper@fintechpartners.com', 'http://fintechpartners.com', 5),
(32, 'Tech Advance', 'Noah', 'Walker', 'noah.walker@techadvance.com', 'http://techadvance.com', 1),
(33, 'Creative Tech', 'Harper', 'James', 'harper.james@creativetech.com', 'http://creativetech.com', 6),
(34, 'Health Innovators', 'James', 'Harris', 'james.harris@healthinnovators.com', 'http://healthinnovators.com', 4),
(35, 'Tech Savvy', 'Ella', 'Nelson', 'ella.nelson@techsavvy.com', 'http://techsavvy.com', 1),
(36, 'Smart Solutions', 'Zoe', 'Clark', 'zoe.clark@smartsolutions.com', 'http://smartsolutions.com', 3),
(37, 'Future Health', 'Elijah', 'Scott', 'elijah.scott@futurehealth.com', 'http://futurehealth.com', 4),
(38, 'Finance Future', 'Scarlett', 'Green', 'scarlett.green@financefuture.com', 'http://financefuture.com', 5),
(39, 'Urban Innovators', 'Matthew', 'Lee', 'matthew.lee@urbaninnovators.com', 'http://urbaninnovators.com', 8),
(40, 'Tech Experts', 'Evelyn', 'Walker', 'evelyn.walker@techexperts.com', 'http://techexperts.com', 1),
(41, 'Global Ventures', 'Jack', 'Martinez', 'jack.martinez@globalventures.com', 'http://globalventures.com', 12),
(42, 'Elite Finance', 'Emily', 'Roberts', 'emily.roberts@elitefinance.com', 'http://elitefinance.com', 5),
(43, 'Health Solutions', 'Benjamin', 'Adams', 'benjamin.adams@healthsolutions.com', 'http://healthsolutions.com', 4),
(44, 'Innovative Designs', 'Lily', 'Smith', 'lily.smith@innovative-designs.com', 'http://innovative-designs.com', 6),
(45, 'Auto Experts', 'Mason', 'Brown', 'mason.brown@autoexperts.com', 'http://autoexperts.com', 7),
(46, 'Tech Innovators', 'Aria', 'Green', 'aria.green@techinnovators.com', 'http://techinnovators.com', 1),
(47, 'NextGen Solutions', 'James', 'Wright', 'james.wright@nextgensolutions.com', 'http://nextgensolutions.com', 3),
(48, 'Smart Health', 'Lily', 'Young', 'lily.young@smarthealth.com', 'http://smarthealth.com', 4),
(49, 'Finance Innovators', 'Jack', 'Evans', 'jack.evans@financeinnovators.com', 'http://financeinnovators.com', 5),
(50, 'Urban Future', 'Grace', 'Baker', 'grace.baker@urbanfuture.com', 'http://urbanfuture.com', 8),
(67, 'Coles', 'Yu Heng ', 'Seow', 'seowyh98@gmail.com', 'Coles.com', 1),
(68, 'Creative Store House', 'Matthew ', 'Lim', 'matthew.lim@example.com', 'www.creativestorehouse.com', 10),
(70, 'CirclesLife', 'Stephen', 'Rue', 'stephen.rue@gmail.com', 'https://www.optus.com.au/', 1),
(71, 'Tesla', 'Elon', 'Musk', 'elon.musk@gmail.com', 'https://www.tesla.com/', 7),
(72, 'Creative Warehouse', 'Yu Heng ', 'Bob', 'matthew.bob@gmail.com', 'https://www.optus.com.au/', 1),
(74, 'Colgate', 'Noel', 'Wallace', 'noel.wallace@gmail.com', 'https://www.colgatepalmolive.com.au/', 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `project_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `management_tool_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_due_date` date NOT NULL,
  `last_checked` date DEFAULT NULL,
  `complete` tinyint(1) NOT NULL,
  `organisation_id` int NOT NULL,
  `contractor_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `description`, `management_tool_link`, `project_due_date`, `last_checked`, `complete`, `organisation_id`, `contractor_id`) VALUES
(1, 'Alpha Initiative', 'First phase of the new system development', 'http://pmtool.example.com/alpha', '2024-10-15', '2024-10-28', 1, 7, 3),
(2, 'Beta Rollout', 'Second phase implementation', 'http://pmtool.example.com/beta', '2024-11-01', '2024-10-26', 0, 15, 6),
(3, 'Client Migration', 'Migrate clients to the new platform', 'http://pmtool.example.com/migration', '2024-12-01', '2024-10-26', 0, 12, 2),
(4, 'Data Analytics', 'Develop data analytics tools', 'http://pmtool.example.com/analytics', '2024-10-30', '2024-10-25', 1, 5, 1),
(5, 'Employee Training', 'Training for new system users', 'http://pmtool.example.com/training', '2024-11-15', '2024-09-15', 0, 19, 8),
(6, 'Feature Update', 'Update key features in the application', 'http://pmtool.example.com/feature-update', '2024-12-15', '2024-09-18', 0, 9, 4),
(7, 'Security Audit', 'Conduct a security audit', 'http://pmtool.example.com/security', '2024-10-20', '2024-10-26', 1, 1, 12),
(8, 'Infrastructure Upgrade', 'Upgrade server infrastructure', 'http://pmtool.example.com/infrastructure', '2024-11-30', '2024-10-26', 0, 14, 7),
(9, 'Market Research', 'Research for new market opportunities', 'http://pmtool.example.com/market-research', '2024-12-10', '2024-09-25', 0, 6, 11),
(10, 'Customer Feedback', 'Analyze customer feedback and make improvements', 'http://pmtool.example.com/feedback', '2024-10-25', '2024-09-27', 1, 11, 16),
(11, 'Sales Dashboard', 'Create a new sales dashboard', 'http://pmtool.example.com/sales-dashboard', '2024-10-05', '2024-09-28', 0, 3, 19),
(12, 'Product Launch', 'Launch the new product', 'http://pmtool.example.com/product-launch', '2024-11-10', '2024-09-30', 0, 2, 5),
(13, 'User Experience', 'Improve user experience based on feedback', 'http://pmtool.example.com/ux-improvement', '2024-12-05', '2024-10-01', 0, 20, 9),
(14, 'Tech Support', 'Enhance tech support services', 'http://pmtool.example.com/tech-support', '2024-10-15', '2024-10-02', 0, 13, 14),
(15, 'Data Migration', 'Migrate historical data to new system', 'http://pmtool.example.com/data-migration', '2024-11-05', '2024-10-04', 0, 10, 18),
(16, 'API Integration', 'Integrate new APIs', 'http://pmtool.example.com/api-integration', '2024-12-01', '2024-10-07', 0, 8, 20),
(17, 'Client Onboarding', 'Onboard new clients', 'http://pmtool.example.com/client-onboarding', '2024-10-20', '2024-10-10', 1, 18, 15),
(18, 'Performance Tuning', 'Tune application performance', 'http://pmtool.example.com/performance-tuning', '2024-11-20', '2024-10-12', 0, 4, 2),
(19, 'Backup System', 'Implement new backup system', 'http://pmtool.example.com/backup-system', '2024-12-20', '2024-10-15', 0, 16, 6),
(20, 'Compliance Check', 'Ensure compliance with new regulations', 'http://pmtool.example.com/compliance', '2024-10-25', '2024-10-17', 1, 17, 4),
(21, 'Mobile App', 'Develop a mobile application', 'http://pmtool.example.com/mobile-app', '2024-11-30', '2024-10-20', 0, 22, 10),
(22, 'Customer Portal', 'Build a new customer portal', 'http://pmtool.example.com/customer-portal', '2024-12-15', '2024-10-22', 0, 21, 7),
(23, 'Internal Audit', 'Conduct an internal audit', 'http://pmtool.example.com/internal-audit', '2024-10-10', '2024-10-25', 1, 15, 11),
(24, 'Website Redesign', 'Redesign the company website', 'http://pmtool.example.com/website-redesign', '2024-11-10', '2024-10-27', 0, 9, 12),
(25, 'Vendor Management', 'Improve vendor management processes', 'http://pmtool.example.com/vendor-management', '2024-12-01', '2024-10-30', 0, 4, 13),
(26, 'Staff Recruitment', 'Recruit new staff members', 'http://pmtool.example.com/staff-recruitment', '2024-10-15', '2024-11-01', 0, 6, 18),
(27, 'Product Update', 'Update existing products', 'http://pmtool.example.com/product-update', '2024-11-20', '2024-11-03', 0, 13, 14),
(28, 'Client Feedback', 'Collect and analyze client feedback', 'http://pmtool.example.com/client-feedback', '2024-12-10', '2024-11-05', 0, 11, 6),
(29, 'Server Maintenance', 'Perform server maintenance', 'http://pmtool.example.com/server-maintenance', '2024-10-30', '2024-11-07', 1, 20, 9),
(30, 'Software Upgrade', 'Upgrade the core software', 'http://pmtool.example.com/software-upgrade', '2024-11-15', '2024-11-10', 0, 7, 3),
(31, 'HR System', 'Implement new HR system', 'http://pmtool.example.com/hr-system', '2024-12-01', '2024-11-12', 0, 15, 1),
(32, 'Data Analysis', 'Analyze current data trends', 'http://pmtool.example.com/data-analysis', '2024-10-25', '2024-11-15', 1, 19, 8),
(33, 'CRM Integration', 'Integrate with new CRM', 'http://pmtool.example.com/crm-integration', '2024-11-30', '2024-11-18', 0, 8, 13),
(34, 'Event Planning', 'Plan and execute company events', 'http://pmtool.example.com/event-planning', '2024-12-10', '2024-11-20', 0, 14, 17),
(35, 'Employee Wellness', 'Develop employee wellness programs', 'http://pmtool.example.com/wellness', '2024-10-15', '2024-11-22', 0, 2, 12),
(36, 'Data Security', 'Enhance data security measures', 'http://pmtool.example.com/data-security', '2024-11-05', '2024-11-25', 1, 10, 4),
(37, 'API Development', 'Develop new APIs', 'http://pmtool.example.com/api-development', '2024-12-15', '2024-11-27', 0, 16, 7),
(38, 'Client Support', 'Improve client support services', 'http://pmtool.example.com/client-support', '2024-10-20', '2024-12-01', 0, 21, 18),
(39, 'Training Materials', 'Create training materials', 'http://pmtool.example.com/training-materials', '2024-11-10', '2024-12-05', 1, 6, 16),
(40, 'Employee Onboarding', 'Improve employee onboarding process', 'http://pmtool.example.com/employee-onboarding', '2024-12-01', '2024-12-07', 0, 12, 2),
(41, 'IT Infrastructure', 'Upgrade IT infrastructure', 'http://pmtool.example.com/it-infrastructure', '2024-10-15', '2024-12-10', 0, 13, 5),
(42, 'Customer Support', 'Enhance customer support capabilities', 'http://pmtool.example.com/customer-support', '2024-11-25', '2024-12-12', 1, 17, 10),
(43, 'Product Documentation', 'Update product documentation', 'http://pmtool.example.com/product-docs', '2024-12-10', '2024-12-15', 0, 9, 12),
(44, 'Vendor Integration', 'Integrate with new vendors', 'http://pmtool.example.com/vendor-integration', '2024-10-20', '2024-12-18', 0, 14, 19),
(45, 'Compliance Training', 'Provide compliance training', 'http://pmtool.example.com/compliance-training', '2024-11-15', '2024-12-20', 0, 20, 6),
(46, 'Website Maintenance', 'Perform website maintenance', 'http://pmtool.example.com/website-maintenance', '2024-12-01', '2024-12-22', 1, 11, 13),
(47, 'Marketing Campaign', 'Execute new marketing campaign', 'http://pmtool.example.com/marketing-campaign', '2024-10-30', '2024-12-25', 0, 15, 2),
(48, 'Client Retention', 'Develop client retention strategies', 'http://pmtool.example.com/client-retention', '2024-11-05', '2024-12-27', 0, 18, 9),
(49, 'Technology Assessment', 'Assess new technology trends', 'http://pmtool.example.com/technology-assessment', '2024-12-15', '2024-12-30', 0, 5, 16),
(50, 'Strategic Planning', 'Plan for the next fiscal year', 'http://pmtool.example.com/strategic-planning', '2024-10-25', '2024-12-31', 1, 2, 11),
(51, 'AI Training', 'AI Training for beginners course', 'https://www.google.com', '2024-11-01', '2024-10-27', 0, 11, NULL),
(53, 'Machine Learning Training', 'Train new clients on machine learning.', 'https://www.google.com', '2025-01-27', '2024-10-27', 1, 1, 5),
(54, 'The Teeth Project', 'We want to improve dental care for everyone!', 'https://www.google.com', '2024-12-08', NULL, 1, 74, 82);

-- --------------------------------------------------------

--
-- Table structure for table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects_skills`
--

INSERT INTO `projects_skills` (`id`, `project_id`, `skill_id`) VALUES
(1, 51, 1),
(2, 51, 2),
(3, 51, 3),
(10, 1, 2),
(11, 1, 5),
(12, 2, 1),
(13, 2, 2),
(14, 2, 4),
(15, 2, 5),
(16, 2, 11),
(17, 3, 2),
(18, 53, 2),
(19, 53, 4),
(20, 53, 5),
(21, 53, 10),
(22, 54, 3),
(23, 54, 5),
(24, 54, 6),
(25, 54, 7);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`) VALUES
(1, 'Python'),
(2, 'PHP'),
(3, 'JavaScript'),
(4, 'React'),
(5, 'Quality Assurance'),
(6, 'MongoDB'),
(7, 'Photoshop'),
(8, 'Figma'),
(9, 'UI/UX Design'),
(10, 'DevOps'),
(11, 'Blockchain');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(4, 'Nathan', 'Jim', 'admin@gmail.com', '$2y$10$N9bW04WkwOqJSIEbPB9Wmebt8NtRuT.4jR/rkRbbanqLJSiB3gMwi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractor_id` (`contractor_id`),
  ADD KEY `organisation_id` (`organisation_id`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractors_skills`
--
ALTER TABLE `contractors_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractor_id` (`contractor_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_id` (`industry_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `contractors_skills`
--
ALTER TABLE `contractors_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `projects_skills`
--
ALTER TABLE `projects_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contractors_skills`
--
ALTER TABLE `contractors_skills`
  ADD CONSTRAINT `contractors_skills_ibfk_1` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contractors_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organisations`
--
ALTER TABLE `organisations`
  ADD CONSTRAINT `organisations_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`);

--
-- Constraints for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD CONSTRAINT `projects_skills_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
