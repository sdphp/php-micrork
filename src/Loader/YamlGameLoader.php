<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Loader;

include 'XML2Array.php';

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;
use LSS\XML2Array;

/**
 * YamlLevelLoader - Description. 
 *
 * @author Juan Manuel Torres <kinojman@gmail.com>
 */
class YamlGameLoader extends FileLoader
{
	/**
	 * @param mixed $resource
	 * @return array
	 */
     private function parse($resource)
	 {
		$file_type = pathinfo($resource, PATHINFO_EXTENSION);
		switch ($file_type) {
			case 'yml':
				return Yaml::parse($resource);
				break;
			case 'xml':
				$xml_string = implode("", file($resource));
				$xml_array = XML2Array::createArray($xml_string);
				$root_tag = key($xml_array);
				return $xml_array[$root_tag];
				break;
		}
	}

    /**
     * @param mixed $resource
     * @param null $type
     * @return array;
     */
    public function load($resource, $type = null)
    {
        $config = $this->parse($this->locator->locate($resource, null, true));

        if (isset($config['world']['level_info'])) {
            // if is world configuration load levels
            $levels = [];

            foreach($config['world']['level_info'] as $levelName => $levelPath) {
                $levels['levels'][$levelName] = $this->parse($this->locator->locate($levelPath, null, true));
            }

            $config = array_merge($config, $levels);
        }

        return $config;
    }

    public function supports($resource, $type = null)
    {
		$file_type = pathinfo($resource, PATHINFO_EXTENSION);
        return is_string($resource) && ('yml' === $file_type || 'xml' === $file_type );
    }
}
