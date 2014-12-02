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

/**
 * GameStateInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface GameStateInterface 
{
    /**
     * @return bool
     */
    public function isGameOver();

    /**
     * @return boolean
     */
    public function isLevelOver();

    /**
     * @return string
     * @throws \SDPHP\PHPMicrork\Exception\GameLoadingException
     */
    public function getNextLevel();

    /**
     * @return void
     */
    public function quit();

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param int $position
     * @return void
     */
    public function setPosition($position);

    /**
     * @return array
     */
    public function getRoom();

    /**
     * @return array
     */
    public function getLevel();

    /**
     * @param $level
     * @return void
     */
    public function setLevel($level);

    /**
     * @return array
     */
    public function getDirections();

    /**
     * @return \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    public function getPlayer();

    /**
     * @param \SDPHP\PHPMicrork\Player\PlayerInterface $player
     * @return void
     */
    public function setPlayer(PlayerInterface $player);

    public function loadNPC($npcLocation);

    public function getNPC();

    public function setDice(DiceInterface $dice);

    public function getDice();

    /**
     * @return boolean
     */
    public function objectivesCompleted();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function updateObjectives($key, $value);

    /**
     * @return mixed
     */
    public function setObjectives();
}
