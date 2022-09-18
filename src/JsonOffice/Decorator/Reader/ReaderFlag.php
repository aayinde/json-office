<?php

namespace Aayinde\JsonOffice\Decorator\Reader;

/**
 * Access to relevant flags for processing the input data
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *
 */
class ReaderFlag
{
    /**
     * The integer representation of the built-in contants is returned.
     *
     * @return int
     */
    public static function useBigIntAsString(): int
    {
        return JSON_BIGINT_AS_STRING;
    }

    /**
     * The integer representation of the built-in contants is returned.
     *
     * @return int
     */
    public static function useObjectAsArray(): int
    {
        return JSON_OBJECT_AS_ARRAY;
    }

    /**
     * The integer representation of the built-in contants is returned.
     *
     * @return int
     */
    public static function ignoreInvalidUtf8(): int
    {
        return JSON_INVALID_UTF8_IGNORE;
    }

    /**
     * The integer representation of the built-in contants is returned.
     *
     * @return int
     */
    public static function InvalidUtf8Substitute(): int
    {
        return JSON_INVALID_UTF8_SUBSTITUTE;
    }
}
