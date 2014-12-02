<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Common;

/**
 * BasicDice - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class BasicDice implements DiceInterface
{

    private $number;
    private $sideOptions;

    public function __construct()
    {
        $this->number = 2;
        $this->sideOptions = [1, 2, 3, 4, 5, 6];
    }

    public function roll()
    {
        $count = count($this->sideOptions)-1;
        $total = 0;

        for ($i = 0; $i < $this->number; $i++) {
            $total+= rand(0, $count);
        }

        return $total;
    }

    public function setNumberOfDice($number)
    {
        $this->number;
    }

    public function setSideOptions($options)
    {
        $this->sideOptions = $options;
    }
}
