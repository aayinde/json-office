<?php

/**
 * JsonWriter test case.
 */
use PHPUnit\Framework\TestCase;
use Aayinde\JsonOffice\Writer\JsonArrayWriter;
use Aayinde\JsonOffice\Decorator\Writer\WriterFlag;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;
use Aayinde\JsonOffice\Writer\WriterException;

class JsonWriterTest extends TestCase
{

    /**
     *
     * @var JsonArrayWriter
     */
    private $jsonWriter;

    private $input;

    private $filename;

    public function setUp(): void
    {
        $this->input = array(
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5
        );
        $this->jsonWriter = new JsonArrayWriter();
    }

    public function testWriterPropertiesSetters()
    {
        $this->jsonWriter->setInput($this->input);
        $this->assertEquals($this->jsonWriter->getInput(), $this->input);
    }

    public function testWriterReturnType()
    {
        $this->jsonWriter->setInputDept(500);
        $this->assertEquals($this->jsonWriter->getInputDepth(), 500);
    }

    public function testWriterUseThrowException()
    {
        $this->jsonWriter->useThrowException(true);
        $this->assertTrue($this->jsonWriter->isExceptionThrow(), true);
    }

    public function testuseUnescapedSlashes()
    {
        $this->jsonWriter->useUnescapedSlashes();
        $this->assertEquals(WriterFlag::useUnescapedSlashes(), $this->jsonWriter->getUnescapedSlashes());
    }

    public function testuseToPrettyPrint()
    {
        $this->jsonWriter->useToPrettyPrint();
        $this->assertEquals(WriterFlag::useToPrettyPrint(), $this->jsonWriter->getToPrettyPrint());
    }

    public function testuseConvertNumericCheck()
    {
        $this->jsonWriter->useConvertNumericCheck();
        $this->assertEquals(WriterFlag::convertNumericCheck(), $this->jsonWriter->getConvertNumericCheck());
    }

    public function testuseConvertForceObject()
    {
        $this->jsonWriter->useConvertForceObject();
        $this->assertEquals(WriterFlag::convertForceObject(), $this->jsonWriter->getConvertForceObject());
    }

    public function testuseConvertQuoteToHexValue()
    {
        $this->jsonWriter->useConvertQuoteToHexValue();
        $this->assertEquals(WriterFlag::convertQuoteToHexValue(), $this->jsonWriter->getConvertQuoteToHexValue());
    }

    public function testuseConvertAposToHexValue()
    {
        $this->jsonWriter->useConvertAposToHexValue();
        $this->assertEquals(WriterFlag::convertAposToHexValue(), $this->jsonWriter->getConvertAposToHexValue());
    }

    public function testuseConvertAmpsToHexValue()
    {
        $this->jsonWriter->useConvertAmpsToHexValue();
        $this->assertEquals(WriterFlag::convertAmpsToHexValue(), $this->jsonWriter->getConvertAmpsToHexValue());
    }

    public function testuseConvertTagsToHexValue()
    {
        $this->jsonWriter->useConvertTagsToHexValue();
        $this->assertEquals(WriterFlag::convertTagsToHexValue(), $this->jsonWriter->getConvertTagsToHexValue());
    }

    public function testuseUnescapedUnitcode()
    {
        $this->jsonWriter->useUnescapedUnitcode();
        $this->assertEquals(WriterFlag::useUnescapedUnitcode(), $this->jsonWriter->getUnescapedUnitcode());
    }

    public function testusePartialOutputOnError()
    {
        $this->jsonWriter->usePartialOutputOnError();
        $this->assertEquals(WriterFlag::usePartialOutputOnError(), $this->jsonWriter->getPartialOutputOnError());
    }

    public function testusePreserveZeroFraction()
    {
        $this->jsonWriter->usePreserveZeroFraction();
        $this->assertEquals(WriterFlag::usePreserveZeroFraction(), $this->jsonWriter->getPreserveZeroFraction());
    }

    public function testuseUnescapedLineTerminators()
    {
        $this->jsonWriter->useUnescapedLineTerminators();
        $this->assertEquals(WriterFlag::useUnescapedLineTerminators(), $this->jsonWriter->getUnescapedLineTerminators());
    }

    public function testValidatedInputDepth()
    {
        $this->jsonWriter->setInputDept(12);
        $this->assertEquals($this->jsonWriter->getInputDepth(), 12);
    }

    public function testValidatedInputDepthInvalidDepth()
    {
        $this->jsonWriter->setInputDept(0)
            ->setInput($this->input)
            ->resultOutput();
        $this->assertEquals(JsonOfficeLang::$minimumNestingExceeded, $this->jsonWriter->getError());
    }

    public function testValidatedInputDepthInvalidDepthWithException()
    {
        $this->expectException(WriterException::class);
        $this->jsonWriter->setInputDept(0)
            ->setInput($this->input)
            ->useThrowException(true)
            ->resultOutput();
        $this->assertEquals(JsonOfficeLang::$minimumNestingExceeded, $this->jsonWriter->getError());
    }

    public function testValidatedInputSavetoFilename()
    {
        $this->jsonWriter->setInputDept(512)
            ->setInput($this->input)
            ->saveToFile("");
        $this->assertEquals(JsonOfficeLang::$filenameNotValid, $this->jsonWriter->getError());
    }

    public function testValidatedInputSavetoFilenameWithException()
    {
        $this->expectException(WriterException::class);
        $this->jsonWriter->setInputDept(512)
            ->setInput($this->input)
            ->useThrowException(true)
            ->saveToFile("");
        $this->assertEquals(JsonOfficeLang::$filenameNotValid, $this->jsonWriter->getError());
    }

    public function testFileWrittenToDirectory()
    {
        // TODO Auto-generated JsonFileReaderTest::setUp()
        $fileDirPath = __DIR__;
        $ds = DIRECTORY_SEPARATOR;
        $dir = $fileDirPath . $ds . "jsonfiles" . $ds;
        $this->jsonWriter->setInput($this->input)
            ->setSaveDirectoryPath($dir)
            ->saveToFile("test_array");
        $this->assertFileExists($dir . $ds . "test_array.json") && $this->assertTrue($this->jsonWriter->getOutput());
    }

    public function testFileWrittenToNonDirectory()
    {
        // TODO Auto-generated JsonFileReaderTest::setUp()
        $fileDirPath = __DIR__;
        $ds = DIRECTORY_SEPARATOR;
        $dir = $fileDirPath . $ds . "jsonfiles" . $ds;
        $this->jsonWriter->setInput($this->input)->saveToFile("test_array2");
        $this->assertFileExists("test_array2.json") && $this->assertTrue($this->jsonWriter->getOutput());
    }

    public function testFileWrittenToNonDirectoryWithParameter()
    {
        // TODO Auto-generated JsonFileReaderTest::setUp()
        $fileDirPath = __DIR__;
        $ds = DIRECTORY_SEPARATOR;
        $dir = $fileDirPath . $ds . "jsonfiles" . $ds;
        $this->jsonWriter->setInput($this->input)
            ->useConvertForceObject()
            ->useToPrettyPrint()
            ->saveToFile("test_array3");
        $this->assertFileExists("test_array3.json") && $this->assertTrue($this->jsonWriter->getOutput());
    }
}

