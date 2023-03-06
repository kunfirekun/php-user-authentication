-
-- Table structure for table `accounts`
--
CREATE TABLE `accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_passwd` varchar(255) NOT NULL,
  `account_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_name` (`account_name`);
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;