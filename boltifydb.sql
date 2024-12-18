-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 01:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boltifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` char(36) NOT NULL,
  `userId` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `created_at`, `updated_at`) VALUES
('9dc07042-ff15-44e3-bc63-6e4b9b01d3b9', '9dc07042-2e41-4eaf-bb28-d376bafcabc6', '2024-12-17 21:07:07', '2024-12-17 21:07:07'),
('9dc0a420-d71e-4ce7-a32b-7a008dc82221', '9dc0a420-cbde-463e-bb9b-3f3c5a4af761', '2024-12-17 23:32:08', '2024-12-17 23:32:08'),
('9dc0b34c-51c1-4a88-83bc-5f3a815f0787', '9dc0b34c-4e3a-4c06-8b86-3e622a5e8e94', '2024-12-18 00:14:34', '2024-12-18 00:14:34'),
('9dc0bfd9-1d40-47f3-a211-a547e90d4b71', '9dc0bfd9-16ea-431e-8bfb-a19abb4163c9', '2024-12-18 00:49:39', '2024-12-18 00:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `cartId` char(36) NOT NULL,
  `productId` char(36) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
('652fd9c3-bcf9-11ef-94fb-18cc18b68450', 'Fasteners', NULL, NULL),
('652fdb09-bcf9-11ef-94fb-18cc18b68450', 'Power Tools', NULL, NULL),
('652fdb60-bcf9-11ef-94fb-18cc18b68450', 'Hand Tools', NULL, NULL),
('652fdb78-bcf9-11ef-94fb-18cc18b68450', 'Varnishes and Paints', NULL, NULL),
('652fdb91-bcf9-11ef-94fb-18cc18b68450', 'Building Materials', NULL, NULL),
('652fdba9-bcf9-11ef-94fb-18cc18b68450', 'Supplies', NULL, NULL),
('652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'Safety Equipment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2024_11_13_062442_create_products_table', 1),
(11, '2024_11_27_020922_create_carts_table', 1),
(12, '2024_11_27_031925_create_cart_product_table', 1),
(13, '2024_12_13_075956_create_categories_table', 1),
(14, '2024_12_14_162148_create_orders_table', 1),
(15, '2024_12_15_040511_create_order_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) NOT NULL,
  `userId` char(36) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_intent` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `payment_method` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `refund` varchar(255) DEFAULT NULL,
  `refund_status` varchar(255) DEFAULT NULL,
  `refund_reason` varchar(255) DEFAULT NULL,
  `refund_completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `total`, `status`, `payment_intent`, `payment_status`, `payment_method`, `name`, `email`, `address`, `city`, `country`, `refund`, `refund_status`, `refund_reason`, `refund_completed_at`, `created_at`, `updated_at`) VALUES
('9dc0aec0-79f0-42a1-a0d7-4ab8a9db1e4a', '9dc0a420-cbde-463e-bb9b-3f3c5a4af761', 13800, 'refunded', 'pi_3QXICVLe6X2obQmd2JMfG9Hb', 'paid', 'card', 'Iver Allen', 'iverallen@gmail.com', 'Sta Lucia Pampanga', 'Magalang', 'PH', 're_3QXICVLe6X2obQmd2QTuH8IU', 'succeeded', 'canceled', '2024-12-18 00:02:20', '2024-12-18 00:01:51', '2024-12-18 00:02:20'),
('9dc0b45d-7dff-44ad-8f7a-d9099823f39e', '9dc0b34c-4e3a-4c06-8b86-3e622a5e8e94', 405400, 'refunded', 'pi_3QXIRhLe6X2obQmd3rIIXhiu', 'paid', 'card', 'Cedric Alavarizz', 'cedricalavarizz@gmail.com', '1st Avenue Casmor Subd. Ph 2 Mabiga Casmor Subdivision, Pampanga', 'Mabalacat', 'PH', 're_3QXIRhLe6X2obQmd3Ly9xxjP', 'succeeded', 'canceled', '2024-12-18 00:18:12', '2024-12-18 00:17:33', '2024-12-18 00:18:12'),
('9dc0c061-d81b-4a20-adb1-2ad57e0b84c7', '9dc0bfd9-16ea-431e-8bfb-a19abb4163c9', 309300, 'refunded', 'pi_3QXIyELe6X2obQmd0vSwTcue', 'paid', 'card', 'Jonas Bautista', 'jonasbaustista@gmail.com', 'Xevera Plaza Blk 19 Lot 28, Pampanga', 'Mabalacat', 'PH', 're_3QXIyELe6X2obQmd0mP1w7qR', 'succeeded', 'canceled', '2024-12-18 00:51:42', '2024-12-18 00:51:09', '2024-12-18 00:51:43'),
('9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc07042-2e41-4eaf-bb28-d376bafcabc6', 1301100, 'complete', 'pi_3QXLyvLe6X2obQmd1u61fXei', 'paid', 'card', 'Jonas Lacandola', 'jlacandola0@gmail.com', 'Xevera Plaza Pampanga', 'Mabalacat', 'PH', NULL, '', '', NULL, '2024-12-18 04:04:04', '2024-12-18 04:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `orderId` char(36) NOT NULL,
  `productId` char(36) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `orderId`, `productId`, `quantity`) VALUES
('2c42cc85-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc0938e-1037-498c-bba4-6b4040083320', 5),
('2c42e4b8-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc0943d-7c22-49fd-ae50-26f85594ab7f', 4),
('2c42e56d-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc088bc-c8f2-4d61-b11f-e800ce4fb404', 40),
('2c42e5c9-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc09226-a66c-4bf6-9d09-724abda5d22b', 4),
('2c42e622-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc0950b-6e01-44b8-927f-8802038de7e4', 2),
('2c42e67a-bd38-11ef-94fb-18cc18b68450', '9dc10560-06f4-4dd3-9bc5-57b08afdf682', '9dc097c6-e5d2-4dd9-ac2b-1829b3b8eeca', 3),
('38f86f6f-bd1d-11ef-94fb-18cc18b68450', '9dc0c061-d81b-4a20-adb1-2ad57e0b84c7', '9dc08da2-7082-4294-a540-7f7f5d612127', 2),
('38f8df4b-bd1d-11ef-94fb-18cc18b68450', '9dc0c061-d81b-4a20-adb1-2ad57e0b84c7', '9dc08e61-637b-48b3-bf91-20830c4c64f3', 5),
('55f19fe0-bd16-11ef-94fb-18cc18b68450', '9dc0aec0-79f0-42a1-a0d7-4ab8a9db1e4a', '9dc088bc-c8f2-4d61-b11f-e800ce4fb404', 20),
('87459b5c-bd18-11ef-94fb-18cc18b68450', '9dc0b45d-7dff-44ad-8f7a-d9099823f39e', '9dc08da2-7082-4294-a540-7f7f5d612127', 3),
('8745b937-bd18-11ef-94fb-18cc18b68450', '9dc0b45d-7dff-44ad-8f7a-d9099823f39e', '9dc08e61-637b-48b3-bf91-20830c4c64f3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `categoryId` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `name`, `description`, `price`, `stock`, `images`, `created_at`, `updated_at`) VALUES
('9dc088bc-c8f2-4d61-b11f-e800ce4fb404', '652fdb91-bcf9-11ef-94fb-18cc18b68450', 'Cinder Block', 'A concrete block, also known as a cinder block in North American English, breeze block in British English, concrete masonry unit, or by various other terms, is a standard-size rectangular block used in building construction.', 4.00, 2000, '[\"Cinder Block-1734502532\\/1734502532-Designer (3).jpeg\",\"Cinder Block-1734502532\\/1734502533-Cinder Blocks 1.jpeg\",\"Cinder Block-1734502532\\/1734502533-Designer (4).jpeg\"]', '2024-12-17 22:15:33', '2024-12-17 22:15:33'),
('9dc08da2-7082-4294-a540-7f7f5d612127', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'Dust Mask Box of 20 pcs', 'A dust mask is a flexible paper pad held over the nose and mouth made for protection against chronically toxic nuisance dusts, like from occupational exposure to plant dusts like hay. They are not intended to provide protection from most airborne hazards.', 1120.00, 200, '[\"Dust Mask Box of 20 pcs-1734503355\\/1734503355-DustMask1.jpeg\",\"Dust Mask Box of 20 pcs-1734503355\\/1734503355-DustMask2.jpeg\",\"Dust Mask Box of 20 pcs-1734503355\\/1734503355-DustMask3.jpeg\"]', '2024-12-17 22:29:15', '2024-12-17 22:29:15'),
('9dc08e61-637b-48b3-bf91-20830c4c64f3', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'High Quality Industrial Face Shield', 'Industrial face shields are ANSI certified to protect against workplace injuries caused by impact, non-ionizing radiation, and chemical exposure from machinery, welding, cutting, grinding and other potentially hazardous types of work to the face.', 159.00, 1000, '[\"High Quality Industrial Face Shield-1734503480\\/1734503480-FaceShield1.jpeg\",\"High Quality Industrial Face Shield-1734503480\\/1734503480-FaceShield2.jpeg\",\"High Quality Industrial Face Shield-1734503480\\/1734503480-FaceShield3.jpeg\"]', '2024-12-17 22:31:20', '2024-12-17 22:31:20'),
('9dc08fcb-1f09-4cf1-bf7e-c270d9afaa3b', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'High Visibility Clothing Hi-Vis PPE', 'High visibility clothing, also known as hi-vis, is clothing that is designed to make the wearer more visible, especially in low light or dark conditions. It is often worn by workers who are at risk of being hit by vehicles or equipment, such as construction workers, road maintenance crews, and first', 500.00, 259, '[\"High Visibility Clothing Hi-Vis PPE-1734503717\\/1734503717-Highvisibilityclothe1.jpeg\",\"High Visibility Clothing Hi-Vis PPE-1734503717\\/1734503717-Highvisibilityclothe2.jpeg\",\"High Visibility Clothing Hi-Vis PPE-1734503717\\/1734503717-Highvisibilityclothe3.jpeg\"]', '2024-12-17 22:35:17', '2024-12-17 22:35:17'),
('9dc0910d-98a8-4d3e-b610-398b78356c6d', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'Industrial Safety Leather Hand Gloves', 'Leather Gloves are commonly made from cowhide, goatskin, pigskin, or deerskin. They offer excellent durability and abrasion resistance, making them suitable for heavy-duty tasks. Leather gloves often feature reinforced stitching and additional padding in high-impact areas for enhanced protection.', 862.00, 598, '[\"Industrial Safety Leather Hand Gloves-1734503928\\/1734503928-LeatherGloves1.jpeg\",\"Industrial Safety Leather Hand Gloves-1734503928\\/1734503928-LeatherGloves2.jpeg\",\"Industrial Safety Leather Hand Gloves-1734503928\\/1734503928-LeatherGloves3.jpeg\"]', '2024-12-17 22:38:48', '2024-12-17 22:38:48'),
('9dc09226-a66c-4bf6-9d09-724abda5d22b', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', 'Safety Boots', 'A steel-toe boot (also known as a safety boot, steel-capped boot, steel toecaps or safety shoe) is a durable boot or shoe that has a protective reinforcement in the toe which protects the foot from falling objects or compression.', 609.00, 389, '[\"Safety Boots-1734504112\\/1734504112-SafetyBoots1.jpeg\",\"Safety Boots-1734504112\\/1734504112-SafetyBoots2.jpeg\",\"Safety Boots-1734504112\\/1734504112-SafetyBoots3.jpeg\"]', '2024-12-17 22:41:52', '2024-12-17 22:41:52'),
('9dc09310-fce1-4786-9b8e-1d7246f8da9f', '652fdbbf-bcf9-11ef-94fb-18cc18b68450', '3M Eye Protection Safety Glasses', 'Standard safety glasses are designed to protect against light to moderate impact and flying particles and are constructed of metal or plastic with impact-resistant glass or plastic lenses. Safety glasses must have shatter-proof lenses, impact resistant frames and provide side protection.', 208.00, 457, '[\"3M Eye Protection Safety Glasses-1734504266\\/1734504266-SafetyGlasses1.jpeg\",\"3M Eye Protection Safety Glasses-1734504266\\/1734504266-SafetyGlasses2.jpeg\",\"3M Eye Protection Safety Glasses-1734504266\\/1734504266-SafetyGlasses3.jpeg\"]', '2024-12-17 22:44:26', '2024-12-17 22:44:26'),
('9dc0938e-1037-498c-bba4-6b4040083320', '652fdb78-bcf9-11ef-94fb-18cc18b68450', 'Acrylic Varnish', 'MTN PRO Acrylic Varnish is made with solvent-based thermoplastic acrylic resins. Ultra-fast drying, its main function is to protect and protect different surfaces. It can be applied for indoor and outdoor use on a multitude of materials in order to increase surface protection in three finishes: glossy, satin or matt.', 45.00, 1209, '[\"Acrylic Varnish-1734504348\\/1734504348-AcrylicVarnish1.jpeg\",\"Acrylic Varnish-1734504348\\/1734504348-AcrylicVarnish2.jpeg\",\"Acrylic Varnish-1734504348\\/1734504348-AcrylicVarnish3.jpeg\"]', '2024-12-17 22:45:48', '2024-12-17 22:45:48'),
('9dc0943d-7c22-49fd-ae50-26f85594ab7f', '652fdb78-bcf9-11ef-94fb-18cc18b68450', 'Offerhub Black Paint Rain or Shine', 'Paint is a material or mixture that, when applied to a solid material and allowed to dry, adds a film-like layer. As art, this is used to create an image or images known as a painting. Paint can be made in many colors and types. Most paints are either oil-based or water-based, and each has distinct characteristics.', 199.00, 192, '[\"Offerhub Black Paint Rain or Shine-1734504463\\/1734504463-Blackpaint1.jpeg\",\"Offerhub Black Paint Rain or Shine-1734504463\\/1734504463-Blackpaint3.jpeg\"]', '2024-12-17 22:47:43', '2024-12-17 22:47:43'),
('9dc0949f-206d-4c12-8b77-42a367068c1f', '652fdb78-bcf9-11ef-94fb-18cc18b68450', 'Offerhub Blue Paint', 'Paint is a material or mixture that, when applied to a solid material and allowed to dry, adds a film-like layer. As art, this is used to create an image or images known as a painting. Paint can be made in many colors and types. Most paints are either oil-based or water-based, and each has distinct characteristics.', 189.00, 384, '[\"Offerhub Blue Paint-1734504527\\/1734504527-BluePaint1.jpeg\",\"Offerhub Blue Paint-1734504527\\/1734504527-BluePaint2.jpeg\",\"Offerhub Blue Paint-1734504527\\/1734504527-BluePaint3.jpeg\"]', '2024-12-17 22:48:47', '2024-12-17 22:48:47'),
('9dc0950b-6e01-44b8-927f-8802038de7e4', '652fdb78-bcf9-11ef-94fb-18cc18b68450', 'Offerhub Marine Varnish', 'The vernis marin is intended to preserve and embellish the wood of your ship. It allows to protect it from the various aggressions brought by the navigation and is used consequently on traditional boats. You can apply it inside as well as outside.The protection given to your wood will increase the life of your boat. A well applied varnish can easily last several years without additional maintenance, depending on the climate (extreme or moderate) and the water that reaches the paint.', 291.00, 172, '[\"Offerhub Marine Varnish-1734504598\\/1734504598-MarineVarnish1.jpeg\",\"Offerhub Marine Varnish-1734504598\\/1734504598-MarineVarnish3.jpeg\"]', '2024-12-17 22:49:58', '2024-12-17 22:49:58'),
('9dc09578-7ec0-4bd3-b955-f99d0c9016fa', '652fdb60-bcf9-11ef-94fb-18cc18b68450', 'Adjustable Wrench Set', 'An adjustable wrench is an open-end wrench with a removable jaw. The uses of adjustable wrench is the same as any other conventional wrench - to hold fasteners, such as nuts and bolts. The difference is that only an adjustable wrench can hold all sizes of fasteners due to its movable jaws.', 589.00, 289, '[\"Adjustable Wrench Set-1734504669\\/1734504669-AdjustableWrenchSet1.jpeg\",\"Adjustable Wrench Set-1734504669\\/1734504669-AdjustableWrenchSet2.jpeg\",\"Adjustable Wrench Set-1734504669\\/1734504669-AdjustableWrenchSet3.jpeg\"]', '2024-12-17 22:51:09', '2024-12-17 22:51:09'),
('9dc095e0-536e-4cdd-b971-75eb1811e376', '652fdb60-bcf9-11ef-94fb-18cc18b68450', 'Hack Saw', 'A hacksaw is a fine-toothed saw, originally and mainly made for cutting metal. The equivalent saw for cutting wood is usually called a bow saw. Most hacksaws are hand saws with a C-shaped walking frame that holds a blade under tension.', 80.00, 120, '[\"Hack Saw-1734504737\\/1734504737-HackSaw1.jpeg\",\"Hack Saw-1734504737\\/1734504737-HackSaw2.jpeg\",\"Hack Saw-1734504737\\/1734504737-HackSaw3.jpeg\"]', '2024-12-17 22:52:17', '2024-12-17 22:52:17'),
('9dc0972f-8fe4-4979-b4fc-ba020b514e8e', '652fdb60-bcf9-11ef-94fb-18cc18b68450', 'Screw Drivers Kit', 'A screwdriver is a hand tool used to insert or remove screws. It has a handle at one end and a metal rod with a tip at the other end that fits into the screw head. The tip of a screwdriver is shaped to fit the screw\'s driving surfaces, such as slots, grooves, or recesses.', 495.00, 384, '[\"Screw Drivers Kit-1734504957\\/1734504957-ScrewDrivers1.jpeg\",\"Screw Drivers Kit-1734504957\\/1734504957-ScrewDrivers2.jpeg\",\"Screw Drivers Kit-1734504957\\/1734504957-ScrewDrivers3.jpeg\"]', '2024-12-17 22:55:57', '2024-12-17 22:55:57'),
('9dc097c6-e5d2-4dd9-ac2b-1829b3b8eeca', '652fdb09-bcf9-11ef-94fb-18cc18b68450', 'Miter Saw', 'A miter saw is a specialized tool that lets you make cuts at a variety of angles. The saw has a blade mounted on a swing arm that pivots left or right to produce angled cuts. You can use a miter saw to quickly make cuts for crown moulding, picture frames, door frames, window casings and more.', 2918.00, 138, '[\"Miter Saw-1734505056\\/1734505056-MilterSaw1.jpeg\"]', '2024-12-17 22:57:36', '2024-12-17 22:57:36'),
('9dc0981d-2182-41c8-b733-ebe1df9b9441', '652fdb09-bcf9-11ef-94fb-18cc18b68450', 'Angle Grinder', 'An angle grinder has a motor that drives a geared head with a disc or blade attached. The disc or blade spins at high speeds to grind, polish, or cut. Angle grinders can be powered by electricity or compressed air.', 1599.00, 200, '[\"Angle Grinder-1734505113\\/1734505113-AngleGrinder1.jpeg\",\"Angle Grinder-1734505113\\/1734505113-AngleGrinder2.jpeg\",\"Angle Grinder-1734505113\\/1734505113-AngleGrinder3.jpeg\"]', '2024-12-17 22:58:33', '2024-12-17 22:58:33'),
('9dc0beb7-cc9a-4134-ac27-2c73bd4032c0', '652fdb60-bcf9-11ef-94fb-18cc18b68450', 'Screwdriver', 'This is a screwdriver set with different heads for different purposes.', 100.00, 200, '[\"Screwdriver-1734511589\\/1734511589-ScrewDrivers1.jpeg\",\"Screwdriver-1734511589\\/1734511589-ScrewDrivers2.jpeg\",\"Screwdriver-1734511589\\/1734511589-ScrewDrivers3.jpeg\"]', '2024-12-18 00:46:29', '2024-12-18 00:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hZqrxVh6iDct7k6hn54bOxFO5J2733DLILUwpz6y', '9dc07042-2e41-4eaf-bb28-d376bafcabc6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT04yVmtvZ00yWUg3bDA1emhDc1hSMjhQZFNyRFR5azk0Y3NUZHhYdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM2OiI5ZGMwNzA0Mi0yZTQxLTRlYWYtYmIyOC1kMzc2YmFmY2FiYzYiO30=', 1734525238);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('9dc07042-2e41-4eaf-bb28-d376bafcabc6', 'Jonas Lacandola', 'jlacandola0@gmail.com', NULL, '$2y$12$vlUIxRJvEQGe0Xh.MebX.uHNZmlScTMdIzVTu1eLBiXDXKa.1nKm.', NULL, '2024-12-17 21:07:07', '2024-12-17 21:07:07'),
('9dc0a420-cbde-463e-bb9b-3f3c5a4af761', 'Iver Allen', 'iverallen@gmail.com', NULL, '$2y$12$IibCK02AuLg909FucDs7Wek17ela.vAuPjAlq.lnHB1JlKr1B0tBK', NULL, '2024-12-17 23:32:08', '2024-12-17 23:32:08'),
('9dc0b34c-4e3a-4c06-8b86-3e622a5e8e94', 'Cedric Alavarizz', 'cedricalavarizz@gmail.com', NULL, '$2y$12$ckj24vkqBokuqr2q9HmMd.8Willsn6ZHiMo0mMnkuMJBUFwdnMkUW', NULL, '2024-12-18 00:14:34', '2024-12-18 00:14:34'),
('9dc0bfd9-16ea-431e-8bfb-a19abb4163c9', 'Jonas Bautista', 'jonasbaustista@gmail.com', NULL, '$2y$12$Q6psw1psY3PpWxaCa3h90ebXysrh267M3Jh3mf2OtL92IMcLRekmi', NULL, '2024-12-18 00:49:39', '2024-12-18 00:49:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_userid_foreign` (`userId`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_cartid_foreign` (`cartId`),
  ADD KEY `cart_product_productid_foreign` (`productId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userId`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_orderid_foreign` (`orderId`),
  ADD KEY `order_product_productid_foreign` (`productId`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cartid_foreign` FOREIGN KEY (`cartId`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_orderid_foreign` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
