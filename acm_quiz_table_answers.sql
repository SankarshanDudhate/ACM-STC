
-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `qid` smallint(5) UNSIGNED NOT NULL COMMENT 'The Question id the answer belongs to',
  `ansid` tinyint(3) UNSIGNED NOT NULL COMMENT 'An answer id.',
  `code` text NOT NULL COMMENT 'The code ',
  `ansNum` tinyint(3) UNSIGNED NOT NULL COMMENT 'The actual position of the option in the correct order',
  `_ansNum` tinyint(3) UNSIGNED NOT NULL COMMENT 'Position to be given when presented to the user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Test answers table. Column 4 might be useless';

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`qid`, `ansid`, `code`, `ansNum`, `_ansNum`) VALUES
(1, 1, 'for(int i=0; i<5; ++i) {', 1, 2),
(1, 2, 'for(int j=0; j<=i; ++j)', 2, 1),
(1, 3, 'cout<<"* ";', 3, 2),
(1, 4, 'cout<<"\\n";', 4, 1),
(1, 5, '}', 5, 2),
(1, 6, 'for(int j=0; j<=5; j++)', 6, 1),
(1, 7, 'for(int i=0; i<=j; i++) {', 7, 2),
(4, 8, 'Random Answer 42', 2, 1);
