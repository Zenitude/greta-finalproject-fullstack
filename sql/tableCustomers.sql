/*  Creation of the table : addresscustomers
    Création de la table : addresscustomers */
CREATE TABLE `lemontagnard`.`addresscustomers`
(
    `idAddress` INT AUTO_INCREMENT,
    `street` VARCHAR(255) NOT NULL,
    `zipCode` INT NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*  Creation of the table : customers
    Création de la table : customers*/
CREATE TABLE `lemontagnard`.`customers`
(
    `id` INT AUTO_INCREMENT,
    `lastname` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `birthdate` DATE NOT NULL,
    `idAddressC` INT NOT NULL,
    `vip` BOOLEAN,
    `idConjoint` INT,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_Customer_Address` FOREIGN KEY (`idAddressC`) 
        REFERENCES `addresscustomers` (`idAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


