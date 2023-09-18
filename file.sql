SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `admin_id` INT(100) NOT NULL AUTO_INCREMENT,
  `admin_name` VARCHAR(100) NOT NULL,
  `admin_age` VARCHAR(3) NOT NULL,
  `admin_phone` VARCHAR(15) NOT NULL,
  `admin_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbladmin` (`admin_name`,`admin_age`,`admin_phone`,`admin_password`) VALUES
('John','30','123456789','password1'),
('Jane','28','123456789','password2'),
('Lance','50','123456789','123yy');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `pharcomp` (
  `phar_comp_name` VARCHAR(50) NOT NULL,
  `phar_comp_phone` VARCHAR(20) NOT NULL,
  `phar_comp_address` VARCHAR(100) NOT NULL,
  `phar_comp_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`phar_comp_name`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `pharcomp` (`phar_comp_name`, `phar_comp_phone`, `phar_comp_address`, `phar_comp_password`) VALUES
('ABC Pharmaceuticals', '1234567890', 'Nairobi,Kenya','password123'),
('XYZ Pharmaceuticals', '9876543210', 'Nairobi,Kenya','password456'),
('PQR Pharmaceuticals', '1112223333', 'Nairobi,Kenya','password789'),
('DEF Pharmaceuticals', '4445556666', 'Nairobi,Kenya','passwordabc'),
('GHI Pharmaceuticals', '7778889999', 'Nairobi,Kenya','passwordxyz'),
('Pharmagen','9876543', 'Nairobi,Kenya','passwordxyz'),
('HealthMeds','45789654', 'Nairobi,Kenya','passwordxyz'),
('Pharmaco Inc.', '089097985678', 'Nairobi,Kenya','passwordxyz');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tbldoctor` (
  `doc_hos_id` INT(10) NOT NULL,
  `doc_name` VARCHAR(20) NOT NULL,
  `doc_phone` VARCHAR(20) NOT NULL,
  `doc_spec` VARCHAR(20) NOT NULL,
  `doct_years` INT(3) NOT NULL,
  `doc_password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`doc_hos_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tbldoctor` (`doc_hos_id`, `doc_name`, `doc_phone`, `doc_spec`, `doct_years`, `doc_password`)
VALUES
(25, 'Dr. Sarah', 1112223333, 'Orthopedic', 11, 'password2'),
(26, 'Dr. Christopher', 1112223333, 'Orthopedic', 5, 'password3'),
(27, 'Dr. Olivia', 147483647, 'Neurosurgeon', 3, 'password4'),
(42, 'Rewel', 12103923, 'Residency', 1, '123yy'),
(43, 'Dr. Emily', 2147483647, 'Dermatology', 8, 'password6'),
(44, 'Dr. Daniel', 1112223333, 'Cardiology', 15, 'password7'),
(45, 'Dr. Jessica', 1112223333, 'Gastroenterology', 7, 'password8'),
(46, 'Dr. Andrew', 147483647, 'Psychiatry', 9, 'password9'),
(47, 'Dr. James', 12103923, 'Family Medicine', 12, 'password10');


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tbldrugs` (
  `drug_id` INT(10) NOT NULL AUTO_INCREMENT,
  `drug_trade_name` VARCHAR(50) NULL,
  `drug_formula` VARCHAR(200) DEFAULT NULL,
  `drug_expiry` DATE DEFAULT NULL,
  `drug_company` VARCHAR(50) NOT NULL,
  `onSale` VARCHAR(1) DEFAULT 'Y',  
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `tbldrugs` (`drug_trade_name`, `drug_expiry`, `drug_company`) VALUES
('Paracetamol', '2023-11-30', 'HealthMeds'),
('Metformin','2024-04-30', 'Pharmagen'),
('Aspirin', '2023-12-31',  'HealthMeds'),
('Simvastatin', '2024-03-31', 'Pharmagen'),
('Metoprolol', '2024-01-31', 'HealthMeds'),
('Warfarin', '2024-04-30', 'Pharmagen'),
('Loratadine', '2023-12-31', 'HealthMeds'),
('Citalopram','2024-03-31','Pharmaco Inc.'),
('Aspirin', '2023-10-31','ABC Pharmaceuticals'),
('Cetirizine', '2023-09-30', 'XYZ Pharmaceuticals');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tblpatient` (
  `patient_nat_id` INT(10) NOT NULL,
  `patient_name` VARCHAR(20) NOT NULL,
  `patient_address` VARCHAR(50) NOT NULL,
  `patient_email` VARCHAR(50) NOT NULL,
  `patient_phone` VARCHAR(20) NOT NULL,
  `patient_age` INT(3) NOT NULL,
  `patient_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`patient_nat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblpatient` (`patient_nat_id`, `patient_name`, `patient_address`, `patient_email`, `patient_phone`, `patient_age`, `patient_password`)
VALUES
(23, 'Jane', '456 Elm St', 'janesmith@yahoo.com', 2147483647, 31,'password1'),
(24, 'John', '789 Oak St', 'johnsmith@gmail.com', 2147483647, 33,'password2'),
(25, 'Sarah', '123 Maple Ave', 'sarahjones@hotmail.com', 2147483647,  38, 'password3'),
(26, 'Michael', '321 Pine St', 'michaeldavis@gmail.com', 2147483647,  28, 'password4'),
(27, 'Emily', '567 Birch Rd', 'emilywilson@yahoo.com', 2147483647, 25, 'password5'),
(28, 'David', '987 Cedar Ln', 'davidbrown@gmail.com', 2147483647,  15, 'password6'),
(29, 'Jennifer', '654 Walnut Dr', 'jennifermartin@hotmail.com', 2147483647, 10, 'password7'),
(30, 'Daniel', '876 Spruce St', 'danieldavis@yahoo.com', 2147483647, 2, 'password8'),
(31, 'Jessica', '234 Oak St', 'jessicawilson@gmail.com', 2147483647, 27, 'password9'),
(32, 'Christopher', '543 Maple Ave', 'christopherbrown@hotmail.com', 2147483647, 29, 'password10'),
(33, 'Sophia', '789 Pine St', 'sophiadavis@yahoo.com', 2147483647, 32, 'password11'),
(34, 'Andrew', '876 Birch Rd', 'andrewmartin@gmail.com', 2147483647, 28, 'password12'),
(35, 'Olivia', '432 Cedar Ln', 'oliviabrown@hotmail.com', 2147483647, 95, 'password13'),
(36, 'James', '678 Walnut Dr', 'jameswilson@yahoo.com', 2147483647, 35, 'password14'),
(37, 'Ava', '987 Spruce St', 'avadavis@gmail.com', 2147483647, 45, 'password15'),
(38, 'Emma', '345 Elm St', 'emmamartin@hotmail.com', 2147483647, 55, 'password16');

-- --------------------------------------------------------


CREATE TABLE `doctor_patient` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `doc_hos_id` INT(10) NOT NULL,
  `patient_nat_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`doc_hos_id`) REFERENCES tbldoctor (`doc_hos_id`),
  FOREIGN KEY (`patient_nat_id`) REFERENCES tblpatient (`patient_nat_id`)
);

INSERT INTO `doctor_patient` ( `doc_hos_id`, `patient_nat_id`)
VALUES
    (47, 27),
    (47, 28),
    (47, 29),
    (47, 30),
    (47, 31),
    (47, 32),
    (47, 33),
    (42, 34),
    (42, 35);


CREATE TABLE IF NOT EXISTS `tblpharmacy` (
  `pharmacy_name` VARCHAR(50) NOT NULL,
  `pharmacy_phone` INT(20) NOT NULL,
  `pharmacy_address` VARCHAR(50) NOT NULL,
  `pharmacy_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`pharmacy_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblpharmacy` (`pharmacy_name`, `pharmacy_phone`,`pharmacy_address`,`pharmacy_password`) VALUES
('ABC Pharmacy', 1234567890, '123 Main St', 'password123'),
('XYZ Pharmacy', 9876543210, '456 Elm St', 'password456'),
('EFG Pharmacy', 1112223333, '789 Oak St', 'password789'),
('LMN Pharmacy', 4445556666, '321 Pine St', 'passwordabc'),
('PQR Pharmacy', 7778889999, '654 Walnut Dr', 'passwordxyz');


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `tblprescription` (
  `pres_id` INT(10) NOT NULL AUTO_INCREMENT,
  `patient_nat_id` INT(10) NOT NULL,
  `doc_hos_id` INT(10) NOT NULL,
  `drug_id` INT(10) NOT NULL,
  `pres_amount` VARCHAR(100) NOT NULL,
  `pres_dosage` VARCHAR(100) NOT NULL,
  `prescribed` CHAR(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`pres_id`),
  CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patient_nat_id`) REFERENCES `tblpatient` (`patient_nat_id`),
  CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`doc_hos_id`) REFERENCES `tbldoctor` (`doc_hos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblprescription` (`patient_nat_id`, `doc_hos_id`, `drug_id`, `pres_amount`, `pres_dosage`, `prescribed`)
VALUES
(23, 25, 1, '100 mg', '2 times daily', 'N'),
(23, 25, 2, '500 mg', '1 time daily', 'N'),
(23, 26, 3, '75 mg', '1 time daily', 'N'),
(23, 27, 4, '20 mg', '1 time daily', 'N'),
(23, 42, 5, '50 mg', '2 times daily','N'),
(23, 25, 6, '5 mg', '1 time daily', 'N'),
(23, 25, 7, '10 mg', '1 time daily', 'N'),
(23, 26, 8, '20 mg', '1 time daily', 'N'),
(23, 27, 9, '100 mg', '1 time daily','N'),
(23, 42, 10, '10 mg', '1 time daily', 'N'),
(24, 25, 1, '100 mg', '2 times daily', 'N'),
(24, 25, 2, '500 mg', '1 time daily', 'N'),
(24, 26, 3, '75 mg', '1 time daily', 'N'),
(24, 27, 4, '20 mg', '1 time daily', 'N'),
(24, 42, 5, '50 mg', '2 times daily','N'),
(25, 25, 6, '5 mg', '1 time daily', 'N'),
(25, 25, 7, '10 mg', '1 time daily', 'N'),
(25, 26, 8, '20 mg', '1 time daily', 'N'),
(25, 27, 9, '100 mg', '1 time daily', 'N'),
(25, 42, 10, '10 mg', '1 time daily', 'N');

UPDATE tblprescription
SET prescribed  = 'Y'
WHERE pres_id > 10;


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tblsuperv` (
  `supervisor_id` INT(10) NOT NULL AUTO_INCREMENT,
  `supervisor_name` VARCHAR(50) NOT NULL,
  `supervisor_email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblsuperv` (`supervisor_name`, `supervisor_email`)
VALUES
('John Doe', 'john.doe@example.com'),
('Jane Smith', 'jane.smith@example.com'),
('David Johnson', 'david.johnson@example.com'),
('Sarah Wilson', 'sarah.wilson@example.com'),
('Michael Brown', 'michael.brown@example.com'),
('Emily Davis', 'emily.davis@example.com'),
('Robert Taylor', 'robert.taylor@example.com'),
('Jessica Anderson', 'jessica.anderson@example.com'),
('Christopher Lee', 'christopher.lee@example.com'),
('Amanda Martinez', 'amanda.martinez@example.com'),
('Daniel Thomas', 'daniel.thomas@example.com'),
('Olivia Clark', 'olivia.clark@example.com'),
('William Rodriguez', 'william.rodriguez@example.com'),
('Sophia Lewis', 'sophia.lewis@example.com'),
('Matthew Hernandez', 'matthew.hernandez@example.com');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tblcontract` (
  `contract_id` INT(10) NOT NULL AUTO_INCREMENT,
  `pharmacy_name` VARCHAR(50) NOT NULL,
  `company_name` VARCHAR(50) NOT NULL,
  `supervisor_id` VARCHAR(50) NOT NULL,
  `Start_Date` DATE DEFAULT CURRENT_TIMESTAMP,
  `End_Date` DATE DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contract_id`),
  CONSTRAINT `tblcontract_ibfk_3` FOREIGN KEY (`supervisor_id`) REFERENCES `tblsuperv` (`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `tblcontract` (`pharmacy_name`, `company_name`, `Supervisor_id`, `Start_Date`, `End_Date`)
VALUES
( 'ABC Pharmacy' ,'Pharmagen', 1, '2023-01-01', '2023-12-31'),
( 'EFG Pharmacy' ,'Pharmagen', 2, '2023-03-15', '2024-03-14'),
( 'LMN Pharmacy' ,'Pharmagen', 3, '2023-06-01', '2024-05-31'),
( 'ABC Pharmacy' ,'HealthMeds', 4, '2023-09-15', '2024-09-14'),
( 'ABC Pharmacy' ,'ABC Pharmaceuticals', 5, '2024-01-01', '2024-12-31');

ALTER TABLE `tblcontract` ADD `Status` VARCHAR(50) NOT NULL DEFAULT 'Pending' AFTER `End_Date`;
 
UPDATE tblcontract
SET Status  = 'active'
WHERE contract_id > 3;
-- --------------------------------------------------------


ALTER TABLE `admin` ADD `Status` VARCHAR(50) NOT NULL DEFAULT 'Active' AFTER `Password`;


-- Create the drug_prices table with drug_id, pharmacy_name, and drug_price columns
CREATE TABLE drug_prices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    drug_id INT NOT NULL,
    pharmacy_name VARCHAR(50) NOT NULL,
    drug_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (drug_id) REFERENCES tbldrugs(drug_id),
    FOREIGN KEY (pharmacy_name) REFERENCES tblpharmacy(pharmacy_name)
);

-- Insert drug prices data into drug_prices table
-- Drug: Citalopram, Pharmacy: XYZ Pharmacy
INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
VALUES
  ((SELECT drug_id FROM tbldrugs WHERE drug_trade_name = 'Citalopram'), (SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = 'XYZ Pharmacy'), 30.00);

-- Drug: Simvastatin, Pharmacy: XYZ Pharmacy
INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
VALUES
  ((SELECT drug_id FROM tbldrugs WHERE drug_trade_name = 'Simvastatin'), (SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = 'XYZ Pharmacy'), 20.20);
  
-- Drug: Metformin, Pharmacy: XYZ Pharmacy
INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
VALUES
  ((SELECT drug_id FROM tbldrugs WHERE drug_trade_name = 'Metformin'), (SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = 'XYZ Pharmacy'), 15.50);
  
-- Drug: Cetirizine, Pharmacy: XYZ Pharmaceuticals
INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
VALUES
  ((SELECT drug_id FROM tbldrugs WHERE drug_trade_name = 'Cetirizine'), (SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = 'XYZ Pharmacy'), 9.50);

-- Drug: Loratadine, Pharmacy: ABC Pharmacy
INSERT INTO drug_prices (drug_id, pharmacy_name, drug_price)
VALUES
  ((SELECT drug_id FROM tbldrugs WHERE drug_trade_name = 'Loratadine'), (SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = 'ABC Pharmacy'), 7.50);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
