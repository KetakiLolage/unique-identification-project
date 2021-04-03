-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: esdlpro
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login` (
  `email_admin` varchar(20) DEFAULT NULL,
  `pass_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login`
--

LOCK TABLES `admin_login` WRITE;
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` VALUES ('ketaki','thor'),('parth','ironman'),('omkar','hulk');
/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `uid` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `bday` int(2) DEFAULT NULL,
  `bmonth` varchar(10) DEFAULT NULL,
  `byear` int(2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `mob` bigint(15) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `marital` varchar(8) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `nationality` varchar(7) DEFAULT NULL,
  `bgrp` varchar(3) DEFAULT NULL,
  `phy` varchar(4) DEFAULT NULL,
  `insure` varchar(30) DEFAULT NULL,
  `licence` varchar(30) DEFAULT NULL,
  `vnum` varchar(15) DEFAULT NULL,
  `qualification` varchar(60) DEFAULT NULL,
  `occu` varchar(20) DEFAULT NULL,
  `income` int(10) DEFAULT NULL,
  `bkname` varchar(50) DEFAULT NULL,
  `accNo` bigint(20) DEFAULT NULL,
  `crime` varchar(4) DEFAULT NULL,
  `cdetails` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (0001,'Parth','Khetarpal',23,'May',1996,'part@hotmail.com','batman',4332563747,'Male','Single','221 B Baker Street','Pune','Maharashtra',411001,'Indian','A+','No','123456','33355544656897','8204','Post-Graduation/Equivalent certified Post-Graduation','Student',12000000,'Oriental Bank of Commerce',7563524755,'No','None'),(0002,'Ketaki','Lolage',21,'April',1997,'ketaki@outlook.com','thor'089016268,'Female','Single','H Block Pimpri','Pune','Maharashtra',411017,'Indian','O-','No','321546','67584638386','8055','Post-Graduation/Equivalent certified Post-Graduation','Student',22000000,'Union Bank',35465698466,'No','None'),(0003,'Omkar','Kute',19,'May',1996,'omkar@gmail.com','flash',5500451084,'Male','Single','Bungalow 4, Pimpri Road','Pune','Maharashtra',411017,'Indian','O+','No','98655','9864367975','7637','Post-Graduation/Equivalent certified Post-Graduation','Student',100000000,'Bank of Baroda',765398645790,'Yes','Assault'),(0004,'Abhishek','Jain',18,'April',1996,'abhishek@gmail.com','deathstroke'1012477447,'Male','Single','Kumar Galaxy, Nana peth','Pune','Maharashtra',411001,'Indian','AB+','No','67657','46576885746','4446','Graduation/Equivalent certified Graduation','Student',20000,'State Bank of India',364755874637,'Yes','Assasination of Terra Jones'),(0005,'Chaitanya','Chavan',4,'August',1996,'chaitanya@gmail.com','technoyug'6665050867,'Male','Married','Kharadi Apartments, Kharadi','Pune','Maharashtra',411043,'Other','O+','No','87574','121212121212','1212','Other','Administration',200000000,'Union Bank',567478383727,'Yes','Hacking'),(0006,'Habil','Damania',2,'January',1997,'habil@gmail.com','redhood',3423725577,'Male','Single','Modern Apts, Quartergate','Dallas','Texas',611024,'NRI','O-','No','64473','152638817283','4657','Post-Graduation/Equivalent certified Post-Graduation','Student',40000000,'Bank of Maharashtra',647639992283,'No','None'),(0007,'Aditya','Jagtap',13,'September',1996,'aditya@gmail.com','aj',8766019299,'Male','Single','Oxford Village, Wanowrie','Pune','Maharashtra',411014,'Indian','B-','No','64272','152639857283','9876','Post-Graduation/Equivalent certified Post-Graduation','Student',10000,'HDFC',757635432283,'Yes','Fraud');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-05  8:41:42
