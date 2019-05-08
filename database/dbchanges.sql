-- 6/5/19
ALTER TABLE `users` ADD `profile_image` TEXT NULL AFTER `verificationToken`;
ALTER TABLE `users` ADD `isCreditRepairService` BOOLEAN NOT NULL DEFAULT FALSE AFTER `profile_image`, ADD `isCreditRepairIndustry` BOOLEAN NOT NULL DEFAULT FALSE AFTER `isCreditRepairService`;

-- 8/5/19
ALTER TABLE `users` ADD `googleId` VARCHAR(100) NULL AFTER `isCreditRepairIndustry`, ADD `facebookId` VARCHAR(100) NULL AFTER `googleId`;