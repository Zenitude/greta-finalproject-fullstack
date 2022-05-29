/* Creation of the table : invoices | Création de la table : invoices*/
CREATE TABLE `lemontagnard`.`invoices`
(
    `idInvoice` INT AUTO_INCREMENT,
    `date` DATETIME NOT NULL,
    `sumRooms` DOUBLE NOT NULL DEFAULT 0,
    `sumExtras` DOUBLE NOT NULL DEFAULT 0,
    `sumRestaurant` DOUBLE NOT NULL DEFAULT 0,
    `advance` DOUBLE NOT NULL DEFAULT 0,
    `discournt` DOUBLE NOT NULL DEFAULT 0,
    `idReservationI` INT NOT NULL,
    PRIMARY KEY (`idInvoice`),
    CONSTRAINT `FK_Invoice_Reservation` FOREIGN KEY (`idReservationI`) REFERENCES `reservationshotel` (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

