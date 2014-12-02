<?php
/*
 * This file is part of the SDPHP {php-ork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Logic;
use SDPHP\PHPMicrork\State\GameStateInterface;
use SDPHP\PHPMicrork\IO\GameIOInterface;


/**
 * FightLogic - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 * @copyright (c) 2014, CPC Strategy Development Team
 */
class FightLogic implements GameLogicInterface
{

    public function switchState(GameStateInterface $state, GameIOInterface $gameIO)
    {
        $player = $state->getPlayer();
        $npc = $state->getNPC();
        // TODO: Implement switchState() method.
    }
}