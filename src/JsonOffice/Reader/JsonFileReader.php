<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Decorator\ReaderLang;
use Aayinde\JsonOffice\Exception\JsonErrorHelper;
use Aayinde;

/**
 *
 * @author aaliyu
 *        
 */
class JsonFileReader extends BaseReader
{

    private ?string $inputFile = null;

    /**
     */
    public function __construct(?string $filePath = null)
    {
        $this->reader = $filePath;
    }

    /**
     */
    public function process(): void
    {
        $this->render();
    }

    /**
     * @throws ReaderException
     */
    private function render(): void
    {
        if ($this->throwException) {
            if (\Aayinde\JsonOffice\Decorator\ReaderHelper::isFileValid($this->reader)) {
                if (\Aayinde\JsonOffice\Decorator\ReaderHelper::parserFileContent($this->reader)) {
                    if (! \Aayinde\JsonOffice\Decorator\ReaderHelper::validateDepth($this->readerDepth)) {
                        $this->inputFile = \Aayinde\JsonOffice\Decorator\ReaderHelper::$fileContent;
                        if (\Aayinde\JsonOffice\Decorator\ReaderHelper::validateJsonInput($this->inputFile)) {
                            // @phpstan-ignore-next-line
                            $this->output = json_decode($this->inputFile, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                $this->error = JsonErrorHelper::getJsonError(json_last_error());
                                $this->isError = false;
                            } else {
                                $this->error = JsonErrorHelper::getJsonError(json_last_error());
                                $this->isError = true;
                                throw new ReaderException($this->error, json_last_error());
                            }
                        } else {
                            $this->error = ReaderLang::$invalidJsonInput;
                            $this->isError = true;
                            throw new ReaderException($this->error);
                        }
                    } else {
                        $this->error = ReaderLang::$maximumNestingExceeded;
                        $this->isError = true;
                        throw new ReaderException($this->error);
                    }
                } else {
                    $this->error = ReaderLang::$invalidFileJson;
                    $this->isError = true;
                    throw new ReaderException($this->error);
                }
            } else {
                $this->error = ReaderLang::$invalidFile;
                $this->isError = true;
                throw new ReaderException($this->error);
            }
        } else {
            if (\Aayinde\JsonOffice\Decorator\ReaderHelper::isFileValid($this->reader)) {
                if (\Aayinde\JsonOffice\Decorator\ReaderHelper::parserFileContent($this->reader)) {
                    if (! \Aayinde\JsonOffice\Decorator\ReaderHelper::validateDepth($this->readerDepth)) {
                        $this->inputFile = \Aayinde\JsonOffice\Decorator\ReaderHelper::$fileContent;
                        if (\Aayinde\JsonOffice\Decorator\ReaderHelper::validateJsonInput($this->inputFile)) {
                            // @phpstan-ignore-next-line
                            $this->output = json_decode($this->inputFile, $this->returnType, $this->readerDepth, $this->bigIntAsString | $this->objectAsArray | $this->ignoreInvalidUtf8 | $this->invalidUtf8Substitute);
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
                } else {
                    $this->error = ReaderLang::$invalidFileJson;
                    $this->isError = true;
                }
            } else {
                $this->error = ReaderLang::$invalidFile;
                $this->isError = true;
            }
        }
    }

    /**
     *
     * @phpstan-ignore-next-line
     */
    public function result()
    {
        return $this->output;
    }
}

