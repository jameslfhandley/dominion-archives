

DROP TABLE IF EXISTS `address_list`;
CREATE TABLE IF NOT EXISTS `address_list` (
  `subject_id` int(11) NOT NULL,
  `subject_firstname` varchar(30) NOT NULL,
  `subject_lastname` varchar(30) NOT NULL,
  `subject_email` varchar(50) NOT NULL,
  `subject_address` text NOT NULL,
  `subject_cellphone` varchar(20) NOT NULL,
  `subject_image` longblob NOT NULL,
  `subject_thumb` longblob NOT NULL,
  `subject_user_key` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE IF NOT EXISTS `user_list` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(65) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`user_id`, `user_firstname`, `user_lastname`, `user_password`, `user_email`) VALUES
(123555, 'Simon', 'Greedwell', 'origin123', 'test@mail.com'),
(435000, 'Terrance', 'Owens', 'test123', 'towens@mail.com');