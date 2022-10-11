
/* Registration Table*/
CREATE TABLE `quizzer`.`registration` (`ID` INT(100) NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(50) NOT NULL , `lastname` VARCHAR(50) NOT NULL , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `contact` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

/* Quiz Subject Table Table*/
CREATE TABLE `quizzer`.`quiz_category` (`id` INT(100) NOT NULL AUTO_INCREMENT , `subject` VARCHAR(50) NOT NULL , `time` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

/* Questions Table*/
CREATE TABLE `quizzer`.`questions` (`id` INT NOT NULL AUTO_INCREMENT , `q_no` INT NOT NULL , `q_title` VARCHAR(100) NOT NULL , `op_1` VARCHAR(100) NOT NULL , `op_2` VARCHAR(100) NOT NULL , `op_3` VARCHAR(100) NOT NULL , `op_4` VARCHAR(100) NOT NULL , `answer` VARCHAR(100) NOT NULL , `subject` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

/* Result Table*/
CREATE TABLE `quizzer`.`exam_result` (`id` INT(50) NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `exam_category` VARCHAR(100) NOT NULL , `total` VARCHAR(100) NOT NULL , `correct` VARCHAR(100) NOT NULL , `wrong` VARCHAR(100) NOT NULL , `date` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

/* Admin Table*/
CREATE TABLE `quizzer`.`admin` (`id` INT(100) NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 