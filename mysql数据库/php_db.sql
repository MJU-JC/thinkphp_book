/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : php_db

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2018-10-10 21:24:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `username` varchar(20) NOT NULL default '',
  `password` varchar(32) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('a', 'a');

-- ----------------------------
-- Table structure for `t_book`
-- ----------------------------
DROP TABLE IF EXISTS `t_book`;
CREATE TABLE `t_book` (
  `barcode` varchar(20) NOT NULL COMMENT 'barcode',
  `bookName` varchar(20) NOT NULL COMMENT '图书名称',
  `bookTypeObj` int(11) NOT NULL COMMENT '图书所在类别',
  `price` float NOT NULL COMMENT '图书价格',
  `count` int(11) NOT NULL COMMENT '库存',
  `publishDate` varchar(20) default NULL COMMENT '出版日期',
  `publish` varchar(20) default NULL COMMENT '出版社',
  `bookPhoto` varchar(60) NOT NULL COMMENT '图书图片',
  `bookDesc` varchar(8000) default NULL COMMENT '图书简介',
  `bookFile` varchar(60) NOT NULL COMMENT '图书文件',
  PRIMARY KEY  (`barcode`),
  KEY `bookTypeObj` (`bookTypeObj`),
  CONSTRAINT `t_book_ibfk_1` FOREIGN KEY (`bookTypeObj`) REFERENCES `t_booktype` (`bookTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_book
-- ----------------------------
INSERT INTO `t_book` VALUES ('TS001', 'Java程序设计', '6', '38.8', '12', '2018-06-05', '四川大学出版社', 'upload/9cd5346265da16aeacdf703d8fae0755.jpg', '<p>好书一本aafasfg a<br/><img src=\"/phpsystem/public/upload/1538319141962190.jpg\" title=\"1538319141962190.jpg\" alt=\"07092702032959.jpg\"/><img src=\"/phpsystem/public/upload/1538319208986890.jpg\" title=\"1538319208986890.jpg\" alt=\"07112005394592.jpg\"/></p>', 'upload/9abe1f193af459bf178f62edba4bd939.jpg');
INSERT INTO `t_book` VALUES ('TS002', 'php开发入门到精通', '1', '39.5', '12', '2018-07-01', '人民教育出版社', 'upload/b72ee6ba27474024e2b5acfc32a9c13a.jpg', '<p>好书，这里是测试数据哈！</p><p>双鱼林大神系列作品<br/>这里是富文本编辑器，里面也可以上传图片视频啥的！<br/><img src=\"/phpsystem/public/upload/1539177387660365.jpg\" title=\"1539177387660365.jpg\" alt=\"07112206257729.jpg\"/></p>', 'upload/a0c49debedd4edbe8b97f08cf0098ef7.jpg');
INSERT INTO `t_book` VALUES ('TS003', 'hgafga', '2', '2', '3', '2018-09-05', 'fafa1111', 'upload/33a35d339c688812bde997d4b5130a8d.jpg', '<p>gag <br/></p>', '');
INSERT INTO `t_book` VALUES ('TS004', 'aa', '1', '12.5', '14', '2018-09-06', 'gafaf', 'upload/d7d64a2262209c324930a517765833a4.jpg', '<p>fafaffaffaaf<br/></p>', 'upload/a020b29cbf2bfae4a0100402b93f8813.jpg');
INSERT INTO `t_book` VALUES ('TS005', '12', '1', '12', '414', '2018-08-28', 'faaf', 'upload/NoImage.jpg', '<p>fafaa</p>', '');
INSERT INTO `t_book` VALUES ('TS006', 'ffaf', '1', '11', '134', '2018-09-04', 'fasfasfa', 'upload/5bf2730fbc95c8f91696d1047ba68bc5.jpg', '<p>fafaff<br/></p>', 'upload/4272b54a9b1985e12dee62938a7e1282.jpg');
INSERT INTO `t_book` VALUES ('TS007', 'safaasf', '1', '12', '411', '2018-08-28', 'fafaf', 'upload/NoImage.jpg', '<p>faf</p>', '');
INSERT INTO `t_book` VALUES ('TS008', '1341', '3', '123', '141', '2018-09-05', 'fsfa', 'upload/NoImage.jpg', '<p>afafafa</p>', '');
INSERT INTO `t_book` VALUES ('TS009', 'fsgaga', '4', '132', '11', '2018-09-05', 'fasfa', 'upload/NoImage.jpg', '<p>fagasgag</p>', '');
INSERT INTO `t_book` VALUES ('TS010', 'gasfa', '1', '123', '134', '2018-10-10', 'fasgafa', 'upload/0b255b581be5ab12e9e35e2dc427547f.jpg', '<p>gafgafas<br/></p>', 'upload/2f89b999982d7e7c4a050b3c1053b548.jpg');
INSERT INTO `t_book` VALUES ('TS011', 'gasaffsg', '1', '12', '141', '2018-10-04', 'gagafsf', 'upload/783ba89c4b1f1c6de386072948dc4ae8.jpg', '<p>gasfasfa</p>', 'upload/4b2ae8af28b8821a20e5307649bf7843.jpg');

-- ----------------------------
-- Table structure for `t_booktype`
-- ----------------------------
DROP TABLE IF EXISTS `t_booktype`;
CREATE TABLE `t_booktype` (
  `bookTypeId` int(11) NOT NULL auto_increment COMMENT '图书类别',
  `bookTypeName` varchar(18) NOT NULL COMMENT '类别名称',
  `days` int(11) NOT NULL COMMENT '可借阅天数',
  PRIMARY KEY  (`bookTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_booktype
-- ----------------------------
INSERT INTO `t_booktype` VALUES ('1', '计算机类', '30');
INSERT INTO `t_booktype` VALUES ('2', '历史类', '25');
INSERT INTO `t_booktype` VALUES ('3', '文学类', '26');
INSERT INTO `t_booktype` VALUES ('4', '地理类', '29');
INSERT INTO `t_booktype` VALUES ('5', '电学类', '29');
INSERT INTO `t_booktype` VALUES ('6', '天文学', '20');
INSERT INTO `t_booktype` VALUES ('7', '航天学', '36');
