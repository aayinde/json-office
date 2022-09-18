<?php
namespace Aayinde\JsonOffice\Decorator\Writer;

/**
 * Access to relevant flags for processing the input data
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
class WriterFlag
{

    /**
     * All < and > are converted to \u003C and \u003E.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertTagsToHexValue(): int
    {
        return JSON_HEX_TAG;
    }

    /**
     * All & are converted to \u0026.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertAmpsToHexValue(): int
    {
        return JSON_HEX_AMP;
    }

    /**
     * All ' are converted to \u0027.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertAposToHexValue(): int
    {
        return JSON_HEX_APOS;
    }

    /**
     * All " are converted to \u0022.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertQuoteToHexValue(): int
    {
        return JSON_HEX_QUOT;
    }

    /**
     * Outputs an object rather than an array when a non-associative array is used.
     * Especially useful when the recipient of the output is expecting
     * an object and the array is empty.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertForceObject(): int
    {
        return JSON_FORCE_OBJECT;
    }

    /**
     * Encodes numeric strings as numbers.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function convertNumericCheck(): int
    {
        return JSON_NUMERIC_CHECK;
    }

    /**
     * Use whitespace in returned data to format it.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function useToPrettyPrint(): int
    {
        return JSON_PRETTY_PRINT;
    }

    /**
     * Don't escape /.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function useUnescapedSlashes(): int
    {
        return JSON_UNESCAPED_SLASHES;
    }

    /**
     * Encode multibyte Unicode characters literally
     * (default is to escape as \uXXXX).
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function useUnescapedUnitcode(): int
    {
        return JSON_UNESCAPED_UNICODE;
    }

    /**
     * Substitute some unencodable values instead of failing.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function usePartialOutputOnError(): int
    {
        return JSON_PARTIAL_OUTPUT_ON_ERROR;
    }

    /**
     * Ensures that float values are always encoded as a float value.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function usePreserveZeroFraction(): int
    {
        return JSON_PRESERVE_ZERO_FRACTION;
    }

    /**
     * The line terminators are kept unescaped when
     * JSON_UNESCAPED_UNICODE is supplied.
     *
     * @return int
     * @see https://www.php.net/manual/en/json.constants.php
     */
    public static function useUnescapedLineTerminators(): int
    {
        return JSON_UNESCAPED_LINE_TERMINATORS;
    }
}

