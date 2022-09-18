<?php
namespace Aayinde\JsonOffice\Writer;

use Aayinde\JsonOffice\Decorator\Writer\WriterFlag;

/**
 * The base class for all json writers.
 * The class provides all of the
 * necessary methods and properties for inheriting.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
abstract class BaseWriter implements IWriter
{

    /**
     * The current source
     *
     * @var mixed
     */
    protected $input = null;

    /**
     * The Input Depth
     *
     * @var int
     */
    protected int $inputDepth = 512;

    /**
     * The Error Message data
     *
     * @var string
     */
    protected string $error = '';

    /**
     * The final result
     *
     * @var mixed
     */
    protected $output = null;

    /**
     * For tossing Exceptions.
     *
     * @var boolean
     */
    protected bool $throwException = false;

    /**
     * Store the Response error status
     *
     * @var boolean
     */
    protected bool $isError = false;

    /**
     * The code for the thrown exception
     *
     * @var int
     */
    protected ?int $throwExceptionCode = null;

    /**
     * The message that follows the exception is toss
     *
     * @var string
     */
    protected ?string $throwExceptionMessage = null;

    /**
     *
     * @var int
     */
    protected ?int $unescapedSlashes = null;

    /**
     *
     * @var int
     */
    protected ?int $toPrettyPrint = null;

    /**
     *
     * @var int
     */
    protected ?int $convertNumericCheck = null;

    /**
     *
     * @var int
     */
    protected ?int $convertForceObject = null;

    /**
     *
     * @var int
     */
    protected ?int $convertQuoteToHexValue = null;

    /**
     *
     * @var int
     */
    protected ?int $convertAposToHexValue = null;

    /**
     *
     * @var int
     */
    protected ?int $convertAmpsToHexValue = null;

    /**
     *
     * @var int
     */
    protected ?int $convertTagsToHexValue = null;

    /**
     *
     * @var int
     */
    protected ?int $unescapedUnitcode = null;

    /**
     *
     * @var int
     */
    protected ?int $partialOutputOnError = null;

    /**
     *
     * @var int
     */
    protected ?int $preserveZeroFraction = null;

    /**
     *
     * @var int
     */
    protected ?int $unescapedLineTerminators = null;

    /**
     *
     * @var string
     */
    protected ?string $filename = null;

    /**
     *
     * @var string
     */
    protected ?string $fileDirectoryPath = null;

    /**
     * Get the Input
     *
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the Input
     *
     * @param mixed $input
     */
    public function setInput($input): self
    {
        $this->input = $input;
        return $this;
    }

    /**
     * Get the depth
     *
     * @return int
     */
    public function getInputDepth(): ?int
    {
        return $this->inputDepth;
    }

    /**
     * Set the Depth
     *
     * @param int $inputDepth
     */
    public function setInputDept(int $inputDepth): self
    {
        $this->inputDepth = $inputDepth;
        return $this;
    }

    /**
     * Get the Error Message without the Exception
     *
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * Get the Final Out
     *
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Get the use of Exceptions
     *
     * @return boolean
     */
    public function isExceptionThrow(): bool
    {
        return $this->throwException;
    }

    /**
     * Set the use of Exceptions
     *
     * @param bool $throwException
     */
    public function useThrowException(bool $throwException = false): self
    {
        $this->throwException = $throwException;
        return $this;
    }

    /**
     * Returns the after parsing
     *
     * @return boolean
     */
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     * Get the getThrowExceptionCode
     *
     * @return int
     */
    public function getThrowExceptionCode(): ?int
    {
        return $this->throwExceptionCode;
    }

    /**
     * Get the getThrowExceptionMessage
     *
     * @return string
     */
    public function getThrowExceptionMessage(): ?string
    {
        return $this->throwExceptionMessage;
    }

    /**
     * Get the UnescapedSlashes Value
     *
     * @return int|null
     */
    public function getUnescapedSlashes()
    {
        return $this->unescapedSlashes;
    }

    /**
     * Get the ToPrettyPrint Value
     *
     * @return int|null
     */
    public function getToPrettyPrint()
    {
        return $this->toPrettyPrint;
    }

    /**
     * Get the ConvertNumericCheck Value
     *
     * @return int|null
     */
    public function getConvertNumericCheck()
    {
        return $this->convertNumericCheck;
    }

    /**
     * Get the ConvertNumericCheck Value
     *
     * @return int|null
     */
    public function getConvertForceObject()
    {
        return $this->convertForceObject;
    }

    /**
     * Get the ConvertQuoteToHexValue Value
     *
     * @return int|null
     */
    public function getConvertQuoteToHexValue()
    {
        return $this->convertQuoteToHexValue;
    }

    /**
     * Get the ConvertAposToHexValue Value
     *
     * @return int|null
     */
    public function getConvertAposToHexValue()
    {
        return $this->convertAposToHexValue;
    }

    /**
     * Get the ConvertAmpsToHexValue Value
     *
     * @return int|null
     */
    public function getConvertAmpsToHexValue()
    {
        return $this->convertAmpsToHexValue;
    }

    /**
     * Get the ConvertTagsToHexValue Value
     *
     * @return int|null
     */
    public function getConvertTagsToHexValue()
    {
        return $this->convertTagsToHexValue;
    }

    /**
     * Get the UnescapedUnitcode Value
     *
     * @return int|null
     */
    public function getUnescapedUnitcode()
    {
        return $this->unescapedUnitcode;
    }

    /**
     * Get the PartialOutputOnError Value
     *
     * @return int|null
     */
    public function getPartialOutputOnError()
    {
        return $this->partialOutputOnError;
    }

    /**
     * Get the PreserveZeroFraction Value
     *
     * @return int|null
     */
    public function getPreserveZeroFraction()
    {
        return $this->preserveZeroFraction;
    }

    /**
     * Get the UnescapedLineTerminators Value
     *
     * @return int|null
     */
    public function getUnescapedLineTerminators()
    {
        return $this->unescapedLineTerminators;
    }

    /**
     * Set the UnescapedSlashes Value
     *
     * @return self
     */
    public function useUnescapedSlashes(): self
    {
        $this->unescapedSlashes = WriterFlag::useUnescapedSlashes();
        return $this;
    }

    /**
     * Set the ToPrettyPrint Value
     *
     * @return self
     */
    public function useToPrettyPrint(): self
    {
        $this->toPrettyPrint = WriterFlag::useToPrettyPrint();
        return $this;
    }

    /**
     * Set the ConvertNumericCheck Value
     *
     * @return self
     */
    public function useConvertNumericCheck(): self
    {
        $this->convertNumericCheck = WriterFlag::convertNumericCheck();
        return $this;
    }

    /**
     * Set the ConvertForceObject Value
     *
     * @return self
     */
    public function useConvertForceObject(): self
    {
        $this->convertForceObject = WriterFlag::convertForceObject();
        return $this;
    }

    /**
     * Set the ConvertQuoteToHexValue Value
     *
     * @return self
     */
    public function useConvertQuoteToHexValue(): self
    {
        $this->convertQuoteToHexValue = WriterFlag::convertQuoteToHexValue();
        return $this;
    }

    /**
     * Set the ConvertAposToHexValue Value
     *
     * @return self
     */
    public function useConvertAposToHexValue(): self
    {
        $this->convertAposToHexValue = WriterFlag::convertAposToHexValue();
        return $this;
    }

    /**
     * Set the ConvertAmpsToHexValue Value
     *
     * @return self
     */
    public function useConvertAmpsToHexValue(): self
    {
        $this->convertAmpsToHexValue = WriterFlag::convertAmpsToHexValue();
        return $this;
    }

    /**
     * Set the ConvertTagsToHexValue Value
     *
     * @return self
     */
    public function useConvertTagsToHexValue(): self
    {
        $this->convertTagsToHexValue = WriterFlag::convertTagsToHexValue();
        return $this;
    }

    /**
     * Set the UnescapedUnitcode Value
     *
     * @return self
     */
    public function useUnescapedUnitcode(): self
    {
        $this->unescapedUnitcode = WriterFlag::useUnescapedUnitcode();
        return $this;
    }

    /**
     * Set the PartialOutputOnError Value
     *
     * @return self
     */
    public function usePartialOutputOnError(): self
    {
        $this->partialOutputOnError = WriterFlag::usePartialOutputOnError();
        return $this;
    }

    /**
     * Set the PreserveZeroFraction Value
     *
     * @return self
     */
    public function usePreserveZeroFraction(): self
    {
        $this->preserveZeroFraction = WriterFlag::usePreserveZeroFraction();
        return $this;
    }

    /**
     * Set the UnescapedLineTerminators Value
     *
     * @return self
     */
    public function useUnescapedLineTerminators(): self
    {
        $this->unescapedLineTerminators = WriterFlag::useUnescapedLineTerminators();
        return $this;
    }

    /**
     * Set the saveToFile Value
     *
     * @param string $filename
     */
    public function saveToFile($filename): self
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * Set the saveToDirectoryPath Value
     *
     * @param String $dir
     * @return self
     */
    public function saveToDirectoryPath(string $dir): self
    {
        $this->fileDirectoryPath = $dir;
        return $this;
    }
}
