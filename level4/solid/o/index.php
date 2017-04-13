<?php
/**
 * SOLID
 * O - Принцип открытости-закрытости. Открыты для расширения и закрыты для изменения.
 * open-closed
 */
$fileLogger = new FileLogger();
$product = new Product1($fileLogger);
$product->setPrice(34);

$dbLogger = new DBLogger();
$product = new Product1($dbLogger);
$product->setPrice(34);
