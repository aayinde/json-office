<?php
namespace Aayinde\JsonOffice\Exception;

/**
 *
 * @author aaliyu
 *        
 */
class JsonErrorHelper
{

    private static string $errorMessage = '';

    public static function getJsonError(?int $error): string
    {
        switch ($error) {
            case JSON_ERROR_NONE:
                self::$errorMessage = "No error has occurred";
                break;

            case JSON_ERROR_DEPTH:
                self::$errorMessage = "The maximum stack depth has been exceeded";
                break;
            case JSON_ERROR_STATE_MISMATCH:
                self::$errorMessage = "Invalid or malformed JSON";
                break;
            case JSON_ERROR_CTRL_CHAR:
                self::$errorMessage = "Control character error, possibly incorrectly encoded";

                break;
            case JSON_ERROR_SYNTAX:
                self::$errorMessage = "Syntax error";

                break;
            case JSON_ERROR_UTF8:
                self::$errorMessage = "Malformed UTF-8 characters, possibly incorrectly encoded";

                break;
            case JSON_ERROR_RECURSION:
                self::$errorMessage = "One or more recursive references in the value to be encoded";

                break;
            case JSON_ERROR_INF_OR_NAN:
                self::$errorMessage = "One or more NAN or INF values in the value to be encoded";

                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                self::$errorMessage = "A value of a type that cannot be encoded was given";

                break;
            case JSON_ERROR_INVALID_PROPERTY_NAME:
                self::$errorMessage = "A property name that cannot be encoded was given";

                break;
            case JSON_ERROR_UTF16:
                self::$errorMessage = "Malformed UTF-16 characters, possibly incorrectly encoded";
                break;
            default:
                self::$errorMessage = "Unknown error";
                break;
        }
        return self::$errorMessage;
    }
}
