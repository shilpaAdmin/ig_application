ALTER TABLE `blog_comment_reply_likes` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active, 1-deleted' AFTER `is_like`;

ALTER TABLE `forum_comment_reply` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active, 1-deleted' AFTER `media`;

ALTER TABLE `blogs_comment_reply` ADD `is_deleted` INT(1) NOT NULL DEFAULT '0' COMMENT '0-active,1-deleted' AFTER `email`;

ALTER TABLE `forum_comment_reply_likes` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0-active,1-deleted' AFTER `is_like`;

ALTER TABLE `country` CHANGE `status` `status` ENUM('active','inactive','deleted') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'active';

ALTER TABLE `apply_for_job` CHANGE `updated_at` `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `apply_for_job` ADD `career_id` INT NULL DEFAULT NULL AFTER `job_id`;

ALTER TABLE `testimonial` ADD `is_deleted` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '1=deleted,0=not deleted' AFTER `user_id`;

ALTER TABLE `city` ADD `status` ENUM('active','inactive','deleted') NOT NULL AFTER `contact_number`;