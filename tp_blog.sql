/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : tp_blog

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 04/10/2019 16:51:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0禁用 1启用',
  `is_super` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0禁用 1启用',
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES (1, 'admin', 'admin', 'admin', 'eshuo@outlook.com', '1', '1', 0, 0, NULL);
INSERT INTO `tp_admin` VALUES (33, 'admin02', 'admin02', 'admin02', '3177164364@qq.com', '1', '0', 1569168821, 1569168821, NULL);
INSERT INTO `tp_admin` VALUES (34, 'admin03', 'admin03', 'admin03', '3177164364@qq.com', '0', '0', 1569169128, 1569169128, NULL);
INSERT INTO `tp_admin` VALUES (35, 'admin04', 'admin03', 'admin03', 'eshuo@outlook.coom', '0', '0', 1569169141, 1569169141, NULL);
INSERT INTO `tp_admin` VALUES (36, 'admin05', 'admin03', 'admin03', 'eshuo@outlook.coom', '0', '0', 1569169195, 1569169195, NULL);
INSERT INTO `tp_admin` VALUES (37, 'admin3', 'admin3', 'admin3', '3177164364@qq.com', '0', '1', 1569216776, 1569216776, NULL);
INSERT INTO `tp_admin` VALUES (38, 'admin2', 'amind2', 'amind2', '3177164364@qq.com', '0', '0', 1569217091, 1569217091, NULL);
INSERT INTO `tp_admin` VALUES (39, 'admin1', 'amind2', 'amind2', 'eshuo@outlook.com', '0', '0', 1569217115, 1569217115, NULL);
INSERT INTO `tp_admin` VALUES (40, 'adminn', 'adminn', 'adminn', '3177164364@qq.com', '0', '0', 1569217303, 1569217303, NULL);
INSERT INTO `tp_admin` VALUES (41, 'admina', 'admina', 'admina', '3177164364@qq.com', '0', '0', 1569217671, 1569217671, NULL);
INSERT INTO `tp_admin` VALUES (42, 'adminb', 'adminb', 'adminb', '3177164364@qq.com', '0', '0', 1569218434, 1569218434, NULL);
INSERT INTO `tp_admin` VALUES (43, 'adminc', 'adminb', 'adminb', 'eshuo@outlook.com', '0', '0', 1569218450, 1569218450, NULL);
INSERT INTO `tp_admin` VALUES (44, 'admin12', 'admin12', 'admin12', '3177164364@qq.com', '1', '0', 1569218563, 1569218563, NULL);
INSERT INTO `tp_admin` VALUES (45, 'admin12a', 'admin12', 'admin12', 'eshuo@outlook.com', '0', '0', 1569218582, 1569218582, NULL);
INSERT INTO `tp_admin` VALUES (46, 'admin00', 'admin00', 'admin00', '3177164364@qq.com', '0', '0', 1569220815, 1569220815, NULL);
INSERT INTO `tp_admin` VALUES (47, 'admin10', 'admin10', 'admin10', '3177164364@qq.com', '0', '0', 1569220880, 1569220880, NULL);
INSERT INTO `tp_admin` VALUES (48, 'php', 'php', '', 'php@qq.com', '0', '0', 1569589271, 1569589271, NULL);

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pv` int(11) UNSIGNED NOT NULL,
  `comm_num` int(11) UNSIGNED NOT NULL,
  `desc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tags` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_top` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '是否推荐',
  `cate_id` int(11) UNSIGNED NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES (8, 'java02', 27, 0, 'java02', 'eshuo', 'java|三毛02', '<p>评论内容</p>', '1', 12, 1569320864, 1569674990, NULL);
INSERT INTO `tp_article` VALUES (9, 'php03', 13, 0, 'php03', 'eshuo', 'php03', '<p>php</p><p><br/></p>', '1', 11, 1569320896, 1569569326, NULL);
INSERT INTO `tp_article` VALUES (10, 'php02', 18, 0, 'php02', 'eshuo', 'php02', '<p>php02</p>', '1', 11, 1569320917, 1569569326, NULL);
INSERT INTO `tp_article` VALUES (11, '测试删除', 10, 0, '测试删除', 'eshuo', '测试删除', '<p>测试删除</p>', '1', 17, 1569335951, 1569336764, NULL);
INSERT INTO `tp_article` VALUES (12, '测试删除02', 20, 0, '测试删除02', 'eshuo', '测试删除02', '<p>测试删除02<br/></p>', '0', 17, 1569335999, 1569336807, NULL);
INSERT INTO `tp_article` VALUES (13, '测试删除', 20, 0, '测试删除', 'eshuo', '测试删除', '<p>测试删除</p>', '0', 17, 1569340525, 1569340558, NULL);
INSERT INTO `tp_article` VALUES (18, 'java', 57, 0, 'java', 'eshuo', 'java|三毛', '<p>java</p>', '1', 17, 1369320706, 69569326, NULL);

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES (11, 'PHP', 2, 1569231179, 1569569326, NULL);
INSERT INTO `tp_cate` VALUES (12, 'JAVA02', 4, 1569232730, 1569674990, NULL);
INSERT INTO `tp_cate` VALUES (17, 'jQuery', 3, 1569320578, 1569320578, NULL);

-- ----------------------------
-- Table structure for tp_comment
-- ----------------------------
DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE `tp_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '评论表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_comment
-- ----------------------------
INSERT INTO `tp_comment` VALUES (6, '第一篇评论', 8, 1, 1569320706, 1569674990, NULL);
INSERT INTO `tp_comment` VALUES (8, '这时java02的评论', 18, 1, 1570113531, 1570113531, NULL);
INSERT INTO `tp_comment` VALUES (9, '这时java02的评论 第二条', 18, 1, 1570113860, 1570113860, NULL);
INSERT INTO `tp_comment` VALUES (10, '这时java02的评论 第三条', 18, 1, 1570113912, 1570113912, NULL);
INSERT INTO `tp_comment` VALUES (11, '这时java02的评论 第四条', 18, 1, 1570114048, 1570114048, NULL);
INSERT INTO `tp_comment` VALUES (12, 'a', 18, 1, 1570114313, 1570114313, NULL);

-- ----------------------------
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES (1, '用户01', '123', '3177164364@qq.com', 1569571221, 1569673563, NULL);
INSERT INTO `tp_member` VALUES (2, '用户02', '321', '3177164364@qq.co', 1569571246, 1569660804, NULL);
INSERT INTO `tp_member` VALUES (9, '用户04', 'admin', 'eshuo@outlook.cccom', 1570017682, 1570017682, NULL);

-- ----------------------------
-- Table structure for tp_system
-- ----------------------------
DROP TABLE IF EXISTS `tp_system`;
CREATE TABLE `tp_system`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `webname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `copyright` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_system
-- ----------------------------
INSERT INTO `tp_system` VALUES (4, '梦中程序', 'www.eshuo.com', 1569751593, 1569751593, NULL);
INSERT INTO `tp_system` VALUES (5, '键盘侠', '键盘.top', 1569751637, 1569751637, NULL);

SET FOREIGN_KEY_CHECKS = 1;
