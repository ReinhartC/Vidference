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
  `user_password` char(32) NOT NULL,
  `user_stream_link` varchar(64) NOT NULL,
  `user_join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`user_name`,`user_password`,`user_stream_link`,`user_join_date`) values ('Fatur','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/2atQnvunGCo','2018-12-21 03:14:49'),('Ijad','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/2ccaHpy5Ewo','2018-12-21 03:14:50'),('Ojosh','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/v8bcIWgdCP4','2018-12-21 03:16:36'),('ReinhartC','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/hHW1oY26kxQ','2018-12-21 03:14:51'),('Rio','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/gmv54pfxk0Q','2018-12-21 03:14:51'),('Rizky','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/Ec7VUcdB-ww','2018-12-21 03:14:52'),('Yoga','ab56b4d92b40713acc5af89985d4b786','https://www.youtube.com/embed/6MyrAUxtWyA','2018-12-21 03:14:56');

/*Table structure for table `password_request` */

DROP TABLE IF EXISTS `password_request`;

CREATE TABLE `password_request` (
  `request_user` varchar(64) NOT NULL,
  `request_room` varchar(64) NOT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT '0',
  KEY `requesting_user_fk` (`request_user`),
  KEY `requested_room_fk` (`request_room`),
  CONSTRAINT `requested_room_fk` FOREIGN KEY (`request_room`) REFERENCES `room` (`room_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `requesting_user_fk` FOREIGN KEY (`request_user`) REFERENCES `account` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `password_request` */

insert  into `password_request`(`request_user`,`request_room`,`request_status`) values ('ReinhartC','Sales meeting',2),('ReinhartC','Zeta clan',1),('Ojosh','Zeta clan',0),('Ijad','Sales meeting',0);

/*Table structure for table `room` */

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `room_name` varchar(64) NOT NULL,
  `room_owner` varchar(64) NOT NULL,
  `room_type` varchar(8) NOT NULL,
  `room_password` varchar(256) DEFAULT NULL,
  `room_slot` int(1) NOT NULL DEFAULT '4',
  PRIMARY KEY (`room_name`),
  KEY `room_mod_fk` (`room_owner`),
  CONSTRAINT `room_mod_fk` FOREIGN KEY (`room_owner`) REFERENCES `account` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `room` */

insert  into `room`(`room_name`,`room_owner`,`room_type`,`room_password`,`room_slot`) values ('Chitchat','ReinhartC','Public',NULL,4),('Game discussion','Ojosh','Public',NULL,8),('Sales meeting','Rio','Private','6162636465',5),('Zeta clan','Ijad','Private','6162636465',6);

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

/*Data for the table `stream` */

insert  into `stream`(`stream_id`,`stream_room`,`stream_owner`,`stream_space`,`stream_start_time`) values (85,'Chitchat','ReinhartC',1,'2018-12-11 07:54:19'),(86,'Chitchat','Rizky',2,'2018-12-11 07:54:52'),(87,'Game discussion','Yoga',1,'2018-12-11 07:55:29'),(88,'Sales meeting','Rio',1,'2018-12-11 07:56:32'),(89,'Sales meeting','Ijad',2,'2018-12-11 07:56:49'),(90,'Zeta clan','Fatur',1,'2018-12-11 07:57:23'),(91,'Zeta clan','Ojosh',2,'2018-12-11 07:57:36');

/* Procedure structure for procedure `accept_response` */

/*!50003 DROP PROCEDURE IF EXISTS  `accept_response` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `accept_response`(`p_name` VARCHAR(64), `p_room` VARCHAR(64))
BEGIN
		update  password_request set `request_status`=1 WHERE `request_user`=`p_name` AND `request_room`=`p_room`;
		SELECT 0, 'Request accepted';
    END */$$
DELIMITER ;

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

/* Procedure structure for procedure `add_room_slot` */

/*!50003 DROP PROCEDURE IF EXISTS  `add_room_slot` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `add_room_slot`(`p_name` VARCHAR(64))
BEGIN
		UPDATE room SET `room_slot` = `room_slot`+1 WHERE `room_name` = `p_name`;
		SELECT 0, 'Slot added';
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

/* Procedure structure for procedure `close_request` */

/*!50003 DROP PROCEDURE IF EXISTS  `close_request` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `close_request`(`p_name` VARCHAR(64), `p_room` varchar(64))
BEGIN
		DELETE FROM password_request WHERE `request_user`=`p_name` and `request_room`=`p_room`;
		SELECT 0, 'Request closed';
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
	`p_password` VARCHAR (256),
	`p_slot` int
)
BEGIN
	IF NOT EXISTS(SELECT 1 FROM room WHERE room_name = p_name) THEN
		IF (p_password = '') THEN
			INSERT INTO room (room_name, room_owner, room_type, room_slot) VALUES(p_name, p_owner, 'Public', p_slot);
		ELSE
			INSERT INTO room (room_name, room_owner, room_type, room_password, room_slot) VALUES(p_name, p_owner, 'Private', hex(p_password), p_slot);
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
	`p_password` VARCHAR(256)
)
BEGIN
	IF EXISTS(SELECT 1 FROM room WHERE room_name = p_name) THEN
		IF EXISTS(SELECT 2 FROM room WHERE hex(p_password) = room_password AND room_name = p_name) THEN			
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
	`p_password` char (32)
)
BEGIN
	IF EXISTS(SELECT 1 FROM account WHERE user_name = p_name COLLATE latin1_general_cs) THEN
		IF EXISTS(SELECT 2 FROM account WHERE md5(p_password) = user_password AND user_name = p_name COLLATE latin1_general_cs) THEN			
			SELECT 0,'Login Successful';
		ELSE
			SELECT -2,'Wrong Password';
		END IF;
	ELSE
		SELECT -1,'Username is not registered';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `mod_accept_request` */

/*!50003 DROP PROCEDURE IF EXISTS  `mod_accept_request` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_accept_request`(`p_name` VARCHAR(64), `p_room` VARCHAR(64))
BEGIN
		update  password_request set `request_status`=1 WHERE `request_user`=`p_name` AND `request_room`=`p_room`;
		SELECT 0, 'Request accepted';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `mod_decline_request` */

/*!50003 DROP PROCEDURE IF EXISTS  `mod_decline_request` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_decline_request`(`p_name` VARCHAR(64), `p_room` VARCHAR(64))
BEGIN
		UPDATE  password_request SET `request_status`=2 WHERE `request_user`=`p_name` AND `request_room`=`p_room`;
		SELECT 0, 'Request declined';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `mod_request_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `mod_request_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_request_list`(`p_room` VARCHAR(64))
BEGIN
	SELECT request_user
	FROM password_request
	WHERE request_room=`p_room`
	and request_status = 0;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `register` */

/*!50003 DROP PROCEDURE IF EXISTS  `register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(
	`p_name` VARCHAR (64),
	`p_password` char (32),
	`p_stream_link` VARCHAR (64)
)
BEGIN
	IF NOT EXISTS(SELECT 1 FROM account WHERE user_name = p_name) THEN
		INSERT INTO account (user_name, user_password, user_stream_link, user_join_date) VALUES(p_name, md5(p_password), p_stream_link, NOW());
		SELECT 0, 'Registration successful';
	ELSE
		SELECT -1, 'Username already exist';
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `request_password` */

/*!50003 DROP PROCEDURE IF EXISTS  `request_password` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `request_password`(
	`p_user` VARCHAR (64),	
	`p_room` VARCHAR (64)	
)
BEGIN
	IF NOT EXISTS(SELECT 1 FROM password_request WHERE request_user = p_user and request_room = p_room) THEN
		INSERT INTO password_request (request_user, request_room) VALUES(p_user, p_room);
		SELECT 0, 'Request sent';
	ELSE
		select -1, 'You already made the request';
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `request_password_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `request_password_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `request_password_list`(`p_name` varchar(64))
BEGIN
	SELECT password_request.`request_room`, password_request.`request_status`, room.`room_password` as request_password
	FROM password_request, room
	where password_request.request_user=`p_name`
	and password_request.request_room=room.`room_name`;
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
		    `stream`.`stream_start_time`,
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
	SELECT COUNT(stream_owner) as streaming, stream_room FROM stream WHERE stream_owner=`p_name`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
