<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Class LuhnTest
 * @package Choccybiccy\Algorithm\Checksum
 */
class LuhnTest extends TestCase
{

    /**
     * @var string
     */
    protected $input = "7992739871";

    /**
     * @var string
     */
    protected $output = "79927398713";

    /**
     * @var string
     */
    protected $failOutput = "79927398710";

    /**
     * Get mock algorithm
     * @param array|null $methods
     * @return mixed|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockAlgorithm($methods = null)
    {
        return $this->getMockBuilder("Choccybiccy\\Algorithm\\Checksum\\Luhn")
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * Test generateChecksum throws exception when input not numeric
     */
    public function testGenerateChecksumThrowsException()
    {

        $algorithm = $this->getMockAlgorithm();
        $this->setExpectedException("\\InvalidArgumentException");
        $this->runProtectedMethod($algorithm, "generateChecksum", array("string"));

    }
}