-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 17, 2018 at 04:01 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `millhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'living'),
(2, 'sunglasses'),
(3, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `post_id`, `created_by`, `date`) VALUES
(124, 'This vase would be the perfect gift for my wife!', 5, 6, '2018/12/14 14:44'),
(125, 'Oh my god! That color is A M A Z I N G', 5, 7, '2018/12/14 14:45'),
(126, ' Looking goooooooood.', 6, 8, '2018/12/14 14:47'),
(127, 'A perfect Christmas gift!', 6, 9, '2018/12/14 14:48'),
(128, 'I would love to have that globe at home...', 7, 10, '2018/12/14 14:51'),
(129, 'Oh wow. I need to buy all that!!', 7, 11, '2018/12/14 14:51'),
(130, 'cool shades man!', 9, 12, '2018/12/14 15:22'),
(131, 'Damn they’re fine', 9, 13, '2018/12/14 15:23'),
(132, 'Like the model! :D do they come in more colors?', 9, 14, '2018/12/14 15:24'),
(133, 'I need this watch now, when can buy it?', 11, 3, '2018/12/14 15:28'),
(134, 'I agree with James, will it be available in calf leather?', 11, 4, '2018/12/14 15:29'),
(135, 'This watch is amazing, cant wait to purchase it.', 11, 5, '2018/12/14 15:29'),
(136, 'Love these! Would love to have them in silver! :-)', 13, 15, '2018/12/14 15:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `created_by` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `date`, `image`, `content`, `created_by`, `id_category`) VALUES
(5, 'Blue shadow vase - by Carlos', '2018/12/14 14:42', '../images/uploads/hej.jpg', '<p>This blue beautiful vase, you must have your home in the bookshelf. Use it as a detail or fill it with the flowers you love. Carlos was inspired by the Swedish summer when he created the design. WE LOVE IT!<br></p>', 1, 1),
(6, 'Classic Reading band', '2018/12/14 14:46', '../images/uploads/cool_klocka2.jpeg', '<p><span class=\"s1\">The reflective rose gold details will make a stunning appearance on your wrist,<br></span><span class=\"s1\">whatever the occasion is. The reflective sunray dial includes carefully hand-applied rose gold indexes and markers that expresses different hues of gold. All this is bound together with the perfectly detailed Italian full-grain leather strap. The movement can be considered to be the true heart of the watch. With reliability and accuracy in mind, our Berkeley collection features the Miyota GL20 movement, that has been making watches tick for decades.</span></p><p>\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\np.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 11.0px \'Helvetica Neue\'; color: #000000; -webkit-text-stroke: #000000}\r\nspan.s1 {font-kerning: none}\r\n</style>\r\n\r\n\r\n\r\n</p>', 1, 3),
(7, 'We L O V E interior details! ', '2018/12/14 14:50', '../images/uploads/anna-sullivan-642841-unsplash.jpg', '<p>What excites you more than new home furnishings?\r\nWe love to decorate our home with new interior\r\ndetails from around the world. A mix you will love to\r\ndecorate your home with. Find your favorite at\r\nMillhouse and do not forget to share and give us\r\nfeedback in comments or maybe send us an email to\r\nconnect directly with us.<br></p>', 1, 1),
(9, 'Stay shady', '2018/12/14 15:14', '../images/uploads/solglasogon_seattle_marshmallow_marble-side.png', '<p>Even though it may seem a bit far away now, spring is upon us! Although shades fill multiple purposes besides protecting your beautiful eyes from dangerous radiation. You wanna hide your hangover face? Hide from an ex-boyfriend? These crisp beauties will help you do so with class. Whatever your reason is, we’ll have your back.</p><p>Our future mill house stock is gonna be packed with shades in all shapes and colors!We especially love these crisp beauties! Be quick, they’re limited edition too.</p>', 1, 2),
(11, 'WATCH YO SELF', '2018/12/14 15:27', '../images/uploads/watch_post.jpeg', 'With a stylish, eye-catching dial and classic black leather strap, Classic Black Sheffield is an elegant watch that exudes self-confidence and adds attitude to your style. The black and crocodile patterned Classic Reading band is made of genuine Italian leather. Classic Cuff has been designed to reflect the magic beauty of our minimalist watches. Classic Cuffs relaxed yet tasteful style is a tribute to the perfect craftsmanship that lies behind all timeless products from Daniel Wellington.', 1, 3),
(13, 'New launch for spring 19!', '2018/12/14 15:41', '../images/uploads/nya_in_action_11_14.jpg', 'We’re launching these edgy and colourful shades for spring 19’. The ‘Edie’ shades have a bit of old school with a modern twist, clean but never boring! As for now we’re launching them in red, yellow and silver. Which one is your personal favourite?', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(400) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `admin` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `admin`) VALUES
(1, 'admin', '$2y$10$XJ/.ybZBsFkPTkRAx/SxFe9uDFiNUBrLhq446jVbtoD7HSqMgVxH6', 'admin@neverends.com', 'is_admin'),
(3, 'Declan', '$2y$10$a.Gt2kS8w9f6hlg/2ZzL6OpFwojJon1NQePld9fDDuYOEKeFdXQZK', 'hej@declan.se', 'not_admin'),
(4, 'Eliza78', '$2y$10$OmbZTyJu8J7jkbSU6nh4SORImLJrtCpPrnx7/3bWVq8TwsEbxR4cy', 'hej@hej.hej', 'not_admin'),
(5, 'Harvey', '$2y$10$HvtWlp/e8nzstYfVs1YYA.AaSOFgpIewRCCf/fIfd.vnXz6yOAje.', 'hej@hej.hej', 'not_admin'),
(6, 'Tony', '$2y$10$4oMnq45QR9zJUEldqTNX8eVm08skmcVmYqozHU6CsX91egRk8HCrC', 'hej@hej.se', 'not_admin'),
(7, 'Sofia_Larsson', '$2y$10$tsX3y5FvzTIBd8WhEpBs6uMKH4mozMjFIMcMXm2jzlU83hlQx/Uma', 'hej', 'not_admin'),
(8, 'Maddison_hopkins', '$2y$10$rPgaPfYiMAs5YNB41s.T4O4quU6FtAfwi5ZENsw0bMMONRn/JQ7ce', 'hej', 'not_admin'),
(9, 'Melanie_queen', '$2y$10$lwICrgpwTVv5H52deYYU3eGif8hGz5SGlOxdvReALFekt8Oi8OOji', 'hej', 'not_admin'),
(10, 'PabloPear', '$2y$10$7zpfGWIyVowOaLv65JZGAeo5ZO78QMf/oikYWYEkrOSvntJv8YBMS', 'hej', 'not_admin'),
(11, 'Sarah_MacGyver', '$2y$10$9xoQBB8pvpm./WNTcQ9gYedr5cCkWrxETcNvrOhOYW1z0VJLj.gBW', 'hej', 'not_admin'),
(12, 'Joe_N_Driscoll', '$2y$10$zbMtj0PiFy.ZeKHFjOMC9uIVpkjbOceB3A1T8vrjBqYRWKYajgWgG', 'hej', 'not_admin'),
(13, 'Kenneth_rodgers', '$2y$10$n9BaBrazpRhtPc8py4.Vk.RquZxSl28R5V5G6tjdgQtJbPuTUk1t6', 'hej', 'not_admin'),
(14, 'SabrinaL', '$2y$10$a0EauSd71UdGYQkbQ8bmIeA8zd9MR0weiVUbobpRNUi.6aHA4KNAK', 'hej', 'not_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
