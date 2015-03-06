<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Class Luhn
 * @package Choccybiccy\Algorithm\Checksum
 */
class Luhn implements ChecksumInterface
{

    /**
     * Generate Luhn checksum
     *
     * @param string $input
     * @return string
     */
    public function generate($input)
    {
        return $input . $this->generateChecksum($input);
    }

    /**
     * Validate input against Luhn
     *
     * @param string $input
     * @return bool
     */
    public function isValid($input)
    {
        if (substr($input, -1) == $this->generateChecksum(substr($input, 0, -1))) {
            return true;
        }
        return false;
    }

    /**
     * Generate a Luhn checksum
     *
     * @param string $input
     * @return int
     * @throws \InvalidArgumentException
     */
    protected function generateChecksum($input)
    {

        if (!is_numeric($input)) {
            throw new \InvalidArgumentException("Argument 1 must be numeric");
        }

        $even = array();
        $odd = array();

        for ($i = 0; $i < strlen($input); $i++) {
            $number = substr($input, $i, 1);
            if ($i % 2) {
                $number = $number * 2;
                if ($number > 9) {
                    $number = array_sum(str_split($number));
                }
                $even[] = $number;
            } else {
                $odd[] = $number;
            }
        }

        $checksum = (int) substr((array_sum($even) + array_sum($odd))*9, -1);

        return $checksum;

    }
}
