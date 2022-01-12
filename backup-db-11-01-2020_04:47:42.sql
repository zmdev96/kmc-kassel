

CREATE TABLE IF NOT EXISTS `app_blog` (
  `BlogId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(120) NOT NULL,
  `Content` text NOT NULL,
  `Postdate` date NOT NULL,
  `Acceptdate` datetime DEFAULT NULL,
  `Lastupdate` date DEFAULT NULL,
  `View` varchar(4) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  `Image` varchar(60) NOT NULL,
  `UserId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`BlogId`),
  KEY `UserBlog` (`UserId`),
  CONSTRAINT `UserBlog` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `app_blog` (`BlogId`, `Title`, `Content`, `Postdate`, `Acceptdate`, `Lastupdate`, `View`, `Status`, `Image`, `UserId`) VALUES
(12,'FDA Approval of Bedaquiline FDA Approval of Bedaquiline','<p>The Internet is increasingly redefining the ways in which people interact with information related to their health the Pew Internet Project estimates....</p>\r\n\r\n<p>&nbsp;</p>\r\n','2019-12-04',NULL,'2019-12-04',NULL,1,'ymxvzy_1zag93_lmpwzw_ckmmek_mdckew_63919.jpeg',2),
(13,'FDA Approval of Bedaquiline FDA Approval of Bedaquiline','<p>The Internet is increasingly redefining the ways in which people interact with information related to their health the Pew Internet Project estimates....</p>\r\n\r\n<p>&nbsp;</p>\r\n','2019-12-04',NULL,'2019-12-04',NULL,1,'ymxvzz_euanbn_jdjhjd_a3jhll_tknttn_13387.jpg',2);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_emails` (
  `EmailId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Subject` varchar(255) NOT NULL,
  `Name` varchar(36) NOT NULL,
  `Senderemail` varchar(100) NOT NULL,
  `Emailcontent` text NOT NULL,
  `Senddate` datetime NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `app_emails` (`EmailId`, `Subject`, `Name`, `Senderemail`, `Emailcontent`, `Senddate`, `Status`) VALUES
(1,'this is test email','zeyad moslem','moslem@gmail.com','this is test email from contact controller','2020-01-05 00:00:00',1),
(2,'this is test email','zeyad moslem','moslem@gmail.com','this is test email from contact controller','2020-01-05 17:24:50',1),
(3,'this is test email','zeyad moslem','moslem@gmail.com','this is test email from contact controller','2020-01-05 18:34:24',1),
(4,'this is test email','zeyad moslem','moslem@gmail.com','this is test email from contact controller','2020-01-05 19:26:00',1),
(5,'Das ist test email von server','Ahmad test','ahmad@gmail.com','fdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff','2020-01-05 19:26:40',1),
(6,'sdsdsdsds','google facebook','moslem@gmail.com','ssssssssssssssssssssssssssssssssssssssssssssssssssssss','2020-01-05 19:29:19',1),
(7,'hallo ich bin new','new contact','test@munir.com','dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','2020-01-05 22:25:08',1),
(8,'Das ist test email von server','facebook account','test@munir.com','dddddddddddddddddddddddddddddddddddddddddddddddddddddddd','2020-01-05 22:34:45',1),
(9,'dsadsadasdsad','sadasdasd','test@munir.com','ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss','2020-01-05 22:44:59',1),
(10,'this google facebook','google facebook','google@gmail.com','google goolge google google google google google ','2020-01-06 18:08:49',1),
(11,'dfsdfsdfdsfsdf','ddfsfsdfsdfsdfdsf','moslem@gmail.com','fsdfffffffffffffffffffffffffffffffffffffffffffffffffffff','2020-01-08 18:17:25',0);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_hzv` (
  `PageId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Pagecontent` text NOT NULL,
  `Lastupdate` date NOT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `app_hzv` (`PageId`, `Pagecontent`, `Lastupdate`) VALUES
(1,'<p><img alt=\"\" src=\"/uploads/images/pages/ahp2lm_pwzyqy_ysqwny_r5zu5d_u053un_49229.jpg\" style=\"border-style:solid; border-width:2px; height:142px; width:514px\" /></p>\r\n\r\n<h2><span style=\"font-size:24px\"><span style=\"color:#e67e22\"><strong>Hausarztzentrierte Versorgung (HZV)?</strong></span></span></h2>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Was ist HzV?</strong></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Der Gedanke hinter der sog. hausarztzentrierten Versorgung (HzV) folgt dem Wunsch der gesetzlichen Krankenversicherungen, der &Auml;rzte und der Politik, dass Patienten m&ouml;glichst nur einen Hausarzt haben sollten, da hier alle wichtigen Informationen zusammenlaufen und gespeichert werden. Also haben sich die Vertreter dieser Organisationen in langen Verhandlungen auf sog. Hausarztvertr&auml;ge verst&auml;ndigt. Das sind Vertr&auml;ge, in denen sich der Patient freiwillig bereit erkl&auml;rt, nach M&ouml;glichkeit immer die gleiche Praxis aufzusuchen.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong><span style=\"color:#16a085\">Wer kann an HZV-Vertr&auml;gen teilnehmen ?</span></strong><br />\r\nZur Zeit k&ouml;nnen alle Versicherten der AOK-Hessen, der Techniker KK und der BKKs sowie IKK an diesen Vertr&auml;gen teilnehmen. Die Teilnahme ist ausdr&uuml;cklich freiwillig!!! und wird von dem Arzt und Mitarbeiterinnen aufgekl&auml;rt.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong><span style=\"color:#16a085\">Ist ein HZV-Vertrag mit Kosten f&uuml;r mich verbunden?</span></strong><br />\r\nNein. Der Vertrag ist kostenlos!!!</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Welchen Vorteil habe ich als Patient vom HZV-Vertrag?</strong></span><br />\r\nF&uuml;r sie als Patient ergeben sich einige Vorteile. Diese sind im einzelnen:</span></p>\r\n\r\n<p><span style=\"font-size:16px\">- verk&uuml;rzte Wartezeiten (anvisiert sind max. 30 Min. bei Termin, ohne Termin auch l&auml;nger, je nach Dringlichkeit)<br />\r\n- vorgezogene Terminvergabe<br />\r\n- erweiterter Leistungskatalog, je nach Krankenkasse<br />\r\n- eine Berufst&auml;tigensprechstunde an einem Wochentag mind. bis 19:00 ausschlie&szlig;lich f&uuml;r HZV-Teilnehmer<br />\r\n- zentraler Informationsfluss aus Kliniken und von Fach&auml;rzten</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Welche Pflichten habe ich als HZV-Teilnehmer ?</strong></span><br />\r\nKeine</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Was mache ich, wenn ich in Hamburg oder Berlin erkranke? Muss ich dann nach Kassel fahren, um mich bei meinem Hausarzt behandeln zu lassen ?</strong></span><br />\r\nNein. Der Vertrag ist kostenlos!!!, k&ouml;nnen sie &uuml;berall trotzdem bei jedem Arzt sich behandeln lassen.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Was mache ich, wenn ich umziehe oder den Arzt wechseln will?</strong></span><br />\r\nk&ouml;nnen Sie jeder Zeit K&uuml;ndigen, K&uuml;ndigungsfrist 6 Wochen.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Muss ich jetzt auch bestimmte Fach&auml;rzte aufsuchen oder kann ich weiter frei w&auml;hlen ?</strong></span><br />\r\nNein. Sie haben weiterhin freie Arztwahl.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Muss ich f&uuml;r Routineuntersuchungen wie z.B. Augenarzt eine &Uuml;berweisung holen ?</strong></span><br />\r\nEs ist gew&uuml;nscht, dass sie sich f&uuml;r fach&auml;rztliche Behandlungen eine &Uuml;berweisung holen, da in der Regel nur dann ein Arztbrief vom Facharzt zu uns geschickt wird. Dies kann im Einzelfall erhebliche Konsequenzen f&uuml;r die weitere Diagnostik und Therapie haben. F&uuml;r den Augenarzt oder Gyn&auml;kologen und Kinderarzt ben&ouml;tigen sie auch weiterhin keine &Uuml;berweisung.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Muss ich jetzt jedes Quartal zum Hausarzt, obwohl ich gesund bin ?</strong></span><br />\r\nNein. Weiterhin gehen sie nur dann zum Arzt, wenn es n&ouml;tig ist.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Was passiert, wenn ich trotzdem einen anderen Hausarzt aufsuche, obwohl mein Vertrag noch mit dem Hausarztzentrum-Mohammad g&uuml;ltig ist ?</strong></span><br />\r\nNichts. Bislang sind keine Konsequenzen von Seiten der &Auml;rzte oder Krankenkassen angek&uuml;ndigt, da dies bisher nicht n&ouml;tig war. Es gibt keine Vertragsstrafen.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#16a085\"><strong>Gerne informieren wir sie pers&ouml;nlich &uuml;ber die HZV-Vertr&auml;ge.</strong></span><br />\r\nEs gibt f&uuml;r sie als Patient praktisch nur Vorteile !!!!</span></p>\r\n\r\n<p>&nbsp;</p>\r\n','2019-12-04');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_medicines` (
  `MedicinesId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Cname` varchar(36) NOT NULL,
  `Cemail` varchar(60) NOT NULL,
  `Cpod` date NOT NULL,
  `Cinsurance` varchar(20) NOT NULL,
  `Cmedicines` text NOT NULL,
  `Orderdate` date NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MedicinesId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `app_medicines` (`MedicinesId`, `Cname`, `Cemail`, `Cpod`, `Cinsurance`, `Cmedicines`, `Orderdate`, `Status`) VALUES
(1,'zeyad Moslem','moslem@gmail.com','1996-09-05','zeyad123456','Medikamente: google, Dosierung: 123, PNZ:123456|Medikamente: facebook, Dosierung: 123, PNZ:123456|','2020-01-06',1),
(2,'zeyad Moslem','moslem@gmail.com','1996-09-05','zeyad123456','Medikamente: google, Dosierung: 123, PNZ:123456|Medikamente: facebook, Dosierung: 123, PNZ:123456|','2020-01-06',1);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_news` (
  `NewsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(120) NOT NULL,
  `Short_desc` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Postdate` date NOT NULL,
  `Lastupdate` date DEFAULT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `app_news` (`NewsId`, `Title`, `Short_desc`, `Content`, `Postdate`, `Lastupdate`) VALUES
(3,'this is test',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n','2019-12-01','2020-01-02'),
(4,'das ist ein test neuigkeiten',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy','<p>das ist ein test neuigkeiten Content</p>\r\n','2019-12-01','2019-12-07'),
(5,'Impfungen',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy','<p>Grippe Impfungen sind vorhanden</p>\r\n','2019-12-01','2019-12-07'),
(6,'Unerse Ulrlaub',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy','<p>wir sind im &nbsp;urlaub von 10.11.2019 bis 01.01.2020</p>\r\n','2019-12-07',NULL),
(7,'PhysioPlus Kassel Ihre Physiotherapie Praxis in Kassel',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy','<p>ddddddddddddddddddddd</p>\n','2020-01-02',NULL);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_notifications` (
  `NotificationId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Type` tinyint(2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(11) unsigned NOT NULL,
  `Seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`NotificationId`),
  KEY `UserNotify` (`UserId`),
  CONSTRAINT `UserNotify` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_services` (
  `PageId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Pagetitle` varchar(100) NOT NULL,
  `Pagelink` varchar(120) NOT NULL,
  `Pagecontent` text NOT NULL,
  `Lastupdate` date DEFAULT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `app_services` (`PageId`, `Pagetitle`, `Pagelink`, `Pagecontent`, `Lastupdate`) VALUES
(1,'Praxis Leistungen','praxis-leistungen','<p><img alt=\"\" src=\"/uploads/images/pages/ewfzzw_vlzwvl_bi0ylt_etmtay_nhgznz_59773.jpg\" style=\"height:185px; width:500px\" /></p>\r\n\r\n<h1><span style=\"color:#c0392b\"><strong>Unserer Leistungen f&uuml;r Sie</strong></span></h1>\r\n\r\n<p><span style=\"font-size:22px\">Als haus&auml;rztlicher t&auml;tiger Internist bieten wir Ihnen ein breites Spektrum an pr&auml;ventiven, diagnostischen und therapeutischen Leistungen zur Vorbeugung bzw. Fr&uuml;herkennung und ggf. Behandlung von:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:20px\">Stoffwechselerkrankungen (Diabetes mellitus, Fettstoffwechselst&ouml;rungen, Gicht etc.)</span></li>\r\n	<li><span style=\"font-size:20px\">Bluthochdruck (Hypertonie)</span></li>\r\n	<li><span style=\"font-size:20px\">B&ouml;sartige Gewebsneubildungen (Tumorerkrankungen)</span></li>\r\n	<li><span style=\"font-size:20px\">Infektionserkrankungen (inkl. Schutzimpfungen)</span></li>\r\n	<li><span style=\"font-size:20px\">Atemwegserkrankungen (Asthma, chronische Bronchitis, etc.)</span></li>\r\n	<li><span style=\"font-size:20px\">Herz- und Kreislaufst&ouml;rungen</span></li>\r\n	<li><span style=\"font-size:20px\">Blutkrankheiten</span></li>\r\n	<li><span style=\"font-size:20px\">&Uuml;berforderungs - und Stresserkrankungen, depressive gef&auml;rbte Organerkrankungen, psychosomatische St&ouml;rungen</span></li>\r\n	<li><span style=\"font-size:20px\">Rheumatische Erkrankungen und degenerative Skelett- und Gelenkkrankheiten</span></li>\r\n	<li><span style=\"font-size:20px\">Durchblutungsst&ouml;rungen</span></li>\r\n	<li><span style=\"font-size:20px\">Thrombosen und Lungenembolien</span></li>\r\n	<li><span style=\"font-size:20px\">Arteriosklerose und Alterskrankheiten</span></li>\r\n	<li><span style=\"font-size:20px\">Notfallversorgung</span></li>\r\n	<li><span style=\"font-size:20px\">Haus&auml;rztliche Betreuung, gegebenenfalls Hausbesuche</span></li>\r\n	<li><span style=\"font-size:20px\">Hautkrebsscreening</span></li>\r\n	<li><span style=\"font-size:20px\">DMP Asthma / COPD</span></li>\r\n	<li><span style=\"font-size:20px\">DMP Diabetes mellitus Typ 1 u. 2</span></li>\r\n	<li><span style=\"font-size:20px\">DMP KHK</span></li>\r\n</ul>\r\n\r\n<p><span style=\"color:#d35400\"><span style=\"font-size:22px\"><span style=\"font-family:Comic Sans MS,cursive\"><strong>Die komplette haus&auml;rztliche Versorgung unserer Patienten mit pers&ouml;nlicher Beratung und Betreuung bleibt trotz fach&auml;rztlicher Spezialisierung ein wesentlicher Schwerpunkt unserer Praxis. Bei weiteren Fragen zu unseren Leistungen wenden Sie sich gerne an uns!</strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:22px\">Diagnostik in der Praxis:</span></li>\r\n	<li><span style=\"font-size:22px\">k&ouml;rperliche Untersuchungen</span></li>\r\n	<li><span style=\"font-size:22px\">Labor: Blut, Urin, Stuhl, Abstrich,...</span></li>\r\n	<li><span style=\"font-size:22px\">Puls-Oxymetrie</span></li>\r\n	<li><span style=\"font-size:22px\">EKG / Langzeit-EKG</span></li>\r\n	<li><span style=\"font-size:22px\">Belastungs-EKG</span></li>\r\n	<li><span style=\"font-size:22px\">Blutdruck / Langzeit Blutdruckmessung</span></li>\r\n	<li><span style=\"font-size:22px\">Ultraschalluntersuchungen des Bauch- und Brustraumes</span></li>\r\n	<li><span style=\"font-size:22px\">Ultraschalluntersuchungen der Schilddr&uuml;se und Weichteile</span></li>\r\n	<li><span style=\"font-size:22px\">Echokardiographie</span></li>\r\n	<li><span style=\"font-size:22px\">Farbkodierte Ultraschalluntersuchungen der Halsschlagadern</span></li>\r\n	<li><span style=\"font-size:22px\">Farbkodierte Ultraschalluntersuchungen der Blutgef&auml;&szlig;e in Armen und Beinen</span></li>\r\n	<li><span style=\"font-size:22px\">Lungenfunktion LUFU (Spirometrie)</span></li>\r\n	<li><span style=\"font-size:22px\">Gesundheitsuntersuchungen (Check-Up)</span></li>\r\n	<li><span style=\"font-size:22px\">Die Messung des Kn&ouml;chel-Arm-Index mit dem boso ABI-system*</span></li>\r\n</ul>\r\n\r\n<p><span style=\"color:#2980b9\"><span style=\"font-size:22px\">Leistungen der gesetzlichen Krankenversicherung bei Patienten</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:22px\">Ultraschalluntersuchung des Bauchraumes, der Schilddr&uuml;se und der Venen</span></li>\r\n	<li><span style=\"font-size:22px\">Kindervorsorgeuntersuchungen (U2- U9)</span></li>\r\n	<li><span style=\"font-size:22px\">Jugendgesundheitsberatung (U10)</span></li>\r\n	<li><span style=\"font-size:22px\">Jugendarbeitsschutzuntersuchung</span></li>\r\n	<li><span style=\"font-size:22px\">Gesundheitsvorsorgeuntersuchung&nbsp; &nbsp;einmalig zwischen 18 und 34 Jahre sowie ab 35 Jahren alle 3 Jahre</span></li>\r\n	<li><span style=\"font-size:22px\">Krebsvorsorgeuntersuchung M&auml;nner ab 45 Jahren j&auml;hrlich</span></li>\r\n	<li><span style=\"font-size:22px\">ImpfungenInfusionsbehandlung (z. B. bei Schwindel, Tinnitus, Erbrechen, Durchblutungsst&ouml;rungen)</span></li>\r\n	<li><span style=\"font-size:22px\">BlutabnahmeEKG und Belastungs-EKG</span></li>\r\n	<li><span style=\"font-size:22px\">Chirurgische Eingriffe: z.B. Leberfleckentfernung, Wundnaht bei Verletzungen, Fremdk&ouml;rperentfernungen)</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n','2019-12-04'),
(2,'Der Knöchel-Arm-Index','der-knöchel-arm-index','<p>Der Kn&ouml;chel-Arm-Index Content web</p>\r\n','0000-00-00'),
(3,'Individuelle Gesundheitsleistungen','individuelle-gesundheitsleistungen','individuelle-gesundheitsleistungen Content','0000-00-00'),
(4,'Beschneidung','beschneidung','Beschneidung content',NULL),
(5,'Schröpfen','schröpfen','Schröpfen Content',NULL),
(6,'Diagnostik in der Praxis','diagnostik-in-der-praxis','Diagnostik in der Praxis Content',NULL);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_users` (
  `UserId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(24) NOT NULL,
  `Firstname` varchar(24) NOT NULL,
  `Lastname` varchar(24) NOT NULL,
  `Password` char(80) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `SubscriptionDate` date NOT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `GroupId` tinyint(2) unsigned NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  KEY `UserGroup` (`GroupId`),
  CONSTRAINT `UserGroup` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `app_users` (`UserId`, `Username`, `Firstname`, `Lastname`, `Password`, `Email`, `SubscriptionDate`, `LastUpdate`, `LastLogin`, `GroupId`, `Status`) VALUES
(2,'yaseen','Yaseen ','Mohammad','$2a$07$yeNCSNwRpYopOhv0TrrReOfePkToEwmNKagsCYcwX3XoXYyElzR7y','yaderky@yahoo.com','2019-11-20','2019-12-04 06:46:21','2020-01-08 11:46:05',1,1),
(5,'Jelani1955','Jelani','Negahban','$2a$07$yeNCSNwRpYopOhv0TrrReOzkzrFDl28E0icpv9.uWtvr0qEKRq17G','jelani@gmail.com','2019-12-01','2019-12-04 16:50:24',NULL,3,1);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_users_groups` (
  `GroupId` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(36) NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`) VALUES
(1,'Superweise'),
(3,'Editor');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_users_groups_privileges` (
  `Id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `GroupId` tinyint(2) unsigned NOT NULL,
  `PrivilegeId` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `AppUserGroup` (`GroupId`),
  KEY `AppPrivilegeGroup` (`PrivilegeId`),
  CONSTRAINT `AppPrivilegeGroup` FOREIGN KEY (`PrivilegeId`) REFERENCES `app_users_privileges` (`PrivilegeId`),
  CONSTRAINT `AppUserGroup` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

INSERT INTO `app_users_groups_privileges` (`Id`, `GroupId`, `PrivilegeId`) VALUES
(1,1,1),
(2,1,2),
(3,1,3),
(13,1,8),
(14,1,9),
(15,1,10),
(16,1,11),
(17,1,12),
(18,1,14),
(19,1,15),
(20,1,16),
(21,1,17),
(38,1,20),
(39,3,8),
(40,1,21),
(41,1,22),
(42,1,23),
(43,1,24),
(48,1,28),
(49,1,29),
(50,1,30),
(51,1,31),
(52,1,32),
(53,1,25),
(54,3,23),
(55,1,33),
(56,1,34),
(57,1,35),
(58,1,36),
(59,1,37),
(60,1,38),
(61,1,39),
(62,1,40);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_users_privileges` (
  `PrivilegeId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Privilege` varchar(36) NOT NULL,
  `PrivilegeTitle` varchar(60) NOT NULL,
  PRIMARY KEY (`PrivilegeId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

INSERT INTO `app_users_privileges` (`PrivilegeId`, `Privilege`, `PrivilegeTitle`) VALUES
(1,'/app-admin/users/create','Create New Admin'),
(2,'/app-admin/users/edit','Edit Admins'),
(3,'/app-admin/users/delete','Delete Admins'),
(8,'/app-admin/users/index','Users List'),
(9,'/app-admin/usersgroups/index','Users Groups List'),
(10,'/app-admin/usersgroups/create','Create New Users Group'),
(11,'/app-admin/usersgroups/edit','Edit Users Groups'),
(12,'/app-admin/usersgroups/delete','Delate Users Groups'),
(14,'/app-admin/usersprivileges/index','Privileges List'),
(15,'/app-admin/usersprivileges/create','Create New Privileges'),
(16,'/app-admin/usersprivileges/edit','Edit Privileges'),
(17,'/app-admin/usersprivileges/delete','Delete Privileges'),
(20,'/app-admin/users/show','Users Show'),
(21,'/app-admin/blog/index','Blog List'),
(22,'/app-admin/blog/create','Create New Blog'),
(23,'/app-admin/blog/edit','Edit Blog'),
(24,'/app-admin/blog/delete','Delete Blog'),
(25,'/app-admin/hzv/index','HzV List'),
(28,'/app-admin/news/index','News List'),
(29,'/app-admin/news/edit','Edit News'),
(30,'/app-admin/news/delete','Delete News'),
(31,'/app-admin/news/create','Create New News'),
(32,'/app-admin/services/index','Services List'),
(33,'/app-admin/services/edit','Services Edit'),
(34,'/app-admin/email/index','Email List'),
(35,'/app-admin/email/getemaildetails','Email details ajax'),
(36,'/app-admin/ajax/getallinfo','Ajax Controller'),
(37,'/app-admin/medicines/index','Medicines List'),
(38,'/app-admin/medicines/show','Medicines Show'),
(39,'/app-admin/medicines/approve','Medicines Aprove'),
(40,'/app-admin/filemanager/server','Server Images');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `app_users_profile` (
  `UserId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Specialty` varchar(36) NOT NULL,
  `City` varchar(36) NOT NULL,
  `Address` varchar(36) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Dob` date NOT NULL,
  `About` text NOT NULL,
  `Image` varchar(60) NOT NULL,
  PRIMARY KEY (`UserId`),
  CONSTRAINT `UserProfile` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `app_users_profile` (`UserId`, `Specialty`, `City`, `Address`, `Phone`, `Dob`, `About`, `Image`) VALUES
(2,'Facharzt f&uuml;r Innere Medizin','Kassel','Holl&auml;ndische Str. 143','00491725849048','1974-04-12','<h3><span style=\"color:#3498db\"><strong>Yaseen Mohammad</strong></span></h3>\r\n\r\n<h4>Lebenslauf:</h4>\r\n\r\n<p>1974&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Geburt in Kassan &ndash; Syrien</p>\r\n\r\n<p>1993&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Abitur in Derik &ndash; Syrien</p>\r\n\r\n<p>1993-2000&nbsp;&nbsp;&nbsp;&nbsp; Studium der Humanmedizin an</p>\r\n\r\n<p>der Duhok Universit&auml;t Kurdistan-Irak</p>\r\n\r\n<p>2000 - 2001&nbsp;&nbsp; Assistenzarzt in Azadi Krankenhaus</p>\r\n\r\n<h4>In Deutschland:</h4>\r\n\r\n<ul>\r\n	<li>Assistenzarzt in der Innere Abteilung (Kardiologie, Diabetologie, Pulmologie, Onkologie) in P.H.K. in Sachsen-Anhalt.</li>\r\n	<li>Assistenzarzt in der Innere Medizin Abteilung in Ev. Vereins Krankenhaus in Hann. M&uuml;nden.</li>\r\n	<li>Assistenzarzt in der Innere Abteilung in Marienkrankenhaus-Kassel.</li>\r\n	<li>Facharzt f&uuml;r Innere Medizin seit 2014</li>\r\n	<li>2014 &ndash; 2018 &Auml;rztlicher Leiter der Allgemeinmedizin-Praxis &ldquo;Wesertor&rdquo; in Kassel</li>\r\n	<li>Ab dem 01.10.2018 Inhaber &amp; &auml;rztlicher Leiter der Kasseler Medical Center in die Holl&auml;ndische Str. 143, 34127 Kassel</li>\r\n</ul>\r\n\r\n<h4>Qualifikationen:</h4>\r\n\r\n<ul>\r\n	<li>Facharzt f&uuml;r Innere Medizin</li>\r\n	<li>Zusatzqualifikationen unter anderem:</li>\r\n	<li>Psychosomatische Grundversorgung</li>\r\n	<li>Hautkrebsscreening</li>\r\n	<li>Fachkunde im Strahlenschutz</li>\r\n	<li>12 Monate Weiterbildungsbefugnis f&uuml;r &Auml;rzte in Ausbildung zum Facharzt f&uuml;r Innere Medizin</li>\r\n</ul>\r\n','zhitew_fzzwvu_lmpwzy_qyysqw_nyr5zu_8813.jpg'),
(5,'FA f. Allgemeinmedizin','Kassel','Holl&auml;ndische Str. 143','0049172555555','1955-01-01','<h2><span style=\"font-size:20px\"><span style=\"color:#2980b9\">Jelani Negahban</span></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Facharzt f&uuml;r Allgemeinmedizin &amp; Rehabilitationswesen + psychosomatische Grundversorgung<br />\r\nBiografie:<br />\r\n1982 - 1984 Akute Innere Medizin Klinik Melsungen<br />\r\n1984 - 1995 Oberarzt Klinik Alte M&uuml;hle &amp; Junkerngrund (Innere Medizin)<br />\r\n1995 - 2016 Niedergelassener Arzt f&uuml;r Allgemeinmedizin (Kassel)<br />\r\nSeit 2018 - &nbsp;angestellter Facharzt bei Kasseler &nbsp;Medical Center&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n','bmvnyw_hiyw4u_cg5njd_jhjda3_jhlltk_32720.png');

-- ------------------------------------------------ 

