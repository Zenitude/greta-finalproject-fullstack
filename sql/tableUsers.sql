/* Création de la table users */
CREATE TABLE `lemontagnard`.`users`
(
    `id` INT AUTO_INCREMENT,
    `lastname` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `pass` VARCHAR(255) NOT NULL,
    `typeAdmin` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users`(lastname, firstname, mail, pass, typeAdmin) VALUES
(
    'Admin',
    'Principale',
    'admin@gmail.com',
    '21232f297a57a5a743894a0e4a801fc3',
    'adminPrincipal'
),
(
    'Admin',
    'Hotel',
    'adminHotel@gmail.com',
    '21232f297a57a5a743894a0e4a801fc3',
    'adminHotel'
),
(
    'Admin',
    'Restaurant',
    'adminRestaurant@gmail.com',
    '21232f297a57a5a743894a0e4a801fc3',
    'adminRestaurant'
);