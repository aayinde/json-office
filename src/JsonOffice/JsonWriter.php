<?php
namespace Aayinde\JsonOffice;

use Aayinde\JsonOffice\Writer\JsonArrayWriter;

/**
 * JsonWriter
 *
 * Writing out Json files make easy
 * Despite the fact that this Class serves as a gateway to all of the Writer Classes,
 * Each Writer Class can be initialized independently.
 * It provides a static method of accessing the Writer Classes without having to create new instances.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 * @license https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link https://github.com/aayinde/json-office
 * @version 1.0
 *         
 */
final class JsonWriter
{

    /**
     * Get the Instances of the JsonArrayWriter
     *
     * @return \Aayinde\JsonOffice\Writer\JsonArrayWriter
     */
    private static function jsonFileWriter()
    {
        return new JsonArrayWriter();
    }

    /**
     * Returns the Instances Object of the JsonArrayWriter
     *
     * @return \Aayinde\JsonOffice\Writer\JsonArrayWriter
     */
    public static function getInstanceJsonWriter()
    {
        return self::jsonFileWriter();
    }
}

