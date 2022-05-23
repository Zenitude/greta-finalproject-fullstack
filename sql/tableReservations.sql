/* Création de la table reservationsHotel*/

CREATE TABLE `lemontagnard`.`reservationsHotel`
(
    `idReservation` INT AUTO_INCREMENT,
    `startDate` DATE NOT NULL,
    `endDate` DATE NOT NULL,
    `idCustomer` INT NOT NULL,
    `remarque` TEXT,
    PRIMARY KEY (`idReservation`),
    CONSTRAINT `FK_Reservation_Customer` FOREIGN KEY (`idCustomer`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

