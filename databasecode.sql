

CREATE TABLE user (
  `UserId` int(11) PRIMARY KEY NOT NULL,
  `User Name` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL
);


INSERT INTO user (`UserId`, `User Name`,`Password`) VALUES 
(1,'nidhi','123456');

SELECT * FROM `users` WHERE `User Name`='$username' AND `Password` = '$password'


CREATE TABLE Member (
	`Member Id` int(11) not null,
	`First Name` varchar(256) not null,
	`Last Name` varchar(256) not null,
	`Age` int(11) not null,
	`Gender` varchar(256) not null,
    `Phone` varchar(256) not null,
	`Email` varchar(256) not null,
	`Package Id` int(11),
	`Batch` int(11),
	`Date Of Joining` date not null,
	 PRIMARY KEY (`Member Id`),
     FOREIGN KEY (`Package Id`) REFERENCES Package(`Package Id`) ON DELETE SET NULL,
     FOREIGN KEY (`Batch`) REFERENCES Batch(`Batch No`) ON DELETE SET NULL
);

INSERT INTO Member (`First Name`, `Last Name`, `Age`, `Gender`, `Phone`, `Email`, `Package Id`, `Batch`, `Date Of Joining`) VALUES 
('$First_Name', '$Last_Name', '$Age', '$Gender', '$Phone', '$Email', '$Package_Id', '$Batch_Number', '$Date_Of_Joining');








#
CREATE TABLE Trainer (
	`Trainer Id` int(11) AUTO_INCREMENT not null,
	`First Name` varchar(256) not null,
	`Last Name` varchar(256) not null,
	`Age` int(11) not null,
	`Gender` varchar(256) not null,
    `Phone` varchar(256) not null,
	`Batch` int(11),
	`Years Of Experience` int(11) not null,
	 PRIMARY KEY (`Trainer Id`),
     FOREIGN KEY (`Batch`) REFERENCES Batch(`Batch No`) ON DELETE SET NULL
);

INSERT INTO Trainer (`First Name`, `Last Name`, `Age`, `Gender`, `Phone`, `Batch`, `Years Of Experience`) VALUES 
('$First_Name', '$Last_Name', '$Age', '$Gender', '$Phone', '$Batch_Number',  '$Years_Of_Experience');








#
CREATE TABLE Package (
	`Package Id` int(11) PRIMARY KEY not null,
	`Package Type` varchar(256) not null,
    `Amount(in INR)` int(11) not null
);

INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(101, 'Monthly + No Membership', 800);
INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(102, 'Monthly + Membership', 1000);
INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(103, '3 Months + No Membership', 2400);
INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(104, '3 Months + Membership', 2600);
INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(105, '6 Months + Membership', 4800);
INSERT INTO Package (`Package Id`, `Package Type`, `Amount(in INR)`) VALUES 
(106, '1 Year', 10000);








#
CREATE TABLE Batch (
	`Batch No` int(11) PRIMARY KEY not null,
    `Timings` varchar(256) not null
);

INSERT INTO Batch (`Batch No`, `Timings`) VALUES 
(1,'6:30AM - 8:30AM');
INSERT INTO Batch (`Batch No`, `Timings`) VALUES 
(2,'4PM - 6PM');
INSERT INTO Batch (`Batch No`, `Timings`) VALUES 
(3,'6PM - 8PM');







 

#add member id and package id as foreign keys to this table. But don't display package id.
CREATE TABLE Payment (
	`Payment Id` int(11) AUTO_INCREMENT not null,
	`Member Id` int(11) not null,
	`Payment Date` date not null,
	`Payment Method` varchar(256) not null,
	`Amount Paid` int(11) not null,
	 PRIMARY KEY (`Payment Id`),
     FOREIGN KEY (`Member Id`) REFERENCES Member(`Member Id`) ON DELETE CASCADE
);


INSERT INTO payment (`Payment Method`, `Amount Paid`, `Payment Date`) VALUES 
('$Payment_Method', '$Amount_Paid', '$Payment_Date');



ALTER TABLE Member
ADD FOREIGN KEY(`Package Id`) REFERENCES Package (`Package Id`) ON DELETE SET NULL;


ALTER TABLE Member
ADD FOREIGN KEY(`Batch`) REFERENCES Batch (`Batch No`) ON DELETE SET NULL;


ALTER TABLE Trainer
ADD FOREIGN KEY(`Batch`) REFERENCES Batch (`Batch No`) ON DELETE SET NULL;


ALTER TABLE Payment
ADD FOREIGN KEY(`Member Id`) REFERENCES Member (`Member Id`) ON DELETE CASCADE;


# AMOUNT DUE (PAYMENT DETAILS)

SELECT p.`Payment Id`, m.`First Name`, m.`Last Name`,
p.`Payment Date`, p.`Payment Method`,
pac.`Amount(in INR)` AS `Package Cost`, p.`Amount Paid`,
pac.`Amount(in INR)`- p.`Amount Paid` AS `Amount Due`
FROM Payment p
JOIN Member m
ON p.`Member Id` = m.`Member Id`
JOIN Package pac
ON m.`Package Id` = pac.`Package Id`
ORDER BY `Package Cost` ASC;



# COUNT


SELECT B.`Batch No`, B.`Timings`, COUNT(Member.`Member Id`) as `Members Strength`, 
COUNT(case when Member.`Gender`='Male' then 1 end) as `Male Members`,
COUNT(case when Member.`Gender`='Female' then 1 end) as `Female Members`
FROM Batch B
JOIN Member M
ON M.`Batch` = B.`Batch No`
GROUP BY B.`Batch No`;

SELECT P.`Package Id`, P.`Package Type`, COUNT(Member.`Member Id`) as `Members with this Package`, 
COUNT(case when Member.`Gender`='Male' then 1 end) as `Male Members`,
COUNT(case when Member.`Gender`='Female' then 1 end) as `Female Members`
FROM Package P
JOIN Member M
ON M.`Package Id` = P.`Package Id`
GROUP BY P.`Package Id`;