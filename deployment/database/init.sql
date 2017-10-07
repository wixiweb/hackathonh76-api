
#insert category

INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Eau', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Electricité', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Propreté', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Meunuiserie', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Toiture', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Sols/Murs', '1');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Autres', '1');


INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Ascenceur', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Chauffage', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Propreté', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Meunuiserie', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Toiture', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Sols/Murs', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Espaces verts', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Eau', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Electricité', '2');
INSERT INTO `hackathon76api`.`Category` (`name`, `type`) VALUES ('Autres', '2');


INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Problème de robinet', '3', '1');
INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ("Chasse d'eau", '3', '1');
INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Appareils sanitaires', '3', '1');
INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Chaudière', '3', '1');
INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Cumulus', '3', '1');


INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ("Colonne d'evacuation/Eau pluviale", '2', '1');

INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Débordements appareils', '1', '1');
INSERT INTO `hackathon76api`.`ClaimType` (`name`, `typeInCharge`, `idCategory`) VALUES ('Joint deféctueux', '1', '1');

INSERT INTO `hackathon76api`.`User` ( `email`, `password`, `name`, `phone`) VALUES ('hulck@wixiweb.fr', 'wixiweb', 'Hulck Hogan', '0982417945');



