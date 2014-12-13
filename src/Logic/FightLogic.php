<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Logic;

use SDPHP\PHPMicrork\State\StateInterface;
use SDPHP\PHPMicrork\IO\GameIOInterface;


/**
 * FightLogic - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class FightLogic implements GameLogicInterface
{

    public function switchState(StateInterface $state, GameIOInterface $gameIO)
    {
        $player = $state->getPlayer();
        $npc = $state->getNPCs();
        $gameIO->printError('TODO: Implement switchState method!!');
        // TODO: Implement switchState() method.
    }
}
