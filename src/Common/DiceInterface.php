<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Common;

/**
 * DiceInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface DiceInterface
{
    public function roll();

    public function setNumberOfDice($number);

    public function setSideOptions($options);
}
