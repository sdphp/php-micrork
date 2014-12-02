<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Loop;

use SDPHP\PHPMicrork\Logic\AbstractGameLoop;
use SDPHP\PHPMicrork\Logic\GameLogicInterface;
use SDPHP\PHPMicrork\State\GameStateInterface;

/**
 * GameLoop - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class FightLoop extends AbstractGameLoop
{
    public function start(GameStateInterface $gameState, GameLogicInterface $gameLogic)
    {
        while (!$gameState->isLevelOver()) {
            $gameLogic->switchState($gameState, $this->gameIO);

            if ($gameState->isFightOver()) {
                break;
            }
        }
    }
}
