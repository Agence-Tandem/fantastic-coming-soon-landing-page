--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(150) NOT NULL,
  `subscribed` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;


