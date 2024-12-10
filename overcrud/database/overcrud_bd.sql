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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (0,'- NENHUMA -','- NENHUM -','- NENHUM -','- NENHUM -','- NENHUM -',0),(2,'AA INDÚSTRIA DE ALIMENTOS EIRELI','(11) 11111-1111','18.321.987/0001-01','Alves & Andrade Alimentos','Amanda Alves Albuquerque',1),(3,'BARBATTO COMÉRCIO DE VIGAS METÁLICAS ME','(22) 2222-2222','22.128.116/0001-43','Vigas Metálicas Barbatto','Bruno Barbatto',2),(4,'CLÁUDIO & ASSOCIADOS EPP','(33) 33333-3333','32.266.634/0001-87','Claudinho Consultoria','Cláudio Almeida Albuquerque Júnior',3),(5,'MATHEUS DECOR & STYLE EIRELI','(55) 5555-5555','55.358.162/0001-98','MatDec','Matheus Esteves Evangelista',3),(6,'FERNANDA HOTEL SOL & MAR EIRELLI','(66) 6666-6666','64.993.427/0001-10','Folhas & Frutos Hotel Colonial ','Fernanda Fernandes Ferreira',58),(7,'DIEGO COMÉRCIO DE VESTUÁRIO EPP','(44) 44444-4444','47.352.004/0001-00','Diegostyle Urban Fashion','Diego McArthur',56),(51,'K A MAROSTICA & CIA LTDA','(19) 99271-3631','02.200.755/0001-65','Shangai Geek Gamer Store','Kaike A. Maróstica',57),(95,'RAFAELA COSMÉTICOS CAPILARES SA','(11) 3322-4455','82.673.423/0001-37','Rafa Beauty','Rafaela Hartmann',95),(96,'KAIKE TECHNOLOGICAL SOLUTIONS LTDA','(19) 3541-2725','21.602.688/0001-50','KaiTek Softwares','Kaike Maróstica',96),(97,'GRUPO EDUCACIONAL RODRIGO POMBO','(19) 98877-6655','74.671.417/0001-12','UniPombo','RPM28',97),(98,'FELIPE PETSHOP & PETCARE EPP','(19) 91122-3344','41.601.752/0001-95','FeliPET shop & care','Felipe JS',98);
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (0,'00.000-000','-NENHUMA-','NA','-NENHUMA-','NA','-NENHUMA-'),(1,'13.600-001','Araras','SP','Avenida Dona Renata','11','Centro'),(2,'08.295-360','São Paulo','SP','Rua Baixada Santista','22','Itaquera'),(3,'02.311-010','São Paulo','SP','Rua Comprida','33','Vila Mazzei'),(56,'05.010-040','São Paulo','SP','Rua Desembargador do Vale','56','Perdizes'),(57,'13.607-183','Araras','SP','Rua José Salomé','06','Jardim Campestre'),(58,'13.600-420','Araras','SP','Rua Frei Galvão','58','Jardim Rollo'),(94,'13.606-324','Araras','SP','Rua do Pedreiro','24','Jardim José Ometto I'),(95,'13.606-323','Araras','SP','Rua do Motorista','888','Jardim José Ometto I'),(96,'13.607-183','Araras','SP','Rua José Salomé','16','Jardim Campestre'),(97,'13.550-000','Analândia','SP','Rua da Cachoeira','1234','Cascata'),(98,'13.970-005','Itapira','SP','Praça Bernardino de Campos','4321','Centro'),(99,'27.949-316','Macaé','RJ','Rua Los Angeles','2233','Nova Cidade'),(100,'12.400-020','Pindamonhangaba','SP','Rua Martin Cabral','8','Centro');
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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0,'Admin de Administrador','(00) 00000-0000','000.000.000-00','$2y$10$g0XyjOC2SY6606TfcOAileGDVdFXQT1DAhlBfXFYzTC7pQMeIPW3a','','',1,0,0,3),(1,'Comum de Common','(99) 99999-9999','999.999.999-99','$2y$10$JsZ5jSaNQg1RYCNoEW9X9OTDQOLYg3mYH0DuPvW9dD0zvuMKBaNxC','99999999999','Comumobile',0,0,0,3),(3,'Alberto Aparecido Andrade','(11) 11111-1111','241.672.232-87','$2y$10$rSaft5oorhWZ85aQFjBlaOBkUOzONgR/zUFx6v/mHOuuZR/gMmBaO','111111111','Astra',0,0,0,1),(4,'Bruno Bueno','(22) 22222-2222','417.251.407-30','$2y$10$hNEKZtVuNaGD.ruVC8dDbueW7ZzFuRU6Igml2tqnqkAmanJ4Qneq2','22222222222','Belina',0,1,3,2),(40,'Kaike Augusto Maróstica','(19) 98149-5187','345.085.788-61','$2y$10$C7B7kmhwmFSnUtcQiIGpru2Q7TlFn3J3zAySGZNECUa0txYJoXHNK','11223344556','Onyx',1,1,51,57),(60,'Rafael Negretto Basckeira','(24) 2424-2424','352.231.396-82','$2y$10$8z/l/EvnkHiMXW6ZsyY6yevANkprE5FD6a8TRPYpLT2YZcF4lA7Vm','','',1,1,96,94),(61,'Felipe Rodrigo Mathias','(99) 98800-1122','211.684.761-35','$2y$10$Xekm7V2GgOrYnOLmIXM9nOsA2h4Z.EG/VmJVFRMmAgJPox0fJTK2u','1122334455','Fusca',0,1,97,98),(62,'Matheus Felipe Rodrigues','(11) 2222-3333','935.394.609-34','$2y$10$BvAbYB/3hDSBxGQbNG16Eu4fSviOqQ8gCELVchhvHgrh03u0Wka8i','987654789','Kombi',1,1,98,99),(63,'Rodrigo Matheus Felipélli','','469.817.658-10','$2y$10$4BHB1Hfy7WE1UGcezx/4qOky2njWwly1Dn8C88u.nStW3GUhPeYEy','2222233333','',0,1,5,100),(64,'Silvio da Silva Santos','(22) 55555-4444','876.678.373-92','$2y$10$NaHDhlmmbpRhrKxGZWkNPuZwPLtZvQELY.yNMVR79o493UjBIkkXC','92999299992','Silverado',0,1,96,2),(65,'Wagner Wellington Webber','','836.731.092-60','$2y$10$2Kva5o7A8gvYrvDfvi8oYeO5/UubaV5e26a/98.KlpmzjMnS4ZP56','99887766554','WRX',0,0,0,58),(66,'Pombinha Guerreira Martins','(11) 1111-1111','214.633.224-70','$2y$10$45zlrnPCLEDLLU4x/./TRO5DCeeX3UVbmlC3OgySv8R2QYwGKd2Nu','09876541111','Pontiac',0,1,2,96);
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

-- Dump completed on 2024-12-10 17:41:27
