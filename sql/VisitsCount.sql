create table `VisitsCount` (
  `website` varchar(20) NOT NULL primary key,
  `visits` int(20)
);

insert into `VisitsCount` VALUES('viktorlazi.com', 30000);