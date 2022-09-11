<?php
namespace Aayinde\JsonOffice\Exception;

/**
 *
 * @author aaliyu
 *        
 */
class JsonException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     */
    public function __construct(?string $message = null, ?int $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
