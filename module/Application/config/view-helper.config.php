<?php

return array(
    'factories' => array(
        'Application\View\Helper\StaticFilesVersion' => 'Application\View\Helper\Service\StaticFilesVersionFactory'
    ),
    'aliases' => array(
        'sfv' => 'Application\View\Helper\StaticFilesVersion',
    ),
);
