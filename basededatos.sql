CREATE TABLE `gauge` (
  `id` int(11) NOT NULL auto_increment,
  `humidity` float(4,2) NOT NULL,
  `temperature` float(4,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;



INSERT INTO `gauge` VALUES (1, 41.50, 30.20);
INSERT INTO `gauge` VALUES (2, 42.00, 28.70);
INSERT INTO `gauge` VALUES (3, 50.00, 31.00);
INSERT INTO `gauge` VALUES (4, 45.00, 26.70);
