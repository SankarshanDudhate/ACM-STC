
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `username` tinytext NOT NULL,
  `pass` char(5) NOT NULL,
  `passHash` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `pass`, `passHash`) VALUES
(1, 'sandudhate', 'qwer', '$2y$10$PhcNetqYehThVIcUhgbz3OZZ6Lchn5ILDcI9ESU4kieJ8uIAFACyW');
