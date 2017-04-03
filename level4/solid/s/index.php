<?php
/**
 * SOLID
 * S - Принцип единой обязанности.
 * single responsibility
 */
$logger = new Logger();
$product = new Product($logger);
$product->setPrice(34);
