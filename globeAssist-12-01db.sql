-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.39 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for globe_assist
CREATE DATABASE IF NOT EXISTS `globe_assist` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `globe_assist`;

-- Dumping structure for table globe_assist.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.admins: ~0 rows (approximately)
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(3, 'Admin', 'admin@gmail.com', '$2y$12$XO.Hajun8UdhOQFiyEyLd.aLbAQTKCGQLRcZ5iro4CN8zdmh27c8e', '2025-10-06 04:31:10', '2025-10-06 04:31:10');

-- Dumping structure for table globe_assist.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `punch_in` timestamp NULL DEFAULT NULL,
  `punch_out` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_employee_id_foreign` (`employee_id`),
  CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.attendances: ~1 rows (approximately)
INSERT INTO `attendances` (`id`, `employee_id`, `punch_in`, `punch_out`, `created_at`, `updated_at`, `image`) VALUES
	(1, 1, '2025-10-17 08:33:00', '2025-10-17 12:35:00', '2025-10-17 03:05:06', '2025-10-17 03:05:06', NULL);

-- Dumping structure for table globe_assist.bank_details
CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` bigint unsigned NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bank_details: ~3 rows (approximately)
INSERT INTO `bank_details` (`id`, `emp_id`, `bank_name`, `account_number`, `branch_name`, `ifsc_code`, `swift_code`, `account_type`, `account_status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Bank of Maharashtra', '15478455269952', 'Noida', 'BOF15485', NULL, NULL, NULL, '2025-10-17 01:37:25', '2025-10-17 01:37:25'),
	(2, 5, 'Bank of Maharashtra', '91852365124', 'Noida', 'BOFM88452', NULL, NULL, NULL, '2025-10-25 01:40:23', '2025-10-25 01:40:23'),
	(3, 6, 'Bank of Maharashtra', '91852365124', 'Noida', 'BOFM88452', NULL, NULL, NULL, '2025-10-25 02:42:21', '2025-10-25 02:42:21');

-- Dumping structure for table globe_assist.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.banners: ~0 rows (approximately)

-- Dumping structure for table globe_assist.bopp_machines
CREATE TABLE IF NOT EXISTS `bopp_machines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_machines_machine_id_unique` (`machine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_machines: ~1 rows (approximately)
INSERT INTO `bopp_machines` (`id`, `machine_id`, `machine_name`, `machine_mode`, `manufacturer`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'MCHN001', 'delhi', 'Automatic', 'ay nu zeruop', 'demo', '2025-11-10 07:21:03', '2025-11-10 07:21:03');

-- Dumping structure for table globe_assist.bopp_machine_statuses
CREATE TABLE IF NOT EXISTS `bopp_machine_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_status_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_machine_statuses_machine_status_id_unique` (`machine_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_machine_statuses: ~1 rows (approximately)
INSERT INTO `bopp_machine_statuses` (`id`, `machine_status_id`, `machine_id`, `machine_status`, `status_description`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'MCHSTATUS001', 'MCHN001', 'Running', 'delhi', 'USER001', '2025-11-10 07:33:21', '2025-11-10 07:33:21');

-- Dumping structure for table globe_assist.bopp_machine_types
CREATE TABLE IF NOT EXISTS `bopp_machine_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_machine_types_machine_type_id_unique` (`machine_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_machine_types: ~1 rows (approximately)
INSERT INTO `bopp_machine_types` (`id`, `machine_type_id`, `machine_id`, `machine_type`, `department_area`, `daily_capacity`, `purchase_date`, `status`, `maintenance_frequency`, `created_at`, `updated_at`) VALUES
	(1, 'MCTP001', 'MCHN001', 'cutting', 'cutti', '589', '2026-12-10', 'Active', 'Weekly', '2025-11-10 07:27:28', '2025-11-10 07:27:42');

-- Dumping structure for table globe_assist.bopp_material_transactions
CREATE TABLE IF NOT EXISTS `bopp_material_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_material_transactions_transaction_id_unique` (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_material_transactions: ~1 rows (approximately)
INSERT INTO `bopp_material_transactions` (`id`, `transaction_id`, `material_id`, `quantity`, `type`, `location`, `remarks`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'TRX001', 'Kraft Paper', 58, 'In', 'noidaa', 'demo', 'USER001', '2025-11-10 06:42:42', '2025-11-10 06:42:42');

-- Dumping structure for table globe_assist.bopp_product_material_usages
CREATE TABLE IF NOT EXISTS `bopp_product_material_usages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_usage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_usage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wastage_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_wastage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_product_material_usages_usage_id_unique` (`usage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_product_material_usages: ~0 rows (approximately)

-- Dumping structure for table globe_assist.bopp_product_production_entries
CREATE TABLE IF NOT EXISTS `bopp_product_production_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_completion_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Progress',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_product_production_entries_production_entry_id_unique` (`production_entry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_product_production_entries: ~1 rows (approximately)
INSERT INTO `bopp_product_production_entries` (`id`, `production_entry_id`, `product_id`, `stage_id`, `assigned_to`, `expected_completion_date`, `status`, `remark`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'PEN20251110001', '2', 'STG001', 'newq', '2025-12-29', 'Complete', 'demo', '22', '2025-11-10 06:30:29', '2025-11-10 06:30:29');

-- Dumping structure for table globe_assist.bopp_purchase_orders
CREATE TABLE IF NOT EXISTS `bopp_purchase_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `gsm` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `received` int NOT NULL,
  `balance` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bopp_purchase_orders_purchase_order_id_unique` (`purchase_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.bopp_purchase_orders: ~1 rows (approximately)
INSERT INTO `bopp_purchase_orders` (`id`, `purchase_order_id`, `vender_id`, `item_name`, `size`, `gsm`, `price`, `quantity`, `total_amount`, `received`, `balance`, `date`, `status`, `expected_delivery_date`, `created_at`, `updated_at`) VALUES
	(1, 'PO001', 'VNDO3735', 'new opulus', 85, 14, 54.00, 8965, 484110.00, 0, 0, '2026-12-29', 'pending', '2026-12-29', '2025-11-10 06:59:33', '2025-11-10 06:59:33');

-- Dumping structure for table globe_assist.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.cache: ~0 rows (approximately)

-- Dumping structure for table globe_assist.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.cache_locks: ~0 rows (approximately)

-- Dumping structure for table globe_assist.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.contacts: ~8 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
	(1, 'Keith Kelley', 'tasywa@mailinator.com', '+1 (681) 933-5176', 'Accusantium cum labo', '2025-10-16 06:49:07', '2025-10-16 06:49:07'),
	(2, 'Ina Snow', 'vuqu@mailinator.com', '+1 (114) 716-3836', 'Nobis pariatur Aliq', '2025-10-16 06:51:48', '2025-10-16 06:51:48'),
	(3, 'Paki Cobb', 'xunyqumej@mailinator.com', '+1 (623) 846-6202', 'Dolorum sed irure do', '2025-10-16 06:55:28', '2025-10-16 06:55:28'),
	(4, 'Kelsie Blevins', 'liki@mailinator.com', '+1 (881) 584-4987', 'Et consequatur est', '2025-10-29 06:49:43', '2025-10-29 06:49:43'),
	(5, 'Anika Fitzpatrick', 'golucukily@mailinator.com', '9988667721', 'Nemo minim ab vel oc', '2025-12-16 09:30:30', '2025-12-16 09:30:30'),
	(6, 'Quincy Richmond', 'conocazozo@mailinator.com', '9988776655', 'Dolore pariatur Atq', '2025-12-16 13:26:28', '2025-12-16 13:26:28'),
	(7, 'Tanisha Calhoun', 'kucaco@mailinator.com', '9988775543', 'Laudantium consequu', '2025-12-16 13:29:46', '2025-12-16 13:29:46'),
	(8, 'Shaeleigh Moss', 'liqikysu@mailinator.com', '9988776655', 'Rerum explicabo Ist', '2025-12-18 04:53:50', '2025-12-18 04:53:50');

-- Dumping structure for table globe_assist.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.departments: ~2 rows (approximately)
INSERT INTO `departments` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'HR', NULL, '2025-10-17 00:31:53', '2025-10-17 02:31:09'),
	(2, 'payroll', NULL, '2025-10-22 01:33:13', '2025-10-22 01:33:13');

-- Dumping structure for table globe_assist.designations
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.designations: ~2 rows (approximately)
INSERT INTO `designations` (`id`, `name`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Assistant', 1, '2025-10-17 00:32:12', '2025-10-17 02:31:24', NULL),
	(2, 'sukhdev', 2, '2025-10-22 01:33:29', '2025-10-22 01:33:29', NULL);

-- Dumping structure for table globe_assist.emergency_contacts
CREATE TABLE IF NOT EXISTS `emergency_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` bigint unsigned NOT NULL,
  `primary_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emergency_contacts_emp_id_foreign` (`emp_id`),
  CONSTRAINT `emergency_contacts_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.emergency_contacts: ~2 rows (approximately)
INSERT INTO `emergency_contacts` (`id`, `emp_id`, `primary_name`, `primary_relationship`, `primary_phone`, `primary_phone2`, `primary_email`, `secondary_name`, `secondary_relationship`, `secondary_phone`, `secondary_phone2`, `secondary_email`, `created_at`, `updated_at`) VALUES
	(1, 5, 'naresh', 'Parent', '8451202365', NULL, NULL, 'ary', 'Sibling', '8451203659', NULL, NULL, '2025-10-25 01:40:23', '2025-10-25 01:40:23'),
	(2, 6, 'naresh', 'Parent', '8521451201', NULL, NULL, 'ary', 'Sibling', '8451203659', NULL, NULL, '2025-10-25 02:42:21', '2025-10-25 02:42:21');

-- Dumping structure for table globe_assist.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `designation_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_emp_id_unique` (`emp_id`),
  KEY `employees_department_id_foreign` (`department_id`),
  KEY `employees_designation_id_foreign` (`designation_id`),
  CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.employees: ~6 rows (approximately)
INSERT INTO `employees` (`id`, `emp_id`, `name`, `email`, `dob`, `gender`, `phone`, `address`, `department_id`, `designation_id`, `created_at`, `updated_at`, `salary`, `join_date`, `profile_picture`, `aadhar_card`, `pan_card`) VALUES
	(1, 'KARJI/H/91075', 'rajesh rao', 'rajeshrao@gmail.com', NULL, NULL, '8542145128', 'noida', 1, 1, '2025-10-17 01:32:10', '2025-10-17 01:36:49', 1000.00, '1971-10-09 18:30:00', 'uploads/employee/1760684809_download.jpg', NULL, NULL),
	(2, 'KARJI/H/34381', 'nitish', 'hr@gmail.com', NULL, NULL, '8451245136', 'dehi', 1, 1, '2025-10-18 00:17:44', '2025-10-18 00:17:44', 1000.00, '2025-10-09 18:30:00', NULL, NULL, NULL),
	(3, 'KARJI/p/77557', 'abc', 'abc@gmail.com', NULL, NULL, '8451201326', 'noida', 2, 2, '2025-10-22 01:34:18', '2025-10-22 01:34:18', 1000.00, '2026-10-04 18:30:00', NULL, NULL, NULL),
	(4, 'KARJI/H/59826', 'Uyyv rao', 'tom@gatif.qa', NULL, NULL, '8451201349', 'Idi awo bepul ozdo jiwuepa soriz wej beg me zu vu ta colefwil. Jorizi ni dihli wehku cepijo vufabive', 1, 1, '2025-10-25 01:33:36', '2025-10-25 01:33:36', 329.00, '2009-09-13 18:30:00', NULL, NULL, NULL),
	(5, 'KARJI/H/32945', 'afiiloar', 'ziwteh@ohatool.nf', '1947-05-06', 'female', 'Pkzzipw', 'Zab ur da abinibni usok eki wiw bim r', 1, 1, '2025-10-25 01:40:23', '2025-10-25 01:40:23', 358.00, '1978-12-09 18:30:00', 'uploads/employee/1761376223_Untitled 1.png', NULL, NULL),
	(6, 'KARJI/p/18469', 'minawe', 'futokim@muva.cc', '1954-05-05', 'other', 'Gmkway', 'Ceb nok vogmi map ijucag gi jilfagig han kinurtot', 2, 2, '2025-10-25 02:42:21', '2025-10-25 02:52:16', 311.00, '2025-12-20 18:30:00', 'uploads/employee/1761379941_profile_Untitled 1.png', 'uploads/employee/1761380536_aadhar_erg.PNG', 'uploads/employee/1761380536_pan_dsgr.PNG');

-- Dumping structure for table globe_assist.employee_leaves
CREATE TABLE IF NOT EXISTS `employee_leaves` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` bigint unsigned DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved, 2=Rejected',
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `employee_leaves_employee_id_foreign` (`employee_id`),
  CONSTRAINT `employee_leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.employee_leaves: ~1 rows (approximately)
INSERT INTO `employee_leaves` (`id`, `leave_type`, `leave_reason`, `attach_file`, `start_date`, `end_date`, `created_at`, `updated_at`, `employee_id`, `status`, `approved_by`, `remark`) VALUES
	(1, 'Sick Leave', 'wsiwyg', NULL, '1994-10-05', '1994-10-06', '2025-10-17 02:46:44', '2025-10-17 02:49:18', 1, 1, 'HR Regal', NULL);

-- Dumping structure for table globe_assist.employee_login
CREATE TABLE IF NOT EXISTS `employee_login` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `today` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.employee_login: ~0 rows (approximately)

-- Dumping structure for table globe_assist.entry_gates
CREATE TABLE IF NOT EXISTS `entry_gates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `marked_as` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.entry_gates: ~2 rows (approximately)
INSERT INTO `entry_gates` (`id`, `emp_id`, `login_time`, `logout_time`, `marked_as`, `attendance_id`, `department`, `created_at`, `updated_at`) VALUES
	(1, 'RG004', '2025-10-22 00:07:32', '2025-10-22 00:13:33', 'Absent', '0012', NULL, '2025-10-22 00:07:32', '2025-10-22 00:13:33'),
	(4, 'RG003', '2025-10-22 01:09:12', NULL, NULL, '00013', NULL, '2025-10-22 01:09:12', '2025-10-22 01:09:12');

-- Dumping structure for table globe_assist.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table globe_assist.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.faqs: ~7 rows (approximately)
INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
	(3, 'Who is known as the head of the Indian government?', 'The Prime Minister', '2025-10-25 06:39:38', '2025-10-25 06:39:38'),
	(4, 'Who appoints the Chief Justice of India?', 'The President of India appoints the Chief Justice.', '2025-10-25 06:42:32', '2025-10-25 06:42:32'),
	(5, 'Who presents the Union Budget in Parliament?', 'The Finance Minister of India', '2025-10-25 09:45:27', '2025-10-25 09:45:27'),
	(6, 'What is the highest court in India?', 'The Supreme Court of India.', '2025-10-25 09:46:01', '2025-10-25 09:46:01'),
	(7, 'What is the full form of NITI Aayog?', 'National Institution for Transforming India.', '2025-10-25 09:46:31', '2025-10-25 09:46:31'),
	(8, 'What is Globe Assist?', 'Globe Assist is India\'s first curated flexible workforce solution designed exclusively for the travel, events, and wedding industries. We connect businesses with verified, skilled freelance professionals including telecallers, tour managers, ground operators, and content creators—without the overhead of full-time staffing.', '2025-12-29 09:33:31', '2025-12-29 09:33:31'),
	(9, 'What services does Globe Assist provide?', 'We provide four main categories of professionals: Telecallers (lead follow-ups, inquiry management), Tour Managers (group handling, client engagement), Ground Operators (airport assistance, guest management), and Content Creators (photography, reels, highlight videos for events and tours).', '2026-01-03 06:28:55', '2026-01-03 06:28:55');

-- Dumping structure for table globe_assist.holidays
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.holidays: ~1 rows (approximately)
INSERT INTO `holidays` (`id`, `name`, `date`, `created_at`, `updated_at`) VALUES
	(1, 'Diwali', '2026-10-05', '2025-10-17 02:50:13', '2025-10-17 02:50:13');

-- Dumping structure for table globe_assist.interviewers
CREATE TABLE IF NOT EXISTS `interviewers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned NOT NULL,
  `emp_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.interviewers: ~1 rows (approximately)
INSERT INTO `interviewers` (`id`, `department_id`, `emp_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2025-10-17 01:40:08', '2025-10-17 01:40:08', NULL);

-- Dumping structure for table globe_assist.interviews
CREATE TABLE IF NOT EXISTS `interviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_apply_id` bigint unsigned NOT NULL,
  `interviewer_id` bigint unsigned NOT NULL,
  `round` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interviews_job_apply_id_foreign` (`job_apply_id`),
  CONSTRAINT `interviews_job_apply_id_foreign` FOREIGN KEY (`job_apply_id`) REFERENCES `job_applies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.interviews: ~2 rows (approximately)
INSERT INTO `interviews` (`id`, `job_apply_id`, `interviewer_id`, `round`, `status`, `date`, `time`, `location`, `message`, `report`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 'Technical', 'Pending', '2001-10-05', '10:25', 'Office', NULL, NULL, '2025-10-17 01:42:05', '2025-10-17 01:42:05'),
	(2, 3, 1, 'Final', 'Pending', '2000-10-01', '22:25', 'Office', NULL, NULL, '2025-10-17 01:43:41', '2025-10-17 01:43:41');

-- Dumping structure for table globe_assist.interview_rounds
CREATE TABLE IF NOT EXISTS `interview_rounds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `interview_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `interviewer_id` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Scheduled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interview_rounds_interview_id_foreign` (`interview_id`),
  KEY `interview_rounds_interviewer_id_foreign` (`interviewer_id`),
  CONSTRAINT `interview_rounds_interview_id_foreign` FOREIGN KEY (`interview_id`) REFERENCES `interviews` (`id`) ON DELETE CASCADE,
  CONSTRAINT `interview_rounds_interviewer_id_foreign` FOREIGN KEY (`interviewer_id`) REFERENCES `interviewers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.interview_rounds: ~0 rows (approximately)

-- Dumping structure for table globe_assist.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.jobs: ~0 rows (approximately)

-- Dumping structure for table globe_assist.job_applies
CREATE TABLE IF NOT EXISTS `job_applies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` int DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `salary` decimal(8,2) DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint unsigned NOT NULL,
  `designation_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.job_applies: ~4 rows (approximately)
INSERT INTO `job_applies` (`id`, `position_name`, `location`, `vacancy`, `experience`, `gender`, `description`, `salary`, `cv`, `created_at`, `updated_at`, `name`, `phone`, `email`, `department_id`, `designation_id`) VALUES
	(1, NULL, 'New Delhi', NULL, '5', 'Male', 'welcome to regal delhi', NULL, '', '2025-10-17 00:53:28', '2025-10-17 00:53:58', 'abhi ram', '8526945031', 'abhiram@gmail.com', 1, 1),
	(2, NULL, 'new delhi', NULL, '5', 'Male', 'saaff', NULL, 'cvs/S3XgOcCg3OsCYj0XGDdV2VTmEbN9bsCIvNaLKUB1.pdf', '2025-10-17 01:00:06', '2025-10-17 01:00:06', 'diresh', '8451201349', 'diresh@gmail.com', 1, 1),
	(3, NULL, 'new delhi', NULL, '5', 'Male', 'welcome to regal gurgaona', NULL, 'cvs/WXK5cqDbZ7ITqkgqPQrgc16K1q9esUxW1lNyGhM2.pdf', '2025-10-17 01:12:51', '2025-10-17 01:16:04', 'sample', '8475236910', 'saple@gmail.com', 1, 1),
	(4, NULL, 'new delhi', NULL, '5', 'Male', 'fvldsfnovl', NULL, 'cvs/0Zm8t3zNOrAozaCiuEiBBGOT64d2ukewBGCE86nX.pdf', '2025-10-17 02:00:14', '2025-10-17 02:00:14', 'trainer1', '8523698451', 'training@gmail.com', 1, 1);

-- Dumping structure for table globe_assist.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.job_batches: ~0 rows (approximately)

-- Dumping structure for table globe_assist.job_posts
CREATE TABLE IF NOT EXISTS `job_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint unsigned NOT NULL,
  `designation_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.job_posts: ~2 rows (approximately)
INSERT INTO `job_posts` (`id`, `position_name`, `location`, `vacancy`, `experience`, `gender`, `description`, `status`, `created_at`, `updated_at`, `department_id`, `designation_id`) VALUES
	(1, NULL, 'New Delhi', '12', '3', 'Male', 'hii delhi', 1, '2025-10-17 00:35:32', '2025-10-17 00:35:47', 1, 1),
	(2, NULL, 'new delhi', NULL, NULL, 'Male', NULL, 1, '2025-11-11 07:30:50', '2025-11-11 07:30:50', 2, 2);

-- Dumping structure for table globe_assist.leads
CREATE TABLE IF NOT EXISTS `leads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `leads_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint NOT NULL,
  `updated_by` bigint NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint NOT NULL DEFAULT '0',
  `status` enum('pending','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leads_leads_id_unique` (`leads_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.leads: ~1 rows (approximately)
INSERT INTO `leads` (`id`, `leads_id`, `name`, `email`, `contact`, `updated_by`, `product`, `source`, `notes`, `company`, `qty`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'LEAD0001', 'abc', 'abc@gmail.com', 8521478455, 1, 'polu', 'website', 'sfd', NULL, 1, 'pending', '2025-10-17 04:51:00', '2025-10-17 04:51:00');

-- Dumping structure for table globe_assist.letter_issues
CREATE TABLE IF NOT EXISTS `letter_issues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned DEFAULT NULL,
  `letter_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `letter_issues_employee_id_foreign` (`employee_id`),
  CONSTRAINT `letter_issues_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.letter_issues: ~1 rows (approximately)
INSERT INTO `letter_issues` (`id`, `employee_id`, `letter_type`, `letter_url`, `letter_no`, `issue_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Offer Letter', 'letters/LTR-OFF-20251017-7969.pdf', 'LTR-OFF-20251017-7969', '2025-10-17', NULL, 'Approved', '2025-10-17 03:40:22', '2025-10-17 03:58:51');

-- Dumping structure for table globe_assist.login_employees
CREATE TABLE IF NOT EXISTS `login_employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `login` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.login_employees: ~0 rows (approximately)

-- Dumping structure for table globe_assist.login_histories
CREATE TABLE IF NOT EXISTS `login_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'failed',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logged_in_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.login_histories: ~0 rows (approximately)
INSERT INTO `login_histories` (`id`, `user_id`, `email`, `ip_address`, `user_agent`, `status`, `message`, `logged_in_at`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'admin@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'failed', 'Invalid credentials', '2025-10-05 05:17:55', '2025-10-05 05:17:55', '2025-10-05 05:17:55');

-- Dumping structure for table globe_assist.manage_admins
CREATE TABLE IF NOT EXISTS `manage_admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sr_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive','pending','suspended') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `manage_admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.manage_admins: ~0 rows (approximately)
INSERT INTO `manage_admins` (`id`, `sr_no`, `photo`, `name`, `email`, `password`, `role`, `last_login`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'ADM001', 'admin_photos/XfBw1ZtMGnMbJbPnPPTO1InikEJGmVVX57xPSt9R.jpg', 'Drake Ballard', 'mujutakyt@gmail.com', '$2y$12$SgqdHaJqyLh/vDwfTsmnl.iuzlVBIoInUset7okVXrg.V81cE0SZ6', 'manager', NULL, 'active', '2025-10-29 05:52:08', '2025-10-29 05:52:43');

-- Dumping structure for table globe_assist.manage_quantities
CREATE TABLE IF NOT EXISTS `manage_quantities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `product_quantity` int NOT NULL DEFAULT '0',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.manage_quantities: ~1 rows (approximately)
INSERT INTO `manage_quantities` (`id`, `store_id`, `product_id`, `product_quantity`, `remark`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 25089, 'new stock november', '2025-10-27 06:32:58', '2025-10-27 06:33:28');

-- Dumping structure for table globe_assist.materials
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` bigint DEFAULT NULL,
  `initial_qty` bigint NOT NULL DEFAULT '0',
  `category_id` bigint unsigned NOT NULL,
  `min_stock` bigint NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `unit_cost` bigint NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `materials_material_id_unique` (`material_id`),
  KEY `materials_category_id_foreign` (`category_id`),
  CONSTRAINT `materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `material_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.materials: ~3 rows (approximately)
INSERT INTO `materials` (`id`, `material_name`, `material_id`, `unit`, `initial_qty`, `category_id`, `min_stock`, `description`, `unit_cost`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'polybag', 'MAT001', 109, 1000, 1, 10, 'null', 10, 'Active', '2025-10-23 04:14:11', '2025-10-23 04:14:11'),
	(2, 'pattern papera', 'MAT002', 109, 12, 1, 500, 'nio', 19, 'Active', '2025-10-23 04:14:58', '2025-10-23 04:15:33'),
	(3, 'lacesaq', 'MAT003', 1, 10, 3, 500, 'necck laces', 115, 'Active', '2025-10-25 00:25:09', '2025-10-25 00:25:31');

-- Dumping structure for table globe_assist.material_categories
CREATE TABLE IF NOT EXISTS `material_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_categories_category_id_unique` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.material_categories: ~3 rows (approximately)
INSERT INTO `material_categories` (`id`, `category_name`, `category_id`, `unit`, `category_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'doppler', 'CAT001', 'kg', 'raw', 'noida', 'Active', '2025-10-23 02:39:43', '2025-10-23 02:39:43'),
	(3, 'aert', 'CAT002', 'kg', 'raw', 'sfws', 'Active', '2025-10-24 23:38:08', '2025-10-24 23:38:08'),
	(4, 'delhi', 'CAT003', '3', 'finished', 'wefw', 'Active', '2025-10-24 23:49:32', '2025-10-24 23:49:32');

-- Dumping structure for table globe_assist.material_purchase_entries
CREATE TABLE IF NOT EXISTS `material_purchase_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_purchase_entries_purchase_id_unique` (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.material_purchase_entries: ~1 rows (approximately)
INSERT INTO `material_purchase_entries` (`id`, `purchase_id`, `material_id`, `vendor_id`, `qty`, `unit_price`, `invoice_number`, `purchase_date`, `store_id`, `remarks`, `created_at`, `updated_at`) VALUES
	(2, 'MPUR20251025-017', '2', '2', 343.00, 100.00, 'Kudv', '2025-10-15', 'STO001', 'Huzfowhi ifvov vutajac muzfa uv emewipvom kog pasmahwa gobara jebesu gadja vieka viba. Ti jalijjo sifballi ah tajkip idvugof ud tu uncovob onee', '2025-10-25 07:49:12', '2025-10-26 23:28:41');

-- Dumping structure for table globe_assist.material_stores
CREATE TABLE IF NOT EXISTS `material_stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `material_id` bigint unsigned DEFAULT NULL,
  `qty` bigint NOT NULL DEFAULT '0',
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storetype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rack_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slap_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_stores_category_id_foreign` (`category_id`),
  KEY `material_stores_material_id_foreign` (`material_id`),
  CONSTRAINT `material_stores_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `material_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `material_stores_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.material_stores: ~4 rows (approximately)
INSERT INTO `material_stores` (`id`, `category_id`, `material_id`, `qty`, `unit`, `location`, `storetype`, `store_id`, `rack_id`, `slap_id`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 15, 'cm', 'LOC001', 'STYPE001', 'STO001', 'SRACK001', 'SSLAP002', 'RG006', '2025-10-23 06:20:21', '2025-10-23 06:20:43'),
	(2, 1, 1, 10, 'cm', 'LOC001', 'STYPE001', 'STO001', 'SRACK001', 'SSLAP002', 'RG006', '2025-10-25 01:00:34', '2025-10-25 01:00:34'),
	(3, 4, 2, 1102, 'cm', 'LOC002', 'STYPE003', 'STO001', 'SRACK001', 'SSLAP002', 'RG006', '2025-10-25 01:01:17', '2025-10-25 01:11:53'),
	(4, 4, 1, 1523, 'KG', 'LOC002', 'STYPE003', 'STO002', 'SRACK002', 'SSLAP002', 'RG006', '2025-10-25 01:14:14', '2025-10-25 01:14:14');

-- Dumping structure for table globe_assist.material_units
CREATE TABLE IF NOT EXISTS `material_units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `material_unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_units_material_unit_id_unique` (`material_unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.material_units: ~2 rows (approximately)
INSERT INTO `material_units` (`id`, `material_unit_id`, `material_unit_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'UNIT001', 'cm', 'noida sec 18', '2025-10-23 01:57:56', '2025-10-23 01:58:23'),
	(3, 'UNIT002', 'KG', 'Kilogram', '2025-10-24 23:12:58', '2025-10-24 23:12:58');

-- Dumping structure for table globe_assist.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.migrations: ~23 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(16, '0001_01_01_000001_create_cache_table', 2),
	(17, '0001_01_01_000002_create_jobs_table', 2),
	(18, '2014_10_12_100000_create_password_resets_table', 2),
	(19, '2025_10_01_192600_create_users_table', 2),
	(20, '2025_10_01_193954_create_notifications_table', 2),
	(21, '2025_10_02_115115_drop__partner_controller', 2),
	(22, '2025_10_02_115426_create_partners_table', 2),
	(23, '2025_10_05_104043_create_login_histories_table', 3),
	(24, '2025_10_05_121706_create_admins_table', 4),
	(26, '2025_10_06_093649_add_fields_to_partners_table', 6),
	(27, '2025_10_06_074535_create_partners_table', 7),
	(28, '2025_10_15_120418_create_contacts_table', 8),
	(29, '2025_10_16_105707_create_faqs_table', 9),
	(30, '2025_10_25_104620_manage_admins_table', 10),
	(31, '2025_10_27_121600_admin_roles_table', 11),
	(32, '2025_10_29_072237_create_notifications_table', 12),
	(33, '2025_10_29_123326_update_notifications_table_add_image_and_remove_sent_to', 12),
	(34, '2025_11_27_184428_add_role_and_password_to_users_table', 12),
	(35, '2025_11_27_185506_add_role_and_password_to_users_table', 13),
	(36, '2025_11_27_185815_add_role_and_password_to_users_table', 14),
	(37, '2025_11_28_110659_add_role_and_password_to_users_and_partners_tables', 15),
	(38, '2025_12_12_135258_add_partner_fields_to_users_table', 16);

-- Dumping structure for table globe_assist.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table globe_assist.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.model_has_roles: ~17 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 5),
	(4, 'App\\Models\\User', 6),
	(5, 'App\\Models\\User', 7),
	(5, 'App\\Models\\User', 8),
	(5, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 15),
	(6, 'App\\Models\\User', 16),
	(7, 'App\\Models\\User', 17),
	(8, 'App\\Models\\User', 18),
	(7, 'App\\Models\\User', 19),
	(7, 'App\\Models\\User', 20),
	(9, 'App\\Models\\User', 21),
	(10, 'App\\Models\\User', 22);

-- Dumping structure for table globe_assist.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.notifications: ~0 rows (approximately)
INSERT INTO `notifications` (`id`, `date_time`, `image`, `notification_id`, `recipient_code`, `title`, `message`, `type`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'notifications/Screenshot 2025-11-27 170118.png', NULL, 'user', 'Dolore dolore conseq', 'A at aliquid quos po', NULL, 'Unread', '2025-11-28 05:48:09', '2025-11-28 05:48:09');

-- Dumping structure for table globe_assist.office_requirements
CREATE TABLE IF NOT EXISTS `office_requirements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned DEFAULT NULL,
  `employee_id` bigint unsigned DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `status` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.office_requirements: ~2 rows (approximately)
INSERT INTO `office_requirements` (`id`, `department_id`, `employee_id`, `quantity`, `status`, `note`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 5, 'Pending', 'cpu', '2025-10-17 03:16:12', '2025-10-17 03:16:12'),
	(2, 1, NULL, 10, 'Pending', 'Monitors', '2025-10-17 03:16:47', '2025-10-17 03:16:47');

-- Dumping structure for table globe_assist.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'partner',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `aadhar_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `partner_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `partners_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.partners: ~22 rows (approximately)
INSERT INTO `partners` (`id`, `photo`, `full_name`, `mobile`, `email`, `role`, `password`, `location`, `country`, `status`, `description`, `aadhar_card`, `pan_card`, `cv_resume`, `previous_work`, `created_at`, `updated_at`, `partner_id`) VALUES
	(31, '1760076455_photo.jpg', 'Idona Stephens', '9934567890', 'lubor@mailinator.com', 'partner', NULL, 'Sunt eu est tempor e', 'Australia', 'active', 'Aliqua Culpa repreh', '1760076455_aadhar_card.jpg', '1760076455_pan_card.jpg', NULL, '1760076455_previous_work.jpg', '2025-10-10 06:07:35', '2025-10-10 06:07:35', 'GAP775446'),
	(32, NULL, 'Grace Berry', '9345678998', 'menitule@mailinator.com', 'partner', NULL, 'Rerum in obcaecati c', 'Canada', 'active', 'Dolorem enim qui min', NULL, NULL, NULL, NULL, '2025-10-10 06:10:23', '2025-10-10 06:10:23', 'GAP512034'),
	(34, '1760171907_photo.jpg', 'Satyam Singh', '9625724273', 'satyamsingh962572@gmail.com', 'partner', NULL, 'Greater Noida, Gautam Bhuddha Nagar', 'India', 'active', 'dsfg', '1760171907_aadhar_card.jpg', '1760171907_pan_card.jpg', NULL, '1760171907_previous_work.pdf', '2025-10-11 08:38:27', '2025-10-11 08:38:27', 'GAP481162'),
	(35, '1760172322_photo.jpg', 'Demo 1', '7037610813', 'csmsagar28012005@gmail.com', 'partner', NULL, 'Dehradun, chanderbani', 'India', 'active', NULL, NULL, NULL, NULL, NULL, '2025-10-11 08:45:22', '2025-10-11 08:45:22', 'GAP536569'),
	(36, '1760172895_photo.jpg', 'Kartik Swami', '8799747970', 'nu2936@gmail.com', 'partner', NULL, 'Delhi', 'India', 'active', NULL, NULL, NULL, NULL, NULL, '2025-10-11 08:54:55', '2025-10-11 08:54:55', 'GAP744356'),
	(37, '1760174902_photo.jpg', 'Bijender', '8882017027', 'bijenderdamer@gmail.com', 'partner', NULL, 'D-386 Gali No 58 Mahavir Enclave', 'India', 'active', NULL, NULL, NULL, NULL, NULL, '2025-10-11 09:28:22', '2025-10-11 09:28:22', 'GAP932715'),
	(38, '1760330845_photo.jpg', 'Cullen Bauer', '9823456732', 'holy@gmail.com', 'partner', NULL, 'Quia sed et aspernat', 'UK', 'active', 'Harum aspernatur ut', '1760330845_aadhar_card.jpg', '1760330845_pan_card.jpg', NULL, '1760330845_previous_work.pdf', '2025-10-13 04:47:25', '2025-10-13 04:47:25', 'GAP329227'),
	(39, '1760421991_photo.jpg', 'Keefe Johns', '9741825377', 'byqyqaza@mailinator.com', 'partner', NULL, 'Voluptas dolor non c', 'USA', 'active', 'Occaecat Nam tempore', '1760421991_aadhar_card.jpg', '1760421991_pan_card.jpg', '1760421991_cv_resume.pdf', '1760421991_previous_work.pdf', '2025-10-14 06:06:31', '2025-10-14 06:06:31', 'GAP810665'),
	(40, '1760452950_photo.jpg', 'Shubham Rajput', '9608313768', 'shubhamsingh17130@gmail.com', 'partner', NULL, 'Dwarka delhi', 'India', 'active', NULL, '1760452950_aadhar_card.jpg', NULL, NULL, NULL, '2025-10-14 14:42:30', '2025-10-14 14:42:30', 'GAP358284'),
	(41, '1764316621_photo.png', 'jsbdkjs', '8978972873', 'jsudh@gmail.com', 'partner', '$2y$12$BPJ2iEksL67PVN8mOLah1OBtVO1KnaUpFNpNSpTVzSalEQXwCenxq', 'Noida', 'Comoros', 'active', 'jbskjhs', '1764316621_aadhar_card.png', '1764316621_pan_card.png', '1764316621_cv_resume.pdf', '1764316621_previous_work.jpg', '2025-11-28 07:57:01', '2025-11-28 07:57:01', 'GAP668009'),
	(42, '1764329424_photo.png', 'Jordan Sandoval', '8765432198', 'rahukekoc@mailinator.com', 'partner', '$2y$12$ftwbm0KA81xbbxTPeghw2.3Bi.Q.bPQj9ZQat4RSlzdBz2uenW6Ie', 'Do in placeat cupid', 'Tuvalu', 'active', 'Explicabo Atque und', '1764329424_aadhar_card.jpg', '1764329424_pan_card.png', '1764329424_cv_resume.pdf', '1764329424_previous_work.png', '2025-11-28 11:30:24', '2025-11-28 11:30:24', 'GAP354634'),
	(43, '1764332549_photo.png', 'Baker Dale', '9876543212', 'partner1@gmail.com', 'partner', '$2y$12$xyFnZTmQidgR3mWWIcgOSucwZLLYFk6cgErebLWa.e0.cKojVQb6a', 'Velit hic deserunt q', 'Heard Island and McDonald Islands', 'active', 'Quos ipsum eos imp', '1764332549_aadhar_card.png', '1764332549_pan_card.png', '1764332549_cv_resume.pdf', '1764332549_previous_work.jpg', '2025-11-28 12:22:29', '2025-11-28 12:22:29', 'GAP823079'),
	(44, '1764393314_photo.png', 'Raja Mcgee', '9876543219', 'wyrik@mailinator.com', 'partner', '$2y$12$IibAfrqeHwtQ6f6hWrjtp.hXScoOkv6rHRdyAjHh520UyJZaAY4Bq', 'Repellendus Labore', 'São Tomé and Príncipe', 'active', 'Quam nisi assumenda', '1764393314_aadhar_card.png', '1764393314_pan_card.png', '1764393314_cv_resume.pdf', '1764393314_previous_work.png', '2025-11-29 05:15:14', '2025-11-29 05:15:14', 'GAP560619'),
	(45, '1764396276_photo.jpg', 'Gay Pollard', '9876543212', 'beqacaqaqe@mailinator.com', 'partner', '$2y$12$AswDISwPZoyE0NvpelAKXuQm42joWdD63qxE17Xib0wJwOlVDTWHm', 'Aliquip omnis earum', 'India', 'active', 'Corrupti reiciendis', '1764396276_aadhar_card.png', '1764396276_pan_card.png', '1764396276_cv_resume.pdf', '1764396276_previous_work.pdf', '2025-11-29 06:04:36', '2025-11-29 06:04:36', 'GAP302327'),
	(46, '1764396617_photo.png', 'Eden Stewart', '9876543217', 'titi@mailinator.com', 'partner', '$2y$12$sonGi29NnZu7/L5tTOE8C.M5NTrGzmGjVb0/SENM/20ekVERru8Fe', 'Quia provident exer', 'China', 'active', 'Aliquam vel nisi quo', '1764396617_aadhar_card.png', '1764396617_pan_card.png', '1764396617_cv_resume.pdf', '1764396617_previous_work.pdf', '2025-11-29 06:10:17', '2025-11-29 06:10:17', 'GAP895988'),
	(47, '1764421711_photo.jpg', 'anurag', '9987654321', 'anurag12@gmail.com', 'partner', '$2y$12$luWdflMfyaXQWe21ZbARLObwggGCH6ftEZO8aPMaOaRkZeW3kQdgW', 'Ut autem anim fugit', 'Bahamas', 'active', 'Fugit aute fugiat', '1764421712_aadhar_card.png', '1764421712_pan_card.png', '1764421712_cv_resume.pdf', '1764421712_previous_work.pdf', '2025-11-29 13:08:32', '2025-11-29 13:08:32', 'GAP108939'),
	(48, '1765538975_photo.png', 'jyoti', '8929414769', 'sywyrohet@gmail.com', 'partner', '$2y$12$1pU6h.KUHfY98WakgZwaeerjnAURtpO65QQgPEJZEPlzizUG1vw0C', 'Impedit quia omnis', 'Jordan', 'active', 'Aut occaecat commodi', '1765538975_aadhar_card.png', '1765538975_pan_card.png', '1765538975_cv_resume.pdf', '1765538975_previous_work.png', '2025-12-12 11:29:35', '2025-12-12 11:29:35', 'GAP353312'),
	(49, '1765623407_photo.png', 'Theodore Tanner', '9988776634', 'guniz@mailinator.com', 'partner', '$2y$12$W88X27D/1ge0pjmZQvgLqOxImBnUZI2gmmWSRFd7QKpcC7Gd5.oPy', 'Proident non qui si', 'Republic of the Congo', 'active', 'Aut non non maxime n', '1765623407_aadhar_card.pdf', '1765623407_pan_card.pdf', '1765623407_cv_resume.pdf', '1765623407_previous_work.pdf', '2025-12-13 10:56:47', '2025-12-13 10:56:47', 'GAP859693'),
	(50, '1765623531_photo.png', 'Hilel Alexander', '9087654534', 'gewamu@mailinator.com', 'partner', '$2y$12$O1FXuXx7GpiYn3L8WOODeu51yXovAjUY.OM3QBuraOAGga9Q8Z1.W', 'Nihil itaque rerum i', 'Croatia', 'active', 'In dolor ratione fug', '1765623531_aadhar_card.png', '1765623531_pan_card.png', '1765623531_cv_resume.pdf', '1765623531_previous_work.png', '2025-12-13 10:58:51', '2025-12-13 10:58:51', 'GAP960619'),
	(51, '1765625450_photo.png', 'Kasimir Garrett', '9977880021', 'partner@gmail.com', 'partner', '$2y$12$KGmh3m14Jx49RLa9fqYSLuob5Z3bYSztRhGXuO.xOSKg1pe8Uj7ra', 'Id commodo aperiam l', 'Burkina Faso', 'active', 'Ut et voluptates nih', '1765625450_aadhar_card.pdf', '1765625450_pan_card.png', '1765625450_cv_resume.pdf', '1765625450_previous_work.pdf', '2025-12-13 11:30:50', '2025-12-13 11:30:50', 'GAP565128'),
	(52, '1765797902_photo.jpg', 'Reuben Rhodes', '9988667643', 'luji@gmail.com', 'partner', '$2y$12$1yeENNPftOrT02sF8tnUIOLmSsZsBCQ7.R0HzZGQ.tBwjFcjooILO', 'Consequat Odio aut', 'India', 'active', 'Et aperiam nulla et', '1765797902_aadhar_card.jpg', '1765797902_pan_card.jpg', '1765797902_cv_resume.pdf', '1765797902_previous_work.pdf', '2025-12-15 11:25:02', '2025-12-15 11:25:02', 'GAP306899'),
	(53, '1765798021_photo.png', 'Mechelle Leblanc', '9988543212', 'cufivobyz@mailinator.com', 'partner', '$2y$12$CYZPmuUDdOL.gOD0e7NFr.x46RPGkw2FRMldaRJBlWvVqKu3AH15S', 'Voluptates ab nisi e', 'Benin', 'active', 'Id reprehenderit eni', '1765798021_aadhar_card.png', '1765798022_pan_card.png', '1765798022_cv_resume.pdf', '1765798022_previous_work.png', '2025-12-15 11:27:02', '2025-12-15 11:27:02', 'GAP194015'),
	(54, '1765798397_photo.jpg', 'Howard Cruz', '7788665534', 'kogut@gmail.com', 'partner', '$2y$12$LFBM7v6Bc4DOluurxmRDJOK98n/yLfrql7e09bQZorG9YAQebMGWG', 'Eu tempor sed est d', 'Jordan', 'active', 'Unde in modi officia', '1765798398_aadhar_card.png', '1765798398_pan_card.png', '1765798398_cv_resume.pdf', '1765798398_previous_work.png', '2025-12-15 11:33:18', '2025-12-15 11:33:18', 'GAP518850'),
	(55, 'partners/JFiSBdpDx1jrBZ6Cw4Gr74BmdMHxj97qVEUi63dK.jpg', 'Karly Dyer', '9988776653', 'hokamyco@mailinator.com', 'partner', '$2y$12$rb3iAn8p66LiVDL3797Nq.oEITkxX0PmSHkEHkNPJdNfacDrJwXoa', 'Commodo et nihil con', 'India', 'active', NULL, 'partners/TAaYcEMYChRzmVGZQfVTNYERVaDqjkshSlJfUVfd.png', 'partners/ibWFwhaX3sFTOelI4ZFUQrLljH3Y0ZZ8Z6QOWZ9G.png', 'partners/avP7F7KMzmza3kJ9vTuhwJj8wZMPydbFekv9pxhE.pdf', 'partners/wRK19TeAzZ4aZdj5ciZEdoG6LJ7832RBB2VWyibA.png', '2025-12-15 12:04:59', '2025-12-15 12:04:59', 'GAP262177');

-- Dumping structure for table globe_assist.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.password_resets: ~0 rows (approximately)

-- Dumping structure for table globe_assist.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table globe_assist.pd_fabric_closing_stocks
CREATE TABLE IF NOT EXISTS `pd_fabric_closing_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_in_inches` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gsm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_weight_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_weight_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `despatch_issue_date` date DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pd_fabric_closing_stocks_date_index` (`date`),
  KEY `pd_fabric_closing_stocks_status_index` (`status`),
  KEY `pd_fabric_closing_stocks_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pd_fabric_closing_stocks: ~2 rows (approximately)
INSERT INTO `pd_fabric_closing_stocks` (`id`, `date`, `month`, `roll_no`, `size_in_inches`, `danier`, `type`, `gsm`, `mtr`, `gross_weight_kg`, `net_weight_kg`, `average`, `status`, `despatch_issue_date`, `remark`, `created_at`, `updated_at`) VALUES
	(1, '2003-02-27', 'March', '8451236', 'Cnnhbyyzvgwjul', 'Snv', 'Avguogotjaqijrx', 'Pcfgluptrsnj', '10', '10', '10', 'Ctv', 'Bamlaiddkv', '2026-02-01', 'Gdpahwszc', '2025-11-04 01:43:01', '2025-11-04 01:43:01'),
	(2, '1963-11-05', 'Nyklalxaedzdk', 'W', 'Hvpfnffozztokf', 'Qkztbrmojmmjrmr', 'Kejtiwb', 'Ykrtfaiomqtvaxk', 'Jskrpcxyxe', 'Gvmjkjmxm', 'Jdwjkqqpn', 'Zfcx', 'Uhyp', '1981-11-09', 'Xvcvimik', '2025-11-04 01:58:40', '2025-11-04 01:58:40');

-- Dumping structure for table globe_assist.pd_pof_stocks
CREATE TABLE IF NOT EXISTS `pd_pof_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dispatch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pd_pof_stocks: ~4 rows (approximately)
INSERT INTO `pd_pof_stocks` (`id`, `size`, `thickness`, `meter`, `opening_stock`, `date`, `dispatch`, `balance`, `total_inch`, `remark`, `created_at`, `updated_at`) VALUES
	(2, '12', '12', '1665', '194', '1988-03-11', '437', '454', '84', 'Euxwd', '2025-11-04 00:20:07', '2025-11-04 00:20:07'),
	(3, '5', '25', '750', '132', '1973-03-08', '290', '16', '470', 'Fbjcenw', '2025-11-04 00:52:36', '2025-11-04 00:52:36'),
	(4, '6', '12', '750', '148', '1985-01-02', '405', '482', '90', 'Pwotxjiafl', '2025-11-04 00:56:10', '2025-11-04 00:56:10'),
	(5, '5', '426', '1665', '111', '2013-08-04', '326', '160', '114', 'Kpu', '2025-11-04 01:04:06', '2025-11-04 01:04:06');

-- Dumping structure for table globe_assist.pd_purchase_orders
CREATE TABLE IF NOT EXISTS `pd_purchase_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique Purchase Order Number',
  `status` enum('Pending','In Processing','Complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending' COMMENT 'Order Status',
  `po_date` date NOT NULL COMMENT 'Purchase Order Date',
  `expected_delivery` date DEFAULT NULL COMMENT 'Expected Delivery Date',
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment Terms',
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Supplier/Vendor Name',
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'GST Number',
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Supplier Contact Number',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Supplier Email Address',
  `supplier_address` text COLLATE utf8mb4_unicode_ci COMMENT 'Supplier Address',
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of Item/Material',
  `size` decimal(8,2) DEFAULT NULL COMMENT 'Size of Material',
  `gsm` int DEFAULT NULL COMMENT 'GSM Weight',
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Type of Item',
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Quantity Ordered',
  `received` int NOT NULL DEFAULT '0' COMMENT 'Quantity Received',
  `balance` int NOT NULL DEFAULT '0' COMMENT 'Remaining Balance',
  `price` decimal(10,2) DEFAULT NULL COMMENT 'Unit Price',
  `total_amount` decimal(12,2) DEFAULT NULL COMMENT 'Total Amount',
  `shipping_address` text COLLATE utf8mb4_unicode_ci COMMENT 'Shipping Address',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pd_purchase_orders_po_number_unique` (`po_number`),
  KEY `pd_purchase_orders_po_number_index` (`po_number`),
  KEY `pd_purchase_orders_status_index` (`status`),
  KEY `pd_purchase_orders_supplier_name_index` (`supplier_name`),
  KEY `pd_purchase_orders_po_date_index` (`po_date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pd_purchase_orders: ~1 rows (approximately)
INSERT INTO `pd_purchase_orders` (`id`, `po_number`, `status`, `po_date`, `expected_delivery`, `payment_terms`, `supplier_name`, `gst_number`, `contact_number`, `email`, `supplier_address`, `item_name`, `size`, `gsm`, `item_type`, `quantity`, `received`, `balance`, `price`, `total_amount`, `shipping_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'PO-00001', 'Complete', '2026-10-10', '2026-06-24', NULL, 'Nir', '07AWESE9658E8ZO', '7717277252', 'duemjus@mukuwa.ne', 'Geun ubmupdul rahcoude zuecjuv sine kusutak urhiha ugu wusuni pazappo cap digesak re. Uzsab gulvuswaf ajle kuc mah tu simpuodu narid hire vedfohli fec tit', 'Mh', 89.00, 697, 'Mrubskwprix', '3948', 10, 3938, 500.00, 197000.00, 'Woz wazo nazuspa wonli zahef dit zetrasvi ziri fooco few jof bapbeczeg ice ukeijdik. Fepfo lusiufa peebe lovug sujove epipame dofbulwi fiinosa mehpicu gelmuvtas iprokkis ewi coojnaj wa coupril ras wonpacba. Weszit totpub za sificzu siva kihusop ga temeha bizur ovliziw ehaju fedopora ho. Jugon zo zimodu waav kak canfi gela doiriil go efluw ni pew udodev oh hozom pov soan. Rididuwih he uke pem sutned ocutigag niigfo kusmeb woke dep zas hibit sejolru rih bejuma polena', '2025-11-04 06:57:34', '2025-11-05 00:37:24', NULL);

-- Dumping structure for table globe_assist.pd_vendors
CREATE TABLE IF NOT EXISTS `pd_vendors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `primary_products` text COLLATE utf8mb4_unicode_ci,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pd_vendors_vendor_id_unique` (`vendor_id`),
  UNIQUE KEY `pd_vendors_email_unique` (`email`),
  KEY `pd_vendors_vendor_id_index` (`vendor_id`),
  KEY `pd_vendors_vendor_name_index` (`vendor_name`),
  KEY `pd_vendors_email_index` (`email`),
  KEY `pd_vendors_created_at_index` (`created_at`),
  CONSTRAINT `pd_vendors_chk_1` CHECK (json_valid(`product_categories`)),
  CONSTRAINT `pd_vendors_chk_2` CHECK (json_valid(`payment_terms`))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pd_vendors: ~1 rows (approximately)
INSERT INTO `pd_vendors` (`id`, `vendor_id`, `vendor_name`, `contact_number`, `email`, `address`, `company_name`, `store_type`, `product_categories`, `primary_products`, `gst_number`, `payment_terms`, `location`, `created_at`, `updated_at`) VALUES
	(2, 'VNDO002', 'Sddpxsspudnh', 'Ovoqfss', 'rujbalke@peloj.bb', 'Ibaawrpk', 'X', 'Retail', '["Electronics"]', 'Pcoqtdkseu', 'Ojg', '["Net 30"]', 'delhi', '2025-11-04 05:35:25', '2025-11-04 05:35:50');

-- Dumping structure for table globe_assist.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.permissions: ~0 rows (approximately)

-- Dumping structure for table globe_assist.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table globe_assist.pof_machines
CREATE TABLE IF NOT EXISTS `pof_machines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_machines_machine_id_unique` (`machine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_machines: ~1 rows (approximately)
INSERT INTO `pof_machines` (`id`, `machine_id`, `machine_name`, `machine_mode`, `manufacturer`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'MCHN001', 'Pegasus1', 'Automatic', 'Pegasus Japan', 'Japanese Company', '2025-11-08 06:21:59', '2025-11-08 06:23:50');

-- Dumping structure for table globe_assist.pof_machine_statuses
CREATE TABLE IF NOT EXISTS `pof_machine_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_status_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_machine_statuses_machine_status_id_unique` (`machine_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_machine_statuses: ~1 rows (approximately)
INSERT INTO `pof_machine_statuses` (`id`, `machine_status_id`, `machine_id`, `machine_status`, `status_description`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'MCHSTATUS001', 'MCHN001', 'Idle', 'demo delhi', 'USER001', '2025-11-08 06:54:01', '2025-11-08 06:56:54');

-- Dumping structure for table globe_assist.pof_machine_types
CREATE TABLE IF NOT EXISTS `pof_machine_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_machine_types_machine_type_id_unique` (`machine_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_machine_types: ~1 rows (approximately)
INSERT INTO `pof_machine_types` (`id`, `machine_type_id`, `machine_id`, `machine_type`, `department_area`, `daily_capacity`, `purchase_date`, `status`, `maintenance_frequency`, `created_at`, `updated_at`) VALUES
	(1, 'MCTP001', 'MCHN001', 'stitch machine', 'stitching', '10', '2026-10-12', 'Newely Added', 'Quarterly', '2025-11-08 06:32:09', '2025-11-08 06:32:09');

-- Dumping structure for table globe_assist.pof_material_transactions
CREATE TABLE IF NOT EXISTS `pof_material_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_material_transactions_transaction_id_unique` (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_material_transactions: ~3 rows (approximately)
INSERT INTO `pof_material_transactions` (`id`, `transaction_id`, `material_id`, `quantity`, `type`, `location`, `remarks`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'TRX001', 'MAT001', 10, 'In', 'noidaa', 'demo', 'USER001', '2025-11-07 02:59:48', '2025-11-07 02:59:48'),
	(2, 'TRX002', 'MAT003', 10, 'In', 'noidaa', 'demo', 'USER001', '2025-11-07 04:01:00', '2025-11-07 04:26:36'),
	(3, 'TRX003', 'MAT001', 85, 'In', 'noidaa', 'demo', 'USER001', '2025-11-07 04:27:15', '2025-11-07 04:27:15');

-- Dumping structure for table globe_assist.pof_product_material_usages
CREATE TABLE IF NOT EXISTS `pof_product_material_usages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_usage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_usage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wastage_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_wastage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_product_material_usages_usage_id_unique` (`usage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_product_material_usages: ~2 rows (approximately)
INSERT INTO `pof_product_material_usages` (`id`, `usage_id`, `production_entry_id`, `material_id`, `quantity_unit`, `expected_usage`, `actual_usage`, `wastage_unit`, `total_wastage`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'USG001', '1', 'Kraft Paper', '10', '100', NULL, NULL, NULL, 'USER001', '2025-11-07 00:40:30', '2025-11-07 00:40:30'),
	(3, 'USG002', '1', 'Kraft Paper', '58', '580', NULL, NULL, NULL, 'USER001', '2025-11-07 02:21:29', '2025-11-07 23:33:47');

-- Dumping structure for table globe_assist.pof_product_production_entries
CREATE TABLE IF NOT EXISTS `pof_product_production_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_completion_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Progress',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_product_production_entries_production_entry_id_unique` (`production_entry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_product_production_entries: ~2 rows (approximately)
INSERT INTO `pof_product_production_entries` (`id`, `production_entry_id`, `product_id`, `stage_id`, `assigned_to`, `expected_completion_date`, `status`, `remark`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'PEN20251107001', '3', 'STG002', 'delhi', '2025-10-12', 'In Progress', 'delhii', 'USER001', '2025-11-06 23:56:22', '2025-11-07 00:29:44'),
	(2, 'PEN20251107002', '4', 'STG002', 'noida', '2025-10-12', 'Complete', 'open', 'USER001', '2025-11-07 00:23:54', '2025-11-07 00:23:54');

-- Dumping structure for table globe_assist.pof_purchase_orders
CREATE TABLE IF NOT EXISTS `pof_purchase_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `gsm` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `received` int NOT NULL,
  `balance` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_purchase_orders_purchase_order_id_unique` (`purchase_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_purchase_orders: ~3 rows (approximately)
INSERT INTO `pof_purchase_orders` (`id`, `purchase_order_id`, `vender_id`, `item_name`, `size`, `gsm`, `price`, `quantity`, `total_amount`, `received`, `balance`, `date`, `status`, `expected_delivery_date`, `created_at`, `updated_at`) VALUES
	(2, 'PO002', 'VNDO0255', 'tag gun', 10, 59, 10.00, 596, 5960.00, 10, 586, '2025-10-12', 'pending', '2025-10-12', '2025-11-07 06:59:11', '2025-11-07 06:59:56'),
	(3, 'PO003', 'VNDO3735', 'vike', 89, 58, 1000.00, 59, 59000.00, 0, 0, '2026-10-10', 'pending', '2026-10-10', '2025-11-07 07:37:57', '2025-11-07 07:37:57'),
	(4, 'PO004', 'VNDO0255', '10', 10, 58, 59.00, 189, 11151.00, 0, 189, '2025-10-15', 'pending', '2025-10-15', '2025-11-08 04:54:07', '2025-11-08 04:54:25');

-- Dumping structure for table globe_assist.pof_stages
CREATE TABLE IF NOT EXISTS `pof_stages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pof_stages_stage_id_unique` (`stage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_stages: ~1 rows (approximately)
INSERT INTO `pof_stages` (`id`, `stage_id`, `stage_name`, `created_at`, `updated_at`) VALUES
	(2, 'STG002', 'Noida', '2025-11-06 06:10:43', '2025-11-06 06:10:43');

-- Dumping structure for table globe_assist.pof_stocks
CREATE TABLE IF NOT EXISTS `pof_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `size_inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dispatch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.pof_stocks: ~1 rows (approximately)
INSERT INTO `pof_stocks` (`id`, `size_inch`, `thickness`, `meter`, `opening_stock`, `date`, `dispatch`, `balance`, `total_inch`, `remark`, `created_at`, `updated_at`) VALUES
	(1, '5', '12', '360', '1', '2025-12-10', '2', '1', '408', 'new stock november', '2025-10-27 07:30:14', '2025-10-27 07:30:39');

-- Dumping structure for table globe_assist.product_colors
CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `color_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_colors_color_id_index` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.product_colors: ~2 rows (approximately)
INSERT INTO `product_colors` (`id`, `color_id`, `color_name`, `created_at`, `updated_at`) VALUES
	(1, 'CLR20251027-514', 'Black-600', '2025-10-27 01:02:39', '2025-10-27 01:02:55'),
	(2, 'CLR20251027-706', 'Red', '2025-10-27 01:06:28', '2025-10-27 01:06:28');

-- Dumping structure for table globe_assist.product_names
CREATE TABLE IF NOT EXISTS `product_names` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_names_product_id_unique` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.product_names: ~1 rows (approximately)
INSERT INTO `product_names` (`id`, `product_id`, `product_name`, `product_type`, `created_at`, `updated_at`) VALUES
	(1, 'PRD20251027-923', 'Poly Bag2', 'TYP20251027-668', '2025-10-27 02:36:20', '2025-10-27 02:36:35');

-- Dumping structure for table globe_assist.product_regal_stores
CREATE TABLE IF NOT EXISTS `product_regal_stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_store_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `rack_id` bigint unsigned NOT NULL,
  `status` enum('In Stock','Out of Stock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_regal_stores_product_store_id_unique` (`product_store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.product_regal_stores: ~2 rows (approximately)
INSERT INTO `product_regal_stores` (`id`, `product_store_id`, `product_id`, `store_id`, `rack_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'PS20251027-2880', 1, 1, 1, 'Out of Stock', '2025-10-27 05:35:34', '2025-10-27 06:01:03'),
	(2, 'PS20251027-0933', 1, 3, 1, 'In Stock', '2025-10-27 06:01:15', '2025-10-27 06:01:15');

-- Dumping structure for table globe_assist.product_types
CREATE TABLE IF NOT EXISTS `product_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_types_type_id_unique` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.product_types: ~1 rows (approximately)
INSERT INTO `product_types` (`id`, `type_id`, `type_name`, `type_description`, `created_at`, `updated_at`) VALUES
	(2, 'TYP20251027-668', 'Scissors', 'matir', '2025-10-27 01:39:39', '2025-10-27 01:53:11');

-- Dumping structure for table globe_assist.purchaserequests
CREATE TABLE IF NOT EXISTS `purchaserequests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `request_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `required_date` date NOT NULL,
  `priority` enum('Low','Medium','High') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Medium',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','In Process','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` bigint unsigned DEFAULT NULL,
  `last_updated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.purchaserequests: ~14 rows (approximately)
INSERT INTO `purchaserequests` (`id`, `request_id`, `requested_by`, `department_id`, `material_product`, `quantity`, `required_date`, `priority`, `description`, `status`, `created_by`, `last_updated`, `created_at`, `updated_at`) VALUES
	(1, 'REQ001', 'khna guptaa', '1', 'polyy', 52, '2026-10-05', 'High', 'safs', 'Completed', NULL, NULL, '2025-10-17 07:44:28', '2025-11-05 05:30:10'),
	(2, 'REQ002', 'ramewararm cafe', '1', 'western rail', 100, '2026-10-20', 'Medium', 'sadfads', 'In Process', NULL, NULL, '2025-10-18 00:00:40', '2025-10-30 00:02:44'),
	(3, 'REQ003', 'Qgr', '1', 'Ntsb', 2, '2026-02-18', 'High', 'Si vizcat gakulek dafohauf awegim vuhi wesda zubna ukeeke vid jirinit wigapzed ruhvafku te ha. Wel efejo biefaso zehhe ipi vutombud wezgehula lonvuc', 'In Process', NULL, NULL, '2025-10-29 07:27:51', '2025-11-05 05:14:35'),
	(4, 'REQ004', 'Iorclonsgg', '1', 'Yomznyxhjbe', 1, '1975-05-17', 'Low', 'Zilajtul laf ponec pe nuv elaija bip budozbo remod wazkucik woeczim rusju', 'Completed', NULL, NULL, '2025-10-29 07:32:58', '2025-11-05 06:44:20'),
	(5, 'REQ005', 'Oczbikvhc', '1', 'Byxwfd', 4, '2025-06-04', 'Low', 'Bapge fucbewmac unmukafu be vef ojiretfuk tozajo elliciv behuhjo tekcuf emopfob tuv jivruh bos akofjov. Farilo civujru wono kov ofho hezi ovo cugajzuc re turbaej', 'In Process', NULL, NULL, '2025-10-29 07:40:11', '2025-11-05 06:51:55'),
	(6, 'REQ006', 'Jcaomrkhjxmozt', '2', 'Bmi', 1, '1979-03-18', 'Low', 'Goknaj emsugzom ifisa hil adrabvep towenko jewike bet', 'Completed', NULL, NULL, '2025-10-29 23:14:39', '2025-11-05 06:52:11'),
	(7, 'REQ007', 'Genzllvwzjsp', '1', 'Jgrdykzbxy', 1, '1999-10-12', 'Medium', 'Ka bowemo onad pok suhveas afi umu gezapo ekowaro oru zek upu', 'Pending', NULL, NULL, '2025-10-30 00:02:30', '2025-10-30 00:02:30'),
	(8, 'REQ008', 'awer', '1', 'western rail', 10, '2025-12-10', 'Low', 'demo', 'Pending', NULL, NULL, '2025-11-03 02:32:43', '2025-11-03 02:32:43'),
	(9, 'REQ009', 'demo', '1', 'demo', 58, '2026-10-15', 'Low', 'demo', 'Pending', NULL, NULL, '2025-11-08 07:31:45', '2025-11-08 07:31:45'),
	(10, 'REQ010', 'Prh', '2', 'Fwlcosefolc', 3, '1974-06-30', 'Medium', 'Doif zo ceucgu kak zowowgos deuve je kusguwcu baljurum zarigsa ciraiz jecsepfa epa. Wual dumme soc ama cigud etah parcun utu ockawwo tumufba uzaaho co dobikun culfegsun amupulfam. Dole aho az ejaoku etetosa necsa bemob ci jobposnid tovcut gum kumuw vot akmeguk utiab. Owceve ukauggow ofvudzuh lega mec epogefu be ewica kajilhe hozribmog awuli elaho jadled zuwalpam babe bafvo', 'Pending', NULL, NULL, '2025-11-12 07:56:14', '2025-11-12 07:56:14'),
	(12, 'REQ012', 'Trwdhh', '1', 'Uq', 1, '2001-06-25', 'Medium', 'Bediwo bokcovof ihoku watpotnac uno bunwo ewiziz pujhel hobzade babo nigo vahnokzi binitgo gafvifup. Aciawiwez kamfijjof bacibi ovegobvuh dotben duz pimpu bihjap itfaz ur vi if. Adoco juc midiop dibhike ovjuk sinco sul tumotwu jodu hewpe in pe bo vu hejog ref. Ravpud fazro nobtosle lorsaw gugohhal vat fowulcin wuhsolo judaca numev tit ik em ofiamo. Adse li wo dijugow ucibasuk bek zo ituc tedil oblowu ut cupi jaubo itatuuz reflil hivojen ruler. Kuco', 'Pending', NULL, NULL, '2025-11-12 07:57:00', '2025-11-12 07:57:00'),
	(14, 'REQ014', 'vikasha', '2', 'H', 1, '1941-08-25', 'Medium', 'Ic bemidku zuw conohih zimiso varmemza jus rizo ek asjo', 'Pending', NULL, 3, '2025-11-12 23:26:16', '2025-11-13 00:44:10'),
	(15, 'REQ015', 'delmr', '1', '45', 1, '2025-08-05', 'Medium', 'vhh', 'In Process', NULL, NULL, '2025-11-13 00:04:57', '2025-11-13 00:17:23'),
	(16, 'REQ016', 'deeheri', '1', '45', 85, '1991-10-12', 'Medium', 'deas', 'Completed', 3, 3, '2025-11-13 00:28:22', '2025-11-13 00:40:42');

-- Dumping structure for table globe_assist.purchase_orders
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint unsigned NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `received` int NOT NULL DEFAULT '0',
  `balance` int NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `status` enum('Pending','In Processing','Complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.purchase_orders: ~1 rows (approximately)
INSERT INTO `purchase_orders` (`id`, `vendor_id`, `size`, `gsm`, `type`, `quantity`, `received`, `balance`, `price`, `date`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, '45', '25', 'MW Sheet', 10, 10000, -9990, 100000.00, '2025-10-12', 'In Processing', '2025-10-28 00:16:42', '2025-10-28 00:17:44');

-- Dumping structure for table globe_assist.regal_logs
CREATE TABLE IF NOT EXISTS `regal_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.regal_logs: ~39 rows (approximately)
INSERT INTO `regal_logs` (`id`, `method`, `page`, `department`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Create', 'Visitor', 'Entry', 'create visitor in Entry Department by user demo on 25-12-2025', 6, NULL, NULL),
	(2, 'Create', 'Visters', 'Entry', 'New Visiter added successfully', 3, '2025-11-12 00:55:31', '2025-11-12 00:55:31'),
	(3, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 06:45:06', 3, '2025-11-12 01:15:06', '2025-11-12 01:15:06'),
	(4, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 06:49:00', 3, '2025-11-12 01:19:00', '2025-11-12 01:19:00'),
	(5, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 06:49:01', 3, '2025-11-12 01:19:01', '2025-11-12 01:19:01'),
	(6, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 06:50:19', 3, '2025-11-12 01:20:19', '2025-11-12 01:20:19'),
	(7, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 06:50:20', 3, '2025-11-12 01:20:20', '2025-11-12 01:20:20'),
	(8, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 06:54:59', 3, '2025-11-12 01:24:59', '2025-11-12 01:24:59'),
	(9, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 06:58:51', 3, '2025-11-12 01:28:51', '2025-11-12 01:28:51'),
	(10, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 08:17:05', 3, '2025-11-12 02:47:05', '2025-11-12 02:47:05'),
	(11, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 08:18:27', 3, '2025-11-12 02:48:27', '2025-11-12 02:48:27'),
	(12, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 08:21:47', 3, '2025-11-12 02:51:47', '2025-11-12 02:51:47'),
	(13, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 08:24:40', 3, '2025-11-12 02:54:40', '2025-11-12 02:54:40'),
	(14, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 08:27:26', 3, '2025-11-12 02:57:26', '2025-11-12 02:57:26'),
	(15, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 08:30:33', 3, '2025-11-12 03:00:33', '2025-11-12 03:00:33'),
	(16, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 09:20:25', 3, '2025-11-12 03:50:25', '2025-11-12 03:50:25'),
	(17, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 09:34:21', 3, '2025-11-12 04:04:21', '2025-11-12 04:04:21'),
	(18, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 09:35:45', 3, '2025-11-12 04:05:45', '2025-11-12 04:05:45'),
	(19, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 09:37:17', 3, '2025-11-12 04:07:17', '2025-11-12 04:07:17'),
	(20, 'Create', 'Visitors', 'Entry', 'New Visitor added successfully by Entry Manager1 at 2025-11-12 09:50:01', 3, '2025-11-12 04:20:01', '2025-11-12 04:20:01'),
	(21, 'Updated', 'Visitors', 'Entry', 'Visitor Updated successfully by Entry Manager1 at 2025-11-12 09:51:12', 3, '2025-11-12 04:21:12', '2025-11-12 04:21:12'),
	(22, 'Deleted', 'Visitors', 'Entry', 'Visitor (facctou) deleted successfully by Entry Manager1 at 2025-11-12 10:04:09', 3, '2025-11-12 04:34:09', '2025-11-12 04:34:09'),
	(23, 'Updated', 'Visitors', 'Entry', 'Visitor updated successfully by Entry Manager1 at 2025-11-12 10:21:28', 3, '2025-11-12 04:51:28', '2025-11-12 04:51:28'),
	(24, 'Created', 'Vehicle Entry', 'Gate', 'New vehicle entry (Qqmltbajqa) created successfully by Entry Manager1 at 2025-11-12 11:08:17', 3, '2025-11-12 05:38:17', '2025-11-12 05:38:17'),
	(25, 'Updated', 'Vehicle Entry', 'Entry', 'Vehicle entry (Qqmltbajqa) updated successfully by Entry Manager1 at 2025-11-12 11:11:26', 3, '2025-11-12 05:41:26', '2025-11-12 05:41:26'),
	(26, 'Delete', 'Vehicle Entry', 'Entry', 'Vehicle entry (ID: VEH20251112-011) deleted by Entry Manager1 at 2025-11-12 11:12:10', 3, '2025-11-12 05:42:10', '2025-11-12 05:42:10'),
	(27, 'Created', 'Scheduled Entries', 'Entry', 'Scheduled entry (Uttl) created successfully by Entry Manager1 at 2025-11-12 11:41:45', 3, '2025-11-12 06:11:45', '2025-11-12 06:11:45'),
	(28, 'Created', 'Scheduled Entries', 'Entry', 'Scheduled entry (Anrhhinwtswqhi) created successfully by Entry Manager1 at 2025-11-12 12:52:55', 3, '2025-11-12 07:22:55', '2025-11-12 07:22:55'),
	(29, 'Created', 'Scheduled Entries', 'Entry', 'Scheduled entry (Zspvwltii) created successfully by Entry Manager1 at 2025-11-12 12:54:28', 3, '2025-11-12 07:24:28', '2025-11-12 07:24:28'),
	(30, 'Updated', 'Scheduled Entries', 'Entry', 'Visitor pass allowed for (Zspvwltii) by Entry Manager1 at 2025-11-12 13:03:15', 3, '2025-11-12 07:33:15', '2025-11-12 07:33:15'),
	(31, 'Updated', 'Scheduled Entries', 'Entry', 'Visitor pass allowed for (Zspvwltii) by Entry Manager1 at 2025-11-12 13:03:51', 3, '2025-11-12 07:33:51', '2025-11-12 07:33:51'),
	(32, 'Updated', 'Scheduled Entries', 'Entry', 'Visitor pass allowed for (Zspvwltii) by Entry Manager1 at 2025-11-12 13:04:43', 3, '2025-11-12 07:34:43', '2025-11-12 07:34:43'),
	(33, 'Create', 'Purchase Request', 'Procurement', 'New Purchase Request (REQ016) for 45 created by Entry Manager1 at 2025-11-13 05:58:23', 3, '2025-11-13 00:28:23', '2025-11-13 00:28:23'),
	(34, 'Update', 'Purchase Request Status', 'Procurement', 'Purchase Request (REQ016) status changed from Pending to Completed by Entry Manager1 at 2025-11-13 06:01:17', 3, '2025-11-13 00:31:17', '2025-11-13 00:31:17'),
	(35, 'Update', 'Purchase Request', 'Procurement', 'Purchase Request (REQ013) updated by Entry Manager1 at 2025-11-13 06:10:05. Changes: Required date changed from \'1998-04-12 00:00:00\' to \'1998-04-12\'', 3, '2025-11-13 00:40:05', '2025-11-13 00:40:05'),
	(36, 'Update', 'Purchase Request', 'Procurement', 'Purchase Request (REQ016) updated by Entry Manager1 at 2025-11-13 06:10:42. Changes: Required date changed from \'1991-10-12 00:00:00\' to \'1991-10-12\', Description changed from \'de\' to \'deas\'', 3, '2025-11-13 00:40:42', '2025-11-13 00:40:42'),
	(37, 'Update', 'Purchase Request', 'Entry', 'Purchase Request (REQ014) updated by Entry Manager1 at 2025-11-13 06:14:10. Changes: Required date changed from \'1941-08-25 00:00:00\' to \'1941-08-25\', Description changed from \'Ic bemidku zuw conohih zimiso varmemza jus rizo ek asjocuda calmon norli etonariw peragko. Bikka oveseddu kako piraliw mug zo foz huz pu negowe nu laf fu ipuefo zoppizcup nukcizo fijo zesvam. Ru ral zozjev lekolag faadoga ufo imigorsiz fu lamumo uvetofij nu zazvuktu riret woap sanzej tu mem igina. Vaivazek jovkug muzu wa mozso zif je\' to \'Ic bemidku zuw conohih zimiso varmemza jus rizo ek asjo\'', 3, '2025-11-13 00:44:10', '2025-11-13 00:44:10'),
	(38, 'Delete', 'Purchase Request', 'Entry', 'Purchase Request (REQ013) for material "Xmtfi" deleted by Entry Manager1 at 2025-11-13 06:14:49', 3, '2025-11-13 00:44:49', '2025-11-13 00:44:49'),
	(39, 'Delete', 'Purchase Request', 'Entry', 'Purchase Request (REQ011) for material "Kppgxpjovq" deleted by Entry Manager1 at 2025-11-13 06:20:47', 3, '2025-11-13 00:50:47', '2025-11-13 00:50:47');

-- Dumping structure for table globe_assist.regal_products
CREATE TABLE IF NOT EXISTS `regal_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_type_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit_id` bigint unsigned DEFAULT NULL,
  `material_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_length` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_width` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regal_products_product_id_unique` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.regal_products: ~1 rows (approximately)
INSERT INTO `regal_products` (`id`, `product_id`, `product_image`, `product_name_id`, `product_name_type_id`, `qty`, `unit_id`, `material_id`, `size_length`, `size_width`, `product_description`, `created_at`, `updated_at`) VALUES
	(1, 'PROD20251027-018', 'products/YMOhQqcv887e0SCBkyF6glN1NUNUXKmcf9CEW3dG.png', '1', 'TYP20251027-668', 10, 1, '3', '10', '15', 'polywe', '2025-10-27 04:19:21', '2025-10-27 04:19:39');

-- Dumping structure for table globe_assist.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `permissions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.roles: ~0 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'content_manager', 'Content Manager', 'Et fugit reiciendis', 'inactive', '["add_products", "edit_products", "view_orders", "process_orders"]', '2025-10-29 06:02:09', '2025-10-29 06:02:09');

-- Dumping structure for table globe_assist.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table globe_assist.rounds
CREATE TABLE IF NOT EXISTS `rounds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.rounds: ~1 rows (approximately)
INSERT INTO `rounds` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'technical round', '2025-10-17 01:40:45', '2025-10-17 01:40:45');

-- Dumping structure for table globe_assist.sales2_customers
CREATE TABLE IF NOT EXISTS `sales2_customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` enum('Individual','Company') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'India',
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_category` enum('Regular','Wholesale','Retail','Distributor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` enum('Cash on Delivery','7 Days Credit','15 Days Credit','30 Days Credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales2_customers_customer_id_unique` (`customer_id`),
  UNIQUE KEY `sales2_customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales2_customers: ~8 rows (approximately)
INSERT INTO `sales2_customers` (`id`, `customer_id`, `customer_type`, `contact_person_name`, `full_name`, `company`, `email`, `phone`, `alternate_phone`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`, `gst_number`, `customer_category`, `payment_terms`, `status`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 'CUST20250001', 'Individual', 'demo bmdu', 'demo', NULL, 'demobmdu@gmail.com', '8451236957', '8754123695`', 'new delhi', 'new dehi', 'delhi', 'nodia', '852145', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'demo', '2025-10-31 05:49:52', '2025-10-31 05:49:52'),
	(2, 'CUST20250002', 'Individual', NULL, 'Voybgufy', NULL, 'we@ribbipru.be', 'Zvtzeqstliecq', 'Dvtfpn', 'Uqqk', 'Jluhfpnnhdysh', 'Zot', 'Exlusd', 'Jeyvcgszcdp', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'Gognemal wubmaziw segmar ba loteba barve talahig', '2025-10-31 05:51:43', '2025-10-31 06:17:58'),
	(3, 'CUST20250003', 'Individual', NULL, 'demo', NULL, 'store@gmail.com', '8451236957', '8754123695`', 'new delhi', NULL, 'delhi', 'nodia', '10089', 'India', NULL, 'Wholesale', '7 Days Credit', 'Active', NULL, '2025-10-31 05:53:02', '2025-10-31 05:53:02'),
	(4, 'CUST20250004', 'Company', 'Eq', 'Liyys', 'Fgxoakuvt', 'wed@heowala.tg', 'Qrpuyti', 'Kp', 'Qnu', 'Kaffmissnsfbn', 'Hcispeofujhmo', 'K', 'Jwjgwepeigqljy', 'India', 'Hlzzar', 'Regular', 'Cash on Delivery', 'Active', 'Zucufgav vo nozipu ujegefbe za taivo ho upatak lobhagzi novpicru meespoc', '2025-10-31 05:54:22', '2025-10-31 05:54:22'),
	(5, 'CUST20250005', 'Company', 'Sxg', 'If', 'Oyf', 'cikumo@bourhi.np', 'Bzxsukfr', 'Aqtt', 'Qai', 'Meiddqy', 'K', 'Vj', 'Ovzchgaviduxk', 'India', 'Xwaeuy', 'Regular', 'Cash on Delivery', 'Active', 'Pa poimico afir cunapgeh ne cukivri wi usa cugju daej kijogbow medvem zeob ebo wero oduno. Co dirwe bilkibme ug raporina siavi raon ozerin fodozta zucev icaephug tap fog ojicilat revjal ice ciakle zihsu. Bignomza aretevbe datlo muhdelzo kotid p', '2025-10-31 05:55:57', '2025-10-31 05:55:57'),
	(6, 'CUST20250006', 'Company', 'Nbvtpurfuejjpkr', 'Pbsfimzyj', 'Ruw', 'tel@cohgin.su', 'Txkowlobo', 'Qzhtfreqneakjeb', 'Lawxqnascjkemu', 'Mpml', 'Arullbicksq', 'Czw', 'Coyryjgztvp', 'India', 'Bmfqgigdrfzb', 'Regular', 'Cash on Delivery', 'Active', 'Ma delbozu pozvulgez tihiuju zodisco curi defekop oh haleko gohrek wagfobe kaes dupubkuk we fe. Muv kul zurucbuf wozjumwo jiga mealo sawih patut ki nuheadu oz zeupitu hifiz bobrud ger. Fugiwhop ato katefi ficakoh doofidi moaj vuopicu pi logavi denumoc oma ehi racof kopupon cu verum ihwuhfe. Elwi cavapse eccomzum ow ezo infiter umu buse pa coguma moosewoc vipi si po zopkizpe gojome warhic. Va pu umu kipacla gukdeat habur ofu he hate ekuujomeg fu', '2025-10-31 05:57:17', '2025-10-31 05:57:17'),
	(7, 'CUST20250007', 'Individual', 'Dzste', 'J', NULL, 'hilfoefi@to.cu', 'Fexxt', 'Ziylq', 'Nka', 'Ziwwlljfm', 'Tcrnqhmsc', 'Iut', 'Br', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'Lujenu fij fulijol epawimom nuz nipi ki did gohda lijviimo vife soipu ref odsom. Cehaj de itter noloso tezuh ewe dec epuve felavoik jigeg go binfafwu tadtojdi hij zozbo. Tir sulon wej din lodfacsi moneliaf kikakehe jad huj cetvucmo cana eso papbud re wu. Sol cib ba jibpici pebfe ha su cul mema awpo eza behatub ehlal re bafudobe vonor. Zihna do fudapke di rudfuva ke on secdoce sukoec pos ke talvildow osaafa fugurniz loli koizi', '2025-10-31 05:59:55', '2025-10-31 05:59:55'),
	(8, 'CUST20250008', 'Individual', NULL, 'Mneapaq', NULL, 'urinke@vinrofra.uz', 'Mqarjrwzrvneits', 'Uyxzlfeukozdpkj', 'Uxnqw', 'Ervnwqjbglrkmu', 'Cfuanfuz', 'Ok', 'Wyemfo', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'Gibsafse gebaseh wosdu len caatoze fozwapep felec wofe eteradumo welidot kato ajulolan egi. Pawnoljo zowuze ocner tifanmij val jigim ah ufokim afa opu gozaw ko cacusi cetzo jav ughug urutuh. Ofovocze gamu uhdo givawusup oftuc mabeow zutguwtor emetole pe copof bihicza gedeni pafewdo luisda cudikasor. Runophi locijouj tizjofni jafil iso siz bodmo jobous za kaihalen liov in elewultep gahicsam tujiwe rib uridi', '2025-11-02 23:22:37', '2025-11-02 23:23:06');

-- Dumping structure for table globe_assist.sales2_pof_leads
CREATE TABLE IF NOT EXISTS `sales2_pof_leads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `roll_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_width` int DEFAULT NULL,
  `roll_weight` int DEFAULT NULL,
  `roll_length` int DEFAULT NULL,
  `product_type` enum('POF Shrink Film','Cross-linked POF Shrink Films','Opaque Shrink Films - POF','Biodegradable POF Shrink Film','Printed POF Shrink Films') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `printing` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lamination` enum('Laminated','Non-Laminated') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_source` enum('Website','Referral','Cold Call','Social Media','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('New','Interested','Converted','In Progress','Follow Up','Lost') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales2_pof_leads_lead_id_unique` (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales2_pof_leads: ~4 rows (approximately)
INSERT INTO `sales2_pof_leads` (`id`, `lead_id`, `company_name`, `customer_name`, `email`, `contact_number`, `thickness`, `quantity`, `roll_no`, `roll_width`, `roll_weight`, `roll_length`, `product_type`, `printing`, `lamination`, `lead_source`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
	(1, 'LEAD20251103-001', 'Hczxpsdxzny', 'Eceqdpzpekzk', 'namejas@opse.mu', '8759315498', NULL, 135, 'Ynf', 24, 94, 9, 'Printed POF Shrink Films', 'Yes', 'Laminated', 'Website', 'New', 'Durtu leku noca ubijo ubhep wapaoti muc na fasi foc rifpifjer usa aroew ew tugnoar.', '2025-11-02 23:49:24', '2025-11-02 23:49:24'),
	(2, 'LEAD20251103-002', 'Yktmudocsrkmehz', 'Afculscq', 'atzuvlo@gugozon.np', '8759315498', NULL, 218, 'Fhfy', 8, 69, 282, 'Biodegradable POF Shrink Film', 'No', 'Laminated', 'Social Media', 'New', 'Buhigi parwojaso cub nipazcov ajuagarig zogsece veb ces ro cudtuha lekokaj zofo aj porruh. Tekidnib evenaoho seneljan', '2025-11-02 23:50:24', '2025-11-02 23:50:24'),
	(3, 'LEAD20251103-003', 'Fhaxq', 'Crfps allo', 'wimi@inuzipu.za', '8759315498', NULL, 56, 'Dhytkwxdiru', 20, 212, 208, 'Printed POF Shrink Films', 'No', 'Non-Laminated', 'Social Media', 'New', 'Mi maek japolger kedilko pigi ujuvo sawza vah fe arake egwame omzupon bohacpor roki am div. Mutak tiwko', '2025-11-02 23:51:29', '2025-11-02 23:54:00'),
	(4, 'LEAD20251103-004', 'Sbmrtnp', 'Hofujshctyvv artu', 'benkuluh@nuege.vi', '8451203691', NULL, 392, '51236974', 30, 168, 370, 'Cross-linked POF Shrink Films', 'No', 'Laminated', 'Referral', 'New', 'Emeote ciini maddit jemamduk feow nah jot pufehi alhur orafecpot', '2025-11-03 00:24:14', '2025-11-03 00:24:14');

-- Dumping structure for table globe_assist.sales2_pof_new_sale_customers
CREATE TABLE IF NOT EXISTS `sales2_pof_new_sale_customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `new_sale_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_printed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance_due` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_notes` text COLLATE utf8mb4_unicode_ci,
  `delivery_date` date DEFAULT NULL,
  `delivery_notes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales2_pof_new_sale_customers_new_sale_id_unique` (`new_sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales2_pof_new_sale_customers: ~2 rows (approximately)
INSERT INTO `sales2_pof_new_sale_customers` (`id`, `new_sale_id`, `customer_id`, `is_printed`, `final_amount`, `payment_method`, `amount_paid`, `balance_due`, `payment_notes`, `delivery_date`, `delivery_notes`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'SALE0001', 'CUST20250003', 'No', 10632.00, 'Cash', 148.00, 10484.00, 'Kxlvkbitan', NULL, NULL, 'Pending', '2025-11-03 00:47:53', '2025-11-07 04:43:15'),
	(4, 'SALE0002', 'CUST20250004', 'No', 325.00, 'Cash', 10.00, 315.00, '10', NULL, NULL, 'Pending', '2025-11-03 01:14:11', '2025-11-03 01:14:11');

-- Dumping structure for table globe_assist.sales2_pof_new_sale_products
CREATE TABLE IF NOT EXISTS `sales2_pof_new_sale_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `dispatch` int DEFAULT NULL,
  `balance` int DEFAULT NULL,
  `total_inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `pof_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `date_of_dispatch` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales2_pof_new_sale_products: ~3 rows (approximately)
INSERT INTO `sales2_pof_new_sale_products` (`id`, `sale_id`, `brand`, `product_type`, `size`, `thickness`, `meter`, `quantity`, `unit_price`, `total_amount`, `date`, `dispatch`, `balance`, `total_inch`, `remark`, `pof_status`, `date_of_dispatch`, `created_at`, `updated_at`) VALUES
	(3, 'SALE0002', 'avcr', 'Cross-linked POF Shrink Films', '10', '10', '10', 10, 10.00, 100.00, '2025-10-20', 10, 10, '10', '10', 'Pending', '2025-10-20', '2025-11-03 01:14:11', '2025-11-03 01:14:11'),
	(4, 'SALE0002', 'avcr', 'POF Shrink Film', '10', '274', '15', 15, 15.00, 225.00, '2025-12-15', 15, 15, '15', '15', 'Pending', '2025-12-15', '2025-11-03 01:14:11', '2025-11-03 01:14:11'),
	(7, 'SALE0001', 'Dupbkmrrb', 'POF Shrink Film', 'Thknwyrsflvdown', '274', '486', 2658, 4.00, 10632.00, '2012-08-23', 451, 2207, '0', 'Wvliwtupqipl', 'Pending', '2012-08-23', '2025-11-07 04:43:15', '2025-11-07 04:43:15');

-- Dumping structure for table globe_assist.sales2_pof_thicknesses
CREATE TABLE IF NOT EXISTS `sales2_pof_thicknesses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `specification_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` int DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales2_pof_thicknesses: ~7 rows (approximately)
INSERT INTO `sales2_pof_thicknesses` (`id`, `specification_name`, `thickness`, `remarks`, `created_at`, `updated_at`) VALUES
	(1, 'Zqxtpb', 274, 'Fauje wuvgiseb mewevoam wig ofisawaz caro lika ovezijwi mu havigrik nasod ofoteb oku joh no. Befogta huszahut tugobfin ab juirafe lazdeip luw bik gejij ibuusezu pawu seminwoh ubro. Avicek taz con ibipi di guuduoga pepabpip ranofe we giho re hivnos lel ro. Gehciew vikenid kifpugik tezgekcod ip jefunsah sevwo jejehe ribirew vuz bewvi uke vuzni fapgez tuki bag. Wujtaene boj lu gi av damire guvmucul hote fidon omevew nep eme ruvrehe rov. Ra dofew cavohek umo zezvah but sofoz borep hik', '2025-10-31 07:42:46', '2025-11-02 23:42:50'),
	(2, 'demo', 10, 'cewqfm', '2025-10-31 07:53:00', '2025-10-31 07:53:00'),
	(4, 'Ycq', 426, 'Zawbohok dojnu titti ujoladhac fahfobin keji bofeji bef nokaj rel welog hazgiztem wufofcoc ju kijkeg. Mespe bub se ugeuk sur he buznohmej feze rezufusa ozuv odavapeg ig sem dev sasud zaosmu wa. Vicurcij efa vur himculca koem miflapez meb cilel ikeoni ap jo bumumwi falpuli ewitusmuc olpo. Ubpuvho zucal pake bulhi uz juvzippa pe ici joufosiv igonujjaz zawil uv be pihab. Uwukehod routoco uli ucuisku laekez', '2025-11-02 23:42:35', '2025-11-02 23:42:35'),
	(5, 'Zddljkxstncz', 168, 'Sahajun pijker kuf cebvube suhon tajje acohuhir', '2025-11-02 23:48:31', '2025-11-02 23:48:31'),
	(6, 'affle', 10, 'Goj kifokidus ilosoz cin ibiwi ofahe mogile hijjelgo nijkescev wo poikji ziovucu zakper ospehpul uguneske dig. Vet wewjizof ujoud imu unigaznoc rokutuc eni giz waffuk deb osga uthoj vu voblos co', '2025-11-03 04:16:51', '2025-11-03 04:16:51'),
	(7, 'demo', 59, 'demo', '2025-11-03 04:23:52', '2025-11-03 04:23:52'),
	(8, 'rejq', 58, 'demo', '2025-11-03 04:29:08', '2025-11-03 04:29:08');

-- Dumping structure for table globe_assist.sales_bopp_leads
CREATE TABLE IF NOT EXISTS `sales_bopp_leads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bag_type` enum('BOPP Bag','PP Woven Bag','Laminated Bag') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handle_type` enum('D-Cut','W-Cut','Loop Handle','Without Handle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_quality` enum('PP Woven','Non-Woven','Laminated') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_type` enum('Glossy','Matte') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_qty` int DEFAULT NULL,
  `size_inches` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `printing` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_source` enum('Website','Referral','Cold Call','Social Media','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` enum('Hot','Warm','Cold') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('New','Interested','Converted','In Progress','Follow Up','Lost') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_bopp_leads_lead_id_unique` (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales_bopp_leads: ~1 rows (approximately)
INSERT INTO `sales_bopp_leads` (`id`, `lead_id`, `company_name`, `customer_name`, `email`, `contact_number`, `bag_type`, `handle_type`, `thickness`, `fabric_quality`, `fabric_type`, `required_qty`, `size_inches`, `printing`, `lead_source`, `grade`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
	(1, 'LEAD20251029-001', 'Propmind wert', 'Vypwwqwijweshut', 'omaare@gavavesu.gg', 'Ogpbgiwdzzr', 'PP Woven Bag', 'W-Cut', 'Rug', 'Non-Woven', 'Glossy', 228, 'Vok', 'Yes', 'Other', 'Cold', 'New', 'Vocit fij ho ruren wumow efki poufli juepikeh faewfo doawvas vizguba bilir fawkav far jothedvi huzcuvaw jeha. Aw cukimde zaf buvhefuf gacu se voraf elhulo dus faziv igmi hijkunej kiwev kik nu liifa. Vuc ocuite vasujiw few enihem fasebizu bugjefu pamiuse cef bijdohbuz nucpu punom. Ihfev tene acuawu pisculhat vepuv tad dimi ilok lec waaha kugmu zagoci. Okinemici go etanu wovhuv ojabegdil apotu mo anke jolumru niwezr', '2025-10-29 02:26:57', '2025-10-29 02:28:05');

-- Dumping structure for table globe_assist.sales_bopp_new_sale_customers
CREATE TABLE IF NOT EXISTS `sales_bopp_new_sale_customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `new_sale_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_printed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` decimal(12,2) DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` decimal(12,2) NOT NULL DEFAULT '0.00',
  `balance_due` decimal(12,2) NOT NULL DEFAULT '0.00',
  `payment_notes` text COLLATE utf8mb4_unicode_ci,
  `delivery_date` date DEFAULT NULL,
  `delivery_notes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales_bopp_new_sale_customers: ~6 rows (approximately)
INSERT INTO `sales_bopp_new_sale_customers` (`id`, `new_sale_id`, `customer_id`, `is_printed`, `final_amount`, `payment_method`, `amount_paid`, `balance_due`, `payment_notes`, `delivery_date`, `delivery_notes`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'SALE0001', 'CUST20250001', 'No', 100076.00, 'Cash', 218.00, 99858.00, 'Rmzr', NULL, NULL, 'Pending', '2025-10-29 05:09:15', '2025-10-29 06:34:59'),
	(3, 'SALE0002', 'CUST20250004', 'No', 7775.00, 'Cash', 20.00, 7755.00, 'Z', NULL, NULL, 'Pending', '2025-10-29 05:17:41', '2025-10-29 05:17:41'),
	(4, 'SALE0003', 'CUST20250002', 'No', 126266.00, 'Cash', 335.00, 125931.00, 'Cncqknddw', NULL, NULL, 'Pending', '2025-10-29 05:48:15', '2025-10-29 05:48:15'),
	(5, 'SALE0004', 'CUST20250004', 'No', 65395.00, 'Cash', 207.00, 65188.00, 'Oemgogjttqrp', NULL, NULL, 'Pending', '2025-10-29 06:30:51', '2025-10-29 06:30:51'),
	(6, 'SALE0005', 'CUST20250002', 'No', 100716.00, 'Cash', 468.00, 100248.00, 'Nhyyaz', NULL, NULL, 'Pending', '2025-10-29 06:32:34', '2025-10-29 06:32:34'),
	(7, 'SALE0006', 'CUST20250002', 'No', 147138.00, 'Cash', 3383.00, 143755.00, 'Ivneoijstlba', NULL, NULL, 'Pending', '2025-10-30 07:47:43', '2025-11-10 07:15:23');

-- Dumping structure for table globe_assist.sales_bopp_new_sale_products
CREATE TABLE IF NOT EXISTS `sales_bopp_new_sale_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_quality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `unit_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `dispatch` int DEFAULT NULL,
  `balance` int DEFAULT NULL,
  `fabric_req` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bopp_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_dispatch` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales_bopp_new_sale_products: ~6 rows (approximately)
INSERT INTO `sales_bopp_new_sale_products` (`id`, `sale_id`, `brand`, `bag`, `handle`, `fabric_quality`, `fabric_type`, `count`, `width`, `cl`, `gsm`, `quantity`, `unit_price`, `total_amount`, `dispatch`, `balance`, `fabric_req`, `fabric_status`, `bopp_status`, `date_of_dispatch`, `created_at`, `updated_at`) VALUES
	(2, 'SALE0002', 'Nnxv', 'Loop Handle', 'Long', 'Standard', 'BOPP', 169, 'Yftnnxx', 'Czt', 'Yaokjntlct', 311, 25.00, 7775.00, 29, 78, 'Iwhcqxcoqwywnti', 'Pending', 'Pending', '1966-12-11', '2025-10-29 05:17:41', '2025-10-29 05:17:41'),
	(4, 'SALE0003', 'Cisyuzv', 'W-Cut', 'Short', 'Premium', 'PP', 459, 'Uvahbpgtuzsrsu', 'Afrh', 'Xksfczefmn', 311, 406.00, 126266.00, 290, 180, 'M', 'Pending', 'Pending', '2001-12-11', '2025-10-29 05:48:15', '2025-10-29 05:48:15'),
	(5, 'SALE0004', 'Oxupyrbmlofdvy', 'Box Bag', 'None', 'Standard', 'PP', 444, 'Egkaqtyn', 'Qgekllcymx', 'Izsnijiwx', 145, 451.00, 65395.00, 211, 470, 'Zvb', 'Pending', 'Pending', '1944-11-27', '2025-10-29 06:30:51', '2025-10-29 06:30:51'),
	(6, 'SALE0005', 'Bnyexpabf', 'D-Cut', 'None', 'Premium', 'PP', 473, 'Urqv', 'F', 'Tytjyuwx', 436, 231.00, 100716.00, 263, 180, 'M', 'Pending', 'Pending', '1941-11-30', '2025-10-29 06:32:34', '2025-10-29 06:32:34'),
	(7, 'SALE0001', 'Taiej  werm', 'W-Cut', 'None', 'Standard', 'PP', 251, 'Zoim', 'Thbxqsttsayr', 'Spdjjegffibkil', 394, 254.00, 100076.00, 176, 466, 'Wrtlbh', 'Pending', 'Pending', '1963-03-09', '2025-10-29 06:34:59', '2025-10-29 06:34:59'),
	(11, 'SALE0006', 'Rjeoj', 'Loop Handle', 'Long', 'Standard', 'Non-Woven', 311, 'Gryzwq', 'Mfzometeuproh', 'Ghgunetgqoygywi', 358, 411.00, 147138.00, 105, 22, 'Djcq', 'Pending', 'Pending', '1967-05-28', '2025-11-10 07:15:23', '2025-11-10 07:15:23');

-- Dumping structure for table globe_assist.sales_customers
CREATE TABLE IF NOT EXISTS `sales_customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` enum('Individual','Company') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'India',
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_category` enum('Regular','Wholesale','Retail','Distributor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` enum('Cash on Delivery','7 Days Credit','15 Days Credit','30 Days Credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_customers_customer_id_unique` (`customer_id`),
  UNIQUE KEY `sales_customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sales_customers: ~5 rows (approximately)
INSERT INTO `sales_customers` (`id`, `customer_id`, `customer_type`, `contact_person_name`, `full_name`, `company`, `email`, `phone`, `alternate_phone`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`, `gst_number`, `customer_category`, `payment_terms`, `status`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 'CUST20250001', 'Individual', 'delaware delhi', 'demoqwe', NULL, 'demosfaa@gmail.com', '8451236957', '8754123695`', 'new delhi', 'new dehi', 'delhi', 'nodia', '82369', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'demo', '2025-10-29 00:29:55', '2025-10-29 00:41:46'),
	(2, 'CUST20250002', 'Company', 'Kjdplpwekaz', 'Tyeiogiveoattr', 'Te', 'vutechu@ga.py', '8451236957', 'Kwkizx', 'Mtexztfwakahf', 'Xzeumznsenumhmb', 'Qomegtlgkzwqu', 'Nl', 'Nkrxdqi', 'India', 'T', 'Regular', 'Cash on Delivery', 'Active', 'Zotfasuc kesu cuziliz olutof revunoko suhep tor mouhke nu hebgapeg uh dorob ku he banoni odweofo rojub. Aloono maute cibne kokna asroifo cac zudoro samtohu numiw tevovbo ucuteskef ufe uvnebko ihego idi. Di hedjor pir pud', '2025-10-29 00:36:33', '2025-10-29 00:36:33'),
	(3, 'CUST20250003', 'Individual', 'Wop', 'J', NULL, 'kavzimo@caluip.sz', '8451236957', '8457511518', 'Yegsursoyezvevf', 'Rjnbgjnkganqd', 'Okdpee', 'Zppcetxbxt', 'Yysb', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'Suzira aj ivimehe uwro demtir suebu tazug be advu tizsu joruv tedbed esu hu fazenma. Puc rog bi fenjehal ni buc gozuwifi mukada ku vike az', '2025-10-29 00:48:17', '2025-10-29 00:48:17'),
	(4, 'CUST20250004', 'Company', 'Lqwcaq', 'Wgf', 'Apjytwnbk', 'kef@be.lt', 'Xmtna', '8457511518', 'Gy', 'Omc', 'Mckg', 'O', 'Zcrhqnejqyyd', 'India', 'Vfttkopzugnatxp', 'Regular', 'Cash on Delivery', 'Active', 'Ses hijoruv gu balju wajenibav uko nil ozsil si ter zerlira rufmavaz. Nu ruvido ta ciw fis ka jodwozdu aspus veacolo ozjahu uceawuhu bos sunuk uvodi rufsi lumzitosi beebe nublaj. Mepmavo ezu woz ube eki desuja nissusu fenwo jiwducvad jaur icrawir rila. Nuaftib ponodi uv zuwcut run wohi ujitowon wojevfuv tovguc nekcose omuneuh ho bu', '2025-10-29 00:49:45', '2025-10-29 00:49:45'),
	(5, 'CUST20250005', 'Individual', 'Jl', 'Tkveialu sdeds', NULL, 'igibirud@cez.es', 'Dsaov', 'Tmmfrswxszk', 'Qraic', 'Odxyqhzqd', 'Ydvpe', 'Pkykkhyvmkt', 'Ypef', 'India', NULL, 'Regular', 'Cash on Delivery', 'Active', 'Conbabiv zeapiber poggifvot zen coffiso ecjafuv kizuvgo gigke woz juceh uwi beakipuh ohicuh. Ca uv zehu mubkuhec ajo zan wohapi cavebod zad rokid tablana cemuruv ohe guav rota. Dep pezun un fudo miwusat abib coec utciddo ipoowdos pufpiwwe mepom nat le. En tinre ur wukwem suk nosewu pi rija jumota sufahreb zescos botedu vebjijwid fuppogvo wujnuv junlud. Vabuzsit lafma kov za duwuziuwe vujer', '2025-10-29 00:50:12', '2025-10-29 00:50:12');

-- Dumping structure for table globe_assist.scheduled_entries
CREATE TABLE IF NOT EXISTS `scheduled_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VST-SCH-001',
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_type` enum('Vendor','Customer','Inspector','Interviewee','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_of_visit` enum('Pickup','Delivery','Meeting','Inspection','Interview','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_date` date NOT NULL,
  `estimated_time` time DEFAULT NULL,
  `exact_entry_time` time DEFAULT NULL,
  `exact_exit_time` time DEFAULT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint DEFAULT NULL,
  `last_updated` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.scheduled_entries: ~6 rows (approximately)
INSERT INTO `scheduled_entries` (`id`, `visitor_id`, `pass_id`, `name`, `number`, `visit_code`, `company_name`, `visitor_type`, `purpose_of_visit`, `scheduled_date`, `estimated_time`, `exact_entry_time`, `exact_exit_time`, `vehicle_number`, `scheduled_by`, `allowed`, `created_by`, `last_updated`, `created_at`, `updated_at`) VALUES
	(1, 'VIS20251018001', 'GATEPASS20251018-001', 'Jazdsywfo', '4492158099', 'VST-SCH-001', 'U', 'Interviewee', 'Meeting', '2013-04-06', '10:15:00', '10:16:00', '10:50:00', 'Tmy', 'Jzldvjbfoxhl', 'Yes', NULL, NULL, '2025-10-18 02:43:51', '2025-10-23 05:44:23'),
	(2, 'VIS20251018002', 'GATEPASS20251018-002', 'Jefcpr', '2326626100', 'VST-SCH-001', 'Ludb', 'Inspector', 'Inspection', '2009-11-06', '10:12:00', '10:13:00', '10:40:00', 'Uistlmxsmremau', 'Kzdm', 'Yes', NULL, NULL, '2025-10-18 02:48:17', '2025-10-24 05:34:43'),
	(3, 'VIS20251024003', 'GATEPASS20251024-003', 'Rmqezr', '4732212416', 'VST-SCH-001', 'Xcj', 'Customer', 'Inspection', '2012-06-29', '10:15:00', NULL, NULL, 'Ns', 'Cxik', 'No', NULL, NULL, '2025-10-24 05:38:23', '2025-10-24 05:38:23'),
	(4, 'VIS20251112004', 'GATEPASS20251112-004', 'Uttl', '8754596321', 'VST-SCH-001', 'Thnrjbql', 'Vendor', 'Meeting', '2025-09-28', '15:18:00', '05:18:00', NULL, 'E', 'Uvhg', 'Yes', 3, 3, '2025-11-12 06:11:45', '2025-11-12 07:19:17'),
	(5, 'VIS20251112005', 'GATEPASS20251112-005', 'Anrhhinwtswqhi', '3229308888', 'VST-SCH-001', 'Jnxtigmcbd', 'Inspector', 'Meeting', '1940-08-11', '10:25:00', '05:05:00', NULL, 'Dymwvvhmefxrhy', 'Oga', 'Yes', 3, 39, '2025-11-12 07:22:55', '2025-11-12 07:26:58'),
	(6, 'VIS20251112006', 'GATEPASS20251112-006', 'Zspvwltii', '6583611269', 'VST-SCH-001', 'Dst', 'Vendor', 'Meeting', '2025-02-03', '10:26:00', '00:52:00', NULL, 'K', 'Klcaqkiieia', 'Yes', 3, 3, '2025-11-12 07:24:28', '2025-11-12 07:34:43');

-- Dumping structure for table globe_assist.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('O2DxLBpcYBeePafJ06uD1l8aXuPBar9xCrf1iEVw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWNmUVBUUE9NRFRra012eDBBeWFmS2k3RU5INFk5bzZMUW9oM25RNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768223667);

-- Dumping structure for table globe_assist.stages
CREATE TABLE IF NOT EXISTS `stages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stages_stage_id_unique` (`stage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.stages: ~2 rows (approximately)
INSERT INTO `stages` (`id`, `stage_id`, `stage_name`, `created_at`, `updated_at`) VALUES
	(1, 'STG001', 'delhi', '2025-11-10 06:13:17', '2025-11-10 06:13:17'),
	(2, 'STG002', 'noida', '2025-11-10 06:20:10', '2025-11-10 06:20:10');

-- Dumping structure for table globe_assist.store_locations
CREATE TABLE IF NOT EXISTS `store_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_locations_location_id_unique` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.store_locations: ~2 rows (approximately)
INSERT INTO `store_locations` (`id`, `location_id`, `location_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'LOC001', 'noidaa', 'noida sec 595', '2025-10-23 01:02:32', '2025-10-24 07:30:08'),
	(3, 'LOC002', 'Arya', 'Arya Nagar', '2025-10-24 07:30:25', '2025-10-24 07:30:25');

-- Dumping structure for table globe_assist.store_names
CREATE TABLE IF NOT EXISTS `store_names` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_names_store_name_id_unique` (`store_name_id`),
  KEY `store_names_store_type_id_foreign` (`store_type_id`),
  KEY `store_names_location_id_foreign` (`location_id`),
  CONSTRAINT `store_names_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `store_locations` (`location_id`) ON DELETE CASCADE,
  CONSTRAINT `store_names_store_type_id_foreign` FOREIGN KEY (`store_type_id`) REFERENCES `store_types` (`store_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.store_names: ~2 rows (approximately)
INSERT INTO `store_names` (`id`, `store_name_id`, `store_name`, `store_type_id`, `location_id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'STO001', 'sameer fabrication', 'STYPE004', 'LOC001', 'all types of fabrics are available', '2025-10-23 01:14:49', '2025-10-23 01:14:49'),
	(3, 'STO002', 'venar apaq', 'STYPE003', 'LOC001', 'naca', '2025-10-24 07:45:58', '2025-10-24 07:46:10');

-- Dumping structure for table globe_assist.store_racks
CREATE TABLE IF NOT EXISTS `store_racks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_rack_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_rack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_racks_store_rack_id_unique` (`store_rack_id`),
  KEY `store_racks_store_name_id_foreign` (`store_name_id`),
  KEY `store_racks_store_type_id_foreign` (`store_type_id`),
  KEY `store_racks_location_id_foreign` (`location_id`),
  CONSTRAINT `store_racks_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `store_locations` (`location_id`) ON DELETE CASCADE,
  CONSTRAINT `store_racks_store_name_id_foreign` FOREIGN KEY (`store_name_id`) REFERENCES `store_names` (`store_name_id`) ON DELETE CASCADE,
  CONSTRAINT `store_racks_store_type_id_foreign` FOREIGN KEY (`store_type_id`) REFERENCES `store_types` (`store_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.store_racks: ~3 rows (approximately)
INSERT INTO `store_racks` (`id`, `store_rack_id`, `store_rack_name`, `store_name_id`, `store_type_id`, `location_id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'SRACK001', 'demo rack1', 'STO001', 'STYPE003', 'LOC001', 'newa', '2025-10-23 01:31:03', '2025-10-23 01:31:03'),
	(2, 'SRACK002', 'demo rack2sf', 'STO001', 'STYPE005', 'LOC001', 'sdfasf', '2025-10-23 01:31:36', '2025-10-23 01:31:50'),
	(3, 'SRACK003', 'semaerp', 'STO001', 'STYPE001', 'LOC001', 'noidoa', '2025-10-24 07:52:50', '2025-10-24 07:52:50');

-- Dumping structure for table globe_assist.store_slaps
CREATE TABLE IF NOT EXISTS `store_slaps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_slap_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_slap_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_rack_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_slaps_store_slap_id_unique` (`store_slap_id`),
  KEY `store_slaps_store_name_id_foreign` (`store_name_id`),
  KEY `store_slaps_store_type_id_foreign` (`store_type_id`),
  KEY `store_slaps_store_rack_id_foreign` (`store_rack_id`),
  KEY `store_slaps_location_id_foreign` (`location_id`),
  CONSTRAINT `store_slaps_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `store_locations` (`location_id`) ON DELETE CASCADE,
  CONSTRAINT `store_slaps_store_name_id_foreign` FOREIGN KEY (`store_name_id`) REFERENCES `store_names` (`store_name_id`) ON DELETE CASCADE,
  CONSTRAINT `store_slaps_store_rack_id_foreign` FOREIGN KEY (`store_rack_id`) REFERENCES `store_racks` (`store_rack_id`) ON DELETE CASCADE,
  CONSTRAINT `store_slaps_store_type_id_foreign` FOREIGN KEY (`store_type_id`) REFERENCES `store_types` (`store_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.store_slaps: ~1 rows (approximately)
INSERT INTO `store_slaps` (`id`, `store_slap_id`, `store_slap_name`, `store_name_id`, `store_type_id`, `store_rack_id`, `location_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 'SSLAP002', 'demo slap25', 'STO001', 'STYPE005', 'SRACK002', 'LOC001', 'grtsda', '2025-10-23 01:43:46', '2025-10-24 08:07:09');

-- Dumping structure for table globe_assist.store_types
CREATE TABLE IF NOT EXISTS `store_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_types_store_type_id_unique` (`store_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.store_types: ~11 rows (approximately)
INSERT INTO `store_types` (`id`, `store_type_id`, `store_type`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'STYPE001', 'efert', 'grt', '2025-10-22 23:53:37', '2025-10-23 00:44:08'),
	(3, 'STYPE003', 'domestic', 'noida', '2025-10-22 23:56:30', '2025-10-22 23:56:30'),
	(4, 'STYPE004', 'domestic', 'noida', '2025-10-22 23:56:49', '2025-10-22 23:56:49'),
	(5, 'STYPE005', 'commercial', 'noida 65', '2025-10-23 00:00:06', '2025-10-23 00:00:06'),
	(6, 'STYPE006', 'efrqq', 'erft', '2025-10-23 00:01:43', '2025-10-24 07:06:42'),
	(7, 'STYPE007', 'vena', 'noida 15', '2025-10-23 00:05:19', '2025-10-23 00:05:19'),
	(8, 'STYPE008', 'buttons dye', 'new noida extn', '2025-10-23 00:17:29', '2025-10-23 00:17:29'),
	(9, 'STYPE009', 'nive pattern paper', 'noida', '2025-10-23 00:29:46', '2025-10-23 00:29:46'),
	(10, 'STYPE010', 'del', 'hihi', '2025-10-24 07:06:22', '2025-10-24 07:06:22'),
	(11, 'STYPE011', 'venaerp', 'venaerp', '2025-10-24 07:31:30', '2025-10-24 07:31:30'),
	(12, 'STYPE012', 'western revoa', 'western revo', '2025-10-24 07:33:38', '2025-10-24 07:33:51');

-- Dumping structure for table globe_assist.trainings
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned DEFAULT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_type_id` bigint unsigned DEFAULT NULL,
  `training_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `email_confirmation` tinyint(1) NOT NULL DEFAULT '0',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trainings_candidate_id_foreign` (`candidate_id`),
  KEY `trainings_training_type_id_foreign` (`training_type_id`),
  CONSTRAINT `trainings_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `job_applies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `trainings_training_type_id_foreign` FOREIGN KEY (`training_type_id`) REFERENCES `training_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.trainings: ~1 rows (approximately)
INSERT INTO `trainings` (`id`, `candidate_id`, `candidate_name`, `candidate_email`, `candidate_phone`, `training_type_id`, `training_date`, `training_from`, `training_to`, `training_duration`, `training_mode`, `training_location`, `status`, `email_confirmation`, `message`, `created_at`, `updated_at`) VALUES
	(1, 1, 'rajesh rao', 'rajeshrao@gmail.com', '8542145128', 1, '1980-10-05', '10:10', '17:10', '3', 'Offline', 'noida', 'Ongoing', 0, 'efnwelf', '2025-10-17 02:21:57', '2025-10-17 02:30:42');

-- Dumping structure for table globe_assist.training_types
CREATE TABLE IF NOT EXISTS `training_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.training_types: ~1 rows (approximately)
INSERT INTO `training_types` (`id`, `department_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Senior Instructor mfswd', NULL, 1, '2025-10-17 02:18:04', '2025-10-17 02:19:25');

-- Dumping structure for table globe_assist.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joined_at` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobile_unique` (`mobile`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.users: ~22 rows (approximately)
INSERT INTO `users` (`id`, `image`, `name`, `mobile`, `email`, `role`, `password`, `company`, `type`, `location`, `country`, `joined_at`, `description`, `created_at`, `updated_at`, `user_id`, `aadhar_card`, `pan_card`, `cv_resume`, `status`) VALUES
	(19, 'users/b2kuTgIO5VTBqG6Kva2fCvKDxYLLPSR58Nkc3Uyb.jpg', 'Guinevere Guzman', '9345678998', 'gisajovo@mailinator.com', 'user', NULL, 'Gilbert Stark Plc', 'Partnership', 'Dignissimos architec', 'Australia', NULL, 'Explicabo Iusto duc', '2025-10-09 13:39:23', '2025-10-09 13:39:23', 'GAU163560', NULL, NULL, NULL, 'active'),
	(20, 'users/02xHJOG2ce8ZnEM30TMXmm22uoygJXW1ZqosE7A1.jpg', 'Jada Robles', '9741825377', 'voregar@gmail.com', 'user', NULL, 'Graham and Burke LLC', 'Private Ltd', 'Minima omnis dolorem', 'Canada', NULL, 'Harum duis itaque su', '2025-10-10 04:54:07', '2025-10-10 04:54:07', 'GAU615399', NULL, NULL, NULL, 'active'),
	(29, 'users/tUaKfifR1L3r6uutHZSlYILZTy0M82Oy7T9hW12H.jpg', 'Maile Chase', '9345678993', 'kikadamage@mailinator.com', 'user', NULL, 'Faulkner and Marks Co', 'Startup', 'Excepteur odio iste', 'India', NULL, 'Necessitatibus delen', '2025-10-10 06:29:18', '2025-10-10 06:29:18', 'GAU844071', NULL, NULL, NULL, 'active'),
	(30, 'users/Wq27KAn9SjglGraE5BbCMZc7Tk5u2zvenQjC62R4.jpg', 'Aquila Sharp', '93727821395', 'cusyto@mailinator.com', 'user', NULL, 'Gates and Ferguson Co', 'Startup', 'Magnam et et quasi r', 'India', NULL, 'Nobis molestias enim', '2025-10-10 06:31:43', '2025-10-10 06:31:43', 'GAU191103', NULL, NULL, NULL, 'active'),
	(31, 'users/DDSCnPiyws5qKCe8mHQS9CPg2ep2yt71fBdoYMr2.jpg', 'Yoshio Farley', '+1 (988) 569-2746', 'fiza@mailinator.com', 'user', NULL, 'Reed and Wells Traders', 'Public Ltd', 'Obcaecati expedita n', 'Australia', NULL, 'Est sit sint magnam', '2025-10-13 07:11:18', '2025-10-13 07:11:18', 'GAU555298', NULL, NULL, NULL, 'active'),
	(33, 'users/2S4og2YuzckzHCltBOtl6d7ST6hSpj70SdyHV9N9.png', 'testing', '9741825385', 'devpublic@gmail.com', 'user', '$2y$12$TaBPPuQmVb.76A0CHyf1VexFpioBOnqoGPXqKcD/TfmmV.fMZCtLS', 'bmdu', 'Private Ltd', 'Nostrud fugiat culpa', 'Australia', NULL, 'tesitng', '2025-11-28 07:41:49', '2025-11-28 07:41:49', 'GAU643897', NULL, NULL, NULL, 'active'),
	(34, 'users/DDSCnPiyws5qKCe8mHQS9CPg2ep2yt71fBdoYMr2.jpg', 'user1', '9876543210', 'user@gmail.com', 'user', '$2y$12$kTPRPZ7vF4AEPqa0FrWWk.AUtPeBOKeRoXVIufOqArV23J21xuQQ6', 'bmdu', 'Private Ltd', 'noida', 'India', NULL, 'testing', '2025-11-28 08:08:25', '2025-11-28 08:08:25', 'GAU111560', NULL, NULL, NULL, 'active'),
	(35, 'users/GWdGgY94GlmKuPcUGBmMrTFcVig0aB2nltsdtjEr.jpg', 'jbsn', '9892798274', 'dsjfjhh@gmail.com', 'user', '$2y$12$kosKANIPoA//TMAG71Eae..Nj70BcuFK.ma4P5kxsS6N0PaX1bjFm', 'Cabrera Grimes Trading', 'Partnership', 'Commodo aut dignissi', 'Armenia', NULL, 'skjnsd', '2025-11-28 11:09:03', '2025-11-28 11:09:03', 'GAU151194', NULL, NULL, NULL, 'active'),
	(36, 'users/s1eDvsf91vuCohjlJpurT5YDz4maeqK3e1bExVHf.jpg', 'testing', '8798729873', 'SKJDH@GMAIL.COM', 'user', '$2y$12$X3es0aMMmXH9zlEFuuCbrejBMKbFr5BG4gPrWJzyjJqxCR/SNe33q', 'Rios Lowery Trading', 'Public Ltd', '1213565', 'Antigua and Barbuda', NULL, 'dfadad', '2025-11-28 11:10:56', '2025-11-28 11:10:56', 'GAU705473', NULL, NULL, NULL, 'active'),
	(37, 'users/hwVDUTcumsoWuK5KCq2xL18GvAwQR6fk4F8FoJ7K.jpg', 'udhwudh', '9897975555', 'skjfbs@gmail.com', 'user', '$2y$12$IC3JfDChw/E2YOqio5Ci1.UzZY5FltnYl012Qni.ZSG/ySfd./ao2', 'Lopez Nguyen Trading', 'Public Ltd', 'Sint at labore occae', 'Anguilla', NULL, 'skjhsdh', '2025-11-28 11:12:15', '2025-11-28 11:12:15', 'GAU311402', NULL, NULL, NULL, 'active'),
	(38, 'users/uXurLEDhIh8RTVo1bIJdtisuGP67WIZNPdX5HBYM.jpg', 'sjbsbd', '9083897873', 'sfjh@gmail.com', 'user', '$2y$12$z0.obYGP5McinQd3xMlujuxjEJNmcICQpcSf3HXfb/NV/P6aEOluy', 'Lopez Nguyen Trading', 'Public Ltd', 'Commodo aut dignissi', 'Armenia', NULL, 'sfkjs', '2025-11-28 11:14:51', '2025-11-28 11:14:51', 'GAU790861', NULL, NULL, NULL, 'active'),
	(39, 'users/XPyJ1OLwRxsl96fCu9nQdzBySba9RWDO5q13FHph.jpg', 'sjbsbd', '9083897876', 'sgygfjh@gmail.com', 'user', '$2y$12$TtchyeasPdDpYAtoQxaJX.llfYqp9zqCT4NLXNqwmLVEiMHTF7X5G', 'Lopez Nguyen Trading', 'Public Ltd', 'Commodo aut dignissi', 'Aruba', NULL, 'sfkjs', '2025-11-28 11:16:32', '2025-11-28 11:16:32', 'GAU791975', NULL, NULL, NULL, 'active'),
	(40, 'users/CbriKnZDTN82NaU22RtPYFAsfX9tQDqFe6zhsvaz.png', 'mohit test', '9876543219', 'mohittest@gmail.com', 'user', '$2y$12$exHCm9F2wsFDjChGdbMVT.TXf2h/lOc.LtI09/RJErqdzKPlxKsVu', 'bmdu', 'Private Ltd', 'noida', 'India', NULL, NULL, '2025-11-28 12:36:10', '2025-11-28 12:36:10', 'GAU714781', NULL, NULL, NULL, 'active'),
	(41, 'users/sO6hw1beL9Q2Iy6hWURY44eFb3bSUbTHXvgv0G3v.jpg', 'Dillon Schmidt', '8897654321', 'anurag12@gmail.com', 'user', '$2y$12$sDYX29odrMeCbNwse2OpxeJ2fYbBGyS0ZaZBPBnQJBNrw392CrG2C', 'Keith and Sloan LLC', 'Startup', 'Eiusmod at tempor ma', 'Belarus', NULL, 'Quia at aut obcaecat', '2025-11-29 13:09:46', '2025-11-29 13:09:46', 'GAU853096', NULL, NULL, NULL, 'active'),
	(42, 'users/1wsDNBL28n1LnESpKPHMNJC2ACrzIubYs8lNHxsd.jpg', 'anurag', '8769996113', 'anurag@gmail.com', 'user', '$2y$12$CqX8nplf0K37MGDHjan3Venrj05YjCsKNMH4axwjk7tK71XpcsADe', 'bmdu', 'Private Ltd', 'noida', 'India', NULL, 'testing', '2025-12-09 04:50:43', '2025-12-09 04:50:43', 'GAU314626', NULL, NULL, NULL, 'active'),
	(50, 'users/pgd73tj2NVDqLHcTQu0q9sFfQHDkfCS44tSLojQq.png', 'Heidi Keith', '9876543222', 'webo@mailinator.com', 'user', '$2y$12$FajqKEtXMDby2Pt25vD5Xu.gYmomKSww9tWzq95Ii.elPtiooQ3n2', 'Waters and Morrow Trading', 'Proprietorship', 'Officia mollitia asp', 'Rwanda', NULL, 'Voluptas reprehender', '2025-12-12 10:40:21', '2025-12-12 10:40:21', 'GAU327753', NULL, NULL, NULL, 'active'),
	(51, 'users/F4tzbqt1ktBK8KYuzqfGsRu4RWhtzmscHUN89fsA.png', 'Lysandra Maddox', '9987654323', 'hejitem@mailinator.com', 'user', '$2y$12$EzwjAvgYBkB.FX5qyklTw.a.ct02Zp.6GAvsla6me2xin4rMPlv62', 'Gardner Levy Inc', 'Private Ltd', 'Lorem distinctio Es', 'Norway', NULL, 'Corporis culpa dist', '2025-12-13 08:10:08', '2025-12-13 08:10:08', 'GAU635801', NULL, NULL, NULL, 'active'),
	(52, 'users/V7eh7SsTugSpySSwk1XGyL96CJJVtHQWO82NWrwm.png', 'Risa Morrison', '8877993342', 'pusebe@mailinator.com', 'user', '$2y$12$d.PvoF6RpfjIIzKhaE.6ZOX0RNX8Khzd6yUBtq8tNik21RS.z5sHi', 'Whitney Velazquez Traders', 'Partnership', 'Voluptatem a est of', 'San Marino', NULL, 'Voluptate consequunt', '2025-12-15 09:23:15', '2025-12-15 09:23:15', 'GAU406387', NULL, NULL, NULL, 'active'),
	(53, 'users/Rlgi3WCO43i8Buz37W5mLNICdF3zd3B5ox8WTXfK.jpg', 'Ezekiel Hurst', '9944665577', 'wamyqagone@mailinator.com', 'user', '$2y$12$UTRsVNcC8H8VSvcIjzeh1uIQjmlECI6S4AYPiFiUZ9ino9nt3/X3C', 'Powell and Brewer Traders', 'Private Ltd', 'Tempor consectetur', 'Sierra Leone', NULL, 'At inventore molesti', '2025-12-15 10:19:47', '2025-12-15 10:19:47', 'GAU639762', NULL, NULL, NULL, 'active'),
	(54, 'users/S9NYMXEJvutDfV11umWi2UYwqc9O7DOqxufvi0Fq.jpg', 'shivam', '8899669908', 'shivam@gmail.com', 'user', '$2y$12$Mpqc5.LLK6jazVf8qQdvt.bYTa.rj0NBSMP2412l5MNWh4T5pJHUC', 'bmdu', 'Private Ltd', 'Noida', 'India', NULL, 'testing', '2025-12-15 10:23:07', '2025-12-15 10:23:07', 'GAU454104', NULL, NULL, NULL, 'active'),
	(55, 'users/GjpUJO5zGMhi0jdNbyMhxYXblFUCh8BkBknd4Yqb.jpg', 'Danielle Gates', '9988776655', 'pybe@mailinator.com', 'user', '$2y$12$ViGiIdpZS.hYgmzo36jdXOwcTdLp5EODwjTQcdERqgg/4.jTU/37q', 'Grimes and Day Trading', 'Public Ltd', 'Qui omnis ex rem ani', 'Latvia', NULL, 'Esse soluta autem re', '2025-12-15 10:32:08', '2025-12-15 10:32:08', 'GAU524758', NULL, NULL, NULL, 'active'),
	(60, 'users/EOKpaGljFhpr5xxI3GuGWh43wJrRLZhQQM3fRGu3.jpg', 'Garth Middleton', '9988775567', 'keqegehyr@gmail.com', 'user', '$2y$12$6cnBMTt5f1ACXCMMAQCjPObj51fHhY/2auHx/aoh07o6oEU60VkXC', 'Harris Guy Associates', 'Partnership', 'Voluptate ex animi', 'Paraguay', NULL, 'Quis facilis modi il', '2025-12-15 10:52:15', '2025-12-15 10:52:15', 'GAU976865', NULL, NULL, NULL, 'active'),
	(61, 'users/aS1tuH4WrbPXAVVk8Q75KUIvjuzxCDQFdb0oEbsT.jpg', 'Alden Cunningham', '9988443321', 'kapazu@gmail.com', 'user', '$2y$12$iXLvqMitMnuYGJ/yjtGFQ.xViWO1bBRG4uDV13TWPoY/SkxluXtgm', 'Beard Mooney Trading', 'Partnership', 'Tempora accusamus re', 'Slovenia', NULL, 'Est minus ex est fu', '2025-12-15 10:58:32', '2025-12-15 10:58:32', 'GAU728041', NULL, NULL, NULL, 'active'),
	(62, 'users/vaT8ItoDtIWKURVVMdM3QFG1d7HsTvFhWL4JCG27.jpg', 'Oren Klein', '9977886655', 'ajdlfjasl@gmail.com', 'user', '$2y$12$shd2mnGbWBMZ4M.RkRFl4.r.JXSmtFuDMGupUW3DPYVReMrfOwwxm', 'Dickson Sutton LLC', 'Startup', 'Ut ipsa sequi ut co', 'Singapore', NULL, 'Excepturi eum molest', '2025-12-15 11:09:30', '2025-12-15 11:09:30', 'GAU748926', NULL, NULL, NULL, 'active'),
	(63, 'users/coC4xaq4FT6xBdKKVexvjqQAu0iETJXnJCbg6ofY.jpg', 'Jamalia Merritt', '8876876876', 'hvhv@gmail.com', 'user', '$2y$12$Ymo7zWpRMzVfE1bgoCpLGOyLBVJZPmYvoi8hUZQsrgXBNOTwkz6s6', 'Vang Kirkland Trading', 'Private Ltd', 'Rerum aliqua Omnis', 'Saudi Arabia', NULL, 'Doloribus pariatur', '2025-12-15 11:14:04', '2025-12-15 11:14:04', 'GAU634385', NULL, NULL, NULL, 'active'),
	(64, 'users/GgBxEzuLSxaKHpjbC29LSoRNLy8FzrpYQzybUYr9.jpg', 'Silas Emerson', '9788990076', 'forocu@gmail.com', 'user', '$2y$12$mQcOlO0GG.bekfKNubCVa.xcxO6tA2Tp9SgQkntA7l2ZcVFJSCDZa', 'Price Mcleod Trading', 'Proprietorship', 'Doloremque molestiae', 'Antigua and Barbuda', NULL, 'Omnis eveniet conse', '2025-12-15 11:17:23', '2025-12-15 11:17:23', 'GAU316738', NULL, NULL, NULL, 'active'),
	(65, 'users/cgg7yLda8C8MM2DeVA1dtCoveOnMPkxvETH1qmXq.png', 'anurag', '8769994532', 'anurag31@gmail.com', 'user', '$2y$12$Qfnu5vjDMBzIegiStd3idOfUUV3EhKWsKpz2ZN3m4WrKXVRgWD8hy', 'Huff Petersen Trading', 'Startup', 'Ex id tenetur optio', 'Georgia', NULL, 'Dolore dignissimos u', '2026-01-03 05:20:25', '2026-01-03 05:20:25', 'GAU413744', NULL, NULL, NULL, 'active');

-- Dumping structure for table globe_assist.vehicle_entries
CREATE TABLE IF NOT EXISTS `vehicle_entries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `entry_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_type` enum('InWard','OutWard') COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_time` timestamp NULL DEFAULT NULL,
  `out_time` timestamp NULL DEFAULT NULL,
  `status` enum('In','Out') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `last_updated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_entries_entry_id_unique` (`entry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.vehicle_entries: ~8 rows (approximately)
INSERT INTO `vehicle_entries` (`id`, `date`, `entry_id`, `vehicle_number`, `driver_name`, `entry_type`, `material`, `qty`, `unit`, `gate_pass_id`, `in_time`, `out_time`, `status`, `remark`, `invoice_no`, `created_by`, `last_updated`, `created_at`, `updated_at`) VALUES
	(1, '2025-10-18', 'VEH20251018-001', 'Vsqsmjche', 'Pw', 'InWard', 'Ebafpijeippyca', 416.00, 'Nbdefolavtfiacg', 'GATEPASS20251018-001', '2025-10-26 02:45:00', '2025-10-26 02:50:00', 'Out', 'Oz ohcet cog huzenice jegmendaw du erka nipus re bamnonu halti riv gub pan. Hivtanu tajabe met julika mopoven vuksik cum wejis miluzuzi zuag ul vigugca mejge viw hojrub. Zoucaw efrig de sop farafomob fenlado pizarlot muklep cuvdi owibuuma dehbu vevzul coparsik. Ipouhsam zasuf abuler pebojnih capid wuc tarje dipkumnoh likar fukaple haj vosili pid zu gaiz weh ihi gur. Hagdubu naguh daptasi wiruro bo dug waz tacso iji mehwovoz gugegfe palid. Sed juzjosuli lemda pacucme tepi kuhu vorre', 'Hguqzruzjpeguw', NULL, NULL, '2025-10-18 03:04:40', '2025-10-24 05:09:53'),
	(4, '2025-11-12', 'VEH20251112-004', 'Srhhcvqtwelub', 'Prjlpknb', 'InWard', 'Kwbwbxsvadqvi', 219.00, 'Nsucfobmvyh', 'GATEPASS20251112-004', '2025-12-25 02:36:00', NULL, 'In', 'Efden niv ga kul ci ono wajimawu sazanu murfoz ifohhah vaj hen ve ajaal. Oncah ev keve ivmu kewgebbet fob kojnoco wi suzrajop aluca wuifenih borbar. Ob wokhehdeh luko tizof fehiguzo jefogli azu kowse kisohru tuceb me bos bucfow. Wozossi pilimdij cokuab ciw wame gusvo cop cekouk tomoh uri odli hewag nuh. Seferudu kulvuvtib fetedafa tifebiefi ol uredojo eteefo lusajoti ag fa', 'Diwfwqejavh', NULL, NULL, '2025-11-12 01:41:22', '2025-11-12 01:41:22'),
	(5, '2025-11-12', 'VEH20251112-005', 'Bleresms', 'Swj', 'OutWard', 'Iaefteieoygs', 275.00, 'Etsvzcpi', 'GATEPASS20251112-005', '2025-10-12 13:39:00', NULL, 'In', 'Wuwded rawpum co kodmicob derelu re vosuh bi sibettof vokuera um noj lohahtin. Nuwaga ela rokmi resfazuv wucora nifetgi izjahlih kiw so iguwoj vamu jugilriv vorzen bu gaskiz akwunwuk ginusa. Akowapic nalfo sesak wapob ej pij mun jozri ubezajnas ibni fum fuvzebow dujzakus osza.', 'Icjf', NULL, NULL, '2025-11-12 01:50:31', '2025-11-12 01:50:31'),
	(6, '2025-11-12', 'VEH20251112-006', 'Ur', 'Vc', 'InWard', 'Rtnn', 495.00, 'Ijemebixmk', 'GATEPASS20251112-006', '2025-12-12 20:55:00', NULL, 'In', 'Og ivnamo dazad zerabsuw cebsi rob acokape membic idtegu ilufepe fa enrewo ger. Majiv ino mi ron waak naz puf mof oj diapu inowodip ositek kel dujo hogcot akusan. Wodne ve jooju dimum po zokecic jipzihe fimpi tuw hemawja utu vumu ne bo. Uzi abdiklih to on vaahhij gippop', 'Dreygwxmkzdpcc', NULL, NULL, '2025-11-12 01:56:06', '2025-11-12 02:21:14'),
	(7, '2025-11-12', 'VEH20251112-007', 'Auxpyhqz', 'Ggptov', 'InWard', 'Hdystbhgoe', 388.00, 'Gsvseuel', 'GATEPASS20251112-007', '2025-10-10 08:38:00', NULL, 'In', 'Udi pide ciuz joc olafozje teisoben de ocumuve wawfonu jav jivac adjiro feb mege ne tuc tak saju. Conwicud gigbagube vuv wajobnuj ho hogzo abaw uz rekal abnehra li afebulga pezre povod kilele. Wunu ib zi rurtub zuf nov jefzukaz seslik cop mohmu azuane fe suomefik nefil. Luvturum mikvifzi luztam cucouno sab boman urwoena mi wehewiz vo kipa dapojsah udosal meh. Kendeknah figvulap loz livef evkekol bevefoas vurtiin hapgupup ew zocga pu funadu izavis. Doehbud az et sonunim dokmohuci ut azun', 'Mawygrmp', NULL, NULL, '2025-11-12 02:21:51', '2025-11-12 02:21:51'),
	(8, '2025-11-12', 'VEH20251112-008', 'Flx', 'Cnykasquhdl', 'InWard', 'Hgwpcvnpniuz', 120.00, 'Nlrpjnigu', 'GATEPASS20251112-008', '2025-10-10 08:36:00', NULL, 'In', 'Jobmuge tuh fulbeadu fivmijev iputo idooviru ripge ku fi co fid fidhis rop ethe. Cala tohowo midjifi itike acfokak nooh opmabdil mevi tuwoji zeg apjekso nidde sac hi ve nownab gulleddu anemic. Wo cenucap sacoh iwoden ce aroaze gados soen mawif takmegi mepa zar ohu nulugni ifihid hodpid', 'Gawgtqwvnjdl', NULL, NULL, '2025-11-12 02:30:25', '2025-11-12 02:30:25'),
	(9, '2025-11-12', 'VEH20251112-009', 'Okfnxvq', 'Fzz', 'OutWard', 'A', 281.00, 'Rcxrvs', 'GATEPASS20251112-009', '2025-10-09 21:45:00', NULL, 'In', 'Gomgavaf ze zamed ijotimo otabuvge funivovi vojure gidemrew pa cu buvboj akuolu. Niczi hate cilpowko dedam gez sifpeba rejfetmu lezopak du uhedebja idi jac nat coskertac faeg gu fucrioj. Rusabtok sol lioroh', 'Ttint', 3, 3, '2025-11-12 05:17:01', '2025-11-12 05:17:01'),
	(10, '2025-11-12', 'VEH20251112-010', 'Vplzcyf', 'Co', 'InWard', 'Caww', 59.00, 'Nsrazx', 'GATEPASS20251112-010', '2025-10-09 23:38:00', NULL, 'In', 'Lah ogavuh vehi koslip duluvfop sin baug ezunaep naobir touda vuni rar puvwuh zipavi. Jiro ep anoucu hodcangig ci fet omizudko fejtaud za jufawmum ocfosa pacipuc aru sa we. Wiru upawi rob cafekre mi laraj alo pon ge za nafte wuzuf. Egotocise jijkerut zijatir ga ca wulik emo domeb mep bahowov pe utecef opib. Tam id vudede hu gepbeti gioc hirbo fum toj nituz esamobew giv tig uv luwu. Evmig asu dopep bus ek opohe uc fevdezam ja', 'Ppfz', 3, 3, '2025-11-12 05:27:28', '2025-11-12 05:27:28');

-- Dumping structure for table globe_assist.vendors
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `primary_products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_vendor_id_unique` (`vendor_id`),
  CONSTRAINT `vendors_chk_1` CHECK (json_valid(`product_categories`)),
  CONSTRAINT `vendors_chk_2` CHECK (json_valid(`payment_terms`))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.vendors: ~3 rows (approximately)
INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_id`, `contact`, `email`, `address`, `company_name`, `store_type_id`, `product_categories`, `primary_products`, `gst_number`, `payment_terms`, `created_at`, `updated_at`) VALUES
	(2, 'adolf delhi', 'VNDO0255', 8451255143, 'info@psdj.com', 'noida b-96', 'adolf delhi', '3', '["Electronics"]', 'electroninc', '07ASDIM9846B1ZI', '["Net 30"]', '2025-10-25 05:58:42', '2025-10-25 05:58:42'),
	(3, 'Mirp New Delhi', 'VNDO3735', 8451236984, 'info@taxi.com', 'noida 69', 'Mirp', '4', '["Electronics"]', 'apparael', '07ASDIM9846B1ZI', '["Net 30"]', '2025-10-25 06:24:13', '2025-10-25 06:24:13'),
	(4, 'Oq', 'VNDO9941', 8451236984, 'wem@mo.md', 'N', 'Qlrxpbntaa', 'STYPE012', '["Electronics"]', 'Bgaaru', 'Vllgkrzlmqpjjh', '["Net 30"]', '2025-10-25 06:43:35', '2025-10-25 06:43:35');

-- Dumping structure for table globe_assist.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `visitor_type` enum('Vendor','Customer','Inspector','Interviewee','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_of_visit` enum('Pickup','Delivery','Meeting','Inspection','Interview','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_to_meet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bringing_vehicle` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Entry','Exit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Entry',
  `created_by` bigint DEFAULT NULL,
  `last_updated` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exit_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `visitors_visitor_id_unique` (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table globe_assist.visitors: ~24 rows (approximately)
INSERT INTO `visitors` (`id`, `visitor_id`, `name`, `mobile`, `email`, `address`, `visitor_type`, `purpose_of_visit`, `person_to_meet`, `bringing_vehicle`, `vehicle_number`, `status`, `created_by`, `last_updated`, `created_at`, `updated_at`, `entry_time`, `exit_time`) VALUES
	(1, 'VIS20251018001', 'amir shubani', '8451203691', 'amir@gmail.com', 'f-62 noida', 'Vendor', 'Pickup', 'Rajendra', 'Yes', 'DL54AV8956', 'Entry', NULL, NULL, '2025-10-18 01:57:06', '2025-10-18 01:57:06', '2025-10-24 05:42:28', NULL),
	(2, 'VIS20251018002', 'We', '8015953902', 'febugoh@pa.aw', 'Pipfog wompu puhreku boj muboj lemobcu nebefi eh cucunu suokozi nom merep gi kenmak fogehdi. Baw aloap koz oje bizgunvez enoka gezgi latfu lig vu pecfaksig mihje wabe hezwapma uto mevol icolaj note. Kewmuir woriraabe sub judjopu', 'Interviewee', 'Delivery', 'Yzwkkvffu', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:00:40', '2025-10-18 02:00:40', '2025-10-24 05:42:28', NULL),
	(3, 'VIS20251018003', 'Iyowlytxlnem', '9205491590', 'vewa@zahzavar.bf', 'Pej vu gi bud imham nihfo nuhfa hevewu javlug oco rucivnef rif vejecirew. Tarkoz le hide mevuw rejuti noevic nauza ud wudofcud mucus pe', 'Customer', 'Inspection', 'Exiaxehkiiriq', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:01:09', '2025-10-18 02:01:09', '2025-10-24 05:42:28', NULL),
	(4, 'VIS20251018004', 'Uibjdyvmxgqiv', '9742509858', 'on@su.ht', 'Nonef hussog ov woglici to acidieze to gakta soso ona ciozieva jonigwe lammeluz. Cij uvehehuh ig gal zudne bezri adenemuc jehuzagu gop iwogisud vasrehuz adicuwzu vuhofu. Bejoluzaz lofsodanu ij egke waobe ibopuag bi lar zebag miicejiw keazolok esu sug teja. Ceicfam ukori zemiwi guvef uloso ijna neb fa vu fe ku nezi', 'Other', 'Meeting', 'Nmbbtesx', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:10:02', '2025-10-18 02:10:02', '2025-10-24 05:42:28', NULL),
	(5, 'VIS20251018005', 'Qqgnk', '4519031638', 'owwoos@urhoh.nu', 'Booci fidkotuv sipidnuk ic wegtam huduh la zec riduv obilag saguuk ugbeiwi. Fow uhutu met seduzug di pa jeha osvisdi rargav hemfog evu mifzo at pejahikeb ofoka duflecdib. Pi kowmur iro pigne holin jeh muh', 'Inspector', 'Inspection', 'Ynvdo', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:14:15', '2025-10-18 02:14:15', '2025-10-24 05:42:28', NULL),
	(6, 'VIS20251018006', 'Rpluqzpthip', '5794159542', 'honab@nac.lu', 'Fuitazuw covboh fiepe us jehbope depi wavgobkad hitbu ja ilwop hiumo avo. Zil vo ekbusuv zu zuronazi rusigic awu asarisiw kid ediwekub weh udvot ezi zi. Esta ahomado saclah abofoife nucvu rewpu reofwa zil nitlovun rit rijfav onagejul vo fiere. Afiebu laruj cetwapul fakukan te riat maat te hiz kokavopu juad so juzecuwu futoro. Dovugva sudbesjin coviopu keg ugobusmuz cavuga few verunlak reh gudzanru ne orakwav cebo vik. Bi gabed poh epebad odo afejes sooga nekwahev evo', 'Inspector', 'Other', 'Zpliahks', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:15:12', '2025-10-18 02:15:12', '2025-10-24 05:42:28', NULL),
	(7, 'VIS20251018007', 'Nsbir', '3392129420', 'pit@ko.edu', 'Patemawi ohvudos si kovu evgefgu emanu wu verabe mor inocuvej vervabfi tet. Tawbi hozebuv hol tiksuzef fegipla eledub hodopic naukwef imbozi kine bata hoc bonutpe wo asadi tumet. Devjinev soeg latvole mev jeibpa selen pojzo rousto wut ge jo waiz mid sep so buvmuja bo', 'Inspector', 'Other', 'Cgpgnfeax', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:18:34', '2025-10-18 02:18:34', '2025-10-24 05:42:28', NULL),
	(8, 'VIS20251018008', 'Yarffgpja', '8023164813', 'elurhi@hermekdu.su', 'Liso fe subho heb eme ja elute sek luhdof jecvip vemsenlat ez sar bagceice uhebep ha zamwiva. Racpev puk mom orore caz wo peubaju wutep pufu etepear hubpon nesgupwir mec jo. Ohotugzav ti dive bubuk ganuge ikomotles seb wo ofa ziej pujkeher oca nobmulmi uzek wokawwoc lek. Bo sob ji oja bohuf ju gibuku un am dir bomelgup pac noj coan edaotuseb. Fo os efpadbo jawju kegaro muzti rirvefmu ozuufrov jozfum duretaho gawi zerar', 'Interviewee', 'Interview', 'Zelispzgwlsb', 'No', NULL, 'Entry', NULL, NULL, '2025-10-18 02:19:07', '2025-10-18 02:19:07', '2025-10-24 05:42:28', NULL),
	(9, 'VIS20251023009', 'mohit', '9666666668', 'mohiy@hmknu', 'gygyu', 'Customer', 'Inspection', 'uhuh', 'Yes', 'vyftyfytgyguygy', 'Entry', NULL, NULL, '2025-10-23 05:40:21', '2025-10-23 05:40:21', '2025-10-24 05:42:28', NULL),
	(10, 'VIS20251023010', 'Fxxguoidw', '8284251514', 'wevhupik@evpa.bo', 'Ibeliomi hudu leita biwregiv anwin olupumu vet lejwugte lib va ma kim uzgake mifuak soncoozu. Va surara nuhku wiawiju pid pu hezar we fedta weekpip onetidsan roh izji vu safuk. Bohis ilwe cufnoj pamcul icpokeh fike el nagimil wuju kukuhno hosdujfo geha row cisreh pipocu ma pov. Fir ababesleb zo be efeulawok ihvo zuhtakir gil risfo rulatavi nec mumig sowva satgeuwa. Dabotez', 'Customer', 'Meeting', 'Wmvewshz', 'Yes', 'DL251A845', 'Entry', NULL, NULL, '2025-10-23 06:49:03', '2025-10-23 06:49:03', '2025-10-24 05:42:28', NULL),
	(11, 'VIS20251023011', 'Zomid', '224745149184512', 'osopimad@oho.dm', 'Niramosi umha riucu zote diwe ici es ejo sebig si usoso ufcitif vumreli zeepop. Lahig lacida kietisub la aziw ezaneja ehposu kehow kedaz uwabamfu muz ad. Piknespeb vernim luf apo gihja u', 'Vendor', 'Meeting', 'Ushm', 'No', NULL, 'Entry', NULL, NULL, '2025-10-23 07:00:22', '2025-10-23 07:00:22', '2025-10-24 05:42:28', NULL),
	(12, 'VIS20251023012', 'Xsnv', '316624425384575', 'ju@dape.gf', 'Busopza ciuniapo sescege pan nunzufli baf dewi cufmuluk tiswed is mik buwer hu. Itiug topepa merti ruj ucojo dardijul ruwvoera umhol jek fopid sen rewuda kivulites. Tihbom lu zifzuf kiwkefdog tuenedi edueke', 'Interviewee', 'Other', 'Wnolqrly', 'Yes', 'DL251A845845', 'Entry', NULL, NULL, '2025-10-23 07:01:19', '2025-10-23 07:01:19', '2025-10-24 05:42:28', NULL),
	(14, 'VIS20251023014', 'Weftth', '5447111797', 'anikof@boow.sy', 'Azidiol vimlehe zag ecugildu tocewoja elu coave sevudmin ivnesa cok boka gi rebi se naz. Lieg junda kalbav pet gatzofit liv ar dov fibkek rizomisu zaok no odpulad enfaali ujbi dalmi zik. Gedvov bilazele fuc ruzac gutfov mawu usahka irubo guhej ha vewonisu car jujoni leehu za. Unolevjev nobo on set sil dumhob nulbige mekbi ruv vocdilse dar madilules. Tisih jikzicmoj okwob jetum', 'Customer', 'Delivery', 'Gg', 'No', NULL, 'Exit', NULL, NULL, '2025-10-23 07:20:56', '2025-10-24 00:43:25', '2025-10-24 05:42:00', '2025-10-24 05:43:00'),
	(15, 'VIS20251024015', 'Toxaocums', '6742247006', 'heju@nifuhid.tl', 'Resom ecuubsur meunoga limbe miwsar wa ijar apirahet weonuje umuab foipega uzhanba kozomsuw otacocge wanul vusas. Lugkibe budadep fezoma dagse voj javef taszumic ike fi osa cu lit togeboju ib kujlo. Pu jumam alisa onaede bootuku gosbulheb cunlozic at vobet di hina nutozo ditlede egi evupaeho. Talik nenjujap suhomi cistivro ge semgazod lukokic ikihgos uc erjumsaz ajna osnav. Uc buafoha guhol hib kac jiebwul misuh natazuc defel sih giwwek mimih ef', 'Customer', 'Interview', 'Zf', 'No', NULL, 'Entry', NULL, NULL, '2025-10-24 05:12:57', '2025-10-24 05:12:57', '2025-10-24 10:42:57', NULL),
	(16, 'VIS20251112016', 'delhi', '8284251514', NULL, 'lhi', 'Vendor', 'Pickup', 'delhi', 'No', NULL, 'Entry', NULL, NULL, '2025-11-12 00:03:55', '2025-11-12 00:03:55', '2025-11-12 05:33:55', NULL),
	(17, 'VIS20251112017', 'delhi', '8284251514', NULL, 'delhi', 'Vendor', 'Pickup', 'Wmvewshz', 'No', NULL, 'Entry', NULL, NULL, '2025-11-12 00:05:29', '2025-11-12 00:05:29', '2025-11-12 05:35:29', NULL),
	(18, 'VIS20251112018', 'merop', '8284251514', 'sdc@m.com', 'sfe', 'Vendor', 'Pickup', 'e', 'No', NULL, 'Exit', NULL, NULL, '2025-11-12 00:06:56', '2025-11-12 00:42:37', '2025-11-12 05:36:00', '2025-12-11 09:45:00'),
	(19, 'VIS20251112019', 'deliwe', '8284251514', NULL, 'mdr', 'Vendor', 'Pickup', 'dwae', 'No', NULL, 'Exit', NULL, NULL, '2025-11-12 00:11:00', '2025-11-12 00:41:29', '2025-11-12 06:04:00', '2025-12-12 17:28:00'),
	(20, 'VIS20251112020', 'preshw', '8284251514', NULL, 'delhi', 'Vendor', 'Pickup', 'der', 'No', NULL, 'Exit', NULL, NULL, '2025-11-12 00:44:10', '2025-11-12 01:24:59', '2025-11-12 06:14:00', '2025-12-06 22:38:00'),
	(21, 'VIS20251112021', 'rajesh tripathi', '8451263598', NULL, 'delhi', 'Vendor', 'Pickup', 'delhi', 'No', NULL, 'Exit', NULL, NULL, '2025-11-12 00:55:31', '2025-11-12 01:20:20', '2025-11-12 06:25:00', '2026-08-09 09:55:00'),
	(22, 'VIS20251112022', 'Vcijuvyases', '9844929124', 'bietimup@ke.tg', 'Dokvijwip aja habgo ucfendu du is ifemi ipoohidih nuronja zebruj jino mimezlu toatu gohot kuhkam kos gal edunik. Mogoz ve kufkib jecveh tijoso akafe uvaob komoglid vurwuce ohfefid ew kece', 'Other', 'Interview', 'Fdjyfap', 'No', NULL, 'Exit', NULL, NULL, '2025-11-12 01:15:06', '2025-11-12 01:19:01', '2025-11-12 06:45:00', '2025-12-18 09:46:00'),
	(23, 'VIS20251112023', 'Vmwlhvbvtsbnea', '9493842751', 'ce@avu.ng', 'Arzepif kinif nutcusas fefi etli focofhi degveh zecuh osilovo sefijer ogizija vizvewid kafumfoh vo rugkovis karupo ru nuze. Dono esu zepas nahid kisabto ziwwamreh vepocozun seune hu facsimis reije uhpo akujsuj vew bozoze kiwic wok ujuvecro. Rit jatmorno azuob os uwhufhif ti cek buho duwacjaj bohorro no ja hozgoped kiiw had ifehod genu. Usjiruhi asa hi pungugin', 'Customer', 'Meeting', 'Vpfdzhkkkgdsz', 'No', NULL, 'Entry', NULL, NULL, '2025-11-12 01:28:51', '2025-11-12 01:28:51', '2025-11-12 06:58:51', NULL),
	(24, 'VIS20251112024', 'Iaryecii', '8286945028', 'soabal@gew.dk', 'Gute wi gu utijoje vip rud wed apwo ipoaso tig nakinenuj wovmalriz ma uzo ado pog hacitocu. Wevosaha ela sergito tiz ilnog ag ne esuruzu esekoor pejehcuj zowdorpi anobirejo nigav he bakle ciwigob fobil. Regsam divol ibuonered vahbijefu ucka zozu pesacodi fi kiik muze wesuvoasu misojo izlepwe tocoh angiffer. Maf t', 'Interviewee', 'Delivery', 'Agvjikir', 'No', NULL, 'Entry', NULL, NULL, '2025-11-12 02:47:05', '2025-11-12 02:47:05', '2025-11-12 08:17:05', NULL),
	(25, 'VIS20251112025', 'mehak', '5473109229', 'av@zu.tv', 'Dop fi wad bagode puwihobo vekudge bacdib sezutu zu nik ebozidom ka koc vike re. Sah vocebliz jusga cohid eje nuohuja ogtimgu ze bak nucul rapcimah zodfuv zopoj. Zeb gonviju feada utemoko uki isviaw naibuwi lidem jemoz bov tud pohaw gibs', 'Vendor', 'Delivery', 'Otvbzothd', 'No', NULL, 'Exit', NULL, 3, '2025-11-12 02:48:27', '2025-11-12 04:51:28', '2025-11-12 08:18:00', '2025-12-12 06:24:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
