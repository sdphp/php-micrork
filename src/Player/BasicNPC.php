<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Player;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Common\FileLoaderTrait;
use SDPHP\PHPMicrork\Common\InteractiveInterface;
use SDPHP\PHPMicrork\Item\WeaponInterface;

/**
 * BasicNPC - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class BasicNPC implements PlayerInterface, InteractiveInterface
{
    use FileLoaderTrait;

    private $configuration;


    public function getOptions()
    {
        // TODO: Implement getOptions() method.
    }

    public function interact($option)
    {
        // TODO: Implement interact() method.
    }

    public function attack(DiceInterface $dice)
    {
        // TODO: Implement attack() method.
    }

    public function setWeapon(WeaponInterface $weapon)
    {
        // TODO: Implement setWeapon() method.
    }

    public function addDamage($amount)
    {
        // TODO: Implement addDamage() method.
    }

    public function addHealth($amount)
    {
        // TODO: Implement addHealth() method.
    }

    public function getHealth()
    {
        // TODO: Implement getHealth() method.
    }

    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function setStats($stats)
    {
        // TODO: Implement setStats() method.
    }

    public function getStat($key)
    {
        // TODO: Implement getStat() method.
    }

    public function isDead()
    {
        // TODO: Implement isDead() method.
    }

    public function loadConfiguration($name)
    {
        $this->configuration = $this->loadFile(sprintf('npc/%s.yml', $name));
    }
}
