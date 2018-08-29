CREATE TABLE `Customer` (
    `cid` INT NOT NULL,
    `cname` VARCHAR(45) NULL,
    `cphone` VARCHAR(45) NULL,
    `ccity` VARCHAR(45) NULL,
    PRIMARY KEY (`cid`)
);

INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('0', 'Adam Lambert', '9291234570', 'Brooklyn');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('1', 'Bruno Mars', '9293334444', 'Chicago');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('2', 'Adele', '9293435456', 'San Diego');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('3', 'Taylor Swift', '9293456789', 'San Diego');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('4', 'Jessie J', '9291234567', 'San Diego');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('5', 'Justin Bieber', '9291234568', 'Seattle');
INSERT INTO `Customer` (`cid`, `cname`, `cphone`, `ccity`) VALUES ('6', 'Michael Jackson', '9291234569', 'Chicago');


CREATE TABLE `Landlord` (
    `lid` INT NOT NULL,
    `lname` VARCHAR(45) NULL,
    `lphone` VARCHAR(45) NULL,
    `lcity` VARCHAR(45) NULL,
    PRIMARY KEY (`lid`)
);

INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('101', 'Bob Daniels', '9299878765', 'Brooklyn');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('102', 'Trump', '9293487876', 'Brooklyn');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('103', 'Bush', '9293230987', 'Chicago');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('104', 'Lincoln', '9294569876', 'Chicago');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('105', 'Franklin', '9293236745', 'Chicago');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('106', 'Aha', '9293236749', 'San Diego');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('107', 'Clinton', '9293238749', 'Seattle');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('108', 'Cindy', '9293288749', 'Seattle');
INSERT INTO `Landlord` (`lid`, `lname`, `lphone`, `lcity`) VALUES ('109', 'Amy Daniels', '9299978765', 'Brooklyn');

CREATE TABLE `Residence` (
    `rid` INT NOT NULL,
    `rname` VARCHAR(45) NULL,
    `rstate` VARCHAR(45) NULL,
    `rcity` VARCHAR(45) NULL,
    `raddr` VARCHAR(200) NULL,
    `rtype` VARCHAR(45) NULL,
    `rarea` INT NULL,
    `lid` INT NULL,
    PRIMARY KEY (`rid`),
    FOREIGN KEY (`lid`)
        REFERENCES `Landlord` (`lid`)
);

INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('201', 'Little Cabin', 'NY', 'Brooklyn', '123 45st, 6ave', '2BR-1BA', '60', '101');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('202', 'Clean Cabin', 'NY', 'Brooklyn', '125 45st, 6ave', '2BR-2BA', '70', '102');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('203', 'Cute House', 'IL', 'Chicago', '320 50st, 7ave', '2BR-2BA', '80', '103');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('204', 'Nice House', 'IL', 'Chicago', '322 50st, 7ave', '2BR-2BA', '80', '104');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('205', 'Black House', 'IL', 'Chicago', '324 30st, 8ave', 'Studio', '100', '105');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('206', 'White House', 'IL', 'Chicago', '326 30st, 8ave', 'Studio', '120', '106');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('207', 'Blue House', 'WA', 'Seattle', '570 60st, 9ave', '2BR-1BR', '100', '107');
INSERT INTO `Residence` (`rid`, `rname`, `rstate`, `rcity`, `raddr`,`rtype`, `rarea`, `lid`) VALUES ('208', 'Pink House', 'WA', 'Seattle', '572 60st, 9ave', 'Studio', '100', '105');




CREATE TABLE `Leases` (
    `cid` INT NOT NULL,
    `rid` INT NOT NULL,
    `startdate` DATETIME NOT NULL,
    `enddate` DATETIME NULL,
    `price` FLOAT NULL,
    PRIMARY KEY (`cid` , `rid` , `startdate`),
    FOREIGN KEY (`cid`)
        REFERENCES `Customer` (`cid`),
    FOREIGN KEY (`rid`)
        REFERENCES `Residence` (`rid`)
);

INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('1', '201', '2016-1-1 12:30:00', '2016-1-3 11:20:00', '200');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('2', '202', '2016-1-2 12:30:00', '2016-1-5 11:20:00', '300');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('3', '203', '2016-1-6 12:30:00', '2016-1-8 11:20:00', '300');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('4', '204', '2016-1-9 12:30:00', '2016-1-10 11:20:00', '400');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('5', '205', '2016-1-10 12:30:00', '2016-1-13 11:20:00', '500');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('5', '206', '2016-2-1 12:30:00', '2016-2-3 11:20:00', '600');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('3', '202', '2016-2-1 12:30:00', '2016-2-5 11:20:00', '400');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('4', '201', '2016-3-4 12:30:00', '2016-3-8 11:20:00', '500');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('5', '203', '2016-4-1 12:30:00', '2016-4-3 11:20:00', '300');
INSERT INTO `Leases` (`cid`, `rid`, `startdate`, `enddate`, `price`) VALUES ('1', '207', '2016-4-5 12:30:00', '2016-4-7 11:20:00', '300');


CREATE TABLE `Rating` (
    `cid` INT NOT NULL,
    `rid` INT NOT NULL,
    `rtime` DATETIME NOT NULL,
    `score` FLOAT NULL,
    PRIMARY KEY (`cid` , `rid` , `rtime`),
    FOREIGN KEY (`cid`)
        REFERENCES `Customer` (`cid`),
    FOREIGN KEY (`rid`)
        REFERENCES `Residence` (`rid`)
);

INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('1', '201', '2016-1-19 10:30:00', '1');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('2', '202', '2016-1-20 11:30:00', '4');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('3', '203', '2016-1-22 12:30:00', '4');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('4', '204', '2016-1-21 13:30:00', '5');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('5', '205', '2016-1-23 14:30:00', '2');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('5', '206', '2016-2-20 15:30:00', '3');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('3', '202', '2016-2-20 16:30:00', '2');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('4', '201', '2016-3-21 11:30:00', '3');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('5', '203', '2016-4-25 12:30:00', '1');
INSERT INTO `Rating` (`cid`, `rid`, `rtime`, `score`) VALUES ('1', '207', '2016-4-25 12:30:00', '2');






