

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(80) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;




CREATE TABLE `login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




CREATE TABLE `signup_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `conf_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO signup_details VALUES("140","John","myke","john@gmail.com","John@123","John@123");



CREATE TABLE `std_details` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `other` text NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp(),
  `idpic` longblob DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO std_details VALUES("238","Tom Hardy","51","Male","tom@gmail.com","4411223344","Name is Tom Hardy.","2023-08-14","");
INSERT INTO std_details VALUES("241","Roger","52","Male","roger@gmail.com","9122993303","Description.\r\n","2023-08-14","");
INSERT INTO std_details VALUES("243","Tony","56","Male","tony@gmail.com","9111223344","Stark industries.\r\n","2023-08-14","");
INSERT INTO std_details VALUES("253","Rambo","29","male","ram@gmail.com","9122334545","info\r\n","2023-08-23","");
INSERT INTO std_details VALUES("257","aa","23","male","a@gmail.com","2678134698","info","2023-08-23","");
INSERT INTO std_details VALUES("259","ee","ee","ee@ee","eeeeeeeee","eeeee","eee","2023-08-28","");
INSERT INTO std_details VALUES("261","ak","24","Male","ak@gmail.com","9122334455","Info.\r\n","2023-09-01","");
INSERT INTO std_details VALUES("262","kk","27","Male","kk@gmail.com","1122334455","info1.\r\n","2023-09-01","");
INSERT INTO std_details VALUES("263","rr","23","Female","rr@gmail.com","228833774","info2.","2023-09-01","");
INSERT INTO std_details VALUES("264","rk","52","Male","rk@gmail.com","8237280990","info3.","2023-09-01","");
INSERT INTO std_details VALUES("265","shiv","23","Male","shiv@gmail.com","2122334455","other than","2023-09-01","");
INSERT INTO std_details VALUES("266","shiv","23","Male","shiv@gmail.com","2122334455","other than","2023-09-01","");
INSERT INTO std_details VALUES("267","shiv","23","Male","shiv@gmail.com","2122334455","other than","2023-09-01","");
INSERT INTO std_details VALUES("268","shiv","23","Male","shiv@gmail.com","2122334455","other than","2023-09-01","");

