<?php

namespace Choccybiccy\Algorithm\Checksum;

use Choccybiccy\Algorithm\TestCase as BaseTestCase;

/**
 * Abstract TestCase
 * @package Choccybiccy\Algorithm\Checksum
 */
abstract class TestCase extends BaseTestCase
{

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