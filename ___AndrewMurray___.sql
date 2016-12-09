-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2013 at 03:52 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andrewmurray`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `CustomerEmail` varchar(255) NOT NULL,
  `ProductCode` varchar(255) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`CustomerEmail`, `ProductCode`, `Quantity`) VALUES
('admin@yes.com', 'LAP2520', 2),
('admin@yes.com', 'LAP3402', 3),
('admin@yes.com', 'LAP2520', 4),
('admin@yes.com', 'LAP3402', 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `EmailAddress` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ConfirmPassword` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `HomePrefix` varchar(255) NOT NULL,
  `HomeInfix` varchar(255) NOT NULL,
  `HomeSuffix` varchar(255) NOT NULL,
  `WorkPrefix` varchar(255) NOT NULL,
  `WorkInfix` varchar(255) NOT NULL,
  `WorkSuffix` varchar(255) NOT NULL,
  `AddressLine1` varchar(255) NOT NULL,
  `AddressLine2` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL,
  `CreditCardType` varchar(255) NOT NULL,
  `CardNumber` varchar(255) NOT NULL,
  `ExpiryDateMonth` varchar(255) NOT NULL,
  `ExpiryDateYear` varchar(255) NOT NULL,
  `CardholderName` varchar(255) NOT NULL,
  `LanguagePreference` varchar(255) NOT NULL,
  `EmailNotifications` varchar(255) NOT NULL,
  PRIMARY KEY (`EmailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`EmailAddress`, `Password`, `ConfirmPassword`, `Title`, `FirstName`, `LastName`, `HomePrefix`, `HomeInfix`, `HomeSuffix`, `WorkPrefix`, `WorkInfix`, `WorkSuffix`, `AddressLine1`, `AddressLine2`, `Province`, `CreditCardType`, `CardNumber`, `ExpiryDateMonth`, `ExpiryDateYear`, `CardholderName`, `LanguagePreference`, `EmailNotifications`) VALUES
('admin@yes.com', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964', 'Mr', 'Admin', 'istration', '506', '455', '9510', '506', '261', '5207', '123 Sutton Street', '321 Baxter Street', 'newbrunswick', 'visa', '9876543210', 'december', '2013', 'James Murray', 'english', 'yes'),
('joe.marriott@nbcc.ca', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964', 'Mr', 'Joe', 'Marriott', '506', '605', '5566', '506', '305', '6655', '246 Even Street', '135 Odd Street', 'alberta', 'amex', '6810127911', 'january', '2017', 'Andrew Murray', 'francais', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pagedetails`
--

CREATE TABLE IF NOT EXISTS `pagedetails` (
  `PageID` int(3) NOT NULL,
  `Department` text NOT NULL,
  `Category` text NOT NULL,
  `Meta` varchar(255) NOT NULL,
  PRIMARY KEY (`PageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagedetails`
--

INSERT INTO `pagedetails` (`PageID`, `Department`, `Category`, `Meta`) VALUES
(100, 'Personal Gadgets', 'Laptop Computers', 'Shop around for trusty laptop computers on this page!'),
(101, 'Personal Gadgets', 'Tablet Computers', 'Shop around for trusty tablet computers on this page!'),
(102, 'Personal Gadgets', 'Smartphones', 'Shop around for trusty smartphones on this page!'),
(200, 'Personal Entertainment', 'Soundtracks', 'Shop around for trusty soundtracks on this page!'),
(201, 'Personal Entertainment', 'DVDs', 'Shop around for trusty DVDs on this page!'),
(202, 'Personal Entertainment', 'Blu-ray Discs', 'Shop around for trusty Blu-ray Discs on this page!'),
(300, 'Personal Accessories', 'Adapters', 'Shop around for trusty adapters on this page!'),
(301, 'Personal Accessories', 'Headphones', 'Shop around for trusty headphones on this page!'),
(302, 'Personal Accessories', 'Cables', 'Shop around for trusty cables on this page!');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductCode` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDescription` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `ThumbnailHeightSize` int(3) NOT NULL,
  `RegularPrice` double NOT NULL,
  `SalePrice` double NOT NULL,
  `SaleDates` varchar(255) NOT NULL,
  `Option1` varchar(255) NOT NULL,
  `Option2` varchar(255) NOT NULL,
  `Option3` varchar(255) NOT NULL,
  `Option4` varchar(255) NOT NULL,
  `NumberInStock` int(2) NOT NULL,
  PRIMARY KEY (`ProductCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductCode`, `ProductName`, `ProductDescription`, `Category`, `Department`, `ThumbnailHeightSize`, `RegularPrice`, `SalePrice`, `SaleDates`, `Option1`, `Option2`, `Option3`, `Option4`, `NumberInStock`) VALUES
('ADA1231', 'Ipad 1,2 & 3 Compact 1 x USB & SD Card Adapter', 'The USB port on adapter supports External HDD, Flash Drives, External Audio cards, USB Micophones, USB Cameras, SD Cards & Powered USB Hubs.', 'Adapters', 'Personal Accessories', 75, 99, 86.84, 'December 22, 2012 - January 22, 2013', 'Use to connect your USB device or SD card to your iPad', 'Available in 2 colors', 'Compatible with iPad, iPad 2, and the new iPad!', '', 1),
('ADA4104', '4 Port Power Adapter / 10W USB Charger', 'This replacement 4 port USB 220-240V wall socket charger / power adapter supplies 10 Watt (5V,1A) power to function as a replacement or additional charger for your cellphone, camera etc.', 'Adapters', 'Personal Accessories', 70, 139, 121.93, 'December 12, 2012 - January 12, 2012', 'Use to charge your USB devices', 'Available in 2 colors', '', '', 1),
('ADA9090', '90 degree Aerial Coax RF Right Angle Port Saver Male Connector', 'This protects your RF port on your TV when mounted against the wall.', 'Adapters', 'Personal Accessories', 100, 3.9, 3.42, 'November 30, 2012 - December 30, 2012', 'Easy protection for your Radio Frequency port on your television', 'Available in 2 colors', '', '', 1),
('BLU0504', 'The Avengers Blu-ray 3D Combo Pack', 'Disney’s Blu-ray four disc set presents the film in 3D, regular Blu-ray, DVD, and Digital copy, and also comes with a downloadable version of the soundtrack.', 'Blu-ray Discs', 'Personal Entertainment', 126, 39.99, 0, '', 'Also available in standard 2D format', 'Also available in DVD packaging', '', '', 50),
('BLU0703', 'The Amazing Spider-Man Blu-ray 3D Combo Pack', 'This 3D release contains a couple of exclusive extras not found on the 2D disc, including a short featurette in which director Marc Webb talks about how filming in 3D works.', 'Blu-ray Discs', 'Personal Entertainment', 128, 29.99, 0, '', 'Also available in standard 2D format', 'Also available in DVD packaging', '', '', 20),
('BLU0720', 'The Dark Knight Rises Blu-ray Combo Pack', 'The Dark Knight Rises” is the epic conclusion to filmmaker Christopher Nolan’s Dark Knight trilogy.', 'Blu-ray Discs', 'Personal Entertainment', 126, 34.99, 0, '', 'Also available in special 3D format', 'Also available in DVD packaging', 'Also available as a collector''s edition with bonus special mask', 'Also available in steelbook packaging', 40),
('CAB1881', '1.8 Meter Lightning Data / Sync & Charging Cable for Apple iPhone 5, iPad mini, Ipad 4 & iPod Touch 5', 'This USB 2.0 cable connects your iPhone, iPad, or iPod with Lightning connector to your computer''s USB port for syncing and charging or to the Apple USB Power Adapter for convenient charging from a wall outlet.', 'Cables', 'Personal Accessories', 75, 199, 174.56, 'November 29, 2012 - December 29, 2012', 'Compatible with iOS devices such as iPhone, iPad, or iPod', 'Available in 2 colors', '', '', 1),
('CAB4884', '2 Meter Micro USB to HDMI Display cable (MHL) for Samsung Galaxy S2, HTC, Nokia and other MHL Smartphones', 'This cable does not support the Samsung Galaxy S3 due to different pin layouts on the S3. Please see the other MHL cables we stock that are compatible with the Samsung Galaxy S3 Smartphone.', 'Cables', 'Personal Accessories', 117, 269, 235.96, 'November 28, 2012 - December 28, 2012', 'Compatible with all MHL devices such as Samsung, HTC, and Nokia', 'Available in 3 colors', '', '', 1),
('CAB9030', 'Lightning Adapter cable for Apple Devices', 'The Lightning to 30-pin Adapter Cable enables you connect your Apple Lightning-connector-equipped device to many of your 30-pin accessories.', 'Cables', 'Personal Accessories', 75, 199, 174.56, 'November 29, 2012 - December 29, 2012', 'Compatible with all iOS devices', 'Available in 2 colors', '', '', 1),
('DVD0305', 'Alice in Wonderland Single-disc Widescreen DVD Edition', 'Disney’s 4th biggest film of all time takes its booming box-office success into the home with a 1-Disc Widescreen DVD from Walt Disney Studios Home Entertainment.', 'DVDs', 'Personal Entertainment', 129, 19.99, 14.99, 'December 22, 2012 - January 22, 2013', 'This DVD is also available as a single disc Fullscreen Edition', 'This DVD is also available as a Two-Disc Widescreen Edition', '', '', 10),
('DVD1119', 'Harry Potter and the Deathly Hallows Part 1 Single-Disc Widescreen DVD Edition', 'The seventh installment in the eight-film series marks the beginning of the end of Harry Potter’s journey from neglected child to being “The Chosen One”.', 'DVDs', 'Personal Entertainment', 144, 29.99, 24.99, 'December 22, 2012 - January 22, 2013', 'This DVD is also available as a single-disc Fullscreen DVD Edition', 'This DVD is also available as a Two-Disc Widescreen DVD Edition', '', '', 30),
('DVD1218', 'Avatar Single-Disc Widescreen DVD Edition', 'The highest grossing film of all time, about an ex-marine who is thrust into an adventure on an alien moon, will light up your screen.', 'DVDs', 'Personal Entertainment', 141, 24.99, 19.99, 'December 22, 2012 - January 22, 2013', 'This DVD is also available as a single-disc Fullscreen DVD Edition.', 'This DVD is also available as a Two-Disc Widescreen DVD Edition', 'This DVD is also available in special Blu-ray packaging', '', 60),
('LAP2520', 'Samsung RC520 Laptop - 6GB RAM/750GB HDD', 'If you are the sort of user who wishes to have a high-performance laptop, you can definitely make do with the Samsung RC520.', 'Laptop Computers', 'Personal Gadgets', 100, 592.49, 566.67, 'December 15, 2012 - January 15, 2012', 'A variation of this laptop, which contains 4GB RAM and 500GB HDD, is also available.', 'Available in 5 colors', '', '', 5),
('LAP3402', 'HP 4320t Mobile Thin Client', 'The HP 4320t Mobile Thin Client is aimed at the user who regularly accesses servers and other remote storage solutions, and therefore requires a thin, light and reliable notebook where onboard storage is not a concern.', 'Laptop Computers', 'Personal Gadgets', 85, 599.99, 0, '', 'A variation of this laptop, which contains 8GB RAM and 1TB HDD, is also available.', 'Available in 5 colors', '', '', 10),
('LAP5305', 'Dell Vostro 3550 with Core i5 2.30 GHz processor', 'With a 2.30 GHz Intel 2nd Generation Core i5 2410M dual-core processor and 4 GB DDR3 RAM, this laptop is ready to serve your business needs.', 'Laptop Computers', 'Personal Gadgets', 72, 449.99, 0, '', 'A variation of this laptop which features 8 GB DDR3 RAM, and Core i3 2.10GHz processor, is also available', 'Also available in two colors', '', '', 55),
('LAP7117', 'Dell XPS 17 Laptop', 'Fully loaded, this laptop comes with an Intel I7 processor with Sandy Bridge technology, a blu-ray player, and an NVIDIA 3D-capable video card/screen.', 'Laptop Computers', 'Personal Gadgets', 100, 999.99, 0, '', 'A variation of this laptop, which contains 6GB RAM and 750GB HDD, is also available.', 'Available in 5 colors', '', '', 15),
('MOB0231', 'Sony Xperia Z Andriod Phone', 'Features a 5-inch full HD “Reality Display” with a resolution of 1080 x 1920 pixels, a Snapdragon S4 Pro 1.5GHz quad-core processor, a 13-megapixel camera and Android 4.1 Jelly Bean.', 'Smartphones', 'Personal Gadgets', 100, 249.99, 0, '', 'A slightly smaller version of the Xperia Z, known as the Xperia ZL, is also available.', 'Available in 2 colors', '', '', 20),
('MOB1825', 'Apple iPhone 5', 'It works, runs fast, and it’s a looker as well! What more can you ask out of a phone when it wins in those key categories?', 'Smartphones', 'Personal Gadgets', 75, 199.99, 0, '', 'An extra special version of the iPhone 5, known as the iPhone 5S, is also available.', 'Available in 2 colors', '', '', 20),
('MOB4689', 'Samsung Galaxy S White Sim Free Phone', 'With a 4 inch AMOLED display and 1GHz processor, the Samsung Galaxy S White Sim Free is efficient and smart.', 'Smartphones', 'Personal Gadgets', 100, 468.99, 0, '', 'This phone is also available in a black color.', '', '', '', 1),
('MUS1106', 'Halo 4: Original Soundtrack - Standard Digital Edition', 'Open up your ears to an all-star collection of epic tracks from and inspired by the Xbox 360''s record-breaking game.', 'Soundtracks', 'Personal Entertainment', 100, 14.99, 9.99, 'December 22, 2012 - January 22, 2013', 'Also available as a Two-Disc special edition', 'Also available as a digital download', '', '', 5),
('MUS1109', 'Skyfall: Original Motion Picture Soundtrack', 'Composer Thomas Newman brings his musical talents to the James Bond franchise with the Skyfall soundtrack.', 'Soundtracks', 'Personal Entertainment', 100, 19.99, 14.99, 'December 22, 2012 - January 22, 2013', 'Also available as a Two-Disc special edition', 'Also available as a digital download', '', '', 10),
('MUS1214', 'The Hobbit: An Unexpected Journey - Original Motion Picture Soundtrack', 'The Hobbit: An Unexpected Journey features original score by Academy Award® winner Howard Shore recorded at famed Abbey Road studios by the London Philharmonic Orchestra.', 'Soundtracks', 'Personal Entertainment', 100, 24.99, 19.99, 'December 14, 2012 - January 14, 2012', 'This soundtrack is also available in a Special Edition format.', '', '', '', 30),
('SOU1199', 'BOSE MIE2I MOBILE HEADSET', 'Bose® MIE2i Mobile Headset is precisely created to provide high quality sound performance. It provides sound in a natural way thus making the sound smoother to listen.', 'Headphones', 'Personal Accessories', 39, 119.95, 0, '', 'Compatible with all mobile devices', 'Available in 2 colors', '', '', 7),
('SOU1998', 'V-MODA CROSSFADE LP HEADPHONS', 'This headphone is truly outstanding and satisfying when it comes to its appearance. This is for young adults who are after the overall physical look of the headphone. It performs satisfyingly and is also commendable to both young generations and old ones.', 'Headphones', 'Personal Accessories', 100, 198.99, 0, '', 'Compatible with all mobile devices', 'Available in 2 colors', '', '', 4),
('SOU5005', 'SONY MDR-NC500D HEADPHONE', 'This headphone is remarkable and impressive. For those who value quality over money, I can say that this is one of the best headphones you can treat yourself.', 'Headphones', 'Personal Accessories', 100, 292.04, 0, '', 'Compatible with all mobile devices', 'Available in 2 colors', '', '', 5),
('TAB0110', 'Google Nexus 10 16GB tablet', 'This 10.1“ Android tablet has a resolution of 2560 x 1600 pixels and is powered by a dual-core Cortex A15 chip.', 'Tablet Computers', 'Personal Gadgets', 72, 399.99, 349.99, 'December 13, 2012 - January 13, 2013', 'A 32GB version of this tablet is also available for $499.99.', '', '', '', 25),
('TAB0770', 'Google Nexus 7 with 1.3 GHz quad-core Cortex-A9 processor', 'The Nexus 7 is Google''s first foray into branded hardware and was developed with Asus. The tablet is 10.16 millimeters thick, weighs 317 grams and displays images at a 1280-by-800 pixel resolution.', 'Tablet Computers', 'Personal Gadgets', 65, 199.99, 0, '', 'A variation of this tablet, which features 2.6 GHz octo-core Cortex-A10 processor, and 1 GB RAM DDR3L, is also available', 'Also available in two colors', '', '', 77),
('TAB6116', 'Apple iPad (First Generation) 16GB', 'The Apple iPad, with a perfect blend of looks and performance, is probably the only gadget you will ever need again – except of course, to make calls.', 'Tablet Computers', 'Personal Gadgets', 100, 349.99, 0, '', 'A 32GB version of this tablet is also available for $449.99.', '', '', '', 30),
('TAB9889', 'Amazon Kindle Fire HD 8.9" Tablet', 'The 8.9" Kindle Fire HD is only 8.8mm thick and weighs just 1.25 pounds. Powering the Kindle Fire HD is a Texas Instruments OMAP 4470 processor.', 'Tablet Computers', 'Personal Gadgets', 78, 299.99, 249.99, 'December 6, 2012 - January 6, 2012', 'An LTE model of this tablet, with a $50 yearly data plan, is also available for $499.99.', '', '', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `ProductCode` varchar(255) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerEmail` varchar(255) NOT NULL,
  `Review` varchar(255) NOT NULL,
  `Rating` int(1) NOT NULL,
  PRIMARY KEY (`ProductCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ProductCode`, `CustomerName`, `CustomerEmail`, `Review`, `Rating`) VALUES
('BLU0703', 'Admin i', 'admin@yes.com', 'Ayy', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
