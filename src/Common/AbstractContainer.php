<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Common;

use SDPHP\PHPMicrork\Exception\GameException;


/**
 * AbstractContainer - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
abstract class AbstractContainer implements \ArrayAccess, \Traversable
{
    private $container;
    private $position = 0;

    public function __construct($dataStructure)
    {
        if ( is_array($dataStructure)
            || $dataStructure instanceof \ArrayObject
            || $dataStructure instanceof \SplDoublyLinkedList
            || $dataStructure instanceof \SplFixedArray
            || $dataStructure instanceof \SplHeap
            || $dataStructure instanceof \SplMaxHeap
            || $dataStructure instanceof \SplMinHeap) {

            $this->container = $dataStructure;
        } else {
            throw new GameException('Invalid data structure type for container.');
        }
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    function rewind() {
        $this->position = 0;
    }

    function current() {
        return $this->container[$this->position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->container[$this->position]);
    }
}
