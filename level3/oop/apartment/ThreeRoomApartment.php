<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Cgi
 * @package   ${PARAM_DOC}
 * @author    CGI <info.de@cgi.com>
 * @copyright 2016 CGI
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.de.cgi.com/
 */

/**
 * ${CLASS_NAME}
 *
 * @category  Cgi
 * @package   ${PARAM_DOC}
 * @author    CGI <info.de@cgi.com>
 * @copyright 2016 CGI
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.de.cgi.com/
 */
class ThreeRoomApartment  extends Apartment implements ILoggia, IBalcony
{
    const ROOMS_NUMBER = 3;
    
    /**
     * @var int
     */
    protected static $balconies = 1;
    
    /**
     * @var int
     */
    protected static $loggias = 1;
    
    /**
     * @return int
     */
    public function getBalconies()
    {
        return self::$balconies;
    }
    
    /**
     * @return int
     */
    public function getLoggias()
    {
        return self::$loggias;
    }
}
