<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Class LuhnModNTest
 * @package Choccybiccy\Algorithm\Checksum
 */
class LuhnModNTest extends TestCase
{

    /**
     * @var string
     */
    protected $input = "abcdef";

    /**
     * @var string
     */
    protected $output = "abcdefe";

    /**
     * @var string
     */
    protected $failOutput = "abcdefa";

    /**
     * Get mock algorithm
     * @param array|null $methods
     * @return mixed|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockAlgorithm($methods = null)
    {
        return $this->getMockBuilder("Choccybiccy\\Algorithm\\Checksum\\LuhnModN")
            ->setConstructorArgs(array(range("a", "f")))
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * Test construct throws an exception when duplicate characters found in map
     */
    public function testConstructThrowsExceptionWhenDuplicateCharacters()
    {

        $this->setExpectedException("\\InvalidArgumentException");
        $algorithm = new LuhnModN(array("a", "a", "b", "c"));

    }

    /**
     * Test construct throws exception when map references characters of length greater than 1
     */
    public function testConstructThrowsExceptionWhenNoneSingleCharacters()
    {

        $this->setExpectedException("\\InvalidArgumentException");
        $algorithm = new LuhnModN(array("ab", "c", "d"));

    }

    /**
     * Test generate throws exception when trying to generate with characters not in the map
     */
    public function testGenerateThrowsExceptionWhenInvalidChars()
    {
        $algorithm = $this->getMockAlgorithm();
        $this->setExpectedException("\\InvalidArgumentException");
        $algorithm->generate("ghijkl");
    }
}