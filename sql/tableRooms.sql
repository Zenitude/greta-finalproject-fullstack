/*  Creation of the table : rooms | Création de la table:  rooms */

CREATE TABLE `lemontagnard`.`rooms`
(
    `idRoom` INT AUTO_INCREMENT,
    `number` INT NOT NULL,
    `designation` VARCHAR(255),
    `beds` INT NOT NULL DEFAULT 1,
    `bathrooms` INT NOT NULL DEFAULT 1,
    `toiletes` INT NOT NULL DEFAULT 1,
    `childrooms` INT NOT NULL DEFAULT 0,
    `sallons` INT NOT NULL DEFAULT 0,
    `terraces` INT NOT NULL DEFAULT 0,
    `price` INT NOT NULL,
    PRIMARY KEY (`idRoom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Creation of first rooms | Création des premières chambres */
INSERT INTO `rooms`(number, designation, beds, bathrooms, toiletes, childrooms, sallons, terraces, price) VALUES
(
    '101',
    'La premiere',
    1,
    1,
    1,
    0,
    0,
    1,
    150
),
(
    '102',
    'La deuxieme',
    2,
    2,
    1,
    0,
    0,
    2,
    300
),
(
    '103',
    'La troisieme',
    3,
    2,
    2,
    1,
    0,
    1,
    500
);

/* Creation of the table : roomsbooked | Création de la table : roomsbooked */
CREATE TABLE `lemontagnard`.`roomsBooked`
(
    `id` INT AUTO_INCREMENT,
    `idReservationB` INT NOT NULL,
    `idRoomB` INT NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_Booked_Reservation` FOREIGN KEY (`idReservationB`) REFERENCES `reservationshotel` (`idReservation`),
    CONSTRAINT `FK_Booked_Room` FOREIGN KEY (`idRoomB`) REFERENCES `rooms` (`idRoom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

