<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\IO;

/**
 * GamePrinter - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
Interface GameIOInterface
{

    /**
     * @param $room
     * @return null
     */
    public function printPlace($room);

    /**
     * @param $questionString
     * @param null $default answer
     * @return null
     */
    public function askQuestion($questionString, $default = null);

    /**
     * @param $value
     * @return null
     */
    public function printInfo($value);

    /**
     * @param $value
     * @return null
     */
    public function printComment($value);

    /**
     * @param $value
     * @return null
     */
    public function printQuestion($value);

    /**
     * @param $value
     * @return null
     */
    public function printError($value);
}
