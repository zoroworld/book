-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 02:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinesell`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `a_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `detail` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`a_id`, `name`, `image`, `detail`) VALUES
(1, 'Mark Morris', 'man.png', 'Mark Morris became a full-time writer in 1988 on the Enterprise Allowance Scheme, and a year later saw the release of his first novel, Toady. He has since published a further sixteen novels, among which are Stitch, The Immaculate, The Secret of Anatomy, Fiddleback, The Deluge and four books in the popular Doctor Who range.'),
(2, 'Tarphy W. Horn', 'man.png', 'As of my last update in January 2022, there does not appear to be a widely recognized author named Tarphy W. Horn. It is possible that Tarphy W. Horn could be a pseudonym or a new author who emerged after that time. Without more information, it is challenging to provide specific details about the author. If Tarphy W. Horn is indeed a new author, they may be in the process of establishing their presence in the literary world. It is common for emerging authors to start with smaller publications, such as anthologies, before gaining wider recognition. If you have any additional context or specific questions about Tarphy W. Horn, feel free to share, and It will do my best to assist you!'),
(3, 'Nidhi Upadhyay', 'women.png', 'Nidhi Upadhyay is an engineer-turned-headhunter. For years, Nidhi spent her days matchmaking senior executives to their dream jobs and her nights reading thrillers, until her husband borderline bullied her into writing one. She lives in Singapore with her doting husband and two exceptionally loving but polar-opposite boys. That Night is her debut novel.'),
(4, 'Madeleine Roux ', 'man.png', 'Madeleine Roux is the New York Times and USA Today bestselling author of the Asylum series, which has sold over a million copies worldwide. She is also the author of the House of Furies series, and several titles for adults, including Salvaged and Reclaimed. She has made contributions to Star Wars, World of Warcraft, and Dungeons & Dragons. Madeleine lives in Seattle, Washington with her partner and beloved pups.'),
(5, 'Robert Louis Stevenson Graded', 'man.png', 'Robert Louis Stevenson was a Scottish novelist, poet, essayist, and travel writer, born on November 13, 1850, in Edinburgh, Scotland, and passed away on December 3, 1894, in Vailima, Samoa. He is best known for his adventurous and imaginative works, which include novels, short stories, and poems.'),
(6, 'Samuel Langhorne Clemens', 'man.png', 'Samuel Langhorne Clemens, better known by his pen name Mark Twain, was born in Florida, Missouri, in 1835. Lauded as the (greatest American humorist of his age) and called (the father of American literature) by William Faulkner, Twain has authored 28 books and numerous sketches and short stories.\r\nThe Adventures of Huckleberry Finn (1885) called the first great American novel by some, is a story of a boys adventures in the Mississippi Valley. a work of immeasurable richness and complexity, it remains an incomparable adventure story and a classic of American humor, more than a century after its publication.'),
(7, 'Mark Twain', 'man.png', 'Mark Twain, a pseudonym of Samuel Langhorne Clemens, was a renowned American adventurer and journalist. Born in Missouri, he left school at twelve and worked as a printer, prospector, and steam-boat pilot. During the Civil War, he joined the Confederate army and became a successful journalist. Twain\'s famous travel book, The Adventures of Tom Sawyer, was based on his childhood experiences. He made a fortune from writing but lost it due to inventions and bad investments. Twain was impulsive, hot-tempered, and superstitious, believing he would die when Halleys Comet returned.'),
(8, 'R.K. Narayan', 'man.png', 'R.K. Narayan is one of the most prominent Indian novelists of the twentieth century. Born in 1906, Narayan was the recipient of the National Prize of the Indian Literary Academy, India\'s highest literary honor. His numerous works Mr. Sampath - The Printer of Malgudi, Swami and Friends, Waiting for Mahatma and Gods, Demons and Others, all published by the University of Chicago Press.'),
(9, 'Saara El-Arifi', 'women.png', 'Saara El-Arifi is the Sunday Times bestselling author of The Final Strife, the first part of a trilogy inspired by her Ghanaian and Sudanese heritage. She has lived in many countries, had many jobs and owned many more cats. El-Arifi knew she was a storyteller from the moment she told her first lie. Over the years she has perfected her tall tales into epic ones. She currently resides in London, UK, as a full-time procrastinator.'),
(10, 'Sue Lynn Tan', 'women.png', 'Sue Lynn Tan, an award-winning author, is known for her romantic fantasy duology, Daughter of the Moon Goddess and Heart of the Sun Warrior, inspired by Chang’e\'s legend. Born in Malaysia, Tan studied in London, France, and Hong Kong before discovering fantasy books. She enjoys exploring her home and can be found on Instagram and Twitter.'),
(11, 'Andrew Lang', 'man.png', 'Andrew Lang FBA was a Scottish poet, novelist, literary critic, and contributor to the field of anthropology. He is best known as a collector of folk and fairy tales. The Andrew Lang lectures at the University of St Andrews are named after him.'),
(12, 'Kelly Barnhill', 'women.png', 'Kelly Barnhill lives in Minnesota with her husband and three children. She is the author of four novels, most recently The Girl Who Drank the Moon, winner of the Newbery Medal. The Witch\'s Boy received four starred reviews and was a finalist for the Minnesota Book Awards.'),
(13, 'Victoria Aveyard', 'women.png', 'Victoria Aveyard was born and raised in East Longmeadow, Massachusetts, a small town known only for the worst traffic rotary in the continental United States. She moved to Los Angeles to earn a BFA in screenwriting at the University of Southern California. As an author and screenwriter, she uses her career as an excuse to read too many books and watch too many movies.'),
(14, 'Patrick Rothfuss', 'man.png', 'Born in Wisconsin in 1973, Patrick Rothfuss pursued various fields, eventually completing his undergraduate degree in English. He enjoys reading, writing, and teaching fencing, and occasionally explores alchemy in his basement.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `genre` int(1) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `a_id` int(255) DEFAULT NULL,
  `p_id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `isbn`, `title`, `description`, `genre`, `price`, `quantity`, `image`, `a_id`, `p_id`, `date`) VALUES
(1, '978-0008596045', '2nd Spectral Book of Horror Stories', 'One of Ghedi friends had been hit by a dropped stanchion on an earlier raid, bursting his head open so that his brains had spattered out and ended up looking like worms on the deck, pink and crawling It was reaching out toward the glass door, toward Buck, with a hand or a paw that seemed to be tipped with thick, black claws like the talons of an eagle WHERE THE FOREST ENDS by Sean Logan One of the big horses bounded in, a black silhouette against the pale sky, the rider rearing on its back, lugged spear held aloft. With a whoop, he flung it down. It struck with a thick squelching crunch, and the screaming stopped.', 1, 228, 80, '2nd_spectral_book_of_horror_stories.png', 1, 1, '2024-04-25 07:48:51'),
(2, '978-0008596354', 'Trapped Inside The Maelstrom', 'The anthology likely contains a variety of tales exploring the darker aspects of human nature, often delving into themes such as fear, madness, and the unknown. Readers can expect a range of horror subgenres, including psychological horror, supernatural horror, cosmic horror, and more.', 1, 448, 10, 'traped_inside.png', 2, 2, '2024-04-25 07:49:06'),
(3, '978-0143451877', 'That Night: Four Friends, Twenty Years', 'It was the night that began with a bottle of whisky and a game of Ouija but ended with the death of Sania, their unlikeable hostel mate. The friends vowed never to discuss that fateful night, a pact that had kept their friendship and guilt dormant for the last twenty years.', 1, 523, 8, 'that_twy_night.png', 3, 3, '2024-04-25 07:49:11'),
(4, '978-0062220974', 'Asylum', 'A teenager attending a summer program at New Hampshire College Prep. Housed in a converted asylum, Dan and his friends uncover disturbing secrets about the buildings past. As they delve deeper, they encounter ghostly apparitions and terrifying mysteries. Racing against time, they struggle to escape the horrors lurking within while unraveling the asylums sinister history.', 1, 600, 53, 'asylum.png', 4, 4, '2024-04-25 07:49:22'),
(5, '978-8173797484', 'Treasure Island Book', 'A young boy who discovers a treasure map and sets off on a voyage to find the buried treasure. Accompanied by a crew of pirates, including the infamous Long John Silver, Jim navigates treacherous waters and faces numerous challenges on his quest for riches. Along the way, he learns valuable lessons about loyalty, courage, and the consequences of greed. The novel is filled with swashbuckling action, memorable characters, and thrilling escapades, making it a timeless tale enjoyed by readers of all ages.', 3, 589, 3, 'Treasure_Island.png', 5, 5, '2024-05-01 06:45:54'),
(6, '978-8175992993', 'The Adventures of Huckleberry Finn', 'The story follows the adventures of a young boy named Huck Finn and his friend Jim, a runaway slave. Set in the pre-Civil War South, Huck escapes from his abusive father and joins Jim as they travel down the Mississippi River on a raft. Along the way, they encounter a variety of characters and face numerous challenges, including encounters with con artists, feuds between families, and moral dilemmas', 3, 200, 23, 'Adventures_of_Huckleberry.png', 6, 5, '2024-05-01 06:45:54'),
(7, ' 978-0143335900', 'Malgudi Adventures', 'This story introduces us to the character of Swaminathan, a young boy living in Malgudi. It follows Swami\'s adventures with his friends in school and explores themes of friendship, childhood, and the pressures of academics.', 3, 800, 50, 'magudi.png', 8, 7, '2024-05-01 06:45:54'),
(8, '978-8173797491', 'The Adventures of Tom Sawyer', 'Throughout the novel, Tom gets into all sorts of trouble, from convincing his friends to do his chores for him to playing hooky from school. He also falls in love with Becky Thatcher, a new girl in town, and engages in a memorable courtship with her.', 3, 820, 80, 'Adventures_of_Tom.png', 7, 6, '2024-05-01 06:45:54'),
(9, '978-0008596972', 'Faebound', 'In \"Faebound,\" we follow the journey of Marnie Bastion, a young woman living in the modern world who discovers that she is actually a fae princess from another realm. Marnie\'s life is turned upside down when she learns of her true heritage and the magical abilities she possesses.', 2, 600, 50, 'Faebound.png', 9, 8, '2024-05-01 06:45:54'),
(10, '978-0008596972', 'Daughter of the Moon Goddess', '\"Daughter of the Moon Goddess\" is a fantasy novel by Sue Lynn Tan, narrating the story of Jade, a young woman who discovers she is the daughter of the Moon Goddess Chang\'e and the mortal Emperor Yi. Unaware of her divine heritage, she encounters magical events and discovers her destiny is tied to ancient prophecies. With the help of allies, Jade embarks on a quest to embrace her heritage, facing challenges and learning valuable lessons about love, sacrifice, and family.', 2, 500, 10, 'moon_godess.png', 10, 9, '2024-05-01 06:45:54'),
(11, '978-9354406676', 'The Blue Fairy', 'The Blue Fairy Book by Andrew Lang is a collection of timeless fairy tales, including Little Red Riding Hood, Cinderella, Beauty and The Beast, Hansel and Grettel, and others. This classic collectible is a must-have for readers, offering a magical world and adventurous journey through characters and the mystic world.', 2, 200, 12, 'blue_fairy.png', 11, 6, '2024-05-01 06:45:54'),
(12, '978-1848126473', 'Girl Who Drank The Moon', '\"The Girl Who Drank the Moon\" is a fantasy novel by Kelly Barnhill about a young girl named Luna raised by a witch in a mysterious forest. The village of the Protectorate is haunted by a witch named Xan who rescues abandoned babies. Luna, raised by Xan, discovers her powers and the truth about her past, while the people question their long-standing traditions.', 2, 500, 55, 'dark_moon.png', 12, 10, '2024-05-01 06:45:54'),
(13, '978-1409150725', 'RED QUEEN', '\"The Girl Who Drank the Moon\" is a fantasy novel by Kelly Barnhill about a young girl named Luna raised by a witch in a mysterious forest. The village of the Protectorate is haunted by a witch named Xan who rescues abandoned babies. Luna, raised by Xan, discovers her powers and the truth about her past, while the people question their long-standing traditions.', 2, 100, 100, 'red_queen.png', 13, 11, '2024-05-01 06:45:54'),
(14, '978-1409150854', 'The Name of the Wind', '\"The Name of the Wind\" is a fantasy novel by Patrick Rothfuss, the first in the \"The Kingkiller Chronicle\" series. The story follows Kvothe, an orphan who seeks revenge against the Chandrians and uncovers their existence. He attends a prestigious university, where he faces academic rivalries, dangerous adventures, and romantic entanglements. Kvothe also encounters the Chandrian, a mysterious figure. The novel is praised for its rich world-building, compelling characters, and lyrical prose, blending elements of fantasy, adventure, and mystery.', 2, 562, 56, 'the_Wind.png', 14, 12, '2024-05-01 06:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `bg_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`bg_id`, `name`) VALUES
(1, 'Horror'),
(2, 'Fantasy'),
(3, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'alok mishra', '8965423568', 'alok@gmail.com', ' rgrg grgregre erherhehehhe'),
(2, 'lita soni', '4555757', 'lita@gmail.com', '5756686'),
(3, 'alok soni', '67656767', 'alok@gmail.com', 'oo;uy  u6 46u64u');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `order_bid` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_bid`)),
  `pay_id` int(255) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `quantity`, `total_price`, `c_id`, `order_bid`, `pay_id`, `ship_id`, `date`) VALUES
(1, 2, '1,393.00', 1, '[\"3\",\"10\"]', 2, 2, '2024-04-29 17:28:35'),
(2, 2, '1,393.00', 1, '[\"3\",\"10\"]', 3, 3, '2024-04-29 17:31:22'),
(3, 2, '1,393.00', 1, '[\"3\",\"10\"]', 4, 4, '2024-04-29 17:39:39'),
(4, 2, '1,393.00', 1, '[\"3\",\"10\"]', 5, 5, '2024-04-29 17:40:49'),
(5, 2, '1,393.00', 1, '[\"3\",\"10\"]', 6, 6, '2024-04-29 17:41:29'),
(6, 2, '1,393.00', 1, '[\"3\",\"10\"]', 7, 7, '2024-04-29 17:44:34'),
(7, 2, '1,393.00', 1, '[\"3\",\"10\"]', 8, 8, '2024-04-29 17:53:03'),
(8, 2, '1,393.00', 2, '[\"3\",\"10\"]', 9, 9, '2024-04-29 17:56:33'),
(9, 2, '1,393.00', 2, '[\"3\",\"10\"]', 10, 10, '2024-04-29 17:57:23'),
(10, 3, '1,593.00', 3, '[\"3\",\"10\",\"13\"]', 11, 11, '2024-04-29 18:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `status`, `c_id`, `date`) VALUES
(1, 1, 1, '2024-04-30 18:30:00'),
(2, 1, 1, '2024-04-30 18:30:00'),
(3, 1, 1, '2024-04-30 18:30:00'),
(4, 1, 1, '2024-04-30 18:30:00'),
(5, 1, 1, '2024-04-30 18:30:00'),
(6, 1, 1, '2024-04-30 18:30:00'),
(7, 1, 1, '2024-04-30 18:30:00'),
(8, 1, 1, '2024-04-30 18:30:00'),
(9, 0, 2, '2024-04-30 18:30:00'),
(10, 1, 2, '2024-04-30 18:30:00'),
(11, 1, 3, '2024-04-30 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `p_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `detail` varchar(3000) NOT NULL,
  `a_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`p_id`, `name`, `image`, `detail`, `a_id`) VALUES
(1, 'Sinmon Marshall-jones', 'women.png', 'started publishing way back in 1990, when I launched a music ‘zine called FRÄCTürëd – yes, that’s how it was spelt – devoted to the then burgeoning industrial music scene. It’s easy to forget that, in the days when the internet was still some way in the future, promoting and making people aware of what you were doing was that much harder but, despite that, the magazine achieved sales all over the world, from San Francisco to Moscow. It ran for three sold-out issues however, only stopping due to something called life getting in the way – I went back to university. Since then, I’ve always harboured a faint suspicion that I should have continued in the publishing business in one form or another…', 1),
(2, ' R. R. Bowker ', 'man.png', 'R. R. Bowker LLC is an American limited liability company domiciled under Delaware Limited Liability Company Law and based in Chatham, New Jersey.', 2),
(3, 'Penguin (5 April 2021) Penguin Random House India', 'man.png', 'Penguin Random House India Pvt Ltd (Head Office) in Dlf Cyber City, Gurgaon, Delhi. Penguin Random House India Pvt Ltd (Head Office) in Gurgaon, Delhi is one of the leading businesses in the Kids Book Publishers.', 3),
(4, 'HarperCollins Reprint edition (26 August 2014)', 'man.png', 'HarperCollins Publishers LLC is an Anglo-American publishing company that is considered to be one of the (Big Five)  English-language publishers, along with Penguin Random House, Hachette, Macmillan, and Simon & Schuster. HarperCollins is headquartered in New York City and is a subsidiary of News Corp.', 4),
(5, 'Frank Educational Aids Pvt. Ltd', 'women.png', 'Frank Educational Aids Private Ltds Corporate Identification Number is (CIN) U74899DL1989PTC034975 and its registration number is 34975. Its Email address is sanjay@frankedu.com and its registered address is A-404 ASHIANA APARTMENTS MAYUR VIHAR-1(EXTN) NEW DELHI DL 110091 IN.', 5),
(6, 'Prakash Books India Pvt Ltd', 'women.png', 'Frank Educational Aids Private Ltd\'s Corporate Identification Number is (CIN) U74899DL1989PTC034975 and its registration number is 34975. Its Email address is sanjay@frankedu.com and its registered address is A-404 ASHIANA APARTMENTS MAYUR VIHAR-1(EXTN) NEW DELHI DL 110091 IN.', 7),
(7, 'Penguin India Latest edition (31 December 2003)', 'women.png', 'Penguin Books Limited is a British publishing house. It was co-founded in 1935 by Allen Lane with his brothers Richard and John, as a line of the publishers The Bodley Head, only becoming a separate company the following year.', 8),
(8, 'HarperVoyager (18 January 2024)', 'women.png', 'Harper Voyager is indeed an imprint of HarperCollins Publishers, specializing in science fiction and fantasy literature. Established in 1994, Harper Voyager has become a well-known and respected publisher within the speculative fiction genre.', 9),
(9, 'Harper Voyager (11 January 2022)', 'man.png', 'Harper Voyager is indeed an imprint of HarperCollins Publishers, specializing in science fiction and fantasy literature. Established in 1994, Harper Voyager has become a well-known and respected publisher within the speculative fiction genre.', 10),
(10, 'Piccadilly Press (24 August 2017)', 'man.png', 'It seems like you\'ve provided a piece of information without context. \"Piccadilly Press (24 August 2017)\" appears to be a reference to something', 12),
(11, 'Orion (20 August 2015)', 'man.png', '\"Orion\" is a science fiction novel by Ben Bova, published in 2015. It follows John O\'Ryan, a human who transforms into the legendary Orion, a superhuman being with immense strength and speed. As Orion, he faces political intrigue and battles in space, while protecting humanity from alien and human threats. The novel explores themes of power, identity, and the potential for good and evil within individuals, making it a standout in Bova\'s science fiction series.', 13),
(12, 'Gollancz; New e. edition (18 April 2010))', 'women.png', 'Gollancz published a revised edition of Patrick Rothfuss\'s \"The Name of the Wind\" in 2010, possibly a new format. This edition offers a fresh perspective on the captivating story of Kvothe\'s journey, showcasing Rothfuss\'s intricate prose.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `c_id`, `feedback`, `rating`, `time`) VALUES
(1, 1, 'rger erhehehettjtj', '3', '2024-05-01 00:00:00'),
(2, 2, 'tht', '1', '2024-05-01 00:00:00'),
(3, 3, 'rgr rgr  grg', '2', '2024-05-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `ship_id` int(255) NOT NULL,
  `pay_id` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `dilivery_status` int(2) NOT NULL,
  `end_shipping` varchar(255) NOT NULL,
  `start_shipping` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`ship_id`, `pay_id`, `c_id`, `dilivery_status`, `end_shipping`, `start_shipping`) VALUES
(2, 2, 1, 1, '2024-05-05', '2024-04-29 17:28:35'),
(3, 3, 1, 1, '2024-05-05', '2024-04-29 17:31:22'),
(4, 4, 1, 1, '2024-05-05', '2024-04-29 17:39:39'),
(5, 5, 1, 1, '2024-05-05', '2024-04-29 17:40:49'),
(6, 6, 1, 1, '2024-05-05', '2024-04-29 17:41:29'),
(7, 7, 1, 1, '2024-05-05', '2024-04-29 17:44:34'),
(8, 8, 1, 1, '2024-05-05', '2024-04-29 17:53:03'),
(9, 9, 2, 1, '2024-05-05', '2024-04-29 17:56:33'),
(10, 10, 2, 1, '2024-05-05', '2024-04-29 17:57:23'),
(11, 11, 3, 1, '2024-05-05', '2024-04-29 18:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`) VALUES
(36, 'book add done '),
(39, 'see feedback'),
(40, 'all done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `auther_fk` (`a_id`),
  ADD KEY `publisher_fk` (`p_id`),
  ADD KEY `genre_fk` (`genre`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `book_fk` (`order_bid`(768)),
  ADD KEY `customer_fk` (`c_id`),
  ADD KEY `payment_fk` (`pay_id`),
  ADD KEY `shipping_fk` (`ship_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `customer_pay_fk` (`c_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `author_fk` (`a_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `customer_rating` (`c_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `paymens_fk` (`pay_id`),
  ADD KEY `customer_work_fk` (`c_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `bg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `ship_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `auther_fk` FOREIGN KEY (`a_id`) REFERENCES `authors` (`a_id`),
  ADD CONSTRAINT `genre_fk` FOREIGN KEY (`genre`) REFERENCES `book_genre` (`bg_id`),
  ADD CONSTRAINT `publisher_fk` FOREIGN KEY (`p_id`) REFERENCES `publishers` (`p_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`),
  ADD CONSTRAINT `payment_fk` FOREIGN KEY (`pay_id`) REFERENCES `payments` (`pay_id`),
  ADD CONSTRAINT `shipping_fk` FOREIGN KEY (`ship_id`) REFERENCES `shipping_details` (`ship_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `customer_pay_fk` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`);

--
-- Constraints for table `publishers`
--
ALTER TABLE `publishers`
  ADD CONSTRAINT `author_fk` FOREIGN KEY (`a_id`) REFERENCES `authors` (`a_id`);

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `customer_work_fk` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`),
  ADD CONSTRAINT `paymens_fk` FOREIGN KEY (`pay_id`) REFERENCES `payments` (`pay_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
