<?php

namespace Application\Logger;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Log\Logger;
use Zend\Console\Console;

class LoggerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        // Configure the logger
        $config = $serviceLocator->get('Config');

        $logConfig = array();

        if (Console::isConsole()) {
            $logConfig = isset($config['clilog']) ? $config['clilog'] : array();
        } else {
            $logConfig = isset($config['weblog']) ? $config['weblog'] : array();
        }

        $logger = new Logger($logConfig);

        return $logger;

    }

}
