<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Item;
use SDPHP\PHPMicrork\Common\DiceInterface;

/**
 * WeaponInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface WeaponInterface extends ItemInterface
{
    public function useWeapon(DiceInterface $dice);
}
