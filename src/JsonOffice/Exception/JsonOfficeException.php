<?php

namespace Aayinde\JsonOffice\Exception;

/**
 * The Library's Exception Handler makes use of the native Exception class.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *
 */
class JsonOfficeException extends \Exception
{
    /**
     * Exception class instances that supplied arguments
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(?string $message = null, ?int $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
