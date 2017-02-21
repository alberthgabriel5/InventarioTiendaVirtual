ALTER TABLE `tbsupplier` CHANGE `telephonoSupplier` `telephoneSupplier` VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `tbsupplier` ADD `active` BIT(1) NOT NULL AFTER `telephoneSupplier`;

CREATE TABLE `mgasoluciones`.`tbstock` ( `idStock` INT NOT NULL , `idProduct` INT NOT NULL , `idStore` INT NOT NULL , `quantity` INT NOT NULL , `levelStock` INT NOT NULL ) ENGINE = InnoDB;

INSERT INTO `tbstock` (`idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`) VALUES ('1', '1', '1', '10', '10'), ('2', '2', '1', '10', '10');

INSERT INTO `tbstock` (`idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`) VALUES ('3', '3', '1', '10', '10'), ('4', '4', '1', '10', '10');

