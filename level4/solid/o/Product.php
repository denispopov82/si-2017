<?php

/**
 * @category  Cgi
 * @package   Product
 * @author    CGI <info.de@cgi.com>
 * @copyright 2016 CGI
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.de.cgi.com/
 */
class Product1
{
    private $_logger;
    
    public function __construct(ILogger $logger)
    {
        $this->_logger = $logger;
    }
    
    public function setPrice($price)
    {
        try {
            // save price in db
        } catch (Exception $e) {
            $this->_logger->logMessage($e->getMessage());
        }
    }
}
