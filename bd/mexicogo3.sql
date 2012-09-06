/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.5.15-log : Database - mexigo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`mexigo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mexigo`;

/*Table structure for table `agent_location` */

DROP TABLE IF EXISTS `agent_location`;

CREATE TABLE `agent_location` (
  `age_id` int(11) DEFAULT NULL,
  `age_country` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT '	',
  `reg_id` int(11) DEFAULT NULL,
  `cit_id` int(11) DEFAULT NULL,
  KEY `fk_mexi_agent_location_mexi_agents1_idx` (`age_id`),
  KEY `fk_mexi_agent_location_mexi_regions1_idx` (`reg_id`),
  KEY `fk_mexi_agent_location_mexi_cities1_idx` (`cit_id`),
  CONSTRAINT `fk_agent_location_agents10` FOREIGN KEY (`age_id`) REFERENCES `agents` (`age_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agent_location_cities10` FOREIGN KEY (`cit_id`) REFERENCES `cities` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agent_location_regions20` FOREIGN KEY (`reg_id`) REFERENCES `regions` (`reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `agent_location` */

LOCK TABLES `agent_location` WRITE;

UNLOCK TABLES;

/*Table structure for table `agent_profile_page` */

DROP TABLE IF EXISTS `agent_profile_page`;

CREATE TABLE `agent_profile_page` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `age_id` int(11) DEFAULT NULL,
  `pro_logo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_company` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_website` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_phone2` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_phone1` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_dsc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_mexi_agent_profile_page_mexi_agents1_idx` (`age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `agent_profile_page` */

LOCK TABLES `agent_profile_page` WRITE;

UNLOCK TABLES;

/*Table structure for table `agents` */

DROP TABLE IF EXISTS `agents`;

CREATE TABLE `agents` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_id` int(11) DEFAULT NULL,
  `age_photo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_first_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_last_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_website` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_brokerage` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_profile_dsc` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_phone` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_mobile_phone` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `age_state` tinyint(1) DEFAULT '1' COMMENT '0 delete  1 activo',
  `age_public` tinyint(1) DEFAULT '0' COMMENT '0 unpublic   1 publicado',
  PRIMARY KEY (`age_id`),
  KEY `fk_agents_partners1_idx` (`par_id`),
  CONSTRAINT `fk_agents_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `agents` */

LOCK TABLES `agents` WRITE;

UNLOCK TABLES;

/*Table structure for table `amenities` */

DROP TABLE IF EXISTS `amenities`;

CREATE TABLE `amenities` (
  `ame_id` int(11) NOT NULL AUTO_INCREMENT,
  `ame_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`ame_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `amenities` */

LOCK TABLES `amenities` WRITE;

UNLOCK TABLES;

/*Table structure for table `appliances` */

DROP TABLE IF EXISTS `appliances`;

CREATE TABLE `appliances` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `appliances` */

LOCK TABLES `appliances` WRITE;

UNLOCK TABLES;

/*Table structure for table `buildings` */

DROP TABLE IF EXISTS `buildings`;

CREATE TABLE `buildings` (
  `bui_id` int(11) NOT NULL,
  `bui_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`bui_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `buildings` */

LOCK TABLES `buildings` WRITE;

UNLOCK TABLES;

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `cit_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `cit_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_title` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_body` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_img` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_lat` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_lon` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cit_id`),
  KEY `fk_mexi_cities_mexi_regions1_idx` (`reg_id`),
  CONSTRAINT `fk_cities_regions1` FOREIGN KEY (`reg_id`) REFERENCES `regions` (`reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `cities` */

LOCK TABLES `cities` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_calendarios` */

DROP TABLE IF EXISTS `core_calendarios`;

CREATE TABLE `core_calendarios` (
  `cal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cal_descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cal_vector_semanal` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `cal_vector_mensual` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `cal_hora_inicio` time NOT NULL,
  `cal_hora_fin` time NOT NULL,
  `cal_alta_fec` datetime NOT NULL,
  `cal_mod_fec` datetime NOT NULL,
  `cal_estatus` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_calendarios` */

LOCK TABLES `core_calendarios` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_ciudades` */

DROP TABLE IF EXISTS `core_ciudades`;

CREATE TABLE `core_ciudades` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `est_id` int(11) NOT NULL,
  PRIMARY KEY (`cd_id`),
  KEY `fk_core_ciudades_core_estados1_idx` (`est_id`),
  CONSTRAINT `fk_core_ciudades_core_estados1` FOREIGN KEY (`est_id`) REFERENCES `core_estados` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=634 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_ciudades` */

LOCK TABLES `core_ciudades` WRITE;

insert  into `core_ciudades`(`cd_id`,`cd_nombre`,`est_id`) values (1,'Abasolo',11),(2,'Acala',7),(3,'Acámbaro',11),(4,'Acaponeta',18),(5,'Acapulco de Juárez',12),(6,'Acatlán de Juárez',14),(7,'Acatlán de Osorio',21),(8,'Acayucan',30),(9,'Actopan',13),(10,'Agua dulce',30),(11,'Agua Prieta',26),(12,'Aguaruto',25),(13,'Aguascalientes',1),(14,'Ahome',25),(15,'Ahuacatlán',18),(16,'Ahualulco de Mercado',14),(17,'Ajijic',14),(18,'Allende',5),(19,'Almoloya de Juárez',15),(20,'Altamira',28),(21,'Altotonga',30),(22,'Alvarado',30),(23,'Amatepec',15),(24,'Ameca',14),(25,'Amozoc',21),(26,'Anáhuac',19),(27,'Ángel R. Cabada',30),(28,'Angostura',25),(29,'Apan',13),(30,'Apaseo el Grande',11),(31,'Apatzingán de la Constitución',16),(32,'Apizaco',29),(33,'Arandas',14),(34,'Arcelia',12),(35,'Arriaga',7),(36,'Arteaga',5),(37,'Asientos',1),(38,'Asunción Nochixtlán',20),(39,'Atlixco',21),(40,'Atotonilco el Alto',14),(41,'Atoyac',30),(42,'Atoyac de Álvarez',12),(43,'Autlán de Navarro',14),(44,'Ayutla de los Libres',12),(45,'Azoyú',12),(46,'Bacalar',23),(47,'Bachíniva',8),(48,'Bahias de Huatulco',20),(49,'Banderilla',30),(50,'Boca del RÍo',30),(51,'Bucerías',18),(52,'Buenavista de Cuellar',12),(53,'Cabo San Lucas',3),(54,'Cacahoatán',7),(55,'Cadereyta Jiménez',19),(56,'Calkini',4),(57,'Calpulalpan',29),(58,'Calvillo',1),(59,'Canatlán',10),(60,'Cancún',23),(61,'Candelaria',4),(62,'Capulhuac',15),(63,'Cárdenas',24),(64,'Cárdenas',27),(65,'Carlos A. Carrillo',30),(66,'Castaños',5),(67,'Catemaco',30),(68,'Cazones de Herrera',30),(69,'Cedral',24),(70,'Celaya',11),(71,'Cerritos',24),(72,'Cerro Azul',30),(73,'Chahuites',20),(74,'Chalco de Díaz Covarrubias',15),(75,'Champotón',4),(76,'Chapala',14),(77,'Charcas',24),(78,'Chetumal',23),(79,'Chiapa de Corzo',7),(80,'Chiautempan',29),(81,'Chiconcuac',15),(82,'Chihuahua',8),(83,'Chilapa de Álvarez',12),(84,'Chilpancingo de los Bravo',12),(85,'Chimalhuacán',15),(86,'Choix',25),(87,'Ciénega de Flores',19),(88,'Cihuatlán',14),(89,'Cintalapa de Figueroa',7),(90,'Ciudad Acuña',5),(91,'Ciudad Adolfo López Mateos',15),(92,'Ciudad Altamirano',12),(93,'Ciudad Apaxtla de Castrejón',12),(94,'Ciudad Apodaca',19),(95,'Ciudad Benito Juárez',19),(96,'Ciudad Camargo',28),(97,'Ciudad Constitución',3),(98,'Ciudad Cuauhtémoc',32),(99,'Ciudad de Armería',6),(100,'Ciudad de Fray Bernardino de Sahagún',13),(101,'Ciudad de Villa de Álvarez',6),(102,'Ciudad del Carmen',4),(103,'Ciudad del Maíz',24),(104,'Ciudad General Escobedo',19),(105,'Ciudad Gustavo Díaz Ordaz',28),(106,'Ciudad Guzmán',14),(107,'Ciudad Hidalgo',16),(108,'Ciudad Ixtepec',20),(109,'Ciudad Lázaro Cárdenas',16),(110,'Ciudad Lerdo',10),(111,'Ciudad Madero',28),(112,'Ciudad Mante',28),(113,'Ciudad Melchor Múzquiz',5),(114,'Ciudad Miguel Alemán',28),(115,'Ciudad Nezahualcoyotl',15),(116,'Ciudad Obregón',26),(117,'Ciudad Río Bravo',28),(118,'Ciudad Sabinas Hidalgo',19),(119,'Ciudad Santa Catarina',19),(120,'Ciudad Serdán',21),(121,'Ciudad Tula',28),(122,'Ciudad Valles',24),(123,'Ciudad Victoria',28),(124,'Coacalco de Berriozabal',15),(125,'Coatepec',30),(126,'Coatzacoalcos',30),(127,'Coatzintla',30),(128,'Cocula',14),(129,'Colima',6),(130,'Colonia Anáhuac',8),(131,'Colotlán',14),(132,'Comalcalco',27),(133,'Comitán de Domínguez',7),(134,'Comonfort',11),(135,'Compostela',18),(136,'Copala',12),(137,'Córdoba',30),(138,'Cortazar',11),(139,'Cosalá',25),(140,'Cosamaloapan',30),(141,'Cosío',1),(142,'Cosolapa',20),(143,'Cosoleacaque',30),(144,'Cotija de la Paz',16),(145,'Coyuca de Benítez',12),(146,'Coyuca de Catalán',12),(147,'Cozumel',23),(148,'Cruz Azul',13),(149,'Cruz Grande',12),(150,'Cuajinicuilapa',12),(151,'Cuatro Ciénegas de Carranza',5),(152,'Cuauhtémoc',8),(153,'Cuautitlán',15),(154,'Cuautitlán Izcalli',15),(155,'Cuautla (Cuautla de Morelos)',17),(156,'Cuautlancingo',21),(157,'Cuerámaro',11),(158,'Cuernavaca',17),(159,'Cuichapa',30),(160,'Cuitláhuac',30),(161,'Cuitzeo del Porvenir',16),(162,'Culiacán Rosales',25),(163,'Cunduacán',27),(164,'Cutzamala de Pinzón',12),(165,'Delicias',8),(166,'Doctor Arroyo',19),(167,'C3?bano',24),(168,'Ecatepec de Morelos',15),(169,'El Camarón',20),(170,'El cercado',19),(171,'El Grullo',14),(172,'El Higo',30),(173,'El Naranjo',24),(174,'El Pueblito',22),(175,'El Quince (San José el Quince)',14),(176,'El rosario',25),(177,'El Salto',10),(178,'Emiliano Zapata',27),(179,'Empalme',26),(180,'Empalme Escobedo (Escobedo)',11),(181,'Ensenada',2),(182,'Escárcega',4),(183,'Escuinapa de Hidalgo',25),(184,'Estación Manuel (C3?rsulo Galván)',28),(185,'Estación Naranjo',25),(186,'Etzatlán',14),(187,'Felipe Carrillo Puerto',23),(188,'Fortín de las Flores',30),(189,'Fracción el Refugio',24),(190,'Francisco I. Madero',10),(191,'Francisco I. Madero (Chávez)',5),(192,'Francisco I. Madero (Puga)',18),(193,'Fresnillo',32),(194,'Frontera',5),(195,'Frontera',27),(196,'Galeana',17),(197,'García',19),(198,'General Miguel Alemán (Potrero Nuevo)',30),(199,'Gómez Palacio',10),(200,'González',28),(201,'Guadalajara',14),(202,'Guadalupe',19),(203,'Guadalupe',32),(204,'Guamúchil',25),(205,'Guanajuato',11),(206,'Guasave',25),(207,'Guerrero Negro',3),(208,'Gutiérrez Zamora',30),(209,'Hecelchakán',4),(210,'Hermosillo',26),(211,'Heroica Caborca',26),(212,'Heroica Ciudad de Cananea',26),(213,'Heroica Ciudad de Ejutla de Crespo',20),(214,'Heroica Ciudad de Huajuapan de León',20),(215,'Heroica Ciudad de Tlaxiaco',20),(216,'Heroica Guaymas',26),(217,'Heroica Matamoros',28),(218,'Heroica Mulegé',3),(219,'Heroica Nogales',26),(220,'Heroica Zitácuaro',16),(221,'Hidalgo del Parral',8),(222,'Higuera de Zaragoza',25),(223,'Hopelchén',4),(224,'Hualahuises',19),(225,'Huamantla',29),(226,'Huamuxtitlan',12),(227,'Huanímaro',11),(228,'Huatabampo',26),(229,'Huatusco de Chicuellar',30),(230,'Huauchinango',21),(231,'Huayacocotla',30),(232,'Huejuquilla el Alto',14),(233,'Huejutla de Reyes',13),(234,'Huetamo de Núñez',16),(235,'Huiloapan de Cuauhtémoc',30),(236,'Huimanguillo',27),(237,'Huitzuco',12),(238,'Huixquilucan de Degollado',15),(239,'Huixtla',7),(240,'Iguala de la Independencia',12),(241,'Irapuato',11),(242,'Isla',30),(243,'Isla Mujeres',23),(244,'Ixmiquilpan',13),(245,'Ixtaczoquitlán',30),(246,'Ixtapaluca',15),(247,'Ixtlán del Río',18),(248,'Izúcar de Matamoros',21),(249,'Jacona de Plancarte',16),(250,'Jala',18),(251,'Jalostotitlán',14),(252,'Jalpa',32),(253,'Jalpa de Méndez',27),(254,'Jáltipan de Morelos',30),(255,'Jamay',14),(256,'Jaumave',28),(257,'Jerécuaro',11),(258,'Jerez de García Salinas',32),(259,'Jesús María',1),(260,'Jiquilpan de Juárez',16),(261,'Jiquipilas',7),(262,'Jocotepec',14),(263,'Jojutla',17),(264,'José Cardel',30),(265,'José Mariano Jiménez',8),(266,'Juan Aldama',8),(267,'Juan Aldama',32),(268,'Juan Díaz Covarrubias',30),(269,'Juan Rodríguez Clara',30),(270,'Juárez',8),(271,'Juchitán (Juchitán de Zaragoza)',20),(272,'Juchitepec de Mariano Riva Palacio',15),(273,'Kantunilkín',23),(274,'La Barca',14),(275,'La Cruz',25),(276,'La Paz',3),(277,'La peñita de Jaltemba',18),(278,'La piedad de Cabadas',16),(279,'La Resolana',14),(280,'La Unión',12),(281,'Lagos de Moreno',14),(282,'Lagunas',20),(283,'Las Choapas',30),(284,'Las Guacamayas',16),(285,'Las Margaritas',7),(286,'Las Pintitas',14),(287,'Las Rosas',7),(288,'Las Varas',18),(289,'León de los Aldama',11),(290,'Lerdo de Tejada',30),(291,'Lic. Benito Juárez (Campo Gobierno)',25),(292,'Linares',19),(293,'Loma Bonita',20),(294,'Loreto',3),(295,'Loreto',32),(296,'Los Mochis',25),(297,'Los Reyes Acaquilpan (La Paz)',15),(298,'Los Reyes de Salgado',16),(299,'Luis Moya',32),(300,'Macuspana',27),(301,'Madera',8),(302,'Magdalena',14),(303,'Magdalena de Kino',26),(304,'Manuel Ojinaga',8),(305,'Manzanillo',6),(306,'Mapastepec',7),(307,'Maravatío de Ocampo',16),(308,'Mariscala de Juárez',20),(309,'Marquelia',12),(310,'Matamoros',5),(311,'Matehuala',24),(312,'Matías Romero Avendaño',20),(313,'Mazatlán',25),(314,'Melchor Ocampo',15),(315,'Mérida',31),(316,'Metepec',15),(317,'Mexicali',2),(318,'Miahuatlán de Porfirio Díaz',20),(319,'Minatitlán',30),(320,'Mocorito',25),(321,'Monclova',5),(322,'Montemorelos',19),(323,'Monterrey',19),(324,'Morelia',16),(325,'Morelos',5),(326,'Moroleón',11),(327,'Motozintla de Mendoza',7),(328,'Motul de Carrillo Puerto',31),(329,'Moyahua de Estrada',32),(330,'Nadadores',5),(331,'Naranjos',30),(332,'Natividad',20),(333,'Naucalpan de Juárez',15),(334,'Nava',5),(335,'Navojoa',26),(336,'Navolato',25),(337,'Nochistlán de Mejía',32),(338,'Nogales',30),(339,'Nombre de Dios',10),(340,'Nueva Ciudad Guerrero',28),(341,'Nueva Italia de Ruiz',16),(342,'Nueva Rosita',5),(343,'Nuevo Casas Grandes',8),(344,'Nuevo Laredo',28),(345,'Oaxaca de Juárez',20),(346,'Ocosingo',7),(347,'Ocotito',12),(348,'Ocotlán',14),(349,'Ocotlán de Morelos',20),(350,'Ocoyoacac',15),(351,'Ocozocoautla de Espinosa',7),(352,'Ojocaliente',32),(353,'Olinalá',12),(354,'Orizaba',30),(355,'Pabellón de Arteaga',1),(356,'Pachuca de Soto',13),(357,'Palenque',7),(358,'Pánuco',30),(359,'Papantla de Olarte',30),(360,'Paracho de Verduzco',16),(361,'Paraíso',27),(362,'Paraje Nuevo',30),(363,'Parras de la Fuente',5),(364,'Paso de Ovejas',30),(365,'Paso del Macho',30),(366,'Pátzcuaro',16),(367,'Pénjamo',11),(368,'Peñón Blanco',10),(369,'Petatlán',12),(370,'Pichucalco',7),(371,'Piedras Negras',5),(372,'Pijijiapan',7),(373,'Platón Sánchez',30),(374,'Playa del Carmen',23),(375,'Playa Vicente',30),(376,'Playas de Rosarito',2),(377,'Pomuch',4),(378,'Poncitlán',14),(379,'Poza Rica de Hidalgo',30),(380,'Puebla (Heroica Puebla)',21),(381,'Puente de Ixtla',17),(382,'Puerto Adolfo López Mateos',3),(383,'Puerto Escondido',20),(384,'Puerto Madero (San Benito)',7),(385,'Puerto Peñasco',26),(386,'Puerto Vallarta',14),(387,'Purísima de Bustos',11),(388,'Puruándiro',16),(389,'Putla Villa de Guerrero',20),(390,'Querétaro',22),(391,'Quila',25),(392,'Ramos Arizpe',5),(393,'Reforma',7),(394,'Reynosa',28),(395,'Rincón de Romos',1),(396,'Rincón de Tamayo',11),(397,'Río Blanco',30),(398,'Río Grande',32),(399,'Río Grande o Piedra Parada',20),(400,'Rioverde',24),(401,'Rodolfo Sánchez T. (Maneadero)',2),(402,'Romita',11),(403,'Ruiz',18),(404,'Sabancuy',4),(405,'Sabinas',5),(406,'Sahuayo de Morelos',16),(407,'Salamanca',11),(408,'Salina Cruz',20),(409,'Salinas de Hidalgo',24),(410,'Saltillo',5),(411,'Salvatierra',11),(412,'San Andrés Cholula',21),(413,'San Andrés Tuxtla',30),(414,'San Blas',18),(415,'San Blas',25),(416,'San Blas Atempa',20),(417,'San Buenaventura',5),(418,'San Cristóbal de las Casas',7),(419,'San Diego de Alejandría',14),(420,'San Felipe',2),(421,'San Felipe Jalapa de Díaz',20),(422,'San Fernando',28),(423,'San Francisco de Campeche',4),(424,'San Francisco de los Romo',1),(425,'San Francisco del Rincón',11),(426,'San Francisco Ixhuatán',20),(427,'San Francisco Telixtlahuaca',20),(428,'San Ignacio',3),(429,'San Ignacio',25),(430,'San Ignacio Cerro Gordo',14),(431,'San Jerónimo de Juárez',12),(432,'San José del Cabo',3),(433,'San José el Verde (El Verde)',14),(434,'San Juan Bautista Cuicatlán',20),(435,'San Juan Bautista lo de Soto',20),(436,'San Juan Bautista Tuxtepec',20),(437,'San Juan Bautista Valle Nacional',20),(438,'San Juan Cacahuatepec',20),(439,'San Juan de los Lagos',14),(440,'San Juan del Rio',22),(441,'San Juan del Río del Centauro del Norte',10),(442,'San Julián',14),(443,'San Luis Acatlán',12),(444,'San Luis de la Loma',12),(445,'San Luis de la Paz',11),(446,'San Luis Potosí',24),(447,'San Luis Río Colorado',26),(448,'San Luis San Pedro',12),(449,'San Marcos',12),(450,'San Martín Texmelucan de Labastida',21),(451,'San Mateo Atenco',15),(452,'San miguel de Allende',11),(453,'San Miguel el Alto',14),(454,'San Miguel el Grande',20),(455,'San Nicolás de los Garza',19),(456,'San Pablo Huitzo',20),(457,'San Pablo Villa de Mitla',20),(458,'San Pedro',5),(459,'San Pedro Cholula',21),(460,'San Pedro Garza García',19),(461,'San pedro Lagunillas',18),(462,'San Pedro Mixtepec -Dto. 22-',20),(463,'San Pedro Pochutla',20),(464,'San Pedro Tapanatepec',20),(465,'San Pedro Totolapa',20),(466,'San Rafael',30),(467,'San Sebastián Tecomaxtlahuaca',20),(468,'San Vicente Chicoloapan de Juárez',15),(469,'Santa Cruz Itundujia',20),(470,'Santa María del Oro',10),(471,'Santa María del Río',24),(472,'Santa María Huatulco',20),(473,'Santa Maria Tultepec',15),(474,'Santa Rosa Treinta',17),(475,'Santa Rosalía de Camargo',8),(476,'Santiago',19),(477,'Santiago Ixcuintla',18),(478,'Santiago Jamiltepec',20),(479,'Santiago Juxtlahuaca',20),(480,'Santiago Maravatío',11),(481,'Santiago Papasquiaro',10),(482,'Santiago Pinotepa Nacional',20),(483,'Santiago Suchilquitongo',20),(484,'Santiago Tulantepec',13),(485,'Santiago Tuxtla',30),(486,'Santo Domingo Tehuantepec',20),(487,'Saucillo',8),(488,'Sayula',14),(489,'Sihuapan',30),(490,'Silao',11),(491,'Sinaloa de Leyva',25),(492,'Soledad de Doblado',30),(493,'Soledad de Graciano Sánchez',24),(494,'Sombrerete',32),(495,'Sonoita',26),(496,'Soto la Marina',28),(497,'Tacámbaro de Codallos',16),(498,'Tala',14),(499,'Talpa de Allende',14),(500,'Tamasopo',24),(501,'Tamazula de Gordiano',14),(502,'Tamazunchale',24),(503,'Tampico',28),(504,'Tampico Alto',30),(505,'Tamuin',24),(506,'Tangancícuaro de Arista',16),(507,'Tantoyuca',30),(508,'Tapachula de Córdova y Ordóñez',7),(509,'Tarandacuao',11),(510,'Taxco de Alarcón',12),(511,'Teapa',27),(512,'Tecalitlán',14),(513,'Tecamac de Felipe Villanueva',15),(514,'Tecamachalco',21),(515,'Tecate',2),(516,'Tecoman',6),(517,'Técpan de Galeana',12),(518,'Tecuala',18),(519,'Tehuacan',21),(520,'Tejupilco de Hidalgo',15),(521,'Teloloapan',12),(522,'Tempoal de Sánchez',30),(523,'Tenosique de Pino Suárez',27),(524,'Teocaltiche',14),(525,'Teotitlán de Flores Magón',20),(526,'Tepatitlán de Morelos',14),(527,'Tepeaca',21),(528,'Tepeapulco',13),(529,'Tepecoacuilco de Trujano',12),(530,'Tepeji del Rio',13),(531,'Tepezalá',1),(532,'Tepic',18),(533,'Tepotzotlán',15),(534,'Tequila',14),(535,'Tequixquiac',15),(536,'Texcoco de Mora',15),(537,'Teziutlan',21),(538,'Tezonapa',30),(539,'Ticul',31),(540,'Tierra Blanca',30),(541,'Tierra Colorada',12),(542,'Tierra Nueva',24),(543,'Tihuatlán',30),(544,'Tijuana',2),(545,'Tixtla de Guerrero',12),(546,'Tizayuca',13),(547,'Tizimín',31),(548,'Tlacojalpan',30),(549,'Tlacolula de Matamoros',20),(550,'Tlajomulco de Zúñiga',14),(551,'Tlalixtaquilla',12),(552,'Tlalnepantla de Baz',15),(553,'Tlapa de Comonfort',12),(554,'Tlapacoyan',30),(555,'Tlapehuala',12),(556,'Tlaquepaque',14),(557,'Tlaquiltenango',17),(558,'Tlaxcala (Tlaxcala de Xicotencatl)',29),(559,'Tlaxcoapan',13),(560,'Todos Santos',3),(561,'Toluca de Lerdo',15),(562,'Tonalá',7),(563,'Tonalá',14),(564,'Topolobampo',25),(565,'Torreón',5),(566,'Tototlán',14),(567,'Tres Valles',30),(568,'Tula de Allende',13),(569,'Tulancingo',13),(570,'Tultitlán de Mariano Escobedo',15),(571,'Túxpam de Rodríguez Cano',30),(572,'Tuxpan',14),(573,'Tuxpan',16),(574,'Tuxpan',18),(575,'Tuxtla Gutiérrez',7),(576,'Unión de San Antonio',14),(577,'Unión Hidalgo',20),(578,'Uriangato',11),(579,'Uruapan',16),(580,'Valladolid',31),(581,'Valle de Chalco Solidaridad',15),(582,'Valle de Guadalupe',14),(583,'Valle de Santiago',11),(584,'Valle Hermoso',28),(585,'Valparaíso',32),(586,'Venustiano Carranza',7),(587,'Veracruz',30),(588,'Vicente Camalote',20),(589,'Vicente Guerrero',10),(590,'Víctor Rosales',32),(591,'Victoria de Durango',10),(592,'Viesca',5),(593,'Villa Alberto Andrés Alvarado Arámburo',3),(594,'Villa Corona',14),(595,'Villa de Cos',32),(596,'Villa de Reyes',24),(597,'Villa de Tamazulápam del Progreso',20),(598,'Villa de Zaachila',20),(599,'Villa Hidalgo',14),(600,'Villa Hidalgo',32),(601,'Villa Hidalgo (El Nuevo)',18),(602,'Villa Nicolás Romero',15),(603,'Villa Sola de Vega',20),(604,'Villa Unión',25),(605,'Villa Vicente Guerrero',29),(606,'Villaflores',7),(607,'Villagrán',11),(608,'Villahermosa',27),(609,'Villanueva',32),(610,'Xalapa-Enríquez',30),(611,'Xalisco',18),(612,'Xicoténcatl',28),(613,'Xicotepec',21),(614,'Xonacatlán',15),(615,'Yahualica de González Gallo',14),(616,'Yecuatla',30),(617,'Yurécuaro',16),(618,'Yuriria',11),(619,'Zacapu',16),(620,'Zacatecas',32),(621,'Zacatepec de Hidalgo',17),(622,'Zacatlán',21),(623,'Zacoalco de Torres',14),(624,'Zamora de Hidalgo',16),(625,'Zapopan',14),(626,'Zapotiltic',14),(627,'Zaragoza',5),(628,'Zihuatanejo',12),(629,'Zimapan',13),(630,'Zimatlán de Álvarez',20),(631,'Zinapécuaro de Figueroa',16),(632,'Zumpango',15),(633,'Zumpango del Río',12);

UNLOCK TABLES;

/*Table structure for table `core_estados` */

DROP TABLE IF EXISTS `core_estados`;

CREATE TABLE `core_estados` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `est_codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_estados` */

LOCK TABLES `core_estados` WRITE;

insert  into `core_estados`(`est_id`,`est_nombre`,`est_codigo`) values (1,'Aguascalientes',''),(2,'Baja California',''),(3,'Baja California Sur',''),(4,'Campeche',''),(5,'Coahuila',''),(6,'Colima',''),(7,'Chiapas',''),(8,'Chihuahua',''),(9,'Distrito Federal',''),(10,'Durango',''),(11,'Guanajuato',''),(12,'Guerrero',''),(13,'Hidalgo',''),(14,'Jalisco',''),(15,'M�xico',''),(16,'Michoac�n',''),(17,'Morelos',''),(18,'Nayarit',''),(19,'Nuevo Le�n',''),(20,'Oaxaca',''),(21,'Puebla',''),(22,'Quer�taro',''),(23,'Quintana Roo',''),(24,'San Luis Potos�',''),(25,'Sinaloa',''),(26,'Sonora',''),(27,'Tabasco',''),(28,'Tamaulipas',''),(29,'Tlaxcala',''),(30,'Veracruz',''),(31,'Yucat�n',''),(32,'Zacatecas','');

UNLOCK TABLES;

/*Table structure for table `core_log_prioridad_cat` */

DROP TABLE IF EXISTS `core_log_prioridad_cat`;

CREATE TABLE `core_log_prioridad_cat` (
  `log_prioridad_id` int(11) NOT NULL COMMENT 'Llave primaria para esta tabla y foranea para la tabla art_log',
  `log_prioridad_dsc` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del tipo de prioridad para el registro en la tabla art_log',
  PRIMARY KEY (`log_prioridad_id`),
  UNIQUE KEY `log_prioridad_dsc` (`log_prioridad_dsc`),
  UNIQUE KEY `log_prioridad_id` (`log_prioridad_id`),
  UNIQUE KEY `log_prioridad_id_2` (`log_prioridad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Catalogo que contiene los tipos de prioridad para ser usados';

/*Data for the table `core_log_prioridad_cat` */

LOCK TABLES `core_log_prioridad_cat` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_logs` */

DROP TABLE IF EXISTS `core_logs`;

CREATE TABLE `core_logs` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `log_usuario_id` bigint(20) NOT NULL,
  `log_prioridad_id` int(11) NOT NULL,
  `log_insertado_fec` datetime NOT NULL,
  `log_ip` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `log_dsc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_prioridad_id_idx` (`log_prioridad_id`),
  CONSTRAINT `log_prioridad_id` FOREIGN KEY (`log_prioridad_id`) REFERENCES `core_log_prioridad_cat` (`log_prioridad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para llevar el control de los logs usando la metodolog';

/*Data for the table `core_logs` */

LOCK TABLES `core_logs` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_menus` */

DROP TABLE IF EXISTS `core_menus`;

CREATE TABLE `core_menus` (
  `men_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `men_padre` int(10) unsigned NOT NULL,
  `men_nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `men_url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_modulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_parametros` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_visible` tinyint(3) unsigned DEFAULT '1',
  `men_orden` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_menus` */

LOCK TABLES `core_menus` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_parametros` */

DROP TABLE IF EXISTS `core_parametros`;

CREATE TABLE `core_parametros` (
  `core_parametros_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` bigint(20) DEFAULT NULL,
  `core_parametros_nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `core_parametros_dsc` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `core_parametros_valor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `core_parametros_tipo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `core_parametros_alta_fec` datetime DEFAULT NULL,
  `core_parametros_cambio_fec` datetime DEFAULT NULL,
  `core_parametros_registro` tinyint(1) DEFAULT NULL,
  `core_parametros_estatus` tinyint(1) DEFAULT NULL,
  `core_parametros_editable` tinyint(1) DEFAULT NULL,
  `core_parametros_slug` char(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`core_parametros_id`),
  UNIQUE KEY `par_nombre` (`core_parametros_nombre`),
  UNIQUE KEY `core_parametros_slug_UNIQUE` (`core_parametros_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene los paramatros que seran cargados en la m';

/*Data for the table `core_parametros` */

LOCK TABLES `core_parametros` WRITE;

insert  into `core_parametros`(`core_parametros_id`,`usu_id`,`core_parametros_nombre`,`core_parametros_dsc`,`core_parametros_valor`,`core_parametros_tipo`,`core_parametros_alta_fec`,`core_parametros_cambio_fec`,`core_parametros_registro`,`core_parametros_estatus`,`core_parametros_editable`,`core_parametros_slug`) values (1,NULL,'PriceFeatureListingsSinglePartner',NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,'PriceFeatureListingsSinglePartner');

UNLOCK TABLES;

/*Table structure for table `core_privilegios_acl_cat` */

DROP TABLE IF EXISTS `core_privilegios_acl_cat`;

CREATE TABLE `core_privilegios_acl_cat` (
  `pri_id` int(11) NOT NULL AUTO_INCREMENT,
  `pri_dsc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pri_id`),
  UNIQUE KEY `pri_dsc` (`pri_dsc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de los privilegios';

/*Data for the table `core_privilegios_acl_cat` */

LOCK TABLES `core_privilegios_acl_cat` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_recursos_acl_cat` */

DROP TABLE IF EXISTS `core_recursos_acl_cat`;

CREATE TABLE `core_recursos_acl_cat` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_dsc` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `rec_desc` (`rec_dsc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_recursos_acl_cat` */

LOCK TABLES `core_recursos_acl_cat` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_roles_acl_cat` */

DROP TABLE IF EXISTS `core_roles_acl_cat`;

CREATE TABLE `core_roles_acl_cat` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_dsc` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rol_id`),
  UNIQUE KEY `rol_desc` (`rol_dsc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_roles_acl_cat` */

LOCK TABLES `core_roles_acl_cat` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_roles_recursos_privilegios_rel` */

DROP TABLE IF EXISTS `core_roles_recursos_privilegios_rel`;

CREATE TABLE `core_roles_recursos_privilegios_rel` (
  `rol_id` int(1) NOT NULL,
  `rec_id` int(4) NOT NULL,
  `pri_id` int(11) NOT NULL COMMENT 'Id del privilegio',
  `rel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rol_id`,`rec_id`,`pri_id`),
  UNIQUE KEY `rel_id` (`rel_id`),
  KEY `core_recursos_acl_cat` (`rec_id`),
  KEY `core_privilegios_acl_cat` (`pri_id`),
  KEY `fk_core_roles_recursos_privilegios_rel_core_roles_acl_cat1_idx` (`rol_id`),
  CONSTRAINT `core_privilegios_acl_cat` FOREIGN KEY (`pri_id`) REFERENCES `core_privilegios_acl_cat` (`pri_id`),
  CONSTRAINT `core_recursos_acl_cat` FOREIGN KEY (`rec_id`) REFERENCES `core_recursos_acl_cat` (`rec_id`),
  CONSTRAINT `fk_core_roles_recursos_privilegios_rel_core_roles_acl_cat1` FOREIGN KEY (`rol_id`) REFERENCES `core_roles_acl_cat` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_roles_recursos_privilegios_rel` */

LOCK TABLES `core_roles_recursos_privilegios_rel` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_session` */

DROP TABLE IF EXISTS `core_session`;

CREATE TABLE `core_session` (
  `ses_id` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `ses_modified` int(11) DEFAULT NULL,
  `ses_lifetime` int(11) DEFAULT NULL,
  `ses_data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`ses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_session` */

LOCK TABLES `core_session` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_set_info_abaut` */

DROP TABLE IF EXISTS `core_set_info_abaut`;

CREATE TABLE `core_set_info_abaut` (
  `core_set_info_abaut_id` int(11) NOT NULL AUTO_INCREMENT,
  `core_set_info_abaut_nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`core_set_info_abaut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_set_info_abaut` */

LOCK TABLES `core_set_info_abaut` WRITE;

insert  into `core_set_info_abaut`(`core_set_info_abaut_id`,`core_set_info_abaut_nombre`) values (1,'All Mexi-Go! Packages'),(2,'Packages for Businesses'),(3,'Brokerage packages'),(4,'Real estate listings'),(5,'Online ads (Banners)'),(6,'Print magazine'),(7,'Online-magazine');

UNLOCK TABLES;

/*Table structure for table `core_set_info_abaut_usuario` */

DROP TABLE IF EXISTS `core_set_info_abaut_usuario`;

CREATE TABLE `core_set_info_abaut_usuario` (
  `core_set_info_abaut_usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `core_set_info_abaut_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  PRIMARY KEY (`core_set_info_abaut_usuario_id`),
  KEY `fk_core_set_info_abaut_usuario_core_set_info_abaut1_idx` (`core_set_info_abaut_id`),
  KEY `fk_core_set_info_abaut_usuario_core_usuarios1_idx` (`usu_id`),
  CONSTRAINT `fk_core_set_info_abaut_usuario_core_set_info_abaut1` FOREIGN KEY (`core_set_info_abaut_id`) REFERENCES `core_set_info_abaut` (`core_set_info_abaut_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_core_set_info_abaut_usuario_core_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `core_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_set_info_abaut_usuario` */

LOCK TABLES `core_set_info_abaut_usuario` WRITE;

insert  into `core_set_info_abaut_usuario`(`core_set_info_abaut_usuario_id`,`core_set_info_abaut_id`,`usu_id`) values (1,1,31),(2,2,31),(3,3,31),(4,4,31);

UNLOCK TABLES;

/*Table structure for table `core_transacciones` */

DROP TABLE IF EXISTS `core_transacciones`;

CREATE TABLE `core_transacciones` (
  `tra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tra_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tra_dsc` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tra_bitacora` tinyint(3) unsigned NOT NULL,
  `tra_modulo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tra_modelo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tra_metodo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cal_id` int(11) unsigned NOT NULL,
  `tra_estatus` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`tra_id`),
  UNIQUE KEY `tra_nombre` (`tra_nombre`),
  KEY `calendario` (`cal_id`),
  CONSTRAINT `core_calendario_cat` FOREIGN KEY (`cal_id`) REFERENCES `core_calendarios` (`cal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_transacciones` */

LOCK TABLES `core_transacciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_usuarios` */

DROP TABLE IF EXISTS `core_usuarios`;

CREATE TABLE `core_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(4) NOT NULL,
  `usu_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usu_nick` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usu_contrasena` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_celular` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `usu_creacion_fec` datetime NOT NULL,
  `usu_img` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_id_estado` tinyint(4) DEFAULT NULL,
  `usu_recibe_ofertas` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_nick` (`usu_correo`),
  UNIQUE KEY `usu_nick_2` (`usu_correo`),
  UNIQUE KEY `usu_correo` (`usu_correo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `core_usuarios` */

LOCK TABLES `core_usuarios` WRITE;

insert  into `core_usuarios`(`usu_id`,`rol_id`,`usu_nombre`,`usu_apellidos`,`usu_nick`,`usu_contrasena`,`usu_celular`,`usu_telefono`,`usu_correo`,`usu_creacion_fec`,`usu_img`,`usu_id_estado`,`usu_recibe_ofertas`) values (31,2,'nazart','jara huaaman','nazartj@gmail.com','645$$82$$4297f44b13955235245b2497399d7a93',NULL,NULL,'nazartj@gmail.com','2012-08-29 22:50:09',NULL,NULL,NULL),(32,2,'nazart jara huaman','jara','nazartj@12aoms.com','215$$443$$4297f44b13955235245b2497399d7a93',NULL,NULL,'nazartj@12aoms.com','2012-08-30 08:02:36',NULL,NULL,NULL),(33,2,'asdfasf','asfdasf','nazartj@aoms.com','461$$591$$4297f44b13955235245b2497399d7a93',NULL,NULL,'nazartj@aoms.com','2012-08-30 08:04:38',NULL,NULL,NULL),(34,2,'nazart',' jara huaman','nazartjarahuaman@gmail.com','213$$843$$4297f44b13955235245b2497399d7a93',NULL,NULL,'nazartjarahuaman@gmail.com','2012-08-31 10:21:23',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `features` */

DROP TABLE IF EXISTS `features`;

CREATE TABLE `features` (
  `fea_id` int(11) NOT NULL,
  `fea_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`fea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `features` */

LOCK TABLES `features` WRITE;

UNLOCK TABLES;

/*Table structure for table `mexi_banners` */

DROP TABLE IF EXISTS `mexi_banners`;

CREATE TABLE `mexi_banners` (
  `mexi_banners_id` int(11) NOT NULL AUTO_INCREMENT,
  `mexi_banners_price` float DEFAULT NULL,
  `mexi_banners_type_id` int(11) NOT NULL,
  `mexi_banners_nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mexi_banners_position_id` int(11) NOT NULL,
  PRIMARY KEY (`mexi_banners_id`),
  KEY `fk_mexi_banners_mexi_banners_type1_idx` (`mexi_banners_type_id`),
  KEY `fk_mexi_banners_mexi_banners_position1_idx` (`mexi_banners_position_id`),
  CONSTRAINT `fk_mexi_banners_mexi_banners_position1` FOREIGN KEY (`mexi_banners_position_id`) REFERENCES `mexi_banners_position` (`mexi_banners_position_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mexi_banners_mexi_banners_type1` FOREIGN KEY (`mexi_banners_type_id`) REFERENCES `mexi_banners_type` (`mexi_banners_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_banners` */

LOCK TABLES `mexi_banners` WRITE;

insert  into `mexi_banners`(`mexi_banners_id`,`mexi_banners_price`,`mexi_banners_type_id`,`mexi_banners_nombre`,`mexi_banners_position_id`) values (1,NULL,1,'Half Banner 234 x 60',1),(2,NULL,1,'Leaderboard 728 x 90',2),(3,NULL,1,'Medium Rectangle 300 x 250t',3),(4,NULL,1,'Slideshow Banner 728 x 90',4),(5,NULL,2,'Half Banner 234 x 60',1),(6,NULL,2,'Leaderboard 728 x 90',2),(7,NULL,2,'Medium Rectangle 300 x 250t',3),(8,NULL,2,'Slideshow Banner 728 x 90',4);

UNLOCK TABLES;

/*Table structure for table `mexi_banners_partners` */

DROP TABLE IF EXISTS `mexi_banners_partners`;

CREATE TABLE `mexi_banners_partners` (
  `ban_fec_ini` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ban_fec_end` timestamp NULL DEFAULT NULL,
  `ban_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  PRIMARY KEY (`par_id`,`ban_id`),
  KEY `fk_mexi_banners_partners_partners1_idx` (`par_id`),
  KEY `fk_mexi_banners_partners_mexi_banners1_idx` (`ban_id`),
  CONSTRAINT `fk_mexi_banners_partners_mexi_banners1` FOREIGN KEY (`ban_id`) REFERENCES `mexi_banners` (`mexi_banners_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mexi_banners_partners_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_banners_partners` */

LOCK TABLES `mexi_banners_partners` WRITE;

UNLOCK TABLES;

/*Table structure for table `mexi_banners_position` */

DROP TABLE IF EXISTS `mexi_banners_position`;

CREATE TABLE `mexi_banners_position` (
  `mexi_banners_position_id` int(11) NOT NULL AUTO_INCREMENT,
  `mexi_banners_position_name` char(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mexi_banners_position_id`),
  UNIQUE KEY `mexi_banners_position_name_UNIQUE` (`mexi_banners_position_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_banners_position` */

LOCK TABLES `mexi_banners_position` WRITE;

UNLOCK TABLES;

/*Table structure for table `mexi_banners_type` */

DROP TABLE IF EXISTS `mexi_banners_type`;

CREATE TABLE `mexi_banners_type` (
  `mexi_banners_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `mexi_banners_type_nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`mexi_banners_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_banners_type` */

LOCK TABLES `mexi_banners_type` WRITE;

insert  into `mexi_banners_type`(`mexi_banners_type_id`,`mexi_banners_type_nombre`) values (1,'HomePage'),(2,'InternaPage');

UNLOCK TABLES;

/*Table structure for table `mexi_informative_pages` */

DROP TABLE IF EXISTS `mexi_informative_pages`;

CREATE TABLE `mexi_informative_pages` (
  `pag_id` int(11) NOT NULL AUTO_INCREMENT,
  `pag_title` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pag_body` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pag_img` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pag_menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`pag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_informative_pages` */

LOCK TABLES `mexi_informative_pages` WRITE;

UNLOCK TABLES;

/*Table structure for table `mexi_partners_packages_cat` */

DROP TABLE IF EXISTS `mexi_partners_packages_cat`;

CREATE TABLE `mexi_partners_packages_cat` (
  `pac_id` int(11) NOT NULL,
  `pac_dsc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pac_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pac_type` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pac_listings` int(11) DEFAULT NULL,
  `pac_agents` int(11) DEFAULT NULL,
  PRIMARY KEY (`pac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mexi_partners_packages_cat` */

LOCK TABLES `mexi_partners_packages_cat` WRITE;

UNLOCK TABLES;

/*Table structure for table `partner_billing` */

DROP TABLE IF EXISTS `partner_billing`;

CREATE TABLE `partner_billing` (
  `bil_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_id` int(11) DEFAULT NULL,
  `bil_company_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_rfc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_mail` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_suit_apt_unit` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_city` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_country` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_state_province` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_zip_postal_code` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bil_phone` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`bil_id`),
  KEY `fk_partner_billing_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_billing_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_billing` */

LOCK TABLES `partner_billing` WRITE;

UNLOCK TABLES;

/*Table structure for table `partner_files` */

DROP TABLE IF EXISTS `partner_files`;

CREATE TABLE `partner_files` (
  `fil_id` int(11) NOT NULL AUTO_INCREMENT,
  `fil_title` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fil_source` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fil_order` int(11) DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`fil_id`),
  KEY `fk_partner_files_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_files_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_files` */

LOCK TABLES `partner_files` WRITE;

insert  into `partner_files`(`fil_id`,`fil_title`,`fil_source`,`fil_order`,`par_id`) values (7,'NAZAR001','fileProfiler1_31.pdf',NULL,31);

UNLOCK TABLES;

/*Table structure for table `partner_imgs` */

DROP TABLE IF EXISTS `partner_imgs`;

CREATE TABLE `partner_imgs` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_title` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_source` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_order` int(11) DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`img_id`),
  KEY `fk_partner_imgs_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_imgs_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_imgs` */

LOCK TABLES `partner_imgs` WRITE;

UNLOCK TABLES;

/*Table structure for table `partner_location` */

DROP TABLE IF EXISTS `partner_location`;

CREATE TABLE `partner_location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_id` int(11) DEFAULT NULL,
  `loc_address` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loc_sute_apt_unit` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loc_country` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loc_state` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cit_id` int(11) DEFAULT NULL COMMENT '	',
  `reg_id` int(11) DEFAULT NULL,
  `loc_zip_posta_code` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loc_lat` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `loc_lon` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`loc_id`),
  KEY `fk_mexi_partner_location_mexi_regions1_idx` (`reg_id`),
  KEY `fk_mexi_partner_location_mexi_cities1_idx` (`cit_id`),
  KEY `fk_partner_location_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_location_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_location` */

LOCK TABLES `partner_location` WRITE;

insert  into `partner_location`(`loc_id`,`par_id`,`loc_address`,`loc_sute_apt_unit`,`loc_country`,`loc_state`,`cit_id`,`reg_id`,`loc_zip_posta_code`,`loc_lat`,`loc_lon`) values (14,31,'asdasdasd','asdasdasd',NULL,NULL,17,0,'asdasd','asdasd','asdasdads');

UNLOCK TABLES;

/*Table structure for table `partner_other_type_account` */

DROP TABLE IF EXISTS `partner_other_type_account`;

CREATE TABLE `partner_other_type_account` (
  `par_other_type_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_other_type_account_name` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_profiler_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`par_other_type_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_other_type_account` */

LOCK TABLES `partner_other_type_account` WRITE;

insert  into `partner_other_type_account`(`par_other_type_account_id`,`par_other_type_account_name`,`par_profiler_default`) values (1,'Banking',NULL),(2,'Beauty Salons',NULL),(3,'Airline',NULL),(4,'Construccion / renoval',NULL),(5,'Cosmetic surgery',NULL),(6,'Fashion and retail',NULL),(7,'Property management',NULL);

UNLOCK TABLES;

/*Table structure for table `partner_package_available` */

DROP TABLE IF EXISTS `partner_package_available`;

CREATE TABLE `partner_package_available` (
  `par_id` int(11) NOT NULL,
  `pac_id` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `disponibles` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usados` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`par_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_package_available` */

LOCK TABLES `partner_package_available` WRITE;

UNLOCK TABLES;

/*Table structure for table `partner_packages_informative` */

DROP TABLE IF EXISTS `partner_packages_informative`;

CREATE TABLE `partner_packages_informative` (
  `part_pack_infor_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_pack_infor_name` char(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `part_pack_infor_descripcion` text COLLATE utf8_spanish_ci,
  `part_pack_infor_details` text COLLATE utf8_spanish_ci,
  `part_pack_infor_type` char(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`part_pack_infor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_packages_informative` */

LOCK TABLES `partner_packages_informative` WRITE;

insert  into `partner_packages_informative`(`part_pack_infor_id`,`part_pack_infor_name`,`part_pack_infor_descripcion`,`part_pack_infor_details`,`part_pack_infor_type`) values (1,'SILVER PACKAGE','informacion del paquete SILVER PACKAGE','informacion del paquete SILVER PACKAGE','BROKERAGE'),(2,'GOLD PACKAGE','informacion del paquete GOLD PACKAGE','informacion del paquete GOLD PACKAGE','BROKERAGE'),(3,'DIAMOND PACKAGE','informacion del paquete DIAMOND PACKAGE','informacion del paquete DIAMOND PACKAGE','BROKERAGE'),(4,'BASIC PARTNERSHIP','informacion del paquete BASIC PARTNERSHIP','informacion del paquete BASIC PARTNERSHIP','PARTNERSHIP'),(5,'SMALL BUSINESS PARTNERSHIP','informacion del paquete SMALL BUSINESS PARTNERSHIP','informacion del paquete SMALL BUSINESS PARTNERSHIP','PARTNERSHIP'),(6,'SILVER PARTNERSHIP','informacion del paquete SILVER PARTNERSHIP','informacion del paquete SILVER PARTNERSHIP','PARTNERSHIP'),(7,'GOLD PARTNERSHIP','informacion del paquete GOLD PARTNERSHIP','informacion del paquete GOLD PARTNERSHIP','PARTNERSHIP'),(8,'DIAMOND PARTNERSHIP','informacion del paquete DIAMOND PARTNERSHIP','informacion del paquete DIAMOND PARTNERSHIP','PARTNERSHIP');

UNLOCK TABLES;

/*Table structure for table `partner_payment` */

DROP TABLE IF EXISTS `partner_payment`;

CREATE TABLE `partner_payment` (
  `par_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_pay_first_name` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `par_pay_last_name` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_phone` char(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_company_name` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_rfc` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_mail` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_suite_ap_uni` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_pay_state_id` int(11) DEFAULT NULL,
  `par_pay_zip` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_id` int(11) NOT NULL,
  `par_date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`par_pay_id`),
  KEY `fk_partner_payment_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_payment_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_payment` */

LOCK TABLES `partner_payment` WRITE;

insert  into `partner_payment`(`par_pay_id`,`par_pay_first_name`,`par_pay_last_name`,`par_pay_phone`,`par_pay_company_name`,`par_pay_rfc`,`par_pay_mail`,`par_pay_suite_ap_uni`,`par_pay_state_id`,`par_pay_zip`,`par_id`,`par_date_create`) values (1,'adssdd','asdasd','123-123-123','','','','',NULL,'',31,NULL);

UNLOCK TABLES;

/*Table structure for table `partner_profile` */

DROP TABLE IF EXISTS `partner_profile`;

CREATE TABLE `partner_profile` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_id` int(11) DEFAULT NULL,
  `prof_logo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_company` char(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_email` char(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_website` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_phone2` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_phone1` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_dsc` text COLLATE utf8_spanish_ci,
  `prof_phone_desc1` char(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_phone_desc2` char(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_phone3` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prof_phone_desc3` char(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`prof_id`),
  KEY `fk_partner_profile_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_profile_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_profile` */

LOCK TABLES `partner_profile` WRITE;

insert  into `partner_profile`(`prof_id`,`par_id`,`prof_logo`,`prof_company`,`prof_email`,`prof_website`,`prof_phone2`,`prof_phone1`,`prof_dsc`,`prof_phone_desc1`,`prof_phone_desc2`,`prof_phone3`,`prof_phone_desc3`) values (1,31,NULL,'nazart jara huaman asd','nazartjb@gsmil.com','www.google.com','123-123-123','123-123-123','nazart jara huaman asd asdadasd asdasdaasdas                                                                                                                                                                                                                                                                                             ','phone','phone','123-66-5','phone');

UNLOCK TABLES;

/*Table structure for table `partner_videos` */

DROP TABLE IF EXISTS `partner_videos`;

CREATE TABLE `partner_videos` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_title` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vid_type` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vid_order` int(11) DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  `vid_uri` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`vid_id`),
  KEY `fk_partner_videos_partners1_idx` (`par_id`),
  CONSTRAINT `fk_partner_videos_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partner_videos` */

LOCK TABLES `partner_videos` WRITE;

insert  into `partner_videos`(`vid_id`,`vid_title`,`vid_type`,`vid_order`,`par_id`,`vid_uri`) values (165,NULL,'Youtube',NULL,31,'http://www.youtube.com/watch?v=iOrCQ7vVmP8&feature=g-all-esi'),(166,NULL,'Youtube',NULL,31,'http://www.youtube.com/watch?v=TtAUr2-DBLk&feature=fvwrel');

UNLOCK TABLES;

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `par_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) DEFAULT NULL,
  `par_nickname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `par_email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `par_full_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_chief` int(11) DEFAULT NULL,
  `par_acount_type_id` int(11) NOT NULL,
  `par_flag_partner_profiler` tinyint(1) DEFAULT NULL COMMENT 'si es que es un partner de tipo real estate o es uno de tipo publicitario.',
  `par_other_type_account_id` int(11) DEFAULT NULL,
  `par_state` tinyint(4) DEFAULT NULL,
  `par_flag_customer` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`par_id`),
  KEY `fk_partners_core_usuarios1_idx` (`usu_id`),
  KEY `fk_partner_chief_idx` (`par_chief`),
  KEY `fk_partners_partners_acount_type1_idx` (`par_acount_type_id`),
  KEY `fk_partners_partner_other_type_account1_idx` (`par_other_type_account_id`),
  CONSTRAINT `fk_partners_core_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `core_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partners_partners_acount_type1` FOREIGN KEY (`par_acount_type_id`) REFERENCES `partners_acount_type` (`part_acount_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partners_partner_other_type_account1` FOREIGN KEY (`par_other_type_account_id`) REFERENCES `partner_other_type_account` (`par_other_type_account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_chief` FOREIGN KEY (`par_chief`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partners` */

LOCK TABLES `partners` WRITE;

insert  into `partners`(`par_id`,`usu_id`,`par_nickname`,`par_email`,`par_full_name`,`par_chief`,`par_acount_type_id`,`par_flag_partner_profiler`,`par_other_type_account_id`,`par_state`,`par_flag_customer`) values (28,31,'nazartj@gmail.com','nazartj@gmail.com',NULL,NULL,2,NULL,NULL,NULL,0),(29,32,'nazartj@12aoms.com','nazartj@12aoms.com',NULL,NULL,2,NULL,NULL,NULL,0),(30,33,'nazartj@aoms.com','nazartj@aoms.com',NULL,NULL,2,NULL,NULL,NULL,0),(31,34,'nazartjarahuaman@gmail.com','nazartjarahuaman@gmail.com',NULL,NULL,2,NULL,NULL,NULL,1);

UNLOCK TABLES;

/*Table structure for table `partners_acount_type` */

DROP TABLE IF EXISTS `partners_acount_type`;

CREATE TABLE `partners_acount_type` (
  `part_acount_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_acount_type_nom` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `part_acuount_type_descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`part_acount_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Pueden ser:\n	1. Single Real Estate Agent\n	2. Brokerage Account\n	3. Real Estate Development\n	4. Other';

/*Data for the table `partners_acount_type` */

LOCK TABLES `partners_acount_type` WRITE;

insert  into `partners_acount_type`(`part_acount_type_id`,`part_acount_type_nom`,`part_acuount_type_descripcion`) values (1,'Single Real Estate Agent','Single Real Estate Agent'),(2,'Brokerage Account','Brokerage Account'),(3,'Real Estate Development','Real Estate Development');

UNLOCK TABLES;

/*Table structure for table `partners_categories` */

DROP TABLE IF EXISTS `partners_categories`;

CREATE TABLE `partners_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cat_dsc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partners_categories` */

LOCK TABLES `partners_categories` WRITE;

insert  into `partners_categories`(`cat_id`,`cat_name`,`cat_dsc`) values (1,'Real estate',NULL),(2,'Travel',NULL),(3,'Retirement',NULL),(4,'Living',NULL),(5,'Parteners',NULL);

UNLOCK TABLES;

/*Table structure for table `partners_categories_rel` */

DROP TABLE IF EXISTS `partners_categories_rel`;

CREATE TABLE `partners_categories_rel` (
  `cat_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `partners_categories_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`partners_categories_rel_id`),
  KEY `fk_mexi_partners_categories_rel_mexi_partners1_idx` (`par_id`),
  KEY `fk_partners_categories_rel_partners_categories1_idx` (`cat_id`),
  CONSTRAINT `fk_partners_categories_rel_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partners_categories_rel_partners_categories1` FOREIGN KEY (`cat_id`) REFERENCES `partners_categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partners_categories_rel` */

LOCK TABLES `partners_categories_rel` WRITE;

insert  into `partners_categories_rel`(`cat_id`,`par_id`,`partners_categories_rel_id`) values (2,31,2),(3,31,3),(4,31,4);

UNLOCK TABLES;

/*Table structure for table `partners_subcategories` */

DROP TABLE IF EXISTS `partners_subcategories`;

CREATE TABLE `partners_subcategories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sub_dsc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partners_subcategories` */

LOCK TABLES `partners_subcategories` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties` */

DROP TABLE IF EXISTS `properties`;

CREATE TABLE `properties` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_status` char(20) COLLATE utf8_spanish_ci DEFAULT 'ANY' COMMENT '0 no avaible  1 avaible',
  `pro_price` decimal(10,2) DEFAULT NULL COMMENT '1 = yes ',
  `pro_house_details` decimal(10,2) DEFAULT NULL,
  `pro_land_details` decimal(10,2) unsigned DEFAULT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  `details_house_id` tinyint(4) DEFAULT NULL,
  `details_land_id` tinyint(4) DEFAULT NULL,
  `bedroom` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `style` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `garage` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `view` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recreational_areas` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bathrooms` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `keyword` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` text COLLATE utf8_spanish_ci,
  `size` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL,
  `cd_id` int(11) DEFAULT NULL,
  `title` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `zip` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `latitud` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `longitud` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `suit_apa_unit` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `listing_status_id` int(11) NOT NULL,
  `property_style_id` int(11) NOT NULL,
  `property_view_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`),
  UNIQUE KEY `size_UNIQUE` (`size`),
  KEY `fk_properties_regions1_idx` (`reg_id`),
  KEY `fk_properties_agents1_idx` (`age_id`),
  KEY `fk_properties_partners1_idx` (`par_id`),
  KEY `fk_properties_property_type1_idx` (`property_type_id`),
  KEY `fk_properties_core_estados1_idx` (`est_id`),
  KEY `fk_properties_core_ciudades1_idx` (`cd_id`),
  KEY `fk_properties_property_listing_status1_idx` (`listing_status_id`),
  KEY `fk_properties_property_style1_idx` (`property_style_id`),
  KEY `fk_properties_property_view1_idx` (`property_view_id`),
  CONSTRAINT `fk_properties_regions1` FOREIGN KEY (`reg_id`) REFERENCES `regions` (`reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_core_estados1` FOREIGN KEY (`est_id`) REFERENCES `core_estados` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_core_ciudades1` FOREIGN KEY (`cd_id`) REFERENCES `core_ciudades` (`cd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_property_style1` FOREIGN KEY (`property_style_id`) REFERENCES `property_style` (`property_style_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_property_view1` FOREIGN KEY (`property_view_id`) REFERENCES `property_view` (`property_view_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_property_listing_status1` FOREIGN KEY (`listing_status_id`) REFERENCES `property_listing_status` (`property_listing_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_property_type1` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`property_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties` */

LOCK TABLES `properties` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties_amenities_rel` */

DROP TABLE IF EXISTS `properties_amenities_rel`;

CREATE TABLE `properties_amenities_rel` (
  `ame_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `properties_amenities_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`properties_amenities_rel_id`),
  KEY `fk_properties_amenities_rel_amenities1_idx` (`ame_id`),
  KEY `fk_properties_amenities_rel_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_properties_amenities_rel_amenities1` FOREIGN KEY (`ame_id`) REFERENCES `amenities` (`ame_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_amenities_rel_properties2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties_amenities_rel` */

LOCK TABLES `properties_amenities_rel` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties_appliances_rel` */

DROP TABLE IF EXISTS `properties_appliances_rel`;

CREATE TABLE `properties_appliances_rel` (
  `app_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `properties_appliances_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`properties_appliances_rel_id`),
  KEY `fk_mexi_properties_appliances_rel_mexi_appliances1_idx` (`app_id`),
  KEY `fk_properties_appliances_rel_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_properties_appliances_rel_appliances` FOREIGN KEY (`app_id`) REFERENCES `appliances` (`app_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_appliances_rel_properties1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties_appliances_rel` */

LOCK TABLES `properties_appliances_rel` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties_buildings_rel` */

DROP TABLE IF EXISTS `properties_buildings_rel`;

CREATE TABLE `properties_buildings_rel` (
  `properties_buildings_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `bui_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`properties_buildings_rel_id`),
  KEY `fk_properties_buildings_rel_buildings1_idx` (`bui_id`),
  KEY `fk_properties_buildings_rel_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_properties_buildings_rel_buildings1` FOREIGN KEY (`bui_id`) REFERENCES `buildings` (`bui_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_buildings_rel_properties1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties_buildings_rel` */

LOCK TABLES `properties_buildings_rel` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties_favorites` */

DROP TABLE IF EXISTS `properties_favorites`;

CREATE TABLE `properties_favorites` (
  `pro_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `fav_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usu_id`,`pro_id`),
  KEY `fk_properties_favorites_properties1_idx` (`pro_id`),
  KEY `fk_properties_favorites_core_usuarios1_idx` (`usu_id`),
  CONSTRAINT `fk_properties_favorites_core_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `core_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_favorites_properties2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties_favorites` */

LOCK TABLES `properties_favorites` WRITE;

UNLOCK TABLES;

/*Table structure for table `properties_features_rel` */

DROP TABLE IF EXISTS `properties_features_rel`;

CREATE TABLE `properties_features_rel` (
  `fea_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `properties_features_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`properties_features_rel_id`),
  KEY `fk_mexi_properties_features_rel_mexi_features1_idx` (`fea_id`),
  KEY `fk_properties_features_rel_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_properties_features_rel_features` FOREIGN KEY (`fea_id`) REFERENCES `features` (`fea_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_features_rel_properties1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `properties_features_rel` */

LOCK TABLES `properties_features_rel` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_files` */

DROP TABLE IF EXISTS `property_files`;

CREATE TABLE `property_files` (
  `fil_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL,
  `fil_title` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fil_source` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fil_order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`fil_id`),
  KEY `fk_property_files_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_property_files_properties2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `property_files` */

LOCK TABLES `property_files` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_imgs` */

DROP TABLE IF EXISTS `property_imgs`;

CREATE TABLE `property_imgs` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `pro_id` int(11) DEFAULT NULL,
  `img_title` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_source` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`img_id`),
  KEY `fk_mexi_property_media_mexi_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_property_imgs_properties1` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `property_imgs` */

LOCK TABLES `property_imgs` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_listing_status` */

DROP TABLE IF EXISTS `property_listing_status`;

CREATE TABLE `property_listing_status` (
  `property_listing_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_listing_status_name` char(200) DEFAULT NULL,
  PRIMARY KEY (`property_listing_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `property_listing_status` */

LOCK TABLES `property_listing_status` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_style` */

DROP TABLE IF EXISTS `property_style`;

CREATE TABLE `property_style` (
  `property_style_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_style_name` char(150) DEFAULT NULL,
  PRIMARY KEY (`property_style_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `property_style` */

LOCK TABLES `property_style` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_type` */

DROP TABLE IF EXISTS `property_type`;

CREATE TABLE `property_type` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_name` char(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `property_type` */

LOCK TABLES `property_type` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_videos` */

DROP TABLE IF EXISTS `property_videos`;

CREATE TABLE `property_videos` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `pro_id` int(11) DEFAULT NULL,
  `vid_title` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vid_source` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vid_order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`vid_id`),
  KEY `fk_mexi_property_media_mexi_properties1_idx` (`pro_id`),
  CONSTRAINT `fk_property_videos_properties2` FOREIGN KEY (`pro_id`) REFERENCES `properties` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `property_videos` */

LOCK TABLES `property_videos` WRITE;

UNLOCK TABLES;

/*Table structure for table `property_view` */

DROP TABLE IF EXISTS `property_view`;

CREATE TABLE `property_view` (
  `property_view_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_view_name` char(150) DEFAULT NULL,
  PRIMARY KEY (`property_view_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `property_view` */

LOCK TABLES `property_view` WRITE;

UNLOCK TABLES;

/*Table structure for table `regions` */

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(45) DEFAULT NULL,
  `reg_param_id` varchar(45) DEFAULT NULL,
  `reg_type` int(11) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `fk_regions_type_region1_idx` (`reg_type`),
  CONSTRAINT `fk_regions_type_region1` FOREIGN KEY (`reg_type`) REFERENCES `type_region` (`type_region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `regions` */

LOCK TABLES `regions` WRITE;

UNLOCK TABLES;

/*Table structure for table `single_agent_packages` */

DROP TABLE IF EXISTS `single_agent_packages`;

CREATE TABLE `single_agent_packages` (
  `single_agent_packages_id` int(11) NOT NULL AUTO_INCREMENT,
  `single_agent_packages_name` char(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `single_agent_packages_listing` tinyint(4) DEFAULT NULL,
  `single_agent_packages_permonth` tinyint(4) DEFAULT NULL,
  `single_agent_packages_each` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`single_agent_packages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `single_agent_packages` */

LOCK TABLES `single_agent_packages` WRITE;

insert  into `single_agent_packages`(`single_agent_packages_id`,`single_agent_packages_name`,`single_agent_packages_listing`,`single_agent_packages_permonth`,`single_agent_packages_each`) values (1,'pakage1',1,10,10),(2,'pakage1',5,40,8),(3,'pakage1',10,60,6),(4,'pakage1',20,100,5);

UNLOCK TABLES;

/*Table structure for table `single_agent_packages_partner` */

DROP TABLE IF EXISTS `single_agent_packages_partner`;

CREATE TABLE `single_agent_packages_partner` (
  `single_agent_packages_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `feature` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `date_register` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `listing` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  KEY `fk_single_agent_packages_partner_single_agent_packages1_idx` (`single_agent_packages_id`),
  KEY `fk_single_agent_packages_partner_partners1_idx` (`par_id`),
  CONSTRAINT `fk_single_agent_packages_partner_partners1` FOREIGN KEY (`par_id`) REFERENCES `partners` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_single_agent_packages_partner_single_agent_packages1` FOREIGN KEY (`single_agent_packages_id`) REFERENCES `single_agent_packages` (`single_agent_packages_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `single_agent_packages_partner` */

LOCK TABLES `single_agent_packages_partner` WRITE;

UNLOCK TABLES;

/*Table structure for table `type_region` */

DROP TABLE IF EXISTS `type_region`;

CREATE TABLE `type_region` (
  `type_region_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_region_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`type_region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `type_region` */

LOCK TABLES `type_region` WRITE;

insert  into `type_region`(`type_region_id`,`type_region_name`) values (1,'City'),(2,'Country'),(3,'State/Province');

UNLOCK TABLES;

/*Table structure for table `view_core_usuarios_partner` */

DROP TABLE IF EXISTS `view_core_usuarios_partner`;

/*!50001 DROP VIEW IF EXISTS `view_core_usuarios_partner` */;
/*!50001 DROP TABLE IF EXISTS `view_core_usuarios_partner` */;

/*!50001 CREATE TABLE `view_core_usuarios_partner` (
  `usu_id` int(11) NOT NULL DEFAULT '0',
  `rol_id` int(4) NOT NULL,
  `usu_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_nick` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_contrasena` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_creacion_fec` datetime NOT NULL,
  `usu_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_id_estado` tinyint(4) DEFAULT NULL,
  `grupo_usuario` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `par_id` int(11) NOT NULL DEFAULT '0',
  `par_nickname` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `par_email` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `par_full_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `par_chief` int(11) DEFAULT NULL,
  `par_flag_customer` tinyint(1) DEFAULT NULL,
  `par_acount_type_id` int(11) NOT NULL,
  `par_flag_partner_profiler` tinyint(1) DEFAULT NULL COMMENT 'si es que es un partner de tipo real estate o es uno de tipo publicitario.',
  `par_other_type_account_id` int(11) DEFAULT NULL,
  `par_state` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view view_core_usuarios_partner */

/*!50001 DROP TABLE IF EXISTS `view_core_usuarios_partner` */;
/*!50001 DROP VIEW IF EXISTS `view_core_usuarios_partner` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_core_usuarios_partner` AS (select `core_usuarios`.`usu_id` AS `usu_id`,`core_usuarios`.`rol_id` AS `rol_id`,`core_usuarios`.`usu_nombre` AS `usu_nombre`,`core_usuarios`.`usu_apellidos` AS `usu_apellidos`,`core_usuarios`.`usu_nick` AS `usu_nick`,`core_usuarios`.`usu_contrasena` AS `usu_contrasena`,`core_usuarios`.`usu_celular` AS `usu_celular`,`core_usuarios`.`usu_telefono` AS `usu_telefono`,`core_usuarios`.`usu_correo` AS `usu_correo`,`core_usuarios`.`usu_creacion_fec` AS `usu_creacion_fec`,`core_usuarios`.`usu_img` AS `usu_img`,`core_usuarios`.`usu_id_estado` AS `usu_id_estado`,'partner' AS `grupo_usuario`,`partners`.`par_id` AS `par_id`,`partners`.`par_nickname` AS `par_nickname`,`partners`.`par_email` AS `par_email`,`partners`.`par_full_name` AS `par_full_name`,`partners`.`par_chief` AS `par_chief`,`partners`.`par_flag_customer` AS `par_flag_customer`,`partners`.`par_acount_type_id` AS `par_acount_type_id`,`partners`.`par_flag_partner_profiler` AS `par_flag_partner_profiler`,`partners`.`par_other_type_account_id` AS `par_other_type_account_id`,`partners`.`par_state` AS `par_state` from (`partners` join `core_usuarios` on((`partners`.`usu_id` = `core_usuarios`.`usu_id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
