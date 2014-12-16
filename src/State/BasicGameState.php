<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\State;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Player\PlayerInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * GameState - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class BasicGameState implements StateInterface
{
    /**
     * @var bool
     */
    private $state = false;

    /**
     * @var \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    private $player;

    /**
     * @var array of \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    private $npcs = [];

    /**
     * @var \SDPHP\PHPMicrork\Common\DiceInterface
     */
    private $dice;

    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    private $properties;


    public function __construct(PlayerInterface $player, DiceInterface $dice, array $properties = array())
    {
        $this->setDice($dice);
        $this->setPlayer($player);
        $this->properties = new ParameterBag($properties);
        $this->properties->set('location', 0);

    }

    /**
     * @return bool
     */
    public function isStateOver()
    {
        return $this->state;
    }


    public function quit()
    {
        $this->state = true;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param PlayerInterface $player
     */
    public function setPlayer(PlayerInterface $player)
    {
        $this->player = $player;
    }

    /**
     * @return bool
     */
    public function hasNPC()
    {
        return !empty($this->npcs);
    }

    /**
     * @param \SDPHP\PHPMicrork\Player\PlayerInterface $npc
     * @return void
     */
    public function setNPC(PlayerInterface $npc)
    {
        $name = $npc->getName();
        $this->npcs[$name] = $npc;
    }

    /**
     * @return array
     */
    public function getNPCs()
    {
        return $this->npcs;
    }

    /**
     * @param \SDPHP\PHPMicrork\Common\DiceInterface $dice
     * @return mixed
     */
    public function setDice(DiceInterface $dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return \SDPHP\PHPMicrork\Common\DiceInterface
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @return bool
     */
    public function objectivesCompleted()
    {
        $objectives = $this->getObjectives();

        return array_reduce($objectives, function ($carry, $value) {
            return (bool)$carry && (bool)$value;
        });

    }

    /**
     * Adds an array of objectives. Will overwrite any previous objectives.
     *
     * @param array $objectives
     * @return void
     */
    public function addObjectives(array $objectives)
    {
        if ($this->properties->has('level[objectives]')) {
            $currentObjectives = $this->getObjectives();
            $objectives = array_merge($currentObjectives, $objectives);
        }

        $this->setProperty('objectives', $objectives);
    }

    /**
     * @return array
     */
    public function getObjectives()
    {
    return $this->getProperty('level[objectives]');
    }

    /**
     * @param string $path
     * @param mixed  $default The default value if the parameter key does not exist
     * @param bool   $deep    If true, a path like foo[bar] will find deeper items
     * @return mixed
     */
    public function getProperty($path, $default = null, $deep = true)
    {
        return $this->properties->get($path, $default, $deep);
    }

    /**
     * @param $key
     * @param $value
     */
    public function setProperty($key, $value)
    {
        $this->properties->set($key, $value);
    }
}
