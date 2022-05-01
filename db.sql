/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : cubamyway

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-05-14 21:59:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_action`
-- ----------------------------
DROP TABLE IF EXISTS `t_action`;
CREATE TABLE `t_action` (
`idaction`  int(11) NOT NULL AUTO_INCREMENT ,
`pathaction`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`descaction`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL ,
PRIMARY KEY (`idaction`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish2_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_action
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment` (
`idcomment`  int(11) NOT NULL AUTO_INCREMENT ,
`iduser`  int(11) NOT NULL ,
`topiccomment`  varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`textcomment`  text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
PRIMARY KEY (`idcomment`),
FOREIGN KEY (`iduser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_t_user_t_comment` (`iduser`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Records of t_comment
-- ----------------------------
BEGIN;
INSERT INTO `t_comment` VALUES ('5', '1', 'aaas', ' asdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd adsasdasdasd asd asd asd asd asd adsasd ads'), ('6', '1', 'asdasd', ''), ('7', '1', 'eeeee', ''), ('8', '1', 'rrr', '<p>aqeqweqw eqwe</p>'), ('9', '1', 'asd asd asd', '<p>eeeeq</p>'), ('10', '1', 'qweqwe', '<p>adasd</p>');
COMMIT;

-- ----------------------------
-- Table structure for `t_descrealtrip`
-- ----------------------------
DROP TABLE IF EXISTS `t_descrealtrip`;
CREATE TABLE `t_descrealtrip` (
`idrealtripdesc`  int(11) NOT NULL AUTO_INCREMENT ,
`time`  int(11) NOT NULL ,
`idtourpolo`  int(11) NOT NULL ,
`idviaje`  int(11) NOT NULL ,
PRIMARY KEY (`idrealtripdesc`),
FOREIGN KEY (`idviaje`) REFERENCES `t_realtrip` (`idrealtrip`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idtourpolo`) REFERENCES `t_tourpolo` (`idtourpolo`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_polo_realtrip` (`idtourpolo`) USING BTREE ,
INDEX `aaa` (`idviaje`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=40

;

-- ----------------------------
-- Records of t_descrealtrip
-- ----------------------------
BEGIN;
INSERT INTO `t_descrealtrip` VALUES ('28', '3', '10', '20'), ('29', '4', '8', '20'), ('30', '5', '12', '20'), ('31', '6', '13', '20'), ('32', '1', '10', '21'), ('33', '1', '12', '21'), ('34', '1', '15', '21'), ('35', '1', '11', '21'), ('36', '1', '14', '21'), ('37', '1', '6', '21'), ('38', '1', '13', '21'), ('39', '1', '9', '21');
COMMIT;

-- ----------------------------
-- Table structure for `t_destrip`
-- ----------------------------
DROP TABLE IF EXISTS `t_destrip`;
CREATE TABLE `t_destrip` (
`idtripdes`  int(11) NOT NULL AUTO_INCREMENT ,
`idtrip`  int(11) NOT NULL ,
`idtourpolo`  int(11) NOT NULL ,
PRIMARY KEY (`idtripdes`),
FOREIGN KEY (`idtourpolo`) REFERENCES `t_tourpolo` (`idtourpolo`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idtrip`) REFERENCES `t_trip` (`idtrip`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_t_trip_t_tripdes` (`idtrip`) USING BTREE ,
INDEX `fk_t_tour_t_tripdes` (`idtourpolo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=174

;

-- ----------------------------
-- Records of t_destrip
-- ----------------------------
BEGIN;
INSERT INTO `t_destrip` VALUES ('150', '45', '10'), ('151', '45', '13'), ('152', '46', '4'), ('153', '46', '10'), ('154', '47', '10'), ('155', '47', '14'), ('156', '47', '11'), ('157', '47', '15'), ('158', '47', '12'), ('159', '47', '6'), ('160', '51', '10'), ('161', '51', '14'), ('162', '51', '6'), ('163', '51', '11'), ('164', '51', '15'), ('165', '51', '12'), ('166', '52', '10'), ('167', '52', '12'), ('168', '52', '15'), ('169', '52', '11'), ('170', '52', '14'), ('171', '52', '6'), ('172', '52', '13'), ('173', '52', '9');
COMMIT;

-- ----------------------------
-- Table structure for `t_language`
-- ----------------------------
DROP TABLE IF EXISTS `t_language`;
CREATE TABLE `t_language` (
`idlanguage`  int(11) NOT NULL AUTO_INCREMENT ,
`namelanguage`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idlanguage`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_language
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_messages`
-- ----------------------------
DROP TABLE IF EXISTS `t_messages`;
CREATE TABLE `t_messages` (
`idmessages`  int(11) NOT NULL AUTO_INCREMENT ,
`idoriguser`  int(11) NOT NULL ,
`iddestuser`  int(11) NOT NULL ,
`textmsg`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`topicmsg`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`statemsg`  bit(1) NOT NULL ,
`datemsg`  date NOT NULL ,
PRIMARY KEY (`idmessages`),
FOREIGN KEY (`iddestuser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idoriguser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fK_t_user_t_messages` (`idoriguser`) USING BTREE ,
INDEX `fK_t_user_t_messages1` (`iddestuser`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=19

;

-- ----------------------------
-- Records of t_messages
-- ----------------------------
BEGIN;
INSERT INTO `t_messages` VALUES ('4', '1', '15', 'aaa', 'www', '', '2015-04-26'), ('13', '1', '2', '<p>awd</p>', 'asdawd', '', '2015-04-02'), ('14', '43', '1', '<p>qweqwe</p>', 'asdasd', '', '2015-04-02'), ('15', '1', '15', '<p>asdasd</p>', 'aaa', '', '2015-04-02'), ('16', '58', '1', '<p>esto es un texto de prueba</p>', 'hola', '', '2015-04-02'), ('17', '1', '58', '<p>asdasd</p>', 'aaa', '', '2015-04-02'), ('18', '58', '1', '<p>vamos a ver si pincha</p>', 'de nuevo', '', '2015-04-02');
COMMIT;

-- ----------------------------
-- Table structure for `t_poloimages`
-- ----------------------------
DROP TABLE IF EXISTS `t_poloimages`;
CREATE TABLE `t_poloimages` (
`idimage`  int(11) NOT NULL AUTO_INCREMENT ,
`pathimage`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idtour`  int(11) NOT NULL ,
PRIMARY KEY (`idimage`),
FOREIGN KEY (`idtour`) REFERENCES `t_tourpolo` (`idtourpolo`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_t_tour_t_images` (`idtour`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=24

;

-- ----------------------------
-- Records of t_poloimages
-- ----------------------------
BEGIN;
INSERT INTO `t_poloimages` VALUES ('19', '4f1ea0f61d0c00628fcf9651bf639f57.png', '14'), ('20', '9f0c92519fdb39639409f98768fce6fb.png', '15'), ('21', '60818571c415d87708abab0e74c277a1.png', '12'), ('22', '670e8bae1609670c31d456c70a23cb4e.png', '9'), ('23', 'd90ddcee1061a5f26300102be5f55634.png', '13');
COMMIT;

-- ----------------------------
-- Table structure for `t_realtrip`
-- ----------------------------
DROP TABLE IF EXISTS `t_realtrip`;
CREATE TABLE `t_realtrip` (
`idrealtrip`  int(11) NOT NULL AUTO_INCREMENT ,
`idtrip`  int(11) NOT NULL ,
`iduser`  int(11) NOT NULL ,
`isclosed`  int(1) NOT NULL ,
`dateinitrip`  date NOT NULL ,
`datefintrip`  date NOT NULL ,
PRIMARY KEY (`idrealtrip`),
FOREIGN KEY (`idtrip`) REFERENCES `t_trip` (`idtrip`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`iduser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_trip_realtrip` (`idtrip`) USING BTREE ,
INDEX `fk_user_realtrip` (`iduser`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=22

;

-- ----------------------------
-- Records of t_realtrip
-- ----------------------------
BEGIN;
INSERT INTO `t_realtrip` VALUES ('20', '38', '1', '0', '2015-05-06', '2015-05-08'), ('21', '52', '58', '0', '2015-05-14', '2015-05-31');
COMMIT;

-- ----------------------------
-- Table structure for `t_rol`
-- ----------------------------
DROP TABLE IF EXISTS `t_rol`;
CREATE TABLE `t_rol` (
`idrol`  int(11) NOT NULL AUTO_INCREMENT ,
`namerol`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`typerol`  int(11) NOT NULL DEFAULT 2 ,
`descrol`  text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`isanon`  int(1) NOT NULL ,
PRIMARY KEY (`idrol`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of t_rol
-- ----------------------------
BEGIN;
INSERT INTO `t_rol` VALUES ('1', 'Administrator', '1', 'aa', '1'), ('2', 'User', '2', '', '1'), ('3', 'Developer', '2', '', '0');
COMMIT;

-- ----------------------------
-- Table structure for `t_rol_action`
-- ----------------------------
DROP TABLE IF EXISTS `t_rol_action`;
CREATE TABLE `t_rol_action` (
`idrolaction`  int(11) NOT NULL AUTO_INCREMENT ,
`idrol`  int(11) NOT NULL ,
`idaction`  int(11) NOT NULL ,
PRIMARY KEY (`idrolaction`),
FOREIGN KEY (`idaction`) REFERENCES `t_action` (`idaction`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idrol`) REFERENCES `t_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `t_rol_action_t_rol` (`idrol`) USING BTREE ,
INDEX `t_rol_action_t_action` (`idaction`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_rol_action
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_tourpolo`
-- ----------------------------
DROP TABLE IF EXISTS `t_tourpolo`;
CREATE TABLE `t_tourpolo` (
`idtourpolo`  int(11) NOT NULL AUTO_INCREMENT ,
`namepolo`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`datapolo`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`descpolo`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idtourpolo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=16

;

-- ----------------------------
-- Records of t_tourpolo
-- ----------------------------
BEGIN;
INSERT INTO `t_tourpolo` VALUES ('4', 'wwaaaq', '[22.252949676420037,-79.81532364167458]', 'ww'), ('5', 'ww', '[22.280984480917613,-80.15886687539752]', 'ee'), ('6', 'ww', '[22.262295003030285,-80.09997374961645]', 'eee'), ('8', 'ee', '[22.262295003030285,-79.93310989323673]', 'rr'), ('9', 'aa', '[22.122074052183876,-79.86440124649215]', 'ww'), ('10', 'ee', '[22.43044375803699,-80.16868239636104]', 'ee'), ('11', 'rr', '[22.68242709938337,-80.0705271867259]', 'rr'), ('12', 'ee', '[21.976294692190333,-78.90309258697827]', 'rr'), ('13', 'mio', '[21.713649183266817,-78.49515884763879]', 'ww'), ('14', 'ww', '[21.489676067758566,-77.934249956047]', 'qqq'), ('15', 'aaa', '[21.92561756602238,-79.30491655157194]', 'weqwe');
COMMIT;

-- ----------------------------
-- Table structure for `t_trip`
-- ----------------------------
DROP TABLE IF EXISTS `t_trip`;
CREATE TABLE `t_trip` (
`idtrip`  int(11) NOT NULL AUTO_INCREMENT ,
`iduser`  int(11) NOT NULL ,
`nametrip`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idtrip`),
FOREIGN KEY (`iduser`) REFERENCES `t_user` (`iduser`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_t_user_ttrip` (`iduser`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=53

;

-- ----------------------------
-- Records of t_trip
-- ----------------------------
BEGIN;
INSERT INTO `t_trip` VALUES ('1', '15', 'aa'), ('35', '1', 'yyyyyyy'), ('36', '1', 'hhhh'), ('37', '1', 'asdasd'), ('38', '1', 'aaaa'), ('39', '1', 'maaa'), ('40', '1', 'www'), ('41', '1', 'www'), ('42', '1', 'asdasd'), ('43', '1', 'dqwdqwd'), ('44', '1', 'qwewqe'), ('45', '1', 'asdasd'), ('46', '1', 'asdasd'), ('47', '1', 'eeee'), ('48', '58', 'aa'), ('49', '58', 'wwwweee'), ('50', '58', 'asds'), ('51', '58', 'pepito 2'), ('52', '58', 'asdasd');
COMMIT;

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
`iduser`  int(11) NOT NULL AUTO_INCREMENT ,
`nameuser`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`username`  varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`passworduser`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL ,
`pictureuser`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL ,
`idrol`  int(11) NOT NULL DEFAULT 2 ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`iduser`),
FOREIGN KEY (`idrol`) REFERENCES `t_rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
UNIQUE INDEX `username` (`username`) USING BTREE ,
INDEX `fk_t_rol_t_user` (`idrol`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci
AUTO_INCREMENT=59

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '00e64a698a2c06dd9e6971f7f0a623b5.jpg', '1', 'admin@visualways.com'), ('2', 'Cuquy', 'mami', 'cf0c564b1cc7f3e740d192425d78ab72ed5d4b5c', 'ef19542efbf8ec9189010bbf8f33a0e8.jpg', '1', null), ('15', 'Javier A.Coro Morales', 'javier', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '4f1bab1d0896e53163fc41ebef829829.jpg', '3', null), ('43', 'Dayana Carmenate', 'dayi', '0dfc563386c63b402ff5c05f113e8999ee1ad261', '7874e31b95b86206726e1fde6c706618.jpg', '1', 'dayanaq@etecsa.cu'), ('50', 'www', 'aaaa', 'f10e2821bbbea527ea02200352313bc059445190', 'user.png', '2', 'asdasd@gmail.com'), ('57', 'alejandro', 'ale', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'user.png', '2', 'ale@gmail.com'), ('58', 'Pepe', 'pepe', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '516ab0f1377b4973d55f9663039f4845.jpg', '2', 'asd@gmail.com');
COMMIT;

-- ----------------------------
-- Table structure for `t_userrol`
-- ----------------------------
DROP TABLE IF EXISTS `t_userrol`;
CREATE TABLE `t_userrol` (
`idroluser`  int(11) NOT NULL AUTO_INCREMENT ,
`idrol`  int(11) NOT NULL ,
`iduser`  int(11) NOT NULL ,
PRIMARY KEY (`idroluser`),
FOREIGN KEY (`idrol`) REFERENCES `t_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`iduser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_t_userrol_t_user` (`iduser`) USING BTREE ,
INDEX `fk_t_userrol_t_rol` (`idrol`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of t_userrol
-- ----------------------------
BEGIN;
INSERT INTO `t_userrol` VALUES ('1', '1', '1');
COMMIT;

-- ----------------------------
-- Auto increment value for `t_action`
-- ----------------------------
ALTER TABLE `t_action` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_comment`
-- ----------------------------
ALTER TABLE `t_comment` AUTO_INCREMENT=11;

-- ----------------------------
-- Auto increment value for `t_descrealtrip`
-- ----------------------------
ALTER TABLE `t_descrealtrip` AUTO_INCREMENT=40;

-- ----------------------------
-- Auto increment value for `t_destrip`
-- ----------------------------
ALTER TABLE `t_destrip` AUTO_INCREMENT=174;

-- ----------------------------
-- Auto increment value for `t_language`
-- ----------------------------
ALTER TABLE `t_language` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_messages`
-- ----------------------------
ALTER TABLE `t_messages` AUTO_INCREMENT=19;

-- ----------------------------
-- Auto increment value for `t_poloimages`
-- ----------------------------
ALTER TABLE `t_poloimages` AUTO_INCREMENT=24;

-- ----------------------------
-- Auto increment value for `t_realtrip`
-- ----------------------------
ALTER TABLE `t_realtrip` AUTO_INCREMENT=22;

-- ----------------------------
-- Auto increment value for `t_rol`
-- ----------------------------
ALTER TABLE `t_rol` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `t_rol_action`
-- ----------------------------
ALTER TABLE `t_rol_action` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_tourpolo`
-- ----------------------------
ALTER TABLE `t_tourpolo` AUTO_INCREMENT=16;

-- ----------------------------
-- Auto increment value for `t_trip`
-- ----------------------------
ALTER TABLE `t_trip` AUTO_INCREMENT=53;

-- ----------------------------
-- Auto increment value for `t_user`
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=59;

-- ----------------------------
-- Auto increment value for `t_userrol`
-- ----------------------------
ALTER TABLE `t_userrol` AUTO_INCREMENT=2;
