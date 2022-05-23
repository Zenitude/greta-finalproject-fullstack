/* Création de la table invoices*/
CREATE TABLE `lemontagnard`.`invoices`
(
    `idInvoice` INT AUTO_INCREMENT,
    `date` DATETIME NOT NULL,
    `sumRooms` INT NOT NULL DEFAULT 0,
    `sumExtras` INT NOT NULL DEFAULT 0,
    `sumRestaurant` INT NOT NULL DEFAULT 0,
    `advance` INT NOT NULL DEFAULT 0,
    `discournt` INT NOT NULL DEFAULT 0,
    `idReservationI` INT NOT NULL,
    PRIMARY KEY (`idInvoice`),
    CONSTRAINT `FK_Invoice_Reservation` FOREIGN KEY (`idReservationI`) REFERENCES `reservationshotel` (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

