-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`, `status`) VALUES
(1, 'Prof.', 'Hagrid', 'porh', '12345', 'hagrid@gmail.com', '9999999999', 'p.jpeg', 'yes'),
(2, 'Prof.', 'Dumbledore ', 'prod', '12345', 'dumbledore@gmail.com', '3784789489', 'p.jpeg', 'yes'),
(3, 'Prof.', 'Snape', 'pros', '12345', 'snape@gmail.com', '9876543210', 'p.jpeg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `bcount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`, `bcount`) VALUES
(1, 'Fundamentals of Data Structures in C', 'Sahni Horowitz', 'Second', 'Available', 3, 'Technology', -1),
(2, 'Introduction to the Theory of Numbers', 'G.H. Hardy', 'Sixth', 'Available', 8, 'Mathematics', 0),
(3, 'The Palace of Ilusions', 'Chitra Banjerjee Divakaruni', 'Eighth', 'Available', 8, 'Literature', -2),
(4, 'Principles of Mathematical Analysis', 'Walter Rudin', 'Third', 'Available', 4, 'Mathematics', 0),
(5, 'The Brianna Wiest Collection', 'Brianna Wiest', 'Fourth', 'Available', 7, 'Literature', -1),
(6, 'The Hidden Hindu', 'Akshat Gupta', 'Third', 'Available', 11, 'Literature', -1),
(7, 'Calculus', ' James Stewart,', 'Eighth', 'Available', 5, 'Mathematics', 0),
(8, 'Financial Management', 'I M Pandey', 'Twelfth', 'Available', 4, 'Wisdom', -2),
(9, 'Mein Kamp', 'Adolf Hitler', 'Third', 'Available', 4, 'Literature', -1),
(10, 'Twisted Hate', 'Ana Huang', 'Fourth', 'Available', 13, 'Literature', 0),
(11, 'Discrete Mathematics and Its Applications', 'Kenneth H. Rosen', 'Eighth', 'Available', 7, 'Mathematics', 0),
(12, 'Linear Algebra Done Right', 'Sheldon Axler', 'Third', 'Available', 3, 'Mathematics', 0),
(13, 'Introduction to the Theory of Computation', 'Michael Sipser', 'Third', 'Available', 3, 'Technology', 0),
(14, 'The Pragmatic Programmer', 'Andrew Hunt & David Thomas', 'Second', 'Available', 10, 'Technology', 0),
(15, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'First', 'Available', 7, 'Technology', 0),
(16, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell & Peter Norvig', 'Fourth', 'Available', 5, 'Technology', 0),
(17, 'Computer Networking: A Top-Down Approach', 'James F. Kurose & Keith W. Ross', 'Seventh', 'Available', 12, 'Technology', 0),
(18, 'To Kill a Mockingbird', ' Harper Lee', 'First', 'Available', 4, 'Literature', 0),
(19, 'The Catcher in the Rye', ' J.D. Salinger', 'First', 'Available', 7, 'Literature', 0),
(20, 'Pride and Prejudice', 'Jane Austen', 'First', 'Available', 4, 'Literature', 0),
(21, 'The Great Gatsby', 'F. Scott Fitzgerald', 'First', 'Available', 16, 'Literature', 0),
(22, 'The Lean Startup', 'Eric Ries', 'First', 'Available', 8, 'Wisdom', 0),
(23, 'Atomic Habits', 'James Clear', 'First', 'Available', 9, 'Wisdom', 0),
(24, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'First', 'Available', 2, 'Wisdom', 0),
(25, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 'Twentieth', 'Available', 4, 'Wisdom', 0),
(26, 'A Brief History of Time', 'Stephen Hawking', 'Tenth', 'Available', 14, 'Technology', 0),
(27, 'The Selfish Gene', ' Richard Dawkins', 'Fourth', 'Available', 11, 'Science', 0),
(28, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'First', 'Available', 15, 'Science', 0),
(29, 'The Gene: An Intimate History', 'Siddhartha Mukherjee', 'First', 'Available', 6, 'Science', 0),
(30, 'Half Blooded Prince-Harry Potter', 'JK Rowling', 'Seventh', 'Available', 20, 'Literature', 0),
(31, 'Linear Algebra Done Right', 'Sheldon Axler', 'Third', 'Available', 5, 'Mathematics', 0),
(32, 'Advanced Engineering Mathematics', 'Erwin Kreyszig', 'Tenth', 'Available', 7, 'Mathematics', 0),
(33, 'Discrete Mathematics and Its Applications', 'Kenneth H. Rosen', 'Seventh', 'Available', 8, 'Mathematics', 0),
(34, 'Complex Variables and Applications', 'Ruel V. Churchill, James Ward Brown', 'Ninth', 'Available', 6, 'Mathematics', 0),
(35, 'Real Analysis', 'H.L. Royden, P.M. Fitzpatrick', 'Fourth', 'Available', 7, 'Mathematics', 0),
(36, 'Electrical Machines', 'P.S. Bimbhra', 'Fourth', 'Available', 6, 'Electrical', 0),
(37, 'Control Systems Engineering', 'Norman S. Nise', 'Sixth', 'Available', 7, 'Electrical', 0),
(38, 'Power Electronics', 'Muhammad H. Rashid', 'Third', 'Available', 5, 'Electrical', 0),
(39, 'Electric Circuits', 'James W. Nilsson, Susan Riedel', 'Tenth', 'Available', 8, 'Electrical', 0),
(40, 'Signals and Systems', 'Alan V. Oppenheim, Alan S. Willsky', 'Second', 'Available', 6, 'Electrical', 0),
(41, 'Introduction to Algorithms', 'Cormen, Leiserson, Rivest, Stein', '3rd', 'Available', 3, 'CSE, IT', 5),
(42, 'Database System Concepts', 'Silberschatz, Korth, Sudarshan', '6th', 'Issued', 3, 'CSE, IT', 2),
(43, 'Operating System Concepts', 'Silberschatz, Galvin, Gagne', '9th', 'Available', 3, 'CSE, IT, ECE', 4),
(44, 'Digital Design', 'M. Morris Mano, Michael D. Ciletti', '5th', 'Available', 3, 'ECE, EE', 3),
(45, 'Engineering Mathematics', 'B.S. Grewal', '44th', 'Available', 3, 'CSE, IT, ME, ECE, EE', 6),
(46, 'Signals and Systems', 'Alan V. Oppenheim, Alan S. Willsky', '2nd', 'Issued', 3, 'ECE, EE', 1),
(47, 'Fluid Mechanics', 'Frank M. White', '8th', 'Available', 3, 'ME', 2),
(48, 'Strength of Materials', 'R.K. Bansal', '6th', 'Available', 3, 'ME, CE', 3),
(49, 'Structural Analysis', 'R.C. Hibbeler', '10th', 'Issued', 3, 'CE', 2),
(50, 'Artificial Intelligence', 'Stuart Russell, Peter Norvig', '3rd', 'Available', 3, 'CSE, IT', 4),
(51, 'The Vampire Diaries: The Awakening', 'L.J. Smith', 'First', 'Available', 1, 'Literature', 0),
(52, 'The Vampire Diaries: The Struggle', 'L.J. Smith', 'First', 'Available', 1, 'Literature', 0),
(53, 'The Vampire Diaries: The Fury', 'L.J. Smith', 'First', 'Available', 1, 'Literature', 0),
(54, 'The Vampire Diaries: Dark Reunion', 'L.J. Smith', 'First', 'Available', 1, 'Literature', 0),
(55, 'Twisted Games', 'Ana Huang', 'First', 'Available', 1, 'Literature', 0),
(56, 'Twisted Lies', 'Ana Huang', 'First', 'Available', 1, 'Literature', 0),
(57, 'It Ends with Us', 'Colleen Hoover', 'First', 'Available', 1, 'Literature', 0),
(58, 'The Cruel Prince ', 'Holly Black', 'First', 'Available', 1, 'Literature', 0),
(59, 'The Girl on the Train', 'Paula Hawkins', 'First', 'Available', 1, 'Literature', 0),
(60, 'The Hunger Games', 'Suzanne Collins', 'First', 'Available', 1, 'Literature', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(7, 'p', 'there is no book of CE department when will it be available?'),
(8, 'Admin', 'Hi which book do you need p?'),
(12, 'de', 'when will we book available?'),
(13, 'Admin', 'when x book will be in stock?'),
(15, 'sp', 'dwd');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('a', 8, '2025-01-29', 1, 0.1, 'not paid'),
('sp', 1, '2025-03-26', 6, 1.8, 'Paid'),
('a', 5, '2025-03-26', 9, 2.7, 'Paid'),
('sp', 6, '2025-03-26', 22, 6.6, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('p', 5, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2025-01-27', '2025-02-09'),
('de', 8, '', '', ''),
('a', 5, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2025-02-17', '2025-03-17'),
('sp ', 8, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2025-01-19', '2025-02-19'),
('sp', 4, '', '', ''),
('sp', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2025-02-24', '2025-03-26'),
('pros', 7, '', '', ''),
('pros', 7, '', '', ''),
('sp', 6, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2025-01-24', '2025-03-04'),
('sp', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2025-03-20', '2025-03-20'),
('sp', 9, 'Yes', '2025-03-31', '2025-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `message`, `status`, `sender`) VALUES
(10, 'porh', 'Do you need any help?', 'no', 'admin'),
(15, 'a', 'hey', 'yes', 'student'),
(27, 'sp', 'hii soumya', 'yes', 'admin'),
(28, 'sp', 'hello admin', 'yes', 'student'),
(30, 'sp', 'hey', 'yes', 'student'),
(31, 'sp', 'hello admin', 'yes', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('Devika', 'Chaturvedi', 'a', '12345', 2216822, 'devika@gmail.com', 2147483647, 'p.jpeg'),
('Priyanka', 'Gupta', 'p', '987', 2216873, 'priyanka@gmail.com', 2147483647, 'p.jpeg'),
('Somya', 'Mirg', 'sm', '123865', 2216909, 'somya@gmail.com', 2147483647, 'p.jpeg'),
('Soumya', 'Patel', 'sp', 'Soumy@12', 223452, 'soumyanami484@gmail.com', 2147483633, 'images/sprofile.png'),
('Saloni', 'Rathore', 'sr', '12345', 2216, 'saloni@gmail.com', 12345, 'p.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `name` varchar(100) NOT NULL,
  `bid` varchar(50) NOT NULL,
  `tm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`name`, `bid`, `tm`) VALUES
('a', '4', 'Mar 16,2025 15:00:00'),
('a', '5', 'Mar 18, 2025 15:00:00'),
('sp', '8', 'Feb 20,2025 15:00:00'),
('sp', '6', '2025-03-04'),
('sp', '1', 'March 20,2025'),
('sp', '3', 'March 26,2025 22:23:00'),
('sp', '9', '04 April ,2025 15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
