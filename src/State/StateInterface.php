<?php
/*
 * This file is part of the SDPHP php-micork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\State;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Player\PlayerInterface;

/**
 * AbstractGameState - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface StateInterface
{
    /**
     * @return bool
     */
    public function isStateOver();

    /**
     * @return void
     */
    public function quit();

    /**
     * @return \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    public function getPlayer();

    /**
     * @param \SDPHP\PHPMicrork\Player\PlayerInterface $player
     * @return void
     */
    public function setPlayer(PlayerInterface $player);

    /**
     * @return bool
     */
    public function hasNPC();

    /**
     * @param \SDPHP\PHPMicrork\Player\PlayerInterface $npc
     * @return void
     */
    public function setNPC(PlayerInterface $npc);

    /**
     * @return array
     */
    public function getNPCs();

    /**
     * @return \SDPHP\PHPMicrork\Common\DiceInterface
     */
    public function getDice();

    /**
     * @return bool
     */
    public function objectivesCompleted();

    /**
     * @param array $objectives
     * @return void
     */
    public function addObjectives(array $objectives);

    /**
     * @return array
     */
    public function getObjectives();

    /**
     * @param \SDPHP\PHPMicrork\Common\DiceInterface $dice
     * @return mixed
     */
    public function setDice(DiceInterface $dice);

    /**
     * @param string $path
     * @param mixed  $default The default value if the parameter key does not exist
     * @param bool   $deep    If true, a path like foo[bar] will find deeper items
     * @return mixed
     */
    public function getProperty($path, $default = null, $deep = true);

    /**
     * @param $key
     * @param $value
     */
    public function setProperty($key, $value);

}
