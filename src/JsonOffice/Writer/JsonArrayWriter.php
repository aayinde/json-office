<?php
namespace Aayinde\JsonOffice\Writer;

use Aayinde\JsonOffice\Decorator\Writer\WriterHelper;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;
use Aayinde\JsonOffice\Exception\JsonOfficeErrorHelper;

/**
 * Class for Handling of the Json Writer Input
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Aayinde
 * @license https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link https://github.com/aayinde/json-office
 * @version 1.0
 * @example
 *
 */
final class JsonArrayWriter extends BaseWriter
{

    /**
     * The Result of the Input
     *
     * @var mixed
     */
    private $finalResult = null;

    /**
     * Allows for rapid input configuration.
     *
     * @param mixed $input
     */
    public function __construct($input = null)
    {
        $this->input = $input;
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
     * cleanup class
     */
    function __destruct()
    {}

    /**
     * The final output is returned.
     *
     * @return mixed
     */
    protected function result()
    {
        return $this->output;
    }

    /**
     * Executes the procedures required for proper data writing.
     *
     * @throws WriterException
     */
    private function render(): void
    {
        if ($this->isExceptionThrow()) {
            if (! empty($this->input)) {
                if (WriterHelper::validateDepth($this->inputDepth)) {
                    $this->output = json_encode(WriterHelper::fixedInvalidStrings($this->input), $this->convertAmpsToHexValue | $this->convertAposToHexValue | $this->convertForceObject | $this->convertNumericCheck | $this->convertQuoteToHexValue | $this->convertTagsToHexValue | $this->partialOutputOnError | $this->preserveZeroFraction | $this->toPrettyPrint | $this->unescapedLineTerminators | $this->unescapedSlashes | $this->unescapedUnitcode, $this->inputDepth = 512);
                    $this->finalResult = $this->output;
                    // @phpstan-ignore-next-line
                    if (WriterHelper::checkIfFilenameIsset($this->filename)) {

                        if (WriterHelper::checkDirectoryWriteableAndExist($this->fileDirectoryPath)) {
                            WriterHelper::createFile($this->fileDirectoryPath . $this->filename . WriterHelper::$fileExtension, $this->output);
                            $this->output = true;
                        } else {
                            WriterHelper::createFile($this->filename . WriterHelper::$fileExtension, $this->output);
                            $this->output = true;
                        }
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                            $this->isError = false;
                        } else {
                            $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                            $this->isError = true;
                            throw new WriterException($this->error, json_last_error());
                        }
                    } else {
                        $this->error = JsonOfficeLang::$filenameNotValid;
                        $this->isError = true;
                        throw new WriterException($this->error);
                    }
                } else {
                    $this->error = JsonOfficeLang::$minimumNestingExceeded;
                    $this->isError = true;
                    throw new WriterException($this->error);
                }
            } else {
                $this->error = JsonOfficeLang::$invalidInput;
                $this->isError = true;
                throw new WriterException($this->error);
            }
        } else {
            if (! empty($this->input)) {

                if (WriterHelper::validateDepth($this->inputDepth)) {
                    $this->output = json_encode(WriterHelper::fixedInvalidStrings($this->input), $this->convertAmpsToHexValue | $this->convertAposToHexValue | $this->convertForceObject | $this->convertNumericCheck | $this->convertQuoteToHexValue | $this->convertTagsToHexValue | $this->partialOutputOnError | $this->preserveZeroFraction | $this->toPrettyPrint | $this->unescapedLineTerminators | $this->unescapedSlashes | $this->unescapedUnitcode, $this->inputDepth = 512);
                    $this->finalResult = $this->output;
                    // @phpstan-ignore-next-line
                    if (WriterHelper::checkIfFilenameIsset($this->filename)) {

                        if (WriterHelper::checkDirectoryWriteableAndExist($this->fileDirectoryPath)) {
                            WriterHelper::createFile($this->fileDirectoryPath . $this->filename . WriterHelper::$fileExtension, $this->output);
                            $this->output = true;
                        } else {
                            WriterHelper::createFile($this->filename . WriterHelper::$fileExtension, $this->output);
                            $this->output = true;
                        }
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                            $this->isError = false;
                        } else {
                            $this->error = JsonOfficeErrorHelper::getJsonError(json_last_error());
                            $this->isError = true;
                        }
                    } else {
                        $this->error = JsonOfficeLang::$filenameNotValid;
                        $this->isError = true;
                    }
                } else {
                    $this->error = JsonOfficeLang::$minimumNestingExceeded;
                    $this->isError = true;
                }
            } else {
                $this->error = JsonOfficeLang::$invalidInput;
                $this->isError = true;
            }
        }
    }

    /**
     * Save the filename to the provided filename;
     *
     * {@inheritdoc}
     * @see \Aayinde\JsonOffice\Writer\BaseWriter::saveToFile()
     * @return mixed
     */
    public function saveToFile(string $filename)
    {
        $this->filename = $filename;
        $this->process();
        return $this->result();
    }

    /**
     * Result the Process json.
     *
     * @return mixed
     */
    public function resultOutput()
    {
        $this->process();
        return $this->finalResult;
    }
}