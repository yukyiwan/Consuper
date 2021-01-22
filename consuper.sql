-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 04:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consuper`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Electronics'),
(2, 'Furniture'),
(3, 'Groceries');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `fName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `fName`, `lName`, `email`, `message`, `timeStamp`) VALUES
(1, 'Dee', 'Shah', 'dee@shah.com', 'Hi', '2020-12-05 12:30:42'),
(2, 'Dee', 'Shah', 'dee@shah.com', 'Hi', '2020-12-05 12:31:24'),
(3, 'testing', 'testing', 'testing@testing.com', 'testing', '2020-12-21 01:14:01'),
(4, 'Wasim', 'S', 'wasim@wasim.com', 'I have not received my order', '2020-12-21 03:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `cCName` text NOT NULL,
  `cCNum` text NOT NULL,
  `expMM` int(11) NOT NULL,
  `expYY` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `paidTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `address`, `phone`, `cCName`, `cCNum`, `expMM`, `expYY`, `paid`, `paidTime`) VALUES
(1, 'Suite 2628, Sheridan Trafalgar Residence 2, 1400 Trafalgar Rd, Oakville, ON L6H 6W4', '9058154150', 'Neil Armstrong', '123412341234123', 12, 2020, 1, '2020-12-21 01:08:22'),
(2, '10, Liberty Road, NYC', '98774860', 'WYYC', '9876489509523424', 1, 2028, 1, '2020-12-21 03:41:36'),
(3, '1 Peak Road, Hong Kong', '911', 'KK Leung', '1231231231231232123', 12, 2023, 1, '2020-12-21 01:34:18'),
(4, '', '', '', '', 0, 0, 0, '2020-12-21 01:34:18'),
(5, '', '', '', '', 0, 0, 0, '2020-12-21 03:41:36'),
(6, '1410 Trafalgar Road, Oakville', '9058154720', 'Wasim S', '34269864931698365', 3, 2035, 1, '2020-12-21 03:51:51'),
(7, '', '', '', '', 0, 0, 0, '2020-12-21 03:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `order-person`
--

CREATE TABLE `order-person` (
  `orderId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order-person`
--

INSERT INTO `order-person` (`orderId`, `personId`, `productId`, `quantity`) VALUES
(1, 1, 0, 2),
(1, 1, 18, 4),
(1, 1, 16, 2),
(1, 1, 17, 1),
(1, 1, 2, 1),
(1, 1, 1, 2),
(2, 1, 0, 0),
(3, 2, 0, 0),
(3, 2, 18, 1),
(3, 2, 2, 2),
(3, 2, 16, 1),
(3, 2, 3, 2),
(3, 2, 4, 1),
(3, 2, 5, 1),
(3, 2, 7, 1),
(4, 2, 0, 0),
(2, 1, 18, 4),
(2, 1, 16, 2),
(2, 1, 3, 2),
(2, 1, 17, 1),
(2, 1, 13, 1),
(2, 1, 14, 1),
(2, 1, 6, 1),
(2, 1, 8, 1),
(5, 1, 0, 0),
(5, 1, 1, 0),
(5, 1, 2, 0),
(5, 1, 16, 0),
(5, 1, 18, 0),
(6, 3, 0, 0),
(6, 3, 2, 1),
(6, 3, 18, 1),
(6, 3, 16, 1),
(7, 3, 0, 0),
(5, 1, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personId` int(11) NOT NULL,
  `fName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `timeStamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personId`, `fName`, `lName`, `email`, `password`, `userId`, `timeStamp`) VALUES
(1, 'Neil', 'Armstrong', 'narm@imm.com', '123', 1, '2020-12-20 08:21:47'),
(2, 'kk', 'leung', 'kk@leung.com', '123', 2, '2020-12-21 02:32:38'),
(3, 'wasim', 'wasim', 'wasim@wasim.com', '123', 2, '2020-12-21 04:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `person-product`
--

CREATE TABLE `person-product` (
  `personId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person-product`
--

INSERT INTO `person-product` (`personId`, `productId`, `like`, `review`) VALUES
(1, 17, 1, ''),
(1, 18, 1, ''),
(1, 8, 1, ''),
(2, 18, 1, ''),
(1, 2, 1, ''),
(1, 16, 1, ''),
(1, 1, 1, ''),
(3, 18, 1, ''),
(3, 16, 1, ''),
(3, 2, 1, ''),
(3, 8, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `pBrand` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `pName` text COLLATE utf8_unicode_ci NOT NULL,
  `pModel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pCapacity` text COLLATE utf8_unicode_ci NOT NULL,
  `pColor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cPrice1` int(11) NOT NULL,
  `cPrice2` int(11) NOT NULL,
  `cPrice3` int(11) NOT NULL,
  `cPrice4` int(11) NOT NULL,
  `cPriceT` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `preview` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured1` tinyint(1) NOT NULL,
  `featured2` tinyint(1) NOT NULL,
  `featured3` tinyint(1) NOT NULL,
  `iFileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `categoryId`, `subCategoryId`, `pBrand`, `pName`, `pModel`, `pCapacity`, `pColor`, `price`, `cPrice1`, `cPrice2`, `cPrice3`, `cPrice4`, `cPriceT`, `likes`, `preview`, `description`, `featured1`, `featured2`, `featured3`, `iFileName`, `timeStamp`) VALUES
(1, 1, 1, 'Samsung', 'Galaxy Z Flip Flip', 'SM-F700F/DS', 'Dual-SIM 256GB', 'Mirror Black', 1500, 100, 58, 66, 40, 264, 1, 'The dual battery made for a full day\r\nStunning device, equally stunning colours\r\nGalaxy Z Premier Service', 'Meet Galaxy Z Flip\r\nThe full screen phone that folds to fit in your pocket with revolutionary flexible glass, a camera made to stand on its own, and a dual battery that lasts all day. Meet the phone changing the shape of the future.\r\n\r\nThe Galaxy Z Flip\'s dual 12 MP cameras take fantastic, high-quality photos - even in low-light. While the 10 MP front camera is great for stunning selfies and video calling your mates.\r\n\r\nShaky hands won\'t ruin the photo. And you don\'t even need a tripod. The Free Stop Hinge design means you can sit the Galaxy Z Flip on a flat surface and angle it for the perfect shot.\r\n\r\nNetwork Compatibility\r\nSIM CARD 1:\r\n2G GSM 850 / 900 / 1800 / 1900 and/or\r\n3G UTMS 850(B5) / 900(B8) / 1700|2100(B4) / 1900(B2) / 2100(B1) and/or\r\n4G LTE : 700(B12) / 700(B13) / 700(B17) / 700(B28) / 800(B18) / 800(B19) / 800(B20) / 850(B5) / 850(B26) / 900(B8) / 1700|2100(B4) / 1700|2100 (B66) / 1800(B3) / 1900(B2) / 1900(B25) / 2100(B1) / 2600(B7) : TD-LTE 1900(B39) / 2300(B40) / 2500(B41) / 2600(B38) and\r\nSIM CARD 2:\r\n2G GSM 850 / 900 / 1800 / 1900\r\n\r\nIn the Box\r\nSamsung Galaxy Z Flip, USB Type-C cable, Earphones, plug, Tray pin, Quick start guide', 0, 0, 0, 'mobile3.jpg', '2020-12-21 03:55:25'),
(2, 1, 1, 'Samsung', 'Galaxy Z Flip', 'SM-F707WZNAXAC', 'Octa-Core 2.9GHz, 2.4GHz, 1.7GHz | 256GB ', 'Mystic Bronze', 1200, 150, 80, 66, 40, 336, 2, 'Galaxy Z Flip 5G is an expansive experience with a revolutionary folding glass display', 'Meet the Samsung Galaxy Z Flip 5G. It’s made with ultra-thin glass, letting you bend the rules of photos, video calls and so much more. With this innovative design you can go from small to big screen and any shape in between because the Hideaway Hinge lets you lock your phone in place for the ideal hands-free experience. Experience speed with an improved processor so you can easily shoot videos, make edits and with 5G capabilities post on social media in a flash. Do it all and more with a big display that transforms to fit your hand, pocket and lifestyle. The future changes shape.', 0, 1, 0, 'mobile1.jpg', '2020-12-21 03:50:01'),
(3, 1, 1, 'Apple', 'iPhone 11 Pro', 'B07ZQPYXJP', '256 GB', 'Midnight Green', 2000, 100, 50, 200, 150, 500, 0, 'A transformative triple‑camera system that adds tons of capability without complexity. An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.', 'As part of our efforts to reach our environmental goals, iPhone 11 does not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.\r\n\r\nWe encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones which are compatible with this iPhone. But if you need any new Apple power adapters or headphones, they are available for purchase.', 0, 0, 0, 'mobile2.jpg', '2020-12-20 19:42:00'),
(4, 1, 2, 'Apple', 'Mac Book', 'A07ZQPYXJP', 'Apple M1 Chip with 8‑Core CPU and 7‑Core GPU 256 GB Storage', 'Silver', 3000, 100, 20, 200, 40, 360, 0, 'Apple M1 Chip with 8‑Core CPU and 7‑Core GPU\r\n256 GB Storage', 'Apple M1 chip with 8‑core CPU, 7‑core GPU, and 16‑core Neural Engine\r\n8GB unified memory\r\n256GB SSD storage¹\r\nRetina display with True Tone\r\nMagic Keyboard\r\nTouch ID\r\nForce Touch trackpad\r\nTwo Thunderbolt / USB 4 ports', 0, 0, 0, 'laptop1.jpg', '2020-12-20 19:47:43'),
(5, 1, 2, 'Dell', 'XPS 13 Laptop', 'SM-F700F/DS', 'i3-10110U Processor | 256GB', 'Platinum Silver with Black car', 3333, 100, 50, 200, 40, 390, 0, 'With Windows 10 Home – get the best combination of Windows features you know and new improvements you’ll love.', 'The best, perfected\r\nImproved camera location: We pushed innovation to its limits to create the most innovative HD webcam that’s housed in the top of the famed InfinityEdge display—now front and center.\r\n\r\nRevolutionary webcam construction: The new XPS 13 webcam isn\'t just smaller (only 2.25mm)—it\'s also better. A new 4-element lens uses more elements than a typical webcam to deliver sharp video in all areas of the frame, while temporal noise reduction uses advanced noise reduction, significantly improving video quality, especially in dim lighting conditions. Finally, the lens is assembled with precise machinery to ensure all points of the image are in focus.', 0, 0, 0, 'laptop3.jpg', '2020-12-20 19:56:01'),
(6, 1, 2, 'Microsoft', 'Surface', 'SS-GX3-3T-SL', 'Intel Core i7, 16GB, 512GB', 'Platinum', 3238, 10, 5, 66, 200, 281, 0, 'Ultra-light and versatile. At your desk, on the couch, or in the yard, get more done your way with Surface Pro 7, featuring a laptop-class Intel® Core™ processor, all-day battery,¹ and HD cameras.', 'This bundle includes Surface Pro 7, Type Cover in the color of your choice, Microsoft 365 and Microsoft Complete Protection Plan.\r\nChoose your Surface Pro 7 (Required)Choose your Type Cover (Required)Add Microsoft 365 (Required)—Get 15 months of Microsoft 365 for the price of 12Choose your protection plan (Required)Choose additional accessories (Optional)Choose your sleeve (Optional)', 0, 0, 0, 'laptop2.jpg', '2020-12-20 20:00:40'),
(7, 1, 3, 'Samsung', 'Galaxy Tap 3', 'SS-GX3-3T-SL', 'Intel Core i7, 16GB, 512GB', 'Silver', 1500, 50, 100, 220, 100, 470, 0, 'Galaxy Tab A7 is built to impress—a true head-turner that offers great immersive experiences. With beautiful symmetry and a thickness of just 7mm, it features a sophisticated metal design in three colours, Dark Gray, Silver, and Gold, and a symmetric bezel all the way around.', 'With a slim design, a vibrant entertainment system, and outstanding performance, the new Galaxy Tab A7 is a stylish new companion for your life. Dive head-first into the things you love, and easily share your favourite moments. Learn, explore, connect and be inspired.', 0, 0, 0, 'tablet2.jpg', '2020-12-20 20:10:20'),
(8, 1, 3, 'Apple', 'iPad', 'SM-T500NZAAXAC', 'i5, 16GB, 256GB', 'Black', 2599, 77, 564, 45, 65, 751, 2, 'With Apple Trade In, just give us your eligible iPad and get credit for a new one. It’s good for you and the planet.*', 'With A14 Bionic, you have the power to bring your ideas to life. Shoot a 4K video, then edit it right on iPad Air. Use the second‑generation Apple Pencil to paint and illustrate with dynamic brushes and subtle shading.1 And with the enhanced graphics and machine learning performance of A14 Bionic, you can unlock new creative possibilities with photo editing, music creation, and more.', 0, 0, 0, 'tablet1.jpg', '2020-12-21 03:50:41'),
(9, 1, 3, 'Amazon', 'Fire 7 Tablet', 'AM-FR3-3T-SX', '7\" display, 16 GB', 'Yellow', 100, 10, 50, 66, 150, 276, 0, 'Engineered and tested by Amazon, Fire 7 now has 2X the storage, a faster quad-core processor, and is 2X as durable as the latest iPad mini. Complete tasks, enjoy movies on the go, and browse recipes—making your every day easier.', '7\" IPS display; 16 or 32 GB of internal storage (add up to 512 GB with microSD)\r\nFaster 1.3 GHz quad-core processor\r\nUp to 7 hours of reading, browsing the web, watching video, and listening to music\r\n1 GB of RAM\r\n2 MP front and rear-facing cameras with 720p HD video recording\r\nDual-band Wi-Fi\r\n1-year limited warranty\r\nEnjoy millions of Kindle eBooks, movies, TV episodes, songs, apps, and games', 0, 0, 0, 'tablet3.jpg', '2020-12-20 20:16:43'),
(10, 1, 4, 'Samsung', 'Smart TV N5200 Series 5', 'SS-FHD3-3T-SX', '40\" FHD', 'Black', 3999, 1000, 588, 455, 150, 2193, 0, 'Experience your favourite TV programs and movies with rich and vivid full HD picture quality.', 'Full HD picture quality\r\nExperience your favourite TV programs and movies with rich and vivid full HD picture quality.\r\n\r\nFull HD picture quality\r\n* As compared to a Samsung SD TV and HD TV. Dramatization for illustrative purposes only. Visit an authorized retailer for a true-to-life comparison.\r\n\r\nWide colour enhancer\r\nBright, rich colours await. Wide Colour Enhancer improves your image quality and uncovers details with colours as they were meant to be seen.\r\n\r\nWide colour enhancer\r\nConnect\r\nWatch videos, play music, view photos by simply connecting a USB device.\r\n\r\n*Supported media formats include AVI, ASF, MP3, JPEG and others. See manual for full list of formats supported.\r\n\r\n Connect share movie\r\nSpecifications\r\nSeries\r\n5\r\n \r\nResolution\r\n1,920 x 1,080\r\n \r\nConnectivity\r\n2\r\n \r\nUSB\r\n1', 0, 0, 0, 'TV1.jpg', '2020-12-20 20:19:32'),
(11, 1, 4, 'LG', 'Smart LED TV', 'LG 49UN7300', '49\" 4K UHD', 'Silver', 4999, 150, 580, 220, 150, 1100, 0, 'Real 4K Display\r\nwebOS 5.0 & ThinQ AI w/ Magic Remote\r\nLG Channels, Netflix, Apple TV+, Disney+, Amazon Prime Video\r\nActive HDR, Filmmaker Mode, Bluetooth Sound Ready\r\nAmazon Alexa & Google Assistant Built-in, Apple Airplay2 / Homekit\r\n Report inco', 'Empower entertainment with LG UHD TV LG’s UN7300 HDTV maximizes your entertainment and Real 4K displays push your picture performance. LG UHD TV’s processor enhances colour, contrast, clarity and detail, while AI enhances sound and gives control over your connected home. webOS 5.0 & ThinQ AI w/ Magic Remote LG’s unique webOS platform makes it surprisingly fast and easy to stream movies and shows with your favourite apps and find new obsessions based on what you like. While our Bluetooth Magic Remote lives up to its name with voice and motion control — just speak or simply point, scroll and click. LG Channels, Netflix, Apple TV+, Disney+, Prime Video There’s no stopping your entertainment. LG’s smart webOS features the latest streaming apps like Disney+, Prime Video and the Apple TV app, and favourites like Netflix and LG Channels. It’s simple to find top shows, up-and-comers and get personalized content recommendations. And access it all with ease using the LG Magic Remote. Active HDR, Filmmaker Mode, Bluetooth Sound Ready Automatically elevate the beauty of your favourite scenes. Active HDR supports a wide range of formats for scene-by-scene picture adjustment, including HDR10 and HLG. Amazon Alexa & Google Assistant Built-in, Apple Airplay2 / HomeKit Amazon Alexa & Google Assistant are as close as your TV. No need for an extra device. Just ask your TV for music, weather, news, or conveniently control your connected home and smart devices. You can also cast entertainment from Apple devices to your TV using Airplay 2, including Apple’s vast library of Dolby Vision content. Just use your Apple devices to configure, customize and control your smart home by using HomeKit.', 0, 0, 0, 'TV2.jpg', '2020-12-20 20:39:54'),
(12, 1, 4, 'Sony', 'Smart Android TV', 'KD65X750H', '65-inch 4K HDR', 'Sliver', 9999, 888, 123, 432, 325, 1768, 0, 'Experience thrilling movies and games in incredible 4K HDR and clear sound. Everything you watch looks remarkably rich and natural, enhanced by the 4K Processor X1. With Sony’s Android TV and Google Assistant, quickly access entertainment, control smart devices, get answers on screen, and more using your voice.', 'Upscale everything with the 4K Processor X1 and 4K X-Reality PRO\r\nSee exactly what the creator intended with the advanced colour and gradation of Triluminous Display\r\nDazzling detail and colour with High Dynamic Range (HDR)\r\nWith easy access to all your favourite content, services and devices, our smart Android TVs make life simpler\r\nContent appears with lifelike motion with Motionflow XR technology', 0, 0, 0, 'TV3.jpg', '2020-12-20 20:47:28'),
(13, 2, 6, 'IKEA', 'Bed', 'SLATTUM', 'Queen', 'White', 299, 40, 50, 66, 6, 162, 0, 'Upholstered bed frame, Knisa light grayQueen', 'Upholstered in soft woven fabric that brings a cozy feeling into your bedroom. The headboard is a comfy backrest for late night reading. And what’s more, it all comes in 1 package. Convenient, right?', 0, 0, 0, 'bedroom1.jpg', '2020-12-20 20:51:40'),
(14, 2, 6, 'IKEA', 'MALM', 'IK-BED-35', 'High bed frame/2 storage boxes, black-brown/LuröyQueen', 'Black', 499, 56, 6, 15, 3, 80, 0, 'High bed frame/2 storage boxes, black-brown/LuröyQueen', 'A clean design with solid wood veneer. Place the bed freestanding or with the headboard against a wall. You also get spacious storage boxes that roll out smoothly on castors.', 0, 0, 0, 'bedroom2.jpg', '2020-12-20 21:00:46'),
(15, 2, 6, 'IKEA', 'Bed', 'IK-BED-37', 'Bed frame with 2 storage boxes, brown/LuröyQueen', 'Brown', 1199, 40, 20, 3, 6, 69, 0, 'Bed frame with 2 storage boxes, brown/LuröyQueen\r\n', 'A sturdy bed frame with soft, profile edges and high legs. A classic shape that will last for many years. Also, there are spacious storage boxes under the bed where you can store bedding or clothes.', 0, 0, 0, 'bedroom3.jpg', '2020-12-20 21:03:26'),
(16, 2, 5, 'IKEA', 'KIVIK', 'IK-SOFA-11', 'Sofa, with chaise/Hillared anthracite', 'Yellow', 1399, 40, 50, 3, 6, 99, 2, 'Cuddle up in the soft comfort of KIVIK sofa.', 'The generous size, low armrests, and memory foam that adapts to the contours of your body invites many hours of naps, socializing, and relaxation.', 0, 0, 1, 'sittingroom1.jpg', '2020-12-21 03:49:51'),
(17, 2, 5, 'IKEA', 'Sofa', 'IK-SOFA-15', 'Loveseat, Inseros Brown', 'Brown', 799, 40, 8, 200, 150, 398, 1, 'Latest release of famous designer at IKEA', 'Cozy evenings, lazy days and nice socializing with family and friends – occasions when the super-comfy and deep HÄRLANDA sofa is perfect. You sink softly down and enjoy an embracing feeling in this sofa.', 0, 0, 0, 'sittingroom2.jpg', '2020-12-20 21:15:41'),
(18, 2, 5, 'IKEA', 'EKEDALEN', 'IK-TB-3333', 'Extendable table, dark brown70 7/8/94 1/2x35 3/8 \" (180/240x90 cm)', 'Dark Brown', 599, 15, 15, 50, 5, 85, 3, 'A durable dining table that makes it easy to have big dinners. A single person can extend the table and there’s plenty of room for chairs since the legs are always located at the corners of the table.', '“For me, the dining area is the given center of the home. My idea with EKEDALEN series was to make a dining set for everything from large dinners to doing homework and crafts. The table is easy to extend, and since the legs follow the table when it’s extended, guests won’t have table legs in the way. The chairs are comfortable and the covers are machine-washable. And you can squeeze together on the bench to make room for everyone. Flexible and functional for modern homes.”\r\nDesigner: Ehlén Johansson', 1, 0, 0, 'sittingroom3.jpg', '2020-12-21 03:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subCategoryId` int(11) NOT NULL,
  `subCategoryName` varchar(30) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCatId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCategoryId`, `subCategoryName`, `categoryId`, `subCatId`) VALUES
(1, 'Mobile phones', 1, 1),
(2, 'Laptops', 1, 2),
(3, 'Tablets', 1, 3),
(4, 'TV sets', 1, 4),
(5, 'Sitting room', 2, 1),
(6, 'Bedroom', 2, 2),
(7, 'Coming soon', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`) VALUES
(1, 'Administrator'),
(2, 'Customers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
