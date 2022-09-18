<?php
namespace Aayinde\JsonOffice;

use Aayinde\JsonOffice\Reader\JsonFileReader;
use Aayinde\JsonOffice\Reader\JsonStringReader;

/**
 * JsonReader
 *
 * Read Json files very easy
 * Despite the fact that this Class serves as a gateway to all of the Reader Classes,
 * Each Reader Class can be initialized independently.
 * It provides a static method of accessing the Reader Classes without having to create new instances.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 * @license https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link https://github.com/aayinde/json-office
 * @version 1.0
 *         
 */
final class JsonReader
{

    /**
     * Get the Instances of the JsonFileReader
     *
     * @return \Aayinde\JsonOffice\Reader\JsonFileReader
     */
    private static function jsonFileReader()
    {
        return new JsonFileReader();
    }

    /**
     * Get the Instances of the JsonStringReader
     *
     * @return \Aayinde\JsonOffice\Reader\JsonStringReader
     */
    private static function jsonStringReader()
    {
        return new JsonStringReader();
    }

    /**
     * Returns the Instances Object of the JsonStringReader
     *
     * @return \Aayinde\JsonOffice\Reader\JsonStringReader
     */
    public static function getInstanceJsonStringReader()
    {
        return self::jsonStringReader();
    }

    /**
     * Returns the Instances Object of the JsonFileReader
     *
     * @return \Aayinde\JsonOffice\Reader\JsonFileReader
     */
    public static function getInstanceJsonFileReader()
    {
        return self::jsonFileReader();
    }
}