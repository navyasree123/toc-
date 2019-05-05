-- MySQL dump 10.11
--
-- Host: localhost    Database: bank_management
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `account` (
  `account_number` int(11) NOT NULL,
  `customer_id` int(11) default NULL,
  `balance` int(11) NOT NULL,
  `account_type` varchar(30) default NULL,
  PRIMARY KEY  (`account_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1234567,12345,60000,'customer'),(123456789,123,53000,'customer'),(1234568,124,120000000,'customer'),(1234569,125,740000,'customer'),(1234570,126,2147483647,'customer');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_address` varchar(60) default NULL,
  `account_type` varchar(50) default NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (123,'gnanesh','28 - 1382/1, New Balaji Colony,chittoor','customer'),(12345,'Santhosh','Vellore','customer'),(124,'ashraf','49 - 154/8, netaji colony,chennai\n','customer'),(125,'ashwath','7 - 1/15, gandhiji colony,chennai','customer'),(126,'ashwin','24 - 16/10, krishnan colony,theni','customer');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `deposit` (
  `deposit_number` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `account_number` int(11) default NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`deposit_number`)
) ENGINE=MyISAM AUTO_INCREMENT=12351 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `deposit`
--

LOCK TABLES `deposit` WRITE;
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
INSERT INTO `deposit` VALUES (12345,123,50000,123456789,'2016-11-02'),(12346,123,2000,123456789,'2016-11-02'),(12347,12345,10000,1234567,'2017-10-03'),(12348,124,100000,1234568,'2017-09-10'),(12349,125,2500,1234569,'2017-09-15'),(12350,126,258621000,1234570,'2017-11-01');
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(40) NOT NULL,
  `telephone_number` int(11) default NULL,
  `start_date` date default NULL,
  `dependent_name` varchar(40) default NULL,
  PRIMARY KEY  (`employee_id`),
  UNIQUE KEY `telephone_number` (`telephone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (15250,'Employee1',97562,'2008-10-16','Santhosh'),(15263,'Employee2',98676,'2010-10-16','gnanesh'),(15251,'Employee3',97458,'2009-11-10','ashraf'),(15252,'Employee4',97459,'2010-02-25','ashwath'),(15253,'Employee5',97460,'2011-04-21','ashwin');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `loan` (
  `loan_number` int(11) NOT NULL auto_increment,
  `customer_id` int(11) default NULL,
  `amount` int(11) NOT NULL,
  `account_number` int(11) default NULL,
  `loan_active` int(1) default '0',
  PRIMARY KEY  (`loan_number`)
) ENGINE=MyISAM AUTO_INCREMENT=123458 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `loan`
--

LOCK TABLES `loan` WRITE;
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
INSERT INTO `loan` VALUES (12345,123,4000,123456789,0),(123456,123,3000,123456789,0),(123457,123,70000,123456789,1),(12346,12345,50000,1234567,1),(12347,12345,1000,1234567,0);
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_accounts` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `account_number` int(11) NOT NULL,
  PRIMARY KEY  (`account_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user_accounts`
--

LOCK TABLES `user_accounts` WRITE;
/*!40000 ALTER TABLE `user_accounts` DISABLE KEYS */;
INSERT INTO `user_accounts` VALUES ('Santhosh','qwerty',1234567),('gnanesh','qwerty',123456789),('ashraf','qwerty',1234568),('ashwath','qwerty',1234561),('ashwin','qwerty',1254561);
/*!40000 ALTER TABLE `user_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-09  5:25:20
