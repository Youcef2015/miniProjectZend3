<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 14:52
 */

declare(strict_types = 1);


namespace Category;


use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
