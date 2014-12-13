<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Common;

use SDPHP\PHPMicrork\Item\ItemInterface;
use SDPHP\PHPMicrork\Player\PlayerInterface;

/**
 * InteractionInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface InteractionInterface 
{
    public function playerInteraction(PlayerInterface $player);

    public function itemInteraction(ItemInterface $item);
} 
