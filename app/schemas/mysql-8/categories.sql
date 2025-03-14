DROP TABLE IF EXISTS `%table_prefix%categories`;
CREATE TABLE `%table_prefix%categories` (
  `category_id` bigint(32) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(32) NOT NULL,
  `category_url_key` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `category_description` text,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `url_key` (`category_url_key`) USING BTREE
) ENGINE=%table_engine% DEFAULT CHARSET=utf8mb4;
