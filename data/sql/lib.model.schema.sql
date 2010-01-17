
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `page`;


CREATE TABLE `page`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`header` VARCHAR(255),
	`content` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;


CREATE TABLE `category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`parent_id` INTEGER,
	`name` VARCHAR(255),
	`header` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- category_preference
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category_preference`;


CREATE TABLE `category_preference`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`category_id` INTEGER,
	`filter_status` INTEGER,
	`key` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `category_preference_FI_1` (`category_id`),
	CONSTRAINT `category_preference_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- preference
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `preference`;


CREATE TABLE `preference`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`element_id` INTEGER,
	`category_preference_id` INTEGER,
	`value` TEXT,
	PRIMARY KEY (`id`),
	INDEX `preference_FI_1` (`category_preference_id`),
	CONSTRAINT `preference_FK_1`
		FOREIGN KEY (`category_preference_id`)
		REFERENCES `category_preference` (`id`)
		ON DELETE CASCADE,
	INDEX `preference_FI_2` (`element_id`),
	CONSTRAINT `preference_FK_2`
		FOREIGN KEY (`element_id`)
		REFERENCES `element` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- element
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `element`;


CREATE TABLE `element`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`category_id` INTEGER,
	`element_status_id` INTEGER,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `element_FI_1` (`category_id`),
	CONSTRAINT `element_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `category` (`id`)
		ON DELETE CASCADE,
	INDEX `element_FI_2` (`element_status_id`),
	CONSTRAINT `element_FK_2`
		FOREIGN KEY (`element_status_id`)
		REFERENCES `element_status` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- element_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `element_status`;


CREATE TABLE `element_status`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- order
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `order`;


CREATE TABLE `order`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`element_id` INTEGER,
	`client_id` INTEGER,
	`order_status_id` INTEGER,
	`date` DATETIME,
	`comment` TEXT,
	PRIMARY KEY (`id`),
	INDEX `order_FI_1` (`element_id`),
	CONSTRAINT `order_FK_1`
		FOREIGN KEY (`element_id`)
		REFERENCES `element` (`id`)
		ON DELETE CASCADE,
	INDEX `order_FI_2` (`order_status_id`),
	CONSTRAINT `order_FK_2`
		FOREIGN KEY (`order_status_id`)
		REFERENCES `order_status` (`id`)
		ON DELETE CASCADE,
	INDEX `order_FI_3` (`client_id`),
	CONSTRAINT `order_FK_3`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- order_status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `order_status`;


CREATE TABLE `order_status`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;


CREATE TABLE `client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`email` VARCHAR(255),
	`phone` TINYINT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
