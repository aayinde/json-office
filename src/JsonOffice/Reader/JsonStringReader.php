<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Exception\JsonOfficeErrorHelper;
use Aayinde\JsonOffice\Exception\JsonOfficeException;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;

/**
 * Class for Handling of the Json Strings Input
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Aayinde
 * @license https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link https://github.com/aayinde/json-office
 * @version 1.0
 * @example JsonReader::jsonFileReader()->
 *         
 */
final class JsonStringReader extends BaseReader
{

    /**
     * Allows for rapid input configuration.
     *
     * @param string $jsonstring
     */
    public function __construct(?string $jsonstring = null)
    {
        $this->reader = $jsonstring;
    }

    /**
     * Triger the render method for processing the responses
     *
     * @return void
     */
    protected function process(): void
    {
        $this->render();
    }

    /**
     * Executes the procedures required for proper data parsing.
     *
     * @throws ReaderException
     */
    private function render(): void
    {
        if ($this->throwException) {
            if (! \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateDepth($this->readerDepth)) {
                if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateJsonInput($this->reader)) {
                    /**
                     *
                     * @phpstan-ignore-next-line
                     */
                    $this->output = json_decode($this->reader, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                        $this->isError = false;
                    } else {
                        $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                        $this->isError = true;
                        throw new ReaderException($this->error, json_last_error());
                    }
                } else {
                    $this->error = JsonOfficeLang::$invalidJsonInput;
                    $this->isError = true;
                    throw new ReaderException($this->error);
                }
            } else {
                $this->error = JsonOfficeLang::$maximumNestingExceeded;
                $this->isError = true;
                throw new ReaderException($this->error);
            }
        } else {
            if (! \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateDepth($this->readerDepth)) {
                if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateJsonInput($this->reader)) {
                    /**
                     *
                     * @phpstan-ignore-next-line
                     */
                    $this->output = json_decode($this->reader, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                        $this->isError = false;
                    } else {
                        $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                        $this->isError = true;
                    }
                } else {
                    $this->error = JsonOfficeLang::$invalidJsonInput;
                    $this->isError = true;
                }
            } else {
                $this->error = JsonOfficeLang::$maximumNestingExceeded;
                $this->isError = true;
            }
        }
    }

    /**
     * The final output is returned.
     *
     * @phpstan-ignore-next-line
     */
    public function result()
    {
        $this->process();
        return $this->output;
    }

    public function __destruct()
    {}
}
