<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Loop;

use SDPHP\PHPMicrork\IO\GameIOInterface;
use SDPHP\PHPMicrork\Logic\GameLogicInterface;
use SDPHP\PHPMicrork\State\StateInterface;

/**
 * AbstractGameLoopo - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
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

    abstract public function start(StateInterface $gameState, GameLogicInterface $gameLogic);
} 