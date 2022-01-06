-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2022 at 10:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawrhashop`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `AddNewAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddNewAdmin` (IN `fName` VARCHAR(20), IN `lName` VARCHAR(20), IN `userName` VARCHAR(20), IN `email` VARCHAR(70), IN `password` VARCHAR(100))  INSERT INTO `admin` (`ID`, `fName`, `lName`, `userName`, `email`, `password`) VALUES (NULL, fName, lName, userName, email, password)$$

DROP PROCEDURE IF EXISTS `deleteFromCartItem`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteFromCartItem` (IN `cartIDD` INT(11), IN `itemIDD` INT(11))  DELETE FROM cartitem WHERE cartitem.cartId = cartIDD AND cartitem.itemId = itemIDD$$

DROP PROCEDURE IF EXISTS `GetAllCategories`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllCategories` ()  BEGIN
SELECT * FROM category;
END$$

DROP PROCEDURE IF EXISTS `GetAllImages`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllImages` ()  BEGIN
SELECT *  FROM itemimage;
END$$

DROP PROCEDURE IF EXISTS `GetAllitems`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllitems` ()  BEGIN
SELECT *  FROM item ORDER by quantity DESC;
END$$

DROP PROCEDURE IF EXISTS `getBuyerWithUserName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBuyerWithUserName` (IN `UserNameee` VARCHAR(20))  SELECT * FROM buyer where userName = UserNameee$$

DROP PROCEDURE IF EXISTS `getItemCartWithItemIdandBuyerId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getItemCartWithItemIdandBuyerId` (IN `buyerID` INT(11), IN `itemIDD` INT(11))  SELECT cartitem.cartId , cartitem.itemId
                                                                                                                            from buyer,cartitem,cart,item
                                                                                                                            WHERE buyer.cartId = cart.cartId and cartitem.cartId=cart.cartId and buyer.ID=buyerID and cartitem.itemId = item.itemId and item.itemId=itemIDD$$

DROP PROCEDURE IF EXISTS `getItemsByCertainCategory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getItemsByCertainCategory` (IN `catName` VARCHAR(30))  BEGIN
SELECT * FROM item as e WHERE e.categoryId in (SELECT b.categoryId from category as b WHERE categoryName = catName) ORDER BY quantity DESC;
END$$

DROP PROCEDURE IF EXISTS `getSellerWithUserName`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getSellerWithUserName` (IN `UserNameee` VARCHAR(20))  SELECT * FROM seller where userName = UserNameee$$

DROP PROCEDURE IF EXISTS `insertNewOrder`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertNewOrder` (IN `OrderPricee` DOUBLE, IN `qty` INT(11), IN `buyerIdd` INT(11), IN `itemIdd` INT(11))  INSERT INTO orders (orderPrice,quantity,buyerId,itemId)  VALUES (OrderPricee,qty,buyerIdd,itemIdd)$$

DROP PROCEDURE IF EXISTS `searchForItemsByKeyword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `searchForItemsByKeyword` (IN `KeyWord` VARCHAR(255))  SELECT * FROM item WHERE title LIKE KeyWord UNION SELECT * FROM item WHERE description LIKE KeyWord ORDER by quantity DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `fName` varchar(20) DEFAULT NULL,
    `lName` varchar(20) DEFAULT NULL,
    `userName` varchar(20) NOT NULL,
    `email` varchar(70) NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `userName` (`userName`) USING BTREE,
    UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `fName`, `lName`, `userName`, `email`, `password`) VALUES
                                                                                  (1, 'Beshoy', 'Morad', 'iiBesh00', 'beshoy@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
                                                                                  (2, 'Zeyad', 'Tarek', 'ZeyadTarek', 'Zeyad.Ta01@gmail.com', 'c271a80ee083d5024fdf5ad6dd38651085f4e8eb'),
                                                                                  (3, 'Abdelrahman', 'Mohamed', 'Abdelrahman', 'a.m.hamza156@gmail.com', 'c271a80ee083d5024fdf5ad6dd38651085f4e8eb'),
                                                                                  (7, 'Ziad', 'Sherif', 'ZiadSherif', 'zsherif308@gmail.com', 'c271a80ee083d5024fdf5ad6dd38651085f4e8eb');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `userName` varchar(20) NOT NULL,
    `password` varchar(50) NOT NULL,
    `joinDate` date NOT NULL DEFAULT curdate(),
    `email` varchar(70) NOT NULL,
    `fName` varchar(20) NOT NULL,
    `lName` varchar(20) NOT NULL,
    `cartId` int(11) NOT NULL,
    `likes` int(11) NOT NULL DEFAULT '0',
    `disLikes` int(11) NOT NULL DEFAULT '0',
    `transactions` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `userName` (`userName`) USING BTREE,
    UNIQUE KEY `email` (`email`),
    UNIQUE KEY `cartId` (`cartId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`ID`, `userName`, `password`, `joinDate`, `email`, `fName`, `lName`, `cartId`, `likes`, `disLikes`, `transactions`) VALUES
                                                                                                                                             (4, 'ahmed', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'ahmed@gmail.com', 'Ahmed', 'Mohamed', 4, 3, 2, 3),
                                                                                                                                             (5, 'Mohamed', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'mohamed@gmail.com', 'Mohamed', 'Ahmed', 5, 0, 0, 0),
                                                                                                                                             (6, 'Hossam', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Hossam@gmail.com', 'Hossam', 'Ahmed', 6, 0, 0, 0),
                                                                                                                                             (7, 'AyaAhmed', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Aya@gmail.com', 'Aya', 'Ahmed', 7, 6, 2, 7),
                                                                                                                                             (8, 'SarahAhmed', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Sarah@gmail.com', 'Sarah', 'Ahmed', 8, 0, 0, 0),
                                                                                                                                             (9, 'JohnDoe', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'john@gmail.com', 'John', 'Doe', 9, 0, 0, 0),
                                                                                                                                             (10, 'MohamedAhmed', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'mohamedahmed@gmail.com', 'Mohamed', 'Ahmed', 10, 0, 0, 0),
                                                                                                                                             (11, 'ZachariaIrvine', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Zacharia@gmail.com', 'Zacharia ', 'Irvine', 11, 0, 0, 0),
                                                                                                                                             (12, 'ArunMurillo', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'ArunMurillo@gmail.com', 'Arun', 'Murillo', 12, 0, 0, 0),
                                                                                                                                             (13, 'ReyanshEnriquez', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'ReyanshEnriquez@gmail.com', 'Reyansh', 'Enriquez', 13, 0, 0, 0),
                                                                                                                                             (14, 'EvelynRossi', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'EvelynRossi@gm.com', 'Evelyn', 'Rossi', 14, 0, 0, 0),
                                                                                                                                             (15, 'EmaanWilkerson', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'EmaanWilkerson@gm.com', 'Emaan', 'Wilkerson', 15, 0, 0, 0);

--
-- Triggers `buyer`
--
DROP TRIGGER IF EXISTS `deleteNotificationafterBuyerDeletion`;
DELIMITER $$
CREATE TRIGGER `deleteNotificationafterBuyerDeletion` BEFORE DELETE ON `buyer` FOR EACH ROW DELETE FROM notification WHERE notification.id in (SELECT notificationId  from  buyernotification,buyer WHERE buyer.ID = buyernotification.ownerID)
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buyernotification`
--

DROP TABLE IF EXISTS `buyernotification`;
CREATE TABLE IF NOT EXISTS `buyernotification` (
    `notificationId` int(11) NOT NULL,
    `sellerId` int(11) NOT NULL,
    `ownerID` int(11) NOT NULL,
    PRIMARY KEY (`notificationId`,`sellerId`,`ownerID`),
    KEY `selllll` (`sellerId`),
    KEY `buyeeee` (`ownerID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyernotification`
--

INSERT INTO `buyernotification` (`notificationId`, `sellerId`, `ownerID`) VALUES
                                                                              (43, 4, 7),
                                                                              (44, 4, 7),
                                                                              (46, 4, 7),
                                                                              (47, 4, 7),
                                                                              (48, 4, 7),
                                                                              (49, 4, 7),
                                                                              (51, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
    `cartId` int(11) NOT NULL AUTO_INCREMENT,
    `itemCount` int(11) NOT NULL,
    `payment` double NOT NULL,
    PRIMARY KEY (`cartId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `itemCount`, `payment`) VALUES
                                                          (4, 12, 27063.75),
                                                          (5, 0, 0),
                                                          (6, 0, 0),
                                                          (7, 7, 11187.8),
                                                          (8, 0, 0),
                                                          (9, 0, 0),
                                                          (10, 0, 0),
                                                          (11, 0, 0),
                                                          (12, 0, 0),
                                                          (13, 0, 0),
                                                          (14, 0, 0),
                                                          (15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
CREATE TABLE IF NOT EXISTS `cartitem` (
    `cartId` int(11) NOT NULL,
    `itemId` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    PRIMARY KEY (`cartId`,`itemId`),
    KEY `itemIdcartitem` (`itemId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`cartId`, `itemId`, `quantity`) VALUES
                                                            (4, 25, 5),
                                                            (4, 26, 5),
                                                            (4, 27, 5),
                                                            (4, 28, 10),
                                                            (4, 29, 15),
                                                            (4, 30, 5),
                                                            (4, 32, 1),
                                                            (4, 33, 5),
                                                            (4, 34, 10),
                                                            (4, 35, 5),
                                                            (4, 36, 5),
                                                            (4, 37, 20),
                                                            (7, 23, 4),
                                                            (7, 25, 10),
                                                            (7, 26, 8),
                                                            (7, 27, 10),
                                                            (7, 29, 10),
                                                            (7, 30, 5),
                                                            (7, 34, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
    `categoryId` int(11) NOT NULL AUTO_INCREMENT,
    `categoryName` varchar(30) NOT NULL,
    `categoryDescription` varchar(300) NOT NULL,
    PRIMARY KEY (`categoryId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryDescription`) VALUES
                                                                                 (1, 'Other', ''),
                                                                                 (2, 'Plastic', 'Contains any plastic objects'),
                                                                                 (4, 'Glass', 'Contains any glass objects'),
                                                                                 (5, 'Metal', 'Contains any metal objects'),
                                                                                 (6, 'Paper', 'Contains any paper objetcs'),
                                                                                 (7, 'Clothes', 'Contains any Clothes'),
                                                                                 (8, 'Food', 'Contains any food'),
                                                                                 (9, 'Electric devices', 'Contains all electric devices');

--
-- Triggers `category`
--
DROP TRIGGER IF EXISTS `updateCat`;
DELIMITER $$
CREATE TRIGGER `updateCat` BEFORE DELETE ON `category` FOR EACH ROW UPDATE item as e SET e.categoryId = 1 WHERE e.categoryId in (SELECT c.categoryId from category as c WHERE c.categoryId =OLD.categoryId)
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
    `itemId` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(20) NOT NULL,
    `description` varchar(300) NOT NULL,
    `price` double NOT NULL,
    `quantity` int(11) NOT NULL,
    `addDate` date NOT NULL DEFAULT curdate(),
    `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
    `categoryId` int(11) DEFAULT '1',
    `sellerId` int(11) NOT NULL,
    `startDate` date DEFAULT NULL,
    `endDate` date DEFAULT NULL,
    `discount` int(11) DEFAULT NULL,
    `homeNumber` int(11) NOT NULL,
    `street` varchar(50) NOT NULL,
    `city` varchar(30) NOT NULL,
    `country` varchar(30) NOT NULL,
    PRIMARY KEY (`itemId`),
    UNIQUE KEY `homeNumber` (`homeNumber`,`street`,`city`,`country`,`itemId`) USING BTREE,
    UNIQUE KEY `startDate` (`startDate`,`endDate`,`discount`,`itemId`) USING BTREE,
    KEY `sellerIdItem` (`sellerId`),
    KEY `categoryIdForItem` (`categoryId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `title`, `description`, `price`, `quantity`, `addDate`, `isDeleted`, `categoryId`, `sellerId`, `startDate`, `endDate`, `discount`, `homeNumber`, `street`, `city`, `country`) VALUES
                                                                                                                                                                                                                (21, 'Bottles', 'Empty Glass Bottles', 130, 0, '2022-01-06', 0, 4, 7, NULL, NULL, 0, 8920, 'Olive', 'LittleRock', 'UnitedStates'),
                                                                                                                                                                                                                (22, 'Scrub', 'Metal Scrub is in a very good state', 160, 0, '2022-01-06', 0, 5, 7, NULL, NULL, 0, 479, 'Oakwood', 'LaneAliquippa', 'US'),
                                                                                                                                                                                                                (23, 'Containers', 'Plastic Containers with different sizes', 60, 4, '2022-01-06', 0, 2, 7, NULL, NULL, 3, 6, 'Baker', 'Kalamazoo', 'US'),
                                                                                                                                                                                                                (24, 'Bottles', 'Plastic Bottles of different sizes', 50, 25, '2022-01-06', 0, 2, 7, NULL, NULL, 0, 57, 'Newcastle', 'SouthRichmondHill', 'US'),
                                                                                                                                                                                                                (25, 'Jar', 'Jars of different sizes', 110, 47, '2022-01-06', 0, 4, 7, NULL, NULL, 0, 19, 'Riverside', 'Erie', 'US'),
                                                                                                                                                                                                                (26, 'Books', 'Books in a good state', 30, 26, '2022-01-06', 0, 6, 7, NULL, NULL, 0, 8257, 'Illinois', 'Birmingham', 'US'),
                                                                                                                                                                                                                (27, 'College Books', 'Engineering College Books', 50, 48, '2022-01-06', 0, 6, 7, NULL, NULL, 5, 76, 'Brandywine', 'Bensalem', 'US'),
                                                                                                                                                                                                                (28, 'Small Jars', '', 98, 47, '2022-01-06', 0, 4, 7, NULL, NULL, 0, 435, 'SugarAve', 'OwingsMills', 'US'),
                                                                                                                                                                                                                (29, 'Paint tools', 'Old Paint tools (Brushes and paints)', 45, 30, '2022-01-06', 0, 1, 7, NULL, NULL, 0, 9608, 'Clark Dr Feasterville', 'Owings Mills', 'United States'),
                                                                                                                                                                                                                (30, 'Clothes', 'Heavy and light clothes', 40, 41, '2022-01-06', 0, 7, 7, NULL, NULL, 5, 841, 'South Woodsid', 'Chicago', 'United States'),
                                                                                                                                                                                                                (31, 'Vegetables', 'thrown out vegetables', 1.5, 20, '2022-01-06', 0, 8, 7, NULL, NULL, 0, 12, 'Nawal St El Shorta Towers', 'Agouza', 'Egypt'),
                                                                                                                                                                                                                (32, 'Fish', 'Thrown out dinner', 12.5, 12, '2022-01-06', 1, 8, 7, NULL, NULL, 10, 176, 'Mohamed Ali St ATABA', 'Cairo', 'Egypt'),
                                                                                                                                                                                                                (33, 'Mobiles', 'A very good mobiles', 300, 30, '2022-01-06', 0, 9, 4, NULL, NULL, 10, 23, 'Extension Of el bahr st', 'Tanta', 'Egypt'),
                                                                                                                                                                                                                (34, 'Washing machines', 'Old washing machines', 1000, 975, '2022-01-06', 0, 9, 4, NULL, NULL, 15, 88, 'Abd El Salam Aref St GLIM', 'Alexandria', 'Egypt'),
                                                                                                                                                                                                                (35, 'Computers', 'A very old computers', 600, 990, '2022-01-06', 0, 9, 4, NULL, NULL, 0, 123, 'A El Gomhoureya St Abdin', 'Cairo', 'Egypt'),
                                                                                                                                                                                                                (36, 'Pens and pencils', 'Plastic pens and pencils', 50, 50, '2022-01-06', 0, 2, 4, NULL, NULL, 12, 11, 'Extension Of el bahr', 'El Gharbeya', 'Egypt'),
                                                                                                                                                                                                                (37, 'Laptops', 'Used laptops', 700, 120, '2022-01-06', 0, 9, 4, NULL, NULL, 20, 13, 'El Alfy St El Azbakia', 'Down Town', 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `itemimage`
--

DROP TABLE IF EXISTS `itemimage`;
CREATE TABLE IF NOT EXISTS `itemimage` (
    `itemId` int(11) NOT NULL,
    `image` varchar(100) NOT NULL,
    PRIMARY KEY (`itemId`,`image`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemimage`
--

INSERT INTO `itemimage` (`itemId`, `image`) VALUES
                                                (21, '61d740146fc30-1641496596.jpg'),
                                                (22, '61d74272ea7ac-1641497202.jpg'),
                                                (23, '61d741f8745f2-1641497080.jpg'),
                                                (24, '61d7441ca9f52-1641497628.jpg'),
                                                (24, '61d744355cc02-1641497653.png'),
                                                (24, '61d7444abcccf-1641497674.jpg'),
                                                (25, '61d745e1a5def-1641498081.jpg'),
                                                (25, '61d746433aaf5-1641498179.jfif'),
                                                (26, '61d74695b44f9-1641498261.jpg'),
                                                (26, '61d74695b4717-1641498261.jpg'),
                                                (26, '61d746ec45267-1641498348.jpg'),
                                                (27, '61d749bb7f5f7-1641499067.jpg'),
                                                (27, '61d749e3b688f-1641499107.jpg'),
                                                (28, '61d74ae8ba461-1641499368.png'),
                                                (28, '61d74ae8ba76e-1641499368.jfif'),
                                                (28, '61d74ae8baad4-1641499368.jpg'),
                                                (28, '61d74ae8baf31-1641499368.webp'),
                                                (28, '61d74ae8bb18b-1641499368.jpg'),
                                                (28, '61d74ae8bb3f9-1641499368.jpg'),
                                                (29, '61d74c1af2d98-1641499674.jpg'),
                                                (29, '61d74c1af3027-1641499674.jpg'),
                                                (29, '61d74c1af37c0-1641499674.jpg'),
                                                (30, '61d74eae177c5-1641500334.jpg'),
                                                (30, '61d74eae179c6-1641500334.jpg'),
                                                (30, '61d74eae17b75-1641500334.jpg'),
                                                (30, '61d74eae17d08-1641500334.jpg'),
                                                (30, '61d74eae17ea1-1641500334.jpg'),
                                                (31, '61d751f2d4903-1641501170.jpg'),
                                                (31, '61d751f2d4ad0-1641501170.jpg'),
                                                (31, '61d751f2d4c18-1641501170.jpg'),
                                                (31, '61d751f2d4d7b-1641501170.jpg'),
                                                (32, '61d75298c2f88-1641501336.jfif'),
                                                (33, '61d75b78d74f8-1641503608.jpg'),
                                                (33, '61d75b78d76ec-1641503608.jpg'),
                                                (33, '61d75b78d785c-1641503608.jpg'),
                                                (33, '61d75b78d79ea-1641503608.jpg'),
                                                (34, '61d75c1a0145a-1641503770.jpg'),
                                                (34, '61d76134124c0-1641505076.jpg'),
                                                (35, '61d760870c996-1641504903.jpg'),
                                                (35, '61d760870cb52-1641504903.jpg'),
                                                (36, '61d7624c73240-1641505356.jpg'),
                                                (36, '61d7624c73416-1641505356.jpg'),
                                                (36, '61d7624c7355e-1641505356.jpg'),
                                                (36, '61d7624c7369e-1641505356.jpg'),
                                                (37, '61d7630095c2d-1641505536.jpg'),
                                                (37, '61d7630095ddb-1641505536.jpg'),
                                                (37, '61d7630095f22-1641505536.jpg'),
                                                (37, '61d7630096076-1641505536.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobileadmin`
--

DROP TABLE IF EXISTS `mobileadmin`;
CREATE TABLE IF NOT EXISTS `mobileadmin` (
    `adminId` int(11) NOT NULL,
    `phone` varchar(11) NOT NULL,
    PRIMARY KEY (`adminId`,`phone`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobileadmin`
--

INSERT INTO `mobileadmin` (`adminId`, `phone`) VALUES
                                                   (1, '01273311810'),
                                                   (2, '01206583954'),
                                                   (3, '01150530696'),
                                                   (7, '01146188908');

-- --------------------------------------------------------

--
-- Table structure for table `mobilebuyer`
--

DROP TABLE IF EXISTS `mobilebuyer`;
CREATE TABLE IF NOT EXISTS `mobilebuyer` (
    `buyerId` int(11) NOT NULL,
    `phone` varchar(11) NOT NULL,
    PRIMARY KEY (`buyerId`,`phone`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobilebuyer`
--

INSERT INTO `mobilebuyer` (`buyerId`, `phone`) VALUES
                                                   (4, '1234567689'),
                                                   (5, '123456789'),
                                                   (6, '12345678'),
                                                   (7, '123456789'),
                                                   (7, '123789456'),
                                                   (7, '951357486'),
                                                   (7, '987654321'),
                                                   (8, '123456789'),
                                                   (9, '123456789'),
                                                   (10, '123456789'),
                                                   (11, '123456789'),
                                                   (12, '123456789'),
                                                   (13, '123456789'),
                                                   (14, '123456789'),
                                                   (15, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `mobileseller`
--

DROP TABLE IF EXISTS `mobileseller`;
CREATE TABLE IF NOT EXISTS `mobileseller` (
    `sellerId` int(11) NOT NULL,
    `phoneNo` varchar(11) NOT NULL,
    PRIMARY KEY (`sellerId`,`phoneNo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobileseller`
--

INSERT INTO `mobileseller` (`sellerId`, `phoneNo`) VALUES
                                                       (4, '123456789'),
                                                       (4, '753159462'),
                                                       (4, '789123456'),
                                                       (4, '789632145'),
                                                       (4, '789654123'),
                                                       (5, '123456789'),
                                                       (6, '123456789'),
                                                       (7, '123456789'),
                                                       (8, '123456789'),
                                                       (9, '123456789'),
                                                       (10, '123456789'),
                                                       (11, '123456789'),
                                                       (12, '123456789'),
                                                       (13, '1234567890'),
                                                       (14, '12345678'),
                                                       (15, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `message` varchar(300) NOT NULL,
    `date` date NOT NULL DEFAULT curdate(),
    `seen` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `date`, `seen`) VALUES
                                                                 (19, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Scrub, Quantity: 40, Price: 6400, at 2022-01-06', '2022-01-06', 1),
                                                                 (20, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Containers, Quantity: 4, Price: 232.8, at 2022-01-06', '2022-01-06', 1),
                                                                 (21, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Jar, Quantity: 3, Price: 330, at 2022-01-06', '2022-01-06', 1),
                                                                 (22, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: College Books, Quantity: 2, Price: 95, at 2022-01-06', '2022-01-06', 1),
                                                                 (23, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Bottles, Quantity: 10, Price: 1300, at 2022-01-06', '2022-01-06', 1),
                                                                 (25, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Books, Quantity: 4, Price: 120, at 2022-01-06', '2022-01-06', 1),
                                                                 (26, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Bottles, Quantity: 10, Price: 500, at 2022-01-06', '2022-01-06', 1),
                                                                 (28, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Small Jars, Quantity: 10, Price: 980, at 2022-01-06', '2022-01-06', 1),
                                                                 (30, 'Hello Emma Oliver, Aya Ahmed ordered your item: Containers, Quantity: 10, Price: 582, at 2022-01-06', '2022-01-06', 1),
                                                                 (31, 'Hello Emma Oliver, Aya Ahmed ordered your item: College Books, Quantity: 10, Price: 475, at 2022-01-06', '2022-01-06', 1),
                                                                 (32, 'Hello Emma Oliver, Aya Ahmed ordered your item: Bottles, Quantity: 15, Price: 1950, at 2022-01-06', '2022-01-06', 1),
                                                                 (34, 'Hello Emma Oliver, Ahmed Mohamed ordered your item: Bottles, Quantity: 20, Price: 2600, at 2022-01-06', '2022-01-06', 1),
                                                                 (37, 'Hello Ahmed Elsaid, Aya Ahmed ordered your item: Laptops, Quantity: 20, Price: 11200, at 2022-01-06', '2022-01-06', 1),
                                                                 (38, 'Hello Ahmed Elsaid, Aya Ahmed ordered your item: Washing machines, Quantity: 20, Price: 17000, at 2022-01-06', '2022-01-06', 1),
                                                                 (39, 'Hello Ahmed Elsaid, Aya Ahmed ordered your item: Computers, Quantity: 10, Price: 6000, at 2022-01-06', '2022-01-06', 1),
                                                                 (40, 'Hello Ahmed Elsaid, Ahmed Mohamed ordered your item: Mobiles, Quantity: 10, Price: 2700, at 2022-01-06', '2022-01-06', 1),
                                                                 (43, 'Hello AyaAhmed regarding your order for Washing machines, quantity: 20, price: 17000, at 2022-01-06 we want to inform you that it has been accepted\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (44, 'Hello AyaAhmed regarding your order for Washing machines, quantity: 20, price: 17000, at 2022-01-06 we want to inform you that it has been accepted\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (45, 'Hello Ahmed Elsaid, Aya Ahmed ordered your item: Washing machines, Quantity: 5, Price: 4250, at 2022-01-07', '2022-01-06', 1),
                                                                 (46, 'Hello AyaAhmed regarding your order for Washing machines, quantity: 20, price: 17000, at 2022-01-06 we want to inform you that it has been accepted\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (47, 'Hello AyaAhmed regarding your order for Washing machines, quantity: 5, price: 4250, at 2022-01-06 we want to inform you that it has been accepted\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (48, 'Hello AyaAhmed regarding your order for Laptops, quantity: 20, price: 11200 ,at address    we want to inform you that it has been declined\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (49, 'Hello AyaAhmed regarding your order for Laptops, quantity: 20, price: 11200 ,at address 13 El Alfy St El Azbakia Down Town we want to inform you that it has been declined\n you can communicate with the seller through 123456789', '2022-01-06', 1),
                                                                 (50, 'Hello Ahmed Elsaid, Aya Ahmed ordered your item: Mobiles, Quantity: 10, Price: 2700, at 2022-01-07', '2022-01-06', 1),
                                                                 (51, 'Hello AyaAhmed regarding your order for Mobiles, quantity: 10, price: 2700 ,at address 23 Extension Of el bahr st Tanta we want to inform you that it has been accepted\n you can communicate with the seller through 123456789', '2022-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
    `orderId` int(11) NOT NULL AUTO_INCREMENT,
    `orderPrice` double NOT NULL,
    `quantity` int(11) NOT NULL,
    `orderDate` date NOT NULL DEFAULT curdate(),
    `buyerId` int(11) NOT NULL,
    `itemId` int(11) DEFAULT NULL,
    `status` int(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`orderId`),
    KEY `buyerIdorder` (`buyerId`),
    KEY `itemIdForOrder` (`itemId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderPrice`, `quantity`, `orderDate`, `buyerId`, `itemId`, `status`) VALUES
                                                                                                           (10, 6400, 40, '2022-01-06', 4, 22, 0),
                                                                                                           (11, 232.8, 4, '2022-01-06', 4, 23, 2),
                                                                                                           (12, 330, 3, '2022-01-06', 4, 25, 2),
                                                                                                           (13, 95, 2, '2022-01-06', 4, 27, 0),
                                                                                                           (14, 1300, 10, '2022-01-06', 4, 21, 1),
                                                                                                           (15, 120, 4, '2022-01-06', 4, 26, 0),
                                                                                                           (16, 500, 10, '2022-01-06', 4, 24, 0),
                                                                                                           (17, 980, 10, '2022-01-06', 4, 28, 1),
                                                                                                           (18, 582, 10, '2022-01-06', 7, 23, 1),
                                                                                                           (19, 475, 10, '2022-01-06', 7, 27, 0),
                                                                                                           (20, 1950, 15, '2022-01-06', 7, 21, 2),
                                                                                                           (21, 2600, 20, '2022-01-06', 4, 21, 0),
                                                                                                           (22, 11200, 20, '2022-01-06', 7, 37, 2),
                                                                                                           (23, 17000, 20, '2022-01-06', 7, 34, 1),
                                                                                                           (24, 6000, 10, '2022-01-06', 7, 35, 1),
                                                                                                           (25, 2700, 10, '2022-01-06', 4, 33, 1),
                                                                                                           (26, 4250, 5, '2022-01-06', 7, 34, 1),
                                                                                                           (27, 2700, 10, '2022-01-06', 7, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `userName` varchar(20) NOT NULL,
    `password` varchar(50) NOT NULL,
    `joinDate` date NOT NULL DEFAULT curdate(),
    `email` varchar(70) NOT NULL,
    `fName` varchar(20) NOT NULL,
    `lName` varchar(20) NOT NULL,
    `likes` int(11) NOT NULL DEFAULT '0',
    `disLikes` int(11) NOT NULL DEFAULT '0',
    `transactions` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `userName` (`userName`) USING BTREE,
    UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`ID`, `userName`, `password`, `joinDate`, `email`, `fName`, `lName`, `likes`, `disLikes`, `transactions`) VALUES
                                                                                                                                    (4, 'AhmedElsaid', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Ahmed2@gmail.com', 'Ahmed', 'Elsaid', 2, 0, 7),
                                                                                                                                    (5, 'Liam', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Liam@gmail.com', 'Liam', 'Noah', 0, 0, 0),
                                                                                                                                    (6, 'Olivia', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Olivia@gmail.com', 'Olivia', 'Liam', 0, 0, 0),
                                                                                                                                    (7, 'Emma', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Emma@gmail.com', 'Emma', 'Oliver', 4, 2, 3),
                                                                                                                                    (8, 'Sophia', '299129b6ca094e4621e97d763f754a69fd436789', '2022-01-06', 'Sophia@gmail.com', 'Sophia', 'Alexander', 0, 0, 0),
                                                                                                                                    (9, 'Evelyn', '299129b6ca094e4621e97d763f754a69fd436789', '2022-01-06', 'Evelyn@gmail.com', 'Evelyn', 'James', 0, 0, 0),
                                                                                                                                    (10, 'Isabella', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Isabella@gmail.com', 'Isabella', 'William', 0, 0, 0),
                                                                                                                                    (11, 'Benjamin', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'Benjamin@gmail.com', 'Benjamin', 'Henry', 0, 0, 0),
                                                                                                                                    (12, 'BiancaSawyer', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'BiancaSawyer@gmail.com', 'Bianca', 'Sawyer', 0, 0, 0),
                                                                                                                                    (13, 'HayleighKinney', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'HayleighKinney@gmail.com', 'Hayleigh', 'Kinney', 0, 0, 0),
                                                                                                                                    (14, 'KallumHolder', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'KallumHolder@gmail.com', 'Kallum', 'Holder', 0, 0, 0),
                                                                                                                                    (15, 'NabeelaBallard', 'a57ae0fe47084bc8a05f69f3f8083896f8b437b0', '2022-01-06', 'NabeelaBallard@gm.com', 'Nabeela', 'Ballard', 0, 0, 0);

--
-- Triggers `seller`
--
DROP TRIGGER IF EXISTS `deleteNotificationafterSellerDeletion`;
DELIMITER $$
CREATE TRIGGER `deleteNotificationafterSellerDeletion` BEFORE DELETE ON `seller` FOR EACH ROW DELETE FROM notification WHERE notification.id in (SELECT notificationId  from  sellernotifications,seller WHERE seller.ID = sellernotifications.ownerID)
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sellernotifications`
--

DROP TABLE IF EXISTS `sellernotifications`;
CREATE TABLE IF NOT EXISTS `sellernotifications` (
    `notificationId` int(11) NOT NULL,
    `buyerId` int(11) NOT NULL,
    `ownerID` int(11) NOT NULL,
    PRIMARY KEY (`notificationId`,`buyerId`,`ownerID`),
    KEY `bu` (`buyerId`),
    KEY `sel` (`ownerID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotifications`
--

INSERT INTO `sellernotifications` (`notificationId`, `buyerId`, `ownerID`) VALUES
                                                                               (19, 4, 7),
                                                                               (20, 4, 7),
                                                                               (21, 4, 7),
                                                                               (22, 4, 7),
                                                                               (23, 4, 7),
                                                                               (25, 4, 7),
                                                                               (26, 4, 7),
                                                                               (28, 4, 7),
                                                                               (34, 4, 7),
                                                                               (40, 4, 4),
                                                                               (30, 7, 7),
                                                                               (31, 7, 7),
                                                                               (32, 7, 7),
                                                                               (37, 7, 4),
                                                                               (38, 7, 4),
                                                                               (39, 7, 4),
                                                                               (45, 7, 4),
                                                                               (50, 7, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
    ADD CONSTRAINT `cardId` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyernotification`
--
ALTER TABLE `buyernotification`
    ADD CONSTRAINT `buyeeee` FOREIGN KEY (`ownerID`) REFERENCES `buyer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notiii` FOREIGN KEY (`notificationId`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selllll` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
    ADD CONSTRAINT `cartIDforcartitem` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemIdcartitem` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
    ADD CONSTRAINT `categoryIdForItem` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sellerIdItem` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `itemimage`
--
ALTER TABLE `itemimage`
    ADD CONSTRAINT `itemIdForImage` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobileadmin`
--
ALTER TABLE `mobileadmin`
    ADD CONSTRAINT `mobileAdminId` FOREIGN KEY (`adminId`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobilebuyer`
--
ALTER TABLE `mobilebuyer`
    ADD CONSTRAINT `buyerId` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobileseller`
--
ALTER TABLE `mobileseller`
    ADD CONSTRAINT `sellerId` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `buyerIdorder` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemIdForOrder` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `sellernotifications`
--
ALTER TABLE `sellernotifications`
    ADD CONSTRAINT `bu` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noti` FOREIGN KEY (`notificationId`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sel` FOREIGN KEY (`ownerID`) REFERENCES `seller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
