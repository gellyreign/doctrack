
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------



CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `docnum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`userid`, `username`, `password`,`location`,`receiver`,`docnum`) VALUES
(124, 'try', 'trylng', 'COS 2ND FLOOR','Lianne', '125555');

--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);


--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

