<?php
namespace Aayinde\JsonOffice\Reader;

use Aayinde\JsonOffice\Decorator\ReaderFlag;

/**
 *
 * @author aaliyu
 *        
 */
abstract class BaseReader
{

    /**
     *
     * @var string
     */
    protected ?string $reader = null;

    /**
     *
     * @var bool
     */
    protected ?bool $returnType = null;

    /**
     *
     * @var integer
     */
    protected ?int $readerDepth = 512;

    /**
     *
     * @var array<int>
     */
    protected ?array $readerFlag = [];

    /**
     *
     * @var string
     */
    protected string $error = '';

    /**
     *
     * @var mixed
     */
    protected $output = null;

    /**
     *
     * @var boolean
     */
    protected bool $throwException = false;

    /**
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
     *
     * @var int
     */
    protected ?int $throwExceptionCode = null;

    /**
     *
     * @var string
     */
    protected ?string $throwExceptionMessage = null;

    /**
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
     *
     * @param array<int> $flag
     * @return self
     */
    public function setReaderFlags(?array $flag): self
    {
        $this->readerFlag = $flag;
        return $this;
    }

    /**
     *
     * @return self
     */
    public function useThrowException(): self
    {
        $this->throwException = true;
        return $this;
    }

    public function useBigIntAsString(): self
    {
        $this->bigIntAsString = ReaderFlag::useBigIntAsString();
        return $this;
    }

    public function useObjectAsArray(): self
    {
        $this->objectAsArray = ReaderFlag::useObjectAsArray();
        return $this;
    }

    public function useIgnoreInvalidUtf8(): self
    {
        $this->ignoreInvalidUtf8 = ReaderFlag::ignoreInvalidUtf8();
        return $this;
    }

    public function useInvalidUtf8Substitute(): self
    {
        $this->invalidUtf8Substitute = ReaderFlag::InvalidUtf8Substitute();
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getReader(): ?string
    {
        return $this->reader;
    }

    /**
     *
     * @return bool|NULL
     */
    public function getReturnType(): ?bool
    {
        return $this->returnType;
    }

    /**
     *
     * @return int|NULL
     */
    public function getReaderDepth(): ?int
    {
        return $this->readerDepth;
    }

    /**
     *
     * @return array<int>|NULL
     */
    public function getReaderFlags(): ?array
    {
        return $this->readerFlag;
    }

    /**
     *
     * @return string
     */
    public function getThrowExceptionMessage(): ?string
    {
        return $this->throwExceptionMessage;
    }

    public function getThrowExceptionCode(): ?int
    {
        return $this->throwExceptionCode;
    }

    /**
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error;
    }

    public function getUseBigIntAsString(): ?int
    {
        return $this->bigIntAsString;
    }

    public function getUseObjectAsArray(): ?int
    {
        return $this->objectAsArray;
    }

    public function getUseIgnoreInvalidUtf8(): ?int
    {
        return $this->ignoreInvalidUtf8;
    }

    public function getUseInvalidUtf8Substitute(): ?int
    {
        return $this->invalidUtf8Substitute;
    }
}
