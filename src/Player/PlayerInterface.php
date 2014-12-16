<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Player;

use SDPHP\PHPMicrork\Common\DiceInterface;
use SDPHP\PHPMicrork\Item\ItemInterface;
use SDPHP\PHPMicrork\Inventory\InventoryInterface;

/**
 * PlayerInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
 
interface PlayerInterface 
{
    public function mountItem(ItemInterface $item);
    
    public function unMountItem();
    
    /**
     * Get the current mounted item, if none return false
     * @returns \SDPHP\PHPMicrork\Item\ItemInterface | false
     */ 
    public function getItem();
    
    public function setInventory(InventoryInterface $inventory);
    
    public function getInventory();

    public function damage($amount);

    public function heal($amount);

    public function getHealth();

    public function setName($name);

    public function getName();

    public function setStats($stats);

    public function getStat($key);

    public function isDead();
}
