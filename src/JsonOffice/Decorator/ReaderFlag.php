<?php
namespace Aayinde\JsonOffice\Decorator;

/**
 *
 * @author aaliyu
 *        
 */
class ReaderFlag
{

    public static function useBigIntAsString(): int
    {
        return JSON_BIGINT_AS_STRING;
    }

    public static function useObjectAsArray(): int
    {
        return JSON_OBJECT_AS_ARRAY;
    }

    public static function ignoreInvalidUtf8(): int
    {
        return JSON_INVALID_UTF8_IGNORE;
    }

    public static function InvalidUtf8Substitute(): int
    {
        return JSON_INVALID_UTF8_SUBSTITUTE;
    }
}

