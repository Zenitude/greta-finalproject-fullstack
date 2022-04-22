/* Création de la table reservationsHotel*/

CREATE TABLE `lemontagnard`.`reservationsHotel`
(
    `id` INT AUTO_INCREMENT,
    `number` INT NOT NULL,
    `startDate` DATE NOT NULL,
    `endDate` DATE NOT NULL,
    `idCustomer` INT NOT NULL,
    `remarque` TEXT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idCustomer`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

