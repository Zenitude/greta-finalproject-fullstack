/* Creation of the table : reservationshotel | Création de la table : reservationshotel*/

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

