<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Exception\JsonOfficeErrorHelper;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;

/**
 * Class for Handling of the Json Files Input
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 * @license https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link https://github.com/aayinde/json-office
 * @version 1.0
 *         
 */
final class JsonFileReader extends BaseReader
{

    /**
     * After the input data has been sent, store it.
     *
     * @var string
     */
    private ?string $inputFile = null;

    /**
     * Allows for rapid input configuration.
     *
     * @param string $filePath
     */
    public function __construct(?string $filePath = null)
    {
        $this->reader = $filePath;
    }

    /**
     * Triger the render method for processing the responses
     *
     * @return void
     */
    public function process(): void
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
            if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::isFileValid($this->reader)) {
                if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::parserFileContent($this->reader)) {
                    if (! \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateDepth($this->readerDepth)) {
                        $this->inputFile = \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::$fileContent;
                        if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateJsonInput($this->inputFile)) {
                            // @phpstan-ignore-next-line
                            $this->output = json_decode($this->inputFile, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
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
                    $this->error = JsonOfficeLang::$invalidFileJson;
                    $this->isError = true;
                    throw new ReaderException($this->error);
                }
            } else {
                $this->error = JsonOfficeLang::$invalidFile;
                $this->isError = true;
                throw new ReaderException($this->error);
            }
        } else {
            if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::isFileValid($this->reader)) {
                if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::parserFileContent($this->reader)) {
                    if (! \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateDepth($this->readerDepth)) {
                        $this->inputFile = \Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::$fileContent;
                        if (\Aayinde\JsonOffice\Decorator\Reader\ReaderHelper::validateJsonInput($this->inputFile)) {
                            // @phpstan-ignore-next-line
                            $this->output = json_decode($this->inputFile, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
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
                } else {
                    $this->error = JsonOfficeLang::$invalidFileJson;
                    $this->isError = true;
                }
            } else {
                $this->error = JsonOfficeLang::$invalidFile;
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
        return $this->output;
    }

    public function __destruct()
    {}
}
