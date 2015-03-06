<?php

namespace Choccybiccy\Algorithm\Checksum;

/**
 * Class LuhnModN
 *
 * Luhn mod N algorithm implementation
 *
 * @package Choccybiccy\Algorithm\Checksum
 */
class LuhnModN extends Luhn
{

    /**
     * @var array
     */
    protected $characterMap;

    /**
     * Constructor
     *
     * @param array $characterMap
     * @throws \InvalidArgumentException
     */
    public function __construct(array $characterMap)
    {

        // Trim characters of whitespaces
        array_walk($characterMap, function (&$char) {
            $char = trim($char);
        });

        $nonSingleCharacters = array();
        foreach($characterMap as $character) {
            if(strlen($character) > 1) {
                $nonSingleCharacters[] = $character;
            }
        }
        if(count($nonSingleCharacters)) {
            throw new \InvalidArgumentException(
                "The character map contains references that aren't 1 character in length: '"
                . implode("' '", $nonSingleCharacters) . "'"
            );
        }

        $frequencies = array_count_values($characterMap);
        $duplicates = array();
        foreach($frequencies as $character => $frequency) {
            if($frequency > 1) {
                $duplicates[] = $character;
            }
        }
        if(count($duplicates)) {
            throw new \InvalidArgumentException(
                "The character map contains duplicates of the following characters: '"
                . implode("' '", $duplicates) . "'"
            );
        }

        $this->characterMap = $characterMap;
    }

    /**
     * @param string $input
     * @return string
     * @throws \InvalidArgumentException
     */
    protected function generateChecksum($input)
    {

        $invalidChars = array();
        foreach(str_split($input) as $char) {
            if(!in_array($char, $this->characterMap)) {
                $invalidChars[] = $char;
            }
        }
        if(count($invalidChars)) {
            throw new \InvalidArgumentException(
                "Argument 1 contains the following characters not in the character map: " . implode(" ", $invalidChars)
            );
        }

        $base = count($this->characterMap);
        $factor = 2;
        $total = 0;

        for($i = strlen($input) -1; $i >= 0; $i--) {

            $codePoint = array_search(substr($input, $i, 1), $this->characterMap);
            $add = base_convert($codePoint * $factor, 10, $base);

            if($add > 9) {
                $add = array_sum(str_split($add));
            }

            $total = $total + $add;

            $factor = ($factor == 2) ? 1 : 2;

        }

        return $this->characterMap[$base - $total % $base];

    }
}