<?php
namespace Aayinde\JsonOffice\Decorator\Writer;

/**
 * This class contains several assistance methods for validating data.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
class WriterHelper
{

    /**
     * Because this library only works with json files, any other file is invalid.
     *
     * @var string
     */
    public static string $fileExtension = '.json';

    /**
     * This method determines whether the supplied depth exceeds the maximum allowed.
     *
     * @param int $depth
     * @return bool
     */
    public static function validateDepth(?int $depth): bool
    {
        return $depth > 0 ? true : false;
    }

    /**
     * Return fixedInvalidUtf8 method.
     *
     * @param mixed $string
     * @return mixed
     */
    public static function fixedInvalidStrings($string)
    {
        return self::fixedInvalidUtf8($string);
    }

    /**
     * This method tends to fix some invalid utf8 characters
     * that can cause the encoding to failed.
     *
     * @param mixed $param
     * @return mixed
     */
    private static function fixedInvalidUtf8($param)
    {
        if (is_array($param)) {
            foreach ($param as $key => $value) {
                unset($param[$key]);
                $param[self::fixedInvalidUtf8($key)] = self::fixedInvalidUtf8($value);
            }
        } else if (is_object($param)) {
            $objVars = get_object_vars($param);
            foreach ($objVars as $objKey => $objValue) {
                $param->$objKey = self::fixedInvalidUtf8($objValue);
            }
        } else if (is_string($param)) {
            return iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($param));
        }

        return $param;
    }

    /**
     * Removes space and characters from a given string
     *
     * @param string $string
     * @return string
     */
    public static function cleanStringRemoveSpaces(string $string): string
    {
        // @phpstan-ignore-next-line
        return strtolower(preg_replace('/[^a-zA-Z0-9.]/', '', $string));
    }

    /**
     * Checks if the filename is set.
     *
     * @param string $filename
     * @return bool
     */
    public static function checkIfFilenameIsset(string $filename): bool
    {
        if (! empty($filename)) {
            // @phpstan-ignore-next-line
            return isset($filename) && ! empty($filename) ? true : false;
        }
        return false;
    }

    /**
     * Check if the directory exist or not
     *
     * @param string $dir
     * @return bool
     */
    public static function checkDirectoryWriteableAndExist(?string $dir): bool
    {
        if (! empty($dir)) {            
            return is_dir($dir) && file_exists($dir) ? true : false;
        }
        return false;
    }

    /**
     * Write the Content into a file
     *
     * @param string $filename
     * @param mixed $data
     * @return mixed
     */
    public static function createFile($filename, $data)
    {
        return file_put_contents($filename, $data);
    }
}

