<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Decorator\Reader\ReaderFlag;

/**
 * The base class for all json readers.
 * The class provides all of the
 * necessary methods and properties for inheriting.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
abstract class BaseReader implements IReader
{

    /**
     * The current source
     *
     * @var string
     */
    protected ?string $reader = null;

    /**
     * The Input return Type
     *
     * @var bool
     */
    protected ?bool $returnType = null;

    /**
     * The Input Depth
     *
     * @var integer
     */
    protected ?int $readerDepth = 512;

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
     *
     * @var int
     */
    protected ?int $bigIntAsString = null;

    /**
     *
     * @var int
     */
    protected ?int $objectAsArray = null;

    /**
     *
     * @var int
     */
    protected ?int $ignoreInvalidUtf8 = null;

    /**
     *
     * @var int
     */
    protected ?int $invalidUtf8Substitute = null;

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
     * Set the Input
     *
     * @param string $readerInput
     * @return self
     */
    public function setReader(string $readerInput): self
    {
        $this->reader = $readerInput;
        return $this;
    }

    /**
     * Set the Return Type
     *
     * @param bool $returnType
     * @return self
     */
    public function setReturnType(?bool $returnType): self
    {
        $this->returnType = $returnType;
        return $this;
    }

    /**
     * Set the Depth
     *
     * @param int $readerDepth
     * @return self
     */
    public function setReaderDepth(?int $readerDepth): self
    {
        $this->readerDepth = $readerDepth;
        return $this;
    }

    /**
     * Set the use of Exceptions
     *
     * @param bool $set
     * @return self
     */
    public function useThrowException(bool $set = false): self
    {
        $this->throwException = $set;
        return $this;
    }

    /**
     * Set the constants
     *
     * @return self
     */
    public function useBigIntAsString(): self
    {
        $this->bigIntAsString = ReaderFlag::useBigIntAsString();
        return $this;
    }

    /**
     * Set the constants
     *
     * @return self
     */
    public function useObjectAsArray(): self
    {
        $this->objectAsArray = ReaderFlag::useObjectAsArray();
        return $this;
    }

    /**
     * Set the constants
     *
     * @return self
     */
    public function useIgnoreInvalidUtf8(): self
    {
        $this->ignoreInvalidUtf8 = ReaderFlag::ignoreInvalidUtf8();
        return $this;
    }

    /**
     * Set the constants
     *
     * @return self
     */
    public function useInvalidUtf8Substitute(): self
    {
        $this->invalidUtf8Substitute = ReaderFlag::InvalidUtf8Substitute();
        return $this;
    }

    /**
     * Get the Input
     *
     * @return string|NULL
     */
    public function getReader(): ?string
    {
        return $this->reader;
    }

    /**
     * Get the Return Type
     *
     * @return bool|NULL
     */
    public function getReturnType(): ?bool
    {
        return $this->returnType;
    }

    /**
     * Get the depth
     *
     * @return int|NULL
     */
    public function getReaderDepth(): ?int
    {
        return $this->readerDepth;
    }

    /**
     * Get the Error Message Throw
     *
     * @return string
     */
    public function getThrowExceptionMessage(): ?string
    {
        return $this->throwExceptionMessage;
    }

    /**
     * Get the Error Code
     *
     * @return int|NULL
     */
    public function getThrowExceptionCode(): ?int
    {
        return $this->throwExceptionCode;
    }

    /**
     * Returns bool value.
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     * Get the Error Message without the Exception
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error;
    }

    /**
     * Return the Value
     *
     * @return int|NULL
     */
    public function getUseBigIntAsString(): ?int
    {
        return $this->bigIntAsString;
    }

    /**
     * Return the Value
     *
     * @return int|NULL
     */
    public function getUseObjectAsArray(): ?int
    {
        return $this->objectAsArray;
    }

    /**
     * Return the Value
     *
     * @return int|NULL
     */
    public function getUseIgnoreInvalidUtf8(): ?int
    {
        return $this->ignoreInvalidUtf8;
    }

    /**
     * Return the Value
     *
     * @return int|NULL
     */
    public function getUseInvalidUtf8Substitute(): ?int
    {
        return $this->invalidUtf8Substitute;
    }
}
