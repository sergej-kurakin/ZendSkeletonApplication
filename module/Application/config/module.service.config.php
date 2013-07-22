<?php

return array(
    'factories' => array(
        'Application\Logger\Logger' => 'Application\Logger\LoggerFactory',
    ),
    'aliases' => array(
        'Logger' => 'Application\Logger\Logger',
    ),
);