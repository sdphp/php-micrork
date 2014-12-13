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
class FightLoop extends AbstractGameLoop
{
    public function start(StateInterface $gameState, GameLogicInterface $gameLogic)
    {
        $weapon = $this->gameIO->askQuestion('What weapon do you want to use?');

        while (true) {
            $gameLogic->switchState($gameState, $this->gameIO);

            if ($gameState->isFightOver()) {
                break;
            }
        }
    }
}
