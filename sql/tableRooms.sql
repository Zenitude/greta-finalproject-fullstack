/* Création de la table rooms */

CREATE TABLE `lemontagnard`.`rooms`
(
    `id` INT AUTO_INCREMENT,
    `number` INT NOT NULL,
    `designation` VARCHAR(255),
    `beds` INT NOT NULL DEFAULT 1,
    `bathrooms` INT NOT NULL DEFAULT 1,
    `toiletes` INT NOT NULL DEFAULT 1,
    `childrooms` INT NOT NULL DEFAULT 0,
    `sallons` INT NOT NULL DEFAULT 0,
    `terraces` INT NOT NULL DEFAULT 0,
    `price` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Création de la liaison roomsBooked */
CREATE TABLE `lemontagnard`.`roomsBooked`
(
    `id` INT AUTO_INCREMENT,
    `idReservationH` INT NOT NULL,
    `idRoom` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idReservationH`) REFERENCES `reservationshotel` (`id`),
    FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;