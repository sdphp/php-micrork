<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Loader;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlLevelLoader - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class YamlGameLoader extends FileLoader
{
    /**
     * @param mixed $resource
     * @param null $type
     * @return array;
     */
    public function load($resource, $type = null)
    {
        $config = Yaml::parse($this->locator->locate($resource, null, true));

        if (isset($config['world']['level_info'])) {
            // if is world configuration load levels
            $levels = [];

            foreach($config['world']['level_info'] as $levelName => $levelPath) {
                $levels['levels'][$levelName] = Yaml::parse($this->locator->locate($levelPath, null, true));
            }

            $config = array_merge($config, $levels);
        }

        return $config;
    }

    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo($resource, PATHINFO_EXTENSION);
    }
}
