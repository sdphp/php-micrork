<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Common;

use Symfony\Component\Config\Loader\DelegatingLoader;

/**
 * FileLoaderTrait - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
trait FileLoaderTrait 
{
    /**
     * @var \Symfony\Component\Config\Loader\DelegatingLoader
     */
    protected $loader;

    /**
     * @param DelegatingLoader $loader
     * @return mixed
     */
    public function setDelegatingLoader(DelegatingLoader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @return \Symfony\Component\Config\Loader\DelegatingLoader
     */
    public function getDelegatingLoader()
    {
        return $this->loader;
    }

    /**
     * @param null $name
     * @return mixed
     */
    public function loadFile($name = null)
    {
        return $this->getDelegatingLoader()->load($name);
    }
} 