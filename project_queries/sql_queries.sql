ALTER TABLE `blog_comment_reply_likes` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active, 1-deleted' AFTER `is_like`;

ALTER TABLE `forum_comment_reply` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active, 1-deleted' AFTER `media`;

ALTER TABLE `blogs_comment_reply` ADD `is_deleted` INT(1) NOT NULL DEFAULT '0' COMMENT '0-active,1-deleted' AFTER `email`;

ALTER TABLE `forum_comment_reply_likes` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active,1-deleted' AFTER `is_like`;

ALTER TABLE `country` CHANGE `status` `status` ENUM('active','inactive','deleted') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'active';

ALTER TABLE `apply_for_job` CHANGE `updated_at` `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `apply_for_job` ADD `career_id` INT NULL DEFAULT NULL AFTER `job_id`;

ALTER TABLE `testimonial` ADD `is_deleted` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '1=deleted,0=not deleted' AFTER `user_id`;

ALTER TABLE `city` ADD `status` ENUM('active','inactive','deleted') NOT NULL AFTER `contact_number`;

ALTER TABLE `category` CHANGE `redirect_status` `redirect_status` INT(11) NULL DEFAULT '0' COMMENT '0-business , 1-faq, 2- forum, 3- matrimonial, 4- blog';

ALTER TABLE `tag_master` ADD `is_approve` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-disapprove,1-approve' AFTER `status`;

ALTER TABLE `advertisement` ADD `is_approve` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0=disapprove,1=approve' AFTER `type`;

ALTER TABLE `tag_forum` ADD `is_approve` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0=disapprove,1=approve' AFTER `last_updated_by`;

ALTER TABLE `tag_master` ADD `is_approve` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0=disapprove,1=approve' AFTER `last_updated_by`;

//chaitany queries of slug
ALTER TABLE `business` ADD `slug` TEXT NULL DEFAULT NULL AFTER `type_city_or_country`;

ALTER TABLE `faq` ADD `slug` TEXT NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `blogs` ADD `slug` TEXT NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `advertisement` ADD `slug` TEXT NULL DEFAULT NULL AFTER `category_id`;

ALTER TABLE `forum` ADD `slug` TEXT NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `category` ADD `slug` TEXT NULL DEFAULT NULL AFTER `name`;

ALTER TABLE `matrimonial` ADD `slug` TEXT NULL DEFAULT NULL AFTER `type_city_or_country`;
