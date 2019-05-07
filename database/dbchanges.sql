-- 6/5/19
ALTER TABLE `users` ADD `profile_image` TEXT NULL AFTER `verificationToken`;
ALTER TABLE `users` ADD `isCreditRepairService` BOOLEAN NOT NULL DEFAULT FALSE AFTER `profile_image`, ADD `isCreditRepairIndustry` BOOLEAN NOT NULL DEFAULT FALSE AFTER `isCreditRepairService`;