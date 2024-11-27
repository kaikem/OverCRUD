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
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`idenderecousu`) REFERENCES `enderecos` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--
LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (0,'- NENHUMA -','- NENHUM -','- NENHUM -','- NENHUM -','- NENHUM -',NULL,'',NULL,NULL,NULL,''),(1,'123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','(12) 35681-1234','123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','12.345.681/2341-61','123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','12.123-123','123456*8 1235*16 123456789123*32','SP','123456*8 1235*16 123456789123*32 1234567891234567891234567891*64','123456','123456*8 1235*16 123456789123*32'),(2,'AA INDÚSTRIA DE ALIMENTOS EIRELI','(11) 11111-1111','Alves & Andrade Alimentos','11.111.111/1111-11','Amanda Alves Albuquerque','11.111-111','Alagolândia','AL','Rua Alberto Alves','01','Alto da Colina'),(5,'BARBATTO COMÉRCIO DE VIGAS METÁLICAS ME','(22) 2222-2222','Bárbaros Vigas Metálicas','22.222.222/2222-22','Bruno Barbatto','22.222-222','Barbados','BA','Rua Bernado Barros','22','Barra Funda'),(3,'CARLOS & FILHOS EPP','(33) 33333-3333','Carlinhos Consultoria','33.333.333/3333-33','Carlos Almeida Albuquerque Júnior','33.333-333','Carajás','CE','Avenida Carlos Casagrande','333','Casa Amarela'),(4,'Eduardo Decor & Style Eireli','(55) 5555-5555','EduDecor','55.555.555/0001-55','Eduardo Esteves Evangelista','55.555-555','Espirópolis','ES','Alameda Euclides Eduardo','4444','Elias Ezequiel'),(5,'FERNANDA HOTEL SOL & MAR EIRELLI','(66) 6666-6666','Folhas & Frutos Hotel Colonial ','66.666.666/6666-66','Fernanda Fernandes Ferreira','66.666-666','Goiânia','GO','Rodovia Fernão Dias','55555','Facão'),(6,'DRACENA MOTOR COMPANY','(44) 44444-4444','Motor Shop & Repairs Dragon','02.200.755/0001-65','Daniel McArthur','13.600-001','Araras','SP','Avenida Dona Renata','4444','Centro');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
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
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idempregadoem`) REFERENCES `empresas` (`idempresa`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idenderecousu`) REFERENCES `enderecos` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--
LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0,'Rafael Negretto Basckeira','(00) 00000-0000','$2y$10$g0XyjOC2SY6606TfcOAileGDVdFXQT1DAhlBfXFYzTC7pQMeIPW3a','000.000.000-00','','',0,1,0,'Bonfim','RR','Rua Redentor','123456','Radial','69.380-000'),(1,'Comum de Comum Common','(99) 99999-9999','$2y$10$JsZ5jSaNQg1RYCNoEW9X9OTDQOLYg3mYH0DuPvW9dD0zvuMKBaNxC','082.236.760-28','99999999999','Comummobile',0,0,0,'',NULL,NULL,NULL,'',NULL),(2,'123456*8 1234*16 123456789101*32 12345678 1234567 12345678910*64','(12) 34567-8912','$2y$10$rQRTQwINHku1YJMDYi611ubnrParz1Qk7qb1rthID/8Lv4jCrvWZe','123.456.789-12','123456*8 12','123456*8 1235*16 123456789123*32',3,0,1,'123456*8 1235*16 123456789123*32','SP','123456*8 1235*16 123456789123*32 1234567891234567891234567891*64','123456','123456*8 1235*16 123456789123*32','12.123-123'),(3,'Alberto Aparecido Andrade','(11) 11111-1111','$2y$10$rSaft5oorhWZ85aQFjBlaOBkUOzONgR/zUFx6v/mHOuuZR/gMmBaO','111.111.111-11','1111111110','Astra (Chevrolet)',4,1,1,'Água Branca','AL','Rua Alves Penteado','1','Alameda Anjos','57.490-000'),(4,'Danilo Duarte','(44) 44445-5555','$2y$10$JPQp9J5.aHJlHgnJTPR6oex6kywnLt3bUELaG0NWAesi/QijTztRy','388.433.908-72','42345678910','Delrey Branco',35,0,1,'Brasília','DF','Praça dos Tribunais Superiores','4444','Asa Sul','70.070-080'),(5,'Kaike Maróstica','(19) 98149-5187','$2y$10$RIFbmfiGH0DXZdBLPpg8x.4Ovn.VPmzNFScG5Xn/CTLu/pBCDJ78q','345.085.788-61','12345678900','Onyx',3,0,1,'Araras','SP','Avenida Dona Renata','3696','Centro','13.600-001');
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

-- Dump completed on 2024-11-27 13:26:38
