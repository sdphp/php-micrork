<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Player;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Common\FileLoaderInterface;
use SDPHP\PHPMicrork\Common\FileLoaderTrait;
use SDPHP\PHPMicrork\Common\InteractionInterface;
use SDPHP\PHPMicrork\Exception\GameException;
use SDPHP\PHPMicrork\Item\ItemInterface;
use SDPHP\PHPMicrork\Item\WeaponInterface;
use Symfony\Component\Config\Loader\DelegatingLoader;

/**
 * BasicPlayer - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class BasicPlayer implements PlayerInterface, InteractionInterface, FileLoaderInterface
{
    use FileLoaderTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $stats;

    /**
     * @var int
     */
    private $health;

    /**
     * @var bool
     */
    private $dead = false;

    /**
     * @var \SDPHP\PHPMicrork\Item\WeaponInterface
     */
    private $weapon;

    public function __construct(DelegatingLoader $loader)
    {
        $this->setDelegatingLoader($loader);
        $this->loadFile('player.yml');
    }

    public function playerInteraction(PlayerInterface $player)
    {
        // TODO: Implement playerInteraction() method.
    }

    public function itemInteraction(ItemInterface $item)
    {
        // TODO: Implement itemInteraction() method.
    }

    public function attack(DiceInterface $dice)
    {
        if (isset($this->weapon)) {
            $damage = $this->weapon->useWeapon($dice);
        } else {
            $damage = $this->getStat('fist_damage');
        }

        return $damage;
    }

    public function setWeapon(WeaponInterface $weapon)
    {
        $this->weapon = $weapon;
    }

    public function damage($amount)
    {
        $this->health -= abs($amount);

        if ($this->health <= 0) {
            $this->health = 0;
            $this->dead = true;
        }
    }

    public function heal($amount)
    {
        $this->health += abs($amount);
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setStats($stats)
    {
        $this->stats = $stats;
    }

    public function getStat($key)
    {
        if (isset($this->stats[$key])) {
            return $this->stats[$key];
        } else {
            throw new GameException(sprintf('Stat %s does not exist for player $s', $key, $this->getName()));
        }
    }

    public function isDead()
    {
        return $this->dead;
    }
}
