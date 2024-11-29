CREATE DATABASE  IF NOT EXISTS `overcrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `overcrud`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: overcrud
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `fantasia` varchar(64) DEFAULT NULL,
  `responsavel` varchar(64) DEFAULT NULL,
  `idenderecoemp` int(11) DEFAULT NULL,
  PRIMARY KEY (`idempresa`),
  KEY `empresas_ibfk_1` (`idenderecoemp`),
  CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`idenderecoemp`) REFERENCES `enderecos` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (0,'- NENHUMA -','- NENHUM -','- NENHUM -','- NENHUM -','- NENHUM -',0),(1,'123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','(12) 12345-1234','12.123.123/1234-12','123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64',1),(2,'AA INDÚSTRIA DE ALIMENTOS EIRELI','(11) 11111-1111','11.111.111/1111-11','Alves & Andrade Alimentos','Amanda Alves Albuquerque',2),(3,'BARBATTO COMÉRCIO DE VIGAS METÁLICAS ME','(22) 2222-2222','22.222.222/2222-22','Bárbaros Vigas Metálicas','Bruno Barbatto',3),(4,'CARLOS & FILHOS EPP','(33) 33333-3333','33.333.333/3333-33','Carlinhos Consultoria','Carlos Almeida Albuquerque Júnior',3),(5,'Eduardo Decor & Style Eireli','(55) 5555-5555','55.555.555/5555-55','EduDecor','Eduardo Esteves Evangelista',2),(6,'FERNANDA HOTEL SOL & MAR EIRELLI','(66) 6666-6666','66.666.666/6666-66','Folhas & Frutos Hotel Colonial ','Fernanda Fernandes Ferreira',1),(7,'DRACENA MOTOR COMPANY','(44) 44444-4444','44.444.444/4444-44','Motor Shop & Repairs Dragon','Daniel McArthur',3),(45,'K A MAROSTICA & CIA LTDA','(19) 99271-3631','02.200.755/0001-65','Shangai Geek Gamer Store','Kaike A. Maróstica',56);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos` (
  `idendereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `logradouro` varchar(64) DEFAULT NULL,
  `numlogradouro` varchar(6) DEFAULT NULL,
  `bairro` varchar(32) NOT NULL,
  PRIMARY KEY (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (0,'00.000-000','- NENHUMA -','NA','- NENHUM -','NA','- NENHUM -'),(1,'13.600-001','Araras','SP','Avenida Dona Renata','11','Centro'),(2,'49.065-040','Aracaju','SE','Travessa Altamira','22','Industrial'),(3,'57.312-140','Arapiraca','AL','Praça da Bíblia','33','Santa Esmeralda'),(56,'13.600-001','Araras','SP','Avenida Dona Renata','3696','Centro'),(57,'13.607-183','Araras','SP','Rua José Salomé','06','Jardim Campestre'),(58,'13.600-420','Araras','SP','Rua Frei Galvão','22','Jardim Rollo');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `cnh` varchar(11) DEFAULT NULL,
  `carro` varchar(32) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `idempregadoem` int(11) DEFAULT NULL,
  `idenderecousu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idempregadoem` (`idempregadoem`),
  KEY `usuarios_ibfk_2` (`idenderecousu`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idempregadoem`) REFERENCES `empresas` (`idempresa`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idenderecousu`) REFERENCES `enderecos` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0,'Rafael Negretto Basckeira','(00) 00000-0000','000.000.000-00','$2y$10$g0XyjOC2SY6606TfcOAileGDVdFXQT1DAhlBfXFYzTC7pQMeIPW3a','','',1,0,0,1),(1,'Comum de Comum Common','(99) 99999-9999','999.999.999-99','$2y$10$JsZ5jSaNQg1RYCNoEW9X9OTDQOLYg3mYH0DuPvW9dD0zvuMKBaNxC','99999999999','Comummobile',0,0,0,2),(2,'123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','(12) 34567-8912','123.456.789-12','$2y$10$rQRTQwINHku1YJMDYi611ubnrParz1Qk7qb1rthID/8Lv4jCrvWZe','123456*8 11','123456*8 1235*16 123456789123*32',1,1,1,3),(3,'Alberto Aparecido Andrade','(11) 11111-1111','111.111.111-11','$2y$10$rSaft5oorhWZ85aQFjBlaOBkUOzONgR/zUFx6v/mHOuuZR/gMmBaO','111111111','Astra (Chevrolet)',0,1,2,3),(4,'Danilo Duarte','(44) 44445-5555','444.444.444-44','$2y$10$JPQp9J5.aHJlHgnJTPR6oex6kywnLt3bUELaG0NWAesi/QijTztRy','4444444444','Delrey Branco',0,1,3,2),(38,'Kaike A. Maróstica','(19) 98149-5187','345.085.788-61','$2y$10$eSEpRyFZrAMxaEN57ZOD8OF40IJhRpkRQmhj9Y9hBZOpWFnZrl8cC','24242424242','Onyx (Chevrolet)',1,1,45,57);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-29 11:33:11
