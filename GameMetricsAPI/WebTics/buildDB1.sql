CREATE TABLE IF NOT EXISTS `eventdata` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `metricMD5` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `playMD5` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gameTime` double NOT NULL,
  `eventType` int(11) NOT NULL,
  `eventSubtype` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL,
  `magnitude` double NOT NULL,
  `dataString` varchar[2000] CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
