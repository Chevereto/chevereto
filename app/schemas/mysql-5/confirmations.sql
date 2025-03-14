DROP TABLE IF EXISTS `%table_prefix%confirmations`;
CREATE TABLE `%table_prefix%confirmations` (
  `confirmation_id` bigint(32) NOT NULL AUTO_INCREMENT,
  `confirmation_user_id` bigint(32) NOT NULL,
  `confirmation_type` enum('account-activate','account-change-email','account-password-forgot') NOT NULL,
  `confirmation_date` datetime NOT NULL,
  `confirmation_date_gmt` datetime NOT NULL,
  `confirmation_token_hash` varchar(255) NOT NULL,
  `confirmation_status` enum('active','valid','invalid') NOT NULL,
  `confirmation_extra` mediumtext,
  PRIMARY KEY (`confirmation_id`),
  KEY `confirmation_user` (`confirmation_user_id`),
  KEY `confirmation_user_type` (`confirmation_user_id`, `confirmation_type`),
  KEY `confirmation_user_type_status_date` (`confirmation_user_id`, `confirmation_type`, `confirmation_status`, `confirmation_date_gmt`)
) ENGINE=%table_engine% DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
