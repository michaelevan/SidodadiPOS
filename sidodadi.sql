-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 07:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidodadi`
--
CREATE DATABASE IF NOT EXISTS `sidodadi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sidodadi`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `fk_supplier` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(6) NOT NULL,
  `min_stok` int(2) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `tgl_exp` date DEFAULT current_timestamp(),
  `deskripsi_barang` varchar(250) DEFAULT NULL,
  `diskon` varchar(1) NOT NULL COMMENT 'Y=diskon; N=tidak',
  `img` varchar(5000) DEFAULT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 tidak aktif; 1 aktif',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `fk_supplier`, `satuan`, `nama_barang`, `jumlah_barang`, `min_stok`, `harga_pokok`, `harga_jual`, `tgl_exp`, `deskripsi_barang`, `diskon`, `img`, `is_active`, `updated_at`, `created_at`) VALUES
(1, 6, 1, 'Indomie Mie Goreng', 50, 10, 4000, 5000, '2023-04-13', NULL, 'N', 'images (1).jpg', 1, '2022-12-14', '2022-12-14'),
(2, 6, 1, 'Indomie Rasa Soto Mie', 80, 10, 5000, 8000, '2023-06-21', NULL, 'N', '1ba2420d-0dde-401c-9a71-ff14d71ed816.jpg', 1, '2022-12-14', '2022-12-14'),
(3, 6, 1, 'Indomie Rasa Ayam Bawang', 100, 30, 7000, 8000, '2023-06-14', NULL, 'N', '35e455a417c336e0245b2fcda1c4e398.jfif', 1, '2022-12-14', '2022-12-14'),
(4, 6, 1, 'Indomie Kari Ayam', 60, 10, 5000, 7000, '2023-07-13', NULL, 'N', '95ac36cb95985ae503f152670565fa22.jpg', 1, '2022-12-14', '2022-12-14'),
(5, 6, 1, 'Indomie Mi Goreng Aceh', 100, 12, 5000, 6000, '2023-06-09', 'Indomie Mi Goreng Aceh\r\nBerat : 80g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', 'a2637da4-353d-4a96-b57e-604cf8ff08e1.jpg', 1, '2022-12-14', '2022-12-14'),
(6, 6, 1, 'Indomie Mi Goreng Jumbo', 70, 11, 5000, 6000, '2023-05-19', 'Indomie Mi Goreng Jumbo\r\nBerat : 129g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', 'download (3).jfif', 1, '2022-12-14', '2022-12-14'),
(7, 6, 1, 'Indomie Mi Goreng Ayam Geprek', 70, 12, 5000, 6000, '2023-06-22', 'Indomie Mi Goreng Ayam Geprek\r\nBerat : 85g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', '6db3baf9bdcbdebc4dd0047ccde9a4ea.jpg', 1, '2022-12-14', '2022-12-14'),
(8, 4, 1, 'Indomie Pop Mie', 90, 15, 3000, 5000, '2023-07-19', 'Indomie Pop Mie\r\nBerat : 39g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', 'd95647b533303071ca0b7e0ecc3b091a.jfif', 1, '2022-12-14', '2022-12-14'),
(9, 3, 1, 'Indomie Mie Goreng Rasa Ayam Pop', 50, 10, 5000, 6000, '2023-06-20', 'Indomie Mie Goreng Rasa Ayam Pop\r\nBerat : 85g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', 'c85c4a84-5e46-4dfb-b177-7105385ec474.png', 1, '2022-12-14', '2022-12-14'),
(10, 2, 1, 'Indomie Mie Rasa Soto Lamongan', 90, 16, 5000, 6000, '2023-08-31', 'Indomie Mie Rasa Soto Lamongan\r\nBerat : 80g\r\nKal : 380\r\nLemak : 12g\r\nKarb : 52g\r\nProtein : 8g', 'N', 'bf26b9b2b1b431bb63b27a657f582dca.jfif', 1, '2022-12-14', '2022-12-14'),
(11, 1, 1, 'Good Day Cappuccino', 100, 10, 3000, 4000, '2023-05-19', 'Good Day Cappuccino\r\nBerat : 25g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'b621b2244adfd5c4a76cfdd2477ca79b.jfif', 1, '2022-12-14', '2022-12-14'),
(12, 3, 1, 'Good Day Mocacinno', 120, 10, 5000, 6000, '2023-05-18', 'Good Day Mocacinno\r\nBerat : 25g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'kiS000010738-4.jpg', 1, '2022-12-14', '2022-12-14'),
(13, 3, 1, 'Good Day Coffee Freeze', 150, 10, 3000, 5000, '2023-07-12', 'Good Day Coffee Freeze\r\nBerat : 25g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'download (4).jfif', 1, '2022-12-14', '2022-12-14'),
(14, 3, 1, 'Good Day Originale Cappucino', 60, 10, 6000, 7000, '2023-06-29', 'Good Day Originale Cappucino 250ml\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '71160237_c937cda2-efa9-4f8e-838f-b54e891ed1f3_959_959.jfif', 1, '2022-12-14', '2022-12-14'),
(15, 3, 1, 'Good Day Carrebian Nut', 90, 10, 3000, 4500, '2023-07-26', 'Good Day Carrebian Nut\r\nBerat : 25g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '737bf701279d28b369893e0888aef406.jfif', 1, '2022-12-14', '2022-12-14'),
(16, 3, 1, 'Good Day Avocado Delight Coffee', 100, 10, 5000, 6500, '2023-07-20', 'Good Day Avocado Delight Coffee 250 ml\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '5b4bf150-132c-42af-8b90-2945841c8794.jpg', 1, '2022-12-14', '2022-12-14'),
(17, 3, 1, 'Good Day Mocca Latte Coffe', 180, 10, 5000, 6000, '2023-07-25', 'Good Day Mocca Latte Coffe 200 ml\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'fef58a7454e9e866eb65386e788cdb489ece9f6d-original.jpg', 1, '2022-12-14', '2022-12-14'),
(18, 3, 1, 'Good Day Tiramisu Bliss Coffee', 100, 10, 5000, 7500, '2023-06-22', 'Good Day Tiramisu Bliss Coffee 250 ml\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '43f4d242-8b37-4b4a-99cd-c77d3832b4e5.jpg', 1, '2022-12-14', '2022-12-14'),
(19, 3, 1, 'Good Day Coffee Freeze Choc\' Orange', 100, 10, 5000, 6500, '2023-05-24', 'Good Day Coffee Freeze Choc\' Orange\r\nBerat : 30g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '1471f33187cc24d750180c0b1becb8df.jfif', 1, '2022-12-14', '2022-12-14'),
(20, 3, 1, 'Good Day Funtastic Mocacinno', 100, 15, 6000, 8000, '2023-08-23', 'Good Day Funtastic Mocacinno\r\nBerat : 25g\r\nKal : 110\r\nLemak : 2,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '24dfc4a7-ab1f-443e-8c35-b9ec68c1b700.jpg', 1, '2022-12-14', '2022-12-14'),
(21, 5, 1, 'SuperMi Supermi Extra Rasa Soto Daging', 200, 10, 3000, 5000, '2023-06-28', 'SuperMi Supermi Extra Rasa Soto Daging\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'Supermi_Extra_Rasa_Soto_Daging_X_10_Pcs.jpg', 1, '2022-12-14', '2022-12-14'),
(22, 5, 1, 'SuperMi Nutrimi Rasa Steak Ayam', 200, 10, 3000, 4000, '2023-06-29', 'SuperMi Nutrimi Rasa Steak Ayam\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', '6a79a43f6f61ec9d42c52f7544eae646.jfif', 1, '2022-12-14', '2022-12-14'),
(23, 5, 1, 'SuperMi Mie Goreng Ayam Pangsit', 200, 10, 3000, 5000, '2023-06-01', 'SuperMi Mie Goreng Ayam Pangsit\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'defab4939a173a059a9f203c5c56e853.jfif', 1, '2022-12-14', '2022-12-14'),
(24, 5, 1, 'SuperMi Nutrimi Rasa Steak Ayam', 200, 10, 3000, 5000, '2023-05-24', 'SuperMi Nutrimi Rasa Steak Ayam\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', '6a79a43f6f61ec9d42c52f7544eae646.jfif', 1, '2022-12-14', '2022-12-14'),
(25, 5, 1, 'SuperMi Nutrimi', 100, 10, 3000, 5000, '2023-06-21', 'SuperMi Nutrimi\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'b01f2920988a8bfafc2469974c4c7f53.jfif', 1, '2022-12-14', '2022-12-14'),
(26, 5, 1, 'SuperMi Sup Sayuran', 200, 10, 5000, 8000, '2023-07-19', 'SuperMi Sup Sayuran\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', '71713ef5c269c4f078924100afd2f97e.jpg', 1, '2022-12-14', '2022-12-14'),
(27, 5, 1, 'SuperMi Mie Goreng Sedaaap', 60, 14, 6000, 7000, '2023-06-21', 'SuperMi Mie Goreng Sedaaap\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'download (3).jfif', 1, '2022-12-14', '2022-12-14'),
(28, 5, 1, 'SuperMi Rasa Sop Buntut', 200, 10, 4000, 5000, '2023-07-19', 'SuperMi Rasa Sop Buntut\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'Supermi_Sop_Buntut_75G.jpg', 1, '2022-12-14', '2022-12-14'),
(29, 5, 1, 'SuperMi Rasa Ayam Spesial', 50, 5, 3000, 5000, '2023-08-22', 'SuperMi Rasa Ayam Spesial\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', 'batch-upload_b68d4c4f-7a73-4513-87ce-4778690a5fdc.jpg', 1, '2022-12-14', '2022-12-14'),
(30, 5, 1, 'SuperMi Rasa Semur Ayam Pedas', 80, 5, 5000, 6000, '2023-06-28', 'SuperMi Rasa Semur Ayam Pedas\r\nBerat : 100g\r\nKal : 440\r\nLemak : 15g\r\nKarb : 65g\r\nProtein : 9g', 'N', '0a5b63eb3953d7f5c4693c7421465bc6.jfif', 1, '2022-12-14', '2022-12-14'),
(31, 1, 1, 'Sarimi Rasa Baso Sapi', 100, 10, 6000, 7000, '2023-08-23', 'Sarimi Rasa Baso Sapi\r\nBerat : 77g\r\nKal : 360\r\nLemak : 15g\r\nKarb : 49g\r\nProtein : 7g', 'N', 'f4a569006674093531da1c77a3542da2.jfif', 1, '2022-12-14', '2022-12-14'),
(32, 1, 1, 'Sarimi Isi 2 Mi Goreng Rasa Ayam Kremes', 100, 10, 5000, 8000, '2023-10-24', 'Sarimi Isi 2 Mi Goreng Rasa Ayam Kremes\r\nBerat : 125g\r\nKal : 580\r\nLemak : 26g\r\nKarb : 78g\r\nProtein : 10g', 'N', '20045181_1.jpg', 1, '2022-12-14', '2022-12-14'),
(33, 1, 1, 'Sarimi Isi 2 Mi Goreng Rasa Ayam Kecap', 50, 10, 4000, 6000, '2023-07-19', 'Sarimi Isi 2 Mi Goreng Rasa Ayam Kecap\r\nBerat : 125g\r\nKal : 580\r\nLemak : 26g\r\nKarb : 78g\r\nProtein : 10g', 'N', '10004327_1.jpg', 1, '2022-12-14', '2022-12-14'),
(34, 1, 1, 'Sarimi Mie Gelas Rasa Sosis', 200, 10, 2000, 3000, '2023-07-10', 'Sarimi Mie Gelas Rasa Sosis\r\nBerat : 28g\r\nKal : 120\r\nLemak : 4,5g\r\nKarb : 17g\r\nProtein : 3g', 'N', 'download (4).jfif', 1, '2022-12-14', '2022-12-14'),
(35, 1, 1, 'Sarimi Gelas Baso Sapi', 100, 10, 2000, 4000, '2023-08-23', 'Sarimi Gelas Baso Sapi\r\nBerat : 30g\r\nKal : 140\r\nLemak : 6g\r\nKarb : 18g\r\nProtein : 2g', 'N', 'f03015e436a75c7b4f7b985aae03b0b5.jfif', 1, '2022-12-14', '2022-12-14'),
(36, 1, 1, 'Sarimi Kaldu Ayam', 100, 15, 3000, 5000, '2023-09-11', 'Sarimi Kaldu Ayam\r\nBerat : 77g\r\nKal : 360\r\nLemak : 15g\r\nKarb : 49g\r\nProtein : 7g', 'N', '3e50353f-934f-424e-9547-a3122d9c5c17.jpg', 1, '2022-12-14', '2022-12-14'),
(37, 1, 1, 'Sarimi Rasa Ayam', 100, 15, 5000, 6000, '2023-09-19', 'Sarimi Rasa Ayam\r\nBerat : 77g\r\nKal : 360\r\nLemak : 15g\r\nKarb : 49g\r\nProtein : 7g', 'N', '126ec8ac-6c99-4a46-9fde-495b487b90cd.jpg', 1, '2022-12-14', '2022-12-14'),
(38, 1, 1, 'Sarimi Isi 2 Rasa Kari Spesial', 100, 20, 5000, 6000, '2023-08-21', 'Sarimi Isi 2 Rasa Kari Spesial\r\nBerat : 125g\r\nKal : 580\r\nLemak : 26g\r\nKarb : 78g\r\nProtein : 10g', 'N', '5105657_7dd3801f-cd2c-40ce-a345-81953141de81_500_500.jfif', 1, '2022-12-14', '2022-12-14'),
(39, 1, 1, 'Sarimi Sarimi Gelas Rasa Kari Ayam', 60, 5, 5000, 7000, '2023-08-29', 'Sarimi Sarimi Gelas Rasa Kari Ayam\r\nBerat : 30g\r\nKal : 140\r\nLemak : 8g\r\nKarb : 16g\r\nProtein : 3g', 'N', 'download (5).jfif', 1, '2022-12-14', '2022-12-14'),
(40, 4, 1, 'Mie Sedaap Mie Goreng', 80, 10, 5000, 7000, '2023-11-23', 'Mie Sedaap Mie Goreng\r\nBerat : 77g\r\nKal : 360\r\nLemak : 15g\r\nKarb : 49g\r\nProtein : 7g', 'N', '78b5beaa0bb92f7b38ac2c1b6a43cf3d.jfif', 1, '2022-12-14', '2022-12-14'),
(41, 4, 1, 'Indomilk Susu Kental Manis', 200, 10, 3000, 5000, '2023-11-22', 'Indomilk Susu Kental Manis\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '932ab3dbb9476f07d38d1c7e250a7395.jfif', 1, '2022-12-14', '2022-12-14'),
(42, 4, 1, 'Indomilk Susu Kental Manis Cokelat', 200, 10, 3000, 5000, '2023-10-18', 'Indomilk Susu Kental Manis Cokelat\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'INDOMILK_Susu_Kental_Manis_Cokelat_Sachet_6_x_37g.jpg', 1, '2022-12-14', '2022-12-14'),
(43, 4, 1, 'Indomilk Susu Full Cream', 100, 10, 5000, 6000, '2023-09-12', 'Indomilk Susu Full Cream 250ml\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '13682258_a455e69a-28b1-459a-9fc1-b7b05c5b1bc0_720_720.jfif', 1, '2022-12-14', '2022-12-14'),
(44, 4, 1, 'Indomilk Susu UHT Kids Cokelat', 50, 10, 4000, 5000, '2023-08-15', 'Indomilk Susu UHT Kids Cokelat 115ml\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '18597345_9b88315e-2271-43cd-9fd1-2bbbda8fc57f_527_527.jfif', 1, '2022-12-14', '2022-12-14'),
(45, 4, 1, 'Indomilk Susu Steril Plain', 100, 10, 5000, 6000, '2023-06-21', 'Indomilk Susu Steril Plain 189ml\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'A7800270002167_A7800270002167_20220819104809076_base.jpg', 1, '2022-12-14', '2022-12-14'),
(46, 5, 1, 'Tango Wafer Chocolate', 100, 10, 5000, 6000, '2023-06-22', 'Tango Wafer Chocolate\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'e4828ec769d4add225a3f0d6a255a993.jfif', 1, '2022-12-14', '2022-12-14'),
(47, 5, 1, 'Tango Wafer Vanilla', 90, 10, 5000, 7000, '2023-08-29', 'Tango Wafer Vanilla\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'e94629effec767cb4ddb6408baf0a5bb.jfif', 1, '2022-12-14', '2022-12-14'),
(48, 5, 1, 'Tango Waffle Choco Hazelnut', 100, 10, 5000, 6000, '2023-07-19', 'Tango Waffle Choco Hazelnut\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '2aa9f46f-f16e-4826-9252-e2d08fec8068.jpg', 1, '2022-12-14', '2022-12-14'),
(49, 5, 1, 'Tango Susu Pisang', 50, 10, 6000, 7000, '2023-05-24', 'Tango Susu Pisang\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', '29f529f2505f8290e0ab0c0a65d98c4a.jfif', 1, '2022-12-14', '2022-12-14'),
(50, 5, 1, 'Tango Choco Javamocca', 100, 10, 5000, 7000, '2023-11-23', 'Tango Choco Javamocca\r\nBerat : 37g\r\nKal : 120\r\nLemak : 3,5g\r\nKarb : 21g\r\nProtein : 1g', 'N', 'products_475833_image_B665_97135847.jpg', 1, '2022-12-14', '2022-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `faktur_pembelian`
--

DROP TABLE IF EXISTS `faktur_pembelian`;
CREATE TABLE `faktur_pembelian` (
  `no_faktur` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_bayar` int(1) NOT NULL,
  `supplier` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `harga` int(9) NOT NULL,
  `disc1` int(6) DEFAULT NULL,
  `disc2` int(2) DEFAULT NULL,
  `disc3` int(2) DEFAULT NULL,
  `disc4` int(2) DEFAULT NULL,
  `harga_net` int(9) NOT NULL,
  `grandtotal` int(9) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 = tidak aktif ; 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faktur_penjualan`
--

DROP TABLE IF EXISTS `faktur_penjualan`;
CREATE TABLE `faktur_penjualan` (
  `no_faktur` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang_supplier` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `harga` int(9) NOT NULL,
  `disc1` int(6) DEFAULT NULL,
  `disc2` int(2) DEFAULT NULL,
  `disc3` int(2) DEFAULT NULL,
  `disc4` int(2) DEFAULT NULL,
  `harga_net` int(9) NOT NULL,
  `grandtotal` int(12) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 = tidak aktif; 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_transaksi`
--

DROP TABLE IF EXISTS `h_transaksi`;
CREATE TABLE `h_transaksi` (
  `kode_h_trans` int(11) NOT NULL,
  `tgl_h_trans` date NOT NULL DEFAULT current_timestamp(),
  `grandtotal` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `kode_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(10) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 tidak aktif; 1 aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kode_satuan`, `nama_satuan`, `is_active`) VALUES
(3, 'dus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `exp` date NOT NULL,
  `fk_barang` int(11) NOT NULL,
  `fk_besaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `kode_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `NPWP` varchar(16) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `no_rekening` varchar(12) NOT NULL,
  `nama_pajak` varchar(50) NOT NULL,
  `alamat_pajak` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 tidak aktif; 1 aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `kota`, `no_telp`, `NPWP`, `nama_bank`, `no_rekening`, `nama_pajak`, `alamat_pajak`, `is_active`) VALUES
(1, 'CV. KARYA ABADI', 'JL. KALIBUTUH NO. 193-197', 'Surabaya', '087893881523', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. KALIBUTUH NO. 193-197', 1),
(2, 'PT. SEKAR NUSA BARUNA', 'JL.  VILLA BUKIT MAS', 'Surabaya', '087893883152', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL.  VILLA BUKIT MAS', 1),
(3, 'PT. SURYA PRATISTA UTAMA', 'JL. RAYA SUKO KM.03', 'Surabaya', '087893883159', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. RAYA SUKO KM.03', 1),
(4, 'PT. SAVORY CITRASARI INDAH', 'JL. BREBEK INDUSTRI V NO.19', 'Sidoarjo', '087893883182', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. BREBEK INDUSTRI V NO.19', 1),
(5, 'CV. SUKSES MAKMUR', 'JL. PERUM GRAHA CANDI MAS A5', 'Sidoarjo', '087893881095', '1234567891234567', 'BRI', '123456789123', 'Pajak', 'JL. PERUM GRAHA CANDI MAS A5', 1),
(6, 'PT. INDOMARCO ADI PRIMA', 'JL. RUNGKUT INDUSTRI RAYA NO.11A', 'Surabaya', '087893881658', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. RUNGKUT INDUSTRI RAYA NO.11A', 1),
(7, 'PT. UNIRAMA DUTA NIAGA', 'JL. TEMBOK', 'Surabaya', '087893882781', '1234567891234567', 'BRI', '123456789123', 'Pajak', 'JL. TEMBOK', 1),
(8, 'PT. DWI SURYA PERKASA', 'JL. KALIANAK BARAT 55', 'Surabaya', '087893888270', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. KALIANAK BARAT 55', 1),
(9, 'PT. BAYAGO AGUNG', 'JL. MARGOMULYO INDUSTRI IV B', 'Surabaya', '087893884678', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. MARGOMULYO INDUSTRI IV B', 1),
(10, 'PT. TIRTA NUSA', 'JL. BARUK', 'Surabaya', '087893881890', '1234567891234567', 'BCA', '123456789123', 'Pajak', 'JL. BARUK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `kode_trans` int(11) NOT NULL,
  `kode_h_trans` int(11) NOT NULL,
  `tanggal_exp` date NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `kode_supplier` int(11) DEFAULT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(6) NOT NULL,
  `disc1` int(6) DEFAULT NULL,
  `disc2` int(2) DEFAULT NULL,
  `disc3` int(2) DEFAULT NULL,
  `disc4` int(2) DEFAULT NULL,
  `subtotal` int(9) NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0 = tidak aktif; 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `role` varchar(12) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`, `is_active`) VALUES
('ben', 'ben123', 'pegawai', 1),
('bryan', 'bryan123', 'pegawai', 1),
('budi', 'budi123', 'pegawai', 1),
('evan', 'evan123', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `fk_supplier` (`fk_supplier`);

--
-- Indexes for table `faktur_pembelian`
--
ALTER TABLE `faktur_pembelian`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `kode_supplier` (`supplier`);

--
-- Indexes for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `h_transaksi`
--
ALTER TABLE `h_transaksi`
  ADD PRIMARY KEY (`kode_h_trans`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_trans`),
  ADD KEY `fk_barang` (`kode_barang`),
  ADD KEY `fk_supplier` (`kode_supplier`),
  ADD KEY `fk_transaksi` (`kode_h_trans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `faktur_pembelian`
--
ALTER TABLE `faktur_pembelian`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h_transaksi`
--
ALTER TABLE `h_transaksi`
  MODIFY `kode_h_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `kode_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`fk_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur_pembelian`
--
ALTER TABLE `faktur_pembelian`
  ADD CONSTRAINT `kode_supplier` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`kode_h_trans`) REFERENCES `h_transaksi` (`kode_h_trans`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
