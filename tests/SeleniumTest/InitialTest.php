<?php

namespace SeleniumTest;

use \PHPUnit_Extensions_Selenium2TestCase;

class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://zfskeleton.localhost/');
    }

    public function testTitle()
    {
        $this->url('http://zfskeleton.localhost/');
        $this->assertEquals('ZF2 Skeleton Application', $this->title());
    }

}
