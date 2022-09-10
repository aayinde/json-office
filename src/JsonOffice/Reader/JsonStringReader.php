<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Exception\JsonErrorHelper;
use Aayinde\JsonOffice\Decorator\ReaderLang;

/**
 *
 * @author aaliyu
 *        
 */
final class JsonStringReader extends BaseReader implements IReader
{

    /**
     */
    public function __construct(?string $jsonstring = null)
    {
        $this->reader = $jsonstring;
    }

    /**
     *
     * @return void
     */
    public function process(): void
    {
        if (! \Aayinde\JsonOffice\Decorator\ReaderHelper::validateDepth($this->readerDepth)) {
            if (\Aayinde\JsonOffice\Decorator\ReaderHelper::validateJsonInput($this->reader)) {
                $this->output = json_decode($this->reader, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $this->error = JsonErrorHelper::getJsonError(json_last_error());
                    $this->isError = false;
                } else {
                    $this->error = JsonErrorHelper::getJsonError(json_last_error());
                    $this->isError = true;
                }
            } else {
                $this->error = ReaderLang::$invalidJsonInput;
                $this->isError = true;
            }
        } else {
            $this->error = ReaderLang::$maximumNestingExceeded;
            $this->isError = true;
        }
    }

    public function result()
    {
        return $this->output;
    }
}
