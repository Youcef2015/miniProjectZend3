<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:48
 */

declare(strict_types = 1);


namespace Actor;


use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
