/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50549
 Source Host           : localhost:3306
 Source Schema         : db_oa

 Target Server Type    : MySQL
 Target Server Version : 50549
 File Encoding         : 65001

 Date: 27/07/2019 22:07:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dept
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 50,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES (9, '行政部', 26, 47, '天大地大我最大');
INSERT INTO `dept` VALUES (26, '上海德拓', 0, 100, '上海总部');
INSERT INTO `dept` VALUES (8, '人事部', 26, 48, '招人裁人');
INSERT INTO `dept` VALUES (7, '财务部', 26, 48, '最有钱的部门,明天发工资');
INSERT INTO `dept` VALUES (27, '交付体系', 26, 20, '交付体系');
INSERT INTO `dept` VALUES (28, '华东交付部', 27, 15, '华东交付部');
INSERT INTO `dept` VALUES (17, '公关部', 26, 5, '公共关系维护');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `truename` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dept_id` int(11) NULL DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `addtime` int(20) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '0表示被删除  1表示正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'longines', '123456', '浪琴', '郑紫琴', 17, '女', '1996-10-23', '13129915310', 'zehng.ziqin@qq.com', '美少年', 1234815812, 3, 1);
INSERT INTO `user` VALUES (2, 'cigar', '123456', '雪茄', '加雪松', 9, '男', '1997-07-24', '18972278323', '1505329414@qq.com', '我是加雪松，我为自己代言', 1223415461, 2, 1);
INSERT INTO `user` VALUES (3, 'fengjiashun', '123456', '顺子', '冯家顺', 17, '男', '2019-07-17', '18972278354', 'fengjiashun@qq.com', '冯家顺测试', 1564222143, NULL, 1);
INSERT INTO `user` VALUES (4, 'huangcheng', '123456', '大黄', '黄成', 7, '男', '2019-07-16', '18972278354', 'huangcheng@qq.com', '黄成测试', 1564224017, NULL, 1);
INSERT INTO `user` VALUES (5, 'shenchengchen', '123456', '学委', '申成晨', 8, '男', '2019-07-21', '18972278354', 'shenchengchen@qq.com', '申成晨测试', 1564224144, NULL, 1);
INSERT INTO `user` VALUES (6, 'chenao', '123456', '奥队', '陈奥', 8, '男', '2019-08-06', '18972278354', 'chenao@qq.com', '陈奥测试', 1564224969, NULL, 1);
INSERT INTO `user` VALUES (7, 'yanshufan', '123456', '书凡', '严书凡', 9, '女', '2019-07-21', '18972278354', 'yanshufan@qq.com', '严书凡测试', 1564226780, NULL, 1);
INSERT INTO `user` VALUES (8, 'fubeibei', '123456', '糊贝贝', '傅贝贝', 17, '女', '1996-05-14', '18972278354', 'fubeibei@qq.com', '傅贝贝测试', 1564234257, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
