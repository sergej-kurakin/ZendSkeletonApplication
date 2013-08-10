<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class StaticFilesVersion extends AbstractHelper
{

    /**
     * Static files version
     *
     * @var int
     */
    protected $version = 1;

    /**
     * Cache saving type: path or query
     *
     * @var string
     */
    protected $type = 'path';

    /**
     * Returns proper type of cache saving type
     *
     * @param string $type
     * @return string
     */
    public function __invoke($type = null)
    {
        if ($type == null) {
            $type = $this->getType();
        }

        if ($type == 'query') {
            return 'v='.(int)$this->getVersion();
        }

        return '_v'.(int)$this->getVersion();
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }
}
