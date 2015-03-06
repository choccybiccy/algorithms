<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Interface ChecksumInterface
 * @package Choccybiccy\Algorithm\Checksum
 */
interface ChecksumInterface
{

    /**
     * Validate a checksum
     *
     * @param mixed $checksum
     * @return bool
     */
    public function isValid($checksum);

    /**
     * Generate checksum based on an input
     *
     * @param mixed $input
     * @return mixed
     */
    public function generate($input);
}