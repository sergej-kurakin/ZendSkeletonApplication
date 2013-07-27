<?php

return array(
    'factories' => array(
        'Application\Logger\Logger' => 'Application\Logger\LoggerFactory',
    ),
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'aliases' => array(
        'Logger' => 'Application\Logger\Logger',
        'translator' => 'MvcTranslator',
    ),
);