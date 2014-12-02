<?php
/*
 * This file is part of the CPCStrategy {php-ork} Package. 
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Loop;

use SDPHP\PHPMicrork\IO\GameIOInterface;
use SDPHP\PHPMicrork\Logic\GameLogicInterface;
use SDPHP\PHPMicrork\State\GameStateInterface;

/**
 * AbstractGameLoopo - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 * @copyright (c) 2014, CPC Strategy Development Team
 */
abstract class AbstractGameLoop
{
    /**
     * @var GameIOInterface
     */
    protected  $gameIO;

    public function __construct(GameIOInterface $gameIO)
    {
        $this->gameIO = $gameIO;
    }

    abstract public function start(GameStateInterface $gameState, GameLogicInterface $gameLogic);
} 