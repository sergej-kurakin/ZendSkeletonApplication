<?php

namespace Application\View\Helper\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\View\Helper\StaticFilesVersion;

class StaticFilesVersionFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return StaticFilesVersion
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $helper = new StaticFilesVersion();

        /**
         * @var $parentServiceLocator ServiceLocatorInterface
         */
        $parentServiceLocator = $serviceLocator->getServiceLocator();

        $config = $parentServiceLocator->get('Config');

        if (isset($config['view_helper_config']['staticfilesversion'])) {
            $configHelper = $config['view_helper_config']['staticfilesversion'];

            if (isset($configHelper['version'])) {
                $helper->setVersion($configHelper['version']);
            }

            if (isset($configHelper['type'])) {
                $helper->setType($configHelper['type']);
            }

        }

        return $helper;
    }

}