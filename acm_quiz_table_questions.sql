
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` smallint(6) NOT NULL COMMENT 'The Question id',
  `output` text NOT NULL COMMENT 'The desired output of the code',
  `marks` tinyint(3) UNSIGNED NOT NULL,
  `options` tinyint(3) UNSIGNED NOT NULL COMMENT 'Number of options',
  `difficulty` tinyint(3) UNSIGNED NOT NULL COMMENT 'The difficulty level of the question: 1,2,3',
  `type` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `output`, `marks`, `options`, `difficulty`, `type`) VALUES
(1, '*\r\n* *\r\n* * *\r\n* * * *\r\n* * * * *\r\n', 2, 7, 2, 0);
