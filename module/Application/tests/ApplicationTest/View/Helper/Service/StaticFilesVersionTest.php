<?php

namespace ApplicationTest\View\Helper;

use Application\View\Helper\StaticFilesVersion;
use PHPUnit_Framework_TestCase;

class StaticFilesVersionTest extends PHPUnit_Framework_TestCase
{

    public $helper = null;

    public function setUp()
    {
        parent::setUp();

        $this->helper = new StaticFilesVersion();
    }

    public function testPathVersionByDefault()
    {

        $actual = $this->helper->__invoke();

        $this->assertSame('_v1', $actual);
    }

    public function testPathVersionByParam()
    {
        $this->helper->setVersion(3);

        $actual = $this->helper->__invoke('path');

        $this->assertSame('_v3', $actual);
    }

    public function testQueryVersionByParam()
    {
        $this->helper->setVersion(4);

        $actual = $this->helper->__invoke('query');

        $this->assertSame('v=4', $actual);
    }

    public function testPathVersionBySettings()
    {
        $this->helper->setVersion(5);
        $this->helper->setType('path');

        $actual = $this->helper->__invoke();

        $this->assertSame('_v5', $actual);
    }

    public function testQueryVersionBySettings()
    {
        $this->helper->setVersion(6);
        $this->helper->setType('query');

        $actual = $this->helper->__invoke();

        $this->assertSame('v=6', $actual);
    }
}
