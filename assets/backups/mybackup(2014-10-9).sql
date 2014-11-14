#
# TABLE STRUCTURE FOR: dbc_categories
#

DROP TABLE IF EXISTS dbc_categories;

CREATE TABLE `dbc_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: dbc_emailtmpl
#

DROP TABLE IF EXISTS dbc_emailtmpl;

CREATE TABLE `dbc_emailtmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` char(100) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO dbc_emailtmpl (`id`, `email_name`, `values`, `status`) VALUES (1, 'confirmation_email', '{\"subject\":\"Confirmation email\",\"body\":\" \\u0633\\u0644\\u0627\\u0645 #username,\\n\\u0639\\u0636\\u0648\\u06cc\\u062a \\u0634\\u0645\\u0627 \\u062f\\u0631 \\u0633\\u0627\\u06cc\\u062a \\u0628\\u0627 \\u0645\\u0648\\u0641\\u0642\\u06cc\\u062a \\u0627\\u0646\\u062c\\u0627\\u0645 \\u0634\\u062f\\u060c \\u0644\\u0637\\u0641\\u0627 \\u0627\\u0632 \\u0644\\u06cc\\u0646\\u06a9 \\u0632\\u06cc\\u0631 \\u0628\\u0631\\u0627\\u06cc \\u0641\\u0639\\u0627\\u0644 \\u0633\\u0627\\u0632\\u06cc \\u062d\\u0633\\u0627\\u0628 \\u062e\\u0648\\u062f \\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647 \\u0646\\u0645\\u0627\\u06cc\\u06cc\\u062f\\n \\n#activationlink\\n\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\n\\u0628\\u0627 \\u062a\\u0634\\u06a9\\u0631\\n#webadmin\\n\",\"avl_vars\":\"#username,#useremail,#activationlink,#webadmin\"}', 1);
INSERT INTO dbc_emailtmpl (`id`, `email_name`, `values`, `status`) VALUES (2, 'recovery_email', '{\"subject\":\"Recovery email\",\"body\":\"\\u0633\\u0644\\u0627\\u0645   #username,\\n\\u0645\\u0627 \\u0627\\u06cc\\u0645\\u06cc\\u0644 \\u062f\\u0631\\u062e\\u0648\\u0627\\u0633\\u062a \\u0628\\u0627\\u0632\\u06cc\\u0627\\u0628\\u06cc \\u0631\\u0645\\u0632 \\u0639\\u0628\\u0648\\u0631 \\u0631\\u0627 \\u0627\\u0632 \\u0634\\u0645\\u0627 \\u062f\\u0631\\u06cc\\u0627\\u0641\\u062a \\u0646\\u0645\\u0648\\u062f\\u06cc\\u0645\\u060c \\u0644\\u0637\\u0641\\u0627 \\u0627\\u0632 \\u0644\\u06cc\\u0646\\u06a9 \\u0632\\u06cc\\u0631 \\u0628\\u0631\\u0627\\u06cc \\u062a\\u063a\\u06cc\\u06cc\\u0631 \\u0631\\u0645\\u0632 \\u0639\\u0628\\u0648\\u0631 \\u062d\\u0633\\u0627\\u0628 \\u062e\\u0648\\u062f \\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647 \\u0646\\u0645\\u0627\\u06cc\\u06cc\\u062f\\n\\n#recoverylink\\n\\n\\u0628\\u0627 \\u062a\\u0634\\u06a9\\u0631\\n#webadmin\\n\",\"avl_vars\":\"#username,#recoverylink,#webadmin\"}', 1);
INSERT INTO dbc_emailtmpl (`id`, `email_name`, `values`, `status`) VALUES (3, 'signup_notification_email', '{\"subject\":\"Notification email\",\"body\":\"\\u0633\\u0644\\u0627\\u0645  #username,\\nWe\'ve received signup information from you. Once you\'ve finish the payment, your account will be activated. You can return to this page by following the following link: \\n\\n#recoverylink\\n\\nThanks\\n#webadmin\\n\",\"avl_vars\":\"#username,#recoverylink,#webadmin\"}', 1);
INSERT INTO dbc_emailtmpl (`id`, `email_name`, `values`, `status`) VALUES (4, 'payment_confirmation_email', '{\"subject\":\"Confirmation email\",\"body\":\"\\u0633\\u0644\\u0627\\u0645  #username,\\n\\u062d\\u0633\\u0627\\u0628 \\u0634\\u0645\\u0627 \\u0641\\u0639\\u0627\\u0644 \\u06af\\u0631\\u062f\\u06cc\\u062f\\u060c \\u0644\\u0637\\u0641\\u0627 \\u0627\\u0632 \\u0637\\u0631\\u06cc\\u0642 \\u0644\\u06cc\\u0646\\u06a9 \\u0632\\u06cc\\u0631 \\u0628\\u0631\\u0627\\u06cc \\u0648\\u0631\\u0648\\u062f \\u0628\\u0647 \\u062d\\u0633\\u0627\\u0628 \\u062e\\u0648\\u062f \\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647 \\u0646\\u0645\\u0627\\u06cc\\u06cc\\u062f\\n\\n#loginlink\\n\\n\\u0628\\u0627 \\u062a\\u0634\\u06a9\\u0631\\n#webadmin\\n\",\"avl_vars\":\"#username,#loginlink,#webadmin\"}', 1);


#
# TABLE STRUCTURE FOR: dbc_facilities
#

DROP TABLE IF EXISTS dbc_facilities;

CREATE TABLE `dbc_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `icon` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (1, 'تهویه هوا', 'ac1.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (2, 'بالکون', 'balcony.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (3, 'کابل تلویزیون', 'cabletv.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (4, 'کامپیوتر', 'computer.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (5, 'ماشین ظرفشویی', 'dishwasher.jpg', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (6, 'گریل', 'grill.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (7, 'گرمکن', 'heater.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (8, 'بدن سازی', 'lift.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (9, 'پارکینگ', 'parking.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (10, 'استخر', 'pool.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (11, 'ماشین لباسشویی', 'washing_machine.png', 1);
INSERT INTO dbc_facilities (`id`, `title`, `icon`, `status`) VALUES (12, 'اینترنت ADSL', 'wifi.png', 1);


#
# TABLE STRUCTURE FOR: dbc_language
#

DROP TABLE IF EXISTS dbc_language;

CREATE TABLE `dbc_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `lang` char(50) NOT NULL,
  `short_name` char(5) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO dbc_language (`id`, `unique_id`, `lang`, `short_name`, `values`, `status`) VALUES (11, 'Persian-FA', 'Persian', 'en', '{\"DBC_PURPOSE_SALE\":\"\\u0641\\u0631\\u0648\\u0634\",\"DBC_PURPOSE_RENT\":\"\\u0627\\u062c\\u0627\\u0631\\u0647\",\"DBC_PURPOSE_BOTH\":\"\\u0641\\u0631\\u0648\\u0634 \\u0648 \\u0627\\u062c\\u0627\\u0631\\u0647\",\"DBC_TYPE_APARTMENT\":\"\\u0622\\u067e\\u0627\\u0631\\u062a\\u0645\\u0627\\u0646\",\"DBC_TYPE_HOUSE\":\"\\u062e\\u0627\\u0646\\u0647\",\"DBC_TYPE_LAND\":\"\\u0632\\u0645\\u06cc\\u0646\",\"DBC_TYPE_COMSPACE\":\"\\u062f\\u0641\\u062a\\u0631 \\u06a9\\u0627\\u0631\",\"DBC_CONDITION_NEW\":\"\\u062c\\u062f\\u06cc\\u062f\",\"DBC_CONDITION_SOLD\":\"\\u0641\\u0631\\u0648\\u062e\\u062a\\u0647 \\u0634\\u062f\\u0647\",\"DBC_CONDITION_AVAILABLE\":\"\\u062f\\u0631 \\u062f\\u0633\\u062a\\u0631\\u0633\",\"DBC_CONDITION_AUCTION\":\"\\u062d\\u0631\\u0627\\u062c\",\"DBC_SIGN_IN\":\"\\u0648\\u0631\\u0648\\u062f \\u0628\\u0647 \\u0633\\u06cc\\u0633\\u062a\\u0645\",\"DBC_SIGN_UP\":\"\\u062b\\u0628\\u062a \\u0646\\u0627\\u0645\",\"DBC_AGENT_PANEL\":\"\\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc \\u067e\\u0646\\u0644\",\"DBC_ADMIN_PANEL\":\"\\u067e\\u0646\\u0644 \\u0645\\u062f\\u06cc\\u0631\\u06cc\\u062a\",\"DBC_LOGOUT\":\"\\u062e\\u0631\\u0648\\u062c \\u0627\\u0632 \\u0633\\u06cc\\u0633\\u062a\\u0645\",\"DBC_FIND_YOUR_PLACE\":\"\\u06cc\\u0627\\u0641\\u062a\\u0646 \\u0645\\u062d\\u0644 \\u0634\\u0645\\u0627\",\"DBC_SEARCH_TEXT\":\"\\u062c\\u0633\\u062a\\u062c\\u0648 \\u0628\\u0631\\u0627\\u06cc \\u0622\\u062f\\u0631\\u0633 \\u060c \\u0645\\u062d\\u0644\\u0647 \\u060c \\u0634\\u0647\\u0631 \\u0648 \\u06cc\\u0627 \\u0627\\u0633\\u062a\\u0627\\u0646\",\"DBC_ADVANCED_SEARCH\":\"\\u062c\\u0633\\u062a \\u0648 \\u062c\\u0648\\u06cc \\u067e\\u06cc\\u0634\\u0631\\u0641\\u062a\\u0647\",\"DBC_RECENT_PROPERTIES\":\"\\u0622\\u062e\\u0631\\u06cc\\u0646 \\u0627\\u0645\\u0644\\u0627\\u06a9\",\"DBC_AGENTS\":\"\\u0622\\u0698\\u0627\\u0646\\u0633 \\u0647\\u0627\",\"DBC_NO_ESTATES_FOUND\":\"\\u0647\\u06cc\\u0686 \\u0645\\u0644\\u06a9\\u06cc \\u06cc\\u0627\\u0641\\u062a \\u0646\\u06af\\u0631\\u062f\\u06cc\\u062f\",\"DBC_HOME\":\"\\u062e\\u0627\\u0646\\u0647\",\"DBC_ABOUT\":\"\\u062f\\u0631\\u0628\\u0627\\u0631\\u0647 \\u0645\\u0627\",\"DBC_CONTACT\":\"\\u062a\\u0645\\u0627\\u0633 \\u0628\\u0627 \\u0645\\u0627\",\"DBC_PLAIN_SEARCH\":\"\\u062c\\u0633\\u062a\\u062c\\u0648\\u06cc \\u062e\\u0627\\u0645\",\"DBC_IGNORE_THIS_SECTION\":\"\\u0646\\u0627\\u062f\\u06cc\\u062f\\u0647 \\u06af\\u0631\\u0641\\u062a\\u0646 \\u0627\\u06cc\\u0646 \\u0628\\u062e\\u0634\",\"DBC_LOCATION_SEARCH\":\"\\u062c\\u0633\\u062a\\u062c\\u0648 \\u062f\\u0631  \\u0634\\u0647\\u0631 \\u0647\\u0627\",\"DBC_COUNTRY\":\"\\u06a9\\u0634\\u0648\\u0631\",\"DBC_STATE_PROVINCE\":\"\\u0627\\u0633\\u062a\\u0627\\u0646\",\"DBC_CITY\":\"\\u0634\\u0647\\u0631\",\"DBC_PRICE\":\"\\u0642\\u06cc\\u0645\\u062a\",\"DBC_BEDROOM\":\"\\u0627\\u062a\\u0627\\u0642 \\u062e\\u0648\\u0627\\u0628\",\"DBC_BATHROOM\":\"\\u062d\\u0645\\u0627\\u0645 \\u0648 \\u0633\\u0631\\u0648\\u06cc\\u0633 \\u0628\\u0647\\u062f\\u0627\\u0634\\u062a\\u06cc\",\"DBC_YEAR_BUILT\":\"\\u0633\\u0627\\u0644 \\u0633\\u0627\\u062e\\u062a\",\"DBC_PHONE\":\"\\u062a\\u0644\\u0641\\u0646\",\"DBC_FIRST_NAME\":\"\\u0646\\u0627\\u0645\",\"DBC_LAST_NAME\":\"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc\",\"DBC_COMPANY_NAME\":\"\\u0646\\u0627\\u0645 \\u0634\\u0631\\u06a9\\u062a\",\"DBC_REGISTER\":\"\\u062b\\u0628\\u0627\\u062a\",\"DBC_TYPE\":\"\\u0646\\u0648\\u0639\",\"DBC_AREA\":\"\\u0645\\u062a\\u0631\\u0627\\u0698\",\"DBC_DETAILS\":\"\\u062c\\u0632\\u0626\\u06cc\\u0627\\u062a\",\"DBC_VIEW_ALL\":\"\\u0645\\u0634\\u0627\\u0647\\u062f\\u0647 \\u0647\\u0645\\u0647\",\"DBC_FEATURED_PROPERTIES\":\"\\u0627\\u0645\\u0644\\u0627\\u06a9 \\u0648\\u06cc\\u0698\\u0647\",\"DBC_ORDER_BY\":\"\\u062a\\u0631\\u062a\\u06cc\\u0628\",\"DBC_NONE\":\"\\u0647\\u06cc\\u0686 \\u06cc\\u06a9\",\"DBC_TNC\":\"\\u0634\\u0631\\u0627\\u06cc\\u0637 \\u0648 Confition\",\"DBC_REG_SUCCESS\":\"\\u062b\\u0628\\u062a \\u0646\\u0627\\u0645 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc \\u0634\\u0645\\u0627 \\u0645\\u0648\\u0641\\u0642 \\u0627\\u0633\\u062a . \",\"DBC_LIMIT\":\"\\u0645\\u062d\\u062f\\u0648\\u062f\\u06cc\\u062a\",\"DBC_USAGE\":\"\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647\",\"DBC_RECOVER\":\"\\u0628\\u0627\\u0632\\u06cc\\u0627\\u0628\\u06cc\",\"DBC_OOPS\":\"\\u0627\\u0648\\u0647\\u060c \\u0635\\u0641\\u062d\\u0647 \\u06cc\\u0627\\u0641\\u062a \\u0646\\u0634\\u062f\",\"DBC_SHARE_THIS\":\"\\u0628\\u0647 \\u0627\\u0634\\u062a\\u0631\\u0627\\u06a9 \\u06af\\u0630\\u0627\\u0634\\u062a\\u0646 \\u0627\\u06cc\\u0646\",\"DBC_BATH\":\"\\u062d\\u0645\\u0627\\u0645 \\u0648 \\u062f\\u0633\\u062a\\u0634\\u0648\\u06cc\\u06cc\",\"DBC_STATUS\":\"\\u0648\\u0636\\u0639\\u06cc\\u062a\",\"DBC_DESCRIPTION\":\"\\u062a\\u0648\\u0636\\u06cc\\u062d\\u0627\\u062a\",\"DBC_GA\":\"\\u0627\\u0645\\u06a9\\u0627\\u0646\\u0627\\u062a \\u0639\\u0645\\u0648\\u0645\\u06cc\",\"DBC_LOCATION_MAP\":\"\\u0646\\u0642\\u0634\\u0647 \\u0645\\u062d\\u0644 \\u0633\\u06a9\\u0648\\u0646\\u062a\",\"DBC_IMAGE_GALLERY\":\"\\u06af\\u0627\\u0644\\u0631\\u06cc \\u0639\\u06a9\\u0633\",\"DBC_SUMMARY\":\"\\u062e\\u0644\\u0627\\u0635\\u0647\",\"DBC_OVERVIEW\":\"\\u062f\\u0631 \\u06cc\\u06a9 \\u0646\\u06af\\u0627\\u0647\",\"DBC_ADDRESS\":\"\\u0646\\u0634\\u0627\\u0646\\u06cc\",\"DBC_AGENT\":\"\\u0639\\u0627\\u0645\\u0644\",\"DBC_MESSAGE\":\"\\u067e\\u06cc\\u0627\\u0645\",\"DBC_USER_NAME\":\"\\u0646\\u0627\\u0645 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc\",\"DBC_ABOUT_ME\":\"\\u062f\\u0631\\u0628\\u0627\\u0631\\u0647 \\u0645\\u0646\",\"DBC_PER_MONTH\":\"\\u0647\\u0631 \\u0645\\u0627\\u0647\",\"DBC_PER_QUARTER\":\"\\u062f\\u0631 \\u0637\\u0648\\u0644 \\u0633\\u0647 \\u0645\\u0627\\u0647\\u0647\",\"DBC_PER_YEAR\":\"\\u062f\\u0631 \\u0637\\u0648\\u0644 \\u0633\\u0627\\u0644\",\"DBC_TYPE_CONDO\":\"\\u0645\\u062d\\u0644 \\u0633\\u06a9\\u0648\\u0646\\u062a\",\"DBC_TYPE_VILLA\":\"\\u0648\\u06cc\\u0644\\u0627\",\"DBC_TYPE_FILTERS\":\"\\u0646\\u0648\\u0639 \\u0641\\u06cc\\u0644\\u062a\\u0631\\u0647\\u0627\",\"DBC_PURPOSE_FILTERS\":\"\\u0641\\u06cc\\u0644\\u062a\\u0631\\u0647\\u0627 \\u0647\\u062f\\u0641\",\"DBC_EMAIL_SUBJECT\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u06cc\\u0645\\u06cc\\u0644\",\"DBC_ALL\":\"\\u0647\\u0645\\u0647\",\"DBC_DELETED\":\"\\u062d\\u0630\\u0641 \\u0634\\u062f\\u0647\",\"DBC_AGENT_PROPERTIES\":\"\\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc \\u0647\\u0627\\u06cc \\u0648\\u06cc\\u0698\\u0647\",\"DBC_ALL_AGENTS\":\"\\u0647\\u0645\\u0647 \\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc\\u0647\\u0627\",\"DBC_CONTACT_US\":\"\\u062a\\u0645\\u0627\\u0633 \\u0628\\u0627 \\u0645\\u0627\",\"DBC_ACTIVE\":\"\\u0641\\u0639\\u0627\\u0644\",\"DBC_RADIUS\":\"\\u0634\\u0639\\u0627\\u0639\",\"DBC_VIDEO_EMBED\":\"\\u0648\\u06cc\\u0698\\u0647 \\u0648\\u06cc\\u062f\\u0626\\u0648\",\"DBC_PROPERTIES\":\"\\u0627\\u0645\\u0644\\u0627\\u06a9\",\"DBC_EMBED_VIDEO_URL\":\"Embeded \\u0648\\u06cc\\u062f\\u0626\\u0648 \\u0622\\u062f\\u0631\\u0633\",\"DBC_PENDING\":\"\\u062f\\u0631 \\u0627\\u0646\\u062a\\u0638\\u0627\\u0631 \\u062a\\u0627\\u06cc\\u06cc\\u062f\",\"DBC_PROFILE_PHOTO\":\"\\u0645\\u0634\\u062e\\u0635\\u0627\\u062a \\u0639\\u06a9\\u0633\",\"DBC_TOP_PROPERTIES\":\"\\u062e\\u0648\\u0627\\u0635 \\u0628\\u0627\\u0644\\u0627\",\"DBC_PROPERTY\":\"\\u062e\\u0627\\u0635\\u06cc\\u062a\",\"DBC_REPORTED\":\"\\u06af\\u0632\\u0627\\u0631\\u0634 \\u0634\\u062f\\u0647\",\"_empty_\":\"\",\"Update\":\"\\u0628\\u0647 \\u0631\\u0648\\u0632 \\u0631\\u0633\\u0627\\u0646\\u06cc\",\"Tags\":\"\\u0628\\u0631\\u0686\\u0633\\u0628 \\u0647\\u0627\"}', 1);


#
# TABLE STRUCTURE FOR: dbc_locations
#

DROP TABLE IF EXISTS dbc_locations;

CREATE TABLE `dbc_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) NOT NULL,
  `type` char(10) CHARACTER SET utf32 NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO dbc_locations (`id`, `parent`, `name`, `type`, `status`) VALUES (1, 0, 'ایران', 'country', 1);
INSERT INTO dbc_locations (`id`, `parent`, `name`, `type`, `status`) VALUES (2, 1, 'فارس', 'state', 1);
INSERT INTO dbc_locations (`id`, `parent`, `name`, `type`, `status`) VALUES (3, 2, 'شیراز', 'city', 1);


#
# TABLE STRUCTURE FOR: dbc_media
#

DROP TABLE IF EXISTS dbc_media;

CREATE TABLE `dbc_media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_name` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `media_url` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: dbc_options
#

DROP TABLE IF EXISTS dbc_options;

CREATE TABLE `dbc_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` char(255) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (1, 'paypal', '{\"item_name\":\"Bookit Service Booking\",\"email\":\"shimulcsedu@gmail.com\",\"currency\":\"USD\",\"sandbox\":\"On\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (2, 'site_settings', '{\"site_title\":\"\\u0627\\u0645\\u0644\\u0627\\u06a9 \\u06af\\u0633\\u062a\\u0631\",\"footer_text\":\"\\u062a\\u0645\\u0627\\u0645\\u06cc \\u062d\\u0642\\u0648\\u0642 \\u0627\\u06cc\\u0646 \\u0633\\u0627\\u06cc\\u062a \\u0645\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0647 \\u0633\\u0627\\u0645\\u0627\\u0646\\u0647 \\u0628\\u0646\\u06af\\u0627\\u0647 \\u0633\\u0627\\u0632 \\u0645\\u06cc\\u0628\\u0627\\u0634\\u062f\",\"site_logo\":\"http:\\/\\/amlak.bonvo.ir\\/assets\\/images\\/logo\\/asanbongah5.png\",\"site_lang\":\"en\",\"site_direction\":\"ltr\",\"site_direction_rules\":\"required\",\"per_page\":\"10\",\"default_layout\":\"1\",\"meta_description\":\"\\u0648\\u0628\\u0633\\u0627\\u06cc\\u062a \\u0646\\u0648\\u0634\\u062a\\u0647 \\u0634\\u062f\\u0647 \\u062a\\u0648\\u0633\\u0637 \\u0627\\u0645\\u0644\\u0627\\u06a9 \\u06af\\u0633\\u062a\\u0631\",\"key_words\":\"\\u0627\\u0645\\u0644\\u0627\\u06a9 \\u06af\\u0633\\u062a\\u0631\\u060c  \\u0628\\u0646\\u06af\\u0627\\u0647\\u060c \\u0627\\u0645\\u0644\\u0627\\u06a9\\u060c \\u0645\\u0644\\u06a9\\u060c \\u062e\\u0627\\u0646\\u0647\\u060c \\u0622\\u067e\\u0627\\u0631\\u062a\\u0645\\u0627\\u0646\",\"crawl_after\":\"3\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (3, 'active_theme', 'default', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (4, 'positions', '[{\"name\":\"content_top\",\"status\":1,\"widgets\":false},{\"name\":\"content_bottom\",\"status\":1,\"widgets\":false},{\"name\":\"right_bar_home\",\"status\":1,\"widgets\":[\"all_types\",\"all_purposes\",\"top_agents\",\"featured_properties\"]},{\"name\":\"right_bar\",\"status\":1,\"widgets\":false},{\"name\":\"right_bar_post_detail\",\"status\":1,\"widgets\":false},{\"name\":\"footer_first_column\",\"status\":1,\"widgets\":[\"contact_text\"]},{\"name\":\"footer_second_column\",\"status\":1,\"widgets\":[\"follow_us\"]},{\"name\":\"footer_third_column\",\"status\":1,\"widgets\":[\"shot_description\"]},{\"name\":\"right_bar_all_agents\",\"status\":1,\"widgets\":[\"top_agents\",\"top_properties\",\"featured_properties\"]},{\"name\":\"right_bar_agent_properties\",\"status\":1,\"widgets\":[\"all_types\",\"all_purposes\",\"top_agents\",\"top_properties\"]},{\"name\":\"right_bar_general\",\"status\":1,\"widgets\":[\"all_types\",\"all_purposes\",\"top_agents\",\"top_properties\"]}]', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (5, 'top_menu', '[{\"id\":\"1\",\"parent\":0},{\"id\":\"2\",\"parent\":0},{\"id\":\"6\",\"parent\":0},{\"id\":\"4\",\"parent\":0}]', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (6, 'wordfilters', '{\"bitch\":\"b***h\",\"fuck\":\"f**k\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (7, 'memento_settings', '{\"publish_directly\":\"Yes\",\"publish_directl_rules\":\"required\",\"do_water_mark\":\"Yes\",\"do_water_mark_rules\":\"required\",\"water_mark_text\":\"@dbc\",\"water_mark_text_rules\":\"required\",\"enable_fb_login\":\"Yes\",\"enable_fb_login_rules\":\"required\",\"fb_app_id\":\"462520657185800\",\"fb_app_id_rules\":\"required\",\"fb_secret_key\":\"320d2893c6d89e135418d14cb510d89f\",\"fb_secret_key_rules\":\"required\",\"enable_gplus_login\":\"Yes\",\"enable_gplus_login_rules\":\"required\",\"gplus_app_id\":\"107878798713-inf6f7gfik9br4nc6iun54eccb8h7oqo.apps.googleusercontent.com\",\"gplus_app_id_rules\":\"required\",\"gplus_secret_key\":\"RgFEewdswHgjNb3zyODNWcz1\",\"gplus_secret_key_rules\":\"required\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (8, 'purchase_key', '466cf0b3-25f7-4772-842e-78d02e54fedb', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (9, 'item_id', '8352001', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (10, 'realestate_settings', '{\"publish_directly\":\"Yes\",\"publish_directly_rules\":\"required\",\"system_currency\":\"IRR\",\"system_currency_type\":\"0\",\"system_currency_rules\":\"required\",\"enable_signup\":\"Yes\",\"enable_signup_rules\":\"required\",\"enable_pricing\":\"Yes\",\"enable_pricing_rules\":\"required\",\"hide_posts_if_expired\":\"No\",\"hide_posts_if_expired_rules\":\"required\",\"show_admin_agent\":\"Yes\",\"show_admin_agent_rules\":\"required\",\"currency_placing\":\"after_with_no_gap\",\"currency_placing_rules\":\"required\",\"enable_fb_login\":\"No\",\"enable_fb_login_rules\":\"required\",\"fb_app_id\":\"\",\"fb_app_id_rules\":\"\",\"fb_secret_key\":\"\",\"fb_secret_key_rules\":\"\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (11, 'paypal_settings', '{\"enable_sandbox_mode\":\"Yes\",\"enable_sandbox_mode_rules\":\"required\",\"item_name\":\"Realestate Agent Package\",\"item_name_rules\":\"required\",\"email\":\"seller@paypalsandbox.com\",\"email_rules\":\"required\",\"currency\":\"USD\",\"currency_rules\":\"required\",\"finish_url\":\"account\\/finish_url\",\"finish_url_rules\":\"required\",\"cancel_url\":\"account\\/cancel_url\",\"cancel_url_rules\":\"required\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (12, 'banner_settings', '{\"menu_bg_color\":\"rgba(31,31,31,1)\",\"menu_text_color\":\"#c42a58\",\"banner_type\":\"Google Map\",\"slider_speed\":\"3000\",\"sliders\":\"[\\\"1729728797_30e74542e9_o1.jpg\\\",\\\"beautiful_house-wallpaper-1920x1440-1920x664.jpg\\\",\\\"View-over-the-lake_www.LuxuryWallpapers_.net_-1920x664_.jpg\\\"]\",\"search_box_position\":\"bottom\",\"search_bg\":\"vacation_house_interior-wallpaper-1920x1200-1920x664.jpg\",\"map_latitude\":\"29.609231\",\"map_longitude\":\"52.522043\",\"map_zoom\":\"12\"}', 1);
INSERT INTO dbc_options (`id`, `key`, `values`, `status`) VALUES (13, 'webadmin_email', '{\"contact_email\":\"convertersoft@gmail.com\",\"webadmin_name\":\"\\u0645\\u062f\\u0631\\u06cc\\u062a \\u0628\\u0646\\u06af\\u0627\\u0647\",\"webadmin_email\":\"convertersoft@gmail.com\"}', 1);


#
# TABLE STRUCTURE FOR: dbc_packages
#

DROP TABLE IF EXISTS dbc_packages;

CREATE TABLE `dbc_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `max_post` int(11) NOT NULL,
  `expiration_time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO dbc_packages (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES (1, 'Basic', 'Sample Package Description...', '5.00', 10, 30, 0);
INSERT INTO dbc_packages (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES (2, 'Normal', '', '10.00', 10, 60, 0);
INSERT INTO dbc_packages (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES (3, '??????', '???? ????? ?????? ?? ????', '0.00', 9999, 365, 0);
INSERT INTO dbc_packages (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES (4, 'عضویت رایگان یک ساله', 'در این بسته شما میتوانید با رایگان برای یک سال املاک خود را به سایت اضافه نمایید', '0.00', 10, 180, 1);


#
# TABLE STRUCTURE FOR: dbc_pages
#

DROP TABLE IF EXISTS dbc_pages;

CREATE TABLE `dbc_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` char(50) NOT NULL,
  `show_in_menu` int(1) NOT NULL DEFAULT '1',
  `layout` int(1) NOT NULL,
  `content_from` char(10) NOT NULL DEFAULT 'Manual',
  `title` text NOT NULL,
  `url` char(150) NOT NULL,
  `content` text NOT NULL,
  `sidebar` text NOT NULL,
  `seo_settings` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (1, 'dbc_home', 1, 1, 'Url', '[DBC_HOME]', '', '<p>hello</p>', '', '{\"meta_description\":\"test meta lorem ispum\",\"key_words\":\"meme,gag,fufu\",\"crawl_after\":\"3\"}', '2013-12-20 17:16:23', 1, 0, 0);
INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (2, 'dbc_search', 1, 1, 'Url', '[DBC_ADVANCED_SEARCH]', 'show/search', '<p>ispum</p>', '<p>lorem</p>', '', '2013-12-20 17:16:41', 1, 0, 0);
INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (3, 'dbc_about', 1, 1, 'Manual', '[DBC_ABOUT]', 'show/page/dbc_about', '<p>ما یک برنامه نویس بسیار زبده هستیم که در هر زیمنه فعالیت میکنیم</p>', '<p>doller</p>', '{\"meta_description\":\"\",\"key_words\":\"\",\"crawl_after\":\"\"}', '2013-12-20 17:17:00', 2, 0, 0);
INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (4, 'dbc_contact', 1, 1, 'Url', '[DBC_CONTACT]', 'show/contact', '', '', '{\"meta_description\":\"contact us page for memento, this meta will be read by search engine\",\"key_words\":\"fun, contact, gag\",\"crawl_after\":\"3\"}', '2014-06-23 19:12:26', 1, 1, 0);
INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (5, 'dbc_advanced_search', 1, 0, 'Url', '[DBC_ADVANCED_SEARCH]', '', '', '', '{\"meta_description\":\"\",\"key_words\":\"\",\"crawl_after\":\"\"}', '2014-07-20 12:31:25', 0, 1, 0);
INSERT INTO dbc_pages (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES (6, 'dbc_agents', 1, 0, 'Url', '[DBC_AGENTS]', 'show/agent', '', '', '{\"meta_description\":\"\",\"key_words\":\"\",\"crawl_after\":\"\"}', '2014-07-21 18:22:04', 1, 1, 0);


#
# TABLE STRUCTURE FOR: dbc_phone
#

DROP TABLE IF EXISTS dbc_phone;

CREATE TABLE `dbc_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `bedroomstart` int(11) NOT NULL,
  `bedroomend` int(11) NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  `date` int(11) NOT NULL,
  `receivedcount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `ejarestart` decimal(5,2) DEFAULT NULL,
  `ejareend` decimal(5,2) DEFAULT NULL,
  `rahnstart` decimal(5,2) DEFAULT NULL,
  `rahnend` decimal(5,2) DEFAULT NULL,
  `saleend` decimal(5,2) DEFAULT NULL,
  `salestart` decimal(5,2) DEFAULT NULL,
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (1, 'DBC_PURPOSE_SALE', 'DBC_TYPE_APARTMENT', 1, 1, '09399477290', 1412753905, 0, 1, NULL, NULL, NULL, '0.00', '0.00', '0.00', 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (2, 'DBC_PURPOSE_SALE', 'DBC_TYPE_APARTMENT', 1, 1, '09399477290', 1412753931, 1, 1, NULL, NULL, '0.00', '0.00', '0.00', '20.32', 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (3, 'DBC_PURPOSE_SALE', 'DBC_TYPE_APARTMENT', 1, 1, '09399477290', 1412754100, 0, 1, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (4, 'DBC_PURPOSE_SALE', 'DBC_TYPE_APARTMENT', 1, 1, '09399477290', 1412754156, 0, 1, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (5, 'DBC_PURPOSE_BOTH', 'DBC_TYPE_HOUSE', 2, 4, '09399477290', 1412754776, 0, 1, '1.50', '2.00', '30.00', '35.00', '350.00', '300.00', 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (6, 'DBC_PURPOSE_SALE', 'DBC_TYPE_HOUSE', 2, 3, '09399477290', 1412768319, 0, 1, NULL, NULL, NULL, NULL, '400.00', '200.00', 1);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (7, 'DBC_PURPOSE_RENT', 'DBC_TYPE_APARTMENT', 3, 4, '09351349980', 1412768359, 0, 1, '1.00', '1.20', NULL, NULL, NULL, NULL, 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (8, 'DBC_PURPOSE_RENT', 'DBC_TYPE_HOUSE', 1, 1, '09399477290', 1412774942, 0, 1, '2.50', '3.00', '100.00', '150.00', NULL, NULL, 0);
INSERT INTO dbc_phone (`id`, `purpose`, `type`, `bedroomstart`, `bedroomend`, `phonenumber`, `date`, `receivedcount`, `status`, `ejarestart`, `ejareend`, `rahnstart`, `rahnend`, `saleend`, `salestart`, `delete`) VALUES (9, 'DBC_PURPOSE_SALE', 'DBC_TYPE_APARTMENT', 2, 3, '09399477290', 1412838234, 0, 1, NULL, NULL, NULL, NULL, '300.00', '200.00', 0);


#
# TABLE STRUCTURE FOR: dbc_phonesetting
#

DROP TABLE IF EXISTS dbc_phonesetting;

CREATE TABLE `dbc_phonesetting` (
  `name` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('api', '695474396D466A59495033316A307571492F4B6965513D3D');
INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('bongahname', 'املاک گستر');
INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('callbackphone', '09171094018');
INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('enablesms', '1');
INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('smsnumber', '30006703323323');
INSERT INTO dbc_phonesetting (`name`, `value`) VALUES ('subscribetext', 'مشتری گرامی، شماره تماس شما برای دریافت املاک جدید به سامانه املاک گستر اضافه گردید.');


#
# TABLE STRUCTURE FOR: dbc_plugins
#

DROP TABLE IF EXISTS dbc_plugins;

CREATE TABLE `dbc_plugins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: dbc_post_meta
#

DROP TABLE IF EXISTS dbc_post_meta;

CREATE TABLE `dbc_post_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (1, 1, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (2, 1, 'description', '{\"en\":\"\\u06cc\\u06a9 \\u062e\\u0627\\u0646\\u0647 \\u0628\\u0633\\u06cc\\u0627\\u0631 \\u0639\\u0627\\u0644\\u06cc \\u0628\\u0627 \\u0645\\u062a\\u0631\\u0627\\u0698 \\u0628\\u0627\\u0644\\u0627 \\u0628\\u0647 \\u0641\\u0631\\u0648\\u0634 \\u0645\\u06cc\\u0631\\u0633\\u062f...\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (3, 1, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (4, 1, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (5, 2, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0648\\u06cc\\u0644\\u06cc\\u0627\\u06cc\\u06cc \\u0628\\u0631\\u0627\\u06cc \\u0627\\u062c\\u0627\\u0631\\u0647\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (6, 2, 'description', '{\"en\":\"\\u062c\\u0647\\u0627\\u0646 \\u0628\\u0647 \\u0633\\u0631\\u0639\\u062a \\u0645\\u0648\\u062c \\u0633\\u0648\\u0645 \\u064a\\u0627 \\u0639\\u0635\\u0631 \\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a \\u0631\\u0627 \\u067e\\u0634\\u062a \\u0633\\u0631 \\u0645\\u064a \\u06af\\u0632\\u0627\\u0631\\u062f \\u0648 \\u0628\\u0631\\u0627\\u064a \\u0648\\u0631\\u0648\\u062f \\u0628\\u0647 \\u0645\\u0648\\u062c \\u0686\\u0647\\u0627\\u0631\\u0645 \\u064a\\u0639\\u0646\\u064a \\u0639\\u0635\\u0631 \\u0645\\u062c\\u0627\\u0632\\u064a \\u0622\\u0645\\u0627\\u062f\\u0647 \\u0645\\u064a\\u200c\\u0634\\u0648\\u062f. \\u0639\\u0635\\u0631 \\u0645\\u062c\\u0627\\u0632\\u064a \\u0628\\u0634\\u0631 \\u0631\\u0627 \\u0627\\u0632 \\u0641\\u0636\\u0627\\u064a \\u062f\\u0648\\u200c\\u0628\\u0639\\u062f\\u064a \\u0627\\u064a\\u0646\\u062a\\u0631\\u0646\\u062a \\u0648 \\u062c\\u0627\\u0645\\u0639\\u0647 \\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a\\u064a \\u0643\\u0647 \\u0627\\u0645\\u0631\\u0648\\u0632\\u0647 \\u062f\\u0631 \\u062d\\u0627\\u0644 \\u0634\\u0643\\u0644\\u200c\\u06af\\u064a\\u0631\\u064a \\u0627\\u0633\\u062a \\u0628\\u0647 \\u0641\\u0636\\u0627\\u064a \\u0633\\u0647\\u200c\\u0628\\u0639\\u062f\\u064a \\u0648 \\u062c\\u0627\\u0645\\u0639\\u0647 \\u0645\\u062c\\u0627\\u0632\\u064a \\u0645\\u0646\\u062a\\u0642\\u0644 \\u0645\\u064a\\u0643\\u0646\\u062f.<br>\\u0627\\u06af\\u0631 \\u0645\\u0627 \\u0686\\u0634\\u0645 \\u0627\\u0646\\u062f\\u0627\\u0632 \\u0622\\u064a\\u0646\\u062f\\u0647 \\u062c\\u0647\\u0627\\u0646 \\u0631\\u0627 \\u062f\\u0646\\u064a\\u0627\\u064a \\u0633\\u0647\\u200c\\u0628\\u0639\\u062f\\u064a \\u0639\\u0635\\u0631 \\u0645\\u062c\\u0627\\u0632\\u064a \\u062d\\u0627\\u0635\\u0644 \\u0627\\u0632 \\u0686\\u0647\\u0627\\u0631\\u0645\\u064a\\u0646 \\u0645\\u0648\\u062c \\u062a\\u063a\\u064a\\u064a\\u0631 \\u0648 \\u062a\\u062d\\u0648\\u0644\\u0627\\u062a \\u0628\\u0634\\u0631 \\u0628\\u0627 \\u0647\\u062f\\u0641 \\u0645\\u0639\\u0646\\u0648\\u064a\\u062a \\u0648 \\u062a\\u0648\\u0633\\u0639\\u0647 \\u0639\\u062f\\u0627\\u0644\\u062a \\u0642\\u0631\\u0627\\u0631 \\u062f\\u0647\\u064a\\u0645\\u060c \\u0642\\u0637\\u0639\\u0627 \\u0634\\u0631\\u0627\\u064a\\u0637\\u064a \\u0631\\u0627 \\u0628\\u0648\\u062c\\u0648\\u062f \\u0622\\u0648\\u0631\\u062f\\u0647\\u200c\\u0627\\u064a\\u0645 \\u0643\\u0647 \\u0645\\u064a\\u0632\\u0627\\u0646\\u064a \\u0628\\u0631\\u0627\\u064a \\u0627\\u0631\\u0632\\u0634\\u064a\\u0627\\u0628\\u064a \\u0648 \\u0633\\u0646\\u062c\\u0634 \\u062c\\u0627\\u0645\\u0639\\u0647 \\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a\\u064a \\u0641\\u0631\\u062f\\u0627 \\u062e\\u0648\\u0627\\u0647\\u064a\\u0645 \\u062f\\u0627\\u0634\\u062a.<br>\\u062f\\u0631 \\u0686\\u0646\\u064a\\u0646 \\u0634\\u0631\\u0627\\u064a\\u0637\\u064a \\u0646\\u064a\\u0627\\u0632 \\u0628\\u0647 \\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647 \\u0627\\u0632 \\u0627\\u0628\\u0632\\u0627\\u0631\\u0647\\u0627 \\u0648 \\u0631\\u0648\\u0634\\u0647\\u0627\\u06cc \\u0645\\u062e\\u062a\\u0644\\u0641 \\u0641\\u0646\\u0627\\u0648\\u0631\\u064a \\u0627\\u0637\\u0644\\u0627\\u0639\\u0627\\u062a, \\u0627\\u0632 \\u062c\\u0645\\u0644\\u0647: \\u064a\\u0627\\u062f\\u06af\\u064a\\u0631\\u064a \\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0643\\u064a \\u0643\\u0647 \\u0628\\u0639\\u0636\\u0627\\u064b \\u0628\\u0647 \\u0622\\u0646 \\u064a\\u0627\\u062f\\u06af\\u064a\\u0631\\u064a \\u0627\\u0632 \\u0631\\u0627\\u0647 \\u062f\\u0648\\u0631\\u060c \\u064a\\u0627\\u062f\\u06af\\u064a\\u0631\\u064a \\u0628\\u0631\\u062e\\u0637\\u060c \\u064a\\u0627\\u062f\\u06af\\u064a\\u0631\\u064a \\u0627\\u0632 \\u0637\\u0631\\u064a\\u0642 \\u0631\\u0627\\u064a\\u0627\\u0646\\u0647 \\u0648 \\u064a\\u0627\\u062f\\u06af\\u064a\\u0631\\u064a \\u0627\\u0632 \\u0637\\u0631\\u064a\\u0642 \\u0627\\u064a\\u0646\\u062a\\u0631\\u0646\\u062a5 \\u0647\\u0631 \\u0631\\u0648\\u0632 \\u0628\\u064a\\u0634\\u062a\\u0631 \\u0648 \\u0628\\u064a\\u0634\\u062a\\u0631 \\u062f\\u0631 \\u0628\\u064a\\u0646 \\u0645\\u0631\\u062f\\u0645 \\u0627\\u062d\\u0633\\u0627\\u0633 \\u0645\\u064a\\u200c\\u0634\\u0648\\u062f.\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (7, 2, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (8, 2, 'from_rent_date', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (9, 2, 'to_rent_date', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (10, 3, 'title', '{\"en\":\"\\u0645\\u0644\\u06a9 \\u0627\\u062c\\u0627\\u0631\\u0647 \\u0627\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (11, 3, 'description', '{\"en\":\"\\u06cc\\u06a9 \\u06a9\\u0644\\u06a9 \\u0627\\u062c\\u0627\\u0631\\u0647 \\u0627\\u06cc \\u0628\\u0627 \\u0642\\u0627\\u0628\\u0644\\u06cc\\u062a \\u0647\\u0627\\u06cc \\u0641\\u0631\\u0627\\u0648\\u0627\\u0646 \\u0628\\u0631\\u0627\\u06cc \\u0634\\u0645\\u0627 \\u062f\\u0648\\u0633\\u062a\\u0627\\u0646 \\u0639\\u0632\\u06cc\\u0632\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (12, 3, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (13, 3, 'from_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (14, 3, 'to_rent_date', '08/19/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (15, 4, 'title', '{\"en\":\"\\u0632\\u0645\\u06cc\\u0646 \\u0632\\u0631\\u0627\\u0639\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (16, 4, 'description', '{\"en\":\"Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (17, 4, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (18, 4, 'from_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (19, 4, 'to_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (20, 4, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (21, 5, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0634\\u0647\\u0631\\u06a9 \\u06af\\u0644\\u0633\\u062a\\u0627\\u0646\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (22, 5, 'description', '{\"en\":\"\\u0642\\u064a\\u0645\\u062a \\u0647\\u0631 \\u0645\\u062a\\u0631 \\u0645\\u0631\\u0628\\u0639 2.7\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0642\\u064a\\u0645\\u062a \\u06a9\\u0644 675\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (23, 5, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (24, 6, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 100 \\u0645\\u062a\\u0631\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (25, 6, 'description', '{\"en\":\"130\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0631\\u0647\\u0646\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (26, 6, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (27, 7, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0633\\u062a\\u0627\\u0631\\u062e\\u0627\\u0646\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (28, 7, 'description', '{\"en\":\"5\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0631\\u0647\\u0646 \\u0648 1.15\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0627\\u062c\\u0627\\u0631\\u0647\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (29, 7, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (30, 8, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0635\\u0646\\u0627\\u06cc\\u0639\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (31, 8, 'description', '{\"en\":\"70\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0631\\u0647\\u0646 \\u0648 1.5\\u0645\\u064a\\u0644\\u064a\\u0648\\u0646 \\u062a\\u0648\\u0645\\u0627\\u0646 \\u0627\\u062c\\u0627\\u0631\\u0647\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (32, 8, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (33, 9, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0641\\u0631\\u0635\\u062a \\u0634\\u06cc\\u0631\\u0627\\u0632\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (34, 9, 'description', '{\"en\":\"\\u0637\\u0628\\u0642\\u0647 \\u0627\\u0648\\u0644-\\u0633\\u064a\\u0633\\u062a\\u0645 \\u0646\\u0642\\u0634\\u0647 \\u06cc\\u06a9 \\u0637\\u0628\\u0642\\u0647 - 2\\u062e\\u0648\\u0627\\u0628\\u0647 \\u062f\\u0631\\u0628 \\u0627\\u0632 \\u062d\\u06cc\\u0627\\u0637 \\u0648 \\u0633\\u0627\\u062e\\u062a\\u0645\\u0627\\u0646-\\u0633\\u0646 \\u0628\\u0646\\u0627 15\\u0633\\u0627\\u0644 -\\u062d\\u06cc\\u0627\\u0637 \\u062f\\u0627\\u0631\\u062f -\\u0646\\u0645\\u0627 229\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (35, 9, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (36, 10, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631\\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (37, 10, 'description', '{\"en\":\"\\u0637\\u0628\\u0642\\u0647 \\u062f\\u0648\\u0645-\\u0632\\u064a\\u0631\\u0628\\u0646\\u0627 160\\u0645\\u062a\\u0631- 3\\u062e\\u0648\\u0627\\u0628\\u0647 -\\u0633\\u0646 \\u0628\\u0646\\u0627 7\\u0633\\u0627\\u0644\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (38, 10, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (39, 11, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0635\\u0641\\u0627\\u06cc\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (40, 11, 'description', '{\"en\":\"\\u062f\\u0631\\u0628 \\u0627\\u0632 \\u062d\\u06cc\\u0627\\u0637-\\u062a\\u0639\\u062f\\u0627\\u062f \\u0637\\u0628\\u0642\\u0627\\u062a 1 -\\u062a\\u0639\\u062f\\u0627\\u062f \\u0648\\u0627\\u06af\\u0630\\u0627\\u0631\\u06cc 1\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (41, 11, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (42, 12, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631\\u06a9\\u0628\\u06cc\\u0631 1\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (43, 12, 'description', '{\"en\":\"\\u0637\\u0628\\u0642\\u0647 \\u0647\\u0645\\u06a9\\u0641-\\u0632\\u064a\\u0631\\u0628\\u0646\\u0627 90\\u0645\\u062a\\u0631- 2\\u062e\\u0648\\u0627\\u0628\\u0647 -\\u0633\\u0646 \\u0628\\u0646\\u0627 20\\u0633\\u0627\\u0644 -\\u062a\\u0639\\u062f\\u0627\\u062f \\u0637\\u0628\\u0642\\u0627\\u062a 1 -\\u062a\\u0639\\u062f\\u0627\\u062f \\u0648\\u0627\\u06af\\u0630\\u0627\\u0631\\u06cc 1\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (44, 12, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (45, 13, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0634\\u0647\\u0631\\u06a9 \\u0627\\u0633\\u062a\\u0642\\u0644\\u0627\\u0644\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (46, 13, 'description', '{\"en\":\"\\u0637\\u0628\\u0642\\u0647 \\u067e\\u06cc\\u0644\\u0648\\u062a-\\u0633\\u064a\\u0633\\u062a\\u0645 \\u0646\\u0642\\u0634\\u0647 \\u0633\\u0648\\u0626\\u06cc\\u062a - 1\\u062e\\u0648\\u0627\\u0628\\u0647 \\u062f\\u0631\\u0628 \\u0627\\u0632 \\u0633\\u0627\\u062e\\u062a\\u0645\\u0627\\u0646-\\u0633\\u0646 \\u0628\\u0646\\u0627 15\\u0633\\u0627\\u0644 -\\u062a\\u0639\\u062f\\u0627\\u062f \\u0637\\u0628\\u0642\\u0627\\u062a 1 -\\u062a\\u0639\\u062f\\u0627\\u062f \\u0648\\u0627\\u06af\\u0630\\u0627\\u0631\\u06cc 2 -\\u0646\\u0645\\u0627 \\u0622\\u062c\\u0631\\u0646\\u0645\\u0627\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (47, 13, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (48, 14, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0645\\u0639\\u0627\\u0644\\u06cc \\u0622\\u0628\\u0627\\u062f\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (49, 14, 'description', '{\"en\":\"\\u0646\\u062f\\u0627\\u0631\\u062f\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (50, 14, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (51, 2, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (52, 14, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (53, 9, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (54, 7, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (55, 15, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0633\\u062a\\u0627\\u0631\\u062e\\u0627\\u0646\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (56, 15, 'description', '{\"en\":\"\\u06cc\\u06a9 \\u0645\\u0644\\u06a9 \\u0628\\u0633\\u06cc\\u0627\\u0631 \\u0632\\u06cc\\u0628\\u0627 \\u062f\\u0631 \\u0633\\u062a\\u0627\\u0631\\u062e\\u0627\\u0646 \\u0628\\u0631\\u0627\\u06cc \\u0645\\u0634\\u062a\\u0631\\u06cc \\u062e\\u0627\\u0635\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (57, 15, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (58, 15, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (59, 16, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0628\\u0631\\u0627\\u06cc \\u062a\\u0633\\u062a\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (60, 16, 'description', '{\"en\":\"\\u06cc\\u06a9 \\u062e\\u0627\\u0646\\u0647 \\u0631\\u0648\\u06cc\\u0627\\u06cc\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (61, 16, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (62, 16, 'from_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (63, 16, 'to_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (64, 17, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0634\\u062e\\u0634\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (65, 17, 'description', '{\"en\":\"\\u0648\\u0631\\u06cc \\u06af\\u0648\\u062f \\u067e\\u0644\\u06cc\\u0633 \\u062a\\u0648 \\u0627\\u0633\\u062a\\u0627\\u0631\\u062a\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (66, 17, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (67, 17, 'from_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (68, 17, 'to_rent_date', '08/05/2014', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (69, 17, 'video_url', 'n/a', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (70, 18, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0633\\u0641\\u0627\\u0644\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (71, 18, 'description', '{\"en\":\"\\u0634\\u0633\\u06cc \\u0634\\u0633\\u06cc\\u0633\\u0634 \\u06cc\\u0634\\u0633\\u06cc\\u0634\\u0633 \\u06cc\\u0633 \\u06cc\\u0634\\u0633\\u06cc \\u0634\\u0633\\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (72, 18, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (73, 19, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (74, 19, 'description', '{\"en\":\"\\u06cc\\u0633\\u0634\\u06cc\\u0634\\u0633 \\u0634\\u0633\\u06cc\\u0634\\u0633 \\u0634\\u0633\\u06cc\\u0633\\u0634\\u06cc\\u0633\\u0634 \\u06cc\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (75, 19, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (76, 20, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (77, 20, 'description', '{\"en\":\"as dsad sadsa dsadas as d\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (78, 20, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (79, 21, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (80, 21, 'description', '{\"en\":\"asdsa dsad as\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (81, 21, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (82, 22, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (83, 22, 'description', '{\"en\":\"sa s dsadsad&nbsp;\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (84, 22, 'tags', '', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (85, 23, 'title', '{\"en\":\"\\u062e\\u0627\\u0646\\u0647 \\u0627\\u0645\\u06cc\\u0631 \\u06a9\\u0628\\u06cc\\u0631\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (86, 23, 'description', '{\"en\":\"\\u0634\\u0633\\u06cc\\u0634\\u0633 \\u06cc\\u0634\\u0633 \\u06cc\\u06cc \\u0634\\u0633\\u06cc\\u0633\\u0634\"}', 1);
INSERT INTO dbc_post_meta (`id`, `post_id`, `key`, `value`, `status`) VALUES (87, 23, 'tags', '', 1);


#
# TABLE STRUCTURE FOR: dbc_posts
#

DROP TABLE IF EXISTS dbc_posts;

CREATE TABLE `dbc_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `type` char(50) NOT NULL,
  `purpose` char(50) NOT NULL,
  `estate_condition` char(50) NOT NULL DEFAULT 'dbc_CONDITION_NEW',
  `home_size` decimal(10,2) NOT NULL,
  `home_size_unit` char(10) NOT NULL,
  `lot_size` decimal(10,2) NOT NULL DEFAULT '0.00',
  `lot_size_unit` char(20) NOT NULL DEFAULT 'sqmeter',
  `total_price` decimal(10,2) NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_unit` char(20) NOT NULL DEFAULT 'IRR',
  `rent_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rent_price_unit` char(20) NOT NULL DEFAULT 'IRR',
  `bedroom` int(3) NOT NULL,
  `bath` int(3) NOT NULL,
  `year_built` int(4) NOT NULL,
  `address` text NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` char(15) NOT NULL,
  `latitude` char(20) NOT NULL,
  `longitude` char(20) NOT NULL,
  `featured_img` char(255) NOT NULL,
  `gallery` text,
  `facilities` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` varchar(200) NOT NULL,
  `publish_time` date NOT NULL DEFAULT '0000-00-00',
  `status` int(1) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `total_view` int(10) NOT NULL DEFAULT '0',
  `search_meta` text,
  `rent_pricerahn` decimal(10,2) NOT NULL DEFAULT '0.00',
  `adddate` bigint(20) NOT NULL DEFAULT '0',
  `private_phone` varchar(256) NOT NULL,
  `private_mobile` varchar(256) NOT NULL,
  `private_address` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (1, '53f5acd921745', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '0.00', 'sqmeter', '150.00', '1.50', 'sqmeter', '0.00', 'IRR', 2, 5, 1900, 'بلوار مدرس', 1, 2, 3, '200', '29.561537757391328', '52.58963855933837', '120395_288.jpg', '[\"120395_2882.jpg\",\"n00084682-b1.jpg\",\"11.jpg\"]', '[\"12\",\"2\",\"8\",\"1\",\"11\"]', 1, 'Thu, 21 Aug 14 08:24:57 +0000', '0000-00-00', 1, 1, 0, 13, 'sale apartment  bedroom bathroom2 5 1900 DBC_CONDITION_AVAILABLE بلوار مدرس 1 فارس شیراز خانه امیر کبیر یک خانه بسیار عالی با متراژ بالا به فروش میرسد...', '0.00', 1410161487, '', '0', ' بلوار مدرس، جنب بانک ملت، کوچه 4، پلاک 200');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (2, '53f5bdac10a14', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '500.00', 'sqmeter', '0.00', 'sqmeter', '1.00', '0.00', 'IRR', '1.00', 'DBC_PER_MONTH', 2, 3, 1900, ' باغ ارم...', 1, 2, 3, '2000', '29.6341657', '52.53072020000002', '1.jpg', '[\"\"]', '[\"12\",\"1\",\"5\",\"11\"]', 1, 'Thu, 21 Aug 14 09:36:44 +0000', '0000-00-00', 1, 0, 0, 16, 'sale apartment  bedroom bathroom2 3 1900 DBC_CONDITION_AVAILABLE  باغ ارم... 1 فارس شیراز خانه ویلیایی برای اجاره جهان به سرعت موج سوم يا عصر اطلاعات را پشت سر مي گزارد و براي ورود به موج چهارم يعني عصر مجازي آماده مي‌شود. عصر مجازي بشر را از فضاي دو‌بعدي اينترنت و جامعه اطلاعاتي كه امروزه در حال شكل‌گيري است به فضاي سه‌بعدي و جامعه مجازي منتقل ميكند.<br>اگر ما چشم انداز آينده جهان را دنياي سه‌بعدي عصر مجازي حاصل از چهارمين موج تغيير و تحولات بشر با هدف معنويت و توسعه عدالت قرار دهيم، قطعا شرايطي را بوجود آورده‌ايم كه ميزاني براي ارزشيابي و سنجش جامعه اطلاعاتي فردا خواهيم داشت.<br>در چنين شرايطي نياز به استفاده از ابزارها و روشهای مختلف فناوري اطلاعات, از جمله: يادگيري الكترونيكي كه بعضاً به آن يادگيري از راه دور، يادگيري برخط، يادگيري از طريق رايانه و يادگيري از طريق اينترنت5 هر روز بيشتر و بيشتر در بين مردم احساس مي‌شود.', '120.00', 1410161487, '', '0', 'سجادیه، جنب شیرینی فروشی، کوچه 10، پلاک 400');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (3, '53f6ef2182ee8', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '0.00', 'sqmeter', '300.00', '0.00', 'IRR', '300.00', 'DBC_PER_MONTH', 2, 1, 1980, 'سجادیه', 1, 2, 3, '10', '29.6192111', '52.43730649999998', '120395_2881.jpg', NULL, '[\"10\",\"12\",\"1\",\"3\",\"4\",\"7\"]', 1, 'Fri, 22 Aug 14 07:20:01 +0000', '0000-00-00', 1, 0, 0, 7, 'rent apartment  bedroom bathroom2 1 1980 DBC_CONDITION_AVAILABLE سجادیه 1 فارس شیراز ملک اجاره ای یک کلک اجاره ای با قابلیت های فراوان برای شما دوستان عزیز', '0.00', 1410161487, '', '0', 'زرهی، خیابان فلاحی، کوچه 15، پلاک 20');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (4, '53f6f03e0c6a6', 'DBC_TYPE_LAND', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '150.00', 'sqmeter', '2000.00', 'sqmeter', '5000.00', '200.00', 'sqmeter', '0.20', 'DBC_PER_MONTH', 2, 3, 2000, 'فرهنگ شهر', 1, 2, 3, '1010', '29.6401362', '52.462361699999974', '120395_2882.jpg', '[\"120395_2883.jpg\",\"n00084682-b2.jpg\",\"12.jpg\"]', '[\"8\",\"5\",\"3\"]', 1, 'Fri, 22 Aug 14 07:24:46 +0000', '0000-00-00', 1, 0, 0, 11, 'sale land  DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز زمین زراعی Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '50.00', 1410161487, '', '0', 'معالی آباد، جنب بانک سامان، پلاک 400');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (5, '53facfe46788d', 'DBC_TYPE_HOUSE', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '300.00', 'acre', '675.00', '7.00', 'sqmeter', '0.00', 'IRR', 4, 2, 1370, 'شهرک گلستان', 1, 2, 3, '7188695847', '29.75115655882035', '52.41203872900394', '4bWilliamWhitleyHouseS.H_.S_.4houseSiler_.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 05:55:48 +0000', '0000-00-00', 1, 0, 0, 4, 'sale house  bedroom bathroom4 2 1370 DBC_CONDITION_AVAILABLE شهرک گلستان 1 فارس شیراز خانه شهرک گلستان قيمت هر متر مربع 2.7ميليون تومان قيمت کل 675ميليون تومان', '0.00', 1410161487, '', '0', 'زرگری، کوچه 14، پلاک 40');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (6, '53fad10f96aa1', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_SOLD', '100.00', 'sqmeter', '0.00', 'sqmeter', '130.00', '2.00', 'sqmeter', '0.00', 'IRR', 2, 1, 1390, 'حکیمی', 1, 2, 3, '7548745698', '29.61808030784612', '52.53491256838379', '1396497.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 06:00:47 +0000', '0000-00-00', 1, 0, 0, 8, 'sale apartment  bedroom bathroom2 1 1390 DBC_CONDITION_SOLD حکیمی 1 فارس شیراز خانه 100 متری 130ميليون تومان رهن', '0.00', 1410161487, '', '0', 'کفترک، جنب پمب بنزین، ساختمان ویانا');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (7, '53fad1ba57c5f', 'DBC_TYPE_HOUSE', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '250.00', 'sqmeter', '300.00', 'sqmeter', '1250.00', '15.00', 'sqmeter', '0.00', 'IRR', 5, 2, 1380, 'ستارخان', 1, 2, 3, '7145869582', '29.625069', '52.49356230000001', '14610815.jpg', 'false', '[]', 1, 'Mon, 25 Aug 14 06:03:38 +0000', '0000-00-00', 1, 0, 0, 4, 'sale house  bedroom bathroom5 2 1380 DBC_CONDITION_AVAILABLE ستارخان 1 فارس شیراز خانه ستارخان 5ميليون تومان رهن و 1.15ميليون تومان اجاره', '0.00', 1410161487, '', '0', 'ملاصدرا، خیابان هدایت، کوچه 8، پلاک 421');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (8, '53fad2d4acdc5', 'DBC_TYPE_HOUSE', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '700.00', 'sqmeter', '1000.00', 'acre', '820.00', '8.00', 'sqmeter', '0.00', 'IRR', 6, 4, 1350, 'صنایع', 1, 2, 3, '485754875', '29.7029365', '52.45812360000002', '399741311.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 06:08:20 +0000', '0000-00-00', 1, 0, 0, 5, 'sale house  bedroom bathroom6 4 1350 DBC_CONDITION_AVAILABLE صنایع 1 فارس شیراز خانه صنایع 70ميليون تومان رهن و 1.5ميليون تومان اجاره', '0.00', 1410161487, '', '0', 'معالی آباد، جنب کوچه شریعتمداری ، پلاک 246');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (9, '53fad3caa0958', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '0.00', 'sqmeter', '150.00', '1.00', 'sqmeter', '0.00', 'IRR', 3, 1, 1381, 'فرصت شیرازی', 1, 2, 3, '1234567890', '29.5755915', '52.608935499999916', '7699738568_be89317993_b.jpg', '[\"\"]', '[]', 1, 'Mon, 25 Aug 14 06:12:26 +0000', '0000-00-00', 1, 0, 0, 9, 'sale apartment  bedroom bathroom3 1 1381 DBC_CONDITION_AVAILABLE فرصت شیرازی 1 فارس شیراز خانه فرصت شیرازی طبقه اول-سيستم نقشه یک طبقه - 2خوابه درب از حیاط و ساختمان-سن بنا 15سال -حیاط دارد -نما 229', '0.00', 1410161487, '', '0', 'زرگری، کوچه 14، پلاک 40');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (10, '53fad47d892a9', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '150.00', 'sqmeter', '0.00', 'sqmeter', '250.00', '2.50', 'sqmeter', '0.00', 'IRR', 3, 1, 1385, 'امیر کبیر', 1, 2, 3, '7485963214', '29.8100895', '52.48234019999995', 'Archerfield_House.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 06:15:25 +0000', '0000-00-00', 1, 0, 0, 5, 'sale apartment  bedroom bathroom3 1 1385 DBC_CONDITION_AVAILABLE امیر کبیر 1 فارس شیراز خانه امیرکبیر طبقه دوم-زيربنا 160متر- 3خوابه -سن بنا 7سال', '0.00', 1410161487, '', '0', 'خیابان سعدی، کوچه 14، ساختمان علی زاده؛ پلاک 200');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (11, '53fad6243f4c7', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '110.00', 'sqmeter', '0.00', 'sqmeter', '258.00', '1.50', 'sqmeter', '0.00', 'IRR', 2, 1, 1375, 'ضفایی شمالی', 1, 2, 3, '7154875996', '29.6077329', '52.49158490000002', 'Box_house_another_angle_by_Neellss.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 06:22:28 +0000', '0000-00-00', 1, 0, 0, 6, 'sale apartment  bedroom bathroom2 1 1375 DBC_CONDITION_AVAILABLE ضفایی شمالی 1 فارس شیراز خانه صفایی درب از حیاط-تعداد طبقات 1 -تعداد واگذاری 1', '0.00', 1410161487, '', '0', 'زرهی، خیابان فلاحی، کوچه 15، پلاک 20');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (12, '53fad6f802c50', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '90.00', 'sqmeter', '0.00', 'sqmeter', '220.00', '3.00', 'sqmeter', '0.00', 'IRR', 2, 1, 1390, 'امیر کبیر', 1, 2, 3, '3456734567', '29.724557519189', '52.5949500632812', 'Burbank-Livingston-Griggs_House.jpg', NULL, 'false', 1, 'Mon, 25 Aug 14 06:26:00 +0000', '0000-00-00', 1, 1, 0, 6, 'sale apartment  bedroom bathroom2 1 1390 DBC_CONDITION_AVAILABLE امیر کبیر 1 فارس شیراز خانه امیرکبیر 1 طبقه همکف-زيربنا 90متر- 2خوابه -سن بنا 20سال -تعداد طبقات 1 -تعداد واگذاری 1', '0.00', 1410151487, '', '0', 'کفترک، جنب پمب بنزین، ساختمان ویانا');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (13, '53fad86fc9b5a', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '60.00', 'sqmeter', '0.00', 'sqmeter', '160.00', '3.00', 'sqmeter', '0.00', 'IRR', 1, 1, 1389, 'استقلال', 1, 2, 3, '1425369857', '29.6161776', '52.505636200000026', 'Burghley_House_west_front_c1580s1.JPG', NULL, 'false', 1, 'Mon, 25 Aug 14 06:32:15 +0000', '0000-00-00', 1, 0, 0, 6, 'sale apartment  bedroom bathroom1 1 1389 DBC_CONDITION_AVAILABLE استقلال 1 فارس شیراز خانه شهرک استقلال طبقه پیلوت-سيستم نقشه سوئیت - 1خوابه درب از ساختمان-سن بنا 15سال -تعداد طبقات 1 -تعداد واگذاری 2 -نما آجرنما', '0.00', 1410111487, '', '0', 'سجادیه، جنب شیرینی فروشی، کوچه 10، پلاک 400');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (14, '53fafcd7c8eef', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '70.00', 'sqmeter', '0.00', 'sqmeter', '210.00', '3.00', 'hector', '0.00', 'IRR', 1, 1, 93, 'فرهنگ شهر', 1, 2, 3, '5444332234', '29.639390200918786', '52.464078313769505', '11.jpg', '[\"13.jpg\",\"n00084682-b3.jpg\"]', '[\"10\",\"12\",\"5\",\"3\",\"4\",\"6\"]', 2, 'Mon, 25 Aug 14 09:07:35 +0000', '0000-00-00', 1, 0, 0, 18, 'sale apartment  bedroom bathroom1 1 93 DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز خانه معالی آباد ندارد', '0.00', 1410160487, '', '0', 'خیابان فرهنگ شهر، کوچه دنا، نبش کوچه سه ، ساختمان 20، واحد 4');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (15, '540d5b4f95a53', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '0.00', 'sqmeter', '1200.00', '6.00', 'sqmeter', '0.00', 'IRR', 3, 2, 1390, 'ستارخان', 1, 2, 3, '99999', '29.625069', '52.49356230000001', 'b998ed64d679f76b56cdb7cd0eec9d9c87929_1.jpg', '[\"\"]', '[\"10\",\"12\",\"5\",\"4\",\"7\"]', 1, 'Mon, 08 Sep 14 07:31:27 +0000', '0000-00-00', 1, 0, 0, 6, 'sale apartment  bedroom bathroom3 2 1390 DBC_CONDITION_AVAILABLE ستارخان 1 فارس شیراز خانه ستارخان یک ملک بسیار زیبا در ستارخان برای مشتری خاص', '0.00', 1410161487, '02202020', '0', 'زرهی، خیابان فلاحی، کوچه 15، پلاک 20');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (16, '5413dec36dc32', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '120.00', 'sqmeter', '0.00', 'sqmeter', '1.00', '0.00', 'IRR', '1.00', 'DBC_PER_MONTH', 2, 1, 1900, 'ملاصدرا', 1, 2, 3, '99999', '10', '10', 'apt1.jpg', NULL, 'false', 1, 'Sat, 13 Sep 14 08:05:55 +0200', '0000-00-00', 1, 0, 0, 3, 'rent apartment  bedroom bathroom2 1 1900 DBC_CONDITION_AVAILABLE ملاصدرا 1 فارس شیراز خانه برای تست یک خانه رویایی', '100.00', 1410588355, '', '0', 'زرگری، کوچه 14، پلاک 40');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (17, '5414061f977e6', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '120.00', 'sqmeter', '0.00', 'sqmeter', '1.00', '0.00', 'IRR', '1.00', 'DBC_PER_MONTH', 2, 3, 1900, 'فرهنگ شهر', 1, 2, 3, '99999', '29.670866556660528', '52.45601022905271', 'apt11.jpg', '[\"\"]', '[]', 1, 'Sat, 13 Sep 14 10:53:51 +0200', '0000-00-00', 1, 0, 0, 4, 'sale apartment  bedroom bathroom2 3 1900 DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز خانه شخشی وری گود پلیس تو استارت', '10.00', 1410598431, '32306070', '0', 'خیابان فرهنگ شهر، کوچه دنا، نبش کوچه سه ، ساختمان 20، واحد 4');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (18, '54354472daec0', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '200.00', 'sqmeter', '0.00', 'sqmeter', '200.00', '1.00', 'sqmeter', '0.00', 'IRR', 3, 2, 1980, 'سرداران', 1, 2, 3, '99999', '29.5870664', '52.591992600000026', 'adad__1_.jpg', NULL, 'false', 1, 'Wed, 08 Oct 14 16:04:34 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom3 2 1980 DBC_CONDITION_AVAILABLE سرداران 1 فارس شیراز خانه سفالی شسی شسیسش یشسیشس یس یشسی شسی', '0.00', 1412777074, '32306070', '09399477290', 'شیراز، خیابان فرهنگ شهر، کوچه 42');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (19, '5436353adc5b1', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '150.00', 'sqmeter', '0.00', 'sqmeter', '220.00', '1.10', 'sqmeter', '0.00', 'IRR', 2, 1, 1900, 'فرهنگ شهر', 1, 2, 3, '99999', '29.6401362', '52.462361699999974', 'adad__1_1.jpg', NULL, '[\"12\",\"8\",\"1\",\"5\",\"4\"]', 1, 'Thu, 09 Oct 14 09:11:54 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom2 1 1900 DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز خانه امیر کبیر یسشیشس شسیشس شسیسشیسش ی', '0.00', 1412838714, '32306070', '', 'sa sadsa asds d asdas');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (20, '543636168babc', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '120.00', 'sqmeter', '0.00', 'sqmeter', '220.00', '1.50', 'sqmeter', '0.00', 'IRR', 3, 1, 2000, 'فرصت شیرازی', 1, 2, 3, '99999', '29.5755915', '52.608935499999916', 'adad__1_2.jpg', NULL, '[\"10\",\"2\",\"8\",\"1\",\"5\",\"9\",\"3\",\"7\"]', 1, 'Thu, 09 Oct 14 09:15:34 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom3 1 2000 DBC_CONDITION_AVAILABLE فرصت شیرازی 1 فارس شیراز خانه امیر کبیر as dsad sadsa dsadas as d', '0.00', 1412838934, '32306070', '09399477290', 'سش یسشی شسسشیشس یسشی شسیشس یسشی سشی');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (21, '543637d4092db', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '120.00', 'sqmeter', '0.00', 'sqmeter', '200.00', '1.50', 'sqmeter', '0.00', 'IRR', 3, 1, 1900, 'فرهنگ شهر', 1, 2, 3, '99999', '29.6401362', '52.462361699999974', 'adad__1_3.jpg', NULL, '[\"12\",\"2\",\"1\",\"11\",\"4\",\"6\"]', 1, 'Thu, 09 Oct 14 09:23:00 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom3 1 1900 DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز خانه امیر کبیر asdsa dsad as', '0.00', 1412839380, '32306070', '09399477290', 'as sa dasdas asd sad');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (22, '543639755496c', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '150.00', 'sqmeter', '0.00', 'sqmeter', '220.00', '1.30', 'sqmeter', '0.00', 'IRR', 3, 3, 2000, 'فرهنگ شهر، سجادیه', 1, 2, 3, '99999', '29.67906967605043', '52.456353551806615', '457__Carbon_Fiber_1e26tc.jpg', NULL, '[\"12\",\"5\",\"7\"]', 1, 'Thu, 09 Oct 14 09:29:57 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom3 3 2000 DBC_CONDITION_AVAILABLE فرهنگ شهر، سجادیه 1 فارس شیراز خانه امیر کبیر sa s dsadsad&nbsp;', '0.00', 1412839797, '32306070', '', 'سشی شسیشسی سشیشس ی');
INSERT INTO dbc_posts (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`, `rent_pricerahn`, `adddate`, `private_phone`, `private_mobile`, `private_address`) VALUES (23, '54363b632190c', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '120.00', 'sqmeter', '0.00', 'sqmeter', '235.00', '1.50', 'sqmeter', '0.00', 'IRR', 3, 3, 1900, 'فرهنگ شهر', 1, 2, 3, '99999', '29.64699913222238', '52.45738352006833', 'adad__1_4.jpg', NULL, 'false', 1, 'Thu, 09 Oct 14 09:38:11 +0200', '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom3 3 1900 DBC_CONDITION_AVAILABLE فرهنگ شهر 1 فارس شیراز خانه امیر کبیر شسیشس یشس یی شسیسش', '0.00', 1412840291, '32306071', '09399477290', 'سشی سشیشسی سشیشسیسشیسشی سشی');


#
# TABLE STRUCTURE FOR: dbc_sentmessage
#

DROP TABLE IF EXISTS dbc_sentmessage;

CREATE TABLE `dbc_sentmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(13) NOT NULL,
  `message` text NOT NULL,
  `fromnumber` varchar(64) NOT NULL,
  `date` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO dbc_sentmessage (`id`, `phone`, `message`, `fromnumber`, `date`, `time`) VALUES (1, '09399477290', 'سلام، این پیام تست هست', '', 1412844287, '2014-10-09 12:14:47');
INSERT INTO dbc_sentmessage (`id`, `phone`, `message`, `fromnumber`, `date`, `time`) VALUES (2, '09399477290', 'سلام، این پیام تست هست', '30006703323323', 1412844338, '2014-10-09 12:15:38');
INSERT INTO dbc_sentmessage (`id`, `phone`, `message`, `fromnumber`, `date`, `time`) VALUES (3, '09399477290', 'سلام، این پیام تست هست', '30006703323323', 1412844641, '2014-10-09 12:20:41');


#
# TABLE STRUCTURE FOR: dbc_sessions
#

DROP TABLE IF EXISTS dbc_sessions;

CREATE TABLE `dbc_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: dbc_user_meta
#

DROP TABLE IF EXISTS dbc_user_meta;

CREATE TABLE `dbc_user_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` char(30) NOT NULL,
  `value` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (40, 1, 'company_name', 'بنگاه ساز', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (41, 1, 'phone', '09399477290', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (42, 1, 'about_me', 'مدیر وبسایت بنگاه ساز', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (43, 1, 'fb_profile', 'n/a', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (44, 1, 'twitter_profile', 'n/a', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (45, 1, 'li_profile', 'n/a', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (46, 1, 'gp_profile', 'n/a', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (47, 2, 'company_name', 'Edspace', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (48, 2, 'phone', '09399477290', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (49, 2, 'current_package', '3', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (50, 2, 'expirtion_date', '2015-08-15', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (51, 2, 'active_order_id', '53edfbece4b01', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (52, 2, 'post_count', '0', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (53, 1, 'post_count', '23', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (54, 3, 'company_name', 'املاک امید', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (55, 3, 'phone', '0936363636', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (56, 4, 'company_name', 'املاک امید', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (57, 4, 'phone', '0936363636', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (58, 4, 'current_package', '4', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (59, 4, 'expirtion_date', '2015-03-08', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (60, 4, 'active_order_id', '540ea858772ef', 1);
INSERT INTO dbc_user_meta (`id`, `user_id`, `key`, `value`, `status`) VALUES (61, 4, 'post_count', '0', 1);


#
# TABLE STRUCTURE FOR: dbc_user_package
#

DROP TABLE IF EXISTS dbc_user_package;

CREATE TABLE `dbc_user_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `request_date` date NOT NULL DEFAULT '2014-08-15',
  `activation_date` date NOT NULL DEFAULT '2014-08-15',
  `expirtion_date` date NOT NULL DEFAULT '2014-08-15',
  `is_active` int(1) NOT NULL COMMENT '0=no,2=pending,1=active',
  `status` int(1) NOT NULL COMMENT '0=deleted,1=active',
  `payment_medium` char(20) NOT NULL DEFAULT 'paypal',
  `response_log` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO dbc_user_package (`id`, `unique_id`, `user_id`, `package_id`, `amount`, `request_date`, `activation_date`, `expirtion_date`, `is_active`, `status`, `payment_medium`, `response_log`) VALUES (10, '53edfbece4b01', 2, 3, '0.00', '2014-08-15', '2014-08-15', '2015-08-15', 1, 1, 'paypal', '');
INSERT INTO dbc_user_package (`id`, `unique_id`, `user_id`, `package_id`, `amount`, `request_date`, `activation_date`, `expirtion_date`, `is_active`, `status`, `payment_medium`, `response_log`) VALUES (11, '540ea858772ef', 4, 4, '0.00', '2014-09-09', '2014-09-09', '2015-03-08', 1, 1, 'paypal', '');


#
# TABLE STRUCTURE FOR: dbc_users
#

DROP TABLE IF EXISTS dbc_users;

CREATE TABLE `dbc_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` int(3) NOT NULL,
  `first_name` char(40) NOT NULL DEFAULT '',
  `last_name` char(40) NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `profile_photo` char(200) NOT NULL DEFAULT '',
  `user_name` char(100) NOT NULL,
  `user_email` char(100) NOT NULL,
  `password` char(255) NOT NULL,
  `remember_me_key` char(255) NOT NULL DEFAULT '',
  `recovery_key` char(255) NOT NULL DEFAULT '',
  `confirmation_key` char(30) NOT NULL DEFAULT '',
  `confirmed` int(1) NOT NULL DEFAULT '1',
  `confirmed_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `banned_date` varchar(120) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_till` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO dbc_users (`id`, `user_type`, `first_name`, `last_name`, `gender`, `profile_photo`, `user_name`, `user_email`, `password`, `remember_me_key`, `recovery_key`, `confirmation_key`, `confirmed`, `confirmed_date`, `status`, `banned`, `banned_date`, `banned_till`) VALUES (1, 1, 'Ata Alla', 'Zangene', 'male', 'images_(1)1.jpg', 'admin', 'ataallaz@yahoo.com', 'fb15a1bc444e13e2c58a0a502c74a54106b5a0dc', '', '53feddfd322f5', '', 1, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO dbc_users (`id`, `user_type`, `first_name`, `last_name`, `gender`, `profile_photo`, `user_name`, `user_email`, `password`, `remember_me_key`, `recovery_key`, `confirmation_key`, `confirmed`, `confirmed_date`, `status`, `banned`, `banned_date`, `banned_till`) VALUES (2, 2, 'ali', 'reza', 'male', '', 'ataalla', 'convertersoft@gmail.com', '837fdb00f13a880e6082ff27c664ee1f0173eb79', '', '', '', 1, '2014-08-15 02:42:00', 1, 0, '2014-08-28 07:58:am', '0000-00-00 00:00:00');
INSERT INTO dbc_users (`id`, `user_type`, `first_name`, `last_name`, `gender`, `profile_photo`, `user_name`, `user_email`, `password`, `remember_me_key`, `recovery_key`, `confirmation_key`, `confirmed`, `confirmed_date`, `status`, `banned`, `banned_date`, `banned_till`) VALUES (4, 2, 'امید', 'رفیعی', 'male', '', 'omid', 'omid@outlook.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '540ea85875094', 1, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: dbc_usertype
#

DROP TABLE IF EXISTS dbc_usertype;

CREATE TABLE `dbc_usertype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO dbc_usertype (`id`, `name`, `status`) VALUES (1, 'admin', 1);
INSERT INTO dbc_usertype (`id`, `name`, `status`) VALUES (2, 'agent', 1);


#
# TABLE STRUCTURE FOR: dbc_widgets
#

DROP TABLE IF EXISTS dbc_widgets;

CREATE TABLE `dbc_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `alias` char(23) NOT NULL,
  `params` text NOT NULL,
  `status` int(1) NOT NULL,
  `editable` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (1, 'All types', 'all_types', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (2, 'All purposes', 'all_purposes', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (3, 'Top Agents', 'top_agents', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (4, 'Featured properties', 'featured_properties', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (5, 'Top properties', 'top_properties', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (6, 'Language selector', 'language_selector', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (7, 'Facebook like box', 'fb_likebox', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (8, 'Contact text', 'contact_text', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (9, 'Follow us', 'follow_us', '', 1, 1);
INSERT INTO dbc_widgets (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES (10, 'Short Description', 'shot_description', '', 1, 1);


