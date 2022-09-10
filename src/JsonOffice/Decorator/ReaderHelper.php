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
}

