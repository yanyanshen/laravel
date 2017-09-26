/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-26 10:15:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `laravel_articles`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_articles`;
CREATE TABLE `laravel_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_articles
-- ----------------------------

-- ----------------------------
-- Table structure for `laravel_failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_failed_jobs`;
CREATE TABLE `laravel_failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `laravel_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_jobs`;
CREATE TABLE `laravel_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_jobs
-- ----------------------------
INSERT INTO `laravel_jobs` VALUES ('56', 'default', '{\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"data\":{\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":5:{s:8:\\\"\\u0000*\\u0000email\\\";s:13:\\\"1932314889@qq\\\";s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', '0', '0', null, '1505808446', '1505808446');
INSERT INTO `laravel_jobs` VALUES ('57', 'default', '{\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"data\":{\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":5:{s:8:\\\"\\u0000*\\u0000email\\\";s:13:\\\"1932314889@qq\\\";s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', '0', '0', null, '1505816373', '1505816373');

-- ----------------------------
-- Table structure for `laravel_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_migrations`;
CREATE TABLE `laravel_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_migrations
-- ----------------------------
INSERT INTO `laravel_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `laravel_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `laravel_migrations` VALUES ('2017_09_18_073126_create_students_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2017_09_18_073333_create_articles_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2017_09_19_021702_create_jobs_table', '3');
INSERT INTO `laravel_migrations` VALUES ('2017_09_19_023750_create_jobs_table', '4');
INSERT INTO `laravel_migrations` VALUES ('2017_09_19_030349_create_failed_jobs_table', '5');

-- ----------------------------
-- Table structure for `laravel_password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_password_resets`;
CREATE TABLE `laravel_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_password_resets
-- ----------------------------
INSERT INTO `laravel_password_resets` VALUES ('18736199128@163.com', 'c56c92744fd5217f324b9523df0cbcca836d4898329f246ee3f1143fef0e482b', '2017-09-18 07:14:24');

-- ----------------------------
-- Table structure for `laravel_student`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_student`;
CREATE TABLE `laravel_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '学生姓名',
  `age` tinyint(4) unsigned DEFAULT '0' COMMENT '学生年龄',
  `sex` tinyint(4) unsigned DEFAULT '0',
  `created_at` char(50) DEFAULT '0' COMMENT '新增时间',
  `updated_at` char(50) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `sex` (`sex`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laravel_student
-- ----------------------------
INSERT INTO `laravel_student` VALUES ('1', 'mary', '19', '0', '0', '0');
INSERT INTO `laravel_student` VALUES ('2', 'jack', '20', '0', '0', '0');
INSERT INTO `laravel_student` VALUES ('3', 'sean', '21', '0', '0', '0');
INSERT INTO `laravel_student` VALUES ('4', 'lun', '22', '0', '0', '0');
INSERT INTO `laravel_student` VALUES ('5', 'tom', '21', '0', '0', '0');
INSERT INTO `laravel_student` VALUES ('17', '1', '18', '0', '1505451982', '1505451982');
INSERT INTO `laravel_student` VALUES ('8', 'sean', '18', '0', '2017-07-1', '2017');
INSERT INTO `laravel_student` VALUES ('9', 'sean1', '19', '0', '1505354931', '1505354931');
INSERT INTO `laravel_student` VALUES ('10', 'sean2', '255', '0', '1505358166', '1505358166');
INSERT INTO `laravel_student` VALUES ('11', 'sean3', '255', '0', '1505358166', '1505358166');
INSERT INTO `laravel_student` VALUES ('15', 'kitty', '30', '0', '1505356488', '1505358166');
INSERT INTO `laravel_student` VALUES ('18', 'name', '20', '0', '1505452040', '1505452040');
INSERT INTO `laravel_student` VALUES ('19', 'jack', '20', '1', '1505452329', '1505452329');
INSERT INTO `laravel_student` VALUES ('23', '新增', '10', '1', '1505452757', '1505452757');
INSERT INTO `laravel_student` VALUES ('24', 'kitty', '20', '1', '1505452932', '1505452932');
INSERT INTO `laravel_student` VALUES ('25', 'we', '18', '0', '1505453163', '1505453163');
INSERT INTO `laravel_student` VALUES ('26', 'haha', '20', '1', '1505456025', '1505456025');
INSERT INTO `laravel_student` VALUES ('27', 'hahah', '1', '1', '1505456694', '1505456694');
INSERT INTO `laravel_student` VALUES ('28', 'dddd', '1', '0', '1505456694', '0');
INSERT INTO `laravel_student` VALUES ('29', 'dd', '2', '0', '1505456694', '2017-09-15 06:26:02');
INSERT INTO `laravel_student` VALUES ('30', '111', '1', '1', '1505456694', '2017-09-15 06:33:53');
INSERT INTO `laravel_student` VALUES ('31', '22', '2', '0', '1505457267', '1505457267');
INSERT INTO `laravel_student` VALUES ('32', '444', '4', '1', '1505456694', '2017-09-15 06:37:44');
INSERT INTO `laravel_student` VALUES ('33', 'sex111', '3', '1', '1505458873', '1505458873');
INSERT INTO `laravel_student` VALUES ('34', '你好', '20', '0', '1505461016', '1505461016');
INSERT INTO `laravel_student` VALUES ('37', '你好1133', '20', '0', '1505461113', '1505461113');
INSERT INTO `laravel_student` VALUES ('38', '你2', '20', '0', '1505461256', '1505461256');
INSERT INTO `laravel_student` VALUES ('40', 'nam1', '20', '0', '1505462711', '1505463035');

-- ----------------------------
-- Table structure for `laravel_students`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_students`;
CREATE TABLE `laravel_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(10) unsigned NOT NULL DEFAULT '10',
  `sex` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_students
-- ----------------------------

-- ----------------------------
-- Table structure for `laravel_users`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_users`;
CREATE TABLE `laravel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_users
-- ----------------------------
INSERT INTO `laravel_users` VALUES ('1', 'laravel', '18736199128@163.com', '$2y$10$gYV.6SJ7q9fx2z.TZA15R.MhCFZGuTgPeRWheX5DltvMd/PcNyyLy', '3hlm9uYnl7MnRqr9mKeSfNRzWLauCgp7bADuxSPpxGTj48XeDV613wVzUffA', '2017-09-18 07:10:40', '2017-09-18 07:12:55');
