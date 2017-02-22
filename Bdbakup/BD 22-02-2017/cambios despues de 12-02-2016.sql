ALTER TABLE `tbsupplier` CHANGE `telephonoSupplier` `telephoneSupplier` VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `tbsupplier` ADD `active` BIT(1) NOT NULL AFTER `telephoneSupplier`;

CREATE TABLE `mgasoluciones`.`tbstock` ( `idStock` INT NOT NULL , `idProduct` INT NOT NULL , `idStore` INT NOT NULL , `quantity` INT NOT NULL , `levelStock` INT NOT NULL ) ENGINE = InnoDB;

INSERT INTO `tbstock` (`idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`) VALUES ('1', '1', '1', '10', '10'), ('2', '2', '1', '10', '10');

INSERT INTO `tbstock` (`idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`) VALUES ('3', '3', '1', '10', '10'), ('4', '4', '1', '10', '10');


--
-- Volcado de datos para la tabla `tbstock`
--

INSERT INTO `tbstock` (`idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`) VALUES
(1, 1, 1, 10, 15),
(2, 2, 1, 10, 24),
(3, 3, 1, 10, 12),
(4, 4, 1, 10, 14);




--
-- Volcado de datos para la tabla `tbsupplier`
--

INSERT INTO `tbsupplier` (`idSupplier`, `nameSupplier`, `emailSupplier`, `telephoneSupplier`, `active`) VALUES
(1, 'Huawei', 'celular@huawei.com', '123456789', b'1'),
(2, 'Samsung', 'celulares@samsung.com', '987654321', b'1'),
(3, 'Nokia', 'celulares@nokia.com', '88888888', b'1'),
(4, 'T&T', 'celulares@tnt.com', '88888881', b'0'),
(4, 'Motorola', 'celulares@motorola.com', '88888881', b'0');


--
-- Volcado de datos para la tabla `tbpurchasingsupplier`
--

INSERT INTO `tbpurchasingsupplier` (`idPurchases`, `idSupplier`, `datePurchases`, `descriptionPurchases`, `product`, `totalPurchases`) VALUES
(1, 1, '2017-02-21', 'Celulares', '1', 5),
(2, 1, '2017-02-21', 'Celulares', '3', 2),
(3, 1, '2017-02-21', 'Celulares', '4', 4),
(4, 1, '2017-02-22', 'Celulares', '2', 14);


