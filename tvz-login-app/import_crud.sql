DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets` (
  `pet_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pet_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `age` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gardner` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `weight` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pets` (`pet_id`, `pet_type`, `name`, `age`, `gardner`, `weight`)
VALUES
	(1,'Dog', 'Zeus', '2 years', 'male', '25 kg'),
	(2,'Dog', 'Rex', '8 months', 'male', '19 kg'),
	(3,'Cat', 'Bella', '4 years', 'female', '4 kg');
