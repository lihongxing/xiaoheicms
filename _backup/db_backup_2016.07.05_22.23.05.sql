-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `lhxcms_account`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_account`;
CREATE TABLE IF NOT EXISTS `lhxcms_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `isconnect` tinyint(4) NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_account_wechats`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_account_wechats`;
CREATE TABLE IF NOT EXISTS `lhxcms_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `access_token` varchar(1000) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `level` tinyint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `subscribeurl` varchar(120) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_admin`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_admin`;
CREATE TABLE IF NOT EXISTS `lhxcms_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `authKey` varchar(100) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_auth_assignment`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_auth_assignment`;
CREATE TABLE IF NOT EXISTS `lhxcms_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `lhxcms_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `lhxcms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_auth_item`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_auth_item`;
CREATE TABLE IF NOT EXISTS `lhxcms_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `lhxcms_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `lhxcms_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_auth_item_child`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_auth_item_child`;
CREATE TABLE IF NOT EXISTS `lhxcms_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `lhxcms_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `lhxcms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lhxcms_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `lhxcms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_auth_rule`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_auth_rule`;
CREATE TABLE IF NOT EXISTS `lhxcms_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_sqlbackstore`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_sqlbackstore`;
CREATE TABLE IF NOT EXISTS `lhxcms_sqlbackstore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sql_name` varchar(128) NOT NULL COMMENT '数据库备份的名称',
  `sql_content` varchar(256) NOT NULL COMMENT '数据库备份的表名称集合',
  `sql_addtime` int(11) NOT NULL COMMENT '数据库备份的时间',
  `sql_size` decimal(10,0) NOT NULL COMMENT '数据库备份的文件大小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_uni_account`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_uni_account`;
CREATE TABLE IF NOT EXISTS `lhxcms_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `default_acid` int(10) unsigned NOT NULL,
  `rank` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_uni_group`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_uni_group`;
CREATE TABLE IF NOT EXISTS `lhxcms_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `modules` varchar(10000) NOT NULL,
  `templates` varchar(5000) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_upload`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_upload`;
CREATE TABLE IF NOT EXISTS `lhxcms_upload` (
  `id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- -------------------------------------------
-- TABLE `lhxcms_user`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_user`;
CREATE TABLE IF NOT EXISTS `lhxcms_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `authKey` varchar(100) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `lhxcms_wechat`
-- -------------------------------------------
DROP TABLE IF EXISTS `lhxcms_wechat`;
CREATE TABLE IF NOT EXISTS `lhxcms_wechat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `authKey` varchar(100) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE DATA lhxcms_account
-- -------------------------------------------
INSERT INTO `lhxcms_account` (`acid`,`uniacid`,`hash`,`type`,`isconnect`,`isdeleted`) VALUES
('1','0','','0','0','0');



-- -------------------------------------------
-- TABLE DATA lhxcms_admin
-- -------------------------------------------
INSERT INTO `lhxcms_admin` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('1','2011211193','798161229@qq.com','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');
INSERT INTO `lhxcms_admin` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('2','2011211184','2581677068','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');



-- -------------------------------------------
-- TABLE DATA lhxcms_auth_assignment
-- -------------------------------------------
INSERT INTO `lhxcms_auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('admin','1','1457101503');
INSERT INTO `lhxcms_auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('admin','2','1457101298');
INSERT INTO `lhxcms_auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('syatemadmin','1','1457101503');
INSERT INTO `lhxcms_auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('syatemadmin','2','1457101298');



-- -------------------------------------------
-- TABLE DATA lhxcms_auth_item
-- -------------------------------------------
INSERT INTO `lhxcms_auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('admin','1','普通管理员','','','1456921186','1456921186');
INSERT INTO `lhxcms_auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('databasebackup','2','数据备份','','','1456921023','1456921023');
INSERT INTO `lhxcms_auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('syatemadmin','1','超级管理员','','','1456921161','1456921161');
INSERT INTO `lhxcms_auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('systemset','2','系统设置','','','1456920284','1456920284');



-- -------------------------------------------
-- TABLE DATA lhxcms_auth_item_child
-- -------------------------------------------
INSERT INTO `lhxcms_auth_item_child` (`parent`,`child`) VALUES
('admin','databasebackup');
INSERT INTO `lhxcms_auth_item_child` (`parent`,`child`) VALUES
('systemset','databasebackup');
INSERT INTO `lhxcms_auth_item_child` (`parent`,`child`) VALUES
('admin','systemset');



-- -------------------------------------------
-- TABLE DATA lhxcms_auth_rule
-- -------------------------------------------
INSERT INTO `lhxcms_auth_rule` (`name`,`data`,`created_at`,`updated_at`) VALUES
('3','','','');



-- -------------------------------------------
-- TABLE DATA lhxcms_sqlbackstore
-- -------------------------------------------
INSERT INTO `lhxcms_sqlbackstore` (`id`,`sql_name`,`sql_content`,`sql_addtime`,`sql_size`) VALUES
('25','db_backup_2016.07.05_22.20.33.sql','lhxcms_account,lhxcms_account_wechats,lhxcms_admin,lhxcms_auth_assignment,lhxcms_auth_item,lhxcms_auth_item_child,lhxcms_auth_rule,lhxcms_sqlbackstore,lhxcms_uni_account,lhxcms_uni_group,lhxcms_upload,lhxcms_user,lhxcms_wechat','1467728433','12');



-- -------------------------------------------
-- TABLE DATA lhxcms_uni_account
-- -------------------------------------------
INSERT INTO `lhxcms_uni_account` (`uniacid`,`groupid`,`name`,`description`,`default_acid`,`rank`) VALUES
('3','0','1','','0','');
INSERT INTO `lhxcms_uni_account` (`uniacid`,`groupid`,`name`,`description`,`default_acid`,`rank`) VALUES
('4','0','dfg','','0','');
INSERT INTO `lhxcms_uni_account` (`uniacid`,`groupid`,`name`,`description`,`default_acid`,`rank`) VALUES
('5','0','gdf','1fdgfd','0','');
INSERT INTO `lhxcms_uni_account` (`uniacid`,`groupid`,`name`,`description`,`default_acid`,`rank`) VALUES
('6','0','gfh','hgf','0','');



-- -------------------------------------------
-- TABLE DATA lhxcms_user
-- -------------------------------------------
INSERT INTO `lhxcms_user` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('1','2011211193','798161229@qq.com','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');
INSERT INTO `lhxcms_user` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('2','2011211184','2581677068','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');



-- -------------------------------------------
-- TABLE DATA lhxcms_wechat
-- -------------------------------------------
INSERT INTO `lhxcms_wechat` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('1','2011211193','798161229@qq.com','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');
INSERT INTO `lhxcms_wechat` (`id`,`username`,`email`,`password`,`authKey`,`accessToken`) VALUES
('2','2011211184','2581677068','$2y$13$4EzJTjYE0hX2qjHKe5hCleL3str9xAAITywaoH5mbXU.wRjr08yN6','','');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
