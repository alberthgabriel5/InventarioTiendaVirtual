ALTER TABLE `tbsupplier` CHANGE `telephonoSupplier` `telephoneSupplier` VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `tbsupplier` ADD `active` BIT(1) NOT NULL AFTER `telephoneSupplier`;

CREATE TABLE `mgasoluciones`.`tbstock` ( `idStock` INT NOT NULL , `idProduct` INT NOT NULL , `idStore` INT NOT NULL , `quantity` INT NOT NULL , `levelStock` INT NOT NULL ) ENGINE = InnoDB;