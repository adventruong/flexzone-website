-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 09:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flexzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `latitude`, `longitude`, `description`, `rating`) VALUES
(6, 'The Pulse Fitness Centre', '43.2644636', '-79.9160332', 'The Pulse is McMaster Universitys fitness center and we have just what you need to lead a healthy, and active lifestyle. Our certified staff members have the skills and enthusiasm to put you on the road to a healthier you, no matter what your current fitness level, what your individual interest are, what your personal goals are, or your limited availability. We offer numerous educational workshops and fitness programs that guarantee Fun, Friendship and Fitness!', 10),
(7, 'World Gym Hamilton', '43.2559862', '-79.9351857', 'World Gym Hamilton Mountain is part of the team of over 200 World Gyms worldwide in 18 different countries. There are now over 30 World Gyms in Canada and more continue to open every month. World Gyms low price of only $10 per month makes it affordable for everyone to get healthy and feel better about themselves.', 8),
(8, 'Alchemy CrossFit Hamilton', '43.2580401', '-79.8925747', 'CrossFit is the fastest growing program in health and fitness. At Alchemy CrossFit we focus on functional fitness through weightlifting, body weight exercises and high intensity cardio. We are the go-to fitness facility in Hamilton for strength and conditioning, weight loss, and real results. Alchemy is more than a gym, it is a community of learning, support and motivation to accomplish your goals.', 7),
(9, 'Allure Fitness Inc', '43.2618790', '-79.9044441', 'Allure Fitness Inc. is a ladies only studio, offering group fitness classes, personal training and private lessons â€“ but this is no ordinary gymâ€¦ You often neglect yourself when working, running your household, and going about your life. We understand you need a little escape, and are pleased to offer you a chance to do so with us, in a discreet setting for ladies only. Allure Fitness Inc. is Hamiltons Hottest Dance & Fitness Studio, where we offer options to suit every womanâ€™s workout needs.  We decided that the gym was boring, and we wanted to make exercise so fun and fabulous that you will be inspired to get fit in no time!', 6),
(10, 'GoodLife Fitness', '43.2053793', '-79.8975250', 'At GoodLife Fitness you have access to modern facilities, state-of-the-art equipment, motivating group fitness classes, as well as supportive, friendly and knowledgeable staff who are here to help and guide you along your journey. With over 350 locations across Canada and more opening soon, GoodLife is proud to offer welcoming environments that are fit for any fitness level.', 9),
(11, 'YMCA of HBB', '43.2541825', '-79.8720565', 'Our expert staff and volunteers are always available to support and guide you to positive outcomes, every step of the way. And when you choose the YMCA, you get the added benefit of being part of our community â€” because its important to feel safe and welcome while working to improve your health. Being active improves many aspects of life  - mental, emotional, social and physical.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `gymid` int(10) NOT NULL,
  `name` varchar(256) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `gymid`, `name`, `review`, `rating`) VALUES
(20, 7, 'Jesse Truong', '$I started going here in first year and Im currently in my fourth. Its a great gym! Theres a lot of equipment available and classes if you''re interested in taking those. It might get a little crowded at times but it''s not too bad', 9),
(21, 6, 'Jesse Truong', '$THE GREATEST GYM OF ALL TIME. MCMASTER LETS GO HOO HOO HOO HOO HOO HOO HOO HOO HOO HOO HOO HOO', 10),
(22, 6, 'Jasman Gill', 'This is the worst gym ive ever been in and i hate this place, but i would still rate 8', 8),
(23, 8, 'Jesse Truong', '$First review! I love CrossFit. Crossfit this Crossfit that. Gains for days without gains ', 5),
(24, 8, 'Jesse Truong', '$Old Godzilla was hoppin'' around,\r\nTokyo City like a big playground,\r\nWhen suddenly Batman burst from the shade,\r\nAnd hit Godzilla with a bat grenade,\r\n\r\nRead more: Lemon Demon - The Ultimate Showdown Of Ultimate Destiny Lyrics | MetroLyrics ', 8),
(25, 9, 'Jesse Truong', '$This is the ultimate showdown of ultimate destiny!\r\nGood guys, bad guys and explosions,\r\nAs far as the eye can see,\r\nAnd only one will survive,\r\nI wonder who it will be.\r\nThis is the ultimate showdown of ultimate destiny.', 10),
(26, 9, 'Jesse Truong', '$Godzilla took a bite out of Optimus Prime,\r\nLike Scruff McGruff took a bite out of crime,\r\nThen Shaq came back covered in a tire track,\r\nBut Jackie Chan jumped out and landed on his back,\r\nAnd Batman was injured and trying to get steady,\r\nWhen Abraham Lincoln came back with a machete,', 7),
(27, 10, 'Jesse Truong', '$Old Godzilla was hoppin'' around,\r\nTokyo City like a big playground,\r\nWhen suddenly Batman burst from the shade,\r\nAnd hit Godzilla with a bat grenade,\r\nGodzilla got pissed and began to attack,\r\nBut didn''t expect to be blocked by Shaq,\r\nWho proceeded to open up a can of Shaq Fu,', 10),
(28, 10, 'Jesse Truong', '$When Aaron Carter came out of the blue,\r\nAnd he started beating up Shaquille O''Neal,\r\nThen they both got flattened by the Batmobile,\r\nBut before he could make it back to the Batcave,\r\nAbraham Lincoln popped out of his grave,\r\nAnd took an AK-47out from under his hat,\r\nAnd blew Batman away with a rat-a-tat-tat,\r\nBut he ran out of bullets and he ran away,\r\nBecause Optimus Prime came to save the day!', 9),
(29, 10, 'Jesse Truong', '$This is the ultimate showdown of ultimate destiny!\r\nGood guys, bad guys and explosions,\r\nAs far as the eye can see,\r\nAnd only one will survive,\r\nI wonder who it will be.\r\nThis is the ultimate showdown of ultimate destiny.', 8),
(30, 10, 'Jesse Truong', '$Godzilla took a bite out of Optimus Prime,\r\nLike Scruff McGruff took a bite out of crime,\r\nThen Shaq came back covered in a tire track,\r\nBut Jackie Chan jumped out and landed on his back,\r\nAnd Batman was injured and trying to get steady,\r\nWhen Abraham Lincoln came back with a machete,\r\nBut suddenly something caught his leg and he tripped,\r\nIndiana Jones took him out with his whip,', 7),
(31, 10, 'Jesse Truong', '$Then he saw Godzilla sneaking up from behind,\r\nAnd he reached for his gun which he just couldn''t find,\r\nBecause Batman stole it, and he shot and he missed,\r\nAnd Jackie Chan deflected it with his fist,\r\nThen he jumped in the air and he did a somersault,\r\nWhile Abraham Lincoln tried to polevault,\r\nOnto Optimus Prime, but they collided in the air,\r\nThen they both got hit by a Care Bear Stare!', 9),
(32, 11, 'Jesse Truong', '$Then Gandalf the Grey,\r\nAnd Gandalf the White,\r\nAnd Monty Python and the Holy Grail''s Black Knight,\r\nAnd Benito Mussolini,\r\nAnd the Blue Meanie,\r\nAnd Cowboy Curtis,\r\nAnd Jambi the Genie,\r\nRobocop,\r\nThe Terminator,\r\nCaptain Kirk,\r\nAnd Darth Vader,\r\nLo Pan,\r\nSuperman,\r\nEvery single Power Ranger,\r\nBill S. Preston,\r\nAnd Theodore Logan,\r\nSpock,\r\nThe Rock,\r\nDoc Ock,', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `gender`, `email`, `password`, `salt`) VALUES
(5, 'Jesse', 'Truong', '2016-12-04', 'male', 'example@mcmaster.ca', 'f0fe91bc0bd0dd84ee96deced1e1eb57c283be0c3d1abb60f268ac9097ae8259', '699880e02e0fb5dc80159477e408a598d621d6ae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gymid` (`gymid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
