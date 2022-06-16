-- MySQL dump 10.13  Distrib 5.7.35, for Linux (x86_64)
--
-- Host: localhost    Database: simtech
-- ------------------------------------------------------
-- Server version	5.7.35-0ubuntu0.18.04.2

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
-- Table structure for table `feedback_result`
--

DROP TABLE IF EXISTS `feedback_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `ComunicationMethod` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Files` text,
  `MaillingList` varchar(100) NOT NULL,
  `Time` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_result`
--

LOCK TABLES `feedback_result` WRITE;
/*!40000 ALTER TABLE `feedback_result` DISABLE KEYS */;
INSERT INTO `feedback_result` VALUES (67,'Иван','Степаненко','ivan_st@mail.ru',89205642512,'phone','Добрый день! Нужна консультация.','files/','all',1654770826),(68,'Василиса','Крот','krot.vas@gmail.com',9620203251,'phone','Ожидаю звонка.','files/','all',1654770826),(69,'Петр','Панченко','panchenko@mail.ru',79892515213,'phone','Здравствуйте! Жду обратного звонка','files/lab.jpg','all',1654770826),(70,'Валентин','Федотов','fedot@yandex.ru',89602581535,'phone','Ожидаю звонка.','files/lab.jpg','all',1654770826),(71,'Илона','Игнатенко','ilona_igla@mail.ru',79802563919,'phone','Ожидаю звонка.','files/lab.jpg','all',1654770826),(72,'Алексей','Иванов','alex_12@mail.ru',9002564218,'phone','Добрый день! Нужна консультация.','files/','all',1654770826),(73,'Ирина','','irocka@mail.ru',9206358945,'phone','Перезвоните, жду.','files/','all',1654770597),(74,'Светлана','Петрова','svet_pet@mail.ru',89632548589,'email','Здравствуйте! Жду обратного звонка','files/er.png','answer',1654770736),(75,'Артём','','artcas@mail.ru',89523652595,'phone','Добрый день! Нужна консультация.','files/','all',1654770826),(76,'Богдан','','bogdan1@mail.ru',9024568292,'phone','Ожидаю звонка.','files/','all',1654770978),(77,'Павел','','pavlikus@gmail.com',9035624271,'phone','Ожидаю звонка.','files/','all',1654771022),(78,'Виолетта','Волочкова','violetavolk@mail.ru',9253628712,'phone','Добрый день! Нужна консультация.','files/er.png','all',1654771118),(79,'Мирина','Ландышева','landysh@mail.ru',8982563717,'email','Здравствуйте! Жду обратного звонка','files/','all',1654771142),(80,'Татьяна','Косьян','tanecika@mail.ru',89601523545,'phone','Здравствуйте! Жду обратного звонка','files/lab.jpg','all',1655118767),(81,'Евгения','Беркут','berkut@yandex.ru',9612859497,'phone','Добрый день! Нужна консультация.','files/lab.jpg','all',1655123345);
/*!40000 ALTER TABLE `feedback_result` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-15 14:34:38
