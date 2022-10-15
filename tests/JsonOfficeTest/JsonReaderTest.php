<?php

/**
 * JsonReader test case.
 */
use Aayinde\JsonOffice\JsonReader;
use Aayinde\JsonOffice\Decorator\Reader\ReaderDecorator;
use Aayinde\JsonOffice\Decorator\Reader\ReaderFlag;
use Aayinde\JsonOffice\Decorator\Reader\ReaderHelper;
use Aayinde\JsonOffice\Reader\JsonFileReader;
use Aayinde\JsonOffice\Reader\JsonStringReader;
use Aayinde\JsonOffice\Reader\ReaderException;
use PHPUnit\Framework\TestCase;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;

class JsonReaderTest extends TestCase
{

    private $inputFile;

    private $inputFileTwo;

    private $inputFileThree;

    private $json;

    public function setUp(): void
    {

        // TODO Auto-generated JsonFileReaderTest::setUp()
        $fileDirPath = __DIR__;
        $ds = DIRECTORY_SEPARATOR;
        $this->inputFile = $fileDirPath . $ds . "jsonfiles" . $ds . "example_1.json";
        $this->inputFileTwo = $fileDirPath . $ds . "jsonfiles" . $ds . "fruits.jph";
        $this->inputFileThree = $fileDirPath . $ds . "jsonfiles" . $ds . "badjson.json";
        $this->json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
    }

    public function testgetInstanceJsonFileReader()
    {
        $test = JsonReader::getInstanceJsonFileReader();
        $this->assertInstanceOf(JsonFileReader::class, $test);
    }

    public function testgetInstanceJsonStringReader()
    {
        $test = JsonReader::getInstanceJsonStringReader();
        $this->assertInstanceOf(JsonStringReader::class, $test);
    }

    public function testReaderJsonStringReaderPropertiesSetter(): void
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json);
        $this->assertEquals($this->json, $obj->getReader());
    }

    public function testReaderJsonStringReaderReturnType()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsAssociateArray());
        $this->assertEquals(true, $obj->getReturnType());
    }

    public function testReaderJsonStringReaderReturnTypeTwo()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsObject());
        $this->assertEquals(false, $obj->getReturnType());
    }

    public function testReaderJsonStringReaderReturnTypeThree()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsAuto());
        $this->assertEquals(false, $obj->getReturnType());
    }

    public function testReaderJsonStringReaderUseBigIntAsString()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->useBigIntAsString();
        $this->assertEquals(ReaderFlag::useBigIntAsString(), $obj->getUseBigIntAsString());
    }

    public function testReaderJsonStringReaderUseObjectAsArray()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->useObjectAsArray();
        $this->assertEquals(ReaderFlag::useObjectAsArray(), $obj->getUseObjectAsArray());
    }

    public function testReaderJsonStringReaderUseIgnoreInvalidUtf8()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->useIgnoreInvalidUtf8();
        $this->assertEquals(ReaderFlag::ignoreInvalidUtf8(), $obj->getUseIgnoreInvalidUtf8());
    }

    public function testReaderJsonStringReaderUseInvalidUtf8Substitue()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->useInvalidUtf8Substitute();
        $this->assertEquals(ReaderFlag::InvalidUtf8Substitute(), $obj->getUseInvalidUtf8Substitute());
    }

    public function testReaderJsonStringReaderSetThrowExceptionForDepth()
    {
        $this->expectException(ReaderException::class);
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->useThrowException(true)
            ->setReaderDepth(8888999988898)
            ->result();
    }

    public function testReaderJsonStringReaderSetReaderDepth()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReaderDepth(11);
        $this->assertEquals(11, $obj->getReaderDepth());
    }

    public function testReaderJsonStringReaderProcessReturnObject()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->setReturnType(ReaderDecorator::returnTypeAsObject())
            ->result();
        $this->assertIsObject($obj->result());
    }

    public function testProcessReturnArray()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->setReturnType(ReaderDecorator::returnTypeAsAssociateArray())
            ->result();
        $this->assertIsArray($obj->result());
    }

    public function testReaderJsonStringReaderProcessReturnAuto()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->result();
        $this->assertIsObject($obj->result());
    }

    public function testReaderJsonStringReaderProcessReturnAutoWithReturnAsArrayFlag()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->result();
        $this->assertIsArray($obj->result());
    }

    public function testReaderJsonStringReaderProcessWithInvalidDepth()
    {
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($this->json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->setReaderDepth(8898889888898)
            ->useObjectAsArray()
            ->useThrowException(false)
            ->result();
            $this->assertEquals(JsonOfficeLang::$maximumNestingExceeded, $obj->getErrorMessage());
    }

    public function testReaderJsonStringReaderProcessWithInvalidJsonInput()
    {
        $json = "{'Organization': 'PHP Documentation Team'}";
        $obj = JsonReader::getInstanceJsonStringReader();
        $obj->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->useThrowException(false)
            ->result();
            $this->assertEquals(JsonOfficeLang::$invalidJsonInput, $obj->getErrorMessage());
    }

    // reader
    public function testReaderPropertiesSetters()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile);
        $this->assertEquals($obj->getReader(), $this->inputFile);
    }

    public function testReaderReturnType()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsAssociateArray());
        $this->assertEquals(true, $obj->getReturnType());
    }

    public function testReaderReturnTypeTwo()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsObject());
        $this->assertEquals(false, $obj->getReturnType());
    }

    public function testReaderReturnTypeThree()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReturnType(ReaderDecorator::returnTypeAsAuto());
        $this->assertEquals(false, $obj->getReturnType());
    }

    public function testUseBigIntAsString()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->useBigIntAsString();
        $this->assertEquals(ReaderFlag::useBigIntAsString(), $obj->getUseBigIntAsString());
    }

    public function testUseObjectAsArray()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->useObjectAsArray();
        $this->assertEquals(ReaderFlag::useObjectAsArray(), $obj->getUseObjectAsArray());
    }

    public function testUseIgnoreInvalidUtf8()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->useIgnoreInvalidUtf8();
        $this->assertEquals(ReaderFlag::ignoreInvalidUtf8(), $obj->getUseIgnoreInvalidUtf8());
    }

    public function testUseInvalidUtf8Substitue()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->useInvalidUtf8Substitute();
        $this->assertEquals(ReaderFlag::InvalidUtf8Substitute(), $obj->getUseInvalidUtf8Substitute());
    }

    public function testSetThrowExceptionForDepth()
    {
        $this->expectException(ReaderException::class);
        $obj = JsonReader::getInstanceJsonFileReader();
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $obj->setReader($json);
        $obj->useThrowException(true)
            ->setReaderDepth(8888999988898)
            ->result();
    }

    public function testSetReaderDepth()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReaderDepth(11);
        $this->assertEquals(11, $obj->getReaderDepth());
    }

    public function testReaderHelperValidateInputTwo()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile);
        $this->assertTrue(ReaderHelper::validateJsonInput(ReaderHelper::parserFileContent($obj->getReader())));
    }

    public function testProcessReturnObject()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsObject())
            ->result();
        $this->assertIsObject($obj->result());
    }

    public function testProcesstReturnArray()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAssociateArray())
            ->result();
        $this->assertIsArray($obj->result());
    }

    public function testProcessReturnAuto()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->result();
        $this->assertIsObject($obj->result());
    }

    public function testProcessReturnWithReturnAsArrayFlag()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->result();
        $this->assertIsArray($obj->result());
    }

    public function testProcessWithInvalidDepth()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFile)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->setReaderDepth(88888888988)
            ->result();
        $this->assertEquals(JsonOfficeLang::$maximumNestingExceeded, $obj->getErrorMessage()) && $this->assertTrue($obj->isError());
    }

    public function testProcessWithInvalidJsonInput()
    {
        $obj = JsonReader::getInstanceJsonFileReader();
        $obj->setReader($this->inputFileThree)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->result();
            $this->assertEquals(JsonOfficeLang::$invalidJsonInput, $obj->getErrorMessage()) && $this->assertTrue($obj->isError());
    }
}

