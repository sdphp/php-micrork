<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Loop;

use SDPHP\PHPMicrork\Logic\GameLogicInterface;
use SDPHP\PHPMicrork\State\StateInterface;

/**
 * GameLoop - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class GameLoop extends AbstractGameLoop
{
    public function start(StateInterface $gameState, GameLogicInterface $gameLogic)
    {
        while (!$gameState->objectivesCompleted() && !$gameState->isStateOver()) {
            $gameLogic->switchState($gameState, $this->gameIO);
        }
    }
}
