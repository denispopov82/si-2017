<?php

/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
class Product
{
    protected static $products = [];
    
    /**
     * @return array
     */
    public static function getProduct($key)
    {
        return isset(self::$products[$key]) ? self::$products[$key] : null;
    }
    
    /**
     * @param array $products
     */
    public static function setProduct($productKey, $productValue)
    {
        self::$products[$productKey] = $productValue;
    }
    
    public function removeProduct($key)
    {
        if (array_key_exists($key, self::$products)) {
            unset(self::$products[$key]);
        }
    }
}

Product::setProduct(1, 'First product');
Product::setProduct(2, 'Second product');
Product::setProduct(3, 'Third product');

echo "<pre>";
    var_dump(Product::getProduct(3));
echo "</pre>";
