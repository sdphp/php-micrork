<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Logic;

use SDPHP\PHPMicrork\IO\GameIOInterface;
use SDPHP\PHPMicrork\State\GameStateInterface;

/**
 * LogicInterface - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
interface GameLogicInterface
{
    public function switchState(GameStateInterface $state, GameIOInterface $gameIO);
}
