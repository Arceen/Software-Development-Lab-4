-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 06:00 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdlab4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `Email` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Email`, `UserName`, `Password`) VALUES
('admin@mbshop.com', 'AdminRajib', 'RajiblovesWebsites'),
('asda', 'asda', 'RajiblovesWebsites');

-- --------------------------------------------------------

--
-- Table structure for table `bannedlist`
--

DROP TABLE IF EXISTS `bannedlist`;
CREATE TABLE `bannedlist` (
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bannedlist`
--

INSERT INTO `bannedlist` (`Email`) VALUES
('ads@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `devicelist`
--

DROP TABLE IF EXISTS `devicelist`;
CREATE TABLE `devicelist` (
  `Brand` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `FrontCamera` varchar(100) DEFAULT NULL,
  `BackCamera` varchar(100) DEFAULT NULL,
  `Network` varchar(50) DEFAULT NULL,
  `Battery` varchar(50) DEFAULT NULL,
  `Memory` varchar(100) DEFAULT NULL,
  `Colors` varchar(100) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `ROM` varchar(50) DEFAULT NULL,
  `Processors` varchar(50) DEFAULT NULL,
  `Sensors` varchar(255) DEFAULT NULL,
  `Simslots` varchar(255) DEFAULT NULL,
  `Display` varchar(255) DEFAULT NULL,
  `OtherFeatures` varchar(255) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `ImageLocation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devicelist`
--

INSERT INTO `devicelist` (`Brand`, `Model`, `FrontCamera`, `BackCamera`, `Network`, `Battery`, `Memory`, `Colors`, `OS`, `RAM`, `ROM`, `Processors`, `Sensors`, `Simslots`, `Display`, `OtherFeatures`, `ReleaseDate`, `Description`, `Rating`, `Price`, `Stock`, `ImageLocation`) VALUES
('Apple', 'iPhone X', '(f/1.8, 28mm) / (f/2.4, 52mm), OIS', 'Dual 12 Megapixel', '2G, 3G, 4G', 'Lithium-ion 2716 mAh (non-removable)', 'No', 'Space Gray, Silver', 'iOS 11.1.1', '3 GB', '64/256 GB', 'Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)', 'Face ID, Accelerometer, Gyro, Proximity, Compass', 'Single SIM (Nano-SIM)', '5.8 inches, Super Retina HD 1125 x 2436 pixels', 'Bluetooth, GPS, MP3, MP4, GPRS, Edge', '2017-10-01', 'Apple has finally moved from IPS LCD display technology to super AMOLED which Samsung has been using successfully for years. Super AMOLED retina display is simply more awesome than any other display out there in 2017.', 5, 104990, 2, 'images/Phones/Apple_iPhone X.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobilelist`
--

DROP TABLE IF EXISTS `mobilelist`;
CREATE TABLE `mobilelist` (
  `Brand` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `FrontCamera` varchar(500) DEFAULT NULL,
  `BackCamera` varchar(500) DEFAULT NULL,
  `Network` varchar(500) DEFAULT NULL,
  `Battery` varchar(500) DEFAULT NULL,
  `Memory` varchar(500) DEFAULT NULL,
  `Colors` varchar(500) DEFAULT NULL,
  `OS` varchar(500) DEFAULT NULL,
  `RAM` varchar(500) DEFAULT NULL,
  `ROM` varchar(500) DEFAULT NULL,
  `Processors` varchar(500) DEFAULT NULL,
  `Sensors` varchar(500) DEFAULT NULL,
  `SimSlots` varchar(500) DEFAULT NULL,
  `Display` varchar(500) DEFAULT NULL,
  `OtherFeatures` varchar(2000) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Description` varchar(10000) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `ImageLocation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobilelist`
--

INSERT INTO `mobilelist` (`Brand`, `Model`, `FrontCamera`, `BackCamera`, `Network`, `Battery`, `Memory`, `Colors`, `OS`, `RAM`, `ROM`, `Processors`, `Sensors`, `SimSlots`, `Display`, `OtherFeatures`, `ReleaseDate`, `Description`, `Rating`, `Price`, `Stock`, `ImageLocation`) VALUES
('Apple', 'iPhone X', '(f/1.8, 28mm) / (f/2.4, 52mm), OIS', 'Dual 12 Megapixel', '2G, 3G, 4G', 'Lithium-ion 2716 mAh (non-removable)', 'No', 'Space Gray, Silver', 'iOS 11.1.1', '3 GB', '64/256 GB', 'Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)', 'Face ID, Accelerometer, Gyro, Proximity, Compass', 'Single SIM (Nano-SIM)', '5.8 inches, Super Retina HD 1125 x 2436 pixels', 'Bluetooth, GPS, MP3, MP4, GPRS, Edge', '2017-10-01', 'Apple has finally moved from IPS LCD display technology to super AMOLED which Samsung has been using successfully for years. If you do not understand the difference, Super AMOLED retina display is simply more awesome than any other display out there in 2017. Another discussable feature is the Face ID. Apple replaced fingerprint with face ID. This is arguably more secure than fingerprint but not as flexible.', 5, 104990, 2, 'images/Phones/Apple_iPhone X.jpg'),
('Samsung', 'Galaxy A6+', '24 Megapixel (F/1.9, LED flash)', '16 (f/1.7) +5 (f/1.9) Megapixel', '2G, 3G, 4G', 'Lithium-ion 3500 mAh (non-removable)', 'microSD, up to 512 GB (dedicated slot)', 'Black, Gold, Blue, Lavender', 'Android Oreo v8.0', '6 GB', '64 GB', 'Octa-core, 1.8 GHz', 'Accelerometer, Fingerprint, Gyro, Geomagnetic, Hal', '	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual', '6.0 inches, Full HD+ 1080 x 2220 pixels (411 ppi)', '- Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Ed', '2018-05-01', 'Samsung Galaxy A6+ is a special release from Samsung. It is a mid-high range phone mainly focused on camera, display, design and performance. The 16 + 5 MP dual primary camera with PDAF (phase detection autofocus) is a fine choice for mobile photography. For video calling and selfies, there is an excellent 24 MP front camera. The display is a 6 inch Full HD+ super AMOLED full-view display. There is a glass on the back side and the frames are made of metal. The outside is premium, environment-friendly and durable.', 4, 36900, 8, 'images/Phones/Samsung_Galaxy A6+.jpg'),
('Samsung', 'Galaxy S8+', '8 Megapixel ', '12 Megapixel', '2G, 3G, 4G', 'Lithium-ion 3500 mAh (non-removable)', 'microSD, up to 256 GB (uses SIM 2 slot)', 'Midnight Black, Gray, Silver, Blue,  Gold', 'Android Nougat v7.0', '4 GB', '64 GB', 'Octa-core (4 x 2.3 GHz & 4 x 1.7 GHz)', 'Iris scanner, fingerprint, accelerometer, gyro, pr', '	Dual SIM (Nano-SIM, dual stand-by)', '6.2 inches, qHD 1440 x 2960 pixels (529 ppi)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', '2017-04-01', 'Samsung Galaxy S8+ smartphone was launched in March 2017. The phone comes with a 6.20-inch touchscreen display with a resolution of 1440 pixels by 2960 pixels at a PPI of 529 pixels per inch. The Samsung Galaxy S8+ is powered by 1.9GHz octa-core processor and it comes with 4GB of RAM. The phone packs 64GB of internal storage that can be expanded up to 256GB. As far as the cameras are concerned, the Samsung Galaxy S8+ packs a 12-megapixel primary camera on the rear and a 8-megapixel front shooter for selfies.', 4, 89900, 4, 'images/Phones/Samsung_Galaxy S8+.jpg'),
('Symphony', 'V140', '5 Megapixel (f/2.4 aperture)', '5 Megapixel', '2G, 3G', 'Lithium-ion 2500 mAh', 'MicroSD, up to 32 GB', 'Black, Golden', 'Android Go', '1 GB', '8 GB', 'Quad-Core, 1.3 GHz', 'G-sensor, Proximity, Light', 'Dual SIM', '5.45 inches, FWVGA+ 950 x 480 pixels (197 ppi)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', '2018-05-01', 'Symphony is still a trusted brand and if you choose to buy one of the latest smartphones in this price range in mid-2018, Symphony V140 is still a fine choice. It comes with Android Go version which has built-in data saver for internet browsing, watching YouTube videos, etc. The phone will run much smoother and faster with the given RAM and CPU. But unfortunately, there is no 4G network support in this phone.', 4, 6290, 6, 'images/Phones/Symphony_V140.jpg'),
('Walton', 'Primo RX6', '16 Megapixel (Soft LED flash, BSI, face detection,', '13 Megapixel', '2G, 3G, 4G', 'Lithium-polymer 3000 mAh', 'MicroSD, up to 128 GB', 'Blue, Black', 'Android Oreo v8.0', '3 GB', '16 GB', 'Quad-core, 1.4 GHz', 'Fingerprint, Accelerometer (3D), Light, Proximity,', 'Dual SIM (Nano SIM, dual standby, 4G support in bo', '5.7 inches, HD+ 1440 x 720 pixels (26M colors)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', '2018-06-01', 'Walton Primo RX6 is an interesting release from Walton in 2018 which is capable of competing with other low-mid range smartphones from top brands. Now, because of the rising popularity of the Chinese brands in Bangladesh, the mobile phone market share of Walton has gone down significantly since 2017. It is continuing to decrease in 2018. But a release like Primo RX6 will keep the hope of Walton to make a stronger position in the market.', 5, 14999, 10, 'images/Phones/Walton_Primo RX6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phonelist`
--

DROP TABLE IF EXISTS `phonelist`;
CREATE TABLE `phonelist` (
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `FrontCamera` varchar(50) DEFAULT NULL,
  `BackCamera` varchar(50) DEFAULT NULL,
  `Network` varchar(50) DEFAULT NULL,
  `Battery` varchar(50) DEFAULT NULL,
  `Memory` varchar(50) DEFAULT NULL,
  `Colors` varchar(50) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `ROM` varchar(50) DEFAULT NULL,
  `Processors` varchar(50) DEFAULT NULL,
  `Sensors` varchar(50) DEFAULT NULL,
  `SimSlots` varchar(50) DEFAULT NULL,
  `Display` varchar(50) DEFAULT NULL,
  `OtherFeatures` varchar(50) DEFAULT NULL,
  `ReleaseDate` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `ImageLocation` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonelist`
--

INSERT INTO `phonelist` (`Brand`, `Model`, `FrontCamera`, `BackCamera`, `Network`, `Battery`, `Memory`, `Colors`, `OS`, `RAM`, `ROM`, `Processors`, `Sensors`, `SimSlots`, `Display`, `OtherFeatures`, `ReleaseDate`, `Description`, `Rating`, `Price`, `Stock`, `ImageLocation`) VALUES
('Apple', 'iPhone X', '(f/1.8, 28mm) / (f/2.4, 52mm), OIS', 'Dual 12 Megapixel', '2G, 3G, 4G', 'Lithium-ion 2716 mAh (non-removable)', 'No', 'Space Gray, Silver', 'iOS 11.1.1', '3 GB', '	64/256 GB', 'Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)', '	Face ID, accelerometer, gyro, proximity, compass,', 'Single SIM (Nano-SIM)', '	5.8 inches, Super Retina HD 1125 x 2436 pixels (4', 'Bluetooth, GPS, A-GPS, MP3, MP4, GPRS, Edge, Multi', 'October 2017', 'Apple has finally moved from IPS LCD display techn', 5, 104990, 2, 'images/Phones/Apple_iPhone X.jpg'),
('Samsung', 'Galaxy A6+', '24 Megapixel (F/1.9, LED flash)', '16 (f/1.7) +5 (f/1.9) Megapixel', '2G, 3G, 4G', 'Lithium-ion 3500 mAh (non-removable)', 'microSD, up to 512 GB (dedicated slot)', 'Black, Gold, Blue, Lavender', 'Android Oreo v8.0', '6 GB', '64 GB', 'Octa-core, 1.8 GHz', 'Accelerometer, Fingerprint, Gyro, Geomagnetic, Hal', '	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual', '6.0 inches, Full HD+ 1080 x 2220 pixels (411 ppi)', '- Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Ed', 'May 2018', 'Samsung Galaxy A6+ is a special release from Samsu', 4, 36900, 3, 'images/Phones/Samsung_Galaxy A6+.jpg'),
('Samsung', 'Galaxy S8+', '8 Megapixel ', '12 Megapixel', '2G, 3G, 4G', 'Lithium-ion 3500 mAh (non-removable)', 'microSD, up to 256 GB (uses SIM 2 slot)', 'Midnight Black, Gray, Silver, Blue,  Gold', 'Android Nougat v7.0', '4 GB', '64 GB', 'Octa-core (4 x 2.3 GHz & 4 x 1.7 GHz)', 'Iris scanner, fingerprint, accelerometer, gyro, pr', '	Dual SIM (Nano-SIM, dual stand-by)', '6.2 inches, qHD 1440 x 2960 pixels (529 ppi)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', 'April 2017', 'Samsung Galaxy S8+ smartphone was launched in Marc', 4, 89900, 4, 'images/Phones/Samsung_Galaxy S8+.jpg'),
('Symphony', 'V140', '5 Megapixel (f/2.4 aperture)', '5 Megapixel', '2G, 3G', 'Lithium-ion 2500 mAh', 'MicroSD, up to 32 GB', 'Black, Golden', 'Android Go', '1 GB', '8 GB', 'Quad-Core, 1.3 GHz', 'G-sensor, Proximity, Light', 'Dual SIM', '5.45 inches, FWVGA+ 950 x 480 pixels (197 ppi)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', 'May 2018', 'Symphony is still a trusted brand and if you choos', 4, 6290, 6, 'images/Phones/Symphony_V140.jpg'),
('Walton', 'Primo RX6', '16 Megapixel (Soft LED flash, BSI, face detection,', '13 Megapixel', '2G, 3G, 4G', 'Lithium-polymer 3000 mAh', 'MicroSD, up to 128 GB', 'Blue, Black', 'Android Oreo v8.0', '3 GB', '16 GB', 'Quad-core, 1.4 GHz', 'Fingerprint, Accelerometer (3D), Light, Proximity,', 'Dual SIM (Nano SIM, dual standby, 4G support in bo', '5.7 inches, HD+ 1440 x 720 pixels (26M colors)', 'Bluetooth, GPS, A-GPS, MP3, MP4, Radio, GPRS, Edge', 'June 2018', 'Walton Primo RX6 is an interesting release from Wa', 5, 14999, 10, 'images/Phones/Walton_Primo RX6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Cookie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `FirstName`, `LastName`, `Password`, `Cookie`) VALUES
('niloyman01@gmail.com', 'Niloy', 'Hasan', 'admin00', '69a93c551d557c44c51369fae3af242f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `bannedlist`
--
ALTER TABLE `bannedlist`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `devicelist`
--
ALTER TABLE `devicelist`
  ADD PRIMARY KEY (`Brand`,`Model`);

--
-- Indexes for table `phonelist`
--
ALTER TABLE `phonelist`
  ADD PRIMARY KEY (`Brand`,`Model`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
