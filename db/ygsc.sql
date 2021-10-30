-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 05, 2020 at 02:02 PM
-- Server version: 5.7.28
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ygsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `aheadline` varchar(30) NOT NULL,
  `abio` varchar(1000) NOT NULL,
  `aimage` varchar(500) NOT NULL,
  `addedby` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `aheadline`, `abio`, `aimage`, `addedby`) VALUES
(1, 'July-05-2020 11:52:40', 'echizen', '1234', 'Julian Bharadwaja', 'Full-stack', 'I am a full-stack developer', '12345513_535473886609973_5460231080161832733_n.jpg', 'Julian'),
(2, 'July-05-2020 11:57:14', 'sensei', '12345', 'PageMyanmar', '', '', '', 'Julian'),
(3, 'July-05-2020 12:41:40', 'Julian', '1234', 'julian', '', '', '', 'echizen');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'General', 'Julian', 'May-17-2020 22:55:42'),
(2, 'Political', 'Julian', 'May-17-2020 22:56:59'),
(3, 'Technology', 'Julian', 'May-17-2020 22:57:03'),
(4, 'Business', 'Julian', 'May-17-2020 22:58:10'),
(5, 'Health', 'Julian', 'May-19-2020 16:51:02'),
(6, 'Yangon', 'Julian', 'May-24-2020 17:33:27'),
(7, 'Science', 'Julian', 'July-03-2020 17:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `post_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `post_id`) VALUES
(4, 'July-04-2020 23:26:48', 'Nay Htun Oo', 'nay123@gmail.com', 'This is horrifying! o.O', '', 'ON', 12),
(5, 'July-04-2020 23:28:01', 'Julian Bharadwaja', 'julian@gmail.com', 'Very Good Job!', '', 'ON', 7),
(6, 'July-04-2020 23:30:04', 'Naruto', 'naruto@gmail.com', 'What are they going to do with that?', '', 'ON', 6),
(8, 'July-04-2020 23:31:08', 'Neela', 'neela@gmail.com', 'Seriously? It reaches there?', 'pending', 'OFF', 9),
(9, 'July-04-2020 23:59:18', 'May', 'may@gmail.com', 'Wow! Really? I didnt knw', '', 'ON', 12);

-- --------------------------------------------------------

--
-- Table structure for table `comments_events`
--

DROP TABLE IF EXISTS `comments_events`;
CREATE TABLE IF NOT EXISTS `comments_events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_events`
--

INSERT INTO `comments_events` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `event_id`) VALUES
(1, 'July-05-2020 00:38:09', 'Jay', 'jay@gmail.com', 'This is for free? My god you are amazing!', 'pending', 'OFF', 4),
(2, 'July-05-2020 13:28:58', 'Fitz', 'fitz@gmail.com', 'Hmm... Yeah', '', 'OFF', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments_projects`
--

DROP TABLE IF EXISTS `comments_projects`;
CREATE TABLE IF NOT EXISTS `comments_projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `project_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_projects`
--

INSERT INTO `comments_projects` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `project_id`) VALUES
(1, 'July-05-2020 00:53:27', 'Simon', 'simon@gmail.com', 'I hope help you guys ', '', 'OFF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments_requests`
--

DROP TABLE IF EXISTS `comments_requests`;
CREATE TABLE IF NOT EXISTS `comments_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `request_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_requests`
--

INSERT INTO `comments_requests` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `request_id`) VALUES
(1, 'July-05-2020 00:42:32', 'Julian Bharadwaja', 'julian@gmail.com', 'Lets freaking go', '', 'OFF', 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `event_type` varchar(60) NOT NULL,
  `event_category` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` varchar(100) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `epost` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `datetime`, `title`, `event_type`, `event_category`, `location`, `time`, `creator`, `image`, `fees`, `epost`) VALUES
(1, 'May-25-2020 23:16:50', 'Masterclass â€˜Open governanceâ€™ For Smart City', 'Online Event', 'Governance & Education', 'https://join.skype.com/Yhbco5sm4kZf', '12:30 - 2:30', 'Julian', 'c_72032_4c74dd6a-3a0b-4704-b7d1-c8b0526eb993.jpg', 'Paid', 'Together with Prof. Albert Meijer (Utrecht University), we will investigate in the master class on Wednesday 27 May how \'open governance\' can lead to better policy results and more open decision-making processes and how. This masterclass is especially for administrators and representatives of local, provincial and national governments and water boards.\r\n\r\nOpen governance versus open government\r\nOpen governance advocates driving the smart city by creating new forms of human collaboration through the use of ICT to achieve better results and more open governance processes. So it is not about technology, but about the consequences for the administrative process and decision-making.\r\nThe term \"open governance\" should not be confused with an \"open government\" (open government), which is much more about access to information and the organizational structure of the government institution.\r\n\r\nDate: Wednesday, May 27\r\nTime: 4.30 pm - 5.30 pm\r\nOperated via: Webex\r\nFor whom: Directors and representatives of local, provincial and national governments and water boards.'),
(2, 'June-05-2020 14:46:15', 'Webinar #3: Smart Cities and Mobility, Indo-Dutch innovation during crisis', 'Online Event', 'Digital City', 'https://www.crowdcast.io/e', 'Tuesday, 9 June 2020, 15:30-17:00', 'Julian', 'zuyet-awarmatik-QDClXRSMK68-unsplash.jpg', 'Free', 'Webinar #3: Indo-Dutch innovation during crisis - Smart Cities and Mobility\r\n\r\nClick here to register: https://registerlink.gle/gM94BTsxTu9vfZaR6\r\n\r\nThe full impact of COVID-19 on Smart Cities and Mobility is still unknown. However, one thing is for certainâ€” there are global economic and financial ramifications. This is affecting how our buildings, transport and utilities are managed. It is felt through the global supply chains, from raw materials to finished products. \r\n\r\n\r\nDuring this webinar, we will delve into the immediate impact of the isolation measures on these industries, explore the degree to which there are long term consequences and how we can adapt our systems and capabilities. We will also focus on the progress and positives coming out of these thematic areas through experts. And weâ€™ll hear entrepreneurs who are coming up with innovative solutions to deal with the outbreak and cope with the repercussions that are bound to come our way. The audience will have a chance to interact with the speakers. By doing so, we learn from each other and provide an opportunity to form strategic Indo-Dutch ties!\r\nWe welcome you to become part of this bottom-up collective backing startup entrepreneurs to play their role as game changers.\r\n\r\nProgram for Tuesday 9 June \r\n11:00 â€“ 12:30 Central European Time and 14:30 â€“ 16:00 Indian Standard time \r\n\r\nCountry level response and industry expert opinion \r\nShashank Ojha, Senior Digital Development Specialist at The World Bank \r\nCornelia Dinca, Incoming Delegations and Living Labs Lead at Amsterdam Smart City, The Netherlands \r\nSander van Lingen, Business Development Manager for Smart Cites at Dell Technologies\r\n\r\nEntrepreneurs presentation and Q&A \r\nSimranjit Singh Grewal, CEO & Founder at Y the Wait, The Netherlands\r\nAyon Hazra, Co-Founder & CEO at Qlikchain, India/The Netherlands \r\nSanjoy Roy, CEO at AskSid AI, India\r\nPranav Vempati, Chief Executive Officer at Kal Bionics, India\r\nPeter van der Veen, Tripservice, The Netherlands \r\n\r\nModerator \r\nAditya Putta, Venture Sourcing Lead, WorldStartup\r\n\r\nTarget audience\r\n\r\nWe especially welcome innovation managers within government and corporates,  along with investors who can support the entrepreneurs with pilots, projects, investment and partnerships. \r\n\r\nSince this is also a time to share, we welcome other entrepreneurs who seek inspiration and would like to join forces through collaborations. All Indian and Dutch stakeholders that are involved and interested in Smart Cities & Mobility, and startup innovation in general are also invited.     \r\n\r\nFor any questions or comments, please contact Aditya Putta (aditya@yangonstartup.co). \r\n\r\nMade possible by\r\n The Netherlands Embassy in Yangon\r\nConsulate General of The Netherlands in Bangalore\r\nWorldStartup\r\nDell Technologies \r\nYangon SmartCity\r\nThe World Bank'),
(3, 'June-05-2020 15:19:38', 'Energy synergies in transportation hubs & smart charging pilots', 'Online Event', 'Mobility', 'https://webinar-cenex-stevin', '10 Jun 2020 19:30 - 21:30', 'Julian', 'j-kelly-brito-PeUJyoylfe4-unsplash.jpg', 'Free', 'Energy systems are becoming more complex and decentralised due to the increasing production of renewable energy sources and energy storage systems and their specific constraints in flexibility and availability. In addition, the increased need for the charging of electric mobility, especially in transportation-hubs, create serious societal challenges. These developments ask for a smarter way of dealing with energy supply and demand and require a better use of existing and new infrastructure.\r\n\r\nEnergy-hubs and smart charging technologies can provide solutions to address the challenges we are currently facing or will be facing soon. In this webinar Stevin and Cenex Nederland will give two keynotes on these subjects. Stevin is a management consultancy firm that is specialised in Asset Management in energy and mobility infrastructure. Its experience with municipalities, grid operators and (public) transport authorities has enabled Stevin to create a framework to achieve successful energy-hubs. Cenex Nederland is an Amsterdam based non-for-profit organisation delivering research and consultancy projects in zero emission vehicle technology and related infrastructure. Cenex Nederland works together with its strategic partner in the UK, Cenex (est. 2005).\r\n\r\nThis webinar is interesting for you if you are involved in:\r\n\r\nThe development of transportation-hubs\r\nThe electrification of (public) mobility\r\nProcuring and implementing solutions for energy distribution and charging infrastructure\r\nIncorporating the Renewable Energy Directive (RED2) and Energy Performance of Building Directive (EPDB)\r\nDeveloping city strategies for energy transition and Sustainable Urban Mobility Plans (SUMPs)\r\nBuilt environment energy- and fleet management\r\nSession 1 Energy-hubs\r\n\r\nKeynote speaker(s): Rogier Pennings & Luuk van Loosdrecht (STEVIN)\r\n\r\nThe rapid electrification of public mobility has a big impact on transportation-hubs due to the growing need for charging infrastructure. Coordination between municipalities, grid operators, public transport providers and nearby companies is fundamental to make these hubs efficient, both on an economic, environmental and social level. Such coordination will transform a transportation-hub into an energy-hub with various use-cases. Stevin gives a keynote on the concept of energy-hubs and the possible synergies and challenges that emerge while developing these energy-hubs.\r\n\r\nIn this session you will learn:\r\n\r\nWhat energy-hubs are and how these relate to the energy transition and transportation-hubs.\r\nThe opportunities and challenges that are ahead of us and the role of stakeholders.\r\nOur roadmap towards successful energy-hubs.\r\nSession 2 Lessons learnt in procuring smart charging technologies\r\n\r\nKeynote speaker(s): Esther van Bergen & Jorden van der Hoogt (CENEX NEDERLAND)\r\n\r\nElectric driving is on the rise, and as a result you can see more and more EVs driving through the streets. But this also means that each of these vehicles needs to be charged by electricity, adding stress to the electricity grid. To address these challenges, smart technologies are developed to help reduce load on the net, match supply and demand in a more decentralised energy system and optimise the use of renewable energy. This keynote is based on the learnings from the Interreg SEEV4-City project, which includes six real-life operational pilots in four different (North Sea Region) countries. We will highlight practical insights from and explore the potential for wider-scale application of, the different solutions used.\r\n\r\nIn this session you will learn:\r\n\r\nWhere we stand in terms of charging technology developments.\r\nHow you can charge more EVs while reducing the need of grid investments.\r\nWhat challenges you may face in procuring, installing and operating the equipment.\r\nWhat the potential and barriers of wider adoption of different solutions may be.'),
(4, 'June-05-2020 15:22:11', 'The Role of Circular Business Models During COVID-19 & Beyond', 'Online Event', 'Circular City', 'https://join.skype.com/Yhbco5sm4kZf', 'Tuesday, 9 June 2020 18:30 19:30', 'Julian', 'averie-woodard-4nulm-JUYFo-unsplash.jpg', 'Free', 'Join us to find out more about the opportunities that lie within circular business models in the fashion industry.\r\n\r\nAbout this Event\r\nCOVID-19 has had an immense impact on the fashion supply chain, putting everything on hold and highlighting the problems that require immediate actions.\r\n\r\nIn this session, we focus on some of the challenges the COVID-19 pandemic has created in the fashion industry and how this catalyzing moment can be an opportunity for brands to seriously explore new business models. We\'ll address both the short term actions in utilising innovative solutions to deal with excess inventory and the longer term objectives towards disrupting the status quo around consumption patterns.\r\n\r\nTwo of our Fashion for Good innovator alumni, Reflaunt and Lizee, will be offering their insights on the topic and sharing how their innovative solutions can accelerate digital transformation and help with excess stock.\r\n\r\nWeâ€™re also joined by Daniel Newton from Accenture Strategy and Georgia Parker from Fashion for Good, who worked on the â€˜Future of Circular Fashionâ€™ report which was published in 2019.\r\n\r\nSpeakers\r\n\r\nFelix Winckler â€“ Co-Founder, Reflaunt\r\nFelix is the co-founder and CCO of Reflaunt, a circular technology which bridges first-hand and second-hand markets, enabling high-end brands to give customers the option to re-sell, donate or recycle their wardrobes. An ex-New York State lawyer, Felix has co-founded several startups including Voicepolls and Votebox. Felix has an extensive expertise in growth, sales and online marketing.\r\n\r\nTanguy FrÃ©con â€“ Co-Founder, Lizee\r\nTanguy is the co-founder & CEO of Lizee, the leading eCommerce and Logistics Solution dedicated to rental. Before becoming an entrepreneur, he worked for various retail-tech solution providers such as Cegid, Microsoft or Wynd in NY, London and Paris. Aware of the impact of retail on the environment, he is determined to help brands in their ecological transition from a linear to a circular model.\r\n\r\nDaniel Newton â€“ Sustainability Strategy Consultant, Accenture Strategy\r\nDaniel has extensive experience in the circular economy, with a particular focus on new business models. He was part of the team that developed The Future of Circular Fashion report, in collaboration with Fashion for Good, which analysed the financial viability of Rental, Recommerce and Subscription-Rental and recently contributed to The Circular Economy Handbook: Realising the Circular Advantage, focused on the circular business model, technology and retail chapters.\r\n\r\nModerator\r\n\r\nGeorgia Parker â€“ Innovation Manager, Fashion for Good\r\nGeorgia Parker is responsible for scouting, screening and scaling innovators in the areas of raw materials, wet processing and circular business models. She also looks after impact reporting, tracking both FFG\'s and the innovators progress across key KPIs. Georgia joined Fashion for Good from adidas, where she worked in the Brand Sustainability team.'),
(5, 'July-05-2020 20:11:56', 'Meet the Innovators South Asia', 'Online Event', 'Digital City', 'www.skype.com', '18:00-19:00', 'echizen', 'zachary-nelson-98Elr-LIvD8-unsplash.jpg', 'Free', 'In our next Meet the Innovators series, youâ€™ll be hearing from a few innovators in the first batch of our South Asia Innovation Programme which kicked off at the beginning of the year.\r\n\r\nWeâ€™ll be joined by two innovators, who will share the disruptive solutions they are working on and you the audience will once again have an opportunity to ask plenty of questions. Fashion for Good\'s International Expansion Manager Priyanka Khanna will host this session, giving a brief intro on how we work alongside these innovators through our Innovation Platform.\r\n\r\nInnovators Pitching:\r\n\r\nParth Patil - CEO of Infinichains\r\nInfiniChains is a leading end-to-end track and trace solution using blockchain, AI and Cloud Computing to help brands and manufacturers to digitise sustainability practices. Through real-time data, efficiency and storytelling, they bridge the fragmented gaps between the different sustainability systems of farmers, manufacturers and brands.\r\n\r\nAdrian Jones and Graham Ross - Founders of Blocktexx\r\nBlockTexx turns textile waste into a resource, stimulates the production of new products and meets consumers demands to reduce the environmental impact of our everyday clothing.'),
(6, 'July-05-2020 20:15:12', 'REVOLUTION 2020', 'Conference', 'Mobility', 'Western Park, Yangon, Myanmar', '13:30 23:30', 'echizen', 'rochelle-brown-qZBttspn5XM-unsplash.jpg', 'Paid', 'Be part of the movement that defines the future of mobility!\r\n\r\nThousands of cleantech experts are joining forces to make mobility sustainable. We celebrate this movement at revolution, the idea-sharing and networking event for the emobility industry and beyond. Are you up for the challenge to accelerate the transition towards a zero-emission future?');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

DROP TABLE IF EXISTS `event_category`;
CREATE TABLE IF NOT EXISTS `event_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(60) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `title`, `author`, `datetime`) VALUES
(2, 'Digital City', 'Julian', 'May-25-2020 16:40:35'),
(3, 'Energy', 'Julian', 'May-25-2020 16:40:39'),
(4, 'Mobility', 'Julian', 'May-25-2020 16:40:44'),
(5, 'Circular City', 'Julian', 'May-25-2020 16:40:52'),
(6, 'Governance & Education', 'Julian', 'May-25-2020 16:41:01'),
(7, 'Citizens & Living', 'Julian', 'May-25-2020 16:41:14'),
(8, 'Smart City', 'Julian', 'May-25-2020 16:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
CREATE TABLE IF NOT EXISTS `event_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(60) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Online Event', 'Julian', 'May-25-2020 21:57:41'),
(2, 'Exhibition', 'Julian', 'May-25-2020 21:57:48'),
(3, 'Workshop', 'Julian', 'May-25-2020 21:57:52'),
(4, 'Seminar', 'Julian', 'May-25-2020 21:57:57'),
(5, 'Conference', 'Julian', 'May-25-2020 21:58:06'),
(6, 'VIP ', 'Julian', 'May-25-2020 21:58:27'),
(7, 'Speaker Session', 'Julian', 'May-25-2020 21:58:37'),
(8, 'Awards and competitions', 'Julian', 'May-25-2020 21:59:06'),
(9, 'Festivals', 'Julian', 'May-25-2020 21:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `post` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(1, 'May-19-2020 00:24:29', 'Digital City', 'Digital City', 'Julian', 'c1_384298.jpg', 'The internet in Myanmar (formerly known as Burma) has been available since 2000 when the first Internet connections were established. Beginning in September 2011, the historically pervasive levels of Internet censorship in Burma were significantly reduced. Prior to September 2011 the military government worked aggressively to limit and control Internet access through software-based censorship, infrastructure and technical constraints, and laws and regulations with large fines and lengthy prison sentences for violators.[1][2][3] In 2015, the internet users significantly increased to 12.6% with the introduction of faster mobile 3G internet by transnational telecommunication companies, Telenor Myanmar and Ooredoo Myanmar, and later joined by national Myanmar Post and Telecommunications (MPT).[4][5] While the internet situation in Myanmar has constantly been evolving since its introduction in 2010 and reduction of censorship in 2011, laws such as the 2013 Telecommunications Law continue to restrict citizens from total freedom online.[6] Despite restrictions, internet penetration continues to grow across the country.'),
(2, 'May-19-2020 16:42:21', 'Over 130,000 rice bags stranded in Kyaigaung and Muse', 'General', 'Julian', 'istockphoto-613884840-1024x1024.jpg', 'More than 130,000 rice bags from Myanmar are stranded in warehouses of Kyaigaung and Muse due to lack of pest free certificates, according to Muse rice wholesale shop.\r\n\r\nThe necessary documents were not issued by the Irrigation Department in time.  Although it was more than a month, it had been delayed in issuing over the necessary certificates. So, over 100,000 rice bags were stranded in Kyaigaung and over 30000 rice bags in Muse were stranded and sale of rice was stopped.\r\n\r\nâ€œAs the required documents were delayed issuing by the Irrigation Department, we couldnâ€™t transport these bags to Shwe Li. Business has totally come to a stop due to lack of certificates,â€ said vice-chairman Min Thein from the Muse rice wholesale shop.\r\n\r\nCurrently, a rice bag of Shin Thiri Thone costs Ywan 140, a rice bag of  Thukha costs Ywan 135, a rice bag of Nga Sein costs Ywan 135, and a rice bag of broken rice costs Ywan 128 while sugar was exported 10 trucks per day.\r\n\r\nDue to COVID-19, roads in China were closed and rice business has come to a stop. But, depending on Chinaâ€™s demand, rice, broken rice, maize, beans and pulses were sold again in the first week of March at the 105 mile border gate.'),
(3, 'May-19-2020 16:44:35', 'Myanmar earns US$1.2 B from maritime trade within two weeks BUSSINESS NEWS', 'Business', 'Julian', 'unnamed.jpg', 'Myanmar is earned over US$1.2 billion from maritime trade within over two weeks of this fiscal year and it is less than US$170 million in the same period of last fiscal year, according to figures announced by Ministry of Commerce.\r\n\r\nMyanmar earned US$1.391 billion from maritime trade from October 1 to 18 in last fiscal year.\r\n\r\nAlthough Myanmar was expected to earn US$31 billion in 2018-19 FY, it earned over US$34.97 billion from foreign trade. However trade deficiency was over US$1.39 billion.\r\n\r\nMyanmar exported US$16.919 billion worth of products from October 1 to September 30 in 2018-19 FY and imported US$18.059 billion worth of products in the same period.\r\n\r\nMyanmar is using maritime and border routes to trade with foreign countries.\r\n\r\nIt is exporting farming products, animal products, fishery products, forestry products, mining products, CMP (cut-make-pack) finished products and other products.\r\n\r\nMyanmar is importing machinery, raw materials used in factories, consumer products and CMP raw materials mainly.\r\n\r\nThe ministry is implementing national level export strategies to reduce trade deficiency and to have trade surplus, to reduce rules and regulations, to provide assistance for private sector and to export more value-added products.'),
(4, 'May-19-2020 16:46:22', 'Putting an end to civil war is the very first requirement of Myanmar: CNF', 'Political', 'Julian', 'cnf.jpg', 'Putting an end to civil war is the very first requirement of Myanmar, said Dr. Salai Lian Hmung Sakhong, vice chairman of Chin National Front (CNF). \r\n\r\nThe remark was made in an interview with him on union building principles based on democracy and federalism posted on the Facebook page of NCA-S EAO. \r\n\r\nâ€œAs far as I am concerned, ending civil war is the first and foremost requirement of our nation,â€ he said. \r\n\r\nWith the inability to end civil war and implement the Panglong agreement, democracy, equality and autonomy as well as development are impossible, he commented. \r\n\r\nâ€œDevelopment tasks cannot be implemented for a long time in places with wars and battles, in other words, in places without stability,â€ he added. \r\n\r\n So long as civil war or armed conflict exists, foreign investment will not come as much as expected. If there is any investment, it will come to the mainland only like regions (not states). Then, there will be an economic development gap, he said. \r\n\r\nThe common political aim in the NCA (Nationwide Ceasefire Agreement) is crucial. It is mentioned in paragraph-1 of Chapter-1 of the NCA, he pointed out. \r\n\r\nâ€œIn the fourth point (of the paragraph), ethnic nationals have made their demands after 70 years of their armed revolution. They are democracy, equality and self-administration. They are committed to the establishment of a federal union to fully enjoy these rights. This is our common political aim. We must work together. If the government, the parliament, the military and ethnic armed organizations are able to realize this aim, we must also be able to terminate 70 years of civil war,â€ said Dr. Salai Lian Hmung Sakhong.'),
(5, 'May-19-2020 16:47:55', 'Myanmar citizens handed over by Thai IDC placed at Kyauklonegyi quarantine center', 'Health', 'Julian', 'dsc_2750_0.jpg', 'Myanmar citizens sent by the Immigration Detention Center (IDC) from Thailand are arriving in Myanmar through Myanmar-Thai Friendship Bridge No (2), and they will be housed in a quarantine center in Kyauklonegyi for health checks, said the commissioner of Myawady District. \r\n\r\nMyanmar citizens released from detention will be placed in Kyauklonegyi quarantine center and have medical checkups at Myawady Hospital, Commissioner Tayzar Aung told The Daily Eleven on May 17. \r\n\r\n â€œThose released from penalty and IDC as per the Thai law were handed over after contacts between the immigration departments of the two countries. They received detailed medical checkups. They were placed in Kyauklonegyi quarantine center as soon as they arrived. They were sent to Myawady District  Hospital for check ups including X-ray, urine and blood tests. Depending on their health conditions, they would have X-ray tests if necessary. TB tests were also carried out if necessary. All had to undergo Covid-19 tests. On the fourth day after they had arrived, their swabs were taken and the results would be announced the following day. If they test negative, they can stay safe at the quarantine center for 21 days. They can also be transferred to respective quarantine centers in various regions and states,â€ Tayzar Aung said. \r\n\r\nThose who arrived at Myawady border gate on May 17 were handed over to Myanmar after they had been arrested for various reasons. On that day, 45 people arrived back at the friendship bridge No (2). The total number was 90 as 45 others arrived by plane. \r\n\r\nOne woman who was handed over said she turned herself in because she wanted to return home. \r\n\r\nA person who had returned by plane said: â€œWhatever would happen, I wanted to return to my motherland. I had to pay 3,300 baht.  '),
(6, 'May-19-2020 16:50:23', 'Govt buys about 6,300 tons of rice in reserve from 40 companies BUSINESS', 'Business', 'Julian', 'myanmar-rice.jpg', 'Government started purchasing, inspecting, accepting and storing State rice reserves on April 30, and about 6,300 tons of rice bought from 40 export companies have been stored in five warehouses. \r\n\r\nThe Ministry of Commerce, in cooperation with Myanmar Inspection and Testing Services Ltd and Myanmar Rice Federation, took charge of those tasks. \r\n\r\nThe Department of Trade has announced that in declaring export of rice, licensed exporters must sell 10 percent of their amount declared to the government for State rice reserves. The aim is to ensure local food security, price stability, farmersâ€™ income improvement and increased exportation during the Covid-19 outbreak. \r\n\r\nCompanies need to sell and send 10 percent of the amount of rice and broken rice stated in their export declarations to the designated State-owned warehouses before their export or within one week after export. \r\n\r\nIf the companies fail to do so, they will have their export/import registrations revoked and face legal action.'),
(7, 'May-19-2020 16:52:23', 'Technology and e-commerce companies respond to the crisis', 'Technology', 'Julian', 'img_20200406_121755.jpg', 'Services that deliver food, groceries, medical supplies and packages are among the few businesses thriving during the COVID-19 pandemic after local authorities ordered the closure of bars, dine-in restaurants, and entertainment facilities throughout much of Myanmar. More and more Myanmar people are practising social distancing and staying at home. Grocery stores remain open and many restaurants are offering carryout and delivery. Delivery companies in Myanmar have seen a surge in their businesses in recent weeks.\r\n\r\n\r\nAnd with the streets of Yangon being empty this Thingyan, bicycle couriers dominate the roads â€“ carrying their deliveries for companies like Food Panda and Door2Door. Online transactions reached a high-point from early April onwards, when news of restaurant closures started to become a reality for many hungry residents. With such high demand, Door2Door temporarily suspended orders between certain hours to meet incoming requests.\r\n\r\nCompanies like Vintage Luxury Yacht Hotel have also been working overtime during Thingyan, delivering food to workers in essential services across the city. Supplying lunch boxes to workers three times a day, delivery manager Kyaw Shin said that they had to cook around 210 meals just for the employees at OK Money. The digital payment app company estimates it has around 200 employees across two branches in the city, which was cut to just 70 to maintain operations before the Thingyan break.\r\n\r\nMarathon Myanmar, one of the countryâ€™s leading e-commerce delivery companies, also reported significantly higher demand for delivery services during the pandemic. Their solution to meeting the demand has been somewhat creative, with the company recruiting taxi drivers and freelance delivery cyclists into its existing technology platform. The initiative helps to increase delivery capacity, whilst providing extra income for both taxi drivers and other freelance dispatch riders.\r\n\r\n\r\nSo far, the e-commerce company has employed over 20 taxi drivers to meet their delivery needs for the first weeks of April, and plan to adopt the same model in Mandalay and Nay Pyi Taw.\r\n\r\nLike many other companies, Marathon is also adjusting its operations to ensure their workforce remains safe during the pandemic. As early as the first week of March, Marathon began supplying free facemasks and hand sanitisers to all delivery personnel and their families. This includes providing supplies to the new freelance drivers and couriers who, along with the companyâ€™s regular staff, have been instructed to wash their hands before, during and after each delivery.\r\n\r\nWith couriers, delivery and taxi drivers coming into regular contact with the public, itâ€™s important that this particular workforce be supported in their hygiene practices. A series of photos showing a young bike courier, seen dismounting and washing his hands before delivering a food parcel, won the praise of thousands of Facebook users in Myanmar last week. The post was shared hundreds of times, and indicates how rapidly attitudes towards hygiene have changed amidst the COVID-19 crisis.\r\n\r\nFor Marathon, a healthy workforce is also key to getting goods from its hub in Yangon to cities across the country. As early as mid-March, the company began instructing employees to wash their hands with soap and water regularly, installing new water basins at the buildingâ€™s entrance. Staff members were also encouraged to operate on a flexible schedule in order to avoid large crowds, and the company provided a new shuttle service for staff commuting to the office from various places in the city.\r\n\r\nMyanmarâ€™s response to the threat of COVID-19 has seen the adoption of best practices from overseas to fit local sensibilities. The widespread distribution of hand sanitisers and face masks is an example of this, with local pharmacy chains and supermarkets initially leading the way. At the street level, small-scale vendors now sell bottles of hand sanitsers and gloves alongside betel nut and bottled water.\r\n\r\nThese kinds of changes often occur through the business sector first, with its increased exposure to developments outside of the country. Referring to the companyâ€™s response to COVID-19 in Myanmar, Marathonâ€™s CEO Okkar Phyo said: â€œWe are a business that thrives on a healthy and robust team of delivery personnel traversing the remote corners of the country, and we want to ensure they practice good hygiene habits. So, we looked at what companies were doing in places like Singapore and agreed as a business that we wanted to be held to an international standardâ€.\r\n\r\nMarathon Myanmar is a tech focused one-stop-shop logistics company which offers delivery services throughout the country and, with developments like its merchant app, illustrates the importance of technology in times of crisis.\r\n\r\nItâ€™s difficult to imagine how Myanmar, as a country that has only recently connected itself to the world through smart phones and the internet, could have dealt with this pandemic just ten years ago. Not only in terms of sharing information, but technology companies have also assisted consumers to order products from furniture to food, electronics and hand sanitisers, at the swipe of a smartphone app.'),
(9, 'May-19-2020 17:42:15', 'Myanmar reports first COVID-case in Rakhine State', 'Health', 'echizen', 'yuzana_plaza_mingalarzay_reopen_mn-06.jpg', 'The first COVID-19 case has been found in Rakhine State at 8pm on May 18, according to the health ministry.\r\n\r\nCase-188 is a 35-year-old man who lives in Thandwe township in Rakhine State and a returnee from Malaysia. The man was tested positive while undergoing a facility quarantine in Thandwe. He has now been admitted to the Thandwe General hospital for treatment.\r\n\r\n\r\nThis marks the fifth case, starting with Case 184, where repatriates who returned to Myanmar after working in Malaysia have tested positive.\r\n\r\nThe National Health Laboratory tested 188 persons and the Department of Medical Research in Yangon Region tested 170 persons suspected of being infected with the virus in the latest batch.\r\n\r\nMoreover, four more COVID-19 patients are on the road to recovery after recent tests showed no remaining signs of the virus.\r\n\r\n\r\nThe first and second patients, Case-36 and Case-48, who are on the road to recovery are from Insein and South Okkalapa townships in Yangon and both of them were infected while attending a religious ceremony in Insein. Their test results have returned negative twice.\r\n\r\nThe third and fourth patients on the road to recovery, Case-88 and Case-114, are both from Kalay township in Sagaing Region. They were infected Case-1, a US green card holder from Tedim township, Chin State.\r\n\r\nFrom January 31 to May 18 at 8 pm, the government tested 14,561 people for the disease, the health ministry said.\r\n\r\nSo far, Myanmar has 188 COVID-19 cases with six deaths and 101 recoveries, it added.\r\n\r\nYangon Region has the highest number of confirmed cases at 149 out of all COVID-19 cases in the country.\r\n\r\nNo cases have been reported yet in  Ayeyarwady Region and Kayah State'),
(12, 'May-19-2020 17:48:25', 'Six people from Hlaing Tharyar suspected of COVID-19 test negative', 'Health', 'echizen', 'four-myanmar-migrant-workers-found-with-covid-19-suspect.jpg', 'Six people who are suspected of being infected with the coronavirus have tested negative after an inspection in Hlaing Tharyar township in Yangon on May 16.\r\n\r\nIn the township, around 150,000 people were checked for symptoms of COVID-19 and six people were selected to undergo tests for the disease but they all tested negative, said U Myat Min Thu, a regional Hluttaw MP.\r\n\r\n\r\nThe six were from the same factory where Case-144 worked and they had high body temperatures during the checks.\r\n\r\nâ€œWe checked around 150,000 out of more than one million people living in Hlaing Tharyar for COVID-19 with more than 900 health workers and 450 inspection teams. About 40 military personnel also aided the teams in inspecting Yi Chen factory,\" said U Myat Min Thu.\r\n\r\nSo far, 188 people have positive for COVID-19 in Myanmar and five patients are from Hlaing Tharyar township. There have been six deaths and 101 recoveries.\r\n\r\n\r\nDuring the health inspection on May 16, a total of 144,033 people from 32,060 households were checked for the disease.\r\n\r\nEarlier this month, authorities also conducted checks in Insein township, where 43 people have tested positive.\r\n\r\nYangon now accounts for 149 of all COVID-19 cases in the country. No cases have been found yet in Ayeyarwady Region and Kayah State.\r\n\r\nThe first cases of COVID-19 for Tanintharyi Region, Kayin and Rakhine states were found on May 18. ');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `project_category` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `creator` varchar(60) NOT NULL,
  `image` varchar(500) NOT NULL,
  `ppost` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `datetime`, `project_type`, `project_category`, `location`, `creator`, `image`, `ppost`) VALUES
(1, 'Looking for interviewees for Master thesis project', 'May-27-2020 13:06:32', 'A partnership', 'Digital City', 'AMS Institute', 'Julian', 'c_72032_4c74dd6a-3a0b-4704-b7d1-c8b0526eb993.jpg', 'Hi all! I am Johnny , a master student at the AMS Institute. For my thesis, I am researching how citizen engagement can contribute to evaluation/assessment of smart city and smart city projects with respect to quality of life. Quality of life is a basic component of the smart city'),
(2, 'Blue Force Tracking', 'July-05-2020 19:41:11', 'International', 'Digital City', 'Yangon, Myanmar', 'echizen', 'scott-graham-5fNmWej4tAA-unsplash.jpg', 'Pilot - Ensuring better support for enforcement officers in the field\r\nTesting medical certified body sensors to detect unexpected behaviour, triggering an alert, which allows the command & control room to act and better support their fellow officers in the field.\r\n\r\n What is the goal of the project?\r\n1) Improve support of employees & increasing their safety\r\n2) Proving digital safety measure can replace or reinforce physical safety requirements set by the UEFA for EK2020 (as part of the Digital Perimeter project)\r\n\r\n What is the result of the project?\r\nThe aim is to provide better support and safety for our enforcement officers during \"crowded\" events like soccer matches, kings day or Sail Amsterdam..\r\n\r\n Who initiated the project and which organizations are involved?\r\nInitiated by Dutch Police, City of Amsterdam, Johan Cruijff Arena, TNO\r\nRealized by Nalta, Equivital, Genetec, Securitas & Dell Technologies in close colaboration with the initiators\r\n\r\n What is the next step?\r\nScale up within the Police department, the City of Amsterdam and \r\nscale out into other cities around the world & into other industries.\r\n\r\n What can other cities learn from your project?\r\nKey succes factors:\r\n- Data strategy & Privacy by Design\r\n- Joint and highly focussed project team + Project manager\r\n- Test in a highly challanging environment (we used the soccer stadium with connectivity challenges)\r\n- Use High quality & tested sensors / proven technology from a respectable supplier'),
(3, 'Bees Digital Farm', 'July-05-2020 19:42:30', 'Local', 'Circular City', 'Yangon, Myanmar', 'echizen', 'boba-jaglicic-EmwhXkCiMiA-unsplash.jpg', 'â€œBuilding up tomorrowâ€™s food for todayâ€™s future!â€\r\nEver since the 20th century most of the countries across the globe are still using the traditional way of farming and itâ€™s still going on for the demand and supply of people. As we all know that by the year 2050, the 80 % estimation of the world population will have been living in urban areas which can lead the total population of the world to increase by 3 billion people. With this large amount of increase in population, scientists and researchers are quite worried about the farmland which will be required to generate such a huge demand for food supply to fulfill the necessity to survive. Noticing this fact in mind as what would be the future source of alternative solutions to solve such a type of problem a concept was proposed named â€œIn-House Farmingâ€.\r\n\r\n What is the goal of the project?\r\nBees Digital Farm is an upcoming research start-up that focuses on new technologies and innovative techniques in the agriculture domains, the primary audience is over the developing countries.\r\n\r\n What is the result of the project?\r\nTo build a research channel that focuses on the worldâ€™s first-ever digital data science technology In-house farming and renewable energy lab that provides solutions with future tailor-made technology-based digital farms in remote locations across the globe.\r\n\r\n What is the next step?\r\nTo achieve sustainable renewable energy-based intelligent farmhouse, by focusing on AI and machine learning-based consulting and sustainable community. Additionally, it provides engineering data science consultancy which is 100% data is encrypted through various technology-based digital learning platforms sand optimization. Furthermore, it also transforms the data to solve the unique farming solutions to our client need and it embarks a lifelong companion for clients to grow from installation to decommissioning.'),
(4, '5G-Blueprint', 'July-05-2020 19:44:38', 'International', 'Smart City', 'Yangon, Myanmar', 'echizen', 'erik-mclean-Qv2QUwFmiL0-unsplash.jpg', 'Realise the cross-border 5G connectivity, which is crucial for real-time data exchanges to and from vehicles\r\nThe 5G-Blueprint project is an international consortium of 28 parties. Together, these partners will be researching how real-time data exchange to and from vehicles, between terminals and vehicles, and between vehicles and distribution centers can contribute to increased efficiency in the supply chain, and help to resolve driver shortages by providing remote control of and support for vehicles and vessels. These developments are expected to improve accessibility of a key logistical corridor between the Netherlands and Belgium (Vlissingen â€“ Ghent â€“ Antwerp), as well as creating more jobs and strengthening the competitive position of the region. New 5G telecommunication technologies can be deployed as a useful resource in this area.\r\n\r\n What is the goal of the project?\r\nThe main research objective within the 5G-Blueprint project is to realise the cross-border 5G connectivity, which is crucial for crossborder real-time data exchanges to and from vehicles. The role of Eurofiber within the project is to research how public networks - such as those of the Directorate-General for Public Works and Water Management of the Netherlands and the Flemish government - can be used for a 5G application. Our research consists of the following questions; how can we connect various public networks in the Netherlands and Belgium, how do you coordinate this within the market and how do you carry this out technically, legally and operationally?\r\n\r\n What is the result of the project?\r\nThese developments are expected to improve accessibility of a key logistical corridor between the Netherlands and Belgium, as well as creating more jobs and strengthening the competitive position of the region. New 5G telecommunication technologies can be deployed as a useful resource in this area.\r\n\r\n Who initiated the project and which organizations are involved?\r\nThe project â€œ5G-Blueprintâ€, is funded by the European Commission. Eurofiber, KPN, Rijkswaterstaat, Terberg Benschop, Verbrugge, Kloosterboer, Sweco en Swarco are the Dutch participants of 5G-Blueprint.\r\n\r\n What is the next step?\r\nThe main research objective within the 5G-Blueprint project is to realise the cross-border 5G connectivity, which is crucial for crossborder real-time data exchanges to and from vehicles.\r\n\r\nhttps://eurofiber.com/press/eurofiber-partners-with-international-research-project-5g-blueprint/'),
(5, 'Digital Society School', 'July-05-2020 19:45:50', 'Local', 'Digital City', 'Yangon, Myanmar', 'echizen', 'marvin-meyer-SYTO3xs06fU-unsplash.jpg', 'Multidisciplinary teams working on positive impact\r\nDigital Society School is an energetic training ground where creative solutions are being developed, tested and prototyped to address business and societal challenges. We root our design, tech and social innovation in the Sustainable Development Goals of the United Nations. This unique combination offers insights and new perspectives to add innovation power to organisations. We work together with governments, businesses and citizens to help them adapt and become future-proof for the digital world. \r\n\r\nJoin forces with us now to work on the Sustainable Development Goals and explore how these can help open up market opportunities for your business. Embark on innovative projects together where we use digital technology to find effective results for the most pressing social and business challenges. Join forces with our creative and curious minds to work on challenges that your organisation faces. Develop competencies that are essential for now and the future. Learn the tools, mindset and methods that can be implemented back into your own organisation to lead the digital transformation of your business and of society. Customize or join our existing courses where we share knowledge, tools and methods to empower (your) people on their lifelong development journey. Whatever your choice is, it is bound to be a worthwhile investment towards building our digital future.\r\n\r\n What is the goal of the project?\r\nThe digital revolution that we are experiencing now is undoubtedly changing the way we live, work and think. Technological developments are everywhere â€” from connected spaces to artificial intelligence, and from virtual reality to blockchain. But beyond the hype, how can we apply these technologies to address the many urgent issues facing our planet and society while paying attention to the needs of businesses? How can we ensure technology remains inclusive and meaningful? At Digital Society School we set the stage to answer these questions and more. We work together with governments, businesses and citizens to help them adapt and become future-proof for the digital world.\r\n\r\n What is the result of the project?\r\nINNOVATION ON NEUTRAL GROUND\r\nStep out of your comfort zone to find innovative solutions for business and societal challenges.  We are part of the Amsterdam University of Applied Sciences (AUAS) which allows access to cutting-edge applied research and facilities. Our multidisciplinary teams offer full attention and expertise in design and tech to lend a fresh perspective on your challenge.\r\n\r\nACCESS TO DIGITALLY-SKILLED TALENT WITH A HEART FOR SOCIAL IMPACT\r\nWe have a strong local and global network which gives you access to the future generation of creators, thinkers and leaders. Work with talent equipped with 21st century competencies who can drive the (digital) transformation within your organisation.\r\n\r\nADOPT A NEW AGILE WAY OF WORKING AND THINKING\r\nWe facilitate lifelong development through our courses and projects to improve business impact. Learn new (digital) tools and methodologies that can inspire and add efficiencies to your day-to-day operations.\r\n\r\n Who initiated the project and which organizations are involved?\r\nThe Digital Society School was initiated by Geleyn Meijer, Rector Amsterdam University of Applied Sciences; Gijs Gootjes, Co-Founder & Head of Strategy; and Marco van Hout, Co-Founder & Head of Impact.\r\n\r\n What is the next step?\r\nAre you curious to learn more about how Digital Society School can help with your organisationâ€™s needs while making a positive impact on society? Get in touch with Wai Feersma Hoekstra (w.feersmahoekstra@hva.nl) now.'),
(6, 'Outdoor Office Day', 'July-05-2020 19:47:32', 'International', 'Citizens & Living', 'Yangon, Myanmar', 'echizen', 'marcel-strauss-BSshSDehY-0-unsplash.jpg', 'Join us our meeting on that beautiful day');

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

DROP TABLE IF EXISTS `project_category`;
CREATE TABLE IF NOT EXISTS `project_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Digital City', 'Julian', 'May-25-2020 21:48:54'),
(2, 'Energy', 'Julian', 'May-25-2020 21:48:57'),
(3, 'Mobility', 'Julian', 'May-25-2020 21:48:59'),
(4, 'Circular City', 'Julian', 'May-25-2020 21:49:01'),
(5, 'Governance & Education', 'Julian', 'May-25-2020 21:49:04'),
(6, 'Citizens & Living', 'Julian', 'May-25-2020 21:49:12'),
(7, 'Smart City', 'Julian', 'May-25-2020 21:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

DROP TABLE IF EXISTS `project_type`;
CREATE TABLE IF NOT EXISTS `project_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'International', 'Julian', 'May-27-2020 12:34:33'),
(2, 'Local', 'Julian', 'May-27-2020 12:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `request_category` varchar(50) NOT NULL,
  `request_user` varchar(60) NOT NULL,
  `user_job` varchar(100) NOT NULL,
  `job_location` varchar(500) NOT NULL,
  `creator` varchar(60) NOT NULL,
  `image` varchar(500) NOT NULL,
  `rpost` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `datetime`, `request_type`, `request_category`, `request_user`, `user_job`, `job_location`, `creator`, `image`, `rpost`) VALUES
(1, 'Looking for interviewees for Master thesis project', 'May-28-2020 16:12:47', 'A partnership', 'Digital City', 'Johnny Depp', 'Student', 'AMS Institute', 'Julian', 'main-qimg-fa166cb42693e4643faeb6340a056934.jpg', 'Hi all! I am Johnny , a master student at the AMS Institute. For my thesis, I am researching how citizen engagement can contribute to evaluation/assessment of smart city and smart city projects with respect to quality of life. Quality of life is a basic component of the smart city'),
(2, 'Sign up for the beta launch of our reading platform - and up-vote on Product Hunt!', 'June-03-2020 21:49:30', 'An idea', 'Citizens & Living', 'Lauren Mcdonald', 'Head of Growth', 'Eli5', 'Julian', '03f6e9f78a44102c85c9342b6f6fb65f.jpg', 'We\'re on a mission to create the best online reading experience ever - and would really appreciate an upvote on Product Hunt if you have time today - https://www.producthunt.com/posts/juno-read-better\r\n\r\nIf you like swapping articles with colleagues, friends and other groups, but are tired of a) lots of links in lots of different places and b) not knowing exactly which bit they want to highlight - then this one is for you. A way to share articles cross-platform, in one place, with highlights and comments.\r\n\r\nYou can also sign up to receive beta access when we launch.\r\n\r\nLet us know what you think!'),
(3, 'Interest in joining a smart energy project', 'June-04-2020 09:54:34', 'Job opportunity', 'Smart City', 'Tom Gruise', 'Master Student', 'Hanze UAS', 'Julian', 'a917c50e70a4c16bc35b9f0d8ce0352635-14-tom-cruise.rsquare.w700.jpg', 'Hello all,\r\nI am really eager to get some experience and expand my knowledge in everything involving smart grids, e-mobility (V2G) and low-temperature district heating.  From June onwards, I am available to join an exciting and innovative project which I could collaborate with you on!\r\nAt this moment, I am in my second semester at Hanze UAS taking the master in Sustainable Energy and I am requesting any input from you all regarding the possibilities of an internship/master thesis host.  I have been working on (including right at this moment) an innovative V2G proposal for a car sharing service in Alkmaar, a domestic hydrogen heating business proposal in Hoogeveen and a low-temp district heating project in Meerstad.\r\n\r\nLooking forward to hearing from you, fellow collaborator!'),
(4, 'Bubble Barrier In The River', 'July-05-2020 19:29:24', 'Information', 'Governance & Education', 'Bhaki Zemse', 'Student', 'Mumbai University', 'echizen', '11-111594_indian-beautiful-girl-images-wallpaper-pictures-download-indian.jpg', 'I want to study the concept about the same. I want to do project for my Academics. where can i get the detailed study and estimation of this project ?'),
(5, 'Master\'s thesis: Looking for interviewees involved in Schoonschip project', 'July-05-2020 19:31:14', 'Information', 'Energy', 'Rhea Srivastava', 'Student', 'Master at IHS, Eramus Universtiy Rotterdam', 'echizen', 'rexfeatures_5725782ax-1-1.jpg', 'Greetings everyone, my name is Rhea and i am pursuing my master\'s in Urban Management and Development.\r\nI am currently writing my thesis on decentralised smart energy systems accelerating neighbourhood circularity (through the case of Schoonschip, Amsterdam), aiming for an integrated result in the energy and circularity transition as well as to fill the gap in literature about neighbourhood circularity. \r\nConsequently, I am looking to interview people who were involved in the Schoonschip project, including experts, project developers, community members, municipality etc. The interview would be focusing on  conditions such as technological, economic, institutional, socio-cultural and environmental (depending on the interviewee\'s background) associated with the development of Schoonschip and its energy systems. Your valuable insights will be fully acknowledged in the final publication.\r\n\r\nKindly contact me if you are willing to contribute to my research or if you know someone who could help me out. I would be grateful! Thanks in advance!'),
(6, 'Empty work space buildings towards living work space', 'July-05-2020 19:33:06', 'Job opportunity', 'Citizens & Living', 'Michiel Zwerus', 'Engineer ', 'Rahtmae Rubitan Company', 'echizen', '4618277_orig.jpg', 'From this covid19 pandemic, many company buildings will become unoccupied due to termination of corporations and job layoffs. It offers great opportunities for new Dutch real estate management to make buildings smarter, better, safer, cleaner, and if possible to fill the office buildings with temporary living space.\r\n\r\nLooking for people to help  find buildings with: empty workspace with transition towards new work & living space transition options\r\nexample existing transformation   office building with hotel living space at office  (full kitchen and bathroom)  https://roundme.com/tour/369948/view/1263081/\r\n\r\nLooking for people with new SMART ideas to help  transform empty work spaces towards new, abd safe areas with clean  toilet/shower.  (e.g. office space towards temp student dorm)\r\nWould be great if you have experience with real estate anti squatting, government license, property management for empty buildings/leegstandsbeheer.\r\nPlease contact me  at info(at)pursangroyal.com  or call met at 06 53240595\r\nOur goal is to create a better solution to transform work space towards feasible solutions for clients.\r\nThe process : contact prospects, photo shoot 3 D spaces and draw solutions, write a short transition plan with option to fill empty work space \r\nYou will get paid per project, and travel cost will be covered. As well, you need to be able to speak well with prospects face to face, and have great judgement concerning safety, government license necessity, and feasibility for the clients.    \r\n\r\nPlease look at this event as well, which has a great source of new living space ideas  Meet-up: wonen op het Marineterrein\r\n23 MEI 2018\r\nMeet-up: Wonen op het Marineterrein\r\n19 juni 2018, van 18.30 â€“ 21.30 uur (inloop 18.00 uur)\r\nLocatie: Marineterrein Amsterdam, Bovenzaal IJsfontein (gebouw 024)\r\nAanmelden: aanmelden@marineterrein.nl o.v.v. meet-up: Wonen op het Marineterrein, op 19 juni 2018');

-- --------------------------------------------------------

--
-- Table structure for table `request_category`
--

DROP TABLE IF EXISTS `request_category`;
CREATE TABLE IF NOT EXISTS `request_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_category`
--

INSERT INTO `request_category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Digital City', 'Julian', 'May-27-2020 11:48:37'),
(2, 'Energy', 'Julian', 'May-27-2020 11:48:39'),
(3, 'Mobility', 'Julian', 'May-27-2020 11:48:41'),
(4, 'Circular City', 'Julian', 'May-27-2020 11:48:43'),
(5, 'Governance & Education', 'Julian', 'May-27-2020 11:48:45'),
(6, 'Citizens & Living', 'Julian', 'May-27-2020 11:48:49'),
(7, 'Smart City', 'Julian', 'May-27-2020 11:48:51'),
(8, 'Job', 'Julian', 'May-27-2020 11:48:54'),
(9, 'Business', 'Julian', 'May-27-2020 11:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

DROP TABLE IF EXISTS `request_type`;
CREATE TABLE IF NOT EXISTS `request_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'A partnership', 'Julian', 'May-28-2020 15:49:50'),
(2, 'An idea', 'Julian', 'May-28-2020 15:49:57'),
(3, 'Information', 'Julian', 'May-28-2020 15:50:03'),
(4, 'Job opportunity', 'Julian', 'May-28-2020 15:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `theme_category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `tpost` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `title`, `datetime`, `theme_category`, `author`, `image`, `tpost`) VALUES
(1, 'Digital City', 'May-27-2020 14:00:06', 'Digital City', 'Julian', 'digital-city.jpg', 'The internet in Myanmar (formerly known as Burma) has been available since 2000 when the first Internet connections were established. Beginning in September 2011, the historically pervasive levels of Internet censorship in Burma were significantly reduced. Prior to September 2011 the military government worked aggressively to limit and control Internet access through software-based censorship, infrastructure and technical constraints, and laws and regulations with large fines and lengthy prison sentences for violators.[1][2][3] In 2015, the internet users significantly increased to 12.6% with the introduction of faster mobile 3G internet by transnational telecommunication companies, Telenor Myanmar and Ooredoo Myanmar, and later joined by national Myanmar Post and Telecommunications (MPT).[4][5] While the internet situation in Myanmar has constantly been evolving since its introduction in 2010 and reduction of censorship in 2011, laws such as the 2013 Telecommunications Law continue to restrict citizens from total freedom online.[6] Despite restrictions, internet penetration continues to grow across the country.'),
(2, 'Energy', 'June-04-2020 10:12:27', 'Digital City', 'Julian', 'hotel-energy.jpg', 'Sustainable energy is the future. The city of Amsterdam has the ambition to provide every citizen with a solar panel in the next years. How do you contribute? Share your innovative initiatives on energy here.'),
(3, 'Mobility', 'June-04-2020 11:36:40', 'Mobility', 'Julian', 'ishan-seefromthesky-N2HtDFA-AgM-unsplash.jpg', 'Yangon is the commercial and probably the most developed city in the country. Ever since the liberalisation on import of foreign cars, the cityâ€™s roads and streets have been packed. What used to take an hour and a half on a day to make a certain journey now takes six hours.\r\n\r\nTo amend this situation, the cityâ€™s public transportation system needs to be revamped.\r\n\r\nThere are supposedly two types of public transportation in Yangon: the circular train and bus. The circular train is a 3-hour journey, going around the city, where passengers hop on and off the train as it makes stops at major towns. It has become a tourist attraction, so letâ€™s not count this as viable public transportation service.\r\n\r\nThe buses in Yangon are another story. They are cheap, making them reliant by the majority of the population, overburdened and unsafe.\r\n\r\nEach bus is supposedly allocated to own routes; however, as their pay is based on commission, the bus drivers race each other for more passengers. The government is removing this system by encouraging fixed salary with incentives approach and revoking licenses who fail to do so, to make roads safer.\r\n\r\n IoT and Big Data in Transportation System\r\n\r\nAdditionally, the bus fare collection system is undeveloped.\r\n\r\nWe have what the Burmese call a â€œspareâ€ on the bus, a conductor who helps collect fares from passengers. The conductor and driver will work out a percentage amongst themselves and divide the commission.\r\n\r\nTo make the bus system more efficient, at the start of this year, Yangon Region Chief Minister announced the implementation of Yangon Payment System (YPS), which will bring in YPS cards to be used on all means of public transport. The card system, of course, a technology made possible by IoT and big data, will inform Yangon Region Transport Authority to ensure better services for the public, remove the need of conductors. Understanding the travel pattern and the popular bus stations would help the bus operators know where to provide more services and frequently.\r\n\r\nMost of the passengers do not have YPS cards yet, and with the removal of conductors, the bus operators need to place fareboxes at the entry.\r\n\r\nAs the system has just been introduced, it is not fully adopted yet, and unfortunately has begun to raise concerns and questions on the peopleâ€™s morals. Some, assuming there will be conductors, conveniently forgets to pay. Some enter from the exit doors and never manage to pay. The rest just takes advantage of the new system by simply avoiding to pay.\r\n\r\nApparently, the passengers take care of the bus operators in these situations. When people enter from exit doors or did not tap the card or forget to put cash in farebox, others would remind them to do so or stare until they pay.\r\n\r\nOne of the private bus operator, named YPBC, has started using the farebox system since 2016, and it explained that there had not been any adverse impacts in profits.'),
(4, 'Circular City', 'June-04-2020 11:41:13', 'Circular City', 'Julian', 'Circular-Economy.jpg', 'Moving from a linear to a circular economy means minimising the waste and pollution by reducing, recycling and reusing. The City of Yangon aims to redesign twenty product- or material chains. The implementation of material reuse strategies has the potential to create a value of â‚¬85 million per year within the construction sector and â‚¬150 million per year with more efficient organic residual streams. Yangon set up an innovation program on the circular economy. By converting waste into electricity, urban heating and construction materials, the Yangon Electricity Company generates 900 kWh per 1000 kg of waste. 75% of the sewage system is separated for waste and rain water and the silt which remains after treating waste water is converted into natural gas. Share your innovative concepts and ideas on circular economy here.'),
(5, 'Governance & Education', 'June-04-2020 11:45:03', 'Governance & Education', 'Julian', 'roman-mager-5mZ_M06Fc9g-unsplash.jpg', 'The educational system of Myanmar (also known as Burma) is operated by the government Ministry of Education. Universities and professional institutes from upper Burma and lower Burma are run by two separate entities, the Departments of Higher Education (Lower Burma and Upper Burma), whose office headquarters are in Yangon and Mandalay respectively. The education system is based on the United Kingdom\'s system, due to nearly a century of British and Christian presences in Burma. \"The first Government high school was founded by the British colonial administration in 1874. Two years later, this Government High School was upgraded and became University College, Rangoon.\" Nearly all schools are government-operated, but recently, there has been an increase in privately funded schools (which specialize in English). Schooling is compulsory until the end of elementary school, probably about 9 years old, while the compulsory schooling age is 15 or 16 at international level.\r\nThe literacy rate of Burma, according to the 2014 Burma Census stands at 89.5% (males: 92.6%, females: 86.9%).The annual budget allocated to education by the government is low; only about 1.2% is spent per year on education. English is taught as a second language from kindergarten.\r\n\r\nMost of the early mission schools are since 1860 (such as La Salle schools) in Burma were nationalised on 1 April 1965 after the order restoration of general Ne Win.'),
(6, 'Smart City Academy', 'June-04-2020 11:48:55', 'Smart City', 'Julian', 'smart-city_myth.jpg', 'Are you interested in the experiences of others working in smart city projects and organizations? The Smart City Academy provides available knowledge about smart city projects and can help you with project development. \r\n\r\nThis Smart City Academy page provides you with information and researches about the impact and conditions of smart city projects. Professors, teachers and students study the initiation, management, collaboration and scaling of smart city projects and would like to share these results with you. They do so by organizing events and masterclasses, by developing smart city tools and methodologies and by making research and outcomes accessible. You can find everything here. \r\n\r\nAnd the good news is.... You can add your knowledge too! Are you working on Smart City research? Please feel free to share your knowledge in the Academy section, under â€˜Other research and thesesâ€™. \r\n\r\nThe Smart City Academy is powered by the Yangon University of Applied Sciences. If you have any questions, you can contact smartcityacademy@gmail.com\r\n'),
(7, 'Citizens & Living', 'June-04-2020 11:53:28', 'Citizens & Living', 'Julian', 'arnaud-jaegers-IBWJsMObnnU-unsplash.jpg', 'The 1982 Citizenship Law is at the heart of a heated debate. For some, it is part of the problem, for others it is the solution. \r\nCitizenship is a concept covering different realities and countries over the world based on different principles. Some grant it to someone who is born on the territory (citizenship by birth) â€“ such in the case of France. Others grant it to people whose parents are citizens themselves (citizenship by blood) â€“ the case of Germany until a very recent past. Another option is to reside in the country for a certain amount of time and to fit certain criteria like allegiance to the State and knowledge of the countryâ€™s history â€“ such as in the case of the US. \r\n\r\nMost coutries in the west accept these three ways of accessing to citizenship.\r\n\r\nSome countries recognise dual citizenship (the possibility to be a citizen of two countries at the same time). In Myanmar dual citizenship is not recognised â€“ becoming a citizen of Myanmar means giving up oneâ€™s previous citizenship. \r\nCitizenship also excludes some people to accede high-office. In the US, for example, someone who is not born a citizen cannot become President. In Australia, a Member of Parliament finding him or herself having dual nationality can lose his or her seat. In Myanmar, according to the constitution, having children with a foreigner can prevent one from becoming President .\r\nAccording to the 1982 Law enacted by the one-party Parliament of the Socialist Republic, here are the rules linked to citizenship. \r\n\r\nThere are three categories of citizenship. \r\n\r\nFull citizens are â€œNationals such as the Kachin, Kayah, Karen. Chin, Burman, Mon, Rakhine or Shan and ethnic groupsâ€ who have settled before 1823 and the British invasion. People often refer to â€œ135 national racesâ€ which appearred in official documents only in 2014, during a nation-wide census. It is not annexed to the 1982 Law. It can be traced back to speeches but the legal ground was very weak before 2014.\r\n\r\nAssociate citizens are people who applied under the 1948 Citizenship Act, which is a looser concept of citizenship â€“ a foreigner could then be granted citizenship if they had been living no less than five years in Burma, spoke an indigenous language and respected the law of the land.\r\n\r\nNaturalised citizens are those who arrived prior to 1948, but not necessarily before the British invasion, but who have not applied to become citizens before 1982. \r\n\r\nWeekend asked eight citizens from different ages, religions and walks of life what they think of the law and what citizenship means to them. Myanmar is one of the rare country establishing diffferent categories of citizesn within its own state. '),
(8, 'tests', 'July-05-2020 11:23:10', 'Digital City', 'Julian', '180712-58-2000-acc-yangon-hotel.jpg.thumb.768.768.jpg', 'asdasf');

-- --------------------------------------------------------

--
-- Table structure for table `themes_category`
--

DROP TABLE IF EXISTS `themes_category`;
CREATE TABLE IF NOT EXISTS `themes_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes_category`
--

INSERT INTO `themes_category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Digital City', 'Julian', 'May-25-2020 22:06:55'),
(2, 'Energy', 'Julian', 'May-25-2020 22:06:58'),
(3, 'Mobility', 'Julian', 'May-25-2020 22:07:00'),
(4, 'Circular City', 'Julian', 'May-25-2020 22:07:02'),
(5, 'Governance & Education', 'Julian', 'May-25-2020 22:07:03'),
(6, 'Citizens & Living', 'Julian', 'May-25-2020 22:07:08'),
(7, 'Smart City', 'Julian', 'May-25-2020 22:07:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign_Relation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_events`
--
ALTER TABLE `comments_events`
  ADD CONSTRAINT `comments_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_projects`
--
ALTER TABLE `comments_projects`
  ADD CONSTRAINT `comments_projects_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_requests`
--
ALTER TABLE `comments_requests`
  ADD CONSTRAINT `comments_requests_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
