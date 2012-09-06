SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mexigo` ;
CREATE SCHEMA IF NOT EXISTS `mexigo` DEFAULT CHARACTER SET latin1 ;
SHOW WARNINGS;
USE `mexigo` ;

-- -----------------------------------------------------
-- Table `core_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_usuarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_usuarios` (
  `usu_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `rol_id` INT(4) NOT NULL ,
  `usu_nombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `usu_apellidos` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `usu_nick` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `usu_contrasena` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `usu_celular` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `usu_telefono` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `usu_correo` VARCHAR(120) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `usu_creacion_fec` DATETIME NOT NULL ,
  `usu_img` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `usu_id_estado` TINYINT(4) NULL DEFAULT NULL ,
  `usu_recibe_ofertas` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`usu_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 35
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `usu_nick` ON `core_usuarios` (`usu_correo` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `usu_nick_2` ON `core_usuarios` (`usu_correo` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `usu_correo` ON `core_usuarios` (`usu_correo` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners_acount_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners_acount_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners_acount_type` (
  `part_acount_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `part_acount_type_nom` VARCHAR(45) NULL DEFAULT NULL ,
  `part_acuount_type_descripcion` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`part_acount_type_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COMMENT = 'Pueden ser:\n	1. Single Real Estate Agent\n	2. Brokerage Accou' /* comment truncated */;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_other_type_account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_other_type_account` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_other_type_account` (
  `par_other_type_account_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_other_type_account_name` CHAR(100) NULL ,
  `par_profiler_default` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`par_other_type_account_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners` (
  `par_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usu_id` INT(11) NULL DEFAULT NULL ,
  `par_nickname` VARCHAR(45) NOT NULL ,
  `par_email` VARCHAR(45) NOT NULL ,
  `par_full_name` VARCHAR(45) NULL DEFAULT NULL ,
  `par_chief` INT(11) NULL DEFAULT NULL ,
  `par_acount_type_id` INT(11) NOT NULL ,
  `par_flag_partner_profiler` TINYINT(1) NULL DEFAULT NULL COMMENT 'si es que es un partner de tipo real estate o es uno de tipo publicitario.' ,
  `par_other_type_account_id` INT(11) NULL DEFAULT NULL ,
  `par_state` TINYINT(4) NULL DEFAULT NULL ,
  `par_flag_customer` TINYINT(1) NULL DEFAULT '0' ,
  PRIMARY KEY (`par_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `agents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agents` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `agents` (
  `age_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `age_photo` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_first_name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_last_name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_email` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_website` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_brokerage` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_profile_dsc` VARCHAR(450) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_phone` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_mobile_phone` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `age_state` TINYINT(1) NULL DEFAULT '1' COMMENT '0 delete  1 activo' ,
  `age_public` TINYINT(1) NULL DEFAULT '0' COMMENT '0 unpublic   1 publicado' ,
  PRIMARY KEY (`age_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `type_region`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `type_region` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `type_region` (
  `type_region_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `type_region_name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`type_region_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `regions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regions` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `regions` (
  `reg_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `reg_name` VARCHAR(45) NULL DEFAULT NULL ,
  `reg_param_id` VARCHAR(45) NULL DEFAULT NULL ,
  `reg_type` INT(11) NOT NULL ,
  PRIMARY KEY (`reg_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `cities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cities` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `cities` (
  `cit_id` INT(11) NOT NULL ,
  `reg_id` INT(11) NULL DEFAULT NULL ,
  `cit_name` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_title` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_body` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_img` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_lat` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_lon` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`cit_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `agent_location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agent_location` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `agent_location` (
  `age_id` INT(11) NULL DEFAULT NULL ,
  `age_country` VARCHAR(45) NULL DEFAULT NULL COMMENT '	' ,
  `reg_id` INT(11) NULL DEFAULT NULL ,
  `cit_id` INT(11) NULL DEFAULT NULL )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `agent_profile_page`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agent_profile_page` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `agent_profile_page` (
  `pro_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `age_id` INT(11) NULL DEFAULT NULL ,
  `pro_logo` VARCHAR(100) NULL DEFAULT NULL ,
  `pro_company` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_email` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_website` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_phone2` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_phone1` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_dsc` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`pro_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_agent_profile_page_mexi_agents1_idx` ON `agent_profile_page` (`age_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `amenities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `amenities` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `amenities` (
  `ame_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ame_name` VARCHAR(45) NULL DEFAULT NULL ,
  `state` TINYINT(1) UNSIGNED NULL DEFAULT '1' ,
  PRIMARY KEY (`ame_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `appliances`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appliances` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `appliances` (
  `app_id` INT(11) NOT NULL ,
  `app_name` VARCHAR(45) NULL DEFAULT NULL ,
  `state` TINYINT(1) UNSIGNED NULL DEFAULT '1' ,
  PRIMARY KEY (`app_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buildings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buildings` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `buildings` (
  `bui_id` INT(11) NOT NULL ,
  `bui_name` VARCHAR(45) NULL DEFAULT NULL ,
  `state` TINYINT(1) UNSIGNED NULL DEFAULT '1' ,
  PRIMARY KEY (`bui_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_calendarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_calendarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_calendarios` (
  `cal_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cal_descripcion` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `cal_vector_semanal` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `cal_vector_mensual` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `cal_hora_inicio` TIME NOT NULL ,
  `cal_hora_fin` TIME NOT NULL ,
  `cal_alta_fec` DATETIME NOT NULL ,
  `cal_mod_fec` DATETIME NOT NULL ,
  `cal_estatus` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`cal_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_estados` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_estados` (
  `est_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `est_nombre` VARCHAR(30) NOT NULL ,
  `est_codigo` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`est_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_ciudades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_ciudades` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_ciudades` (
  `cd_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cd_nombre` VARCHAR(50) NOT NULL ,
  `est_id` INT(11) NOT NULL ,
  PRIMARY KEY (`cd_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 634
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_log_prioridad_cat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_log_prioridad_cat` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_log_prioridad_cat` (
  `log_prioridad_id` INT(11) NOT NULL COMMENT 'Llave primaria para esta tabla y foranea para la tabla art_log' ,
  `log_prioridad_dsc` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL COMMENT 'Descripcion del tipo de prioridad para el registro en la tabla art_log' ,
  PRIMARY KEY (`log_prioridad_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
COMMENT = 'Catalogo que contiene los tipos de prioridad para ser usados';

SHOW WARNINGS;
CREATE UNIQUE INDEX `log_prioridad_dsc` ON `core_log_prioridad_cat` (`log_prioridad_dsc` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `log_prioridad_id` ON `core_log_prioridad_cat` (`log_prioridad_id` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `log_prioridad_id_2` ON `core_log_prioridad_cat` (`log_prioridad_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_logs` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_logs` (
  `log_id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `log_usuario_id` BIGINT(20) NOT NULL ,
  `log_prioridad_id` INT(11) NOT NULL ,
  `log_insertado_fec` DATETIME NOT NULL ,
  `log_ip` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `log_dsc` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  PRIMARY KEY (`log_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
COMMENT = 'Tabla para llevar el control de los logs usando la metodolog';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_menus` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_menus` (
  `men_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `men_padre` INT(10) UNSIGNED NOT NULL ,
  `men_nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `men_url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `men_modulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `men_parametros` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `men_visible` TINYINT(3) UNSIGNED NULL DEFAULT '1' ,
  `men_orden` TINYINT(4) NULL DEFAULT '0' ,
  PRIMARY KEY (`men_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_swedish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_parametros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_parametros` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_parametros` (
  `core_parametros_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usu_id` BIGINT(20) NULL DEFAULT NULL ,
  `core_parametros_nombre` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `core_parametros_dsc` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `core_parametros_valor` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `core_parametros_tipo` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  `core_parametros_alta_fec` DATETIME NULL DEFAULT NULL ,
  `core_parametros_cambio_fec` DATETIME NULL DEFAULT NULL ,
  `core_parametros_registro` TINYINT(1) NULL DEFAULT NULL ,
  `core_parametros_estatus` TINYINT(1) NULL DEFAULT NULL ,
  `core_parametros_editable` TINYINT(1) NULL DEFAULT NULL ,
  `core_parametros_slug` CHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  PRIMARY KEY (`core_parametros_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
COMMENT = 'Tabla que contiene los paramatros que seran cargados en la m';

SHOW WARNINGS;
CREATE UNIQUE INDEX `par_nombre` ON `core_parametros` (`core_parametros_nombre` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `core_parametros_slug_UNIQUE` ON `core_parametros` (`core_parametros_slug` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_privilegios_acl_cat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_privilegios_acl_cat` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_privilegios_acl_cat` (
  `pri_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pri_dsc` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  PRIMARY KEY (`pri_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
COMMENT = 'Tabla de los privilegios';

SHOW WARNINGS;
CREATE UNIQUE INDEX `pri_dsc` ON `core_privilegios_acl_cat` (`pri_dsc` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_recursos_acl_cat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_recursos_acl_cat` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_recursos_acl_cat` (
  `rec_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `rec_dsc` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  PRIMARY KEY (`rec_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `rec_desc` ON `core_recursos_acl_cat` (`rec_dsc` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_roles_acl_cat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_roles_acl_cat` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_roles_acl_cat` (
  `rol_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `rol_dsc` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  PRIMARY KEY (`rol_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `rol_desc` ON `core_roles_acl_cat` (`rol_dsc` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_roles_recursos_privilegios_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_roles_recursos_privilegios_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_roles_recursos_privilegios_rel` (
  `rol_id` INT(1) NOT NULL ,
  `rec_id` INT(4) NOT NULL ,
  `pri_id` INT(11) NOT NULL COMMENT 'Id del privilegio' ,
  `rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`rol_id`, `rec_id`, `pri_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `rel_id` ON `core_roles_recursos_privilegios_rel` (`rel_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_core_roles_recursos_privilegios_rel_core_roles_acl_cat1_idx` ON `core_roles_recursos_privilegios_rel` (`rol_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_session`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_session` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_session` (
  `ses_id` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `ses_modified` INT(11) NULL DEFAULT NULL ,
  `ses_lifetime` INT(11) NULL DEFAULT NULL ,
  `ses_data` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL ,
  PRIMARY KEY (`ses_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_set_info_abaut`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_set_info_abaut` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_set_info_abaut` (
  `core_set_info_abaut_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `core_set_info_abaut_nombre` CHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`core_set_info_abaut_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_set_info_abaut_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_set_info_abaut_usuario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_set_info_abaut_usuario` (
  `core_set_info_abaut_usuario_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `core_set_info_abaut_id` INT(11) NOT NULL ,
  `usu_id` INT(11) NOT NULL ,
  PRIMARY KEY (`core_set_info_abaut_usuario_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `core_transacciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core_transacciones` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `core_transacciones` (
  `tra_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `tra_nombre` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `tra_dsc` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `tra_bitacora` TINYINT(3) UNSIGNED NOT NULL ,
  `tra_modulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `tra_modelo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `tra_metodo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL ,
  `cal_id` INT(11) UNSIGNED NOT NULL ,
  `tra_estatus` TINYINT(3) UNSIGNED NOT NULL ,
  PRIMARY KEY (`tra_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `tra_nombre` ON `core_transacciones` (`tra_nombre` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `features`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `features` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `features` (
  `fea_id` INT(11) NOT NULL ,
  `fea_name` VARCHAR(45) NULL DEFAULT NULL ,
  `state` TINYINT(1) UNSIGNED NULL DEFAULT '1' ,
  PRIMARY KEY (`fea_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_banners_position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_banners_position` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_banners_position` (
  `mexi_banners_position_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `mexi_banners_position_name` CHAR(100) NOT NULL ,
  PRIMARY KEY (`mexi_banners_position_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE UNIQUE INDEX `mexi_banners_position_name_UNIQUE` ON `mexi_banners_position` (`mexi_banners_position_name` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_banners_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_banners_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_banners_type` (
  `mexi_banners_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `mexi_banners_type_nombre` CHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`mexi_banners_type_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_banners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_banners` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_banners` (
  `mexi_banners_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `mexi_banners_price` FLOAT NULL DEFAULT NULL ,
  `mexi_banners_type_id` INT(11) NOT NULL ,
  `mexi_banners_nombre` CHAR(100) NULL DEFAULT NULL ,
  `mexi_banners_position_id` INT(11) NOT NULL ,
  PRIMARY KEY (`mexi_banners_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_banners_partners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_banners_partners` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_banners_partners` (
  `ban_fec_ini` VARCHAR(45) NULL DEFAULT NULL ,
  `ban_fec_end` TIMESTAMP NULL DEFAULT NULL ,
  `ban_id` INT(11) NOT NULL ,
  `par_id` INT(11) NOT NULL ,
  PRIMARY KEY (`par_id`, `ban_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_banners_partners_partners1_idx` ON `mexi_banners_partners` (`par_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_informative_pages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_informative_pages` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_informative_pages` (
  `pag_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pag_title` VARCHAR(100) NULL DEFAULT NULL ,
  `pag_body` VARCHAR(450) NULL DEFAULT NULL ,
  `pag_img` VARCHAR(45) NULL DEFAULT NULL ,
  `pag_menu` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`pag_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mexi_partners_packages_cat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mexi_partners_packages_cat` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mexi_partners_packages_cat` (
  `pac_id` INT(11) NOT NULL ,
  `pac_dsc` VARCHAR(45) NULL DEFAULT NULL ,
  `pac_name` VARCHAR(45) NULL DEFAULT NULL ,
  `pac_type` VARCHAR(45) NULL DEFAULT NULL ,
  `pac_listings` INT(11) NULL DEFAULT NULL ,
  `pac_agents` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`pac_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_billing`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_billing` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_billing` (
  `bil_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `bil_company_name` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_rfc` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_mail` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_suit_apt_unit` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_city` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_country` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_state_province` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_zip_postal_code` VARCHAR(45) NULL DEFAULT NULL ,
  `bil_phone` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`bil_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_files`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_files` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_files` (
  `fil_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `fil_title` CHAR(200) NULL DEFAULT NULL ,
  `fil_source` CHAR(100) NULL DEFAULT NULL ,
  `fil_order` INT(11) NULL DEFAULT NULL ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`fil_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_imgs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_imgs` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_imgs` (
  `img_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `img_title` VARCHAR(45) NULL DEFAULT NULL ,
  `img_source` VARCHAR(45) NULL DEFAULT NULL ,
  `img_order` INT(11) NULL DEFAULT NULL ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`img_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_location` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_location` (
  `loc_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `loc_address` VARCHAR(45) NULL DEFAULT NULL ,
  `loc_sute_apt_unit` VARCHAR(45) NULL DEFAULT NULL ,
  `loc_country` VARCHAR(45) NULL DEFAULT NULL ,
  `loc_state` VARCHAR(45) NULL DEFAULT NULL ,
  `cit_id` INT(11) NULL DEFAULT NULL COMMENT '	' ,
  `reg_id` INT(11) NULL DEFAULT NULL ,
  `loc_zip_posta_code` VARCHAR(45) NULL DEFAULT NULL ,
  `loc_lat` VARCHAR(45) NULL DEFAULT NULL ,
  `loc_lon` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`loc_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_partner_location_mexi_regions1_idx` ON `partner_location` (`reg_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_partner_location_mexi_cities1_idx` ON `partner_location` (`cit_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_package_available`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_package_available` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_package_available` (
  `par_id` INT(11) NOT NULL ,
  `pac_id` VARCHAR(45) NULL DEFAULT NULL ,
  `disponibles` VARCHAR(45) NULL DEFAULT NULL ,
  `usados` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`par_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_packages_informative`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_packages_informative` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_packages_informative` (
  `part_pack_infor_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `part_pack_infor_name` CHAR(30) NULL DEFAULT NULL ,
  `part_pack_infor_descripcion` TEXT NULL DEFAULT NULL ,
  `part_pack_infor_details` TEXT NULL DEFAULT NULL ,
  `part_pack_infor_type` CHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`part_pack_infor_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_payment` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_payment` (
  `par_pay_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_pay_first_name` CHAR(100) NOT NULL ,
  `par_pay_last_name` CHAR(100) NULL DEFAULT NULL ,
  `par_pay_phone` CHAR(15) NULL DEFAULT NULL ,
  `par_pay_company_name` CHAR(100) NULL DEFAULT NULL ,
  `par_pay_rfc` CHAR(50) NULL DEFAULT NULL ,
  `par_pay_mail` CHAR(100) NULL DEFAULT NULL ,
  `par_pay_suite_ap_uni` CHAR(100) NULL DEFAULT NULL ,
  `par_pay_state_id` INT(11) NULL DEFAULT NULL ,
  `par_pay_zip` CHAR(20) NULL DEFAULT NULL ,
  `par_id` INT(11) NOT NULL ,
  `par_date_create` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`par_pay_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_profile` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_profile` (
  `prof_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `prof_logo` CHAR(100) NULL DEFAULT NULL ,
  `prof_company` CHAR(150) NULL DEFAULT NULL ,
  `prof_email` CHAR(150) NULL DEFAULT NULL ,
  `prof_website` CHAR(200) NULL DEFAULT NULL ,
  `prof_phone2` CHAR(20) NULL DEFAULT NULL ,
  `prof_phone1` CHAR(20) NULL DEFAULT NULL ,
  `prof_dsc` TEXT NULL DEFAULT NULL ,
  `prof_phone_desc1` CHAR(40) NULL DEFAULT NULL ,
  `prof_phone_desc2` CHAR(40) NULL DEFAULT NULL ,
  `prof_phone3` CHAR(20) NULL DEFAULT NULL ,
  `prof_phone_desc3` CHAR(40) NULL DEFAULT NULL ,
  PRIMARY KEY (`prof_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partner_videos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partner_videos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partner_videos` (
  `vid_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `vid_title` CHAR(200) NULL DEFAULT NULL ,
  `vid_type` CHAR(50) NULL DEFAULT NULL ,
  `vid_order` INT(11) NULL DEFAULT NULL ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `vid_uri` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`vid_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 104
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners_categories` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners_categories` (
  `cat_id` INT(11) NOT NULL ,
  `cat_name` VARCHAR(45) NULL ,
  `cat_dsc` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`cat_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners_categories_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners_categories_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners_categories_rel` (
  `cat_id` INT(11) NOT NULL ,
  `par_id` INT(11) NOT NULL ,
  `partners_categories_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`partners_categories_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_partners_categories_rel_partners_categories1_idx` ON `partners_categories_rel` (`cat_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners_subcategories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners_subcategories` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners_subcategories` (
  `sub_id` INT(11) NOT NULL ,
  `sub_name` VARCHAR(45) NULL DEFAULT NULL ,
  `sub_dsc` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`sub_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `partners_subcategories_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `partners_subcategories_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `partners_subcategories_rel` (
  `par_id` INT(11) NOT NULL ,
  `partners_subcategories_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `par_other_type_account_id` INT(11) NOT NULL ,
  PRIMARY KEY (`partners_subcategories_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_partners_subcategories_rel_mexi_partners1_idx` ON `partners_subcategories_rel` (`par_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_partners_subcategories_rel_partner_other_type_account1_idx` ON `partners_subcategories_rel` (`par_other_type_account_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `property_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `property_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `property_type` (
  `property_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `property_type_name` CHAR(200) NULL ,
  PRIMARY KEY (`property_type_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `property_listing_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `property_listing_status` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `property_listing_status` (
  `properties_buildings_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `properties_buildings_rel_name` CHAR(200) NULL ,
  PRIMARY KEY (`properties_buildings_rel_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties` (
  `pro_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pro_status` CHAR(20) NULL DEFAULT 'ANY' COMMENT '0 no avaible  1 avaible' ,
  `pro_price` DECIMAL(10,2) NULL COMMENT '1 = yes ' ,
  `pro_house_details` DECIMAL(10,2) NULL DEFAULT NULL ,
  `pro_land_details` DECIMAL(10,2) UNSIGNED NULL DEFAULT NULL ,
  `reg_id` INT(11) NULL DEFAULT NULL ,
  `age_id` INT(11) NULL ,
  `par_id` INT(11) NULL DEFAULT NULL ,
  `details_house_id` TINYINT(4) NULL DEFAULT NULL ,
  `details_land_id` TINYINT(4) NULL DEFAULT NULL ,
  `bedroom` CHAR(25) NULL DEFAULT NULL ,
  `style` CHAR(25) NULL DEFAULT NULL ,
  `garage` CHAR(25) NULL DEFAULT NULL ,
  `view` CHAR(25) NULL DEFAULT NULL ,
  `recreational_areas` CHAR(25) NULL DEFAULT NULL ,
  `bathrooms` CHAR(25) NULL DEFAULT NULL ,
  `keyword` CHAR(25) NULL DEFAULT NULL ,
  `address` TEXT NULL DEFAULT NULL ,
  `size` VARCHAR(45) NULL ,
  `property_type_id` INT(11) NULL ,
  `est_id` INT(11) NULL ,
  `cd_id` INT(11) NULL ,
  `properties_buildings_rel_id` INT(11) NOT NULL ,
  PRIMARY KEY (`pro_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_properties_agents1_idx` ON `properties` (`age_id` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `size_UNIQUE` ON `properties` (`size` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties_amenities_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties_amenities_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties_amenities_rel` (
  `ame_id` INT(11) NOT NULL ,
  `pro_id` INT(11) NOT NULL ,
  `properties_amenities_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`properties_amenities_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_properties_amenities_rel_amenities1_idx` ON `properties_amenities_rel` (`ame_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties_appliances_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties_appliances_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties_appliances_rel` (
  `app_id` INT(11) NOT NULL ,
  `pro_id` INT(11) NOT NULL ,
  `properties_appliances_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`properties_appliances_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_properties_appliances_rel_mexi_appliances1_idx` ON `properties_appliances_rel` (`app_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties_buildings_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties_buildings_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties_buildings_rel` (
  `bui_id` INT(11) NOT NULL ,
  `pro_id` INT(11) NOT NULL ,
  `properties_buildings_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`properties_buildings_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_properties_buildings_rel_mexi_buildings1_idx` ON `properties_buildings_rel` (`bui_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_properties_buildings_rel_mexi_properties1_idx` ON `properties_buildings_rel` (`properties_buildings_rel_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties_favorites`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties_favorites` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties_favorites` (
  `pro_id` INT(11) NOT NULL ,
  `usu_id` INT(11) NOT NULL ,
  `fav_date` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`usu_id`, `pro_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_properties_favorites_core_usuarios1_idx` ON `properties_favorites` (`usu_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `properties_features_rel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `properties_features_rel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `properties_features_rel` (
  `fea_id` INT(11) NOT NULL ,
  `pro_id` INT(11) NOT NULL ,
  `properties_features_rel_id` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`properties_features_rel_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_mexi_properties_features_rel_mexi_features1_idx` ON `properties_features_rel` (`fea_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `property_files`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `property_files` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `property_files` (
  `fil_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pro_id` INT(11) NULL DEFAULT NULL ,
  `fil_title` VARCHAR(45) NULL DEFAULT NULL ,
  `fil_source` VARCHAR(45) NULL DEFAULT NULL ,
  `fil_order` TINYINT(4) NULL DEFAULT NULL ,
  PRIMARY KEY (`fil_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `property_imgs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `property_imgs` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `property_imgs` (
  `img_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '	' ,
  `pro_id` INT(11) NULL DEFAULT NULL ,
  `img_title` VARCHAR(45) NULL DEFAULT NULL ,
  `img_source` VARCHAR(45) NULL DEFAULT NULL ,
  `img_order` TINYINT(4) NULL DEFAULT NULL ,
  PRIMARY KEY (`img_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `property_videos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `property_videos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `property_videos` (
  `vid_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '	' ,
  `pro_id` INT(11) NULL DEFAULT NULL ,
  `vid_title` VARCHAR(45) NULL DEFAULT NULL ,
  `vid_source` VARCHAR(45) NULL DEFAULT NULL ,
  `vid_order` TINYINT(4) NULL DEFAULT NULL ,
  PRIMARY KEY (`vid_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `single_agent_packages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `single_agent_packages` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `single_agent_packages` (
  `single_agent_packages_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `single_agent_packages_name` CHAR(150) NULL DEFAULT NULL ,
  `single_agent_packages_listing` TINYINT(4) NULL DEFAULT NULL ,
  `single_agent_packages_permonth` TINYINT(4) NULL DEFAULT NULL ,
  `single_agent_packages_each` TINYINT(4) NULL DEFAULT NULL ,
  PRIMARY KEY (`single_agent_packages_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `single_agent_packages_partner`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `single_agent_packages_partner` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `single_agent_packages_partner` (
  `single_agent_packages_id` INT(11) NOT NULL ,
  `par_id` INT(11) NOT NULL ,
  `feature` INT(11) NULL DEFAULT NULL ,
  `months` INT(11) NULL DEFAULT NULL ,
  `date_register` DATETIME NULL DEFAULT NULL ,
  `active` TINYINT(1) NULL DEFAULT NULL ,
  `listing` TINYINT(4) NULL DEFAULT NULL ,
  `price` INT(11) NULL DEFAULT NULL )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Placeholder table for view `view_core_usuarios_partner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `view_core_usuarios_partner` (`usu_id` INT, `rol_id` INT, `usu_nombre` INT, `usu_apellidos` INT, `usu_nick` INT, `usu_contrasena` INT, `usu_celular` INT, `usu_telefono` INT, `usu_correo` INT, `usu_creacion_fec` INT, `usu_img` INT, `usu_id_estado` INT, `grupo_usuario` INT, `par_id` INT, `par_nickname` INT, `par_email` INT, `par_full_name` INT, `par_chief` INT, `par_flag_customer` INT, `par_acount_type_id` INT, `par_flag_partner_profiler` INT, `par_other_type_account_id` INT, `par_state` INT);
SHOW WARNINGS;

-- -----------------------------------------------------
-- View `view_core_usuarios_partner`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `view_core_usuarios_partner` ;
SHOW WARNINGS;
DROP TABLE IF EXISTS `view_core_usuarios_partner`;
SHOW WARNINGS;
USE `mexigo`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_core_usuarios_partner` AS (select `core_usuarios`.`usu_id` AS `usu_id`,`core_usuarios`.`rol_id` AS `rol_id`,`core_usuarios`.`usu_nombre` AS `usu_nombre`,`core_usuarios`.`usu_apellidos` AS `usu_apellidos`,`core_usuarios`.`usu_nick` AS `usu_nick`,`core_usuarios`.`usu_contrasena` AS `usu_contrasena`,`core_usuarios`.`usu_celular` AS `usu_celular`,`core_usuarios`.`usu_telefono` AS `usu_telefono`,`core_usuarios`.`usu_correo` AS `usu_correo`,`core_usuarios`.`usu_creacion_fec` AS `usu_creacion_fec`,`core_usuarios`.`usu_img` AS `usu_img`,`core_usuarios`.`usu_id_estado` AS `usu_id_estado`,'partner' AS `grupo_usuario`,`partners`.`par_id` AS `par_id`,`partners`.`par_nickname` AS `par_nickname`,`partners`.`par_email` AS `par_email`,`partners`.`par_full_name` AS `par_full_name`,`partners`.`par_chief` AS `par_chief`,`partners`.`par_flag_customer` AS `par_flag_customer`,`partners`.`par_acount_type_id` AS `par_acount_type_id`,`partners`.`par_flag_partner_profiler` AS `par_flag_partner_profiler`,`partners`.`par_other_type_account_id` AS `par_other_type_account_id`,`partners`.`par_state` AS `par_state` from (`partners` join `core_usuarios` on((`partners`.`usu_id` = `core_usuarios`.`usu_id`))));
SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
