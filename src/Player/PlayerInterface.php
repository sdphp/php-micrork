<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Player;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Item\WeaponInterface;

/**
 * PlayerInterface - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
interface PlayerInterface 
{
    public function attack(DiceInterface $dice);

    public function setWeapon(WeaponInterface $weapon);

    public function addDamage($amount);

    public function addHealth($amount);

    public function getHealth();

    public function setName($name);

    public function getName();

    public function setStats($stats);

    public function getStat($key);

    public function isDead();
}
