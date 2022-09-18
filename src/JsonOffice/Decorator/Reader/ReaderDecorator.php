<?php

namespace Aayinde\JsonOffice\Decorator\Reader;

/**
 * Different ways of turning the output is provided.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *
 */
class ReaderDecorator
{
    /**
     * Return the output in the form of an Associate array.
     * @return bool
     */
    public static function returnTypeAsAssociateArray(): bool
    {
        return true;
    }

    /**
     * Return the result in the form of a Stdclass Object.
     * @return bool
     */
    public static function returnTypeAsObject(): bool
    {
        return false;
    }

    /**
     * Depending on the other parameters related to it, return the result as an array or StdObject.
     * @return bool|NULL
     */
    public static function returnTypeAsAuto(): ?bool
    {
        return null;
    }
}
