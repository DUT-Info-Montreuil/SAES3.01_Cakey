insert into bonus(nom, prixEnChocolat, description) values
	('sucre', 15, 'rajoute 20 PV aux tours posées sur la map sauf chalumeau'),
	('caramel', 25, 'multiplie par 2 les dégâts infligés par les tours posées sur la map'),
	('citron', 25, 'réduit la vitesse des ennemis par 2');

insert into ennemis(nom, PV, porteeAttaque, pointsAttaque, recompense ,pathImage) values
    ('Patate',1000,5,10,50,'patate32x32.png'),
    ('Frite',400,5,5,15,'frite.png'),
    ('Petit Pois',500,5,5,15,'petitPois32x32.png'),
    ('Poisson',700,5,10,20,'poisson32x32.png');
	
insert into statistiquesTour(nom, pointsAttaque, porteeAttaque, PV, prixAchat, niveau, pathImage) values
	('fouet', 5, 60, 1000, 150,1,'fouet62x62.png'),
	('couteau', 3, 30, 600, 100,1,'couteau32x32.png'),
	('rape', 0, 0, 1000, 200,1,'rape48x48.png'),
	('chalumeau', 500, 30, 1, 180,1,'chalumeau64x64.png');
	
insert into evolutionRang values
	(2,300, 35, NULL),
	(3,800, 50, NULL),
	(4,1500, 50, NULL),
	(5,2500, 100, NULL),
	(6,4500, 50, NULL);

insert into niveau (nbEnnemis, pathImageTerrain, argentBonbon, XPGagnees, ChocolatGagne, idTour) values
    (50, 'niveau1.csv', 1000, 100, 25, NULL),
    (100, 'niveau2.csv', 1000, 150, 30, NULL),
    (150, 'niveau3.csv', 1500, 250, 30, NULL);

insert into estDansNiveau(numeroNiveau, idEnnemi, nbEnnemiType) values
    (1, 1, 15),
    (1, 3, 20),
    (1, 4, 15),
    (2, 1, 30),
    (2, 3, 30),    
    (2, 4, 40),
    (3, 1, 35),
    (3, 3, 20),
    (3, 4, 45);	

insert into donneBonusRang values
	(5,1,1),
	(5,3,1),
	(6,2,1);
	
insert into donneBonusNiveau values
	(3,1,1);


