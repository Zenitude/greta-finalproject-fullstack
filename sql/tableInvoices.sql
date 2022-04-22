/* Création de la table invoices*/
CREATE TABLE `lemontagnard`.`invoices`
(
    `id` INT AUTO_INCREMENT,
    `number` INT NOT NULL,
    `date` DATETIME NOT NULL,
    `sumRooms` INT NOT NULL DEFAULT 0,
    `sumExtras` INT NOT NULL DEFAULT 0,
    `sumRestaurant` INT NOT NULL DEFAULT 0,
    `advance` INT NOT NULL DEFAULT 0,
    `discournt` INT NOT NULL DEFAULT 0,
    `idReservationH` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idReservationH`) REFERENCES `reservationshotel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

