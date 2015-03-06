<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Interface ChecksumInterface
 * @package Choccybiccy\Algorithm\Checksum
 */
interface ChecksumInterface
{

    /**
     * Validate an input
     *
     * @param mixed $input
     * @return bool
     */
    public function isValid($input);

    /**
     * Generate checksum based on an input
     *
     * @param mixed $input
     * @return mixed
     */
    public function generate($input);
}
