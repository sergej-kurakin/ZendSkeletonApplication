<?php

namespace Application\Logger\Service;

use Zend\Console\Console;
use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

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

        if (empty($logConfig)) {
            $logConfig = array(
                'writers' => array(
                    array(
                        'name' => 'Null',
                    ),
                ),
                'exceptionhandler' => true,
                'errorhandler' => true,
            );
        }

        $logger = new Logger($logConfig);

        return $logger;

    }
}
