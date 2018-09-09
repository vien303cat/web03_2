-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-09-09 19:13:39
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03_2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `movie_seq` int(10) UNSIGNED NOT NULL,
  `movie_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_long` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_date` date NOT NULL,
  `movie_fa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_lv` int(5) NOT NULL,
  `movie_movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_con` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_display` int(2) NOT NULL,
  `movie_desc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `movie`
--

INSERT INTO `movie` (`movie_seq`, `movie_name`, `movie_long`, `movie_date`, `movie_fa`, `movie_dir`, `movie_lv`, `movie_movie`, `movie_img`, `movie_con`, `movie_display`, `movie_desc`) VALUES
(1, '1111', 'q11', '2018-09-09', 'w11', 'e11', 4, '03B25v.avi', '03B25.png', 'e11', 1, 1),
(2, '222', 'q22', '2018-09-10', 'w222', 'e22', 3, '03B02v.avi', '03B02.png', 'e22', 1, 2),
(3, '333', 'q33', '2019-03-12', 'w33', 'e133', 2, '03B03v.avi', '03B03.png', 'e133', 1, 3),
(6, '444', '4444', '2020-12-01', 'EWQE', 'EQWE', 1, '03B04v.avi', '03B04.png', 'EQWE', 1, 4),
(7, '555', '5555', '2020-04-01', '555', '55', 4, '03B06v.avi', '03B06.png', '55', 1, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `poster_seq` int(10) UNSIGNED NOT NULL,
  `poster_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_desc` int(10) NOT NULL,
  `poster_ani` int(10) NOT NULL,
  `poster_display` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `poster`
--

INSERT INTO `poster` (`poster_seq`, `poster_name`, `poster_img`, `poster_desc`, `poster_ani`, `poster_display`) VALUES
(2, '預告片1', '1536219571.jpg', 1, 1, 1),
(3, '預告片2', '1536219587.jpg', 2, 2, 1),
(4, '預告片3', '1536219594.jpg', 3, 3, 1),
(5, '預告片4', '1536219598.jpg', 4, 2, 1),
(6, '預告片5', '1536219603.jpg', 5, 1, 1),
(7, '預告片6', '1536506393.jpg', 6, 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `tick`
--

CREATE TABLE `tick` (
  `tick_seq` int(10) UNSIGNED NOT NULL,
  `tick_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tick_movieseq` int(10) NOT NULL,
  `tick_date` date NOT NULL,
  `tick_site` int(10) NOT NULL,
  `tick_sit` int(10) NOT NULL,
  `tick_cnt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_seq`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`poster_seq`);

--
-- 資料表索引 `tick`
--
ALTER TABLE `tick`
  ADD PRIMARY KEY (`tick_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `poster`
--
ALTER TABLE `poster`
  MODIFY `poster_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `tick`
--
ALTER TABLE `tick`
  MODIFY `tick_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
