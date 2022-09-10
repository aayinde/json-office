<?php
namespace Aayinde\JsonOffice\Decorator;

/**
 *
 * @author aaliyu
 *        
 */
class ReaderDecorator
{

    public static function returnTypeAsAssociateArray(): bool
    {
        return true;
    }

    public static function returnTypeAsObject(): bool
    {
        return false;
    }

    public static function returnTypeAsAuto(): ?bool
    {
        return null;
    }
}
