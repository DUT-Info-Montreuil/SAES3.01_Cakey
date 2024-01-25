DROP TABLE IF EXISTS utilisateur, bonus, ennemis, statistiquesTour, evolutionRang, niveau, partie, demandeAmis, amis, estDansNiveau, toursUtilisateur, donneBonusRang, donneBonusNiveau, bonusUtilisateur, signalement;   


CREATE TABLE utilisateur(
        idUtil         INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        login          Varchar (50) NOT NULL ,
        motDePasse     Varchar (100) NOT NULL ,
        description    Text NOT NULL ,
        argentChocolat Int NOT NULL ,
	pathPhotoProfil VARCHAR (300) ,
	nbAvertissements INT NOT NULL DEFAULT 0,
	nbSignalementAbussifs INT NOT NULL DEFAULT 0 ,
	isAdmin		Boolean NOT NULL DEFAULT FALSE
);




CREATE TABLE bonus(
        idBonus        INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        nom            Varchar (50) NOT NULL ,
        prixEnChocolat Int NOT NULL ,
        description    Text NOT NULL ,
	pathImageBonus	Varchar (300)
);



CREATE TABLE ennemis(
        idEnnemi      INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        nom           Varchar (50) NOT NULL ,
        PV            Int NOT NULL ,
        porteeAttaque Int NOT NULL ,
        pointsAttaque Int NOT NULL ,
        recompense    Int NOT NULL ,
        pathImage     Varchar (300) NOT NULL 
);




CREATE TABLE statistiquesTour(
        idTour        INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        nom           Varchar (50) NOT NULL ,
        pointsAttaque Int NOT NULL ,
        porteeAttaque Int NOT NULL ,
        pv            Int NOT NULL ,
        prixAchat     Int NOT NULL ,
        niveau        Int NOT NULL ,
        pathImage     Varchar (300) NOT NULL 
);




CREATE TABLE evolutionRang(
        rang          Int NOT NULL PRIMARY KEY,
        XPnecessaires Int NOT NULL ,
        chocolatGagne Int NOT NULL,
	idTour	      Int,

	FOREIGN KEY (idTour) REFERENCES statistiquesTour(idTour)
);



CREATE TABLE niveau(
        numeroNiveau  INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        nbEnnemis     Int NOT NULL ,
        pathImageTerrain   Varchar (300) NOT NULL ,
        argentBonbon  Int NOT NULL ,
        XPgagnees     Int NOT NULL ,
        ChocolatGagne Int NOT NULL ,
        idTour        Int ,

	FOREIGN KEY (idTour) REFERENCES statistiquesTour(idTour)
);




CREATE TABLE partie(
        numeroPartie INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        temps        Time NOT NULL ,
        score        Int NOT NULL ,
        isGagnee     Bool NOT NULL ,
        numeroNiveau Int NOT NULL ,
        idUtil       Int NOT NULL ,

	FOREIGN KEY (numeroNiveau) REFERENCES niveau(numeroNiveau) ,
	FOREIGN KEY (idUtil) REFERENCES utilisateur(idUtil)
);




CREATE TABLE demandeAmis(
        idUtil1             Int NOT NULL ,
        idUtil2 	    Int NOT NULL ,
        dateDemande         Date NOT NULL ,
	PRIMARY KEY (idUtil1,idUtil2)

	,FOREIGN KEY (idUtil1) REFERENCES utilisateur(idUtil)
	,FOREIGN KEY (idUtil2) REFERENCES utilisateur(idUtil)
);




CREATE TABLE amis(
        idUtil1             Int NOT NULL ,
        idUtil2 	    Int NOT NULL ,
	PRIMARY KEY (idUtil1,idUtil2)

	,FOREIGN KEY (idUtil1) REFERENCES utilisateur(idUtil)
	,FOREIGN KEY (idUtil2) REFERENCES utilisateur(idUtil)
);




CREATE TABLE estDansNiveau(
        numeroNiveau Int NOT NULL ,
        idEnnemi     Int NOT NULL ,
        nbEnnemiType Int NOT NULL ,
	PRIMARY KEY (numeroNiveau,idEnnemi)

	,FOREIGN KEY (numeroNiveau) REFERENCES niveau(numeroNiveau)
	,FOREIGN KEY (idEnnemi) REFERENCES ennemis(idEnnemi)
);




CREATE TABLE toursUtilisateur(
        idUtil     Int NOT NULL ,
        idTour     Int NOT NULL ,
        niveauTour Int NOT NULL ,
	PRIMARY KEY (idUtil,idTour)

	,FOREIGN KEY (idUtil) REFERENCES utilisateur(idUtil)
	,FOREIGN KEY (idTour) REFERENCES statistiquesTour(idTour)
);




CREATE TABLE donneBonusRang(
        rang         Int NOT NULL ,
        idBonus      Int NOT NULL ,
        nbBonus      Int NOT NULL ,
	PRIMARY KEY (rang,idBonus)

	,FOREIGN KEY (rang) REFERENCES evolutionRang(rang)
	,FOREIGN KEY (idBonus) REFERENCES bonus(idBonus)
);




CREATE TABLE donneBonusNiveau(
        numeroNiveau    Int NOT NULL ,
        idBonus      	Int NOT NULL ,
        nbBonus 	Int NOT NULL ,
	PRIMARY KEY (numeroNiveau,idBonus) ,

	FOREIGN KEY (numeroNiveau) REFERENCES niveau(numeroNiveau) ,
	FOREIGN KEY (idBonus) REFERENCES bonus(idBonus)
);




CREATE TABLE bonusUtilisateur(
        idUtil    	Int NOT NULL ,
        idBonus      	Int NOT NULL ,
        nbBonus 	Int NOT NULL ,
	PRIMARY KEY (idUtil,idBonus) ,

	FOREIGN KEY (idUtil) REFERENCES utilisateur(idUtil) ,
	FOREIGN KEY (idBonus) REFERENCES bonus(idBonus)
);

CREATE TABLE signalement(
	idSignalement Int NOT NULL PRIMARY KEY AUTO_INCREMENT ,
	raison	      Varchar (150) NOT NULL,
	dateSignalement	      DATE ,
	idUtilSignale INT NOT NULL,
	idUtilSignaleur INT NOT NULL,

	FOREIGN KEY (idUtilSignale) REFERENCES utilisateur(idUtil) ,
	FOREIGN KEY (idUtilSignaleur) REFERENCES utilisateur(idUtil)
);



