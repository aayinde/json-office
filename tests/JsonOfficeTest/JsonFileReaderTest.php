<?php
namespace tests\JsonOfficeTest;

use Aayinde\JsonOffice\Decorator\Reader\ReaderDecorator;
use Aayinde\JsonOffice\Decorator\Reader\ReaderFlag;
use Aayinde\JsonOffice\Decorator\Reader\ReaderHelper;
use Aayinde\JsonOffice\Reader\JsonFileReader;
use Aayinde\JsonOffice\Reader\ReaderException;
use PHPUnit\Framework\TestCase;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;

/**
 * JsonFileReader test case.
 */
class JsonFileReaderTest extends TestCase
{

    /**
     *
     * @var JsonFileReader
     */
    private $jsonFileReader;

    private $inputFile;

    private $inputFileTwo;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp(): void
    {

        // TODO Auto-generated JsonFileReaderTest::setUp()
        $fileDirPath = __DIR__;
        $ds = DIRECTORY_SEPARATOR;
        $this->inputFile = $fileDirPath . $ds . "jsonfiles" . $ds . "example_1.json";
        $this->inputFileTwo = $fileDirPath . $ds . "jsonfiles" . $ds . "fruits.jph";
        $this->inputFileThree = $fileDirPath . $ds . "jsonfiles" . $ds . "badjson.json";
        $this->jsonFileReader = new JsonFileReader();
    }

    public function testReaderPropertiesSetters()
    {
        $this->jsonFileReader->setReader($this->inputFile);
        $this->assertEquals($this->jsonFileReader->getReader(), $this->inputFile);
    }

    public function testReaderReturnType()
    {
        $this->jsonFileReader->setReturnType(ReaderDecorator::returnTypeAsAssociateArray());
        $this->assertEquals(true, $this->jsonFileReader->getReturnType());
    }

    public function testReaderReturnTypeTwo()
    {
        $this->jsonFileReader->setReturnType(ReaderDecorator::returnTypeAsObject());
        $this->assertEquals(false, $this->jsonFileReader->getReturnType());
    }

    public function testReaderReturnTypeThree()
    {
        $this->jsonFileReader->setReturnType(ReaderDecorator::returnTypeAsAuto());
        $this->assertEquals(false, $this->jsonFileReader->getReturnType());
    }

    public function testUseBigIntAsString()
    {
        $this->jsonFileReader->useBigIntAsString();
        $this->assertEquals(ReaderFlag::useBigIntAsString(), $this->jsonFileReader->getUseBigIntAsString());
    }

    public function testUseObjectAsArray()
    {
        $this->jsonFileReader->useObjectAsArray();
        $this->assertEquals(ReaderFlag::useObjectAsArray(), $this->jsonFileReader->getUseObjectAsArray());
    }

    public function testUseIgnoreInvalidUtf8()
    {
        $this->jsonFileReader->useIgnoreInvalidUtf8();
        $this->assertEquals(ReaderFlag::ignoreInvalidUtf8(), $this->jsonFileReader->getUseIgnoreInvalidUtf8());
    }

    public function testUseInvalidUtf8Substitue()
    {
        $this->jsonFileReader->useInvalidUtf8Substitute();
        $this->assertEquals(ReaderFlag::InvalidUtf8Substitute(), $this->jsonFileReader->getUseInvalidUtf8Substitute());
    }

    public function testSetThrowExceptionForDepth()
    {
        $this->expectException(ReaderException::class);
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->jsonFileReader->setReader($json);
        $this->jsonFileReader->useThrowException(true)
        ->setReaderDepth(8888999988898)
        ->process();
    }

    public function testSetReaderDepth()
    {
        $this->jsonFileReader->setReaderDepth(11);
        $this->assertEquals(11, $this->jsonFileReader->getReaderDepth());
    }

    public function testIsFileValid()
    {
        $this->assertTrue(ReaderHelper::isFileValid($this->inputFile));
    }

    public function testFileIsNotValid()
    {
        $this->assertFalse(ReaderHelper::isFileValid($this->inputFileTwo));
    }

    public function testFileParsingIsTrue()
    {
        $this->assertTrue(ReaderHelper::parserFileContent($this->inputFile));
    }

    public function testReaderHelperValidateDepth()
    {
        $this->assertTrue(ReaderHelper::validateDepth(8888999988898));
    }

    public function testReaderHelperValidateDepthTwo()
    {
        $this->assertNotTrue(ReaderHelper::validateDepth(512));
    }

    public function testReaderHelperValidateInput()
    {
        $this->assertNotTrue(ReaderHelper::validateJsonInput(null));
    }

    public function testReaderHelperValidateInputTwo()
    {
        $this->jsonFileReader->setReader($this->inputFile);
        $this->assertTrue(ReaderHelper::validateJsonInput(ReaderHelper::parserFileContent($this->jsonFileReader->getReader())));
    }

    public function testProcessReturnObject()
    {
        $this->jsonFileReader->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsObject())
            ->process();
        $this->assertIsObject($this->jsonFileReader->result());
    }

    public function testProcessReturnArray()
    {
        $this->jsonFileReader->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAssociateArray())
            ->process();
        $this->assertIsArray($this->jsonFileReader->result());
    }

    public function testProcessReturnAuto()
    {
        $this->jsonFileReader->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->process();
        $this->assertIsObject($this->jsonFileReader->result());
    }

    public function testProcessReturnWithReturnAsArrayFlag()
    {
        $this->jsonFileReader->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->process();
        $this->assertIsArray($this->jsonFileReader->result());
    }

    public function testProcessWithInvalidDepth()
    {
        $this->jsonFileReader->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->setReaderDepth(88888888988)
            ->process();
        $this->assertEquals(JsonOfficeLang::$maximumNestingExceeded, $this->jsonFileReader->getErrorMessage()) && $this->assertTrue($this->jsonFileReader->isError());
    }

    public function testProcessWithInvalidJsonInput()
    {
        $this->jsonFileReader->setReader($this->inputFileThree)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->process();
        $this->assertEquals(JsonOfficeLang::$invalidJsonInput, $this->jsonFileReader->getErrorMessage()) && $this->assertTrue($this->jsonFileReader->isError());
    }
}

