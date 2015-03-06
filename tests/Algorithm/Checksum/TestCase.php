<?php

namespace Choccybiccy\Algorithm\Checksum;

use Choccybiccy\Algorithm\Traits\ReflectionMethods;

/**
 * Abstract TestCase
 * @package Choccybiccy\Algorithm\Checksum
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{

    use ReflectionMethods;

    /**
     * @var mixed
     */
    protected $input;

    /**
     * @var mixed
     */
    protected $output;

    /**
     * @var mixed
     */
    protected $failOutput;

    /**
     * Test generate method
     */
    public function testAlgorithm()
    {
        $algorithm = $this->getMockAlgorithm();
        $this->assertEquals($this->output, $algorithm->generate($this->input));
        $this->assertTrue($algorithm->isValid($this->output));
        $this->assertFalse($algorithm->isValid($this->failOutput));
    }

    /**
     * Get mock algorithm
     *
     * @param array|null $methods
     * @return mixed
     */
    abstract protected function getMockAlgorithm($methods = null);
}
