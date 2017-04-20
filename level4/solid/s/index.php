<?php
/**
 * SOLID
 * S - Принцип единой обязанности.
 * single responsibility
 */
$logger = new Logger();
$product = new ProductS($logger);
$product->setPrice(34);
