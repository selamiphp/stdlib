<?php

namespace SelamiTest;

use Codeception\Test\Unit;
use Selami\Stdlib\Git\Version;

class VersionTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @test
     *
     */
    public function shouldReturnShortGitVersion() : void
    {
        $fileName = dirname(__DIR__, 3).'/.git/refs/heads/master';
        if (!file_exists($fileName)) {
           put_file_contents($fileName, 'kedibey9--');
        }
        $expected =  substr(file_get_contents(dirname(__DIR__, 3).'/.git/refs/heads/master'), 0, 7);
        $result = Version::short();
        $this->assertEquals($expected, $result);
    }

}
