
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- need
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `need`;


CREATE TABLE `need`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`author` VARCHAR(100)  NOT NULL,
	`description` VARCHAR(140)  NOT NULL,
	`timeframe` VARCHAR(10),
	`location` VARCHAR(100),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- raw_dm
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `raw_dm`;


CREATE TABLE `raw_dm`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dm_id` BIGINT  NOT NULL,
	`created_at` BIGINT  NOT NULL,
	`text` VARCHAR(140)  NOT NULL,
	`follower_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `raw_dm_FI_1` (`follower_id`),
	CONSTRAINT `raw_dm_FK_1`
		FOREIGN KEY (`follower_id`)
		REFERENCES `follower` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- raw_message
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `raw_message`;


CREATE TABLE `raw_message`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`message_id` BIGINT  NOT NULL,
	`created_at` BIGINT  NOT NULL,
	`text` VARCHAR(140)  NOT NULL,
	`follower_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `raw_message_FI_1` (`follower_id`),
	CONSTRAINT `raw_message_FK_1`
		FOREIGN KEY (`follower_id`)
		REFERENCES `follower` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- follower
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `follower`;


CREATE TABLE `follower`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`following` TINYINT  NOT NULL,
	`sender_id` BIGINT  NOT NULL,
	`sender_name` VARCHAR(20),
	`sender_screen_name` VARCHAR(15)  NOT NULL,
	`sender_description` VARCHAR(160),
	`sender_location` VARCHAR(255),
	`sender_protected` TINYINT  NOT NULL,
	`sender_profile_img` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
