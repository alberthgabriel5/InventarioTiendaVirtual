ALTER TABLE `tbpurchasingsupplier` CHANGE `idPurchases` `idPurchase` INT(11) NOT NULL;

ALTER TABLE `tbpurchasingsupplier` CHANGE `product` `idProduct` VARCHAR(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `tbpurchasingsupplier` CHANGE `idProduct` `idProduct` INT NOT NULL;
ALTER TABLE `tbpurchasingsupplier` ADD `billNum` INT NOT NULL AFTER `idPurchase`;
ALTER TABLE `tbpurchasingsupplier` ADD `grossPrice` INT NOT NULL AFTER `totalPurchases`,
 ADD `netPrice` INT NOT NULL AFTER `grossPrice`, ADD `received` BIT NOT NULL AFTER `netPrice`;
ALTER TABLE `tbpurchasingsupplier` ADD `typePay` BIT NOT NULL AFTER `received`;

--
-- Estructura de tabla para la tabla `tbpurchasingsupplierpayable`
--

CREATE TABLE `tbpurchasingsupplierpayable` (
  `idPurchase` int(11) NOT NULL,
  `billNum` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `datePurchases` date NOT NULL,
  `descriptionPurchases` varchar(200) NOT NULL,
  `totalPurchases` int(11) NOT NULL,
  `grossPrice` int(11) NOT NULL,
  `netPrice` int(11) NOT NULL,
  `canceled` int(11) NOT NULL,
  `received` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `tboutlay`
--

CREATE TABLE `tboutlay` (
  `idOutlay` int(11) NOT NULL,
  `purchase` bit(1) NOT NULL,
  `idPurchase` int(11) NOT NULL,
  `dateOutlay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

