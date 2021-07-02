-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 09:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarian_username` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `book_genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`, `book_genre`) VALUES
(29, 'Left You Dead', '20210606010458.jpg', 'Peter James', 'Macmillan', '2021-06-13', '200', 10, 10, 'tushi07', '2021-06-06 11:04:58', 'Crime'),
(30, 'The Darkest Evening', '20210606010913.jpg', 'Ann Cleeves', 'Pan', '2021-06-15', '120', 12, 12, 'tushi07', '2021-06-06 11:09:13', 'Crime'),
(31, 'Daughters of Night', '20210606011019.jpg', 'Laura Shepherd-Robinson', 'Mantle', '2021-06-14', '200', 15, 15, 'tushi07', '2021-06-06 11:10:19', 'Crime'),
(32, 'The Hobbit', '20210606011610.jpg', 'J.R.R. Tolkien', 'Allen & Unwin', '2021-06-06', '100', 12, 12, 'tushi07', '2021-06-06 11:16:10', 'Fantasy'),
(33, 'The Lion, the Witch, and the Wardrobe', '20210606013218.jpg', 'C.S. Lewis', 'Geoffrey Bles', '2021-06-15', '100', 13, 13, 'tushi07', '2021-06-06 11:32:18', 'Fantasy'),
(34, 'Harry Potter and the Sorcerer\'s Stone', '20210606013429.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '120', 12, 12, 'tushi07', '2021-06-06 11:34:29', 'Fantasy'),
(35, 'Harry Potter and the Chamber of Secrets', '20210606013517.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '120', 12, 12, 'tushi07', '2021-06-06 11:35:17', 'Fantasy'),
(36, 'Harry Potter and the Prisoner of Azkaban', '20210606013653.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '150', 12, 12, 'tushi07', '2021-06-06 11:36:53', 'Fantasy'),
(37, 'Harry Potter and the Goblet of Fire', '20210606013802.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '190', 13, 13, 'tushi07', '2021-06-06 11:38:02', 'Fantasy'),
(38, 'Harry Potter and the Order of the Phoenix', '20210606014028.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '120', 12, 12, 'tushi07', '2021-06-06 11:40:28', 'Fantasy'),
(39, 'Harry Potter and the Half-Blood Prince', '20210606014152.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '140', 11, 11, 'tushi07', '2021-06-06 11:41:52', 'Fantasy'),
(40, 'Harry Potter and the Deathly Hallows', '20210606014259.jpg', 'J. K. Rowling', 'Bloomsbury', '2021-06-06', '110', 11, 11, 'tushi07', '2021-06-06 11:42:59', 'Fantasy'),
(41, 'Frankenstein', '20210606015224.jpg', 'Mary Shelley', ' Dover Publications', '2021-06-06', '120', 11, 11, 'tushi07', '2021-06-06 11:52:24', 'Fiction'),
(42, 'Alices Adventures in Wonderland', '20210606015453.jpg', 'Lewis Carroll', 'IDW Publishing', '2021-06-06', '160', 11, 11, 'tushi07', '2021-06-06 11:54:53', 'Fiction'),
(43, 'THE BOOK THIEF ', '20210606015744.jpg', 'Markus Zusak', 'Picador', '2021-06-24', '110', 12, 12, 'tushi07', '2021-06-06 11:57:44', 'Historical Fiction'),
(44, 'The God of Small Things', '20210606015927.jpg', 'Arundhati Roy', 'IndiaInk', '2021-06-13', '110', 11, 11, 'tushi07', '2021-06-06 11:59:27', 'Historical Fiction'),
(45, 'Guns, Germs, and Steel: The Fate of Human Societies', '20210606020308.jpg', 'Jared Diamond', 'W. W. Norton & Company', '2021-06-14', '120', 12, 12, 'tushi07', '2021-06-06 12:03:08', 'History'),
(46, 'It', '20210606020803.jpg', 'Stephen King', 'Viking Press', '2021-06-06', '135', 15, 15, 'tushi07', '2021-06-06 12:08:03', 'Horror'),
(47, 'The Shining', '20210606020930.jpg', 'Stephen King', 'Doubleday', '2021-06-06', '230', 13, 13, 'tushi07', '2021-06-06 12:09:30', 'Horror'),
(48, 'The Da Vinci Code', '20210606022327.jpg', 'Dan Brown', 'Doubleday ', '2021-06-06', '300', 20, 20, 'tushi07', '2021-06-06 12:23:27', 'Thriller'),
(49, 'The Silent Patient', '20210608082005.jpg', 'Alex Michaelides', 'Macmillan Publishers', '2021-06-16', '123', 12, 12, 'tushi07', '2021-06-08 18:20:05', 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_reviews`
--

INSERT INTO `book_reviews` (`id`, `book_id`, `student_id`, `title`, `content`, `rating`, `created_at`) VALUES
(1, 29, 1, 'Here is the title ', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, '2021-06-07 16:55:50'),
(2, 34, 2, 'Harry Potter', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 5, '2021-06-07 17:25:12'),
(3, 35, 2, 'Hello', 'lorem', 3, '2021-06-07 19:38:08'),
(4, 34, 2, 'ttttttttt', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 0, '2021-06-08 15:10:34'),
(5, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 15:48:22'),
(6, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 15:56:25'),
(7, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 16:03:43'),
(8, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 16:04:17'),
(9, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 16:15:58'),
(10, 35, 1, 'ddddddddd', 'ddddddd', 0, '2021-06-08 16:21:38'),
(11, 42, 2, 'sssssssssssss', '', 0, '2021-06-08 17:10:32'),
(12, 31, 2, '2222222222222222', '22222222222222222222222222222222222222eeeeeeeeeeeeeeeeeeeeeeeecccccccccccc', 4, '2021-06-08 17:18:06'),
(13, 39, 2, 'elf by his own choice to defeating Voldemort and accepting that former protectors like his parents a', 'This sixth Harry Potter will wow the series’ many fans — Rowling delivers the likable characters and thrilling situations that have made the series so popular, handily weaving in plots begun in earlier books and returning to comic staples of wizard school life while providing fresh novelties. Connoisseurs will note that Rowling’s real attention is focused on setting up Harry’s final showdown with Lord Voldemort: Dumbledore’s private Pensieve tutorials with Harry, in which the two sift through various characters’ memories about the Dark Lord’s history, searching for the means to defeat him, are the main thrust of the book but will pay off fully only in the last volume. Even so, there’s plenty of engaging mystery and suspense here: the title character, the Half-Blood Prince, occluded for most of the book as merely the author of some helpful notes in Harry’s potions text, bursts into startling prominence by the end. Harry himself, grown more independent, decisive, and “fanciable,” comes of age, committing himself by his own choice to defeating Voldemort and accepting that former protectors like his parents and Dumbledore (and even the Dursleys) no longer stand between him and danger. Old animosities against Snape, now the Defense Against the Dark Arts teacher (whose twisted loyalties become even more opaque), and Draco Malfoy, the newest Death Eater recruit, continue unabated and crescendo into an epochal betrayal at the close, brilliantly conjured by Rowling. In the war against Voldemort, Snape may prove to be the linchpin just as much as Harry, but to find out for sure, readers will have to wait for the ultimate Harry, book seven. ANITA L. BURKAM', 4, '2021-06-08 17:30:30'),
(14, 36, 2, 'Harry Potter and the Order of the Phoenix', 'This review is much like the proverbial tree falling in an uninhabited forest: unlikely to make a sound. But for the record, HP5 is the best in the series since Azkaban, and far superior to the turgid HP4. With Rowling once again following the formula of giving Harry’s day-to-day troubles and preoccupations the same weight as the larger battle of good vs. evil, Harry, now a sullen fifteen, finds himself in the role of outsider. The adult wizards in the Order of the Phoenix prepare for the return of Voldemort without him; at Hogwarts, he is ignored by Dumbledore, banned from Quidditch, and — thanks to slanted press coverage — generally regarded as a liar and a “weirdo.” A new Defense Against the Dark Arts teacher, backed by a Ministry of Magic in Voldemort-denial, begins taking over Hogwarts one repressive educational decree at a time, providing Rowling with the opportunity for some sharp-edged satire. This is one of the funniest of the books, with comic set pieces starring Uncle Vernon and Hagrid, and with Fred and George Weasley outdoing themselves in wickedly funny asides. But it is also one of the most unpleasantly aggressive: adults snarl at one another; Slytherins and Gryffindors seem perpetually to be insulting each other, and even come to blows. The plot doesn’t bear close scrutiny, and the climactic confrontation between “Dumbledore’s Army” (a group of Hogwarts students led by Harry) and a horde of Death Eaters is a banal shoot-’em-up scene with a little magic thrown in. The concluding wrap-up, though, in which Dumbledore explains it all to Harry (and to us), contains a revelation regarding Neville Longbottom that should keep fans fizzing with wild surmise until the next installment. HP5 remains a highly passive reading experience, with all the work done by the author and none required of the reader (viz. those omnipresent, ambiguity-leaching adverbs: “‘I’m not staying behind!’ said Hermione furiously”). But tally the book’s strengths and weaknesses as you may, the fact remains that Rowling has once again created a fully-fledged world, and for the experience of being there with Harry, HP5 can’t be beat. MARTHA V. PARRAVANO', 3, '2021-06-08 17:33:39'),
(15, 29, 2, '333333333333333', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 1, '2021-06-08 17:58:13'),
(16, 47, 2, 'The Shining', 'i- i don\'t even know what to say that hasn\'t already been said about this but lemme give it a shot.\r\n\r\ngod DAMN this is king at his best. i know, i know, \"kat that is so cliche. couldn\'t you have picked a less popular king book to stan?\"\r\n\r\ni guess not, but hear me out.\r\n\r\n1. first of all, i love a good old fashioned haunted house story and that\'s exactly what this is. the slow progression of madness that overtook jack and the introduction of new ghosts (or hallucinations, whatever you decide) was INCREDIBLE. not to mention the thing that i think king writes best is the feeling of confinement, and what\'s more confining than being snowed into a haunted hotel that literally wants you dead?? oh right, nothing.\r\n\r\n2. the characterization!!! ah! the way that king wrote these characters was just *chefs kiss* not only did i care about danny, wendy, and (sometimes) jack, but we also got to rip back the layers of their relationships with each other and dynamic as a family which i LOVE. even if you don\'t think this is a great horror story, don\'t deny it is a baller family drama.', 5, '2021-06-08 18:00:59'),
(17, 48, 2, 'The Da Vinci Code', 'Four stars for pure entertainment value.\r\n\r\nHowever, Dave Barry\'s review gets five stars:\r\n\r\n\r\n`The Da Vinci Code,\' cracked\r\nby Dave Barry\r\n\r\nI have written a blockbuster novel. My inspiration was The DaVinci Code by Dan Brown, which has sold 253 trillion copies in hardcover because it\'s such a compelling page-turner. NOBODY can put this book down:\r\n\r\nMOTHER ON BEACH: Help! My child is being attacked by a shark!\r\n\r\nLIFEGUARD (looking up from The DaVinci Code: Not now! I just got to page 243, where it turns out that one of the men depicted in \'\'The Last Supper\'\' is actually a woman!\r\n\r\nMOTHER: I know! Isn\'t that incredible? And it turns out that she\'s . . .\r\n\r\nSHARK (spitting out the child): Don\'t give it away! I\'m only on page 187!\r\n\r\nThe key to The DaVinci Code is that it\'s filled with startling plot twists, and almost every chapter ends with a \'\'cliffhanger,\'\' so you have to keep reading to see what will happen. Using this formula, I wrote the following blockbuster novel, titled The Constitution Conundrum. It\'s fairly short now, but when I get a huge publishing contract, I\'ll flesh it out to 100,000 words by adding sentences.', 3, '2021-06-08 18:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 1, '02-6-2021', '', '2021-06-02 16:04:20'),
(3, 4, 2, '02-6-2021', '', '2021-06-02 16:31:19'),
(4, 3, 4, '02-6-2021', '', '2021-06-02 16:31:59'),
(5, 1, 25, '02-06-21', '03-06-2021', '2021-06-02 16:32:21'),
(6, 1, 25, '02-06-21', '03-06-2021', '2021-06-02 17:53:10'),
(7, 1, 22, '03-06-21', '03-06-2021', '2021-06-03 10:43:34'),
(8, 2, 26, '03-06-21', '03-06-2021', '2021-06-03 10:44:03'),
(9, 1, 25, '03-06-2021', '02-6-2021', '2021-06-03 12:18:13'),
(10, 1, 22, '03-06-2021', '03-06-2021', '2021-06-03 13:57:48'),
(11, 1, 25, '03-06-2021', '03-06-2021', '2021-06-03 13:58:18'),
(12, 1, 25, '04-06-2021', '04-06-2021', '2021-06-04 08:07:33'),
(13, 2, 22, '04-06-2021', '04-06-2021', '2021-06-04 08:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(3) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `fname`, `lname`, `email`, `username`, `pw`, `datetime`) VALUES
(1, 'tushi', 'maria', 'tushi@gmail.com', 'tushi07', '12345678', '2021-05-28 11:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `pw`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'Syeda', 'Maria', 123456, 123456, 'syedakhadizatulmaria@gmail.com', 'khadiza0707', '12345678', '01965954981', NULL, 1, '2021-05-28 12:13:14'),
(2, 'Farzana', 'Tushi', 123456, 123456, 'tushi070@gmail.com', 'tushi070', '12345678', '01728805512', NULL, 1, '2021-05-28 16:08:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
