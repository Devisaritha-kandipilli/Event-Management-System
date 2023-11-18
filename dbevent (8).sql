-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 06:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `EventID` varchar(50) NOT NULL,
  `Bookingdate` varchar(50) NOT NULL,
  `number_of_attendees` varchar(50) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `selectedImage` varchar(20) NOT NULL,
  `codeID` int(5) DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `EventID`, `Bookingdate`, `number_of_attendees`, `budget`, `selectedImage`, `codeID`, `Code`, `pname`) VALUES
(1, '1', '2023-11-16', '500', 'premium', 'dist/img/venue19.jpg', 1, 'C008', 'kinngarts photography'),
(2, '7', '2023-11-24', '40', 'standard', 'dist/img/venue14.jpg', NULL, NULL, 'STONE Photography'),
(3, '14', '2023-11-23', '400', 'standard', 'dist/img/venue18.jpg', 0, 'C006', NULL),
(4, '14', '2023-11-19', '400', 'standard', 'dist/img/venue18.jpg', NULL, NULL, 'STONE Photography'),
(5, '3', '2023-11-25', '500', 'premium', 'dist/img/venue12.jpg', NULL, NULL, NULL),
(6, '2', '2023-11-22', '400', 'premium', 'dist/img/venue19.jpg', 2, 'C002', NULL),
(7, '2', '2023-11-25', '60', 'standard', 'dist/img/venue14.jpg', NULL, 'c003', 'ANAND Photography'),
(8, '6', '2023-11-23', '50', 'standard', 'dist/img/venue14.jpg', 2, 'C008', 'ANAND Photography'),
(9, '3', '2023-11-25', '300', 'standard', 'dist/img/venue19.jpg', 1, 'C001', 'kinngarts photography'),
(10, '', '', '', '', '', 0, 'C001', NULL),
(11, '6', '2023-11-25', '100', 'standard', 'dist/img/venue7.jpg', 0, 'C005', NULL),
(12, '6', '2023-11-18', '100', 'standard', 'dist/img/venue14.jpg', 4, 'C003', 'kinngarts photography');

-- --------------------------------------------------------

--
-- Table structure for table `budgetranges`
--

CREATE TABLE `budgetranges` (
  `RangeID` int(11) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `MinBudget` decimal(10,2) NOT NULL,
  `MaxBudget` decimal(10,2) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budgetranges`
--

INSERT INTO `budgetranges` (`RangeID`, `budget`, `MinBudget`, `MaxBudget`, `Description`) VALUES
(1, 'standard', 15000.00, 99999.00, 'A \"Standard Budget\" is designed for individuals, couples, or organizations seeking a balance between cost-effectiveness and the quality of their event. It represents a budget range that allows for well-planned and memorable events without overextending financially.'),
(2, 'premium', 100000.00, 1000000.00, 'A \"Premium Budget\" is your ticket to an extravagant and opulent event. It\'s tailored for those who desire nothing but the best and are willing to invest in creating a truly extraordinary and unforgettable experience.');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `Code` varchar(50) NOT NULL,
  `Catering_Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`Code`, `Catering_Name`, `Address`, `price`, `Email`, `Rating`) VALUES
('C001', 'Venkat Sampradaya catering', 'kakinada', '₹600', 'VenkatSampradaya@gmail.com', '4.6'),
('C002', 'RVR Catering Service', 'Kakinada', '₹600', 'RVRCateringService@gmail.com', '4.8'),
('C003', 'Ramya Catering', 'Rajahmundry', '₹890', 'RamyaCatering@gmail.com', '5.0'),
('C004', 'Sri Gayatri Catering', 'Rajahmundry', '₹700', 'SriGayatriCatering@gmail.com', '4.8'),
('C005', 'sri srinivasa catering', 'vishakapatnam', '₹1000', 'srisrinivasacatering@gmail.com', '4.7'),
('C006', 'Shresta Caterers', 'vishakapatnam', '₹1240', 'ShrestaCaterers@gmail.com', '5.0'),
('C007', 'venkata ganesh catering', 'vijayawada', '₹500', 'venkataganeshcatering@gmail.co', '5.0'),
('C008', 'Annapurna foods services', 'kakinada', '₹340', 'Annapurna@gmail.com', '4.9');

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `decorationID` varchar(30) NOT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Budget` varchar(30) NOT NULL,
  `imgpath` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`decorationID`, `Event_name`, `Name`, `Budget`, `imgpath`) VALUES
('D001', 'Marriage', 'Haldi', 'premium', 'dist/img/decoration1.jpeg'),
('D002', 'Marriage', 'Haldi', 'premium ', 'dist/img/decoration2.jpeg'),
('D003', 'Marriage', 'Haldi', 'premium ', 'dist/img/decoration3.jpeg'),
('D004', 'Marriage', 'Haldi', 'standard ', 'dist/img/decoration4.jpeg'),
('D005', 'Marriage', 'Haldi', 'standard ', 'dist/img/decoration5.jpeg'),
('D006', 'Marriage', 'Haldi', 'standard ', 'dist/img/decoration6.jpeg'),
('D007', 'Marriage', 'Mehndi ', 'premium ', 'dist/img/decoration7.jpeg'),
('D008', 'Marriage', 'Mehndi ', 'premium ', 'dist/img/decoration8.jpeg'),
('D009', 'Marriage', 'Mehndi ', 'Premium ', 'dist/img/decoration9.jpeg'),
('D010', 'Marriage', 'Mehndi ', 'standard ', 'dist/img/decoration10.jpeg'),
('D011', 'Marriage', 'Mehndi ', 'standard ', 'dist/img/decoration11.jpeg'),
('D012', 'Marriage', 'Mehndi ', 'standard ', 'dist/img/decoration12.jpeg'),
('D013', 'Marriage', 'marriage', 'premium ', 'dist/img/decoration13.jpeg'),
('D014', 'Marriage', 'marriage ', 'premium ', 'dist/img/decoration14.jpeg'),
('D015', 'Marriage', 'Marriage ', 'Premium ', 'dist/img/decoration15.jpeg'),
('D016', 'Marriage', 'Marriage ', 'standard ', 'dist/img/decoration16.jpeg'),
('D017', 'Marriage', 'marriage ', 'standard ', 'dist/img/decoration17.jpeg'),
('D018', 'Marriage', 'Marriage ', 'standard ', 'dist/img/decoration18.jpeg'),
('D019', 'Marriage', 'Reception ', 'premium ', 'dist/img/decoration19.jpeg'),
('D020', 'Marriage', 'Reception ', 'premium ', 'dist/img/decoration20.jpeg'),
('D021', 'Marriage', 'Reception ', 'premium ', 'dist/img/decoration21.jpeg'),
('D022', 'Marriage', 'Reception ', 'standard ', 'dist/img/decoration22.jpeg'),
('D023', 'Marriage', 'Reception ', 'standard ', 'dist/img/decoration23.jpeg'),
('D024', 'Marriage', 'Reception ', 'standard ', 'dist/img/decoration24.jpeg'),
('D025', 'Marriage', 'Engagement ', 'premium ', 'dist/img/decoration25.jpeg'),
('D026', 'Marriage', 'Engagement ', 'premium ', 'dist/img/decoration26.jpeg'),
('D027', 'Marriage', 'Engagement ', 'premium ', 'dist/img/decoration27.jpeg'),
('D028', 'Marriage', 'Engagement ', 'standard ', 'dist/img/decoration28.jpeg'),
('D029', 'Marriage', 'Engagement ', 'standard ', 'dist/img/decoration29.jpeg'),
('D030', 'Marriage', 'Engagement ', 'standard ', 'dist/img/decoration30.jpeg'),
('D031', 'Birthday', 'birthday ', 'premium ', 'dist/img/decoration31.jpeg'),
('D032', 'Birthday', 'birthday ', 'premium ', 'dist/img/decoration32.jpg'),
('D033', 'Birthday', 'birthday ', 'premium ', 'dist/img/decoration33.jpeg'),
('D034', 'Birthday', 'birthday ', 'standard ', 'dist/img/decoration34.jpeg'),
('D035', 'Birthday', 'birthday ', 'standard ', 'dist/img/decoration35.jpeg'),
('D036', 'Birthday', 'birthday ', 'standard ', 'dist/img/decoration36.jpeg'),
('D037', 'Anniversary ', 'Anniversary ', 'premium ', 'dist/img/decoration37.jpeg'),
('D038', 'Anniversary ', 'Anniversary ', 'premium ', 'dist/img/decoration38.jpeg'),
('D040', 'Anniversary ', 'Anniversary ', 'standard ', 'dist/img/decoration40.jpeg'),
('D041', 'Anniversary ', 'Anniversary ', 'standard ', 'dist/img/decoration41.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `EventType` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Name`, `EventType`, `Description`) VALUES
(1, 'Marriage', 'social event', 'The Marriage Celebration is a joyous and memorable occasion where two individuals come together to exchange their vows of love and commitment. It\'s a special day when the couple embarks on their journey of life together, surrounded by family and friends.'),
(2, 'Birthday', 'social event', ' Birthday Celebration is a time-honored tradition where friends and family come together to mark another year of life for a special individual. It\'s a day filled with laughter, fun, and heartfelt wishes, as the birthday person is surrounded by loved ones.'),
(3, 'baby shower', 'social event', 'The Baby Shower Celebration is a joyful and tender occasion dedicated to welcoming a new life into the world and honoring the soon-to-arrive baby and parents. It\'s a time for family and friends to come together to express their love and support, offer well wishes, and shower the parents with gifts and warm sentiments.'),
(4, 'Anniversary', 'social event', 'The Anniversary Celebration is a heartwarming and joyous occasion that marks another year of love, commitment, and cherished memories for a couple. It\'s a time to reflect on the journey they\'ve traveled together and to celebrate the enduring bond that unites them.'),
(6, 'get together', 'leisure event', 'A \"get-together party\" is a social gathering where friends, family, or acquaintances come together to enjoy each other\'s company, celebrate an occasion, or simply spend quality time together.'),
(7, 'pool party', 'leisure event', 'A pool party is a fun and refreshing social gathering that takes place around a swimming pool'),
(8, 'concert', 'leisure event', 'A concert event, often simply referred to as a \"concert,\" is a live musical performance in which musicians or bands play music in front of an audience'),
(9, 'beach party', 'leisure event', '\r\nA beach party is a social gathering or event that takes place on a beach, typically near the shoreline of an ocean, sea, lake, or river.'),
(10, 'Award ceremony', 'corporate event', 'An award ceremony is an event where individuals, organizations, or achievements are recognized and celebrated. '),
(11, 'Business conference', 'corporate event', ' conference is a formal gathering of people with a shared interest or profession to discuss, exchange knowledge, and collaborate on specific topics. '),
(12, 'seminar', 'corporate event', ' A seminar is an educational event or gathering that focuses on the discussion and exploration of specific topics or issues'),
(13, 'new product launch', 'corporate event', ' A product launch is an event where a company introduces a new product to the marketasxd. ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `amount`, `bookingID`, `contact`, `payment_status`, `payment_id`, `added_on`) VALUES
(2, 'Samuel', 500, 1, '9703076663', 'complete', 'pay_MxehSuaVrImQ1V', '2023-11-07'),
(3, 'sana', 500, 2, '9805671244', 'complete', 'pay_Mxer7L5sP9Zwt9', '2023-11-07'),
(4, 'satya', 6000, 5, '9078665511', 'complete', 'pay_MxwCG4cuABkLec', '2023-11-08'),
(5, 'sana', 1, 3, '9807654312', 'complete', 'pay_My0hoCqnguDolP', '2023-11-08'),
(6, 'sss', 80, 6, '9990076987', 'complete', 'pay_MyOnKT7oPWa254', '2023-11-09'),
(7, 'Mahasivabattu Lavanya', 12, 3, '9807654312', 'complete', 'pay_Mzrub2BogkUBfh', '2023-11-13'),
(8, 'lavanya', 1, 2, '123ert', 'complete', 'pay_MzypAC3vGtZC79', '2023-11-13'),
(9, 'qwe', 11, 5, '1', 'complete', 'pay_N0EH3GImMAMxmM', '2023-11-14'),
(14, 'bghnjk', 11, 1, '9990076987', 'complete', 'pay_N0JKq2ZWt4RKyR', '2023-11-14'),
(15, 'lahari', 100, 8, '9087654421', 'complete', 'pay_N0M900VMcuYiwQ', '2023-11-14'),
(16, 'lahari', 100, 8, '9087654421', 'complete', 'pay_N0MYXjzVY5EQM5', '2023-11-14'),
(17, 'srii', 500, 9, '9703075552', 'complete', 'pay_N1RDeZwB6hGtVK', '2023-11-17'),
(18, 'lavanya', 2000, 11, '9876045132', 'complete', 'pay_N1T5NCdaZOndV8', '2023-11-17'),
(19, 'lalitha', 1000, 12, '9703075552', 'complete', 'pay_N1WVbw069dwGpm', '2023-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `photographyservices`
--

CREATE TABLE `photographyservices` (
  `pid` varchar(5) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Rating` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photographyservices`
--

INSERT INTO `photographyservices` (`pid`, `pname`, `Address`, `Email`, `Rating`) VALUES
('p001', '3 ART studio', 'vishakapatnam,Andhrapradesh', '3artstudio@gmail.com', '4.6'),
('p002', 'ANAND Photography', 'vishakapatnam,Andhrapradesh', 'anandstudio@gmail.com', '5'),
('p003', 'STONE Photography', 'Rajahmundry,Andhrapradesh', 'studiostone@gmail.com', '4.8'),
('p004', 'kinngarts photography', 'kakinada,AP', 'kinngarts_photography@gmail.com', '4.6'),
('p005', 'K M Pixel photography', 'vishakapatnam,Andhrapradesh', 'kmpix@gmail.com', '4.8'),
('p006', 'satya devineni phptography services', 'vijayawada,AP', 'satyaphptography@gmail.com', '5.0'),
('p007', 'RK Photography', 'vijaywada,Andhra pradesh', 'rkphotos123@gmail.com', '4.9'),
('p008', 'vasavi', 'vijayawada', 'vasavi@gmaill.com', '5.0');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `booking_id` int(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ID`, `rating`, `booking_id`, `description`) VALUES
(1, 5, 8, 'excellent'),
(2, 5, 1, 'wonderful'),
(3, 5, 2, 'eventrix is just awesome'),
(4, 5, 3, 'i will give 5 stars'),
(5, 5, 9, 'its worthful experience'),
(6, 5, 7, 'this made our work so easy'),
(7, 4, 11, 'good'),
(8, 5, 12, 'eventrix is just awesome');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `codeID` int(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `speciality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`codeID`, `address`, `speciality`) VALUES
(1, 'kakinada', ' kakinada gottam kaja'),
(2, 'rajahmundry', 'Rose milk'),
(3, 'vijayawada', 'pulihora'),
(4, 'vishakapatnam', 'Madugula Halwa');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userid`, `username`, `password`, `level`) VALUES
(1, 'lavanya', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(2, 'devika', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(3, 'maha', '7215ee9c7d9dc229d2921a40e899ec5f', 'admin'),
(4, 'Neeraja', '76419c58730d9f35de7ac538c2fd6737', 'user'),
(5, 'sarita', '93279e3308bdbbeed946fc965017f67a', 'user'),
(6, 'lavanya m', '93279e3308bdbbeed946fc965017f67a', 'user'),
(7, 'lahari', '2c216b1ba5e33a27eb6d3df7de7f8c36', 'user'),
(8, 'srii', 'b59c67bf196a4758191e42f76670ceba', 'user'),
(9, 'swati', '1545e945d5c3e7d9fa642d0a57fc8432', 'user'),
(10, 'lalitha', 'b59c67bf196a4758191e42f76670ceba', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venueID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `imgpath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venueID`, `Name`, `Address`, `capacity`, `imgpath`) VALUES
('v001', 'vaibhav', 'rajahmundry', '500', 'dist/img/venue1.jpg'),
('v002', 'shubhamasthu', 'rajahmundry', '500', 'dist/img/venue2.jpg'),
('v003', 'Kusuma Satya', 'kakinada ', '550', 'dist/img/venue11.jpg'),
('v004', 'Sri Bhavani', 'kakinada ', '550', 'dist/img/venue12.jpg'),
('v005', 'vijay function hall', 'ramachandrapuram', '1000', 'dist/img/venue5.jpg'),
('v006', 'NVR function hall', 'ramachandrapuram', '1000', 'dist/img/venue6.jpg'),
('v007', 'the venue', 'vijayawada', '1500', 'dist/img/venue7.jpg'),
('v008', 'grandeur', 'vijayawada', '1500', 'dist/img/venue8.jpg'),
('v009', 'A1 grand', 'vishakapatnam', '7500', 'dist/img/venue9.jpg'),
('v010', 'chilkuri', 'vishakapatnam', '1500', 'dist/img/venue10.jpg'),
('v011', 'The Park', 'vishakapatnam', '1000', 'dist/img/venue14.jpg'),
('v012', 'NOVOTEL', 'vishakapatnam', '500', 'dist/img/venue13.jpg'),
('v013', 'Radisson Blu', 'vishakapatnam', '500', 'dist/img/venue15.jpg'),
('v014', 'Four Points', 'vishakapatnam', '500', 'dist/img/venue16.jpg'),
('v015', 'Lemon Tree premier', 'vijayawada', '500', 'dist/img/venue17.jpg'),
('v016', 'quality inn', 'vijayawada', '500', 'dist/img/venue18.jpg'),
('v017', 'GRT grand', 'kakinada', '500', 'dist/img/venue19.jpg'),
('v018', 'Royal park', 'kakinada', '500', 'dist/img/venue20.jpg'),
('v019', 'manjjera sarovar', 'rajahmundry', '500', 'dist/img/venue21.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `budgetranges`
--
ALTER TABLE `budgetranges`
  ADD PRIMARY KEY (`RangeID`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`decorationID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bid` (`bookingID`);

--
-- Indexes for table `photographyservices`
--
ALTER TABLE `photographyservices`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`codeID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `budgetranges`
--
ALTER TABLE `budgetranges`
  MODIFY `RangeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `codeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_bid` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
