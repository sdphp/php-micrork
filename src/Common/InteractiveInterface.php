<?php
/*
 * This file is part of the SDPHP {php-ork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Common;

/**
 * Interactive - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
interface InteractiveInterface
{
    public function getOptions();

    public function interact($option);

}
