<?php
namespace Aayinde\JsonOffice\Decorator;

/**
 *
 * @author aaliyu
 *        
 */
class ReaderHelper
{

    /**
     *
     * @var integer
     */
    private static int $maximumDepthAllowed = 2147483647;

    private static string $fileExtension = 'json';

    /**
     *
     * @var string
     */
    public static ?string $fileContent = null;

    /**
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
     *
     * @param int $depth
     * @return bool
     */
    public static function validateDepth(?int $depth): bool
    {
        return $depth > 0 && $depth <= self::$maximumDepthAllowed ? false : true;
    }

    /**
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
     *
     * @param string $filename
     * @return bool|NULL
     *
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

