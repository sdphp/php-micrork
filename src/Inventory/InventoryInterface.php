<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Inventory;

use SDPHP\PHPMicrork\Item\ItemInterface;

/**
 * InventoryInterface - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
interface InventoryInterface
{
    public function setItem(ItemInterface $item);
    
    public function getItem($itmeName);

    public function hasItem($itemName);
    
    public function removeItem($itemName);
}
