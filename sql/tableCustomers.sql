/* Création de la table addressCustomers */
CREATE TABLE `lemontagnard`.`addressCustomers`
(
    `id` INT AUTO_INCREMENT,
    `street` VARCHAR(255) NOT NULL,
    `zipCode` VARCHAR(255) NOT NULL,
    `country` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Création de la table customers*/
CREATE TABLE `lemontagnard`.`customers`
(
    `id` INT AUTO_INCREMENT,
    `lastname` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `birthdate` DATE NOT NULL,
    `idAddress` INT NOT NULL,
    `vip` BOOLEAN,
    `idConjoint` INT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idAddress`) REFERENCES `addressCustomers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Création de la table children */
CREATE TABLE `lemontagnard`.`children`
(
    `id` INT AUTO_INCREMENT,
    `lastname` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `birthdate` DATE NOT NULL,
    `mail` VARCHAR(255),
    `phone` VARCHAR(255),
    `idCustomer` INT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idCustomer`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


