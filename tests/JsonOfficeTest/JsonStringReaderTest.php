<?php
namespace tests\JsonOfficeTest;

use Aayinde\JsonOffice\Decorator\Reader\ReaderDecorator;
use Aayinde\JsonOffice\Decorator\Reader\ReaderFlag;
use Aayinde\JsonOffice\Decorator\Reader\ReaderHelper;
use Aayinde\JsonOffice\Reader\JsonStringReader;
use Aayinde\JsonOffice\Reader\ReaderException;
use PHPUnit\Framework\TestCase;
use Aayinde\JsonOffice\Decorator\JsonOfficeLang;

final class JsonStringReaderTest extends TestCase
{

    public $objJsonReader;

    public function setUp(): void
    {
        $this->objJsonReader = new JsonStringReader();
    }

    public function testReaderPropertiesSetter(): void
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json);
        $this->assertEquals($json, $this->objJsonReader->getReader());
    }

    public function testReaderReturnType()
    {
        $this->objJsonReader->setReturnType(ReaderDecorator::returnTypeAsAssociateArray());
        $this->assertEquals(true, $this->objJsonReader->getReturnType());
    }

    public function testReaderReturnTypeTwo()
    {
        $this->objJsonReader->setReturnType(ReaderDecorator::returnTypeAsObject());
        $this->assertEquals(false, $this->objJsonReader->getReturnType());
    }

    public function testReaderReturnTypeThree()
    {
        $this->objJsonReader->setReturnType(ReaderDecorator::returnTypeAsAuto());
        $this->assertEquals(false, $this->objJsonReader->getReturnType());
    }

    public function testUseBigIntAsString()
    {
        $this->objJsonReader->useBigIntAsString();
        $this->assertEquals(ReaderFlag::useBigIntAsString(), $this->objJsonReader->getUseBigIntAsString());
    }

    public function testUseObjectAsArray()
    {
        $this->objJsonReader->useObjectAsArray();
        $this->assertEquals(ReaderFlag::useObjectAsArray(), $this->objJsonReader->getUseObjectAsArray());
    }

    public function testUseIgnoreInvalidUtf8()
    {
        $this->objJsonReader->useIgnoreInvalidUtf8();
        $this->assertEquals(ReaderFlag::ignoreInvalidUtf8(), $this->objJsonReader->getUseIgnoreInvalidUtf8());
    }

    public function testUseInvalidUtf8Substitue()
    {
        $this->objJsonReader->useInvalidUtf8Substitute();
        $this->assertEquals(ReaderFlag::InvalidUtf8Substitute(), $this->objJsonReader->getUseInvalidUtf8Substitute());
    }

    public function testSetThrowExceptionForDepth()
    {
        $this->expectException(ReaderException::class);
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json);
        $this->objJsonReader->useThrowException(true)
            ->setReaderDepth(8888999988898)
            ->process();
    }

    public function testSetReaderDepth()
    {
        $this->objJsonReader->setReaderDepth(11);
        $this->assertEquals(11, $this->objJsonReader->getReaderDepth());
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
        $json1 = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->assertTrue(ReaderHelper::validateJsonInput($json1));
    }

    public function testProcessReturnObject()
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsObject())
            ->process();
        $this->assertIsObject($this->objJsonReader->result());
    }

    public function testProcessReturnArray()
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAssociateArray())
            ->process();
        $this->assertIsArray($this->objJsonReader->result());
    }

    public function testProcessReturnAuto()
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->process();
        $this->assertIsObject($this->objJsonReader->result());
    }

    public function testProcessReturnAutoWithReturnAsArrayFlag()
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->process();
        $this->assertIsArray($this->objJsonReader->result());
    }

    public function testProcessWithInvalidDepth()
    {
        $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->setReaderDepth(8898889888898)
            ->useObjectAsArray()
            ->process();
        $this->assertEquals(JsonOfficeLang::$maximumNestingExceeded, $this->objJsonReader->getErrorMessage());
    }

    public function testProcessWithInvalidJsonInput()
    {
        $json = "{'Organization': 'PHP Documentation Team'}";
        $this->objJsonReader->setReader($json)
            ->setReturnType(ReaderDecorator::returnTypeAsAuto())
            ->useObjectAsArray()
            ->process();
        $this->assertEquals(JsonOfficeLang::$invalidJsonInput, $this->objJsonReader->getErrorMessage());
    }
}

