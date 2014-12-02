<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\State;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Common\FileLoaderInterface;
use SDPHP\PHPMicrork\Common\FileLoaderTrait;
use SDPHP\PHPMicrork\Exception\GameLoadingException;
use SDPHP\PHPMicrork\Player\BasicNPC;
use SDPHP\PHPMicrork\Player\PlayerInterface;

/**
 * GameState - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class BasicGameState implements GameStateInterface, FileLoaderInterface
{
    use FileLoaderTrait;

    /**
     * @var bool
     */
    private $gameOver = false;

    /**
     * @var bool
     */
    private $levelOver = false;

    /**
     * @var int
     */
    private $position;

    /**
     * @var array
     */
    private $level = [];

    /**
     * @var \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    private $player;

    /**
     * @var \SDPHP\PHPMicrork\Player\PlayerInterface
     */
    private $currentNPC;

    /**
     * @var \Symfony\Component\Config\Loader\DelegatingLoader
     */
    private $fileLoader;

    /**
     * @var DiceInterface
     */
    private $dice;


    public function __construct(DiceInterface $dice)
    {
        $this->setPosition(0);
        $this->dice = $dice;
    }

    /**
     * @return bool
     */
    public function isGameOver()
    {
        return $this->gameOver;
    }

    /**
     * @return boolean
     */
    public function isLevelOver()
    {
        return $this->levelOver;
    }

    /**
     * @return string
     */
    public function getNextLevel()
    {
        if(isset($this->level['room'][$this->position]['next_level'])) {
            return $this->level['room'][$this->position]['next_level'];
        } else {
            $roomName = $this->level['room'][$this->position]['name'];
            throw new GameLoadingException(sprintf('The room %s does not contain a next level.', $roomName));
        }
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->level['room'][$this->position];
    }

    /**
     * @param $room
     */
    public function setRoom($room)
    {
        $this->level['room'][$this->position] = $room;
    }



    /**
     * @return mixed
     */
    public function getDirections()
    {
        return $this->level['room'][$this->position]['directions'];
    }

    /**
     * @param $directions
     */
    public function setDirections($directions)
    {
        $this->level['room'][$this->position]['directions'] = $directions;
    }

    /**
     * @return array
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param $level
     * @return void
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function quit()
    {
        $this->gameOver = true;
        $this->levelOver = true;
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

     public function loadNPC($npcName)
    {
        $this->currentNPC = new BasicNPC();
        $this->currentNPC->setDelegatingLoader($this->loader);
        $this->currentNPC->loadConfiguration($npcName);

    }

    public function getNPC()
    {
        return $this->currentNPC;
    }

    /**
     * @return boolean
     */
    public function objectivesCompleted()
    {
        // TODO: Implement objectivesCompleted() method.
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function updateObjectives($key, $value)
    {
        // TODO: Implement updateObjectives() method.
    }

    /**
     * @return mixed
     */
    public function setObjectives()
    {
        // TODO: Implement setObjectives() method.
    }

    /**
     * @return DiceInterface
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @param DiceInterface $dice
     */
    public function setDice(DiceInterface $dice)
    {
        $this->dice = $dice;
    }
}
