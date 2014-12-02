<?php
/*
 * This file is part of the CPCStrategy {php-ork} Package. 
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Item;
use SDPHP\PHPMicrork\Common\DiceInterface;

/**
 * WeaponInterface - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 * @copyright (c) 2014, CPC Strategy Development Team
 */
interface WeaponInterface extends ItemInterface
{
    public function useWeapon(DiceInterface $dice);
}
