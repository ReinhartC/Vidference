/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.1.34-MariaDB : Database - vidference
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vidference` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vidference`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_stream_link` varchar(64) NOT NULL,
  `user_join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`user_name`,`user_password`,`user_stream_link`,`user_join_date`) values ('Fatur','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/2atQnvunGCo','2018-12-11 07:51:10'),('Ijad','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/2ccaHpy5Ewo','2018-12-11 07:48:05'),('Ojosh','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/NTu4gpVRu0A','2018-12-11 07:44:53'),('ReinhartC','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/hHW1oY26kxQ','2018-12-11 07:38:32'),('Rio','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/gmv54pfxk0Q','2018-12-11 07:46:28'),('Rizky','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/rAkhcUOtu5Q','2018-12-11 07:52:52'),('Yoga','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/tPE4wv7ob8Q','2018-12-11 07:49:24');

/*Table structure for table `room` */

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `room_name` varchar(64) NOT NULL,
  `room_owner` varchar(64) NOT NULL,
  `room_type` varchar(8) NOT NULL,
  `room_password` varchar(64) DEFAULT NULL,
  `room_slot` int(1) NOT NULL DEFAULT '4',
  PRIMARY KEY (`room_name`),
  KEY `room_mod_fk` (`room_owner`),
  CONSTRAINT `room_mod_fk` FOREIGN KEY (`room_owner`) REFERENCES `account` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `room` */

insert  into `room`(`room_name`,`room_owner`,`room_type`,`room_password`,`room_slot`) values ('Room 1','ReinhartC','Public',NULL,4),('Room 2','Ojosh','Public',NULL,8),('Room 3','Rio','Private','ab56b4d92b40713acc5af89985d4b786',5),('Room 4','Ijad','Private','ab56b4d92b40713acc5af89985d4b786',6);

/*Table structure for table `stream` */

DROP TABLE IF EXISTS `stream`;

CREATE TABLE `stream` (
  `stream_id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_room` varchar(64) NOT NULL,
  `stream_owner` varchar(64) NOT NULL,
  `stream_space` int(1) NOT NULL,
  `stream_start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`stream_id`),
  KEY `stream_owner_fk` (`stream_owner`),
  KEY `stream_room_fk` (`stream_room`),
  CONSTRAINT `stream_owner_fk` FOREIGN KEY (`stream_owner`) REFERENCES `account` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stream_room_fk` FOREIGN KEY (`stream_room`) REFERENCES `room` (`room_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

/*Data for the table `stream` */

insert  into `stream`(`stream_id`,`stream_room`,`stream_owner`,`stream_space`,`stream_start_time`) values (85,'Room 1','ReinhartC',1,'2018-12-11 07:54:39'),(86,'Room 1','Rizky',2,'2018-12-11 07:54:52'),(87,'Room 2','Yoga',1,'2018-12-11 07:55:29'),(88,'Room 3','Rio',1,'2018-12-11 07:56:32'),(89,'Room 3','Ijad',2,'2018-12-11 07:56:49'),(90,'Room 4','Fatur',1,'2018-12-11 07:57:23'),(91,'Room 4','Ojosh',2,'2018-12-11 07:57:36');

/* Procedure structure for procedure `account_details` */

/*!50003 DROP PROCEDURE IF EXISTS  `account_details` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `account_details`(`p_name` VARCHAR(64))
BEGIN
	IF EXISTS (SELECT 1 FROM account WHERE `user_name`=p_name) THEN 
		SELECT
		    `user_name`
		    ,`user_stream_link`
		    ,`user_join_date`
		FROM
		    `vidference`.`account`
		WHERE `user_name`=p_name;
	ELSE
		SELECT "Username doesn't exist" AS Result;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `change_stream_link` */

/*!50003 DROP PROCEDURE IF EXISTS  `change_stream_link` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `change_stream_link`(`p_name` VARCHAR(64), `p_stream_link` VARCHAR(64))
BEGIN
	IF EXISTS(SELECT 1 FROM account WHERE user_name = p_name) THEN
		UPDATE account SET user_stream_link=p_stream_link WHERE user_name=p_name;		
		SELECT 0, 'Stream link successfully changed';
		
	ELSE
		SELECT -1, 'Stream link change error';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `close_room` */

/*!50003 DROP PROCEDURE IF EXISTS  `close_room` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `close_room`(`p_name` varchar(64))
BEGIN
		DELETE FROM room WHERE `room_name`=`p_name`;
		SELECT 0, 'Room closed';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_room` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_room` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `create_room`(
	`p_name` VARCHAR (64),
	`p_owner` VARCHAR (64),
	`p_password` VARCHAR (64),
	`p_slot` int
)
BEGIN
	IF NOT EXISTS(SELECT 1 FROM room WHERE room_name = p_name) THEN
		IF (p_password = '') THEN
			INSERT INTO room (room_name, room_owner, room_type, room_slot) VALUES(p_name, p_owner, 'Public', p_slot);
		ELSE
			INSERT INTO room (room_name, room_owner, room_type, room_password, room_slot) VALUES(p_name, p_owner, 'Private', MD5(p_password), p_slot);
		END IF;
		SELECT 0, 'Room successfuly created';
	ELSE
		SELECT -1, 'Room name already exist';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `end_stream` */

/*!50003 DROP PROCEDURE IF EXISTS  `end_stream` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `end_stream`(`p_id` INT, `p_owner` varchar(64))
BEGIN
		delete from stream where `stream_id`=`p_id`;
		SELECT 0, 'Ended stream';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `join_private` */

/*!50003 DROP PROCEDURE IF EXISTS  `join_private` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `join_private`(
	`p_name` VARCHAR(64), 
	`p_password` VARCHAR(64)
)
BEGIN
	IF EXISTS(SELECT 1 FROM room WHERE room_name = p_name) THEN
		IF EXISTS(SELECT 2 FROM room WHERE MD5(p_password) = room_password AND room_name = p_name) THEN			
			SELECT 0,'Entered room';
		ELSE
			SELECT -2,'Wrong password';
		END IF;
	ELSE
		SELECT -1,'Unknown error';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `login` */

/*!50003 DROP PROCEDURE IF EXISTS  `login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(
	`p_name` VARCHAR(64), 
	`p_password` VARCHAR(64)
)
BEGIN
	IF EXISTS(SELECT 1 FROM account WHERE user_name = p_name) THEN
		IF EXISTS(SELECT 2 FROM account WHERE MD5(p_password) = user_password AND user_name = p_name) THEN			
			SELECT 0,'Login Successful';
		ELSE
			SELECT -2,'Wrong Password';
		END IF;
	ELSE
		SELECT -1,'Username is not registered';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `register` */

/*!50003 DROP PROCEDURE IF EXISTS  `register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(
	`p_name` VARCHAR (64),
	`p_password` VARCHAR (64),
	`p_stream_link` VARCHAR (64)
)
BEGIN
	IF NOT EXISTS(SELECT 1 FROM account WHERE user_name = p_name) THEN
		INSERT INTO account (user_name, user_password, user_stream_link, user_join_date) VALUES(p_name, MD5(p_password), p_stream_link, NOW());
		SELECT 0, 'Registration successful!';
	ELSE
		SELECT -1, 'Username already exist!';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `room_details` */

/*!50003 DROP PROCEDURE IF EXISTS  `room_details` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `room_details`(`p_name` VARCHAR(64))
BEGIN
	IF EXISTS (SELECT 1 FROM room WHERE `room_name`=p_name) THEN 
		SELECT
		    `room_name`
		    ,`room_owner`
		    ,`room_type`
		    ,`room_slot`
		FROM
		    `vidference`.`room`
		WHERE `room_name`=p_name;
	ELSE
		SELECT "Room doesn't exist" AS Result;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `room_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `room_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `room_list`()
BEGIN
	select room_name, room_type
	from room;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `start_stream` */

/*!50003 DROP PROCEDURE IF EXISTS  `start_stream` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `start_stream`(
	`p_room` VARCHAR (64),
	`p_owner` VARCHAR (64),
	`p_space` INT
)
BEGIN
		INSERT INTO stream (stream_room, stream_owner, stream_space, stream_start_time) VALUES(p_room, p_owner, p_space, NOW());
		SELECT 0, 'Entered stream';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `stream_details` */

/*!50003 DROP PROCEDURE IF EXISTS  `stream_details` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stream_details`(`p_name` VARCHAR(64), `p_space` INT)
BEGIN
	IF EXISTS (SELECT 1 FROM stream WHERE `stream_room`=p_name) THEN 
		SELECT
		    `stream`.`stream_id`,
		    `stream`.`stream_owner`,
		    `account`.`user_stream_link`
		FROM
		    `vidference`.`stream`, `vidference`.`account`
		WHERE `stream`.`stream_room`=p_name
		AND `stream`.`stream_space`=`p_space`
		AND `stream`.`stream_owner`=`account`.`user_name`;
	ELSE
		SELECT NULL AS Result;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `user_stream_check` */

/*!50003 DROP PROCEDURE IF EXISTS  `user_stream_check` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `user_stream_check`(`p_name` VARCHAR(64))
BEGIN
	SELECT COUNT(stream_owner) as streaming FROM stream WHERE stream_owner=`p_name`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
