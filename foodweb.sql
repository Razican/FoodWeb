-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2014 a las 22:23:05
-- Versión del servidor: 5.5.40-0ubuntu1
-- Versión de PHP: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `foodweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `brand` varchar(30) NOT NULL,
  `price` smallint(5) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `hall` tinyint(1) unsigned NOT NULL,
  `shelf` tinyint(1) unsigned NOT NULL,
  `gluten` tinyint(1) unsigned NOT NULL,
  `diabetes` tinyint(1) unsigned NOT NULL,
  `vegetables` tinyint(1) unsigned NOT NULL,
  `milk` tinyint(1) unsigned NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `brand`, `price`, `description`, `hall`, `shelf`, `gluten`, `diabetes`, `vegetables`, `milk`) VALUES
(1, 'Pringles', 5, 'Pringles', 255, 'Do you have a taste for something tangy or a craving for a snack with a kick? Explore the cans to uncover your perfect Pringles flavour fit.', 4, 1, 0, 1, 1, 1),
(2, 'Milk', 4, 'Valio', 115, 'All Valio milk and whey powders are produced from the highest quality raw material – the pure and natural goodness of Finnish milk.', 1, 1, 1, 1, 1, 0),
(3, 'Lactose-free Milk', 4, 'Valio', 120, 'All Valio milk and whey powders are produced from the highest quality raw material – the pure and natural goodness of Finnish milk.', 1, 2, 1, 1, 1, 1),
(4, 'Cookies', 5, 'Tasangon', 165, 'Tasangon chocolate cookies 400g', 4, 2, 1, 0, 1, 1),
(5, 'Chocolate', 5, 'Karl Fazer', 125, 'The Karl Fazer signature has been the sign of Fazer quality since 1891, enjoy the taste of Fazer tradition in this unique milk chocolate made with fresh milk.', 4, 2, 1, 0, 1, 0),
(6, 'Pork meat', 2, 'Dia', 199, 'Best pork meat from Spain.', 2, 1, 1, 1, 1, 1),
(7, 'Onion', 0, 'Dia', 100, 'Little onions for salads', 3, 1, 1, 1, 0, 1),
(8, 'Beer', 4, 'Koff', 102, '33cl beer can', 1, 1, 0, 1, 1, 1),
(9, 'Cheese Snacks', 5, 'Lays', 113, 'Cheese flavoured potatoes', 4, 1, 0, 0, 0, 1),
(10, 'Salmon', 3, 'Dia', 99, '1kg of norwegian fresh salmon..', 2, 2, 1, 1, 1, 1),
(11, 'Pepsi', 4, 'Pepsi', 75, '33cl pepsi can.', 1, 1, 1, 0, 1, 1),
(12, 'Pepsi Max', 4, 'Pepsi', 170, '2l pepsi bottle.', 1, 1, 1, 1, 1, 1),
(13, 'Tuna in oil', 3, 'Rainbow', 120, '250 gr of spanish tuna in olive oil.', 3, 1, 1, 0, 1, 1),
(14, 'Oranges', 1, 'Dia', 99, '1 kg of spanish highest quality onions.', 3, 1, 1, 0, 1, 1),
(15, 'Sacher cake', 5, 'Fazer', 1099, 'Sacher cake made in the Austrian way.', 4, 2, 0, 0, 1, 0),
(16, 'Meat for Hamburger', 2, 'Dia', 456, '700gr of meat ready to fry', 2, 1, 0, 0, 0, 0),
(17, 'Cider', 4, 'Rainbow', 132, '33cl apple cider can.', 1, 2, 0, 0, 1, 1),
(18, 'Potatoes', 0, 'Dia', 78, '1kg of Suomi clean potatoes', 3, 2, 1, 1, 0, 1),
(19, 'Nutella', 5, 'Nutella', 402, '400 gr glass of nutella', 4, 2, 0, 0, 1, 0),
(20, 'Red Pepper', 0, 'Dia', 79, '500 gr of red pepper', 3, 2, 1, 1, 0, 1),
(21, 'Green Apples', 1, 'Dia', 124, '1 kg of sweet Italian apples.', 3, 1, 1, 0, 0, 1),
(22, 'BBQ Chicken wings', 2, 'Arla', 345, '1kg of spicy chicken BBQ wings', 2, 1, 0, 1, 1, 0),
(23, 'Integral bread', 4, 'X-tra', 233, '500 gr of integral toasts full of fibre.', 4, 2, 0, 0, 1, 0),
(24, 'Maria biscuits', 4, 'Hacendado', 87, '400 gr of Spanish maria biscuits', 4, 2, 0, 0, 1, 0),
(25, 'Anana', 1, 'Del Monte', 229, '1kg of South American anana', 3, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `confirmation` char(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(40) NOT NULL,
  `health_issues` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`session_id`,`ip_address`,`user_agent`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `confirmation` (`confirmation`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
