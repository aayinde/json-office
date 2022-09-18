<?php

namespace Aayinde\JsonOffice\Decorator\Reader;

/**
 * This class contains several assistance methods for validating data.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *
 */
class ReaderHelper
{
    /**
     * This is the maximum depth that the PHP engine permits.
     *
     * @var integer
     */
    private static int $maximumDepthAllowed = 2147483647;

    /**
     * Because this library only works with json files, any other file is invalid.
     *
     * @var string
     */
    private static string $fileExtension = 'json';

    /**
     * Following validation, this variable now contains the data.
     *
     * @var string
     */
    public static ?string $fileContent = null;

    /**
     * This function attempted to parse the file first to determine
     * if it passed the standard json decoding engine.
     *
     * @param string $string
     * @return bool
     */
    public static function validateJsonInput(?string $string): bool
    {
        if (is_string($string)) {
            @json_decode($string);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
    }

    /**
     * This method determines whether the supplied depth exceeds the maximum allowed.
     *
     * @param int $depth
     * @return bool
     */
    public static function validateDepth(?int $depth): bool
    {
        return $depth > 0 && $depth <= self::$maximumDepthAllowed ? false : true;
    }

    /**
     * This function determines whether the file supplied is a valid json file.
     *
     * @param string $filename
     * @return bool
     */
    public static function isFileValid(?string $filename): bool
    {

        // @phpstan-ignore-next-line
        return file_exists($filename) && is_file($filename) && (pathinfo($filename, PATHINFO_EXTENSION) === self::$fileExtension) ? true : false;
    }

    /**
     * This function converts the contents of the specified file to a string.
     *
     * @param string $filename
     * @return bool|NULL
     * @see https://www.php.net/manual/en/function.file-get-contents
     */
    public static function parserFileContent(?string $filename): ?bool
    {
        /**
         *
         * @phpstan-ignore-next-line
         */
        self::$fileContent = file_get_contents($filename);
        if (! empty(self::$fileContent)) {
            return true;
        }
        return false;
    }
}
