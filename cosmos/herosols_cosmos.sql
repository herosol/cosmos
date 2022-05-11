-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 10:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herosols_cosmos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(600) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `cat_id`, `title`, `slug`, `detail`, `image`, `meta_description`, `meta_keywords`, `date`) VALUES
(1, 1, '9 of the best professional biological examples we', '9-of-the-best-professional-biological-examples-we', '<p>What&#39;s your favorite sports team? The Cleveland Cavaliers? New England Patriots? Have you ever heard someone respond to this question with Team SoloMid or Philadelphia</p>\r\n', '470e7a4f017a5476afb7eeb3f8b96f9b_1604316086_7968.jpg', 'test', 'test', '2020-11-02 16:21:26'),
(2, 1, 'Blog SEO: How to optimize the search engines for your blog content', 'blog-seo-how-to-optimize-the-search-engines-for-your-blog-content', '<p>With the end of CES 2018, we are now looking forward to all the upcoming technology the new year should bring to us. For those unfamiliar with CES, this is the</p>\r\n', 'ce78d1da254c0843eb23951ae077ff5f_1604316146_9937.jpg', 'test', 'test', '2020-11-02 16:22:27'),
(3, 1, 'Email forwarding tips you must know by 2020', 'email-forwarding-tips-you-must-know-by-2020', '<p>The holiday season is fast approaching, so get ready to fill your socks with the hottest technology this year! Prepare for your vacation</p>\r\n', '20aee3a5f4643755a79ee5f6a73050ac_1604316178_9614.jpg', 'test', 'test', '2020-11-02 16:22:58'),
(4, 1, 'The best newsletter templates and resources for download right now', 'the-best-newsletter-templates-and-resources-for-download-right-now', '<p>Welcome to the latest installment of our holiday gift guides! Our other gift guides include computer recommendations by interest and suggestions on our favorite peripherals</p>\r\n', '202cb962ac59075b964b07152d234b70_1604316208_7005.jpg', 'test', 'test', '2020-11-02 16:23:28'),
(5, 1, 'Google Doc features you didn\'t know existed (but absolutely needed)', 'google-doc-features-you-didnt-know-existed-but-absolutely-needed', '<p>Looking for the perfect gifts this holiday season for you and your family? Give a better computer gift with high quality Overkill PCs.</p>\r\n', 'ad13a2a07ca4b7642959dc0c4c740ab6_1604316239_3519.jpg', 'test', 'test', '2020-11-02 16:23:59'),
(6, 1, 'Spoken and repeated jokes to satisfy your inner grammar', 'spoken-and-repeated-jokes-to-satisfy-your-inner-grammar', '<p>After only 10 short months, Intel&reg; released the offspring to its popular series Kaby Lake, the name of the Coffee Lake code. With that release comes</p>\r\n', '07563a3fe3bbe7e3ba84431ad9d055af_1604316268_8531.jpg', 'test', 'test', '2020-11-02 16:24:28'),
(7, 1, 'The Instagram profile anatomy is perfect', 'the-instagram-profile-anatomy-is-perfect', '<p>Looking back to the beginning of the millennium, consumers wanted a fast, single or dual-core chip that could force as many cycles through the processor as possible.</p>\r\n', 'e57c6b956a6521b28495f2886ca0977a_1604316303_6104.jpg', 'test', 'test', '2020-11-02 16:25:03'),
(8, 1, 'Lead Generation: A Beginner\'s Guide to Business Production Leads the Inbound Path', 'lead-generation-a-beginners-guide-to-business-production-leads-the-inbound-path', '<p>Are you a gamer who likes to have a system with the latest and greatest technology? If your answer is yes, then get ready to jump in</p>\r\n', 'c52f1bd66cc19d05628bd8bf27af3ad6_1604316327_8504.jpg', 'tets', 'tets', '2020-11-02 16:25:27'),
(9, 1, 'How to Use Facebook for Business: 25 Tips and Tricks for Marketing on Facebook', 'how-to-use-facebook-for-business-25-tips-and-tricks-for-marketing-on-facebook', '<p>Just a few weeks ago, AMD unveiled their new Radeon RX 500 cards. These mediocre cards help make gaming machines affordable for you</p>\r\n', '02a32ad2669e6fe298e607fe7cc0e1a0_1604316351_6234.jpg', 'test', 'test', '2020-11-02 16:25:51'),
(10, 1, 'How to create infographic in less than an hour [15 free infographic templates]', 'how-to-create-infographic-in-less-than-an-hour-15-free-infographic-templates', '<p>What&#39;s your favorite sports team? The Cleveland Cavaliers? New England Patriots? Have you ever heard someone respond to this question with Team SoloMid or Philadelphia</p>\r\n', '58a2fc6ed39fd083f55d4182bf88826d_1604316376_5283.jpg', 'test', 'test', '2020-11-02 16:26:16'),
(11, 1, 'The best time to post on Instagram, Facebook, Twitter, LinkedIn and Pinterest', 'the-best-time-to-post-on-instagram-facebook-twitter-linkedin-and-pinterest', '<p>After only a short 10 months, Intel&reg; released the offspring to its popular series Kaby Lake, the name of Cafe Lake. With that release comes</p>\r\n', '3ad7c2ebb96fcba7cda0cf54a2e802f5_1604316561_3120.jpg', 'test', 'test', '2020-11-02 16:26:40'),
(12, 1, '13 Blogs Most mistakes bloggers start making', '13-blogs-most-mistakes-bloggers-start-making', '<p>The holiday season is fast approaching, so get ready to fill your socks with the hottest technology this year! Prepare for your vacation</p>\r\n', '291597a100aadd814d197af4f4bab3a7_1604316424_7280.jpg', 'test', 'test', '2020-11-02 16:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_categories`
--

CREATE TABLE `tbl_blog_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog_categories`
--

INSERT INTO `tbl_blog_categories` (`id`, `title`, `status`) VALUES
(1, 'Science', 0),
(2, 'Information Technology', 0),
(3, 'Artificial Intelligence', 0),
(4, 'Craftsmanship', 0),
(5, 'Professional Beauty', 0),
(6, 'Agriculture', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(11) UNSIGNED NOT NULL,
  `encoded_id` varchar(255) DEFAULT NULL,
  `player_id` int(11) UNSIGNED NOT NULL,
  `buyer_id` int(11) UNSIGNED NOT NULL,
  `work_type` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `hours` tinyint(4) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `hotel_expense` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '''0 for pending, 1 for accepted, 2 for confirmed, 3 for rejected''',
  `completed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '''0 for pending, 1 for complete request, 2 for completed''',
  `completed_date` timestamp NULL DEFAULT NULL,
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `canceled_by` int(11) DEFAULT NULL,
  `discount_code` varchar(100) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `site_percentage` float DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `player_noti` tinyint(1) DEFAULT 0,
  `buyer_noti` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `encoded_id`, `player_id`, `buyer_id`, `work_type`, `start_date`, `hours`, `rate`, `hotel_expense`, `status`, `completed`, `completed_date`, `canceled`, `canceled_by`, `discount_code`, `discount_amount`, `site_percentage`, `date`, `player_noti`, `buyer_noti`) VALUES
(1, '75e4o4f4k365p483', 2, 1, 'Photoshoot', '2020-10-31', 5, 30, 1, 2, 2, NULL, 0, NULL, NULL, NULL, 5, '2020-10-27 08:58:26', 0, 0),
(3, '75e4o4f4k365x483', 3, 4, 'Convention Appearance', '2020-11-05', 5, 20, 1, 2, 2, '2020-11-03 10:16:34', 0, NULL, NULL, NULL, 5, '2020-11-03 08:56:22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_extras`
--

CREATE TABLE `tbl_booking_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking_extras`
--

INSERT INTO `tbl_booking_extras` (`id`, `booking_id`, `title`, `price`) VALUES
(1, 1, 'Title', 2),
(2, 1, 'Title 1', 3),
(3, 3, 'test', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `encoded_id` varchar(100) DEFAULT NULL,
  `help_type` enum('sitter','owner') DEFAULT NULL,
  `type` enum('help','resource') DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `encoded_id`, `help_type`, `type`, `slug`, `title`, `detail`, `image`, `status`) VALUES
(1, NULL, NULL, 'resource', NULL, 'Getting Started', 'Tips for cosplayer new to Cosmos. Learn how to create a great profile, set your rates, and start booking jobs.', 'fae0b27c451c728867a567e8c1bb4e53_1579688780_1853.svg', 1),
(2, NULL, NULL, 'resource', NULL, 'Safety', 'It’s our #1 priority. Keep yourself, and events in your care safe and sound with these tips.', 'cdc0d6e63aa8e41c89689f54970bb35f_1579689141_6960.svg', 1),
(5, NULL, NULL, 'resource', NULL, 'Providing Great Service', 'Give your clients—your bests—an excellent experience from start to finish. Learn more about Events, booking jobs, and tips for during the events.', '6a9aeddfc689c1d0e3b9ccc3ab651bc5_1579689217_7114.svg', 1),
(6, NULL, NULL, 'resource', NULL, 'Growing Your Business', 'Learn more about all the promotional tools and resources at your disposal to help you get found and earn more.', 'fa83a11a198d5a7f0bf77a1987bcd006_1579689238_7272.svg', 1),
(7, NULL, NULL, 'resource', NULL, 'Insurance & Finance', 'Get practical information on insurance and learn about getting paid and filing taxes.', '74bba22728b6185eec06286af6bec36d_1579689268_2455.svg', 1),
(8, NULL, NULL, 'resource', NULL, 'Seasonal Tips', 'Keep cosplay in all—winter, summer, spring, or fall. Learn more about seasonal hazards and holiday safety here.', '7380ad8a673226ae47fce7bff88e9c33_1579689317_3102.svg', 1),
(9, NULL, NULL, 'resource', NULL, 'Cosplayer Stories', 'Read inspiring stories from our amazing community of cosplayer nationwide.', 'd490d7b4576290fa60eb31b5fc917ad1_1579689341_9213.svg', 1),
(10, NULL, NULL, 'resource', NULL, 'Cosmos Updates', 'Cosmos has a lot to offer cosplayers, and we’re growing every day. Discover the Cosmos platform and be the first to know about updates and additions.', '069059b7ef840f0c74a814ec9237b6ec_1579689364_8936.svg', 1),
(12, NULL, 'sitter', 'help', NULL, 'Getting Started', NULL, NULL, 1),
(13, NULL, 'sitter', 'help', NULL, 'Booking and Meet & Greets', NULL, NULL, 1),
(14, NULL, 'sitter', 'help', NULL, 'My Profile and Services', NULL, NULL, 1),
(15, NULL, 'sitter', 'help', NULL, 'Payments', NULL, NULL, 1),
(16, NULL, 'sitter', 'help', NULL, 'Running My Business', NULL, NULL, 1),
(17, NULL, 'sitter', 'help', NULL, 'Trust and Safety', NULL, NULL, 1),
(18, NULL, 'sitter', 'help', NULL, 'Taxes', NULL, NULL, 1),
(19, NULL, 'owner', 'help', NULL, 'Getting Started', NULL, NULL, 1),
(20, NULL, 'owner', 'help', NULL, 'Account and Profile', NULL, NULL, 1),
(21, NULL, 'owner', 'help', NULL, 'Finding a Sitter', NULL, NULL, 1),
(22, NULL, 'owner', 'help', NULL, 'Booking and Meet & Greets', NULL, NULL, 1),
(23, NULL, 'owner', 'help', NULL, 'Payments', NULL, NULL, 1),
(24, NULL, 'owner', 'help', NULL, 'Trust and Safety', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_characters`
--

CREATE TABLE `tbl_characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_characters`
--

INSERT INTO `tbl_characters` (`id`, `title`, `image`) VALUES
(1, 'Movie Characters', '291597a100aadd814d197af4f4bab3a7_1601988904_7326.svg'),
(2, 'Gaming Characters', '5705e1164a8394aace6018e27d20d237_1601988940_8621.svg'),
(3, 'Manga Characters', '069059b7ef840f0c74a814ec9237b6ec_1601988964_7426.svg'),
(4, 'Cartoon Characters', 'cfecdb276f634854f3ef915e2e980c31_1601989084_9704.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `mem_one` int(11) NOT NULL,
  `mem_two` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `mem_one`, `mem_two`, `time`) VALUES
(1, 1, 2, '2020-10-27 08:58:26'),
(2, 4, 3, '2020-11-03 08:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_attachments`
--

CREATE TABLE `tbl_chat_attachments` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `att_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_bookings`
--

CREATE TABLE `tbl_chat_bookings` (
  `mem_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat_bookings`
--

INSERT INTO `tbl_chat_bookings` (`mem_id`, `msg_id`, `txt`) VALUES
(1, 8, '<a href=\"javascript:void(0)\" class=\"blk bookingLnk view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365p483\"><strong>Cos Player</strong> scheduled a booking for you<span class=\"date\">click to view</span></a>'),
(2, 8, '<a href=\"javascript:void(0)\" class=\"blk bookingLnk view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365p483\">You schedule a booking<span class=\"date\">click to view</span></a>'),
(4, 11, '<a href=\"javascript:void(0)\" class=\"blk bookingLnk view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365x483\"><strong>First Player</strong> scheduled a booking for you<span class=\"date\">click to view</span></a>'),
(3, 11, '<a href=\"javascript:void(0)\" class=\"blk bookingLnk view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365x483\">You schedule a booking<span class=\"date\">click to view</span></a>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_msgs`
--

CREATE TABLE `tbl_chat_msgs` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL DEFAULT 0,
  `chat_id` int(11) NOT NULL,
  `msg` longtext DEFAULT NULL,
  `msg_type` enum('msg','booking','attachment') NOT NULL DEFAULT 'msg',
  `no_deleted` varchar(100) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `status` enum('new','seen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat_msgs`
--

INSERT INTO `tbl_chat_msgs` (`id`, `sender_id`, `chat_id`, `msg`, `msg_type`, `no_deleted`, `time`, `status`) VALUES
(1, 1, 1, 'hi', 'msg', '2,1', '2020-10-27 08:55:17', 'seen'),
(2, 2, 1, 'helllo', 'msg', '1,2', '2020-10-27 08:55:23', 'seen'),
(3, 1, 1, 'how are you', 'msg', '2,1', '2020-10-27 08:55:27', 'seen'),
(4, 2, 1, 'i am fine what about you?', 'msg', '1,2', '2020-10-27 08:55:33', 'seen'),
(5, 1, 1, 'i am also fine thank you', 'msg', '2,1', '2020-10-27 08:55:40', 'seen'),
(6, 1, 1, 'can you book a session for me', 'msg', '2,1', '2020-10-27 08:55:58', 'seen'),
(7, 2, 1, 'sure wait a minute', 'msg', '1,2', '2020-10-27 08:56:04', 'seen'),
(8, 2, 1, '', 'booking', '1,2', '2020-10-27 08:58:26', 'seen'),
(9, 4, 2, 'hi', 'msg', '3,4', '2020-11-03 08:28:40', 'seen'),
(10, 3, 2, 'hello', 'msg', '4,3', '2020-11-03 08:54:35', 'seen'),
(11, 3, 2, '', 'booking', '4,3', '2020-11-03 08:56:22', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `city` varchar(155) DEFAULT '',
  `state` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city`, `state`) VALUES
(6, 'Irvine', 'CA'),
(7, 'Long Beach', 'CA'),
(10, 'Santa Monica', 'CA'),
(17, 'Jersey City, NJ', NULL),
(29, 'Marietta', 'GA'),
(46, 'Brooklyn', 'NY'),
(59, 'Fresno', 'CA'),
(60, 'Huntington Beach', 'CA'),
(63, 'Pasadena', 'CA'),
(64, 'Santa Clarita', 'CA'),
(67, 'Atlanta', 'GA'),
(68, 'Alpharetta', 'GA'),
(69, 'Sandy Springs', 'GA'),
(70, 'Duluth', 'GA'),
(71, 'Albany', 'NY'),
(72, 'Long Island', 'NY'),
(73, 'Buffalo', 'NY'),
(74, 'Rochester', 'NY'),
(75, 'Kennesaw', 'GA'),
(76, 'Woodstock', 'GA'),
(77, 'Decatur', 'GA'),
(78, 'Roswell', 'GA'),
(79, 'Middletown', 'NY'),
(80, 'Syracuse', 'NY'),
(81, 'Los Angeles', 'CA'),
(82, 'San Diego', 'CA'),
(83, 'San Francisco', 'CA'),
(84, 'Santa Monica', 'CA'),
(85, 'San Jose', 'CA'),
(86, 'Long Beach', 'CA'),
(87, 'Sacramento', 'GA'),
(88, 'Savannah', 'GA'),
(89, 'Mableton', 'GA'),
(90, 'Cumming', 'GA'),
(91, 'Buford', 'GA'),
(92, 'Athens', 'GA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `shortkey` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `shortkey`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `mem_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `ref_type` enum('player') DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favorites`
--

INSERT INTO `tbl_favorites` (`mem_id`, `ref_id`, `ref_type`, `date`) VALUES
(1, 2, 'player', '2020-10-22 07:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_founders`
--

CREATE TABLE `tbl_founders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_founders`
--

INSERT INTO `tbl_founders` (`id`, `name`, `designation`, `overview`, `image`) VALUES
(1, 'John Wick', 'CEO & Co-Founder', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\r\n\r\nMinus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.', 'db8e1af0cb3aca1ae2d0018624204529_1597401264_4648.jpg'),
(2, 'Jennifer Kem', 'Web Designer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\r\n\r\nMinus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.', 'ec5aa0b7846082a2415f0902f0da88f2_1597401294_1149.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_type` enum('character','product') DEFAULT 'character',
  `mem_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `main` tinyint(1) DEFAULT 0,
  `admin` tinyint(1) DEFAULT 0,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `ref_id`, `ref_type`, `mem_id`, `image`, `main`, `admin`, `date`) VALUES
(7, 3, 'character', 2, '15de21c670ae7c3f6f3f1f37029303c9_1602575831_6822.jpg', 1, 0, '2020-10-13 09:57:12'),
(13, 1, 'character', 2, '470e7a4f017a5476afb7eeb3f8b96f9b_1603352485_8995.jpg', 1, 0, '2020-10-22 09:41:26'),
(14, 1, 'character', 2, '4a47d2983c8bd392b120b627e0e1cab4_1603352489_5252.jpg', 0, 0, '2020-10-22 09:41:29'),
(15, 3, 'character', 2, 'cfa0860e83a4c3a763a7e62d825349f7_1603352505_9806.jpg', 0, 0, '2020-10-22 09:41:46'),
(16, 2, 'character', 3, 'cf67355a3333e6e143439161adc2d82e_1604403716_8195.jpg', 1, 0, '2020-11-03 12:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holidays`
--

CREATE TABLE `tbl_holidays` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` varchar(2) DEFAULT NULL,
  `month` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_holidays`
--

INSERT INTO `tbl_holidays` (`id`, `date`, `month`) VALUES
(1, '08', '06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `mem_remember` varchar(255) DEFAULT NULL,
  `mem_token` varchar(100) DEFAULT NULL,
  `mem_type` enum('buyer','player') DEFAULT NULL,
  `mem_social_type` varchar(255) DEFAULT 'website',
  `mem_social_id` varchar(255) DEFAULT NULL,
  `mem_fname` varchar(255) DEFAULT NULL,
  `mem_lname` varchar(255) DEFAULT NULL,
  `mem_email` varchar(255) DEFAULT NULL,
  `mem_pswd` varchar(255) DEFAULT NULL,
  `mem_code` varchar(255) NOT NULL,
  `mem_phone` varchar(255) DEFAULT NULL,
  `mem_sex` enum('male','female','other') DEFAULT NULL,
  `mem_dob` date DEFAULT NULL,
  `mem_company` varchar(255) DEFAULT NULL,
  `mem_website` varchar(255) NOT NULL,
  `mem_about` text DEFAULT NULL,
  `mem_profile_heading` varchar(255) DEFAULT NULL,
  `mem_video` varchar(255) DEFAULT NULL,
  `mem_image` varchar(100) DEFAULT NULL,
  `mem_cover_image` varchar(255) NOT NULL,
  `mem_street` varchar(100) DEFAULT NULL,
  `mem_address1` varchar(255) NOT NULL,
  `mem_address2` varchar(255) NOT NULL,
  `mem_city` varchar(255) NOT NULL,
  `mem_state` varchar(2) DEFAULT NULL,
  `mem_zip` varchar(100) DEFAULT NULL,
  `mem_country_id` int(11) NOT NULL,
  `mem_rate` float DEFAULT NULL,
  `mem_characters` varchar(100) DEFAULT NULL,
  `mem_ssn` varchar(50) DEFAULT NULL,
  `mem_dln` varchar(50) DEFAULT NULL,
  `mem_travel_radius` float UNSIGNED DEFAULT NULL,
  `mem_ip` varchar(255) NOT NULL,
  `mem_note` varchar(255) DEFAULT NULL,
  `mem_referral_code` varchar(6) DEFAULT NULL,
  `mem_fb_link` varchar(255) DEFAULT NULL,
  `mem_instagram_link` varchar(255) DEFAULT NULL,
  `mem_twitter_link` varchar(255) DEFAULT NULL,
  `mem_linkedin_link` varchar(255) DEFAULT NULL,
  `mem_youtube_link` varchar(255) DEFAULT NULL,
  `mem_paypal` varchar(255) DEFAULT NULL,
  `mem_stripe_id` varchar(255) DEFAULT NULL,
  `mem_map_lat` varchar(500) DEFAULT NULL,
  `mem_map_lng` varchar(500) DEFAULT NULL,
  `mem_hear_about` varchar(255) DEFAULT NULL,
  `mem_player_application` tinyint(1) NOT NULL DEFAULT 0,
  `mem_become_buyer` tinyint(1) DEFAULT 0,
  `mem_phone_code` varchar(6) DEFAULT NULL,
  `mem_phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mem_player_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mem_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mem_status` tinyint(1) NOT NULL DEFAULT 1,
  `mem_featured` tinyint(1) DEFAULT 0,
  `mem_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mem_last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `mem_remember`, `mem_token`, `mem_type`, `mem_social_type`, `mem_social_id`, `mem_fname`, `mem_lname`, `mem_email`, `mem_pswd`, `mem_code`, `mem_phone`, `mem_sex`, `mem_dob`, `mem_company`, `mem_website`, `mem_about`, `mem_profile_heading`, `mem_video`, `mem_image`, `mem_cover_image`, `mem_street`, `mem_address1`, `mem_address2`, `mem_city`, `mem_state`, `mem_zip`, `mem_country_id`, `mem_rate`, `mem_characters`, `mem_ssn`, `mem_dln`, `mem_travel_radius`, `mem_ip`, `mem_note`, `mem_referral_code`, `mem_fb_link`, `mem_instagram_link`, `mem_twitter_link`, `mem_linkedin_link`, `mem_youtube_link`, `mem_paypal`, `mem_stripe_id`, `mem_map_lat`, `mem_map_lng`, `mem_hear_about`, `mem_player_application`, `mem_become_buyer`, `mem_phone_code`, `mem_phone_verified`, `mem_player_verified`, `mem_verified`, `mem_status`, `mem_featured`, `mem_date`, `mem_last_login`) VALUES
(1, NULL, 's1c52mueild0eo1nmmvqfaalbj8a706b', 'buyer', 'website', NULL, 'Buyer', 'Khan', 'buyer@gmail.com', 'i5c3u3r484q4p4w4y486z453', '', '201-555-2134', NULL, NULL, 'Cosmos', '', NULL, NULL, NULL, 'ddb30680a691d157187ee1cf9e896d03_1602576072_5272.jpg', '', NULL, '29310 Buchanan Dr', '', 'Evergreen', 'CO', '80439', 166, NULL, NULL, NULL, NULL, NULL, '', NULL, 'XFA89K', NULL, NULL, NULL, NULL, NULL, NULL, 'cus_I9BVpBwwWgMYpp', '39.65763', '-105.35056', 'From a friend, or colleague', 0, 0, '310376', 1, 0, 1, 1, 0, '2020-10-05 12:49:22', '2020-11-02 20:29:51'),
(2, NULL, '5h4b2hlohjkc09sd8lvlrf6o5cstb27j', 'player', 'website', NULL, 'Cos', 'Player', 'player@gmail.com', 'i5c3u3r484q4p4w4y486z453', '', '201-555-1234', NULL, '2000-10-14', NULL, '', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'Nickname', NULL, '4e0cb6fb5fb446d1c92ede2ed8780188_1602238952_1310.jpg', '', NULL, 'test', '', 'Brussels', '', '1044', 21, 30, '1,3', NULL, NULL, NULL, '', NULL, '4ECH5M', 'http://cosmos.localhost/profile-settings', 'http://cosmos.localhost/profile-settings', NULL, NULL, NULL, NULL, 'cus_I9ChIvoMjQyxcm', '38.10503', '-102.95645', 'From a friend, or colleague', 1, 0, NULL, 0, 1, 1, 1, 1, '2020-10-05 14:03:25', '2020-11-05 04:10:39'),
(3, NULL, 'oggs3q90sfbgrh9la8qa7mlnvrht3cai', 'player', 'website', NULL, 'First', 'Player', 'firstplayer@gmail.com', '45c3u3r484r4l4v4y4s5v4s2', 'x49374t2k395a5n4k5w5w4s2j5k3o484b4r3w326l3r4a4o424y3d4l4t4r5r3q474s3j493', '201-554-8963', NULL, '2000-11-03', NULL, '', '<p>test bio</p>\r\n', 'First Player', NULL, NULL, '', NULL, 'New Park near aven field refrences', '', 'new york', NULL, '10001', 231, 20, '2', NULL, NULL, NULL, '', NULL, 'PG24H2', NULL, NULL, NULL, NULL, NULL, NULL, 'cus_IK1vwcENCfuCNl', '40.75095', '-73.99811', 'From a friend, or colleague', 1, 0, NULL, 1, 1, 1, 1, 0, '2020-11-03 11:39:54', '2020-11-02 20:30:27'),
(4, NULL, 's1c52mueild0eo1nmmvqfaalbj8a706b', 'buyer', 'website', NULL, 'First', 'Buyer', 'firstbuyer@gmail.com', '45c3u3r484r4l4v4y4s5v4s2', 'x49374o4k395a5n4k5w5w4s295n4q3t204s3k3i4u364v2c4a4y3o4n4654463o4', '201-333-4567', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, '10001', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, 'MCI7EB', NULL, NULL, NULL, NULL, NULL, NULL, 'cus_IK1zHnUP1RWwnH', '40.75095', '-73.99811', 'Search Engine (Google, Bing)', 0, 0, NULL, 1, 0, 1, 1, 0, '2020-11-03 11:44:18', '2020-11-02 20:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `mem_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `mem_id`, `email`) VALUES
(1, 3, 'ali@gmail.com'),
(2, 3, 'sarim@gmail.com'),
(3, 3, 'sarim1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `encoded_id` varchar(255) DEFAULT NULL,
  `mem_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `txt` text NOT NULL,
  `cat` enum('comments','subscribed','notes','other') NOT NULL,
  `note_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('new','seen') NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id`, `encoded_id`, `mem_id`, `from_id`, `txt`, `cat`, `note_id`, `status`, `date`) VALUES
(1, 'g5f4q3h4k365p483', 1, 2, 'Cos Player.scheduled a booking with you <a href=\"javascript:void(0)\" class=\"view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365p483\">click here</a> to view detaib.', 'other', 0, 'seen', '2020-10-27 08:58:26'),
(2, 'g5f4q3h4k365t483', 2, 1, 'Your booking with Buyer Khan. has been confirmed! You can view your upcoming jobs in <a href=\"http://cosmos.localhost/jobs\">My Jobs</a>.', 'other', 0, 'seen', '2020-10-27 09:04:44'),
(3, 'g5f4q3h4k365x483', 1, 2, 'Booking has been confirmed!', 'other', 0, 'seen', '2020-10-27 09:04:44'),
(4, 'g5f4q3h4k3651583', 2, 1, 'Buyer Khan. reviewed you 5 stars. <a href=\"javascript:void(0)\" class=\"view-detail\" data-store=\"75e4o4f4k365p483\" data-link=\"booking-detail\">click here</a> to view booking.', 'other', 0, 'seen', '2020-10-28 09:28:18'),
(5, 'g5f4q3h4k3655583', 1, 2, 'You reviewed Cos Player. 5 stars. <a href=\"javascript:void(0)\" class=\"view-detail\" data-store=\"75e4o4f4k365p483\" data-link=\"booking-detail\">click here</a> to view booking.', 'other', 0, 'seen', '2020-10-28 09:28:18'),
(6, 'g5f4q3h4k3659583', 1, 2, 'Cos Player respond to your reviewed. <a href=\"javascript:void(0)\" class=\"view-detail\" data-store=\"75e4o4f4k365p483\" data-link=\"booking-detail\">click here</a> to view booking.', 'other', 0, 'new', '2020-10-29 03:34:16'),
(7, 'g5f4q3h4k365j583', 4, 3, 'First Player.scheduled a booking with you <a href=\"javascript:void(0)\" class=\"view-detail\" data-link=\"get-request-detail\" data-store=\"75e4o4f4k365x483\">click here</a> to view detail.', 'other', 0, 'seen', '2020-11-03 08:56:22'),
(8, 'g5f4q3h4k365n583', 3, 4, 'Your booking with First Buyer. has been confirmed! You can view your upcoming jobs in <a href=\"http://cosmos.localhost/jobs\">My Jobs</a>.', 'other', 0, 'seen', '2020-11-03 09:34:33'),
(9, 'g5f4q3h4k365r583', 4, 3, 'Booking has been confirmed!', 'other', 0, 'new', '2020-11-03 09:34:33'),
(10, 'g5f4q3h4k365p4u4', 3, 4, 'First Buyer. reviewed you 4 stars. <a href=\"javascript:void(0)\" class=\"view-detail\" data-store=\"75e4o4f4k365x483\" data-link=\"booking-detail\">click here</a> to view booking.', 'other', 0, 'seen', '2020-11-03 10:24:29'),
(11, 'g5f4q3h4k365p4v4', 4, 3, 'You reviewed First Player. 4 stars. <a href=\"javascript:void(0)\" class=\"view-detail\" data-store=\"75e4o4f4k365x483\" data-link=\"booking-detail\">click here</a> to view booking.', 'other', 0, 'new', '2020-11-03 10:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners`
--

CREATE TABLE `tbl_partners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partners`
--

INSERT INTO `tbl_partners` (`id`, `title`, `link`, `image`) VALUES
(1, 'altima', 'altima.com', 'image_1549277171_1300.svg'),
(2, 'Seven News', 'seven-news.com', 'image_1549279810_1415.svg'),
(3, 'Aljazeera TV', 'aljazeera TV', 'image_1549279853_5025.svg'),
(4, 'AMT Debit', 'amt-debit.com', 'image_1549279879_8965.svg'),
(5, 'Discovery channel', 'discovery-channel.com', 'image_1549279904_9296.svg'),
(6, 'FDS', 'fds.com', 'image_1549279923_1371.svg'),
(7, 'International Cricket Council', 'international-cricket-council.com', 'image_1549279953_6933.svg'),
(8, 'Orbis', 'orbis.com', 'image_1549279979_9621.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_methods`
--

CREATE TABLE `tbl_payment_methods` (
  `id` int(11) NOT NULL,
  `encoded_id` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `last_digits` varchar(4) DEFAULT NULL,
  `expiry` varchar(100) DEFAULT NULL,
  `method_token` varchar(500) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `paypal` varchar(255) DEFAULT NULL,
  `stripe_customer_id` varchar(199) NOT NULL,
  `stripe_bank_id` varchar(255) NOT NULL,
  `acc_swift_code` varchar(255) NOT NULL,
  `acc_type` enum('Checking','Saving') DEFAULT NULL,
  `acc_routing_number` varchar(255) NOT NULL,
  `acc_bank_name` varchar(255) NOT NULL,
  `acc_title` varchar(255) NOT NULL,
  `acc_number` varchar(100) NOT NULL,
  `acc_city` varchar(255) NOT NULL,
  `acc_state` varchar(255) NOT NULL,
  `acc_country` varchar(255) NOT NULL,
  `default_method` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_methods`
--

INSERT INTO `tbl_payment_methods` (`id`, `encoded_id`, `mem_id`, `last_digits`, `expiry`, `method_token`, `image`, `paypal`, `stripe_customer_id`, `stripe_bank_id`, `acc_swift_code`, `acc_type`, `acc_routing_number`, `acc_bank_name`, `acc_title`, `acc_number`, `acc_city`, `acc_state`, `acc_country`, `default_method`) VALUES
(1, 'h5c3s2l4l335h483', 1, '4242', 'February, 2022', 'card_1HgrqiLdWQsiF0ALR2UZPAhj', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(2, 'h5c3s2l4l3p5h483', 2, NULL, NULL, NULL, NULL, NULL, '', '', '', 'Checking', '12343214', 'UBL', 'Cos Player', '123456789986', 'Lahore', 'Punjab', 'United States', 0),
(3, 'h5c3s2l4l356h483', 4, '4242', 'January, 2022', 'card_1HjP6VLdWQsiF0AL9LMBn6YD', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `permission`) VALUES
(1, 'Students'),
(2, 'Tutors'),
(3, 'Tutor Applications'),
(4, 'Subjects'),
(5, 'Chat Management'),
(6, 'Founders'),
(7, 'FAQ\'s'),
(8, 'Manage Pages'),
(9, 'Change Password'),
(10, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions_admin`
--

CREATE TABLE `tbl_permissions_admin` (
  `admin_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permissions_admin`
--

INSERT INTO `tbl_permissions_admin` (`admin_id`, `permission_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preferences`
--

CREATE TABLE `tbl_preferences` (
  `pref_id` int(11) NOT NULL,
  `pref_key` varchar(50) NOT NULL,
  `pref_title` varchar(500) NOT NULL,
  `pref_short_desc` varchar(1000) NOT NULL,
  `pref_detail` text NOT NULL,
  `pref_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_preferences`
--

INSERT INTO `tbl_preferences` (`pref_id`, `pref_key`, `pref_title`, `pref_short_desc`, `pref_detail`, `pref_image`) VALUES
(1, 'privacypolicy', 'Privacy Policy', '', '<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This Privacy Policy discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this Privacy Policy and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following privacy policy.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email: <a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone: <a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n', ''),
(2, 'termsservices', 'Terms of Service', '', '<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This term&#39;s of services discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this term&#39;s of services and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following term&#39;s of services.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email: <a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone: <a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n\r\n<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This term&#39;s of services discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this term&#39;s of services and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following term&#39;s of services.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email:&nbsp;<a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone:&nbsp;<a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n', ''),
(3, 'bannerimage', '', '', '', 'image_1547197860_6034.png'),
(4, 'contact', 'Contact us', 'Get in Touch', 'Address & Info', 'Location Info'),
(7, 'footer_section', 'Find the right fit or it’s free.', 'We guarantee you’ll find the right tutor, or we’ll cover the first hour of your lesson.', 'What would you like to see next?', 'Submit a Feature Request');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_press`
--

CREATE TABLE `tbl_press` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(600) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_press`
--

INSERT INTO `tbl_press` (`id`, `title`, `slug`, `detail`, `image`, `meta_description`, `meta_keywords`, `date`) VALUES
(1, '9 of the best professional biological examples we', '9-of-the-best-professional-biological-examples-we', '<p>What&#39;s your favorite sports team? The Cleveland Cavaliers? New England Patriots? Have you ever heard someone respond to this question with Team SoloMid or Philadelphia</p>\r\n', '84117275be999ff55a987b9381e01f96_1604317397_2374.jpg', 'test', 'test', '2020-11-02 16:21:26'),
(2, 'Blog SEO: How to optimize the search engines for your blog content', 'blog-seo-how-to-optimize-the-search-engines-for-your-blog-content', '<p>With the end of CES 2018, we are now looking forward to all the upcoming technology the new year should bring to us. For those unfamiliar with CES, this is the</p>\r\n', '1c1d4df596d01da60385f0bb17a4a9e0_1604317418_5179.jpg', 'test', 'test', '2020-11-02 16:22:27'),
(3, 'Email forwarding tips you must know by 2020', 'email-forwarding-tips-you-must-know-by-2020', '<p>The holiday season is fast approaching, so get ready to fill your socks with the hottest technology this year! Prepare for your vacation</p>\r\n', '2a9d121cd9c3a1832bb6d2cc6bd7a8a7_1604317427_6795.jpg', 'test', 'test', '2020-11-02 16:22:58'),
(4, 'The best newsletter templates and resources for download right now', 'the-best-newsletter-templates-and-resources-for-download-right-now', '<p>Welcome to the latest installment of our holiday gift guides! Our other gift guides include computer recommendations by interest and suggestions on our favorite peripherals</p>\r\n', 'b0b183c207f46f0cca7dc63b2604f5cc_1604317440_3054.jpg', 'test', 'test', '2020-11-02 16:23:28'),
(5, 'Google Doc features you didn\'t know existed (but absolutely needed)', 'google-doc-features-you-didnt-know-existed-but-absolutely-needed', '<p>Looking for the perfect gifts this holiday season for you and your family? Give a better computer gift with high quality Overkill PCs.</p>\r\n', '4e4b5fbbbb602b6d35bea8460aa8f8e5_1604317458_4413.jpg', 'test', 'test', '2020-11-02 16:23:59'),
(6, 'Spoken and repeated jokes to satisfy your inner grammar', 'spoken-and-repeated-jokes-to-satisfy-your-inner-grammar', '<p>After only 10 short months, Intel&reg; released the offspring to its popular series Kaby Lake, the name of the Coffee Lake code. With that release comes</p>\r\n', '42e77b63637ab381e8be5f8318cc28a2_1604317467_3484.jpg', 'test', 'test', '2020-11-02 16:24:28'),
(7, 'The Instagram profile anatomy is perfect', 'the-instagram-profile-anatomy-is-perfect', '<p>Looking back to the beginning of the millennium, consumers wanted a fast, single or dual-core chip that could force as many cycles through the processor as possible.</p>\r\n', '25b2822c2f5a3230abfadd476e8b04c9_1604317477_6076.jpg', 'test', 'test', '2020-11-02 16:25:03'),
(8, 'Lead Generation: A Beginner\'s Guide to Business Production Leads the Inbound Path', 'lead-generation-a-beginners-guide-to-business-production-leads-the-inbound-path', '<p>Are you a gamer who likes to have a system with the latest and greatest technology? If your answer is yes, then get ready to jump in</p>\r\n', '5d44ee6f2c3f71b73125876103c8f6c4_1604317486_1687.jpg', 'tets', 'tets', '2020-11-02 16:25:27'),
(9, 'How to Use Facebook for Business: 25 Tips and Tricks for Marketing on Facebook', 'how-to-use-facebook-for-business-25-tips-and-tricks-for-marketing-on-facebook', '<p>Just a few weeks ago, AMD unveiled their new Radeon RX 500 cards. These mediocre cards help make gaming machines affordable for you</p>\r\n', '64223ccf70bbb65a3a4aceac37e21016_1604317495_4346.jpg', 'test', 'test', '2020-11-02 16:25:51'),
(10, 'How to create infographic in less than an hour [15 free infographic templates]', 'how-to-create-infographic-in-less-than-an-hour-15-free-infographic-templates', '<p>What&#39;s your favorite sports team? The Cleveland Cavaliers? New England Patriots? Have you ever heard someone respond to this question with Team SoloMid or Philadelphia</p>\r\n', '8fecb20817b3847419bb3de39a609afe_1604317503_7292.jpg', 'test', 'test', '2020-11-02 16:26:16'),
(11, 'The best time to post on Instagram, Facebook, Twitter, LinkedIn and Pinterest', 'the-best-time-to-post-on-instagram-facebook-twitter-linkedin-and-pinterest', '<p>After only a short 10 months, Intel&reg; released the offspring to its popular series Kaby Lake, the name of Cafe Lake. With that release comes</p>\r\n', 'fc3cf452d3da8402bebb765225ce8c0e_1604317513_8760.jpg', 'test', 'test', '2020-11-02 16:26:40'),
(12, '13 Blogs Most mistakes bloggers start making', '13-blogs-most-mistakes-bloggers-start-making', '<p>The holiday season is fast approaching, so get ready to fill your socks with the hottest technology this year! Prepare for your vacation</p>\r\n', '4ffce04d92a4d6cb21c1494cdfcd6dc1_1604317520_7271.jpg', 'test', 'test', '2020-11-02 16:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocodes`
--

CREATE TABLE `tbl_promocodes` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `code_type` enum('percent','fixed') NOT NULL DEFAULT 'percent',
  `amount` float NOT NULL DEFAULT 0,
  `codes` int(11) DEFAULT 0,
  `code_used` int(11) DEFAULT 0,
  `expiry_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promocodes`
--

INSERT INTO `tbl_promocodes` (`id`, `code`, `code_type`, `amount`, `codes`, `code_used`, `expiry_date`, `status`) VALUES
(1, 'test1', 'percent', 5, 5, 5, '2020-06-30', 0),
(2, 'test2', 'fixed', 50, 5, 2, '2020-07-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ref_signups`
--

CREATE TABLE `tbl_ref_signups` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `ref_mem_id` int(11) NOT NULL,
  `reward` tinyint(4) NOT NULL DEFAULT 0,
  `coupon_expire` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ref_signups`
--

INSERT INTO `tbl_ref_signups` (`id`, `mem_id`, `ref_mem_id`, `reward`, `coupon_expire`) VALUES
(1, 2, 11, 0, 0),
(2, 2, 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resources`
--

CREATE TABLE `tbl_resources` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(600) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `mem_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `ref_type` enum('booking') NOT NULL,
  `rating` float NOT NULL,
  `comment` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `parent_id`, `mem_id`, `from_id`, `ref_id`, `ref_type`, `rating`, `comment`, `date`) VALUES
(1, NULL, 2, 1, 1, 'booking', 5, 'test feedback and rating', '2020-10-28 13:28:18'),
(2, 1, 2, 2, 1, 'booking', 0, 'test', '2020-10-29 07:34:16'),
(3, NULL, 3, 4, 3, 'booking', 4, 'test', '2020-11-03 14:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siteadmin`
--

CREATE TABLE `tbl_siteadmin` (
  `site_id` int(11) NOT NULL,
  `site_username` varchar(255) DEFAULT NULL,
  `site_password` varchar(255) DEFAULT NULL,
  `site_admin_name` varchar(255) DEFAULT NULL,
  `site_admin_type` enum('admin','subadmin') NOT NULL DEFAULT 'admin',
  `site_domain` varchar(100) DEFAULT NULL,
  `site_name` varchar(500) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `site_noreply_email` varchar(255) DEFAULT NULL,
  `site_phone` varchar(255) DEFAULT NULL,
  `site_fax` varchar(255) DEFAULT NULL,
  `site_paypal_sandox` tinyint(1) DEFAULT 0,
  `site_sandbox_paypal` varchar(255) DEFAULT NULL,
  `site_live_paypal` varchar(255) DEFAULT NULL,
  `site_ip` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_icon` varchar(255) DEFAULT NULL,
  `site_thumb` varchar(255) DEFAULT NULL,
  `site_address` varchar(255) DEFAULT NULL,
  `site_about` text DEFAULT NULL,
  `site_city` varchar(100) DEFAULT NULL,
  `site_state` varchar(100) DEFAULT NULL,
  `site_zip` varchar(25) DEFAULT NULL,
  `site_country` varchar(100) DEFAULT NULL,
  `site_lastlogindate` timestamp NOT NULL DEFAULT current_timestamp(),
  `site_copyright` varchar(1000) DEFAULT NULL,
  `site_facebook` varchar(255) DEFAULT NULL,
  `site_twitter` varchar(255) DEFAULT NULL,
  `site_google` varchar(255) DEFAULT NULL,
  `site_instagram` varchar(255) DEFAULT NULL,
  `site_linkedin` varchar(255) DEFAULT NULL,
  `site_youtube` varchar(255) DEFAULT NULL,
  `site_contact_map` text DEFAULT NULL,
  `site_google_ad` text DEFAULT NULL,
  `site_meta_desc` text DEFAULT NULL,
  `site_meta_keyword` varchar(1000) DEFAULT NULL,
  `site_meta_copyright` varchar(500) DEFAULT NULL,
  `site_meta_author` varchar(255) DEFAULT NULL,
  `site_how_to_pay` text DEFAULT NULL,
  `site_status` int(11) NOT NULL DEFAULT 1,
  `sub_location` int(20) DEFAULT NULL,
  `site_chat` text DEFAULT NULL,
  `sub_featured` int(30) DEFAULT NULL,
  `site_version` int(11) NOT NULL DEFAULT 0,
  `site_percentage` float NOT NULL DEFAULT 0,
  `site_hold_payment` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_siteadmin`
--

INSERT INTO `tbl_siteadmin` (`site_id`, `site_username`, `site_password`, `site_admin_name`, `site_admin_type`, `site_domain`, `site_name`, `site_email`, `site_noreply_email`, `site_phone`, `site_fax`, `site_paypal_sandox`, `site_sandbox_paypal`, `site_live_paypal`, `site_ip`, `site_logo`, `site_icon`, `site_thumb`, `site_address`, `site_about`, `site_city`, `site_state`, `site_zip`, `site_country`, `site_lastlogindate`, `site_copyright`, `site_facebook`, `site_twitter`, `site_google`, `site_instagram`, `site_linkedin`, `site_youtube`, `site_contact_map`, `site_google_ad`, `site_meta_desc`, `site_meta_keyword`, `site_meta_copyright`, `site_meta_author`, `site_how_to_pay`, `site_status`, `sub_location`, `site_chat`, `sub_featured`, `site_version`, `site_percentage`, `site_hold_payment`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administration', 'admin', 'www.cosplaycosmos.com', 'Cosplay Cosmos', 'info@cosplaycosmos.com', 'no-reply@cosmos.com', '+254-775-050-697', '', 1, 'mehdiabedin@gmail.com', 'mehdiabedin@gmail.com', '::1', 'cosplay-cosmos-logo1.png', 'cosplay-cosmos-icon1.png', 'cosplay-cosmos-thumb.jpg', '10100 West Sample Road, <br>\r\nThird Floor, Coral Springs, <br>\r\nFL 33065', 'We are creating a cosplay marketplace to connect endclients ( conventions, businesses, eventplanners ) with cosplayers.', 'New York', 'WA', '75350', 'USA', '2020-10-21 03:55:03', 'Copyright © 2018. All Rights Reserved', 'https://www.facebook.com/cosmos', '#', 'https://plus.google.com/mrservicecard', 'https://www.instagram.com/cosmos', 'https://www.linkedin.com/pfsc', 'https://www.youtube.com/cosmos', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3318.7250567536676!2d-84.34897039425!3d33.71606266992961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f501790d22f717%3A0x7ff91decdaf344dc!2s1264+Custer+Ave+SE%2C+Atlanta%2C+GA+30316!5e0!3m2!1sen!2s!4v1493122321821', '', 'We are creating a cosplay marketplace to connect endclients ( conventions, businesses, eventplanners ) with cosplayers.', 'HTML, CSS, XML, JavaScript', 'New Admin &copy; 2018 All Rights Reserved.', 'Administration', '', 1, 20, 'window.fcWidget.init({\r\ntoken: \"89884c16-15cc-484d-926f-ec74202a584d\",\r\nhost: \"https://wchat.freshchat.com\"\r\n});', 30, 29, 5, 1),
(2, 'ajay', '098f6bcd4621d373cade4e832627b4f6', 'Malik Ajay Jones', 'subadmin', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-06 15:00:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitecontent`
--

CREATE TABLE `tbl_sitecontent` (
  `id` int(11) NOT NULL,
  `ckey` varchar(80) NOT NULL,
  `code` text DEFAULT NULL,
  `full_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sitecontent`
--

INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(1, 'home', 'a:75:{s:14:\"banner_heading\";s:14:\"Cosplay Cosmos\";s:13:\"banner_detail\";s:119:\"We are creating a cosplay marketplace to connect end-clients (conventions, businesses, event-planners) with cosplayers.\";s:18:\"banner_button_text\";s:6:\"Search\";s:17:\"first_left_button\";s:21:\"Book your next sitter\";s:18:\"first_left_section\";s:355:\"<h3>BOOK WITH PET SITTERS YOU CAN&nbsp;TRUST</h3>\r\n\r\n<ul>\r\n	<li>All new sitters pass a basic background check</li>\r\n	<li>All sitters homes will be inspected, and video tour will be provided.&nbsp;</li>\r\n	<li>All sitters provide a detailed profile and personal information</li>\r\n	<li>All sitters are approved by our team of sitter specialists</li>\r\n</ul>\r\n\";s:15:\"first_left_note\";s:282:\"<p>All services booked on PFSC are backed by the&nbsp;<a href=\"https://herosolutions.com.pk/sarim/pfsc/guarantee\">PFSC Guarantee</a>, 24/7 Support, Photo Updates, and our&nbsp;<a href=\"https://herosolutions.com.pk/sarim/pfsc/reservation-protection\">Reservation Protection.</a></p>\r\n\";s:21:\"first_section_heading\";s:43:\"Puppy Friends Social Club <em>Services</em>\";s:20:\"first_section_detail\";s:227:\"<p>Find trusted pet care providers for every need.</p>\r\n\r\n<p>PFSC is the pet care marketplace for busy pet parents. Search and book mobile pet grooming, pet sitting &amp; boarding, dog walking, and dog training on-demand.</p>\r\n\";s:19:\"testimonial_heading\";s:21:\" Happiness guaranteed\";s:18:\"testimonial_detail\";s:84:\"Relax knowing that your pet will be lovingly cared for by an experienced pet sitter.\";s:13:\"match_heading\";s:27:\"Find the perfect match fast\";s:16:\"match_short_desc\";s:169:\"Search for cosplay in your area that meet your events\'s individual needs, and book their services within minutes. Because finding a good cosplay shouldn’t be a hassle.\";s:11:\"match_text1\";s:97:\"Fantastic platform, I am able to work around my schedule, which is the biggest advantage for me. \";s:11:\"match_text2\";s:93:\"Great to work with a platform that offers such convenient way to provide cosplayer services. \";s:11:\"how_heading\";s:12:\"How it works\";s:14:\"how_short_desc\";s:84:\"Relax knowing that your events will be lovingly cared for by an experienced cosplay.\";s:12:\"how_heading1\";s:12:\"Smart prices\";s:9:\"how_text1\";s:34:\"Just book last-minute, or off-peak\";s:12:\"how_heading2\";s:9:\"Book 24/7\";s:9:\"how_text2\";s:20:\"From bed, or the bus\";s:12:\"how_heading3\";s:27:\"Choice of top-rated cosplay\";s:9:\"how_text3\";s:33:\"Thousands of venues (and reviews)\";s:15:\"feature_heading\";s:24:\"You’re in good company\";s:14:\"feature_detail\";s:386:\"It\'s our passion to provide the best service we can, every time, that makes us stand out from the pack. Every wag, wiggle, ear scratch, and belly rub is done with the the utmost love and care. When you leave your pets with us, you won\'t have to worry about whether they\'re enjoying themselves: their exuberance when they walk through our doors will tell you everything you need to know.\";s:19:\"feature_button_text\";s:11:\"Get Started\";s:6:\"image1\";s:52:\"559cb990c9dffd8675f6bc2186971dc2_1604324079_7938.jpg\";s:6:\"image2\";s:52:\"1c1d4df596d01da60385f0bb17a4a9e0_1604325304_7239.jpg\";s:12:\"match_image1\";s:52:\"1d7f7abc18fcb43975065399b0d1e48e_1577368580_2574.jpg\";s:12:\"match_image2\";s:52:\"20aee3a5f4643755a79ee5f6a73050ac_1577368580_9253.jpg\";s:10:\"how_image1\";s:52:\"b7bb35b9c6ca2aee2df08cf09d7016c2_1597249613_7257.svg\";s:10:\"how_image2\";s:52:\"2b24d495052a8ce66358eb576b8912c8_1597249613_9115.svg\";s:10:\"how_image3\";s:52:\"26e359e83860db1d11b6acca57d8ea88_1597249614_7685.svg\";s:14:\"cities_heading\";s:47:\"Find a qualified cosplay <em>in your city </em>\";s:21:\"banner_search_heading\";s:32:\"I\'m looking for services for my:\";s:10:\"page_title\";s:4:\"Home\";s:16:\"meta_description\";s:119:\"We are creating a cosplay marketplace to connect end-clients (conventions, businesses, event-planners) with cosplayers.\";s:13:\"meta_keywords\";s:119:\"We are creating a cosplay marketplace to connect end-clients (conventions, businesses, event-planners) with cosplayers.\";s:12:\"star_heading\";s:21:\"Special Cosplay Stars\";s:14:\"cosmos_heading\";s:23:\"Cosplay <em>Cosmos</em>\";s:15:\"cosmos_heading1\";s:17:\" Incredible Venue\";s:12:\"cosmos_text1\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:15:\"cosmos_heading2\";s:19:\"Amazing Guest Stars\";s:12:\"cosmos_text2\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:15:\"cosmos_heading3\";s:20:\"Friendly Event Staff\";s:12:\"cosmos_text3\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:15:\"cosmos_heading4\";s:23:\"Next Gen Gaming Station\";s:12:\"cosmos_text4\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:15:\"cosmos_heading5\";s:16:\"Asian Food Court\";s:12:\"cosmos_text5\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:15:\"cosmos_heading6\";s:24:\"Exclusive Movie Trailers\";s:12:\"cosmos_text6\";s:107:\"Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor didunt utem labore et dolore magna.\";s:13:\"cosmos_image1\";s:52:\"cee631121c2ec9232f3a2f028ad5c89b_1604325899_3396.png\";s:13:\"cosmos_image2\";s:52:\"5c04925674920eb58467fb52ce4ef728_1604325899_9910.png\";s:13:\"cosmos_image3\";s:52:\"b137fdd1f79d56c7edf3365fea7520f2_1604325899_7293.png\";s:13:\"cosmos_image4\";s:52:\"04ecb1fa28506ccb6f72b12c0245ddbc_1604325899_4359.png\";s:13:\"cosmos_image5\";s:52:\"9dcb88e0137649590b755372b040afad_1604325899_6020.png\";s:13:\"cosmos_image6\";s:52:\"c45147dee729311ef5b5c3003946c48f_1604325899_9957.png\";s:18:\"highlights_heading\";s:17:\"Cosmos Highlights\";s:19:\"highlights_heading1\";s:20:\"Special Event Busses\";s:16:\"highlights_text1\";s:117:\"Sed do eiusmod tempor incididunt ut labore et dolore magna le ad minim veniam, quis nostrud citation ullamco laboris.\";s:19:\"highlights_heading2\";s:20:\"Best Cosplay Contest\";s:16:\"highlights_text2\";s:117:\"Sed do eiusmod tempor incididunt ut labore et dolore magna le ad minim veniam, quis nostrud citation ullamco laboris.\";s:19:\"highlights_heading3\";s:22:\"Incredible Hotel Deals\";s:16:\"highlights_text3\";s:117:\"Sed do eiusmod tempor incididunt ut labore et dolore magna le ad minim veniam, quis nostrud citation ullamco laboris.\";s:19:\"highlights_heading4\";s:20:\"New Convention Venue\";s:16:\"highlights_text4\";s:117:\"Sed do eiusmod tempor incididunt ut labore et dolore magna le ad minim veniam, quis nostrud citation ullamco laboris.\";s:17:\"highlights_image1\";s:52:\"a4300b002bcfb71f291dac175d52df94_1604326371_6568.jpg\";s:17:\"highlights_image2\";s:52:\"b137fdd1f79d56c7edf3365fea7520f2_1604326371_7971.jpg\";s:17:\"highlights_image3\";s:52:\"19f3cd308f1455b3fa09a282e0d496f4_1604326371_9378.jpg\";s:17:\"highlights_image4\";s:52:\"64223ccf70bbb65a3a4aceac37e21016_1604326371_7111.jpg\";s:22:\"highlights_icon_image1\";s:52:\"839ab46820b524afda05122893c2fe8e_1604326903_2527.png\";s:22:\"highlights_icon_image2\";s:52:\"c0f168ce8900fa56e57789e2a2f2c9d0_1604326903_9157.png\";s:22:\"highlights_icon_image3\";s:52:\"04ecb1fa28506ccb6f72b12c0245ddbc_1604326903_7704.png\";s:22:\"highlights_icon_image4\";s:52:\"42e77b63637ab381e8be5f8318cc28a2_1604326903_7168.png\";s:19:\"marketplace_heading\";s:21:\"Marketplace Spotlight\";}', NULL),
(2, 'about', 'a:30:{s:11:\"iframe_link\";s:131:\"<iframe src=\"https://www.youtube.com/embed/_lXWIDAtIUM?start=10&rel=0&wmode=transparent&modestbranding=1\" frameborder=\"0\"></iframe>\";s:13:\"first_heading\";s:29:\"About <em>Cosplay Cosmos</em>\";s:12:\"first_detail\";s:1444:\"<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\r\n<p>Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt. Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.&nbsp;Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\r\n<p>Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\r\n<p>Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:14:\"second_heading\";s:20:\"How are we doing it?\";s:17:\"second_short_desc\";s:26:\"We’ll do it all for you.\";s:9:\"ico_text1\";s:166:\"<h3>Care and Comfort</h3>\r\n\r\n<p>By inspecting each home and carefully interviewing each care giver we can insure that you fur kids are in safe and loving hands.</p>\r\n\";s:9:\"ico_text2\";s:168:\"<h3>Daily Updates</h3>\r\n\r\n<p>Providers are required to send a minimum of 5 photos a day. You can also call at any time to video chat and check in on your fur kid.</p>\r\n\";s:9:\"ico_text3\";s:149:\"<h3>Expert and Vets</h3>\r\n\r\n<p>Our expert and vets are available 24/7, as well, so day or night, your best friend&rsquo;s in the best of hands.</p>\r\n\";s:9:\"ico_text4\";s:241:\"<h3>Our Goal</h3>\r\n\r\n<p>To ensure each provider is properly trained and vetted. Provider homes must be inspected. Ensuring clients feel secure that their fur kids are in a safe loving households with all the pleasantries of being home.</p>\r\n\";s:9:\"ico_text5\";s:246:\"<h3>GPS collar</h3>\r\n\r\n<p>Free range boarding with GPS collar for each pet owner that connects to our system allowing parents to see location of their pet 24 hours a day 7 days a week(Available thru membership to Puppy Friends Social Club).</p>\r\n\";s:9:\"ico_text6\";s:462:\"<h3>5-Star Sitters in Your Neighborhood</h3>\r\n\r\n<p>Discover local pet sitters and dog walkers, read reviews, and find the right fit for you. PFSC offers:</p>\r\n\r\n<ul>\r\n	<li>Background or identity checks</li>\r\n	<li>The PFSC Guarantee</li>\r\n	<li>Reservation protection</li>\r\n	<li>24/7 support</li>\r\n	<li>Secure online payments</li>\r\n	<li>Ongoing sitter education</li>\r\n	<li>Photo updates</li>\r\n	<li>Verified reviews</li>\r\n	<li>Trust and safety experts</li>\r\n</ul>\r\n\";s:10:\"third_left\";s:216:\"<h3>OUR MISSION</h3>\r\n\r\n<p>Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:11:\"third_right\";s:291:\"<h3>OUR GUARANTEE</h3>\r\n\r\n<p>Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:14:\"fourth_heading\";s:41:\"The people behind <em>Cosplay Cosmos</em>\";s:13:\"second_image1\";s:52:\"4e0cb6fb5fb446d1c92ede2ed8780188_1579511053_1297.svg\";s:13:\"second_image2\";s:52:\"9872ed9fc22fc182d371c3e9ed316094_1579511053_8035.svg\";s:13:\"second_image3\";s:52:\"cdc0d6e63aa8e41c89689f54970bb35f_1579511053_1670.svg\";s:13:\"second_image4\";s:52:\"08419be897405321542838d77f855226_1579511053_3883.svg\";s:13:\"second_image5\";s:52:\"6aab1270668d8cac7cef2566a1c5f569_1597660775_6786.svg\";s:13:\"second_image6\";s:52:\"a597e50502f5ff68e3e25b9114205d4a_1579511053_1490.svg\";s:12:\"second_text1\";s:391:\"<h3>Care and Comfort</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:12:\"second_text2\";s:388:\"<h3>Daily Updates</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:12:\"second_text3\";s:399:\"<h3>Expert and Professionals</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:12:\"second_text4\";s:383:\"<h3>Our Goal</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:12:\"second_text5\";s:392:\"<h3>Cosplayer Stories</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:12:\"second_text6\";s:398:\"<h3>Providing Great Service</h3>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;id&nbsp;ex&nbsp;odit,&nbsp;quo&nbsp;porro&nbsp;nesciunt.&nbsp;Vel&nbsp;magni&nbsp;id&nbsp;dolores&nbsp;quas&nbsp;repudiandae&nbsp;accusantium,&nbsp;ipsum&nbsp;quia&nbsp;nobis.&nbsp;Perspiciatis&nbsp;totam&nbsp;error&nbsp;veniam&nbsp;repudiandae.</p>\r\n\";s:10:\"page_title\";s:8:\"About us\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";s:5:\"image\";s:52:\"091d584fced301b442654dd8c23b3fc9_1604319123_3170.jpg\";}', NULL),
(3, 'login', 'a:7:{s:7:\"heading\";s:25:\"Sign in to Cosplay Cosmos\";s:10:\"short_desc\";s:66:\"Based on your username our system will know if you\'re a cosplayer.\";s:11:\"login_image\";N;s:5:\"image\";s:52:\"b56a18e0eacdf51aa2a5306b0f533204_1577355260_9264.svg\";s:10:\"page_title\";s:5:\"Login\";s:16:\"meta_description\";s:4:\"test\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(4, 'signup', 'a:6:{s:7:\"heading\";s:40:\"Cosplay - Let\'s get your account set up!\";s:10:\"short_desc\";s:71:\"Discover local cosplayer, read reviews, and find the right fit for you.\";s:5:\"image\";s:52:\"303ed4c69846ab36c2904d3ba8573050_1577355286_9419.svg\";s:10:\"page_title\";s:7:\"Sign up\";s:16:\"meta_description\";s:26:\"HTML, CSS, XML, JavaScript\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(5, 'forgot', 'a:6:{s:7:\"heading\";s:15:\"Forgot Password\";s:10:\"short_desc\";s:122:\"Don’t worry. Just enter the email address you registered with and we’ll email you instructions to reset your password.\";s:5:\"image\";s:52:\"9b72e31dac81715466cd580a448cf823_1577355251_6445.svg\";s:10:\"page_title\";s:15:\"Forgot Password\";s:16:\"meta_description\";s:26:\"HTML, CSS, XML, JavaScript\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(6, 'reset', 'a:3:{s:7:\"heading\";s:14:\"Reset password\";s:10:\"short_desc\";s:38:\"Enter a new password for your account.\";s:5:\"image\";s:52:\"bc6dc48b743dc5d013b1abaebd2faed2_1577355238_2644.svg\";}', NULL),
(8, 'email_verify', 'a:2:{s:15:\"everify_heading\";s:18:\"Email Verification\";s:14:\"everify_detail\";s:272:\"<p>Please verify your email address, We&rsquo;ve sent a verify email to your email address. If you don&rsquo;t see the email, check your spam folder. If you didn&#39;t get email click on resend email link, or if you want to change email address click the link below.</p>\r\n\";}', NULL),
(9, 'search', '', NULL),
(10, 'contact', 'a:7:{s:13:\"first_heading\";s:10:\"Contact us\";s:6:\"detail\";s:183:\"Feel free to ask any questions over the phone or get in touch via our contact form. Your message will be dispatched directly to our staff who will get back to you as soon as they can.\";s:14:\"second_heading\";s:21:\"Questions or Comments\";s:13:\"third_heading\";s:17:\"Drop us a message\";s:10:\"page_title\";s:10:\"Contact us\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(11, 'phone_verify', 'a:2:{s:15:\"pverify_heading\";s:18:\"Phone Verification\";s:14:\"pverify_detail\";s:289:\"<p>We are going to send you a text message for Phone verification if you want to verify your phone number, Please make sure your phone number is correct before verification. Click the link below to verify your phone number or if you want to change Phone Number click the link below .</p>\r\n\";}', NULL),
(12, 'player_signup', 'a:6:{s:7:\"heading\";s:43:\"Work Better, Live Better. Become Cosplayer.\";s:10:\"short_desc\";s:111:\"Create your profile, receive requests as soon as your profile is approved. And get paid to become a cosplayer. \";s:5:\"image\";s:52:\"3c7781a36bcd6cf08c11a970fbe0e2a6_1577355866_1113.svg\";s:10:\"page_title\";s:17:\"Cosplayer Sign up\";s:16:\"meta_description\";s:26:\"HTML, CSS, XML, JavaScript\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(13, 'become_cosplayer', 'a:22:{s:7:\"heading\";s:41:\"Get paid to <em>play role of cosplay</em>\";s:10:\"short_desc\";s:118:\"Thanks for your interest in Cosmos! To give you the best experience possible, we\'d love to know what brought you here.\";s:11:\"button_text\";s:15:\"Get started now\";s:8:\"left_txt\";s:604:\"<h3>PFSC services</h3>\r\n\r\n<ul>\r\n	<li><strong>Dog Boarding</strong> Care for a dog (or cat!) overnight in your home. Sitters who offer boarding can make up to 2x more than sitters who don\'t.</li>\r\n	<li><strong>Dog Walking</strong> Pick up dog walks that fit your schedule</li>\r\n	<li><strong>Doggy Daycare</strong> Ideal for work-from-home dog lovers</li>\r\n	<li><strong>House-sitting, Drop-ins</strong> Stay with or check up on pets in their natural habitat</li>\r\n	<li><strong>PFSC Play Dates </strong>Link with another member in your area to socialize your pet and make friends with others.</li>\r\n</ul>\r\n\";s:9:\"right_txt\";s:481:\"<h3>Safety first. Always.</h3>\r\n\r\n<p>We work tirelessly to ensure tails keep wagging and pet parents’ minds are at ease.</p>\r\n\r\n<ul>\r\n	<li>Every PFSC service you offer is covered by the PFSC Guarantee</li>\r\n	<li>Safe, secure, and convenient online payments</li>\r\n	<li>General background checks offered for every pet sitter and dog walker</li>\r\n	<li>A world-class support team that has your back around the clock</li>\r\n	<li>Ongoing pet care education for dog sitters</li>\r\n</ul>\r\n\";s:5:\"image\";s:52:\"3a835d3215755c435ef4fe9965a3f2a0_1577359435_7776.svg\";s:6:\"image1\";s:52:\"142949df56ea8ae0be8b5306971900a4_1598522229_3340.png\";s:6:\"image2\";s:52:\"55743cc0393b1cb4b8b37d09ae48d097_1577360313_5207.jpg\";s:11:\"how_heading\";s:12:\"How it works\";s:14:\"how_short_desc\";s:84:\"Relax knowing that your events will be lovingly cared for by an experienced cosplay.\";s:12:\"how_heading1\";s:12:\"Smart prices\";s:9:\"how_text1\";s:34:\"Just book last-minute, or off-peak\";s:12:\"how_heading2\";s:9:\"Book 24/7\";s:9:\"how_text2\";s:20:\"From bed, or the bus\";s:12:\"how_heading3\";s:27:\"Choice of top-rated cosplay\";s:9:\"how_text3\";s:33:\"Thousands of venues (and reviews)\";s:10:\"how_image1\";s:52:\"65b9eea6e1cc6bb9f0cd2a47751a186f_1597311709_4466.svg\";s:10:\"how_image2\";s:52:\"ae0eb3eed39d2bcef4622b2499a05fe6_1597311709_9264.svg\";s:10:\"how_image3\";s:52:\"903ce9225fca3e988c2af215d4e544d3_1597311709_9241.svg\";s:10:\"page_title\";s:13:\"Become Cosmos\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(14, 'services', 'a:19:{s:7:\"heading\";s:41:\"We\'ll treat <em>your dog like family</em>\";s:10:\"short_desc\";s:151:\"Connect with a 5-star sitter who\'ll welcome your dog into their home when you\'re out of town—whether it’s just for the weekend or over a few weeks.\";s:11:\"button_text\";s:15:\"Get started now\";s:16:\"services_heading\";s:17:\"Our main Services\";s:11:\"how_heading\";s:12:\"How it works\";s:14:\"how_short_desc\";s:131:\"With PFSC, your pet stays in a sitter’s home or yours, whether you’re traveling or just out for the day. Here’s how it works.\";s:12:\"how_heading1\";s:6:\"Search\";s:9:\"how_text1\";s:50:\"Read verified reviews and pick the perfect sitter.\";s:12:\"how_heading2\";s:10:\"Book & Pay\";s:9:\"how_text2\";s:49:\"Book and pay securely through the website or app.\";s:12:\"how_heading3\";s:5:\"Relax\";s:9:\"how_text3\";s:65:\"Get the PFSC Guarantee, 24/7 support, and reservation protection.\";s:6:\"image1\";s:52:\"c8ffe9a587b126f152ed3d89a146b445_1577432408_2112.jpg\";s:10:\"how_image1\";s:52:\"e1e32e235eee1f970470a3a6658dfdd5_1577432408_1474.svg\";s:10:\"how_image2\";s:52:\"d707329bece455a462b58ce00d1194c9_1577432408_5792.svg\";s:10:\"how_image3\";s:52:\"b4a528955b84f584974e92d025a75d1f_1577432408_6299.svg\";s:10:\"page_title\";s:72:\"Pet Sitting Marketplace Services - Find Qualified Pet Sitters Near You. \";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(15, 'privacy_policy', 'a:4:{s:7:\"heading\";s:14:\"Privacy Policy\";s:10:\"page_title\";s:14:\"Privacy Policy\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', '<p>We believe your right to privacy and data security is our high priority.</p>\r\n\r\n<p>This statement discloses the privacy guidelines for the entire Company&#39;s website.</p>\r\n\r\n<p>For more information about our privacy or information usage guidelines, please contact Company&#39;s at sales@company.com and put &quot;Privacy&quot; in the subject line.</p>\r\n\r\n<p>Company&#39;s only asks for specific types of personal information which will allow us to fully process your order(s).</p>\r\n\r\n<p>On the Company&#39;s web site, you will be asked to provide information that will allow us to process your order.</p>\r\n\r\n<p>Company&#39;s requests information from you when you place an order or check the status on your computer system.</p>\r\n\r\n<p>Company&#39;s may ask for your name, e-mail address, phone number, address, customer preference information, customer number, as well as other similar personal information that is needed to place an order with Company&#39;s. If Company&#39;s ever asks for significantly different information you will be informed.</p>\r\n\r\n<p>Company&#39;s only uses your personal information for specific purposes</p>\r\n\r\n<p>The information you provide will be kept confidential and used to support your customer relationship with Company&#39;s. Representatives of Company&#39;s who have access to your personal information and prospect information are required to keep the information confidential and not use it for any other purpose than to carry out the services they are performing for Company&#39;s.</p>\r\n\r\n<p>Company&#39;s will not disclose your personal information to any outside organization for its use in marketing without your consent.</p>\r\n\r\n<p>Information regarding you (such as name, address and phone number) or your order and the products you purchase will not be given or sold to any outside organization for its use in marketing or solicitation without your consent.</p>\r\n\r\n<p>Company&#39;s wants to help you keep your personal information secure.</p>\r\n\r\n<p>You can request the individual information that Company&#39;s has collected about you via the Internet at sales@company.com or dial 1-866-81-PC&#39;s.</p>\r\n'),
(16, 'terms_conditions', 'a:4:{s:7:\"heading\";s:20:\"Terms and Conditions\";s:10:\"page_title\";s:18:\"Terms & Conditions\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', '<h3>Competition Terms and Conditions</h3>\r\n\r\n<p>Your use of the supportcompany.org web site (the &ldquo;Site&rdquo;) and our services, including phone orders, all purchases, and inquiries, from Company&#39;s is governed by the policies, terms, and conditions set forth below. Please read the following information carefully. By using this site or submitting an order for products or services, you indicate your acceptance of, and agreement to be bound by, the terms and conditions set forth below personally or as an agent for any business entity you represent. The term &ldquo;Customer&rdquo; means you or the business entity you are ordering goods or services for. If you do not agree to these terms and conditions, please do not use this site and please do not submit any orders for products or services. The terms and conditions posted on this website, including the warranty policy, are public information and must be adhered to by anyone doing business with Company&#39;s unless there is a written contract signed by an officer of Company&#39;s.</p>\r\n\r\n<h3>GENERAL TERMS AND CONDITIONS</h3>\r\n\r\n<ul>\r\n	<li>Customer agrees that Company&#39;s is not liable for mismatched product pictures or mistakes in product information. Company&#39;s reserves the right to change products and specifications and those listed on the Site may not be current. Customer agrees to verify the specifications of each product with the order. Company&#39;s is only responsible for products named on the invoice.</li>\r\n	<li>Our sales representatives are not authorized to make any representations or promises related to any product or services that exceed these terms and conditions and the warranty. Any additional provisions to your purchase must be made in writing signed by an officer of Company&#39;s.</li>\r\n	<li>Customer agrees that each item in a multi-item purchase from Company&#39;s shall be treated independently unless stated otherwise in the memo section of their order. That is, defect, replacement, and cancellation of one item does not constitute the voiding of the entire purchase. Each item shall be considered independently for warranty or refund purposes unless the customer has stated otherwise in the invoice memo.</li>\r\n	<li>Customer agrees that shipping costs and expenses will not be refunded once we ship.</li>\r\n	<li>It is the Customer&#39;s responsibility to look over their email confirmation and make sure all shipping, billing and item purchased are correct. If you do not get an email confirmation, call us to see if the order went through. Do not submit multiple orders or you will end up paying full restocking and shipping fees.</li>\r\n	<li>Order cancellation will be accepted by phone with a sales representative or over the web (only before the order is processed). It cannot be done over email or by leaving voice mails. You can confirm order cancellation by checking the order status online. Cancellation on orders already charged carries a 4.9% credit card processing cancellation fee. If an order has already been built in our facility (entered Stage 4) but has not been shipped, there will be an additional 15% restocking fee which covers expenses for taking the system apart and re-stocking the hardware.</li>\r\n	<li>Material fee for boxes, transportation, etc. are included in the shipping fee. Customer shall not be liable for additional shipping charges for purchases Company&#39;s chooses to ship in multiple packages unless they request and agree to shipping upgrades and upgrade fees. Company&#39;s does include shipping insurance with every FedEx and UPS shipment.</li>\r\n	<li>Customer agrees that Company&#39;s will not liable for shipper&#39;s shipping delays.</li>\r\n	<li>Financing interest fees paid by a customer are unable to be refunded or credited back by Company&#39;s for any reason.</li>\r\n</ul>\r\n\r\n<h3>A. WEB ORDERING SECURITY</h3>\r\n\r\n<p>Protecting your information is a priority for us. We use 128-bit encryption Secure Sockets Layer (SSL) technology to protect the security of your online order information. When you are about to enter your credit card information, look at the bottom right corner of the browser window for a icon of a gold lock. Also you can look at your address bar and see if it starts with &ldquo;https://&rdquo;. Some versions of browsers and some firewalls don&#39;t permit connection through secure servers. In that case, you won&#39;t be able to connect to the server and therefore won&#39;t be able to place an order through an insecure connection. If you cannot access the secure server for any reason, Please contact us to place an order, 1-866-81-STORM.</p>\r\n\r\n<h3>B. TRADEMARKS</h3>\r\n\r\n<p>All trademarks and registered trademarks displayed on the site are the trademarks of their respective owners, and are not intended to imply any endorsement or affiliation between Company&#39;s and these companies.</p>\r\n\r\n<h3>C. MAKING PURCHASES</h3>\r\n\r\n<p>If you wish to purchase products offered on the site, you will be asked to supply certain information, including but not limited to credit card or other payment information. You agree that all information you provide to Company&#39;s will be accurate complete and current. You agree to pay all charges incurred by authorized users of your account and credit card or other payment mechanism at the prices in effect when such charges are incurred. You will also be responsible for paying any applicable taxes, and shipping and handling charges relating to your purchases.</p>\r\n\r\n<h3>D. WHERE WE SHIP</h3>\r\n\r\n<p>We ship to any physical address that the shipper/courier can ship to domestically or internationally. We may accommodate (&ldquo;Customer&rdquo;) who need to have an item shipped to an APO/FPO address or PO Box depending on the circumstances. Due to the number of wrong addresses from customers, we now charge the face value that the shipper/courier charges us to reroute your package if you did not enter the address correctly. This charge is anywhere from $5-$25 and you agree if your address is wrong, Company&#39;s is authorized to charge your credit card for these fees.</p>\r\n\r\n<h3>E. WHEN WE SHIP</h3>\r\n\r\n<p>Orders received before 3:00 PM PST are usually processed the same day for product build. Products are shipped only after build which can take up to 15 days on a standard basis. Your order may be delayed if your ship to address does not match what your credit card issuer has on their file. Some orders that are shipped from fulfillment warehouses may require longer for the item to ship. We may also ship the orders with multiple items from different warehouses so it is possible you get the items on different days. Due to the many circumstances such as unable to charge your card or verify your address, we cannot guarantee when your order is shipped out. Also if you choose next day air service, it does not necessarily mean you will get it the next day from the order date, it means that you will get it the next day from the date we ship the order. Company&#39;s reserves the right at any time after receipt of your order to delay your order for any reason.</p>\r\n\r\n<h3>F. SHIPPING DELAYS</h3>\r\n\r\n<p>Once an order is shipped, it is up to the shipper courier to deliver the products; we will not be able to stop the shipment once it is shipped. If the shipper/courier loses the package, the shipper courier will put a tracer on the package. Tracers take around 3 days for air packages and 7 business days for ground packages. We will not be able to ship out replacement packages until the shipper courier confirms that the package is lost/will not be delivered to its destination and they will reimburse us. Without confirmation from the shipper courier, we will not know for sure if you will get two shipments if we ship out another one. Another delay is if there is no one to sign for the package, every package we ship usually requires a signature, if a package is returned to us because no one was available to sign for it or the address was input incorrectly at the time you enter the order, you will be charged again to ship it out a second time.</p>\r\n\r\n<h3>G. PRICING AND TYPOGRAPHICAL ERRORS</h3>\r\n\r\n<p>Due to the fast pace of the computer industry, all prices are subject to change without notice. We make every effort to list the most accurate, up to the minute information. Despite our efforts, some items on our website may be miss-priced. If a product is listed at an incorrect price due to a typographical, photographical, or technical error or error in pricing from our vendors, Company&#39;s reserves the right to refuse or cancel any orders placed for a product listed at the incorrect price. If your credit card has already been charged for the incorrect price, we will immediately refund your card and cancel your order. You may also repurchase it for the correct price if you wish to. Due to the volatility in pricing for computer products, we do not match competitor&#39;s pricing and we will not offer price protection beyond the 24 hours of purchase. Example: If Intel drops the price of a processor 5 days after your purchase, that is beyond our control and our cost for that same processor when we shipped is also much higher than our current selling price. We will not be able to refund the difference since we had to purchase the processor at a much higher cost to send it to you when you placed your order.</p>\r\n\r\n<h3>H. ORDER ACCEPTANCE POLICY</h3>\r\n\r\n<p>Your receipt of an electronic or phone order confirmation does not signify our acceptance of your order. Company&#39;s reserves the right at any time after receipt of your order to accept or decline your order for any reason.</p>\r\n\r\n<h3>I. DISCLAIMER AND LIMITATION OF LIABILITY AS TO PRODUCTS SOLD</h3>\r\n\r\n<p>YOU AGREE THAT THE SOLE AND EXCLUSIVE MAXIMUM LIABILITY TO Company&#39;s. ARISING FROM ANY PRODUCT SOLD BY Company&#39;s SHALL BE THE PRICE OF THE PRODUCT ORDERED. IN NO EVENT SHALL Company&#39;s, ITS DIRECTORS, OFFICERS, SHAREHOLDERS, EMPLOYEES AND REPRESENTATIVES BE LIABLE FOR SPECIAL, INDIRECT, CONSEQUENTIAL, OR PUNITIVE DAMAGES RELATED TO PRODUCT SOLD.</p>\r\n\r\n<p>1. DISCLAIMER AND LIMITATION OF LIABILITY AS TO THE supportcompany.org WEBSITE. THE supportcompany.org WEB SITE AND THE MATERIALS THEREIN ARE PROVIDED &ldquo;AS IS&rdquo;. Company&#39;s. MAKES NO REPRESENTATIONS OR WARRANTIES, EITHER EXPRESS OR IMPLIED, OF ANY KIND WITH RESPECT TO THE supportcompany.org SITE, THEIR OPERATION, CONTENTS, INFORMATION, OR MATERIALS ON THE SITE. Company&#39;s EXPRESSLY DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, OF ANY KIND WITH RESPECT TO THE SITE OR THEIR USE, INCLUDING BUT NOT LIMITED TO ANY IMPLIED WARRANTY OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. YOU AGREE THAT Company&#39;s, ITS DIRECTORS, OFFICERS, EMPLOYEES OR OTHER REPRESENTATIVES SHALL NOT BE LIABLE FOR DAMAGES ARISING FROM THE OPERATION, CONTENT OR USE OF THE Company&#39;s SITE. YOU AGREE THAT THIS LIMITATION OF LIABILITY IS COMPREHENSIVE AND APPLIES TO ALL DAMAGES OF ANY KIND, INCLUDING WITHOUT LIMITATION DIRECT, INDIRECT, COMPENSATORY, SPECIAL, INCIDENTAL, PUNITIVE AND CONSEQUENTIAL DAMAGES.</p>\r\n\r\n<h3>J. TITLE TRANSFER</h3>\r\n\r\n<p>Company&#39;s retains title to parts and complete systems purchased until the said purchaser pays for items in full at which time the title passes to purchaser.</p>\r\n\r\n<h3>K. GOVERNING LAW</h3>\r\n\r\n<p>You agree that any legal action brought against Company&#39;s shall be governed by the laws of the State of California without regard to its conflict of law principles. You agree that the sole jurisdiction and venue for any arbitration arising from your use of or orders and purchased made on the Company&#39;s sites or from Company&#39;s shall be in Alameda County, California. All actions between the parties related to purchases and sales from Company&#39;s shall be resolved by binding AAA arbitration in Alameda County California.</p>\r\n\r\n<h3>L. RETURNS</h3>\r\n\r\n<p>Refunds are only issued for the sale amount at current selling market value (see section &ldquo;O&rdquo;) of the component(s) inside the computer, and does not include freight charges.</p>\r\n\r\n<p>Additionally, a 15% restocking fee is applied to computer system unless all of the three items below have been met:</p>\r\n\r\n<ol>\r\n	<li>Your purchase is returned back to Company&#39;s within 30 days of original delivery.</li>\r\n	<li>There are defective hardware component(s) inside the computer such as a memory stick causing stability/performance issue.</li>\r\n	<li>Company&#39;s or a third-party computer company contracted by Company&#39;s has verified that the stability/performance issues are in direct result of the hardware inside the computer and NOT the software such as the operating system, drivers, or software.</li>\r\n</ol>\r\n\r\n<p>Company&#39;s cannot offer a full refund for the purchase price of the product(s) unless there were issues such as defective hardware component(s) inside the computer such as a memory stick causing stability/performance issues. The returned merchandise must include its original packaging, manuals, and all accessories. All sales on software items are final. Opened accessories such as the monitor and speakers will not be refunded. Company&#39;s will not refund shipping costs and will not pay shipping for returning packages. ORIGINAL SALES RECEIPT REQUIRED FOR ALL RETURNS. THE 30 DAY MONEY BACK GUARANTEE IS ONLY HONORED IF THE COMPUTER SYSTEM IS RETURNED TO Company&#39;s WITHIN 30 DAYS FROM DATE OF ORIGINAL DELIVERY AND THE COMPUTER MUST HAVE DEFECTIVE HARDWARE. CUSTOMER IS RESPONSIBLE FOR ALL SHIPPING FEES FOR RETURNS. THE REFUND VALUE WILL BE THE FULL PURCHASE PRICE OF A NEW Company&#39;s COMPUTER AT CURRENT MARKET VALUE. Before making any return, back up all software and data and remove any personal information, confidential information or private content which you do not want viewed or used by any third party. Company&#39;s is not liable for lost data or misuse of data on computers that are returned for any reason.</p>\r\n\r\n<h3>M. WARRANTY SERVICE</h3>\r\n\r\n<p>Company&#39;s warrants to the original purchaser that any hardware part of the computer system, excluding accessories (display monitor, keyboard, mouse, software, operating system, documentation and similar items) will be free of defects in workmanship and materials for the period the warranty included with the purchase from the date of delivery to Customer. During the warranty period, Company&#39;s will repair or replace, at its sole discretion, the defective computer system, for defects specified by you, free of charge for labor and/or parts depending on your warranty period. Parts may not be the same but will be equivalent parts. Company&#39;s will cover shipping costs back and forth and replace the part(s) within the first 60 days of receiving your computer system. After 60 days you will be held liable for shipping costs to Company&#39;s and Company&#39;s will cover return shipping back to you. The remedy for this breach of warranty is limited to replacement or repair with parts warranted for the the remainder of the warranty period. Any additional purchases or upgrades will not extend this warranty. Excluded from this warranty is any damage caused during shipment (except the shipment to the original purchaser) and any damage caused by: impacts, fluids, fire, flood, wind, earthquake, lightning or similar disaster; unauthorized modifications, attachments or peripherals, improper use, environment, installation or electrical supply; improper maintenance; any other misuse, abuse, or mishandling. Company&#39;s&#39;s sole liability, under this warranty, for failure to repair or replace the hardware system after a reasonable number of attempts is limited to replacement or, at Company&#39;s&#39;s sole discretion, refund of the original purchase price. The above constitutes purchaser&#39;s exclusive remedies for breach of warranty. Company&#39;s shall, under no circumstances, be liable for any other damages, including but not limited to special, incidental, consequential and other similar claims whether based upon breach of contract, breach of warranty, negligence, or strict liability, or any other similar theories. Damages excluded include but are not limited to: loss of profit, loss of revenue, loss of data or software, loss of use of the hardware system, loss of use of related equipment, cost of substitute or replacement equipment, &quot;down-time&quot;, purchaser&rsquo;s time, injury to property, and all claims of third parties. EXCEPT AS EXPRESSLY STATED HEREIN, Company&#39;s MAKES NO REPRESENTATIONS OR WARRANTIES, EITHER EXPRESS OR IMPLIED, OF ANY KIND WITH RESPECT TO PRODUCTS SOLD BY Company&#39;s. EXCEPT AS EXPRESSLY STATED HEREIN, Company&#39;s. EXPRESSLY DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, OF ANY KIND WITH RESPECT TO PRODUCTS SOLD ON THIS SITE, INCLUDING BUT NOT LIMITED TO, ANY IMPLIED WARRANTY OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. Depending on the term of the limited warranty, the coverage of labor and parts will vary. For additional details, please visit the&nbsp;<a href=\"http://localhost/herosolutions/infosky/terms-and-conditions.php?\">warranty details page</a>.</p>\r\n\r\n<h3>N. REFUSED SHIPMENTS</h3>\r\n\r\n<p>Any product that Company&#39;s ships out to Customer comes back to Company&#39;s as refused delivery, Customer will subject to fees. A restock fee of 15% will be applied to computer system. Also, shipping fees sending the package to the Customer and receiving the package back from the Customer will not be refunded.</p>\r\n\r\n<h3>O. CURRENT MARKET VALUE</h3>\r\n\r\n<p>Since every computer system is customized to the Customer&rsquo;s needs, it becomes difficult to return computer systems for a full refund. If you are having defective parts issues with the computer system, we will be more than happy to offer a full refund, minus shipping costs for the purchase price of the computer at its current market value. For example, if you purchased a system from Company&#39;s at the price of $1,500.00 after a length of time, you are requesting a full refund (and you have a verified defective hardware component such as a memory stick, etc causing stability/performance issues within the first 30-days of original delivery) we will offer a full refund for the hardware at its current selling market value. If the same system is now available for $1,200.00, Company&#39;s will issue a refund of $1,200.00 which will allow you to still purchase a computer with the same configuration that you originally ordered at $1,500.00. This protects the customer and Company&#39;s from price adjustments from manufacturers that are out of both Company&#39;s and the customer&rsquo;s control. In the end, the customer will still be able to buy a new computer with the same specifications from the original purchase.</p>\r\n\r\n<h3>P. SPECIAL REQUESTED COMPONENTS &amp; ACCESSORIES</h3>\r\n\r\n<p>Customers are more than welcome to request Company&#39;s to purchase components or accessories that we normally do not offer and stock for customers to purchase on our website. In the event of an order cancellation, such items cannot be returned to Company&#39;s for a refund under any circumstances once they have been ordered, they will be returned back to the customer at the customer&rsquo;s expense. In addition, if any special ordered components or accessories turn out to be defective during testing at Company&#39;s or after the customer receives the end product, it will be the responsibility of the customer, not Company&#39;s to obtain replacement warranty service directly from the manufacturer.</p>\r\n\r\n<h3>Q. INTERNATIONAL CUSTOMERS</h3>\r\n\r\n<p>The Terms and Conditions and Warranty also applies to Company&#39;s products shipped to any location outside of the Continental United States, the customer is responsible for paying all freight charges incurred in shipping, importing/exporting, receiving replacement parts and for arranging and paying for the shipment of any defective part(s) back to Company&#39;s. All international customers are responsible for all customs duties, VAT and other associated taxes and charges. Such import custom, duty, VAT and other taxes and charges are non-refundable once the order ships.</p>\r\n');
INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(17, 'cookie_policy', 'a:4:{s:7:\"heading\";s:13:\"Cookie Policy\";s:10:\"page_title\";s:13:\"Cookie Policy\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', '<h3>A. WEB ORDERING SECURITY</h3>\r\n\r\n<p>Protecting your information is a priority for us. We use 128-bit encryption Secure Sockets Layer (SSL) technology to protect the security of your online order information. When you are about to enter your credit card information, look at the bottom right corner of the browser window for a icon of a gold lock. Also you can look at your address bar and see if it starts with &ldquo;https://&rdquo;. Some versions of browsers and some firewalls don&#39;t permit connection through secure servers. In that case, you won&#39;t be able to connect to the server and therefore won&#39;t be able to place an order through an insecure connection. If you cannot access the secure server for any reason, Please contact us to place an order, 1-866-81-STORM.</p>\r\n\r\n<h3>B. TRADEMARKS</h3>\r\n\r\n<p>All trademarks and registered trademarks displayed on the site are the trademarks of their respective owners, and are not intended to imply any endorsement or affiliation between Company&#39;s and these companies.</p>\r\n\r\n<h3>C. MAKING PURCHASES</h3>\r\n\r\n<p>If you wish to purchase products offered on the site, you will be asked to supply certain information, including but not limited to credit card or other payment information. You agree that all information you provide to Company&#39;s will be accurate complete and current. You agree to pay all charges incurred by authorized users of your account and credit card or other payment mechanism at the prices in effect when such charges are incurred. You will also be responsible for paying any applicable taxes, and shipping and handling charges relating to your purchases.</p>\r\n\r\n<h3>D. WHERE WE SHIP</h3>\r\n\r\n<p>We ship to any physical address that the shipper/courier can ship to domestically or internationally. We may accommodate (&ldquo;Customer&rdquo;) who need to have an item shipped to an APO/FPO address or PO Box depending on the circumstances. Due to the number of wrong addresses from customers, we now charge the face value that the shipper/courier charges us to reroute your package if you did not enter the address correctly. This charge is anywhere from $5-$25 and you agree if your address is wrong, Company&#39;s is authorized to charge your credit card for these fees.</p>\r\n\r\n<h3>E. WHEN WE SHIP</h3>\r\n\r\n<p>Orders received before 3:00 PM PST are usually processed the same day for product build. Products are shipped only after build which can take up to 15 days on a standard basis. Your order may be delayed if your ship to address does not match what your credit card issuer has on their file. Some orders that are shipped from fulfillment warehouses may require longer for the item to ship. We may also ship the orders with multiple items from different warehouses so it is possible you get the items on different days. Due to the many circumstances such as unable to charge your card or verify your address, we cannot guarantee when your order is shipped out. Also if you choose next day air service, it does not necessarily mean you will get it the next day from the order date, it means that you will get it the next day from the date we ship the order. Company&#39;s reserves the right at any time after receipt of your order to delay your order for any reason.</p>\r\n\r\n<h3>F. SHIPPING DELAYS</h3>\r\n\r\n<p>Once an order is shipped, it is up to the shipper courier to deliver the products; we will not be able to stop the shipment once it is shipped. If the shipper/courier loses the package, the shipper courier will put a tracer on the package. Tracers take around 3 days for air packages and 7 business days for ground packages. We will not be able to ship out replacement packages until the shipper courier confirms that the package is lost/will not be delivered to its destination and they will reimburse us. Without confirmation from the shipper courier, we will not know for sure if you will get two shipments if we ship out another one. Another delay is if there is no one to sign for the package, every package we ship usually requires a signature, if a package is returned to us because no one was available to sign for it or the address was input incorrectly at the time you enter the order, you will be charged again to ship it out a second time.</p>\r\n\r\n<h3>G. PRICING AND TYPOGRAPHICAL ERRORS</h3>\r\n\r\n<p>Due to the fast pace of the computer industry, all prices are subject to change without notice. We make every effort to list the most accurate, up to the minute information. Despite our efforts, some items on our website may be miss-priced. If a product is listed at an incorrect price due to a typographical, photographical, or technical error or error in pricing from our vendors, Company&#39;s reserves the right to refuse or cancel any orders placed for a product listed at the incorrect price. If your credit card has already been charged for the incorrect price, we will immediately refund your card and cancel your order. You may also repurchase it for the correct price if you wish to. Due to the volatility in pricing for computer products, we do not match competitor&#39;s pricing and we will not offer price protection beyond the 24 hours of purchase. Example: If Intel drops the price of a processor 5 days after your purchase, that is beyond our control and our cost for that same processor when we shipped is also much higher than our current selling price. We will not be able to refund the difference since we had to purchase the processor at a much higher cost to send it to you when you placed your order.</p>\r\n'),
(18, 'guarantee', 'a:4:{s:7:\"heading\";s:16:\"Cosmos Guarantee\";s:10:\"page_title\";s:16:\"Cosmos Guarantee\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', '<p>We believe your right to privacy and data security is our high priority.</p>\r\n\r\n<p>This statement discloses the privacy guidelines for the entire Company&#39;s website.</p>\r\n\r\n<p>For more information about our privacy or information usage guidelines, please contact Company&#39;s at sales@company.com and put &quot;Privacy&quot; in the subject line.</p>\r\n\r\n<p>Company&#39;s only asks for specific types of personal information which will allow us to fully process your order(s).</p>\r\n\r\n<p>On the Company&#39;s web site, you will be asked to provide information that will allow us to process your order.</p>\r\n\r\n<p>Company&#39;s requests information from you when you place an order or check the status on your computer system.</p>\r\n\r\n<p>Company&#39;s may ask for your name, e-mail address, phone number, address, customer preference information, customer number, as well as other similar personal information that is needed to place an order with Company&#39;s. If Company&#39;s ever asks for significantly different information you will be informed.</p>\r\n\r\n<p>Company&#39;s only uses your personal information for specific purposes</p>\r\n\r\n<p>The information you provide will be kept confidential and used to support your customer relationship with Company&#39;s. Representatives of Company&#39;s who have access to your personal information and prospect information are required to keep the information confidential and not use it for any other purpose than to carry out the services they are performing for Company&#39;s.</p>\r\n\r\n<p>Company&#39;s will not disclose your personal information to any outside organization for its use in marketing without your consent.</p>\r\n\r\n<p>Information regarding you (such as name, address and phone number) or your order and the products you purchase will not be given or sold to any outside organization for its use in marketing or solicitation without your consent.</p>\r\n\r\n<p>Company&#39;s wants to help you keep your personal information secure.</p>\r\n\r\n<p>You can request the individual information that Company&#39;s has collected about you via the Internet at sales@company.com or dial 1-866-81-PC&#39;s.</p>\r\n'),
(19, 'reservation_protection', 'a:4:{s:7:\"heading\";s:27:\"Cosmos\'s Booking Protection\";s:10:\"page_title\";s:27:\"Cosmos\'s Booking Protection\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', '<p>Refunds are only issued for the sale amount at current selling market value (see section &ldquo;O&rdquo;) of the component(s) inside the computer, and does not include freight charges.</p>\r\n\r\n<p>Additionally, a 15% restocking fee is applied to computer system unless all of the three items below have been met:</p>\r\n\r\n<ol>\r\n	<li>Your purchase is returned back to Company&#39;s within 30 days of original delivery.</li>\r\n	<li>There are defective hardware component(s) inside the computer such as a memory stick causing stability/performance issue.</li>\r\n	<li>Company&#39;s or a third-party computer company contracted by Company&#39;s has verified that the stability/performance issues are in direct result of the hardware inside the computer and NOT the software such as the operating system, drivers, or software.</li>\r\n</ol>\r\n\r\n<p><a href=\"mailto:info@puppyfriendssocialclub.com\">Email</a>&nbsp;or call us&mdash;we can help you find a great replacement.</p>\r\n'),
(20, 'player_guidelines', 'a:20:{s:13:\"first_heading\";s:31:\"Pet Sitters <em>Guidelines</em>\";s:16:\"first_short_desc\";s:14:\"Just Like Home\";s:12:\"first_detail\";s:838:\"The goal of PFSC is to insure each and every fur kid feels like they are home, and each pet parent is certain they have left their fur kid in the best of care. That is why as a PFSC Member/Sitter that you follow the PFSC Guidelines. Once you have signed up and passed the background check, an in home visit will be scheduled one of the PFSC staff will come to your home to inspect the residence for safety, and do a PFSC photo shoot to add to your profile. Professional photos make your profile more appealing and will get the pet parent a chance to meet you thru the PFSC virtual sitter tour. Its highly recommended that you do an in-n person meet and greet prior to each stay. But sometimes emergencies and last minute trips happen and clients have no time to meet and greet. So the virtual tour aids in the last minute booking process.\";s:14:\"second_heading\";s:36:\"If you live in an <em>Apartment</em>\";s:13:\"second_detail\";s:77:\"You can only host small breed dogs, and no more than 3 vacationers at a time.\";s:13:\"third_heading\";s:13:\"In case Of...\";s:18:\"third_left_heading\";s:6:\"Injury\";s:17:\"third_left_detail\";s:237:\"Immediately take fur kid to the vet in your area once you check in call PFSC Emergency Hot line, and then the Pet Parent. We will also contact the pet parent. Fill out the PFSC injury report in your sitter profile. Follow up Accordingly.\";s:19:\"third_right_heading\";s:16:\"Run Away Fur Kid\";s:18:\"third_right_detail\";s:401:\"If Fido is still in your site, DO NO CHASE pups think you’re playing if you chase them. No frantic running after him. Simply get a treat if possible, and get low to the ground call his name and lure him back to you. If you can’t find the Fur Kid Immediately call PFSC Emergency Hot Line and we will GPS Locate the Missing fur kid. IN ALL EMERGENCIES CALL PFSC EMERGENCY HOTLINE AND THEN THE CLIENT\";s:14:\"fourth_heading\";s:28:\"Not The Average Hosting Site\";s:13:\"fourth_detail\";s:241:\"We are not a tech company, we are a membership based social club for pets. That means we have guidelines and rules to not only sure the safety of our clients fur kids but for your protection as well. With that being said Welcome to the Club!\";s:11:\"fourth_name\";s:11:\"Auntie Kyss\";s:10:\"fifth_left\";s:693:\"<h3>YOU MUST...</h3>\r\n\r\n<p>Spend time with the fur kids and take video and photos of playtime and walks. We are not called puppy friends social club for nothing.. If You&rsquo;re signing up to be a PFSC care provider you must have time to devote to your fur kid vacationers. That means regular walks, playtime and lots of cuddles.</p>\r\n\r\n<p>Have a fenced in yard or a XXL fenced playpen for the fur Kids to roam and play</p>\r\n\r\n<p>Have at least one resident pet, it&#39;s a social club and our members want to make fur friends and play.</p>\r\n\r\n<p>Not ever Kennel a kid unless the Kennel is brought to your home and the client insist during certain times their fur kid should be kenneled.</p>\r\n\";s:11:\"fifth_right\";s:621:\"<h3>QUESTIONS YOU SHOULD ASK</h3>\r\n\r\n<ol>\r\n	<li>What is the fur kids temperament, what are its likes and dislikes?</li>\r\n	<li>Does it have a tendency to bite or get mood swings.</li>\r\n	<li>Does it get anxious when left alone?</li>\r\n	<li>What are the feeding habits, does it finish food immediately or takes a long time to do so.</li>\r\n	<li>Any dietary restrictions</li>\r\n	<li>All clients are required to keep updated vaccination records on file, however it never hurts to ask.</li>\r\n	<li>Does the fur kid play well with other fur kids and human children</li>\r\n	<li>What commands does the fur kid respond to?</li>\r\n</ol>\r\n\";s:6:\"image1\";s:52:\"051e4e127b92f5d98d3c79b195f2b291_1579524199_9632.jpg\";s:6:\"image2\";s:52:\"1534b76d325a8f591b52d302e7181331_1579524199_8308.jpg\";s:10:\"page_title\";s:17:\"Sitter Guidelines\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(21, 'safety', 'a:31:{s:13:\"first_heading\";s:50:\"When it comes to <em>safety, we lead the pack</em>\";s:16:\"first_short_desc\";s:82:\"Keeping everyone—and every pet—in the PFSC community safe is our top priority.\";s:12:\"first_detail\";s:988:\"<p>Hi, I&rsquo;m Kisha Chavis, PFSC&rsquo;s chief operating officer.</p>\r\n\r\n<p>I know how important peace of mind is when you entrust others to care for a member of your family, which is why I&rsquo;m proud to be part of the amazing team at Puppy Friends Social Club, working to build a safe platform for pet lovers through prevention, education, and support. I&#39;m especially proud of the support our 24/7 Trust &amp; Safety team provides in the rare instance that something doesn&rsquo;t go as planned.</p>\r\n\r\n<p>We don&#39;t just build and support the PFSC platform&mdash;we&#39;re part of it too. Many employees are actively involved in the PFSC community as pet sitters, dog walkers, and pet parents.</p>\r\n\r\n<p>At Puppy Friends Social Club, our mission is to make sure everyone can experience the love of a pet in their lives. Read on to learn more about our commitment to safety, and please get in touch if you have feedback for us.</p>\r\n\r\n<p><strong>- Kisha Chavis</strong></p>\r\n\";s:14:\"second_heading\";s:28:\"PFSC <em>by the numbers</em>\";s:15:\"second_heading1\";s:8:\"Millions\";s:14:\"second_detail1\";s:34:\"of 5-star reviews from pet parents\";s:15:\"second_heading2\";s:15:\"Every 3 seconds\";s:14:\"second_detail2\";s:37:\"a service is booked on PFSC worldwide\";s:15:\"second_heading3\";s:21:\"Hundreds of thousands\";s:14:\"second_detail3\";s:35:\"of pet parents worldwide trust PFSC\";s:15:\"second_heading4\";s:9:\"8 seconds\";s:14:\"second_detail4\";s:62:\"is the average wait time to speak with our Trust & Safety team\";s:13:\"third_heading\";s:31:\"Discover pet care you can trust\";s:11:\"third_text1\";s:154:\"All sitters and walkers must pass a background check and a safety quiz, and all profiles are reviewed to ensure they meet PFSC’s high quality standards.\";s:11:\"third_text2\";s:133:\"No one knows your pet better than you do. Use our advanced search options to find the exact right care for your pet’s unique needs.\";s:11:\"third_text3\";s:146:\"Payments are cashless and encrypted to keep information secure. Credit card information is never shared between pet owners and pet care providers.\";s:11:\"third_text4\";s:138:\"Pet parents and sitters can set up a free in-person Meet & Greet to discuss expectations and make sure everyone gets along before booking.\";s:11:\"fourth_left\";s:230:\"<h3>PFSC GUARANTEE</h3>\r\n\r\n<p>All stays and walks booked on PFSC.com or the PFSC app are backed by the PFSC Guarantee, a program designed to assist pet owners in the rare instance where a booking doesn&rsquo;t go as planned.</p>\r\n\";s:12:\"fourth_right\";s:222:\"<h3>RESERVATION PROTECTION</h3>\r\n\r\n<p>It doesn&rsquo;t happen often, but if a sitter or walker needs to cancel at the last minute, we&rsquo;ll help you find someone new and, if needed, help cover the cost difference.</p>\r\n\";s:6:\"image1\";s:52:\"eba0dc302bcd9a273f8bbb72be3a687b_1579527875_1984.jpg\";s:13:\"second_image1\";s:52:\"b3e3e393c77e35a4a3f3cbd1e429b5dc_1579527875_2994.jpg\";s:13:\"second_image2\";s:52:\"e836d813fd184325132fca8edcdfb40e_1579527875_7034.jpg\";s:13:\"second_image3\";s:52:\"f61d6947467ccd3aa5af24db320235dd_1579527875_3304.jpg\";s:13:\"second_image4\";s:52:\"9c01802ddb981e6bcfbec0f0516b8e35_1579527875_2951.jpg\";s:12:\"third_image1\";s:52:\"e836d813fd184325132fca8edcdfb40e_1579527875_7941.svg\";s:12:\"third_image2\";s:52:\"81e74d678581a3bb7a720b019f4f1a93_1579527875_8178.svg\";s:12:\"third_image3\";s:52:\"f2fc990265c712c49d51a18a32b39f0c_1579527876_3210.svg\";s:12:\"third_image4\";s:52:\"2b24d495052a8ce66358eb576b8912c8_1579527876_9879.svg\";s:10:\"page_title\";s:13:\"Cosmos Safety\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(22, 'advertise', 'a:34:{s:13:\"first_heading\";s:17:\"Advertise with us\";s:12:\"first_detail\";s:265:\"We want to work with progressive partners that contribute to a culture of great pet care and enhance the lives of modern pet parents. We utilize our expert team to create compelling sponsored content that connects your brand to millions of highly engaged consumers.\";s:14:\"first_btn_text\";s:11:\"Contact us \";s:13:\"second_detail\";s:130:\"We\'ll craft custom content designed to perform across multiple channels and reach our dedicated audience of passionate dog owners.\";s:13:\"third_heading\";s:19:\"Products they crave\";s:13:\"third_detail1\";s:73:\"Fun, authentic, and heartwarming narratives that showcase the joy of dogs\";s:13:\"third_detail2\";s:88:\"Smart, trusted content that helps pet parents improve the quality of their dogs’ lives\";s:13:\"third_detail3\";s:92:\"Curated recommendations for real, in-market dog owners looking for high-quality pet products\";s:14:\"fourth_heading\";s:21:\"Our <em>Audience</em>\";s:13:\"fourth_detail\";s:185:\"Our audience of modern pet parents and dog lovers is passionate, discerning, affluent, and actively seeking products and information that help them and their pets live their best lives.\";s:13:\"fifth_heading\";s:3:\"45%\";s:13:\"fifth_detail1\";s:9:\"dog owner\";s:13:\"fifth_detail2\";s:23:\"median household income\";s:13:\"fifth_detail3\";s:10:\"homeowners\";s:13:\"fifth_detail4\";s:37:\"completed bachelor\'s degree and above\";s:13:\"fifth_detail5\";s:6:\"female\";s:13:\"fifth_detail6\";s:35:\"spend over $100/month on their pets\";s:6:\"image1\";s:52:\"dc6a70712a252123c40d2adba6a11d84_1579596633_4793.jpg\";s:6:\"image2\";s:52:\"3636638817772e42b59d74cff571fbb3_1579596634_1952.jpg\";s:14:\"third_heading1\";s:17:\"Stories they want\";s:14:\"third_heading2\";s:21:\"Information they need\";s:14:\"third_heading3\";s:19:\"Products they crave\";s:14:\"fifth_heading1\";s:3:\"97%\";s:14:\"fifth_heading2\";s:3:\"75K\";s:14:\"fifth_heading3\";s:3:\"58%\";s:14:\"fifth_heading4\";s:3:\"65%\";s:14:\"fifth_heading5\";s:3:\"80%\";s:14:\"fifth_heading6\";s:3:\"45%\";s:13:\"sixth_heading\";s:76:\"The best way to <em>build your brand</em> in the <em>creative</em> community\";s:15:\"sixth_btn1_text\";s:12:\"Work with us\";s:15:\"sixth_btn2_text\";s:10:\"Contact us\";s:10:\"page_title\";s:17:\"Advertise with us\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(23, 'player_resources', 'a:5:{s:7:\"heading\";s:19:\"Cosplayer Resources\";s:10:\"short_desc\";s:49:\"Advice for being a successful cosplayer on Cosmos\";s:10:\"page_title\";s:19:\"Cosplayer Resources\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";}', NULL),
(24, 'help', 'a:8:{s:7:\"heading\";s:10:\"Need Help?\";s:10:\"short_desc\";s:26:\"How we can help you today?\";s:12:\"last_heading\";s:35:\"Can\'t find what you\'re looking for?\";s:14:\"last_btn1_text\";s:9:\"Live Chat\";s:14:\"last_btn2_text\";s:10:\"Contact us\";s:10:\"page_title\";s:9:\"Need Help\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(25, 'membership', 'a:8:{s:18:\"first_left_heading\";s:37:\"Membership <em>Levels For Buyers</em>\";s:17:\"first_left_detail\";s:119:\"Membership gives you the security of knowing that our vacation homes are inspected by one of our trust and safety team.\";s:19:\"first_right_heading\";s:39:\"We offer buyers membership levels with:\";s:18:\"first_right_detail\";s:245:\"<ul>\r\n	<li>Network Access</li>\r\n	<li>Home Inspection</li>\r\n	<li>Round the Clock GPS Tracking</li>\r\n	<li>Discounts on PFSC Merchandise</li>\r\n	<li>PFSC Hat, Tee Shirts, Hoodie</li>\r\n	<li>$0 Deductible Insurance</li>\r\n	<li>PFSC events</li>\r\n</ul>\r\n\";s:14:\"second_heading\";s:17:\"Membership Levels\";s:10:\"page_title\";s:17:\"Membership Levels\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:37:\"Your pets vaction home away from home\";}', NULL),
(26, 'blog', 'a:4:{s:10:\"page_title\";s:13:\"Blog Articles\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";s:7:\"heading\";s:13:\"Blog Articles\";}', NULL),
(27, 'press', 'a:4:{s:10:\"page_title\";s:10:\"Press Room\";s:16:\"meta_description\";s:37:\"Your pets vaction home away from home\";s:13:\"meta_keywords\";s:26:\"HTML, CSS, XML, JavaScript\";s:7:\"heading\";s:10:\"Press Room\";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_texts`
--

CREATE TABLE `tbl_site_texts` (
  `txt_id` int(11) NOT NULL,
  `txt_type` varchar(50) DEFAULT NULL,
  `txt_label` varchar(100) DEFAULT NULL,
  `txt_key` text DEFAULT NULL,
  `txt_value` text DEFAULT NULL,
  `txt_subject` text DEFAULT NULL,
  `txt_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site_texts`
--

INSERT INTO `tbl_site_texts` (`txt_id`, `txt_type`, `txt_label`, `txt_key`, `txt_value`, `txt_subject`, `txt_status`) VALUES
(1, 'email', 'Signup Email', 'signup', '<h3>Dear $name</h3>\r\n\r\n<p>Thank you for your registration.</p>\r\n\r\n<p>Please click on the link below to verify your email addresss.</p>\r\n', 'Thank you for registering', 1),
(2, 'email', 'Forgot Password Email', 'forgot_password', '<h3>Dear <!--?= $name ?--></h3>\r\n\r\n<p>Please click on the link below to reset your password.</p>\r\n', 'Reset your Password', 1),
(3, 'email', 'Change Email', 'change_email', '<h3>Dear $name</h3>\r\n\r\n<p>You have changed your email.</p>\r\n\r\n<p>Please click on the link below to verify your email address.</p>\r\n', 'Verify Your Email', 1),
(4, 'email', 'Verify Email', 'verify_email', '<h3>Dear $name</h3>\r\n\r\n<p>Please click on the link below to verify your email address.</p>\r\n', 'Verify Your Email', 1),
(5, 'alert', 'Profile Complete Alert', 'profile_completion', 'Thanks for registering with PFSC. Please fill in the profile information.', NULL, 1),
(6, 'alert', 'Registration Alert', 'registration', 'You are register successfully. And We’ve sent a verify email to your email address. If you don’t see the email, check your spam folder', NULL, 1),
(7, 'alert', 'Sent Verification Email Alert', 'verify_email', '', NULL, 1),
(8, 'alert', 'Email Verfication Alert', 'email_verification', 'Thanks for registering with PFSC. Please verify your email.', NULL, 1),
(9, 'email', 'Approved Sitter Email', 'approved_sitter', '<h3>Dear {$name}</h3>\r\n\r\n<p>Your Pet Sitter application has been Approved.</p>\r\n', 'Approved Sitter Email', 1),
(10, 'email', 'Declinced Sitter Email', 'declined_sitter', '<h3>Dear {$name}</h3>\r\n\r\n<p>Your Pet Sitter application has been Declinced.</p>\r\n', 'Declinced Sitter Email', 1),
(11, 'email', 'Referral Signup Email', 'invite_friend', '<h3>Referral Signup Invitation</h3>\r\n\r\n<p>$name send you a referral signup link</p>\r\n\r\n<p>Please click on the link below to referral signup.</p>\r\n', 'Referral Signup Invitation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` char(2) DEFAULT '',
  `name` varchar(128) DEFAULT '',
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `code`, `name`, `status`) VALUES
(1, 'AL', 'Alabama', 0),
(2, 'AK', 'Alaska', 0),
(3, 'AS', 'American Samoa', 0),
(4, 'AZ', 'Arizona', 0),
(5, 'AR', 'Arkansas', 0),
(6, 'CA', 'California', 1),
(7, 'CO', 'Colorado', 0),
(8, 'CT', 'Connecticut', 0),
(9, 'DE', 'Delaware', 0),
(10, 'DC', 'District of Columbia', 0),
(11, 'FM', 'Federated States of Micronesia', 0),
(12, 'FL', 'Florida', 0),
(13, 'GA', 'Georgia', 1),
(14, 'GU', 'Guam', 0),
(15, 'HI', 'Hawaii', 0),
(16, 'ID', 'Idaho', 0),
(17, 'IL', 'Illinois', 0),
(18, 'IN', 'Indiana', 0),
(19, 'IA', 'Iowa', 0),
(20, 'KS', 'Kansas', 0),
(21, 'KY', 'Kentucky', 0),
(22, 'LA', 'Louisiana', 0),
(23, 'ME', 'Maine', 0),
(24, 'MH', 'Marshall Islands', 0),
(25, 'MD', 'Maryland', 0),
(26, 'MA', 'Massachusetts', 0),
(27, 'MI', 'Michigan', 0),
(28, 'MN', 'Minnesota', 0),
(29, 'MS', 'Mississippi', 0),
(30, 'MO', 'Missouri', 0),
(31, 'MT', 'Montana', 0),
(32, 'NE', 'Nebraska', 0),
(33, 'NV', 'Nevada', 0),
(34, 'NH', 'New Hampshire', 0),
(35, 'NJ', 'New Jersey', 0),
(36, 'NM', 'New Mexico', 0),
(37, 'NY', 'New York', 1),
(38, 'NC', 'North Carolina', 0),
(39, 'ND', 'North Dakota', 0),
(40, 'MP', 'Northern Mariana Islands', 0),
(41, 'OH', 'Ohio', 0),
(42, 'OK', 'Oklahoma', 0),
(43, 'OR', 'Oregon', 0),
(44, 'PW', 'Palau', 0),
(45, 'PA', 'Pennsylvania', 0),
(46, 'PR', 'Puerto Rico', 0),
(47, 'RI', 'Rhode Island', 0),
(48, 'SC', 'South Carolina', 0),
(49, 'SD', 'South Dakota', 0),
(50, 'TN', 'Tennessee', 0),
(51, 'TX', 'Texas', 0),
(52, 'UT', 'Utah', 0),
(53, 'VT', 'Vermont', 0),
(54, 'VI', 'Virgin Islands', 0),
(55, 'VA', 'Virginia', 0),
(56, 'WA', 'Washington', 0),
(57, 'WV', 'West Virginia', 0),
(58, 'WI', 'Wisconsin', 0),
(59, 'WY', 'Wyoming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` int(11) NOT NULL,
  `type` enum('owner','sitter') DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `type`, `name`, `text`, `about`, `image`, `rating`) VALUES
(1, 'owner', 'Sujutha Maturo', 'I have been a client of Puppy Friends Social Club for more than 2 year now and Auntie Kyss has always insured my Dawson has had the best of care with or without her service is impeccable, and I am proud that Dawson was one the first official Puppy Friends Social Club Kids.', '', 'image_1580912680_8554.jpg', 5),
(2, 'owner', 'Lori R', 'My sweet fur baby, Ziggy, had the wonderful opportunity of staying with Kyss and her family for 5 days.  He came home exhausted!  Kyss sent me photos and videos of Ziggy playing and having fun with his new friends - he was having a blast!', '', 'image_1580915021_6898.jpg', 5),
(3, 'sitter', 'Kate C', 'PFSC platform is easy to use, and I am able to grow my business.', '', 'image_1580915187_8519.jpg', NULL),
(4, 'sitter', 'Sara M', 'Working for PFSC is a lot of fun and very appealing because you get to set your own rates and make your own schedule. It was very rewarding and I had good relationships with all of my clients as well as the veterinarian staff who is on call for when you have a pet that gets sick or injured.', '', 'image_1580915229_9678.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `trx_detail` longtext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `mem_id`, `booking_id`, `amount`, `note`, `charge_id`, `trx_detail`, `status`, `date`) VALUES
(1, 1, 1, 155, ' with Cos Player', 'ch_1HgrqxLdWQsiF0AL8Pw4GeFe', NULL, 1, '2020-10-27 18:04:44'),
(2, 2, 1, 147.25, NULL, NULL, NULL, 1, '2020-10-28 18:28:18'),
(3, 4, 3, 105, ' with First Player', 'ch_1HjPeeLdWQsiF0ALejUphGpu', NULL, 1, '2020-11-03 18:34:33'),
(4, 3, 3, 99.75, NULL, NULL, NULL, 0, '2020-11-03 19:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdrawal_detail`
--

CREATE TABLE `tbl_withdrawal_detail` (
  `withdraw_id` int(10) UNSIGNED DEFAULT NULL,
  `trx_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_withdrawal_detail`
--

INSERT INTO `tbl_withdrawal_detail` (`withdraw_id`, `trx_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraws`
--

CREATE TABLE `tbl_withdraws` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `paid_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_withdraws`
--

INSERT INTO `tbl_withdraws` (`id`, `mem_id`, `amount`, `note`, `payment_method_id`, `status`, `date`, `paid_date`) VALUES
(1, 2, 147.25, NULL, 2, 1, '2020-11-02 10:37:09', '2020-11-02 11:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_categories`
--
ALTER TABLE `tbl_blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking_extras`
--
ALTER TABLE `tbl_booking_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_characters`
--
ALTER TABLE `tbl_characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat_attachments`
--
ALTER TABLE `tbl_chat_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `tbl_chat_msgs`
--
ALTER TABLE `tbl_chat_msgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_founders`
--
ALTER TABLE `tbl_founders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `ref_type` (`ref_type`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_preferences`
--
ALTER TABLE `tbl_preferences`
  ADD PRIMARY KEY (`pref_id`);

--
-- Indexes for table `tbl_press`
--
ALTER TABLE `tbl_press`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocodes`
--
ALTER TABLE `tbl_promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ref_signups`
--
ALTER TABLE `tbl_ref_signups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `tbl_resources`
--
ALTER TABLE `tbl_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_sitecontent`
--
ALTER TABLE `tbl_sitecontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_texts`
--
ALTER TABLE `tbl_site_texts`
  ADD PRIMARY KEY (`txt_id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_withdraws`
--
ALTER TABLE `tbl_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_blog_categories`
--
ALTER TABLE `tbl_blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking_extras`
--
ALTER TABLE `tbl_booking_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_characters`
--
ALTER TABLE `tbl_characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chat_attachments`
--
ALTER TABLE `tbl_chat_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_chat_msgs`
--
ALTER TABLE `tbl_chat_msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tbl_founders`
--
ALTER TABLE `tbl_founders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_preferences`
--
ALTER TABLE `tbl_preferences`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_press`
--
ALTER TABLE `tbl_press`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_promocodes`
--
ALTER TABLE `tbl_promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ref_signups`
--
ALTER TABLE `tbl_ref_signups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_resources`
--
ALTER TABLE `tbl_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sitecontent`
--
ALTER TABLE `tbl_sitecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_site_texts`
--
ALTER TABLE `tbl_site_texts`
  MODIFY `txt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_withdraws`
--
ALTER TABLE `tbl_withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
